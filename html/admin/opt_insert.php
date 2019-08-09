<?
    include "../common.php";
       
	$name21=$_REQUEST[name];
    $query = "insert into opt (name21)
             values ('$name21' );";
    $result = mysqli_query($db, $query);
    if (!$result) exit("에러: $query");

    echo("<script>location.href='opt.php'</script>");
?>