<?php build('content') ?>
<div class="container-fluid">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Stock Management</h4>
                <?php echo wLinkDefault(_route('item:show', $item->id), 'Back to Item')?>
                <?php Flash::show()?>
            </div>

            <div class="card-body">
                <?php echo $stock_form->start()?>
                    <?php csrf()?>
                <?php echo $stock_form->get('item_id')?>

                <div class="row mb-2">
                    <div class="col-md-12">
                        <?php
                            Form::label('Item name');
                            Form::text('', $item->name,  [
                                'class' => 'form-control',
                                'readonly' => true
                            ]);
                        ?>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-6"><?php echo $stock_form->getCol('quantity')?></div>
                    <div class="col-md-6"><?php echo $stock_form->getCol('entry_type')?></div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-6"><?php echo $stock_form->getCol('entry_origin')?></div>
                    <div class="col-md-6"><?php echo $stock_form->getCol('date')?></div>
                </div>

                <div class="form-group mb-5">
                    <?php echo $stock_form->getCol('remarks')?>
                </div>

                <button class="btn btn-primary btn-sm" role="button" type="submit">Save Entry</button>
                <?php echo $stock_form->end()?>
            </div>
        </div>
    </div>
</div>
<?php endbuild()?>
<?php loadTo()?>