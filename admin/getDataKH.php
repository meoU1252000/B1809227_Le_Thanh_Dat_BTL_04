<?php
include('./config.php');
$key=$_GET['key'];
if($key!=NULL){
    $sql="SELECT * from khachhang where mskh like '%$key%'";
    $result=mysqli_query($conn,$sql);
    $rs='';
      if(mysqli_num_rows($result)>0){
          foreach($result as $row){
                  $rs.= "<tr class='body-page--manage_form--table-tr'>
                  <td class='body-page--manage_form--table-col_id'>
                      ".$row['mskh']."
                  </td>
                   <td class='body-page--manage_form--table-col_name'>
                                 " .$row['hotenkh']." 
                  </td>
                  <td class='body-page--manage_form--table-col_name'>
                  " .$row['tencongty']." 
                 </td>
                 <td class='body-page--manage_form--table-col_address'>
                 " .$row['sofax']."
                 </td>
                  <td class='body-page--manage_form--table-col_phone'>
                                 " .$row['sodienthoai']."
                  </td>
                  <td class='body-page--manage_form--table-col_email'>
                  " .$row['email']."
                  </td>
                  <td class='body-page--manage_form--table-col_note'>
                  " .$row['ghichu']."
                  </td>
                  <td class='body-page--manage_form--table-col_action'>
                      <div class='body-page--manage_form--table-col_action-form'>
                          <i class='far fa-eye eyes-icon' ><a href='index.php?page_layout=diachikh&id_kh=".$row['mskh']."' class ='action_watch' >Xem Địa Chỉ</a></i>
                         <i class='far fa-edit edit-icon_action' style='margin-left:0px;'><a href='index.php?page_layout=suakhachhang&id_kh=" .$row['mskh']."' class ='action_edit' style ='margin-right:0px;'>Sửa</a></i>
                      </div>
                  </td>
                  </tr>";
          }
      }else{
      $rs.= "Không tìm thấy khách hàng";
    }
    echo $rs;
  }else {
      $sql="SELECT * from khachhang Order by mskh ASC Limit 5";
      $result=mysqli_query($conn,$sql);
      $rs = "";
      foreach($result as $row){
        $rs.= "<tr class='body-page--manage_form--table-tr'>
        <td class='body-page--manage_form--table-col_id'>
            ".$row['mskh']."
        </td>
         <td class='body-page--manage_form--table-col_name'>
                       " .$row['hotenkh']." 
        </td>
        <td class='body-page--manage_form--table-col_name'>
        " .$row['tencongty']." 
       </td>
       <td class='body-page--manage_form--table-col_address'>
       " .$row['sofax']."
       </td>
        <td class='body-page--manage_form--table-col_phone'>
                       " .$row['sodienthoai']."
        </td>
        <td class='body-page--manage_form--table-col_email'>
        " .$row['email']."
        </td>
        <td class='body-page--manage_form--table-col_note'>
        " .$row['ghichu']."
        </td>
        <td class='body-page--manage_form--table-col_action'>
            <div class='body-page--manage_form--table-col_action-form'>
                <i class='far fa-eye eyes-icon' ><a href='index.php?page_layout=diachikh&id_kh=".$row['mskh']."' class ='action_watch' >Xem Địa Chỉ</a></i>
               <i class='far fa-edit edit-icon_action' style='margin-left:0px;'><a href='index.php?page_layout=suakhachhang&id_kh=" .$row['mskh']."' class ='action_edit' style ='margin-right:0px;'>Sửa</a></i>
            </div>
        </td>
        </tr>";
      }
      echo $rs;
}


?>