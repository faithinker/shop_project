<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2017.12)                                                    -->
<!-------------------------------------------------------------------------------------------->	
<?
	include "common.php";

	$text1 = $_REQUEST[text1];
	$page = $_REQUEST[page];
?>

<html>
<head>
	<title>주소록 프로그램</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="font.css">
</head>
<body>

<table width="600" border="0">
 <form name="form1" method="post" action="juso_list.php">
	<tr>
		<td width="400">&nbsp
			이름 : <input type="text" name="text1" size="10" value="<?=$text1;?>">
			<input type="button" value="검색" onClick="javascript:form1.submit();">
		</td>
		<td align="right"><a href="juso_new.html">입력</a>&nbsp</td>
	</tr>
	</form>
</table>

<table width="600" border="1" cellpadding="2" style="border-collapse:collapse">
  <tr bgcolor="lightblue">
    <td width="70"  align="center">이름</td>
    <td width="100"  align="center">전화</td>
    <td width="50"  align="center">음/양</td>
    <td width="80"  align="center">생일</td>
    <td width="250" align="center">주소</td>
    <td width="50"  align="center">삭제</td>
  </tr>
	<?
		if(!$text1)
			$query = "select * from juso order by name21;";				// sql 정의
		else
			$query = "select * from juso where name21 like '%$text1%' order by name21;";	// sql 정의

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
			if($row[sm21]==0) $sm="양력"; else $sm="음력";					//양력음력 추가
		$tel1=trim(substr($row[tel21],0,3));    //0번 위치에서 3자리 문자열 추출
		$tel2=trim(substr($row[tel21],3,4)); 	  //3번 위치에서 4자리
		$tel3=trim(substr($row[tel21],7,4));	  //7번 위치에서 4자리
		$tel=$tel1 . "-" . $tel2 . "-" . $tel3; 	//juso lis.php, juso edit php
			echo("<tr bgcolor='lightyellow'>
				<td align='center'>&nbsp
					<a href='juso_edit.php?no=$row[no21]'>$row[name21]</a>
				</td>
				<td align='center'>$nbsp $tel</td>
				<td align='center'>$nbsp $sm</td>
				<td align='center'>$nbsp $row[birthday21]</td>
				<td align='center'>$nbsp $row[juso21]</td>
				<td align='center'>
					<a href='juso_delete.php?no=$row[no21]'
						onClick='javascript:return confirm(\"삭제할까요?\");'>
						삭제
					</a>
				</td>
			</tr>");
		}
	
		
	?>
  <tr bgcolor="lightyellow">
    <td width="70"  align="center"><a href="juso_edit.html?no=1">김길동</a></td>
    <td width="100"  align="center">022-111-1111</td>
    <td width="50"  align="center">양력</td>
    <td width="80"  align="center">1990-01-01</td>
    <td width="250" align="left">서울 노원구 초안산로길 인덕대학</td>
    <td width="50"  align="center">
		<a href="juso_delete.html?no=1" onClick="javascript:return confirm('삭제할까요 ?');">삭제</a>
	</td>
  </tr>
  <tr bgcolor="lightyellow">
    <td width="70"  align="center"><a href="juso_edit.html?no=2">이길동</a></td>
    <td width="100"  align="center">02 -222-2222</td>
    <td width="50"  align="center">음력</td>
    <td width="80"   align="center">1990-01-01</td>
    <td width="250" align="left">서울 노원구 초안산로길 인덕아파트</td>
    <td width="50"  align="center">
			<a href="juso_delete.html?no=2" onClick="javascript:return confirm('삭제할까요 ?');">삭제</a>
		</td>
  </tr>
</table>

<table width="600" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td height="30" align="center">
			<img src="images/i_prev.gif" align="absmiddle" border="0"> 
			<font color="#FC0504"><b>1</b></font>&nbsp;
			<a href="juso_list.html?page=2&text1="><font color="#7C7A77">[2]</font></a>&nbsp;
			<a href="juso_list.html?page=3&text1="><font color="#7C7A77">[3]</font></a>&nbsp;
			<img src="images/i_next.gif" align="absmiddle" border="0">
		</td>
	</tr>
</table>

</body>
</html>
