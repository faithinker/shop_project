<?
	include "../common.php";

	$menu=$_REQUEST[menu];
	$code=$_REQUEST[code];
	$name=addslashes($_REQUEST[name]);
	$coname=$_REQUEST[coname];
	$price=$_REQUEST[price];
	$opt1=$_REQUEST[opt1];
	$opt2=$_REQUEST[opt2];
	$contents=addslashes($_REQUEST[contents]);
	$video=addslashes($_REQUEST[video]);
	$status=$_REQUEST[status];
	$icon_new=$_REQUEST[icon_new];
	$icon_hit=$_REQUEST[icon_hit];
	$icon_sale=$_REQUEST[icon_sale];
	$discount=$_REQUEST[discount];
	$regday1=$_REQUEST[regday1];
	$regday2=$_REQUEST[regday2];
	$regday3=$_REQUEST[regday3];

	$regday = sprintf("%04d-%02d-%02d", $regday1, $regday2, $regday3);
	if($icon_new) $icon_new = 1; else $icon_new = 0;
	if($icon_hit) $icon_hit = 1; else $icon_hit = 0;
	if($icon_sale) $icon_sale = 1; else $icon_sale = 0;

	if($_FILES["image1"]["error"] == 0)
	{
		$fname1=$_FILES["image1"]["name"];
		
		if(!move_uploaded_file($_FILES["image1"]["tmp_name"], "../product/$fname1")) exit("업로드 실패");
	}
	if($_FILES["image2"]["error"] == 0)
	{
		$fname2=$_FILES["image2"]["name"];
		
		if(!move_uploaded_file($_FILES["image2"]["tmp_name"], "../product/$fname2")) exit("업로드 실패");
	}
	if($_FILES["image3"]["error"] == 0)
	{
		$fname3=$_FILES["image3"]["name"];
		
		if(!move_uploaded_file($_FILES["image3"]["tmp_name"], "../product/$fname3")) exit("업로드 실패");
	}

	$query = "insert into product (menu21, code21, name21, coname21, price21, opt1_21, opt2_21, contents21, status21, icon_new21, icon_hit21, icon_sale21, discount21, regday21, 
	image1_21, image2_21, image3_21, video21) 
	values ('$menu', '$code', '$name', '$coname', '$price', '$opt1', '$opt2', '$contents', '$status', '$icon_new', '$icon_hit', '$icon_sale', '$discount', '$regday', 
	'$fname1', '$fname2', '$fname3','$video');";

	$result = mysqli_query($db, $query);

	if (!$result) exit("에러: $query");

	echo("<script>location.href='product.php'</script>");
?>