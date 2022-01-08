<?php
include('../config.php');
$key=$_GET['key'];
if($key!=NULL){
    $sql="SELECT * from hanghoa where mshh like '%$key%' ";
    $result=mysqli_query($conn,$sql);
    $rs='';
      if(mysqli_num_rows($result)>0){
          foreach($result as $row){
                  $rs.= "<tr class='body-page--manage_form--table-tr'>
                  <td class='body-page--manage_form--table-col_id'>
                      ".$row['mshh']."
                  </td>
                  <td class='body-page--manage_form--table-col_saleoff'>";
                      if($row['giamgia']>0){
                        $rs.=  ($row['giamgia']*100);
                        $rs.="%"; 
                       } else {
                       $rs.= "Không có khuyến mãi!";}
                  $rs.="</td>
                   <td class='body-page--manage_form--table-col_note'>
                                 ".$row['ghichu']." 
                  </td>
                  <td class='body-page--manage_form--table-col_action'>
                  <div class='body-page--manage_form--table-col_action-form'>
                      <i class='far fa-edit edit-icon_action'><a href='index.php?page_layout=suakhuyenmai&id_sp=" .$row['mshh']."' class ='action_edit'>Sửa</a></i>
                  </div>
                   </td>
                </tr>";
          }
      }else{
      $rs.= "Không tìm thấy khuyến mãi";
    }
    echo $rs;
  }else {
      $sql="SELECT * from hanghoa order by mshh ASC Limit 5";
      $result=mysqli_query($conn,$sql);
      $rs = "";
      foreach($result as $row){
        $rs.= "<tr class='body-page--manage_form--table-tr'>
                  <td class='body-page--manage_form--table-col_id'>
                      ".$row['mshh']."
                  </td>
                  <td class='body-page--manage_form--table-col_saleoff'>";
                      if($row['giamgia']>0){
                        $rs.=  ($row['giamgia']*100);
                        $rs.="%"; 
                       } else {
                       $rs.= "Không có khuyến mãi!";}
                  $rs.="</td>
                   <td class='body-page--manage_form--table-col_note'>
                                 ".$row['ghichu']." 
                  </td>
                  <td class='body-page--manage_form--table-col_action'>
                  <div class='body-page--manage_form--table-col_action-form'>
                      <i class='far fa-edit edit-icon_action'><a href='index.php?page_layout=suakhuyenmai&id_sp=" .$row['mshh']."' class ='action_edit'>Sửa</a></i>
                  </div>
                   </td>
                </tr>";
    }
      echo $rs;
}


?>