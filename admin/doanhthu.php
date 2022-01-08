
<div class="body-page--manage">
                 <div class="body-page--header">
                     <span class="body-page--manage_title">Quản Lý Nhân Viên</span>
                     <div class="body-page--header_searching">
                         <input type="text" placeholder="Tìm kiếm theo tên" type = "search" name="keyword" oninput="getSearch(value);"><i class="fas fa-search"></i>
                     </div>
                 </div>
                <div class="body-page--manage_form">
                    <table class="body-page--manage_form--table">
                        <tr class="body-page--manage_form--table-display">
                            <th class="body-page--manage_form--table-col_id">
                                Tháng
                            </th>
                            <th class="body-page--manage_form--table-col_name">
                                Doanh Thu
                            </th>
                            
                        </tr>
                        <tbody id="result">
                        <?php 
                         $casemonth = mysqli_query($conn,"SELECT 
                         Sum(Case Month(a.ngaydh) when 1 then b.giadathang else 0 end) as T1,
                         Sum(Case Month(a.ngaydh) when 2 then b.giadathang else 0 end) as T2,
                         Sum(Case Month(a.ngaydh) when 3 then b.giadathang else 0 end) as T3,
                         Sum(Case Month(a.ngaydh) when 4 then b.giadathang else 0 end) as T4,
                         Sum(Case Month(a.ngaydh) when 5 then b.giadathang else 0 end) as T5,
                         Sum(Case Month(a.ngaydh) when 6 then b.giadathang else 0 end) as T6,
                         Sum(Case Month(a.ngaydh) when 7 then b.giadathang else 0 end) as T7,
                         Sum(Case Month(a.ngaydh) when 8 then b.giadathang else 0 end) as T8,
                         Sum(Case Month(a.ngaydh) when 9 then b.giadathang else 0 end) as T9,
                         Sum(Case Month(a.ngaydh) when 10 then b.giadathang else 0 end) as T10,
                         Sum(Case Month(a.ngaydh) when 11 then b.giadathang else 0 end) as T11,
                         Sum(Case Month(a.ngaydh) when 12 then b.giadathang else 0 end) as T12,
                         SUM(b.giadathang) as CaNam
                         From dathang as a, chitietdathang as b
                         Where a.sodondh = b.sodondh
                               and a.trangthaidh = 'Đã Giao'");
                        $row= mysqli_fetch_array($casemonth);
                        $sum = 0;
                        for($i=0;$i<12;$i++){
                            $sum += $row[$i];
                        ?>
                        <tr class="body-page--manage_form--table-tr">
                            <td class="body-page--manage_form--table-col_id">
                                  <?php if($i <=12){
                                      echo $i+1;
                                  }?>
                            </td>
                            <td class="body-page--manage_form--table-col_name">
                                   <?php echo number_format($row[$i]); ?>
                            </td>
                           
                        </tr>
                        <?php 
                          } 
                        ?>
                        </tbody>
                        
                    </table>
                    <table class="body-page--manage_form--table">
                        <tbody>
                              <tr class="body-page--manage_form--table-display">
                                  <th class="body-page--manage_form--table-col_id">
                                        Cả Năm
                                  </th>
                              </tr>
                              <tr class="body-page--manage_form--table-tr">
                                  <td class="body-page--manage_form--table-col_name">
                                             <?php echo $sum; ?>
                                      </td>

                              </tr>
                        </tbody>
                    </table>
                </div>
                <div class="pagination">
                <?php 
                    if($totalPages==1){
                      echo $listPage;
                    }else if($page==1){
                      echo $listPage;
                      echo $nextPage;
                    }else if($page==$totalPages){
                        echo $previous;
                        echo $listPage;
                    }  else{
                        echo $previous;
                        echo $listPage;
                        echo $nextPage;   
                    }
                     
                ?>
                </div>
            </div>
