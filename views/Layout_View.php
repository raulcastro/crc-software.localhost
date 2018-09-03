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
    <html class="wide wow-animation" lang="en">

    <head>
        <title>
            <?php echo $this->data['seo']['title']; ?>
        </title>
        <meta name="format-detection" content="telephone=no">
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta charset="utf-8">
        <link rel="icon" href="images/favicon.ico" type="image/x-icon">
        <?php 
            echo self::getCommonStyle();
        ?>
    </head>

    <body>
        <!-- Page -->
        <div class="page">
            <div id="page-loader">
                <div class="cssload-container">
                    <div class="cssload-speeding-wheel"></div>
                </div>
            </div>
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
                            echo self::getIndexSwipper();
                            echo self::getIndexServices();
                            echo self::getIndexBanner();
                            echo self::getIndexMoreServices();
                            echo self::getIndexPortfolio();
                            echo self::getIndexContact();
        				    break;
        				    
                        case 'nosotros':
                            echo self::getBreadcrumbsAboutES();
                            echo self::getWhoWeAreTextAboutES();
                            echo self::getWhoWeAreColumnsAboutES();
                            echo self::getOurTeamAboutES();
                        break;
                        
                        case 'contact':
                            echo self :: getIndexContact();
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
            <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Libre+Franklin:200,300,500,600,300italic">
            <link rel="stylesheet" href="/css/bootstrap.css">
            <link rel="stylesheet" href="/css/style.css">
            <!--[if lt IE 10]>
            <div style="background: #212121; padding: 10px 0; box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3); clear: both; text-align:center; position: relative; z-index:1;"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
            <script src="js/html5shiv.min.js"></script>
        	<![endif]-->
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
        <script src="/js/core.min.js"></script>
        <script src="/js/script.js"></script>
        <?php
        	$scripts = ob_get_contents();
        	ob_end_clean();
        	return $scripts;
    }
    
    public function getGoogleAnalytics()
	{
		ob_start();
		?>
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
        <header class="page-header">
            <!-- RD Navbar-->
            <div class="rd-navbar-wrap">
                <nav class="rd-navbar" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-sm-device-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-device-layout="rd-navbar-fixed" data-xl-device-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-stick-up-clone="false" data-sm-stick-up="true" data-md-stick-up="true" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true" data-md-stick-up-offset="69px" data-lg-stick-up-offset="1px" data-body-class="rd-navbar-default-linked">
                    <div class="rd-navbar-inner">
                        <!-- RD Navbar Panel-->
                        <div class="rd-navbar-panel">
                            <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                            <!-- RD Navbar Brand-->
                            <div class="rd-navbar-brand">
                                <a class="brand-name" href="index.html"><img src="images/CRCazul.png" alt="" width="174" height="32" /></a>
                            </div>
                        </div>
                        <!-- RD Navbar Nav-->
                        <div class="rd-navbar-nav-wrap">
                            <ul class="rd-navbar-nav">
                                <li class="active"><a href="/">Inicio</a></li>

                                <li><a href="/nosotros/">Nosotros</a></li>
                                <li><a href="services.html">Servicios</a></li>
                                <li><a href="contacts.html">Contacto</a></li>
                                <li><a href="portfolio.html">Portfolio</a>
                                    <li><a href="grid-blog.html">BLOG</a>
                            </ul>
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
        <footer class="footer-corporate">
            <div class="container">
                <div class="footer-corporate__inner">
                    <p class="rights"><span>CRC-SOFTWARE</span><span>&nbsp;</span><span id="copyright-year"></span>.
                    </p>
                </div>
            </div>
        </footer>
        <!-- Global Mailform Output-->
    		<div class="snackbars" id="form-output-global"></div>
        <?php
        $footer = ob_get_contents();
        ob_end_clean();
        return $footer;
    }
    
    public function getIndexSwipper()
    {
        ob_start();
        ?>
        <!-- Swiper-->
        <section>
            <div class="swiper-container swiper-slider swiper-slider_fullheight" data-simulate-touch="false" data-loop="false" data-autoplay="5500">
                <div class="swiper-wrapper">
                    <div class="swiper-slide bg-gray-lighter" data-slide-bg="images/slider1.jpg">
                        <div class="swiper-slide-caption text-center">
                            <div class="container">
                                <h1 data-caption-animate="fadeInUpSmall"> <span class="slider"></span><sup class="text-accent"></sup></h1>
                                <h3 data-caption-animate="fadeInUpSmall" data-caption-delay="200"></h3>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide swiper-slide_video context-dark video-bg-overlay">
                        <!-- RD Video-->
                        <div class="swiper-slide bg-gray-lighter" data-slide-bg="images/security.jpg">
                            <!--<div class="vide_bg" data-vide-bg="video/video-lg" data-vide-options="posterType: jpg">-->
                            <div class="swiper-slide-caption text-center">
                                <div class="container">
                                    <h2 data-caption-animate="fadeInUpSmall">CRC SOFTAWARE</h2>
                                    <p class="text-width-2 block-centered" data-caption-animate="fadeInUpSmall" data-caption-delay="200"><sup>No solo creamos aplicaciones de software. Proporcionamos soporte y alojamiento, ayudando a que su sistema funcione y a que sus usuarios estén contentos todo el tiempo que nos necesite. Incluso asumiremos software que no hemos creado, lo solucionaremos, lo mantendremos y lo ayudaremos a llevar su proyecto al siguiente nivel.</sup></p>
                                    <div class="group-lg group-middle"><a class="button button-black" data-caption-animate="fadeInUpSmall" data-caption-delay="350" href="services.html" data-custom-scroll-to="section-see-features">Servicios</a><a class="button button-primary" data-caption-animate="fadeInUpSmall" data-caption-delay="350" href="contacts.html">Contacto</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Swiper Pagination-->
                <div class="swiper-pagination"></div>
                <!-- Swiper Navigation-->
                <div class="swiper-button-prev linear-icon-chevron-left"></div>
                <div class="swiper-button-next linear-icon-chevron-right"></div>
            </div>
        </section>
        <?php
        $method = ob_get_contents();
        ob_end_clean();
        return $method;
    }
    
    public function getIndexContact()
    {
        ob_start();
        ?>
        <!-- Get in touch-->
        <section class="pre-footer-corporate">
            <div class="container">
                <h3>Contacto</h3>
                <div class="row justify-content-sm-center justify-content-lg-start">
                    <div class="col-sm-10 col-md-6 col-lg-4 col-xl-3">
                        <ul class="list-xs">
                            <li>
                                <dl class="list-terms-minimal">
                                    <dt>Telefono</dt>
                                    <dd>
                                        <ul class="list-semicolon">
                                            <li><a href="callto:#">(045) 984-131-4389</a></li>
                                            <li><a href="callto:#">(045) 984-254-9271</a></li>
                                        </ul>
                                    </dd>
                                </dl>
                            </li>
                            <li>
                                <dl class="list-terms-minimal">
                                    <dt>Horario de atencion</dt>
                                    <dd>lun-sab: 10 am-8 pm</dd>
                                </dl>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-10 col-md-6 col-lg-5 col-xl-3">
                        <ul class="list-xs">
                            <li>
                                <dl class="list-terms-minimal">
                                    <dt>Ubicacion</dt>
                                    <dd>Playa del Carmen, Quintana Roo. Mexico.</dd>
                                </dl>
                            </li>
                        </ul>
                    </div>

                    <div class="col-sm-10 col-md-6 col-lg-5 col-xl-3">
                        <ul class="list-xs">
                            <li>
                                <dl class="list-terms-minimal">
                                    <dt>E-mail</dt>
                                    <dd><a href="mailto:#">info@crc-software</a></dd>
                                </dl>
                            </li>
                        </ul>
                    </div>

                    <div class="col-sm-10 col-md-6 col-lg-4 col-xl-3">

                        <ul class="list-inline-xxs">
                            <li>
                                <a class="icon icon-xxs icon-primary fa fa-facebook" href="services.html#"></a>
                            </li>
                            <li>
                                <a class="icon icon-xxs icon-primary fa fa-twitter" href="services.html#"></a>
                            </li>
                            <li>
                                <a class="icon icon-xxs icon-primary fa fa-instagram" href="services.html#"></a>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>

        </section>
        
        <?php
        $method = ob_get_contents();
        ob_end_clean();
        return $method;
    }
    
    public function getIndexServices()
    {
        ob_start();
        ?>
        <!-- Presentation -->
        <section class="section-xl bg-default text-center" id="section-see-features">
            <div class="container">
                <div class="row justify-content-lg-center">
                    <div class="col-lg-10 col-xl-8">
                        <h3 class="">Nuestros Servicios</h3>
                        <p>Diseñamos, desarrollamos y entregamos soluciones de software a medida de alta tecnología para pymes, empresas, emprendimientos financiados y emprendimientos.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- The Power of Bootstrap Toolkit-->
        <section class="bg-gray-lighter object-wrap">
            <div class="section-xxl section-xxl_bigger">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <h3 class="">Software operacional</h3>
                            <p>Si está buscando una compañía confiable y de buena reputación para construir su software operativo a medida, ha encontrado la compañía adecuada.</p>
                            <a class="button button-gray-light-outline" href="services.html">Ver mas</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="object-wrap__body object-wrap__body-sizing-1 object-wrap__body-md-right bg-image" style="background-image: url(images/ep-img1.jpg)"></div>
        </section>
        <!-- Content Driven Design-->
        <section class="negro section-xl bg-default">
            <div class="container">
                <div class="row justify-content-md-center flex-lg-row-reverse align-items-lg-center justify-content-lg-between row-50">
                    <div class="col-md-9 col-lg-5">
                        <h3>Desarrollo de productos</h3>
                        <p>podemos diseñar soluciones basadas en la nube o de contracción para productos verticales múltiples para licencias o reventa.</p>
                        <a class="button button-gray-light-outline" href="services.html">Ver mas</a>
                    </div>
                    <div class="col-md-9 col-lg-6"><img src="images/crc4.jpg" alt="" width="652" height="491" />
                    </div>
                </div>
            </div>
        </section>
        <?php
        $method = ob_get_contents();
        ob_end_clean();
        return $method;
    }

    public function getIndexBanner()
    {
        ob_start();
        ?>
        <!-- Blurbs-->
        <section class="section-xl bg-gray-lighter">
            <div class="container">
                <div class="row row-50">
                    <div class="col-md-12 col-lg-12">
                        <h4><img src="images/solutions-web.jpg"></h4>
                        <!-- Blurb minimal-->

                    </div>
                </div>
            </div>
        </section>
        <?php
        $method = ob_get_contents();
        ob_end_clean();
        return $method;
    }
    
    public function getIndexMoreServices()
    {
        ob_start();
        ?>
        <!-- GPL3 License advantages-->
        <section class="negro section-xl bg-default">
            <div class="container">
                <div class="row row-50 align-items-lg-center justify-content-lg-between">
                    <div class="col-lg-5">
                        <h3 class="">Aplicaciones web y móviles</h3>
                        <p>Si tienes un nuevo proyecto, deje que CRC te ayude con el aspecto más desafiante de comenzar un negocio: Desarrollar su aplicación de software.</p>
                        <a class="button button-gray-light-outline" href="services.html">Ver mas</a>
                    </div>
                    <div class="col-lg-6">
                        <div class="row gallery-wrap">
                            <div class="col-6"><img src="images/crc2.jpg" alt="" width="301" height="227" />
                            </div>
                            <div class="col-6"><img src="images/home-default-4-301x227.jpg" alt="" width="301" height="227" />
                            </div>
                            <div class="col-6"><img src="images/crc6.jpg" alt="" width="301" height="227" />
                            </div>
                            <div class="col-6"><img src="images/app-mobile.jpg" alt="" width="301" height="227" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
        $method = ob_get_contents();
        ob_end_clean();
        return $method;
    }
    
    public function getIndexPortfolio()
    {
        ob_start();
        ?>
        <!-- Gallery-->
        <section class="bg-gray-dark text-center">
            <!-- RD Parallax-->
            <div class="parallax-container bg-image rd-parallax-light" data-parallax-img="images/parallax-01.jpg">
                <div class="parallax-content">
                    <div class="container section-xxl">
                        <h2>PORTAFOLIO</h2>
                        <!--<p></p><a class="button button-primary" href="index.html#">View now!</a>-->
                    </div>
                </div>
            </div>

            <!--<section class="section-xl bg-default" data-lightgallery="group">-->
            <div class="container-fluid">
                <div class="row row-10 row-horizontal-10">
                    <div class="col-md-4 col-xl-3">
                        <a class="thumb-modern" data-lightgallery="item" href="images/image-original-1-1200x905.jpg">
                            <figure><img src="images/home-default-7-472x355.jpg" alt="" width="472" height="355" />
                            </figure>
                            <div class="thumb-modern__overlay"></div>
                        </a>
                    </div>
                    <div class="col-md-4 col-xl-3">
                        <a class="thumb-modern" data-lightgallery="item" href="images/image-original-2-1200x905.jpg">
                            <figure><img src="images/home-default-8-472x355.jpg" alt="" width="472" height="355" />
                            </figure>
                            <div class="thumb-modern__overlay"></div>
                        </a>
                    </div>
                    <div class="col-md-4 col-xl-3">
                        <a class="thumb-modern" data-lightgallery="item" href="images/image-original-3-1200x906.jpg">
                            <figure><img src="images/home-default-9-472x355.jpg" alt="" width="472" height="355" />
                            </figure>
                            <div class="thumb-modern__overlay"></div>
                        </a>
                    </div>
                    <div class="col-md-4 col-xl-3">
                        <a class="thumb-modern" data-lightgallery="item" href="images/image-original-4-1200x905.jpg">
                            <figure><img src="images/home-default-10-472x355.jpg" alt="" width="472" height="355" />
                            </figure>
                            <div class="thumb-modern__overlay"></div>
                        </a>
                    </div>
                    <div class="col-md-4 col-xl-3">
                        <a class="thumb-modern" data-lightgallery="item" href="images/image-original-5-1200x905.jpg">
                            <figure><img src="images/home-default-11-472x355.jpg" alt="" width="472" height="355" />
                            </figure>
                            <div class="thumb-modern__overlay"></div>
                        </a>
                    </div>
                    <div class="col-md-4 col-xl-3">
                        <a class="thumb-modern" data-lightgallery="item" href="images/image-original-6-1200x905.jpg">
                            <figure><img src="images/home-default-12-472x355.jpg" alt="" width="472" height="355" />
                            </figure>
                            <div class="thumb-modern__overlay"></div>
                        </a>
                    </div>
                    <div class="col-md-4 col-xl-3">
                        <a class="thumb-modern" data-lightgallery="item" href="images/image-original-7-1200x906.jpg">
                            <figure><img src="images/home-default-13-472x355.jpg" alt="" width="472" height="355" />
                            </figure>
                            <div class="thumb-modern__overlay"></div>
                        </a>
                    </div>
                    <div class="col-md-4 col-xl-3">
                        <a class="thumb-modern" data-lightgallery="item" href="images/image-original-8-1200x906.jpg">
                            <figure><img src="images/home-default-14-472x355.jpg" alt="" width="472" height="355" />
                            </figure>
                            <div class="thumb-modern__overlay"></div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <?php
        $method = ob_get_contents();
        ob_end_clean();
        return $method;
    }
    
    public function getIndexBlog()
    {
        ob_start();
        ?>
        <!-- Post Your Latest News-->

        <section class="negro bg-default section-lg">
            <div>
                <h2 class="slider blog">BLOG</h2>
            </div>
            <div class="container">
                <div class="row row-60">

                    <div class="col-md-6 col-xl-4">
                        <!-- Post classic-->
                        <article class="post-classic post-minimal"><img src="images/post-minimal-1-418x315.jpg" alt="" width="418" height="315" />
                            <div class="post-classic-title">
                                <h5><a href="image-post.html">¿Qué es una aplicación web?</a></h5>
                            </div>
                            <div class="post-meta">
                                <div class="group">
                                    <a href="image-post.html">
                                        <time datetime="2017">Ago.20, 2018</time></a><a class="meta-author" href="image-post.html">por Raul Catro</a></div>
                            </div>
                        </article>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <!-- Post classic-->
                        <article class="post-classic post-minimal"><img src="images/post-classic-1-886x668.jpg" alt="" width="886" height="668" />
                            <div class="post-classic-title">
                                <h5><a href="image-post.html">Getting to another  level of design and functionality.</a></h5>
                            </div>
                            <div class="post-meta">
                                <div class="group">
                                    <a href="image-post.html">
                                        <time datetime="2017">Jan.20, 2016</time></a><a class="meta-author" href="image-post.html">by Brian Williamson</a></div>
                            </div>
                        </article>
                    </div>

                    <div class="col-md-6 col-xl-4">
                        <!-- Post classic-->
                        <article class="post-classic post-minimal"><img src="images/post-minimal-1-418x315.jpg" alt="" width="418" height="315" />
                            <div class="post-classic-title">
                                <h5><a href="image-post.html">10 Reasons to Buy Monstroid<sup>2</sup>.</a></h5>
                            </div>
                            <div class="post-meta">
                                <div class="group">
                                    <a href="image-post.html">
                                        <time datetime="2017">Jan.20, 2016</time></a><a class="meta-author" href="image-post.html">by Brian Williamson</a></div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </section>
        <?php
        $method = ob_get_contents();
        ob_end_clean();
        return $method;
    }
    
    public function getBreadcrumbsAboutES()
    {
        ob_start();
        ?>
        <section class="breadcrumbs-custom">
            <div class="container">
                <div class="breadcrumbs-custom__inner">
                    <p class="breadcrumbs-custom__title">Nosotros</p>
                    <!--<ul class="breadcrumbs-custom__path">
              <li><a href="index.html">Home</a></li>
              <li><a href="about.html#">Pages</a></li>
              <li class="active">About</li>
            </ul>-->
                </div>
            </div>
        </section>
        <?php
        $method = ob_get_contents();
        ob_end_clean();
        return $method;
    }
    
    public function getWhoWeAreTextAboutES()
    {
        ob_start();
        ?>
        <section class="text-center">
            <!-- RD Parallax-->
            <div class="parallax-container bg-image parallax-header rd-parallax-light" data-parallax-img="images/crc.jpg">
                <div class="parallax-content">
                    <div class="parallax-header__inner">
                        <div class="parallax-header__content">
                            <div class="container">
                                <div class="row justify-content-sm-center">
                                    <div class="col-md-10 col-xl-8">
                                        <h2>Quiénes somos y qué hacemos?</h2>
                                        <p>Somos CRC-Software, una de las compañías de desarrollo de software a medida. Diseñamos aplicaciones web inteligentes, rentables e intuitivas, aplicaciones de escritorio y aplicaciones móviles que ayudan a optimizar los procesos para las empresas, así como a crear nuevas fuentes de ingresos para empresas nuevas y establecidas.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
        $method = ob_get_contents();
        ob_end_clean();
        return $method;
    }
    
    public function getWhoWeAreColumnsAboutES()
    {
        ob_start();
        ?>
        <section class="section-lg bg-default">
            <div class="container">
                <div class="row row-50">
                    <div class="col-md-6">
                        <h3>Nuestro enfoque para software a medida</h3>
                        <p>Adoptamos un enfoque único al fusionar los métodos tradicionales y los nuevos para desarrollar software de calidad a gran velocidad, al mismo tiempo que conservamos nuestro toque personal y nuestra actitud exigente con la planificación.</p>
                    </div>
                    <div class="col-md-6">
                        <h3>Agenda tu cita</h3>
                        <p>Nos encanta conocer clientes potenciales o existentes. Llámenos y conozca al equipo que analiza, visualiza, crea y prueba su software, así como la demostración de algunos de nuestros productos únicos y emocionantes.</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="bg-accent">
            <div class="container">
                <div class="row justify-content-md-center align-items-lg-end">
                    <div class="col-md-8 col-lg-6 section-xl">
                        <h3>Desarrollo de software de confianza</h3>
                        <p>En CRC-Software hemos acumulado experiencia considerable en una variedad de sectores: públicos y privados, enfocados en los consumidores y las empresas y sin fines de lucro. Hemos ayudado a empresas que van desde empresas nuevas y empresas, pequeñas empresas administradas por sus propietarios hasta grandes organizaciones públicas</p><a class="button button-gray-light-outline" href="about.html#">Contactanos</a>
                    </div>
                    <div class="col-md-8 col-lg-6">
                        <div class="cat-img-group">
                            <div><img src="images/cat-2-507x508.jpg" alt="" width="507" height="508" />
                            </div>
                            <div><img src="images/cat-1-326x427.jpg" alt="" width="326" height="427" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
        $method = ob_get_contents();
        ob_end_clean();
        return $method;
    }
    
    public function getOurTeamAboutES()
    {
        ob_start();
        ?>
        <section class="section-lg bg-default text-center">
            <div class="container">
                <h3>Nuestro equipo de trabajo</h3>
                <p>El equipo de CRC-Software mezcla todos los ingredientes que consideramos necesarios para una empresa de desarrollo de software exitosa. Contamos con desarrolladores de software. Mentes analíticas que pueden comprender los matices de los negocios de nuestros clientes, los gerentes y diseñadores metódicos de proyectos, la gestión dirigida con un enfoque de calidad y entrega, y los innovadores que transforman la forma en que vemos las cosas.</p>
                <div class="row row-50 justify-content-sm-center">
                    <div class="col-md-6 col-lg-4">
                        <!-- Thumb corporate-->
                        <div class="thumb thumb-corporate">
                            <div class="thumb-corporate__main"><img src="images/brian-king-480x362.jpg" alt="" width="480" height="362" />
                                <div class="thumb-corporate__overlay">
                                    <ul class="list-inline-sm thumb-corporate__list">
                                        <li>
                                            <a class="icon-sm fa-facebook icon" href="about.html#"></a>
                                        </li>
                                        <li>
                                            <a class="icon-sm fa-twitter icon" href="about.html#"></a>
                                        </li>
                                        <li>
                                            <a class="icon-sm fa-google-plus icon" href="about.html#"></a>
                                        </li>
                                        <li>
                                            <a class="icon-sm fa-vimeo icon" href="about.html#"></a>
                                        </li>
                                        <li>
                                            <a class="icon-sm fa-youtube icon" href="about.html#"></a>
                                        </li>
                                        <li>
                                            <a class="icon-sm fa-pinterest-p icon" href="about.html#"></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="thumb-corporate__caption">
                                <p class="thumb__title"><a href="team-member-profile.html">Raul Catro</a></p>
                                <p class="thumb__subtitle">Director</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <!-- Thumb corporate-->
                        <div class="thumb thumb-corporate">
                            <div class="thumb-corporate__main"><img src="images/amanda-smith-480x362.jpg" alt="" width="480" height="362" />
                                <div class="thumb-corporate__overlay">
                                    <ul class="list-inline-sm thumb-corporate__list">
                                        <li>
                                            <a class="icon-sm fa-facebook icon" href="about.html#"></a>
                                        </li>
                                        <li>
                                            <a class="icon-sm fa-twitter icon" href="about.html#"></a>
                                        </li>
                                        <li>
                                            <a class="icon-sm fa-google-plus icon" href="about.html#"></a>
                                        </li>
                                        <li>
                                            <a class="icon-sm fa-vimeo icon" href="about.html#"></a>
                                        </li>
                                        <li>
                                            <a class="icon-sm fa-youtube icon" href="about.html#"></a>
                                        </li>
                                        <li>
                                            <a class="icon-sm fa-pinterest-p icon" href="about.html#"></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="thumb-corporate__caption">
                                <p class="thumb__title"><a href="team-member-profile.html">Cynthia Gonzalez</a></p>
                                <p class="thumb__subtitle">Web Developer</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <!-- Thumb corporate-->
                        <div class="thumb thumb-corporate">
                            <div class="thumb-corporate__main"><img src="images/george-nelson-418x315.jpg" alt="" width="418" height="315" />
                                <div class="thumb-corporate__overlay">
                                    <ul class="list-inline-sm thumb-corporate__list">
                                        <li>
                                            <a class="icon-sm fa-facebook icon" href="about.html#"></a>
                                        </li>
                                        <li>
                                            <a class="icon-sm fa-twitter icon" href="about.html#"></a>
                                        </li>
                                        <li>
                                            <a class="icon-sm fa-google-plus icon" href="about.html#"></a>
                                        </li>
                                        <li>
                                            <a class="icon-sm fa-vimeo icon" href="about.html#"></a>
                                        </li>
                                        <li>
                                            <a class="icon-sm fa-youtube icon" href="about.html#"></a>
                                        </li>
                                        <li>
                                            <a class="icon-sm fa-pinterest-p icon" href="about.html#"></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="thumb-corporate__caption">
                                <p class="thumb__title"><a href="team-member-profile.html">Arian Falcon</a></p>
                                <p class="thumb__subtitle">Disenador Grafico</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
        $method = ob_get_contents();
        ob_end_clean();
        return $method;
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
