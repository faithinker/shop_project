<?
	include "../common.php";

    $no1=$_REQUEST[no1];
	$name=$_REQUEST[name];
	$no2=$_REQUEST[no2];
	 
	$query = "update opts set name21='$name' where no21= $no2;";
            
	$result = mysqli_query($db, $query);
	if (!$result) exit("쿼리에러: $query");

	echo("<script>location.href='opts.php?no1=$no1'</script>"); //링크주소 맞는지 체크
?>