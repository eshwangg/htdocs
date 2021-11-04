<?php
	include $_SERVER['DOCUMENT_ROOT']."/db.php";

	$bno = $_POST['idx'];

	$sql = mq("update board set name='".$_POST['name']."',title='".$_POST['title']."',content='".$_POST['content']."' where idx='".$bno."'");
echo "<script>alert('수정되었습니다.');</script>";
?>
<meta http-equiv="refresh" content="0 url=/page/board/read.php?idx=<?php echo $bno; ?>">