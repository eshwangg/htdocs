<?php

include $_SERVER['DOCUMENT_ROOT']."/db.php";
$date = date('Y-m-d');
$sql = mq("insert into board(name,title,content,date) values('".$_POST['name']."','".$_POST['title']."','".$_POST['content']."','".$date."')");
echo "<script>alert('글쓰기 완료되었습니다.');</script>"; 
?>
<meta http-equiv="refresh" content="0 url=/" />