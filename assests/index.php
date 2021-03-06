<?php
session_start();
include('../admin/config.php');
ob_start();

if(isset($_REQUEST['page'])){
    $page=$_REQUEST['page'];
} else{
    $page=1;
}
$rowsPerPage=10;
$perRow=$page*$rowsPerPage-$rowsPerPage;
$result = mysqli_query($conn, "SELECT * from HangHoa  ORDER BY mshh ASC LIMIT $perRow,$rowsPerPage");
$totalRows=mysqli_num_rows(mysqli_query($conn,"SELECT * from HangHoa"));
$totalPages = ceil($totalRows/$rowsPerPage);
$nextPage="";
$previous = "";
for($i=1;$i<=$totalPages;$i++){
    if($page == $i && $page >1 && $page <$totalPages && $totalPages > 1 ){
        $previous = '<a class="home-filter_page-btn" href="index.php?page='.($page-1).'"> <i class="home-filter_page-icon fas fa-angle-left"></i></a>';
        $nextPage = '<a class="home-filter_page-btn" href="index.php?page='.($page+1).'"> <i class="home-filter_page-icon fas fa-angle-right"></i></a>';
    } else if($page==1 && $totalPages > 1){
        $previous='<a class="home-filter_page-btn home-filter_page-btn--disabled" href="index.php?page='.$page.'" style="pointer-events: none;"><i class="home-filter_page-icon fas fa-angle-left"></i></a>';
        $nextPage='<a class="home-filter_page-btn" href="index.php?page='.($page+1).'"><i class="home-filter_page-icon fas fa-angle-right"></i></a>';
    } else if($page == $totalPages && $totalPages > 1){
        $previous = '<a class="home-filter_page-btn" href="index.php?page='.($page-1).'"> <i class="home-filter_page-icon fas fa-angle-left"></i></a>';
        $nextPage='<a class="home-filter_page-btn home-filter_page-btn--disabled" href="index.php?page='.$page.'" style="pointer-events: none;"><i class="home-filter_page-icon fas fa-angle-right"></i></a>';
    } else if($page==1 && $totalPages == 1){
        $previous = '<a class="home-filter_page-btn home-filter_page-btn--disabled" href="index.php?page='.$page.'" style="pointer-events: none;"> <i class="home-filter_page-icon fas fa-angle-left"></i></a>';
        $nextPage='<a class="home-filter_page-btn home-filter_page-btn--disabled" href="index.php?page='.$page.'" style="pointer-events: none;"><i class="home-filter_page-icon fas fa-angle-right"></i></a>';
    }
   
}


$sp = mysqli_query($conn,"SELECT * from HangHoa");
$dm = mysqli_query($conn,"SELECT * from LoaiHangHoa ORDER BY tenloaihang ASC");
$infoshop = mysqli_query($conn,"SELECT * from thongtindoanhnghiep");
$rowinfoshop = mysqli_fetch_array($infoshop);

$listPage="";
if(isset($_REQUEST['ten_dm'])){
    $ten_dm=$_REQUEST['ten_dm'];
    $query = mysqli_query($conn,"SELECT maloaihang as id_dm  from loaihanghoa where tenloaihang = '$ten_dm'");
    $rowid= mysqli_fetch_array($query);
    $id_dm = $rowid['id_dm'];
    $sp_dm = mysqli_query($conn,"SELECT * from HangHoa where maloaihang = '$id_dm'");
} else{
    $ten_dm="";
}

while($row=mysqli_fetch_array($dm)){
    $name = $row['tenloaihang'];
        if($ten_dm == $name){
             $listPage.='<a name"danhmuc" class="category-item--active" href="index.php?page_layout=danhmuc&ten_dm='.$ten_dm.'">'.$name.'</a>';
        } else{
             $listPage.='<a name="danhmuc" class="category-item" href="index.php?page_layout=danhmuc&ten_dm='.$name.'">'.$name.'</a>';
         }
}

