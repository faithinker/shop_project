<?
	include "common.php";
	
	$no=$_REQUEST[no];
	$coname=$_REQUEST[coname];
	$phone1=$_REQUEST[phone1];
	$phone2=$_REQUEST[phone2];
	$phone3=$_REQUEST[phone3];
	$gubun=$_REQUEST[gubun];
	$startday1=$_REQUEST[startday1];
	$startday2=$_REQUEST[startday2];
    $startday3=$_REQUEST[startday3];
    $address=$_REQUEST[address];

    $phone = sprintf("%-3s%-4s%-4s", $phone1, $phone2, $phone3);
    $startday = sprintf("%04d-%02d-%02d", $startday1, $startday2, $startday3);
    
		$query = "update co set coname21='$coname', phone21='$phone', gubun21=$gubun,
                  startday21='$startday', address21='$address' where no21=$no;";
		$result = mysqli_query($db, $query);
		if (!$result) exit("에러: $query");

		echo("<script>location.href='co_list.php'</script>");
?>
