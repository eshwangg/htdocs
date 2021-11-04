<?php
	include $_SERVER['DOCUMENT_ROOT']."/db.php"; /* db load */
?>
<!doctype html>
<head>
<meta charset="UTF-8">
<title>공지 사항</title>
<link rel="stylesheet" type="text/css" href="/css/jquery-ui.css" />
<link rel="stylesheet" type="text/css" href="/css/style.css" />
<script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="/js/jquery-ui.js"></script>
<script type="text/javascript" src="/js/common.js"></script>
</head>
<body>

	<?php
		$bno = $_GET['idx']; 
		$sql = mq("select * from board where idx='".$bno."'"); 
		$board = $sql->fetch_array();
	?>
	
<!-- 글 불러오기 -->
<div id="board_read">
	<br>
	<h2>제목 : <?php echo $board['title']; ?></h2>
	<br>
		<div id="user_info">
			작성자 : <?php echo $board['name']; ?><br>
			날짜 : <?php echo $board['date']; ?> 
				<div id="bo_line"></div>
			</div>

			<div id="bo_content">
				내용 : <br><br> <?php echo nl2br("$board[content]"); ?>
			</div>

	<!-- 목록, 수정, 삭제 -->
	<div id="bo_ser">
		<ul>
			<li><a href="/">[목록으로]</a></li>
			<!-- <li><a href="thread.php?idx=<?php echo $board['idx']; ?>">[답글]</a></li> -->
			<li><a href="write.php?idx=<?php echo $board['idx']?>&top=<?php $board['top']?>&level=<?php $board['level']+1 ?>">[답글]</a></li>
			<li><a href="modify.php?idx=<?php echo $board['idx']; ?>">[수정]</a></li>
			<li><a href="delete.php?idx=<?php echo $board['idx']; ?>">[삭제]</a></li>

		</ul>
	</div>


<div id="foot_box"></div>
</div>
</body>
</html>