<?php build('content') ?>
<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Set new Password</h1>
    </div>
</div>

<div class="container" style="padding: 50px 0px;">
	<div class="col-sm-12 col-md-5 mx-auto">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Forget password</h4>
				<?php echo wLinkDefault(_route('auth:login'), 'Cancel Forget Password')?>
			</div>

			<div class="card-body">
				<?php
					Flash::show();
					
					Form::open([
						'method' => 'post'
					]);

					Form::hidden('userId', $userId);
				?>
					<div class="form-group">
						<?php
							Form::label('New Password');
							Form::password('new_password','', [
								'class' => 'form-control'
							]);
						?>
					</div>

					<div class="form-group mt-3">
						<?php
							Form::label('Confirm Password');
							Form::password('confirm_password','', [
								'class' => 'form-control'
							]);
						?>
					</div>

					<div class="form-group mt-3">
						<?php
							Form::submit('btn_forget_password');
						?>
					</div>
				<?php Form::close()?>
			</div>
		</div>
	</div>
</div>
<?php endbuild()?>
<?php loadTo('tmp/landing')?>