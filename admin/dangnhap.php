

<?php
ob_start();
session_start();
include_once './config.php';

if(isset($_POST['submit'])){
    $username = $_POST['admin'];
    $password = $_POST['password'];
    //làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt 
    //mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
    $username = strip_tags($username);
    $username = addslashes($username);
    $password = strip_tags($password);
    $password = addslashes($password);
    $sql = "SELECT * from quantri where tendangnhap='$username' and matkhau=md5('$password')";
    $query=mysqli_query($conn,$sql);
    $rows=mysqli_num_rows($query);
   /* $row_idnv = mysqli_fetch_array($query);
    $id_nv = $row_idnv['id_nv'];
    $sql_role = "SELECT * from chitietquyentruycap where id_nv = '$id_nv'";
    $query_role =mysqli_query($conn,$sql_role);*/
	if($rows > 0 ){
		$_SESSION['admin'] =$username;
        $_SESSION['password'] =$password;
       /* $_SESSION['id_nv'] = $id_nv;
        $_SESSION['role'] = array();
        while($row_role = mysqli_fetch_array($query_role)){
            array_push($_SESSION['role'],$row_role['id_role']);
        } */
		header("location: ./index.php ");
    } else {
        echo '<script language="javascript">';
        echo 'alert("Tên Đăng Nhập hoặc Mật Khẩu không đúng. Vui lòng thử lại")';
        echo '</script>';
    }
    mysqli_close($conn);
    ob_flush() ;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <link rel="stylesheet" href="../assests/css/dangnhap.css">
    <link rel="stylesheet" href="../assets/css/base.css">
</head>

<body>
    <div class="login-box">
       <h2>Đăng Nhập</h2>
        <form action="./dangnhap.php" id="myForm"  method="POST" enctype="multipart/form-data" onsubmit="return validateForm();">
            <div class="login-info">
                <?php if(isset($_SESSION['userError'])) {echo $_SESSION['userError'];}?>
            </div>
            <div class="user-box">
                <input type="text" name="admin" id="admin" required="Vui lòng nhập vào trường này" value="" >
                <label>Tài khoản</label>
            </div>
            <div class="user-box">
                <input type="password" name="password" id="password" required="Vui lòng nhập vào trường này" value="" >
                <label>Mật khẩu</label>
            </div>
            <button  type="submit" name="submit">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                Đăng nhập
            </button>
            <button  type="reset" >
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                Làm mới
            </button>
        </form>
    </div>
  
</body>

</html>