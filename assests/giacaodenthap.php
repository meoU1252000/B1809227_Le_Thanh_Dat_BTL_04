<?php

include('../admin/config.php');
ob_start();

if(isset($_GET['page'])){
    $page=$_GET['page'];
} else{
    $page=1;
}
$rowsPerPage=10;
$perRow=$page*$rowsPerPage-$rowsPerPage;
$result = mysqli_query($conn, "SELECT * from hanghoa ORDER BY gia DESC LIMIT $perRow,$rowsPerPage");
$totalRows=mysqli_num_rows(mysqli_query($conn,"SELECT * from hanghoa"));
$totalPages = ceil($totalRows/$rowsPerPage);
$nextPage="";
$previous = "";
for($i=1;$i<=$totalPages;$i++){
    if($page == $i && $page >1 && $page <$totalPages && $totalPages > 1 ){
        $previous = '<a class="home-filter_page-btn" href="index.php?page_layout=giacaodenthap&page='.($page-1).'"> <i class="home-filter_page-icon fas fa-angle-left"></i></a>';
        $nextPage = '<a class="home-filter_page-btn" href="index.php?page_layout=giacaodenthap&page='.($page+1).'"> <i class="home-filter_page-icon fas fa-angle-right"></i></a>';
    } else if($page==1 && $totalPages > 1){
        $previous='<a class="home-filter_page-btn home-filter_page-btn--disabled" href="index.php?page_layout=giacaodenthap&page='.$page.'" style="pointer-events: none;"><i class="home-filter_page-icon fas fa-angle-left"></i></a>';
        $nextPage='<a class="home-filter_page-btn" href="index.php?page_layout=giacaodenthap&page='.($page+1).'"><i class="home-filter_page-icon fas fa-angle-right"></i></a>';
    } else if($page == $totalPages && $totalPages > 1){
        $previous = '<a class="home-filter_page-btn" href="index.php?page_layout=giacaodenthap&page='.($page-1).'"> <i class="home-filter_page-icon fas fa-angle-left"></i></a>';
        $nextPage='<a class="home-filter_page-btn home-filter_page-btn--disabled" href="index.php?page_layout=giacaodenthap&page='.$page.'" style="pointer-events: none;"><i class="home-filter_page-icon fas fa-angle-right"></i></a>';
    } else if($page==1 && $totalPages == 1){
        $previous = '<a class="home-filter_page-btn home-filter_page-btn--disabled" href="index.php?page_layout=giacaodenthap&page='.$page.'" style="pointer-events: none;"> <i class="home-filter_page-icon fas fa-angle-left"></i></a>';
        $nextPage='<a class="home-filter_page-btn home-filter_page-btn--disabled" href="index.php?page_layout=giacaodenthap&page='.$page.'" style="pointer-events: none;"><i class="home-filter_page-icon fas fa-angle-right"></i></a>';
    }
}

ob_flush();

?> 
<div class="grid">
<div class="grid_row app_content">
    <div class="grid_column-2">
        <nav class="category">
            <h3 class="category_heading">
                <i class="fas fa-list-ul category_heading-icon"></i>
                Danh mục
            </h3>

            <ul class="category-list">
                <li class="category-item_link">
                    <?php echo $listPage?>
                </li>

            </ul>

        </nav>
    </div>

    <div class="grid_column-10">
        <div class="home-filter">
            <span class="home-filter_label">Sắp xếp theo</span>
            <a href="index.php" class="home-filter_btn ">Mặc Định</a>
            <a href="index.php?page_layout=moinhat" class="home-filter_btn btn">Mới nhất</a>
            <a href="index.php?page_layout=banchay" class="home-filter_btn ">Bán chạy</a>
            <a href="index.php?page_layout=conhang" class="home-filter_btn ">Còn Hàng</a>
            <div class="select-input">
                <span class="select-input_label" style="color: var(--primary-color);font-weight:bold;">Giá: Cao Đến Thấp</span>
                <i class="fas fa-angle-down select-input_icon"></i>
                <!--List Option-->
                <ul class="select-input_list">
                    <li class="select-input_item">
                        <a href="index.php?page_layout=giathapdencao" class="select-input_link" name ="lowtohigh">Giá: Thấp Đến Cao</a>
                    </li>
                    <li class="select-input_item">
                        <a href="index.php?page_layout=giacaodenthap" class="select-input_link" name = "hightolow">Giá: Cao Đến Thấp</a>
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
                              null==xmlhttp?alert("Trình duyệt không hỗ trợ HTTP Request"):(xmlhttp.onreadystatechange=stateChanged,xmlhttp.open("GET","./getData/getDataCao.php?key="+a,!0),xmlhttp.send(null))
                            }
                            function stateChanged(){
                              4==xmlhttp.readyState&&(document.getElementById("result").innerHTML=xmlhttp.responseText)
                            }
                            function GetXmlHttpObject(){
                              return window.XMLHttpRequest?new XMLHttpRequest:window.ActiveXObject?new ActiveXObject("Microsoft.XMLHTTP"):null
                            }
                        </script>
            <div class="grid_row" id="result">
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
                                        <a href="index.php?page_layout=sanpham&id_sp=<?php echo $row['mshh']?>"><?php echo $row['tenhh'] ?><a>
                                    </h4>
                                    <h4 class="home-product-item_detail">
                                        <?php echo $row['quycach'] ?>
                                    </h4>
                                    <div class="home-product-item_price">
                                        <?php if($row['giamgia']>0){ ?>
                                        <span class="home-product-item_price-old">
                                            <?php echo number_format($row['gia']); ?><span class="home-detailproduct_heading_price--type">₫</span>
                                        </span>
                                        <span class="home-product-item_price-new">
                                            <?php echo number_format($row ['gia'] - ($row['gia'] * $row['giamgia'])); ?><span class="home-detailproduct_heading_price--type">₫</span>
                                        </span>
                                        <?php } else { ?>
                                        <span class="home-product-item_price_nochange">
                                            <?php echo number_format($row['gia']); ?><span class="home-detailproduct_heading_price--type">₫</span>
                                        </span>
                                        <?php  }  ?>
                                    </div>
                                    <?php if($row['soluonghang']>0){ ?>
                                        <a href="themhang.php?MSHH=<?php echo $row['mshh']?>"  class="home-product-item_buton btn btn-primary">THÊM VÀO GIỎ HÀNG</a><?php } else {?>
                                        <a href="themhang.php?MSHH=<?php echo $row['mshh']?>"  class="home-product-item_buton btn btn-primary" style="pointer-events: none; background-color: #AAAAAA">Hết Hàng</a> 
                                    <?php };?>
                                    <?php if($row['giamgia']>0){ ?>
                                    <div class="home-product-item_saleoff">
                                        <span class="home-product-item_saleoff--percentage">
                                            <?php echo $row['giamgia']*100 ?>%
                                        </span>
                                        <span class="home-product-item_saleoff--label">GIẢM</span>
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

<?php mysqli_close($conn); ?>