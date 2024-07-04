<?php

    use Core\Form;
    load(['Form'], CORE);

    class TableForm extends Form {

        public function __construct()
        {
            parent::__construct();
            $this->addTableNumber();
        }

        public function addTableNumber() {
            $this->add([
                'name' => 'table_unit_number',
                'type' => 'text',
                'options' => [
                    'label' => 'Table Number'
                ],
                'class' => 'form-control'
            ]);
        }
    }