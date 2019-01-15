<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root.'/Framework/Tools.php';

class Layout_View
{
    private $data;
    
    public function __construct($data)
    {
        $this->data = $data;
    }
    
    /**
     * function printHTMLPage
     *
     * Prints the content of the whole website
     *
     * @param head 		(string) Is the head of the HTML structure
     * @param header 	(string) Is the menu and logo section
     * @param bodyType	(string) Is for CSS purposes
     * @param body		(string) Content of the website
     *
     */
    
    public function printHTMLPage($section)
    {
        ?>
    <!DOCTYPE html>
    <html class="wide wow-animation" lang="es">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>
            <?php echo $this->data['seo']['title']; ?>  Adriana Alvarado
        </title>
        <meta name="format-detection" content="telephone=no">
        <meta name="description" content="<?php echo $this->data['seo']['description']; ?>">
        <meta name="keywords" content="<?php echo $this->data['seo']['keywords']; ?>">
        <meta name="language" content="<?php echo $this->data['info']['lang']; ?>">
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <?php 
            echo self::getCommonStyle();
        ?>
    </head>

    <body id="body" class="animsition">
        <!-- Page -->
        <div id="body-content">
            <?php 
                echo self::getCommonHeader();
            ?>
            <!--========================================================
                                  CONTENT
            =========================================================-->
           <main>
                <?php
                    switch ($section) 
                    {
                        case 'index':
                            echo self::getIndexSlider();
                            echo self::getIndexWelcome();
                            echo self::getIndexProyectos();
                        break;
        				    
                        case 'about':
                            echo self::getAboutES();
                            echo self::getSocial();
                            
                        break;
                        
                        case 'portafolio':
                            echo self::getSlider();
                            
                            
                        break;
                            
                        
                        default:
        				break;
    			    }
                ?>
            </main>
            <?php
                echo self::getFooter(); 
            ?>
        </div>
        <?php
			echo self::getCommonScripts();
			echo self::getGoogleAnalytics()
		?>
        <!-- <div id="getSize"><p>W: <span></span></p><p>H: <span></span></p></div> -->
    </body>

    </html>
    <?php
    }
    
    public function getCommonStyle()
    {
        ob_start();
        ?>
            <!-- Stylesheets-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">

	<link rel="stylesheet" href="assets/vendor/rd-navbar/css/rd-navbar.css">
	<link rel="stylesheet" href="assets/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/lightgallery/css/lightgallery.min.css">
	<link rel="stylesheet" href="assets/vendor/owl-carousel/css/owl.carousel.min.css">
	<link rel="stylesheet" href="assets/vendor/owl-carousel/css/owl.theme.default.min.css">
	<link rel="stylesheet" href="assets/vendor/ytplayer/css/jquery.mb.YTPlayer.min.css">
	<link rel="stylesheet" href="assets/vendor/animate.min.css">

	<link rel="stylesheet" href="/assets/css/helper.css">
	<link rel="stylesheet" href="/assets/css/theme.css"><link rel="stylesheet" href="/assets/css/dark-style.css">
        <?php
        $style = ob_get_contents();
        ob_end_clean();
        return $style;
    }
    
    public function getCommonScripts()
    {
        ob_start();
        ?>
        <!-- Javascript-->
        <div class="snackbars" id="form-output-global"></div>
        <script src="assets/vendor/jquery/jquery.min.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/vendor/animsition/js/animsition.min.js"></script>
        <script src="assets/vendor/jquery.easing.min.js"></script>
        <script src="assets/vendor/isotope.pkgd.min.js"></script>
        <script src="assets/vendor/imagesloaded.pkgd.min.js"></script>
        <script src="assets/vendor/jquery.mousewheel.min.js"></script>
        <script src="assets/vendor/ytplayer/js/jquery.mb.YTPlayer.min.js"></script>
        <script src="assets/js/core.min.js"></script>
        <script src="assets/js/script.js"></script>
        <?php
        	$scripts = ob_get_contents();
        	ob_end_clean();
        	return $scripts;
    }
    
