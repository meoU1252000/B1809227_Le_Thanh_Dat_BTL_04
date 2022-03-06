<script>
    function xoaDanhMuc(){
        var conf= confirm ("Bạn có chắc chắn muốn xóa Danh Mục này không ?");
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
                $result = mysqli_query($conn, "SELECT * from loaihanghoa ORDER BY maloaihang ASC LIMIT $perRow,$rowsPerPage");
                $totalRows=mysqli_num_rows(mysqli_query($conn,"SELECT * from loaihanghoa"));
                $totalPages = ceil($totalRows/$rowsPerPage);
                $listPage="";
                $nextPage="";
                $previous = "";
                for($i=1;$i<=$totalPages;$i++){
                    if($page ==$i){
                        $previous = '<a href="index.php?page_layout=danhmuc&page='.($page-1).'">&laquo;</a>';
                        $listPage.='<a class="active" href="index.php?page_layout=danhmuc&page='.$i.'">'.$i.'</a>';
                        $nextPage = '<a href="index.php?page_layout=danhmuc&page='.($page+1).'">&raquo;</a>';
                    } else{
                        $listPage.='<a  href="index.php?page_layout=danhmuc&page='.$i.'">'.$i.'</a>';
                    }
                }
      
   
    mysqli_close($conn);

}
?>
<script>
        var xmlhttp;
        function getSearch(a){
          xmlhttp=GetXmlHttpObject();
          null==xmlhttp?alert("Trình duyệt không hỗ trợ HTTP Request"):(xmlhttp.onreadystatechange=stateChanged,xmlhttp.open("GET","getDataDM.php?key="+a,!0),xmlhttp.send(null))
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
                     <span class="body-page--manage_title">Quản Lý Danh Mục</span>
                     <div class="body-page--header_searching">
                         <input type="text" placeholder="Tìm kiếm theo tên" type = "search" name="keyword" oninput="getSearch(value);"><i class="fas fa-search"></i>
                     </div>
                 </div>
            <div class="body-page--manage_form">
                <table class="body-page--manage_form--table">
                    <tr class="body-page--manage_form--table-display">
                        <th class="body-page--manage_form--table-col_id">
                            Mã Danh Mục
                        </th>
                        <th class="body-page--manage_form--table-col_name">
                            Tên Danh Mục
                        </th>
                        <th class="body-page--manage_form--table-col_action">
                            Tác Vụ
                        </th>
                    </tr>
                    <tbody id = "result">
                        <?php 
                           while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <tr class="body-page--manage_form--table-tr">
                            <td class="body-page--manage_form--table-col_id">
                                  <?php echo $row['maloaihang']; ?>
                            </td>
                            <td class="body-page--manage_form--table-col_name">
                                   <?php echo $row['tenloaihang']; ?>
                            </td>
                            <td class="body-page--manage_form--table-col_action">
                               <div class="body-page--manage_form--table-col_action-form">
                                    <i class="far fa-edit edit-icon_action"><a href="index.php?page_layout=suadanhmuc&id_dm=<?php echo $row['maloaihang'];?>" class ="action_edit">Sửa</a></i>
                                    <i class="far fa-trash-alt delete-icon_action"><a href="xoadanhmuc.php?id_dm=<?php echo $row['maloaihang']; ?>" onClick="return xoaDanhMuc();" class = "action_delete">Xóa</a></i>
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
