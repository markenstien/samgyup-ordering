<?php build('content') ?>
<div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5>Assign Table</h5>
                <?php foreach($tables as $key => $row) :?>
                    <?php echo wTableContent($row->table_unit_number, $row->id, $row->table_unit_status, _route('order:show', $order->id, [
                        'tableNumber' => $row->id,
                        'action'      => 'assign-table'
                    ]))?>
                <?php endforeach?>
            </div>
        </div>
    </div>

    <div class="col-md-9">
        <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <h5>ORDER DETAILS : <?php echo $order->customer_name?></h5>
                            <small><?php echo $order->reference?></small> 
                        </div>

                        <div class="col-md-9" style="text-align: right;">
                            <a href="<?php echo _route('order:void-order', $order->id)?>" class="btn btn-primary btn-danger form-verify">Cancel</a> &nbsp;
                            <a href="<?php echo _route('order:complete', $order->id)?>" class="btn btn-primary btn-success form-verify">Complete</a> &nbsp;
                            <a href="<?php echo _route('receipt:order', $order->id)?>" class="btn btn-primary btn-info"><i data-feather="info"></i></a> &nbsp;
                            
                        </div>
                    </div>
                    <?php Flash::show() ?>
                    <?php
                        $totalAmountOrder = 0;
                    ?>

                    <?php if($order->is_paid) :?>
                        <div class="text-center alert alert-success">
                            <h4>Paid Order</h4>
                        </div>
                    <?php else :?>
                        <div class="text-center alert alert-danger">
                            <h4>Un Paid</h4>
                        </div>
                    <?php endif?>

                    <?php if(isEqual($order->order_status, 'completed')) :?>
                        <div class="text-center alert alert-success">
                            <h4>Order Complete</h4>
                        </div>
                    <?php else :?>
                        <div class="text-center alert alert-danger">
                            <h4><?php echo strtoupper($order->order_status) ?></h4>
                        </div>
                    <?php endif?>

                    <h4>Particulars</h4>
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered">
                            <thead>
                                <th style="width: 3%;">#</th>
                                <th style="width: 25%;">Order</th>
                                <th  style="width: 15%;">Quantity</th>
                                <th  style="width:20%;">Price</th>
                                <th  style="width:20%;">Total</th>
                            </thead>

                            <tbody>
                                <?php foreach($items as $key => $row) :?>
                                    <?php $totalAmountOrder += $row->sold_price?>
                                    <tr>
                                        <td><?php echo ++$key?></td>
                                        <td><?php echo $row->name?></td>
                                        <td><?php echo $row->quantity?></td>
                                        <td><?php echo $row->price?></td>
                                        <td><?php echo $row->sold_price?></td>
                                    </tr>
                                <?php endforeach?>
                            </tbody>
                        </table>
                    </div>

                    <h4 class="mb-3 mt-3">Total Amount : <?php echo amountHTML($totalAmountOrder)?></h4>

                    <?php if($tableUnit) :?>
                        <div class="mt-3">
                            <h3>Assigned On Table</h3>
                            <?php echo wTableContent($tableUnit->table_unit_number, $tableUnit->id, $tableUnit->table_unit_status, 'javascript:void(null)')?>
                        </div>

                    <?php else :?>
                        <div class="mt-3">
                            <h3>Waiting...</h3>
                        </div>
                    <?php endif?>
                </div>
        </div>
    </div>
</div>
<?php endbuild()?>
<?php loadTo()?>