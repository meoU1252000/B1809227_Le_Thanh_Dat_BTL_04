<?php
ob_start();
session_start();
include_once '../config.php';

if(!isset($_SESSION['admin'])){
    header('location: ../dangnhap.php');
}else{
    $id_sp = $_REQUEST['id_sp'];
    $sql="DELETE from  hanghoa where mshh ='$id_sp' ";
    $sql1 = "SELECT * from chitietdathang where mshh ='$id_sp'";
    $query = mysqli_query($conn,$sql1);
    $row = mysqli_fetch_array($query);
    $id_dh = $row['sodondh'];
    $sql2 = "DELETE from dathang where sodondh ='$id_dh'";
    if(mysqli_query($conn,$sql) && mysqli_query($conn,$sql2)){
        echo "<script>
        window.location.href='../index.php?page_layout=sanpham';
        alert('Xóa thành công sản phẩm');
        </script>";
    } else {
        echo "<script>
        window.location.href='../index.php?page_layout=sanpham';
        alert('Lỗi khi xóa sản phẩm. Vui lòng thử lại !');
        </script>";
       
    }
    mysqli_close($conn);
}
ob_flush() ;

?>