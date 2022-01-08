<script>
    function xoaDonHang(){
        var conf= confirm ("Bạn có chắc chắn muốn xóa Đơn Hàng này không ?");
        return conf;
    }
</script>


<?php
if (!isset($_SESSION['username'])) {
    header('location: ./index.php');
}else{
    if(isset($_GET['page'])){
        $page=$_GET['page'];
    } else{
        $page=1;
    }
    $id_kh = $_SESSION['id'];
    $result = mysqli_query($conn, "SELECT * from dathang where mskh = '$id_kh' ORDER BY sodondh ASC ");
    mysqli_close($conn);
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
                <div class="home-userordersstatus">
                    <div class="home-userordersstatus-content">
                            <ul class="home-userordersstatus-content-heading home-userordersstatus-content--separate">
                                <li class="home-userordersstatus-content-heading-label home-userordersstatus-content-heading-label_id">Mã Đơn</li>
                                <li class="home-userordersstatus-content-heading-label home-userordersstatus-content-heading-label_orderdate">Ngày Đặt Hàng</li>
                                <li class="home-userordersstatus-content-heading-label home-userordersstatus-content-heading-label_deliverydate">Ngày Giao Hàng Dự Kiến</li>
                                <li class="home-userordersstatus-content-heading-label home-userordersstatus-content-heading-label_deliverydate">Ngày Giao Hàng Thực Sự</li>
                                <li class="home-userordersstatus-content-heading-label home-userordersstatus-content-heading-label_orderstatus">Tình Trạng Đơn Hàng</li>
                                <li class="home-userordersstatus-content-heading-label home-userordersstatus-content-heading-label_orderstatus">Xem Chi Tiết Đơn Hàng</li>
                           </ul>
                            <div class="home-userordersstatus-content--item">
                             <?php if((mysqli_num_rows($result)) == 0 ) { ?>
                               <ul class="home-userordersstatus-content-body">
                                   <li class="home-userordersstatus-content-item home-userordersstatus-content-nocart">
                                       Chưa có đơn hàng nào!
                                   </li>
                                </ul> <?php } else{ ?>
                                    <?php 
                                       while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                <ul class="home-userordersstatus-content-body">
                                    <?php if($row['trangthaidh'] =="Chưa Xử Lý"){  ?>
                                    <li class="home-userordersstatus-content-item home-userordersstatus-content-item-delete" >
                                    <a href="xoadonhang.php?id_dh=<?php echo $row['sodondh'];?>" onclick="return xoaDonHang();" ><i class="fas fa-times-circle order_icon--delete"></i></a></li><?php }?>
                                    <li class="home-userordersstatus-content-item home-userordersstatus-content-item_id">
                                        <?php echo $row['sodondh']; ?>
                                    </li>
                                    <li class="home-userordersstatus-content-item home-userordersstatus-content-item_orderdate"> <?php echo $row['ngaydh']; ?></li>
                                    <li class="home-userordersstatus-content-item home-userordersstatus-content-item_deliverydate"><?php  $date = $row['ngaydh']; echo date('Y-m-d', strtotime($date. ' + 5 days')); ?></li>
                                    <?php $ngaygh = $row['ngaygh']; 
                                          if($ngaygh == '0000-00-00'){ ?>
                                        <li class="home-userordersstatus-content-item home-userordersstatus-content-item_deliverydate"></li>
                                    <?php }else{ ?>
                                    <li class="home-userordersstatus-content-item home-userordersstatus-content-item_deliverydate"><?php echo $row['ngaygh'];} ?> </li>
                                    <li class="home-userordersstatus-content-item home-userordersstatus-content-item_orderstatus" style ="color: var(--primary-color); font-weight:bold;"> <?php echo $row['trangthaidh']; ?> </li>
                                    <li class="home-userordersstatus-content-item home-userordersstatus-content-item_orderstatus"><a href="index.php?page_layout=chitietdonhang&id_dh=<?php echo $row['sodondh'];?>" style ="color: var(--text-color); text-decoration:none;"><i class="far fa-eye eyes-icon"></a></i></li>
                                </ul>
                                <?php  }  }
                                ?>
                            </div>
                            <a href="index.php" class ="cart_button">Tiếp Tục Xem Sản Phẩm</a>
                    </div>
                    
                    
                </div>
            </div>


        </div>
 