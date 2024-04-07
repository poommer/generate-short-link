<?php

$db_host = "localhost:3310";
$db_name = "genshorturl"; //ชื่อฐานข้อมูล

$db_user = "root"; //ชื่อuser
$db_pass = "1234"; //ชื่อรหัสผ่าน

$db_con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if(!$db_con){
  echo 'not connected';
} 




?>