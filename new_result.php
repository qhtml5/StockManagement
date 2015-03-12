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
$serial=$_POST['serial'];
$name=$_POST['name'];
$num=$_POST['num'];
$category=$_POST['category'];

$last_access_datetime= new DateTime();
$last_access = $last_access_datetime->format('Y-m-d H:i:s');
$last_member="安部";

$result = $StockService->insert($code, $serial, $name, $category, $num, $last_access, $last_member);

if($result==1)
{
	// 登録完了
	$smarty->assign('resultMessage', "登録が完了しました。");
} else {
	// 登録失敗
	$smarty->assign('resultMessage', "登録エラーです。やり直してください。");
}

$smarty->display('new_result.html');

?>