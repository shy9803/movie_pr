<?php
  
  $mysql_host = 'localhost';
  $mysql_user = 'root';
  $mysql_password = '1234';
  $mysql_db = 'kdt';

  // db연결변수 생성
  $conn = mysqli_connect($mysql_host, $mysql_user, $mysql_password, $mysql_db);

  if(!$conn){
    die('연결실패 : '. mysqli_connect_error());
  }

  // php8.x이상에서 변수 선언시 값을 넣어주지 않으면 무조건 에러가 발생, 오류가 보이지 않게 설정해준다.
  ini_set('display_error', 'off');

  // db연결이 성공하면
  if (session_status() === PHP_SESSION_NONE) session_start(); // 세션시작 //중복호출방지
?>
