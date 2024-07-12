<?php build('content') ?>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Stocks Report</h4>
        </div>
        <?php if(!isset($reportData)) :?>
        <div class="card-body">
            <div class="col-md-5">
                <?php
                    Form::open([
                        'method' => 'get',
                        'action' => ''
                    ])
                ?>
                    <?php echo $_formCommon->getRow('start_date')?>
                    <?php echo $_formCommon->getRow('end_date')?>
                    <?php echo $_formCommon->get('submit')?>
                <?php Form::close()?>
            </div>
        </div>

        <?php else :?>
            <div class="card">
                <div class="card-header">
                    <?php echo wLinkDefault(_route('report:stocks'), 'Complete')?>
                </div>
            </div>
        <?php endif?>
        
        <?php if(isset($reportData)) :?>
            <?php extract($reportData) ?>
        <div class="card-body">
            <div class="col-md-7">
                <div class="report_container">    
                    <section class="header">
                        <div class="text-center">
                            <h4>STOCK REPORT</h4>
                            <div><small>AS of <?php echo $dateNow?></small></div>
                        </div>
                    </section>

                    <section class="particular">
                        <h4>Stocks</h4>
                        <?php $totalStock = 0?>
                        <table class="table table-bordered">
                            <thead>
                                <td>ITEM + SKU</td>
                                <td>MIN</td>
                                <td>MAX</td>
                                <td><span title="Stock In Total">IN</span></td>
                                <td><span title="Stock Out Total">OUT</span></td>
                                <td>On Hand</td>
                                <td>LEVEL</td>
                            </thead>

                            <tbody>
                                <?php foreach($stocks as $key => $row) :?>
                                    <?php $totalStock += $row->total_stock?>
                                    <tr>
                                        <td><?php echo "{$row->name} ({$row->sku})"?></td>
                                        <td><?php echo $row->min_stock?></td>
                                        <td><?php echo $row->max_stock?></td>
                                        <td><?php echo $row->stock_in_total?></td>
                                        <td><?php echo $row->stock_out_total?></td>
                                        <td><?php echo $row->total_stock?></td>
                                        <td><?php echo $row->stock_level?></td>
                                    </tr>
                                <?php endforeach?>
                                <tr>
                                    <td colspan="3">Total</td>
                                    <td><?php echo $totalStock?></td>
                                </tr>
                            </tbody>
                        </table>
                    </section>
                </div>
            </div>

        </div>

        <?php endif?>
    </div>
<?php endbuild()?>
<?php loadTo()?>