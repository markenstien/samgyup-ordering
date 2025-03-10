<!DOCTYPE html>
<html lang="en">
<head>

	<title><?php echo $page_title ?? COMPANY_NAME?></title>
  	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="">
  	<meta name="description" content="">

	<!-- stylesheets css -->
	<link rel="stylesheet" href="<?php echo _path_tmp('steak-house/css/bootstrap.min.css')?>">

  	<link rel="stylesheet" href="<?php echo _path_tmp('steak-house/css/magnific-popup.css')?>">

	<link rel="stylesheet" href="<?php echo _path_tmp('steak-house/css/animate.min.css')?>">
	<link rel="stylesheet" href="<?php echo _path_tmp('steak-house/css/font-awesome.min.css')?>">

  	<link rel="stylesheet" href="<?php echo _path_tmp('steak-house/css/nivo-lightbox.css')?>">
  	<link rel="stylesheet" href="<?php echo _path_tmp('steak-house/css/nivo_themes/default/default.css')?>">

  	<link rel="stylesheet" href="<?php echo _path_tmp('steak-house/css/hover-min.css')?>">
  	<link rel="stylesheet" href="<?php echo _path_tmp('steak-house/css/flexslider.css')?>">

	<link rel="stylesheet" href="<?php echo _path_tmp('steak-house/css/style.css')?>">

  	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
  	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,600' rel='stylesheet' type='text/css'>

    <style>
        .image-overlay {
            background: url("<?php echo _path_upload_get('images/coveradarken.jpg')?>");
            background-size: cover;
            background-position: center;
            background-blend-mode: multiply;
            position: absolute;
            top: 0;
            width: 100%;
            height: 100vh;
        }
    </style>
</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

<!-- Preloader section -->
<!-- <div class="preloader">
	<div class="sk-spinner sk-spinner-pulse"></div>
</div> -->

<!-- Navigation section -->
<div class="navbar navbar-default navbar-static-top" role="navigation">
  <div class="container">

    <div class="navbar-header">
      <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon icon-bar"></span>
        <span class="icon icon-bar"></span>
        <span class="icon icon-bar"></span>
      </button>
      <a href="#" class="navbar-brand"><?php echo COMPANY_NAME?></a>
    </div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo _route('home:index')?>#home" class="smoothScroll">Home</a></li>
        <li><a href="<?php echo _route('home:shop')?>" class="smoothScroll">Menu</a></li>
        <li><a href="<?php echo _route('home:reservation')?>" class="smoothScroll">Reservation</a></li>
        <li><a href="#contact" class="smoothScroll">Contact</a></li>
        <li><a href="<?php echo _route('auth:login')?>" class="smoothScroll">Login|Register</a></li>
      </ul>
    </div>

  </div>
</div>

<?php echo produce('content') ?>


<!-- Feature section -->
<section id="feature" class="parallax-section">
  <div class="container">
    <div class="row">

      <div class="col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10">
          <div class="wow fadeInUp section-title" data-wow-delay="0.6s">
            <h2>Why Choose Us?</h2>
            <h4>Steak House HTML CSS Template</h4>
          </div>
      </div>

      <div class="clearfix"></div>

      <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
        <div class="feature-thumb">
          <div class="feature-icon">
             <span><i class="fa fa-cutlery"></i></span>
          </div>
          <h3>SPECIAL DISH</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elitquisque tempus ac eget diam et laoreet phasellus.</p>
        </div>
      </div>

      <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.6s">
        <div class="feature-thumb">
          <div class="feature-icon">
            <span><i class="fa fa-coffee"></i></span>
          </div>
          <h3>BLACK COFFEE</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elitquisque tempus ac eget diam et laoreet phasellus.</p>
        </div>
      </div>

      <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.9s">
        <div class="feature-thumb">
          <div class="feature-icon">
            <span><i class="fa fa-bell-o"></i></span>
          </div>
           <h3>DINNER</h3>
           <p>Lorem ipsum dolor sit amet, consectetur adipiscing elitquisque tempus ac eget diam et laoreet phasellus.</p>
        </div>
      </div>

    </div>
  </div>
</section>


