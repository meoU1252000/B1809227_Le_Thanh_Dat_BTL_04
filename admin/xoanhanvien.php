<?php
ob_start();
session_start();
include_once './config.php';
    if(!isset($_SESSION['admin'])){
        header('location: ./dangnhap.php');
    }else{
        $id_nv = $_REQUEST['id_nv'];
        $sql="DELETE from nhanvien where msnv ='$id_nv' ";
        if(mysqli_query($conn,$sql)){
            echo "<script>
            window.location.href='index.php?page_layout=nhanvien';
            alert('Xóa thành công nhân viên');
            </script>";
        } else {
            echo "<script>
            window.location.href='index.php?page_layout=nhanvien';
            alert('Lỗi khi xóa nhân viên. Vui lòng thử lại !');
            </script>";
            
        }
        mysqli_close($conn);
    }
ob_flush() ;


?>