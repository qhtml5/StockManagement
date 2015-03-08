<?php

// クラス読み込み
require_once 'smarty/Smarty.class.php';
require_once 'StockService.php';

// Smartyの準備
$smarty = new Smarty();
$smarty->template_dir = 'templates/';
$smarty->compile_dir  = 'templates_c/';

if(isset($_POST['category']))
{
	$smarty->assign('errorMessage', "");
	$smarty->assign('code', $_POST['code']);
	$smarty->assign('serial', $_POST['serial']);
	$smarty->assign('name', $_POST['name']);
	$smarty->assign('num', $_POST['num']);
	$smarty->assign('category', $_POST['category']);

} else {
	$smarty->assign('errorMessage', "");
	$smarty->assign('code', "");
	$smarty->assign('serial', "");
	$smarty->assign('name', "");
	$smarty->assign('num', "");
	$smarty->assign('category', "1");
}

// テンプレート表示
$smarty->display('new_input.html');

?>