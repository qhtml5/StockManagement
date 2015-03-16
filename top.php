<?php

session_start();

// TOP画面の表示と、現在在庫の検索を行う

// クラスの読み込み
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

// 変数定義
$code=$util->get_get_code();
$serial=$util->get_get_serial();
$name=$util->get_get_name();
$category=$util->get_get_category();
$errorMessage = "";

$s_code=$util->get_session_code();
$s_serial=$util->get_session_serial();
$s_name=$util->get_session_name();
$s_category=$util->get_session_category();

// データチェック
if (isset($code) || isset($serial) || isset($name) || isset($category))
{
	print('getある');
	// 取得したパラメータで検索を行う
	$result = $service->select($code, $serial, $name, $category);
	// 検索値をセッションに保持
	$_SESSION[StockConstruct::code]=$code;
	$_SESSION[StockConstruct::serial]=$serial;
	$_SESSION[StockConstruct::name]=$name;
	$_SESSION[StockConstruct::category]=$category;

	// 検索条件入力値設定用assign
	$smarty->assign(StockConstruct::code, $code);
	$smarty->assign(StockConstruct::serial, $serial);
	$smarty->assign(StockConstruct::name, $name);
	$smarty->assign(StockConstruct::category, $category);

} else {
	print('getない');

	//セッション値があるか
	if (isset($s_code) || isset($s_serial) || isset($s_name) || isset($s_category)) {
	print('sessionある');
		// 取得したパラメータで検索を行う
		$result = $service->select($s_code, $s_serial, $s_name, $s_category);

		// 検索条件入力値設定用assign
		$smarty->assign(StockConstruct::code, $s_code);
		$smarty->assign(StockConstruct::serial, $s_serial);
		$smarty->assign(StockConstruct::name, $s_name);
		$smarty->assign(StockConstruct::category, $s_category);

	} else {
	print('sessionない');
		// GETもSESSIONもない
		// パラメータが欠けている場合は初期表示
		// トナー在庫の検索を行う
		$result = $service->select(StockConstruct::emp, StockConstruct::emp, 
									StockConstruct::emp, StockConstruct::category_toner);
	
		// 検索条件入力値設定用assign
		$smarty->assign(StockConstruct::code, $code);
		$smarty->assign(StockConstruct::serial, $serial);
		$smarty->assign(StockConstruct::name, $name);
		$smarty->assign(StockConstruct::category, $category);
	}
}

$stockdata = $util->formatStockData($result);

if(isset($stockdata))
{
	// 検索結果が存在する場合は結果をassign
	$smarty->assign(StockConstruct::stockdata, $stockdata);

} else {
	// 検索結果が0件の場合はnullをassign
	$smarty->assign(StockConstruct::stockdata, null);
	
};

// 画面表示用assign
$smarty->assign(StockConstruct::errorMessage, $errorMessage);
$smarty->assign(StockConstruct::io_num, StockConstruct::emp);

// テンプレート表示
$smarty->display(StockConstruct::top_html);

?>