<?
	include "common.php";

	$no=$_REQUEST[no];

		$query = "delete from co where no21=$no;";
		$result = mysqli_query($db, $query);
		if (!$result) exit("에러: $query");

		echo("<script>location.href='co_list.php'</script>");
?>