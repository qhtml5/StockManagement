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
		<p>新規登録（確認）</p></br>下記の情報を登録します。</br></br>
			<form action="new_result.php" method=post>
			<table class="table_style">
				<tr>
					<th width=150>バーコード</th>
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

	print("<tr>");
	print("<td>".$code."</td>");
	print("<td>".$serial."</td>");
	print("<td>".$name."</td>");
	print("<td>".$num."</td>");
	if($category==1)
	{
		print("<td>トナー</td>");
	}else
	{
		print("<td>パーツ</td>");
	}
	print("</tr>");

	print("</table></br>");
	
	print('<input type="hidden" name="code" value="'.$code.'">');
	print('<input type="hidden" name="serial" value="'.$serial.'">');
	print('<input type="hidden" name="name" value="'.$name.'">');
	print('<input type="hidden" name="num" value="'.$num.'">');
	print('<input type="hidden" name="category" value="'.$category.'">');
?>

			<input type="submit" value="登録" >
		</form>
		</div>
	</body>
</html>