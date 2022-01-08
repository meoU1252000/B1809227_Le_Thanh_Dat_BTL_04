<?php
ob_start();
session_start();
include_once './config.php';

if(!isset($_SESSION['admin'])){
    header('location: ./dangnhap.php');
}else{
    $id_dm = $_REQUEST['id_dm'];
    $sql="DELETE from loaihanghoa where maloaihang ='$id_dm'";
    if(mysqli_query($conn,$sql)){
        echo "<script>
        window.location.href='index.php?page_layout=danhmuc';
        alert('Xóa thành công danh mục');
        </script>";
    } else {
        echo "<script>
        window.location.href='index.php?page_layout=danhmuc';
        alert('Lỗi khi xóa danh mục. Vui lòng thử lại !');
        </script>";
    }
    mysqli_close($conn);
}
ob_flush() ;

?>