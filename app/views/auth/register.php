<?php build('content')?>
<?php echo wDivider(50)?>
<div class="container py-5">
  <div class="row">
    <div class="col-md-4">
      <?php Flash::show()?>
      <img src="<?php echo _path_upload_get('images/grill_logo.png');?>" alt="<?php echo COMPANY_NAME?> Logo"
        style="width:150px; margin:0px auto; display:block">
        <h3>Create your account.</h3>
        <?php echo wDivider(15)?>
        <?php  __( $form->start() ); ?>
          <?php __( $form->getCol('firstname' , ['required' => true]) ); ?>
          <?php echo wDivider(15)?>
          <?php __( $form->getCol('lastname' , ['required' => true]) ); ?>
          <?php echo wDivider(15)?>
          <?php __( $form->getCol('email' , ['required' => true]) ); ?>
          <?php echo wDivider(15)?>
          <?php __( $form->getCol('phone' , ['required' => true]) ); ?>
          <?php __( $form->getCol('password') ); ?>
          <?php echo wDivider(15)?>
          <div class="row">
            <div class="col-md-6"><?php __($form->get('submit')) ?></div>
            <div class="col-md-6"><a href="<?php echo _route('auth:login')?>" class="d-block mt-3 text-muted">Already a user? Sign-In Here</a></div>
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