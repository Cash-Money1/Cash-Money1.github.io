<?php 
define('SKYLIGHT',dirname(__FILE__));
require_once('classes/safemysql.php');
require_once('config.php');

$cmnt="none";

$sum=$_POST['m_amount']; //�����, ����������� �� �������
$id=$_POST['m_orderid'];

	
if (isset($_POST['m_operation_id']) && isset($_POST['m_sign']))
{
	$arHash = array($_POST['m_operation_id'],
			$_POST['m_operation_ps'],
			$_POST['m_operation_date'],
			$_POST['m_operation_pay_date'],
			$_POST['m_shop'],
			$_POST['m_orderid'],
			$_POST['m_amount'],
			$_POST['m_curr'],
			$_POST['m_desc'],
			$_POST['m_status'],
			$m_key);
	$sign_hash = strtoupper(hash('sha256', implode(':', $arHash)));
if ($_POST['m_sign'] == $sign_hash && $_POST['m_status'] == 'success')
{
	echo $_POST['m_orderid'].'|success';
	
		
$referer=$db->getOne("SELECT curator FROM `ss_users` WHERE id=?i", $id);

$db->query("INSERT INTO deposits (userid, curatorid, summa, unixtime) VALUES(?i,?i,?s,?s)", $id, $referer, $sum, time());	

/*������ ���������*/
$adminid=$db->getOne("SELECT id FROM `ss_users` WHERE wallet=?s", $koshelek_admina);

$adminsum=$sum*($admpercent/100);
addUserStat($adminid, "<!--stat--><!--whithdraw--><!--admin-->�������", "<!--stat--><!--whithdraw--><!--admin-->������� ��������� (".$adminsum." ���.)");
require_once('pay_admin.php');
	




//����� �������.
//$referer=$db->getOne("SELECT curator FROM `ss_users` WHERE id=?i", $ocherr['userid']);	
$refererwallet=strtoupper($db->getOne("SELECT wallet FROM `ss_users` WHERE id=?i", $referer));
$referersum=$sum*($refpercent/100);
if($referer>0 && $refererwallet[0]=='P'){
$db->query("UPDATE ss_users SET refs_wait=refs_wait+$referersum WHERE id=?i",$referer);

		
addUserStat($referer, "<!--stat--><!--whithdraw--><!--fromreferal-->�������", "<!--stat--><!--whithdraw--><!--fromreferal-->������� ����������� (".$referersum." ���.)");
}

exit;
}
echo $_POST['m_orderid'].'|error';

}
?>
