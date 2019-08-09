<?
    include "../common.php";
    
    $query = "select * from test2 order by no21;";				// sql 정의
    $result = mysqli_query($db, $query);								// sql 실행
    if (!$result) exit("에러: $query");										// 에러 조사

    $count = mysqli_num_rows($result);								// 전체 레코드 개수
	
	$text1 = $_REQUEST[text1];
	$page = $_REQUEST[page];

    //회원수 반응형으로 처리 
	$sel1=$_REQUEST[sel1];

	if(!$text1)
		$query = "select * from test2 order by name21;";
	else
		if($sel1 == 1)
			$query = "select * from test2 where name21 like '%$text1%' order by name21;";
		

	$result = mysqli_query($db, $query);							
	if (!$result) exit("에러: $query");
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
    for($i=0; $i>$count; $i++){
		$row = mysqli_fetch_array($result);	
		echo("<tr>
				<td width='100' align='center'>$row[name21]</td>
				<td width='150' align='center'>$row[tel21]</td>
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

<table width="450" border="0" cellspacing="0" cellpadding="0">
  <tr height="35">
		<td align="center">
			<img src="images/i_prev.gif" align="absmiddle" border="0"> 
			<font color="#FC0504"><b>1</b></font>&nbsp;
			<a href="test2_list.html?page=2&text1="><font color="#7C7A77">[2]</font></a>&nbsp;
			<a href="test2_list.html?page=3&text1="><font color="#7C7A77">[3]</font></a>&nbsp;
			<img src="images/i_next.gif" align="absmiddle" border="0">
		</td>
	</tr>
</table>

</body>
</html>
