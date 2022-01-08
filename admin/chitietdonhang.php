
<?php
if (!isset($_SESSION['admin'])) {
    header('location: ./dangnhap.php');
}
if(isset($_GET['page'])){
    $page=$_GET['page'];
} else{
    $page=1;
}
$id_dh = $_REQUEST['id_dh'];
$rowsPerPage=5;
$perRow=$page*$rowsPerPage-$rowsPerPage;
$result = mysqli_query($conn, "SELECT * from chitietdathang where sodondh='$id_dh' ORDER BY MSHH ASC LIMIT $perRow,$rowsPerPage");
$totalRows=mysqli_num_rows(mysqli_query($conn,"SELECT * from chitietdathang"));
$totalPages = ceil($totalRows/$rowsPerPage);
$listPage="";
for($i=1;$i<=$totalPages;$i++){
    if($page ==$i){
        $listPage.='<a class="active" href="index.php?page_layout=chitietdonhang&id_dh='.$id_dh.'&page='.$i.'">'.$i.'</a>';
    } else{
        $listPage.='<a  href="index.php?page_layout=chitietdonhang&id_dh='.$id_dh.'&page='.$i.'">'.$i.'</a>';
    }
}
mysqli_close($conn);
?>
             <div class="body-page--manage">
                <span class="body-page--manage_title">Quản Lý Chi Tiết Đơn Hàng</span>
                <div class="body-page--manage_form">
                    <table class="body-page--manage_form--table">
                        <tr class="body-page--manage_form--table-display">
                            <th class="body-page--manage_form--table-col_id">
                                Mã Đơn Hàng
                            </th>
                            <th class="body-page--manage_form--table-col_id">
                                Mã Sản Phẩm
                            </th>
                            <th class="body-page--manage_form--table-col_quantity">
                                Số Lượng
                            </th>
                            <th class="body-page--manage_form--table-col_prices">
                                Giá Đặt Hàng
                            </th>
                        
                        </tr>
                        <?php 
                           $totalPrice = 0;
                           while ($row = mysqli_fetch_array($result)) {
                               
                        ?>
                        <tr class="body-page--manage_form--table-tr">
                            <td class="body-page--manage_form--table-col_id">
                                  <?php echo $row['sodondh']; ?>
                            </td>
                            <td class="body-page--manage_form--table-col_id">
                                   <?php echo $row['mshh']; ?>
                            </td>
                            <td class="body-page--manage_form--table-col_quantity">
                                  <?php echo $row['soluong']; ?>
                            </td>
                            <td class="body-page--manage_form--table-col_prices">
                                  <?php echo number_format($row['giadathang']);$totalPrice += $row['giadathang']; ?>
                            </td>
                        </tr>
                        <?php 
                          } 
                        ?>
                        <tr class="body-page--manage_form--table-display">
                            <td class="body-page--manage_form--table-col_id" colspan="3" rowspan="2">
                               Tổng Cộng
                            </td>
                        </tr>

                        <tr class="body-page--manage_form--table-tr">
                            <td class="body-page--manage_form--table-col_id" colspan ="3">
                               <?php echo number_format($totalPrice); ?>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="pagination">
                   <?php 
                     echo $listPage;
                   ?>
                </div>
            </div>
