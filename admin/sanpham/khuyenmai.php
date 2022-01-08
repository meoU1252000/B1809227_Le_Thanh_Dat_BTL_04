<script>
    function xoaKhuyenMai(){
        var conf= confirm ("Bạn có chắc chắn muốn xóa khuyến mãi Sản Phẩm này không ?");
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
            $previous = '<a href="index.php?page_layout=khuyenmai&page='.($page-1).'">&laquo;</a>';
            $listPage.='<a class="active" href="index.php?page_layout=khuyenmai&page='.$i.'">'.$i.'</a>';
            $nextPage = '<a href="index.php?page_layout=khuyenmai&page='.($page+1).'">&raquo;</a>';
        } else{
            $listPage.='<a  href="index.php?page_layout=khuyenmai&page='.$i.'">'.$i.'</a>';
        }
       
    }
    mysqli_close($conn);

}
?>
<script>
        var xmlhttp;
        function getSearch(a){
          xmlhttp=GetXmlHttpObject();
          null==xmlhttp?alert("Trình duyệt không hỗ trợ HTTP Request"):(xmlhttp.onreadystatechange=stateChanged,xmlhttp.open("GET","./sanpham/getDataKM.php?key="+a,!0),xmlhttp.send(null))
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
                     <span class="body-page--manage_title">Quản Lý Khuyến Mãi</span>
                     <div class="body-page--header_searching">
                         <input type="text" placeholder="Tìm kiếm theo mã sản phẩm" type = "search" name="keyword" oninput="getSearch(value);"><i class="fas fa-search"></i>
                     </div>
                </div>
            <div class="body-page--manage_form">
                <table class="body-page--manage_form--table">
                    <tr class="body-page--manage_form--table-display">
                        <th class="body-page--manage_form--table-col_id">
                            Mã Sản Phẩm
                        </th>
                        <th class="body-page--manage_form--table-col_saleoff">
                            Giảm Giá
                        </th>
                        <th class="body-page--manage_form--table-col_note">
                            Ghi Chú
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
                            <td class="body-page--manage_form--table-col_saleoff">
                                   <?php 
                                      if($row['giamgia']>0){
                                          echo ($row['giamgia']*100); echo "%"; 
                                      } else {
                                         echo "Không có khuyến mãi!";
                                      }?>
                                     
                            </td>
                            <td class="body-page--manage_form--table-col_note">
                                   <?php echo $row['ghichu']; ?>
                            </td>
                            <td class="body-page--manage_form--table-col_action">
                               <div class="body-page--manage_form--table-col_action-form">
                                    <i class="far fa-edit edit-icon_action"><a href="index.php?page_layout=suakhuyenmai&id_sp=<?php echo $row['mshh'];?>" class ="action_edit">Sửa</a></i>
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
