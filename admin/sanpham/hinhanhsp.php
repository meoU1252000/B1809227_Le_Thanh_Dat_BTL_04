<script>
    function xoaSanPham(){
        var conf= confirm ("Bạn có chắc chắn muốn xóa Hình Ảnh này không ?");
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
    $id_hh = $_REQUEST['id_sp'];
    $result = mysqli_query($conn, "SELECT * from hinhhanghoa where mshh='$id_hh' ORDER BY mahinh ASC ");
    $totalRows=mysqli_num_rows(mysqli_query($conn,"SELECT * from hinhhanghoa where mshh='$id_hh'"));
    $totalPages = ceil($totalRows/$rowsPerPage);
    $listPage="";
    $nextPage="";
    $previous = "";
    for($i=1;$i<=$totalPages;$i++){
        if($page ==$i){
            $previous = '<a c href="index.php?page_layout=hinhanh&page='.($page-1).'">&laquo;</a>';
            $listPage.='<a class="active" href="index.php?page_layout=hinhanh&page='.$i.'">'.$i.'</a>';
            $nextPage = '<a  href="index.php?page_layout=hinhanh&page='.($page+1).'">&raquo;</a>';
        } else{
            $listPage.='<a  href="index.php?page_layout=hinhanh&page='.$i.'">'.$i.'</a>';
        }
    }
    mysqli_close($conn);
}
?>
             <div class="body-page--manage">
                <span class="body-page--manage_title">Quản Lý Sản Phẩm</span>
                <div class="body-page--manage_form">
                    <table class="body-page--manage_form--table">
                        <tr class="body-page--manage_form--table-display">
                            <th class="body-page--manage_form--table-col_id">
                                Mã Hình
                            </th>
                            <th class="body-page--manage_form--table-col_id">
                               Mã Sản Phẩm
                            </th>
                            <th class="body-page--manage_form--table-col_img">
                                Hình Ảnh
                            </th>
                            <th class="body-page--manage_form--table-col_action">
                                Tác Vụ
                            </th>
                        </tr>
                        <?php 
                          while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <tr class="body-page--manage_form--table-tr">
                            <td class="body-page--manage_form--table-col_id">
                                  <?php echo $row['mahinh']; ?>
                            </td>
                            <td class="body-page--manage_form--table-col_id">
                                   <?php echo $row['mshh']; ?>
                            </td>
                            <td class="body-page--manage_form--table-col_img">
                                <img src="./<?php echo $row['tenhinh']; ?>" alt="Chưa có hình ảnh " class="admin-product-item__img"> 
                            </td>
                            <td class="body-page--manage_form--table-col_action">
                                <div class="body-page--manage_form--table-col_action-form">
                                    <i class="far fa-edit edit-icon_action"><a href="index.php?page_layout=suahinhanh&id_hinhanh=<?php echo $row['mahinh'];?>" class ="action_edit">Sửa</a></i>
                                    <i class="far fa-trash-alt delete-icon_action"><a href="./sanpham/xoahinhanh.php?id_hinhanh=<?php echo $row['mahinh']; ?>" onClick="return xoaSanPham();" class = "action_delete">Xóa</a></i>        
                                </div>
                                
                            </td>
                        </tr>
                        <?php 
                          } 
                        ?>
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
