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
			<p>現在の在庫状況</br></br>
			<form>
				<input type="checkbox" name="category" value="1" checked="checked">トナー
				<input type="checkbox" name="category" value="2">パーツ
				</br></br>
				型番：<input type="text" name="serial">　　
				バーコード：<input type="text" name="code">　　
				品名：<input type="text" name="name">　　
				<input type="submit" value="検索">
			</form>
			<table class="table_style">
				<tr>
					<th width=150>バーコード</th>
					<th width=150>型番</th>
					<th width=300>品名</th>
					<th width=60>種類</th>
					<th width=80>在庫</th>
					<th width=60>数量</th>
					<th width=60>出庫</th>
					<th width=60>入庫</th>
					<th width=180>最終操作時刻</th>
					<th width=120>最終操作者</th>
				</tr>

<?php

$dsn = 'mysql:dbname=db_zaikokanri;host=localhost';
$user = 'root';
$password = 'root';

try{

	$dbh = new PDO($dsn, $user, $password);

	$sql = 'select * from tbl_zaiko where category=1';

	foreach ($dbh->query($sql) as $row) {
		print('<tr>');
		print('<td>'.$row['code'].'</td>');
		print('<td>'.$row['serial'].'</td>');
		print('<td>'.$row['name'].'</td>');
		if($row['category']==1)
		{
			print('<td>トナー</td>');
		}
		else
		{
			print('<td>パーツ</td>');
		}
		print('<td>'.$row['num'].'</td>');
		print('<td><input type="text" size=2></td>');
		print('<td><input type="submit" value="出庫"></td>');
		print('<td><input type="submit" value="入庫"></td>');
		print('<td>'.$row['last_access'].'</td>');
		print('<td>'.$row['last_member'].'</td>');
		print('</tr>');
	}
		
}catch (PDOException $e){
	print('Error:'.$e->getMessage());
	die();
}

$dbh = null;
			
?>
			</table></p>
		</div>
	</body>
</html>