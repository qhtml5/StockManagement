<?php

class StockConstruct{
	
	// DataSourceName
	const dsn = 'mysql:dbname=db_stock;host=localhost';
	// user
	const user = 'root';
	// password
	const password = 'root';

	// パラメータ名
	const code = 'code';
	const serial = 'serial';
	const name = 'name';
	const num = 'num';
	const category = 'category';
	const last_access = 'last_access';
	const last_member = 'last_member';
	const errorMessage = 'errorMessage';
	const resultMessage = 'resultMessage';
	const stockdata ='stockdata';
	const io_num = 'io_num';
	// 文字列
	const emp = "";

	// 商品種別
	// トナー
	const category_toner = "1";
	// パーツ
	const category_parts = "2";

	// テンプレート名
	const top_html = "top.html";
}

?>