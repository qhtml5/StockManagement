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
		<p>新規登録</p></br></br>
			<form action="new_check.php" method=post>
			<table class="table_style">
				<tr>
					<th width=150>バーコード</th>
					<th width=150>型番</th>
					<th width=300>品名</th>
					<th width=80>在庫</th>
					<th width=60>種類</th>
				</tr>
				<tr>
					<td><input size=20 type="text" name="code"></td>
					<td><input size=20 type="text" name="serial"></td>
					<td><input size=40 type="text" name="name"></td>
					<td><input size=4 type="text" name="num"></td>
					<td><input type="radio" name="category" value="1" checked="checked">トナー</br>
						<input type="radio" name="category" value="2">パーツ</td>
				</tr>
			</table>
			</br>
			<input type="submit" value="確認" >
		</form>
		</div>
	</body>
</html>