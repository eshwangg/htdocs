
<?php 
  include $_SERVER['DOCUMENT_ROOT']."/db.php";
?>
<!doctype html>
<head>
<meta charset="UTF-8">
<title>공지 사항 검색</title>
<link rel="stylesheet" type="text/css" href="/css/style.css" />
</head>
<body>
<div id="board_area"> 

<?php
 

  $catagory = $_GET['catgo'];
  $search_con = $_GET['search'];
?>
<br>
<h1><a href="/">공지 사항</a></h1>
<br>
<h3>'<?php echo $search_con; ?>' 으로 검색한 결과</h1>

    <table class="list-table">
      <thead>
          <tr>
              <th width="70">번호</th>
                <th width="500">제목</th>
                <th width="120">글쓴이</th>
                <th width="100">작성일</th>
            </tr>
        </thead>
        <?php
          $cnt = 0;
          $sql2 = mq("select * from board where $catagory like '%$search_con%' order by idx desc");
          $row_num = mysqli_num_rows($sql2);
          while($board = $sql2->fetch_array()){
           
          $title=$board["title"]; 
            if(strlen($title)>30)
              { 
                $title=str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8")."...",$board["title"]);
              }

        ?>
      <tbody>
        <tr>
          <td width="70"><?php echo $row_num - $cnt; ?></td>
          <td width="500">
            <?php 

              if($board=="1")
              { ?><a href='/page/board/ck_read.php?idx=<?php echo $board["idx"];?>'><?php echo $title;
              }else{?>


        <?php
          $boardtime = $board['date']; 
          $timenow = date("Y-m-d"); 
          

          ?>

        <a href='/page/board/read.php?idx=<?php echo $board["idx"]; ?>'><?php echo $title; }?></span><span class="re_ct"> </span></a></td>
          <td width="120"><?php echo $board['name']?></td>
          <td width="100"><?php echo $board['date']?></td>

        </tr>
      </tbody>

      <?php $cnt ++; } ?>
    </table>

    <div id="search_box2">
      <form action="/page/board/search_result.php" method="get">
      <select name="catgo">
        <option value="title">제목</option>
        <option value="name">글쓴이</option>
        <option value="content">내용</option>
      </select>
      <input type="text" name="search" size="40" required="required"/> <button>검색</button>
    </form>
  </div>
</div>
</body>
</html>