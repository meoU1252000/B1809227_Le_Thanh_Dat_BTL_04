
<?php
include_once './config.php';
ob_start();
if (!isset($_SESSION['admin'])) {
    header('location: ./dangnhap.php');
}else{
    $id_kh = $_REQUEST['id_kh'];
    $query = mysqli_query($conn,"SELECT * from KhachHang where mskh = '$id_kh'");
    $row = mysqli_fetch_array($query);
    if(isset($_POST['confirm'])){
        $new_notice = $_POST['notice'];
            $edit_sql="UPDATE KhachHang SET GhiChu='$new_notice'
                                        WHERE MSKH = '$id_kh' ";
            if(mysqli_query($conn,$edit_sql))
            {
                echo '<script language="javascript">';
                echo 'alert("Cập Nhật Thành Công")';
                echo '</script>';
                $url = "index.php?page_layout=khachhang";
                if(headers_sent()){
                    die('<script type ="text/javascript">window.location.href="'.$url.'" </script>');
                }else{
                    header ("location: $url");
                    die();
                }
                
            } else {
                echo '<script language="javascript">';
                echo 'alert("Lỗi khi cập nhật. Vui lòng thử lại!")';
                echo '</script>';  
                $conn -> rollback();
            }
        
        mysqli_close($conn);
    }

}
ob_end_flush();

?>

      
    <div class="body-page--function">
            <span class="body-page--function-title">Quản Lý Khách Hàng</span>
            <div class="body-page--function-form">
                <form action="" method="POST" enctype="multipart/form-data" onsubmit="return check()">
                    <div class="body-page--function-form--title ">
                        <span class="title">Sửa Ghi Chú Khách Hàng</span>
                        <div class="body-page--function-form--title-seperate"></div>
                    </div>
                    <div class="body-page--function-form--content">
                        <div class="body-page--function-form--content-col1">
                            <ul class="body-page--function-form--content-list">
                                <li class="body-page--function-form--content-col1_title">Ghi Chú</li>
                                <li class="body-page--function-form--content-col1_input"><input type="text"
                                        class="body-page--function-form--content-input" name="notice" value ="<?php echo $row['ghichu']; ?>"></li>
                            </ul>
                        </div>
                    </div>
                    <div class="button-form">
                        <button type="submit" name="confirm" class="function-submit">Xác Nhận</button>
                        <button type="reset" class="function-reset">Làm Mới</button>
                    </div>
                </form>
            </div>

    </div>
