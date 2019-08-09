<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2017.12)                                                    -->
<!-------------------------------------------------------------------------------------------->	
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<?
    include "main_top.php";
	include "common.php";

	$no = $_REQUEST[no];
	$query = "select * from product where no21=$no;";
	$result = mysqli_query($db, $query);       
	
	$row = mysqli_fetch_array($result);

	if (!$result) exit("에러: $query");
?>
<style type="text/css">
table.tbl-details {margin-bottom:50px;}
table.tbl-details td {text-align:center;}
table.tbl-details p.txt-prt {margin-bottom:10px; font-size:14px; font-weight:bold; text-align:left;}
table.tbl-y {width:94%; table-layout:fixed; border:1px solid #ccc;}
table.tbl-y th {padding:8px 0 7px 15px; background-color:#eee; border-bottom:1px solid #ddd; border-right:1px solid #ccc; font-size:12px; color:#666; text-align:left;}
table.tbl-y td {padding:9px 0 9px 15px; border-bottom:1px solid #ddd; font-size:11px; color:#666; line-height:18px;  word-wrap:break-word; text-align:left;}
table.tbl-y td ul li {padding-left:7px;  font-size:11px; text-align:left;}
table.tbl-y .last th, table.tbl-y .last td {border-bottom:1px solid #ccc; }
.tab-titles {  
	/*가로 메뉴바가 좌측으로 와야하는데 어떻게 할지를 모르겠다.*/
	width: 750px;
	margin-left: 0px;
	
	
}
.tab-titles li {
	
	float: left;
	display: inline-block;
    padding: 15px 20px 14px;
    width: 25%;
    border: 1px solid #ccc;
    background-color: #fafafa;
    text-align: center;
    color: #555;
    font-weight: bold;
    font-size: 16px;
    box-sizing: border-box;
	cursor: pointer;
	list-style: none;
}
.active {
    
    background: #ffffff;
    border-bottom: 1px solid #fff;
	color: #111;
	
}
</style>

<!-------------------------------------------------------------------------------------------->	
<!-- 시작 : 다른 웹페이지 삽입할 부분                                                       -->
<!-------------------------------------------------------------------------------------------->	

			<!--  현재 페이지 자바스크립  -------------------------------------------->
			<script language = "javascript">

			function Zoomimage(no) 
			{
				window.open("zoomimage.php?no="+no, "", "menubar=no, scrollbars=yes, width=560, height=640, top=30, left=50");
			}

			function check_form2(str) 
			{
				if (!form2.opts1.value) {
						alert("옵션1을 선택하십시요.");
						form2.opts1.focus();
						return;
				}
				if (!form2.opts2.value) {
						alert("옵션2를 선택하십시요.");
						form2.opts2.focus();
						return;
				}
				if (!form2.num.value) {
						alert("수량을 입력하십시요.");
						form2.num.focus();
						return;
				}
				if (str == "D") {
					form2.action = "cart_edit.php";
					form2.kind .value = "order";
					form2.submit();
				}
				else {
					form2.action = "cart_edit.php"; //cart.php로 바로 넘어감
					form2.kind .value = "insert";
					form2.submit();
				}
			}

			</script>

			<table border="0" cellpadding="0" cellspacing="0" width="747">
				<tr><td height="13"></td></tr>
				<tr>
					<td height="30"><img src="images/product_title3.gif" width="746" height="30" border="0"></td>
				</tr>
				<tr><td height="10"></td></tr>
			</table>

			<!-- form2 시작  -->
			<form name="form2" method="post" action="">
			<input type="hidden" name="no" value="<?=$row[no21]?>">
			<input type="hidden" name="kind" value="insert">

			<table border="0" cellpadding="0" cellspacing="0" width="745">
				<tr>
					<td width="335" align="center" valign="top">
						<!-- 상품이미지 -->
						<table border="0" cellpadding="0" cellspacing="1" width="315" height="315" bgcolor="D4D0C8">
							<tr>
								<td bgcolor="white" align="center">
									<img src="product/<?=$row[image2_21]?>" width="315" height="315" border="0" align="absmiddle" ONCLICK="Zoomimage(<?=$row[no21]?>)" STYLE="cursor:hand">
								</td>
							</tr>
						</table>
					</td>
					<td width="410 " align="center" valign="top">
						<!-- 상품명 -->
						<table border="0" cellpadding="0" cellspacing="0" width="370" class="cmfont">
							<tr><td colspan="3" bgcolor="E8E7EA"></td></tr>
							<tr>
								<td width="80" height="45" style="padding-left:10px">
									<img src="images/i_dot1.gif" width="3" height="3" border="0" align="absmiddle">
									<font color="666666"><b>제품명</b></font>
								</td>
								<td width="1" bgcolor="E8E7EA"></td>
								<td style="padding-left:10px">
									<font color="282828"><?=$row[name21]?></font><br>
									<?
										if($row[icon_new21] == 1)
											echo("<img src='images/i_new.gif' align='absmiddle' vspace='1'>");
										if($row[icon_hit21] == 1)
											echo("<img src='images/i_hit.gif' align='absmiddle' vspace='1'>");
										if($row[icon_sale21] == 1)
											echo("<img src='images/i_sale.gif' align='absmiddle' vspace='1'>");
									?>
								</td>
							</tr>
							<tr><td colspan="3" bgcolor="E8E7EA"></td></tr>
							<!-- 시중가 -->
							<tr>
								<td width="80" height="35" style="padding-left:10px">
									<img src="images/i_dot1.gif" width="3" height="3" border="0" align="absmiddle">
									<font color="666666"><b>소비자가</b></font>
								</td>
								<td width="1" bgcolor="E8E7EA"></td>
								<? 
									$price = number_format($row[price21]) ." 원";
								?>
								<td width="289" style="padding-left:10px"><font color="666666"><?=$price?></font></td>
							</tr>
							<tr><td colspan="3" bgcolor="E8E7EA"></td></tr>
							<!-- 판매가 -->
							<tr>
								<td width="80" height="35" style="padding-left:10px">
									<img src="images/i_dot1.gif" width="3" height="3" border="0" align="absmiddle">
									<font color="666666"><b>판매가</b></font>
								</td>
								<td width="1" bgcolor="E8E7EA"></td>
								<?
									$sale=number_format(round($row[price21]*(100-$row[discount21])/100, -3)) . " 원";
								?>
								<td style="padding-left:10px"><font color="0288DD"><b><?=$sale?></b></font></td>
							</tr>
							<tr><td colspan="3" bgcolor="E8E7EA"></td></tr>
							<!-- 옵션 -->
							<tr>
								<td width="80" height="35" style="padding-left:10px">
									<img src="images/i_dot1.gif" width="3" height="3" border="0" align="absmiddle">
									<font color="666666"><b>옵션선택</b></font>
								</td>
								<td width="1" bgcolor="E8E7EA"></td>
								<td style="padding-left:10px">
									<select name="opts1" class="cmfont1">
									<option value=''>선택</option>
									<?
										$query = "select * from opts where opt_no21=$row[opt1_21];";  //소옵션 목록명 표시
										$result = mysqli_query($db, $query);								// sql 실행
										$count = mysqli_num_rows($result);
										if (!$result) exit("에러: $query");										// 에러 조사
							
										for ($i = 1; $i < $count; $i++) {
											$row1 = mysqli_fetch_array($result);		// 1레코드 읽기
											echo("<option value='$row1[no21]'>$row1[name21]</option>");
										}
									?>
									</select> &nbsp;
										
									<select name="opts2" class="cmfont1">
									<option value=''>선택</option>
										<?
										$query = "select * from opts where opt_no21=$row[opt2_21];";  //소옵션 목록명 표시
										$result = mysqli_query($db, $query);								// sql 실행
										$count = mysqli_num_rows($result);
										if (!$result) exit("에러: $query");										// 에러 조사

										for ($i = 1; $i < $count; $i++) {
											$row2 = mysqli_fetch_array($result);		// 1레코드 읽기
											echo("<option value='$row2[no21]'>$row2[name21]</option>");
										}
										?>
										
									</select>
								</td>
							</tr>
							<tr><td colspan="3" bgcolor="E8E7EA"></td></tr>
							<!-- 수량 -->
							<tr>
								<td width="80" height="35" style="padding-left:10px">
									<img src="images/i_dot1.gif" width="3" height="3" border="0" align="absmiddle">
									<font color="666666"><b>수량</b></font>
								</td>
								<td width="1" bgcolor="E8E7EA"></td>
								<td style="padding-left:10px">
									<input type="text" name="num" value="1" size="3" maxlength="5" class="cmfont1"> <font color="666666">개</font>
								</td>
							</tr>
							<tr><td colspan="3" bgcolor="E8E7EA"></td></tr>
						</table>
						

						<table border="0" cellpadding="0" cellspacing="0" width="370" class="cmfont">
							<tr>
								<td height="70" align="center"> <!-- 옵션 체크 -->
									<a href="javascript:check_form2('D')"><img src="images/b_order.gif" border="0" align="absmiddle"></a>&nbsp;&nbsp;&nbsp;
									<a href="javascript:check_form2('C')"><img src="images/b_cart.gif"  border="0" align="absmiddle"></a>
								</td>
							</tr>
						</table>
						<table border="0" cellpadding="0" cellspacing="0" width="370" class="cmfont">
							<tr>
								<td height="30" align="center">
									<img src="images/product_text1.gif" border="0" align="absmiddle">
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			</form>
			<!-- form2 끝  -->

			<table border="0" cellpadding="0" cellspacing="0" width="747">
				<tr><td height="22"></td></tr>
			</table>

			<!-- 상세설명 -->
			<table border="0" cellpadding="0" cellspacing="0" width="747">
				<tr><td height="13"></td></tr>
			</table>
			  <table border="0" cellpadding="0" cellspacing="0" width="746">
			 
				<tr>
					<td height="30" align="center">
						<img src="images/product_title.gif" width="746" height="30" border="0">
					</td>
				</tr>						
			</table>
			<!--
			<nav class="nav">
				<a class="nav-link active" href="#detail">상품상세</a>
				<a class="nav-link" href="#review">상품평</a>
				<a class="nav-link" href="#qna">상품문의</a>
				<a class="nav-link" href="#etc">배송/교환/반품안내</a>
				
			</nav>
			-->
			<table border="1" style="border: 1px black solid; height: 50px; width:746px; text-align: center; font-weight: bold;
    		 background-color: #fafafa;">
				<tr>
					<td style="font-size:16px;" Onclick=location.href='#detail' class="active" > 상품상세 </td>
					<td style="font-size:16px;" Onclick=location.href="#review"> 상품평 </td>
					<td style="font-size:16px;" Onclick=location.href="#qna"> 상품문의 </td>
					<td style="font-size:16px;" Onclick=location.href="#etc">배송/교환/반품 안내</td>
				</tr>
			</table>
			<!--<ul cellpadding="0" cellspacing="0"  style="border: 1px black solid; height: 50px;">
					<li name="detail" class="active" href="#detail">상품상세</li>
					<li name="review" href="#review">상품평 <span class="product-tab-review-count"></span></li>
					<li name="qna" href="#qna">상품문의</li>
					<li name="etc" href="#etc">배송/교환/반품안내</li>
			</ul>-->
			<table border="0" cellpadding="0" cellspacing="0" width="746" style="font-size:24pt">
				<tr><td height="13"></td></tr>
				<tr>
					<td height="200" valign=top style="line-height:14pt" id="detail">
						<br>
						<center>
						<?if($row[video21]){
							echo("<div style =\"padding-top: 47px; padding-bottom: 47px; 
								width: 746px; background-image: url('images/product_background.jpg');
								background-attachment: scroll; background-repeat: repeat; 
								background-size: auto; background-color: transparent;\"> 
								$row[video21]
							</div>");
                            }
                        ?><br>
						<img src="product/<?=$row[image3_21]?>" width="746" id="detail"><br><br><br>		
						</center>
					</td>
				</tr>
			</table>


			<!-- 상품설명 -->
			<table border="0" cellpadding="0" cellspacing="0" width="746" class="cmfont">
				<tr><td height="10"></td></tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" width="746">
				<tr>
					<td align="center" class="cmfont" id="detail"><?=$row[contents21]?></td>
				</tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" width="746" class="cmfont">
				<tr><td height="10"></td></tr>
			</table>
			<!--교환배송정보 -->
				<table class="tbl-y mb10" summary="" id="etc">
					<caption></caption>
					<colgroup>
					<col width="25%">
					<col width="*">
					</colgroup>
					<tbody>
					<tr>
						<th>제품 소재(제품 주소재)</th>
						<td>합성피혁</td>
					</tr>
					<tr>
						<th>색상</th>
						<td></td>
					</tr>
					<tr>
						<th>제조사(수입자/병행수입)</th>
						<td></td>
					</tr>
					<tr>
						<th>제조국</th>
						<td></td>
					</tr>
					<tr>
						<th>취급시 주의사항</th>
						<td></td>
					</tr>
					<tr>
						<th>품질보증기준</th>
						<td></td>
					</tr>
					<tr>
						<th>A/S 책임자와 전화번호</th>
						<td>고객상담실 1544-1544</td>
					</tr>
					<tr>
						<th>KC 안전인증정보</th>
						<td></td>
					</tr>
					<tr>
						<th>취급시 주의사항</th>
						<td>이 제품은 [전기용품 및 생활용품 안전관리법] 에 따른 안전기준을 준수한 제품입니다.</td>
					</tr>
					</tbody>
				</table>


<!-------------------------------------------------------------------------------------------->	
<!-- 끝 : 다른 웹페이지 삽입할 부분                                                         -->
<!-------------------------------------------------------------------------------------------->	
<?
   include "main_bottom.php";
?>