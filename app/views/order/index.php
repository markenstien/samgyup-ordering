<?php build('content') ?>
    <?php
        $flagCustomer = whoIs('user_type') == 'customer';
    ?>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Orders</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered dataTable">
                    <thead>
                        <th>#</th>
                        <th>Reference</th>
                        <th>Customer</th>
                        <th>Date</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Payment</th>
                        <th>Action</th>
                    </thead>

                    <tbody>
                        <?php foreach($orders as $key => $row) :?>
                            <tr>
                                <td><?php echo ++$key?></td>
                                <td><?php echo $row->reference?></td>
                                <td><?php echo wLinkDefault(_route('user:show', $row->customer_id), $row->customer_name)?></td>
                                <td><?php echo $row->created_at?></td>
                                <td><?php echo amountHTML($row->net_amount)?></td>
                                <td><?php echo empty($row->order_status) ? 'on-going' : $row->order_status?></td>
                                <td>
                                    <?php
                                        $color = 'danger';
                                        $text  = 'Unpaid';
                                        if($row->is_paid) {
                                            $color = 'success';
                                            $text = 'Paid';
                                        }

                                        echo wBadgeWrap($text, $color);
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        echo wLinkDefault(_route('order:show', $row->id), 'Show');
                                    ?>
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