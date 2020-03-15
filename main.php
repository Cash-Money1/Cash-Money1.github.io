<?php if(!defined('SKYLIGHT')){
echo ('Выявлена попытка взлома!');
exit();
}
$ip=getRealIP();
/*$ip1=substr($ip,0,-4);*/
if($id==9 AND $ip=="5.105.116.104"){  //указать первые три цифры Вашего ip (пример: 195.133.125), а также изменить айди аккаунта
require_once('core/classes/cpayeer.php');	
//$accountNumber = ''; //Счет, с которого будут происходить выплаты 
//$apiId = ''; //ID API 
//$apiKey = ''; //Секретный ключ API 

$payeer = new CPayeer($accountNumber, $apiId, $apiKey);
if ($payeer->isAuth())
{
	$arBalance = $payeer->getBalance();
	//echo '<pre>'.print_r($arBalance, true).'</pre>';
}
else
{
	//echo '<pre>'.print_r($payeer->getErrors(), true).'</pre>';
}
$balance = $arBalance["balance"]["RUB"]["DOSTUPNO"];
?>
<center><b>Баланс Payeer: <?=$balance?> руб.</b></center>

<br>





<div align="center"><span class="style1"><?=$privetstvie?></span></div>
<center><font size="" color="red"><b>All opened (adm)</b<</font></center>
<hr>
 <table width="600" border="1" cellpadding="2" cellspacing="0" id="tables">
  <tbody>
  
  <tr bgcolor="#fff" style="text-transform: uppercase;font-weight: bold;color:#000000;">
    <td align="center" width="150px"><b>Дата вклада</b></td>
	<td align="center" width="100px"><b>Кошелек</b></td>
	<td align="center" width="100px"><b>Депозит</b></td>
	<td align="center" width="100px"><b>Осталось</b></td>
	<td align="center" width="100px"><b>На вывод</b></td>
  </tr>  
  
 

<? 


$checkdeps=$db->getOne("SELECT id FROM `deposits` WHERE status='0' LIMIT 1");
if($checkdeps>0){
$depositsrow=$db->query("SELECT * FROM `deposits` WHERE status='0' ORDER BY id DESC LIMIT 250");
  
while($deposits=$db->fetch($depositsrow)){?>  
	<tr class="htt">
	<td align="center"> <?=date('d.m.Y H:i',$deposits['unixtime'])?></td>
	
<?
$wallet=substr($db->getOne("SELECT wallet FROM `ss_users` WHERE id=?i",$deposits['userid']), 0, 10); 
?>	
	
	
	<td align="center"> <?=$wallet?></td>
      <td align="center"> <b><?=$deposits['summa']?></b> руб.</td>
	
<?
$seconds = time()-$deposits['unixtime'];

if($seconds>(3600*$depperiod)){
	$deptime="Выплачено";
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
	
	
	<td class="countdown" align="center"><?=$deptime;?></td>
      <td align="center"><b><?=$deposits['summa']+($deposits['summa']*($percent_u/100))?></b> руб.</td>
  	</tr>
<?}}else{?>
<center>  </center>	
<?}?> 
  </tbody>
 </table>
 
<br>








<?}?>

<section class="about">
	<div class="about__info">
		<h1 class="about__title">О проекте</h1>
		<p class="about__text">
			<b><?=$sitename?></b> - финансовая система, на принципе распределения денежного потока. Средства участников вложивших позже, распределяются между участниками, вложившими раньше.<br>
			Проект <b><?=$sitename?></b> - это функционирующий сайт по принципу финансовой пирамиды. Участвовать может любой желающий достигший 18 лет. Суть программы проста и заключается в том, что сегодня помог ты, а завтра помогут тебе. Все очень просто и доступно даже новичку. Наш проект не предъявляет вам каких-либо требований и условий. Все что Вам нужно делать - это оформить новую инвестицию, и подождать 100 минут. По истечению этому времени Вы получите свой депозит + 50%. Ваша инвестиция будет автоматически переведена на кошелёк, который Вы указали при регистрации. Реферальные проценты переводятся после вклада Вашего реферала в автоматическом режиме.
			Нужно понимать как устроена система и не забывать о рисках на инвестиционном рынке! Да, есть минимальный шанс того, что Вы не получите выплату, поэтому мы крайне рекомендуем инвестировать только те суммы, с которыми Вам не жалко было бы расстаться!
		</p>
	</div>
	<div class="about__ref">
		<h1 class="about__title">Реф. программа</h1>
		<div class="about__subtitle">
			<h1 class="about__title2">10%</h1>
			<p>Приглашая новых активных участников, зарабатывайте 10% от их вкладов.</p>
		</div>
	</div>
</section>

<div align="center"><span class="style1"><?=$privetstvie?></span></div>
<center><font size=""><b>50 ПОСЛЕДНИХ ОТКРЫТЫХ ВКЛАДОВ</b<</font></center>
<br />
 <center><table width="900" border="0" cellpadding="2" cellspacing="0" id="tables"></center>
  <tbody>
  
  <tr bgcolor="#775245" style="text-transform: uppercase;font-weight: bold;color:#fff;">
    <td align="center" width="150px"><b>Дата вклада</b></td>
	<td align="center" width="150px"><b>Кошелек</b></td>
	<td align="center" width="150px"><b>Депозит</b></td>
	<td align="center" width="150px"><b>Осталось</b></td>
	<td align="center" width="150px"><b>На вывод</b></td>
  </tr>  
  
 

<? 


$checkdeps=$db->getOne("SELECT id FROM `deposits` WHERE status='0' LIMIT 1");
if($checkdeps>0){
$depositsrow=$db->query("SELECT * FROM `deposits` WHERE status='0' ORDER BY id DESC LIMIT 50");
  
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
	$deptime="Выплачено";
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
	
	
	<td class="countdown" align="center"><?=$deptime;?></td>
      <td align="center"><b><?=$deposits['summa']+($deposits['summa']*($percent_u/100))?></b> руб.</td>
  	</tr>
<?}}else{?>
<center>  </center>	
<?}?> 
  </tbody>
 </table>
 
<br>