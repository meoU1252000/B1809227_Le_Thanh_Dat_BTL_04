<?php
include_once './config.php';
if (!isset($_SESSION['admin'])) {
    header('location: ./dangnhap.php');
}else{
    $nv = mysqli_query($conn, "SELECT Count(msnv) as SLNV from nhanvien ");
    $kh = mysqli_query($conn, "SELECT Count(mskh) as SLKH from khachhang ");
    $sp = mysqli_query($conn, "SELECT Count(mshh) as SLHH from hanghoa ");
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $date=date("m");
    $query = mysqli_query($conn, "SELECT * from dathang where trangthaidh = 'Đã Giao' and month(ngaygh) = '$date'");
}
?>

<div class="body-page--introduce">
    <span class="body-page--introduce_title">Trang Chủ Quản Trị</span>
    
    <div class="body-page--introduce_summary">
         <?php 
                $row = mysqli_fetch_array($nv)
         ?>
        <table class="form1" cellpadding="0" ,cellspacing="0">
            <tr class="form_tr">
                <th class="form_th" rowspan="3" colspan="2"> <i class="fas fa-user icon"></i></th>
            </tr>
            <tr class="form_tr">
                <td class="form_td"> <?php echo $row['SLNV']; ?> </td>
            </tr>
            <tr class="form_tr">
                <td class="form_td">Nhân Viên</td>
            </tr>
        </table>
      

          <?php 
               $row = mysqli_fetch_array($kh);
         ?>
        <table class="form2" cellpadding="0" ,cellspacing="0">
            <tr class="form_tr">
                <th class="form_th" rowspan="3" colspan="2"> <i class="fas fa-users icon"></i></th>
            </tr>
            <tr class="form_tr">
                <td class="form_td"><?php echo $row['SLKH']; ?></td>
            </tr>
            <tr class="form_tr">
                <td class="form_td">Khách Hàng</td>
            </tr>
        </table>
        
        <?php 
                $row = mysqli_fetch_array($sp);
         ?>
        <table class="form3" cellpadding="0" ,cellspacing="0">
            <tr class="form_tr">
                <th class="form_th" rowspan="3" colspan="2"> <i class="fas fa-shopping-cart icon"></i></th>
            </tr>
            <tr class="form_tr">
                <td class="form_td"><?php echo $row['SLHH']; ?></td>
            </tr>
            <tr class="form_tr">
                <td class="form_td">Sản Phẩm</td>
            </tr>
        </table>
   
        <table class="form4" cellpadding="0" ,cellspacing="0">
            <tr class="form_tr">
                <th class="form_th" rowspan="3" colspan="2"> <i class="fas fa-dollar-sign icon"></i></th>
            </tr>
            <tr class="form_tr">
                <td class="form_td"><?php  if(mysqli_num_rows($query)>0){
                                               while ($row = mysqli_fetch_array($query)){
                                                   $id_dh = $row['sodondh'];
                                                   $doanhthu = mysqli_query($conn, "SELECT SUM(giadathang) as doanhthu  from chitietdathang where sodondh= '$id_dh' ");
                                                   $rowdt = mysqli_fetch_array($doanhthu);
                                               }
                                               echo number_format($rowdt['doanhthu']);
                                            }else{echo 0;}  ?> </td>
            </tr>
            <tr class="form_tr">
                <td class="form_td" style="line-height:24px;">Doanh Thu Tháng Hiện Tại</td>
            </tr>
        </table>
  
    </div>
    <div class="body-page--introduce_introduce">
        <div class="body-page--introduce_introduce--title">
            <div class="body-page--introduce-seperate1"></div>
            <span class="title"> Giới Thiệu</span>
            <div class="body-page--introduce-seperate"></div>
            <div class="body-page-introduce_form">
                <span class="content">Đây là Hệ Thống Quản Trị của Website PerfumeShop do sinh viên Lê Thành Đạt - Mã số
                    sinh viên B1809227 của trường Đại học Cần Thơ xây dựng</span>
                <ul class="function">
                    Hệ Thống Quản Trị này có các chức năng chính như sau:
                    <li class="li">Quản Lý Nhân Viên</li>
                    <li class="li"> Quản Lý Danh Mục</li>
                    <li class="li">Quản Lý Sản Phẩm</li>
                    <li class="li">Quản Lý Khách Hàng</li>
                    <li class="li">Quản Lý Đơn Hàng</li>
                    <li class="li">Quản Lý Khuyến Mãi</li>
                </ul>
                <span class="content">Hệ Thống thuộc quyền sở hữu của PerfumeShop. Nghiêm cấm các hành vi sao chép.</span>
            </div>
        </div>
    </div>
</div>
<?php mysqli_close($conn); ?>