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
        $product_name = mysqli_real_escape_string($conn,$_POST['product-name']);
        $product_specifications=$_POST['product-specifications'];
        $product_prices=$_POST['product-prices'];
        $product_numbers=$_POST['product-numbers'];
        $product_listid=$_POST['product-listid'];
        $product_saleoff = $_POST['product-saleoff'];
        $product_note = $_POST['product-note'];
        $product_sold = 0;
        if($product_saleoff >0){
            $product_saleoff/=100;
        }
        $sql_TenSanPham = "SELECT * from hanghoa where tenhh='$product_name' and quycach='$product_specifications'";
        $kt_TenSanPham = mysqli_query($conn, $sql_TenSanPham);
        if(mysqli_num_rows($kt_TenSanPham) > 0){
            echo '<script language="javascript">';
            echo 'alert("Sản Phẩm đã tồn tại!")';
            echo '</script>';
            $conn->rollback();
            $url = "index.php?page_layout=themsanpham";
            if(headers_sent()){
                die('<script type ="text/javascript">window.location.href="'.$url.'" </script>');
            }else{
                 header ("location: $url");
                 die();
            }
        }else{  
                if(mysqli_query($conn,"INSERT into HangHoa(tenhh,quycach,gia,soluonghang,soluongdaban,maloaihang,giamgia,ghichu) values ('$product_name','$product_specifications','$product_prices','$product_numbers','$product_sold','$product_listid','$product_saleoff','$product_note')"))
                {
                    echo '<script language="javascript">';
                    echo 'alert("Thêm Thành Công Sản Phẩm")';
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
                    echo 'alert("Lỗi khi thêm sản phẩm")';
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
                        <span class="title ">Thêm Thông Tin Sản Phẩm </span>
                        <div class="body-page--function-form--title-seperate"></div>
                    </div>
                    
                       <div class="body-page--function-form--content">
                         <div class="body-page--function-form--content-col1">
                            <ul class="body-page--function-form--content-list">
                                <li class="body-page--function-form--content-col1_title">Mã Danh Mục</li>
                                <li class="body-page--function-form--content-col1_dropdown">
                                    <Select name='product-listid' class="body-page--function-form--content-col1_select" onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
                                    <?php 
                                        $result = mysqli_query($conn, "SELECT * from LoaiHangHoa ORDER BY tenloaihang ASC");
                                        while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                        <option  value="<?php echo $row['maloaihang'];?>"><?php echo $row['tenloaihang'];?></option>
                                     <?php } ?>
                                    </Select>
                                </li>
                                <li class="body-page--function-form--content-col1_title">Tên Sản Phẩm</li>
                                <li class="body-page--function-form--content-col1_input"><input type="text"
                                        class="body-page--function-form--content-input" name="product-name"></li>
                                <li class="body-page--function-form--content-col1_title">Quy Cách</li>
                                <li class="body-page--function-form--content-col1_input">
                                    <input type="text"
                                        class="body-page--function-form--content-input" name="product-specifications"></li>
                                </li>
                                <li class="body-page--function-form--content-col1_title">Ghi Chú</li>
                                <li class="body-page--function-form--content-col1_input"><input type="text"
                                        class="body-page--function-form--content-input"  name="product-note"></li>
                              
                               
                            </ul>
                        </div>
                        <div class="body-page--function-form--content-col2">
                            <ul class="body-page--function-form--content-list">
                                <li class="body-page--function-form--content-col2_title" style="margin-top:110px;">Số Lượng Hàng</li>
                                <li class="body-page--function-form--content-col2_input"><input type="number"
                                        class="body-page--function-form--content-input" name="product-numbers" min=0 ></li>
                                <li class="body-page--function-form--content-col2_title">Giá</li>
                                <li class="body-page--function-form--content-col2_input" ><input type="number"
                                        class="body-page--function-form--content-input" name="product-prices" placeholder="(VND)" min=0></li>
                                <li class="body-page--function-form--content-col2_title">Giảm Giá</li>
                                <li class="body-page--function-form--content-col2_input" ><input type="number"
                                        class="body-page--function-form--content-input"name="product-saleoff" placeholder="(%)" min=0 max=100 step=0.5></li>
                            </ul>
                        </div>
            
                     </div>
                     <div class="button-form">
                         <button type="submit" name="add-product" class="function-submit">Xác Nhận</button>
                        <button type="reset" class="function-reset">Làm Mới</button>
                      </div>
                   </form>
            </div>

        </div>

       