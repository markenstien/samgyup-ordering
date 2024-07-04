<?php build('content') ?>
    <div class="contaienr-fluid">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tables</h4>
                <?php echo wLinkDefault(_route('table-unit:create'), 'Add Table')?>
            </div>
            <div class="card-body">
                <?php Flash::show()?>
                <div class="table table-responsive">
                    <table class="table table-bordered table-sm">
                        <thead>
                            <th>#</th>
                            <th>Table Number</th>
                            <th>Status</th>
                            <th>Action</th>
                        </thead>

                        <tbody>
                            <?php foreach($tables as $key => $row) :?>
                                <tr>
                                    <td><?php echo ++$key?></td>
                                    <td><?php echo $row->table_unit_number?></td>
                                    <td><?php echo $row->table_unit_status?></td>
                                    <td>
                                        <a href="<?php echo _route('table-unit:edit', $row->id)?>">Edit</a>
                                    </td>
                                </tr>
                            <?php endforeach?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php endbuild()?>
<?php loadTo()?>