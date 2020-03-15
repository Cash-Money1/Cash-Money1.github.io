<?php if(!defined('SKYLIGHT')){
echo ('Выявлена попытка взлома!');
exit();
}
?>

 <div align="center"><span class="style1"><?=$privetstvie?></span>
 </div>

<center><font size=""><b>50 ПОСЛЕДНИХ ВЫПЛАТ</b<</font></center>
<hr>
 <table width="800" border="0" cellpadding="2" cellspacing="0" id="tables">
  <tbody><tr bgcolor="#fff" style="text-transform: uppercase;font-weight: bold;color:#000000;">
    <td align="center" width="150px"><b>Дата</b></td>
	<td align="center" width="100px"><b>Система</b></td>
	<td align="center" width="100px"><b>Кошелёк</b></td>
	<td align="center" width="100px"><b>Выплата</b></td>
	<td align="center" width="100px"><b>Статус</b></td>
  </tr>
  


<? 
$depositsrow=$db->query("SELECT * FROM `deposits` WHERE status='1' ORDER BY id DESC LIMIT 50");
  
while($deposits=$db->fetch($depositsrow)){?>  


<tr class="htt">
	<td align="center"><?=date('d.m.Y H:i',$deposits['unixtime'])?></td>
	<td align="center">PAY<font color="blue">EER</font></td>
<?
$wallet=substr($db->getOne("SELECT wallet FROM `ss_users` WHERE id=?i",$deposits['userid']), 0, -3); 
?>
   <td align="center"><?=$wallet?><font color="blue">XXX</font></td>
  <td align="center"><b><?=($deposits['summa']+($deposits['summa']*($percent_u/100)))?></b> руб.</td>
  <td align="center"><font color="green"><b>Выплачено</b></font></td>
  	</tr>

<?}?> 
  </tbody>
 </table>
 
<br>