<?php 
  // member_list.php  //회원 리스트 및 정보 관리

  include('../../../db/dbconn.php'); //DB 연결
?>

<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>회원 리스트 및 정보 관리</title>
  <link rel="stylesheet" href="../../../css/reset.css" type="text/css"> <!--초기화 CSS-->
  <link rel="stylesheet" href="../../../css/main.css" type="text/css"> <!--메인 CSS-->
  <link rel="stylesheet" href="../../../css/adm_member.css" type="text/css"> <!--admin의 memberlist CSS-->
</head>
<body>
  <form action="./adm_member_search.php" method="post" name="search" id="adm_member">
    <fieldset>
      <legend>관리자용 회원 리스트 및 정보 관리</legend>

      <?php 
        // 페이지네이션 - 테이블
        $sql = "SELECT count(*) FROM ltc_member;";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);

        $num = $row[0]; // 전체 수
        $list_num = 12; //페이지별 보여질 리스트 수
        $page_num = 3; //페이지네이션 표시 페이지 수
        $page = isset($_GET['page']) ? $_GET['page'] : 1; //현재 페이지

        $total_page = ceil($num / $list_num); //전체 페이지 수
        $total_block = ceil($total_page / $page_num); //전체 블럭
        $now_block = ceil($page / $page_num); //현재 블럭

        $s_pageNum = ($now_block - 1) * $page_num + 1; //블럭당 시작 페이지 번호
        if($s_pageNum <= 0) {$s_pageNum = 1;};

        $e_pageNum = $now_block * $page_num; //블럭당 마지막 페이지 번호
        if($e_pageNum > $total_page) {$e_pageNum = $total_page;} //마지막 번호가 전체 번호보다 크면 동일값 설정

        $start = ($page - 1) * $list_num;
        $cnt = $start + 1;
      ?>

      <!-- 검색기능 -->
      <div class="adm_search">
        <input type="search" name="search" id="adm_member_search" placeholder="검색어 입력">
        <input type="submit" value="search">
      </div>

      <!-- 회원리스트 출력(테이블 형식) -->
      <table>
        <caption>회원 리스트 및 정보 관리</caption>

        <thead>
          <tr>
            <!-- 출력내용: 번호, 이름, 아이디, 지역, 이메일, 전화번호 -->
            <th scope="col">등록번호</th>
            <th scope="col">이름</th>
            <th scope="col">아이디</th>
            <th scope="col">이메일</th>
            <th scope="col">전화번호</th>
            <th scope="col">지역</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            // SQL 조회
            $sql = "SELECT * FROM ltc_member ORDER BY no DESC LIMIT $start, $list_num;";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($result)) { 
            ?>
          <tr>
            <td><?= $row['no']; ?></td>
            <td><?= $row['mb_name']; ?></td>
            <td><?= $row['mb_id']; ?></td>
            <td><?= $row['mb_email']; ?></td>
            <td><?= $row['mb_phone']; ?></td>
            <td><?= $row['mb_region']; ?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>

      <div id="list_n_pagenum">
        <p class="total_list_num">
          <?= $list_num ?>개씩 / <!--현재 표시 리스트 개수-->
          총 <?= $num ?>개 <!--전체 리스트 개수-->
        </p>

        <!-- 페이지 번호 -->
        <div class="adm_pagination">
          <?php 
            // 페이지 번호 범위
            $start_page = floor(($page - 1) / $page_num) * $page_num; //1부터 시작
            $end_page = min($start_page + $page_num - 1, $total_page); //최소값
          ?>
          <p>
            <!-- 이전 페이지 -->
            <?php if($page <= 1) { ?>
              <span class="disabled">이전</span>
            <?php } else { ?>
              <a href="member_list.php?page=<?= ($page - 1) ?>" title="이전 페이지">이전</a>
            <?php } ?>

            <!--각 페이지 번호-->
            <a href="#" title="">
              <?php //페이지 번호 출력
                for($print_page = $s_pageNum; $print_page <= $e_pageNum; $print_page++) { ?>
                <a href="member_list.php?page=<?= $print_page ?>" <?php if($page == $print_page) {echo 'title="" class="act"';} ?>>
                  <?= $print_page ?>
                </a>
                <?php } ?>
            </a>

            <!-- 다음 페이지 -->
            <?php if($page < $total_page) { ?>
              <a href="member_list.php?page=<?= ($page + 1) ?>" title="다음 페이지">다음</a>
            <?php } else { ?>
              <span class="disabled">다음</span>
            <?php } ?>
          </p>
        </div>
      </div>
    </fieldset>
  </form>
</body>
</html>