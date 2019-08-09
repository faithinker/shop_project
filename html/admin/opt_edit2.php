<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2017.12)                                                    -->
<!-------------------------------------------------------------------------------------------->	
<?
	include "../common.php";
	
    $no1=$_REQUEST[no1];
	$name=$_REQUEST[name];
	$kind=$_REQUEST[kind];
    
	
	switch($kind){
		case "insert":
			$query = "insert into opt (name21) values ('$name');";
			break;

		case "update":
			
			$query = "update opt set name21='$name' where no21= $no1;";
			break;
			
		case "delete":
			$query = "delete from opt where no21=$no1;";
			echo("<script>location.href='opt.php'</script>");
			break;
	}
	if($kind =="insert" || $kind=="update" || $kind == "delete"){
		
		
		echo("<script>location.href='opt.php'</script>");
	}

?>

