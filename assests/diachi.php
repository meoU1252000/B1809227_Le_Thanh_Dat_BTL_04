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
    $result = mysqli_query($conn, "SELECT * from diachikh where mskh = '$id_kh' ORDER BY madc ASC ");
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
                <div class="home-useraddress">
                    <div class="home-useraddress-content">
                            <ul class="home-useraddress-content-heading home-useraddress-content--separate">
                                <li class="home-useraddress-content-heading-label home-useraddress-content-heading-label_id">Địa Chỉ</li>
                                <li class="home-useraddress-content-heading-label home-useraddress-content-heading-label_name">Tên Người Nhận</li>
                                <li class="home-useraddress-content-heading-label home-useraddress-content-heading-label_phone">Số Điện Thoại</li>
                                
                           </ul>
                            <div class="home-useraddress-content--item">
                             <?php if(mysqli_num_rows($result) == 0 ) { ?>
                               <ul class="home-useraddress-content-body">
                                   <li class="home-useraddress-content-item home-useraddress-content-noaddress">
                                       Chưa có địa chỉ thanh toán nào!
                                   </li>
                                </ul> <?php } else{ ?>
                                    <?php 
                                       while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                <ul class="home-useraddress-content-body">
                                    <li class="home-useraddress-content-item home-useraddress-content-item-delete" >
                                    <a href="xoadiachi.php?id_dc=<?php echo $row['madc'];?>" onclick="return xoaDiaChi();" ><i class="fas fa-times-circle home-useraddress_icon--delete"></i></a></li>
                                    <li class="home-useraddress-content-item home-useraddress-content-item_id">
                                        <?php echo $row['diachi']; ?>
                                    </li>
                                    <li class="home-useraddress-content-item home-useraddress-content-item_name"> <?php echo $row['tennguoinhan']; ?></li>
                                    <li class="home-useraddress-content-item home-useraddress-content-item_phone"><?php echo $row['sodienthoainguoinhan']; ?></li>
                                    <li class="home-useraddress-content-item home-useraddress-content-item-edit" >
                                        
                                            <a href="index.php?page_layout=suadiachi&id_dc=<?php echo $row['madc'];?>" class ="action_edit"><i class="far fa-edit edit-icon_action"></i></a>
                                        
                                    </li>
                                </ul>
                                <?php   }} ?>
                            </div>
                            <?php if(mysqli_num_rows($result) >=3 ){?>
                                <a href="index.php?page_layout=themdiachi&id_kh=<?php echo $id_kh;?>" class ="address_button btn btn--primary" style="pointer-events: none;background-color: #AAAAAA"">Thêm Địa Chỉ</a>
                            <?php } else {?>
                            <a href="index.php?page_layout=themdiachi&id_kh=<?php echo $id_kh;?>" class ="address_button btn btn--primary">Thêm Địa Chỉ</a><?php }?>
                            <a href="index.php" class ="address_button" style="margin-left:8px;">Trở lại trang chủ</a>
                    </div>
                    
                    
                </div>
            </div>


        </div>
   