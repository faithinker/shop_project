<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2017.12)                                                    -->
<!-------------------------------------------------------------------------------------------->	
<?
	include "common.php";
?>


<html>
<head>
	<title>성적처리 프로그램</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="font.css">
</head>

<script language="javascript">
function cal_jumsu()
{
	form1.hap.value=Number(form1.kor.value) + Number(form1.eng.value) + Number(form1.mat.value);
	form1.avg.value=(form1.hap.value/3.).toFixed(1);
}
</script>

<body>
<?
	$no=$_REQUEST[no]; //list.php ->edit.php 넘어갈 때 no=row[no21] 해줌 매핑하는 녀석의 값을 얻어오는 행위
	$query="select * from sj where no21=$no;"; //맵핑의 결과를 DB와 연결시킴
	$result = mysqli_query($db, $query);
	if (!$result) exit("에러: $query");
	$row=mysqli_fetch_array($result);  //레코드 얻어오기
	$avg=sprintf("%6.1f",$row[avg21]);
?>

<form name="form1" method="post" action="sj_update.php">
<input type="hidden" name="no" value="<?=$no?>"> <!--만약을 대비해 확인--> 

<table width="300" border="1" cellpadding="2" bgcolor="lightyellow" style="border-collapse:collapse">
  <tr>
    <td width="100" align="center" bgcolor="lightblue">이름</td>
    <td width="200">
      <input type="text" name="name" size="20" value="<?=$row[name21];?>">
    </td>
  </tr>
  <tr>
    <td width="100" align="center" bgcolor="lightblue">국어</td>
    <td width="200">
      <input type="text" name="kor" size="6" value="<?=$row[kor21];?>" onChange="javascript:cal_jumsu();">
    </td>
  </tr>
  <tr>
    <td width="100" align="center" bgcolor="lightblue">영어</td>
    <td width="200">
      <input type="text" name="eng" size="6" value="<?=$row[eng21];?>" onChange="javascript:cal_jumsu();">
    </td>
  </tr>
  <tr>
    <td width="100" align="center" bgcolor="lightblue">수학</td>
    <td width="200">
      <input type="text" name="mat" size="6" value="<?=$row[mat21];?>" onChange="javascript:cal_jumsu();">
    </td>
  </tr>
  <tr>
    <td width="100" align="center" bgcolor="lightblue">총점</td>
    <td width="200">
      <input type="text" name="hap" size="6" value="<?=$row[hap21];?>" readonly style="border:0;background-color:#ffffe0">
    </td>
  </tr>
  <tr>
    <td width="100" align="center" bgcolor="lightblue">평균</td>
    <td width="200">
      <input type="text" name="avg" size="6" value="<?=$avg;?>" readonly style="border:0;background-color:#ffffe0">
    </td>
  </tr>
</table>
<br>
<table width="300" border="0">
  <tr>
    <td align="center"> 
	  <input type="submit" value="수정"> &nbsp
	  <input type="button" value="이전화면으로" onclick="javascript:history.back();">
	</td>
  </tr>
</table>

</form>

</body>
</html>