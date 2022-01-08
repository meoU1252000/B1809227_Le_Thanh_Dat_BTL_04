<?php
include('./config.php');
$key=$_GET['key'];
if($key!=NULL){
    $sql="SELECT * from nhanvien where hotennv like '%$key%'";
    $result=mysqli_query($conn,$sql);
    $rs='';
      if(mysqli_num_rows($result)>0){
          foreach($result as $row){
                  $rs.= "<tr class='body-page--manage_form--table-tr'>
                  <td class='body-page--manage_form--table-col_id'>
                      ".$row['msnv']."
                  </td>
                   <td class='body-page--manage_form--table-col_name'>
                                 " .$row['hotennv']." 
                  </td>
                  <td class='body-page--manage_form--table-col_position'>
                                 " .$row['chucvu']."
                  </td>
                  <td class='body-page--manage_form--table-col_address'>
                  " .$row['diachi']."
                  </td>
                  <td class='body-page--manage_form--table-col_phone'>
                  " .$row['sodienthoai']."
                  </td>
                  <td class='body-page--manage_form--table-col_note'>
                  " .$row['ghichu']."
                  </td>
                  <td class='body-page--manage_form--table-col_action'>
                      <div class='body-page--manage_form--table-col_action-form'>
                          <i class='far fa-edit edit-icon_action'><a href='index.php?page_layout=suanhanvien&id_nv=" .$row['msnv']."' class ='action_edit'>Sửa</a></i>
                          <i class='far fa-trash-alt delete-icon_action'><a href='xoaNhanVien.php?id_nv=" .$row['msnv']."' onClick='return xoaNhanVien();' class = 'action_delete'>Xóa</a></i>
                      </div>
                  </td>
                  </tr>";
          }
      }else{
      $rs.= "Không tìm thấy nhân viên";
    }
    echo $rs;
  }else {
      $sql="SELECT * from nhanvien Order by msnv ASC Limit 5";
      $result=mysqli_query($conn,$sql);
      $rs = "";
      foreach($result as $row){
          $rs.= "<tr class='body-page--manage_form--table-tr'>
          <td class='body-page--manage_form--table-col_id'>
              ".$row['msnv']."
          </td>
           <td class='body-page--manage_form--table-col_name'>
                         " .$row['hotennv']." 
          </td>
          <td class='body-page--manage_form--table-col_position'>
                         " .$row['chucvu']."
          </td>
          <td class='body-page--manage_form--table-col_address'>
          " .$row['diachi']."
          </td>
          <td class='body-page--manage_form--table-col_phone'>
          " .$row['sodienthoai']."
          </td>
          <td class='body-page--manage_form--table-col_note'>
          " .$row['ghichu']."
          </td>
          <td class='body-page--manage_form--table-col_action'>
              <div class='body-page--manage_form--table-col_action-form'>
                  <i class='far fa-edit edit-icon_action'><a href='index.php?page_layout=suanhanvien&id_nv=" .$row['msnv']."' class ='action_edit'>Sửa</a></i>
                  <i class='far fa-trash-alt delete-icon_action'><a href='xoaNhanVien.php?id_nv=".$row['msnv']."' onClick='return xoaNhanVien();' class = 'action_delete'>Xóa</a></i>
              </div>
          </td>
          </tr>";
      }
      echo $rs;
}


?>