ob_flush();

?>

<!DOCTYPE html>
<html lang="en" ,lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le Perfume Shop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./fontawesome-free-5.15.3-web/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="./javascript/main.js"></script>
   
</head>

<body>
    <div class="app">
        <header class="header">
            <header class="header_follow">
            <div class="grid">
                <nav class="header_navbar">
                    <ul class="header_navbar-list">
                        <li class="header_navbar-item header_navbar-item--separate">Li??n h??? t?? v???n: <span
                                class="header_navbar-infor"><?php echo $rowinfoshop['sodienthoai']; ?></span></li>
                        <li class="header_navbar-item">?????a ch???: <span class="header_navbar-infor"><?php echo $rowinfoshop['diachi'];?></span></li>
                    </ul>
                    <ul class="header_navbar-list">
                        <li class="header_navbar-item">
                            <a href="" class="header_navbar-item-link">V??? ch??ng t??i</a>
                        </li>
                        <li class="header_navbar-item">
                            K???t n???i
                            <a href="https://www.facebook.com/meo.u.it.student/" target="_blank"
                                class="header_navbar-icon-link">
                                <i class="header_navbar-icon header_navbar-icon-link:hover fab fa-facebook"></i></a>
                        </li>
                        <?php if (!isset($_SESSION['username'])) {
                               
                           ?>
                        <li class="header_navbar-item header_navbar-item--strong header_navbar-item--separate">
                            <a href="" class="header_navbar-item--signin" onfocus="return showModalSignIn();">????ng
                                nh???p</a>
                        </li>
                        <li class="header_navbar-item header_navbar-item--strong">
                            <a href="" class="header_navbar-item--signup" onfocus="return showModalSignUp();">????ng
                                k??</a>
                        </li> <?php } else {
                            $username =$_SESSION['username'];
                            $user=mysqli_query($conn,"SELECT * from KhachHang where tendangnhap='$username'");
                            $rowuser = mysqli_fetch_array($user);?>
                        <li class="header_navbar-item header_navbar-user">
                           <img src="./img/user.png" alt="" class="header_navbar-user-avatar">
                           <span class="header_navbar-user-name"><?php echo $rowuser['tendangnhap'] ?></span>
                           <ul class="header_navbar-user-menu">
                               <li class="header_navbar-user-item">
                                   <a href="index.php?page_layout=user">T??i Kho???n</a>
                               </li>
                               <li class="header_navbar-user-item"> <a href="index.php?page_layout=diachi">?????a Ch???</a></li>
                               <li class="header_navbar-user-item"> <a href="index.php?page_layout=donhang">????n H??ng c???a t??i</a></li>
                               <li class="header_navbar-user-item"> <a href="signout.php">????ng Xu???t</a></li>
                           </ul>
                        </li>
                        <?php }?>
                    </ul>
                </nav>
                <div class="header-with-search">
                    <div class="header_logo">
                        <a href="index.php" rel="home">
                            <h1>Le Perfume</h1>
                        </a>
                    </div>
                    <div class="header_search">
                        <div class="header_search-input-wrap">
                            <form action="" method="POST" name="sform" style="height: 100%;">
                               <input class="header_search-input"  placeholder="Nh???p th??ng tin s???n ph???m c???n t??m ki???m" type="search" name="keyword" oninput="getSearch(value);">
                            </form>
                        </div>
                        <button type="submit" class="header_search-btn" id = "search">
                            <i class="header_search-btn-icon fas fa-search"></i>
                        </button>
                    </div>

                    <div class="header_cart">
                        <div class="header_cart-wrap">
                    
                            <i class="header_cart-icon fas fa-cart-plus"></i>
                            <span class="header_cart-notice">
                            <?php 
                              if(isset($_SESSION['giohang'])){
                                  echo count($_SESSION['giohang']);
                             } else echo 0;
                            ?>
                            </span> 
                            <!--No Cart: header_cart-list--no-cart-->
                            <div class="header_cart-list">
                                <?php if(!isset($_SESSION['giohang']) || count($_SESSION['giohang']) == 0 ){ ?>
                                <!--header_cart-list--no-cart-->
                                <img src="./img/no-cart.png" alt="Ch??a c?? h??nh ???nh"
                                    class="header_cart-list--no-cart-img">
                                <span class="header_cart-list--no-cart-msg">Ch??a c?? s???n ph???m trong gi??? h??ng</span> 
                                <?php } else { 
                                      $arrID = array();
                                      foreach($_SESSION['giohang'] as $id_sp => $so_luong){
                                          $arrID[]=$id_sp;
                                      }
                                      $strID = implode(',', $arrID);
                                      $giohang = "SELECT * FROM HangHoa where mshh IN ($strID) ORDER BY mshh DESC";
                                      $querygiohang = mysqli_query($conn,$giohang);
                                ?>
                                <h4 class="header_cart-heading">S???n Ph???m ???? Th??m V??o Gi???</h4>
                                <div class="header_cart-list-item_limit">
                                <?php  
                                        while($row = mysqli_fetch_array($querygiohang)){ 
                                             $Price = ($row ['gia'] - ($row['gia'] * $row['giamgia']));
                                             $madanhmuc = $row['maloaihang'];
                                             $id_hh = $row['mshh'];
                                             $queryhinhanh = mysqli_query($conn,"SELECT * from hinhhanghoa where mshh = '$id_hh' order by mahinh ASC limit 1");
                                             $rowhinhanh = mysqli_fetch_array($queryhinhanh);
                                ?>
                               
                                <ul class="header_cart-list-item">
                                    <li class="header_cart-item">
                                        <img src="./<?php echo $rowhinhanh['tenhinh'];?>" alt="" class="header_cart-img">
                                        <div class="header_cart-list-item-info">
                                            <div class="header_cart-item-head">
                                                <h5 class="header_cart-item-name"><?php echo $row['tenhh'];?></h5>
                                                <a href="xoahangindex.php?MSHH=<?php echo $row['mshh']?>" class="header_cart-item-remove">X??a</a>
                                            </div>

                                            <div class="header_cart-item-wrap">
                                                <span class="header_cart-item-price"><?php echo number_format($Price); ?></span><span class="home-detailproduct_heading_price--type" style="color: var(--primary-color);">???</span>
                                                
                                                <span class="header_cart-item-multiply">x</span>
                                                <span class="header_cart-item-quantity"><?php echo $_SESSION['giohang'][$row['mshh']] ;?></span>
                                            </div>

                                            <div class="header_cart-item-body">
                                                <span class="header_cart-item-description">
                                                    Ph??n lo???i: <?php $id_danhmuc =mysqli_query($conn,"SELECT * from LoaiHangHoa where maloaihang ='$madanhmuc'");$rowdanhmuc=mysqli_fetch_array($id_danhmuc); $tendanhmuc = $rowdanhmuc['tenloaihang']; echo $tendanhmuc;?>
                                                </span>
                                            </div>
                                        </div>
                                    </li>
                                    <?php }?>
                                </ul>
                                </div>
                                <a href="index.php?page_layout=giohang" class="header_cart-view-cart btn btn--primary">Xem Gi??? H??ng</a> 
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            </header>
        </header>
    </div>
    <div class="header_banner">
        <div class="header_banner--content">
          <img src="./img/banner/dior1.jpg" alt="" class="header_banner--content_img">
          <img src="./img/banner/banner1.jpg" alt="" class="header_banner--content_img">
          <img src="./img/banner/kilian.jpg" alt="" class="header_banner--content_img">
          <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
          <a class="next" onclick="plusSlides(1)">&#10095;</a>
          <div style="text-align:center;position: absolute;color: white;bottom: 0;right: 0;left: 0;width: 100%;">
              <span class="dot" onclick="currentSlide(1)" style="width:24px;height:24px;"></span> 
              <span class="dot" onclick="currentSlide(2)" style="width:24px;height:24px;"></span> 
              <span class="dot" onclick="currentSlide(3)" style="width:24px;height:24px;"></span> 
          </div>
        </div>
    </div>
    <script>
       var myIndex = 0;
       carousel();
       function carousel() {
            var i;
            var x = document.getElementsByClassName("header_banner--content_img");
            var dots = document.getElementsByClassName("dot");
            for (i = 0; i < x.length; i++) {
              x[i].style.display = "none";  
            }
            for (i = 0; i < dots.length; i++) {
              dots[i].className = dots[i].className.replace(" active", "");
            }
            myIndex++;
            if (myIndex > x.length) {myIndex = 1}    
            x[myIndex-1].style.display = "block";  
            dots[myIndex-1].className += " active";
            setTimeout(carousel, 4000); // Change image every 2 seconds
        }
        var slideIndex = 1;
        showSlides(slideIndex);
        
        function plusSlides(n) {
          showSlides(slideIndex += n);
        }
        
        function currentSlide(n) {
          showSlides(slideIndex = n);
        }
        
        function showSlides(n) {
          var i;
          var slides = document.getElementsByClassName("header_banner--content_img");
          var dots = document.getElementsByClassName("dot");
          if (n > slides.length) {slideIndex = 1}    
          if (n < 1) {slideIndex = slides.length}
          for (i = 0; i < slides.length; i++) {
              slides[i].style.display = "none";  
          }
          for (i = 0; i < dots.length; i++) {
              dots[i].className = dots[i].className.replace(" active", "");
          }
          slides[slideIndex-1].style.display = "block";  
          dots[slideIndex-1].className += " active";
        }
    </script>
    <div class="app_container">
    <?php 
     if(isset($_GET["page_layout"])){
        switch($_GET["page_layout"]){
            case 'giathapdencao':include_once './giathapdencao.php';
               break;
            case 'giacaodenthap':include_once './giacaodenthap.php';
            break;
            case 'danhmuc' :include_once './sapxeptheodanhmuc.php';
            break;
            case 'moinhat' :include_once './moinhat.php';
            break;
            case 'conhang' :include_once './conhang.php';
            break;
            case 'giohang' :include_once './giohang.php';
            break;
            case 'user':include_once './userinfo.php';
            break;
            case 'sanpham' :include_once './chitietsp.php';
            break;
            case 'thanhtoan' :include_once './thanhtoan.php';
            break;
            case 'donhang' :include_once './donhanguser.php';
            break;
            case 'chitietdonhang' :include_once './chitietdh.php';
            break;
            case 'banchay' :include_once './banchay.php';
            break;
            case 'diachi' :include_once './diachi.php';
            break;
            case 'themdiachi' :include_once './themdiachi.php';
            break;
            case 'suadiachi' :include_once './suadiachi.php';
            break;
          }
     } else {
    ?>
   
     <div class="grid">
            <div class="grid_row app_content">
                <div class="grid_column-2">
                    <nav class="category">
                        <h3 class="category_heading">
                            <i class="fas fa-list-ul category_heading-icon"></i>
                            Danh m???c
                        </h3>

                        <ul class="category-list">
                            <li class="category-item_link">
                                <?php echo $listPage;?>
                            </li>

                        </ul>

                    </nav>
                </div>

                <div class="grid_column-10">
                    <div class="home-filter">
                        <span class="home-filter_label">S???p x???p theo</span>
                        <a href="index.php" class="home-filter_btn btn btn--primary ">M???c ?????nh</a>
                        <a href="index.php?page_layout=moinhat" class="home-filter_btn btn">M???i nh???t</a>
                        <a href="index.php?page_layout=banchay" class="home-filter_btn ">B??n ch???y</a>
                        <a href="index.php?page_layout=conhang" class="home-filter_btn ">C??n H??ng</a>
                        <div class="select-input">
                            <span class="select-input_label">Gi??</span>
                            <i class="fas fa-angle-down select-input_icon"></i>
                            <!--List Option-->
                            <ul class="select-input_list">
                                <li class="select-input_item">
                                    <a href="index.php?page_layout=giathapdencao" class="select-input_link" name ="lowtohigh">Gi??: Th???p ?????n Cao</a>
                                </li>
                                <li class="select-input_item">
                                    <a href="index.php?page_layout=giacaodenthap" class="select-input_link" name = "hightolow">Gi??: Cao ?????n Th???p</a>
                                </li>
                            </ul>
                        </div>
                        <div class="home-filter_page">
                            <div class="home-filter_page-num">
                                <span class="home-filter_page-current">
                                    <?php echo $page;?>
                                </span>/
                                <?php echo $totalPages;?>

                            </div>
                            <div class="home-filter_page-control">

                                <?php
                                    echo $previous;
                                    echo $nextPage; 
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="home-product">
                        <script>
                            var xmlhttp;
                            function getSearch(a){
                              xmlhttp=GetXmlHttpObject();
                              null==xmlhttp?alert("Tr??nh duy???t kh??ng h??? tr??? HTTP Request"):(xmlhttp.onreadystatechange=stateChanged,xmlhttp.open("GET","./getData/getData.php?key="+a,!0),xmlhttp.send(null))
                            }
                            function stateChanged(){
                              4==xmlhttp.readyState&&(document.getElementById("result").innerHTML=xmlhttp.responseText)
                            }
                            function GetXmlHttpObject(){
                              return window.XMLHttpRequest?new XMLHttpRequest:window.ActiveXObject?new ActiveXObject("Microsoft.XMLHTTP"):null
                            }
                        </script>
                        <div class="grid_row" id="result" >
                            <?php 
                                     while($row = mysqli_fetch_array($result)){
                                        $id_hh = $row['mshh'];
                                        $queryhinhanh = mysqli_query($conn,"SELECT * from hinhhanghoa where mshh = '$id_hh' order by mahinh ASC limit 1");
                                        $rowhinhanh = mysqli_fetch_array($queryhinhanh);
                            ?>
                            <div class="grid_column-2-4" >
                                <div class="home-product-item">
                                    <div class="home-product-item_img"
                                        style="background-image: url(<?php echo $rowhinhanh['tenhinh'] ?>);"></div>
                                    <h4 class="home-product-item_name" >
                                        <a href="index.php?page_layout=sanpham&id_sp=<?php echo $row['mshh'];?>"><?php echo $row['tenhh'];?></a>
                                    </h4>
                                    <h4 class="home-product-item_detail">
                                        <?php echo $row['quycach'] ?>
                                    </h4>
                                    <div class="home-product-item_price">
                                        <?php if($row['giamgia']>0){ ?>
                                        <span class="home-product-item_price-old">
                                            <?php echo number_format($row['gia']); ?><span class="home-detailproduct_heading_price--type">???</span>
                                        </span>
                                        <span class="home-product-item_price-new">
                                            <?php echo number_format($row ['gia'] - ($row['gia'] * $row['giamgia'])); ?><span class="home-detailproduct_heading_price--type">???</span>
                                        </span>
                                        <?php } else { ?>
                                        <span class="home-product-item_price_nochange">
                                            <?php echo number_format($row ['gia']); ?><span class="home-detailproduct_heading_price--type">???</span>
                                        </span>
                                        <?php  }  ?>
                                    </div>
                                    <?php if($row['soluonghang']>0){ ?>
                                        <a href="themhang.php?MSHH=<?php echo $row['mshh']?>"  class="home-product-item_buton btn btn-primary">TH??M V??O GI??? H??NG</a>
                                    <?php } else {?>
                                        <a href="themhang.php?MSHH=<?php echo $row['mshh']?>"  class="home-product-item_buton btn btn-primary" style="pointer-events: none; background-color: #AAAAAA">H???t H??ng</a> 
                                    <?php };?>
                                    <?php if($row['giamgia']>0){ ?>
                                    <div class="home-product-item_saleoff">
                                        <span class="home-product-item_saleoff--percentage">
                                            <?php echo $row['giamgia']*100 ?>%
                                        </span>
                                        <span class="home-product-item_saleoff--label">GI???M</span>
                                    </div>
                                    <?php } ?>
                                </div>   
                            </div>
                
                            <?php } ?>
                          
                        </div>

                    </div>
                </div>

            </div>
        </div>
    <?php  } ?>
     
    </div>
    <div class="footer">
        <div class="grid">
            <div class="grid_row">
                <div class="grid_column-2-4">
                    <h3 class="footer_heading">Ch??m S??c Kh??ch H??ng</h3>
                    <ul class="footer_list">
                        <li class="footer_list-item">
                            <a href="#" class="footer-item_link">Trung T??m Tr??? Gi??p</a>
                        </li>
                        <li class="footer_list-item">
                            <a href="#" class="footer-item_link">H?????ng D???n Mua H??ng</a>
                        </li>
                    </ul>
                </div>

                <div class="grid_column-2-4">
                    <h3 class="footer_heading">??i???u kho???n v?? Quy???n L???i</h3>
                    <ul class="footer_list">
                        <li class="footer_list-item">
                            <a href="#" class="footer-item_link">Ch??nh s??ch giao h??ng</a>
                        </li>
                        <li class="footer_list-item">
                            <a href="#" class="footer-item_link">Ch??nh s??ch tr??? h??ng</a>
                        </li>
                    </ul>
                </div>

                <div class="grid_column-2-4">
                    <h3 class="footer_heading"></h3>
                </div>



                <div class="grid_column-2-4">
                    <h3 class="footer_heading">Li??n H???</h3>
                    <ul class="footer_list">
                        <li class="footer_list-item">
                            <span class="footer_list-item--span"><?php echo $rowinfoshop['email'];?></span>
                        </li>
                        <li class="footer_list-item">
                            <span class="footer_list-item--span"><?php echo $rowinfoshop['sodienthoai'];?></span>
                        </li>
                    </ul>
                </div>

                <div class="grid_column-2-4">
                    <h3 class="footer_heading">Theo D??i Ch??ng T??i</h3>
                    <ul class="footer_list">
                        <li class="footer_list-item">
                            <a href="https://www.facebook.com/meo.u.it.student/" target="_blank"
                                class="footer-item_link"><i class="fab fa-facebook  footer-item_icon"></i></a>
                            Facebook
                        </li>
                        <li class="footer_list-item">
                            <a href="#" class="footer-item_link"><i class="fab fa-instagram footer-item_icon"></i></a>
                            Instagram
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
    <div class="modal" id="Signup">
        <div class="modal_overplay">
            <!--Hoat anh modal-->
        </div>

        <div class="modal_body">
            <!--Register form-->
            <div class="auth-form">
                <form action="signup.php" name="validation" method="POST" enctype="multipart/form-data" onsubmit="return checkbae();">
                    <div class="auth-form_container">
                        <div class="auth-from_header">
                            <h3 class="auth-form_heading">????ng k??</h3>
                            <a href="" class="auth-from_switch-btn" name="signup"
                                onFocus="return showModalSignIn(); ">????ng nh???p</a>
                        </div>

                        <div class="auth-form_form">
                            <div class="auth-form_group">
                                <input type="text" class="auth-form_input" placeholder="T??n ????ng nh???p" name="username">
                            </div>
                            <div class="auth-form_group">
                                <input type="text" class="auth-form_input" placeholder="Email" name="emailcheck">
                            </div>
                            <div class="auth-form_group">
                                <input type="password" class="auth-form_input" placeholder="M???t kh???u" name="password">
                            </div>
                            <div class="auth-form_group">
                                <input type="password" class="auth-form_input" placeholder="X??c nh???n m???t kh???u" name="repassword">
                            </div>
                        </div>

                        <div class="auth-form_aside">
                            <p class="auth-form_policy-text">
                                B???ng vi???c ????ng k??, b???n ???? ?????ng ?? v???i Le Perfume v???
                                <a href="" class="auth-form_policy-link">??i???u kho???n d???ch v???</a>
                                &
                                <a href="" class="auth-form_policy-link">Ch??nh s??ch b???o m???t</a>
                            </p>
                        </div>

                        <div class="auth-form_controls">
                        <a href="" class="btn auth-form_controls-back btn--normal " onfocus= "return callback();" >TR??? L???I</a>
                        <button type="submit" class="btn btn--primary" name="signup-submit" >????NG K??</button>
                        </div>

                    </div>

                    <div class="auth-form_socials">
                        <a href="" class="auth-form_socials--facebook btn btn--size-s btn--with-icon" onclick="return checkexits();">
                            <i class="auth-form_socials-icon fab fa-facebook-square"></i>
                            <span class="auth-form_socials-title">????ng k?? v???i Facebook</span>
                        </a>

                        <a href="" class="auth-form_socials--google btn btn--with-icon" onclick="return checkexits();">
                            <i class="auth-form_socials-icon fab fa-google"></i>
                            <span class="auth-form_socials-title">????ng k?? v???i Google</span>
                        </a>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal" id="Signin">
        <div class="modal_overplay">
            <!--Hoat anh modal-->
        </div>

        <div class="modal_body">
            <!--Login form-->
            <div class="auth-form">
                <form action="signin.php" name="validate"  method="POST" enctype="multipart/form-data" onsubmit="return checksignin()">
                    <div class="auth-form_container">
                        <div class="auth-from_header">
                            <h3 class="auth-form_heading">????ng nh???p</h3>
                            <a href="" class="auth-from_switch-btn" name="signin"
                                onFocus="return showModalSignUp();">????ng k??</a>
                        </div>

                        <div class="auth-form_form">
                            <div class="auth-form_group">
                                <input type="text" class="auth-form_input" placeholder="T??n ????ng nh???p" name="username">
                            </div>
                            <div class="auth-form_group">
                                <input type="password" class="auth-form_input" placeholder="M???t kh???u" name="password">
                            </div>
                        </div>

                        <div class="auth-form_aside">
                            <div class="auth-form_help">
                                <a href="" class="auth-form_help--link auth-form_help--link-forgot">Qu??n M???t Kh???u</a>
                                <span class="auth-form_help-separate"></span>
                                <a href="" class="auth-form_help--link">Tr??? Gi??p</a>
                            </div>
                        </div>

                        <div class="auth-form_controls">
                            <a href="" class="btn auth-form_controls-back btn--normal" onfocus="return callback();">TR??? L???I</a>
                            <button type="submit" class="btn btn--primary" name="signin-submit">????NG NH???P</button>
                        </div>
                    </div>
                    <div class="auth-form_socials">
                        <a href="" class="auth-form_socials--facebook btn btn--size-s btn--with-icon" onclick="return checkexits();">
                            <i class="auth-form_socials-icon fab fa-facebook-square"></i>
                            <span class="auth-form_socials-title">????ng nh???p v???i Facebook</span>
                        </a>

                        <a href="" class="auth-form_socials--google btn btn--with-icon" onclick="return checkexits();">
                            <i class="auth-form_socials-icon fab fa-google"></i>
                            <span class="auth-form_socials-title">????ng nh???p v???i Google</span>
                        </a>

                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>



