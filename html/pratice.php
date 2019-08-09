echo("<div class='frame'>");
for ($ir=0; $ir<$num_row; $ir++){
    echo("<div class='list_full'>");
    for ($ic=0;  $ic<$num_col;  $ic++){
        if ($icount < $count){
            $row=mysqli_fetch_array($result);
            
            echo("<ul>");
            echo("<li class='list_image'>");
            echo("<a href='product_detail.php?no=$row[no21]'>
                 <img src='product/$row[image1_21]'>
                 </a>");
                 echo("</li>");
                 echo("<li class='list_seller'>"); //소매업체명과 링크 DB수정필요
                 echo("<a href='/shop/button9ine'>버튼나인 &nbsp</a>");
                 echo("</li>");
                 echo("<li class='list_title'>");
                 echo("<a href='product_detail.php?no=$row[no21]'>$row[name21]</a>");
                 echo("</li>");
                 if($row[icon_hit21] == 1){ //hit을 오늘 배송으로 바꿈
                 echo("<span>");
                 echo("<img src='images/ic-product-option-todayshipping.png'>");
                 echo("</span>");
                 echo("<li class='list_price'>");
                 if($row[icon_sale21] == 1){
                 $price = number_format($row[price21]) ." 원";
                 $sale=round($row[price21]*(100-$row[discount21])/100, -3) . " 원";//할인가
                 echo("$sale<b>"."$row[discount21]"."%"."</b>");
                 echo("<span>$price</span>");
                 }
                 else {
                 $price = number_format($row[price21]) ." 원";
                 echo("$price");
                 }
                 echo("</li>");
                 }
                 else{
                 echo("<ul></ul>");      // 제품 없는 경우
                 $icount++;
                 }
                 echo("</ul>");
                 }
                 }
                 echo("</div>");
                 }
                 echo("</div>");
                 ------------------------------*/
            /*
             echo("<table border='0' cellpadding='0' cellspacing='0'>");
             for ($ir=0; $ir<$num_row; $ir++)
             {
             echo("<tr>");
             for ($ic=0;  $ic<$num_col;  $ic++)
             {
             if ($icount < $count)
             {
             $row=mysqli_fetch_array($result);
             
             echo("<td width='150' height='205' align='center' valign='top'>");
             echo("<table border='0' cellpadding='0' cellspacing='0' width='100' class='cmfont'>");
             
             echo("<tr>");
             echo("<td align='center'>"); //이미지 출력부분....
             echo("<a href='product_detail.php?no=$row[no21]'><img src='product/$row[image1_21]' width='120' height='140' border='0'></a>");
             echo("</td>");
             echo("</tr>");
             echo("<tr><td height='5'></td></tr>");
             
             echo("<tr>");
             echo("<td height='20' align='center'>"); //이름출력
             echo("<a href='product_detail.php?no=$row[no21]'><font color='444444'>$row[name21]</font></a>&nbsp; ");
             
             if($row[icon_new21] == 1)
             echo("<img src='images/i_new.gif' align='absmiddle' vspace='1'>");
             if($row[icon_hit21] == 1)
             echo("<img src='images/i_hit.gif' align='absmiddle' vspace='1'>");
             if($row[icon_sale21] == 1){
             echo("<img src='images/i_sale.gif' align='absmiddle' vspace='1'>");
             
             echo("<font color='red'>"." "."$row[discount21]"."%"."</font>");
             $price = number_format($row[price21]) ." 원";
             echo("<tr><td height='20' align='center'><strike>$price</strike><br>");
             $sale=round($row[price21]*(100-$row[discount21])/100, -3) . " 원";
             echo("<b>$sale</b>");
             echo("</td></tr><br>");
             } else {
             $price = number_format($row[price21]) ." 원";
             echo("<tr><td height='20' align='center'><b>$price</b></td></tr><br>");}
             
             echo("</td>");
             echo("</tr>");
             echo("</table>");
             echo("</td>");
             
             }
             else
             echo("<td></td>");      // 제품 없는 경우
             $icount++;
             }
             echo("</tr>");
             }
             echo("</table>");
