<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2017.12)                                                    -->
<!-------------------------------------------------------------------------------------------->	
<?
	$cookie_no=$_COOKIE[cookie_no];
	$cookie_name=$_COOKIE[cookie_name];
?>
<html>
<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<!--<script async src="https://www.googletagmanager.com/gtag/js?id=UA-141898664-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-141898664-1');
</script>
-->
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PWSPRD8');</script>
<!-- End Google Tag Manager -->

<meta charset="UTF-8" />	

<link rel="stylesheet" type="text/css" href="./slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="./slick/slick-theme.css"/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/index.css"/>
<link rel="stylesheet" media="( min-width:500px) and (max-width:800px) href="css/tablet.css">
<link rel="stylesheet" media="( min-width:0px) and (max-width:500px) href="css/mobile.css">

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
			height: 48%;
			margin: 0px auto;
	}
	.slick-dotted.slick-slider {
    		margin-bottom: 0px;
	}
	.slider button{ 
		position: absolute; 
		z-index:10;
		top: 40%;
		font-size: 10px;
	}
	.slider button.slick-prev {
		left:20px;
	}
	.slider button.slick-next {
		right:30px;
	}
	.slick-dots{
		bottom:10px;
	}
	.slick-dots li{

		margin: 0;
	}
	.slick-dots li.slick-active button:before{
		color: red;
	}
	.slick-dots li button:before{
	font-family: 'slick';
    font-size: 10px;
    line-height: 20px;
    position: absolute;
    top: 0;
    left: 0;
    width: 20px;
    height: 20px;
    content: '•';
    text-align: center;
    opacity: 0.9;
    color: black;
		padding-left: 0px;
    -webkit-font-smoothing: antialiased;
		
	}

    .slick-slide img {
      width: 100%;
	  	height: 90%;
    }
	
    .slick-prev:before,
    .slick-next:before {
      color: white;
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
		.slick-active{
			opacity: 1;
		}

		.navbar{
			padding: 0.5rem 1rem;
			height: 5rem;
			
		}	
		.navbar .form-inline {
			right: 0px;
			margin-top : 3px;
			margin-bottom: : 0px;
			position: relative;
		}
		.navbar .form-inline button{
			position: relative;
			font-size : 0.9em;
		}
		form{
			margin: 0px;
		}
		.navbar .form-inline .form-control{
			margin-right: 10px;
			width: 20vw;
		}
		@media (min-width: 576px){
			.navbar .form-inline button{
				position: relative;
				font-size : 0.9em;
			}
		}
		.navbar-brand img{
			margin-right: 0px;
			width:30px; 
			height:30px;
		}
		header .top_banner a > img {
			display: block;
			width: 100%;
			background: #a9d5e2;
			overflow: hidden;
			line-height: 1px;
			font-size: 1px;
			display: block;
			padding: 0;
			box-sizing: border-box;
			cursor: pointer;
			word-break: keep-all;
		}

		/*
		.top_banner {
			background-image: url("./images/top_banner_pc.jpg");
		}
		*/

		@media( min-width:701px){
			#mobileImg {
				display: none;

			}

		}

		@media( min-width:0px) and (max-width:700px){
			header nav .form-inline, header nav ul{
				float:none;
				display: none;
			}
			
			header nav.navbar-brand{
				float: none;
				position: absolute;
				left: 50%;
				transform: translateX(-50%);
				margin-right: 0.5rem;
			}/*모바일 상단배너 바꾸기 */
			#pcImg {	
				display: none;
			}
			/*
			.top_banner a > img{
				background-image : url("/images/top_banner_mobile.jpg") left top no-repeat;
				width:100%;
				box-sizing:border-box;
			}
			*/
			.slider, .slick-initialized, .slick-slider, .slick-dotted{
				width: 100%;
				height: 20%;
			}
			
			.slick-prev:before, .slick-next:before{
				font-size: 30px;
			}
		}
		.menu{
			background: black;
			width: 100%;
			height: 60px;
		}
		.menu tr > td {
			color: white;
			font-weight: bold;
			font-size: 15px;
		}
		.menu tr > td > a{
			text-decoration: none;
			color: white;
		}
		.menu tr > td > a:hover {
			color: #8d8d8d;
		}
</style>


<link rel="shortcut icon" href="images/styleshare_logo.svg"/>

<title>스타일 쉐어</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link href="include/font.css" rel="stylesheet" type="text/css">
<script language="Javascript" src="include/common.js"></script>

<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<script src="./slick/slick.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
	$(document).on('ready', function() {
		$(".slider").slick({
			lazyLoad: 'ondemand', // ondemand progressive anticipated
			infinite: true,
			dots: true,
			autoplay : true,
			});
	});
</script>

</head>

<body style="margin:0">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PWSPRD8"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<header>
	
	<div class="top_banner">
		<a  href="https://www.brandi.co.kr/todaydelivery">
			<img id = "pcImg" src="images/top_banner_pc.jpg">
			<img id = "mobileImg" src="images/top_banner_mobile.jpg">
		</a>
	</div>
	


	<div class="top_logo">
		<nav class="navbar navbar-light" style="background-color: #e3f2fd;"  >
			<a class="navbar-brand" href="main.php">
				<img src="images/styleshare_logo.svg"  class="d-inline-block align-top" alt="스타일쉐어">
				<b>StyleShare</b>
			</a>

			<form name="form1" method="post" action="product_search.html" class="form-inline">
				<input class="form-control" type="search" placeholder="검색">
				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">검색하기</button>
				<ul class="right"><!-- PC -->
					<li><a href="member_login.php">로그인</a></li>
					<li><a href="member_agree.php">회원가입</a></li>
					<li><a href="cart.php">장바구니</a></li>
				</ul>
			</form>
		</nav>
	</div>
</header>


<table width="100%" height="25" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr>
		<td align="left" bgcolor="#F7F7F7">
			<table class="menu" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td width="300em"></td>
					<td width="130em" height="30" border="0" style="text-align: center;"><a href="product.php?menu=1">바지</a></td>
					<td width="130em" height="30" border="0" style="text-align: center;"><a href="product.php?menu=2">코트</a></td>
					<td width="130em" height="30" border="0" style="text-align: center;"><a href="product.php?menu=3">운동화</a></td>
					<td width="130em" height="30" border="0" style="text-align: center;"><a href="product.php?menu=4">구두</a></td>
					<td width="130em" height="30" border="0" style="text-align: center;"><a href="product.php?menu=5">가방</a></td>
					<td width="130em" height="30" border="0" style="text-align: center;"><a href="product.php?menu=6">상의</a></td>
					<td width="130em" height="30" border="0" style="text-align: center;"><a href="product.php?menu=7">모자</a></td>
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


		