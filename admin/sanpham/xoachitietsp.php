<?php
ob_start();
session_start();
include_once '../config.php';

if(!isset($_SESSION['admin'])){
    header('location: ../dangnhap.php');
}else{
    $id_sp = $_REQUEST['id_sp'];
    $sql="DELETE  from chitiethanghoa where mshh ='$id_sp'";
    if(mysqli_query($conn,$sql)){
        echo "<script>
        window.location.href='../index.php?page_layout=sanpham';
        alert('Xóa thành công sản phẩm');
        </script>";
    } else {
        echo "<script>
        window.location.href='index.php?page_layout=sanpham';
        alert('Lỗi khi xóa sản phẩm. Vui lòng thử lại !');
        </script>";
    }
    mysqli_close($conn);
}
ob_flush() ;

?>