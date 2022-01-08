<script>
    function xoaKhachHang(){
        var conf= confirm ("Bạn có chắc chắn muốn xóa Khách Hàng này không ?");
        return conf;
    }
</script>
<?php
if (!isset($_SESSION['admin'])) {
    header('location: ./dangnhap.php');
}else{
    $id_kh=$_GET['id_kh'];
    $result = mysqli_query($conn, "SELECT * from diachikh where mskh = '$id_kh' ORDER BY madc");
    mysqli_close($conn);
}
?>
             <div class="body-page--manage">
                <span class="body-page--manage_title">Quản Lý Khách Hàng</span>
                <div class="body-page--manage_form">
                    <table class="body-page--manage_form--table">
                        <tr class="body-page--manage_form--table-display">
                            <th class="body-page--manage_form--table-col_id">
                                Mã Địa Chỉ
                            </th>
                            <th class="body-page--manage_form--table-col_id">
                                Mã Khách Hàng
                            </th>
                            <th class="body-page--manage_form--table-col_name">
                                Tên Người Nhận
                            </th>
                            <th class="body-page--manage_form--table-col_phone">
                                Số Điện Thoại Người Nhận
                            </th>
                            <th class="body-page--manage_form--table-col_address">
                                Địa Chỉ
                            </th>
                        </tr>
                        <?php 
                           while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <tr class="body-page--manage_form--table-tr">
                            <td class="body-page--manage_form--table-col_id">
                                  <?php echo $row['madc']; ?>
                            </td>
                            <td class="body-page--manage_form--table-col_id">
                                  <?php echo $row['mskh']; ?>
                            </td>
                            <td class="body-page--manage_form--table-col_name">
                                   <?php echo $row['tennguoinhan']; ?>
                            </td>
                            
                            <td class="body-page--manage_form--table-col_phone">
                                  <?php echo $row['sodienthoainguoinhan']; ?>
                            </td>
                            <td class="body-page--manage_form--table-col_address">
                                  <?php echo $row['diachi']; ?>
                            </td>
                        </tr>
                        <?php 
                          } 
                        ?>
                    </table>
                </div>
               
            </div>
