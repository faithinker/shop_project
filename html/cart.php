<?
   include "main_top.php";
   include "common.php";

   $n_cart=$_COOKIE[n_cart];
   $cart=$_COOKIE[cart];
?>
         <!--  현재 페이지 자바스크립  -------------------------------------------->
         <script language = "javascript">

         function cart_edit(kind,pos) {
            if (kind=="deleteall") 
            {
               location.href = "cart_edit.php?kind=deleteall";
            } 
            else if (kind=="delete")   {
               location.href = "cart_edit.php?kind=delete&pos="+pos;
            } 
            else if (kind=="insert")   {
               var num=eval("form2.num"+pos).value;
               location.href = "cart_edit.php?kind=insert&pos="+pos+"&num="+num;
            }
            else if (kind=="update")   {
               var num=eval("form2.num"+pos).value;
               location.href = "cart_edit.php?kind=update&pos="+pos+"&num="+num;
            }
         }

         </script>

         <!-- form2 시작  -->
         <table border="0" cellpadding="0" cellspacing="0" width="747">
            <tr><td height="21"></td></tr>
         </table>
         <table border="0" cellpadding="0" cellspacing="0" width="746">
            <tr>
               <td height="30" align="left"><img src="images/cart_title.gif" width="746" height="30" border="0"></td>
            </tr>
         </table>
         <table border="0" cellpadding="0" cellspacing="0" width="747">
            <tr><td height="21"></td></tr>
         </table>

         <table border="0" cellpadding="0" cellspacing="0" width="710" class="cmfont">
            <tr>
               <td><img src="images/cart_title1.gif" border="0"></td>
            </tr>
         </table>

         <table border="0" cellpadding="0" cellspacing="0" width="710">
            <tr><td height="10"></td></tr>
         </table>

         <table border="0" cellpadding="5" cellspacing="1" width="710" class="cmfont" bgcolor="#CCCCCC">
            <tr bgcolor="F0F0F0" height="23" class="cmfont">
               <td width="440" align="center">상품</td>
               <td width="70"  align="center">수량</td>
               <td width="80"  align="center">가격</td>
               <td width="90"  align="center">합계</td>
               <td width="50"  align="center">삭제</td>
            </tr>

            <form name="form2" method="post">
            <?
            $total = 0;
            if(!$n_cart) $n_cart = 0;
            for($i = 1; $i <= $n_cart; $i++) {
               if($cart[$i]) {

                  list($no, $num, $opts1, $opts2) = explode("^", $cart[$i]);

                  $query="select * from product where no21=$no;";
                  $result = mysqli_query($db, $query);
                  if (!$result) exit("에러: $query");
                  $row=mysqli_fetch_array($result);

                  $query="select * from opts where no21=$opts1";
                  $result = mysqli_query($db, $query);
                  if (!$result) exit("에러: $query");
                  $row2=mysqli_fetch_array($result);

                  $query="select * from opts where no21=$opts2";
                  $result = mysqli_query($db, $query);
                  if (!$result) exit("에러: $query");
                  $row3=mysqli_fetch_array($result);

                  $price = round($row[price21] * (100 - $row[discount21]) / 100, -3);
                  $sum_price = $price * $num;
                  $total += $sum_price;

                  $price_text = number_format($price) . 원;
                  $sum_price_text = number_format($sum_price) . 원;

                  echo("
                  <tr>
                     <td height='60' align='center' bgcolor='#FFFFFF'>
                        <table cellpadding='0' cellspacing='0' width='100%'>
                           <tr>
                              <td width='60'>
                                 <a href='product_detail.php?no=$no'><img src='product/$row[image1_21]' width='50' height='50' border='0'></a>
                              </td>
                              <td class='cmfont'>
                                 <a href='product_detail.php?no=$no'>$row[name21]</a><br>
                                 <font color='#0066CC'>[옵션사항]</font> $row2[name21] $row3[name21] 
                              </td>
                           </tr>
                        </table>
                     </td>
                     <td align='center' bgcolor='#FFFFFF'>
                        <input type='text' name='num$i' size='2' value='$num' class='cmfont1'>&nbsp<font color='#464646'>개</font>
                     </td>
                     <td align='center' bgcolor='#FFFFFF'><font color='#464646'>$price_text</font></td>
                     <td align='center' bgcolor='#FFFFFF'><font color='#464646'>$sum_price_text</font></td>
                     <td align='center' bgcolor='#FFFFFF'>
                        <a href = \"javascript:cart_edit('update','$i')\"><img src='images/b_edit1.gif' border='0'></a>&nbsp<br>
                        <a href = \"javascript:cart_edit('delete','$i')\"><img src='images/b_delete1.gif' border='0'></a>&nbsp
                     </td>
                  </tr>
                  ");
               }
            }
            ?>

            <?
                  $total_text = number_format($total);
                  if($total <= $max_baesongbi) {
                     $baesong_text = number_format($baesongbi).원;
                     $all = $total + $baesongbi;
                  }
                  else {
                     $baesong_text = "<b>무료</b>";
                     $all = $total;
                  }
                  $all_text = number_format($all);
            ?>
            <tr>
               <td colspan="5" bgcolor="#F0F0F0">
                  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="cmfont">
                     <tr>
                        <td bgcolor="#F0F0F0"><img src="images/cart_image1.gif" border="0"></td>
                        <td align="right" bgcolor="#F0F0F0">
                           <font color="#0066CC"><b>총 합계금액</font></b> : 상품대금(<?=$total_text?>원) + 배송료(<?=$baesong_text?>) = <font color="#FF3333"><b><?=$all_text?>원</b></font>&nbsp;&nbsp
                        </td>
                     </tr>
                  </table>
               </td>
            </tr>

         </table>
         </form>
         <!-- form2 끝  -->
         <table width="710" border="0" cellpadding="0" cellspacing="0" class="cmfont">
            <tr height="44">
               <td width="710" align="center" valign="middle">
                  <a href="index.html"><img src="images/b_shopping.gif" border="0"></a>&nbsp;&nbsp;
                  <a href="javascript:cart_edit('deleteall','0')"><img src="images/b_cartalldel.gif" width="103" height="26" border="0"></a>&nbsp;&nbsp;
                  <a href="order.php"><img src="images/b_order1.gif" border="0"></a>
               </td>
            </tr>
         </table>
<?
   include "main_bottom.php";
?>