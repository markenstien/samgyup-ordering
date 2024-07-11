<?php build('content') ?>

<!-- Start Content -->
 <?php echo wDivider(50)?>

<div class="container py-5">
    <div class="col-md-6 mx-auto">
        <h3>Reserve a table</h3>
        <?php Flash::show() ?>
        <?php echo $appointmentForm->start() ?>
            <div class="form-group">
                <?php echo $appointmentForm->getRow('guest_name')?>
            </div>

            <div class="form-group">
                <?php echo $appointmentForm->getRow('guest_phone')?>
            </div>

            <div class="form-group">
                <?php echo $appointmentForm->getRow('guest_email')?>
            </div>

            <div class="form-group">
                <?php echo $appointmentForm->getRow('date')?>
            </div>

            <div class="form-group">
                <?php echo $appointmentForm->getRow('start_time')?>
            </div>

            <div class="form-group">
                <?php echo $appointmentForm->getRow('notes')?>
            </div>

            <?php if(whoIs()) :?>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-sm">Reserve</button>
            </div>

            <?php else:?>
                <p>You must have an account to reserve</p>
            <?php endif?>
        <?php echo $appointmentForm->end() ?>
    </div>
</div>
<?php echo wDivider(100)?>
<?php endbuild()?>
<?php loadTo('tmp/landing')?>