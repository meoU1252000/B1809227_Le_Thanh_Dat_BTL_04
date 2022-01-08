
<?php
include_once './config.php';
ob_start();
if (!isset($_SESSION['admin'])) {
    header('location: ./dangnhap.php');
}else{
    $mshh = $_REQUEST['id_sp'];
    $query = mysqli_query($conn,"SELECT * from hanghoa where mshh = '$mshh'");
    $sql = mysqli_query($conn, "SELECT * from LoaiHangHoa ORDER BY tenloaihang ASC");
    $row = mysqli_fetch_array($query);
    if(isset($_POST['edit-product'])){
        $new_name = mysqli_real_escape_string($conn,$_POST['edit-name']);
        $new_specifications = $_POST['edit-specifications'];
        $new_prices = $_POST['edit-prices'];
        $new_numbers = $_POST['edit-numbers'];
        $new_type = $_POST['edit-listid'];
        if($new_name=="" ){
            echo '<script language="javascript">';
            echo 'alert("Tên Sản Phẩm không được để trống")';
            echo '</script>';
            $conn->rollback();
        } else {
            $edit_sql="UPDATE hanghoa SET tenhh='$new_name',
                                           quycach ='$new_specifications',
                                           gia = '$new_prices',
                                           soluonghang ='$new_numbers',
                                           maloaihang = '$new_type' 
                                        WHERE mshh = '$mshh' ";
            if(mysqli_query($conn,$edit_sql))
            {
                echo '<script language="javascript">';
                echo 'alert("Cập Nhật Sản Phẩm Thành Công")';
                echo '</script>';
                $url = "index.php?page_layout=sanpham";
                if(headers_sent()){
                    die('<script type ="text/javascript">window.location.href="'.$url.'" </script>');
                }else{
                    header ("location: $url");
                    die();
                }
                
            } else {
                echo '<script language="javascript">';
                echo 'alert("Lỗi khi sửa sản phẩm")';
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
            <span class="body-page--function-title">Quản Lý Sản Phẩm</span>
            <div class="body-page--function-form">
                <form action="" method="POST" enctype="multipart/form-data" onsubmit="return check()">
                    <div class="body-page--function-form--title ">
                        <span class="title ">Sửa Thông Tin Sản Phẩm </span>
                        <div class="body-page--function-form--title-seperate"></div>
                    </div>
                    <form action=""  method="POST" enctype="multipart/form-data" onsubmit="return check()">
                       <div class="body-page--function-form--content">
                         <div class="body-page--function-form--content-col1">
                            <ul class="body-page--function-form--content-list">
                            <li class="body-page--function-form--content-col1_title">Mã Danh Mục</li>
                                <li class="body-page--function-form--content-col1_dropdown">
                                <Select name='edit-listid' class="body-page--function-form--content-col1_select" onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
                                    <?php 
                                        while ($row1=mysqli_fetch_array($sql)) {
                                    ?>
                                        <option value="<?php echo $row1['maloaihang'];?>"><?php echo $row1['tenloaihang'];?></option>
                                     <?php } ?>
                                    </Select>
                                </li>
                                <li class="body-page--function-form--content-col1_title">Tên Sản Phẩm</li>
                                <li class="body-page--function-form--content-col1_input"><input type="text"
                                        class="body-page--function-form--content-input" name="edit-name" value="<?php echo $row['tenhh'] ?>"></li>
                                <li class="body-page--function-form--content-col1_title">Quy Cách</li>
                                <li class="body-page--function-form--content-col1_input"><input type="text"
                                        class="body-page--function-form--content-input"  name="edit-specifications" value="<?php echo $row['quycach'] ?>"></li>
                            </ul>
                        </div>
                        <div class="body-page--function-form--content-col2">
                            <ul class="body-page--function-form--content-list">
                                <li class="body-page--function-form--content-col2_title">Giá</li>
                                <li class="body-page--function-form--content-col2_input" ><input type="number"
                                        class="body-page--function-form--content-input"name="edit-prices" placeholder="(VND)" min=0 value="<?php echo $row['gia'] ?>"></li>
                                <li class="body-page--function-form--content-col2_title" >Số Lượng Hàng</li>
                                <li class="body-page--function-form--content-col2_input"><input type="number"
                                        class="body-page--function-form--content-input" name="edit-numbers" min=0 value="<?php echo $row['soluonghang'] ?>"></li>
                                

                            </ul>
                        </div>
                           
                     </div>
                     <div class="button-form">
                         <button type="submit" name="edit-product" class="function-submit">Xác Nhận</button>
                        <button type="reset" class="function-reset">Làm Mới</button>
                      </div>
                   </form>
            </div>

        </div>

