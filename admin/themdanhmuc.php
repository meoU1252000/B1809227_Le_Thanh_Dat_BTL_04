<script>
function validateForm() {
  let x = document.forms["myForm"]["list-name"].value;
  if (x == "") {
    alert("Tên Danh Mục không được để trống !");
    return false;
  }
}
</script>

<?php
include_once './config.php';
if (!isset($_SESSION['admin'])) {
    header('location: ./dangnhap.php');
}else{
    if(isset($_POST['add-list'])){
        $list_name = mysqli_real_escape_string($conn,$_POST['list-name']);
        $sql_TenLoaiHang = "SELECT * from loaihanghoa where TenLoaiHang='$list_name'";
        $kt_TenLoaiHang = mysqli_query($conn, $sql_TenLoaiHang);
        if (mysqli_num_rows($kt_TenLoaiHang)  > 0) {
            echo '<script language="javascript">';
            echo 'alert("Tên Danh Mục đã tồn tại")';
            echo '</script>';
            $conn -> rollback();
            $url = "index.php?page_layout=danhmuc";
            if(headers_sent()){
                die('<script type ="text/javascript">window.location.href="'.$url.'" </script>');
            }else{
                header ("location: $url");
                die();
            }
        }  else{
            if(mysqli_query($conn,"INSERT into LoaiHangHoa(TenLoaiHang) values ('$list_name')"))
            {
                echo '<script language="javascript">';
                echo 'alert("Thêm Thành Công Danh Mục")';
                echo '</script>';
                $url = "index.php?page_layout=danhmuc";
                if(headers_sent()){
                    die('<script type ="text/javascript">window.location.href="'.$url.'" </script>');
                }else{
                    header ("location: $url");
                    die();
                } 
            } else {
                echo '<script language="javascript">';
                echo 'alert("Lỗi khi thêm danh mục. Vui lòng thử lại! ")';
                echo '</script>';
            }
        }
       
       mysqli_close($conn);
    }

}

?>

    <div class="body-page--function">
            <span class="body-page--function-title">Quản Lý Danh Mục</span>
            <div class="body-page--function-form">
                <form action="" id="myForm" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                    <div class="body-page--function-form--title ">
                        <span class="title">Thêm Danh Mục Mới</span>
                        <div class="body-page--function-form--title-seperate"></div>
                    </div>
                    <div class="body-page--function-form--content">
                        <div class="body-page--function-form--content-col1">
                            <ul class="body-page--function-form--content-list">
                                <li class="body-page--function-form--content-col1_title">Tên Danh Mục</li>
                                <li class="body-page--function-form--content-col1_input"><input type="text"
                                        class="body-page--function-form--content-input" name="list-name"></li>
                            </ul>
                        </div>
                    </div>
                    <div class="button-form">
                     <button type="submit" name="add-list" class="function-submit">Thêm Danh Mục</button>
                     <button type="reset" class="function-reset">Làm Mới</button>
                    </div>
                </form>
            </div>

    </div>