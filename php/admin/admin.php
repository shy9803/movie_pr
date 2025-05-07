<?php 
  // 관리자 화면
  
  include('../../db/dbconn.php'); //DB연결
?>

<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>이벤트 관리_등록</title>
  <link rel="stylesheet" href="../../css/reset.css" type="text/css">
  <link rel="stylesheet" href="../../css/admin.css" type="text/css">
</head>
<body>
  <div id="adm_idx">
    <!-- 관리자 메뉴 -->
    <aside id="adm_mnu">
      <h2>관리자 메뉴</h2>
      <nav>
        <ul>
          <li><a href="./member/member_list.php" title="회원관리">회원관리</a></li>
          <li><a href="./content/event_mg.php" title="콘텐츠관리">콘텐츠관리</a></li>
          <li><a href="./customer/inquiry_list.php" title="고객관리">고객관리</a></li>
          <li><a href="./dashboard/dashboard.php" title="대시보드">대시보드</a></li>
        </ul>
      </nav>
    </aside>

    <!-- 메인영역 -->
    <main id="adm_idx_dp">
      <!-- 탭 메뉴(동 폴더 내 다른 화면 이동) -->
      <ul class="admin_tap">
        <li><a href="./content/store_order.php" title="스토어 주문 내역">스토어 주문내역</a></li>
        <li><a href="./content/event_mg.php" title="이벤트 관리">이벤트 관리</a></li>
        <li><a href="./content/movie_mg.php" title="영화 관리">영화 관리</a></li>
        <li><a href="./content/theater_mg.php" title="영화관 관리">영화관 관리</a></li>
      </ul>

    </main>
  </div>

  <!-- 스크립트 -->
  
</body>
</html>