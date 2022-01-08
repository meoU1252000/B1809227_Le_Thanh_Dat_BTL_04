
<?php
if (!isset($_SESSION['username'])) {
    header('location: ./index.php');
}else{
    if(isset($_GET['page'])){
        $page=$_GET['page'];
    } else{
        $page=1;
    }
    $id_dh = $_REQUEST['id_dh'];
    $result = mysqli_query($conn, "SELECT * from chitietdathang where sodondh = '$id_dh'");
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
        <div class="app_container">
        <div class="grid">
            <div class="grid_row app_content">
                <div class="home-userordersstatus">
                    <div class="home-userdetailordersstatus-content">
                            <ul class="home-userdetailordersstatus-content-heading home-userdetailordersstatus-content--separate">
                                <li class="home-userdetailordersstatus-content-heading-label home-userdetailordersstatus-content-heading-label_id" >Sản Phẩm</li>
                                <li class="home-userdetailordersstatus-content-heading-label home-userdetailordersstatus-content-heading-label_price">Giá</li>
                                <li class="home-userdetailordersstatus-content-heading-label home-userdetailordersstatus-content-heading-label_quantity">Số Lượng</li>
                                <li class="home-userdetailordersstatus-content-heading-label home-userdetailordersstatus-content-heading-label_sum">Tạm Tính</li>
                           </ul>
                            <div class="home-userdetailordersstatus-content--item">
                               
                                    <?php 
                                       $totalPriceAll = 0;
                                       $totalPrice=0;
                                       while ($row = mysqli_fetch_array($result)) {
                                           $id_hh = $row['mshh'];
                                           $query = mysqli_query($conn,"SELECT * from HangHoa where mshh = '$id_hh'"); 
                                           $rowhh = mysqli_fetch_array($query);
                                           $shipping = 30000;
                                           $queryhinhanh = mysqli_query($conn,"SELECT * from hinhhanghoa where mshh = '$id_hh' order by mahinh ASC limit 1");
                                           $rowhinhanh = mysqli_fetch_array($queryhinhanh);
                                    ?>
                                <ul class="home-userdetailordersstatus-content-body">
                                    <li class="home-userordersstatus-content-item home-userdetailordersstatus-content-item_img">
                                        <img src="./<?php echo $rowhinhanh['tenhinh']; ?>" alt="">
                                    </li>
                                    <li class="home-userordersstatus-content-item home-userdetailordersstatus-content-item_name">
                                        <span class="cart-item_name"><?php echo $rowhh['tenhh']; ?></span> 
                                        <span class="cart-item_specifications"><?php echo $rowhh['quycach']; ?></span> 
                                    </li>
                                    <li class="home-userdetailordersstatus-content-item home-userdetailordersstatus-content-item_price" style="font-weight:bold;"> <?php echo number_format($rowhh['gia']); ?></li>
                                    <li class="home-userdetailordersstatus-content-item home-userdetailordersstatus-content-item_quantity"><?php echo  $row['soluong'];  ?></li>
                                    <li class="home-userdetailordersstatus-content-item home-userdetailordersstatus-content-item_sum" style="font-weight:bold;"><?php echo number_format($row['giadathang']); ?></li>
                                </ul>
                                <?php $totalPrice += $row['giadathang']; }   ?>
                            </div>
                            <ul class="home-userdetailordersstatus-content-bottom home-userdetailordersstatus-content-bottom--separate">
                                <li class="home-userdetailordersstatus-content-heading-label home-userdetailordersstatus-content-heading-label_shipping">Phí Ship</li>
                                <li class="home-userdetailordersstatus-content-heading-label home-userdetailordersstatus-content-heading-label_sum"><?php echo number_format($shipping); ?></li>
                           </ul>
                           <ul class="home-userdetailordersstatus-content-bottom ">
                                <li class="home-userdetailordersstatus-content-heading-label home-userdetailordersstatus-content-heading-label_sumall">Tổng</li>
                                <li class="home-userdetailordersstatus-content-heading-label home-userdetailordersstatus-content-heading-label_sum"><?php $totalPriceAll = $totalPrice + $shipping; echo number_format($totalPriceAll); ?></li>
                           </ul>
                            <a href="index.php?page_layout=donhang" class ="cart_button">Trở lại trang trước</a>
                    </div>
                    
                    
                </div>
            </div>


        </div>
    </div>

<?php  mysqli_close($conn);?>