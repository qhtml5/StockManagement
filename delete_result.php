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

$code=$_POST['code'];

$result = $StockService->delete($code);

if(isset($result))
{
	// 削除完了
	$smarty->assign('resultMessage', "削除が完了しました。");
} else {
	// 削除失敗
	$smarty->assign('resultMessage', "削除エラーです。やり直してください。");
}

$smarty->display('delete_result.html');

?>