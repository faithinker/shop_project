<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2017.12)                                                    -->
<!-------------------------------------------------------------------------------------------->	
<?//주문번호, 주문자
  include "../common.php";
  
  $no=$_REQUEST[no];
  $state=$_REQUEST[state];

  $query = "select * from jumun where no21='$no';";
  $result = mysqli_query($db, $query);
  if (!$result) exit("에러: $query");

  $row = mysqli_fetch_array($result);

  if($row[member_no13] == 0) $client_text = 비회원;
  else $client_text = 회원;

  if($row[pay_method21]==1){
	$pay_method ="무통장";
  }	
  else{
	$pay_method ="카드";
  }

  $o_tel21_1=trim(substr($row[o_tel21],0,3));    //0번 위치에서 3자리 문자열 추출
  $o_tel21_2=trim(substr($row[o_tel21],3,4)); 	  //3번 위치에서 4자리
  $o_tel21_3=trim(substr($row[o_tel21],7,4));	  //7번 위치에서 4자리

  $o_phone21_1=trim(substr($row[o_phone21],0,3));    //0번 위치에서 3자리 문자열 추출
  $o_phone21_2=trim(substr($row[o_phone21],3,4)); 	  //3번 위치에서 4자리
  $o_phone21_3=trim(substr($row[o_phone21],7,4));	  //7번 위치에서 4자리

  $r_tel21_1=trim(substr($row[r_tel21],0,3));    //0번 위치에서 3자리 문자열 추출
  $r_tel21_2=trim(substr($row[r_tel21],3,4)); 	  //3번 위치에서 4자리
  $r_tel21_3=trim(substr($row[r_tel21],7,4));	  //7번 위치에서 4자리

  $r_phone21_1=trim(substr($row[r_phone21],0,3));    //0번 위치에서 3자리 문자열 추출
  $r_phone21_2=trim(substr($row[r_phone21],3,4)); 	  //3번 위치에서 4자리
  $r_phone21_3=trim(substr($row[r_phone21],7,4));	  //7번 위치에서 4자리

  $a =$row[state21];
  $total_price = number_format($row[total_cash21]);

  if( $row[card_halbu21] == 0){
          $card_halbu ="일시불";
  }
  else if ($row[card_halbu21] == 3){
        $card_halbu ="3개월";
  }
  else if ($row[card_halbu21] == 6){
        $card_halbu ="6개월";
  }
  else if ($row[card_halbu21] == 9){
        $card_halbu ="9개월";
  }
  else if ($row[card_halbu21] == 12){
        $card_halbu ="12개월";
  }
  
  if($row[card_kind21] == 0){
          $card_kind = "";
  }
  else if ($row[card_kind21] == 1){
        $card_kind ="국민카드";
  }
  else if ($row[card_kind21] == 2){
        $card_kind ="신한카드";
  }
  else if ($row[card_kind21] == 3){
        $card_kind ="우리카드";
  }
  else if ($row[card_kind21] == 4){
        $card_kind ="하나카드";
  }
  if($row[bank_kind21] == 1){
        $bank_kind = "국민은행:123-12-12345";
  }
  else if ($row[bank_kind21] == 2){
        $bank_kind ="신한은행:123-12-12345";
  }
?>
<html>
<head>
<title>쇼핑몰 홈페이지</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="include/font.css">
<script language="JavaScript" src="include/common.js"></script>
</head>

<body style="margin:0">

<center>

<br>
<script> document.write(menu());</script>
<br>
<br>

<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">주문번호</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE">&nbsp;<font size="3"><b><?=$row[no21]?> (<font color="blue"><?=$a_state[$a]?></font>)</b></font></td>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">주문일</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$row[jumunday21]?></td>
	</tr>
</table>
<br>
<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">주문자</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$row[o_name21]?> (<?=$client_text?>) </td>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">주문자전화</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$o_tel21_1?> - <?=$o_tel21_2?> - <?=$o_tel21_3?></td>
	</tr>
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">주문자 E-Mail</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$row[o_email21]?></td>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">주문자핸드폰</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$o_phone21_1?> - <?=$o_phone21_2?> - <?=$o_phone21_3?></td>
	</tr>
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">주문자주소</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE" colspan="3">(<?=$row[o_zip21]?>) <?=$row[o_juso21]?></td>
	</tr>
	</tr>
