
<?php 
include_once '../admin/config.php';
if(!isset($_SESSION['username'])){
    header('location: ./index.php');
} else{
    $id_dc = $_GET['id_dc'];  
    $query = mysqli_query($conn,"SELECT * from diachikh where madc = '$id_dc'");
    $row = mysqli_fetch_array($query);
    if(isset($_POST['info_submit'])){
        $name = $_POST['address_name'];
        $address = $_POST['address'];
        $phone = $_POST['address_phone'];
        if(mysqli_num_rows($query)<3){
           if(mysqli_query($conn,"UPDATE diachikh SET diachi='$address', tennguoinhan='$name', sodienthoainguoinhan='$phone' where madc='$id_dc'"))
            {
                  echo "<script>
                   window.location.href='index.php';
                  alert('Cập nhật thành công thông tin!');
                  </script>";
                } else {
                    echo "<script>
                   window.location.href='index.php';
                  alert('Lỗi. Vui lòng thử lại!');
                  </script>";
                       $conn -> rollback();
            
                }
        }else {
            echo "<script>
            window.location.href='index.php';
            alert('Lỗi. Đã quá giới hạn địa chỉ có thể thêm!');
            </script>";
            $conn -> rollback();
        }
        mysqli_close($conn);
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
                <div class="home-userinfo">
                   <form action="" name="validationinfo" method="POST" enctype="multipart/form-data" >
                        <h3 style="margin-left: 32px; margin-top: 24px;margin-bottom: 36px;">Địa Chỉ Thanh Toán</h3>
                        <div class="home-userinfo_name">
                            <div class="home-userinfo_content--left">
                                <span>Họ Tên </span>
                                <input type="text" name="address_name" value ="<?php echo $row['tennguoinhan']; ?>">
                            </div>
                            <div class="home-userinfo_content--right">
                                <span>Số Điện Thoại</span>
                                <input type="text" name="address_phone" value ="<?php echo $row['sodienthoainguoinhan']; ?>">
                            </div>
                        </div>
                        <div class="home-userinfo_content">
                            <span>Địa Chỉ </span>
                            <input type="text" name="address" value ="<?php echo $row['diachi']; ?>">
                        </div>
                        <button type="submit" name="info_submit" class="home-userinfo_button btn btn--primary">Xác Nhận</button>
                    </form>
                </div>
            </div>
        </div>
    
    
