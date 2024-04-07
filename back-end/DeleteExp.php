<?php

require('conn.php');

$currant_date = date('Y-m-d');
$sql = "SELECT * FROM `url_link` WHERE date_exp = '$currant_date'";
$query = mysqli_query($db_con,$sql);
$rows = mysqli_fetch_all($query,MYSQLI_ASSOC);
foreach ($rows as $row){
    $id = $row['short_ID'] ;
    $sqlDelete = "DELETE FROM `url_link` WHERE `short_ID` = '$id'";

    echo $sqlDelete ;
    $DeleteQuery = mysqli_query($db_con, $sqlDelete);
}

?>