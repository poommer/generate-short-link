<?php

require('conn.php');

function genId() {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

// สร้างรหัสสุ่มที่มีความยาว 10 ตัวอักษร
$random_string = '';
$length = rand(4,5);
for ($i = 0; $i < $length; $i++) {
    $random_string .= $characters[rand(0, strlen($characters) - 1)];
}

return $random_string;
}

$link = $_POST['oldLink'];

$sql_check = "SELECT * FROM `url_link` WHERE `URL_NewShort` = '$link' " ;
$query = mysqli_query($db_con,$sql_check);

if(mysqli_num_rows($query) >= 1){
    echo '1' ;
} else{
    $id = genId() ;

$new = 'http://localhost/generate-short-link/'.$id;
$dateCreate = date('Y-m-d');
$dateEXP = date('Y-m-d', strtotime('+20 days'));

$sql = "INSERT INTO `url_link` VALUE ('$id', '$link', '$new', '$dateCreate', '$dateEXP')  ";
$query = mysqli_query($db_con,$sql);

if($query){
    echo $new ;
} else{
    echo '0' ;
}
}




// เรียกใช้ autoload.php เพื่อให้ PHP autoload classes ของ Composer
//require 'vendor/autoload.php';

//use PHPQRCode\QRcode;

// ข้อมูล URL หรือข้อความที่คุณต้องการสร้าง QR Code
//$data = $new;

// ตัวแปรเก็บที่อยู่ของไฟล์ QR Code ที่จะถูกสร้าง
//$filename = $id.'.png';

// สร้าง QR Code ด้วยข้อมูลที่กำหนด
//QRcode::png($data, $filename, 'L', 4, 2);

//echo 'QR Code ได้ถูกสร้างเรียบร้อยแล้ว!'; -->





?>