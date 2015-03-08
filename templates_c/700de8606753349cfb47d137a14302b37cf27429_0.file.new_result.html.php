<?php /* Smarty version 3.1.22-dev/9, created on 2015-03-08 19:08:29
         compiled from "templates/new_result.html" */ ?>
<?php
/*%%SmartyHeaderCode:2495954fc1f9de87192_95838234%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '700de8606753349cfb47d137a14302b37cf27429' => 
    array (
      0 => 'templates/new_result.html',
      1 => 1425809290,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2495954fc1f9de87192_95838234',
  'tpl_function' => 
  array (
  ),
  'variables' => 
  array (
    'resultMessage' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.22-dev/9',
  'unifunc' => 'content_54fc1f9ded53a2_22427175',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_54fc1f9ded53a2_22427175')) {
function content_54fc1f9ded53a2_22427175 ($_smarty_tpl) {
?>
<?php
$_smarty_tpl->properties['nocache_hash'] = '2495954fc1f9de87192_95838234';
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
		<p></br><a href="top.php">TOP</a>　　　　　<a href="new.php">新規登録</a>　　　　　<a href="edit.php">編集／削除</a></p>
		</br>
		<p>新規登録（結果）</p></br>
		<p><?php echo $_smarty_tpl->tpl_vars['resultMessage']->value;?>
</p></br></br>
		<a href="new_input.php">続けて登録</a>　　　　　<a href="top.php">TOPへ戻る</a>
		</div>
	</body>
</html><?php }
}
?>