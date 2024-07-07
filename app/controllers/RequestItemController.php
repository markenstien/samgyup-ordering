<?php

use function Complex\sec;

    class RequestItemController extends Controller
    {
        private $requestItemModel, $itemModel;

        public function __construct()
        {
            parent::__construct();
            $this->requestItemModel = model('RequestItemModel');
            $this->itemModel = model('ItemModel');
            $this->orderItemModel = model('OrderItemModel');
        }

        public function addItem() {
            $req = request()->get();
            $itemData = unseal($req['q']);

            $resp = $this->orderItemModel->checkItemStock($itemData['item_id'], $itemData['quantity']);

            if(!$resp) {
                Flash::set($this->orderItemModel->getErrorString(), 'danger');
                return request()->return();
            }
            

            $resp = $this->requestItemModel->addItem($itemData);

            if($resp) {
                Flash::set("Order added");
            }

            return redirect(_route('waiter-server:show-order', $itemData['order_id'], [
                'action' => 'show-order'
            ]));
        }

        /**
         * id = requestId
         */
        public function completeOne($id) {
            $req = request()->get();
            $tableId = $req['tableId'];
            $orderId = $req['orderId'];

            $this->requestItemModel->completeOne($id);
            /**
             * redirect to table number
             */
            Flash::set($this->requestItemModel->getMessageString(), 'success');

            return redirect(_route('waiter-server:show-order', $orderId, [
                'action' => 'show-order'
            ]));
        }

        public function removeOne($id) {
            $this->requestItemModel->removeOne($id);
            Flash::set($this->requestItemModel->getMessageString(), 'success');
            return request()->return();
        }


        public function index() {
            
        }

        public function create() {

        }

        public function edit() {

        }

        public function delete() {
            
        }
    }