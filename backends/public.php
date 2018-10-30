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
            'title' 		=> "CRC Software",
            'siteName' 		=> "CRC Software",
		    'url' 			=> "https://".$_SERVER['HTTP_HOST'].'/',
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
                    'title'         => "Inicio",
                    'author'        => "CRC Software, info@crc-software.com",
                    'description'   => "CRC Software se especializa en programación de CRM, Páginas Web, SEO, Aplicaciones iOS, Android, nos encontramos en Playa del Carmen",
                    'subject'       => "CRC Software, Ingeniería de Software",
                    'keywords'      => "CRC Software, Playa del Carmen, Canadá, Website Development, Páginas Web, Desarrollo Web, SEO",
		        );
            break;
            
		    case 'nosotros':
		        $data['seo'] = array(
		        'title'           => "Nosotros",
		        'author'          => "CRC Software, info@crc-software.com",
		        'description'     => "CRC Software, compañía mexicana localizada en Playa del Carmen, especialista en Desarollo Web, Aplicaciones iOS/Android, Bases de Datos, Consultoría de Software",
		        'subject'         => "¿Quienes Somos? - CRC Software, Ingeniería de Software",
		        'keywords'        => "CRC Software, Playa del Carmen, Desarrollo Web, Aplicaciones iOS/Android, Bases de Datos"
		            );
	        break;
                
            case 'servicios':
		        $data['seo'] = array(
		        'title'           => "Servicios",
		        'author'          => "CRC Software, info@crc-software.com",
		        'description'     => "CRC Software, compañía en Playa del Carmen que ofrece servicio especializados de Ingeniería de Software desde una Página Web, CRM hasta una Aplicación iOS/Android",
		        'subject'         => "CRC Software, Servicios",
		        'keywords'        => "CRC Software, Playa del Carmen, Aplicaciones iOS/Android, CRM, Configuración de Servidores Web"
		            );
	        break;
                
            case 'aplicaciones':
                $data['seo'] = array(
                    'title'         => "Desarrollo de aplicaciones empresariales a medida",
                    'author'        => "CRC Software, info@crc-software.com",
                    'description'   => "En CRC Software podemos desarrollar cualquier aplicación de Sw totalmente personalizada a las necesidades de tu empresa",
                    'subject'       => "CRC Software, Desarrollo de aplicaciones empresariales a medida",
                    'keywords'      => "CRC Software, Playa del Carmen, desarrollo de aplicaciones a medida, Páginas Web, Aplicaciones iOS, Aplicaciones Android"
		        );
            break;
                
            case 'desarrollo-web':
                $data['seo'] = array(
                    'title'         => "Desarrollo Web Responsivo",
                    'author'        => "CRC Software, info@crc-software.com",
                    'description'   => "En CRC Software somos especialistas en el desarrollo de Páginas web, destinados tanto para publicidad como para aplicaciones más complejas, totalmente adaptada a sus necesidades",
                    'subject'       => "CRC Software, Desarrollo Web Responsivo",
                    'keywords'      => "CRC Software, Desarrollo web, Páginas Responsivas, Web Sites, Playa del Carmen"
                );
            break;
                
            case 'aplicaciones-moviles':
                $data['seo'] = array(
                    'title'         => "Aplicaciones Móviles",
                    'author'        => "CRC Software, info@crc-software.com",
                    'description'   => "CRC Software, expertos en desarrollo de aplicaciones móviles en iOS y Android, tanto para fines publicitarios como completas aplicaciones ",
                    'subject'       => "CRC Software, Desarrollo de aplicaciones moviles",
                    'keywords'      => "CRC Software, iOS, Android, Mobile Apps, iOS Apps, Android App"
                );
            break;
                
            case 'sistema-crm':
                $data['seo'] = array(
                    'title'         => "Sistemas CRM",
                    'author'        => "CRC Software, info@crc-software.com",
                    'description'   => "En CRC Software contamos con sistemas CRM diseñados por nuestra propia compañía, programación a medida",
                    'subject'       => "CRC Software, Sistemas CRM",
                    'keywords'      => "CRC Software, CRM, Playa del Carmen, Ingeniería de Software"
		        );
            break;
                
            case 'contacto':
		        $data['seo'] = array(
                    'title'         => "Contacto",
                    'author'        => "CRC Software, info@crc-software.com",
                    'description'   => "CRC Software se encuentra en Playa del Carmen, podemos brindarle consultoría en cualquier lugar del mundo. Contáctenos",
                    'subject'       => "CRC Software, Contacto",
                    'keywords'      => "CRC Software, Playa del Carmen, Ingeniería de Software, iOS, Android, Páginas web"
		        );
            break;
                
            case 'testimonials':
		        $data['seo'] = array(
                    'title'         => "Testimonials",
                    'author'        => "CRC-SOFTWARE",
                    'description'   => "description",
                    'subject'       => "subject",
                    'keywords'      => "keywords"
		        );
            break;
                
            case 'blog':
		        $data['seo'] = array(
                    'title'         => "CRC-software",
                    'author'        => "CRC-software",
                    'description'   => "compañía de desarrollo de software a medida en Mexico,                     que desarrolla aplicaciones de software                                   personalizadas, aplicaciones móviles y ofrece                             consultoría de software en todo el mundo",
                    'subject'       => "subject",
                    'keywords'      => "keywords"
		        );
		        
		        $data['blog'] = $this->model->getAllBlogPosts();
            break;
                
            
                
            case 'portafolio':
                $data['seo'] = array(
                    'title'         => "Portafolio",
                    'author'        => "CRC SW",
                    'description'   => "description",
                    'subject'       => "subject",
                    'keywords'      => "keywords"
		        );
            break;
                
                 case 'base-de-datos':
                $data['seo'] = array(
                    'title'         => "base-de-datos",
                    'author'        => "CRC SW",
                    'description'   => "description",
                    'subject'       => "subject",
                    'keywords'      => "keywords"
		        );
                
                break;
                
                
                
                case 'migracion-de-datos':
                $data['seo'] = array(
                    'title'         => "migracion-de-datos",
                    'author'        => "CRC SW",
                    'description'   => "description",
                    'subject'       => "subject",
                    'keywords'      => "keywords"
		        );
                
                break;
                
                case 'sistemas-operacionales':
                $data['seo'] = array(
                    'title'         => "sistemas-operacionales",
                    'author'        => "CRC SW",
                    'description'   => "description",
                    'subject'       => "subject",
                    'keywords'      => "keywords"
		        );
                
                break;
                
                case 'modernizacion-software':
                $data['seo'] = array(
                    'title'         => "modernizacion-software",
                    'author'        => "CRC SW",
                    'description'   => "description",
                    'subject'       => "subject",
                    'keywords'      => "keywords"
		        );
                
                break;
                
                case 'consultoria-software':
                $data['seo'] = array(
                    'title'         => "consultoria-software",
                    'author'        => "CRC SW",
                    'description'   => "description",
                    'subject'       => "subject",
                    'keywords'      => "keywords"
		        );
                
                break;
                
                case 'rescate-software':
                $data['seo'] = array(
                    'title'         => "rescate-software",
                    'author'        => "CRC SW",
                    'description'   => "description",
                    'subject'       => "subject",
                    'keywords'      => "keywords"
		        );
                
                break;
                
                case 'recuperacion-codigo':
                $data['seo'] = array(
                    'title'         => "recuperacion-codigo",
                    'author'        => "CRC SW",
                    'description'   => "description",
                    'subject'       => "subject",
                    'keywords'      => "keywords"
		        );
                
                break;
                
                 case 'soporte-de-aplicaciones':
                $data['seo'] = array(
                    'title'         => "soporte de aplicaciones",
                    'author'        => "CRC SW",
                    'description'   => "description",
                    'subject'       => "subject",
                    'keywords'      => "keywords"
		        );
                
                break;
                
                 case 'hosting':
                $data['seo'] = array(
                    'title'         => "hosting",
                    'author'        => "CRC SW",
                    'description'   => "description",
                    'subject'       => "subject",
                    'keywords'      => "keywords"
		        );
                
                break;
                
                case 'desarrollo-de-software':
                $data['seo'] = array(
                    'title'         => "desarrollo de software",
                    'author'        => "CRC SW",
                    'description'   => "description",
                    'subject'       => "subject",
                    'keywords'      => "keywords"
		        );
                
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