<!-- About section -->
<section id="about" class="parallax-section" style="display: none;">
	<div class="container">
		<div class="row">

      <div class="col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10">
          <div class="wow fadeInUp section-title" data-wow-delay="0.3s">
            <h2>Our Story</h2>
            <h4>Your Dining Restaurant since 1989</h4>
          </div>
      </div>

      <div class="clearfix"></div>
      
      <div class="wow fadeInUp col-md-3 col-sm-5" data-wow-delay="0.3s">
        <img src="images/about-img.jpg" class="img-responsive" alt="About">
        <h3>Nunc ullamcorper suscipit neque, ac malesuada purus molestie non.</h3>
      </div>

      <div class="wow fadeInUp col-md-5 col-sm-7" data-wow-delay="0.5s">

        <!-- flexslider -->
        <div class="flexslider">
          <ul class="slides">

            <li>
              <img src="images/slide-img1.jpg" alt="Flexslider">
            </li>
            <li>
              <img src="images/slide-img2.jpg" alt="Flexslider">
            </li>
            <li>
              <img src="images/slide-img3.jpg" alt="Flexslider">
            </li>

          </ul>
        </div>

         <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet.</p>
      </div>

       <div class="wow fadeInUp col-md-4 col-sm-12" data-wow-delay="0.9s">
        	<h2>Fine Dining</h2>
         	<p>Steak House is free HTML website template for everyone. Please inform your friends about Tooplate site.</p>
         	<p>Vestibulum id iaculis nisl. Pellentesque nec tortor sagittis, scelerisque ante at, sollicitudin leo. Vivamus pulvinar a justo vel lobortis.</p>
         	
            <ul>
                <li>Donec fringilla ipsum</li>
                <li>Integer nec urna</li>
                <li>Curabitur porta</li>
         	</ul>
      </div>

		</div>
	</div>
</section>


<!-- Video section -->
<section id="video" class="parallax-section" style="display: none;">
  <div class="overlay"></div>
    <div class="container">
      <div class="row">

          <div class="col-md-offset-2 col-md-8 col-sm-12">
              <a class="popup-youtube" href="https://www.youtube.com/watch?v=CRhCMl7ZI84"><i class="fa fa-play"></i></a>
              <h2 class="wow fadeInUp" data-wow-delay="0.5s">Watch the video</h2>
              <p class="wow fadeInUp" data-wow-delay="0.8s">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet. Dolore magna aliquam erat volutpat.</p>
          </div>

      </div>
    </div>
</section>

<!-- Menu section -->
<section id="menu" class="parallax-section">
  <div class="container">
    <div class="row">

      <div class="col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10">
         <div class="wow fadeInUp section-title" data-wow-delay="0.3s">
            <h2>Food Menu</h2>
            <h4>we have special menus</h4>
        </div>
      </div>

      <div class="col-md-6 col-sm-12">
        <div class="media wow fadeInUp" data-wow-delay="0.6s">
          <div class="media-object pull-left">
            <img src="images/gallery-img1.jpg" class="img-responsive" alt="Food Menu">
            <span class="menu-price">$24</span>
          </div>
          <div class="media-body">
            <h3 class="media-heading">Breakfast</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elitquisque tempus ac eget diam et.</p>
          </div>
        </div>

        <div class="media wow fadeInUp" data-wow-delay="0.9s">
          <div class="media-object pull-left">
            <img src="images/gallery-img2.jpg" class="img-responsive" alt="Food Menu">
            <span class="menu-price">$36</span>
          </div>
          <div class="media-body">
            <h3 class="media-heading">New Pizza</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elitquisque tempus ac eget diam et.</p>
          </div>
        </div>

        <div class="media wow fadeInUp" data-wow-delay="1.2s">
          <div class="media-object pull-left">
            <img src="images/gallery-img3.jpg" class="img-responsive" alt="Food Menu">
            <span class="menu-price">$24</span>
          </div>
          <div class="media-body">
            <h3 class="media-heading">Mushroom</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elitquisque tempus ac eget diam et.</p>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-sm-12">
        <div class="media wow fadeInUp" data-wow-delay="1s">
          <div class="media-object pull-left">
            <img src="images/gallery-img4.jpg" class="img-responsive" alt="Food Menu">
            <span class="menu-price">$32</span>
          </div>
          <div class="media-body">
            <h3 class="media-heading">Seafood</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elitquisque tempus ac eget diam et.</p>
          </div>
        </div>

        <div class="media wow fadeInUp" data-wow-delay="1.3s">
          <div class="media-object pull-left">
            <img src="images/gallery-img5.jpg" class="img-responsive" alt="Food Menu">
            <span class="menu-price">$64</span>
          </div>
          <div class="media-body">
            <h3 class="media-heading">Spicy Beef</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elitquisque tempus ac eget diam et.</p>
          </div>
        </div>

        <div class="media wow fadeInUp" data-wow-delay="1.6s">
          <div class="media-object pull-left">
            <img src="images/gallery-img6.jpg" class="img-responsive" alt="Food Menu">
            <span class="menu-price">$45</span>
          </div>
          <div class="media-body">
            <h3 class="media-heading">Dinner</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elitquisque tempus ac eget diam et.</p>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- Team section -->
