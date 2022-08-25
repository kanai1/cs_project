<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>식당 퇴실</title>
    <link rel="stylesheet" type="text/css" href="css/buy.css">
	<?php
		$conn = mysqli_connect('localhost', 'rudrleo', 'rudrleoWkd!2', 'CSproject');
		$sql = "SELECT COUNT(*) FROM ticket_time WHERE time>DATE_SUB(now(), interval 20 minute)";
		$count = mysqli_fetch_array(mysqli_query($conn, $sql))['COUNT(*)'] or NULL;
	?>
</head>
<body>
    <header>
        <a class="title" href="/">경기대 식권발매</a>
    </header>
    <section>
        <div class="box">
                <div class="text">
                    <form action="php/out.php" method="post">
                       	<div class="sik"><p>입장할때 사용했던 식권 코드를 입력해주세요.<br></p></div>
			<div><span>남은 자리: <?php if($count !== NULL) echo 80 - $count; else echo"불러오기에 실패했습니다."; ?></span></div>
                        <div><input type="text" name="ticket" class="a number" placeholder="식권코드"></div> 
                        <div><input type="submit" value="퇴실하기" class="a buy"></div>
                     </form>
                </div>
                
         </div>
        
    </section>
</body>
</html>
