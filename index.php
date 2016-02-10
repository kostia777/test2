<?php

/* Подключение к серверу MySQL */ 
$mysqli = new mysqli( 
            'goal01.mysql.ukraine.com.ua',  /* Хост, к которому мы подключаемся */ 
            'goal01_db',       /* Имя пользователя */ 
            'xVStkZXA',   /* Используемый пароль */ 
            'goal01_db');     /* База данных для запросов по умолчанию */ 

if (mysqli_connect_errno()) { 
   printf("Подключение к серверу MySQL невозможно. Код ошибки: %s\n", mysqli_connect_error()); 
   exit; 
} 


$act = isset($_GET['act'])?$_GET['act'] :'list';

switch($act)
{

case 'list';



if (isset($_GET["test_name"])) { 
 /* Определяем текущую дату */
$cdate = date("Y-m-d H:i:s"); 


$test_name=htmlspecialchars($_GET['test_name']); // пишeм дaнныe в пeрeмeнныe и экрaнируeм спeцсимвoлы
$test_mail=htmlspecialchars($_GET["test_mail"]);
$test_theme=htmlspecialchars($_GET["test_theme"]);
$test_mess=htmlspecialchars($_GET["comment"]);

//Запись сообшения
$mysqli->query("INSERT INTO test_table SET name='".$test_name."', email='".$test_mail."',theme='".$test_theme."', message='".$test_mess."', data='$cdate'");

}


$records = array();
//Получаем переменную для сортировки
$i = isset($_GET['i'])?$_GET['i'] : 0;

if($i==1)
// дата от большей
$sel = $mysqli->query("SELECT * 
FROM test_table 
ORDER BY `test_table`.`data` DESC 
LIMIT 0 , 30 ");

elseif($i==0)
// дата от меншей
$sel = $mysqli->query("SELECT *
FROM test_table
ORDER BY  `test_table`.`data` ASC 
LIMIT 0 , 30");

elseif($i==2)
// email от меньшей
$sel = $mysqli->query("SELECT *
FROM test_table
ORDER BY  `test_table`.`email` ASC 
LIMIT 0 , 30");

elseif($i==3)
// email от большей
$sel = $mysqli->query("SELECT *
FROM test_table
ORDER BY  `test_table`.`email` DESC 
LIMIT 0 , 30");

elseif($i==4)
// имя от меньшей
$sel = $mysqli->query("SELECT *
FROM test_table
ORDER BY  `test_table`.`name` ASC 
LIMIT 0 , 30");

elseif($i==5)
// имя от большей
$sel = $mysqli->query("SELECT *
FROM test_table
ORDER BY  `test_table`.`name` DESC 
LIMIT 0 , 30");


while ($row = $sel->fetch_assoc()){

$records[]=$row;

}

require_once($_SERVER['DOCUMENT_ROOT'].'/blog/templates/list.php');
break;



case 'admin';

if (isset($_GET[del])) {
  
/* Если была нажата ссылка удаления, удаляем запись */
$sel = $mysqli->query("delete from test_table where (id='".$_GET[del]."')");

}

if (isset($_GET[update])) {
  
/* Если была нажата ссылка редактирования, изменяем запись */

$test_name=htmlspecialchars($_GET['test_name']); // пишeм дaнныe в пeрeмeнныe и экрaнируeм спeцсимвoлы
$test_mail=htmlspecialchars($_GET["test_mail"]);
$test_theme=htmlspecialchars($_GET["test_theme"]);
$test_mess=htmlspecialchars($_GET["test_mess"]);

$mysqli->query("UPDATE test_table  SET name='".$test_name."', email='".$test_mail."',theme='".$test_theme."', message='".$test_mess."',admin='1' WHERE id='$_GET[update]'");

}




$records = array();
$sel = $mysqli->query("SELECT * 
FROM test_table 
ORDER BY `test_table`.`data` DESC 
LIMIT 0 , 30 ");

while ($row = $sel->fetch_assoc()){

$records[]=$row;

}

require_once($_SERVER['DOCUMENT_ROOT'].'/blog/templates/admin.php');





if (isset($_GET[edit])) {


$edit=$_GET[edit];
/* Если была нажата ссылка редактировать подключаем форму*/

require_once($_SERVER['DOCUMENT_ROOT'].'/blog/templates/form_update.php');

}




break;

}













?>