<section id="team" class="parallax-section">
  <div class="container">
    <div class="row">

      <div class="col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10">
         <div class="wow fadeInUp section-title" data-wow-delay="0.3s">
            <h2>Meet Our Team</h2>
            <h4>we are food specialists</h4>
        </div>
      </div>

      <div class="clearfix"></div>

      <div class="col-md-3 col-sm-6 wow fadeInUp" data-wow-delay="0.4s">
          <div class="team-thumb">
            <img src="images/chef1.jpg" class="img-responsive" alt="Team">  
                <div class="team-des">
                  <h3>Sandar</h3>
                  <h4>Kitchen Manager</h4>
                    <ul class="social-icon">
                      <li><a href="#" class="fa fa-facebook"></a></li>
                      <li><a href="#" class="fa fa-twitter"></a></li>
                      <li><a href="#" class="fa fa-dribbble"></a></li>
                    </ul>
                </div>
          </div>
      </div>

      <div class="col-md-3 col-sm-6 wow fadeInUp" data-wow-delay="0.6s">
          <div class="team-thumb">
            <img src="images/chef2.jpg" class="img-responsive" alt="Team">  
              <div class="team-des">
                <h3>Candy</h3>
                <h4>Co-Founder</h4>
                  <ul class="social-icon">
                      <li><a href="#" class="fa fa-twitter"></a></li>
                  </ul>
              </div>
          </div>
      </div>

      <div class="col-md-3 col-sm-6 wow fadeInUp" data-wow-delay="0.9s">
          <div class="team-thumb">
            <img src="images/chef3.jpg" class="img-responsive" alt="Team">  
              <div class="team-des">
                <h3>Mama</h3>
                <h4>Senior Chef</h4>
                  <ul class="social-icon">
                      <li><a href="#" class="fa fa-facebook"></a></li>
                      <li><a href="#" class="fa fa-twitter"></a></li>
                  </ul>
              </div>
          </div>
      </div>

      <div class="col-md-3 col-sm-6 wow fadeInUp" data-wow-delay="1.1s">
          <div class="join-team">
            <i class="fa fa-plus"></i>
            <p>Fusce interdum libero id libero volutpat varius convallis at sem.</p>
            <a href="#" class="btn btn-default hvr-bounce-to-bottom">JOIN US</a>
          </div>
      </div>

      <div class="clearfix"></div>

      <div class="wow fadeInUp col-md-6 col-sm-6" data-wow-delay="0.3s">
        <h2>Our Taste</h2>
         <p>Fusce lobortis quis nisl nec facilisis. Donec fringilla ipsum arcu, quis maximus est molestie eget. Nunc ullamcorper suscipit neque, ac malesuada purus molestie non. Phasellus sollicitudin urna sed ultrices dictum.</p>
      </div>

      <div class="wow fadeInUp col-md-6 col-sm-6" data-wow-delay="0.6s">
        <h2>Our Service</h2>
         <p>Maecenas dictum cursus dui, quis mattis eros ultricies sed. Maecenas ligula nulla, dictum eu cursus id, semper in orci. Fusce vel nisi hendrerit justo viverra vehicula in nec nunc. Curabitur blandit fringilla quam.</p>
      </div>

    </div>
  </div>
