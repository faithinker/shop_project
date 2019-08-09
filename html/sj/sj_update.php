<?
	include "common.php";
	//edit에 있는 변수들 받아와서 DB에 업데이트 시켜줌  DB저장변수명=$_REQUEST[edit에 있는 name 변수명]
	$no=$_REQUEST[no];
	$name=$_REQUEST[name];
	$kor=$_REQUEST[kor];
	$eng=$_REQUEST[eng];
	$mat=$_REQUEST[mat];
	$hap=$_REQUEST[hap];
	$avg=$_REQUEST[avg];

	$query = "update sj set name21='$name',kor21=$kor,eng21=$eng,mat21=$mat,hap21=$hap,avg21=$avg where no21=$no;";
	$result = mysqli_query($db, $query);
	if (!$result) exit("에러: $query");

	echo("<script>location.href='sj_list.php'</script>");
?>