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
			<p>編集／削除</br></br>
<?php

if(isset($_GET['category']))
{
	// 引継ぎパラメータが存在する
	$code=$_GET['code'];
	$serial=$_GET['serial'];
	$name=$_GET['name'];
	$category=$_GET['category'];

	print('<form action="edit.php" method=get>');
	if($category==1)
	{
		print('<input type="radio" name="category" value="1" checked="checked">トナー');
		print('<input type="radio" name="category" value="2">パーツ');
	}
	else
	{
		print('<input type="radio" name="category" value="1">トナー');
		print('<input type="radio" name="category" value="2" checked="checked">パーツ');
	}
	print('</br></br>');
	print('コード：<input type="text" name="code" value="'.$code.'">　　');
	print('型番：<input type="text" name="serial" value="'.$serial.'">　　');
	print('品名：<input type="text" name="name" value="'.$name.'">　　');
	print('<input type="submit" value="検索">');
	print('</form>');

	$sql = "select * from tbl_zaiko ";

	if(!$serial=="")
	{
		$sql = $sql."where serial like '%".$serial."%' ";
	
		if(!$code=="")
		{
			$sql = $sql."and code like '%".$code."%' ";

			if(!$name=="")
			{
				$sql = $sql."and name like '%".$name."%' and category='".$category."'";
			}
			else
			{
				$sql = $sql."and category='".$category."' ";
			}

		}
		else
		{
			if(!$name=="")
			{
				$sql = $sql."where name like '%".$name."%' and category='".$category."'";
			}
			else
			{
				$sql = $sql."where category='".$category."' ";
			}
		}
	}
	else
	{
		if(!$code=="")
		{
			$sql = $sql."where code like '%".$code."%' ";

			if(!$name=="")
			{
				$sql = $sql."and name like '%".$name."%' and category='".$category."'";
			}
			else
			{
				$sql = $sql."and category='".$category."' ";
			}

		}
		else
		{
			if(!$name=="")
			{
				$sql = $sql."where name like '%".$name."%' and category='".$category."'";
			}
			else
			{
				$sql = $sql."where category='".$category."' ";
			}
		}
	}

}
else
{
	// 引継ぎパラメータが存在しない
	print('<form action="edit.php" method=get>');
	print('<input type="radio" name="category" value="1" checked="checked">トナー');
	print('<input type="radio" name="category" value="2">パーツ');
	print('</br></br>');
	print('コード：<input type="text" name="code">　　');
	print('型番：<input type="text" name="serial">　　');
	print('品名：<input type="text" name="name">　　');
	print('<input type="submit" value="検索">');
	print('</form>');

	$sql = "select * from tbl_zaiko where category=1";

}


print('</br>');
print('<table class="table_style">');
print('<tr>');
print('<th width=150>コード</th>');
print('<th width=150>型番</th>');
print('<th width=300>品名</th>');
print('<th width=60>種類</th>');
print('<th width=80>在庫</th>');
print('<th width=180>最終操作時刻</th>');
print('<th width=120>最終操作者</th>');
print('<th width=60>編集</th>');
print('<th width=60>削除</th>');
print('</tr>');


$dsn = 'mysql:dbname=db_zaikokanri;host=localhost';
$user = 'root';
$password = 'root';

try{

	$dbh = new PDO($dsn, $user, $password);

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
		print('<td>'.$row['last_access'].'</td>');
		print('<td>'.$row['last_member'].'</td>');
		print('<form method=post action="edit_detail.php">');
		print('<input type="hidden" name="code" value='.$row['code'].'>');
		print('<input type="hidden" name="serial" value='.$row['serial'].'>');
		print('<input type="hidden" name="name" value='.$row['name'].'>');
		print('<input type="hidden" name="category" value='.$row['category'].'>');
		print('<input type="hidden" name="num" value='.$row['num'].'>');
		print('<td><input type="submit" value="編集"></td>');
		print('</form>');
		print('<form method=post action="delete_check.php">');
		print('<input type="hidden" name="code" value='.$row['code'].'>');
		print('<input type="hidden" name="serial" value='.$row['serial'].'>');
		print('<input type="hidden" name="name" value='.$row['name'].'>');
		print('<input type="hidden" name="category" value='.$row['category'].'>');
		print('<input type="hidden" name="num" value='.$row['num'].'>');
		print('<td><input type="submit" value="削除"></td>');
		print('</form>');
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
