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
}
?>