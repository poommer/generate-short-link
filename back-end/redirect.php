

<?php
    require('conn.php');
    $path = $_SERVER['REQUEST_URI'];

    $id = basename($path);

    $sql = "SELECT * FROM url_link WHERE short_ID = '$id'";
    $query = mysqli_query($db_con,$sql);



    $result = mysqli_fetch_array($query,MYSQLI_ASSOC);

    if(mysqli_num_rows($query) == 1){
        $sqlSt = "INSERT INTO `genshorturl`.`statistic`  VALUES (CURDATE(), '$id');";
        $querySt = mysqli_query($db_con,$sqlSt);
        $goto = 'location:'.$result['URL_original'] ;
        header($goto);
    }


    
    
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>404 not found</h1>
    <p>ไม่พบหน้าของคุณ หรือลิงก์อาจจะหมดอายุไปแล้ว</p>
</body>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="countDown.js"></script>
</html>