<?php build('content') ?>
    <div class="container-fluid">
        <div class="card">
            <?php echo wCardHeader(wCardTitle('Attendance'))?>
            <div class="card-body">
                <?php if(isEqual(whoIs('user_access'), 'admin')) :?>
                <div style="text-align: right;" class="mb-3">
                    <a href="<?php echo _route('attendance:approval')?>" class="btn btn-warning btn-sm">Approvals</a>
                    <a href="<?php echo _route('attendance:logged-in')?>" class="btn btn-warning btn-sm">Logged In</a>
                </div>
                <?php endif?>
                <?php if(isEqual(whoIs('user_access'), 'admin')) :?>
                    <div class="mb-5">
                        <?php if(isEqual($timelog['action'],'logout')) : ?>
                            <div class="alert alert-primary">
                                <div class="alert-div">
                                    <p>You are currently logged in : 
                                        <span id="clockIn"><?php echo $timelog['last']->clock_in?></span>
                                    <span id="duration" class="badge badge-warning"></span></p>
                                    <hr>

                                    <?php echo wLinkDefault(_route('attendance:log', whoIs('id')), 'TIME OUT', [
                                        'class' => 'btn btn-primary btn-sm'
                                    ])?>
                                </div>
                            </div>
                        <?php else :?>
                            <hr>
                            <?php echo wLinkDefault(_route('attendance:log', whoIs('id')), 'TIME IN', [
                                'class' => 'btn btn-primary btn-sm'
                            ])?>
                        <?php endif?>
                    </div>
                <?php endif?>


                <?php Flash::show()?>
                <div class="table-responsive">
                    <table class="table table-bordered table-sm dataTable">
                        <thead>
                            <th>#</th>
                            <th>Employee</th>
                            <th>Entry Type</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Total Hours</th>
                            <th>Status</th>
                            <th>Approved By</th>
                            <th>Approval Date</th>
                        </thead>

                        <tbody>
                            <?php foreach($attendanceList as $key => $row) :?>
                                <tr>
                                    <td><?php echo ++$key?></td>
                                    <td><?php echo $row->fullname?></td>
                                    <td><?php echo $row->entry_type?></td>
                                    <td><?php echo $row->time_in?></td>
                                    <td><?php echo $row->time_out?></td>
                                    <td><?php echo minutesToHours(dateDifferenceInMinutes($row->time_in, $row->time_out))?></td>
                                    <td><?php echo $row->status?></td>
                                    <td><?php echo $row->approver_name?></td>
                                    <td><?php echo $row->approval_date?></td>
                                </tr>
                            <?php endforeach?>
                        </tbody>
                    </table>
                </div>
                <div class="row" style="display: none;">
                    <div class="col-md-6">
                        <button class="btn btn-primary btn-sm">Clock In</button>
                        <button class="btn btn-primary btn-sm">Clock Out</button>

                        <?php echo wDivider()?>
                        <div class="col-md-5">
                            <table class="table table-bordered table-sm">
                                <tr>
                                    <td>Clock In Time</td>
                                    <td>12:30 am</td>
                                </tr>

                                <tr>
                                    <td>Schedule</td>
                                    <td>8:00am - 5:00pm</td>
                                </tr>
                            </table>
                            <h4>Hours On Duty : <span>2hrs 5mins</span></h4>
                        </div>
                    </div>
                    <div class="col-md-6"></div>
                </div>
            </div>
        </div>
    </div>
<?php endbuild()?>

<?php build('scripts') ?>
    <script>
        $(document).ready(function(){

            setInterval(function() {
                let differenceInMinutes = dateDifferenceInMinutes($('#clockIn').html());
                let differenceText = minutesToHours(differenceInMinutes);
                $("#duration").html(differenceText);

                //every 1 sec
            }, 1000);
            
        })

    </script>
<?php endbuild()?>
<?php loadTo()?>