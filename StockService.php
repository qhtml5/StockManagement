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
	
	public function insert($serial, $code, $name, $category, $num, $last_access, $last_member)
	{
		// DB�R�l�N�V�����擾
		$dsn = 'mysql:dbname=db_stock;host=localhost';
		$user = 'root';
		$password = 'root';

		try
		{
			// SQL
			$sql = "insert into tbl_stock (serial, code, name, category, num, last_access, last_member) 
					values ('".$serial."',".
							"'".$code."',".
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
}
?>