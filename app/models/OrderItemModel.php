<?php

    use Services\OrderService;
    use Services\StockService;

    load(['OrderService','StockService'], SERVICES);

    class OrderItemModel extends Model
    {
        public $table = 'order_items';
        public $_fillables = [
            'order_id',
            'item_id',
            'quantity',
            'price',
            'sold_price',
            'discount_price',
            'remarks'
        ];

        const CATEGORY_QUANTITY = 'CATEGORY_QUANTITY';
        const CATEGORY_AMOUNT = 'CATEGORY_AMOUNT';

        public function __construct()
        {
            parent::__construct();
            $this->order = model('OrderModel');
        }

        public function deleteItem($id) {
            return parent::delete($id);
        }
        public function addOrUpdatePurchaseItem($orderItemRawData, $id = null) {            
            $orderItemData = parent::getFillablesOnly($orderItemRawData);

            if($this->_validateEntry($orderItemData))
                return false;

            if($this->checkItemStock($orderItemData['item_id'], $orderItemData['quantity']) === FALSE) {
                return false;
            }
            
            if(is_null($id)) {
                $purchaseSession = OrderService::getPurchaseSession('cashier');
                /**
                 * if order_id is assiged then use it as order_id
                 */
                if(!empty($orderItemRawData['order_id'])) {
                    $order_id = $orderItemRawData['order_id'];
                } else if(empty($purchaseSession)) {
                    $purchaseSession = OrderService::startPurchaseSession('cashier');
                    $order_id = $this->order->start($purchaseSession, $orderItemRawData['staff_id'] ?? '', $orderItemRawData['customer_id'] ?? '');
                } else {
                    $order_id = $this->order->getBySession($purchaseSession)->id ?? '';
                    if(!$order_id) {
                        $order_id = $this->order->start($purchaseSession, $orderItemRawData['staff_id'] ?? '', $orderItemRawData['customer_id'] ?? '');
                    }
                }

                $orderItemData['sold_price'] = $this->_calculateSoldPrice($orderItemData);
                $orderItemData['order_id'] = $order_id;
                $this->addMessage("Item added to cart");
                return parent::store($orderItemData);
            } else {
                $this->addMessage("Cart Updated");
                $orderItemData['sold_price'] = $this->_calculateSoldPrice($orderItemData);
                return parent::update($orderItemData, $id);
            }
        }

        private function _validateEntry($orderItemData) {
            if(empty($orderItemData['item_id'])){
                $this->addError("Item should not be empty");
                return false;
            }
        }

        private function _calculateSoldPrice($orderItemData) {
            $soldPrice = $orderItemData['quantity'] * $orderItemData['price'];

            if(isset($orderItemData['discount_price'])) {
                $soldPrice = $soldPrice - $orderItemData['discount_price'];
            }

            return $soldPrice;
        }

        public function getCurrentSession($name = 'purchase') {
            $purchaseSession = OrderService::getPurchaseSession($name);

            $this->db->query(
                "SELECT item.name, item.sku, oi.*
                    FROM {$this->table} as oi 

                    LEFT JOIN items as item 
                    ON item.id = oi.item_id
                    
                    WHERE oi.order_id = 
                    (SELECT id from orders where session_id = '{$purchaseSession}')"
            );

            return $this->db->resultSet();
        }

        public function resetPurchaseSession($name = 'purchase') {
            $purchaseSession = OrderService::endPurchaseSession($name);
            OrderService::startPurchaseSession($name);
        }

        public function getItemSummary($items = []) {
            $retVal = [
                'discountAmount' => 0,
                'grossAmount' => 0,
                'netAmount' =>  0
            ];
            if (!empty($items)) {
                foreach ($items as $key => $row) {
                    $retVal['discountAmount'] += $row->discount_price;
                    $retVal['grossAmount'] += $row->price;
                    $retVal['netAmount'] += $row->sold_price;
                }
            }
            return $retVal;
        }

        public function getItemTotal($items) {
            return $this->getItemSummary($items)['netAmount'];
        }

        public function getCurrentSessionId($name = 'purchase') {
            $purchaseSession = OrderService::getPurchaseSession($name);

            if(!$purchaseSession)
                return false;
            
            return $this->order->single([
                'session_id' => $purchaseSession
            ])->id ?? null;
        }

        public function getOrderItems($id) {
            $this->db->query(
                "SELECT item.name, item.sku, oi.*
                    FROM {$this->table} as oi 

                    LEFT JOIN items as item 
                    ON item.id = oi.item_id
                    
                    WHERE oi.order_id = '{$id}'"
            );
            return $this->db->resultSet();
        }

        public function checkItemStock($itemId, $quantity) {
            $this->stock = model('StockModel');
            $stockTotal = $this->stock->getItemStock($itemId);
            if ($stockTotal < $quantity) {
                $this->addError("No stock available");
                return false;
            }
            return true;
        }

        public function deductStock($itemId, $quantity) {
            $this->stock = model('StockModel');
            $this->stock->createOrUpdate([
                'item_id' => $itemId,
                'quantity' => $quantity,
                'remarks'  => 'Sales item deduction',
                'date' => now(),
                'entry_type' => StockService::ENTRY_DEDUCT,
                'entry_origin' => StockService::SALES
            ]);
        }

        public function getItemsByParam($param = []) {
            $where = [
                'ordr.is_paid' => true
            ];

            if(isset($param['where'])) {
                $where = array_merge($where,$param['where']);
            }
            $where = " WHERE " .parent::conditionConvert($where);
            $this->db->query(
                "SELECT item.name as item_name,
                item.sku as sku, oi.*, ordr.reference, ordr.created_at, ordr.is_paid,
                ordr.date_time
            
                FROM items as item
                LEFT JOIN order_items as oi
                ON oi.item_id = item.id 
            
                LEFT JOIN orders as ordr 
                ON oi.order_id = ordr.id
                {$where}
                "
            );

            return $this->db->resultSet();
        }
        /**
         * category :: quantity,amount
         * sort :: asc,desc
         */
        public function getLowestOrHighest($params = [], $category = null, $sort = null) {
            $where = null;
            if (isset($params['where'])) {
                $where = " WHERE ".parent::conditionConvert($params['where']);
            }
            if ($category == self::CATEGORY_QUANTITY) {
                $this->db->query(
                    "SELECT SUM(quantity) as total_quantity, item.name as item_name ,
                        item.sku
                        FROM order_items as oi 
                        LEFT JOIN items as item
                        ON oi.item_id = item.id 
                        {$where}
                        GROUP BY item.id
                        ORDER BY SUM(quantity) {$sort}
                    "
                        
                );
            }

            if($category == self::CATEGORY_AMOUNT) {
                $this->db->query(
                    "SELECT SUM(sold_price) as total_amount, item.name as item_name ,
                        item.sku
                        FROM order_items as oi 
                        LEFT JOIN items as item
                        ON oi.item_id = item.id 
                        {$where}
                        GROUP BY item.id
                        ORDER BY SUM(sold_price) {$sort}"
                );
            }

            return $this->db->resultSet();
        }
    }