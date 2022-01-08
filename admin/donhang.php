<script>
    function xoaDonHang(){
        var conf= confirm ("Bạn có chắc chắn muốn xóa Đơn Hàng này không ? Điều này sẽ xóa toàn bộ thông tin liên quan đến đơn hàng bao gồm Chi tiết đơn hàng!");
        return conf;
    }
</script>
<?php
if (!isset($_SESSION['admin'])) {
    header('location: ./dangnhap.php');
}else{
    if(isset($_GET['page'])){
        $page=$_GET['page'];
    } else{
        $page=1;
    }
    $rowsPerPage=5;
    $perRow=$page*$rowsPerPage-$rowsPerPage;
    $result = mysqli_query($conn, "SELECT * from dathang ORDER BY sodondh ASC LIMIT $perRow,$rowsPerPage");
    $totalRows=mysqli_num_rows(mysqli_query($conn,"SELECT * from dathang"));
    $totalPages = ceil($totalRows/$rowsPerPage);
    $listPage="";
    $nextPage="";
    $previous = "";
    for($i=1;$i<=$totalPages;$i++){
        if($page ==$i){
            $previous = '<a c href="index.php?page_layout=donhang&page='.($page-1).'">&laquo;</a>';
            $listPage.='<a class="active" href="index.php?page_layout=donhang&page='.$i.'">'.$i.'</a>';
            $nextPage = '<a  href="index.php?page_layout=donhang&page='.($page+1).'">&raquo;</a>';
        } else{
            $listPage.='<a  href="index.php?page_layout=donhang&page='.$i.'">'.$i.'</a>';
        }
    }
    mysqli_close($conn);
}

?>
<script>
        var xmlhttp;
        function getSearch(a){
          xmlhttp=GetXmlHttpObject();
          null==xmlhttp?alert("Trình duyệt không hỗ trợ HTTP Request"):(xmlhttp.onreadystatechange=stateChanged,xmlhttp.open("GET","getDataDH.php?key="+a,!0),xmlhttp.send(null))
        }
        function stateChanged(){
          4==xmlhttp.readyState&&(document.getElementById("result").innerHTML=xmlhttp.responseText)
        }
        function GetXmlHttpObject(){
          return window.XMLHttpRequest?new XMLHttpRequest:window.ActiveXObject?new ActiveXObject("Microsoft.XMLHTTP"):null
        }
</script>
             <div class="body-page--manage">
                <div class="body-page--header">
                     <span class="body-page--manage_title">Quản Lý Đơn Hàng</span>
                     <div class="body-page--header_searching">
                         <input type="text" placeholder="Tìm kiếm theo mã đơn hàng" type = "search" name="keyword" oninput="getSearch(value);"><i class="fas fa-search"></i>
                     </div>
                 </div>
                <div class="body-page--manage_form">
                    <table class="body-page--manage_form--table">
                        <tr class="body-page--manage_form--table-display">
                            <th class="body-page--manage_form--table-col_id">
                                Mã Đơn Hàng
                            </th>
                            <th class="body-page--manage_form--table-col_id">
                                Mã Khách Hàng
                            </th>
                            <th class="body-page--manage_form--table-col_id">
                                Mã Nhân Viên
                            </th>
                            <th class="body-page--manage_form--table-col_id">
                                Mã Địa Chỉ
                            </th>
                            <th class="body-page--manage_form--table-col_orderdate">
                                Ngày Đặt Hàng
                            </th>
                            <th class="body-page--manage_form--table-col_deliverydate">
                                Ngày Giao Hàng
                            </th>
                            <th class="body-page--manage_form--table-col_note">
                                Ghi Chú
                            </th>
                            <th class="body-page--manage_form--table-col_status">
                                Tình Trạng Đơn Hàng
                            </th>
                            <th class="body-page--manage_form--table-col_action">
                                Tác Vụ
                            </th>
                        </tr>
                        <tbody id="result">
                        <?php 
                           while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <tr class="body-page--manage_form--table-tr">
                            <td class="body-page--manage_form--table-col_id">
                                  <?php echo $row['sodondh']; ?>
                            </td>
                            <td class="body-page--manage_form--table-col_id">
                                   <?php echo $row['mskh']; ?>
                            </td>
                            <td class="body-page--manage_form--table-col_id">
                                  <?php echo $row['msnv']; ?>
                            </td>
                            <td class="body-page--manage_form--table-col_id">
                                  <?php echo $row['madc']; ?>
                            </td>
                            <td class="body-page--manage_form--table-col_orderdate">
                                  <?php echo $row['ngaydh']; ?>
                            </td>
                            <td class="body-page--manage_form--table-col_deliverydate">
                                  <?php echo $row['ngaygh']; ?> 
                            </td>
                          
                            <td class="body-page--manage_form--table-col_note">
                                  <?php echo $row['ghichu']; ?>
                            </td>
                            <td class="body-page--manage_form--table-col_status">
                                  <?php echo $row['trangthaidh']; ?>
                            </td>
                            <td class="body-page--manage_form--table-col_action">
                                <div class="body-page--manage_form--table-col_action-form">
                                <i class="far fa-eye eyes-icon"><a href="index.php?page_layout=chitietdonhang&id_dh=<?php echo $row['sodondh'];?>" class ="action_watch">Xem chi tiết đơn hàng</a></i>
                                <i class="far fa-edit edit-icon_action"><a href="index.php?page_layout=suadonhang&id_dh=<?php echo $row['sodondh'];?>" class ="action_edit">Sửa</a></i>
                                <i class="far fa-eye eyes-icon"><a href="index.php?page_layout=thongtindathang&id_dc=<?php echo $row['madc'];?>" class ="action_watch">Xem thông tin giao hàng</a></i>
                                <i class="far fa-trash-alt delete-icon_action"><a href="xoadonhang.php?id_dh=<?php echo $row['sodondh']; ?>" onClick="return xoaDonHang();" class = "action_delete">Xóa</a></i>   
                                </div>
                            </td>
                        </tr>
                       
                        <?php 
                          } 
                        ?>
                         </tbody>
                    </table>
                </div>
                <div class="pagination">
                <?php 
                  if($totalPages==1){
                    echo $listPage;
                }else if($page==1){
                    echo $listPage;
                    echo $nextPage;
                  }else if($page==$totalPages){
                      echo $previous;
                      echo $listPage;
                  }  else{
                      echo $previous;
                      echo $listPage;
                      echo $nextPage;   
                  }
                     
                ?>
                </div>
            </div>
