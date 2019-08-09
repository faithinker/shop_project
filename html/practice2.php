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

<script type="text/javascript">
   var pTabTop = []
   var pnavMg;
   $(document).ready(function() {
   jfViewSizeReview();
   jfViewSizeReviewPop();
   
   // 상품정보 탭 선택
   function tabSelect(tabTop, scroll) {
   if($("#qnaTab").css("display") != "none"){
   tabSelectForQnA(tabTop, scroll);
   }
   else{
   tabSelectForNonQnA(tabTop, scroll);
   }
   }
   
   // 상품정보 탭 선택
   function tabSelectForQnA(tabTop, scroll) {
   var tabM = $(".rv_tab ul").find(">li");
   var idx = 0;
   for (var i = 0; i < tabTop.length; i++){
   if (scroll >= tabTop[i]){
   idx = i;
   }
   }
   
   // LFML-21925
   var i=0;
   $(".rv_tab ul  li").each(function(){
   $(this).removeClass("sel");
   
   // i == Tab 자리 (0-3);   idx == rv_tab ul tag로 감싸진 영역
   switch(i){
   case 0:
   if(idx == 0 || idx == 1){
    $(this).addClass("sel");
   }
   break;
   case 1:
   if(idx == 2){
    $(this).addClass("sel");
   }
   break;
   case 2:
   if(idx == 3){
    $(this).addClass("sel");
   }
   break;
   case 3:
   if(idx == 4){
    $(this).addClass("sel");
   }
   break;
   }
   
   ++i;
   });
   }
   
   
   // 상품정보 탭 선택
   function tabSelectForNonQnA(tabTop, scroll) {
   var tabM = $(".rv_tab ul").find(">li");
   var idx = 0;
   for (var i = 0; i < tabTop.length; i++){
   if(i == 3){
   continue;
   }
   
   if (scroll >= tabTop[i]){
   idx = i;
   }
   }
   
   // LFML-21925
   var i=0;
   $(".rv_tab ul  li").each(function(){
   $(this).removeClass("sel");
   
   // i == Tab 자리 (0-3);   idx == rv_tab ul tag로 감싸진 영역
   switch(i){
   case 0:
   if(idx == 0 || idx == 1){
    $(this).addClass("sel");
   }
   break;
   case 1:
   if(idx == 2){
    $(this).addClass("sel");
   }
   break;
   case 2:
   if(idx == 3){
    $(this).addClass("sel");
   }
   break;
   case 3:
   if(idx == 4){
    $(this).addClass("sel");
   }
   break;
   }
   
   ++i;
   });
   }
   function tabScroll(){
   
   if($("#qnaTab").css("display") != "none"){
   tabScrollForQnA();
   }
   else{
   tabScrollForNonQnA();
   }
   } tabScroll();
   
   function tabScrollForQnA(){
   var nav = $(".rv_tab");
   var navH = $(".rv_tab").innerHeight();
   var navMg = navH - $(".rv_tab").height();
   var navTop = $(".rv_tab").offset().top;
   
   var tabM =  $(".rv_tab ul ").find(">li");
   var tabC = $(".rv_tab_container").find(".rv_tab_content");
   var tabTop = [];
   tabC.each(function(i) {
   i == 0 ? tabTop.push(navTop) : tabTop.push($(this).offset().top - (navH));
   });
   
   $(window).on({
   scroll: function(){
   var windowTop = $(this).scrollTop();
   $('.scrollValue').text(windowTop);
   tabTop = [];
   tabC.each(function(i) {
   i == 0 ? tabTop.push(navTop) : tabTop.push($(this).offset().top - (navH));
   });
   // 		       console.log(navTop, tabTop);
   if (windowTop >= navTop){
   nav.addClass("fixed").parent().addClass("scrolling");
   tabSelect(tabTop, windowTop);
   }
   else if (windowTop < navTop)
   {
   nav.removeClass("fixed").parent().removeClass("scrolling");
   }
   },
   resize: function() {
   navTop = $(".rv_tab_container").offset().top - (nav.hasClass("fixed") ? 0 : navH);
   }
   });
   
   $('.rv_tab ul > li > a').on("click", function(){
   tabIndex = $(this).parent("li").index();
   var selectView = 0;
   // LFML-21925 -- 연관상품 탭이 없어졌으므로 인덱스를 임의 변경함.
   switch(tabIndex){
   case 0:
   selectView = 0;
   break;
   case 1:
   selectView = 1;
   tabIndex = 2
   break;
   case 2:
   selectView = 2;
   tabIndex = 3;
   break;
   case 3:
   selectView = 3;
   tabIndex = 4;
   break;
   }
   
   var i=0;
   $(".rv_tab ul  li").each(function(){
   $(this).removeClass("sel");
   if(i==selectView){
    $(this).addClass("sel");
   }            
   ++i;
   });
   
   $('html,body').stop().animate({scrollTop:tabTop[tabIndex] + navMg+1},600,'swing');
   return false;
   });
   } tabScrollForQnA();
   
   
   function tabScrollForNonQnA(){
   var nav = $(".rv_tab");
   var navH = $(".rv_tab").innerHeight();
   var navMg = navH - $(".rv_tab").height();
   var navTop = $(".rv_tab").offset().top;
   
   var tabM =  $(".rv_tab ul ").find(">li");
   var tabC = $(".rv_tab_container").find(".rv_tab_content");
   var tabTop = [];
   tabC.each(function(i) {
   i == 0 ? tabTop.push(navTop) : tabTop.push($(this).offset().top - (navH));
   });
   
   $(window).on({
   scroll: function(){
   var windowTop = $(this).scrollTop();
   $('.scrollValue').text(windowTop);
   tabTop = [];
   tabC.each(function(i) {
     i == 0 ? tabTop.push(navTop) : tabTop.push($(this).offset().top - (navH));
   });
   //	 		       console.log(navTop, tabTop);
   if (windowTop >= navTop){
     nav.addClass("fixed").parent().addClass("scrolling");
     tabSelect(tabTop, windowTop);
   }
   else if (windowTop < navTop)
   {
     nav.removeClass("fixed").parent().removeClass("scrolling");
   }
   },
   resize: function() {
   navTop = $(".rv_tab_container").offset().top - (nav.hasClass("fixed") ? 0 : navH);
   }
   });
   
   $('.rv_tab ul > li > a').on("click", function(){
   tabIndex = $(this).parent("li").index();
   var selectView = 0;
   // LFML-21925 -- 연관상품 탭이 없어졌으므로 인덱스를 임의 변경함.
   switch(tabIndex){
   case 0:
    selectView = 0;
    break;
   case 1:
    selectView = 1;
    tabIndex = 2
    break;
   case 2:
    selectView = 1;
    tabIndex = 2
    break;
   case 3:
    selectView = 3;
    tabIndex = 4;
    break;
   }
   
   var i=0;
   $(".rv_tab ul  li").each(function(){
    $(this).removeClass("sel");
    if(i==selectView){
       $(this).addClass("sel");
   }            
    ++i;
   });
   
   $('html,body').stop().animate({scrollTop:tabTop[tabIndex] + navMg+1},600,'swing');
   return false;
   });
   } tabScrollForQnA();
   });
   </script>

<html>
<table class="tbl-y mb10" summary="" >
<caption></caption>
<colgroup>
<col width="30%">
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

<div id="videoWrapper" style="padding-top: 47px; padding-right: 150px; padding-bottom: 47px; width: 746px; padding-left: 150px; margin-bottom: 50px; background-image: url('images//product_background.jpg'); background-attachment: scroll; background-repeat: repeat; background-position-x: 0%; background-position-y: 0%; background-size: auto; background-origin: padding-box; background-clip: border-box; background-color: transparent;">
   <iframe style="width:640px; height:360px;" src="http://www.youtube.com/embed/FxlS8r3WCfg" frameborder="0" type="application/x-shockwave-flash"></iframe>
</div>

</html>