</section>

<!-- Gallery section -->
<section id="gallery" class="parallax-section">
  <div class="container">
    <div class="row">

      <div class="col-md-12">

       <div class="col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10">
         <div class="wow fadeInUp section-title" data-wow-delay="0.3s">
            <h2>Food Gallery</h2>
            <h4>we have special foods</h4>
        </div>
      </div>
        
          <!-- iso section -->
          <div class="iso-section wow fadeInUp" data-wow-delay="0.6s">

            		<ul class="filter-wrapper clearfix">
                        <li><a href="#" data-filter="*" class="selected opc-main-bg">All</a></li>
                        <li><a href="#" class="opc-main-bg" data-filter=".breakfast">Breakfast</a></li>
                        <li><a href="#" class="opc-main-bg" data-filter=".pizza">Pizza</a></li>
                        <li><a href="#" class="opc-main-bg" data-filter=".lunch">Lunch</a></li>
                        <li><a href="#" class="opc-main-bg" data-filter=".dinner">Dinner</a></li>
                    </ul>

                    <!-- iso box section -->
                    <div class="iso-box-section wow fadeInUp" data-wow-delay="0.9s">
                      <div class="iso-box-wrapper col4-iso-box">

                        <div class="iso-box breakfast pizza lunch col-md-4 col-sm-6">
                          <div class="gallery-thumb">
                            <a href="images/gallery-img1.jpg" data-lightbox-gallery="food-gallery">
                              <img src="images/gallery-img1.jpg" class="fluid-img" alt="Gallery">
                                <div class="gallery-overlay">
                                  <div class="gallery-item">
                                    <i class="fa fa-search"></i>
                                  </div>
                                </div>
                            </a>
                          </div>
                          <h3>Lorem One</h3>
                        </div>

                        <div class="iso-box breakfast lunch dinner col-md-4 col-sm-6">
                          <div class="gallery-thumb">
                            <a href="images/gallery-img2.jpg" data-lightbox-gallery="food-gallery">
                              <img src="images/gallery-img2.jpg" class="fluid-img" alt="Gallery">
                                <div class="gallery-overlay">
                                  <div class="gallery-item">
                                    <i class="fa fa-search"></i>
                                  </div>
                                </div>
                            </a>
                          </div>
                          <h3>Lorem ipsum two</h3>
                        </div>

                        <div class="iso-box dinner col-md-4 col-sm-6">
                          <div class="gallery-thumb">
                            <a href="images/gallery-img3.jpg" data-lightbox-gallery="food-gallery">
                              <img src="images/gallery-img3.jpg" class="fluid-img" alt="Gallery">
                                <div class="gallery-overlay">
                                  <div class="gallery-item">
                                    <i class="fa fa-search"></i>
                                  </div>
                                </div>
                            </a>
                          </div>
                          <h3>Third Lorem ipsum</h3>
                        </div>

                        <div class="iso-box breakfast col-md-4 col-sm-6">
                          <div class="gallery-thumb">
                            <a href="images/gallery-img4.jpg" data-lightbox-gallery="food-gallery">
                              <img src="images/gallery-img4.jpg" class="fluid-img" alt="Gallery">
                                <div class="gallery-overlay">
                                  <div class="gallery-item">
                                    <i class="fa fa-search"></i>
                                  </div>
                                </div>
                            </a>
                          </div>
                          <h3>Lorem ipsum fourth</h3>
                        </div>

                        <div class="iso-box lunch col-md-4 col-sm-6">
                          <div class="gallery-thumb">
                            <a href="images/gallery-img5.jpg" data-lightbox-gallery="food-gallery">
                              <img src="images/gallery-img5.jpg" class="fluid-img" alt="Gallery">
                                <div class="gallery-overlay">
                                  <div class="gallery-item">
                                    <i class="fa fa-search"></i>
                                  </div>
                                </div>
                            </a>
                          </div>
                          <h3>Fifth Lorem ipsum</h3>
                        </div>

                        <div class="iso-box pizza lunch col-md-4 col-sm-6">
                          <div class="gallery-thumb">
                            <a href="images/gallery-img6.jpg" data-lightbox-gallery="food-gallery">
                              <img src="images/gallery-img6.jpg" class="fluid-img" alt="Gallery">
                                <div class="gallery-overlay">
                                  <div class="gallery-item">
                                    <i class="fa fa-search"></i>
                                  </div>
                                </div>
                            </a>
                          </div>
                          <h3>Sixth Lorem ipsum</h3>
                        </div>

                       </div>
                    </div>

          </div>

      </div>

    </div>
  </div>
