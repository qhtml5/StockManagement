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
		<p>編集（入力）</p></br></br>
			<form action="edit_check.php" method=post>
			<table class="table_style">
				<tr>
					<th width=150>コード</th>
					<th width=150>型番</th>
					<th width=300>品名</th>
					<th width=80>在庫</th>
					<th width=60>種類</th>
				</tr>
<?php
	$code=$_POST['code'];
	$serial=$_POST['serial'];
	$name=$_POST['name'];
	$num=$_POST['num'];
	$category=$_POST['category'];

				print('<input size=20 type="hidden" name="code" value='.$code.'>');
				print('<tr>');
					print('<td>'.$code.'</td>');
					print('<td><input size=20 type="text" name="serial" value='.$serial.'></td>');
					print('<td><input size=40 type="text" name="name" value='.$name.'></td>');
					print('<td><input size=4 type="text" name="num" value='.$num.'></td>');
					if($category==1)
					{
						print('<td><input type="radio" name="category" value=1 checked="checked">トナー');
						print('</br><input type="radio" name="category" value=2 >パーツ</td>');
					}
					else
					{
						print('<td><input type="radio" name="category" value=1 >トナー');
						print('</br><input type="radio" name="category" value=2 checked="checked">パーツ</td>');
					}
				print('</tr>');
?>
			</table>
			</br>
			<input type="submit" value="確認" >
		</form>
		</div>
	</body>
</html>