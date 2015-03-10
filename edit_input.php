<?php

// クラス読み込み
require_once 'smarty/Smarty.class.php';
require_once 'StockService.php';

// Smartyの準備
$smarty = new Smarty();
$smarty->template_dir = 'templates/';
$smarty->compile_dir  = 'templates_c/';

// POSTパラメータ取得
$code = $_POST['code'];
$serial = $_POST['serial'];
$name = $_POST['name'];
$category = $_POST['category'];
$num = $_POST['num'];

$smarty->assign('errorMessage', "");
$smarty->assign('code', $_POST['code']);
$smarty->assign('serial', $_POST['serial']);
$smarty->assign('name', $_POST['name']);
$smarty->assign('num', $_POST['num']);
$smarty->assign('category', $_POST['category']);

// テンプレート表示
$smarty->display('edit_input.html');

?>