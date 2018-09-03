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
		
		$data['categories'] = $this->model->getBlogCategories();
		
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
		        
		        if ($_GET['category'] == "all")
		        {
		            $data['page'] = $this->model->getPostsRange($from, $data['posts']['limit']);
		        }
		        
// 		        var_dump($data['page']);
            break;
            
		    case 'services':
		        $data['seo'] = array(
		        'title'           => "Services",
		        'author'          => "Michelle",
		        'description'     => "description",
		        'subject'         => "subject",
		        'keywords'        => "keywords"
		            );
	        break;
                
            case 'gallery':
		        $data['seo'] = array(
                    'title'         => "Gallery",
                    'author'        => "Michelle",
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
                    'author'        => "Michelle",
                    'description'   => "description",
                    'subject'       => "subject",
                    'keywords'      => "keywords"
		        );
            break;
                
            case 'blog':
		        $data['seo'] = array(
                    'title'         => "Blog",
                    'author'        => "Michelle",
                    'description'   => "description",
                    'subject'       => "subject",
                    'keywords'      => "keywords"
		        );
		        
		        $data['blog'] = $this->model->getAllBlogPosts();
            break;
                
            case 'contact':
		        $data['seo'] = array(
                    'title'         => "Contact",
                    'author'        => "Michelle",
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