    public function getGoogleAnalytics()
	{
		ob_start();
		?>
        <!-- Global site tag (gtag.js) - Google Analytics -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P9FT69"height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript><script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-P9FT69');</script>
        <?php 
		$google = ob_get_contents();
		ob_end_clean();
		return $google;
	}
    
    public function getCommonHeader()
    {
        ob_start();
        ?>
        <!-- PANEL-->
        <!-- Page Header-->
        <header class="section page-header">
            <!-- RD Navbar-->
	<div class="rd-navbar-wrap">
		<nav class="rd-navbar" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed"
				 data-md-layout="rd-navbar-static" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static"
				 data-lg-device-layout="rd-navbar-static" data-md-stick-up-offset="80px" data-lg-stick-up-offset="46px"
				 data-md-stick-up="true" data-lg-stick-up="true">
			<div class="rd-navbar-collapse-toggle rd-navbar-fixed-element-1" data-rd-navbar-toggle=".rd-navbar-collapse">
				<span></span></div>

			<div class="rd-navbar-main-outer">
				<div class="rd-navbar-main">
					<!-- RD Navbar Panel-->
					<div class="rd-navbar-panel">
						<!-- RD Navbar Toggle-->
						<button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
						<!-- RD Navbar Brand -->
						<div class="rd-navbar-brand"><a class="brand" href="index.html">
							<img class="brand-logo-dark" src="/assets/img/logo-dark.png" alt="" width="172" height="32"/>
							<img class="brand-logo-light" src="/assets/img/logo-light.png" alt="" width="172" height="32"/>
						</a>
						</div>
					</div>
					<div class="rd-navbar-main-element">
						<div class="rd-navbar-nav-wrap">
							<!-- RD Navbar Nav-->
							<ul class="rd-navbar-nav">
								<li><a href="/">Home</a>
									<!-- RD Navbar Dropdown-->
								</li>

								<li>
									<a href="/about/">About</a>
								</li>

								<li class="">
									<a href="/portafolio/">Portafolio</a>


								<li>
									<a href="blog-list-classic.html">Blog</a>
								</li>

								<li>
									<a href="page-pricing.html">Pages</a>
								</li>

								<li>
									<a href="contact.html">Contact</a>
								</li>


							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>
	</div>
</header>
        <?php
        $header = ob_get_contents();
        ob_end_clean();
        return $header;
    }
    
