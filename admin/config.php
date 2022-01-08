<?php
$dbhostname="localhost";
$dbusername = "root";
$dbpassword = "";
$dbName = "quanlydathang";
$conn = mysqli_connect($dbhostname,$dbusername,$dbpassword,$dbName);
ini_set('memory_limit', '512M');
if($conn){
    $setLang=mysqli_query($conn,"SET NAMES 'utf8'");
} else{
    die("Kết nối thất bại!" .mysqli_connect_error());
}

?>