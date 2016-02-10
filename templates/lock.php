<?php

$db = mysql_connect("goal01.mysql.ukraine.com.ua","goal01_db","xVStkZXA")
 or die ("Соединение не установлено!");
 mysql_select_db("goal01_db",$db);
 mysql_query("SET NAMES 'utf8';");
 mysql_query("SET CHARACTER SET 'utf8';");
 mysql_query("SET SESSION collation_connection = 'utf8_general_ci';");

if (!isset($_SERVER['PHP_AUTH_USER']))

{
        Header ("WWW-Authenticate: Basic realm=\"Admin Page\"");
        Header ("HTTP/1.0 401 Unauthorized");
        exit();
}

else {
        if (!get_magic_quotes_gpc()) {
                $_SERVER['PHP_AUTH_USER'] = mysql_escape_string($_SERVER['PHP_AUTH_USER']);
                $_SERVER['PHP_AUTH_PW'] = mysql_escape_string($_SERVER['PHP_AUTH_PW']);
        }

        $query = "SELECT pass FROM userlist WHERE user='".$_SERVER['PHP_AUTH_USER']."'";
        $lst = @mysql_query($query);

        if (!$lst)
        {
            Header ("WWW-Authenticate: Basic realm=\"Admin Page\"");
        Header ("HTTP/1.0 401 Unauthorized");
        exit();
        }

        if (mysql_num_rows($lst) == 0)
        {
           Header ("WWW-Authenticate: Basic realm=\"Admin Page\"");
           Header ("HTTP/1.0 401 Unauthorized");
           exit();
        }

        $pass =  @mysql_fetch_array($lst);
        if ($_SERVER['PHP_AUTH_PW']!= $pass['pass'])
        {
            Header ("WWW-Authenticate: Basic realm=\"Admin Page\"");
           Header ("HTTP/1.0 401 Unauthorized");
           exit();
        }


}




?>