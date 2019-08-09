<?
   $cart = $_COOKIE[cart];
   $n_cart = $_COOKIE[n_cart];

   $no = $_REQUEST[no];
   $num = $_REQUEST[num];
   $opts1 = $_REQUEST[opts1];
   $opts2 = $_REQUEST[opts2];

   $kind = $_REQUEST[kind];
   $pos = $_REQUEST[pos];

   if(!$n_cart) $n_cart=0;

   switch ($kind) {
      case "insert":
      case "order":
         $n_cart++;
         $cart[$n_cart] = implode("^", array($no, $num, $opts1, $opts2));
         setcookie("cart[$n_cart]", $cart[$n_cart]);
         setcookie("n_cart", $n_cart);
         break;
      case "delete":
         setcookie("cart[$pos]");
         break;
      case "update":
         list($no, $num1, $opts1, $opts2) = explode("^", $cart[$pos]);
         $num1 = $num;
         $cart[$pos] = implode("^", array($no, $num1, $opts1, $opts2));
         setcookie("cart[$pos]", $cart[$pos]);
         break;
      case "deleteall":
      for($i = 1; $i <= $n_cart; $i++) {
         if($cart[$i]) {
            setcookie("cart[$i]");
            setcookie("n_cart");
         }
      }
      $n_cart = 0;
      break;
   }
   if($kind == "order") {
      echo("<script>location.href='order.php'</script>");
   }
   else {
      echo("<script>location.href='cart.php'</script>");
   }
?>