<?php 
$id_sp = $_REQUEST['id_sp'];
$sql = "SELECT * from HangHoa where mshh='$id_sp'";
$query= mysqli_query($conn,$sql);
$row = mysqli_fetch_array($query);
$madm = $row['maloaihang'];
$dm = "SELECT * from LoaiHangHoa where maloaihang ='$madm'";
$result = mysqli_query($conn,$dm);
$rows = mysqli_fetch_array($result);
$queryhinhanh = mysqli_query($conn,"SELECT * from hinhhanghoa where mshh = '$id_sp' order by mahinh");
$querychitietsp = mysqli_query($conn,"SELECT * from chitiethanghoa where mshh = '$id_sp'");
$rowctsp = mysqli_fetch_array($querychitietsp);
$totalRows=mysqli_num_rows($queryhinhanh);
$list="";

if (isset($_SESSION['giohang'])){
    if(isset($_POST['sl'])){
        foreach($_POST['sl'] as $id_sp => $sl){
            $arrID[]=$id_sp;
            if($sl==0){
                unset($_SESSION['giohang'][$id_sp]);
            }
            elseif($sl){
                if($sl <= $row['soluonghang']){
                    $_SESSION['giohang'][$id_sp]=$sl;
                } else {
                    $_SESSION['giohang'][$id_sp]=$row['soluonghang'];
                }
              
            }
        }
    }
    $arrID = array();
    foreach($_SESSION['giohang'] as $id_sp => $so_luong){
        $arrID[]=$id_sp;
    }
}
?>
<script>
       carousel();
       function carousel() {
         var i;
         var x = document.getElementsByClassName("header_banner");
         for (i = 0; i < x.length; i++) {
           x[i].style.display = "none";  
         }
        }
