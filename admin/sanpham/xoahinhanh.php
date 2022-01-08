<?php
ob_start();
session_start();
include_once '../config.php';

if(!isset($_SESSION['admin'])){
    header('location: ../dangnhap.php');
}else{
    $id_hinhanh = $_REQUEST['id_hinhanh'];
    $sql="DELETE from hinhhanghoa where mahinh ='$id_hinhanh'";
    if(mysqli_query($conn,$sql)){
        echo "<script>
        window.location.href='../index.php?page_layout=sanpham';
        alert('Xóa thành công hình sản phẩm');
        </script>";
    } else {
        echo "<script>
        window.location.href='./index.php?page_layout=sanpham';
        alert('Lỗi khi xóa hình sản phẩm. Vui lòng thử lại !');
        </script>";
    }
    mysqli_close($conn);
}
ob_flush() ;

?>