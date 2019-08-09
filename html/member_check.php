<?php
include "common.php";
$uid =$_POST[uid];
$pwd=$_POST[pwd];

$query="select no21, name21 from member where uid21='$uid' and pwd21='$pwd'";

$result = mysqli_query($db, $query);
if (!$result) exit("에러: $query");

$count = mysqli_num_rows($result);

if ($count>0) {
   $row = mysqli_fetch_array($result); //불러오기
   setcookie("cookie_no", $row[no21]); //Cookie에 저장
   setcookie("cookie_name", $row[name21]);  
   
   echo("<script>location.href='index.html'</script>"); // index.html로 이동.   
}
else{
    echo("<script>location.href='member_login.php'</script>"); // member_login.php로 이동. 
}

?>
