<script>
    function xoaChiTietSanPham(){
        var conf= confirm ("Bạn có chắc chắn muốn xóa Chi Tiết Sản Phẩm này không ?");
        return conf;
    }
</script>
<?php
if (!isset($_SESSION['admin'])) {
    header('location: ./dangnhap.php');
}else{
    if(isset($_GET['id_sp'])){
        $id_hh = $_REQUEST['id_sp'];
        $result = mysqli_query($conn, "SELECT * from chitiethanghoa where mshh='$id_hh' ORDER BY mshh ");
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
                                Mã Sản Phẩm
                            </th>
                            <th class="body-page--manage_form--table-col_specifications">
                                Xuất Xứ
                            </th>
                            <th class="body-page--manage_form--table-col_specifications">
                                Năm Phát Hành
                            </th>
                            <th class="body-page--manage_form--table-col_specifications">
                                Nhóm Hương
                            </th>
                            <th class="body-page--manage_form--table-col_specifications">
                               Phong Cách
                            </th>
                            <th class="body-page--manage_form--table-col_action">
                                Tác Vụ
                            </th>
                        </tr>

                        <?php  
                             if(mysqli_num_rows($result)>0){
                             $row = mysqli_fetch_array($result);
                        ?>
                        <tr class="body-page--manage_form--table-tr">
                            <td class="body-page--manage_form--table-col_id">
                                  <?php echo $row['mshh']; ?>
                            </td>
                            <td class="body-page--manage_form--table-col_specifications">
                                   <?php echo $row['xuatxu']; ?>
                            </td>
                            <td class="body-page--manage_form--table-col_specifications">
                                   <?php echo $row['namphathanh']; ?>
                            </td>
                            <td class="body-page--manage_form--table-col_specifications">
                                  <?php echo $row['nhomhuong']; ?>
                            </td>
                            <td class="body-page--manage_form--table-col_specifications">
                                  <?php echo $row['phongcach']; ?>
                            </td>
                            <td class="body-page--manage_form--table-col_action" rowspan="2">
                                <div class="body-page--manage_form--table-col_action-form">
                                    <i class="far fa-edit edit-icon_action"><a href="index.php?page_layout=suachitietsp&id_sp=<?php echo $row['mshh'];?>" class ="action_edit">Sửa</a></i>
                                    <i class="far fa-trash-alt delete-icon_action"><a href="./sanpham/xoachitietsp.php?id_sp=<?php echo $row['mshh']; ?>" onClick="return xoaChiTietSanPham();" class = "action_delete">Xóa</a></i>        
                                </div>
                            </td>
                        </tr>
                      
                         <tr class="body-page--manage_form--table-display">
                            <th class="body-page--manage_form--table-col_specifications">
                                Chi tiết sản phẩm
                            </th>
                            <td class="body-page--manage_form--table-col_specifications" colspan="4" style="background-color:white;color:black;">
                                   <?php echo $row['chitietsp']; ?>
                            </td>
                        </tr>
                       <?php }else{
                        ?>
                        <tr class="body-page--manage_form--table-tr">
                            <td class="body-page--manage_form--table-col_id">
                                  
                            </td>
                            <td class="body-page--manage_form--table-col_specifications">
                                   
                            </td>
                            <td class="body-page--manage_form--table-col_specifications">
                                  
                            </td>
                            <td class="body-page--manage_form--table-col_specifications">
                                 
                            </td>
                            <td class="body-page--manage_form--table-col_specifications">

                            </td>
                            <td class="body-page--manage_form--table-col_action" rowspan="2">
                                <div class="body-page--manage_form--table-col_action-form">
                                      
                                </div>
                            </td>
                        </tr>
                      
                         <tr class="body-page--manage_form--table-display">
                            <th class="body-page--manage_form--table-col_specifications">
                                Chi tiết sản phẩm
                            </th>
                            <td class="body-page--manage_form--table-col_specifications" colspan="4" style="background-color:white;color:black;">
                                  
                            </td>
                        </tr>
                        <?php }?>
                    </table>
                </div>
                
            </div>
