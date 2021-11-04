<?php 
  include $_SERVER['DOCUMENT_ROOT']."/db.php";
?>
<!doctype html>
<head>
<meta charset="UTF-8">
<title>공지 사항</title>
<link rel="stylesheet" type="text/css" href="/css/style.css" />
</head>
<body>
<div id="board_area"> 
  <h1>공지 사항</h1>

    <table class="list-table">
      <thead>
          <tr>
              <th width="70">번호</th>
                <th width="500">제목</th>
                <th width="120">글쓴이</th>
                <th width="100">작성일</th>
                <th width="100">top</th>
                <th width="100">level</th>
            </tr>
        </thead>
        <?php

            $cnt = 0;

            if(isset($_GET['page'])){
              $page = $_GET['page'];
                }else{
                  $page = 1;
                }
                  $sql = mq("select * from board");
                  $row_num = mysqli_num_rows($sql);
                  $list = 5; 
                  $block_ct = 5; 

                  $block_num = ceil($page/$block_ct); 
                  $block_start = (($block_num - 1) * $block_ct) + 1; 
                  $block_end = $block_start + $block_ct - 1;

                  $total_page = ceil($row_num / $list);
                  if($block_end > $total_page) $block_end = $total_page; 
                  $total_block = ceil($total_page/$block_ct);
                  $start_num = ($page-1) * $list; 

                  $sql2 = mq("select * from board order by top desc limit $start_num, $list");  
                  while($board = $sql2->fetch_array()){
                  $title=$board["title"]; 
                    if(strlen($title)>30)
                    { 
                      $title=str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8")."...",$board["title"]);
                    }

                  ?>
     <tbody>
        <tr>
          <td width="70"><?php echo   $list  - $cnt; ?></td>
          <td width="500"><a href="/page/board/read.php?idx=<?php echo $board["idx"];?>"><?php echo $title;?></a></td>
          <td width="120"><?php echo $board['name']?></td>
          <td width="100"><?php echo $board['date']?></td>
          <td width="100"><?php echo $board['top']?></td>
          <td width="100"><?php echo $board['level']?></td>

        </tr>
      </tbody>
      <?php $cnt ++;
    } ?>
    </table>
    <div id="page_num">
        <?php
          if($page <= 1)
          {
            echo "<span class='fo_re'>처음</span>";  
          }else{
            echo "<a href='?page=1'>처음</a>"; 
          }
          if($page <= 1)
          {
            
          }else{
          $pre = $page-1; 
            echo "<a href='?page=$pre'>이전</a>"; 
          }
          for($i=$block_start; $i<=$block_end; $i++){ 
            
            if($page == $i){ 
              echo "<span class='fo_re'>[$i]</span>"; 
            }else{
              echo "<a href='?page=$i'>[$i]</a>"; 
            }
          }
          if($block_num >= $total_block){ 
          }else{
            $next = $page + 1; 
            echo "<a href='?page=$next'>다음</a>"; 
          }
          if($page >= $total_page){ 
            echo "<span class='fo_re'>마지막</span>"; 
          }else{
            echo "<a href='?page=$total_page'>마지막</a>"; 
          }
        ?>
    </div>
<div id="write_btn">
      <a href="/page/board/write.php"><button>글쓰기</button></a>
</div>

  <!-- 검색  -->
  <div id="search_box">
    <form action="/page/board/search_result.php" method="get">
      <select name="catgo">
        <option value="title">제목</option>
        <option value="name">글쓴이</option>
        <option value="content">내용</option>
      </select>
      <input type="text" name="search" size="40" required="required" /> <button>검색</button>
    </form>
    </div>
  </div>
</body>
</html>