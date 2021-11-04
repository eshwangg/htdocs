<?php
	include $_SERVER['DOCUMENT_ROOT']."/db.php"; /* db load */
?>
<!--글 작성 폼-->
<!doctype html>
<head>
<meta charset="UTF-8">
<title>공지 사항 답글</title>
<link rel="stylesheet" type="text/css" href="/css/style.css" />
</head>
<body>
<?php
		$bno = $_GET['idx']; 
		$sql = mq("select * from board where idx='".$bno."'"); 
		$board = $sql->fetch_array();
	?>
	
    <div id="board_write">
        <h1><a href="/">공지 사항</a></h1>
        <br>
        <h4>공지 사항 답글달기.</h4>
            <div id="write_area">
                <form action="thread_ok.php" method="post" enctype="multipart/form-data">
                <input type=hidden name=top value='<?php echo $board['top']?>'>
                <input type=hidden name=level value='<?php echo $board['level']?>'>
                
                    <div id="in_title">
                        <textarea name="title" id="utitle" rows="1" cols="55" placeholder="제목" maxlength="100" required></textarea>
                    </div>
                    <div class="wi_line"></div>
                    <div id="in_name">
                        <textarea name="name" id="uname" rows="1" cols="55" placeholder="글쓴이" maxlength="100" required></textarea>
                    </div>
                    <div class="wi_line"></div>
                    <div id="in_content">
                        <textarea name="content" id="ucontent" placeholder="내용" required></textarea>
                    </div>
                    <div class="bt_se">
                        <button type="submit">글 작성</button>
                    </div>
                    
                </form>
                <?php echo $board['top']?>
            </div>
        </div>
    </body>
</html>