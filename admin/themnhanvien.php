<script>
function validateForm() {
  let x = document.forms["myForm"]["staff-name"].value;
  if (x == "") {
    alert("Tên Nhân Viên không được để trống !");
    return false;
  }
}
</script>

<?php
include_once './config.php';
if (!isset($_SESSION['admin'])) {
    header('location: ./dangnhap.php');
}else{
    if(isset($_POST['add-staff'])){
        $name = $_POST['staff-name'];
        $position = $_POST['staff-position'];
        $address = $_POST['staff-address'];
        $phone = $_POST['staff-phone'];
        $notes = $_POST['staff-notes'];
        if(mysqli_query($conn,"INSERT into nhanvien(hotennv,chucvu,diachi,sodienthoai,ghichu) values ('$name','$position','$address','$phone','$notes')"))
        {
            echo '<script language="javascript">';
            echo 'alert("Thêm Thành Công Nhân Viên")';
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
            echo 'alert("Lỗi khi thêm nhân viên")';
            echo '</script>';  
            $conn -> rollback();
        }
        
        mysqli_close($conn);
    }

}

?>

<div class="body-page--function">
            <span class="body-page--function-title">Quản Lý Nhân Viên</span>
            <div class="body-page--function-form">
                <form action="" id="myForm" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                    <div class="body-page--function-form--title ">
                        <span class="title ">Thêm Nhân Viên Mới </span>
                        <div class="body-page--function-form--title-seperate"></div>
                    </div>
                    <div class="body-page--function-form--content">
                        <div class="body-page--function-form--content-col1">
                            <ul class="body-page--function-form--content-list">
                                <li class="body-page--function-form--content-col1_title">Tên Nhân Viên</li>
                                <li class="body-page--function-form--content-col1_input"><input type="text"
                                        class="body-page--function-form--content-input" name="staff-name" ></li>
                                <li class="body-page--function-form--content-col1_title">Chức Vụ</li>
                                <li class="body-page--function-form--content-col1_input"><input type="text"
                                        class="body-page--function-form--content-input"  name="staff-position" ></li>
                                <li class="body-page--function-form--content-col1_title">Địa Chỉ</li>
                                <li class="body-page--function-form--content-col1_input" ><input type="text"
                                        class="body-page--function-form--content-input"name="staff-address"></li>
                            </ul>
                        </div>
                        <div class="body-page--function-form--content-col2">
                            <ul class="body-page--function-form--content-list">
                                <li class="body-page--function-form--content-col2_title" >Số Điện Thoại</li>
                                <li class="body-page--function-form--content-col2_input"><input type="text"
                                        class="body-page--function-form--content-input" name="staff-phone" ></li>
                                <li class="body-page--function-form--content-col2_title">Ghi Chú</li>
                                <li class="body-page--function-form--content-col2_input"><input type="text"
                                        class="body-page--function-form--content-input" name="staff-notes"></li>

                            </ul>
                        </div>
                    </div>
                    <div class="button-form">
                        <button type="submit" name="add-staff" class="function-submit">Thêm Nhân Viên</button>
                        <button type="reset" class="function-reset">Làm Mới</button>
                    </div>
                </form>
            </div>

        </div>