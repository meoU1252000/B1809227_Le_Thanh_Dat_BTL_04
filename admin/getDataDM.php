<?php
include('./config.php');
$key=$_GET['key'];
if($key!=NULL){
    $sql="SELECT * from loaihanghoa where tenloaihang like '%$key%'";
    $result=mysqli_query($conn,$sql);
    $rs='';
      if(mysqli_num_rows($result)>0){
          foreach($result as $row){
                  $rs.= "<tr class='body-page--manage_form--table-tr'>
                  <td class='body-page--manage_form--table-col_id'>
                      ".$row['maloaihang']."
                  </td>
                   <td class='body-page--manage_form--table-col_name'>
                                 " .$row['tenloaihang']." 
                  </td>
                  <td class='body-page--manage_form--table-col_action'>
                      <div class='body-page--manage_form--table-col_action-form'>
                          <i class='far fa-edit edit-icon_action'><a href='index.php?page_layout=suadanhmuc&id_dm=" .$row['maloaihang']."' class ='action_edit'>Sửa</a></i>
                          <i class='far fa-trash-alt delete-icon_action'><a href='xoadanhmuc.php?id_dm=" .$row['maloaihang']."' onClick='return xoaDanhMuc();' class = 'action_delete'>Xóa</a></i>
                      </div>
                  </td>
                  </tr>";
          }
      }else{
      $rs.= "Không tìm thấy danh mục";
    }
    echo $rs;
  }else {
      $sql="SELECT * from loaihanghoa ORDER BY maloaihang ASC LIMIT 5";
      $result=mysqli_query($conn,$sql);
      $rs = "";
      foreach($result as $row){
          $rs.= "<tr class='body-page--manage_form--table-tr'>
          <td class='body-page--manage_form--table-col_id'>
              ".$row['maloaihang']."
          </td>
           <td class='body-page--manage_form--table-col_name'>
                         " .$row['tenloaihang']." 
          </td>
          <td class='body-page--manage_form--table-col_action'>
            <div class='body-page--manage_form--table-col_action-form'>
                <i class='far fa-edit edit-icon_action'><a href='index.php?page_layout=suadanhmuc&id_dm=" .$row['maloaihang']."' class ='action_edit'>Sửa</a></i>
                <i class='far fa-trash-alt delete-icon_action'><a href='xoadanhmuc.php?id_dm=" .$row['maloaihang']."' onClick='return xoaDanhMuc();' class = 'action_delete'>Xóa</a></i>
            </div>
         </td>
        </tr>";
      }
      echo $rs;
}


?>