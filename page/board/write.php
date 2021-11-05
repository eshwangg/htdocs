<!--글 작성 폼-->
<!doctype html>
<head>
<meta charset="UTF-8">
<title>공지 사항 추가</title>
<link rel="stylesheet" type="text/css" href="/css/style.css" />
</head>
<body>
    <div id="board_write"><br>
        <h1><a href="/">공지 사항</a></h1>
        <br>
        <h4>공지 사항 추가하기.</h4>
            <div id="write_area">
                <form action="write_ok.php" method="post" enctype="multipart/form-data">
                    <div id="in_title">
                        <textarea name="title"  rows="1" cols="55" placeholder="제목" maxlength="100" required></textarea>
                    </div>
                    <div class="wi_line"></div>
                    <div id="in_name">
                        <textarea name="name"  rows="1" cols="55" placeholder="글쓴이" maxlength="100" required></textarea>
                    </div>
                    <div class="wi_line"></div>
                    <div id="in_content">
                        <textarea name="content"  placeholder="내용" required></textarea>
                    </div>
                    <div class="bt_se">
                        <button type="submit">글 작성</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>