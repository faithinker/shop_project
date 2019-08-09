<style type="text/css">
table.tbl-details {margin-bottom:50px;}
table.tbl-details td {text-align:center;}
table.tbl-details p.txt-prt {margin-bottom:10px; font-size:14px; font-weight:bold; text-align:left;}
table.tbl-y {width:100%; table-layout:fixed; border:1px solid #ccc;}
table.tbl-y th {padding:8px 0 7px 15px; background-color:#eee; border-bottom:1px solid #ddd; border-right:1px solid #ccc; font-size:12px; color:#666; text-align:left;}
table.tbl-y td {padding:9px 0 9px 15px; border-bottom:1px solid #ddd; font-size:11px; color:#666; line-height:18px;  word-wrap:break-word; text-align:left;}
table.tbl-y td ul li {padding-left:7px; background:url(http://www.lfmall.co.kr/file/WAS/apps/2013/image/frontoffice/common/ico/ico_rect_3x3.gif) no-repeat left 6px; font-size:11px; text-align:left;}
table.tbl-y .last th, table.tbl-y .last td {border-bottom:1px solid #ccc; }
</style>
<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2017.12)                                                    -->
<!-------------------------------------------------------------------------------------------->	
<?
    include "main_top.php";
	include "common.php";

	$no = $_REQUEST[no];
	$query = "select * from product where no21=$no;";
	$result = mysqli_query($db, $query);       
	
	$row = mysqli_fetch_array($result);

	if (!$result) exit("에러: $query");
?>
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
			<table border="0" cellpadding="0" cellspacing="0" width="746" style="font-size:9pt">
				<tr><td height="13"></td></tr>
				<tr>
					<td height="200" valign=top style="line-height:14pt">
						본제품의 상세설명은 다음과 같습니다.
						<br>
						<br>
						<center>
                        <img src="product/<?=$row[image3_21]?>" width="746"><br><br><br>
                        <?if($row[video21]){
                            echo("<div id='videoWrapper' width='746' background-image: url('images/product_background.jpg');'>
                                    $row[video21]
                                </div>");
                            }
                        ?>
						
						</center>
					</td>
				</tr>
			</table>

			<!-- 교환배송정보 -->
			<table border="0" cellpadding="0" cellspacing="0" width="746" class="cmfont">
				<tr><td height="10"></td></tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" width="746">
				<tr>
					<td align="center" class="cmfont"><?=$row[contents21]?></td>
				</tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" width="746" class="cmfont">
				<tr><td height="10"></td></tr>
			</table>


<!-------------------------------------------------------------------------------------------->	
<!-- 끝 : 다른 웹페이지 삽입할 부분                                                         -->
<!-------------------------------------------------------------------------------------------->	
<?
   include "main_bottom.php";
?>