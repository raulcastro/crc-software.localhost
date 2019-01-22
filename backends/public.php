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
            'title' 		=> "Adriana Alvarado",
            'siteName' 		=> "adrianaalvaradofotografia.com",
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
                    'title'         => "Inicio",
                    'author'        => "",
                    'description'   => "",
                    'subject'       => "",
                    'keywords'      => ""
		        );
            break;
            
		    case 'about':
		        $data['seo'] = array(
		        'title'           => "About",
		        'author'          => "",
		        'description'     => "",
		        'subject'         => "",
		        'keywords'        => ""
		            );
	        break;
                
            case 'portafolio':
		        $data['seo'] = array(
		        'title'           => "portafolio",
		        'author'          => "",
		        'description'     => "",
		        'subject'         => "",
		        'keywords'        => ""
		            );
	        break;
                
            case 'blog':
                $data['seo'] = array(
                    'title'         => "",
                    'author'        => "",
                    'description'   => "",
                    'subject'       => "",
                    'keywords'      => ""
		        );
            break;
                
            case 'paquetes':
                $data['seo'] = array(
                    'title'         => "",
                    'author'        => "",
                    'description'   => "",
                    'subject'       => "",
                    'keywords'      => ""
                );
            break;
                
            case 'contact':
                $data['seo'] = array(
                    'title'         => "contact",
                    'author'        => "",
                    'description'   => "",
                    'subject'       => "",
                    'keywords'      => ""
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
