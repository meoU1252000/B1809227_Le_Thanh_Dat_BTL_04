<?php 
use PHPMailer\PHPMailer\PHPMailer;
include('../admin/config.php');
ob_start();
if(isset($_SESSION['username']) && isset($_SESSION['diachi'])){
    $username = $_SESSION['username'];
    $user = "SELECT * from khachhang where tendangnhap = '$username'";
    $queryuser=mysqli_query($conn,$user);
    $rowinfo = mysqli_fetch_array($queryuser);
    $madc = $_SESSION['diachi'];
    $querydiachigiaohang = mysqli_query($conn,"SELECT * from diachikh where madc = '$madc'");
    $rowdiachigiaohang = mysqli_fetch_array($querydiachigiaohang);
    $diachigiaohang = $rowdiachigiaohang['diachi'];
    $email = $rowinfo['email'];
    $id_kh=$_SESSION['id'];
    if(isset($_POST['note'])){
        $note = $_POST['note'];
    }
    $querydc = mysqli_query($conn,"SELECT * from diachikh where mskh = '$id_kh'");
    $rowdc = mysqli_fetch_array($querydc);
    $name = $rowdc['tennguoinhan'];
    $phone = $rowdc['sodienthoainguoinhan'];
    $mskh = $rowinfo['mskh'];
    $queryinfoshop = mysqli_query($conn,"SELECT * from thongtindoanhnghiep");
    $rowinfoshop = mysqli_fetch_array($queryinfoshop);
    if(isset($_SESSION['giohang']) && count($_SESSION['giohang']) > 0 ){
            if($diachigiaohang != NULL && $email != NULL && $name != NULL && $phone !=NULL){
                $arrMSHH = array();
                foreach ($_SESSION['giohang'] as $MSHH => $so_luong) {
                    $arrMSHH[] = $MSHH;
                }
                    $strID = implode(',',$arrMSHH);
                    $sql = "SELECT * FROM HangHoa where mshh IN ($strID) ORDER BY mshh DESC";
                    $query = mysqli_query($conn,$sql);
                    if(isset($_POST['pay_submit'])){
                        $note = $_POST['note'];
                        date_default_timezone_set('Asia/Ho_Chi_Minh');
                        $datetime_send = date("Y-m-d h:i:s");
                        $sqlnhanvien = "SELECT * from nhanvien ORDER BY RAND() LIMIT 1";
                        $querynhanvien = mysqli_query($conn,$sqlnhanvien);
                        $rownhanvien = mysqli_fetch_array($querynhanvien);
                        $id_nv = $rownhanvien['msnv'];
                        if(isset($_POST['note'])){
                            $sqlorders = "INSERT into DatHang(mskh,msnv,ngaydh,trangthaidh,ghichu,madc) values ('$mskh','$id_nv','$datetime_send','Ch??a X??? L??','$note','$madc')";
                        }else{
                            $sqlorders = "INSERT into DatHang(mskh,msnv,ngaydh,trangthaidh,madc) values ('$mskh','$id_nv','$datetime_send','Ch??a X??? L??','$madc')";
                        }
                        $queryorders = mysqli_query($conn,$sqlorders);
                        $last_id = mysqli_insert_id($conn);
                        while($rowdeitalorders = mysqli_fetch_array($query)){
                            $price = ($rowdeitalorders['gia'] - ($rowdeitalorders['gia'] * $rowdeitalorders['giamgia']))* $_SESSION['giohang'][$rowdeitalorders['mshh']];
                            $MSHH=$rowdeitalorders['mshh'];
                            $soluong = $_SESSION['giohang'][$rowdeitalorders['mshh']];
                            $soluonghethonghienco = $rowdeitalorders['soluonghang'];
                            $soluongconlai =   $soluonghethonghienco -  $soluong;
                            $sqldetailorders = "INSERT into chitietdathang(sodondh,mshh,soluong,giadathang) values ('$last_id','$MSHH','$soluong','$price')";
                            $soluonghanghoa = "UPDATE hanghoa SET soluonghang= '$soluongconlai' WHERE mshh='$MSHH'";
                            mysqli_query($conn, $sqldetailorders);
                            mysqli_query($conn, $soluonghanghoa);
                        }
                        $select = "SELECT * from chitietdathang where sodondh = '$last_id'";
                        $queryselect =  mysqli_query($conn,$select);
                        
                        if(mysqli_num_rows($queryselect) > 0){
                                echo "<script>
                                window.location.href='index.php?page_layout=donhang';
                                alert('?????t H??ng Th??nh C??ng!');
                                </script>";
                                unset($_SESSION['giohang']);
                        }else {
                            echo "<script>
                            window.location.href='index.php';
                            alert('L???i. Vui l??ng th??? l???i sau!');
                            </script>";
                            $conn->rollback();
                        }
                    }
            }

    } else if(count($_SESSION['giohang']) == 0 ){
        echo "<script>
        window.location.href='index.php';
        alert('L???i. Ch??a c?? s???n ph???m trong gi??? h??ng!');
        </script>";
    }
} else if(!isset($_SESSION['username'])){
    echo "<script>
    window.location.href='index.php';
    alert('L???i. Vui l??ng ????ng nh???p ????? th???c hi???n t??nh n??ng n??y!');
    </script>";
}
else if(!isset($_SESSION['diachi'])){
    echo "<script>
    window.location.href='index.php?page_layout=diachi';
    alert('L???i. Vui l??ng nh???p ?????a ch??? ????? th???c hi???n t??nh n??ng n??y!');
    </script>";
}
ob_flush();
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
                <div class="home-userorders">
                    <form action="" method="POST" enctype="multipart/form-data" onsubmit="return check();">
                    <div class="home-useroders-content">
                        <div class="home-userorders--info">
                            <h3>Thanh To??n v?? Giao H??ng</h3>
                            <p>
                                <label for="name">H??? v?? T??n</label>
                                <input type="text" placeholder="H??? v?? T??n c???a b???n" name="info_name" value="<?php echo $name; ?>" disabled>
                            </p>
                            <p>
                                <label for="phone">S??? ??i???n Tho???i</label>
                                <input type="text" name="info_phone" value="<?php echo $phone ?>" disabled>
                            </p>
                            <p>
                                <label for="email">?????a Ch??? Email</label>
                                <input type="text" name="emailcheckinfo" value="<?php echo $email; ?>" disabled >
                            </p>
                            <p>
                                <label for="address">?????a Ch???</label>
                                <input type="text" name="info_address" value="<?php echo $diachigiaohang; ?>" disabled>
                            </p>
                            
                                <p>
                                    <label for="note">Ghi Ch??</label>
                                    <textarea name="note"  cols="60" rows="10"></textarea>
                                </p>
                           
                        </div>
                        <div class="home-userorder--order">
                            <h3>????n H??ng C???a B???n</h3>
                            <ul class="home-userorder--order-content-heading home-userorder--order-content-heading--seperate ">
                                <li class="home-userorder--order-content-label home-userorder--order-content-label_name" >S???n Ph???m</li>
                                <li class="home-userorder--order-content-label home-userorder--order-content-label_sum">T???m T??nh</li>
                            </ul>

                            <div class="home-userorder--order_item">
                               <?php
                                  $totalPriceAll = 0; 
                                  if(count($_SESSION['giohang']) > 0 ){
                                     while($row = mysqli_fetch_array($query)){ 
                                       $totalPrice = ($row['gia'] - ($row['gia'] * $row['giamgia'])) * $_SESSION['giohang'][$row['mshh']];

                                ?>
                                <ul>
                                    <li class="home-userorder--order_item--label home-userorder--order_item_name"><?php echo $row['tenhh']; ?> x<?php echo $_SESSION['giohang'][$row['mshh']] ;?></li>
                                    <li class="home-userorder--order_item--label home-userorder--order_item_sum"><?php echo number_format(($row['gia'] - ($row['gia'] * $row['giamgia']))* $_SESSION['giohang'][$row['mshh']]);?></li>
                                </ul>
                                <?php $totalPriceAll+=$totalPrice; }}else{?>
                                <ul>
                                    <li class="home-userorder--order_item--label home-userorder--order_item_name"></li>
                                    <li class="home-userorder--order_item--label home-userorder--order_item_sum"></li>
                                </ul>
                                <?php } ?>
                            </div>

                            <ul class="home-userorder--order-content-bottom home-userorder--order-content-bottom--seperate">
                                <li class="home-userorder--order-content-label home-userorder--order-content-label_name" >T???m T??nh</li>
                                <li class="home-userorder--order-content-label home-userorder--order-content-label_sum"><?php echo number_format($totalPriceAll);?></li>
                            </ul>

                            <ul class="home-userorder--order-content-bottom home-userorder--order-content-bottom--seperate">
                                <li class="home-userorder--order-content-label home-userorder--order-content-label_name" >Ph?? Ship</li>
                                <li class="home-userorder--order-content-label home-userorder--order-content-label_sum"><?php $shipping = 30000; echo number_format($shipping);?></li>
                            </ul>

                            <ul class="home-userorder--order-content-bottom home-userorder--order-content-bottom--seperate">
                                <li class="home-userorder--order-content-label home-userorder--order-content-label_name" >T???ng</li>
                                <li class="home-userorder--order-content-label home-userorder--order-content-label_sum"><?php echo number_format($totalPriceAll+$shipping);?></li>
                            </ul>
                            <p>
                                Ph????ng th???c: <b>Giao h??ng thanh to??n t???i nh?? c???a b???n</b><br>
                                Ch??ng t??i s??? li??n h??? b???n trong 24 gi??? k??? t??? khi b???n ?????t h??ng ????? x??c nh???n ????n h??ng <br>
                                <span style="font-weight: bold">L??u ??:</span> <i>n???u b???n kh??ng nh???n ???????c b???t k??? cu???c g???i n??o trong 24 gi???, h??y ch??? ?????ng g???i ch??ng t??i </i> <a href="" style="color:blue"><u>0984978407</u>&nbsp;</a>
                            </p>
                            <button type="submit" name="pay_submit" class="home-userorder--order_button btn ">X??c Nh???n</button>
                            <a href="index.php" class ="btn btn--normal" style="border: 1px solid black;background-color:white;height: 40px;">Ti???p T???c Xem S???n Ph???m</a>
                        </div>
                        
                    </div>
                    </form>
                </div>
            </div>
        </div>
    


