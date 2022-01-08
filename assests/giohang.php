<?php 
if (isset($_SESSION['giohang'])){
    if(isset($_POST['sl'])){
        foreach($_POST['sl'] as $id_sp => $sl){
            $arrID[]=$id_sp;
            $sql = "SELECT * from HangHoa where mshh='$id_sp'";
            $query= mysqli_query($conn,$sql);
            $row = mysqli_fetch_array($query);
            if($sl==0){
                unset($_SESSION['giohang'][$id_sp]);
            }
            elseif($sl){
                if($sl <= $row['soluonghang']){
                    $_SESSION['giohang'][$id_sp]=$sl;
                } else {
                    $_SESSION['giohang'][$id_sp]=$row['soluonghang'];
                }
            }
        }
    }
    $arrID = array();
    foreach($_SESSION['giohang'] as $id_sp => $so_luong){
        $arrID[]=$id_sp;
    }
    $strID = implode(',', $arrID);
    $sql = "SELECT * FROM HangHoa where mshh IN ($strID) ORDER BY mshh DESC";
    $query = mysqli_query($conn,$sql);
    $username = $_SESSION['username'];
    $user = "SELECT * from KhachHang where tendangnhap = '$username'";
    $queryuser=mysqli_query($conn,$user);
    $rowinfo = mysqli_fetch_array($queryuser);
    $id_kh = $_SESSION['id'];
    if(isset($_POST['address'])){
        $_SESSION['diachi'] = $_POST['address'];
    }
}

?>
<script>
       carousel();
       function carousel() {
         var i;
         var x = document.getElementsByClassName("header_banner");
         for (i = 0; i < x.length; i++) {
           x[i].style.display = "none";  
         }
    
    }
