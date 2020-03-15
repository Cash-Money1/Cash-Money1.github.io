<?php 

if(!defined('SKYLIGHT')){ 

echo ('Выявлена попытка взлома!'); 
exit(); 
} 
date_default_timezone_set("Europe/Moscow");
$bd_host = "localhost"; 
$bd_user = "root"; // юзер 
$bd_password = ""; // пасс 
$bd_base = "haip"; // БД 

$db = new SafeMySQL(array('user' => $bd_user, 'pass' => $bd_password, 'db' => $bd_base, 'charset' => 'utf8')); 
$start=$db->getOne("SELECT start FROM config WHERE id=?i",1);




//Название проекта 
$sitename="Твой сайт"; 
//Описание проекта 
$description="УДВОИТЕЛЬ PAYEER"; 
//Дата старта 
//$privetstvie='Проект стартовал в '.date('d.m.Y H:i',$start).''; //Тупо пишем текстом что нужно, например дату старта, как нравится 
//Вкл/выкл капчи (1 - вкл, 0 - выкл) 
$use_kapcha=0; 
//Режим работы сайта. 1 - сайт работает, 0 - регистрация закрыта 
$itworks=1; 
//Тип соединения (http или https) 
$http_s="https"; 




//Настройки PAYEER 
//ПРИЕМ СРЕДСТВ (мерчант): 
$m_shop = '500271111'; //ID магазина в системе Payeer 
$m_desc = 'Пополнение счета в '.$sitename; //Текст комментария к платежу 
$m_key = 'FDE2511HGS'; 
//ВЫПЛАТА (api): 
$accountNumber = 'P1004568227'; //Счет, с которого будут происходить выплаты 
$apiId = '729113791'; //ID API 
$apiKey = 'gENwjIIl12RTB'; //Секретный ключ API 
$m_curr='RUB'; 

//КОШЕЛЕК ПРОЕКТА 
$koshelek_admina='P1004568227'; //Кошелек админа (Сюда будут капать админские. Также только этот логин будет иметь доступ в админку) 

$adminmail="darnelite3@gmail.com"; //Почта админа 


//Выплаты по крону? 0 - по крону, 1 - кешем 
$nocron=0; 




/**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**/ 


$mindep=50; //Минимальный размер депозита 
$maxdep=2000; //Максимальный размер депозита 


$refpercent=10; //Реф. процент 
$admpercent=10; //Админский процент 


$depperiod=2; //Время вклада 

$percent_u = '25'; //+ к депозиту
$min_payeer = 100; // Минимальная выплата PAYEER

?>
