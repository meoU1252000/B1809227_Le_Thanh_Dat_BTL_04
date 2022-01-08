<script>
function validateForm() {
  let x = document.forms["myForm"]["product-name"].value;
  if (x == "") {
    alert("Tên Sản Phẩm không được để trống !");
    return false;
  }
}
</script>

<?php
include_once './config.php';
ob_start();
if (!isset($_SESSION['admin'])) {
    header('location: ./dangnhap.php');
}else{
    if(isset($_POST['add-product'])){
        $product_listid=$_POST['product-listid'];
        $product_origin = $_POST['product-origin'];
        $product_release = $_POST['product-release'];
        $product_detail = mysqli_real_escape_string($conn,$_POST['product-detail']);
        $product_incense = $_POST['product-incense_group'];
        $product_style = $_POST['product-style'];
        $sql_TenSanPham = "SELECT * from chitiethanghoa where mshh='$product_listid'";
        $kt_TenSanPham = mysqli_query($conn, $sql_TenSanPham);
        if(mysqli_num_rows($kt_TenSanPham) > 0){
            echo '<script language="javascript">';
            echo 'alert("Chi Tiết Sản Phẩm đã tồn tại!")';
            echo '</script>';
            $conn->rollback();
            $url = "index.php?page_layout=themchitietsp";
            if(headers_sent()){
                die('<script type ="text/javascript">window.location.href="'.$url.'" </script>');
            }else{
                 header ("location: $url");
                 die();
            }
        }else{  
                if(mysqli_query($conn,"INSERT into ChiTietHangHoa(mshh,xuatxu,namphathanh,nhomhuong,phongcach,chitietsp) values ('$product_listid','$product_origin','$product_release','$product_incense','$product_style','$product_detail')"))
                {
                    echo '<script language="javascript">';
                    echo 'alert("Thêm Thành Công Chi Tiết Sản Phẩm")';
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
                    echo 'alert("Lỗi khi thêm chi tiết sản phẩm")';
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
                <form action="" id="myForm" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                    <div class="body-page--function-form--title ">
                        <span class="title ">Thêm Chi Tiết Sản Phẩm </span>
                        <div class="body-page--function-form--title-seperate"></div>
                    </div>
                       <div class="body-page--function-form--content">
                         <div class="body-page--function-form--content-col1">
                            <ul class="body-page--function-form--content-list">
                                <li class="body-page--function-form--content-col1_title">Mã Sản Phẩm</li>
                                <li class="body-page--function-form--content-col1_dropdown">
                                    <Select name='product-listid' class="body-page--function-form--content-col1_select" onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
                                    <?php 
                                        $result = mysqli_query($conn, "SELECT * from HangHoa ORDER BY mshh ASC");
                                        while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                        <option  value="<?php echo $row['mshh'];?>"><?php echo $row['tenhh'];?> (<?php echo $row['quycach']; ?>)</option>
                                     <?php } ?>
                                    </Select>
                                </li>
                                <li class="body-page--function-form--content-col1_title">Xuất Xứ</li>
                                <li class="body-page--function-form--content-col1_input"><input type="text"
                                        class="body-page--function-form--content-input"  name="product-origin"></li>
                                <li class="body-page--function-form--content-col1_title">Năm Phát Hành</li>
                                <li class="body-page--function-form--content-col1_input"><input type="number"
                                        class="body-page--function-form--content-input"  name="product-release" min="1900" max="2099" step="1" placeholder="(Year)" ></li>
                               <li class="body-page--function-form--content-col1_title">Chi Tiết Sản Phẩm</li>
                             
                            </ul>
                        </div>
                        <div class="body-page--function-form--content-col2">
                            <ul class="body-page--function-form--content-list">
                                <li class="body-page--function-form--content-col2_title" style="margin-top:110px;">Nhóm Hương</li>
                                <li class="body-page--function-form--content-col2_input"><input type="text"
                                        class="body-page--function-form--content-input"  name="product-incense_group" ></li>
                                <li class="body-page--function-form--content-col2_title">Phong Cách</li>
                                <li class="body-page--function-form--content-col2_input"><input type="text"
                                        class="body-page--function-form--content-input"  name="product-style" ></li>
                            </ul>
                        </div>
            
                     </div>
                     <textarea name="product-detail" rows="15" cols="100" wrap="hard" style="font-size:18px; position:relative;  margin-left: 40px; "></textarea>
                     <div class="button-form">
                         <button type="submit" name="add-product" class="function-submit">Xác Nhận</button>
                        <button type="reset" class="function-reset">Làm Mới</button>
                      </div>
                   </form>
            </div>

        </div>

       