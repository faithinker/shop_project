<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2017.12)                                                    -->
<!-------------------------------------------------------------------------------------------->	
<?
	include "../common.php";

	$no1=$_REQUEST[no1];
	$query = "select name21 from opt where no21=$no1";//옵션에 있는 "제품명" 쿼리 불러오기
    $result = mysqli_query($db, $query);								// sql 실행
    if (!$result) exit("에러: $query");										// 에러 조사
	$row = mysqli_fetch_array($result);		// 정렬해주
?>
<html>
<head>
<title>쇼핑몰 홈페이지</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="include/font.css">
<script language="JavaScript" src="include/common.js"></script>
<script>
	function go_new()
	{
		location.href="opts_new.php?no1=<?=$no1;?>"; //소옵션명 맵핑, 각각에 대응하는 것
	}
</script>
</head>

<body style="margin:0">

<center>

<br>
<script> document.write(menu());</script>

<table width="500" border="0" cellspacing="0" cellpadding="0">
	<tr height="50">
		<td align="left"  width="300" valign="bottom">&nbsp 옵션명 : <font color="#0457A2"><b><?echo("$row[name21]");?></b></font></td> <!--옵션명 출력-->
		<td align="right" width="200" valign="bottom">
			<input type="button" value="신규입력" onclick="javascript:go_new();"> &nbsp
		</td>
	</tr>
	<tr><td height="5" colspan="2"></td></tr>
</table>

<table width="500" border="1" cellpadding="2" style="border-collapse:collapse">
	<tr bgcolor="#CCCCCC" height="20"> 
		<td width="100" align="center"><font color="#142712">소옵션번호</font></td>
		<td width="300" align="center"><font color="#142712">소옵션명</font></td>
		<td width="100" align="center"><font color="#142712">수정/삭제</font></td>
	</tr>
<?	
	$query = "select * from opts where opt_no21=$no1 order by no21;";  //소옵션 목록명 표시
	$result = mysqli_query($db, $query);								// sql 실행
	$count = mysqli_num_rows($result);
	if (!$result) exit("에러: $query");										// 에러 조사

	for ($i = 0; $i < $count; $i++) {
		$row = mysqli_fetch_array($result);		// 1레코드 읽기
		echo("<tr bgcolor='#F2F2F2' height='20'>	
			<td width='100' align='center'>$row[no21]</td>  
			<td width='300' align='left'>$row[name21]</td> 
 			<td width='100' align='center'>
				<a href='opts_edit.php?no1=$row[opt_no21]&no2=$row[no21]'>수정</a>/
				<a href='opts_delete.php?no1=$row[opt_no21]&no2=$row[no21]' onclick='javascript:return confirm(\"삭제할까요 ?\");'>삭제</a>
			</td>
		</tr>"); //순서대로 소옵션번호, 소옵션명, 수정/삭제
	}
?>
</table>

</center>

</body>
</html>