<?
   include "../common.php";

   $no=$_REQUEST[no];
   $state=$_REQUEST[state];

   
   $page=$_REQUEST[page];

   $day1_y=$_REQUEST[day1_y];
   $day1_m=$_REQUEST[day1_m];
   $day1_d=$_REQUEST[day1_d];

   $day2_y=$_REQUEST[day2_y];
   $day2_m=$_REQUEST[day2_m];
   $day2_d=$_REQUEST[day2_d];

   $sel1=$_REQUEST[sel1];
   $sel2=$_REQUEST[sel2];
   $text1=$_REQUEST[text1];

   $query = "update jumun set state21='$state' where no21=$no;";
   $result = mysqli_query($db, $query);
   if (!$result) exit("에러: $query");
   
   echo("<script>location.href='jumun.php?page=$page&sel1=$sel1&sel2=$sel2&text1=$text1&day1_y=$day1_y
   &day1_m=$day1_m&day1_d=$day1_d&day2_y=$day2_y&day2_m=$day2_m&day2_d=$day2_d'</script>");
   
   echo("<script>location.href='jumun.php'</script>")
?>