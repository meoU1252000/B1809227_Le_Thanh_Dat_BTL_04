<?php
include_once '../admin/config.php';
ob_start();
session_start();
if(isset($_POST['signin-submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    //làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt 
    //mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
    $username = strip_tags($username);
    $username = addslashes($username);
    $password = strip_tags($password);
    $password = addslashes($password);
    $sql = "SELECT * from khachhang where tendangnhap='$username' and matkhau=md5('$password')";
    $query=mysqli_query($conn,$sql);
    $rows=mysqli_num_rows($query);
    $row = mysqli_fetch_array($query);
	if($rows > 0 ){
      $_SESSION['id'] = $row['mskh'];
      $_SESSION['username'] =$username;
      $_SESSION['password'] =$password;
      header("location: ./index.php ");
    } else {
        echo  "<script>
        window.location.href='index.php';
       alert('Tên Đăng Nhập hoặc Mật Khẩu không đúng. Vui lòng thử lại!');
      </script>";
        $conn->rollback();
    }
    mysqli_close($conn);
    
    ob_flush() ;
}
 ?>

 