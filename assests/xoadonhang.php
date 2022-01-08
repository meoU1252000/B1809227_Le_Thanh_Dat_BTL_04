<?php 
session_start();
include('../admin/config.php');
if(isset($_GET['id_dh'])){
    $id_dh = $_GET['id_dh'];
    $query = mysqli_query($conn,"SELECT * from ChiTietDatHang where sodondh = '$id_dh'");
    while($row = mysqli_fetch_array($query)){
        $soluong = $row['soluong'];
        $mshh = $row['mshh'];
        $sql= "SELECT * from HangHoa where mshh = '$mshh'";
        $querysql = mysqli_query($conn,$sql);
        $rowsql = mysqli_fetch_array($querysql);
        $soluonghienco = $rowsql['soluonghang'];
        $soluongmoi = $soluong + $soluonghienco;
        mysqli_query($conn,"UPDATE HangHoa SET soluonghang = '$soluongmoi'  where mshh = '$mshh'");
    }
    if(mysqli_query($conn,"DELETE from ChiTietDatHang where sodondh = '$id_dh'")){
        if(mysqli_query($conn,"DELETE from DatHang where sodondh = '$id_dh'")){
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
    }
    $conn->rollback();
}
?>