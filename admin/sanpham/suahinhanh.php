<script>
function validateForm() {
  let x = document.forms["myForm"]["product-name"].value;
  if (x == "") {
    alert("Tên Hình Ảnh không được để trống !");
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
    $mahinh = $_REQUEST['id_hinhanh'];
    $sqlhinhanh = mysqli_query($conn, "SELECT * from hinhhanghoa where mahinh = '$mahinh'");
    $rowhinhanh = mysqli_fetch_array($sqlhinhanh);
    if(isset($_POST['add-product'])){
        $product_id=$_POST['product-id'];
        $product_img = '../img/Perfume/';
        $product_img = $product_img.$_FILES['product-img'] ['name'];
        move_uploaded_file($_FILES['product-img']['tmp_name'],$product_img);
        if(mysqli_query($conn,"UPDATE hinhhanghoa SET  tenhinh='$product_img'
                                                        where mahinh = '$mahinh'"))
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
                echo 'alert("Lỗi khi sửa sản phẩm")';
                echo '</script>';  
                $conn -> rollback();
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
                        <span class="title ">Sửa Hình Ảnh Sản Phẩm </span>
                        <div class="body-page--function-form--title-seperate"></div>
                    </div>
                    
                    <div class="body-page--function-form--content">
                         <div class="body-page--function-form--content-col1">
                                <ul class="body-page--function-form--content-list">
                                      <li class="body-page--function-form--content-col1_title">Mã Sản Phẩm</li>
                                      <li class="body-page--function-form--content-col1_dropdown">
                                          <Select name='product-id' class="body-page--function-form--content-col1_select" onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
                                          <?php 
                                              $mshh = $rowhinhanh['mshh'];
                                              $result = mysqli_query($conn, "SELECT * from HangHoa where mshh ='$mshh' ");
                                              while ($row = mysqli_fetch_array($result)) {
                                          ?>
                                              <option  value="<?php echo $row['mshh'];?>"><?php echo $row['tenhh'];?> ( <?php echo $row['quycach'];?>)</option>
                                           <?php } ?>
                                          </Select>
                                      </li>
                                      <li class="body-page--function-form--content-col1_title">Hình Ảnh Sản Phẩm</li>
                                      <li class="body-page--function-form--content-col1_input">
                                          <input type="file" name="product-img"></li>
                                      </li>
                                     
                                    
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

       