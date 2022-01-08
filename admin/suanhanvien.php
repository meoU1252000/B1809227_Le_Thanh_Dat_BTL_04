<?php
include_once './config.php';
ob_start();
if (!isset($_SESSION['admin'])) {
    header('location: ./dangnhap.php');
}else{
    $msnv = $_REQUEST['id_nv'];
    $query = mysqli_query($conn,"SELECT * from nhanvien where msnv = '$msnv'");
    $row = mysqli_fetch_array($query);
    if(isset($_POST['edit-staff'])){
        $new_name = $_POST['edit-name'];
        $new_position = $_POST['edit-position'];
        $new_address = $_POST['edit-address'];
        $new_phone = $_POST['edit-phone'];
        $new_notes = $_POST['edit-notes'];
        if($new_name=="" ){
            echo '<script language="javascript">';
            echo 'alert("Tên Nhân Viên Không Được Để Trống")';
            echo '</script>';
            $conn->rollback();
        } else {
            $edit_sql="UPDATE nhanvien SET hotennv='$new_name',
                                           chucvu ='$new_position',
                                           diachi = '$new_address',
                                           sodienthoai ='$new_phone',
                                           ghichu = '$new_notes' 
                                        WHERE msnv = '$msnv' ";
            if(mysqli_query($conn,$edit_sql))
            {
                echo '<script language="javascript">';
                echo 'alert("Cập Nhật Nhân Viên Thành Công")';
                echo '</script>';
                $url = "index.php?page_layout=nhanvien";
                if(headers_sent()){
                    die('<script type ="text/javascript">window.location.href="'.$url.'" </script>');
                }else{
                    header ("location: $url");
                    die();
                }
                
            } else {
                echo '<script language="javascript">';
                echo 'alert("Lỗi khi cập nhật thông tin nhân viên")';
                echo '</script>';  
                $conn -> rollback();
            }
            mysqli_close($conn);
        }
    }

}

ob_end_flush();

?>

        <div class="body-page--function">
            <span class="body-page--function-title">Quản Lý Nhân Viên</span>
            <div class="body-page--function-form">
                <form action="" method="POST" enctype="multipart/form-data" onsubmit="return check()">
                    <div class="body-page--function-form--title ">
                        <span class="title ">Sửa Thông Tin Nhân Viên </span>
                        <div class="body-page--function-form--title-seperate"></div>
                    </div>
                   
                    <div class="body-page--function-form--content">
                         <div class="body-page--function-form--content-col1">
                            <ul class="body-page--function-form--content-list">
                                <li class="body-page--function-form--content-col1_title">Tên Nhân Viên</li>
                                <li class="body-page--function-form--content-col1_input"><input type="text"
                                        class="body-page--function-form--content-input" name="edit-name" value="<?php echo $row['hotennv'] ?>" ></li>
                                <li class="body-page--function-form--content-col1_title">Chức Vụ</li>
                                <li class="body-page--function-form--content-col1_input"><input type="text"
                                        class="body-page--function-form--content-input"  name="edit-position" value="<?php echo $row['chucvu'] ?>"  ></li>
                                <li class="body-page--function-form--content-col1_title">Địa Chỉ</li>
                                <li class="body-page--function-form--content-col1_input" ><input type="text"
                                        class="body-page--function-form--content-input"name="edit-address" value="<?php echo $row['diachi'] ?>" ></li>
                            </ul>
                        </div>
                        <div class="body-page--function-form--content-col2">
                            <ul class="body-page--function-form--content-list">
                                <li class="body-page--function-form--content-col2_title" >Số Điện Thoại</li>
                                <li class="body-page--function-form--content-col2_input"><input type="text"
                                        class="body-page--function-form--content-input" name="edit-phone" value="<?php echo $row['sodienthoai'] ?>"></li>
                                <li class="body-page--function-form--content-col2_title">Ghi Chú</li>
                                <li class="body-page--function-form--content-col2_input"><input type="text"
                                        class="body-page--function-form--content-input" name="edit-notes" value="<?php echo $row['ghichu'] ?>" ></li>

                            </ul>
                        </div>
            
                    </div>
                    <div class="button-form">
                        <button type="submit" name="edit-staff" class="function-submit">Xác Nhận</button>
                        <button type="reset" class="function-reset">Làm Mới</button>
                    </div>
             
            </form>
            </div>

        </div>

