<?php

// クラス読み込み
require_once 'smarty/Smarty.class.php';
require_once 'StockService.php';

// Smartyの準備
$smarty = new Smarty();
$smarty->template_dir = 'templates/';
$smarty->compile_dir  = 'templates_c/';

// POSTパラメータ確認
if(isset($_POST['username']))
{
	// 存在する
	// パラメータをassign
	$smarty->assign('username', $_POST['username']);

	
} else{
	// POSTパラメータが存在しない
	// ログイン画面に戻す
}

$smarty->assign('username', $_POST['username']);

$smarty->display('user_check.html');

?>