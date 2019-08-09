
		</td>
	</tr>
</table>
<br><br>

<!-- 지도 파싱 
<div id="map" style="width:959px;height:400px;">
<div id="marker" style="position:absolute;left:0;top:0;border:2px solid #6C483B;">
</div>
</div>
-->
<!--<img src='images/skyblue.png'> -->

<!-- 화면 하단 부분 시작 (main_bottom) : 회사정보/회사소개/이용정보/개인보호정책 ... ---------->
<table width="959" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
	<tr> 
		<td background="images/footer_bg.gif" height="11"></td>
	</tr>
	<tr><td height="5"></td></tr>
	<tr> 
		<td> 
			<table width="959" border="0" cellspacing="0" cellpadding="0">
				<tr> 
					<td valign="top"><a href="index.html"><img src="images/footer_logo.gif" border="0"></a></td>
					<td width="28"></td>
					<td> 
						<table border="0" cellspacing="0" cellpadding="0">
							<tr> 
								<td> 
									<table border="0" cellspacing="0" cellpadding="0">
										<tr> 
											<td><a href="company.html"><img src="images/footer_menu01.gif" border="0"></a></td>
											<td><img src="images/footer_line.gif"></td>
											<td><a href="useinfo.html"><img src="images/footer_menu02.gif" border="0"></a></td>
											<td><img src="images/footer_line.gif"></td>
											<td><a href="policy.html"><img src="images/footer_menu03.gif" border="0"></a></td>
										</tr>
									</table>
								</td>
							</tr>
							<tr> 
								<td><img src="images/footer_copyright.gif"></td>
							</tr>
						</table>
					</td>
					<td align="right" valign="top">
						<table border="0" cellspacing="0" cellpadding="0">
							<tr> 
								<td align="right">
										<a href="index.html"><img src="images/footer_home.gif" border="0"></a>&nbsp
										<a href="#top"><img src="images/footer_top.gif" border="0"></a>
								</td>
							</tr>
							<tr>
								<td>
									<table border="0" cellspacing="0" cellpadding="0">
										<tr> 
											<td><A HREF="http://www.ftc.go.kr/" target="_blank"><img src="images/footer_pic1.gif" border="0"></A></td>
											<td><img src="footer_line.gif" width="3" height="42"></td>
											<td><A HREF="http://www.sgic.co.kr/" target="_blank"><img src="images/footer_pic2.gif" border="0"></a></td>
										</tr>
									</table>
								</td>
							<tr> 
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<!-- 화면 하단 부분 끝 (main_bottom) : 회사정보/회사소개/이용정보/개인보호정책 ... ---------->

&nbsp
</center>
<script type="text/javascript" src="https://openapi.map.naver.com/openapi/v3/maps.js?ncpClientId=qam1jsc3ga"></script>
<script type="text/javascript" src="https://openapi.map.naver.com/openapi/v3/maps.js?ncpClientId=qam1jsc3ga&callback=CALLBACK_FUNCTION"></script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> 
<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"></script>
<script src="/slick/slick.js" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript">
    $(document).on('ready', function() {
      $(".lazy").slick({
        lazyLoad: 'ondemand', // ondemand progressive anticipated
        infinite: true,
        dots: true,
        prevArrow : false,
        nextArrow : false,
      });
    });
</script>

</body>

<script type="text/javascript">
//지도 생성 초기옵션
var mapOptions = {
    center: new naver.maps.LatLng(37.6311354,127.0547104),
    zoom: 10,
	minZoom: 3,	//지도의 최소 줌 레벨
    zoomControl: true,	//줌 컨트롤의 표시 여부
    zoomControlOptions: {
    	position: naver.maps.Position.TOP_RIGHT //우하단에 위치시킴
    }
}
var map = new naver.maps.Map('map', mapOptions);

var HOME_PATH = window.HOME_PATH || '.';



// 마커 표시하기
var position = new naver.maps.LatLng(37.6311354,127.0547104); //위치

var map = new naver.maps.Map('map', {
    center: position,
    zoom: 10
});

var markerOptions = {
    position: position.destinationPoint(90, 15),
    map: map,
    icon: {
        url: HOME_PATH +'/images/marker.png',
        size: new naver.maps.Size(70, 74), //이미지 사이즈 조절
        origin: new naver.maps.Point(0, 0),
        anchor: new naver.maps.Point(25, 86) //이미지 위치 조절
    }
};
var marker = new naver.maps.Marker(markerOptions);


<!-- slick 플러그인-->
$(document).on('ready', function() {
     
		 $(".slider").slick({
			 lazyLoad: 'ondemand', // ondemand progressive anticipated
			 infinite: true,
	 dots: true,
	 
		 });
	
	 });

</script>
<script type="text/javascript">
$(document).ready(function () {
	//alert('123');
	$('.slick-items').slick({
		autoplay : true,
		dots: true,
		speed : 300 /* 이미지가 슬라이딩시 걸리는 시간 */,
		infinite: true,
		autoplaySpeed: 3000 /* 이미지가 다른 이미지로 넘어 갈때의 텀 */,
		arrows: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		fade: false
	});
});
</script>

</html>