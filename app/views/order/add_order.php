<?php build('content') ?>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-3"><h4 class="card-title">Add Order</h4></div>
                <div class="col-md-9" style="text-align: right;">
                    <?php echo wLinkDefault(_route('order:cashier'), 'Back', ['class' => 'btn btn-primary btn-sm'])?>
                </div>
            </div>
            
            <small><?php echo $orderSession?></small>
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
                    <?php $isDefaultShown = $categoryName == 'all';?>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link <?php echo $isDefaultShown ? 'active': ''?>" id="pills-<?php echo $key?>-tab" 
                            data-bs-toggle="pill" data-bs-target="#panel<?php echo $key?>-table" 
                            type="button" role="tab" aria-controls="<?php echo $key?>-table" aria-selected="<?php echo $isDefaultShown ? 'true': 'false'?>"><?php echo strtoupper($categoryName) ?></button>
                    </li>
                    <?php $key++?>
                <?php endforeach?>
            </ul>
            <div class="tab-content mt-4" id="pills-tabContent">
                <?php $key = 0?>
                <?php foreach($productsByCategory as $categoryName => $items) :?>
                    <?php $isDefaultShown = $categoryName == 'all';?>
                    <div class="tab-pane fade <?php echo $isDefaultShown ? 'active show': ''?>" id="panel<?php echo $key?>-table" role="tabpanel" 
                        aria-labelledby="pills-<?php echo $key?>-table">
                        <div class="row">
                            <?php foreach($items as $itemKey => $item) :?>
                                <div style="max-width: 340px; border:1px solid #000; padding: 5px">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="<?php echo $item->image->full_url ?? ''?>" class="card-img" alt="...">
                                            <div class="mt-3 mb-3">
                                                <a href="<?php echo _route('cart:add-to-cart-get',null, [
                                                    'q' => seal([
                                                        'item_id' => $item->id,
                                                        'quantity' => 1,
                                                        'price' => $item->sell_price
                                                    ]),

                                                    'route' =>  _route('order:cashier')
                                                ])?>" class="btn btn-primary btn-sm">Add</a>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $item->name?></h5>
                                                <p class="card-text"><?php echo $item->remarks?></p>
                                                <p class="card-text"><span class="badge bg-primary"><?php echo amountHTML($item->sell_price)?></span></p>
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