
<?php
include_once './config.php';
ob_start();
if (!isset($_SESSION['admin'])) {
    header('location: ./dangnhap.php');
}else{
    $id_dm = $_REQUEST['id_dm'];
    $query = mysqli_query($conn,"SELECT * from loaihanghoa where maloaihang = '$id_dm'");
    $row = mysqli_fetch_array($query);
    if(isset($_POST['confirm-list'])){
        $new_name = mysqli_real_escape_string($conn,$_POST['list-name']);
        if($new_name=="" ){
            echo '<script language="javascript">';
            echo 'alert("Tên Danh Muc5 Không Được Để Trống")';
            echo '</script>';
            $conn->rollback();
        } else {
            $edit_sql="UPDATE loaihanghoa SET tenloaihang='$new_name'
                                        WHERE maloaihang = '$id_dm' ";
            if(mysqli_query($conn,$edit_sql))
            {
                echo '<script language="javascript">';
                echo 'alert("Cập Nhật Danh Mục Thành Công")';
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
                echo 'alert("Lỗi khi sửa danh mục. Vui lòng thử lại!")';
                echo '</script>';  
                $conn -> rollback();
            }
        }
        mysqli_close($conn);
    }

}
ob_end_flush();

?>

      
    <div class="body-page--function">
            <span class="body-page--function-title">Quản Lý Danh Mục</span>
            <div class="body-page--function-form">
                <form action="" method="POST" enctype="multipart/form-data" onsubmit="return check()">
                    <div class="body-page--function-form--title ">
                        <span class="title">Sửa Thông Tin Danh Mục</span>
                        <div class="body-page--function-form--title-seperate"></div>
                    </div>
                    <div class="body-page--function-form--content">
                        <div class="body-page--function-form--content-col1">
                            <ul class="body-page--function-form--content-list">
                                <li class="body-page--function-form--content-col1_title">Tên Danh Mục</li>
                                <li class="body-page--function-form--content-col1_input"><input type="text"
                                        class="body-page--function-form--content-input" name="list-name" value ="<?php echo $row['tenloaihang']; ?>"></li>
                            </ul>
                        </div>
                    </div>
                    <div class="button-form">
                        <button type="submit" name="confirm-list" class="function-submit">Xác Nhận</button>
                        <button type="reset" class="function-reset">Làm Mới</button>
                    </div>
                </form>
            </div>

    </div>
