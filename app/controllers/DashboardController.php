<?php

	use Classes\Report\SalesReport;
	use Services\OrderService;
	load(['OrderService'],SERVICES);
	load(['SalesReport'], CLASSES.DS.'Report');

	class DashboardController extends Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->tableModel = model('TableUnitModel');
			$this->appointment = model('AppointmentModel');
			$this->orderItemModel = model('OrderItemModel');
			$this->orderModel = model('OrderModel');
			$this->salesReport = new SalesReport();
		}
		
		public function index()
		{
			if(isEqual(whoIs('user_type'), 'customer')) {
				return redirect(_route('order:index'));
			}

			$completedOrders = $this->orderModel->all([
				'order_status' => 'completed'
			]);

			$orderIds = [];
			$top10salesChart = [];


			foreach($completedOrders as $key => $row) {
				$orderIds[] = $row->id;
			}

			$top10sales = $this->orderItemModel->getLowestOrHighest([
				'where' => [
					'order_id' => [
						'condition' => 'in',
						'value' => $orderIds
					]
				],
				'limit' => 5
			], $this->orderItemModel::CATEGORY_QUANTITY,'desc');

			
			foreach($top10sales as $key => $row) {
				$top10salesChart[$row->item_name] = $row->total_quantity;
			}

			$dateToday = date('Y-m-d');
			$data = [
				'availbleTables' => $this->tableModel->all([
					'table_unit_status' => 'available',
				]),
				'reservations' => $this->appointment->all([
					'status' => [
						'condition' => 'in',
						'value' => ['scheduled', 'arrived', 'pending']
					],
					'date' => $dateToday
				]),
				'waitingOrders'  => $this->orderModel->all([
					'table_number_id' => '0',
					'order_status' => 'pending',
					'date(created_at)' => $dateToday
				]),
				'completedOrders'  => $this->orderModel->all([
					'order_status' => 'completed',
					'date(created_at)' => $dateToday
				]),

				'salesPerMonth' => $this->salesReport->computeSalesPerMonth($completedOrders),
				'top10sales' => $top10sales,
				'top10salesChart' => $top10salesChart
			];

			$this->data = array_merge($this->data, $data);
			return $this->view('dashboard/index', $this->data);
		}
	}