</table>
<img src="blank.gif" width="10" height="5"><br>
<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">수신자</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$row[o_name21]?></td>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">수신자전화</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$r_tel21_1?> - <?=$r_tel21_2?> - <?=$r_tel21_3?></td>
	</tr>
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">수신자 E-Mail</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$row[o_email21]?></td>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">수신자핸드폰</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$r_phone21_1?> - <?=$r_phone21_2?> - <?=$r_phone21_3?></td>
	</tr>
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">수신자주소</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE" colspan="3">(<?=$row[o_zip21]?>) <?=$row[o_juso21]?></td>
	</tr>
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">메모</font></td>
        <td width="300" height="50" bgcolor="#EEEEEE" colspan="3"><?=$row[memo21]?></td>
	</tr>
</table>
<br>
<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">지불종류</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$pay_method?></td>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">카드승인번호 </font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"></td>
	</tr>
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">카드 할부</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$card_halbu?></td>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">카드종류</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$card_kind?></td>
	</tr>
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">무통장</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$bank_kind?></td>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">입금자이름</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$row[bank_sender21]?></td>
	</tr>
</table>
<br>
<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
	<tr bgcolor="#CCCCCC"> 
    <td width="340" height="20" align="center"><font color="#142712">상품명</font></td> <!-- 상품명은 product 테이블의 name21을 갖고와야 한다. -->
		<td width="50"  height="20" align="center"><font color="#142712">수량</font></td>
		<td width="70"  height="20" align="center"><font color="#142712">단가</font></td>
		<td width="70"  height="20" align="center"><font color="#142712">금액</font></td>
		<td width="50"  height="20" align="center"><font color="#142712">할인</font></td>
		<td width="60"  height="20" align="center"><font color="#142712">옵션1</font></td>
		<td width="60"  height="20" align="center"><font color="#142712">옵션2</font></td>
	</tr>
<?
  $query=" select *, p.name21 as pname21, js.num21 as jsnum21, js.price21 as jsprice21, js.cash21 as jscash21, o1.name21 as name1, o2.name21 as name2 
  from jumun as j, jumuns as js, product as p, opts as o1, opts as o2 
  where j.no21 = js.jumun_no21 and js.product_no21 = p.no21  
        and js.opts1_no21 = o1.no21 
        and js.opts2_no21 = o2.no21 
        and js.jumun_no21='$no'
  ;"; 
  $result = mysqli_query($db, $query);
  if (!$result) exit("에러: $query");

  $count = mysqli_num_rows($result);   
  
  for($i=0; $i < $row[product_nums21]; $i++){
        $row2 = mysqli_fetch_array($result);
	echo("<tr bgcolor='#EEEEEE' height='20'>	
                <td width='340' height='20' align='left'>$row2[pname21]</td>	
                <td width='50'  height='20' align='center'>$row2[jsnum21]</td>	
                <td width='70'  height='20' align='right'>$row2[jsprice21]</td>	
                <td width='70'  height='20' align='right'>$row2[jscash21]</td>	
                <td width='50'  height='20' align='center'>$row2[discount21]%</td>	
                <td width='60'  height='20' align='center'>$row2[name1]</td>	
                <td width='60'  height='20' align='center'>$row2[name2]</td>	
        </tr>");
  }
  if($row[total_cash21] < $max_baesongbi){
        echo("<tr bgcolor='#EEEEEE' height='20'>
        <td width='340' height='20' align='left'>배송비</td>   
        <td width='50'  height='20' align='center'></td>   
        <td width='70'  height='20' align='right'>$baesongbi</td>   
        <td width='70'  height='20' align='right'>$baesongbi</td>   
        <td width='50'  height='20' align='center'></td>   
        <td width='60'  height='20' align='center'></td>   
        <td width='60'  height='20' align='center'></td>
        </tr>");
  }  


?>
</table>
<br>
<img src="blank.gif" width="10" height="5"><br>
<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
	<tr> 
	  <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">총금액</font></td>
		<td width="700" height="20" bgcolor="#EEEEEE" align="right"><font color="#142712" size="3"><b><?=$total_price?></b></font> 원&nbsp;&nbsp</td>
	</tr>
</table>
<br>
<table width="800" border="0" cellspacing="0" cellpadding="7">
	<tr> 
		<td align="center">
			<input type="button" value="이 전 화 면" onClick="javascript:history.back();">&nbsp
			<input type="button" value="프린트" onClick="javascript:print();">
		</td>
	</tr>
</table>

</center>

<br>
</body>
</html>
