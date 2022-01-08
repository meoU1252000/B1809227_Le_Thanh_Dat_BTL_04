
<?php
include_once './config.php';
ob_start();
if (!isset($_SESSION['admin'])) {
    header('location: ./dangnhap.php');
}else {
    $kt = mysqli_query($conn, "SELECT * from thongtindoanhnghiep");
    $row = mysqli_fetch_array($kt);
    if(isset($_POST['add-enterprise'])){
        if(mysqli_num_rows($kt)  == 0){    
            $name = $_POST['enterprise-name'];
            $adminname = $_POST['admin-name'];
            $email = $_POST['enterprise-email'];
            $address = $_POST['enterprise-address'];
            $phone = $_POST['enterprise-phone'];
            $detail = $_POST['enterprise-detail'];
            $img = '../img/info/';
            $img = $img.$_FILES['admin-img']['name'];
            move_uploaded_file($_FILES['admin-img']['tmp_name'],$img);
            if($name=="" ){
                echo '<script language="javascript">';
                echo 'alert("Tên Doanh Nghiệp Không Được Để Trống")';
                echo '</script>';
                $conn->rollback();
            } else{
                if(mysqli_query($conn,"INSERT into thongtindoanhnghiep(tendoanhnghiep,tenadmin,email,diachi,sodienthoai,chitietdoanhnghiep,hinhanh) values ('$name','$adminname','$email','$address','$phone','$detail','$img')"))
                {
                    echo '<script language="javascript">';
                    echo 'alert("Thêm Thành Công Thông Tin Doanh Nghiệp")';
                    echo '</script>';
                    $url = "index.php?page_layout=addinfo";
                    if(headers_sent()){
                        die('<script type ="text/javascript">window.location.href="'.$url.'" </script>');
                    }else{
                        header ("location: $url");
                        die();
                    }
                } else {
                    echo '<script language="javascript">';
                    echo 'alert("Lỗi khi thêm thông tin Doanh Nghiệp")';
                    echo '</script>';  
                    $conn -> rollback();
                }
            }
        }else {
            $name = $_POST['enterprise-name'];
            $adminname = $_POST['admin-name'];
            $email = $_POST['enterprise-email'];
            $address = $_POST['enterprise-address'];
            $phone = $_POST['enterprise-phone'];
            $detail = $_POST['enterprise-detail'];
            $img = '../img/info/';
            $img = $img.$_FILES['admin-img'] ['name'];
            move_uploaded_file($_FILES['admin-img']['tmp_name'],$img);
            if($name=="" ){
                echo '<script language="javascript">';
                echo 'alert("Tên Doanh Nghiệp Không Được Để Trống")';
                echo '</script>';
                $conn->rollback();
            } else{
                if(mysqli_query($conn,"UPDATE thongtindoanhnghiep SET tendoanhnghiep = '$name',
                                                       tenadmin = '$adminname',
                                                       email ='$email',
                                                       diachi = '$address',
                                                       sodienthoai = '$phone',
                                                       chitietdoanhnghiep ='$detail',
                                                       hinhanh = '$img'"))
                {
                    echo '<script language="javascript">';
                    echo 'alert("Cập Nhật Thành Công Thông Tin Doanh Nghiệp")';
                    echo '</script>';
                    $url = "index.php?page_layout=addinfo";
                    if(headers_sent()){
                        die('<script type ="text/javascript">window.location.href="'.$url.'" </script>');
                    }else{
                        header ("location: $url");
                        die();
                    }
                } else {
                    echo '<script language="javascript">';
                    echo 'alert("Lỗi khi cập nhật thông tin Doanh Nghiệp")';
                    echo '</script>';  
                    $conn -> rollback();
                }
            }
        }
        
    } 

}
mysqli_close($conn);
ob_end_flush();

?>

        <div class="info-page--function">
            <span class="info-page--function-title">Thông Tin Doanh Nghiệp</span>
            <div class="info-page--function-form">
                <form action="" method="POST" enctype="multipart/form-data" onsubmit="return check()">
                    <div class="info-page--function-form--title ">
                        <span class="title ">Thông Tin </span>
                        <div class="info-page--function-form--title-seperate"></div>
                    </div>
                    <div class="info-page--function-form--content">
                        <div class="info-page--function-form--content-col1">
                            <ul class="info-page--function-form--content-list">
                                <li class="info-page--function-form--content-col1_title">Tên Doanh Nghiệp</li>
                                <li class="info-page--function-form--content-col1_input"><input type="text"
                                        class="info-page--function-form--content-input" name="enterprise-name" value="<?php echo $row['tendoanhnghiep'] ?>" ></li>
                                <li class="info-page--function-form--content-col1_title">Tên Admin</li>
                                <li class="info-page--function-form--content-col1_input"><input type="text"
                                        class="info-page--function-form--content-input" name="admin-name" value="<?php echo $row['tenadmin'] ?>" ></li>
                                <li class="info-page--function-form--content-col1_title">Giới thiệu Doanh Nghiệp</li>
                                <li class="info-page--function-form--content-col1_input">
                                    <textarea name="enterprise-detail" rows="5" cols="50" wrap="hard" style="font-size:18px"><?php echo $row['chitietdoanhnghiep'] ?> 
                                </textarea>
                               </li>
                            </ul>
                        </div>
                        <div class="info-page--function-form--content-col2">
                            <ul class="info-page--function-form--content-list">
                                <li class="info-page--function-form--content-col2_title">Địa Chỉ</li>
                                <li class="info-page--function-form--content-col2_input" ><input type="text"
                                        class="info-page--function-form--content-input"name="enterprise-address" value="<?php echo $row['diachi'] ?>"></li>
                                <li class="info-page--function-form--content-col1_title">Email: </li>
                                <li class="info-page--function-form--content-col1_input"><input type="text"
                                        class="info-page--function-form--content-input"  name="enterprise-email" value="<?php echo $row['email'] ?>"></li>
                                <li class="info-page--function-form--content-col2_title" >Số Điện Thoại</li>
                                <li class="info-page--function-form--content-col2_input"><input type="text"
                                        class="info-page--function-form--content-input" name="enterprise-phone" value="<?php echo $row['sodienthoai'] ?>"></li>
                            </ul>
                        </div>
                        <div class="info-page--function-form--content-col3">
                            <ul class="info-page--function-form--content-col3_form">
                                <li class="info-page--function-form--content-col3">
                                    <img src="./<?php echo $row['hinhanh']; ?>" class="info-page--function-form--content-col3_img" alt="Chưa có hình ảnh">
                                </li>
                                <li class="info-page--function-form--content-col2_input">
                                    <div class="form_label">
                                     <label for="file" class="upload_button">Upload Image</label>
                                     <input type="file" id="file" name="admin-img" mutiple hidden > 
                                     </div>
                                 </li>
                            </ul>
                        </div>
                    </div>
                    <div class="button-form">
                        <button type="submit" name="add-enterprise" class="function-submit">Xác Nhận</button>
                        <button type="reset" class="function-reset">Làm Mới</button>
                    </div>
                </form>
            </div>

        </div>