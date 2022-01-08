<?php
include('../config.php');
$key=$_GET['key'];
if($key!=NULL){
    $sql="SELECT * from hanghoa where tenhh like '%$key%' order by mshh ";
    $result=mysqli_query($conn,$sql);
    $rs='';
      if(mysqli_num_rows($result)>0){
          foreach($result as $row){
                  $rs.= "<tr class='body-page--manage_form--table-tr'>
                  <td class='body-page--manage_form--table-col_id'>
                      ".$row['mshh']."
                  </td>
                  <td class='body-page--manage_form--table-col_id'>
                      ".$row['maloaihang']."
                  </td>
                   <td class='body-page--manage_form--table-col_name'>
                                 " .$row['tenhh']." 
                  </td>
                  <td class='body-page--manage_form--table-col_specifications'>
                                 " .$row['quycach']."
                  </td>
                  <td class='body-page--manage_form--table-col_prices'>
                  " .number_format($row['gia'])."
                  </td>
                  <td class='body-page--manage_form--table-col_quantity'>
                  " .$row['soluonghang']."
                  </td>
                  <td class='body-page--manage_form--table-col_quantity'>
                  " .$row['soluongdaban']."
                  </td>
                  <td class='body-page--manage_form--table-col_action'>
                  <div class='body-page--manage_form--table-col_action-form'>
                      <i class='far fa-eye eyes-icon'><a href='index.php?page_layout=hinhanh&id_sp=" .$row['mshh']."' class ='action_watch'>Xem Hình Ảnh</a></i>
                      <i class='far fa-edit edit-icon_action'><a href='index.php?page_layout=suasanpham&id_sp=" .$row['mshh']."' class ='action_edit'>Sửa</a></i>
                      <i class='far fa-eye eyes-icon'><a href='index.php?page_layout=chitietsp&id_sp=" .$row['mshh']."' class ='action_watch'>Chi Tiết Sản Phẩm</a></i>
                      <i class='far fa-trash-alt delete-icon_action'><a href='xoasanpham.php?id_sp=&id_sp=" .$row['mshh']."' onClick='return xoaSanPham();' class = 'action_delete'>Xóa</a></i>        
                  </div>
                  
              </td>
                  </tr>";
          }
      }else{
      $rs.= "Không tìm thấy sản phẩm";
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
        <td class='body-page--manage_form--table-col_id'>
            ".$row['maloaihang']."
        </td>
         <td class='body-page--manage_form--table-col_name'>
                       " .$row['tenhh']." 
        </td>
        <td class='body-page--manage_form--table-col_specifications'>
                       " .$row['quycach']."
        </td>
        <td class='body-page--manage_form--table-col_prices'>
        " .number_format($row['gia'])."
        </td>
        <td class='body-page--manage_form--table-col_quantity'>
        " .$row['soluonghang']."
        </td>
        <td class='body-page--manage_form--table-col_quantity'>
        " .$row['soluongdaban']."
        </td>
        <td class='body-page--manage_form--table-col_action'>
        <div class='body-page--manage_form--table-col_action-form'>
            <i class='far fa-eye eyes-icon'><a href='index.php?page_layout=hinhanh&id_sp=" .$row['mshh']."' class ='action_watch'>Xem Hình Ảnh</a></i>
            <i class='far fa-edit edit-icon_action'><a href='index.php?page_layout=suasanpham&id_sp=" .$row['mshh']."' class ='action_edit'>Sửa</a></i>
            <i class='far fa-eye eyes-icon'><a href='index.php?page_layout=chitietsp&id_sp=" .$row['mshh']."' class ='action_watch'>Chi Tiết Sản Phẩm</a></i>
            <i class='far fa-trash-alt delete-icon_action'><a href='xoasanpham.php?id_sp=&id_sp=" .$row['mshh']."' onClick='return xoaSanPham();' class = 'action_delete'>Xóa</a></i>        
        </div>
        
    </td>
        </tr>";
    }
      echo $rs;
}


?>