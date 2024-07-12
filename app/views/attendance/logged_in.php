<?php build('content') ?>
    <div class="container-fluid">
        <div class="card">
            <?php echo wCardHeader(wCardTitle('On Duty'))?>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                            <th>#</th>
                            <th>Employee</th>
                            <th>Time In</th>
                            <th>Duration</th>
                            <th>Action</th>
                        </thead>

                        <tbody>
                            <?php foreach($loggedUsers as $key => $row) :?>
                                <?php
                                    $rowId = random_letter(12);
                                ?>
                                <tr>
                                    <td><?php echo ++$key?></td>
                                    <td><?php echo $row->fullname?></td>
                                    <td><span class="clockIn" data-target="<?php echo $rowId?>"><?php echo $row->clock_in?></span></td>
                                    <td><span class="duration" id="<?php echo $rowId?>"></span></td>
                                    <td><?php echo wLinkDefault(_route('attendance:log', $row->user_id), 'Clock Out')?></td>
                                </tr>
                            <?php endforeach?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php endbuild()?>

<?php build('scripts') ?>
    <script defer>
        $(document).ready(function(){
            setInterval(function() {
                let clockInRows = $('.clockIn');

                $('.clockIn').each(function(index,element){
                    let target = $(element).data('target');
                    let clockInValue = $(element).html();
                    let differenceInMinutes = dateDifferenceInMinutes(clockInValue);
                    let differenceText = minutesToHours(differenceInMinutes);

                    $(`#${target}`).html(differenceText);
                });

                
                //every 1 sec
            }, 1000);
        })

    </script>
<?php endbuild()?>

<?php loadTo()?>