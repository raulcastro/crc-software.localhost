<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root.'/models/Front_Model.php';

class generalBackend
{
	protected  $model;
	
	public function __construct()
	{
		$this->model = new Front_Model();
	}
	
	public function loadBackend($section = '')
	{
		$data 		= array();
		$appInfo = $this->model->getGeneralAppInfo();
// 		Basic app info
		$data['info'] = array( 
            'title' => "Servicios de programacion web y aplicaciones moviles | CRC Software",
            'siteName' 		=> "CRC Software",
		    'url' 			=> "http://".$_SERVER['HTTP_HOST'].'/',
		    'urlMedia' 	    => $appInfo['url'],
            'creator' 		=> "CRC Software, crc-software.com",
            'creatorUrl' 	=> "https://crc-software.com",
            'twitter' 		=> "https://twitter.com/CrcSoftware",
            'facebook' 		=> "https://www.facebook.com/CRC-Software-245425266129619/",
            'email'			=> "info@crc-software.com",
            'lang'			=> "es"
		);
		
		switch ($section) 
		{
		    case 'index':
		        $data['seo'] = array(
                    'title' => "Servicios de programacion web y aplicaciones moviles | CRC- Software",
                    'author' => "CRC-Software",
                    'description' => "Especialistas en programación de CRM, Páginas Web, SEO, Aplicaciones moviles iOS y Android en Playa del Carmen",
                    'subject' => "subject",
                    'og-type' => "website",
                    'og-title' => "Servicios de programacion web y aplicaciones moviles | CRC Software",
                    'og-description' => "Desarrollo web en playa del carmen, base de datos, sistema CRM, apliacaciones moviles, SEO, pocisionamiento web, Riviera Maya",
                    'og-url' => "https://crc-software.com",
                    'og-site_name' =>"CRC-Software",
                     'twitter:card' => "summary",
                    'twitter:description' => "Especialistas en programación de CRM, Páginas Web, SEO, Aplicaciones moviles iOS y Android en Playa del Carmen",
                    'twitter:title' => "CRC-Software"
		        );
            break;
            
		    case 'nosotros':
		        $data['seo'] = array(
                    'title' => "Servicios de programacion web y aplicaciones moviles playa del carmen | CRC-Software",
                    'author' => "CRC-Software",
                    'description' => "CRC Software, compañía mexicana localizada en Playa del Carmen, especialista en Desarollo Web, Aplicaciones iOS/Android, Bases de Datos, Consultoría de Software",
                    'subject' => "¿Quienes Somos? - CRC Software, Ingeniería de Software",
                    'og-type' => "artitle",
                    'og-title' => "Nosotros",
                    'og-description' => "Desarrollo web en playa del carmen, base de datos, sistema CRM, apliacaciones moviles, SEO, pocisionamiento web, Riviera Maya",
                    'og-url' => "https://crc-software.com/nosotros",
                    'og-site_name' =>"CRC-Software",
                     'twitter:card' => "summary",
                    'twitter:description' => "Especialistas en programación de CRM, Páginas Web, SEO, Aplicaciones moviles iOS y Android en Playa del Carmen",
                    'twitter:title' => "CRC-Software"   
		            );
	        break;
                
            case 'servicios':
		        $data['seo'] = array(
                    'title' => "Servicios de programacion web y aplicaciones moviles playa del carmen | CRC-Software, info@crc-software.com",
                    'author' => "CRC-Software",
                    'description' => "CRC Software, compañía en Playa del Carmen que ofrece servicio especializados de Ingeniería de Software desde una Página Web, CRM hasta una Aplicación iOS/Android",
                    'subject' => "CRC Software, Servicios",
                    'og-type' => "artitle",
                    'og-title' => "servicios",
                    'og-description' => "CRC Software, compañía en Playa del Carmen que ofrece servicio especializados de Ingeniería de Software desde una Página Web, CRM hasta una Aplicación iOS/Android",
                    'og-url' => "https://crc-software.com/servicios",
                    'og-site_name' =>"CRC-Software",
                     'twitter:card' => "summary",
                    'twitter:description' => "Especialistas en programación de CRM, Páginas Web, SEO, Aplicaciones moviles iOS y Android en Playa del Carmen",
                    'twitter:title' => "CRC-Software"   
		            );
	        break;
                
            case 'aplicaciones':
                $data['seo'] = array(
                    'title' => "Desarrollo de aplicaciones empresariales Playa del Carmen | CRC-Software, info@crc-software.com",
                    'author' => "CRC-Software",
                    'description' => "Podemos desarrollar cualquier aplicación de Software totalmente personalizada a las necesidades de tu empresa",
                    'subject' => "CRC Software, aplicaciones",
                    'og-type' => "artitle",
                    'og-title' => "aplicaciones",
                    'og-description' => "Podemos desarrollar cualquier aplicación de Software totalmente personalizada a las necesidades de tu empresa",
                    'og-url' => "https://crc-software.com/aplicaciones",
                    'og-site_name' =>"CRC-Software",
                     'twitter:card' => "summary",
                    'twitter:description' => "Especialistas en programación de CRM, Páginas Web, SEO, Aplicaciones moviles iOS y Android en Playa del Carmen",
                    'twitter:title' => "CRC-Software"   
		            );
            
            break;
                
            case 'desarrollo-web':
                $data['seo'] = array(
                    
                    'title' => "Desarrollo Web Responsivo Playa del Carmen, Riviera Maya",
                    'author' => "CRC-Software",
                    'description' => "Somos especialistas en el desarrollo de Páginas web, destinados tanto para publicidad como para aplicaciones más complejas, totalmente adaptada a sus necesidades",
                    'subject' => "CRC Software, aplicaciones",
                    'og-type' => "artitle",
                    'og-title' => "aplicaciones",
                    'og-description' => "Especialistas en el desarrollo de Páginas web, destinados tanto para publicidad como para aplicaciones más complejas, totalmente adaptada a sus necesidades",
                    'og-url' => "https://crc-software.com/desarrollo-web",
                    'og-site_name' =>"CRC-Software",
                     'twitter:card' => "summary",
                    'twitter:description' => "Especialistas en programación de CRM, Páginas Web, SEO, Aplicaciones moviles iOS y Android en Playa del Carmen",
                    'twitter:title' => "CRC-Software"   
		            );
            
            break;
                
            case 'aplicaciones-moviles':
                $data['seo'] = array(
                    'title' => "Aplicaciones moviles Playa del Carmen, Riviera Maya",
                    'author' => "CRC-Software",
                    'description' => "CRC Software, expertos en desarrollo de aplicaciones móviles en iOS y Android, tanto para fines publicitarios como completas aplicaciones",
                    'subject' => "CRC Software, Desarrollo de aplicaciones moviles",
                    'og-type' => "artitle",
                    'og-title' => "Aplicaciones moviles, App movil",
                    'og-description' => "CRC Software, expertos en desarrollo de aplicaciones móviles en iOS y Android, tanto para fines publicitarios como completas aplicaciones",
                    'og-url' => "https://crc-software.com/aplicaciones-moviles",
                    'og-site_name' =>"CRC-Software",
                     'twitter:card' => "summary",
                    'twitter:description' => "Especialistas en programación de CRM, Páginas Web, SEO, Aplicaciones moviles iOS y Android en Playa del Carmen",
                    'twitter:title' => "CRC-Software"   
		            );
            break;
                
            case 'sistema-crm':
                $data['seo'] = array(
                    
                    'title' => "Sistema CRM Playa del Carmen, Riviera Maya",
                    'author' => "CRC-Software",
                    'description' => "Contamos con sistemas CRM diseñados por nuestra propia compañía, programación a medida",
                    'subject' => "CRC Software, sistema CRM",
                    'og-type' => "artitle",
                    'og-title' => "Software Customer Relationship Management",
                    'og-description' => "Desarrollo de sistemas CRM",
                    'og-url' => "https://crc-software.com/sistema-crm",
                    'og-site_name' =>"CRC-Software",
                     'twitter:card' => "summary",
                    'twitter:description' => "Especialistas en programación de CRM, Páginas Web, SEO, Aplicaciones moviles iOS y Android en Playa del Carmen",
                    'twitter:title' => "CRC-Software"   
		            );
            break;
                
             case 'migracion-de-datos':
                $data['seo'] = array(
                    
                    'title' => "Migracion de datos",
                    'author' => "CRC-Software",
                    'description' => "Servicio de migración de datos rápido, eficiente y seguro",
                    'subject' => "CRC Software, migracion de datos",
                    'og-type' => "artitle",
                    'og-title' => "Migracion de datos",
                    'og-description' => "Base de datos, Playa del Carmen. Ingenieria de software",
                    'og-url' => "https://crc-software.com/migracion-de-datos",
                    'og-site_name' =>"CRC-Software",
                     'twitter:card' => "summary",
                    'twitter:description' => "Especialistas en programación de CRM, Páginas Web, SEO, Aplicaciones moviles iOS y Android en Playa del Carmen",
                    'twitter:title' => "CRC-Software"   
		            );
            
            break;
                
                 case 'sistemas-operacionales':
                $data['seo'] = array(
                    
                    'title' => "Sistema operacionales",
                    'author' => "CRC-Software",
                    'description' => "Adaptar sus procesos y funcionalidad de los sistemas ",
                    'subject' => "CRC Software, sistemas operacionales",
                    'og-type' => "artitle",
                    'og-title' => "Sistemas operacionales",
                    'og-description' => "CRC Software, sistemas operacionales , Playa del Carmen, Ingeniería de Software",
                    'og-url' => "https://crc-software.com/sistemas-operacionales",
                    'og-site_name' =>"CRC-Software",
                     'twitter:card' => "summary",
                    'twitter:description' => "Especialistas en programación de CRM, Páginas Web, SEO, Aplicaciones moviles iOS y Android en Playa del Carmen",
                    'twitter:title' => "CRC-Software"  
		        );
            break;
                
                 case 'modernizacion-software':
                $data['seo'] = array(
                    
                    'title' => "Modernizacion de software",
                    'author' => "CRC-Software",
                    'description' => "En CRC construimos un remplazo poderoso que no gaste dinero ni tiempo",
                     'subject' => "CRC Software, ingeniera de software",
                    'og-type' => "artitle",
                    'og-title' => "Modernizacion de software",
                    'og-description' => "Ingenieria de software, Playa del Carmen",
                    'og-url' => "https://crc-software.com/modernizacion-de-software",
                    'og-site_name' =>"CRC-Software",
                     'twitter:card' => "summary",
                    'twitter:description' => "Especialistas en programación de CRM, Páginas Web, SEO, Aplicaciones moviles iOS y Android en Playa del Carmen",
                    'twitter:title' => "CRC-Software"  
		        );
            break;
                
                 case 'consultoria-software':
                $data['seo'] = array(
                    
                    'title' => "Consultoria de software",
                    'author' => "CRC-Software",
                    'description' => "Te ayudamos para identificar barreras tecnológicas que se interponen entre el cliente y un negocio rentable",
                     'subject' => "CRC Software, consultoria de software",
                    'og-type' => "artitle",
                    'og-title' => "Consultoria de software",
                    'og-description' => "Ingenieria de software, consultoria software, Playa del Carmen",
                    'og-url' => "https://crc-software.com/consultoria-software",
                    'og-site_name' =>"CRC-Software",
                     'twitter:card' => "summary",
                    'twitter:description' => "Especialistas en programación de CRM, Páginas Web, SEO, Aplicaciones moviles iOS y Android en Playa del Carmen",
                    'twitter:title' => "CRC-Software" 
		        );
            break;
                
                case 'rescate-software':
                $data['seo'] = array(
                    
                    
                    'title' => "Rescatamos tu proyecto software",
                    'author' => "CRC-Software",
                    'description' => "Ponemos rápidamente su negocio nuevamente en marcha",
                    'subject' => "CRC Software, rescate de proyectos software",
                    'og-type' => "artitle",
                    'og-title' => "Rescatamos proyectos",
                    'og-description' => "Ingenieria de software, consultoria software, Playa del Carmen",
                    'og-url' => "https://crc-software.com/rescate-software",
                    'og-site_name' =>"CRC-Software",
                     'twitter:card' => "summary",
                    'twitter:description' => "CRC Software, proyectos software, Playa del Carmen, Ingeniería de Software",
                    'twitter:title' => "CRC-Software" 
		        );
            break;
                
                case 'recuperacion-codigo':
                $data['seo'] = array(
                    
                    'title' => "Recuperacion de codigo fuente",
                    'author' => "CRC-Software",
                    'description' => "En CRC recuperamos o desarrollmos codigo fuente perdido.",
                    'subject' => "CRC Software, codigo fuente",
                    'og-type' => "artitle",
                    'og-title' => "Desarrollo de codigo fuente",
                    'og-description' => "Desarrollo de codigo fuente, software, desarrollo      web, Playa del Carmen",
                    'og-url' => "https://crc-software.com/recuperacion-codigo",
                    'og-site_name' =>"CRC-Software",
                     'twitter:card' => "summary",
                    'twitter:description' => "CRC Software, proyectos software, Playa del Carmen, Ingeniería de Software",
                    'twitter:title' => "CRC-Software" 
		        );
            break;
                
                case 'soporte-de-aplicaciones':
                $data['seo'] = array(
                    
                    'title' => "Soperte de aplicaciones",
                    'author' => "CRC-Software",
                    'description' => "mantenemos su software activo y funcional",
                    'subject' => "CRC Software, soporte de aplicaciones",
                    'og-type' => "artitle",
                    'og-title' => "soporte de aplicaciones",
                    'og-description' => "Soporte y mantenimiento de aplicaciones, software, desarrollo web, Playa del Carmen",
                    'og-url' => "https://crc-software.com/soporte-de-aplicaciones",
                    'og-site_name' =>"CRC-Software",
                     'twitter:card' => "summary",
                    'twitter:description' => "CRC Software, proyectos software, Playa del Carmen, Ingeniería de Software",
                    'twitter:title' => "CRC-Software" 
		        );
            break;
                
                 case 'hosting':
                $data['seo'] = array(
                    
                    'title' => "Hosting",
                    'author' => "CRC-Software",
                    'description' => "Brindamos servicio de alojamiento web hosting",
                    'subject' => "CRC Software, hosting",
                    'og-type' => "artitle",
                    'og-title' => "Hosting",
                    'og-description' => "Hosting Playa del Carmen, Ingenieria de software",
                    'og-url' => "https://crc-software.com/hosting",
                    'og-site_name' =>"CRC-Software",
                     'twitter:card' => "summary",
                    'twitter:description' => "CRC Software, proyectos software, Playa del Carmen, Ingeniería de Software",
                    'twitter:title' => "CRC-Software"
		        );
            break;
                
                case 'desarrollo-de-software':
                $data['seo'] = array(
                    
                    
                    'title' => "Desarrollo de software",
                    'author' => "CRC-Software",
                    'description' => "Desarrollo de software",
                    'subject' => "CRC Software, paginas web",
                    'og-type' => "artitle",
                    'og-title' => "Desarrollo de software Playa del Carmen",
                    'og-description' => "Paginas web Playa del Carmen, Ingenieria de software",
                    'og-url' => "https://crc-software.com/desarrollo-de-software",
                    'og-site_name' =>"CRC-Software",
                     'twitter:card' => "summary",
                    'twitter:description' => "CRC Software, proyectos software, Playa del Carmen, Ingeniería de Software",
                    'twitter:title' => "CRC-Software"
		        );
            break;
                
                
                
                
            case 'contacto':
		        $data['seo'] = array(
                    
                    'title' => "Contacto",
                    'author' => "CRC-Software",
                    'description' => "CRC Software se encuentra en Playa del Carmen, podemos brindarle consultoría en cualquier lugar del mundo. Contáctenos",
                    'subject' => "CRC Software, Contacto",
                    'og-type' => "artitle",
                    'og-title' => "Contacto Playa del Carmen",
                    'og-description' => "Paginas web Playa del Carmen, Ingenieria de software, iOS, Android",
                    'og-url' => "https://crc-software.com/contacto",
                    'og-site_name' =>"CRC-Software",
                     'twitter:card' => "summary",
                    'twitter:description' => "CRC Software, proyectos software, Playa del Carmen, Ingeniería de Software",
                    'twitter:title' => "CRC-Software"
		        );
            break;
                
            case 'blog':
		        $data['seo'] = array(
                    'title'         => "CRC-software",
                    'author'        => "CRC-software",
                    'description'   => "compañía de desarrollo de software a medida en Mexico,                     que desarrolla aplicaciones de software                                   personalizadas, aplicaciones móviles y ofrece                             consultoría de software en todo el mundo"
		        );
		        
		        $data['blog'] = $this->model->getAllBlogPosts();
            break;
                
		    
			default:
			break;
		}
		
		return $data;
	}
}

$backend = new generalBackend();

// $info = $backend->loadBackend();
// var_dump($info['categoryInfo']);
