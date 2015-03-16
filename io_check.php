<?php

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
$errorMessage="";
$io_num = $util->get_post_io_num();

// 入力値確認
if(isset($io_num)) {
	// nullでない
	if($io_num==StockConstruct::emp) {
		// 未入力
		$errorMessage = "数量を入力してください";
		$smarty->assign(StockConstruct::errorMessage, $errorMessage);
		// 表示をキープしたままTOP画面表示
		// 検索パラメータを取得して戻す
		// セッションから取得する
		$code = $util->get_session_code();
		$serial = $util->get_session_serial();
		$name = $util->get_session_name();
		$category = $util->get_session_category();

		// データチェック
		if (isset($code) || isset($serial) || isset($name) || isset($category))
		{
			// 取得したパラメータで検索を行う
			$result = $service->select($code, $serial, $name, $category);
			// 検索値をセッションに保持
			$_SESSION[StockConstruct::code]=$code;
			$_SESSION[StockConstruct::serial]=$serial;
			$_SESSION[StockConstruct::name]=$name;
			$_SESSION[StockConstruct::category]=$category;
		
		} else {
			// パラメータが欠けている場合は初期表示
			// トナー在庫の検索を行う
			$result = $service->select(StockConstruct::emp, StockConstruct::emp, 
										StockConstruct::emp, StockConstruct::category_toner);
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

		// 検索条件入力値設定用assign
		$smarty->assign(StockConstruct::code, $code);
		$smarty->assign(StockConstruct::serial, $serial);
		$smarty->assign(StockConstruct::name, $name);
		$smarty->assign(StockConstruct::category, $category);
		$smarty->assign(StockConstruct::io_num, StockConstruct::emp);
		
		// テンプレート表示
		$smarty->display(StockConstruct::top_html);
		
	} else {
		// 数字であるかチェック
		if(is_numeric($io_num)){
			// 数字
			// 確認画面を表示する
			// 登録情報作成
			if (isset($_POST['out_num'])){
				// 出庫（在庫-入力値）
				$num=$util->get_post_num();
				$result_num = $num - $io_num;

			}elseif (isset($_POST['in_num'])){
				// 入庫（在庫+入力値）
				$num=$util->get_post_num();
				$result_num = $num + $io_num;

			} else {
				// セッション削除
				session_destroy();
				// nullならばTOPに戻す
				$smarty->display('top.html');
			}

			// 画面表示項目設定
			$smarty->assign(StockConstruct::code, $util->get_post_code());
			$smarty->assign(StockConstruct::serial, $util->get_post_serial());
			$smarty->assign(StockConstruct::name, $util->get_post_name());
			$smarty->assign(StockConstruct::category, $util->get_post_category());
			$smarty->assign(StockConstruct::num, $num);
			$smarty->assign(StockConstruct::io_num, $io_num);
			$smarty->assign('result_num', $result_num);
			
			$smarty->display('io_check.html');

		} else {

			// 数字でない
			$errorMessage = "数量は数字で入力してください";
			$smarty->assign(StockConstruct::errorMessage, $errorMessage);
			// 表示をキープしたままTOP画面表示
			// 検索パラメータを取得して戻す
			// セッションから取得する
			session_start();
			$code = $util->get_session_code();
			$serial = $util->get_session_serial();
			$name = $util->get_session_name();
			$category = $util->get_session_category();
	
			// データチェック
			if (isset($code) || isset($serial) || isset($name) || isset($category))
			{
				print('code'.$code);
				// 取得したパラメータで検索を行う
				$result = $service->select($code, $serial, $name, $category);
				// 検索値をセッションに保持
				$_SESSION[StockConstruct::code]=$code;
				$_SESSION[StockConstruct::serial]=$serial;
				$_SESSION[StockConstruct::name]=$name;
				$_SESSION[StockConstruct::category]=$category;
			
			} else {
				// パラメータが欠けている場合は初期表示
				// トナー在庫の検索を行う
				$result = $service->select(StockConstruct::emp, StockConstruct::emp, 
											StockConstruct::emp, StockConstruct::category_toner);
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
	
			// 検索条件入力値設定用assign
			$smarty->assign(StockConstruct::code, $code);
			$smarty->assign(StockConstruct::serial, $serial);
			$smarty->assign(StockConstruct::name, $name);
			$smarty->assign(StockConstruct::category, $category);
			$smarty->assign(StockConstruct::io_num, $io_num);
			
			// テンプレート表示
			$smarty->display(StockConstruct::top_html);

		}
	}
} else {

	// セッション削除
	session_destroy();
	// nullならばTOPに戻す
	$smarty->display('top.html');

}

?>