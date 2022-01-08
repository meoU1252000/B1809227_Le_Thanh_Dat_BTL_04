<?php 
session_start();
include('../admin/config.php');
if(isset($_GET['id_dc'])){
    $id_dc = $_GET['id_dc'];
    if(mysqli_query($conn,"DELETE from diachikh where madc = '$id_dc'")){
            echo "<script>
            window.location.href='index.php?page_layout=diachi';
            alert('Xóa thành công địa chỉ');
            </script>";
    } else {
            echo "<script>
            window.location.href='index.php?page_layout=diachi';
            alert('Lỗi khi xóa địa chỉ. Vui lòng thử lại !');
            </script>";
    }
    
    $conn->rollback();
}
?>