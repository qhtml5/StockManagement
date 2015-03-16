<?php

// �N���X�ǂݍ���
require_once 'smarty/Smarty.class.php';
require_once 'StockService.php';
require_once 'StockUtility.php';
require_once 'StockConstruct.php';

// Smarty�̏���
$smarty = new Smarty();
$smarty->template_dir = 'templates/';
$smarty->compile_dir  = 'templates_c/';

// �C���X�^���X
$service = new StockService;
$util = new StockUtility;

// ���[�U�e�[�u������擾
$result = $service->userSelect();

$userdata = $util->formatUserData($result);

if(isset($userdata))
{
	// �������ʂ����݂���ꍇ�͌��ʂ�assign
	$smarty->assign('userdata', $userdata);

} else {
	// �������ʂ�0���̏ꍇ��null��assign
	$smarty->assign('userdata', null);
	
};

// �e���v���[�g�\��
$smarty->display('login.html');

?>