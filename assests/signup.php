<?php
include('../admin/config.php');
session_start();
if(isset($_POST['signup-submit'])){
    $username = $_POST['username'];
    $email = $_POST['emailcheck'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    $sqltk = "SELECT * from khachhang where tendangnhap='$username' ";
    $sqlemail = "SELECT * from khachhang where email='$email'";
    $kt_tentaikhoan = mysqli_query($conn, $sqltk);
    $kt_email = mysqli_query($conn, $sqlemail);
    if(mysqli_num_rows($kt_tentaikhoan) > 0){
        echo  "<script>
        window.location.href='index.php';
       alert('Tài khoản đã tồn tại!');
      </script>";
        $conn->rollback();
    }else  if(mysqli_num_rows($kt_email) > 0){
        echo  "<script>
        window.location.href='index.php';
       alert('Email đã tồn tại!');
      </script>";
        $conn->rollback();
    }else{
        if(mysqli_query($conn,"INSERT INTO khachhang(tendangnhap,MatKhau,email) values ('$username',md5('$password'),'$email')")){
            echo "<script>
                   window.location.href='index.php';
                  alert('Đăng ký thành công');
                 </script>";
        } else {
            echo "<script>
                  window.location.href='index.php';
                  alert('Lỗi khi đăng ký. Vui lòng thử lại !');
                  </script>";
        }
        mysqli_close($con);
    }
}

?>