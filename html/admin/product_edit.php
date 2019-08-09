<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2017.12)                                                    -->
<!-------------------------------------------------------------------------------------------->	
<?
	include "../common.php";

	$no = $_REQUEST[no];

	$sel1=$_REQUEST[sel1];
	$sel2=$_REQUEST[sel2];
	$sel3=$_REQUEST[sel3];
	$sel4=$_REQUEST[sel4];

	$text1=$_REQUEST[text1];
	$page=$_REQUEST[page];

	$query = "select * from product where no21=$no;";
	$result = mysqli_query($db, $query);
	if (!$result) exit("에러: $query");
	$row = mysqli_fetch_array($result);

	$price=number_format($row[price21]);

	$regday1=substr($row[regday21],0,4);
	$regday2=substr($row[regday21],5,2);
	$regday3=substr($row[regday21],8,2);
?>

<html>
<head>
<title>쇼핑몰 관리자 홈페이지</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="include/font.css">
<script language="JavaScript" src="include/common.js"></script>

<script language="JavaScript">
	function imageView(strImage)
	{
		this.document.images["big"].src = strImage;
	}
</script>

</head>

<body style="margin:0">

<form name="form1" method="post" action="product_update.php" enctype="multipart/form-data">

<input type="hidden" name="sel1" value="<?=$sel1?>">
<input type="hidden" name="sel2" value="<?=$sel2?>">
<input type="hidden" name="sel3" value="<?=$sel3?>">
<input type="hidden" name="sel4" value="<?=$sel4?>">
<input type="hidden" name="text1" value="<?=$text1?>">
<input type="hidden" name="page" value="<?=$page?>">
<input type="hidden" name="no" value="<?=$no?>">

<center>

<br>
<script> document.write(menu());</script>
<br>
<br>

