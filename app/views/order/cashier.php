<?php build('content') ?>
<div class="row">
    <div class="col-md-2">
        <div class="card">
            <div class="card-body">
                <h5>Tables</h5>
                <?php foreach($tables as $key => $row) :?>
                    <?php echo wTableContent($row->table_unit_number, $row->id, $row->table_unit_status, 'javascript:void(null)')?>
                <?php endforeach?>
            </div>
        </div>
    </div>

    <div class="col-md-10">
        <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <h5>Orders</h5>
                            <small><?php echo $orderSession?></small>
                        </div>
                        <div class="col-md-9" style="text-align: right;">
                            <a href="<?php echo _route('order:void')?>" class="btn btn-primary btn-danger btn-xs">Void</a> &nbsp;
                            <a href="<?php echo _route('order:add-order')?>" class="btn btn-primary btn-xs">Add Order</a>
                        </div>
                    </div>
                    <?php Flash::show() ?>

                    <!-- ORDER -->
                    <section id="sectionOrder">
                        <?php
                            $totalAmountOrder = 0;
                        ?>

                        <?php if($items) :?>
                            <div>
                                <label for="#">Customer Name</label>
                                <input type="text" name="customer_name" value="Guest" form="formCheckout">
                            </div>
                        <?php endif?>

                        <div class="table-responsive">
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <th style="width: 3%;">#</th>
                                    <th style="width: 3%;">Actions</th>
                                    <th style="width: 25%;">Order</th>
                                    <th  style="width: 15%;">Quantity</th>
                                    <th  style="width:20%;">Price</th>
                                    <th  style="width:20%;">Total</th>
                                </thead>

                                <tbody>
                                    <?php foreach($items as $key => $row) :?>
                                        <?php $totalAmountOrder += $row->sold_price?>
                                        <tr>
                                            <?php 
                                                Form::open([
                                                    'method' => 'post',
                                                    'url' => _route('cart:add', $row->id)
                                                ]);

                                                Form::hidden('item_id', $row->item_id);
                                                Form::hidden('price', $row->price);
                                                
                                            ?>
                                                <td><?php echo ++$key?></td>
                                                <td>
                                                    <a href="<?php echo _route('cart:delete', $row->id)?>" class="btn btn-xs btn-danger">
                                                        <i class="link-icon" data-feather="trash" style="font-size: 10px;"></i>
                                                    </a>

                                                    <button type="submit" role="button" class="btn btn-xs btn-primary">
                                                        <i class="link-icon" data-feather="refresh-ccw"></i>
                                                    </button>
                                                </td>
                                                <td><?php echo $row->name?></td>
                                                <td><input type="text" value="<?php echo $row->quantity?>" name="quantity"></td>
                                                <td><?php echo $row->price?></td>
                                                <td><?php echo $row->sold_price?></td>
                                            <?php Form::close()?>
                                        </tr>
                                    <?php endforeach?>
                                </tbody>
                            </table>
                        </div>
                        <?php if($items) :?>
                            <?php Form::open([
                                'method' => 'post',
                                'url' => _route('cart:checkout'),
                                'id'  => 'formCheckout'
                                ]);
                            ?>
                                <div class="mt-3">
                                    <div class="text-center"><button type="submit" role="button" class="btn btn-success btn-xs">Set Order And Paid</button></div>
                                </div>
                            <?php Form::close()?>
                        <?php endif?>
                        <div class="mt-3"><h3>Total : <?php echo amountHTML($totalAmountOrder)?></h3></div>
                    </section>

                    <?php echo wDivider(50)?>
                    <!-- WAITING ORDERS -->
                    <section id="waitingOrders">
                        <h5>Waiting Orders (<?php echo count($waitingOrders)?>) </h5>
                        <div style="height: 300px; overflow:scroll; padding:35px">
                            <div class="row">
                                <?php foreach($waitingOrders as $key => $row) :?>
                                    <div class="col-md-2" style="cursor:pointer; border: 1px solid #000; padding:5px; margin:5px" 
                                    onclick="location.href='<?php echo _route('order:show', $row->id)?>'">
                                    <small><?php echo $row->customer_name?></small>
                                    <div><span class="badge bg-primary"><?php echo $row->reference?></span></div>
                                </div>
                                <?php endforeach?>
                            </div>
                        </div>
                    </section>
                </div>
                
        </div>
    </div>
</div>
<?php endbuild()?>
<?php loadTo()?>