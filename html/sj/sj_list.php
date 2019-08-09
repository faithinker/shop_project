<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)																								-->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2017.12)																												-->
<!-------------------------------------------------------------------------------------------->	
<?
	include "common.php";

	$text1 = $_REQUEST[text1];
	$page = $_REQUEST[page];
?>
<html>
<head>
	<title>성적처리 프로그램</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="font.css">
</head>
<body>

<table width="400" border="0">
	<form name="form1" method="post" action="sj_list.php">
		<tr>
			<td>
				이름: <input type="text" name="text1" size="10" value="<?=$text1;?>">
				<input type="button" value="검색" onClick="javascript:form1.submit();">
			</td>
			<td align="right">
				<a href="sj_new.html">입력</a>
			</td>
		</tr>
	</form>
</table>		

<table width="400" border="1" cellpadding="2" style="border-collapse:collapse">
  <tr bgcolor="lightblue">
    <td width="100" align="center">이름</td>
    <td width="50"  align="center">국어</td>
    <td width="50"  align="center">영어</td>
    <td width="50"  align="center">수학</td>
    <td width="50"  align="center">총점</td>
    <td width="50"  align="center">평균</td>
	<td width="50"  align="center">삭제</td>
  </tr>
	<?
		if(!$text1)
			$query = "select * from sj order by name21;";				// sql 정의
		else
			$query = "select * from sj where name21 like '%$text1%' order by name21;";	// sql 정의

		$result = mysqli_query($db, $query);								// sql 실행
		if (!$result) exit("에러: $query");										// 에러 조사

		$count = mysqli_num_rows($result);								// 전체 레코드 개수

		if (!$page) $page = 1;												
		$pages = ceil($count/$page_line);									// 전체 페이지 수
		$first = 1;
		if ($count > 0) $first = $page_line * ($page - 1);				// 현재 페이지 row 위치
		$page_last = $count - $first;
		if ($page_last > $page_line) $page_last = $page_line;		// 현재 페이지 line수
		if ($count > 0) mysqli_data_seek($result, $first);				// 현재 페이지 첫줄로 이동

		for ($i = 0; $i < $page_last; $i++) {
			$row = mysqli_fetch_array($result);											// 1레코드 읽기
			$avg = sprintf("%6.1f", $row[avg21]);
			echo("<tr bgcolor='lightyellow'>
				<td align='center'>&nbsp
					<a href='sj_edit.php?no=$row[no21]'>$row[name21]</a>
				</td>
				<td align='center'>$nbsp $row[kor21]</td>
				<td align='center'>$nbsp $row[eng21]</td>
				<td align='center'>$nbsp $row[mat21]</td>
				<td align='center'>$nbsp $row[hap21]</td>
				<td align='right'>$avg &nbsp</td>
				<td align='center'>
					<a href='sj_delete.php?no=$row[no21]'
						onClick='javascript:return confirm(\"삭제할까요?\");'>
						삭제
					</a>
				</td>
			</tr>");
		}
	?>
</table>

<?
	$blocks = ceil($pages / $page_block);				// 전체 블록 수
	$block = ceil($page / $page_block);				// 현재 블록
	$page_s = $page_block * ($block - 1);			// 현재 페이지
	$page_e = $page_block * $block;					// 마지막 페이지
	if ($blocks <= $block) $page_e = $pages;

	echo("<table width='400' border='0'>
					<tr>
						<td height='20' align='center'>");
	
	if ($block > 1)	{				// 이전 블록으로
		$tmp = $page_s;
		echo("<a href='sj_list.php?page=$tmp&text1=$text1'>
						<img src='images/i_prev.gif' align='absmiddle' border='0'>
					</a>&nbsp");
	}

	for($i = $page_s + 1; $i <= $page_e; $i++) {	// 현재 블록의 페이지
		if ($page == $i)
			echo("<font color='red'><b>$i</b></font>&nbsp");
		else
			echo("<a href='sj_list.php?page=$i&text1=$text1'>[$i]</a>&nbsp");
	}
	
	if ($block < $blocks) {		// 다음 블록으로
		$tmp = $page_e + 1;
		echo("&nbsp<a href='sj_list.php?page=$tmp&text1=$text1'>
						<img src='images/i_next.gif' align='absmiddle' border='0'>
					</a>");
	}

	echo("		</td>
					</tr>
				</table>");
?>

</body>
</html>
