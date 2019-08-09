<?
	include "../common.php";

	$text1 = $_REQUEST[text1];
	$page = $_REQUEST[page];
?>
<html>
<head>
	<title>직원 프로그램</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="font.css">
</head>
<body>

<table width="450" border="0">
	<form name="form1" method="post" action="test2_list.html">
	<tr>
		<td width="300">
			이름 : <input type="text" name="text1" size="10" value="">
			<input type="button" value="검색" onClick="javascript:form1.submit();">
		</td>
		<td align="right"><a href="test2_new.html">입력</a>&nbsp</td>
	</tr>
	</form>
</table>

<table width="450" bgcolor="#eeeeee" class="mytable">
  <tr bgcolor="#aaaaaa">
    <td width="100" align="center">이름</td>
    <td width="150" align="center">전화</td>
    <td width="100" align="center">수정/삭제</td>
    <td width="100" align="center">가족편집</td>
  </tr>
   <?
	if(!$text1)
			$query = "select * from test2 order by name21;";				// sql 정의
		else
			$query = "select * from test2 where name21 like '%$text1%' order by name21;";	// sql 정의

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



    for($i=0; $i<$page_last; $i++){
		$row = mysqli_fetch_array($result);	
		$tel1=trim(substr($row[tel21],0,3));    //0번 위치에서 3자리 문자열 추출
		$tel2=trim(substr($row[tel21],3,4)); 	  //3번 위치에서 4자리
		$tel3=trim(substr($row[tel21],7,4));	  //7번 위치에서 4자리
		$tel=$tel1 . "-" . $tel2 . "-" . $tel3; 	//

		echo("<tr>
				<td width='100' align='center'>$row[name21]</td>
				<td width='150' align='center'>$tel</td>
				<td width='100' align='center'>
				<a href='test2_edit.php?no1=$row[no21]'>수정</a> / 
				<a href='test2_delete.php?no1=$row[no21]' onClick='javascript:return confirm(\"삭제할까요 ?\");'>삭제</a>
				</td>
				<td width='100' align='center'>
					<a href='test2s.php?no1=$row[no21]'>가족편집</a>
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

	echo("<table width='450' border='0' cellspacing='0' cellpadding='0'>
  <tr height='35'>
		<td align='center'>");
	
	if ($block > 1)	{				// 이전 블록으로
		$tmp = $page_s;
		echo("<a href='test2.php?page=$tmp&text1=$text1'>
				<img src='images/i_prev.gif' align='absmiddle' border='0'>
				</a>&nbsp
			");
	}

	for($i = $page_s + 1; $i <= $page_e; $i++) {	// 현재 블록의 페이지
		if ($page == $i)
			echo("<font color='#FC0504'><b>1</b></font>&nbsp;");
		else
			echo("<a href='test2.php?page=$i&text1=$text1'>[$i]</a>&nbsp");
	}
	
	if ($block < $blocks) {		// 다음 블록으로
		$tmp = $page_e + 1;
		echo("&nbsp<a href='test2.php?page=$tmp&text1=$text1'>
				<img src='images/i_next.gif' align='absmiddle' border='0'>
					</a>
			");
	}

	echo("		</td>
			</tr>
		</table>");
?> 
<!--
<table width='450' border='0' cellspacing='0' cellpadding='0'>
  <tr height='35'>
		<td align='center'>
			<img src='images/i_prev.gif' align='absmiddle' border='0'> 
			<font color='#FC0504'><b>1</b></font>&nbsp;
			<a href='test2_list.html?page=2&text1='><font color='#7C7A77'>[2]</font></a>&nbsp;
			<a href='test2_list.html?page=3&text1='><font color='#7C7A77'>[3]</font></a>&nbsp;
			<img src='images/i_next.gif' align='absmiddle' border='0'>
		</td>
	</tr>
</table> -->

</body>
</html>