</script>
    
        <div class="grid">
            <div class="grid_row app_content">
                <div class="home-detailproduct">
                <form action="themhang.php?MSHH=<?php echo $row['mshh']?>"  id="giohang"  method="POST" enctype="multipart/form-data" >
                        <div class="home-detailproduct_heading">
                            <div class="home-detailproduct_heading--left">
                              <div class="slideshow-container">
                                  <?php while($rowhinhanh = mysqli_fetch_array($queryhinhanh)){?>
                                 <div class="mySlides fade">
                                   <img src="./<?php echo $rowhinhanh['tenhinh']; ?>" alt="" class="mySlides_img">
                                 </div>
                                 <?php } ?>
                                   <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                                   <a class="next" onclick="plusSlides(1)">&#10095;</a>
                                   <div style="text-align:center">
                                      <?php for($i=1;$i<=$totalRows;$i++){ 
                                            echo $list = "<span class='dot' onclick='currentSlide($i)'></span> ";
                                        }?>
                                    </div>
                             </div>
                               <?php if($row['giamgia']>0){ ?>
                                <div class="home-detailproduct_heading_saleoff">
                                        <span class="home-detailproduct_heading_saleoff--percentage">
                                            <?php echo $row['giamgia']*100 ?>%
                                        </span>
                                        <span class="home-detailproduct_heading_saleoff--label">GIẢM</span>
                                </div>
                                 <?php } ?>
                            </div>
                            <div class="home-detailproduct_heading--right">
                                <h1 ><?php echo $row['tenhh'];?></h1>
                                  <?php if($row['giamgia']>0){ ?>
                                    <span class="home-detailproduct_heading_price-old">
                                            <?php echo number_format($row['gia']);?><span class="home-detailproduct_heading_price--type">₫</span>
                                    </span>
                                    <span class="home-detailproduct_heading_price-new">
                                            <?php echo number_format($row ['gia'] - ($row['gia'] * $row['giamgia'])); ?><span class="home-detailproduct_heading_price--type">₫</span>
                                    </span>
                                    <?php  } else {?>
                                    <span class="home-detailproduct_heading_price_nochange">
                                            <?php echo number_format($row ['gia']); ?><span class="home-detailproduct_heading_price--type">₫</span>
                                    </span><?php  } ?>
                                <ul>
                                    <li>Thương Hiệu: <span> <?php echo $rows['tenloaihang']; ?> </span></li>
                                    <li><?php echo $row['quycach']; ?></li>
                                    <li>Còn Lại: <?php echo $row['soluonghang']; ?></li>
                                </ul>
                                <?php if($row['soluonghang']>0){?>
                                     <input type="number" id="quantity" name="sl[<?php echo $row['mshh']; ?>]" value="<?php if(isset($_SESSION['giohang'])){ echo $_SESSION['giohang'][$row['mshh']] ;} else echo 1;?>"  min="1" max="<?php echo $row['soluonghang'];?>" step="1" class="home-detailproduct_button_quantity" onkeyup=imposeMinMax(this)>
                                     <a  onclick="document.getElementById('giohang').submit();"  class="home-detailproduct_button btn ">Thêm Vào Giỏ Hàng</a>
                                <?php } else{ ?>
                                    <input type="number" id="quantity" name="sl[<?php echo $row['mshh']; ?>]" value="<?php if(isset($_SESSION['giohang'])){ echo $_SESSION['giohang'][$row['mshh']] ;} else echo 1;?>"  min="1" max="<?php echo $row['soluonghang'];?>" step="1" class="home-detailproduct_button_quantity" onkeyup=imposeMinMax(this)>
                                    <a  onclick="document.getElementById('giohang').submit();"  class="home-detailproduct_button btn" style="pointer-events: none; background-color: #AAAAAA">HẾT HÀNG</a>
                                <?php } ?>
                            </div>
                            
                        </div>
                       
                        <div class="home-detailproduct_label home-detailproduct_label--seperate"><span> Thông Tin Sản Phẩm</span></div>
                        <div class="home-detailproduct_content">
                            <ul >
                            <?php if (mysqli_num_rows($querychitietsp)>0){ ?>
                                <li><span style="width: 25%;">Thương hiệu:</span> <span style="font-weight: normal;"><?php echo $rows['tenloaihang']; ?></span></li>
                                <li><span style="width: 25%;">Xuất Xứ:</span><span style="font-weight: normal;"><?php echo $rowctsp['xuatxu'] ?></span></li>
                                <li><span style="width: 25%;">Năm Phát Hành:</span><span style="font-weight: normal;"><?php echo $rowctsp['namphathanh'] ?></span></li>
                                <li><span style="width: 25%;">Nhóm Hương:</span><span style="font-weight: normal;"><?php echo $rowctsp['nhomhuong']; ?></span></li>
                                <li><span style="width: 25%;">Phong Cách:</span><span style="font-weight: normal;"><?php echo $rowctsp['phongcach']; ?></span></li>
                            <?php } else {?>
                                <li><span style="width: 25%;">Thương hiệu:</span> <span style="font-weight: normal;"><?php echo $rows['tenloaihang']; ?></span></li>
                                <li><span style="width: 25%;">Xuất Xứ:</span><span style="font-weight: normal;"></span></li>
                                <li><span style="width: 25%;">Năm Phát Hành:</span><span style="font-weight: normal;"></span></li>
                                <li><span style="width: 25%;">Nhóm Hương:</span><span style="font-weight: normal;"></span></li>
                                <li><span style="width: 25%;">Phong Cách:</span><span style="font-weight: normal;"></span></li>
                            <?php } ?>
                            </ul>
                            <?php if (mysqli_num_rows($querychitietsp)>0){ 
                                    $input = explode("\n",$rowctsp['chitietsp']);
                                    $n = count($input);
                                    $i = 0;
                            ?>
                                <div class="home-detailproduct_content--body">
                                    <?php for ($i = 0; $i<$n; $i++) {?>
                                     <p><?php 
                                        echo $input[$i];
                                        ?>
                                    </p>
                            <?php }} ?>
                                     
                                </div>
                           
                        </div>
                       
                </form>  
                   
             </div>
        </div>
    </div>


<script>
    function checkvalue(el){
        if(el.value != ""){
           if(parseInt(el.value) < parseInt(el.min)){
             el.value = el.min;
           }
           if(parseInt(el.value) > parseInt(el.max)){
             el.value = el.max;
            }
        }                       
   }
</script>

<script>
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
  var slides = document.getElementsByClassName("mySlides");
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