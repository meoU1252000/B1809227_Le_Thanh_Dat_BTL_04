<?php
include('../../admin/config.php');
  $key=$_GET['key'];
  if($key!=NULL){
      $sql="SELECT * from hanghoa where tenhh like '%$key%' ORDER BY soluongdaban DESC LIMIT 10";
      $result=mysqli_query($conn,$sql);
      $rs='';
        if(mysqli_num_rows($result)>0){
            foreach($result as $row){
                $giamoi = $row['gia'] - ($row['gia'] * $row['giamgia']);
                $row['giamgia'] = $row['giamgia']*100;
                $id_hh = $row['mshh'];
                $queryhinhanh = mysqli_query($conn,"SELECT * from hinhhanghoa where mshh = '$id_hh' order by mahinh ASC limit 1");
                $rowhinhanh = mysqli_fetch_array($queryhinhanh);
                    $rs.= "<div class='grid_column-2-4'>
                    <div class='home-product-item'>
                        <div class='home-product-item_img'
                            style='background-image: url(" .$rowhinhanh['tenhinh']." );'>
                        </div>
                        <h4 class='home-product-item_name'>
                            <a href='index.php?page_layout=sanpham&id_sp=".$row['mshh']."'>".$row['tenhh']."</a>
                        </h4>
                        <h4 class='home-product-item_detail'>
                            ".$row['quycach']."
                        </h4>";
                    if($row['giamgia']>0){
                        $rs.="
                            <div class='home-product-item_price'>
                                <span class='home-product-item_price-old'>
                                    ".number_format($row['gia'])."
                                </span>
                                <span class='home-product-item_price-new'>
                                    ".number_format($giamoi)."
                                </span>
                            </div>";
                        if($row['soluonghang']>0){
                            $rs.="<a class='home-product-item_buton btn btn-primary' href='themhang.php?MSHH=" .$row['mshh']."'>THÊM VÀO GIỎ HÀNG</a>";
                        } else {
                            $rs.="<a href='themhang.php?MSHH=" .$row['mshh']."'  class='home-product-item_buton btn btn-primary' style='pointer-events: none; background-color: #AAAAAA'>HẾT HÀNG</a>";
                        }
                        $rs.=" <div class='home-product-item_saleoff'>
                            <span class='home-product-item_saleoff--percentage'>
                                ".number_format($row['giamgia'])."%
                            </span>
                            <span class='home-product-item_saleoff--label'>GIẢM</span>
                          </div>";  
                    } else {
                        $rs.=" <div class='home-product-item_price'> 
                        <span class='home-product-item_price_nochange'>
                        ".number_format($row['gia'])."<span class='home-detailproduct_heading_price--type'>₫</span>
                         </span> </div>";
                         if($row['soluonghang']>0){
                             $rs.="<a href='themhang.php?MSHH=".$row['mshh']."'  class='home-product-item_buton btn btn-primary'>THÊM VÀO GIỎ HÀNG</a>";
                         } else {
                            $rs.="<a href='themhang.php?MSHH=" .$row['mshh']."'  class='home-product-item_buton btn btn-primary' style='pointer-events: none; background-color: #AAAAAA'>HẾT HÀNG</a>";
                         }
                        
                    } 
                 $rs.="</div>
                </div>";
            }
        }else{
        $rs.= "";
      }
      echo $rs;
    }else {
        $result = mysqli_query($conn, "SELECT * from HangHoa  ORDER BY soluongdaban DESC LIMIT 10");
        $rs='';
        foreach($result as $row){
            $giamoi = $row['gia'] - ($row['gia'] * $row['giamgia']);
            $row['giamgia'] = $row['giamgia']*100;
            $id_hh = $row['mshh'];
            $queryhinhanh = mysqli_query($conn,"SELECT * from hinhhanghoa where mshh = '$id_hh' order by mahinh ASC limit 1");
            $rowhinhanh = mysqli_fetch_array($queryhinhanh);
                $rs.= "<div class='grid_column-2-4'>
                <div class='home-product-item'>
                    <div class='home-product-item_img'
                        style='background-image: url(" .$rowhinhanh['tenhinh']." );'>
                    </div>
                    <h4 class='home-product-item_name'>
                        <a href='index.php?page_layout=sanpham&id_sp=".$row['mshh']."'>".$row['tenhh']."</a>
                    </h4>
                    <h4 class='home-product-item_detail'>
                        ".$row['quycach']."
                    </h4>";
                if($row['giamgia']>0){
                    $rs.="
                        <div class='home-product-item_price'>
                            <span class='home-product-item_price-old'>
                                ".number_format($row['gia'])."
                            </span>
                            <span class='home-product-item_price-new'>
                                ".number_format($giamoi)."
                            </span>
                        </div>";
                    if($row['soluonghang']>0){
                        $rs.="<a class='home-product-item_buton btn btn-primary' href='themhang.php?MSHH=" .$row['mshh']."'>THÊM VÀO GIỎ HÀNG</a>";
                    } else {
                        $rs.="<a href='themhang.php?MSHH=" .$row['mshh']."'  class='home-product-item_buton btn btn-primary' style='pointer-events: none; background-color: #AAAAAA'>HẾT HÀNG</a>";
                    }
                    $rs.=" <div class='home-product-item_saleoff'>
                        <span class='home-product-item_saleoff--percentage'>
                            ".number_format($row['giamgia'])."%
                        </span>
                        <span class='home-product-item_saleoff--label'>GIẢM</span>
                      </div>";  
                } else {
                    $rs.=" <div class='home-product-item_price'> 
                    <span class='home-product-item_price_nochange'>
                    ".number_format($row['gia'])."<span class='home-detailproduct_heading_price--type'>₫</span>
                     </span> </div>";
                     if($row['soluonghang']>0){
                         $rs.="<a href='themhang.php?MSHH=".$row['mshh']."'  class='home-product-item_buton btn btn-primary'>THÊM VÀO GIỎ HÀNG</a>";
                     } else {
                        $rs.="<a href='themhang.php?MSHH=" .$row['mshh']."'  class='home-product-item_buton btn btn-primary' style='pointer-events: none; background-color: #AAAAAA'>HẾT HÀNG</a>";
                     }
                    
                } 
             $rs.="</div>
            </div>";
        }
        echo $rs;
    }
?>

