<?php build('content')?>
<div class="container py-5">
  <div class="row">
    <div class="col-md-4">
        <?php Flash::show()?>
          <h3 class="mb-4">Welcome back! Log in to your account.</h3>
          <img src="<?php echo _path_upload_get('images/grill_logo.png');?>" alt="<?php echo COMPANY_NAME?> Logo"
            style="width:150px; margin:0px auto; display:block">
          <?php  __( $form->start() ); ?>
            <div class="mb-3">
              <?php __( $form->getCol('email' , ['required' => true]) ); ?>
            </div>
            <div class="mb-3">
              <?php __( $form->getCol('password') ); ?>
            </div>
            <div style="margin-top: 15px;">
              <?php __($form->get('submit')) ?>
            </div>
            <?php echo wDivider()?>
            <div class="row">
              <div class="col-md-6">
                <a href="<?php echo _route('auth:register')?>" class="d-block mt-3 text-muted">Not a user? Sign up</a>
              </div>
              <div class="col-md-6" style="text-align:right;">
                <a href="<?php echo _route('forget-pw:index')?>" class="d-block mt-3 text-muted">Forgot Password?</a>
              </div>
            </div>
          <?php __( $form->end() )?>
    </div>
    <div class="col-md-8">
        <div class="text-right">
            <h3>Welcome to <?php echo COMPANY_NAME?></h3>
            <img src="<?php echo _path_upload_get('images/imageb.jpg');?>" style="width: 100%;">
            <p style="margin-top: 15px;"><?php echo COMPANY_LINES['WELCOME']?></p>
        </div>
    </div>
  </div>
</div>

<?php echo wDivider(100)?>
<?php endbuild()?>
<?php loadTo('tmp/landing')?>


