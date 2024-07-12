<?php build('content')?>
<?php Flash::show()?>
<div class="row">
	<div class="col-md-5">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Appointment Details</h4>
				<p><?php echo wLinkDefault(_route('appointment:index'), 'Back to Appointments')?></p>
			</div>
			<div class="card-body">
			<?php echo $form->start() ?>
				<div class="row"><div class="form-group mb-4"><?php Form::text('', $appointment->reference,  ['class' => 'form-control', 'readonly' => true])?></div></div>
				<div class="form-group">
					<?php echo $form->getRow('guest_name')?>
				</div>

				<div class="form-group">
					<?php echo $form->getRow('guest_phone')?>
				</div>

				<div class="form-group">
					<?php echo $form->getRow('guest_email', [
						'attributes' => [
							'readonly' => true
						]
					])?>
				</div>

				<div class="form-group">
					<?php echo $form->getRow('date')?>
				</div>

				<div class="form-group">
					<?php echo $form->getRow('start_time')?>
				</div>

				<div class="form-group">
					<?php echo $form->getRow('notes')?>
				</div>

				<?php if(isEqual($appointment->status, 'pending')) :?>
				<div class="form-group">
					<button type="submit" class="btn btn-primary btn-sm">Reserve</button>
				</div>
				<?php else :?>
					<p><span class="badge bg-danger">Update not allowed</span> : Reservation Status : <?php echo $appointment->status?></p>
				<?php endif?>
			<?php echo $form->end() ?>
			</div>
		</div>	
	</div>
</div>
<?php endbuild()?>

<?php build('styles')?>
	<style type="text/css">
		div.bordered-form-element
		{
			border: 1px solid #000;
			margin-bottom: 2px;
			padding: 5px;
		}
	</style>
<?php endbuild()?>
<?php loadTo()?>