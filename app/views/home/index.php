<?php build('content')?>
<!-- Start Banner Hero -->
<section id="home" class="parallax-section">
    <!-- <div class="gradient-overlay"></div> -->
    <div class="image-overlay"></div>
    <div></div>
    <div class="container">
      <div class="row">
          <div class="col-md-offset-2 col-md-8 col-sm-12">
              <h1 class="wow fadeInUp" data-wow-delay="0.6s"><?php echo COMPANY_NAME?></h1>
              <p class="wow fadeInUp" data-wow-delay="1.0s"><?php echo COMPANY_LINES['SUB_TITLE']?></p>
              <a href="#feature" class="wow fadeInUp btn btn-default hvr-bounce-to-top smoothScroll" data-wow-delay="1.3s">Discover Now</a>
          </div>
      </div>
    </div>
</section>

<!-- Products -->
<div class="container-xxl py-5" style="display: none;">
	<div class="container">
		<div class="row g-4">
			<?php foreach($products as $key => $row) :?>
				<div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
					<div class="service-item rounded pt-3">
						<div class="p-4">
							<?php if($row->image) :?>
								<img src="<?php echo $row->image->full_url ?? ''?>" alt="<?php echo $row->name?> image" 
									style="width: 150px; display:block; margin-bottom:20px">
							<?php endif?>
							<h5><?php echo $row->name?></h5>
							<p><?php echo crop_string($row->remarks, 50)?></p>
						</div>
					</div>
				</div>
			<?php endforeach?>

			<div class="text-center">
				<a href="<?php echo _route('home:shop')?>" class="btn btn-success btn-sm"><i class="fas fa-check-circle"></i> Order now</a>
			</div>
		</div>
	</div>
</div>
<!-- Products End -->

<!-- Team Start -->
<div class="container-xxl pt-5 pb-3" style="display: none;">
		<div class="container">
			<div class="text-center wow fadeInUp" data-wow-delay="0.1s">
				<h5 class="section-title ff-secondary text-center text-primary fw-normal">Team Members</h5>
				<h1 class="mb-5">Our Staffs</h1>
			</div>
			<div class="row g-4">
				<?php foreach($staffs as $key => $row) :?>
					<div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
						<div class="team-item text-center rounded overflow-hidden">
							<div class="rounded-circle overflow-hidden m-4">
								<img class="img-fluid" src="<?php echo $row->profile?>" alt="">
							</div>
							<h5 class="mb-0"><?php echo $row->firstname . ' ' .$row->lastname?></h5>
							<small>Staffs</small>
							<div class="d-flex justify-content-center mt-3">
								<a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
								<a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
								<a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
							</div>
						</div>
					</div>
				<?php endforeach?>
			</div>
		</div>
	</div>
	<!-- Team End -->

<div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel" style="display: none;">
	<ol class="carousel-indicators">
		<li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
		<li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
		<li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
	</ol>
	<div class="carousel-inner">
		<div class="carousel-item active">
			<div class="container">
				<div class="row p-5">
					<div class="mx-auto col-md-8 col-lg-6 order-lg-last">
						<img class="img-fluid" src="<?php echo _path_upload_get('background_a.jpg')?>" alt="">
					</div>
					<div class="col-lg-6 mb-0 d-flex align-items-center">
						<div class="text-align-left align-self-center">
							<h1 class="h1 text-success"><?php echo COMPANY_NAME?></h1>
							<h3 class="h2">Fast and Excellent Delivery</h3>
							<p>Delivering speed and reliability</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="carousel-item">
			<div class="container">
				<div class="row p-5">
					<div class="mx-auto col-md-8 col-lg-6 order-lg-last">
						<img class="img-fluid" src="<?php echo _path_upload_get('background_b.jpg')?>" alt="">
					</div>
					<div class="col-lg-6 mb-0 d-flex align-items-center">
						<div class="text-align-left">
							<h1 class="h1">Always new and Affordable</h1>
							<h3 class="h2">Our prices make your hearts healthy too.</h3>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="carousel-item">
			<div class="container">
				<div class="row p-5">
					<div class="mx-auto col-md-8 col-lg-6 order-lg-last">
						<img class="img-fluid" src="<?php echo _path_upload_get('background_c.jpg')?>" alt="">
					</div>
					<div class="col-lg-6 mb-0 d-flex align-items-center">
						<div class="text-align-left">
							<h1 class="h1">Expert Pharmacy technicians</h1>
							<h3 class="h2">Your Neighborhood Pharmacy, Your Health Advocate.</h3>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" 
	role="button" data-bs-slide="prev">
		<i class="fas fa-chevron-left"></i>
	</a>
	<a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" 
	role="button" data-bs-slide="next">
		<i class="fas fa-chevron-right"></i>
	</a>
</div>
<?php endbuild()?>

<?php loadTo('tmp/landing')?>