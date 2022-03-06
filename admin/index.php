<?php
session_start();
include_once './config.php';
//tiến hành kiểm tra là người dùng đã đăng nhập hay chưa
//nếu chưa, chuyển hướng người dùng ra lại trang đăng nhập
if (!isset($_SESSION['admin'])) {
    header('location: ./dangnhap.php');
} else {
    $kt = mysqli_query($conn, "SELECT * from thongtindoanhnghiep");
    if(mysqli_num_rows($kt)>0){
        $row = mysqli_fetch_array($kt);
    }
    /*$id_nv = $_SESSION['id_nv'];
    $sql_role = "SELECT * from chitietquyentruycap where id_nv = '$id_nv'";
    $query_role =mysqli_query($conn,$sql_role);*/

}
?>

<!DOCTYPE html>
<html lang="en",lang="vni">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Quan Ly Admin</title>
    <link rel="stylesheet" href="../assests/css/admin.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="../assests/fontawesome-free-5.15.3-web/css/all.min.css">
    <link rel="stylesheet" href="../assests/css/quanly.css">
    <link rel="stylesheet" href="../assests/css/chucnang.css">
    <link rel="stylesheet" href="../assests/css/introduce.css">
    <link rel="stylesheet" href="../assests/css/info.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
   

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        body{
            background-color: #EEE;
        }
        table,
        td,
        th {
            border: 1px solid black;
        }
        html{
            font-family: 'Roboto', sans-serif;
           box-sizing: border-box;
        }
    </style>

  
