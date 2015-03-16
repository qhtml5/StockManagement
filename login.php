<?php

// クラス読み込み
require_once 'smarty/Smarty.class.php';
require_once 'StockService.php';
require_once 'StockUtility.php';
require_once 'StockConstruct.php';

// Smartyの準備
$smarty = new Smarty();
$smarty->template_dir = 'templates/';
$smarty->compile_dir  = 'templates_c/';

// インスタンス
$service = new StockService;
$util = new StockUtility;

// ユーザテーブルから取得
$result = $service->userSelect();

$userdata = $util->formatUserData($result);

if(isset($userdata))
{
	// 検索結果が存在する場合は結果をassign
	$smarty->assign('userdata', $userdata);

} else {
	// 検索結果が0件の場合はnullをassign
	$smarty->assign('userdata', null);
	
};

// テンプレート表示
$smarty->display('login.html');

?>