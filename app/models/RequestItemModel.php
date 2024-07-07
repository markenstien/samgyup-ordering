<?php

    class RequestItemModel extends Model
    {
        public $table = 'request_items';
        public $_fillables = [
            'order_id',
            'item_id',
            'table_id',
            'quantity',
            'price',
            'payment_status',
            'request_status'
        ];

        public function addItem($itemData = []) {
            $fillableOnly = parent::getFillablesOnly($itemData);
            /**
             * automatic
             * paymetn status = 'unpaid' // because needs to be verified by the server first
             */
            $fillableOnly['price'] = $itemData['price'];//default;
            $fillableOnly['payment_status'] = $itemData['payment_status'] ?? 'unpaid';
            $fillableOnly['request_status'] = $itemData['request_status'] ?? 'pending';
            
            return parent::store($fillableOnly);
        }

        public function getAll($params = []) {
            $where = null;
            $order = null;
            $limit = null;

            if(!empty($params['where'])) {
                $where = " WHERE " . parent::conditionConvert($params['where']);
            }

            if(!empty($params['order'])) {
                $order = " ORDER BY " . $params['order'];
            }

            if(!empty($params['limit'])) {
                $limit = " LIMIT ".$params['limit'];
            }
            
            $this->db->query(
                "SELECT ri.*, item.name as item_name 
                    FROM {$this->table} as ri
                        LEFT JOIN items as item 
                            ON item.id = ri.item_id
                    {$where} {$order} {$limit}"
            );

            return $this->db->resultSet();
        }

        public function getOne($params = []){
            return $this->getAll($params)[0] ?? false;
        }

        /**
         * complete all from tableId
         */
        public function completeByTableId($tableId) {

        }
        public function completeOne($id) {
            $itemData = $this->getOne([
                'where' => [
                    'ri.id' => $id
                ]
            ]);

            if(isEqual($itemData->request_status, 'complete')) {
                $this->addMessage("Unable to remove order that is already compelted.");
                return false;
            }

            if(!isset($this->orderItemModel)) {
                $this->orderItemModel = model('orderItemModel');
            }
            
            $addOrderItemResp = $this->orderItemModel->addOrUpdatePurchaseItem([
                'quantity' => $itemData->quantity,
                'price'    => $itemData->price,
                'sold_price' => $itemData->quantity * $itemData->price,
                'order_id'  => $itemData->order_id,
                'item_id'   => $itemData->item_id
            ]);

           if($addOrderItemResp) {
                $deductItem = $this->orderItemModel->deductStock($itemData->item_id, $itemData->quantity);
                //update to complete
                parent::update([
                    'request_status' => 'complete'
                ], $id);

                if(!isset($this->orderModel)) {
                    $this->orderModel = model('OrderModel');
                }
                $this->orderModel->refreshOrder($itemData->order_id);
           }
            /**
             * deducto to stocks
             */
        }

        public function removeOne($id) {
            $itemData = $this->getOne([
                'where' => [
                    'ri.id' => $id
                ]
            ]);

            if(isEqual($itemData->request_status, 'complete')) {
                $this->addMessage("Unable to remove order that is already compelted.");
                return false;
            }

            $this->addMessage("Request Item deleted");
            return parent::delete($id);
        }
    }