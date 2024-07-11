<?php build('content') ?>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Sales Report</h4>
        </div>
        <?php if(isset($isSummarized)) :?>
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Report Data</h4>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm">
                                <tr>
                                    <td>Title</td>
                                    <td>Sales Report</td>
                                </tr>
                                <tr>
                                    <td>Period</td>
                                    <td><?php echo $request['start_date']?> - <?php echo $request['end_date']?></td>
                                </tr>
                                <tr>
                                    <td>Report Generation Date : </td>
                                    <td><?php echo $reportData['today']?></td>
                                </tr>
                                <tr>
                                    <td>Total Sales(Amount)</td>
                                    <td><?php echo amountHTML($reportData['salesSummary']['totalSalesInAmount'])?></td>
                                </tr>
                                <tr>
                                    <td>Total Sales(Inventory)</td>
                                    <td><?php echo amountHTML($reportData['salesSummary']['totalSalesInQuantity'])?></td>
                                </tr>

                                <tr>
                                    <td colspan="2" class="text-center">Sales - In Quantity</td>
                                </tr>

                                <?php foreach($reportData['highestSellingInQuantity'] as $key => $row) :?>
                                    <tr>
                                        <td>
                                            <?php if($key < 10) :?>
                                                <span class="badge bg-warning">Top 10</span>
                                            <?php endif?>
                                            &nbsp; <?php echo $row->item_name?>
                                        </td>
                                        <td><?php echo $row->total_quantity?></td>
                                    </tr>
                                <?php endforeach?>

                                <tr>
                                    <td colspan="2" class="text-center">Sales - Amount</td>
                                </tr>

                                <?php foreach($reportData['highestSellingInAmount'] as $key => $row) :?>
                                    <tr>
                                        <td>
                                            <?php if($key < 10) :?>
                                                <span class="badge bg-warning">Top 10</span>
                                            <?php endif?>
                                            &nbsp;
                                            <?php echo $row->item_name?>
                                        </td>
                                        <td><?php echo amountHTML($row->total_amount)?></td>
                                    </tr>
                                <?php endforeach?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">

            </div>
        </div>
        <?php else:?>

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
        <?php endif?>
    </div>
<?php endbuild()?>
<?php loadTo()?>