<?php

require_once 'smarty/Smarty.class.php';
require_once 'StockService.php';

$smarty = new Smarty();
$smarty->template_dir = 'templates/';
$smarty->compile_dir  = 'templates_c/';

$StockService = new StockService;

$code="";
$serial="";
$name="";
$category="";

if(isset($_GET['category']))
{
	$result = $StockService->select($_GET['code'], $_GET['serial'], $_GET['name'], $_GET['category']);
	$code=$_GET['code'];
	$serial=$_GET['serial'];
	$name=$_GET['name'];
	$category=$_GET['category'];
}
else
{
	$result = $StockService->select("", "", "", "1");
}

$i=0;
foreach($result as $value)
{
	$stockdata[$i]['code'] = $value['code'];
	$stockdata[$i]['serial'] = $value['serial'];
	$stockdata[$i]['name'] = $value['name'];
	$stockdata[$i]['num'] = $value['num'];
	$stockdata[$i]['category'] = $value['category'];
	$stockdata[$i]['last_access'] = $value['last_access'];
	$stockdata[$i]['last_member'] = $value['last_member'];
	$i++;
}

if(isset($stockdata))
{
	$smarty->assign('stockdata', $stockdata);
} else {
	$smarty->assign('stockdata', null);
}
$smarty->assign('code', $code);
$smarty->assign('serial', $serial);
$smarty->assign('name', $name);
$smarty->assign('category', $category);
$smarty->display('top.html');

?>