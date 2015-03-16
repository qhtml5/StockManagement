<?php

require_once 'StockConstruct.php';

class StockService
{
	public function select($code, $serial, $name, $category)
	{
		$StockConstruct = new StockConstruct;

		// DBコネクション取得
		$dsn = $StockConstruct::dsn;
		$user = $StockConstruct::user;
		$password = $StockConstruct::password;
		
		try
		{
			// SQL
			$sql = "select * from tbl_stock where code like '%".$code."%' and ".
												 "serial like '%".$serial."%' and ".
												 "name like '%".$name."%' and ".
												 "category = '".$category."'";

			$dbh = new PDO($dsn, $user, $password);
			print($sql);
			$result = $dbh->query($sql);
			return $result;

		} catch (PDOException $e) {
			// 例外
			echo 'DBアクセスエラー：'.$e->getMessage();
		}
	}
	
	public function insert($code, $serial, $name, $category, $num, $last_access, $last_member)
	{
		$StockConstruct = new StockConstruct;

		// DBコネクション取得
		$dsn = $StockConstruct::dsn;
		$user = $StockConstruct::user;
		$password = $StockConstruct::password;

		try
		{
			// SQL
			$sql = "insert into tbl_stock (code, serial, name, category, num, last_access, last_member) 
					values ('".$code."',".
							"'".$serial."',".
							"'".$name."',".
							"'".$category."',".
							$num.",".
							"'".$last_access."',".
							"'".$last_member."')";

			$dbh = new PDO($dsn, $user, $password);
			print($sql);
			$result = $dbh->exec($sql);

			return $result;

		} catch (PDOException $e) {
			// 例外
			echo 'DBアクセスエラー：'.$e->getMessage();
		}
	}

	public function editUpdate ($code, $serial, $name, $category, $num, $last_access, $last_member)
	{
		$StockConstruct = new StockConstruct;

		// DBコネクション取得
		$dsn = $StockConstruct::dsn;
		$user = $StockConstruct::user;
		$password = $StockConstruct::password;
		
		try
		{
			// SQL
			$sql = "update tbl_stock set serial='".$serial."',"
									   ."name='".$name."',"
									   ."category='".$category."',"
									   ."num=".$num.","
									   ."last_access='".$last_access."',"
									   ."last_member='".$last_member."' "
									   ."where code='".$code."'";

			$dbh = new PDO($dsn, $user, $password);
			print($sql);
			$result = $dbh->exec($sql);
			
			return $result;

		} catch (PDOException $e) {
			// 例外
			echo 'DBアクセスエラー：'.$e->getMessage();
		}
	}

	public function ioUpdate ($code, $num, $last_access, $last_member)
	{
		$StockConstruct = new StockConstruct;

		// DBコネクション取得
		$dsn = $StockConstruct::dsn;
		$user = $StockConstruct::user;
		$password = $StockConstruct::password;
		
		try
		{
			// SQL
			$sql = "update tbl_stock set num='".$num."',"
									   ."last_access='".$last_access."',"
									   ."last_member='".$last_member."' "
									   ."where code='".$code."'";

			$dbh = new PDO($dsn, $user, $password);
			print($sql);
			$result = $dbh->exec($sql);
			
			return $result;

		} catch (PDOException $e) {
			// 例外
			echo 'DBアクセスエラー：'.$e->getMessage();
		}
	}

	public function delete ($code)
	{
		$StockConstruct = new StockConstruct;

		// DBコネクション取得
		$dsn = $StockConstruct::dsn;
		$user = $StockConstruct::user;
		$password = $StockConstruct::password;
		
		try
		{
			// SQL
			$sql = "delete from tbl_stock where code='".$code."'";

			$dbh = new PDO($dsn, $user, $password);
			print($sql);
			$result = $dbh->exec($sql);
			
			return $result;
			
		} catch (PDOException $e) {
			// 例外
			echo 'DBアクセスエラー：'.$e->getMessage();
		}
	}
}
?>