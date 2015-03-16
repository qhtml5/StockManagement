<?php

// クラス読み込み
require_once 'smarty/Smarty.class.php';
require_once 'StockService.php';

// Smartyの準備
$smarty = new Smarty();
$smarty->template_dir = 'templates/';
$smarty->compile_dir  = 'templates_c/';

// インスタンス
$StockService = new StockService;

$username=$_POST['username'];

$result = $StockService->userInsert($username);

if($result==1)
{
	// 登録完了
	$smarty->assign('resultMessage', "登録が完了しました。");
} else {
	// 登録失敗
	$smarty->assign('resultMessage', "登録エラーです。やり直してください。");
}

$smarty->display('user_result.html');

?>