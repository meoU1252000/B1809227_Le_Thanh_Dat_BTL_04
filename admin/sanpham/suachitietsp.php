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
    $id_hh = $_GET['id_sp'];
    $query=mysqli_query($conn,"SELECT * from ChiTietHangHoa where mshh = '$id_hh' ");
    $row = mysqli_fetch_array($query);
    if(isset($_POST['add-product'])){
        $product_origin = $_POST['product-origin'];
        $product_release = $_POST['product-release'];
        $product_detail = mysqli_real_escape_string($conn,$_POST['product-detail']);
        $product_incense = $_POST['product-incense_group'];
        $product_style = $_POST['product-style'];
        if(mysqli_query($conn,"UPDATE chitiethanghoa SET xuatxu = '$product_origin',
                                                         namphathanh = '$product_release',
                                                         nhomhuong = '$product_incense',
                                                         phongcach = '$product_style',
                                                         chitietsp = '$product_detail'
                                                         where mshh = '$id_hh'"))
                {
                    echo '<script language="javascript">';
                    echo 'alert("Sửa Thành Công Chi Tiết Sản Phẩm")';
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
                    echo 'alert("Lỗi khi sửa chi tiết sản phẩm")';
                    echo '</script>'; 
                    $url = "index.php?page_layout=sanpham";
                    if(headers_sent()){
                        die('<script type ="text/javascript">window.location.href="'.$url.'" </script>');
                    }else{
                         header ("location: $url");
                         die();
                    } 
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
                        <span class="title ">Sửa Chi Tiết Sản Phẩm </span>
                        <div class="body-page--function-form--title-seperate"></div>
                    </div>
                       <div class="body-page--function-form--content">
                         <div class="body-page--function-form--content-col1">
                            <ul class="body-page--function-form--content-list">
                                <li class="body-page--function-form--content-col1_title">Mã Sản Phẩm</li>
                                <li class="body-page--function-form--content-col1_dropdown">
                                    <Select name='product-listid' class="body-page--function-form--content-col1_select" onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
                                    <?php 
                                        $result = mysqli_query($conn, "SELECT * from HangHoa where mshh = '$id_hh'");
                                        while ($rowhh = mysqli_fetch_array($result)) {
                                    ?>
                                        <option  value="<?php echo $rowhh['mshh'];?>"><?php echo $rowhh['tenhh'];?> (<?php echo $rowhh['quycach']; ?>)</option>
                                     <?php } ?>
                                    </Select>
                                </li>
                                <li class="body-page--function-form--content-col1_title">Xuất Xứ</li>
                                <li class="body-page--function-form--content-col1_input"><input type="text"
                                        class="body-page--function-form--content-input"  name="product-origin" value ='<?php echo $row['xuatxu']; ?>'></li>
                                <li class="body-page--function-form--content-col1_title">Năm Phát Hành</li>
                                <li class="body-page--function-form--content-col1_input"><input type="number"
                                        class="body-page--function-form--content-input"  name="product-release" min="1900" max="2099" step="1" placeholder="(Year)" value ='<?php echo $row['namphathanh']; ?>' ></li>
                               <li class="body-page--function-form--content-col1_title">Chi Tiết Sản Phẩm</li>
                            </ul>
                        </div>
                        <div class="body-page--function-form--content-col2">
                            <ul class="body-page--function-form--content-list">
                                <li class="body-page--function-form--content-col2_title" style="margin-top:110px;">Nhóm Hương</li>
                                <li class="body-page--function-form--content-col2_input"><input type="text"
                                        class="body-page--function-form--content-input"  name="product-incense_group" value ='<?php echo $row['nhomhuong']; ?>' ></li>
                                <li class="body-page--function-form--content-col2_title">Phong Cách</li>
                                <li class="body-page--function-form--content-col2_input"><input type="text"
                                        class="body-page--function-form--content-input"  name="product-style" value ='<?php echo $row['phongcach']; ?>'></li>
                            </ul>
                        </div>
            
                     </div>
                     <textarea name="product-detail" rows="15" cols="110" wrap="hard" style="font-size:18px; position:relative;  margin-left: 40px; "><?php echo $row['chitietsp']; ?></textarea>
                     <div class="button-form">
                         <button type="submit" name="add-product" class="function-submit">Xác Nhận</button>
                        <button type="reset" class="function-reset">Làm Mới</button>
                      </div>
                   </form>
            </div>

        </div>

       