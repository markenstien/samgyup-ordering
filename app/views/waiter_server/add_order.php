<?php build('content') ?>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-3"><h4 class="card-title">Request Order</h4></div>
                <div class="col-md-9" style="text-align: right;">
                    <?php echo wLinkDefault(_route('waiter-server:show-order', $tableId, [
                        'action' => 'show-order'
                    ]), 'Back', ['class' => 'btn btn-primary btn-sm'])?>
                </div>
            </div>
            
            <small>Table # : <?php echo $table->table_unit_number?></small>
        </div>

        <div class="card-body">
            <?php
                $categories = [];

                for($i = 0 ; $i < 10; $i++) {
                    $categories[] = 'soda';
                }
            ?>
            <?php
                Form::open([
                    'method' => 'post'
                ]);
            ?>

            <?php Flash::show()?>

            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <?php $key = 0?>
                <?php foreach($productsByCategory as $categoryName => $categories) :?>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-<?php echo $key?>-tab" 
                            data-bs-toggle="pill" data-bs-target="#panel<?php echo $key?>-table" 
                            type="button" role="tab" aria-controls="<?php echo $key?>-table" aria-selected="true"><?php echo strtoupper($categoryName) ?></button>
                    </li>
                    <?php $key++?>
                <?php endforeach?>
            </ul>
            <div class="tab-content mt-4" id="pills-tabContent">
                <?php $key = 0?>
                <?php foreach($productsByCategory as $categoryName => $items) :?>
                    <div class="tab-pane fade" id="panel<?php echo $key?>-table" role="tabpanel" 
                        aria-labelledby="pills-<?php echo $key?>-table">
                        <div class="row">
                            <?php foreach($items as $itemKey => $item) :?>
                                <div style="max-width: 340px; border:1px solid #000; padding: 5px; margin:12px">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div style="height: 150px;">
                                                <img src="<?php echo $item->image->full_url ?? ''?>" class="card-img" alt="...">
                                            </div>
                                            <div class="mt-3 mb-3">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <a href="<?php echo _route('request-item:add-item',null, [
                                                                'q' => seal([
                                                                    'item_id' => $item->id,
                                                                    'quantity' => 1,
                                                                    'price' => $item->sell_price,
                                                                    'table_id' => $tableId,
                                                                    'order_id'  => $orderId
                                                                ]),

                                                                'route' =>  _route('order:cashier')
                                                            ])?>" class="btn btn-warning btn-sm">
                                                            Add
                                                        </a>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <a href="<?php echo _route('request-item:add-item',null, [
                                                                'q' => seal([
                                                                    'item_id' => $item->id,
                                                                    'quantity' => 1,
                                                                    'price' => 0,
                                                                    'table_id' => $tableId,
                                                                    'order_id'  => $orderId
                                                                ]),

                                                                'route' =>  _route('order:cashier')
                                                            ])?>" class="btn btn-success btn-sm">
                                                            Free
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $item->name?></h5>
                                                <p class="card-text"><?php echo $item->remarks?></p>
                                                <p class="card-text"><span class="badge bg-primary">
                                                    <?php echo amountHTML($item->sell_price)?></span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach?>
                        </div>
                    </div>
                <?php $key++?>
                <?php endforeach?>
            </div>
            <?php Form::close()?>
        </div>
    </div>
</div>
<?php endbuild()?>
<?php loadTo()?>