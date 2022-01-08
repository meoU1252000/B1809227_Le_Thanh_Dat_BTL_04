<?php
ob_start();
session_start();
include_once './config.php';

if(!isset($_SESSION['admin'])){
    header('location: ./dangnhap.php');
}else{
    $id_dh = $_REQUEST['id_dh'];
    $sql="DELETE from dathang where sodondh ='$id_dh'";
    if(mysqli_query($conn,$sql)){
        echo "<script>
        window.location.href='index.php?page_layout=donhang';
        alert('Xóa thành công đơn hàng');
        </script>";
    } else {
        echo "<script>
        window.location.href='index.php?page_layout=donhang';
        alert('Lỗi khi xóa đơn hàng. Vui lòng thử lại !');
        </script>";
    }
    mysqli_close($conn);
}
ob_flush() ;

?>