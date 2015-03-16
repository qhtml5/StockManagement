<?php

require_once 'StockConstruct.php';

class StockUtility {

	// GET,POSTパラメータの取得
	public function get_post_code() {
		if(isset($_POST[StockConstruct::code])){
			return $_POST[StockConstruct::code];
		} else {
			return null;
		}	}

	public function get_get_code() {
		if(isset($_GET[StockConstruct::code])){
			return $_GET[StockConstruct::code];
		} else {
			return null;
		}	}

	public function get_session_code() {
		if(isset($_SESSION[StockConstruct::code])){
			return $_SESSION[StockConstruct::code];
		} else {
			return null;
		}	}

	public function get_post_serial() {
		if(isset($_POST[StockConstruct::serial])){
			return $_POST[StockConstruct::serial];
		} else {
			return null;
		}	}

	public function get_get_serial() {
		if(isset($_GET[StockConstruct::serial])){
			return $_GET[StockConstruct::serial];
		} else {
			return null;
		}	}

	public function get_session_serial() {
		if(isset($_SESSION[StockConstruct::serial])){
			return $_SESSION[StockConstruct::serial];
		} else {
			return null;
		}	}

	public function get_post_name() {
		if(isset($_POST[StockConstruct::name])){
			return $_POST[StockConstruct::name];
		} else {
			return null;
		}	}

	public function get_get_name() {
		if(isset($_GET[StockConstruct::name])){
			return $_GET[StockConstruct::name];
		} else {
			return null;
		}	}

	public function get_session_name() {
		if(isset($_SESSION[StockConstruct::name])){
			return $_SESSION[StockConstruct::name];
		} else {
			return null;
		}	}

	public function get_post_category() {
		if(isset($_POST[StockConstruct::category])){
			return $_POST[StockConstruct::category];
		} else {
			return null;
		}	}

	public function get_get_category() {
		if(isset($_GET[StockConstruct::category])){
			return $_GET[StockConstruct::category];
		} else {
			return null;
		}
	}

	public function get_session_category() {
		if(isset($_SESSION[StockConstruct::category])){
			return $_SESSION[StockConstruct::category];
		} else {
			return null;
		}	}

	public function get_post_num() {
		if(isset($_POST[StockConstruct::num])){
			return $_POST[StockConstruct::num];
		} else {
			return null;
		}	}

	public function get_post_io_num() {
		if(isset($_POST[StockConstruct::io_num])){
			return $_POST[StockConstruct::io_num];
		} else {
			return null;
		}	}

	public function get_session_io_num() {
		if(isset($_SESSION[StockConstruct::io_num])){
			return $_SESSION[StockConstruct::io_num];
		} else {
			return null;
		}	}

	// tbl_stockから取得したデータを配列に整形
	public function formatStockData ($result) {
		$i=0;
		foreach($result as $value)
		{
			$stockdata[$i][StockConstruct::code] = $value[StockConstruct::code];
			$stockdata[$i][StockConstruct::serial] = $value[StockConstruct::serial];
			$stockdata[$i][StockConstruct::name] = $value[StockConstruct::name];
			$stockdata[$i][StockConstruct::num] = $value[StockConstruct::num];
			$stockdata[$i][StockConstruct::category] = $value[StockConstruct::category];
			$stockdata[$i][StockConstruct::last_access] = $value[StockConstruct::last_access];
			$stockdata[$i][StockConstruct::last_member] = $value[StockConstruct::last_member];
			$i++;
		}
		// データ有無チェック
		if(isset($stockdata))
		{
			// 検索結果が存在する場合は結果をreturn
			return $stockdata;
		} else {
			// 検索結果が0件の場合はnullをreturn
			return null;
		}
	}
}
?>