     public function getFooter()
    {
        ob_start();
        ?>
        <section id="footer" class="footer-dark no-margin-top">
		<div class="footer-inner">
			<div class="footer-container tt-wrap">
				<div class="row">
					<div class="col-md-3">

						<div id="footer-logo">
							<a href="/" class="logo-dark"><img src="/assets/img/logo-dark.png" alt="logo"></a>
							<a href="/" class="logo-light"><img src="/assets/img/logo-light.png" alt="logo"></a>
                        </div>

					</div>
					<div class="col-md-5">

						<div class="footer-text">
							<h4>Creative Photo Studio</h4>
							We are a team of creative photographers specializing in producing quality photography content, which varies in styles and genres. We can handle one-day shoots as well as long term relationships.
						</div>

					</div>
					<div class="col-md-4">

						<div class="social-buttons">
							<ul>
								<li><a href=""
											 class="btn btn-social-min btn-default btn-rounded-full" title="Follow me on Facebook"
											 target="_blank"><i class="fa fa-facebook"></i></a></li>
								<li><a href="home-landing.html#" class="btn btn-social-min btn-default btn-rounded-full"
											 title="Follow me on Twitter" target="_blank"><i class="fa fa-twitter"></i></a></li>
								<li><a href="home-landing.html#" class="btn btn-social-min btn-default btn-rounded-full"
											 title="Follow me on Google+" target="_blank"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="home-landing.html#"
											 class="btn btn-social-min btn-default btn-rounded-full" title="Follow me on Pinterest"
											 target="_blank"><i class="fa fa-pinterest"></i></a></li>
								<li><a href="home-landing.html#" class="btn btn-social-min btn-default btn-rounded-full"
											 title="Follow me on Dribbble" target="_blank"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="contact.html" class="btn btn-social-min btn-default btn-rounded-full"
											 title="Drop me a line" target="_blank"><i class="fa fa-envelope"></i></a></li>
							</ul>
						</div>


						<form class="rd-form rd-mailform form-inline" data-form-output="form-output-global" data-form-type="contact" method="post" action="https://livedemo00.template-help.com/wt_65120/assets/bat/rd-mailform.php">

							<div class="form-wrap">
								<input class="form-input" id="contact-email" type="email" name="email" data-constraints="@Email @Required">
								<label class="form-label" for="contact-email">E-mail</label>
							</div>

							<button class="button btn btn-primary form-button" type="submit">Send</button>
						</form>

					</div>
				</div>
			</div>
			<div class="footer-bottom">
				<div class="footer-container tt-wrap">
					<div class="row">
						<div class="col-md-6 col-md-push-6">

							<ul class="footer-menu">
								<li><a href="/">Home</a></li>
								<li><a href="/about-me/">About</a></li>
								<li><a href="albums-grid-fluid-2.html">Portfolio</a></li>
								<li><a href="blog-list-grid.html">Blog</a></li>
								<li><a href="page-faq.html">FAQ</a></li>
								<li><a href="contact.html">Contact</a></li>
							</ul>

						</div>
						<div class="col-md-6 col-md-pull-6">

							<div class="footer-copyright">
								<p>&copy; 2018 / All rights reserved</p>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>

		<a href="home-landing.html#body" class="scrolltotop sm-scroll" title="Scroll to top"><i class="fa fa-chevron-up"></i></a>
	</section>

        <?php
        $header = ob_get_contents();
        ob_end_clean();
        return $header;
    }
    
    public function getSlider()
    {
        ob_start();
        ?>
        <section id="page-header">
				
				<div class="page-header-image  bg-image" style="background-image: url(/assets/img/misc/page-header-bg-3.jpg);">
					<div class="cover bg-transparent-5-dark"></div>
				</div>
				    <div class="page-header-inner tt-wrap">
					   <div class="page-header-caption ph-caption-lg parallax-5 fade-out-scroll-3">
						<h1 class="page-header-title">Portfolio</h1>
						<hr class="hr-short">
						<div class="page-header-description" data-max-words="40">
							<p>Fusce imperdiet, arcu non tempor aliquam, justo tortor cursus est, sed facilisis eros purus et felis. Sed eros sapien, iaculis eget gravida euismod, dapibus vitae turpis. Pellentesque men egestas odio mi, vitae egestas massa elementum.</p>
						</div>
					</div>
				</div> 
				
			</section>
        <?php
        $header = ob_get_contents();
        ob_end_clean();
        return $header;
    }
    
