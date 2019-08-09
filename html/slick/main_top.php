<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2017.12)                                                    -->
<!-------------------------------------------------------------------------------------------->	
<html>
<head>
<meta charset="UTF-8" />	
<?php
	$cookie_no=$_COOKIE[cookie_no];
	$cookie_name=$_COOKIE[cookie_name];
?>

<link rel="stylesheet" type="text/css" href="/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="/slick/slick-theme.css"/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">




<!--<script type="text/Javascript"  src="js/vue.js"></script>-->
<link rel="shortcut icon" href="https://staticassets-a.styleshare.kr/d0957573a5/img/favicons/android-chrome-192x192.png">


<!-- javascript는  type="text/Javascript"와 src를 쓰고 css는 href 를 쓴다.
css는 head부분에 js의 라이브러리는 헤드 부분에 기타 플러그인이나 js 파일은 body 바로 전에 삽입한다.
-->
<style type="text/css">
    html, body {
      margin: 0;
      padding: 0;
    }

    * {
      box-sizing: border-box;
    }
	
    .slider {
        width: 100%;
        margin: 0px auto;
    }
	.slider button{ 
		position: absolute; 
		z-index:10;
		
	}
	.slider button.slick-prev {
		left:20px;
		
	}
	.slider button.slick-next {
		right:30px;
		
	}
   

    .slick-slide img {
      width: 100%;
    }
	
    .slick-prev:before,
    .slick-next:before {
      color: black;
	  display : block;
	  font-size : 40px;
    }


    .slick-slide {
      transition: all ease-in-out .3s;
      opacity: .2;
	  
    }
    
    .slick-active {
      opacity: .5;
	  
    }

    .slick-current {
	  
      opacity: 1;
	  
    }
	
	
</style>

<link rel="shortcut icon" href="images/styleshare_logo.svg"/>

<title>스타일 쉐어</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link href="include/font.css" rel="stylesheet" type="text/css">
<script language="Javascript" src="include/common.js"></script>
</head>

<body style="margin:0">
<center>
<!-- Image and text -->

<nav class="navbar navbar-light" style="background-color: #e3f2fd;"  >
  <a class="navbar-brand" href="main.php">
    <img src="images/styleshare_logo.svg" style="width:30px; height:30px;" class="d-inline-block align-top" alt="스타일쉐어">
    <b>StyleShare</b>
	</a>
	<form class="form-inline"  style="margin:10px;" >
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="검색" style="width:30em; height:2.8rem;">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">검색하기</button>
  </form>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="member_login.php">로그인</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="member_agree.php">회원가입</a>
			</li>
			<li class="nav-item">
        <a class="nav-link" href="cart.html">장바구니</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="jumun_login.php">주문조회</a>
      </li>
    </ul>
  </div>
</nav>
<table width="100%" height="25" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr>
		<td align="left" bgcolor="#F7F7F7">
			<table border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td width="300em"></td>
					<td width="130em" height="30" border="0" style="text-align: center;">바지</td>
					<td width="130em" height="30" border="0" style="text-align: center;">코트</td>
					<td width="130em" height="30" border="0" style="text-align: center;">운동화</td>
					<td width="130em" height="30" border="0" style="text-align: center;">구두</td>
					<td width="130em" height="30" border="0" style="text-align: center;">가방</td>
					<td width="130em" height="30" border="0" style="text-align: center;">상의</td>
					<td width="130em" height="30" border="0" style="text-align: center;">모자</td>
					<td width="300em"></td>
				</tr>
			</table>
		</td>
	</tr>
</table>



<!--  메인 이미지 --------------------------------------------------->
<section class="slider" >
	<div><img src="https://image.brandi.me/home/banner/bannerImage_75438_1559834222.jpg"></div>
	<div><img src="https://image.brandi.me/home/banner/bannerImage_4_1559663289.jpg"></div>
	<div><img src="https://image.brandi.me/home/banner/bannerImage_75634_1559868540.jpg"></div>
	<div><img src="https://image.brandi.me/home/banner/bannerImage_74014_1559266102.jpg"></div>
	<div><img src="https://image.brandi.me/home/banner/bannerImage_75720_1559869861.jpg"></div>
	<div><img src="https://image.brandi.me/home/banner/bannerImage_75597_1559836345.jpg"></div>
	<div><img src="https://image.brandi.me/home/banner/bannerImage_2_1559487728.jpg"></div>
	<div><img src="https://image.brandi.me/home/banner/bannerImage_75704_1559868592.jpg"></div>
</section>
<!--
<table width="959" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr>
		<td><a href="index.html"><img src="images/main_image0.jpg" width="959" height="175" border="0"></a></td>
	</tr>
</table>
				-->

