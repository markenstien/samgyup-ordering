<?php
    use Services\OrderService;
    load(['OrderService'],SERVICES);
    class OrderModel extends Model
    {
        public $table = 'orders';

        public function start($sessionId, $staffId, $customerId) {

            return parent::store([
                'reference' => referenceSeries(parent::lastId(),6,'OR-'),
                'session_id' => $sessionId,
                'staff_id' => $staffId ?? null,
                'customer_id' => $customerId ?? null,
                'created_at' => now(),
                'order_status' => 'ongoing'
            ]);
        }

        public function getBySession($sessionId) {
            return parent::single([
                'session_id' => $sessionId
            ]);
        }

        public function getComplete($id) {
            $order = parent::get($id);
            if(!$order) {
                $this->addError("order not found!");
                return false;
            }

            $this->payment = model('PaymentModel');
            $this->orderItem = model('OrderItemModel');
            
            $payment = $this->payment->getOrderPayment($id);
            $items = $this->orderItem->getOrderItems($id);
            
            return [
                'order' => $order,
                'payment' => $payment,
                'items'  => $items
            ];
        }

        public function placeAndPay($orderData, $paymentData = null){

            if (!isset($orderData['id'])) {
                $this->addError("Order does not exists...");
                return false;
            }

            $paymentId = true;

            $this->payment = model('PaymentModel');
            $this->item = model('OrderItemModel');

            $orderData['date_time'] = now();
            $orderData['staff_id'] = whoIs('id');
            $orderData['is_paid'] = false;
            $orderData['table_number_id'] = 0;
            
            $orderDataUpdate = parent::update($orderData, $orderData['id']);

            $paymentId = $this->payment->createOrUpdate([
                'order_id' => $orderData['id'],
                'amount'   => $orderData['net_amount']
            ]);
            $this->payment->approve($paymentId);

            if($orderDataUpdate && $paymentId) {
                $this->addMessage("Order and payment saved");
                //remove stocks
                $items = $this->item->getOrderItems($orderData['id']);

                foreach ($items as $key => $row) {
                    $this->item->deductStock($row->item_id, $row->quantity);
                }

                $message = " New Order has been placed as of " . now();
                if(!empty($orderData['reference'])) {
                    $message .= "#{$orderData['reference']}";
                }
                $orderLink = _route('receipt:order', $orderData['id']);
                _notify_operations($message, ['href' => $orderLink], [whoIs('id')]);

                return true;
            }
            
            $this->addError("Something went wrong!");
            return false;
        }

        public function searchOrder($orderReference) {
            return parent::all([
                'reference' => $orderReference
            ])[0] ?? false;
        }

        public function getWithTables($params = []) {
            $where = null;

            if(!empty($params['where'])) {
                $where = " WHERE " .parent::conditionConvert($params['where']);
            }
            
            $this->db->query(
                "SELECT ordr.*, tbl_unit.table_unit_number as table_number,
                    tbl_unit.table_unit_status,
                    tbl_unit.id as table_unit_id
                    FROM {$this->table} as ordr
                    LEFT JOIN table_unit as tbl_unit
                        ON tbl_unit.id= ordr.table_number_id
                    {$where}
                    "
            );

            return $this->db->resultSet();
        }

        public function generateRefence() {
            return number_series(random_number(7));
        }

        public function void($id) {
            $result = parent::update([
                'order_status' => 'cancelled'
            ], $id);

            $this->payment = model('PaymentModel');

            $this->payment->update([
                'is_removed' => true
            ], ['order_id' => $id]);

            return true;
        }

        public function complete($id) {
            $result = parent::update([
                'order_status' => 'completed'
            ], $id);

            return $result;
        }
    }