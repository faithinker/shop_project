<?
	include "../common.php";

    $no=$_REQUEST[no];
    $state=$_REQUEST[state];

    $page=$_REQUEST[page];
    
	$query = "delete from jumun where no21=$no;";
	$result = mysqli_query($db, $query);
	if (!$result) exit("에러: $query");
	

	echo("<script>location.href='jumun.php'</script>");
?>