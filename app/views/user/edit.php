<?php build('content') ?>
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Add Staff</h4>
			<?php echo wLinkDefault(_route('user:index'))?>
			<?php Flash::show()?>
		</div>

		<div class="card-body">
			<?php echo $user_form->start() ?>
			<?php echo $user_form->get('id')?>
				<div class="row">
					<div class="col-md-6">
						<section>
							<h4 class="mb-2">User Information</h4>
							<?php echo $user_form->getRow('profile')?>
							<?php echo $user_form->getRow('firstname')?>
							<?php echo $user_form->getRow('lastname')?>
							<?php echo $user_form->getRow('gender')?>
							<?php echo $user_form->getRow('phone')?>
							<?php echo $user_form->getRow('email')?>
							<?php echo $user_form->getRow('password')?>
						</section>

						<?php echo wDivider()?>

						<section>
							<h4 class="mb-2">User Type</h4>
							<?php echo $user_form->getRow('user_access')?>
						</section>

						<?php echo wDivider()?>

						<button class="btn btn-sm btn-success" type="submit" role="button">Create User</button>
					</div>
					<!-- if user type is selected -->
					<div class="col-md-6" id="staffWorkDetails">
						<section>
							<h4 class="mb-2">Work Details</h4>
							<?php echo $user_form->getRow('salary_per_hour')?>
							<?php echo wDivider()?>
							<h5>Set Schedule</h5>
							<div class="table-responsive">
								<table class="table table-sm table-bordered">
									<thead>
										<th>Day</th>
										<th>In</th>
										<th>Out</th>
										<th>Rest Day</th>
									</thead>

									<tbody>
										<?php foreach($daysoftheweek as $key => $day) :?>
											<tr>
												<td>
													<?php
														Form::hidden("day[{$key}][day]" , $day);
														echo $day;
													?>
												</td>
												<td>
													<?php
														Form::time("day[{$key}][time_in]" , '08:00');
													?>
												</td>
												<td>
													<?php
														Form::time("day[{$key}][time_out]" , '17:00');
													?>
												</td>
												<td>
													<label for="<?php echo "r-off{$key}"?>">
														<?php Form::radio("day[{$key}][rd]" , 1 , ['id' => "r-off{$key}"]) ?>
														Rest Day
													</label>
													<label for="<?php echo "w-off{$key}"?>">
														<?php Form::radio("day[{$key}][rd]" , 0 , ['id' => "w-off{$key}" , 'checked' => '']) ?>
														Work Day
													</label>
												</td>
											</tr>
										<?php endforeach?>
									</tbody>
								</table>
							</div>
							
						</section>
					</div>
				</div>
			<?php echo $user_form->end()?>
		</div>
	</div>
<?php endbuild()?>
<?php loadTo()?>