<?php

// クラス読み込み
require_once 'smarty/Smarty.class.php';
require_once 'StockService.php';

// Smartyの準備
$smarty = new Smarty();
$smarty->template_dir = 'templates/';
$smarty->compile_dir  = 'templates_c/';

// 変数定義
$errorMessage="";

// POSTパラメータ確認
if(isset($_POST['category']))
{
	// 存在する
	// パラメータをassign
	$smarty->assign('category', $_POST['category']);

	// データチェック
	// 型番
	if($_POST['serial']!="")
	{
		// 存在する
		// パラメータをassign
		$smarty->assign('serial', $_POST['serial']);
	} else {
		// 存在しない
		// エラー処理
		$errorMessage = $errorMessage."型番を入力してください<br/>";
	}
	// 品名
	if($_POST['name']!="")
	{
		// 存在する
		// パラメータをassign
		$smarty->assign('name', $_POST['name']);
	} else {
		// 存在しない
		// エラー処理
		$errorMessage = $errorMessage."品名を入力してください<br/>";
	}
	// 在庫
	if($_POST['num']!="")
	{
		// 存在する
		// パラメータをassign
		$smarty->assign('num', $_POST['num']);
	} else {
		// 存在しない
		// エラー処理
		$errorMessage = $errorMessage."在庫を入力してください<br/>";
	}
	
	$smarty->assign('code', $_POST['code']);

	
} else{
	// POSTパラメータが存在しない
}

$smarty->assign('errorMessage', $errorMessage);

// テンプレート表示
if ($errorMessage=="")
{
	$smarty->display('edit_check.html');
}
else
{
	$smarty->assign('code', $_POST['code']);
	$smarty->assign('serial', $_POST['serial']);
	$smarty->assign('name', $_POST['name']);
	$smarty->assign('num', $_POST['num']);
	$smarty->assign('category', $_POST['category']);

	$smarty->display('edit_input.html');
}

?>