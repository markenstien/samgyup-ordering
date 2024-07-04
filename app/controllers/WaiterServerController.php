<?php 

    class WaiterServerController extends Controller
    {
        private $tableModel, $orderModel;
        public function __construct()
        {
            parent::__construct();
            $this->tableModel  = model('TableUnitModel');
            $this->orderModel  = model('OrderModel');
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
            $this->data['tables'] = $tables;
            $this->data['table'] = $table;
            $this->data['order'] = $order;

            return $this->view('waiter_server/show_order', $this->data);
        }
    }