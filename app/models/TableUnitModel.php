<?php 

    class TableUnitModel extends Model {
        public $table = 'table_unit';

        public function setAvailable($id) {
            return parent::update([
                'table_unit_status' => 'available'
            ], $id);
        }

        public function setReserve($id) {
            $table = parent::get($id);

            if(isEqual($table->table_unit_status, ['reserved', 'occupied'])) {
                $this->addMessage("Table is not available");
                return false;
            }

            return parent::update([
                'table_unit_status' => 'reserved'
            ], $id);
        }

        public function setOccupied($id) {
            $table = parent::get($id);

            if(isEqual($table->table_unit_status, 'occupied')) {
                $this->addMessage("Table is occupied");
                return false;
            }

            return parent::update([
                'table_unit_status' => 'occupied'
            ], $id);
        }
    }