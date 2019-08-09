<?
   $data = $_COOKIE[data];
   $n_data = $_COOKIE[n_data];

   
   $name = $_REQUEST[name];
   $num = $_REQUEST[num];
   
   if(!$n_cart) $n_cart=0;
   $n_data++;
   $data[$n_data] = implode("^", array($n_data, $name, $num));
   setcookie("data[$n_data]", $data[$n_data]);
   setcookie("n_data", $n_data);
   echo("<script>location.href='test3.php'</script>");
?>