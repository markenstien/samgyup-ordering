<?php build('content') ?>
<div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tables</h3>
            </div>
            <div class="card-body">
                <?php echo wTableContent($table->table_unit_number, $table->id, 'selected', _route('waiter-server:show-order', $orderId, [
                    'action'      => 'show-order'
                ]))?>
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
                <div class="row">
                    <div class="col-md-3">
                        <h3 class="card-title">Request Order: #<?php echo $table->table_unit_number?></h3>
                    </div>
                    <div class="col-md-9">
                        <div style="text-align: right;">
                            <a href="<?php echo _route('order:complete', $orderId)?>" class="btn btn-primary btn-sm">Complete Order</a>

                            <a href="<?php echo _route('order:show', $orderId)?>" class="btn btn-primary btn-sm">View Order</a>

                            <a href="<?php echo _route('waiter-server:add-order', $tableId, [
                                'orderId' => $order->id
                            ])?>" class="btn btn-primary btn-sm">Add Request</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <?php Flash::show() ?>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <th>#</th>
                            <th>Item</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Request Status</th>
                            <th>Payment Status</th>
                            <th>Action</th>
                        </thead>

                        <tbody>
                            <?php foreach($requestItems as $key => $row) :?>
                                <tr>
                                    <td><?php echo ++$key?></td>
                                    <td><?php echo $row->item_name?></td>
                                    <td><?php echo $row->price < 1 ?  '<span class="badge bg-warning">FREE</span>' : amountHTML($row->price)?></td>
                                    <td><?php echo $row->quantity?></td>
                                    <td><?php echo $row->request_status?></td>
                                    <td><?php echo $row->payment_status ?></td>
                                    <td>
                                        <a href="<?php echo _route('request-item:remove-one', $row->id, [
                                            'tableId' => $tableId
                                        ])?>">Remove</a>  | 
                                        <!-- <a href="#">Update</a> |  -->
                                        <a href="<?php echo _route('request-item:complete-one', $row->id, [
                                            'tableId' => $tableId,
                                            'orderId' => $orderId
                                        ])?>">Complete</a>
                                    </td>
                                </tr>
                            <?php endforeach?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endbuild()?>
<?php loadTo()?>