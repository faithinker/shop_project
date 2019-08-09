<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2.4)                                                           -->
<!-------------------------------------------------------------------------------------------->	
<?
	include "common.php";

	$text1 = $_REQUEST[text1];
	$page = $_REQUEST[page];
?>
<html>
<head>
	<title>거래처 프로그램</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="font.css">
</head>
<body>

<table width="750" border="0">
	<form name="form1" method="post" action="co_list.php">
	<tr>
		<td width="300">&nbsp
			거래처명 : <input type="text" name="text1" size="10" value="<?=$text1;?>">
			<input type="button" value="검색" onClick="javascript:form1.submit();">
		</td>
    <td align="right"><a href="co_new.html">입력</a>&nbsp</td>
	</tr>
	</form>
</table>

<table width="750"  border="1" cellpadding="1" cellspacing="0">
  <tr bgcolor="#555555">
    <td width="150" align="center"><font color="white">거래처명</font></td>
    <td width="100" align="center"><font color="white">전화</font></td>
    <td width="100" align="center"><font color="white">소매/도매</font></td>
    <td width="100" align="center"><font color="white">창립일</font></td>
    <td width="250" align="center"><font color="white">주소</font></td>
    <td width="50"  align="center"><font color="white">삭제</font></td>
  </tr>

<?
		if(!$text1)
			$query = "select * from co order by coname21;";				// sql 정의
		else
			$query = "select * from co where coname21 like '%$text1%' order by coname21;";	// sql 정의

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
			$row = mysqli_fetch_array($result);										// 1레코드 읽기
			if($row[gubun21]==0) $gubun="도매"; else $gubun="소매";					//양력음력 추가
		$phone1=trim(substr($row[phone21],0,3));    //0번 위치에서 3자리 문자열 추출
		$phone2=trim(substr($row[phone21],3,4)); 	  //3번 위치에서 4자리
		$phone3=trim(substr($row[phone21],7,4));	  //7번 위치에서 4자리
		$phone=$phone1 . "-" . $phone2 . "-" . $phone3; 	//co_list.php, co_edit php
			echo("
			<tr bgcolor='#DDDDDD'>
					<td width='150' align='left'>&nbsp
					<a href='co_edit.php?no=$row[no21]'>$row[coname21]</a></td>
					<td width='100' align='center'>$phone</td>
					<td width='100' align='center'>$gubun</td>
					<td width='100' align='center'>$row[startday21]</td>
					<td width='250' align='left'>&nbsp $row[address21]</td>
					<td width='50'  align='center'>
					<a href='co_delete.php?no=$row[no21]' onClick='javascript:return confirm('삭제할까요 ?');'>삭제</a>
					</td>
				</tr>");
		}
	
		
?>

<?
	$blocks = ceil($pages / $page_block);				// 전체 블록 수
	$block = ceil($page / $page_block);				// 현재 블록
	$page_s = $page_block * ($block - 1);			// 현재 페이지
	$page_e = $page_block * $block;					// 마지막 페이지
	if ($blocks <= $block) $page_e = $pages;

	echo("<table width='750' border='0' cellpadding='0' cellspacing='0'>
			<tr>
				<td height='30' align='center'>");
	
	if ($block > 1)	{				// 이전 블록으로
		$tmp = $page_s;
		echo("<a href='co_list.php?page=$tmp&text1=$text1'>
				<img src='images/i_prev.gif' align='absmiddle' border='0'>
				</a>&nbsp
			");
	}

	for($i = $page_s + 1; $i <= $page_e; $i++) {	// 현재 블록의 페이지
		if ($page == $i)
			echo("<font color='#FC0504'><b>$i</b></font>&nbsp;");
		else
			echo("<a href='co_list.php?page=$i&text1=$text1'>[$i]</a>&nbsp");
	}
	
	if ($block < $blocks) {		// 다음 블록으로
		$tmp = $page_e + 1;
		echo("&nbsp<a href='co_list.php?page=$tmp&text1=$text1'>
				<img src='images/i_next.gif' align='absmiddle' border='0'>
					</a>
			");
	}

	echo("		</td>
			</tr>
		</table>");
?> 

<!-- 밑에 5줄씩 끊어서 보여줌
<table width="750" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td height="30" align="center">

			<img src="images/i_prev.gif" align="absmiddle" border="0"> 
			<font color="#FC0504"><b>1</b></font>&nbsp;
			<a href="co_list.php?page=$tmp&text1=$text1'><font color="#7C7A77">[2]</font></a>&nbsp;
			<a href='co_list.php?page=$tmp&text1=$text1'><font color='#7C7A77'></font></a>&nbsp;

			&nbsp<a href='juso_list.php?page=$tmp&text1=$text1'>
						<img src='images/i_next.gif' align='absmiddle' border='0'>
					</a>


			<img src="images/i_next.gif" align="absmiddle" border="0">
		</td>
	</tr>
</table>
-->



  <!--
  <tr bgcolor="#DDDDDD">
    <td width="150" align="left">&nbsp<a href="co_edit.html?no=1&page=1&text1=">인덕주식회사</a></td>
    <td width="100" align="center">022-111-1111</td>
    <td width="100" align="center">소매</td>
    <td width="100" align="center">1990-01-01</td>
    <td width="250" align="left">&nbsp 서울 노원구 월계4동 산76 인덕대학</td>
    <td width="50"  align="center">
			<a href="co_delete.html?no=1&page=1&text1=" onClick="javascript:return confirm('삭제할까요 ?');">삭제</a>
		</td>
  </tr>
  <tr bgcolor="#DDDDDD">
    <td width="150" align="left">&nbsp<a href="co_edit.html?no=2&page=1&text1=">태창주식회사</a></td>
    <td width="100" align="center">02-222-2222</td>
    <td width="100" align="center">도매</td>
    <td width="100" align="center">1990-01-01</td>
    <td width="250" align="left">&nbsp 서울 노원구 월계3동 인덕아파트</td>
    <td width="50"  align="center">
			<a href="co_delete.html?no=2&page=1&text1=" onClick="javascript:return confirm('삭제할까요 ?');">삭제</a>
		</td>
  </tr>
</table>

<table width="750" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td height="30" align="center">
			<img src="images/i_prev.gif" align="absmiddle" border="0"> 
			<font color="#FC0504"><b>1</b></font>&nbsp;
			<a href="co_list.html?page=2&text1="><font color="#7C7A77">[2]</font></a>&nbsp;
			<a href="co_list.html?page=3&text1="><font color="#7C7A77">[3]</font></a>&nbsp;
			<img src="images/i_next.gif" align="absmiddle" border="0">
		</td>
	</tr>
</table>
-->


</body>
</html>
