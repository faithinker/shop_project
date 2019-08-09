<?
   include "main_top.php";
   include "common.php";

   $page = $_REQUEST[page];
   $sort = $_REQUEST[sort];
   $menu = $_REQUEST[menu];
?>

<!-------------------------------------------------------------------------------------------->   
<!-- 시작 : 다른 웹페이지 삽입할 부분                                                       -->
<!-------------------------------------------------------------------------------------------->   

      <!-- 하위 상품목록 -->

         <!-- form2 시작 -->
         <form name="form2" method="post" action="product.php">
         <input type="hidden" name="menu" value="<?=$menu?>">

         <table border="0" cellpadding="0" cellspacing="5" width="767" class="cmfont" bgcolor="#efefef">
            <tr>
               <td bgcolor="white" align="center">
                  <table border="0" cellpadding="0" cellspacing="0" width="751" class="cmfont">
                     <tr>
                        <td align="center" valign="middle">
                           <table border="0" cellpadding="0" cellspacing="0" width="730" height="40" class="cmfont">
                              <tr>
                                 <td width="500" class="cmfont">
                                    <font color="#C83762" class="cmfont"><b><?=$a_menu[$menu]?> &nbsp</b></font>&nbsp
                                 </td>
                                 <td align="right" width="274">
                                    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="cmfont">
                                       <tr>
                                          <?
                                             if ($sort == 0) // 신상품순
                                                $query="select * from product where menu21=$menu order by no21 desc";
                                             else if ($sort == 1) // 고가형순
                                                $query="select * from product where menu21=$menu order by price21";
                                             else if ($sort == 2) // 저가형순
                                                $query="select * from product where menu21=$menu order by price21 desc";
                                             else // 신상품순
                                                 $query="select * from product where menu21=$menu order by name21";

                                             $result = mysqli_query($db, $query);                     
                                             if(!$result) exit('에러: $query');

                                             $count = mysqli_num_rows($result);
                                          ?>
                                          <td align="right"><font color="EF3F25"><b><?=$count?></b></font> 개의 상품.&nbsp;&nbsp;&nbsp</td>
                                          <td width="100">
                                             <?
                                                echo("<select name='sort' size='1' class='cmfont' onChange='form2.submit()'>");
                                                for($i = 0; $i < $n_pdname; $i++) {
                                                   if($sort == $i)
                                                      echo("<option value='$i' selected>$a_pdname[$i]</option>");
                                                   else
                                                      echo("<option value='$i'>$a_pdname[$i]</option>");
                                                }
                                                echo("</select>");
                                             ?>
                                          </td>
                                       </tr>
                                    </table>
                                 </td>
                              </tr>
                           </table>
                        </td>
                     </tr>
                  </table>
               </td>
            </tr>
         </table>
         </form>
         <!-- form2 -->

         <?
            $num_col = 4; $num_row = 5;
            $page_line = $num_col * $num_row;
            $icount = 0;

            if (!$page) $page = 1;                                    
            $pages = ceil($count/$page_line);                                 
            $first = 1;
            if ($count > 0) $first = $page_line * ($page - 1);      
            $page_last = $count - $first;
            if ($page_last > $page_line) $page_last = $page_line;      
            if ($count > 0) mysqli_data_seek($result, $first);      

            echo("<table border='0' cellpadding='0' cellspacing='0'>");
            for($ir = 0; $ir < $num_row; $ir++)
            {
               echo('<tr>');
               for($ic = 0;  $ic < $num_col;  $ic++)
               {
                  if($icount < $page_last)
                  {
                     $row = mysqli_fetch_array($result);

                     if($row[icon_new21] == 1) $newText = "<img src='images/i_new.gif' align='absmiddle' vspace='1'>";
                     else $newText = "";
                     if($row[icon_hit21] == 1) $hitText = "<img src='images/i_hit.gif' align='absmiddle' vspace='1'>";
                     else $hitText = "";
                     if($row[icon_sale21] == 1) {
                        $saleText = "<img src='images/i_sale.gif' align='absmiddle' vspace='1'> <font color='red'> $row[discount21]%";
                        $discountText = "<strike>" . number_format($row[price21]) . " 원</strike><br><b>" . number_format(round($row[price21] * (100 - $row[discount21]) / 100, -3)) . " 원</b>";
                        $priceText = $discountText;
                     }
                     else {
                        $saleText = "";
                        $priceText = "<b>" . number_format($row[price21]) . " 원</b>";
                     }

                     echo("<td width='150' height='205' align='center' valign='top'>
                                 <table border='0' cellpadding='0' cellspacing='0' width='100' class='cmfont'>
                                    <tr> 
                                       <td align='center'> 
                                          <a href='product_detail.php?no=$row[no21]'><img src='product/$row[image1_21]' width='120' height='140' border='0'></a>
                                       </td>
                                    </tr>
                                    <tr><td height='5'></td></tr>
                                 <tr> 
                                    <td height='20' align='center'>
                                       <a href='product_detail.php?no=$row[no21]'><font color='444444'>$row[name21]</font></a>&nbsp;
                                       $newText $hitText $saleText
                                    </td>
                                 </tr>
                                 <tr><td height='20' align='center'>$priceText</td></tr>
                              </table>
                           </td>");
                  }
                  else { 
                     echo('<td></td>');
                  }
                  $icount++;
               }
               echo('</tr>');
            }
            echo('</table>');
         ?>


<?
   $blocks = ceil($pages / $page_block);            // 전체 블록 수
   $block = ceil($page / $page_block);               // 현재 블록
   $page_s = $page_block * ($block - 1);            // 현재 페이지
   $page_e = $page_block * $block;                     // 마지막 페이지
   if ($blocks <= $block) $page_e = $pages;

   echo("<table border='0' cellpadding='0' cellspacing='0' width='690'>
               <tr>
                  <td height='40' class='cmfont' align='center'>");
   
   if ($block > 1)   {            // 이전 블록으로
      $tmp = $page_s;
      echo("<a href='product.php?menu=$menu&sort=$sort&page=$tmp'>
                  <img src='images/i_prev.gif' align='absmiddle' border='0'>
               </a>&nbsp");
   }

   for($i = $page_s + 1; $i <= $page_e; $i++) {   // 현재 블록의 페이지
      if ($page == $i)
         echo("<font color='red'><b>$i</b></font>&nbsp");
      else
         echo("<a href='product.php?menu=$menu&sort=$sort&page=$i'>[$i]</a>&nbsp");
   }
   
   if ($block < $blocks) {      // 다음 블록으로
      $tmp = $page_e + 1;
      echo("&nbsp<a href='product.php?menu=$menu&sort=$sort&page=$tmp'>
                  <img src='images/i_next.gif' align='absmiddle' border='0'>
               </a>");
   }

   echo("      </td>
               </tr>
            </table>");
?>

<!-------------------------------------------------------------------------------------------->   
<!-- 끝 : 다른 웹페이지 삽입할 부분                                                         -->
<!-------------------------------------------------------------------------------------------->   

<?
   include "main_bottom.php";
?>