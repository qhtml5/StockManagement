<?php
class StockService
{
	public function select($code, $serial, $name, $category)
	{
		// DB�R�l�N�V�����擾
		$dsn = 'mysql:dbname=db_stock;host=localhost';
		$user = 'root';
		$password = 'root';
		
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

		} catch (Exception $e) {
			// ��O
		}
	}
	
	public function insert($code, $serial, $name, $category, $num, $last_access, $last_member)
	{
		// DB�R�l�N�V�����擾
		$dsn = 'mysql:dbname=db_stock;host=localhost';
		$user = 'root';
		$password = 'root';

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
			$result = $dbh->query($sql);

			return $result;

		} catch (Exception $e) {
			// ��O
		}
	}

	public function editUpdate ($code, $serial, $name, $category, $num, $last_access, $last_member)
	{
		// DB�R�l�N�V�����擾
		$dsn = 'mysql:dbname=db_stock;host=localhost';
		$user = 'root';
		$password = 'root';
		
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
			$result = $dbh->query($sql);
			
			return $result;

		} catch (Exception $e) {
			// ��O
		}
	}
}
?>