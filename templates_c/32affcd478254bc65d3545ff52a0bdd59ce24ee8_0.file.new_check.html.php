<?php /* Smarty version 3.1.22-dev/9, created on 2015-03-08 19:20:20
         compiled from "templates/new_check.html" */ ?>
<?php
/*%%SmartyHeaderCode:3146354fc2264a111b6_55104527%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '32affcd478254bc65d3545ff52a0bdd59ce24ee8' => 
    array (
      0 => 'templates/new_check.html',
      1 => 1425810018,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3146354fc2264a111b6_55104527',
  'tpl_function' => 
  array (
  ),
  'variables' => 
  array (
    'code' => 0,
    'serial' => 0,
    'name' => 0,
    'category' => 0,
    'num' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.22-dev/9',
  'unifunc' => 'content_54fc2264a8a356_48310775',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_54fc2264a8a356_48310775')) {
function content_54fc2264a8a356_48310775 ($_smarty_tpl) {
?>
<?php
$_smarty_tpl->properties['nocache_hash'] = '3146354fc2264a111b6_55104527';
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
		下記の内容で登録します。よろしいですか？<br/><br/>
		<table class="table_style">
			<tr>
				<th width=150>コード</th>
				<th width=150>型番</th>
				<th width=300>品名</th>
				<th width=60>種類</th>
				<th width=80>在庫</th>
			</tr>
			<tr>
				<td><?php echo $_smarty_tpl->tpl_vars['code']->value;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['serial']->value;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</td>
				<?php if (($_smarty_tpl->tpl_vars['category']->value==1)) {?>
					<td>トナー</td>
				<?php } else { ?>
					<td>パーツ</td>
				<?php }?>
				<td><?php echo $_smarty_tpl->tpl_vars['num']->value;?>
</td>
			</tr>
		</table><br/>
		<form action="new_input.php" method=post style="display:inline;">
			<input type="hidden" name="code" value=<?php echo $_smarty_tpl->tpl_vars['code']->value;?>
>
			<input type="hidden" name="serial" value=<?php echo $_smarty_tpl->tpl_vars['serial']->value;?>
>
			<input type="hidden" name="name" value=<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
>
			<input type="hidden" name="category" value=<?php echo $_smarty_tpl->tpl_vars['category']->value;?>
>
			<input type="hidden" name="num" value=<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
>
			<input type="submit" value="修正" >　　　
		</form>
		<form action="new_result.php" method=post style="display:inline;">
			<input type="hidden" name="code" value=<?php echo $_smarty_tpl->tpl_vars['code']->value;?>
>
			<input type="hidden" name="serial" value=<?php echo $_smarty_tpl->tpl_vars['serial']->value;?>
>
			<input type="hidden" name="name" value=<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
>
			<input type="hidden" name="category" value=<?php echo $_smarty_tpl->tpl_vars['category']->value;?>
>
			<input type="hidden" name="num" value=<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
>
			<input type="submit" value="登録" >
		</form>
		</div>
	</body>
</html><?php }
}
?>