<?php


$db_name = "genshorturl"; //ชื่อฐานข้อมูล
$db_host = "localhost:3310";
$db_user = "root"; //ชื่อuser
$db_pass = "1234"; //ชื่อรหัสผ่าน

try{ 

 $db_con = new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_pass);

  $db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $db_con->exec("set names utf8");

}

catch(PDOException $e){

  echo $e->getMessage();

}



?>