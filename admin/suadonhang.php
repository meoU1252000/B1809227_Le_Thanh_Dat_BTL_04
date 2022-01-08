<script>
function myFunction() {
    var x = document.getElementsByName("status-orders")[0].value;
  if (x == "Đã Giao"){
    confirm("Khi đã xác nhận trạng thái đơn hàng đã giao, bạn sẽ không thể sửa đổi trạng thái đơn hàng được nữa. Vẫn tiếp tục ?")
  } else if(x =="Đã Hủy"){
    confirm("Khi đã xác nhận trạng thái đơn hàng đã hủy, bạn sẽ không thể sửa đổi trạng thái đơn hàng được nữa. Vẫn tiếp tục ?")
  }
}
</script>

<?php
include_once './config.php';
ob_start();
if (!isset($_SESSION['admin'])) {
    header('location: ./dangnhap.php');
}else{
    $id_dh = $_REQUEST['id_dh'];
    $query = mysqli_query($conn,"SELECT * from dathang where sodondh = '$id_dh'");
    $row = mysqli_fetch_array($query);
    if(isset($_POST['submit'])){
        $status_orders=$_POST['status-orders'];
        $note = $_POST['notes'];
        $deliverydate=$_POST['date'];
        $sql="UPDATE dathang SET ngaygh='$deliverydate',
                                           ghichu ='$note',
                                           trangthaidh ='$status_orders'
                            WHERE sodondh = '$id_dh' ";
            if(mysqli_query($conn,$sql))
            {
                if($status_orders == "Đã Giao"){
                    $queryid =  mysqli_query($conn,"SELECT * from chitietdathang where sodondh = '$id_dh'");
                    while($rowctdh = mysqli_fetch_array($queryid)){
                        $id_hh = $rowctdh['mshh'];
                        $sldb = $rowctdh['soluong'];
                        $sqlhh = "SELECT * from hanghoa where mshh='$id_hh'";
                        $queryhh = mysqli_query($conn,$sqlhh);
                        $rowhh = mysqli_fetch_array($queryhh);
                        $slht = $rowhh['soluongdaban'];
                        $soluongmoi = $sldb + $slht;
                        $queryupdate =mysqli_query($conn,"UPDATE hanghoa set soluongdaban = '$soluongmoi' where mshh = '$id_hh'") ;
                    }
                    echo '<script language="javascript">';
                    echo 'alert("Cập Nhật Đơn Hàng Thành Công")';
                    echo '</script>';
                    $url = "index.php?page_layout=donhang";
                    if(headers_sent()){
                        die('<script type ="text/javascript">window.location.href="'.$url.'" </script>');
                    }else{
                        header ("location: $url");
                        die();
                    }
                
                } else if($status_orders == "Đã Hủy"){
                    $queryid =  mysqli_query($conn,"SELECT * from chitietdathang where sodondh = '$id_dh'");
                    while($rowctdh = mysqli_fetch_array($queryid)){
                        $slm = 0;
                        $id_hh = $rowctdh['mshh'];
                        $slctdh = $rowctdh['soluong'];
                        $queryhh = mysqli_query($conn,"SELECT * from hanghoa where mshh = '$id_hh'");
                        $rowhh = mysqli_fetch_array($queryhh);
                        $slht = $rowhh['soluonghang'];
                        $slm = $slht + $slctdh;
                        $queryupdate =mysqli_query($conn,"UPDATE hanghoa set soluonghang = '$slm' where mshh = '$id_hh'") ;
                    }
                    echo '<script language="javascript">';
                    echo 'alert("Cập Nhật Đơn Hàng Thành Công")';
                    echo '</script>';
                    $url = "index.php?page_layout=donhang";
                    if(headers_sent()){
                        die('<script type ="text/javascript">window.location.href="'.$url.'" </script>');
                    }else{
                        header ("location: $url");
                        die();
                    }
                    
                }else if($status_orders == "Đã Xử Lý"){
                    echo '<script language="javascript">';
                    echo 'alert("Cập Nhật Đơn Hàng Thành Công")';
                    echo '</script>';
                    $url = "index.php?page_layout=donhang";
                    if(headers_sent()){
                        die('<script type ="text/javascript">window.location.href="'.$url.'" </script>');
                    }else{
                        header ("location: $url");
                        die();
                    }
                }else if($status_orders == "Chưa Xử Lý"){
                    echo '<script language="javascript">';
                    echo 'alert("Cập Nhật Đơn Hàng Thành Công")';
                    echo '</script>';
                    $url = "index.php?page_layout=donhang";
                    if(headers_sent()){
                        die('<script type ="text/javascript">window.location.href="'.$url.'" </script>');
                    }else{
                        header ("location: $url");
                        die();
                    }
                }
               
            } else {
                echo '<script language="javascript">';
                echo 'alert("Lỗi khi cập nhật")';
                echo '</script>';   
                $conn -> rollback();
            }
        
        mysqli_close($conn);
    }

}
ob_end_flush();