    public function getAboutES()
    {
        ob_start();
        ?>
        <section id="about-me-section" class="about-me-simple">
            <div class="about-me-inner"> 
				<div class="split-box about-me">
				    <div class="container-fluid">
							<div class="row">
								<div class="row-lg-height">
									<div class="col-lg-6 col-lg-height split-box-image no-padding bg-image" style="background-image: url(/assets/img/misc/me-3.jpg); background-position: 50% 50%;">
								    <div class="sbi-height full-height-vh"></div>
									</div> 
									
									<div class="col-lg-6 col-lg-height col-lg-middle no-padding">
										
										<div class="split-box-content sb-content-right shifted-left">
											
											<div class="custom-heading">
												<div class="custom-heading-inner">
													<h1 class="custom-heading-title">John Priston</h1>
													<div class="custom-heading-subtitle">Artist &amp; Photographer</div>
													<hr class="hr-short">
												</div> 
											</div>
											
											<div class="margin-top-30">
												<p>I am an artist and photographer. Sollicitudin diam vitae, amet lacus donec eu, donec vulputate duis nullam nulla, suscipit nulla orci, ornare maecenas eget gravida. Curae sollicitudin lobortis phasellus. Fusce sapien, metus mi et libero enim sed lorem.</p>
											</div>
											<a href="contact-simple.html" class="btn btn-primary margin-top-20">Contact</a>
											<a href="categories-carousel.html" class="btn btn-dark margin-top-20">View Work</a>
											

											
										</div>
										
									</div> 
								</div> 
							</div>
						</div> 
					</div>
					
				</div> 
			</section>
        <?php
        $header = ob_get_contents();
        ob_end_clean();
        return $header;
    }
    
     
    
    
    public function getSocial()
    {
        ob_start();
        ?>
        <section id="footer" class="footer-minimal no-margin-top bg-transparent">
				<div class="footer-inner">
					<div class="footer-container tt-wrap">
						<div class="row">
							<div class="col-md-6 col-md-push-6">
								
								<div class="social-buttons">
									<ul>
										<li><a href="about-me-2-fluid.html#" class="btn btn-social-min btn-default btn-link" title="Follow me on Facebook" target="_blank"><i class="/fa fa-facebook"></i></a></li>
										<li><a href="about-me-2-fluid.html#" class="btn btn-social-min btn-default btn-link" title="Follow me on Twitter" target="_blank"><i class="fa fa-twitter"></i></a></li>
										<li><a href="about-me-2-fluid.html#" class="btn btn-social-min btn-default btn-link" title="Follow me on Google+" target="_blank"><i class="fa fa-google-plus"></i></a></li>
										<li><a href="about-me-2-fluid.html#" class="btn btn-social-min btn-default btn-link" title="Follow me on Pinterest" target="_blank"><i class="fa fa-pinterest"></i></a></li>
										<li><a href="about-me-2-fluid.html#" class="btn btn-social-min btn-default btn-link" title="Follow me on Dribbble" target="_blank"><i class="fa fa-dribbble"></i></a></li>
										<li><a href="contact.html" class="btn btn-social-min btn-default btn-link" title="Drop me a line" target="_blank"><i class="fa fa-envelope"></i></a></li>
									</ul>
								</div>
								
							</div> 
							<div class="col-md-6 col-md-pull-6">
								
								<div class="footer-copyright">
									<p>&copy; 2018 / All rights reserved</p>

								</div>
								
							</div> 
						</div> 
					</div> 
				</div> 
				
				<a href="about-me-2-fluid.html#body" class="scrolltotop sm-scroll" title="Scroll to top"><i class="fa fa-chevron-up"></i></a>
			</section>
        <?php
        $header = ob_get_contents();
        ob_end_clean();
        return $header;
    }
    
    
    
