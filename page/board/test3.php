<?php include  $_SERVER['DOCUMENT_ROOT']."/db.php"; ?>
<!doctype html>
<head>
<meta charset="UTF-8">
<title>게시판</title>
<link rel="stylesheet" type="text/css" href="/css/style.css" />
</head>
<body>
<div id="board_area"> 

    <table class="list-table">
      <thead>
          <tr>
              <th width="70">번호</th>
                <th width="500">제목</th>
                <th width="120">글쓴이</th>
                <th>테스트</th>
            </tr>
        </thead>
        <?php
          $sql = mq("select * from board order by idx desc limit 0,5"); 
            while($board = $sql->fetch_array())
            {
             
        ?>

      <tbody>
        <tr>
          <td width="70"><?php echo $board['idx']; ?></td>

          <td><?php if($board['depth'] > 0)
                 echo "<img height=1 width=" . $board['depth']*7 . ">└";
          ?>
        <a href="/page/board/read.php?id=<?php echo $board['idx']?>">
        <?=strip_tags($board['title']);?></a>

        </td>
        </tr>
      </tbody>

      <?php } ?>
    </table>

  </div>
</body>
</html>