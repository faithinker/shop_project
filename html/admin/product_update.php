<?
	include "../common.php";

	$no=$_REQUEST[no];
	$menu=$_REQUEST[menu];
	$code=$_REQUEST[code];
	$name=addslashes($_REQUEST[name]);
	$coname=$_REQUEST[coname];
	$price=filter_var($_REQUEST[price], 519);
	$opt1=$_REQUEST[opt1];
	$opt2=$_REQUEST[opt2];
	$contents=addslashes($_REQUEST[contents]);
	$video=addslashes($_REQUEST[video]);
	$status=$_REQUEST[status];

	$icon_new=$_REQUEST[icon_new];
	$icon_hit=$_REQUEST[icon_hit];
	$icon_sale=$_REQUEST[icon_sale];
	if($icon_new) $icon_new = 1; else $icon_new = 0;
	if($icon_hit) $icon_hit = 1; else $icon_hit = 0;
	if($icon_sale) $icon_sale = 1; else $icon_sale = 0;

	$discount=$_REQUEST[discount];

	$regday1=$_REQUEST[regday1];
	$regday2=$_REQUEST[regday2];
	$regday3=$_REQUEST[regday3];
	$regday=sprintf("%04d-%02d-%02d", $regday1, $regday2, $regday3);
	
	$fname1=$_REQUEST[imagename1];
	$checkno1=$_REQUEST[checkno1];
	if($checkno1 != "1") $fname1 = ""; 
	if($_FILES["image1"]["error"] == 0)
	{
		$fname1=$_FILES["image1"]["name"];
		
		if(!move_uploaded_file($_FILES["image1"]["tmp_name"], "../product/$fname1")) exit("���ε� ����");
	}

	$fname2=$_REQUEST[imagename2];
	$checkno2=$_REQUEST[checkno2];
	if($checkno2 != "1") $fname2 = ""; 
	if($_FILES["image2"]["error"] == 0)
	{
		$fname2=$_FILES["image2"]["name"];
		
		if(!move_uploaded_file($_FILES["image2"]["tmp_name"], "../product/$fname2")) exit("���ε� ����");
	}

	$fname3=$_REQUEST[imagename3];
	$checkno3=$_REQUEST[checkno3];
	if($checkno3 != "1") $fname3 = ""; 
	if($_FILES["image3"]["error"] == 0)
	{
		$fname3=$_FILES["image3"]["name"];
		
		if(!move_uploaded_file($_FILES["image3"]["tmp_name"], "../product/$fname3")) exit("���ε� ����");
	}

	$sel1=$_REQUEST[sel1];
	$sel2=$_REQUEST[sel2];
	$sel3=$_REQUEST[sel3];
	$sel4=$_REQUEST[sel4];

	$text1=$_REQUEST[text1];
	$page=$_REQUEST[page];

	$query = "update product set menu21='$menu', code21='$code', name21='$name', coname21='$coname',
	price21='$price', opt1_21='$opt1', opt2_21='$opt2', contents21='$contents', status21='$status',
	icon_new21='$icon_new', icon_hit21='$icon_hit', icon_sale21='$icon_sale', discount21='$discount',
	regday21='$regday', image1_21='$fname1', image2_21='$fname2', image3_21='$fname3', video21='$video'
	where no21=$no;";

	$result = mysqli_query($db, $query);

	if (!$result) exit("����: $query");

	echo("<script>location.href='product.php?sel1=$sel1&sel2=$sel2&sel3=$sel3&sel4=$sel4&text1=$text1&page=$page'</script>");
?>