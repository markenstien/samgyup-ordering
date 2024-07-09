<?php build('content')?>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Stock Management</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <th>#</th>
                        <th>Name</th>
                        <th><span class="badge bg-warning" title="Minimum Stocks">-</span></th>
                        <th><span class="badge bg-primary" title="Minimum Stocks">+</span></th>
                        <th>Inventory</th>
                        <th>Stock Level</th>
                        <th>Logs</th>
                        <th>Manage</th>
                    </thead>

                    <tbody>
                        <?php foreach ($stocks as $key => $row) :?>
                            <tr>
                                <td><?php echo ++$key?></td>
                                <td><?php echo $row->name?></td>
                                <td><?php echo $row->min_stock?></td>
                                <td><?php echo $row->max_stock?></td>
                                <td><?php echo $row->total_stock?></td>
                                <td>
                                    <?php
                                        if(isEqual($row->stock_level,'LOW STOCK LEVEL')) {
                                            echo wBadgeWrap('LOW', 'danger');
                                        } else if(isEqual($row->stock_level,'HIGH STOCK LEVEL')) {
                                            echo wBadgeWrap('OVER', 'warning');
                                        } else {
                                            echo wBadgeWrap('NORMAL', 'success');
                                        }
                                    ?>
                                </td>
                                <td>
                                    <a href="<?php echo _route('stock:log',null,[
                                        'item_id' => $row->id
                                    ])?>" class="txt-default">
                                        <i data-feather="list"></i>
                                    </a>
                                </td>

                                <td>
                                    <a href="<?php echo _route('stock:create',null,[
                                        'csrfToken' => csrfGet(),
                                        'item_id'   => $row->id
                                    ])?>"><i data-feather="settings"></i></a>
                                </td>
                            </tr>
                        <?php endforeach?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php endbuild()?>
<?php loadTo()?>