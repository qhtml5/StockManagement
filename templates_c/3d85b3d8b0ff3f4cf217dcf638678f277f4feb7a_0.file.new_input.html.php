<?php /* Smarty version 3.1.22-dev/9, created on 2015-03-08 14:55:39
         compiled from "templates/new_input.html" */ ?>
<?php
/*%%SmartyHeaderCode:2676854fbe45baac088_14263341%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3d85b3d8b0ff3f4cf217dcf638678f277f4feb7a' => 
    array (
      0 => 'templates/new_input.html',
      1 => 1425794138,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2676854fbe45baac088_14263341',
  'tpl_function' => 
  array (
  ),
  'variables' => 
  array (
    'errorMessage' => 0,
    'code' => 0,
    'serial' => 0,
    'name' => 0,
    'category' => 0,
    'num' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.22-dev/9',
  'unifunc' => 'content_54fbe45bb119a3_98732242',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_54fbe45bb119a3_98732242')) {
function content_54fbe45bb119a3_98732242 ($_smarty_tpl) {
?>
<?php
$_smarty_tpl->properties['nocache_hash'] = '2676854fbe45baac088_14263341';
?>
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
		<p><br/><a href="top.php">TOP</a>　　　　　<a href="new_input.php">新規登録</a>　　　　　<a href="edit.php">編集／削除</a></p>
		<br/>
		<p>新規登録情報入力<br/><br/>
		<font color="red"><b><?php echo $_smarty_tpl->tpl_vars['errorMessage']->value;?>
</b></font></p>
		<form action="new_check.php" method=post>
		<table class="table_style">
			<tr>
				<th width=150>コード</th>
				<th width=150>型番</th>
				<th width=300>品名</th>
				<th width=60>種類</th>
				<th width=80>在庫</th>
			</tr>
			<tr>
				<td><input type="text" size=20 name="code" value=<?php echo $_smarty_tpl->tpl_vars['code']->value;?>
></td>
				<td><input type="text" size=20 name="serial" value=<?php echo $_smarty_tpl->tpl_vars['serial']->value;?>
></td>
				<td><input type="text" size=40 name="name" value=<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
></td>
				<td>
				<?php if (($_smarty_tpl->tpl_vars['category']->value=="1")) {?>
					<input type="radio" name="category" value="1" checked>トナー<br/>
					<input type="radio" name="category" value="2">パーツ
				<?php } elseif (($_smarty_tpl->tpl_vars['category']->value=="2")) {?>
					<input type="radio" name="category" value="1">トナー<br/>
					<input type="radio" name="category" value="2" checked>パーツ
				<?php }?>
				</td>
				<td><input type="text" size=4 name="num" value=<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
></td>
			</tr>
		</table><br/>
		<input type="submit" value="確認" >
		</form>
		</div>
	</body>
</html><?php }
}
?>