<?
	include "../common.php";

	$adminid=$_REQUEST[adminid];
	$adminpw=$_REQUEST[adminpw];

	if($adminid == $admin_id && $adminpw == $admin_pw) {
		setcookie("yes", $cookie_admin);
		echo("<script>location.href='member.php'</script>");
	}
	else {
		unset($cookie_admin);
		echo("<script>location.href='index.html'</script>");
	}
?>