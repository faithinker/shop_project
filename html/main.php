<?
    include "main_top.php";
?>
<link rel="stylesheet" type="text/css" href="css/index.css"/>
<link href="https://fonts.googleapis.com/css?family=Noto+Sans+KR&display=swap" rel="stylesheet">
<!----------------Main----------------------------------------------------------------->	
<style type="text/css">
	@media (max-width:700px){
		.frame {
			padding: 0px 20px;
		}
		body {
			font-size: 12px;
		}
 	}
	.frame{
	position: relative;
	z-index: 2;
	width: 100%;
	max-width: 1300px;
	margin: 0px auto;
	clear: both;
	padding: 0px 30px;
	overflow: hidden;
	box-sizing: border-box;
	display: block;
	}
	.list_full  ul {
	width: 18%;
    margin: 10px 1% 20px 1%;
    font-size: 1.2em;
    display: inline-block;
    vertical-align: top;
	padding: 0px;
    list-style: none;
	margin-block-start: 1em;
    margin-block-end: 1em;
  }
  .list_full ul > li {
    padding: 2px 0px;
    display: list-item;
    list-style: none;
	font-size: 0.8em;
	font-family: 'Noto Sans KR', sans-serif;
	word-break: keep-all;
	text-align: left;
  }
  .list_title a{
	color: #4f4f4f;
  }
  .list_image img {
		width: 100%;
  }
  body > span{
	width: 76px;
	height: 23px;
	box-sizing: border-box;
	;
  }
  .list_seller a {
    color: #000000;
	}
	.list_image a:-webkit-any-link {
		cursor: pointer;
		color: #000000;
	}
  .list_seller img{
	width: 76px;
	height: 14px;
	float: right;
	position: 0, 10px, 0, 0;
	margin-top:3px
  }
  .list_price span { /* 할인가 위치조정 필요함*/
	float: right;
	color: #4f4f4f;
	font-size: 0.7em;
	text-decoration: line-through;
	padding: 0px 10px;
	width: 50px;
	height: auto;
  }
  .list_price b {
    color: #ff4c42;
    float: right;
    font-weight: normal;
  }
	.pagetitle {
    text-align: center;
    padding: 40px 0px 20px 0px;
    clear: both;
	}
	.pagetitle .type2 {
    text-align: left;
    margin-bottom: 0px;
    font-size: 1.8em;
	}
	h1 {
    display: block;
    font-size: 2em;
    margin-block-start: 0.67em;
    margin-block-end: 0.67em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    font-weight: bold;
	}
	.pagetitle {
    padding: 5px 0;
	}
	.pagetitle .type2 a {
    padding: 25px 30px 0 0;
	}
	.pagetitle .type2 a {
			font-size: 0.65em;
			float: right;
			color: #888888;
			padding-top: 10px;
			padding-right: 15px;
	}
	a:link {
			text-decoration: none;
	}
	.main_pagetitle .title {
    float: none;
    font-size: 1.4em;
    margin-left: 10px;
	}
	.main_pagetitle .subtitle {
    float: none;
    font-size: 0.65em;
    color: #787878;
    display: inline-block;
    margin-left: 10px;
	}




</style>
<!--
<div class="frame">
	<div class="list_full">
		<ul>
			<li class="list_image">
				<a href="https://www.brandi.co.kr/products/8706154">
					<img src="https://image.brandi.me/cproduct/2019/05/21/8706154_1558441535_image1_M.jpg">
				</a>
			</li>
			<li class="list_seller">
				<a href="/shop/button9ine">버튼나인 &nbsp</a>
				<span>
					<img src="images/ic-product-option-todayshipping.png">
				</span>
			</li>
			<li class="list_title">
				<a href="https://www.brandi.co.kr/products/8706154">모던배색 크롭 반팔티(4co</a>
			</li>
			<li class="list_price">8,820<b>10%</b>
				<span>9,800</span>
			</li>
		</ul>
	</div>
</div>-->


<div class="frame">
    <div class="list_full">
        <div>
            <div class="pagetitle main_pagetitle">
                <h1 class="type2">
                    <span class="title">오늘출발</span>
                    <a href="#">더보기 &gt;
                    </a>
                    <span class="subtitle">2시 이전 주문 시 당일 발송</span>
                </h1>
            </div>
				</div><!-- 제품시작 -->
<?
	include "common.php";

	$query = 'select * from product where icon_new21=1 and status21=1 order by rand() limit 15';
	$result = mysqli_query($db, $query);                     
	if (!$result) exit("에러: $query");
	
	$num_col=4;   $num_row=5;                   // column수, row수
	$count=mysqli_num_rows($result);           // 출력할 제품 개수
	$icount=0;       // 출력한 제품개수 카운터
//echo("");
	for ($ir=0; $ir<$num_row; $ir++){ //가로줄
		echo("<ul>");
		for ($ic=0;  $ic<$num_col;  $ic++){ //세로줄
			if ($icount < $count){
				$row=mysqli_fetch_array($result);
				
				echo("
				<li class='list_image'>
					<a href='https://www.brandi.co.kr/products/8706154'>
						<img src='https://image.brandi.me/cproduct/2019/06/24/9241401_1561352004_image1_M.jpg'>
					</a>
				</li>
				<li class='list_seller'>
					<a href='/shop/button9ine'>버튼나인 &nbsp</a>
					<span>
						<img src='images/ic-product-option-todayshipping.png'>
					</span>
				</li>
				<li class='list_title'>
					<a href='https://www.brandi.co.kr/products/8706154'>모던배색 크롭 반팔티</a>
				</li>
				<li class='list_price'>8,820<b>10%</b>
					<span>9,800</span>
				</li>
				");
			}
			else{
				echo("<li></li><li></li><li></li><li></li>");
				$icount++;  
			}
		}
		echo("</ul>");
	}
?>
		</div>
</div>

<table border="0" cellpadding="0" cellspacing="0">
<!---1번째 줄-->
<?
	include "common.php";

	$query = 'select * from product where icon_new21=1 and status21=1 order by rand() limit 15';
	$result = mysqli_query($db, $query);                     
	if (!$result) exit("에러: $query");
	

	
	$num_col=5;   $num_row=3;                   // column수, row수
	$count=mysqli_num_rows($result);           // 출력할 제품 개수
	$icount=0;       // 출력한 제품개수 카운터
	/*
	
-------------------------------------------*/
?>



<!--
<tr>
	<td width="150" height="205" align="center" valign="top">
		<table border="0" cellpadding="0" cellspacing="0" width="100" class="cmfont">
			<tr> 
				<td align="center"> 
					<a href="product_detail.html?no=109469"><img src="product/0000_s.jpg" width="120" height="140" border="0"></a>
				</td>
			</tr>
			<tr><td height="5"></td></tr>
			<tr> 
				<td height="20" align="center">
					<a href="product_detail.html?no=1"><font color="444444">상품명1</font></a>&nbsp; 
					<img src="images/i_hit.gif" align="absmiddle" vspace="1"> <img src="images/i_new.gif" align="absmiddle" vspace="1"> 
				</td>
			</tr>
			<tr><td height="20" align="center"><b>89,000 원</b></td></tr>
		</table>
	</td>

</tr>-->
<!---2번째 줄-->

</table>

<?
    include "main_bottom.php";
?>

