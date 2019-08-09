<?
   include "common.php";

   $query = "select no21 from jumun where jumunday21=curdate() order by no21 desc;";
   $result = mysqli_query($db, $query);
   if (!$result) exit("에러: $query");
   $count = mysqli_num_rows($result);
   $row = mysqli_fetch_array($result);
   
   if($count > 0) {
      $o_back_num = substr($row[no21], 6, 11) + 1;
      $o_no = date("ymd") . str_pad($o_back_num, 4, '0', STR_PAD_LEFT);
   }
   else $o_no = date("ymd") . "0001";

   $o_jumunday = date("Y-m-d");
   //ㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡ
   $cookie_no=$_COOKIE[cookie_no];
   if($cookie_no) $member_no = $cookie_no;
   else $member_no = 0;
   //ㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡ
   $o_name = $_REQUEST[o_name];
   $o_tel = $_REQUEST[o_tel];
   $o_phone = $_REQUEST[o_phone];
   $o_email = $_REQUEST[o_email];
   $o_zip = $_REQUEST[o_zip];
   $o_addr = $_REQUEST[o_addr];
   $o_etc = $_REQUEST[o_etc];

   $r_name = $_REQUEST[r_name];
   $r_tel = $_REQUEST[r_tel];
   $r_phone = $_REQUEST[r_phone];
   $r_email = $_REQUEST[r_email];
   $r_zip = $_REQUEST[r_zip];
   $r_addr = $_REQUEST[r_addr];
   //ㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡ
   $pay_method = $_REQUEST[pay_method];
   $card_kind = $_REQUEST[card_kind];
   $card_okno = $_REQUEST[card_okno];
   $card_halbu = $_REQUEST[card_halbu];
   $bank_kind = $_REQUEST[bank_kind];
   $bank_sender = $_REQUEST[bank_sender];
   //ㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡ
   $n_cart=$_COOKIE[n_cart];
   $cart=$_COOKIE[cart];

   $total_price = 0;
   $product_nums = 0;
   $product_names = "";
   for($i = 1; $i <= $n_cart; $i++) {
      if($cart[$i]) {
         list($no, $num, $opts1, $opts2) = explode("^", $cart[$i]);
            $query="select * from product where no21=$no;";
            $result = mysqli_query($db, $query);
            if (!$result) exit("에러: $query");
            $row=mysqli_fetch_array($result);
            
            if($row[icon_sale21]) 
               $sale_price = round($row[price21] * (100 - $row[discount21]) / 100, -3);
            else 
               $sale_price = $row[price21];
            $cash_price = $sale_price * $num;

            $query = "insert into jumuns (jumun_no21, product_no21, num21, price21, cash21, discount21, opts1_no21, opts2_no21)
                  values ('$o_no', '$row[no21]', '$num', '$sale_price', '$cash_price', '$row[discount21]', '$opts1', '$opts2');";
            $result = mysqli_query($db, $query);
            if (!$result) exit("에러: $query");
            
            setcookie("cart[$i]");

            $total_price += $cash_price;
            $product_nums += 1;

            if($product_nums == 1) $product_names = $row[name21];
      }
   }
   if($product_nums > 1) {
      $tmp = $product_nums;
      $product_names = $product_names . " 외 " . $tmp;
   }
   if($total_price < $max_baesongbi) {
      $query = "insert into jumuns (jumun_no21, product_no21, num21, price21, cash21, discount21, opts1_no21, opts2_no21)
            values ('$o_no', 0, 1, '$baesongbi', '$baesongbi', 0, 0, 0);";
      $result = mysqli_query($db, $query);
      if (!$result) exit("에러: $query");

      $total_price += $baesongbi;
   }
   //ㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡ
   $query = "insert into jumun (no21, member_no21, jumunday21, product_names21, product_nums21, o_name21, o_tel21, o_phone21, o_email21, o_zip21, o_juso21, r_name21, r_tel21, r_phone21, r_email21, r_zip21, r_juso21, memo21, pay_method21, card_halbu21, card_kind21, bank_kind21, bank_sender21, total_cash21, state21)
      values ('$o_no', '$member_no', '$o_jumunday', '$product_names', '$product_nums', '$o_name', '$o_tel', '$o_phone', '$o_email', '$o_zip', '$o_addr', '$r_name', '$r_tel', '$r_phone', '$r_email', '$r_zip', '$r_addr', '$o_etc', '$pay_method', '$card_halbu', '$card_kind', '$bank_kind', '$bank_sender', '$total_price', 1);";

   $result = mysqli_query($db, $query);
   if (!$result) exit("에러: $query");
   //ㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡ

   echo("<script>location.href='order_ok.php'</script>");
?>