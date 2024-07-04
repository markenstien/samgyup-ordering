<?php

    use Services\OrderService;
    load(['OrderService'], SERVICES);

    class OrderController extends Controller
    {
        public $model, $categoryModel, $itemModel, $modelOrderItem, $tableModel;
        public $orderService;
        public function __construct()
        {
            $this->model = model('OrderModel');
            $this->modelOrderItem = model('OrderItemModel');
            $this->categoryModel  = model('CategoryModel');
            $this->itemModel  = model('itemModel');
            $this->tableModel  = model('TableUnitModel');

            $this->orderService = new OrderService();
            _authRequired();
        }
        public function index() {
            if(isEqual(whoIs('user_type'),'customer')) {
                $this->data['orders'] = $this->model->all([
                    'customer_id' => whoIs('id')
                ], 'id desc');
            } else {
                $this->data['orders'] = $this->model->all(null, 'id desc');
            }
            return $this->view('order/index', $this->data);
        }

        public function show($id) {
            $req = request()->get();
            
            _authRequired(['admin']);
            $order = $this->model->getComplete($id);
            $tableUnit = $this->tableModel->get($order['order']->table_number_id);
            $tables = $this->tableModel->all(null, 'FIELD(table_unit_status, "available", "reserved", "occupied"), table_unit_number asc');

            if(!empty($req['tableNumber']) && (!empty($req['action']) && isEqual($req['action'], 'assign-table'))) {
                /**
                 * assign table action
                 * update table to occupied
                 * update order-table-number to table number
                 * checks
                 * 
                 * check if table selected is occupied
                 */     
                $tableNumberId = $req['tableNumber'];
                $assign = $this->tableModel->setOccupied($tableNumberId);

                if(!$assign) {
                    Flash::set($this->tableModel->getMessageString(), 'danger');
                    return request()->return();
                }

                if($tableUnit) {
                    $this->tableModel->setAvailable($order['order']->table_number_id);
                }

                $this->model->update([
                    'table_number_id' => $tableNumberId
                ], $id);
                Flash::set("Table is assigned");
                return redirect(_route('order:cashier', $id));
            }
            $this->data['order'] = $order['order'];
            $this->data['payment'] = $order['payment'];
            $this->data['items'] = $order['items'];
            $this->data['tables'] = $tables;
            $this->data['tableUnit'] = $tableUnit;

            return $this->view('order/show', $this->data);
        }

        public function voidOrder($id) {
            
            $res = $this->model->void($id);
            Flash::set("Order Void!");
            OrderService::startPurchaseSession('cashier');
            return redirect(_route('receipt:order', $id));
        }

        public function complete($id) {
            $res = $this->model->complete($id);
            $order = $this->model->get($id);

            $assign = $this->tableModel->setAvailable($order->table_number_id);
            
            Flash::set("Order Completed!");
            return redirect(_route('receipt:order', $id));
        }

        public function cashier() {
            $orderSession = OrderService::getPurchaseSession('cashier');
            $items = $this->modelOrderItem->getCurrentSession('cashier');

            $tables = $this->tableModel->all(null, 'FIELD(table_unit_status, "available", "reserved", "occupied"), table_unit_number asc');
            $waitingOrders = $this->model->all([
                'table_number_id' => '0'
            ]);

            $this->data = [
                'orderSession' => $orderSession,
                'items' => $items,
                'tables' => $tables,
                'waitingOrders' => $waitingOrders
            ];

            return $this->view('order/cashier', $this->data);
        }

        /**
         * Add Order page
         * display packages and items
         */
        public function addOrder() {
            $orderSession = empty(OrderService::getPurchaseSession('cashier')) ? OrderService::startPurchaseSession('cashier'): OrderService::getPurchaseSession('cashier');

            $categories = $this->categoryModel->all([
                'category' => 'PRODUCT_CATEGORY'
            ]);

            $products = $this->itemModel->getAll();

            $productsByCategory = [];

            foreach($products as $key => $row) {
                if(!isset($productsByCategory[$row->category_name])) {
                    $productsByCategory[$row->category_name] = [];
                }
                $row->image = $this->itemModel->getSingleImage($row->id);
                $productsByCategory[$row->category_name][] = $row;
            }

            $this->data = [
                'productsByCategory' => $productsByCategory,
                'orderSession' => $orderSession
            ];

            return $this->view('order/add_order', $this->data);
        }

        public function void() {
            OrderService::startPurchaseSession('cashier');
            Flash::set("order void");
            return redirect(_route('order:cashier'));
        }
    }