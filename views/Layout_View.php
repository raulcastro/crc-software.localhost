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

    <body id="body" class="animsition tt-boxed">
        <div id="body-content">
            
            <?php 
                echo self::getCommonHeader();
            ?>
           
            <!--========================================================
                                  CONTENT
            =========================================================-->
         
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
                            echo self::getImagen();
                        break;
                            
                        case 'pricing':
                            echo self::getPricingSlider();
                            echo self::getPaquetes();
                        break;
                            
                        case 'contact':
                            echo self::getContactSlider();
                            echo self::getContactForm();
                        break;
                            
                        
                        default:
        				break;
    			    }
                ?>
           
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

	<link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">

	<link rel="stylesheet" href="/assets/vendor/rd-navbar/css/rd-navbar.css">
	<link rel="stylesheet" href="assets/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" href="/assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="/assets/vendor/lightgallery/css/lightgallery.min.css">
	<link rel="stylesheet" href="assets/vendor/owl-carousel/css/owl.carousel.min.css">
	<link rel="stylesheet" href="/assets/vendor/owl-carousel/css/owl.theme.default.min.css">
	<link rel="stylesheet" href="/assets/vendor/ytplayer/css/jquery.mb.YTPlayer.min.css">
	<link rel="stylesheet" href="/assets/vendor/animate.min.css">

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
        <script src="/assets/js/core.min.js"></script>
        <script src="/assets/js/script.js"></script>
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
						<div class="rd-navbar-brand"><a class="brand" href="/">
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

								<li>
									<a href="/portafolio/">Portafolio</a>


								<li>
									<a href="/blog/">Blog</a>
								</li>

								<li>
									<a href="/pricing/">Pricing</a>
								</li>

								<li>
									<a href="/contact/">Contact</a>
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
								<li><a href="https://www.facebook.com/adrianaalvaradophotography/"
											 class="btn btn-social-min btn-default btn-rounded-full" title="Follow me on Facebook"
											 target="_blank"><i class="fa fa-facebook"></i></a></li>
								<li><a href="https://www.instagram.com/adrianaalvaradophotography/" class="btn btn-social-min btn-default btn-rounded-full"
											 title="Follow me on instagram" target="_blank"><i class="fa fa-instagram"></i></a></li>
								
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
								<li><a href="/about/">About</a></li>
								<li><a href="/portafoli/">Portfolio</a></li>
								<li><a href="/">Blog</a></li>
								<li><a href="/faq/">FAQ</a></li>
								<li><a href="/contact/">Contact</a></li>
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
    
    public function getContactSlider()
    {
        ob_start();
        ?>
        <section id="page-header" class="ph-sm">
				
				<div class="page-header-image  bg-image" style="background-image: url(/assets/img/misc/page-header-bg-5.jpg);">
					<div class="cover bg-transparent-5-dark"></div>
				</div>
				<div class="page-header-inner tt-wrap">
				<div class="page-header-caption ph-caption-lg parallax-4 fade-out-scroll-3">
						<h1 class="page-header-title">Contact</h1>
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
    
     public function getContactForm()
    {
        ob_start();
        ?>
        <section id="contact-section">
				<div class="contact-section-inner tt-wrap"> 
					
					
					<div class="split-box">
						<div class="container-fluid">
							<div class="row">
								<div class="row-lg-height full-height-vh">
									
									<div class="col-lg-6 col-lg-height col-lg-middle bg-image" style="background-image: url(assets/img/misc/contact-bg.jpg); background-position: 50% 50%;">
										
										<div class="cover"></div>
										
										<div class="split-box-content text-left no-padding-left no-padding-right">
											
											<div class="contact-info-wrap">
												<div class="contact-info">
													<p><i class="fa fa-home"></i> address: 121 King Street, Melbourne, Australia</p>
													<p><i class="fa fa-phone"></i> phone: +123 456 789 000</p>
													<p><i class="fa fa-envelope"></i> email: <a href="mailto:company@email.com" target="_blank">company@email.com</a></p>
												</div>
												
												<div class="social-buttons margin-top-20">
													<ul>
														<li><a href="https://www.facebook.com/adrianaalvaradophotography/" class="btn btn-social-min btn-default btn-rounded-full" title="Follow me on Facebook" target="_blank"><i class="fa fa-facebook"></i></a></li>
														<li><a href="https://www.instagram.com/adrianaalvaradophotography/" class="btn btn-social-min btn-default btn-rounded-full" title="Follow me on Pinterest" target="_blank"><i class="fa fa-instagram"></i></a></li>
													</ul>
												</div>
												
											</div>
											
										</div>
										
									</div> 
									
									<div class="col-lg-6 col-lg-height col-lg-middle no-padding">
										
										<div class="split-box-content">

                    <form class="rd-form rd-mailform" data-form-output="form-output-global" data-form-type="contact"
                          method="post" action="https://livedemo00.template-help.com/wt_65120/assets/bat/rd-mailform.php">
                      <div class="form-wrap">
                        <input class="form-input" id="contact-name" type="text" name="name"
                               data-constraints="@Required">
                        <label class="form-label" for="contact-name">Your Name</label>
                      </div>
                      <div class="form-wrap">
                        <input class="form-input" id="contact-phone" type="text" name="phone"
                               data-constraints="@Numeric">
                        <label class="form-label" for="contact-phone">Phone</label>
                      </div>
                      <div class="form-wrap">
                        <label class="form-label" for="contact-message">Your Message</label>
                        <textarea class="form-input" id="contact-message" name="message"
                                  data-constraints="@Required"></textarea>
                      </div>
                      <div class="form-wrap">
                        <input class="form-input" id="form-email" type="email" name="email"
                               data-constraints="@Email @Required">
                        <label class="form-label" for="form-email">E-mail</label>
                      </div>
                      <button class="btn btn-primary" type="submit">Send Message</button>
                    </form>
                                        </div>
								    </div> 
								</div> 
							</div> 
							<div class="row">
								<div class="col-lg-12 no-padding">

									<!--<div class="google-map-container" data-center="9870 Saint Vincent Plaza, Glasgow, United Kingdom" data-icon="assets/img/gmap_marker.png" data-icon-active="assets/img/gmap_marker_active.png" data-styles="[{&quot;featureType&quot;:&quot;water&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#e9e9e9&quot;},{&quot;lightness&quot;:17}]},{&quot;featureType&quot;:&quot;landscape&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#f5f5f5&quot;},{&quot;lightness&quot;:20}]},{&quot;featureType&quot;:&quot;road.highway&quot;,&quot;elementType&quot;:&quot;geometry.fill&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#ffffff&quot;},{&quot;lightness&quot;:17}]},{&quot;featureType&quot;:&quot;road.highway&quot;,&quot;elementType&quot;:&quot;geometry.stroke&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#ffffff&quot;},{&quot;lightness&quot;:29},{&quot;weight&quot;:0.2}]},{&quot;featureType&quot;:&quot;road.arterial&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#ffffff&quot;},{&quot;lightness&quot;:18}]},{&quot;featureType&quot;:&quot;road.local&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#ffffff&quot;},{&quot;lightness&quot;:16}]},{&quot;featureType&quot;:&quot;poi&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#f5f5f5&quot;},{&quot;lightness&quot;:21}]},{&quot;featureType&quot;:&quot;poi.park&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#dedede&quot;},{&quot;lightness&quot;:21}]},{&quot;elementType&quot;:&quot;labels.text.stroke&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;on&quot;},{&quot;color&quot;:&quot;#ffffff&quot;},{&quot;lightness&quot;:16}]},{&quot;elementType&quot;:&quot;labels.text.fill&quot;,&quot;stylers&quot;:[{&quot;saturation&quot;:36},{&quot;color&quot;:&quot;#333333&quot;},{&quot;lightness&quot;:40}]},{&quot;elementType&quot;:&quot;labels.icon&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;off&quot;}]},{&quot;featureType&quot;:&quot;transit&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#f2f2f2&quot;},{&quot;lightness&quot;:19}]},{&quot;featureType&quot;:&quot;administrative&quot;,&quot;elementType&quot;:&quot;geometry.fill&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#fefefe&quot;},{&quot;lightness&quot;:20}]},{&quot;featureType&quot;:&quot;administrative&quot;,&quot;elementType&quot;:&quot;geometry.stroke&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#fefefe&quot;},{&quot;lightness&quot;:17},{&quot;weight&quot;:1.2}]}]"
											 data-zoom="15">
										<div class="google-map google-map-big"></div>
										<ul class="google-map-markers">
											<li data-location="9870 Saint Vincent Plaza, Glasgow, United Kingdom" data-description="Saint Vincent Plaza, Glasgow, United Kingdom"></li>
										</ul>
									</div>
									<!--<div id="map"></div>-->
									
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
    
    
    
    public function getPricingSlider()
    {
        ob_start();
        ?>
        <section id="page-header" class="ph-lg">
				
				<div class="page-header-image  bg-image" style="background-image: url(/assets/img/misc/page-header-bg-17.jpg);">
					<div class="cover bg-transparent-5-dark"></div>
				</div>
                <div class="page-header-inner tt-wrap">
					
					<div class="page-header-caption ph-caption-lg parallax-4 fade-out-scroll-3">
						<h1 class="page-header-title">Pricing</h1>
						<hr class="hr-short">
				    </div>
				</div> 
        </section>
			
        <?php
        $header = ob_get_contents();
        ob_end_clean();
        return $header;
    }
    
     public function getPaquetes()
    {
        ob_start();
        ?>
        <section id="prices-section">
				
				<div class="custom-heading padding-on">
					<div class="custom-heading-inner tt-wrap">
						
						<div class="row">
							<div class="col-md-4">
								
								<h1 class="custom-heading-title">Please Choose Your Package</h1>
								
								<hr class="hr-short">
							</div> 
							<div class="col-md-8">
								<p>Nunc euismod ipsum vel metus rhoncus, a accumsan sapien mollis. Donec malesuada lacus rhoncus ipsum dignissim, sed fringilla orci faucibus. Proin non odio dui. Donec ut tristique dolor, at interdum sem. Quisque finibus viverra lectus vitae pulvinar.</p>
								<p>Duis mattis quam quis quam cursus, a rutrum ante luctus. Phasellus porta ornare enim ac euismod. Nulla fringilla lectus ac tincidunt viverra.</p>
							</div> 
						</div> 
					</div> 
				</div>

				<div class="prices-section-inner tt-wrap">

					<div class="price-boxes-container">
						<div class="row">
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">

								<div class="price-box">
									<div class="pr-box price-heading bg-image"
											 style="background-image: url(/assets/img/misc/price-box-1.jpg);">
										<div class="price-heading-inner">
											<div class="pr-box price-box-price">
												<div class="price"><span class="price-currency">$</span>19</div>
											</div>
										</div>
									</div>
									<h3 class="price-title margin-top-60">Consultation</h3>
									<div class="pr-box price-features margin-top-15">
										<ul class="list-unstyled">
											<li>Photo processing</li>
											<li>Advice from the author</li>
											<li>Photoshop lessons</li>
										</ul>
									</div>
									<div class="pr-box">
										<a href="/contact/" class="btn btn-price-box btn-dark btn-lg">Learm more</a>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">

								<div class="price-box">
									<div class="pr-box price-heading bg-image"
											 style="background-image: url(/assets/img/misc/price-box-2.jpg);">
										<div class="price-heading-inner">
											<div class="pr-box price-box-price">
												<div class="price"><span class="price-currency">$</span>35</div>
											</div>
										</div>
									</div>
									<h3 class="price-title margin-top-60">Outdoors</h3>
									<div class="pr-box price-features margin-top-15">
										<ul class="list-unstyled">
											<li>Photo processing</li>
											<li>Advice from the author</li>
											<li>Photoshop lessons</li>
										</ul>
									</div>
									<div class="pr-box">
										<a href="contact.html" class="btn btn-price-box btn-dark btn-lg">Learm more</a>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">

								<div class="price-box">
									<div class="pr-box price-heading bg-image"
											 style="background-image: url(/assets/img/misc/price-box-3.jpg);">
										<div class="price-heading-inner">
											<div class="pr-box price-box-price">
												<div class="price"><span class="price-currency">$</span>49</div>
											</div>
										</div>
									</div>
									<h3 class="price-title margin-top-60">Studio</h3>
									<div class="pr-box price-features margin-top-15">
										<ul class="list-unstyled">
											<li>Photo processing</li>
											<li>Advice from the author</li>
											<li>Photoshop lessons</li>
										</ul>
									</div>
									<div class="pr-box">
										<a href="contact.html" class="btn btn-price-box btn-dark btn-lg">Learm more</a>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">

								<div class="price-box">
									<div class="pr-box price-heading bg-image"
											 style="background-image: url(/assets/img/misc/price-box-4.jpg);">
										<div class="price-heading-inner">
											<div class="pr-box price-box-price">
												<div class="price"><span class="price-currency">$</span>88</div>
											</div>
										</div>
									</div>
									<h3 class="price-title margin-top-60">Travel</h3>
									<div class="pr-box price-features margin-top-15">
										<ul class="list-unstyled">
											<li>Photo processing</li>
											<li>Advice from the author</li>
											<li>Photoshop lessons</li>
										</ul>
									</div>
									<div class="pr-box">
										<a href="/contact/" class="btn btn-price-box btn-dark btn-lg">Learm more</a>
									</div>
								</div>
							</div>
						</div>
						<div class="row margin-top-70 margin-auto max-width-800">
							<div class="col-md-12 text-center">
								<p>Thank you for your photographs that capture so beautifully the emotion during this joyful time in our
									lives. We will treasure them. Lullaby Photography was such a wonderful experience for my baby and I. I was
									amazed at your professionalism.</p>
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
    
     public function getImagen()
    {
        ob_start();
        ?>
        <section id="gallery-list-section">
				<div class="isotope-wrap tt-wrap"> 
					
					
					<div class="isotope col-3 gutter-3">
						
						
						<div class="isotope-top-content">
							
							<div class="isotope-filter">
								<div class="isotope-filter-button">
									<span class="ifb-icon"><i class="fa fa-sliders"></i></span>
									<span class="ifb-icon-close"><i class="fa fa-times"></i></span> 
								</div>
								<ul class="isotope-filter-links">
									<li><a href="albums-grid.html#" class="active" data-filter="*">Show All</a></li>
									<li><a href="albums-grid.html#" data-filter=".fashion">Fashion</a></li>
									<li><a href="albums-grid.html#" data-filter=".portraits">Portraits</a></li>
									<li><a href="albums-grid.html#" data-filter=".black-and-white">Black &amp; White</a></li>
									<li><a href="albums-grid.html#" data-filter=".outdoor">Outdoor</a></li>
								</ul>
							</div>
							
						</div>
						
						
						<div class="isotope-items-wrap gli-colored">
							
							<div class="grid-sizer"></div>
							
							<div class="isotope-item outdoor iso-height-1">
								
								<div class="gallery-list-item">
									
									<div class="gl-item-image-wrap">
										
										<a href="gallery-single-grid.html" class="gl-item-image-inner">
											<div class="gl-item-image bg-image" style="background-image: url(/assets/img/gallery/gallery-list/gallery-list-1.jpg); background-position: 50% 50%"></div>
											
											<span class="gl-item-image-zoom"></span>
										</a>
										
										
										<ul class="gli-meta">
											<li>
												
												<div class="favorite-btn">
													<div class="fav-inner">
														<div class="icon-heart">
															<span class="icon-heart-empty"></span>
															<span class="icon-heart-filled"></span>
														</div>
													</div>
													<div class="fav-count">49</div>
												</div>
												
											</li>
										</ul>
										
									</div>
									
									
									
									<div class="gl-item-info">
										<div class="gl-item-caption">
											<h2 class="gl-item-title"><a href="gallery-single-grid.html">The Old Man Dreams</a></h2>
											<span class="gl-item-category"><a href="albums-archive.html">Outdoor</a></span>
										</div>
									</div>
									
								</div>
								
							</div>
							
							
							<div class="isotope-item black-and-white iso-height-1">
								
								<div class="gallery-list-item">
									
									<div class="gl-item-image-wrap">
										
										<a href="gallery-single-grid.html" class="gl-item-image-inner">
											<div class="gl-item-image bg-image" style="background-image: url(/assets/img/gallery/gallery-list/gallery-list-2.jpg); background-position: 50% 50%"></div>
											
											<span class="gl-item-image-zoom"></span>
										</a>
										
										
										<ul class="gli-meta">
											
											<li>
												
												<div class="favorite-btn">
													<div class="fav-inner">
														<div class="icon-heart">
															<span class="icon-heart-empty"></span>
															<span class="icon-heart-filled"></span>
														</div>
													</div>
													<div class="fav-count">85</div>
												</div>
												
											</li>
										</ul>
										
									</div>
									
									
									
									<div class="gl-item-info">
										<div class="gl-item-caption">
											<h2 class="gl-item-title"><a href="gallery-single-grid.html">These Wonderful Freckles</a></h2>
											<span class="gl-item-category"><a href="albums-archive.html">Black &amp; White</a></span>
										</div>
									</div>
									
								</div>
								
							</div>
							
							
							<div class="isotope-item fashion iso-height-1">
								
								<div class="gallery-list-item">
									
									<div class="gl-item-image-wrap">
										
										<a href="gallery-single-grid.html" class="gl-item-image-inner">
											<div class="gl-item-image bg-image" style="background-image: url(/assets/img/gallery/gallery-list/gallery-list-3.jpg); background-position: 50% 50%"></div>
											
											<span class="gl-item-image-zoom"></span>
										</a>
										
										
										
										<ul class="gli-meta">
											
											<li>
												
												<div class="favorite-btn">
													<div class="fav-inner">
														<div class="icon-heart">
															<span class="icon-heart-empty"></span>
															<span class="icon-heart-filled"></span>
														</div>
													</div>
													<div class="fav-count">7</div>
												</div>
												
											</li>
										</ul>
										
									</div>
									
									
									
									<div class="gl-item-info">
										<div class="gl-item-caption">
											<h2 class="gl-item-title"><a href="gallery-single-grid.html">Paris Fashion Week</a></h2>
											<span class="gl-item-category"><a href="albums-archive.html">Fashion</a></span>
										</div>
									</div>
									
								</div>
								
							</div>
							
							
							<div class="isotope-item outdoor iso-height-1">
								
								<div class="gallery-list-item">
									
									<div class="gl-item-image-wrap">
										
										<a href="gallery-single-grid.html" class="gl-item-image-inner">
											<div class="gl-item-image bg-image" style="background-image: url(/assets/img/gallery/gallery-list/gallery-list-4.jpg); background-position: 50% 50%"></div>
											
											<span class="gl-item-image-zoom"></span>
										</a>
										
										
										<ul class="gli-meta">
											
											<li>
												
												<div class="favorite-btn">
													<div class="fav-inner">
														<div class="icon-heart">
															<span class="icon-heart-empty"></span>
															<span class="icon-heart-filled"></span>
														</div>
													</div>
													<div class="fav-count">12</div>
												</div>
												
											</li>
										</ul>
										
										
									</div>
									
									
									
									<div class="gl-item-info">
										<div class="gl-item-caption">
											<h2 class="gl-item-title"><a href="gallery-single-grid.html">Afternoon Photoshoot</a></h2>
											<span class="gl-item-category"><a href="albums-archive.html">Outdoor</a></span>
										</div>
									</div>
									
								</div>
								
							</div>
							
							
							<div class="isotope-item portraits iso-height-1">
								
								<div class="gallery-list-item">
									
									<div class="gl-item-image-wrap">
										
										<a href="gallery-single-grid.html" class="gl-item-image-inner">
											<div class="gl-item-image bg-image" style="background-image: url(/assets/img/gallery/gallery-list/gallery-list-5.jpg); background-position: 50% 50%"></div>
											
											<span class="gl-item-image-zoom"></span>
										</a>
										
										
										<ul class="gli-meta">
											
											<li>
												
												<div class="favorite-btn">
													<div class="fav-inner">
														<div class="icon-heart">
															<span class="icon-heart-empty"></span>
															<span class="icon-heart-filled"></span>
														</div>
													</div>
													<div class="fav-count">96</div>
												</div>
												
											</li>
										</ul>
										
									</div>
									
									
									
									<div class="gl-item-info">
										<div class="gl-item-caption">
											<h2 class="gl-item-title"><a href="gallery-single-grid.html">Sit Back and Relax</a></h2>
											<span class="gl-item-category"><a href="albums-archive.html">Portraits</a></span>
										</div>
									</div>
									
								</div>
								
							</div>
							
							
							<div class="isotope-item fashion outdoor iso-height-1">
								
								<div class="gallery-list-item">
									
									<div class="gl-item-image-wrap">
										
										<a href="gallery-single-grid.html" class="gl-item-image-inner">
											<div class="gl-item-image bg-image" style="background-image: url(/assets/img/gallery/gallery-list/gallery-list-6.jpg); background-position: 50% 50%"></div>
											
											<span class="gl-item-image-zoom"></span>
										</a>
										
										
										<ul class="gli-meta">
											
											<li>
												
												<div class="favorite-btn">
													<div class="fav-inner">
														<div class="icon-heart">
															<span class="icon-heart-empty"></span>
															<span class="icon-heart-filled"></span>
														</div>
													</div>
													<div class="fav-count">56</div>
												</div>
												
											</li>
										</ul>
										
									</div>
									
									
									
									<div class="gl-item-info">
										<div class="gl-item-caption">
											<h2 class="gl-item-title"><a href="gallery-single-grid.html">Something In The Water vol.2</a></h2>
											<span class="gl-item-category"><a href="albums-archive.html">Fashion</a>, <a href="albums-archive.html">Outdoor</a></span>
										</div>
									</div>
									
								</div>
								
							</div>
							
							
							<div class="isotope-item outdoor iso-height-1">
								
								<div class="gallery-list-item">
									
									<div class="gl-item-image-wrap">
										
										<a href="gallery-single-grid.html" class="gl-item-image-inner">
											<div class="gl-item-image bg-image" style="background-image: url(/assets/img/gallery/gallery-list/gallery-list-7.jpg); background-position: 50% 50%"></div>
											
											<span class="gl-item-image-zoom"></span>
										</a>
										
										
										<ul class="gli-meta">
											
											<li>
												
												<div class="favorite-btn">
													<div class="fav-inner">
														<div class="icon-heart">
															<span class="icon-heart-empty"></span>
															<span class="icon-heart-filled"></span>
														</div>
													</div>
													<div class="fav-count">53</div>
												</div>
												
											</li>
										</ul>
										
									</div>
									
									
									
									<div class="gl-item-info">
										<div class="gl-item-caption">
											<h2 class="gl-item-title"><a href="gallery-single-grid.html">Autumn Nights</a></h2>
											<span class="gl-item-category"><a href="albums-archive.html">Outdoor</a></span>
										</div>
									</div>
									
								</div>
								
							</div>
							
							
							<div class="isotope-item fashion iso-height-1">
								
								<div class="gallery-list-item">
									
									<div class="gl-item-image-wrap">
										
										<a href="gallery-single-grid.html" class="gl-item-image-inner">
											<div class="gl-item-image bg-image" style="background-image: url(/assets/img/gallery/gallery-list/gallery-list-8.jpg); background-position: 50% 50%"></div>
											
											<span class="gl-item-image-zoom"></span>
										</a>
										
										
										<ul class="gli-meta">
											
											<li>
												
												<div class="favorite-btn">
													<div class="fav-inner">
														<div class="icon-heart">
															<span class="icon-heart-empty"></span>
															<span class="icon-heart-filled"></span>
														</div>
													</div>
													<div class="fav-count">71</div>
												</div>
												
											</li>
										</ul>
										
									</div>
									
									
									
									<div class="gl-item-info">
										<div class="gl-item-caption">
											<h2 class="gl-item-title"><a href="gallery-single-grid.html">Beauty &amp; Fashion</a></h2>
											<span class="gl-item-category"><a href="albums-archive.html">Fashion</a></span>
										</div>
									</div>
									
								</div>
								
							</div>
							
							
							<div class="isotope-item black-and-white iso-height-1">
								
								<div class="gallery-list-item">
									
									<div class="gl-item-image-wrap">
										
										<a href="gallery-single-grid.html" class="gl-item-image-inner">
											<div class="gl-item-image bg-image" style="background-image: url(/assets/img/gallery/gallery-list/gallery-list-9.jpg); background-position: 50% 50%"></div>
											
											<span class="gl-item-image-zoom"></span>
										</a>
										
										
										<ul class="gli-meta">
											
											<li>
												
												<div class="favorite-btn">
													<div class="fav-inner">
														<div class="icon-heart">
															<span class="icon-heart-empty"></span>
															<span class="icon-heart-filled"></span>
														</div>
													</div>
													<div class="fav-count">68</div>
												</div>
												
											</li>
										</ul>
										
									</div>
									
									
									
									<div class="gl-item-info">
										<div class="gl-item-caption">
											<h2 class="gl-item-title"><a href="gallery-single-grid.html">No Colors This Time</a></h2>
											<span class="gl-item-category"><a href="albums-archive.html">Black &amp; White</a></span>
										</div>
									</div>
									
								</div>
								
							</div>
							
							
							<div class="isotope-item outdoor iso-height-1">
								
								<div class="gallery-list-item">
									
									<div class="gl-item-image-wrap">
										
										<a href="gallery-single-grid.html" class="gl-item-image-inner">
											<div class="gl-item-image bg-image" style="background-image: url(/assets/img/gallery/gallery-list/gallery-list-10.jpg); background-position: 50% 50%"></div>
											
											<span class="gl-item-image-zoom"></span>
										</a>
										
										
										<ul class="gli-meta">
											
											<li>
												
												<div class="favorite-btn">
													<div class="fav-inner">
														<div class="icon-heart">
															<span class="icon-heart-empty"></span>
															<span class="icon-heart-filled"></span>
														</div>
													</div>
													<div class="fav-count">32</div>
												</div>
												
											</li>
										</ul>
										
									</div>
									
									
									
									<div class="gl-item-info">
										<div class="gl-item-caption">
											<h2 class="gl-item-title"><a href="gallery-single-grid.html">Monday's Monochromes</a></h2>
											<span class="gl-item-category"><a href="albums-archive.html">Outdoor</a></span>
										</div>
									</div>
									
								</div>
								
							</div>
							
							
							<div class="isotope-item fashion portraits iso-height-1">
								
								<div class="gallery-list-item">
									
									<div class="gl-item-image-wrap">
										
										<a href="gallery-single-grid.html" class="gl-item-image-inner">
											<div class="gl-item-image bg-image" style="background-image: url(/assets/img/gallery/gallery-list/gallery-list-11.jpg); background-position: 50% 50%"></div>
											
											<span class="gl-item-image-zoom"></span>
										</a>
										
										
										<ul class="gli-meta">
											
											<li>
												
												<div class="favorite-btn">
													<div class="fav-inner">
														<div class="icon-heart">
															<span class="icon-heart-empty"></span>
															<span class="icon-heart-filled"></span>
														</div>
													</div>
													<div class="fav-count">13</div>
												</div>
												
											</li>
										</ul>
										
									</div>
									
									
									
									<div class="gl-item-info">
										<div class="gl-item-caption">
											<h2 class="gl-item-title"><a href="gallery-single-grid.html">Something In The Water</a></h2>
											<span class="gl-item-category"><a href="albums-archive.html">Fashion</a>, <a href="albums-archive.html">Portraits</a></span>
										</div>
									</div>
									
								</div>
								
							</div>
							
							
							<div class="isotope-item outdoor fashion iso-height-1">
								
								<div class="gallery-list-item">
									
									<div class="gl-item-image-wrap">
										
										<a href="gallery-single-grid.html" class="gl-item-image-inner">
											<div class="gl-item-image bg-image" style="background-image: url(/assets/img/gallery/gallery-list/gallery-list-12.jpg); background-position: 50% 50%"></div>
											
											<span class="gl-item-image-zoom"></span>
										</a>
										
										
										<ul class="gli-meta">
											
											<li>
												
												<div class="favorite-btn">
													<div class="fav-inner">
														<div class="icon-heart">
															<span class="icon-heart-empty"></span>
															<span class="icon-heart-filled"></span>
														</div>
													</div>
													<div class="fav-count">11</div>
												</div>
												
											</li>
										</ul>
										
									</div>
									
									
									
									<div class="gl-item-info">
										<div class="gl-item-caption">
											<h2 class="gl-item-title"><a href="gallery-single-grid.html">Beautiful Bride</a></h2>
											<span class="gl-item-category"><a href="albums-archive.html">Outdoor</a>, <a href="albums-archive.html">Fashion</a></span>
										</div>
									</div>
									
								</div>
								
							</div>
							
							
							<div class="isotope-item outdoor fashion iso-height-1">
								
								<div class="gallery-list-item">
									
									<div class="gl-item-image-wrap">
										
										<a href="gallery-single-grid.html" class="gl-item-image-inner">
											<div class="gl-item-image bg-image" style="background-image: url(/assets/img/gallery/gallery-list/gallery-list-13.jpg); background-position: 50% 50%"></div>
											
											<span class="gl-item-image-zoom"></span>
										</a>
										
										
										<ul class="gli-meta">
											
											<li>
												
												<div class="favorite-btn">
													<div class="fav-inner">
														<div class="icon-heart">
															<span class="icon-heart-empty"></span>
															<span class="icon-heart-filled"></span>
														</div>
													</div>
													<div class="fav-count">7</div>
												</div>
												
											</li>
										</ul>
										
									</div>
									
									
									
									<div class="gl-item-info">
										<div class="gl-item-caption">
											<h2 class="gl-item-title"><a href="gallery-single-grid.html">My Super Awesome Album</a></h2>
											<span class="gl-item-category"><a href="albums-archive.html">Outdoor</a>, <a href="albums-archive.html">Fashion</a></span>
										</div>
									</div>
									
								</div>
								
							</div>
							
							
							<div class="isotope-item portraits iso-height-1">
								
								<div class="gallery-list-item">
									
									<div class="gl-item-image-wrap">
										
										<a href="gallery-single-grid.html" class="gl-item-image-inner">
											<div class="gl-item-image bg-image" style="background-image: url(/assets/img/gallery/gallery-list/gallery-list-14.jpg); background-position: 50% 50%"></div>
											
											<span class="gl-item-image-zoom"></span>
										</a>
										
										
										<ul class="gli-meta">
											
											<li>
												
												<div class="favorite-btn">
													<div class="fav-inner">
														<div class="icon-heart">
															<span class="icon-heart-empty"></span>
															<span class="icon-heart-filled"></span>
														</div>
													</div>
													<div class="fav-count">23</div>
												</div>
												
											</li>
										</ul>
										
									</div>
									
									
									
									<div class="gl-item-info">
										<div class="gl-item-caption">
											<h2 class="gl-item-title"><a href="gallery-single-grid.html">One Day Shoot With Ordinary People</a></h2>
											<span class="gl-item-category"><a href="albums-archive.html">Portraits</a></span>
										</div>
									</div>
									
								</div>
								
							</div>
							
							
							<div class="isotope-item outdoor iso-height-1">
								
								<div class="gallery-list-item">
									
									<div class="gl-item-image-wrap">
										
										<a href="gallery-single-grid.html" class="gl-item-image-inner">
											<div class="gl-item-image bg-image" style="background-image: url(/assets/img/gallery/gallery-list/gallery-list-15.jpg); background-position: 50% 50%"></div>
											
											<span class="gl-item-image-zoom"></span>
										</a>
										
										
										<ul class="gli-meta">
											
											<li>
												
												<div class="favorite-btn">
													<div class="fav-inner">
														<div class="icon-heart">
															<span class="icon-heart-empty"></span>
															<span class="icon-heart-filled"></span>
														</div>
													</div>
													<div class="fav-count">6</div>
												</div>
												
											</li>
										</ul>
										
									</div>
									
									
									
									<div class="gl-item-info">
										<div class="gl-item-caption">
											<h2 class="gl-item-title"><a href="gallery-single-grid.html">The Beauty of Nature</a></h2>
											<span class="gl-item-category"><a href="albums-archive.html">Outdoor</a></span>
										</div>
									</div>
									
								</div>
								
							</div>
							
						</div>
						
						
						<div class="isotope-pagination">
							<div class="iso-load-more">
								<a class="btn btn-dark-bordered btn-lg" href="albums-grid.html">View More</a>
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