</script>
        <div class="grid">
            <div class="grid_row app_content">
                <div class="home-product_cart">
                    <div class="home-prodcut_cart-content">
                        <div class="home_product_cart-content-left">
                            <ul class="home_product_cart-content-heading home_product_cart-content-heading--separate">
                                <li class="home_product_cart-content-label home_product_cart-content-label_name" >Sản Phẩm</li>
                                <li class="home_product_cart-content-label home_product_cart-content-label_price">Giá</li>
                                <li class="home_product_cart-content-label home_product_cart-content-label_number">Số Lượng</li>
                                <li class="home_product_cart-content-label home_product_cart-content-label_sum">Tạm Tính</li>
                            </ul>
                       
                            <form  id="giohang"  method="POST" enctype="multipart/form-data" >
                            <div class="home_product_cart-content--item">
                            <?php if(count($_SESSION['giohang'])==0 || !isset($_SESSION['giohang'])) { ?>
                               <ul class="home_product_cart-content-body">
                                   <li class="home_product_cart-content-item home_product_cart-content-nocart">
                                       Chưa có sản phẩm trong giỏ hàng!
                                   </li>
                                </ul> <?php } else{ ?>
                                <?php
                                  $totalPriceAll = 0; 
                                  while($row = mysqli_fetch_array($query)){ 
                                     $totalPrice = ($row ['gia'] - ($row['gia'] * $row['giamgia'])) * $_SESSION['giohang'][$row['mshh']];
                                     $id_hh = $row['mshh'];
                                     $queryhinhanh = mysqli_query($conn,"SELECT * from hinhhanghoa where mshh = '$id_hh' order by mahinh ASC limit 1");
                                     $rowhinhanh = mysqli_fetch_array($queryhinhanh);

                                ?>
                                <ul class="home_product_cart-content-body">
                                   <li class="home_product_cart-content-item home_product_cart-content-delete" >
                                    <a href="xoahang.php?MSHH=<?php echo $row['mshh']?>" ><i class="fas fa-times-circle cart_icon--delete"></i></a></li>
                                    <li class="home_product_cart-content-item home_product_cart-content-item_img" ><img src="./<?php echo $rowhinhanh['tenhinh'];?>" alt="" class="cart_item--img"></li>
                                    <li class="home_product_cart-content-item home_product_cart-content-item_name">
                                        <span class="cart-item_name"><?php echo $row['tenhh']; ?></span> 
                                        <span class="cart-item_specifications"><?php echo $row['quycach']; ?></span> 
                                    </li>
                                    <li class="home_product_cart-content-item home_product_cart-content-item_price"><?php $format_number = number_format($row ['gia'] - ($row['gia'] * $row['giamgia'])); echo $format_number; ?></li>
                                    <li class="home_product_cart-content-item home_product_cart-content-item_number"><input type="number" name="sl[<?php echo $row['mshh']; ?>]" value="<?php echo $_SESSION['giohang'][$row['mshh']] ;?>" min="0" max="100" step="1" class="cart-item_quantity"></li>
                                    <li class="home_product_cart-content-item home_product_cart-content-item_sum"><?php  $format_number = number_format($totalPrice); echo $format_number ?></li>
                                    
                                </ul>
                                <?php $totalPriceAll+=$totalPrice; }  
                                ?>
                                
                                <?php } ?>
                            </div>
                            <a href="index.php" class ="cart_button">Tiếp Tục Xem Sản Phẩm</a>
                            <a onclick="document.getElementById('giohang').submit();"  class=" btn btn--primary">Cập Nhật Giỏ Hàng</a>
                        </form>
                        </div>
                        <div class="home_product_cart-content-right">
                            <ul class="home_product_cart-content-heading home_product_cart-content-heading--separate">
                                <li class="home_product_cart-content-label home_product_cart-content-label_name">Cộng Giỏ Hàng</li>
                            </ul>
                            <div class="home_product_cart-content--item">
                                <form  id="diachi"  method="POST" enctype="multipart/form-data" >
                                <ul class="home_product_cart-content-body_user">
                                    <li class="home_product_cart-content-item home_product_cart-content_address">
                                        Địa Chỉ:  
                                        <a href="index.php?page_layout=diachi">Cập Nhật</a>
                                        <p>
                                       <?php
                                       $querydc = mysqli_query($conn,"SELECT * from diachikh where mskh = $id_kh");
                                       while( $rowdc = mysqli_fetch_array($querydc)){
                                       ?>
                                       <label class="cart_radio"><?php echo $rowdc['diachi'];?>
                                            <input type="radio" onclick="document.getElementById('diachi').submit();" name="address" value="<?php echo $rowdc['madc'];?>" <?php 
                                            if(isset($_SESSION['diachi'])){ 
                                                if($_SESSION['diachi'] == $rowdc['madc']){echo 'checked';}} else {
                                                   $_SESSION['diachi'] = $rowdc['madc'];
                                                   echo 'checked';
                                                } 
                                            ?> >
                                        <span class="checkmark"></span>
                                       </label>
                                       <?php } 
                                       ?>
                                   
                                   </p>
                                    </li>
                                </ul>
                                </form>
                                <ul class="home_product_cart-content-body_user">
                                    <li class="home_product_cart-content-item home_product_cart-content_shiping">
                                       <span>Phí Ship: </span>
                                       <span name="ship" style="font-weight: bold;"><?php $shiping = 30000 ; echo  number_format($shiping)?></span>
                                    </li>
                                </ul>
                                <ul class="home_product_cart-content-body_user">
                                    <li class="home_product_cart-content-item home_product_cart-content_sum">
                                       <span>Tổng:</span>
                                       <span style="font-weight: bold;"><?php if(count($_SESSION['giohang'])==0 || !isset($_SESSION['giohang'])) {echo number_format($shiping); }else { echo number_format($totalPriceAll + $shiping);}  ?></span>
                                    </li>
                                </ul>
                                <a href="index.php?page_layout=thanhtoan" class="button_pay btn btn--primary">Thanh Toán</a>  
                            </div>
                        </div> 
                  
                    </div>

                </div>
            </div>


        </div>
    



