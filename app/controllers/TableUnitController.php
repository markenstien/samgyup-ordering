<?php 

    load(['TableForm'], APPROOT.DS.'form');

    class TableUnitController extends Controller
    {
        public $tableUnitForm, $model;

        public function __construct()
        {
            parent::__construct();
            $this->model= model('TableUnitModel');
            $this->tableUnitForm = new TableForm();
        }

        public function index() {
            $this->data['tables'] = $this->model->all(null, 'table_unit_number asc');
            return $this->view('table_units/index', $this->data);
        }

        public function create() {
            if(isSubmitted()) {
                $post = request()->post();

                if($this->model->get([
                    'table_unit_number' => $post['table_unit_number']
                ])) {
                    Flash::set("Table already defined", 'danger');
                    return request()->return();
                } else {
                    $this->model->store([
                        'table_unit_number' => $post['table_unit_number']
                    ]);

                    Flash::set("Table Added");
                    return redirect(_route('table-unit:index'));
                }
                
            }
            $this->data['tableUnitForm'] = $this->tableUnitForm;
            return $this->view('table_units/create', $this->data);
        }

        public function edit($id) {
            $this->data['tableUnit'] = $this->model->get($id);

            if(isSubmitted()) {
                $post = request()->post();

                $this->model->update([
                    'table_unit_number' => $post['table_unit_number']
                ], $id);
            }

            $this->tableUnitForm->setValue('table_unit_number', $this->data['tableUnit']->table_unit_number);
            $this->data['tableUnitForm'] = $this->tableUnitForm;
            return $this->view('table_units/edit', $this->data);
        }

        public function setOccupied() {

        }
        
        public function setAvailable() {

        }

        public function setReserved() {

        }
    }