?>   
    
    <div class="body-page--function">
            <span class="body-page--function-title">Quản Lý Đơn Hàng</span>
            <div class="body-page--function-form">
                <form action="" method="POST" enctype="multipart/form-data" onsubmit="return check()">
                    <div class="body-page--function-form--title ">
                        <span class="title ">Cập Nhật Đơn Hàng</span>
                        <div class="body-page--function-form--title-seperate"></div>
                    </div>
                    <form action=""  method="POST" enctype="multipart/form-data" onsubmit="return check()">
                       <div class="body-page--function-form--content">
                            <div class="body-page--function-form--content-col1">
                               <ul class="body-page--function-form--content-list">
                                   <li class="body-page--function-form--content-col1_title">Tình Trạng Đơn Hàng</li>
                                   <li class="body-page--function-form--content-col1_dropdown">
                                    <?php if($row['trangthaidh'] == "Đã Xử Lý" ){ ?>
                                   <Select name="status-orders" class="body-page--function-form--content-col1_select"  style="height: 36px;" onchange="myFunction()">
                                           <option value="Chưa Xử Lý">Chưa Xử Lý</option>
                                           <option value="Đã Xử Lý" selected="true">Đã Xử Lý</option>
                                           <option value="Đã Giao">Đã Giao</option>
                                           <option value="Đã Hủy">Đã Hủy</option>
                                   </Select>
                                  <?php } else if($row['trangthaidh'] === "Đã Giao"){ ?>
                                    <Select name="status-orders" class="body-page--function-form--content-col1_select"  style="height: 36px;" onchange="myFunction()">
                                           <option value="Chưa Xử Lý" disabled="disabled">Chưa Xử Lý</option>
                                           <option value="Đã Xử Lý" disabled="disabled">Đã Xử Lý</option>
                                           <option value="Đã Giao" selected="true" >Đã Giao</option>
                                           <option value="Đã Hủy" disabled="disabled">Đã Hủy</option>
                                   </Select>
                                  <?php }else if($row['trangthaidh'] == "Đã Hủy"){ ?>
                                    <Select name="status-orders" class="body-page--function-form--content-col1_select"  style="height: 36px;" onchange="myFunction()">
                                           <option value="Chưa Xử Lý "disabled="disabled">Chưa Xử Lý</option>
                                           <option value="Đã Xử Lý" disabled="disabled">Đã Xử Lý</option>
                                           <option value="Đã Giao" disabled="disabled">Đã Giao</option>
                                           <option value="Đã Hủy" selected="true">Đã Hủy</option>
                                   </Select>
                                   <?php }else if($row['trangthaidh'] == "Chưa Xử Lý"){  ?>
                                    <Select name="status-orders" class="body-page--function-form--content-col1_select"  style="height: 36px;" onchange="myFunction()">
                                           <option value="Chưa Xử Lý" selected="true">Chưa Xử Lý</option>
                                           <option value="Đã Xử Lý" >Đã Xử Lý</option>
                                           <option value="Đã Giao">Đã Giao</option>
                                           <option value="Đã Hủy">Đã Hủy</option>
                                   </Select>
                                   <?php }?>
                                   </li>
                                   
                                <li class="body-page--function-form--content-col1_title" style ="margin-top:90px;">Ghi Chú</li>
                                <textarea name="notes" rows="5" cols="50" wrap="hard" style="font-size:18px"><?php echo $row['ghichu']; ?></textarea>
                               </ul>
                            </div>
                            <div class="body-page--function-form--content-col2">
                                <ul class="body-page--function-form--content-list">
                                <li class="body-page--function-form--content-col2_title">Ngày Giao Hàng</li>
                                    <li class="body-page--function-form--content-col2_input" ><input type="date"
                                            class="body-page--function-form--content-input"name="date"  min="<?php echo $row['ngaydh'];?>"  ></li>
                                </ul>
                            </div>
                        </div>
                     <div class="button-form">
                         <button type="submit" name="submit" class="function-submit" >Xác Nhận</button>
                        <button type="reset" class="function-reset">Làm Mới</button>
                      </div>
                   </form>
            </div>

        </div>