<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2017.12)                                                    -->
<!-------------------------------------------------------------------------------------------->	
<?
    include "../common.php";
	$no1=$_REQUEST[no1];
	
    $query = "select*from opt where no21=$no1;";				// sql 정의
    $result = mysqli_query($db, $query);								// sql 실행
	if (!$result) exit("에러: $query");										// 에러 조사
	$row=mysqli_fetch_array($result);

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

<form name="form1" method="post" action="opt_edit2.php" value="update">

<input type="hidden" name="no1" value="<?=$no1?>"> <!--value추가 -->

<table width="500" border="1" cellpadding="2" style="border-collapse:collapse">
	<tr> 
		<td width="100" height="20" bgcolor="#CCCCCC" align="center">
			<font color="#142712">옵션번호</font>
		</td>
		<td width="400" height="20"  bgcolor="#F2F2F2"><?=$row[no21]?></td> <!--value추가 -->
	</tr>
	<tr> 
		<td width="100" height="20" bgcolor="#CCCCCC" align="center">
			<font color="#142712">옵션명</font>
		</td>
		<td width="400" height="20"  bgcolor="#F2F2F2">
			<input type="text" name="name" value="<?=$row[name21]?>" size="20" maxlength="20"> <!--value추가 -->
		</td>
	</tr>
</table>
<br>
<table width="500" border="0" cellspacing="0" cellpadding="7">
	<tr> 
		<td align="center">
			<input type="submit" value="수 정 하 기"> &nbsp;&nbsp
			<input type="button" value="이 전 화 면" onClick="javascript:history.back();">
		</td>
	</tr>
</table>

</form>

</center>

</body>
</html>
