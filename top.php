<?php

// TOP画面の表示と、現在在庫の検索を行う

// クラスの読み込み
require_once 'smarty/Smarty.class.php';
require_once 'StockService.php';

// Smartyの準備
$smarty = new Smarty();
$smarty->template_dir = 'templates/';
$smarty->compile_dir  = 'templates_c/';

// インスタンス
$StockService = new StockService;

// 変数定義
$code="";
$serial="";
$name="";
$category="";

// GETパラメータの有無
if(isset($_GET['category']))
{
	// GETパラメータがある場合
	// 取得したパラメータで検索を行う
	$result = $StockService->select($_GET['code'], $_GET['serial'], $_GET['name'], $_GET['category']);
	$code=$_GET['code'];
	$serial=$_GET['serial'];
	$name=$_GET['name'];
	$category=$_GET['category'];
}
else
{
	// GETパラメータがない場合
	// トナー在庫の検索を行う
	$result = $StockService->select("", "", "", "1");
}

// 配列用変数
$i=0;

// 検索結果を配列に格納
foreach($result as $value)
{
	$stockdata[$i]['code'] = $value['code'];
	$stockdata[$i]['serial'] = $value['serial'];
	$stockdata[$i]['name'] = $value['name'];
	$stockdata[$i]['num'] = $value['num'];
	$stockdata[$i]['category'] = $value['category'];
	$stockdata[$i]['last_access'] = $value['last_access'];
	$stockdata[$i]['last_member'] = $value['last_member'];
	$i++;
}

// データの有無
if(isset($stockdata))
{
	// 検索結果が存在する場合は結果をassign
	$smarty->assign('stockdata', $stockdata);
} else {
	// 検索結果が0件の場合はnullをassign
	$smarty->assign('stockdata', null);
}

// 検索条件入力値設定用assign
$smarty->assign('code', $code);
$smarty->assign('serial', $serial);
$smarty->assign('name', $name);
$smarty->assign('category', $category);

// テンプレート表示
$smarty->display('top.html');

?>