</section>

<!-- Contact section -->
<section id="contact" class="parallax-section">
  <div class="overlay"></div>
	<div class="container">
		<div class="row">

			<div class="col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10">
            <div class="wow fadeInUp section-title" data-wow-delay="0.3s">
                <h2>Reserve your Table</h2>
                <h4>we are always ready to serve you!</h4>
            </div>
				<div class="contact-form wow fadeInUp" data-wow-delay="0.7s">
					<form id="contact-form" method="post" action="#">
						<input name="name" type="text" class="form-control" placeholder="Your Name" required>
						<input name="email" type="email" class="form-control" placeholder="Your Email" required>
						<textarea name="message" class="form-control" placeholder="Message" rows="5" required></textarea>
						<input type="submit" class="form-control submit" value="Reserve">
					</form>
				</div>
			</div>
			
		</div>
	</div>
</section>

<!-- Footer section -->
<footer>
	<div class="container">
		<div class="row">

              <div class="wow fadeInUp col-md-4 col-sm-4" data-wow-delay="1.3s">
                <h3>About the house</h3>
                <p><?php echo COMPANY_LINES['LINEB'] . ' . ' . COMPANY_LINES['LINEC']?></p>
              </div>  
        
              <div class="wow fadeInUp col-md-4 col-sm-4" data-wow-delay="1.6s">
                <h3>Contact Detail</h3>
                <p><?php echo COMPANY_ADDRESS?></p>
                <p><?php echo COMPANY_TEL?></p>
                <p><?php echo COMPANY_EMAIL?></p>
              </div> 
        
              <div class="wow fadeInUp col-md-4 col-sm-4" data-wow-delay="1.9s">
                <h3>Opening Hours</h3>
                <strong>Monday - Firday</strong>
                <p>11:00 AM - 10:00 PM</p>
                <strong>Saturday - Sunday</strong>
                <p>10:00 AM - 09:00 PM</p>
              </div> 

		</div>
	</div>
</footer>

<!-- Copyright section -->
<section id="copyright">
  <div class="container">
    <div class="row">

      <div class="col-md-8 col-sm-8 col-xs-8">
        <p>Copyright © <?php echo DATE('Y')?> <?php echo COMPANY_NAME?></p>
      </div>  

      <div class="col-md-4 col-sm-4 text-right">
        <a href="#home" class="fa fa-angle-up smoothScroll gototop"></a>
      </div>

    </div>
  </div>
</section>

<!-- javscript js -->
<script src="<?php echo _path_tmp('steak-house/js/jquery.js')?>"></script>
<script src="<?php echo _path_tmp('steak-house/js/bootstrap.min.js')?>"></script>

<script src="<?php echo _path_tmp('steak-house/js/jquery.magnific-popup.min.js')?>"></script>

<script src="<?php echo _path_tmp('steak-house/js/jquery.sticky.js')?>"></script>
<script src="<?php echo _path_tmp('steak-house/js/jquery.backstretch.min.js')?>"></script>

<script src="<?php echo _path_tmp('steak-house/js/isotope.js')?>"></script>
<script src="<?php echo _path_tmp('steak-house/js/imagesloaded.min.js')?>"></script>
<script src="<?php echo _path_tmp('steak-house/js/nivo-lightbox.min.js')?>"></script>

<script src="<?php echo _path_tmp('steak-house/js/jquery.flexslider-min.js')?>"></script>

<script src="<?php echo _path_tmp('steak-house/js/jquery.parallax.js')?>"></script>
<script src="<?php echo _path_tmp('steak-house/js/smoothscroll.js')?>"></script>
<script src="<?php echo _path_tmp('steak-house/js/wow.min.js')?>"></script>

<script src="<?php echo _path_tmp('steak-house/js/custom.js')?>"></script>

</body>
</html>