<?php
/*
$db_host = "localhost";
$db_name = "sistema";
$db_user = "root";
$db_pass = "root";
$db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
*/


$db_host = "zxxpujtaimee.mysql.db";
$db_name = "zxxpujtaimee";
$db_user = "zxxpujtaimee";
$db_pass = "Sammarcelli98";
$db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


?>