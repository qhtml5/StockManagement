<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>在庫管理システム</title>
		<meta name="description" content="トナー、パーツの在庫管理をします。">
		<meta http-equiv="Content-Style-Type" content="text/css" />
		<link href="style.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div style="text-align:center">
		<p></br><a href="top.php">TOP</a>　　　　　<a href="new.php">新規登録</a>　　　　　<a href="edit.php">編集／削除</a></p>
		</br>
		<p>削除（結果）</p></br>

<?php

	$code=$_POST['code'];
	$serial=$_POST['serial'];
	$name=$_POST['name'];
	$num=$_POST['num'];
	$category=$_POST['category'];
	$last_access_datetime= new DateTime();
	$last_access = $last_access_datetime->format('Y-m-d H:i:s');
	$last_member="安部";

$dsn = 'mysql:dbname=db_zaikokanri;host=localhost';
$user = 'root';
$password = 'root';

try{

	$dbh = new PDO($dsn, $user, $password);

	$sql = "delete from tbl_zaiko where code='".$code."'";

	$result = $dbh->query($sql);
	
	if(!$result)
	{
		print("削除失敗".$sql);
	}
	else
	{
		print("削除完了");
	}

}catch (PDOException $e){
	print('Error:'.$e->getMessage());
	die();
}

$dbh = null;

?>

			</br></br>
			<a href="edit.php">続けて削除</a>　　　　　<a href="top.php">TOPへ戻る</a>
		</div>
	</body>
</html>