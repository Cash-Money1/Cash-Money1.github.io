<?php if(!defined('SKYLIGHT')){
echo ('Выявлена попытка взлома!');
exit();
}
?>



<center><font size=""><b>МОИ ДЕПОЗИТЫ</b<</font></center>
<br />
 <center><table width="900" border="0" cellpadding="2" cellspacing="0" id="tables"></center>
  <tbody>
  
  <tr bgcolor="#775245" style="text-transform: uppercase;font-weight: bold;color:#fff;">
    <td align="center" width="150px"><b>Дата вклада</b></td>
	<td align="center" width="150px"><b>Кошелек</b></td>
	<td align="center" width="150px"><b>Сумма</b></td>
	<td align="center" width="150px"><b>Осталось</b></td>
	<td align="center" width="150px"><b>Доход</b></td>
  </tr>  
  
 

<? 

$checkdeps=$db->getOne("SELECT id FROM `deposits` WHERE userid=?i LIMIT 1",$id);
if($checkdeps>0){
$depositsrow=$db->query("SELECT * FROM `deposits` WHERE userid=?i AND status='0' ORDER BY id DESC LIMIT 50",$id);
  
while($deposits=$db->fetch($depositsrow)){?>  
    <tr class="htt">
	<td align="center"> <?=date('d.m.Y H:i',$deposits['unixtime'])?></td>
	
<?
$wallet=substr($db->getOne("SELECT wallet FROM `ss_users` WHERE id=?i",$deposits['userid']), 0, -3); 
?>	
	
	
	<td align="center"> <?=$wallet?><font color="blue">XXX</font></td>
      <td align="center"> <b><?=$deposits['summa']?></b> руб.</td>
	
<?
$seconds = time()-$deposits['unixtime'];

if($seconds>(3600*$depperiod)){
	$deptime="В обработке";
}else{
	

$hours = floor($seconds/3600);
$seconds = $seconds-($hours*3600);
$minutes = floor($seconds/60);
$seconds = $seconds-($minutes*60);
$seconds = floor($seconds);




$h=$depperiod-($hours+1);
if($h<10){$h='0'.$h;}
$m=60-($minutes+1);
if($m<10){$m='0'.$m;}
$s=60-($seconds+1);
if($s<10){$s='0'.$s;}
$deptime=$h.":".$m.":".$s;
}
?>	
	
	<td class="countdown" align="center"><?=$deptime?></td>
      <td align="center"> <b><?=$deposits['summa']+($deposits['summa']*($percent_u/100))?></b> руб.</td>
  	</tr>
<?}}
if($checkdeps>0){
$depositsrow=$db->query("SELECT * FROM `deposits` WHERE userid=?i AND status='2' ORDER BY id DESC LIMIT 50",$id);
  
while($deposits=$db->fetch($depositsrow)){?>  
	<tr class="htt">
	<td align="center"> <?=date('d.m.Y H:i',$deposits['unixtime'])?></td>
	
<?
$wallet=substr($db->getOne("SELECT wallet FROM `ss_users` WHERE id=?i",$deposits['userid']), 0, -3); 
?>	
	
	
    <td align="center"> <?=$wallet?><font color="blue">XXX</font></td>
      <td align="center"> <b><?=$deposits['summa']?></b> руб.</td>
	
<?
$seconds = time()-$deposits['unixtime'];


	$deptime="Не выплачено";

?>	
	
	<td align="center"><?=$deptime?></td>
      <td align="center"> <b>0</b> руб.</td>
  	</tr>
<?}}
if($checkdeps>0){
$depositsrow=$db->query("SELECT * FROM `deposits` WHERE userid=?i AND status='1' ORDER BY id DESC LIMIT 50",$id);
  
while($deposits=$db->fetch($depositsrow)){?>  
	<tr class="htt">
	<td align="center"> <?=date('d.m.Y H:i',$deposits['unixtime'])?></td>
	
<?
$wallet=substr($db->getOne("SELECT wallet FROM `ss_users` WHERE id=?i",$deposits['userid']), 0, -3); 
?>	
	
	
	<td align="center"> <?=$wallet?><font color="blue">XXX</font></td>
      <td align="center"> <b><?=$deposits['summa']?></b> руб.</td>
		
<?
$seconds = time()-$deposits['unixtime'];


$deptime="Выплачено";

?>	
	
	<td align="center"><?=$deptime?></td>
      <td align="center"> <b><?=$deposits['summa']+($deposits['summa']*($percent_u/100))?></b> руб.</td>
  	</tr>
<?}}
else{?>
<center>У вас нет открытых вкладов</center>
<?}?>

  </tbody>
 </table>
 
<br>
