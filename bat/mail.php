<?php
$products = unserialize(StripSlashes($_COOKIE['categories']));
//var_dump($products);
//var_dump($_POST);

switch ($_POST[opt])
{
	case 1: // add to cart
		$category = $_POST['pCategory'];
		$stock = $_POST['pStock'];
		
// 		var_dump($products[$category]);
		
		$products[$category][$stock] = array();
		$products[$category][$stock]['pCategory'] 	= $_POST['pCategory'];
		$products[$category][$stock]['pId'] 		= $_POST['pStock'];
		$products[$category][$stock]['pImage'] 		= $_POST['pImage'];
		$products[$category][$stock]['pLink'] 		= $_POST['pLink'];
		$products[$category][$stock]['pName'] 		= $_POST['pName'];
		$products[$category][$stock]['fromDate']	= $_POST['dateFrom'];
		$products[$category][$stock]['toDate'] 		= $_POST['dateTo'];
		$products[$category][$stock]['nProducts'] 	= $_POST['nProduct'];
		$products[$category][$stock]['nDays'] 		= $_POST['nDays'];
		$products[$category][$stock]['total'] 		= $_POST['total'];
		
// 		$product = array(
// 			'fromDate' => $_POST['dateFrom'],
// 			'toDate' => $_POST['dateTo'],
// 			'nProducts' => $_POST['nProduct'],
// 			'total' => $_POST['total']
// 		);
		
		//array_push($products[$category][$stock], $product);
		
		
		
// 		var_dump($products[$category]);
// 		var_dump($products);
		
		if (setcookie("categories", serialize($products), time() + (86400 * 30), "/"))
		{
			echo 1;
		}
	break;
	
	
	case 2:
		$category = $_POST['pCategory'];
		$stock = $_POST['pStock'];
// 		var_dump($products);
		unset($products[$category][$stock]);
// 		var_dump($products);
		if (setcookie("categories", serialize($products), time() + (86400 * 30), "/"))
		{
			echo 1;
		}
	break;
}