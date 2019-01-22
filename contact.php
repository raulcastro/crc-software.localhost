<?php
// var_dump($_SERVER);

 	error_reporting(E_ALL);
 	ini_set("display_errors", 0);

$root = filter_input(INPUT_SERVER, 'DOCUMENT_ROOT', FILTER_SANITIZE_STRING);

//require_once 'backends/public.php';
require_once ($root.'/views/Layout_View.php');

$section = "contact";

//$data 		= $backend->loadBackend($section);
// 	var_dump($data);
$view 		= new Layout_View($data);

echo $view->printHTMLPage($section);