</head>
<body>
<div class="header-page">
        <div class="header-page--name">
        </div>
        <div class="header-page--login">
          <?php   if(mysqli_num_rows($kt)>0) {?>
            <span class="header-page--login_welcome">Xin chào, </span>
            <span class="header-page--login_welcome"><?php echo $row['tenadmin'] ?></span>
            <img src="./<?php echo $row['hinhanh']; ?>" alt="" class="user_img">
            <i class="fas fa-angle-down angle-down header-icon">
                <div class="header-page--login_function">
                     <a href="index.php?page_layout=addinfo" class="header-page--user_function">
                        <i class="fas fa-user user_icon"></i>
                        <span>Thông Tin Doanh Nghiệp</span>
                    </a>
                    <a href="dangxuat.php" class="header-page--user_function">
                        <i class="fas fa-sign-out-alt logout_icon"></i>
                        <span>Đăng Xuất</span>
                    </a>
                </div>
            </i>
            <?php } else {?>
                <span class="header-page--login_welcome">Xin chào, </span>
            <span class="header-page--login_welcome">Admin</span>
            <img src="../assests/img/user.png" alt="" class="user_img">
            <i class="fas fa-angle-down angle-down header-icon">
                <div class="header-page--login_function">
                     <a href="index.php?page_layout=addinfo" class="header-page--user_function">
                        <i class="fas fa-user user_icon"></i>
                        <span>Thông Tin Doanh Nghiệp</span>
                    </a>
                    <a href="dangxuat.php" class="header-page--user_function">
                        <i class="fas fa-sign-out-alt logout_icon"></i>
                        <span>Đăng Xuất</span>
                    </a>
                </div>
            </i>
            <?php }?>
        </div>

    </div>

    <div class="body-page">
        <div class="body-page--aside">
            <div class="body-page--aside_logo">
                <img src="../assests/img/banner/p3.png" alt="" class="logo-page">
            </div>
            <div class="body-page--aside_admin">
                <a href="index.php?page_layout=introduce" class="body-page--aside_admin--link">
                    <i class="fas fa-home icon--aside icon-home"></i>
                    <span class="body-page--aside_admin--name">Trang Chủ Quản Trị</span>
                </a>
            </div>
            <?php  
              while($row_role = mysqli_fetch_array($query_role)){
                    $id_role = $row_role['id_role'];
                    if($id_role == 1){
                      
            ?>
            <div class="body-page--aside_members">
                <div class="body--aside_wrap">
                    <a href="index.php?page_layout=nhanvien" class="body-page--aside_admin--link">
                        <i class="fas fa-user icon--aside angle-down"></i>
                        <span class="body-page--aside_members--name">Quản Lý Nhân Viên</span>
                    </a>
                    <div class="body--aside_wrap_son">
                        <ul class="body--aside_wrap_son--ul">
                            <li class="body--aside_wrap_son--li">
                                <i class="fas fa-user-plus add-icon"></i>
                                <a href="index.php?page_layout=themnhanvien"
                                    class="body-page--aside_admin--link_son">
                                    <span class="body-page--aside_name-son">Thêm Nhân Viên</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php  }else if($id_role == 3){?>
            <div class="body-page--aside_list">
                <div class="body--aside_wrap">
                    <a href="index.php?page_layout=danhmuc" class="body-page--aside_admin--link">
                        <i class="fas fa-list angle-down"></i>
                        <span class="body-page--aside_list--name ">Quản Lý Danh Mục</span>
                    </a>
                    <div class="body--aside_wrap_son">
                        <ul class="body--aside_wrap_son--ul">
                            <li class="body--aside_wrap_son--li">
                                <i class="fas fa-folder-plus add-icon"></i>
                                <a href="index.php?page_layout=themdanhmuc" class="body-page--aside_admin--link_son">
                                    <span class="body-page--aside_name-son">Thêm Danh Mục</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
            <?php }else if($row_role['id_role'] == 2){?>

            <div class="body-page--aside_item">
                <div class="body--aside_wrap">
                    <a href="index.php?page_layout=sanpham" class="body-page--aside_admin--link">
                         <i class="fas fa-store angle-down"></i>
                        <span class="body-page--aside_item--name">Quản Lý Sản Phẩm</span>
                    </a>
                    <div class="body--aside_wrap_son">
                        <ul class="body--aside_wrap_son--ul">
                            <li class="body--aside_wrap_son--li">
                                <i class="fas fa-plus-circle add-icon"></i>
                                <a href="index.php?page_layout=themsanpham" class="body-page--aside_admin--link_son">
                                    <span class="body-page--aside_name-son">Thêm Sản Phẩm</span>
                                </a>
                            </li>
                            <li class="body--aside_wrap_son--li">
                                <i class="far fa-images add-icon"></i>
                                <a href="index.php?page_layout=themhinhanh" class="body-page--aside_admin--link_son">
                                    <span class="body-page--aside_name-son">Thêm Hình Sản Phẩm</span>
                                </a>
                            </li>
                            <li class="body--aside_wrap_son--li">
                                <i class="fas fa-digital-tachograph add-icon"></i>
                                <a href="index.php?page_layout=themchitietsp" class="body-page--aside_admin--link_son">
                                    <span class="body-page--aside_name-son">Thêm Chi Tiết Sản Phẩm</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php }else if($row_role['id_role'] == 4){?>
                
            <div class="body-page--aside_customers">
                <div class="body--aside_wrap">
                    <a href="index.php?page_layout=khachhang" class="body-page--aside_admin--link" >
                         <i class="fas fa-id-card angle-down"></i>
                        <span class="body-page--aside_customers--name">Quản Lý Khách Hàng</span>
                    </a>
                    
                </div>
            <?php }else if($row_role['id_role'] == 5){ ?>
                <div class="body-page--aside_list">
                    <div class="body--aside_wrap">
                        <a href="index.php?page_layout=donhang" class="body-page--aside_admin--link">
                            <i class="fas fa-shipping-fast angle-down"></i>
                            <span class="body-page--aside_list--name ">Quản Lý Đơn Hàng</span>
                        </a>
                     
                    </div>

                </div>
            <?php }else if($row_role['id_role'] == 6) {?>
                <div class="body-page--aside_list">
                    <div class="body--aside_wrap">
                        <a href="index.php?page_layout=khuyenmai" class="body-page--aside_admin--link">
                            <i class="fas fa-tags angle-down"></i>
                            <span class="body-page--aside_list--name ">Quản Lý Khuyến Mãi</span>
                        </a>
                    </div>
                </div>
            </div>
            <?php }} ?>
            <div class="body-page--aside_logout body-page--aside_logout-seperate">
                <a href="dangxuat.php" class="body-page--aside_admin--link">
                    <i class="fas fa-power-off angle-down"></i>
                    <span class="body-page--aside_logout--name">Đăng Xuất</span>
                </a>
            </div>
        </div>
        <div class="body-page--content">
           <?php
           //master page
           if(isset($_GET["page_layout"])){
              switch($_GET["page_layout"]){
                  case 'nhanvien':include_once './nhanvien.php';
                     break;
                  case 'danhmuc':include_once './danhmuc.php';
                     break;
                  case 'introduce':include_once './introduce.php';
                     break;
                  case 'themnhanvien':include_once './themnhanvien.php';
                     break;
                  case 'suanhanvien':include_once './suanhanvien.php';
                     break;
                  case 'themdanhmuc':include_once './themdanhmuc.php';
                     break;
                   case 'suadanhmuc':include_once './suadanhmuc.php';
                     break;
                   case 'sanpham' :include_once './sanpham/sanpham.php';
                     break;
                   case 'themsanpham':include_once './sanpham/themsanpham.php';
                     break;
                   case 'suasanpham' :include_once './sanpham/suasanpham.php';
                     break;
                   case 'khachhang' :include_once './khachhang.php';
                     break;
                     case 'suakhachhang' : include_once './suakhachhang.php';
                     break;
                   case 'donhang' :include_once './donhang.php';
                     break;
                    case 'chitietdonhang' :include_once './chitietdonhang.php';
                     break;
                     case 'thongtindathang' :include_once './thongtindathang.php';
                     break;
                    case 'addinfo' :include_once './addinfo.php';
                     break;
                     case 'khuyenmai' : include_once './sanpham/khuyenmai.php';
                     break;
                     case 'suakhuyenmai' : include_once './sanpham/suakhuyenmai.php';
                     break;
                     case 'suadonhang' : include_once './suadonhang.php';
                     break;
                    case 'hinhanh': include_once './sanpham/hinhanhsp.php';
                    break;
                    case 'themhinhanh': include_once './sanpham/themhinhanhsp.php';
                    break;
                    case 'suahinhanh': include_once './sanpham/suahinhanh.php';
                    break;
                    case 'diachikh': include_once './xemdiachikh.php';
                    break;
                    case 'chitietsp': include_once './sanpham/chitietsp.php';
                    break;
                    case 'themchitietsp': include_once './sanpham/themchitietsp.php';
                    break;
                    case 'suachitietsp': include_once './sanpham/suachitietsp.php';
                    break;
                    case 'doanhthu' : include_once './doanhthu.php';
                    break;

                }
           } 
           else{ 
                include_once './introduce.php';
      
           }
         ?>
         
        </div>
    </div>
</body>
</html>
