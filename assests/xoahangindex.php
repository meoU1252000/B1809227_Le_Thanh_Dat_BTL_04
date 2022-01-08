<?php 
session_start();
if(isset($_GET['MSHH'])){
    $id_sp = $_GET['MSHH'];
    unset($_SESSION['giohang'][$id_sp]);
}
header('location: ./index.php');
?>