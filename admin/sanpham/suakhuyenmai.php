
<?php
include_once './config.php';
if (!isset($_SESSION['admin'])) {
    header('location: ./dangnhap.php');
}else{
    $mshh = $_REQUEST['id_sp'];
    $sql = mysqli_query($conn, "SELECT * from HangHoa where mshh = '$mshh'");
    $row = mysqli_fetch_array($sql);
    if(isset($_POST['add-event'])){
        $saleoff = $_POST['event-saleoff'];
        if($saleoff >0){
            $saleoff/=100;
        }
        $event_detail = $_POST['event-detail'];
            if(mysqli_query($conn,"UPDATE HangHoa  SET giamgia = '$saleoff',
                                                        ghichu = '$event_detail'
                                                         Where mshh = '$mshh'"))
            {
                echo '<script language="javascript">';
                echo 'alert("Cập Nhật Sản Phẩm Khuyến Mãi Thành Công !")';
                echo '</script>';
                $url = "index.php?page_layout=khuyenmai";
                if(headers_sent()){
                    die('<script type ="text/javascript">window.location.href="'.$url.'" </script>');
                }else{
                    header ("location: $url");
                    die();
                } 
            } else {
                echo '<script language="javascript">';
                echo 'alert("Lỗi khi cập nhật khuyến mãi. Vui lòng thử lại! ")';
                echo '</script>';
            }
    
       mysqli_close($conn);
    }

}

?>

    <div class="body-page--function">
            <span class="body-page--function-title">Quản Lý Khuyến Mãi</span>
            <div class="body-page--function-form">
                <form action="" method="POST" enctype="multipart/form-data" onsubmit="return check()">
                    <div class="body-page--function-form--title ">
                        <span class="title">Chọn Sản Phẩm Khuyến Mãi</span>
                        <div class="body-page--function-form--title-seperate"></div>
                    </div>
                    <div class="body-page--function-form--content">
                        <div class="body-page--function-form--content-col1">
                            <ul class="body-page--function-form--content-list">
                            <li class="body-page--function-form--content-col1_title">Sản Phẩm</li>
                                <li class="body-page--function-form--content-col1_dropdown">
                                    <Select name='product-id' class="body-page--function-form--content-col1_select" onfocus='this.size=1;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
                                        <option  value="<?php echo $row['mshh'];?>"><?php echo $row['tenhh'];?> (<?php echo $row['quycach'];?>)</option>
                                    </Select>
                                </li>
                                        <li class="body-page--function-form--content-col2_title">Ghi Chú</li>
                                        <textarea name="event-detail" rows="5" cols="50" wrap="hard" style="font-size:18px"><?php echo $row['ghichu']; ?></textarea>
                                </li>
                            </ul>
                            
                        </div>

                        <div class="body-page--function-form--content-col2">
                            <ul class="body-page--function-form--content-list">
                            <li class="body-page--function-form--content-col2_title">Giảm Giá</li>
                                    <li class="body-page--function-form--content-col2_input" ><input type="number"
                                        class="body-page--function-form--content-input"name="event-saleoff" placeholder="(%)" min=0 max=100 step=0.5 value ="<?php echo $row['giamgia']*100; ?>"></li>

                            </ul>
                        </div>
                    </div>
                    <div class="button-form">
                     <button type="submit" name="add-event" class="function-submit">Xác Nhận</button>
                     <button type="reset" class="function-reset">Làm Mới</button>
                    </div>
                </form>
            </div>

    </div>