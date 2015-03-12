<?php

// クラス読み込み
require_once 'smarty/Smarty.class.php';
require_once 'StockService.php';

// Smartyの準備
$smarty = new Smarty();
$smarty->template_dir = 'templates/';
$smarty->compile_dir  = 'templates_c/';

$code=$_POST['code'];
$serial=$_POST['serial'];
$name=$_POST['name'];
$num=$_POST['num'];
$category=$_POST['category'];
$last_access=$_POST['last_access'];
$last_member=$_POST['last_member'];

$smarty->assign('code', $code);
$smarty->assign('serial', $serial);
$smarty->assign('name', $name);
$smarty->assign('num', $num);
$smarty->assign('category', $category);
$smarty->assign('last_access', $last_access);
$smarty->assign('last_member', $last_member);

$smarty->display('delete_check.html');

?>