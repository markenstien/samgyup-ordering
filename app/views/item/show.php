<?php build('content') ?>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Item Preview</h4>
            <?php Flash::show()?>
            <?php echo wLinkDefault(_route('item:edit', $item->id))?>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <section>
                        <h4>Details</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <td>Name : </td>
                                    <td><?php echo $item->name?></td>
                                </tr>
                                <tr>
                                    <td>Brand : </td>
                                    <td><?php echo $item->brand_name?></td>
                                </tr>
                                <tr>
                                    <td>SKU : </td>
                                    <td><?php echo $item->sku?></td>
                                </tr>
                                <tr>
                                    <td>Category : </td>
                                    <td><?php echo empty($item->category_name) ? 'N/A' : $item->category_name?></td>
                                </tr>
                                <tr>
                                    <td>Cost Price : </td>
                                    <td><?php echo amountHTML($item->cost_price)?></td>
                                </tr>
                                <tr>
                                    <td>Sell Price : </td>
                                    <td><?php echo amountHTML($item->sell_price)?></td>
                                </tr>
                                <tr>
                                    <td><?php echo $item_form->label('remarks')?> : </td>
                                    <td><?php echo $item->remarks?></td>
                                </tr>
                            </table>
                        </div>
                    </section>
                </div>
                <div class="col-md-6">
                    <h4>Images</h4>
                    <?php __($attachmentForm->start())?>    
                        <?php __($attachmentForm->getRow('file'))?>                                             
                        <?php __($attachmentForm->get('global_id'))?> 
                        <?php __($attachmentForm->get('global_key'))?> 
                        <input type="submit" value="Add Image" class="btn btn-primary btn-sm">
                    <?php __($attachmentForm->end())?>
                    <hr>

                    <?php if(!empty($images)) :?>
                        <div class="row">
                            <?php foreach($images as $key => $row) :?>
                                <div class="col-md-6">
                                    <div>
                                        <img src="<?php echo $row->full_url?>"
                                            style="width:100%">
                                        <div><label for="#"><?php echo $row->label?></label></div>
                                        <a href="<?php echo _route('attachment:delete', $row->id)?>">Delete</a>
                                    </div>
                                </div>
                            <?php endforeach?>
                        </div>
                    <?php endif?>
                </div>
            </div>

            <div class="mt-2" style="border:1px solid #000; padding:10px">
                <section>
                    <h4>Stocks : <?php echo $item->total_stock?></h5></h4>
                    <div><?php 
                        echo wLinkDefault(_route('stock:create', [
                                'item_id' => $item->id
                        ]), 'Add Stocks'); 
                    ?></div>
                    <label for="#">Recent Movement</label>
                    <table class="table">
                        <tr>
                            <td>Origin</td>
                            <td>Description</td>
                            <td>Quantity</td>
                        </tr>
                        <tbody>
                            <?php foreach($stocks as $key => $row):?>
                                <tr>
                                    <td><?php echo $row->entry_origin?></td>
                                    <td><?php echo $row->remarks?></td>
                                    <td><?php echo $row->quantity?></td>
                                </tr>
                            <?php endforeach?>
                        </tbody>
                    </table>
                </section>
            </div>
        </div>
    </div>
<?php endbuild() ?>
<?php loadTo()?>