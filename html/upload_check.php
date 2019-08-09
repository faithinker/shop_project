<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2017.12)                                                    -->
<!-------------------------------------------------------------------------------------------->	
<html>
<head>
<title>test</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
</head>
<body>


<?
  $uploads_dir = './product';
  $allowed_ext = array('jpg','jpeg','png','gif','hwp');
   
  // 변수 정리
  $error = $_FILES['filename']['error'];
  $name = $_FILES['filename']['name'];
  $ext = array_pop(explode('.', $name));
   
  // 오류 확인
  if( $error != UPLOAD_ERR_OK ) {
      switch( $error ) {
          case UPLOAD_ERR_INI_SIZE:
          case UPLOAD_ERR_FORM_SIZE:
              echo "파일이 너무 큽니다. ($error)";
              break;
          case UPLOAD_ERR_NO_FILE:
              echo "파일이 첨부되지 않았습니다. ($error)";
              break;
          default:
              echo "파일이 제대로 업로드되지 않았습니다. ($error)";
      }
      exit;
  }
   
  // 확장자 확인
  if( !in_array($ext, $allowed_ext) ) {
      echo "허용되지 않는 확장자입니다.";
      exit;
  }
   
  // 파일 이동
  move_uploaded_file( $_FILES['filename']['tmp_name'], "$uploads_dir/$name");
  
  // 파일 정보 출력
  echo "<h2>파일 정보</h2>
  <ul>
      <li>파일명: $name</li>
      <li>확장자: $ext</li>
      <li>파일형식: {$_FILES['filename']['type']}</li>
      <li>파일크기: {$_FILES['filename']['size']} 바이트</li>
  </ul>";
?>



</body>
</html>
