<?php
include('./config.php');
$key=$_GET['key'];
if($key!=NULL){
    $sql="SELECT * from dathang where sodondh like '%$key%'";
    $result=mysqli_query($conn,$sql);
    $rs='';
      if(mysqli_num_rows($result)>0){
          foreach($result as $row){
                  $rs.= "<tr class='body-page--manage_form--table-tr'>
                  <td class='body-page--manage_form--table-col_id'>
                      ".$row['sodondh']."
                  </td>
                   <td class='body-page--manage_form--table-col_id'>
                                 " .$row['mskh']." 
                  </td>
                  <td class='body-page--manage_form--table-col_id'>
                                 " .$row['msnv']."
                  </td>
                  <td class='body-page--manage_form--table-col_orderdate'>
                  " .$row['ngaydh']."
                  </td>
                  <td class='body-page--manage_form--table-col_deliverydate'>
                  " .$row['ngaygh']."
                  </td>
                  <td class='body-page--manage_form--table-col_note'>
                  " .$row['ghichu']."
                  </td>
                  <td class='body-page--manage_form--table-col_status'>
                  " .$row['trangthaidh']."
                  </td>
                  <td class='body-page--manage_form--table-col_action'>
                      <div class='body-page--manage_form--table-col_action-form'>
                          <i class='far fa-edit edit-icon_action'><a href='index.php?page_layout=chitietdonhang&id_dh=" .$row['sodondh']."' class ='action_edit'>Sửa</a></i>
                          <i class='far fa-edit edit-icon_action'><a href='index.php?page_layout=suadonhang&id_dh=" .$row['sodondh']."' class ='action_edit'>Sửa</a></i>
                      </div>
                  </td>
                  </tr>";
          }
      }else{
      $rs.= "Không tìm thấy đơn hàng";
    }
    echo $rs;
  }else {
      $sql="SELECT * from dathang Order by sodondh ASC Limit 5";
      $result=mysqli_query($conn,$sql);
      $rs = "";
      foreach($result as $row){
        $rs.= "<tr class='body-page--manage_form--table-tr'>
        <td class='body-page--manage_form--table-col_id'>
            ".$row['sodondh']."
        </td>
         <td class='body-page--manage_form--table-col_id'>
                       " .$row['mskh']." 
        </td>
        <td class='body-page--manage_form--table-col_id'>
                       " .$row['msnv']."
        </td>
        <td class='body-page--manage_form--table-col_orderdate'>
        " .$row['ngaydh']."
        </td>
        <td class='body-page--manage_form--table-col_deliverydate'>
        " .$row['ngaygh']."
        </td>
        <td class='body-page--manage_form--table-col_note'>
        " .$row['ghichu']."
        </td>
        <td class='body-page--manage_form--table-col_status'>
        " .$row['trangthaidh']."
        </td>
        <td class='body-page--manage_form--table-col_action'>
            <div class='body-page--manage_form--table-col_action-form'>
                <i class='far fa-edit edit-icon_action'><a href='index.php?page_layout=chitietdonhang&id_dh=" .$row['sodondh']."' class ='action_edit'>Sửa</a></i>
                <i class='far fa-edit edit-icon_action'><a href='index.php?page_layout=suadonhang&id_dh=" .$row['sodondh']."' class ='action_edit'>Sửa</a></i>
            </div>
        </td>
        </tr>";
      }
      echo $rs;
}


?>