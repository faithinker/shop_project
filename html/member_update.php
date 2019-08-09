<?
   include "common.php";

   $cookie_no=$_COOKIE[cookie_no];
   
   $name=$_REQUEST[name];
   $pwd1=$_REQUEST[pwd1];
   $tel1=$_REQUEST[tel1];
   $tel2=$_REQUEST[tel2];
   $tel3=$_REQUEST[tel3];
   $phone1=$_REQUEST[phone1];
   $phone2=$_REQUEST[phone2];
   $phone3=$_REQUEST[phone3];
   $sm=$_REQUEST[sm];
   $birthday1=$_REQUEST[birthday1];
   $birthday2=$_REQUEST[birthday2];
   $birthday3=$_REQUEST[birthday3];
   $zip=$_REQUEST[zip];
   $juso=$_REQUEST[juso];
   $email=$_REQUEST[email];

   $tel = sprintf("%-3s%-4s%-4s", $tel1, $tel2, $tel3);
   $phone = sprintf("%-3s%-4s%-4s", $phone1, $phone2, $phone3);
   $birthday = sprintf("%04d-%02d-%02d", $birthday1, $birthday2, $birthday3);

   if(!$pwd1) {
      $query = "update member set name21='$name', tel21='$tel', phone21='$phone', sm21=$sm,
                     birthday21='$birthday', zip21=$zip, juso21='$juso', email21='$email' where no21=$cookie_no;";
   }
   else {
      $query = "update member set name21='$name', pwd21='$pwd1', tel21='$tel', phone21='$phone', sm21=$sm,
                     birthday21='$birthday', zip21=$zip, juso21='$juso', email21='$email' where no21=$cookie_no;";
   }

   $result = mysqli_query($db, $query);

   if (!$result) exit("에러: $query");

   echo("<script>location.href='index.html'</script>");
?>