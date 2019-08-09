<?
	include "../common.php";

    $no1=$_REQUEST[no1];
	$name=$_REQUEST[name];
	 
	$query = "update opt set name21='$name' where no21= $no1;";
            
	$result = mysqli_query($db, $query);
	if (!$result) exit("쿼리에러: $query");

	echo("<script>location.href='opt.php'</script>");
?>