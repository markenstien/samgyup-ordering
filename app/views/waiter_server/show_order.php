<?php build('content') ?>

<div class="row mb-3">
    <div class="col-md-3">

    </div>

    <div class="col-md-9">
        <div style="text-align: right;"><a href="#" class="btn btn-primary btn-sm">Add Order</a></div>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tables</h3>
            </div>
            <div class="card-body">
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
            <div class="card-header">
                <h3 class="card-title">Request Order</h3>
            </div>
        </div>
    </div>
</div>
<?php endbuild()?>
<?php loadTo()?>