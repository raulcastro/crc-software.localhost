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
            <?php echo $this->data['seo']['title']; ?>
        </title>
        <meta name="format-detection" content="telephone=no">
        <meta name="description" content="<?php echo $this->data['seo']['description']; ?>">
        <meta name="keywords" content="<?php echo $this->data['seo']['keywords']; ?>">
        <link rel="icon" href="/images/favicon/favicon.ico" type="image/x-icon">
        <?php 
            echo self::getCommonStyle();
        ?>
    </head>

    <body>
        <!-- Page -->
        <div class="page">
            <!--<div id="page-loader">
                <div class="cssload-container">
                    <div class="cssload-speeding-wheel"></div>
                </div>
            </div>-->
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
                            echo self::getIndexContact();
                        break;
                        
                        case 'servicios':
                            echo self::getBanerServicesES();
                            echo self::getGridServicesOneES();
                            echo self::getTextSectionOneServicesES();
                            echo self::getGridServicesTwoES();
                            echo self::getTextSectionTwoServicesES();
                            echo self::getGridServicesThreeES();
                            echo self::getIndexContact();
                        break;
                                
                        case 'aplicaciones':
                            echo self::getAplicacionesParalax();
                            echo self::getContenAplicaciones();
                            echo self::getIndexContact();
                        break;
                                
                        case 'desarrollo-web':
                            echo self::getDesarrolloWeb();
                            echo self::getContenidoWeb();
                            echo self::getIndexContact();
                        break;
                        
                        case 'aplicaciones-moviles':
                            echo self::getMovil();
                            echo self::getContenidoApp();
                            echo self::getIndexContact();
                        break;
                        
                        case 'base-de-datos':
                            echo self::getBaseDatos();
                            echo self::getContenidoDatos();
                            echo self::getIndexContact();
                        break;
                        
                        case 'sistema-crm':
                            echo self::getSistema();
                            echo self::getContenidoCRM();
                            echo self::getIndexContact();
                        break;
                        
                        case 'migracion-de-datos':
                            echo self::getMigracion();
                            echo self::getContenidoMigracion();
                            echo self::getIndexContact();
                        break;
                        
                        case 'sistemas-operacionales':
                            echo self::getOperacional();
                            echo self::getContenidoOperacional();
                            echo self::getIndexContact();
                        break;
                                
                         case 'modernizacion-software':
                            echo self::getModernizacion();
                            echo self::getContenidoSoftware();
                            echo self::getIndexContact();
                        break;
                                
                        case 'consultoria-software':
                            echo self::getConsultoria();
                            echo self::getContenidoConsultoria();
                            echo self::getIndexContact();
                        break;
                            
                        case 'rescate-software':
                            echo self::getRescateSoftware();
                            echo self::getContenidoRescate();
                            echo self::getIndexContact();
                        break;
                            
                        case 'recuperacion-codigo':
                            echo self::getRecuperacionCodigo();
                            echo self::getContenidoCodigo();
                            echo self::getIndexContact();
                        break;
                                
                        case 'soporte-de-aplicaciones':
                            echo self::getSoporteAplicaciones();
                            echo self::getContenidoSoporte();
                            echo self::getIndexContact();
                        break;
                            
                        case 'hosting':
                            echo self::getHosting();
                            echo self::getContenidoHosting();
                            echo self::getIndexContact();
                        break;
                            
                        case 'desarrollo-de-software':
                            echo self::getSoftware();
                            echo self::getContenidoDe();
                            echo self::getIndexContact();
                        break;
                                
                        case 'contacto':
                            echo self::getContactFormES();
                        break;
                        
                        case 'portafolio':
                            echo self::getPortfolioES();
                            echo self::getIndexContact();
                        break;
                        
                        case 'blog':
                            echo self::getBlog();
                            echo self::getIndexContact();
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
            <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Libre+Franklin:200,300,500,600,300italic">
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
                                <a class="brand-name" href="/"><img src="<?php echo $this->data['info']['url']; ?>/images/CRCazul.png" alt="" width="174" height="32" /></a>
                            </div>
                        </div>
                        <!-- RD Navbar Nav-->
                        <div class="rd-navbar-nav-wrap">
                            <ul class="rd-navbar-nav">
                                <li class="active"><a href="/">Inicio</a></li>

                                <li><a href="/nosotros/">Nosotros</a></li>
                                <li><a href="/servicios/">Servicios</a></li>
                                
                                <!--<li><a href="/portafolio/">Portafolio</a>-->
                                <li><a href="/#/">Blog</a>
                                <li><a href="/contacto/">Contacto</a></li>
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
    
    public function getAplicacionesParalax()
    {
        ob_start();
        ?>
        <section class="text-center">
        <!-- RD Parallax-->
        <div class="parallax-container bg-image parallax-header rd-parallax-light" data-parallax-img="/images/parallax-05.jpg">
          <div class="parallax-content">
            <div class="parallax-header__inner">
              <div class="parallax-header__content">
                <div class="container">
                  <div class="row justify-content-sm-center">
                    <div class="col-md-10 col-xl-8">
                      <h2>Desarrollo de aplicaciones empresariales a medida de CRC</h2>
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
    
    public function getContenAplicaciones()
    {
        ob_start();
        ?>
        <section class="section-lg bg-default text-center">
        <div class="container">
          <div class="row row-50 justify-content-sm-center">
            <div class="col-md-10">
              <h3>Desarrollo de aplicaciones empresariales a medida de CRC</h3>
              <p class="texto">Ya sea que necesite un sistema para mejorar su servicio al cliente, aumentar la efectividad de su negocio, optimizar sus procesos o aumentar sus ventas (ya sea a través de la experiencia del cliente front-end o de back-end), podemos crear aplicaciones comerciales inteligentes, rentables e intuitivas para ayudarte.

            Trabajaremos con usted para comprender sus procesos comerciales y el desafío que está tratando de resolver, y luego le sugeriremos el tipo de desarrollo de aplicaciones que funcionaría mejor para usted, como por ejemplo:</p>
                <ul class="list-marked texto">
                <li>una aplicación alojada, basada en la web con una base de datos remota, local, sincronizada o multi-tenant back-end de la base de datos</li>
                <li>un sitio web alojado, front-end impulsado por una base de datos</li>
                <li>una aplicación alojada, basada en web con un sistema CRM integral</li>
                <li>una combinación de sistemas front-end, back-end y portal de proveedor / cliente alojados</li>
                <li>una aplicación de escritorio con bases de datos remotas (en la nube) o bases de datos locales que se pueden sincronizar / replicar con sistemas centrales de bases de datos</li>
                <li>aplicaciones para dispositivos móviles y tabletas con bases de datos locales y en la nube</li>
              </ul>
            </div>
            <!--div class="col-md-10">
              <h5>Las aplicaciones a medida que hemos creado incluyen:</h5>
              <p class="texto"></p>
                <ul class="list-marked texto">
                <li><strong>Mensajeria Segura</strong></li>
                <li><strong>Clientes que pueden iniciar sesión desde la oficina, el hogar o un móvil: acceso más rápido a lo que necesitan, cuando lo deseen</strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                </ul><br><br>
                
                <h5></h5>
                <p class="texto"></p><br><br><br>
                
              </div>-->
          </div>
        </div>
      </section>
        
        <?php
        $header = ob_get_contents();
        ob_end_clean();
        return $header;
    }
    
    
    public function getDesarrolloWeb()
    {
        ob_start();
        ?>
        <section class="text-center">
        <!-- RD Parallax-->
        <div class="parallax-container bg-image parallax-header rd-parallax-light" data-parallax-img="/images/parallax-05.jpg">
          <div class="parallax-content">
            <div class="parallax-header__inner">
              <div class="parallax-header__content">
                <div class="container">
                  <div class="row justify-content-sm-center">
                    <div class="col-md-10 col-xl-8">
                      <h2> Desarrollo de sitios web</h2>
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
    
    public function getContenidoWeb()
        {
        ob_start();
        ?>
        <section class="section-lg bg-default text-center">
        <div class="container">
          <div class="row row-50 justify-content-sm-center">
            <div class="col-md-10">
              <h3>¿Qué es una aplicación web?</h3>
              <p class="texto">
                  Una aplicación web es un programa de software que utiliza con un navegador de Internet, de la misma manera que una aplicación móvil es un programa de software que utiliza en su dispositivo móvil.<br>
                  Los últimos años han visto una proliferación de aplicaciones web. Lo más probable es que su popularidad se deba a su facilidad de uso: cualquier persona con un navegador conectado a Internet puede acceder a ellos, atienden las necesidades de los usuarios móviles (ya que los teléfonos inteligentes son la principal forma en que las personas acceden a Internet). y se pueden implementar rápidamente y casi sin necesidad de instalación por parte del usuario.<br>
                  Si necesita una aplicación web interna para ayudar a administrar los gastos del personal, una aplicación web que puede revender a sus clientes o una que revolucionará su servicio al cliente, trabajaremos con usted para construir rápida e inteligentemente una herramienta potente e intuitiva.<br>
                  A partir de ahí, es un proceso simple que comienza cuando nos sentamos con usted para comprender su negocio, lo que su nueva aplicación necesita poder entregar y a quién. Las posibles opciones incluyen:
                </p>
                <ul class="list-marked texto">
                <li> Una aplicación web alojada con un back-end de base de datos remoto, local, sincronizado o multitendado</li>
                <li> Una combinación de sistemas de front-end, back-end.</li>
                <li> Una aplicación web que incluye un completo back-end CRM</li>
                <li> Una aplicación web que complementa un nuevo sitio web o el existente</li>
                <li> Permitir a los usuarios agregar nuevos campos, definir cuadros desplegables, crear nuevos formularios y generar informes personalizados según sea necesario</li>
                <li> Fuentes diarias de datos de múltiples bases de datos para asegurarse de que la aplicación siempre use la información correcta y actualizada del cliente</li>
                <li> Usar permisos de acuerdo con el rol de una persona y los derechos de acceso</li>
               
              </ul>
            </div>
            <div class="col-md-10">
              <h3>Aplicaciones web responsivas</h3>
              <p class="texto">
                Como era de esperar, todas las aplicaciones web que construimos son "receptivas". Esto significa que se ven muy bien y funcionan perfectamente en cualquier tamaño de pantalla: una PC de escritorio, tableta o teléfono móvil. Hacemos esto adaptando menús, controles y otros elementos visuales para que se ajusten al dispositivo en función del ancho y alto de la pantalla actual, asegurando que el usuario siempre obtenga la mejor experiencia posible, independientemente del dispositivo que esté usando. Puede ver esto en acción cambiando el tamaño de la ventana en este sitio web o visitándola en su teléfono inteligente; vea cómo todo “simplemente funciona”.
                </p>
                <!--<ul class="list-marked texto">
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                </ul><br><br>
                
                <h5></h5>
                <p class="texto"></p><br><br><br>-->
                
              </div>
          </div>
        </div>
      </section>
        <?php
        $header = ob_get_contents();
        ob_end_clean();
        return $header;
    }
    
    public function getMovil()
    {
        ob_start();
        ?>
        <section class="text-center">
        <!-- RD Parallax-->
        <div class="parallax-container bg-image parallax-header rd-parallax-light" data-parallax-img="/images/parallax-05.jpg">
          <div class="parallax-content">
            <div class="parallax-header__inner">
              <div class="parallax-header__content">
                <div class="container">
                  <div class="row justify-content-sm-center">
                    <div class="col-md-10 col-xl-8">
                      <h2>Desarrollo de aplicaciones web</h2>
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
    
    public function getContenidoApp()
    {
        ob_start();
        ?>
        <section class="section-lg bg-default text-center">
        <div class="container">
          <div class="row row-50 justify-content-sm-center">
            <div class="col-md-10">
              <h3>Expertos desarrolladores de aplicaciones móviles</h3>
              <p class="texto">
                  No hay duda de que una aplicación móvil concebida estratégicamente puede obtener grandes recompensas a la hora de establecer relaciones con sus clientes, pero como el 73% de los usuarios espera que una aplicación móvil sea más fácil de usar que un sitio web móvil, es importante que esté al día. - Ahí es donde podemos ayudarte.<br>

                  Mientras creará el concepto detrás de la aplicación móvil, podemos proporcionar un enfoque completo en la experiencia del usuario. Además de tener que lucir bien, sabemos que la aplicación móvil que creamos para usted debe ser.
                </p>
                <ul class="list-marked texto">
                <li>Sencilla, intuitiva y funcional</li>
                <li>Atractiva</li>
                <li>Rápida velocidad de carga de la aplicación</li>
              </ul>
            </div>
            <div class="col-md-10">
              <h3>Plataformas de aplicaciones móviles: iOS y Android.</h3>
              <p class="texto">
                  En CRC, nos esforzamos por la eficiencia y la rentabilidad de nuestros clientes. Nos es ajeno construir la misma aplicación varias veces para atender a los "dos grandes" plataformas móviles: Android y iOS.
                </p>
              </div>
          </div>
        </div>
      </section>
        <?php
        $header = ob_get_contents();
        ob_end_clean();
        return $header;
    }
    
    public function getBaseDatos()
    {
        ob_start();
        ?>
        <section class="text-center">
        <!-- RD Parallax-->
        <div class="parallax-container bg-image parallax-header rd-parallax-light" data-parallax-img="/images/parallax-05.jpg">
          <div class="parallax-content">
            <div class="parallax-header__inner">
              <div class="parallax-header__content">
                <div class="container">
                  <div class="row justify-content-sm-center">
                    <div class="col-md-10 col-xl-8">
                      <h2>Base de datos a medida</h2>
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
     
    public function getContenidoDatos()
    {
        ob_start();
        ?>
         <section class="section-lg bg-default text-center">
        <div class="container">
          <div class="row row-50 justify-content-sm-center">
            <div class="col-md-10">
              <h3></h3>
              <p class="texto">
                  Desde la creación de un sistema para monitorear el desperdicio de alimentos en restaurantes, hasta una aplicación que interactúa ; hemos trabajado con una amplia gama de industrias para crear soluciones integradas en hardware que impulsan la innovación, crean rentabilidad y automatizan procesos.
                </p>
                <ul class="list-marked texto">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
              </ul>
            </div>
            <div class="col-md-10">
              <h3></h3>
              <p class="texto"></p>
                <ul class="list-marked texto">
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                </ul><br><br>
                
                <h5></h5>
                <p class="texto"></p><br><br><br>
                
              </div>
          </div>
        </div>
      </section>     
        <?php
        $header = ob_get_contents();
        ob_end_clean();
        return $header;
    }
    
    public function getSistema()
        {
        ob_start();
        ?>
        <section class="text-center">
        <!-- RD Parallax-->
        <div class="parallax-container bg-image parallax-header rd-parallax-light" data-parallax-img="/images/parallax-05.jpg">
          <div class="parallax-content">
            <div class="parallax-header__inner">
              <div class="parallax-header__content">
                <div class="container">
                  <div class="row justify-content-sm-center">
                    <div class="col-md-10 col-xl-8">
                      <h2>Sistemas CRM a medida</h2>
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
        
    public function getContenidoCRM()
    {
        ob_start();
        ?>
        <section class="section-lg bg-default text-center">
        <div class="container">
          <div class="row row-50 justify-content-sm-center">
            <div class="col-md-10">
              <h3></h3>
              <p class="texto"></p>
                <ul class="list-marked texto">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
              </ul>
            </div>
            <div class="col-md-10">
              <h3></h3>
              <p class="texto"></p>
                <ul class="list-marked texto">
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                </ul><br><br>
                
                <h5></h5>
                <p class="texto"></p><br><br><br>
                
              </div>
          </div>
        </div>
      </section>
        <?php
        $header = ob_get_contents();
        ob_end_clean();
        return $header;
    }
    
    public function getMigracion()
    {
        ob_start();
        ?>
        <section class="text-center">
        <!-- RD Parallax-->
        <div class="parallax-container bg-image parallax-header rd-parallax-light" data-parallax-img="/images/parallax-05.jpg">
          <div class="parallax-content">
            <div class="parallax-header__inner">
              <div class="parallax-header__content">
                <div class="container">
                  <div class="row justify-content-sm-center">
                    <div class="col-md-10 col-xl-8">
                      <h2>Migracion de datos</h2>
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
    
    public function getContenidoMigracion()
    {
        ob_start();
        ?>
        <section class="section-lg bg-default text-center">
        <div class="container">
          <div class="row row-50 justify-content-sm-center">
            <div class="col-md-10">
              <h3></h3>
              <p class="texto"></p>
                <ul class="list-marked texto">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
              </ul>
            </div>
            <div class="col-md-10">
              <h3></h3>
              <p class="texto"></p>
                <ul class="list-marked texto">
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                </ul><br><br>
                
                <h5></h5>
                <p class="texto"></p><br><br><br>
                
              </div>
          </div>
        </div>
      </section>
        <?php
        $header = ob_get_contents();
        ob_end_clean();
        return $header;
    }
    
     public function getOperacional()
    {
        ob_start();
        ?>
        <section class="text-center">
        <!-- RD Parallax-->
        <div class="parallax-container bg-image parallax-header rd-parallax-light" data-parallax-img="/images/parallax-05.jpg">
          <div class="parallax-content">
            <div class="parallax-header__inner">
              <div class="parallax-header__content">
                <div class="container">
                  <div class="row justify-content-sm-center">
                    <div class="col-md-10 col-xl-8">
                      <h2>Sistemas operacionales</h2>
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
    
    public function getContenidoOperacional()
    {
        ob_start();
        ?>
        <section class="section-lg bg-default text-center">
        <div class="container">
          <div class="row row-50 justify-content-sm-center">
            <div class="col-md-10">
              <h3></h3>
              <p class="texto"></p>
                <ul class="list-marked texto">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
              </ul>
            </div>
            <div class="col-md-10">
              <h3></h3>
              <p class="texto"></p>
                <ul class="list-marked texto">
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                </ul><br><br>
                
                <h5></h5>
                <p class="texto"></p><br><br><br>
                
              </div>
          </div>
        </div>
      </section>
        
        <?php
        $header = ob_get_contents();
        ob_end_clean();
        return $header;
    }
     
    public function getModernizacion()
    {
        ob_start();
        ?>
        <section class="text-center">
        <!-- RD Parallax-->
        <div class="parallax-container bg-image parallax-header rd-parallax-light" data-parallax-img="/images/parallax-05.jpg">
          <div class="parallax-content">
            <div class="parallax-header__inner">
              <div class="parallax-header__content">
                <div class="container">
                  <div class="row justify-content-sm-center">
                    <div class="col-md-10 col-xl-8">
                      <h2>Modernizacion de software heredado</h2>
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
    
    public function getContenidoSoftware()
    {
        ob_start();
        ?>
<<<<<<< HEAD
        <section class="section-lg bg-default text-center">
        <div class="container">
          <div class="row row-50 justify-content-sm-center">
            <div class="col-md-10">
              <h3></h3>
              <p class="texto"></p>
                <ul class="list-marked texto">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
              </ul>
=======
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
                                <a class="brand-name" href="/"><img src="<?php echo $this->data['info']['url']; ?>/images/CRCazul.png" alt="" width="174" height="32" /></a>
                            </div>
                        </div>
                        <!-- RD Navbar Nav-->
                        <div class="rd-navbar-nav-wrap">
                            <ul class="rd-navbar-nav">
                                <li class="active"><a href="/">Inicio</a></li>

                                <li><a href="/nosotros/">Nosotros</a></li>
                                <li><a href="/servicios/">Servicios</a></li>
                                
                                <!--<li><a href="/portafolio/">Portafolio</a>-->
                                <li><a href="#">Blog</a>
                                <li><a href="/contacto/">Contacto</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
>>>>>>> 02eb541743a9f441fc5bbeb8f407bd581b8a3196
            </div>
            <div class="col-md-10">
              <h3></h3>
              <p class="texto"></p>
                <ul class="list-marked texto">
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                </ul><br><br>
                
                <h5></h5>
                <p class="texto"></p><br><br><br>
                
              </div>
          </div>
        </div>
      </section>
        <?php
        $header = ob_get_contents();
        ob_end_clean();
        return $header;
    }
<<<<<<< HEAD
        
     public function getConsultoria()
    {
        ob_start();
        ?>
          <section class="text-center">
        <!-- RD Parallax-->
        <div class="parallax-container bg-image parallax-header rd-parallax-light" data-parallax-img="/images/parallax-05.jpg">
          <div class="parallax-content">
            <div class="parallax-header__inner">
              <div class="parallax-header__content">
                <div class="container">
                  <div class="row justify-content-sm-center">
                    <div class="col-md-10 col-xl-8">
                      <h2>Consultoria de software</h2>
                    </div>
                  </div>
=======
    
    public function getFooter()
    {
        ob_start();
        ?>
        <footer class="footer-corporate">
            <div class="container">
                <div class="footer-corporate__inner">
                    <p class="rights"><span>CRC-SOFTWARE</span><span>&nbsp;</span><span id="copyright-year"></span>.
                    </p>
>>>>>>> 02eb541743a9f441fc5bbeb8f407bd581b8a3196
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
    
<<<<<<< HEAD
     public function getContenidoConsultoria()
    {
        ob_start();
        ?>
        <section class="section-lg bg-default text-center">
        <div class="container">
          <div class="row row-50 justify-content-sm-center">
            <div class="col-md-10">
              <h3></h3>
              <p class="texto"></p>
                <ul class="list-marked texto">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
              </ul>
            </div>
            <div class="col-md-10">
              <h3></h3>
              <p class="texto"></p>
                <ul class="list-marked texto">
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                </ul><br><br>
                
                <h5></h5>
                <p class="texto"></p><br><br><br>
                
              </div>
          </div>
        </div>
      </section>
=======
    public function getIndexSwipper()
    {
        ob_start();
        ?>
        <!-- Swiper-->
        <section>
            <div class="swiper-container swiper-slider swiper-slider_fullheight" data-simulate-touch="false" data-loop="false" data-autoplay="5500">
                <div class="swiper-wrapper">
                    <div class="swiper-slide bg-gray-lighter" data-slide-bg="/images/slider1.jpg">
                        <div class="swiper-slide-caption text-center">
                            <div class="container">
                                <h1 data-caption-animate="fadeInUpSmall"> <span class="slider"></span><sup class="text-accent"></sup></h1>
                                <h3 data-caption-animate="fadeInUpSmall" data-caption-delay="200"></h3>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide swiper-slide_video context-dark video-bg-overlay">
                        <!-- RD Video-->
                        <div class="swiper-slide bg-gray-lighter" data-slide-bg="/images/security.jpg">
                            <!--<div class="vide_bg" data-vide-bg="video/video-lg" data-vide-options="posterType: jpg">-->
                            <div class="swiper-slide-caption text-center">
                                <div class="container">
                                    <h2 data-caption-animate="fadeInUpSmall">CRC SOFTWARE</h2>
                                    <p class="text-width-2 block-centered" data-caption-animate="fadeInUpSmall" data-caption-delay="200"><sup>No solo creamos aplicaciones de Software. Proporcionamos soporte y alojamiento, ayudando a que su sistema funcione y a que sus usuarios estén contentos todo el tiempo que nos necesite. Incluso asumiremos Software que no hemos creado, lo solucionaremos, lo mantendremos y lo ayudaremos a llevar su proyecto al siguiente nivel.</sup></p>
                                    <div class="group-lg group-middle"><a class="button button-black" data-caption-animate="fadeInUpSmall" data-caption-delay="350" href="/servicios/" data-custom-scroll-to="section-see-features">Servicios</a><a class="button button-primary" data-caption-animate="fadeInUpSmall" data-caption-delay="350" href="/contacto/">Contacto</a></div>
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
>>>>>>> 02eb541743a9f441fc5bbeb8f407bd581b8a3196
        <?php
        $method = ob_get_contents();
        ob_end_clean();
        return $method;
    }
    
<<<<<<< HEAD
    public function getRescateSoftware()
=======
    public function getIndexServices()
>>>>>>> 02eb541743a9f441fc5bbeb8f407bd581b8a3196
    {
        ob_start();
        ?>
        <!-- Presentation -->
        <section class="section-xl bg-default text-center" id="section-see-features">
            <div class="container">
                <div class="row justify-content-lg-center">
                    <div class="col-lg-10 col-xl-8">
                        <h3 class="">Nuestros Servicios</h3>
                        <p>Diseñamos, desarrollamos y entregamos soluciones de Software a medida de alta tecnología para empresas pequeñas hasta de gran escala.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- The Power of Bootstrap Toolkit-->
        <section class="bg-gray-lighter object-wrap">
            <div class="section-xxl section-xxl_bigger">
                <div class="container">
<<<<<<< HEAD
                  <div class="row justify-content-sm-center">
                    <div class="col-md-10 col-xl-8">
                      <h2>Rescatamos su proyecto software</h2>
=======
                    <div class="row">
                        <div class="col-lg-5">
                            <h3 class="">Software operacional</h3>
                            <p>Si está buscando una compañía confiable y de buena reputación para construir su software operativo a medida, ha encontrado la compañía adecuada.</p>
                            <a class="button button-gray-light-outline" href="services.html">Ver mas</a>
                        </div>
>>>>>>> 02eb541743a9f441fc5bbeb8f407bd581b8a3196
                    </div>
                </div>
            </div>
<<<<<<< HEAD
          </div>
        </div>
      </section>
        <?php
        $header = ob_get_contents();
        ob_end_clean();
        return $header;
    }
    
    
    public function getContenidoRescate()
    {
        ob_start();
        ?>
        <section class="section-lg bg-default text-center">
        <div class="container">
          <div class="row row-50 justify-content-sm-center">
            <div class="col-md-10">
              <h3></h3>
              <p class="texto"></p>
                <ul class="list-marked texto">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
              </ul>
            </div>
            <div class="col-md-10">
              <h3></h3>
              <p class="texto"></p>
                <ul class="list-marked texto">
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                </ul><br><br>
                
                <h5></h5>
                <p class="texto"></p><br><br><br>
                
              </div>
          </div>
        </div>
      </section>
=======
            <div class="object-wrap__body object-wrap__body-sizing-1 object-wrap__body-md-right bg-image" style="background-image: url(images/ep-img1.jpg)"></div>
        </section>
        <!-- Content Driven Design-->
        <section class="negro section-xl bg-default">
            <div class="container">
                <div class="row justify-content-md-center flex-lg-row-reverse align-items-lg-center justify-content-lg-between row-50">
                    <div class="col-md-9 col-lg-5">
                        <h3>Desarrollo de productos</h3>
                        <p>Podemos diseñar productos que se ajusten a sus necesidades, desde una página web informativa, una aplicación web con gestor de contenidos, CRM, aplicación para iOS y Android.</p>
                        <a class="button button-gray-light-outline" href="services.html">Ver mas</a>
                    </div>
                    <div class="col-md-9 col-lg-6"><img src="<?php echo $this->data['info']['url']; ?>images/crc4.jpg" alt="" width="652" height="491" />
                    </div>
                </div>
            </div>
        </section>
>>>>>>> 02eb541743a9f441fc5bbeb8f407bd581b8a3196
        <?php
        $method = ob_get_contents();
        ob_end_clean();
        return $method;
    }
<<<<<<< HEAD
    
    public function getRecuperacionCodigo()
    {
        ob_start();
        ?>
        <section class="text-center">
        <!-- RD Parallax-->
        <div class="parallax-container bg-image parallax-header rd-parallax-light" data-parallax-img="/images/parallax-05.jpg">
          <div class="parallax-content">
            <div class="parallax-header__inner">
              <div class="parallax-header__content">
                <div class="container">
                  <div class="row justify-content-sm-center">
                    <div class="col-md-10 col-xl-8">
                      <h2>Recuperacion de codigo fuente</h2>
=======

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

>>>>>>> 02eb541743a9f441fc5bbeb8f407bd581b8a3196
                    </div>
                </div>
            </div>
        </section>
        <?php
        $method = ob_get_contents();
        ob_end_clean();
        return $method;
    }
    
<<<<<<< HEAD
     public function getContenidoCodigo()
    {
        ob_start();
        ?>
        <section class="section-lg bg-default text-center">
        <div class="container">
          <div class="row row-50 justify-content-sm-center">
            <div class="col-md-10">
              <h3></h3>
              <p class="texto"></p>
                <ul class="list-marked texto">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
              </ul>
            </div>
            <div class="col-md-10">
              <h3></h3>
              <p class="texto"></p>
                <ul class="list-marked texto">
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                </ul><br><br>
                
                <h5></h5>
                <p class="texto"></p><br><br><br>
                
              </div>
          </div>
        </div>
      </section>
        
        <?php
        $header = ob_get_contents();
        ob_end_clean();
        return $header;
    }
    
     public function getSoporteAplicaciones()
    {
        ob_start();
        ?>
        <section class="text-center">
        <!-- RD Parallax-->
        <div class="parallax-container bg-image parallax-header rd-parallax-light" data-parallax-img="/images/parallax-05.jpg">
          <div class="parallax-content">
            <div class="parallax-header__inner">
              <div class="parallax-header__content">
                <div class="container">
                  <div class="row justify-content-sm-center">
                    <div class="col-md-10 col-xl-8">
                      <h2>Soporte de aplicaciones</h2>
=======
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
                        <p>Si tienes un nuevo proyecto, deje que CRC te ayude con el aspecto actual más desafiante de comenzar un negocio: Desarrollar su aplicación de software.</p>
                        <a class="button button-gray-light-outline" href="/aplicaciones/">Ver mas</a>
                    </div>
                    <div class="col-lg-6">
                        <div class="row gallery-wrap">
                            <div class="col-6"><img src="/images/crc2.jpg" alt="" width="301" height="227" />
                            </div>
                            <div class="col-6"><img src="/images/home-default-4-301x227.jpg" alt="" width="301" height="227" />
                            </div>
                            <div class="col-6"><img src="/images/crc6.jpg" alt="" width="301" height="227" />
                            </div>
                            <div class="col-6"><img src="/images/app-mobile.jpg" alt="" width="301" height="227" />
                            </div>
                        </div>
>>>>>>> 02eb541743a9f441fc5bbeb8f407bd581b8a3196
                    </div>
                </div>
            </div>
<<<<<<< HEAD
          </div>
        </div>
      </section>
         <?php
        $header = ob_get_contents();
=======
        </section>
        <?php
        $method = ob_get_contents();
>>>>>>> 02eb541743a9f441fc5bbeb8f407bd581b8a3196
        ob_end_clean();
        return $method;
    }
<<<<<<< HEAD
    
     public function getContenidoSoporte()
    {
        ob_start();
        ?>
        <section class="section-lg bg-default text-center">
        <div class="container">
          <div class="row row-50 justify-content-sm-center">
            <div class="col-md-10">
              <h3></h3>
              <p class="texto"></p>
                <ul class="list-marked texto">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
              </ul>
            </div>
            <div class="col-md-10">
              <h3></h3>
              <p class="texto"></p>
                <ul class="list-marked texto">
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                </ul><br><br>
                
                <h5></h5>
                <p class="texto"></p><br><br><br>
                
              </div>
          </div>
        </div>
      </section>
        <?php
        $header = ob_get_contents();
        ob_end_clean();
        return $header;
    }
    
    
    public function getHosting()
    {
        ob_start();
        ?>
        <section class="text-center">
        <!-- RD Parallax-->
        <div class="parallax-container bg-image parallax-header rd-parallax-light" data-parallax-img="/images/parallax-05.jpg">
          <div class="parallax-content">
            <div class="parallax-header__inner">
              <div class="parallax-header__content">
                <div class="container">
                  <div class="row justify-content-sm-center">
                    <div class="col-md-10 col-xl-8">
                      <h2>Hosting</h2>
=======
     
    public function getIndexPortfolio()
    {
        ob_start();
        ?>
        <!-- Gallery-->
        <section class="bg-gray-dark text-center">
            <!-- RD Parallax-->
            <div class="parallax-container bg-image rd-parallax-light" data-parallax-img="/images/parallax-01.jpg">
                <div class="parallax-content">
                    <div class="container section-xxl">
                        <h2>PORTAFOLIO</h2>
                        <!--<p></p><a class="button button-primary" href="index.html#">View now!</a>-->
>>>>>>> 02eb541743a9f441fc5bbeb8f407bd581b8a3196
                    </div>
                </div>
<<<<<<< HEAD
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
    
    
    public function getContenidoHosting()
    {
        ob_start();
        ?>
        <section class="section-lg bg-default text-center">
        <div class="container">
          <div class="row row-50 justify-content-sm-center">
            <div class="col-md-10">
              <h3></h3>
              <p class="texto"></p>
                <ul class="list-marked texto">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
              </ul>
            </div>
            <div class="col-md-10">
              <h3></h3>
              <p class="texto"></p>
                <ul class="list-marked texto">
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                </ul><br><br>
                
                <h5></h5>
                <p class="texto"></p><br><br><br>
                
              </div>
          </div>
        </div>
      </section>
        <?php
        $header = ob_get_contents();
        ob_end_clean();
        return $header;
    }
    
    public function getSoftware()
    {
        ob_start();
        ?>
        <section class="text-center">
        <!-- RD Parallax-->
        <div class="parallax-container bg-image parallax-header rd-parallax-light" data-parallax-img="/images/parallax-05.jpg">
          <div class="parallax-content">
            <div class="parallax-header__inner">
              <div class="parallax-header__content">
                <div class="container">
                  <div class="row justify-content-sm-center">
                    <div class="col-md-10 col-xl-8">
                      <h2>Desarrollo de software</h2>
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
    
     public function getContenidoDe()
    {
        ob_start();
        ?>
        <section class="section-lg bg-default text-center">
        <div class="container">
          <div class="row row-50 justify-content-sm-center">
            <div class="col-md-10">
              <h3></h3>
              <p class="texto"></p>
                <ul class="list-marked texto">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
              </ul>
            </div>
            <div class="col-md-10">
              <h3></h3>
              <p class="texto"></p>
                <ul class="list-marked texto">
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                </ul><br><br>
                
                <h5></h5>
                <p class="texto"></p><br><br><br>
                
              </div>
          </div>
        </div>
      </section>
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
=======
            </div>

            <!--<section class="section-xl bg-default" data-lightgallery="group">-->
            <div class="container-fluid">
                <div class="row row-10 row-horizontal-10">
                    <div class="col-md-4 col-xl-3">
                        <a class="thumb-modern" data-lightgallery="item" href="/images/image-original-1-1200x905.jpg">
                            <figure><img src="/images/home-default-7-472x355.jpg" alt="" width="472" height="355" />
                            </figure>
                            <div class="thumb-modern__overlay"></div>
                        </a>
                    </div>
                    <div class="col-md-4 col-xl-3">
                        <a class="thumb-modern" data-lightgallery="item" href="/images/image-original-2-1200x905.jpg">
                            <figure><img src="/images/home-default-8-472x355.jpg" alt="" width="472" height="355" />
                            </figure>
                            <div class="thumb-modern__overlay"></div>
                        </a>
                    </div>
                    <div class="col-md-4 col-xl-3">
                        <a class="thumb-modern" data-lightgallery="item" href="/images/image-original-3-1200x906.jpg">
                            <figure><img src="/images/home-default-9-472x355.jpg" alt="" width="472" height="355" />
                            </figure>
                            <div class="thumb-modern__overlay"></div>
                        </a>
                    </div>
                    <div class="col-md-4 col-xl-3">
                        <a class="thumb-modern" data-lightgallery="item" href="/images/image-original-4-1200x905.jpg">
                            <figure><img src="/images/home-default-10-472x355.jpg" alt="" width="472" height="355" />
                            </figure>
                            <div class="thumb-modern__overlay"></div>
                        </a>
                    </div>
                    <!--<div class="col-md-4 col-xl-3">
                        <a class="thumb-modern" data-lightgallery="item" href="/images/image-original-5-1200x905.jpg">
                            <figure><img src="/images/home-default-11-472x355.jpg" alt="" width="472" height="355" />
                            </figure>
                            <div class="thumb-modern__overlay"></div>
                        </a>
                    </div>
                    <div class="col-md-4 col-xl-3">
                        <a class="thumb-modern" data-lightgallery="item" href="/images/image-original-6-1200x905.jpg">
                            <figure><img src="/images/home-default-12-472x355.jpg" alt="" width="472" height="355" />
                            </figure>
                            <div class="thumb-modern__overlay"></div>
                        </a>
                    </div>
                    <div class="col-md-4 col-xl-3">
                        <a class="thumb-modern" data-lightgallery="item" href="/images/image-original-7-1200x906.jpg">
                            <figure><img src="/images/home-default-13-472x355.jpg" alt="" width="472" height="355" />
                            </figure>
                            <div class="thumb-modern__overlay"></div>
                        </a>
                    </div>
                    <div class="col-md-4 col-xl-3">
                        <a class="thumb-modern" data-lightgallery="item" href="/images/image-original-8-1200x906.jpg">
                            <figure><img src="/images/home-default-14-472x355.jpg" alt="" width="472" height="355" />
                            </figure>
                            <div class="thumb-modern__overlay"></div>
                        </a>
                    </div>-->
>>>>>>> 02eb541743a9f441fc5bbeb8f407bd581b8a3196
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
                        <article class="post-classic post-minimal"><img src="/images/post-minimal-1-418x315.jpg" alt="" width="418" height="315" />
                            <div class="post-classic-title">
                                <h5><a href="image-post.html">¿Qué es una aplicación web?</a></h5>
                            </div>
                            <div class="post-meta">
                                <div class="group">
                                    <a href="image-post.html">
                                        <time datetime="2017">Ago.20, 2018</time></a><a class="meta-author" href="image-post.html">por Raul Castro</a></div>
                            </div>
                        </article>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <!-- Post classic-->
                        <article class="post-classic post-minimal"><img src="/images/post-classic-1-886x668.jpg" alt="" width="886" height="668" />
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
                        <article class="post-classic post-minimal"><img src="/images/post-minimal-1-418x315.jpg" alt="" width="418" height="315" />
                            <div class="post-classic-title">
                                <h5><a href="image-post.html">10 Reasons to Buy Monstroid<sup>2</sup>.</a></h5>
                            </div>
                            <div class="post-meta">
                                <div class="group">
                                    <a href="image-post.html">
                                        <time datetime="2017">Jan.20, 2016</time></a><a class="meta-author" href="/image-post.html">by Brian Williamson</a></div>
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
                                    <dt>Teléfono</dt>
                                    <dd>
                                        <ul class="list-semicolon">
                                            <li><a href="tel:+52 1 (984) 131 4389">+52 1 (984) 131 4389</a></li>
                                        </ul>
                                    </dd>
                                </dl>
                            </li>
                            <li>
                                <dl class="list-terms-minimal">
                                    <dt>Horario de atención</dt>
                                    <dd>lun-sab: 10:00 am - 8:00 pm</dd>
                                </dl>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-10 col-md-6 col-lg-5 col-xl-3">
                        <ul class="list-xs">
                            <li>
                                <dl class="list-terms-minimal">
                                    <dt>Ubicación</dt>
                                    <dd>Playa del Carmen, Quintana Roo. México.</dd>
                                </dl>
                            </li>
                        </ul>
                    </div>

                    <div class="col-sm-10 col-md-6 col-lg-5 col-xl-3">
                        <ul class="list-xs">
                            <li>
                                <dl class="list-terms-minimal">
                                    <dt>E-mail</dt>
                                    <dd><a href="/contacto/">info@crc-software</a></dd>
                                </dl>
                            </li>
                        </ul>
                    </div>

                    <!--<div class="col-sm-10 col-md-6 col-lg-4 col-xl-3">

                        <ul class="list-inline-xxs">
                            <li>
                                <a class="icon icon-xxs icon-primary fa fa-facebook" href="/"></a>
                            </li>
                            <li>
                                <a class="icon icon-xxs icon-primary fa fa-twitter" href="/"></a>
                            </li>
                            <li>
                                <a class="icon icon-xxs icon-primary fa fa-instagram" href="/"></a>
                            </li>
                        </ul>

                    </div>-->
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
            <div class="parallax-container bg-image parallax-header rd-parallax-light" data-parallax-img="<?php echo $this->data['info']['url']; ?>/images/crc.jpg">
                <div class="parallax-content">
                    <div class="parallax-header__inner">
                        <div class="parallax-header__content">
                            <div class="container">
                                <div class="row justify-content-sm-center">
                                    <div class="col-md-10 col-xl-8">
                                        <h2>¿Quiénes somos y qué hacemos?</h2>
                                        <p>Somos CRC-Software, una compañía de desarrollo de software a medida. Diseñamos aplicaciones web inteligentes, rentables e intuitivas, aplicaciones móviles(iOS/Android) que ayudan a optimizar los procesos de las empresas, así como a crear nuevas fuentes de ingresos para empresas nuevas y establecidas.</p>
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
                        <p>Adoptamos un enfoque único al fusionar los métodos tradicionales y los nuevos para desarrollar software de calidad a gran velocidad, al mismo tiempo que conservamos nuestro toque personal y nuestra actitud exigente con la planificación y desarrollo.</p>
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
                            <div><img src="/images/cat-2-507x508.jpg" alt="" width="507" height="508" />
                            </div>
                            <div><img src="/images/cat-1-326x427.jpg" alt="" width="326" height="427" />
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
                            <div class="thumb-corporate__main"><img src="/images/brian-king-480x362.jpg" alt="" width="480" height="362" />
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
                            <div class="thumb-corporate__main"><img src="/images/amanda-smith-480x362.jpg" alt="" width="480" height="362" />
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
                            <div class="thumb-corporate__main"><img src="/images/george-nelson-418x315.jpg" alt="" width="418" height="315" />
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
    
    public function getAplicacionesParalax()
    {
        ob_start();
        ?>
        <section class="text-center">
        <!-- RD Parallax-->
        <div class="parallax-container bg-image parallax-header rd-parallax-light" data-parallax-img="/images/parallax-05.jpg">
          <div class="parallax-content">
            <div class="parallax-header__inner">
              <div class="parallax-header__content">
                <div class="container">
<<<<<<< HEAD
                    <div class="row">
                        <div class="col-lg-5">
                            <h3 class="">Software operacional</h3>
                            <p>Si está buscando una compañía confiable y de buena reputación para construir su software operativo a medida, ha encontrado la compañía adecuada.</p>
                            <a class="button button-gray-light-outline" href="/servicios/">Ver mas</a>
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
                        <a class="button button-gray-light-outline" href="/servicios/">Ver mas</a>
                    </div>
                    <div class="col-md-9 col-lg-6"><img src="<?php echo $this->data['info']['url']; ?>images/crc4.jpg" alt="" width="652" height="491" />
=======
                  <div class="row justify-content-sm-center">
                    <div class="col-md-10 col-xl-8">
                      <h2>Desarrollo de aplicaciones empresariales a medida de CRC</h2>
>>>>>>> 02eb541743a9f441fc5bbeb8f407bd581b8a3196
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
    
    public function getContenAplicaciones()
    {
        ob_start();
        ?>
        <section class="section-lg bg-default text-center">
        <div class="container">
          <div class="row row-50 justify-content-sm-center">
            <div class="col-md-10">
              <h3>Desarrollo de aplicaciones empresariales a medida de CRC</h3>
              <p class="texto">Ya sea que necesite un sistema para mejorar su servicio al cliente, aumentar la efectividad de su negocio, optimizar sus procesos o aumentar sus ventas (ya sea a través de la experiencia del cliente front-end o de back-end), podemos crear aplicaciones comerciales inteligentes, rentables e intuitivas para ayudarte.

            Trabajaremos con usted para comprender sus procesos comerciales y el desafío que está tratando de resolver, y luego le sugeriremos el tipo de desarrollo de aplicaciones que funcionaría mejor para usted, como por ejemplo:</p>
                <ul class="list-marked texto">
                <li>una aplicación alojada, basada en la web con una base de datos remota, local, sincronizada o multi-tenant back-end de la base de datos</li>
                <li>un sitio web alojado, front-end impulsado por una base de datos</li>
                <li>una aplicación alojada, basada en web con un sistema CRM integral</li>
                <li>una combinación de sistemas front-end, back-end y portal de proveedor / cliente alojados</li>
                <li>una aplicación de escritorio con bases de datos remotas (en la nube) o bases de datos locales que se pueden sincronizar / replicar con sistemas centrales de bases de datos</li>
                <li>aplicaciones para dispositivos móviles y tabletas con bases de datos locales y en la nube</li>
              </ul>
            </div>
            <!--div class="col-md-10">
              <h5>Las aplicaciones a medida que hemos creado incluyen:</h5>
              <p class="texto"></p>
                <ul class="list-marked texto">
                <li><strong>Mensajeria Segura</strong></li>
                <li><strong>Clientes que pueden iniciar sesión desde la oficina, el hogar o un móvil: acceso más rápido a lo que necesitan, cuando lo deseen</strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                </ul><br><br>
                
                <h5></h5>
                <p class="texto"></p><br><br><br>
                
              </div>-->
          </div>
        </div>
      </section>
        
        <?php
        $header = ob_get_contents();
        ob_end_clean();
        return $header;
    }
    
    
    public function getDesarrolloWeb()
    {
        ob_start();
        ?>
        <section class="text-center">
        <!-- RD Parallax-->
        <div class="parallax-container bg-image parallax-header rd-parallax-light" data-parallax-img="/images/parallax-05.jpg">
          <div class="parallax-content">
            <div class="parallax-header__inner">
              <div class="parallax-header__content">
                <div class="container">
                  <div class="row justify-content-sm-center">
                    <div class="col-md-10 col-xl-8">
                      <h2> Desarrollo de sitios web</h2>
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
    
    public function getContenidoWeb()
        {
        ob_start();
        ?>
        <section class="section-lg bg-default text-center">
        <div class="container">
          <div class="row row-50 justify-content-sm-center">
            <div class="col-md-10">
              <h3>¿Qué es una aplicación web?</h3>
              <p class="texto">
                  Una aplicación web es un programa de software que utiliza con un navegador de Internet, de la misma manera que una aplicación móvil es un programa de software que utiliza en su dispositivo móvil.<br>
                  Los últimos años han visto una proliferación de aplicaciones web. Lo más probable es que su popularidad se deba a su facilidad de uso: cualquier persona con un navegador conectado a Internet puede acceder a ellos, atienden las necesidades de los usuarios móviles (ya que los teléfonos inteligentes son la principal forma en que las personas acceden a Internet). y se pueden implementar rápidamente y casi sin necesidad de instalación por parte del usuario.<br>
                  Si necesita una aplicación web interna para ayudar a administrar los gastos del personal, una aplicación web que puede revender a sus clientes o una que revolucionará su servicio al cliente, trabajaremos con usted para construir rápida e inteligentemente una herramienta potente e intuitiva.<br>
                  A partir de ahí, es un proceso simple que comienza cuando nos sentamos con usted para comprender su negocio, lo que su nueva aplicación necesita poder entregar y a quién. Las posibles opciones incluyen:
                </p>
                <ul class="list-marked texto">
                <li> Una aplicación web alojada con un back-end de base de datos remoto, local, sincronizado o multitendado</li>
                <li> Una combinación de sistemas de front-end, back-end.</li>
                <li> Una aplicación web que incluye un completo back-end CRM</li>
                <li> Una aplicación web que complementa un nuevo sitio web o el existente</li>
                <li> Permitir a los usuarios agregar nuevos campos, definir cuadros desplegables, crear nuevos formularios y generar informes personalizados según sea necesario</li>
                <li> Fuentes diarias de datos de múltiples bases de datos para asegurarse de que la aplicación siempre use la información correcta y actualizada del cliente</li>
                <li> Usar permisos de acuerdo con el rol de una persona y los derechos de acceso</li>
               
              </ul>
            </div>
            <div class="col-md-10">
              <h3>Aplicaciones web responsivas</h3>
              <p class="texto">
                Como era de esperar, todas las aplicaciones web que construimos son "receptivas". Esto significa que se ven muy bien y funcionan perfectamente en cualquier tamaño de pantalla: una PC de escritorio, tableta o teléfono móvil. Hacemos esto adaptando menús, controles y otros elementos visuales para que se ajusten al dispositivo en función del ancho y alto de la pantalla actual, asegurando que el usuario siempre obtenga la mejor experiencia posible, independientemente del dispositivo que esté usando. Puede ver esto en acción cambiando el tamaño de la ventana en este sitio web o visitándola en su teléfono inteligente; vea cómo todo “simplemente funciona”.
                </p>
                <!--<ul class="list-marked texto">
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                </ul><br><br>
                
                <h5></h5>
                <p class="texto"></p><br><br><br>-->
                
              </div>
          </div>
        </div>
      </section>
        <?php
        $header = ob_get_contents();
        ob_end_clean();
        return $header;
    }
    
    public function getMovil()
    {
        ob_start();
        ?>
        <section class="text-center">
        <!-- RD Parallax-->
        <div class="parallax-container bg-image parallax-header rd-parallax-light" data-parallax-img="/images/parallax-05.jpg">
          <div class="parallax-content">
            <div class="parallax-header__inner">
              <div class="parallax-header__content">
                <div class="container">
                  <div class="row justify-content-sm-center">
                    <div class="col-md-10 col-xl-8">
                      <h2>Desarrollo de aplicaciones web</h2>
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
    
    public function getContenidoApp()
    {
        ob_start();
        ?>
        <section class="section-lg bg-default text-center">
        <div class="container">
          <div class="row row-50 justify-content-sm-center">
            <div class="col-md-10">
              <h3>Expertos desarrolladores de aplicaciones móviles</h3>
              <p class="texto">
                  No hay duda de que una aplicación móvil concebida estratégicamente puede obtener grandes recompensas a la hora de establecer relaciones con sus clientes, pero como el 73% de los usuarios espera que una aplicación móvil sea más fácil de usar que un sitio web móvil, es importante que esté al día. - Ahí es donde podemos ayudarte.<br>

                  Mientras creará el concepto detrás de la aplicación móvil, podemos proporcionar un enfoque completo en la experiencia del usuario. Además de tener que lucir bien, sabemos que la aplicación móvil que creamos para usted debe ser.
                </p>
                <ul class="list-marked texto">
                <li>Sencilla, intuitiva y funcional</li>
                <li>Atractiva</li>
                <li>Rápida velocidad de carga de la aplicación</li>
              </ul>
            </div>
            <div class="col-md-10">
              <h3>Plataformas de aplicaciones móviles: iOS y Android.</h3>
              <p class="texto">
                  En CRC, nos esforzamos por la eficiencia y la rentabilidad de nuestros clientes. Nos es ajeno construir la misma aplicación varias veces para atender a los "dos grandes" plataformas móviles: Android y iOS.
                </p>
              </div>
          </div>
        </div>
      </section>
        <?php
        $header = ob_get_contents();
        ob_end_clean();
        return $header;
    }
    
    public function getBaseDatos()
    {
        ob_start();
        ?>
        <section class="text-center">
        <!-- RD Parallax-->
        <div class="parallax-container bg-image parallax-header rd-parallax-light" data-parallax-img="/images/parallax-05.jpg">
          <div class="parallax-content">
            <div class="parallax-header__inner">
              <div class="parallax-header__content">
                <div class="container">
                  <div class="row justify-content-sm-center">
                    <div class="col-md-10 col-xl-8">
                      <h2>Base de datos a medida</h2>
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
     
    public function getContenidoDatos()
    {
        ob_start();
        ?>
         <section class="section-lg bg-default text-center">
        <div class="container">
          <div class="row row-50 justify-content-sm-center">
            <div class="col-md-10">
              <h3></h3>
              <p class="texto">
                  Desde la creación de un sistema para monitorear el desperdicio de alimentos en restaurantes, hasta una aplicación que interactúa ; hemos trabajado con una amplia gama de industrias para crear soluciones integradas en hardware que impulsan la innovación, crean rentabilidad y automatizan procesos.
                </p>
                <ul class="list-marked texto">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
              </ul>
            </div>
            <div class="col-md-10">
              <h3></h3>
              <p class="texto"></p>
                <ul class="list-marked texto">
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                </ul><br><br>
                
                <h5></h5>
                <p class="texto"></p><br><br><br>
                
              </div>
          </div>
        </div>
      </section>     
        <?php
        $header = ob_get_contents();
        ob_end_clean();
        return $header;
    }
    
    public function getSistema()
        {
        ob_start();
        ?>
        <section class="text-center">
        <!-- RD Parallax-->
        <div class="parallax-container bg-image parallax-header rd-parallax-light" data-parallax-img="/images/parallax-05.jpg">
          <div class="parallax-content">
            <div class="parallax-header__inner">
              <div class="parallax-header__content">
                <div class="container">
                  <div class="row justify-content-sm-center">
                    <div class="col-md-10 col-xl-8">
                      <h2>Sistemas CRM a medida</h2>
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
        
    public function getContenidoCRM()
    {
        ob_start();
        ?>
        <section class="section-lg bg-default text-center">
        <div class="container">
          <div class="row row-50 justify-content-sm-center">
            <div class="col-md-10">
              <h3></h3>
              <p class="texto"></p>
                <ul class="list-marked texto">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
              </ul>
            </div>
            <div class="col-md-10">
              <h3></h3>
              <p class="texto"></p>
                <ul class="list-marked texto">
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                </ul><br><br>
                
                <h5></h5>
                <p class="texto"></p><br><br><br>
                
              </div>
          </div>
        </div>
      </section>
        <?php
        $header = ob_get_contents();
        ob_end_clean();
        return $header;
    }
    
    public function getMigracion()
    {
        ob_start();
        ?>
<<<<<<< HEAD
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
                        <a class="button button-gray-light-outline" href="/contacto/">Ver mas</a>
                    </div>
                </div>
            </div>
        </section>
        <section class="bg-accent">
            <div class="container">
                <div class="row justify-content-md-center align-items-lg-end">
                    <div class="col-md-8 col-lg-6 section-xl">
                        <h3>Desarrollo de software de confianza</h3>
                        <p>En CRC-Software hemos acumulado experiencia considerable en una variedad de sectores: públicos y privados, enfocados en los consumidores y las empresas y sin fines de lucro. Hemos ayudado a empresas que van desde empresas nuevas y empresas, pequeñas empresas administradas por sus propietarios hasta grandes organizaciones públicas</p><a class="button button-gray-light-outline" href="/contacto/">Contactanos</a>
                    </div>
                    <div class="col-md-8 col-lg-6">
                        <div class="cat-img-group">
                            <div><img src="/images/cat-2-507x508.jpg" alt="" width="507" height="508" />
                            </div>
                            <div><img src="/images/cat-1-326x427.jpg" alt="" width="326" height="427" />
                            </div>
                        </div>
=======
        <section class="text-center">
        <!-- RD Parallax-->
        <div class="parallax-container bg-image parallax-header rd-parallax-light" data-parallax-img="/images/parallax-05.jpg">
          <div class="parallax-content">
            <div class="parallax-header__inner">
              <div class="parallax-header__content">
                <div class="container">
                  <div class="row justify-content-sm-center">
                    <div class="col-md-10 col-xl-8">
                      <h2>Migracion de datos</h2>
>>>>>>> 02eb541743a9f441fc5bbeb8f407bd581b8a3196
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
    
    public function getContenidoMigracion()
    {
        ob_start();
        ?>
<<<<<<< HEAD
        <!--<section class="section-lg bg-default text-center">
            <div class="container">
                <h3>Nuestro equipo de trabajo</h3>
                <p>El equipo de CRC-Software mezcla todos los ingredientes que consideramos necesarios para una empresa de desarrollo de software exitosa. Contamos con desarrolladores de software. Mentes analíticas que pueden comprender los matices de los negocios de nuestros clientes, los gerentes y diseñadores metódicos de proyectos, la gestión dirigida con un enfoque de calidad y entrega, y los innovadores que transforman la forma en que vemos las cosas.</p>
                <div class="row row-50 justify-content-sm-center">
                    <div class="col-md-6 col-lg-4">
                        <!-- Thumb corporate-->
                        <!--<div class="thumb thumb-corporate">
                            <div class="thumb-corporate__main"><img src="/images/brian-king-480x362.jpg" alt="" width="480" height="362" />
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
                        <!--<div class="thumb thumb-corporate">
                            <div class="thumb-corporate__main"><img src="/images/amanda-smith-480x362.jpg" alt="" width="480" height="362" />
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
                        <!--<div class="thumb thumb-corporate">
                            <div class="thumb-corporate__main"><img src="/images/george-nelson-418x315.jpg" alt="" width="418" height="315" />
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
=======
        <section class="section-lg bg-default text-center">
        <div class="container">
          <div class="row row-50 justify-content-sm-center">
            <div class="col-md-10">
              <h3></h3>
              <p class="texto"></p>
                <ul class="list-marked texto">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
              </ul>
>>>>>>> 02eb541743a9f441fc5bbeb8f407bd581b8a3196
            </div>
            <div class="col-md-10">
              <h3></h3>
              <p class="texto"></p>
                <ul class="list-marked texto">
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                <li><strong></strong></li>
                </ul><br><br>
                
                <h5></h5>
                <p class="texto"></p><br><br><br>
                
              </div>
          </div>
        </div>
      </section>
        <?php
        $header = ob_get_contents();
        ob_end_clean();
        return $header;
    }
    
    
    
    public function getBanerServicesES()
    {
        ob_start();
        ?>
        <section class="bg-gray-lighter">
            <!-- RD Parallax-->
            <div class="parallax-container bg-image parallax-header" data-parallax-img="<?php echo $this->data['info']['url']; ?>images/solutions-web.jpg">
                <div class="parallax-content">
                    <div class="parallax-header__inner">
                        <div class="parallax-header__content">
                            <div class="container">
                                <div class="row justify-content-sm-center">
                                    <div class="col-md-10 col-xl-8">
                                        <h2 class="slider"> Servicios de desarrollo de aplicaciones comerciales y software</h2>
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
    
    public function getGridServicesOneES()
    {
        ob_start();
        ?>
        <section class="negro section-lg bg-default">
            <div class="container">
                <div class="row row-60">
                    <div class="col-md-6 col-xl-4">
                        <div class="thumbnail-classic"><img src="/images/crc7.jpg" alt="" width="418" height="315" />
                            <div class="caption">
                                <h5><a class="thumbnail-classic-title" href="/aplicaciones/">Aplicaciones comerciales a medida</a></h5>
                                <p> Desde aplicaciones web hasta portales de clientes y todo lo demás; somos expertos en el uso de la tecnología para desarrollar la eficiencia empresarial y la ventaja competitiva. </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="thumbnail-classic"><img src="/images/crc5.jpg" alt="" width="418" height="315" />
                            <div class="caption">
                                <h5><a class="thumbnail-classic-title" href="/desarrollo-web/">Aplicaciones y desarrollo de sitios web</a></h5>
                                <p>Nuestra especialidad es desarrollar aplicaciones web productivas, atractivas y seguras con compatibilidad entre navegadores y un diseño receptivo (para trabajar en dispositivos móviles, tabletas y computadoras de escritorio).</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="thumbnail-classic"><img src="/images/movil.jpg" alt="" width="418" height="315" />
                            <div class="caption">
                                <h5><a class="thumbnail-classic-title" href="/aplicaciones-moviles/">Desarrollo de aplicaciones móviles</a></h5>
                                <p>Nuestro equipo de desarrolladores de aplicaciones móviles puede ayudarte a aumentar la participación de tu marca con una aplicación intuitiva, rápida, creativa e interactiva.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="thumbnail-classic"><img src="/images/data-base.jpg" alt="" width="418" height="315" />
                            <div class="caption">
                                <h5><a class="thumbnail-classic-title" href="/base-de-datos/">Bases de datos a medida</a></h5>
                                <p>Nos especializamos en el diseño y la creación de bases de datos personalizadas de Microsoft SQL Server que impulsan la eficiencia de tu negocio, lo ayudan a ver las tendencias operacionales y escalan tu negocio.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="thumbnail-classic"><img src="/images/crm.jpg" alt="" width="418" height="315" />
                            <div class="caption">
                                <h5><a class="thumbnail-classic-title" href="/sistema-crm/">Sistemas CRM a medida</a></h5>
                                <p>logre sus objetivos de interacción con el cliente con un sistema de CRM personalizado y escalable que no requiera licencias por separado para cada nuevo usuario</p>
                            </div>
                        </div>
                    </div>
                    <!--<div class="col-md-6 col-xl-4">
                        <div class="thumbnail-classic"><img src="/images/integracion-software.jpg" alt="" width="418" height="315" />
                            <div class="caption">
                                <h5><a class="thumbnail-classic-title" href="integracion-software.html">Integración de software</a></h5>
                                <p>Si necesita procesar datos de su hardware especializado, por ejemplo, lecturas de un termómetro o dispositivo de medición, transmisión de video desde una cámara o cualquier otra cosa, crearemos un software para permitir esto.</p>
                            </div>
                        </div>
                    </div>-->
                </div>
            </div>
        </section>
        <?php
        $method = ob_get_contents();
        ob_end_clean();
        return $method;
    }
    
    public function getTextSectionOneServicesES()
    {
        ob_start();
        ?>
        <section class="text-center">
            <!-- RD Parallax-->
            <div class="parallax-container bg-image rd-parallax-light" data-parallax-img="/images/crc.jpg">
                <div class="parallax-content">
                    <div class="container section-xxl">
                        <h2>Servicios de integración de sistemas</h2>
                        <p></p>
                    </div>
                </div>
            </div>
        </section>
        <?php
        $method = ob_get_contents();
        ob_end_clean();
        return $method;
    }
    
    public function getGridServicesTwoES()
    {
        ob_start();
        ?>
        <section class="negro section-lg bg-default">
            <div class="container">
                <div class="row row-60">
                    <div class="col-md-6 col-xl-4">
                        <div class="thumbnail-classic"><img src="/images/migracion-datos.jpg" alt="" width="418" height="315" />
                            <div class="caption">
                                <h5><a class="thumbnail-classic-title" href="/migracion-de-datos/">Servicios de migración de datos</a></h5>
                                <p> Si necesita un servicio de migración de datos rápido, eficiente y seguro sin interrupciones en su negocio, nuestros expertos pueden ayudarlo.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="thumbnail-classic"><img src="/images/sistemas.jpg" alt="" width="418" height="315" />
                            <div class="caption">
                                <h5><a class="thumbnail-classic-title" href="/sistemas-operacionales/">Sistemas operacionales</a></h5>
                                <p>Si tiene que adaptar sus procesos o resolver brechas en la administración o funcionalidad de los sistemas, podría ser momento de considerar un nuevo sistema operativo.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="thumbnail-classic"><img src="/images/moderno.jpg" alt="" width="418" height="315" />
                            <div class="caption">
                                <h5><a class="thumbnail-classic-title" href="/modernizacion-software/">Modernización de software heredado</a></h5>
                                <p>¿Harto de gastar dinero en un lento sistema de TI que no funciona? Le construiremos un reemplazo poderoso que ayude, no obstaculice su negocio.</p>
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
    
    public function getTextSectionTwoServicesES()
    {
        ob_start();
        ?>
        <section class="text-center">
            <!-- RD Parallax-->
            <div class="parallax-container bg-image rd-parallax-light" data-parallax-img="/images/crc.jpg">
                <div class="parallax-content">
                    <div class="container section-xxl">
                        <h2 class="slider">Servicios profesionales y de soporte</h2>
                        <p></p>
                    </div>
                </div>
            </div>
        </section>
        <?php
        $method = ob_get_contents();
        ob_end_clean();
        return $method;
    }
    
    public function getGridServicesThreeES()
    {
        ob_start();
        ?>
        <section class="negro section-lg bg-default">
            <div class="container">
                <div class="row row-60">

                    <div class="col-md-6 col-xl-4">
                        <div class="thumbnail-classic"><img src="/images/consultoria.jpg" alt="" width="418" height="315" />
                            <div class="caption">
                                <h5 class=""><a class="thumbnail-classic-title" href="/consultoria-software/">Consultoría de software</a></h5>
                                <p>Si necesita ayuda para identificar las barreras tecnológicas que se interponen entre usted y un negocio más rentable, nuestros consultores de software pueden ayudarlo.
                                </p>
                            </div> 
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="thumbnail-classic"><img src="/images/4.jpg" alt="" width="418" height="315" />
                            <div class="caption">
                                <h5><a class="thumbnail-classic-title" href="/rescate-software/">Rescatamos su proyecto Software</a></h5>
                                <p>Si su proyecto de software a medida ha fallado o si se ha caído con su desarrollador de software, podemos rápidamente poner su negocio nuevamente en marcha.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="thumbnail-classic"><img src="/images/codigo.jpg" alt="" width="418" height="315" />
                            <div class="caption">
                                <h5><a class="thumbnail-classic-title" href="/recuperacion-codigo/">Recuperación del código fuente</a></h5>
                                <p>Podemos ayudar a aliviar el dolor de cabeza del código fuente perdido al recuperarlo o volver a desarrollarlo para usted. También podemos reconstruir repositorios de código fuente roto.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="thumbnail-classic"><img src="/images/mantenimiento-de-aplicaciones.jpg" alt="" width="418" height="315" />
                            <div class="caption">
                                <h5><a class="thumbnail-classic-title" href="/soporte-de-aplicaciones/">Soporte y mantenimiento de aplicaciones</a></h5>
                                <p>Desde la solución de errores prioritarios hasta nuestro servicio de asistencia interna; Apoyaremos y mantendremos su software a lo largo de su ciclo de vida, incluso si no lo construimos.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="thumbnail-classic"><img src="/images/webhosting.jpg" alt="" width="418" height="315" />
                            <div class="caption">
                                <h5><a class="thumbnail-classic-title" href="/hosting/">Hosting</a></h5>
                                <p>Si necesita una forma simple y rentable de acceder a su nueva aplicación de software, pruebe nuestro servicio de alojamiento brindado a través de los líderes de la industria.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="thumbnail-classic"><img src="/images/desarrollo-software.png" alt="" width="418" height="315" />
                            <div class="caption">
                                <h5><a class="thumbnail-classic-title" href="/desarrollo-de-software/">Desarrollo de software</a></h5>
                                <p> Permítanos ayudarlo con el aspecto más desafiante de comenzar un negocio: Desarrollar su aplicación de software</p>
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
    
    public function getContactFormES()
    {
        ob_start();
        ?>
        <section class="section-lg bg-default">
            <div class="container">
                <div class="row row-50">
                    <div class="col-md-5 col-lg-4">
                        <h3>Contacto</h3>
                        <ul class="list-xs contact-info">
                            <li>
                                <dl class="list-terms-minimal">
                                    <dt>Ubicacion</dt>
                                    <dd>Playa del Carmen. Quintana Roo. Mexico</dd>
                                </dl>
                            </li>
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
                                    <dt>E-mail</dt>
                                    <dd><a href="mailto:#">info@crc-software</a></dd>
                                </dl>
                            </li>
                            <li>
                                <dl class="list-terms-minimal">
                                    <dt>Horario de atencion</dt>
                                    <dd>lun-sab: 10 am-8 pm</dd>
                                </dl>
                            </li>
                            <li>
                                <ul class="list-inline-sm">
                                    <li>
                                        <a class="icon-sm fa-facebook icon" href="contacts.html#"></a>
                                    </li>
                                    <li>
                                        <a class="icon-sm fa-twitter icon" href="contacts.html#"></a>
                                    </li>
                                    <li>
                                        <a class="icon-sm fa-instagram icon" href="services.html#"></a>
                                    </li>

                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-7 col-lg-8">
                        <h3>Formulario de contacto</h3>
                        <!-- RD Mailform-->
                        <form class="rd-mailform rd-mailform_style-1" data-form-output="form-output-global" data-form-type="contact" method="post" action="http://livedemo00.template-help.com/wt_62267_v4/62267-default/bat/rd-mailform.php">
                            <div class="form-wrap form-wrap_icon linear-icon-man">
                                <input class="form-input" id="contact-name" type="text" name="name" data-constraints="@Required">
                                <label class="form-label" for="contact-name">Nombre</label>
                            </div>
                            <div class="form-wrap form-wrap_icon linear-icon-envelope">
                                <input class="form-input" id="contact-email" type="email" name="email" data-constraints="@Email @Required">
                                <label class="form-label" for="contact-email"> e-mail</label>
                            </div>
                            <div class="form-wrap form-wrap_icon linear-icon-telephone">
                                <input class="form-input" id="contact-phone" type="text" name="phone" data-constraints="@Numeric">
                                <label class="form-label" for="contact-phone">Telefono</label>
                            </div>
                            <div class="form-wrap form-wrap_icon linear-icon-feather">
                                <textarea class="form-input" id="contact-message" name="message" data-constraints="@Required"></textarea>
                                <label class="form-label" for="contact-message">mensaje</label>
                            </div>
                            <button class="button button-primary" type="submit">enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <?php
        $method = ob_get_contents();
        ob_end_clean();
        return $method;
    }
    
    public function getPortfolioES()
    {
        ob_start();
        ?>
        <!-- PANEL-->
        <!-- Page Header-->
        <header class="page-header">
            <!-- RD Navbar-->
            <div class="rd-navbar-wrap">
                <nav class="rd-navbar" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-sm-device-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-device-layout="rd-navbar-fixed" data-xl-device-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-stick-up-clone="false" data-sm-stick-up="true" data-md-stick-up="true" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true" data-md-stick-up-offset="69px" data-lg-stick-up-offset="1px" data-body-class="rd-navbar-default-linked">
                </nav>
            </div>
        </header>
        <section class="section-lg bg-default text-center">
            <div class="container">
                <h3>Portafolio</h3>
                <div class="isotope-wrap row row-70">
                    <div class="col-sm-12">
                        <ul class="list-nav isotope-filters isotope-filters-horizontal">
                            <li><a class="active" data-isotope-filter="*" data-isotope-group="gallery" href="portfolio.html#">All</a></li>
                            <li><a data-isotope-filter="Category 1" data-isotope-group="gallery" href="portfolio.html#">Objects</a></li>
                            <li><a data-isotope-filter="Category 2" data-isotope-group="gallery" href="portfolio.html#">People</a></li>
                        </ul>
                        <div class="isotope row" data-isotope-layout="fitRows" data-isotope-group="gallery">
                            <div class="col-12 col-md-6 col-lg-4 isotope-item" data-filter="Category 1">
                                <a class="img-thumbnail-variant-3" href="single-portfolio.html"><img src="/images/portfolio-1-418x315.jpg" alt="" width="418" height="315" /><span class="label-custom label-white">Album</span>
                                    <div class="caption"><span class="icon hover-top-element linear-icon-folder-picture"></span>
                                        <ul class="list-inline-tag hover-top-element">
                                            <li>9 photos</li>
                                            <li>Objects</li>
                                        </ul>
                                        <p class="heading-5 hover-top-element">Portfolio Album</p>
                                        <div class="divider"></div>
                                        <p class="small hover-bottom-element">Creating Portfolio.</p><span class="icon arrow-right linear-icon-arrow-right"></span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4 isotope-item" data-filter="Category 1">
                                <a class="img-thumbnail-variant-3" href="/images/slider-slide-14-1920x1080.jpg" data-lightgallery="item">
                                    <figure><img src="/images/portfolio-2-418x315.jpg" alt="" width="418" height="315" />
                                    </figure>
                                    <div class="caption"><span class="icon hover-top-element linear-icon-picture"></span>
                                        <ul class="list-inline-tag hover-top-element">
                                            <li>Objects</li>
                                        </ul>
                                        <p class="heading-5 hover-top-element">Photo</p>
                                        <div class="divider"></div>
                                        <p class="small hover-bottom-element">Creating Portfolio.</p><span class="icon arrow-right linear-icon-plus"></span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4 isotope-item" data-filter="Category 1">
                                <a class="img-thumbnail-variant-3" href="single-portfolio.html"><img src="/images/portfolio-3-418x315.jpg" alt="" width="418" height="315" /><span class="label-custom label-white">Album</span>
                                    <div class="caption"><span class="icon hover-top-element linear-icon-folder-picture"></span>
                                        <ul class="list-inline-tag hover-top-element">
                                            <li>9 photos</li>
                                            <li>Objects</li>
                                        </ul>
                                        <p class="heading-5 hover-top-element">Portfolio Album</p>
                                        <div class="divider"></div>
                                        <p class="small hover-bottom-element">Creating Portfolio.</p><span class="icon arrow-right linear-icon-arrow-right"></span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4 isotope-item" data-filter="Category 1">
                                <a class="img-thumbnail-variant-3" href="/images/image-original-6-1200x905.jpg" data-lightgallery="item">
                                    <figure><img src="/images/portfolio-4-418x315.jpg" alt="" width="418" height="315" />
                                    </figure>
                                    <div class="caption"><span class="icon hover-top-element linear-icon-picture"></span>
                                        <ul class="list-inline-tag hover-top-element">
                                            <li>Objects</li>
                                        </ul>
                                        <p class="heading-5 hover-top-element">Photo</p>
                                        <div class="divider"></div>
                                        <p class="small hover-bottom-element">Creating Portfolio.</p><span class="icon arrow-right linear-icon-plus"></span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4 isotope-item" data-filter="Category 2">
                                <a class="img-thumbnail-variant-3" href="single-portfolio.html"><img src="/images/portfolio-5-418x315.jpg" alt="" width="418" height="315" /><span class="label-custom label-white">Album</span>
                                    <div class="caption"><span class="icon hover-top-element linear-icon-folder-picture"></span>
                                        <ul class="list-inline-tag hover-top-element">
                                            <li>9 photos</li>
                                            <li>Objects</li>
                                        </ul>
                                        <p class="heading-5 hover-top-element">Portfolio Album</p>
                                        <div class="divider"></div>
                                        <p class="small hover-bottom-element">Creating Portfolio.</p><span class="icon arrow-right linear-icon-arrow-right"></span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4 isotope-item" data-filter="Category 2">
                                <a class="img-thumbnail-variant-3" href="/images/portfolio-orginal-6-1200x675.jpg" data-lightgallery="item">
                                    <figure><img src="/images/portfolio-6-418x315.jpg" alt="" width="418" height="315" />
                                    </figure>
                                    <div class="caption"><span class="icon hover-top-element linear-icon-picture"></span>
                                        <ul class="list-inline-tag hover-top-element">
                                            <li>Objects</li>
                                        </ul>
                                        <p class="heading-5 hover-top-element">Photo</p>
                                        <div class="divider"></div>
                                        <p class="small hover-bottom-element">Creating Portfolio.</p><span class="icon arrow-right linear-icon-plus"></span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4 isotope-item" data-filter="Category 2">
                                <a class="img-thumbnail-variant-3" href="/images/gallery-post-1-886x668.jpg" data-lightgallery="item">
                                    <figure><img src="/images/portfolio-7-418x315.jpg" alt="" width="418" height="315" />
                                    </figure>
                                    <div class="caption"><span class="icon hover-top-element linear-icon-picture"></span>
                                        <ul class="list-inline-tag hover-top-element">
                                            <li>Objects</li>
                                        </ul>
                                        <p class="heading-5 hover-top-element">Photo</p>
                                        <div class="divider"></div>
                                        <p class="small hover-bottom-element">Creating Portfolio.</p><span class="icon arrow-right linear-icon-plus"></span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4 isotope-item" data-filter="Category 2">
                                <a class="img-thumbnail-variant-3" href="/images/day-events-1-886x668.jpg" data-lightgallery="item">
                                    <figure><img src="/images/portfolio-8-418x315.jpg" alt="" width="418" height="315" />
                                    </figure>
                                    <div class="caption"><span class="icon hover-top-element linear-icon-picture"></span>
                                        <ul class="list-inline-tag hover-top-element">
                                            <li>Objects</li>
                                        </ul>
                                        <p class="heading-5 hover-top-element">Photo</p>
                                        <div class="divider"></div>
                                        <p class="small hover-bottom-element">Creating Portfolio.</p><span class="icon arrow-right linear-icon-plus"></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <!-- Classic Pagination-->
                        <nav>
                            <ul class="pagination-classic">
                                <li class="active"><span>1</span></li>
                                <li><a href="portfolio.html#">2</a></li>
                                <li><a href="portfolio.html#">3</a></li>
                                <li><a href="portfolio.html#">4</a></li>
                                <li>
                                    <a class="icon linear-icon-arrow-right" href="portfolio.html#"></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <?php
        $method = ob_get_contents();
        ob_end_clean();
        return $method;
    }
    
    public function getBlogBreadcrumbs()
    {
        ob_start();
        ?>
        <section class="breadcrumbs-custom">
            <div class="container">
                <div class="breadcrumbs-custom__inner">
                    <p class="breadcrumbs-custom__title">BLOG</p>
                </div>
            </div>
        </section>
        <?php
        $method = ob_get_contents();
        ob_end_clean();
        return $method;
    }
    
    public function getBlog()
    {
        ob_start();
        ?>
        <div class="container">
                <div class="breadcrumbs-custom__inner">
                    <p class="breadcrumbs-custom__title">BLOG</p>
                    <!--<ul class="breadcrumbs-custom__path">
              <li><a href="index.html">Home</a></li>
              <li><a href="about.html#">Pages</a></li>
              <li class="active">About</li>
            </ul>-->
                </div>
            </div>
        <section class="bg-default section-lg">
            <div class="container">
                <div class="row row-60">
                    <div class="col-md-6 col-xl-4">
                        <!-- Post classic-->
                        <article class="post-classic post-minimal"><img src="/images/post-minimal-1-418x315.jpg" alt="" width="418" height="315" />
                            <div class="post-classic-title">
                                <h5><a href="/image-post.html">10 Reasons to Buy Monstroid<sup>2</sup>.</a></h5>
                            </div>
                            <div class="post-meta">
                                <div class="group">
                                    <a href="/image-post.html">
                                        <time datetime="2017">Jan.20, 2016</time></a><a class="meta-author" href="/image-post.html">by Brian Williamson</a></div>
                            </div>
                        </article>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <!-- Post classic-->
                        <article class="post-classic post-minimal"><img src="/images/post-classic-1-886x668.jpg" alt="" width="886" height="668" />
                            <div class="post-classic-title">
                                <h5><a href="/image-post.html">Getting to another  level of design and functionality.</a></h5>
                            </div>
                            <div class="post-meta">
                                <div class="group">
                                    <a href="/image-post.html">
                                        <time datetime="2017">Jan.20, 2016</time></a><a class="meta-author" href="/image-post.html">by Brian Williamson</a></div>
                            </div>
                        </article>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <!-- Post slider-->
                        <article class="post-slider post-minimal">
                            <!-- Owl Carousel-->
                            <div class="owl-carousel carousel-post-gallery carousel-slider-blog-post" data-autoplay="true" data-items="1" data-stage-padding="0" data-loop="false" data-margin="10px" data-mouse-drag="false" data-nav="true" data-dots="true" data-lightgallery="group">
                                <div class="item">
                                    <a class="img-thumbnail-variant-1" href="/images/gallery-post-01-original-1354x762.jpg" data-lightgallery="item">
                                        <figure> <img src="/images/gallery-post-1-886x668.jpg" alt="" width="886" height="668" />
                                        </figure>
                                        <div class="caption"><span class="icon icon-lg linear-icon-magnifier"></span></div>
                                    </a>
                                </div>
                                <div class="item">
                                    <a class="img-thumbnail-variant-1" href="/images/gallery-post-02-original-1354x762.jpg" data-lightgallery="item">
                                        <figure> <img src="/images/gallery-post-2-886x668.jpg" alt="" width="886" height="668" />
                                        </figure>
                                        <div class="caption"><span class="icon icon-lg linear-icon-magnifier"></span></div>
                                    </a>
                                </div>
                                <div class="item">
                                    <a class="img-thumbnail-variant-1" href="/images/gallery-post-03-original-1354x762.jpg" data-lightgallery="item">
                                        <figure> <img src="/images/gallery-post-3-886x668.jpg" alt="" width="886" height="668" />
                                        </figure>
                                        <div class="caption"><span class="icon icon-lg linear-icon-magnifier"></span></div>
                                    </a>
                                </div>
                            </div>
                            <div class="post-classic-title">
                                <h5><a href="gallery-post.html">Clean Style. Cons and Pros.</a></h5>
                            </div>
                            <div class="post-meta">
                                <div class="group">
                                    <a href="gallery-post.html">
                                        <time datetime="2017">Jan.20, 2016</time></a><a class="meta-author" href="gallery-post.html">by Brian Williamson</a></div>
                            </div>
                        </article>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <!-- Post video-->
                        <article class="post-video post-minimal">
                            <div class="entry-video embed-responsive embed-responsive-16by9">
                                <iframe width="886" height="668" src="http://www.youtube.com/embed/ccuQoF0vKYU" allowfullscreen=""></iframe>
                            </div>
                            <div class="post-classic-title">
                                <h5><a href="video-post.html">Site Speed and Search Engines Optimization Aspects.</a></h5>
                            </div>
                            <div class="post-meta">
                                <div class="group">
                                    <a href="video-post.html">
                                        <time datetime="2017">Jan.20, 2016</time></a><a class="meta-author" href="video-post.html">by Brian Williamson</a></div>
                            </div>
                        </article>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <!-- Post classic-->
                        <article class="post-classic post-minimal"><img src="/images/post-minimal-2-418x315.jpg" alt="" width="418" height="315" />
                            <div class="post-classic-title">
                                <h5><a href="/image-post.html">10 Reasons to Buy Monstroid<sup>2</sup>.</a></h5>
                            </div>
                            <div class="post-meta">
                                <div class="group">
                                    <a href="/image-post.html">
                                        <time datetime="2017">Jan.20, 2016</time></a><a class="meta-author" href="/image-post.html">by Brian Williamson</a></div>
                            </div>
                        </article>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <!-- Post classic-->
                        <article class="post-classic post-minimal"><img src="/images/post-minimal-3-418x315.jpg" alt="" width="418" height="315" />
                            <div class="post-classic-title">
                                <h5><a href="/image-post.html">10 Reasons to Buy Monstroid<sup>2</sup>.</a></h5>
                            </div>
                            <div class="post-meta">
                                <div class="group">
                                    <a href="/image-post.html">
                                        <time datetime="2017">Jan.20, 2016</time></a><a class="meta-author" href="/image-post.html">by Brian Williamson</a></div>
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
