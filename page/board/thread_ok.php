<?php

include $_SERVER['DOCUMENT_ROOT']."/db.php";

// $name = "test";
// $query = "select max(top) from board where name = 'name'";
// $result = mysql_query($query, $conn);
// $data = mysql_fetch_array($result);
// $top = $data[0] + 1;
// 답글다는거
$name = $_GET['name'];
if(!$top){
    $sql2 = mq("select max(top) from board where name $name");
    $data = $sql2->fetch_array();
    $top = $data[0] + 1;
    }
$date = date('Y-m-d');

$sql = mq("insert into board(name,title,content,date,top,level) 
        values('".$_POST['name']."','".$_POST['title']."','".$_POST['content']."'
        ,'".$date."','".$top."',1)");


// $date = date('Y-m-d');
// $sql = mq("insert into board(name,title,content,date) values('".$_POST['name']."','".$_POST['title']."','".$_POST['content']."','".$date."')");
echo "<script>alert('글쓰기 완료되었습니다.');</script>"; 
?>
<meta http-equiv="refresh" content="0 url=/" />