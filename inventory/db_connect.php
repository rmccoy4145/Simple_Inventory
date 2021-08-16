<?php



$db_host = 'yourHost';

$db_user = 'yourUsername';

$db_pwd = 'changes';

$database = 'dynamo';



if (!mysql_connect($db_host, $db_user, $db_pwd))    

die("Can't connect to database");

if (!mysql_select_db($database))    

die("Can't select database");













?>