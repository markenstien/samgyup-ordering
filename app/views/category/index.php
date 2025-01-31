<?php build('content') ?>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Categories</h4>
            <?php echo wLinkDefault(_route('category:create'), 'Create')?>
            <?php Flash::show()?>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered dataTable">
                    <thead>
                        <th>#</th>
                        <th>Name</th>
                        <th>Category For</th>
                        <th>Status</th>
                        <th>Action</th>
                    </thead>

                    <tbody>
                        <?php foreach ($categories as $key => $row) :?>
                            <tr>
                                <td><?php echo ++$key?></td>
                                <td><?php echo $row->name?></td>
                                <td><?php echo $row->category?></td>
                                <td><?php echo wBadgeWrap($row->active ? 'Active' : 'Not Active', $row->active ? 'success' : 'danger');?> </td>
                                <td>
                                    <?php echo wLinkDefault(_route('category:edit', $row->id),'Edit')?> | 
                                    <?php echo wLinkDefault(_route('category:deactivate', $row->id),'Activate Or Deactivate')?>
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