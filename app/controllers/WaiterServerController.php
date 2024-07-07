<?php
    use Services\OrderService;
    load(['OrderService'], SERVICES);

    class WaiterServerController extends Controller
    {
        private $tableModel, $orderModel, 
        $categoryModel, $itemModel,
        $requestItemModel;
        public function __construct()
        {
            parent::__construct();
            $this->tableModel  = model('TableUnitModel');
            $this->orderModel  = model('OrderModel');
            $this->itemModel = model('ItemModel');
            $this->categoryModel = model('CategoryModel');
            $this->requestItemModel = model('RequestItemModel');
        }
        public function index() {
            $tables = $this->orderModel->getWithTables([
                'where' => [
                    'ordr.order_status' => [
                        'condition' => 'in',
                        'value' => ['on-going']
                    ]
                ]
            ]);

            $this->data['tables'] = $tables;
            return $this->view('waiter_server/index', $this->data);
        }

        public function showOrder($orderId) {
            $order = $this->orderModel->getWithTables([
                'where' => [
                    'ordr.id' => $orderId
                ]
            ])[0] ?? false;

            $tables = $this->orderModel->getWithTables([
                'where' => [
                    'ordr.order_status' => [
                        'condition' => 'in',
                        'value' => ['on-going']
                    ],

                    'ordr.id' => [
                        'condition' => 'not equal',
                        'value' => $orderId
                    ]
                ]
            ]);

            $table = $this->tableModel->get($order->table_number_id);
            $requestItems = $this->requestItemModel->getAll([
                'where' => [
                    'ri.order_id' => $orderId
                ],

                'order' => 'ri.request_status desc, item.name asc'
            ]);

            $this->data['tables'] = $tables;
            $this->data['table'] = $table;
            $this->data['order'] = $order;
            $this->data['tableId'] = $order->table_number_id;
            $this->data['requestItems'] = $requestItems;
            $this->data['orderId'] = $orderId;

            return $this->view('waiter_server/show_order', $this->data);
        }

        public function addOrder($tableId) {
            $req = request()->get();
            $orderId = $req['orderId'];

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
            $table = $this->tableModel->get($tableId);

            $this->data = [
                'productsByCategory' => $productsByCategory,
                'tableId'   => $tableId,
                'table' => $table,
                'orderId' => $orderId
            ];


            return $this->view('waiter_server/add_order', $this->data);
        }

        public function addItem() {
            $req = request()->get();
            $itemData = unseal($req['q']);

            dd($itemData);
            dd($itemData);
        }
    }