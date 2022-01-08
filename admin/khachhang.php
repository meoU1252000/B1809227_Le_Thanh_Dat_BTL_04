
<?php
if (!isset($_SESSION['admin'])) {
    header('location: ./dangnhap.php');
}else{
    if($_SESSION['role']['4']){
        if(isset($_GET['page'])){
            $page=$_GET['page'];
        } else{
            $page=1;
        }
        $rowsPerPage=5;
        $perRow=$page*$rowsPerPage-$rowsPerPage;
        $result = mysqli_query($conn, "SELECT * from khachhang ORDER BY mskh ASC LIMIT $perRow,$rowsPerPage");
        $totalRows=mysqli_num_rows(mysqli_query($conn,"SELECT * from khachhang"));
        $totalPages = ceil($totalRows/$rowsPerPage);
        $listPage="";
        $nextPage="";
        $previous = "";
        for($i=1;$i<=$totalPages;$i++){
            if($page ==$i){
                $previous = '<a c href="index.php?page_layout=khachhang&page='.($page-1).'">&laquo;</a>';
                $listPage.='<a class="active" href="index.php?page_layout=khachhang&page='.$i.'">'.$i.'</a>';
                $nextPage = '<a  href="index.php?page_layout=khachhang&page='.($page+1).'">&raquo;</a>';
            } else{
                $listPage.='<a  href="index.php?page_layout=khachhang&page='.$i.'">'.$i.'</a>';
            }
        }
    }else{
        echo '<script language="javascript">';
        echo 'alert("Bạn không có quyền truy cập vào trang này")';
        echo '</script>';
        $url = "index.php";
        if(headers_sent()){
            die('<script type ="text/javascript">window.location.href="'.$url.'" </script>');
        }else{
            header ("location: $url");
            die();
        }
    }
    mysqli_close($conn);
}
?>
<script>
        var xmlhttp;
        function getSearch(a){
          xmlhttp=GetXmlHttpObject();
          null==xmlhttp?alert("Trình duyệt không hỗ trợ HTTP Request"):(xmlhttp.onreadystatechange=stateChanged,xmlhttp.open("GET","getDataKH.php?key="+a,!0),xmlhttp.send(null))
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
                     <span class="body-page--manage_title">Quản Lý Khách Hàng</span>
                     <div class="body-page--header_searching">
                         <input type="text" placeholder="Tìm kiếm theo mã khách hàng" type = "search" name="keyword" oninput="getSearch(value);"><i class="fas fa-search"></i>
                     </div>
                 </div>
                <div class="body-page--manage_form">
                    <table class="body-page--manage_form--table">
                        <tr class="body-page--manage_form--table-display">
                            <th class="body-page--manage_form--table-col_id">
                                Mã Khách Hàng
                            </th>
                            <th class="body-page--manage_form--table-col_name">
                                Họ Tên Khách Hàng
                            </th>
                            <th class="body-page--manage_form--table-col_name">
                                Tên Công Ty
                            </th>
                            <th class="body-page--manage_form--table-col_fax">
                                Số Fax
                            </th>
                            <th class="body-page--manage_form--table-col_phone">
                                Số Điện Thoại
                            </th>
                            <th class="body-page--manage_form--table-col_email">
                                Email
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
                                  <?php echo $row['mskh']; ?>
                            </td>
                            <td class="body-page--manage_form--table-col_name">
                                   <?php echo $row['hotenkh']; ?>
                            </td>
                            <td class="body-page--manage_form--table-col_name">
                                   <?php echo $row['tencongty']; ?>
                            </td>
                            <td class="body-page--manage_form--table-col_fax">
                                  <?php echo $row['sofax']; ?>
                            </td>
                            <td class="body-page--manage_form--table-col_phone">
                                  <?php echo $row['sodienthoai']; ?>
                            </td>
                            <td class="body-page--manage_form--table-col_email">
                                  <?php echo $row['email']; ?> 
                            </td>
                          
                            <td class="body-page--manage_form--table-col_note">
                                  <?php echo $row['ghichu']; ?>
                            </td>
                            <td class="body-page--manage_form--table-col_action">
                                <div class="body-page--manage_form--table-col_action-form">
                                    <i class="far fa-eye eyes-icon" ><a href="index.php?page_layout=diachikh&id_kh=<?php echo $row['mskh'];?>" class ="action_watch" >Xem Địa Chỉ</a></i>
                                    <i class="far fa-edit edit-icon_action" style="margin-left:0px;"><a href="index.php?page_layout=suakhachhang&id_kh=<?php echo $row['mskh'];?>" class ="action_edit" style ="margin-right:0px;">Sửa</a></i>
                                    
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