<!--  Category 메뉴 : 가로형인 경우  --------------------------------------
<table width="959" height="25" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr>
		<td align="left" bgcolor="#F7F7F7">
			<table border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td><a href="product.html?no=1"><img src="images/main_menu01_off.gif" width="96" height="30" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td>
					<td><a href="product.html?no=2"><img src="images/main_menu02_off.gif" width="96" height="30" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td>
					<td><a href="product.html?no=3"><img src="images/main_menu03_off.gif" width="96" height="30" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td>
					<td><a href="product.html?no=4"><img src="images/main_menu04_off.gif" width="96" height="30" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td>
					<td><a href="product.html?no=5"><img src="images/main_menu05_off.gif" width="96" height="30" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td>
					<td><a href="product.html?no=6"><img src="images/main_menu06_off.gif" width="96" height="30" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td>
					<td><a href="product.html?no=7"><img src="images/main_menu07_off.gif" width="96" height="30" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td>
					<td><a href="product.html?no=8"><img src="images/main_menu08_off.gif" width="96" height="30" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td>
					<td><a href="product.html?no=9"><img src="images/main_menu09_off.gif" width="96" height="30" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td>
					<td><a href="product.html?no=10"><img src="images/main_menu10_off.gif" width="96" height="30" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td>
				</tr>
			</table>
		</td>
	</tr>
</table>
------------------------------------------------------------------------>

<!-- 상품 검색 ------------------------------------->
<table width="959" height="25" border="0" cellspacing="0" cellpadding="0" align="center">
	<?php
		if(!$cookie_no) $loginGuest = " 고객님";
		else $loginGuest = $cookie_name." 고객님";
	echo("<tr><td height='1' colspan='5' bgcolor='#F7F7F7'></td></tr>
	<tr bgcolor='#F0F0F0'>
		<td width='181' align='center'><font color='#666666'>&nbsp <b>Welcome ! &nbsp;&nbsp $loginGuest</b></font></td>
		<td style='font-size:9pt;color:#666666;font-family:돋움;padding-left:5px;'></td>
		<td align='right' style='font-size:9pt;color:#666666;font-family:돋움;'><b>상품검색 ▶&nbsp</b></td>
		<!-- form1 시작 -->
		<form name='form1' method='post' action='product_search.html'>
		<td width='135'>
			<input type='text' name='findtext' maxlength='40' size='17' class='cmfont1'>
		</td>
		</form>
		<!-- form1 끝 -->
		<td width='65' align='center'><a href='javascript:Search()'><img src='images/i_search1.gif' border='0'></a></td>
	</tr>
	<tr><td height='1' colspan='5' bgcolor='#E5E5E5'></td></tr>
	");
	?>
</table>

<table width="959" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr><td height="10" colspan="2"></td></tr>
	<tr>
		<td height="100%" valign="top">
			<!--  화면 좌측메뉴 시작 (main_left) ------------------------------->
			<table width="181" border="0" cellspacing="0" cellpadding="0">
				<tr> 
					<td valign="top"> 
						<!--  Category 메뉴 : 세로인 경우 -------------------------------->
						<table width="177"  border="0" cellpadding="2" cellspacing="1" bgcolor="#afafaf">
							<tr><td height="3"  bgcolor="#bfbfbf"></td></tr>
							<tr><td height="30" bgcolor="#f0f0f0" align="center" style="font-size:12pt;color:#333333"><b>Category</b></td></tr>
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><a href="product.php?menu=1"><img src="images/main_menu01_off.gif" width="176" height="30" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td></tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><a href="product.php?menu=2"><img src="images/main_menu02_off.gif" width="176" height="30" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td></tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><a href="product.php?menu=3"><img src="images/main_menu03_off.gif" width="176" height="30" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td></tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><a href="product.php?menu=4"><img src="images/main_menu04_off.gif" width="176" height="30" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td></tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><a href="product.php?menu=5"><img src="images/main_menu05_off.gif" width="176" height="30" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td></tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><a href="product.php?menu=6"><img src="images/main_menu06_off.gif" width="176" height="30" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td></tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><a href="product.php?menu=7"><img src="images/main_menu07_off.gif" width="176" height="30" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td></tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><a href="product.php?menu=8"><img src="images/main_menu08_off.gif" width="176" height="30" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td></tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><a href="product.php?menu=9"><img src="images/main_menu09_off.gif" width="176" height="30" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td></tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><a href="product.php?menu=10"><img src="images/main_menu10_off.gif" width="176" height="30" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td></tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr><td height="10"></td></tr>
				<tr> 
					<td> 
						<!--  Custom Service 메뉴(QA, FAQ...) -->
						<table width="177"  border="0" cellpadding="2" cellspacing="1" bgcolor="#afafaf">
							<tr><td height="3"  bgcolor="#a0a0a0"></td></tr>
							<tr><td height="25" bgcolor="#f0f0f0" align="center" style="font-size:11pt;color:#333333"><b>Customer Service</b></td></tr>
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><a href="qa.html"><img src="images/main_left_qa.gif" border="0" width="176"></a></td></tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><a href="faq.html"><img src="images/main_left_faq.gif" border="0" width="176"></a></td></tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><a href=""><img src="images/main_left_etc.gif" border="0" width="176"></a></td></tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><a href=""><img src="images/main_left_etc.gif" border="0" width="176"></a></td></tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><a href=""><img src="images/main_left_etc.gif" border="0" width="176"></a></td></tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			<!--  화면 좌측메뉴 끝 (main_left) --------------------------------->
		</td>
		<td width="10"></td>
		<td valign="top">
		