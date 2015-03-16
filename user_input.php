<?php

// クラス読み込み
require_once 'smarty/Smarty.class.php';
require_once 'StockService.php';

// Smartyの準備
$smarty = new Smarty();
$smarty->template_dir = 'templates/';
$smarty->compile_dir  = 'templates_c/';

if(isset($_POST['username']))
{
	$smarty->assign('errorMessage', "");
	$smarty->assign('username', $_POST['username']);

} else {
	$smarty->assign('errorMessage', "");
	$smarty->assign('username', "");
}

// テンプレート表示
$smarty->display('user_input.html');

?>