<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
	<tr height="23"> 
		<td width="100" bgcolor="#CCCCCC" align="center">상품분류</td>
		<td width="700" bgcolor="#F2F2F2">
		<?
			echo("<select name='menu'>");
			echo("<option value='0'>상품분류를 선택하세요</option>");
			for($i = 1; $i < $n_menu; $i++) {
				if($row[menu21] == $i)
					echo("<option value='$i' selected>$a_menu[$i]</option>");
				else
					echo("<option value='$i'>$a_menu[$i]</option>");
			}
			echo("</select>");
		?>
		</td>
	</tr>
	<tr height="23"> 
		<td width="100" bgcolor="#CCCCCC" align="center">상품코드</td>
		<td width="700"  bgcolor="#F2F2F2">
			<input type="text" name="code" value="<?=$row[code21]?>" size="20" maxlength="20">
		</td>
	</tr>
	<tr> 
		<td width="100" bgcolor="#CCCCCC" align="center">상품명</td>
		<td width="700"  bgcolor="#F2F2F2">
			<input type="text" name="name" value="<?=$row[name21]?>" size="60" maxlength="60">
		</td>
	</tr>
	<tr> 
		<td width="100" bgcolor="#CCCCCC" align="center">제조사</td>
		<td width="700"  bgcolor="#F2F2F2">
			<input type="text" name="coname" value="<?=$row[coname21]?>" size="30" maxlength="30">
		</td>
	</tr>
	<tr> 
		<td width="100" bgcolor="#CCCCCC" align="center">판매가</td>
		<td width="700"  bgcolor="#F2F2F2">
			<input type="text" name="price" value="<?=$price?>" size="12" maxlength="12"> 원
		</td>
	</tr>
	<tr> 
		<td width="100" bgcolor="#CCCCCC" align="center">옵션</td>
		<td width="700"  bgcolor="#F2F2F2">
			<select name="opt1">
				<option value="0">옵션선택</option>
				<?
					$query = "select * from opt order by no21;";

					$result = mysqli_query($db, $query);
					if(!$result) exit("에러: $query");
					$count = mysqli_num_rows($result);

					for ($i = 0; $i < $count; $i++) {
						$row1 = mysqli_fetch_array($result);
						if($row[opt1_21] == $row1[no21])
							echo("<option value='$row1[no21]' selected>$row1[name21]</option>");
						else
							echo("<option value='$row1[no21]'>$row1[name21]</option>");
					}
				?>
			</select> &nbsp; &nbsp; 

			<select name="opt2">
				<option value="0">옵션선택</option>
				<?
					$query = "select * from opt order by no21;";

					$result = mysqli_query($db, $query);
					if(!$result) exit("에러: $query");
					$count = mysqli_num_rows($result);

					for ($i = 0; $i < $count; $i++) {
						$row2 = mysqli_fetch_array($result);
						if($row[opt2_21] == $row2[no21])
							echo("<option value='$row2[no21]' selected>$row2[name21]</option>");
						else
							echo("<option value='$row2[no21]'>$row2[name21]</option>");
					}
				?>
			</select> &nbsp; &nbsp; 
		</td>
	</tr>
	<tr> 
		<td width="100" bgcolor="#CCCCCC" align="center">제품설명</td>
		<td width="700"  bgcolor="#F2F2F2">
			<textarea name="contents" rows="4" cols="70"><?=$row[contents21]?></textarea>
		</td>
	</tr>
	<tr>
        <td width="100" bgcolor="#CCCCCC" align="center">동영상</td>
		<td width="700"  bgcolor="#F2F2F2">
			<textarea name="video" rows="1" cols="80"><?=$row[video21]?></textarea>
        </td>
    </tr>
	<tr> 
		<td width="100" bgcolor="#CCCCCC" align="center">상품상태</td>
		<td width="700"  bgcolor="#F2F2F2">
			<?
				if($row[status21]==1) echo("<input type='radio' name='status' value='1' checked> 판매중
				<input type='radio' name='status' value='2'> 판매중지
				<input type='radio' name='status' value='3'> 품절");

				else if($row[status21]==2) echo("<input type='radio' name='status' value='1'> 판매중
				<input type='radio' name='status' value='2' checked> 판매중지
				<input type='radio' name='status' value='3'> 품절");

				else echo("<input type='radio' name='status' value='1'> 판매중
				<input type='radio' name='status' value='2'> 판매중지
				<input type='radio' name='status' value='3' checked> 품절");
			?>
		</td>
	</tr>
	<tr>
		<?
			if($row[icon_new21] == 1) $new = "checked";
			if($row[icon_hit21] == 1) $hit = "checked";
			if($row[icon_sale21] == 1) $sale = "checked";
		?>
		<td width="100" bgcolor="#CCCCCC" align="center">아이콘</td>
		<td width="700"  bgcolor="#F2F2F2">
			<input type="checkbox" name="icon_new" value="1" <?=$new?>> New &nbsp;&nbsp	
			<input type="checkbox" name="icon_hit" value="1" <?=$hit?>> Hit &nbsp;&nbsp	
			<input type="checkbox" name="icon_sale" value="1" <?=$sale?>> Sale &nbsp;&nbsp
			할인율 : <input type="text" name="discount" value="<?=$row[discount21]?>" size="3" maxlength="3"> %
		</td>
	</tr>
	<tr> 
		<td width="100" bgcolor="#CCCCCC" align="center">등록일</td>
		<td width="700"  bgcolor="#F2F2F2">
			<input type="text" name="regday1" value="<?=$regday1?>" size="4" maxlength="4"> 년 &nbsp
			<input type="text" name="regday2" value="<?=$regday2?>" size="2" maxlength="2"> 월 &nbsp
			<input type="text" name="regday3" value="<?=$regday3?>" size="2" maxlength="2"> 일 &nbsp
		</td>
	</tr>
	<tr> 
		<td width="100" bgcolor="#CCCCCC" align="center">이미지</td>
		<td width="700"  bgcolor="#F2F2F2">
			<?
				if($row[image1_21]) $img_name1 = "checked";
				if($row[image2_21]) $img_name2 = "checked";
				if($row[image3_21]) $img_name3 = "checked";
			?>
			<table border="0" cellspacing="0" cellpadding="0" align="left">
				<tr>
					<td>
						<table width="390" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td>
									<input type='hidden' name='imagename1' value='<?=$row[image1_21]?>'>
									&nbsp;<input type="checkbox" name="checkno1" value="1" <?=$img_name1?>> <b>이미지1</b>: <?=$row[image1_21]?>
									<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<input type="file" name="image1" size="20" value="찾아보기">
								</td>
							</tr> 
							<tr>
								<td>
									<input type='hidden' name='imagename2' value='<?=$row[image2_21]?>'>
									&nbsp;<input type="checkbox" name="checkno2" value="1" <?=$img_name2?>> <b>이미지2</b>: <?=$row[image2_21]?>
									<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<input type="file" name="image2" size="20" value="찾아보기">
								</td>
							</tr> 
							<tr>
								<td>
									<input type='hidden' name='imagename3' value='<?=$row[image3_21]?>'>
									&nbsp;<input type="checkbox" name="checkno3" value="1" <?=$img_name3?>> <b>이미지3</b>: <?=$row[image3_21]?>
									<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<input type="file" name="image3" size="20" value="찾아보기">
								</td>
							</tr> 
							<tr>
								<td><br>&nbsp;&nbsp;&nbsp;※ 삭제할 그림은 체크를 해제 해주세요.</td>
							</tr> 
				  	</table>
						<?
							if($row[image1_21]) $img_screen1 = $row[image1_21];
							else $img_screen1 = "nopic.jpg";

							if($row[image2_21]) $img_screen2 = $row[image2_21];
							else $img_screen2 = "nopic.jpg";

							if($row[image3_21]) { $img_screen3 = $row[image3_21]; }
							else $img_screen3 = "nopic.jpg";
						?>
						<br><br><br><br><br>
						<table width="390" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td  valign="middle">&nbsp;
									<img src="../product/<?=$img_screen1?>" width="50" height="50" border="1" style='cursor:hand' onclick="imageView('../product/<?=$img_screen1?>')">&nbsp;
									<img src="../product/<?=$img_screen2?>" width="50" height="50" border="1" style='cursor:hand' onclick="imageView('../product/<?=$img_screen2?>')">&nbsp;
									<img src="../product/<?=$img_screen3?>" width="50" height="50" border="1" style='cursor:hand' onclick="imageView('../product/<?=$img_screen3?>')">&nbsp;
								</td>
							</tr>				 
						</table>
					</td>
					<td>
						<td align="right" width="310"><img name="big" src="../product/<?=$img_screen1?>" width="300" height="300" border="1"></td>
					</td>
				</tr>
			</table>

		</td>
	</tr>
</table>

<table width="800" border="0" cellspacing="0" cellpadding="5">
	<tr> 
		<td align="center">
			<input type="submit" value="수정하기"> &nbsp;&nbsp
			<input type="button" value="이전화면" onClick="javascript:history.back();">
		</td>
	</tr>
</table>

</form>

</center>

</body>
</html>
