
<h3>테이블 이름과 설명입니다</h3>
<br>
<img src="https://user-images.githubusercontent.com/93505574/140270778-31bda115-bb35-44f9-b4b2-c601f7ad56ed.jpg">

<h3>db 쿼리</h3>
<br>
create table board;


CREATE TABLE board (
 
`idx` int(11) unsigned NOT NULL AUTO_INCREMENT,
 
`name` varchar(100),
 
`title` varchar(100),

`content` TEXT,

`date` date,

`top` int(11),

`level` int(10),

 
primary key(`idx`)
 
) ENGINE=InnoDB DEFAULT CHARSET=UTF8
