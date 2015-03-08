<?php /* Smarty version 3.1.22-dev/9, created on 2015-03-08 14:54:54
         compiled from "templates/top.html" */ ?>
<?php
/*%%SmartyHeaderCode:288254fbe42ec24b84_33637943%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6954ff5f6b961488450fc89eb866e930a8f3d7d5' => 
    array (
      0 => 'templates/top.html',
      1 => 1425780354,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '288254fbe42ec24b84_33637943',
  'tpl_function' => 
  array (
  ),
  'variables' => 
  array (
    'category' => 0,
    'code' => 0,
    'serial' => 0,
    'name' => 0,
    'stockdata' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.22-dev/9',
  'unifunc' => 'content_54fbe42ec9dd12_96023734',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_54fbe42ec9dd12_96023734')) {
function content_54fbe42ec9dd12_96023734 ($_smarty_tpl) {
?>
<?php
$_smarty_tpl->properties['nocache_hash'] = '288254fbe42ec24b84_33637943';
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
		<p>現在の在庫状況<br/><br/>
		<form action="top.php" method=get>
			<?php if ($_smarty_tpl->tpl_vars['category']->value==1) {?>
				<input type="radio" name="category" value="1" checked="checked">トナー
				<input type="radio" name="category" value="2">パーツ
			<?php } elseif ($_smarty_tpl->tpl_vars['category']->value==2) {?>
				<input type="radio" name="category" value="1">トナー
				<input type="radio" name="category" value="2" checked="checked">パーツ
			<?php } else { ?>
				<input type="radio" name="category" value="1" checked="checked">トナー
				<input type="radio" name="category" value="2">パーツ
			<?php }?>
			<br/><br/>
			コード：<input type="text" name="code" value=<?php echo $_smarty_tpl->tpl_vars['code']->value;?>
>
			型番：<input type="text" name="serial" value=<?php echo $_smarty_tpl->tpl_vars['serial']->value;?>
>
			品名：<input type="text" name="name" value=<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
>
			<input type="submit" value="検索">
		</form><br/>
		<table class="table_style">
			<tr>
				<th width=150>コード</th>
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
			<?php if ((isset($_smarty_tpl->tpl_vars['stockdata']->value))) {?>
			<?php
$_from = $_smarty_tpl->tpl_vars['stockdata']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['value'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['value']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
$foreachItemSav = $_smarty_tpl->tpl_vars['value'];
?>
			<tr>
				<td><?php echo $_smarty_tpl->tpl_vars['value']->value['code'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['value']->value['serial'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['value']->value['name'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['value']->value['category'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['value']->value['num'];?>
</td>
				<td><input type="text" size=2></td>
				<td><input type="submit" value="出庫"></td>
				<td><input type="submit" value="入庫"></td>
				<td><?php echo $_smarty_tpl->tpl_vars['value']->value['last_access'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['value']->value['last_member'];?>
</td>
			</tr>
			<?php
$_smarty_tpl->tpl_vars['value'] = $foreachItemSav;
}
?>
			<?php }?>
		</table>
		</div>
	</body>
</html><?php }
}
?>