<?php build('content') ?>
    <div class="contaienr-fluid">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tables</h4>
                <?php 
                    if(isEqual(whoIs('user_type'), 'admin')) {
                        echo wLinkDefault(_route('table-unit:create'), 'Add Table');
                    }
                ?>
            </div>
            <div class="card-body">
                <?php Flash::show()?>
                <div class="table table-responsive">
                    <table class="table table-bordered table-sm">
                        <thead>
                            <th>#</th>
                            <th>Table Number</th>
                            <th>Status</th>
                            <?php if(isEqual(whoIs('user_type'), 'admin'))  :?>
                            <th>Edit</th>
                            <?php endif?>
                            <th>Action</th>
                        </thead>

                        <tbody>
                            <?php foreach($tables as $key => $row) :?>
                                <tr>
                                    <td><?php echo ++$key?></td>
                                    <td><?php echo $row->table_unit_number?></td>
                                    <td><?php echo $row->table_unit_status?></td>
                                    <?php if(isEqual(whoIs('user_type'), 'admin'))  :?>
                                    <td><a href="<?php echo _route('table-unit:edit', $row->id)?>">Edit</a></td>
                                    <?php endif?>
                                    
                                    <td>
                                        <a href="<?php echo _route('table-unit:set-available', $row->id)?>" class="btn btn-success btn-sm">Available</a> | 
                                        <a href="<?php echo _route('table-unit:set-occupied', $row->id)?>" class="btn btn-primary btn-sm">Occupied</a> | 
                                        <a href="<?php echo _route('table-unit:set-reserved', $row->id)?>" class="btn btn-warning btn-sm">Reserved</a>
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