    public function getIndexSlider()
    {
        ob_start();
        ?>
        <section id="tt-intro" class="slideshow-intro">
		<div class="tt-intro-inner">
			<div class="gl-carousel-wrap no-padding">

				<div class="owl-carousel cc-height-5 dots-right bg-dark" data-xl-items="1" data-loop="true"
						 data-nav="true" data-nav-speed="500" data-mouse-drag="false" data-dots-speed="500" data-autoplay="true"
						 data-autoplay-timeout="8000"  data-dots="true" data-animation-in="fadeIn"
						 data-autoplay-hover-pause="true">

					<div class="cc-item">

						<span class="cover bg-transparent-3-dark"></span>

						<div class="cc-image bg-image"
								 style="background-image: url(assets/img/intro/intro-10.jpg); background-position: 50% 50%;"></div>

						<div class="intro-caption caption-animate intro-caption-xxlg center-left">
							<h1 class="intro-title">Studio Photos</h1>
							<h2 class="intro-subtitle">We can help you make great photos!</h2>
							<p class="intro-description max-width-1000">
								Studio photography requires special art of the photographer,<br>
								and a studio genre is perhaps of greatest popularity...
							</p>
							<div class="margin-top-30">
								<a href="home-landing.html#"
									 class="btn btn-primary margin-top-5 margin-right-10" target="_blank">Book a Photo Shoot</a>
								<a href="albums-grid-fluid-2.html" class="btn btn-white-bordered margin-top-5">View More</a>
							</div>
						</div>

					</div>

					<div class="cc-item">

						<span class="cover bg-transparent-3-dark"></span>

						<div class="cc-image bg-image"
								 style="background-image: url(assets/img/intro/intro-9.jpg); background-position: 50% 75%;"></div>

						<div class="intro-caption caption-animate intro-caption-xxlg center-left">
							<h1 class="intro-title">Wedding</h1>
							<h2 class="intro-subtitle">We can help you make great photos!</h2>
							<p class="intro-description max-width-1000">
								Wedding photographs give an excellent opportunity to experience <br>
								the joyful moments of the special day again and again.
							</p>
							<div class="margin-top-30">
								<a href="home-landing.html#"
									 class="btn btn-primary margin-top-5 margin-right-10" target="_blank">Book a Photo Shoot</a>
								<a href="albums-grid-fluid-2.html" class="btn btn-white-bordered margin-top-5">View More</a>
							</div>
						</div>

					</div>

					<div class="cc-item">

						<span class="cover bg-transparent-3-dark"></span>

						<div class="cc-image bg-image"
								 style="background-image: url(assets/img/intro/intro-11.jpg); background-position: 50% 50%;"></div>

						<div class="intro-caption caption-animate intro-caption-xxlg center-left">
							<h1 class="intro-title">Advertising </h1>
							<h2 class="intro-subtitle">We can help you make great photos!</h2>
							<p class="intro-description max-width-1000">
								Advertising photography provides necessary material for the promotion  <br>
								of your company on the worldwide market regardless of your business sphere.
							</p>
							<div class="margin-top-30">
								<a href="home-landing.html#"
									 class="btn btn-primary margin-top-5 margin-right-10" target="_blank">Book a Photo Shoot</a>
								<a href="albums-grid-fluid-2.html" class="btn btn-white-bordered margin-top-5">View More</a>
							</div>
						</div>

					</div>

					<div class="cc-item">

						<span class="cover bg-transparent-3-dark"></span>

						<div class="cc-image bg-image"
								 style="background-image: url(assets/img/intro/intro-12.jpg); background-position: 50% 37%;"></div>

						<div class="intro-caption caption-animate intro-caption-xxlg center-left">
							<h1 class="intro-title">Catalog Shoot</h1>
							<h2 class="intro-subtitle">We can help you make great photos!</h2>
							<p class="intro-description max-width-1000">
								You need to carry out a professional subject shooting, <br>
								as it is said - catalog shoot? We can help you with it!
							</p>
							<div class="margin-top-30">
								<a href="home-landing.html#"
									 class="btn btn-primary margin-top-5 margin-right-10" target="_blank">Book a Photo Shoot</a>
								<a href="albums-grid-fluid-2.html" class="btn btn-white-bordered margin-top-5">View More</a>
							</div>
						</div>

					</div>

					<div class="cc-item">

						<span class="cover bg-transparent-3-dark"></span>

						<div class="cc-image bg-image"
								 style="background-image: url(assets/img/intro/intro-13.jpg); background-position: 50% 45%;"></div>

						<div class="intro-caption caption-animate intro-caption-xxlg center-left">
							<h1 class="intro-title">Studio Shooting</h1>
							<h2 class="intro-subtitle">We can help you make great photos!</h2>
							<p class="intro-description max-width-1000">
								Studio photography requires special art of the photographer, <br>
								and a studio genre is perhaps of the greatest popularity.
							</p>
							<div class="margin-top-30">
								<a href="home-landing.html#"
									 class="btn btn-primary margin-top-5 margin-right-10" target="_blank">Book a Photo Shoot</a>
								<a href="albums-grid-fluid-2.html" class="btn btn-white-bordered margin-top-5">View More</a>
							</div>
						</div>

					</div>


				</div>

			</div>
		</div>
	</section>

        <?php
        $header = ob_get_contents();
        ob_end_clean();
        return $header;
    }
    
