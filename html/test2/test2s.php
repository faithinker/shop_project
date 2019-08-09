<?
	include "../common.php";

	$no1=$_REQUEST[no1];
	$query = "select name21 from test2 where no21=$no1";//옵션에 있는 "제품명" 쿼리 불러오기
    $result = mysqli_query($db, $query);								// sql 실행
    if (!$result) exit("에러: $query");										// 에러 조사
	$row = mysqli_fetch_array($result);		// 정렬해주기

?>
<html>
<head>
	<title>직원 프로그램</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="font.css">
</head>
<body>

<input type="hidden" name="no1" value="<?=$no1?>">

<table width="300" border="0">
	<tr>
		<td align="left"  width="300" valign="bottom">
			직원이름 : <font color="blue"><b><?echo("$row[name21]");?></b></font>
		</td>
		<td align="right" width="200" valign="bottom">
			<a href="test2s_new.php?no1=$no1">입력</a>
		</td>
	</tr>
</table>

<table width="300" bgcolor="#eeeeee" class="mytable">
  <tr bgcolor="#aaaaaa">
    <td width="100" align="center">가족이름</td>
    <td width="100" align="center">기족생일</td>
    <td width="100" align="center">수정/삭제</td>
  </tr>
<?	
	$query = "select * from test2s where test2_no21=$no1 order by no21;";  //소옵션 목록명 표시
	$result = mysqli_query($db, $query);								// sql 실행
	$count = mysqli_num_rows($result);
	if (!$result) exit("에러: $query");										// 에러 조사

	for ($i = 0; $i < $count; $i++) {
		$row = mysqli_fetch_array($result);		// 1레코드 읽기,date수정 필요할듯함
		
	
		
		echo("<tr>
			<td width='100' align='center'>$row[name21]</td>
			<td width='100' align='center'>$row[birthday21]</td> 
			<td width='100' align='center'>
				<a href='test2s_edit.php?no1=$row[test2_no21]&no2=$row[no21]'>수정</a> / 
				<a href='test2s_delete.html?no1=$row[test2_no21]&no2=$row[no21]' onClick='javascript:return confirm(\"삭제할까요 ?\");'>삭제</a>
			</td>
		</tr>"); //순서대로 소옵션번호, 소옵션명, 수정/삭제
	}
?>
</table>

<table width="300" border="0">
	 <tr height="35">
		<td align="center"> 
			<input type="button" value="가족 목록화면으로" onclick="javascript:location.href='test2.php';">
		</td>
	</tr>
</table>

</body>
</html>
