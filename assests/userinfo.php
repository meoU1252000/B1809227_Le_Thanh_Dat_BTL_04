
<?php 
include_once '../admin/config.php';
if(!isset($_SESSION['username'])){
    header('location: ./index.php');
} else{
    $username = $_SESSION['username'];  
    $sql = "SELECT * from khachhang where tendangnhap='$username'";
    $query = mysqli_query($conn,$sql);
    $rows = mysqli_fetch_array($query);  
    if(isset($_POST['info_submit'])){
        if(isset($_POST['info_name'])){
            $name = $_POST['info_name'];
        }else{
            $name="";
        }
        if(isset($_POST['info_company'])){
            $company = $_POST['info_company'];
        }else{
            $company="";
        }
        if(isset($_POST['info_fax'])){
            $fax = $_POST['info_fax'];
        }else{
            $fax="";
        }
        if(isset($_POST['info_phone'])){
            $phone = $_POST['info_phone'];
        }else{
            $phone="";
        }
        if(isset($_POST['emailcheckinfo'])){
            $email = $_POST['emailcheckinfo'];
         
        }else{
            $email="";
        }
        if(isset($_POST['emailcheckinfo'])){
            $email = $_POST['emailcheckinfo'];
        }else{
            $email="";
        }
        if(isset($_POST['password'])){
            $password=$_POST['password'];
        }else{
            $password="";
        }
        if(isset($_POST['newpassword'])){
            $newpassword=$_POST['newpassword'];
        }else{
            $newpassword="";
        }
        if($password == NULL){
            $sqlemail = "SELECT * from khachhang where email='$email' and  tendangnhap != '$username'";
            $kt_email = mysqli_query($conn, $sqlemail);
            if(mysqli_num_rows($kt_email) > 0){
                echo  "<script>
                window.location.href='index.php';
               alert('Email đã tồn tại!');
               </script>";
                $conn->rollback();
            }else{
                if(mysqli_query($conn,"UPDATE khachhang SET hotenkh='$name',
                                                            tencongty='$company',
                                                            sofax = '$fax',
                                                            email = '$email',
                                                            sodienthoai ='$phone'
                                                       WHERE tendangnhap = '$username' "))
                {
                    echo "<script>
                   window.location.href='index.php';
                  alert('Cập nhật thành công thông tin!');
                  </script>";
                } else {
                    echo "<script>
                   window.location.href='index.php';
                  alert('Lỗi. Vui lòng thử lại!');
                  </script>";
                       $conn -> rollback();
            
                }
            }
        } else if($password !=NULL && $newpassword !=NULL) {
            $mk = $rows['matkhau'];
            $sqlemail = "SELECT * from khachhang where email='$email'";
            $kt_email = mysqli_query($conn, $sqlemail);
            if(mysqli_num_rows($kt_email) > 0){
                echo  "<script>
                window.location.href='index.php';
               alert('Email đã tồn tại!');
               </script>";
                $conn->rollback();
            }else{
                if(md5($password)===$mk){
                    if(mysqli_query($conn,"UPDATE KhachHang SET  matkhau = md5('$newpassword'),
                                                                 hotenkh='$name',
                                                                 tencongty='$company',
                                                                 sofax = '$fax',
                                                                 email = '$email',
                                                                 sodienthoai ='$phone'
                                                          WHERE tendangnhap = '$username' "))
                   {
                    echo "<script>
                    window.location.href='index.php';
                   alert('Cập nhật thành công thông tin!');
                   </script>";
                   } else {
                     echo "<script>
                    window.location.href='index.php';
                   alert('Lỗi. Vui lòng thử lại!');
                   </script>";
                        $conn -> rollback();  
                   }
    
                }else{
                    echo "<script>
                   alert('Sai Mật Khẩu. Vui lòng nhập lại!');
                   </script>";
                }

            }
        }
        mysqli_close($conn);
    }
}
?>
<script>
       carousel();
       function carousel() {
         var i;
         var x = document.getElementsByClassName("header_banner");
         for (i = 0; i < x.length; i++) {
           x[i].style.display = "none";  
         }
    
    }
</script>
        <div class="grid">
            <div class="grid_row app_content">
                <div class="home-userinfo">
                   <form action="" name="validationinfo" method="POST" enctype="multipart/form-data" onsubmit="return checkbaeinfo();">
                        <div class="home-userinfo_name">
                            <div class="home-userinfo_content--left">
                                <span>Họ Tên </span>
                                <input type="text" name="info_name" value="<?php echo $rows['hotenkh']; ?>" >
                            </div>
                            <div class="home-userinfo_content--right">
                                <span>Số Điện Thoại</span>
                                <input type="text" name="info_phone" value="<?php echo $rows['sodienthoai']; ?>">
                            </div>
                        </div>
                        <div class="home-userinfo_content">
                            <span>Tên Công Ty</span>
                            <input type="text" name="info_company" value="<?php echo $rows['tencongty']; ?>">
                        </div>
                        <div class="home-userinfo_content">
                            <span>Số Fax</span>
                            <input type="text" name="info_fax" value="<?php echo $rows['sofax']; ?>">
                        </div>
                        <div class="home-userinfo_content">
                            <span>Địa Chỉ Email</span>
                            <input type="text" name="emailcheckinfo" value="<?php echo $rows['email']; ?>" >
                        </div>
                        <div class="home-userinfo_password home-userinfo_password--seperate"><span> Thay Đổi Mật Khẩu</span></div>
                        <div class="home-userinfo_content">
                            <span>Mật Khẩu hiện tại (bỏ trống nếu không thay đổi)</span>
                            <input type="password" name="password">
                        </div>
                        <div class="home-userinfo_content">
                            <span>Mật Khẩu mới (bỏ trống nếu không thay đổi)</span>
                            <input type="password" name="newpassword">
                        </div>
                        <div class="home-userinfo_content">
                            <span>Xác nhận mật khẩu mới</span>
                            <input type="password" name="renewpassword">
                        </div>
                        <button type="submit" name="info_submit" class="home-userinfo_button btn btn--primary">Xác Nhận</button>
                    </form>
                </div>
            </div>
        </div>
   
    
