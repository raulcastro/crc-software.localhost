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
// 		Info of the Application
		
		
		$data['info'] = array( 
            'title' 		    => "CRC Software",
            'siteName' 		=> "CRC Software",
		    'url' 			=> "http://".$_SERVER['HTTP_HOST'].'/',
		    'urlMedia' 	    => $appInfo['url'],
            'location'		=> "",
            'creator' 		=> "CRC Software",
            'creatorUrl' 	=> "",
            'twitter' 		=> "",
            'facebook' 		=> "",
            'instagram'		=> "",
            'email'			=> "",
            'lang'			=> "en"
		);
		
		//$data['categories'] = $this->model->getBlogCategories();
		
		switch ($section) 
		{
		    case 'index':
		        $data['seo'] = array(
                    'title'         => "Home",
                    'author'        => "CRC Software",
                    'description'   => "description",
                    'subject'       => "subject",
                    'keywords'      => "keywords"
		        );
                
                
		        
		        $data['posts'] = $this->model->getAllBlogPosts();
		        $data['months'] = $this->model->getMonthsBlog();
		        
		        $itemsPerPage = 2;
		        $total = sizeof($data['posts']);
		        $data['posts']['total'] = $total;
		        $data['posts']['limit'] = $itemsPerPage;
		        $data['posts']['ceil'] = ceil($total / $itemsPerPage);
		        
// 		        var_dump($data['posts']);
		        
		        $from = 0;

		        if (!isset($_GET['from']))
		        {
		            $from = 0;
		        }
		        else
		        {
		            $from = $_GET['from'];
		        }
		        
		        /*if ($_GET['category'] == "all")
		        {
		            $data['page'] = $this->model->getPostsRange($from, $data['posts']['limit']);
		        }*/
		        
// 		        var_dump($data['page']);
            break;
            
		    case 'nosotros':
		        $data['seo'] = array(
		        'title'           => "Nosotros",
		        'author'          => "CRC Sw",
		        'description'     => "compañía de desarrollo de software a medida en Mexico,                     que desarrolla aplicaciones de software                                        personalizadas, aplicaciones móviles y ofrece                                  consultoría de software en todo el mundo",
		        'subject'         => "subject",
		        'keywords'        => "keywords"
		            );
	        break;
                
            case 'servicios':
		        $data['seo'] = array(
		        'title'           => "servicios",
		        'author'          => "CRC Sw",
		        'description'     => "description",
		        'subject'         => "subject",
		        'keywords'        => "keywords"
		            );
	        break;
                
            case 'gallery':
		        $data['seo'] = array(
                    'title'         => "Gallery",
                    'author'        => "CRC-SOFTWARE",
                    'description'   => "description",
                    'subject'       => "subject",
                    'keywords'      => "keywords"
		        );
		        
		        $data['gallery'] = $this->model->getAllGalleryPhotos();
		        
		        $itemsPerPage = 12;
		        $total = sizeof($data['gallery']);
		        $data['gallery']['total'] = $total;
		        $data['gallery']['limit'] = $itemsPerPage;
		        $data['gallery']['ceil'] = ceil($total / $itemsPerPage);
		        
		        $from = 0;
		        
		        if (!isset($_GET))
		        {
		            $from = 0;
		        }
		        else 
		        {
		            $from = $_GET['from'];
		        }
		       
		        $data['page'] = $this->model->getPhotoRange($_GET['from'], $data['gallery']['limit']);
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
                
            case 'contacto':
		        $data['seo'] = array(
                    'title'         => "Contact",
                    'author'        => "CRC SW",
                    'description'   => "description",
                    'subject'       => "subject",
                    'keywords'      => "keywords"
		        );
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
                
            case 'aplicaciones':
                $data['seo'] = array(
                    'title'         => "Aplicaciones",
                    'author'        => "CRC SW",
                    'description'   => "description",
                    'subject'       => "subject",
                    'keywords'      => "keywords"
		        );
                
                break;
                
                case 'desarrollo-web':
                $data['seo'] = array(
                    'title'         => "desarrollo-web",
                    'author'        => "CRC SW",
                    'description'   => "description",
                    'subject'       => "subject",
                    'keywords'      => "keywords"
		        );
                
                break;
                
                case 'aplicaciones-moviles':
                $data['seo'] = array(
                    'title'         => "aplicaciones-moviles",
                    'author'        => "CRC SW",
                    'description'   => "description",
                    'subject'       => "subject",
                    'keywords'      => "keywords"
		        );
                
                break;
                
                 case 'base-de-datos':
                $data['seo'] = array(
                    'title'         => "abase-de-datos",
                    'author'        => "CRC SW",
                    'description'   => "description",
                    'subject'       => "subject",
                    'keywords'      => "keywords"
		        );
                
                break;
                
                case 'sistema-crm':
                $data['seo'] = array(
                    'title'         => "sistema-crm",
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
                
		    
			default:
			break;
		}
		
		return $data;
	}
}

$backend = new generalBackend();

// $info = $backend->loadBackend();
// var_dump($info['categoryInfo']);
