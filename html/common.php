<?
	$db = mysqli_connect("localhost", "shop21", "1234", "shop21");
	if (!$db) exit("DB연결에러");

	$admin_id = "admin";
	$admin_pw = "1234";

	$page_line = 5;		// 페이지당 line 수
	$page_block = 5;		// 블록당 page 수

	$a_idname=array("전체","이름","ID");
	$n_idname=count($a_idname);

	$a_status=array("상품상태","판매중","판매중지","품절"); //상품상태는 전체 값
	$n_status=count($a_status);

	$a_icon=array("아이콘","New","Hit","Sale"); //아이콘
	$n_icon=count($a_icon);

	$a_menu=array("분류선택","바지","코트","운동화","구두","가방","상의","모자");// 분류선택
	$n_menu=count($a_menu);

	$a_text1=array(",","제품이름","제품번호");  //검색어는 전체 값 의미
	$n_text1=count($a_text1);

	$a_pdname=array("신상품 정렬","고가순 정렬","저가순 정렬","상품명 정렬");  //검색어는 전체 값 의미
	$n_pdname=count($a_pdname);
	
	$baesongbi = 2500;
	$max_baesongbi = 200000;

	$a_state=array("전체","주문신청","주문확인","입금확인", "배송중", "주문완료", "주문취소");
	$n_state=count($a_state);

	$a_text2=array("전체","주문번호","고객명","상품명");
	$n_text2=count($a_text2);

?>