    public function getIndexWelcome()
    {
        ob_start();
        ?>
        <section id="about-me-section">
		<div class="about-me-inner tt-wrap">


			<div class="split-box about-me">
				<div class="container-fluid">
					<div class="row">
						<div class="row-lg-height">

							<div class="col-lg-6 col-lg-height split-box-image no-padding bg-image  wow fadeInUp" data-wow-delay=".3s"
									 style="background-image: url(assets/img/misc/me-1.jpg); background-position: 50% 50%;">

								<div class="sbi-height padding-height-85"></div>
							</div>

							<div class="col-lg-6 col-lg-height col-lg-middle no-padding">

								<div class="split-box-content sb-content-right">

									<div class="custom-heading">
										<div class="custom-heading-inner">
											<h1 class="custom-heading-title  wow fadeInUp" data-wow-delay=".3s">Welcome to Our Photo Studio</h1>
											<div class="custom-heading-subtitle  wow fadeInUp" data-wow-delay=".5s">We are a creative team passionate about photography.</div>
											<hr class="hr-short  wow fadeInUp" data-wow-delay=".7s">
										</div>
									</div>

									<div class="margin-top-30  wow fadeInUp" data-wow-delay=".9s">
										<p class="" data-wow-delay="1.1s">We put our heart and soul into our works. We hope that you can feel it while looking through the
											portfolio. Enjoy the emotions transmitted through every shot.</p>
										<p class="" data-wow-delay="1.3s">We specialize in producing quality photography content such as fashion and beauty, collection shooting for clothing designers, actor’s headshots, model tests, retail advertising and online commerce, wedding photos – from one-day shoots to long term relationships. Our clients include ad agencies, fashion retailers, fashion houses, cosmetic companies and individual customers. Working with many industry experts, our team can help you organize your shoot.</p>
									</div>

									<a href="about-me.html" class="btn btn-primary margin-top-20  wow fadeInUp" data-wow-delay="1.1s">Read more</a>
                                </div>
                            </div>
						</div>
					</div>
				</div>
			</div>
            
            <div class="split-box what-i-do">
				<div class="container-fluid">
					<div class="row">
						<div class="row-lg-height">
                            <div class="col-lg-6 col-lg-push-6 col-lg-height split-box-image no-padding bg-image  wow fadeInUp" data-wow-delay=".3s"
									 style="background-image: url(assets/img/misc/me-2.jpg); background-position: 50% 50%;">
                                <div class="sbi-height padding-height-85"></div>
							</div>

							<div class="col-lg-6 col-lg-pull-6 col-lg-height col-lg-middle no-padding">

								<div class="split-box-content sb-content-left">

									<div class="custom-heading">
										<div class="custom-heading-inner">
											<h1 class="custom-heading-title  wow fadeInUp" data-wow-delay=".3s">What We Do</h1>
											<div class="custom-heading-subtitle  wow fadeInUp" data-wow-delay=".5s">Professional photography services</div>
											<hr class="hr-short  wow fadeInUp" data-wow-delay=".7s">
										</div>
									</div>

									<div class="margin-top-30  wow fadeInUp" data-wow-delay=".9s">
										<p>As a professional photo studio, we provide a variety of photography related services including photo shoots organization, makeup services etc. We specialize in a wide variety of photo shoot genres. Our constant attention to the latest trends in the industry helps us make the photos of our clients look really awesome and thanks to our vast experience we know how to satisfy even the most demanding clients.</p>
										<p>We often say that a picture is worth a thousand words. With the help of camera shots we can
											literally freeze the moment in our hands. We collect captures in the photo albums or on the hard
											drives in order to get magically transported into the past while looking trough them. Photography
											has a truly magical effect on each of us. By looking at it we can recall the scenes from the past
											in greater details.</p>
									</div>
									<a href="contact.html" class="btn btn-primary margin-top-20  wow fadeInUp" data-wow-delay="1.1s">Contact Us</a>
									<a href="categories-grid.html" class="btn btn-dark margin-top-20  wow fadeInUp" data-wow-delay="1.3s">View Our Works</a>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</section>
        <?php
        $header = ob_get_contents();
        ob_end_clean();
        return $header;
    }

