<?php 
session_start();
include("../admin/config.php");
if (!isset($_SESSION['username'])) {
    echo "<script>
    window.location.href='index.php';
    alert('Bạn phải đăng nhập để thực hiện tính năng này!');
    </script>";
   
} else {
    $id_sp = $_GET['MSHH'];
    $sql = "SELECT * from HangHoa where mshh='$id_sp'";
    $query= mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($query);
    if(isset($_SESSION['giohang'][$id_sp])){
        if($_SESSION['giohang'][$id_sp] < $row['soluonghang'] ){
            $_SESSION['giohang'][$id_sp] = $_SESSION['giohang'][$id_sp]+1;
        } else {
            $_SESSION['giohang'][$id_sp] =$row['soluonghang'];
        }
    }else{
         $_SESSION['giohang'][$id_sp]=1;
    }
    
    if (isset($_SESSION['giohang'])){
        if(isset($_POST['sl'])){
            foreach($_POST['sl'] as $id_sp => $sl){
                $arrID[]=$id_sp;
                if($sl==0){
                    unset($_SESSION['giohang'][$id_sp]);
                }
                elseif($sl){
                    if($sl <= $row['soluonghang']){
                        $_SESSION['giohang'][$id_sp]=$sl;
                       
                    } else {
                        $_SESSION['giohang'][$id_sp]=$row['soluonghang'];
                       
                    }
                }
            }
        }
        $arrID = array();
        foreach($_SESSION['giohang'] as $id_sp => $so_luong){
            $arrID[]=$id_sp;
        }
    }
    header('location: ./index.php?page_layout=giohang');
}


?>