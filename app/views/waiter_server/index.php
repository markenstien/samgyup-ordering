<?php build('content') ?>
<div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5>Tables</h5>
                <?php foreach($tables as $key => $row) :?>
                    <?php echo wTableContent($row->table_number, $row->table_unit_id, $row->table_unit_status, _route('waiter-server:show-order', $row->id, [
                        'action'      => 'show-order'
                    ]))?>
                <?php endforeach?>
            </div>
        </div>
    </div>

    <div class="col-md-9">
        <div class="card">
            
        </div>
    </div>
</div>
<?php endbuild()?>
<?php loadTo()?>