    public function getIndexProyectos()
    {
        ob_start();
        ?>
        <section id="gallery-single-section" class="margin-top-100">
		<div class="custom-heading custom-heading-lg  text-center">
			<div class="custom-heading-inner tt-wrap">
				<h1 class="custom-heading-title">Our Projects</h1>
				<div class="custom-heading-subtitle">Our latest photos / <a href="categories-grid.html">View All</a></div>
				<hr class="hr-short">
			</div>
		</div>

		<div class="isotope-wrap ">
			<div class="isotope col-3 gutter-3">
				<div id="gallery" class="isotope-items-wrap lightgallery gsi-color" data-lightgallery="group">

					<div class="grid-sizer"></div>

					<div class="isotope-item ">

						<a href="assets/img/gallery/gallery-single/grid/big/gallery-single-big-1.jpg"
							 class="gallery-single-item lg-trigger wow fadeInUp" data-wow-delay=".3s"
							 data-lightgallery="item"
							 data-sub-html="<p>Love story</p>">

							<img src="assets/img/gallery/gallery-single/grid/gallery-single-1.jpg" class="gs-item-image" alt="">


							<div class="gsi-image-caption">Love story</div>

							<div class="gs-item-icon"><i class="fa fa-search"></i></div>

						</a>

					</div>


					<div class="isotope-item">

						<a href="assets/img/gallery/gallery-single/grid/big/gallery-single-big-2.jpg"
							 class="gallery-single-item lg-trigger wow fadeInUp" data-wow-delay=".3s"
							 data-lightgallery="item">

							<img src="assets/img/gallery/gallery-single/grid/gallery-single-2.jpg" class="gs-item-image" alt="">


							<div class="gs-item-icon"><i class="fa fa-search"></i></div>

						</a>

					</div>


					<div class="isotope-item">

						<a href="assets/img/gallery/gallery-single/grid/big/gallery-single-big-3.jpg"
							 class="gallery-single-item lg-trigger wow fadeInUp" data-wow-delay=".3s"
							 data-lightgallery="item">

							<img src="assets/img/gallery/gallery-single/grid/gallery-single-3.jpg" class="gs-item-image" alt="">


							<div class="gs-item-icon"><i class="fa fa-search"></i></div>

						</a>

					</div>


					<div class="isotope-item">

						<a href="assets/img/gallery/gallery-single/grid/big/gallery-single-big-4.jpg"
							 class="gallery-single-item lg-trigger wow fadeInUp" data-wow-delay=".3s"
							 data-lightgallery="item">

							<img src="assets/img/gallery/gallery-single/grid/gallery-single-4.jpg" class="gs-item-image" alt="">


							<div class="gs-item-icon"><i class="fa fa-search"></i></div>

						</a>

					</div>


					<div class="isotope-item">

						<a href="assets/img/gallery/gallery-single/grid/big/gallery-single-big-5.jpg"
							 class="gallery-single-item lg-trigger wow fadeInUp" data-wow-delay=".3s"
							 data-lightgallery="item">

							<img src="assets/img/gallery/gallery-single/grid/gallery-single-5.jpg" class="gs-item-image" alt="">


							<div class="gs-item-icon"><i class="fa fa-search"></i></div>

						</a>

					</div>


					<div class="isotope-item">

						<a href="assets/img/gallery/gallery-single/grid/big/gallery-single-big-6.jpg"
							 class="gallery-single-item lg-trigger wow fadeInUp" data-wow-delay=".3s"
							 data-lightgallery="item">

							<img src="assets/img/gallery/gallery-single/grid/gallery-single-6.jpg" class="gs-item-image" alt="">


							<div class="gs-item-icon"><i class="fa fa-search"></i></div>

						</a>

					</div>
					<div class="isotope-item">
						<a href="assets/img/gallery/gallery-single/grid/big/gallery-single-big-7.jpg"
							 class="gallery-single-item lg-trigger wow fadeInUp" data-wow-delay=".3s"
							 data-lightgallery="item">
							<img src="assets/img/gallery/gallery-single/grid/gallery-single-7.jpg" class="gs-item-image" alt="">
							<div class="gs-item-icon"><i class="fa fa-search"></i></div>
						</a>
					</div>
					<div class="isotope-item">

						<a href="assets/img/gallery/gallery-single/grid/big/gallery-single-big-8.jpg"
							 class="gallery-single-item lg-trigger wow fadeInUp" data-wow-delay=".3s"
							 data-lightgallery="item"
							 data-sub-html="<p>Professional photography for everyone</p>">

							<img src="assets/img/gallery/gallery-single/grid/gallery-single-8.jpg" class="gs-item-image" alt="">


							<div class="gsi-image-caption">Professional photography for everyone</div>

							<div class="gs-item-icon"><i class="fa fa-search"></i></div>

						</a>

					</div>


					<div class="isotope-item">

						<a href="assets/img/gallery/gallery-single/grid/big/gallery-single-big-9.jpg"
							 class="gallery-single-item lg-trigger wow fadeInUp" data-wow-delay=".3s"
							 data-lightgallery="item">

							<img src="assets/img/gallery/gallery-single/grid/gallery-single-9.jpg" class="gs-item-image" alt="">


							<div class="gs-item-icon"><i class="fa fa-search"></i></div>

						</a>

					</div>
					<div class="isotope-item">
						<a href="assets/img/gallery/gallery-single/grid/big/gallery-single-big-10.jpg"
							 class="gallery-single-item lg-trigger wow fadeInUp" data-wow-delay=".3s"
							 data-lightgallery="item">
							<img src="assets/img/gallery/gallery-single/grid/gallery-single-10.jpg" class="gs-item-image" alt="">
							<div class="gs-item-icon"><i class="fa fa-search"></i></div>
						</a>
					</div>
					<div class="isotope-item">

						<a href="assets/img/gallery/gallery-single/grid/big/gallery-single-big-11.jpg"
							 class="gallery-single-item lg-trigger wow fadeInUp" data-wow-delay=".3s"
							 data-lightgallery="item">

							<img src="assets/img/gallery/gallery-single/grid/gallery-single-11.jpg" class="gs-item-image" alt="">


							<div class="gs-item-icon"><i class="fa fa-search"></i></div>

						</a>

					</div>


					<div class="isotope-item">

						<a href="assets/img/gallery/gallery-single/grid/big/gallery-single-big-12.jpg"
							 class="gallery-single-item lg-trigger wow fadeInUp" data-wow-delay=".3s"
							 data-lightgallery="item">

							<img src="assets/img/gallery/gallery-single/grid/gallery-single-12.jpg" class="gs-item-image" alt="">


							<div class="gs-item-icon"><i class="fa fa-search"></i></div>

						</a>

					</div>


					<div class="isotope-item">

						<a href="assets/img/gallery/gallery-single/grid/big/gallery-single-big-13.jpg"
							 class="gallery-single-item lg-trigger wow fadeInUp" data-wow-delay=".3s"
							 data-lightgallery="item">

							<img src="assets/img/gallery/gallery-single/grid/gallery-single-13.jpg" class="gs-item-image" alt="">


							<div class="gs-item-icon"><i class="fa fa-search"></i></div>

						</a>

					</div>


				</div>

			</div>

		</div>
	</section>
        <?php
        $header = ob_get_contents();
        ob_end_clean();
        return $header;
    }
    
    public function getIndexServices()
    {
    ob_start();
    ?>
    
    <?php
    $header = ob_get_contents();
    ob_end_clean();
    return $header;
    }
    
    public function getIndexBlog()
    {
        ob_start();
        ?>
        
        <?php
        $header = ob_get_contents();
        ob_end_clean();
        return $header;
    }
    
   
    
    public function myMethod()
    {
        ob_start();
        ?>
        <?php
        $method = ob_get_contents();
        ob_end_clean();
        return $method;
    }
}
