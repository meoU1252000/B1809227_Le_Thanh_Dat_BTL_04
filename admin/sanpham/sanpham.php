<script>
    function xoaSanPham(){
        var conf= confirm ("Bạn có chắc chắn muốn xóa Sản Phẩm này không ? Điều này sẽ dẫn đến xóa toàn bộ thông tin liên quan đến sản phẩm bao gồm ở đơn hàng, khuyến mãi,...!");
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
    $result = mysqli_query($conn, "SELECT * from hanghoa ORDER BY mshh ASC LIMIT $perRow,$rowsPerPage");
    $totalRows=mysqli_num_rows(mysqli_query($conn,"SELECT * from hanghoa"));
    $totalPages = ceil($totalRows/$rowsPerPage);
    $listPage="";
    $nextPage="";
    $previous = "";
    for($i=1;$i<=$totalPages;$i++){
        if($page ==$i){
            $previous = '<a c href="index.php?page_layout=sanpham&page='.($page-1).'">&laquo;</a>';
            $listPage.='<a class="active" href="index.php?page_layout=sanpham&page='.$i.'">'.$i.'</a>';
            $nextPage = '<a  href="index.php?page_layout=sanpham&page='.($page+1).'">&raquo;</a>';
        } else{
            $listPage.='<a  href="index.php?page_layout=sanpham&page='.$i.'">'.$i.'</a>';
        }
    }
    mysqli_close($conn);

}
?>
<script>
        var xmlhttp;
        function getSearch(a){
          xmlhttp=GetXmlHttpObject();
          null==xmlhttp?alert("Trình duyệt không hỗ trợ HTTP Request"):(xmlhttp.onreadystatechange=stateChanged,xmlhttp.open("GET","./sanpham/getDataSP.php?key="+a,!0),xmlhttp.send(null))
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
                     <span class="body-page--manage_title">Quản Lý Sản Phẩm</span>
                     <div class="body-page--header_searching">
                         <input type="text" placeholder="Tìm kiếm theo tên" type = "search" name="keyword" oninput="getSearch(value);"><i class="fas fa-search"></i>
                     </div>
                 </div>
                <div class="body-page--manage_form">
                    <table class="body-page--manage_form--table">
                        <tr class="body-page--manage_form--table-display">
                            <th class="body-page--manage_form--table-col_id">
                                Mã Sản Phẩm
                            </th>
                            <th class="body-page--manage_form--table-col_id">
                                Mã Danh Mục
                            </th>
                            <th class="body-page--manage_form--table-col_name">
                                Tên Sản Phẩm
                            </th>
                            <th class="body-page--manage_form--table-col_specifications">
                                Quy Cách
                            </th>
                            <th class="body-page--manage_form--table-col_prices">
                                Giá
                            </th>
                            <th class="body-page--manage_form--table-col_quantity">
                                Số Lượng Hàng
                            </th>
                            <th class="body-page--manage_form--table-col_quantity">
                                Số Lượng Đã Bán
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
                                  <?php echo $row['mshh']; ?>
                            </td>
                            <td class="body-page--manage_form--table-col_id">
                                   <?php echo $row['maloaihang']; ?>
                            </td>
                            <td class="body-page--manage_form--table-col_name">
                                   <?php echo $row['tenhh']; ?>
                            </td>
                            <td class="body-page--manage_form--table-col_specifications">
                                  <?php echo $row['quycach']; ?>
                            </td>
                            <td class="body-page--manage_form--table-col_prices">
                                  <?php echo number_format($row['gia']); ?>
                            </td>
                            <td class="body-page--manage_form--table-col_quantity">
                                  <?php echo $row['soluonghang']; ?> 
                            </td>
                            <td class="body-page--manage_form--table-col_quantity">
                                  <?php echo $row['soluongdaban']; ?> 
                            </td>
                            <td class="body-page--manage_form--table-col_action">
                                <div class="body-page--manage_form--table-col_action-form">
                                    <i class="far fa-eye eyes-icon"><a href="index.php?page_layout=hinhanh&id_sp=<?php echo $row['mshh'];?>" class ="action_watch">Xem Hình Ảnh</a></i>
                                    <i class="far fa-edit edit-icon_action"><a href="index.php?page_layout=suasanpham&id_sp=<?php echo $row['mshh'];?>" class ="action_edit">Sửa</a></i>
                                    <i class="far fa-eye eyes-icon"><a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row['mshh'];?>" class ="action_watch">Chi Tiết Sản Phẩm</a></i>
                                    <i class="far fa-trash-alt delete-icon_action"><a href="./sanpham/xoasanpham.php?id_sp=<?php echo $row['mshh']; ?>" onClick="return xoaSanPham();" class = "action_delete">Xóa</a></i>        
                                </div>
                                
                            </td>
                        </tr>
                        <?php 
                          } 
                        ?>
                        </tboydy>
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
