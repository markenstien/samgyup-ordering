<?php build('content') ?>
    <div class="contaienr-fluid">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add Table</h4>
                </div>
                <div class="card-body">
                    <?php echo $tableUnitForm->start()?>
                    <?php Form::hidden('id', $tableUnit->id)?>
                        <div class="form-group">
                            <?php
                                echo $tableUnitForm->getRow('table_unit_number');
                            ?>
                        </div>

                        <button class="btn btn-primary btn-sm">Add Table</button>
                    <?php echo $tableUnitForm->end()?>
                </div>
            </div>
        </div>
    </div>
<?php endbuild()?>
<?php loadTo()?>