<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>마이페이지</title>
    <link rel="stylesheet" type="text/css" href="mypage.css">

	<?php
		if(!isset($_SESSION['user_id']))
		{
			echo "<script>alert('로그인 후 이용해주세요.');location.href='/';</script>";
		}
		
		$conn = mysqli_connect('localhost', 'rudrleo', 'rudrleoWkd!2', 'CDproject');
		$id = $_SESSION['id'];
		$sql = "SELECT * FROM user WHERE id='{$id}'";
        
		$result = mysqli_fetch_array(mysqli_query($conn, $sql));
        
        $sql_count = "SELECT * FROM member_ticket WHERE code='{$result['ticket_code']}'";

        $count = mysqli_fetch_array(mysqli_query($conn, $sql_count))['count'] or 0;
	?>

</head>
<body>
    <header>
        <a class="title" href="/">경기대 식권발매</a>
    </header>
    

  <div class="main">
    <p class="sign" align="center"></p>
    <p class="name">이름: <?php echo $result['name']; ?> </p>
    <p class="phone">전화번호: <?php echo $result['phone']; ?></p>
    <p class="email">이메일: <?php echo $result['email']; ?></p>
    <p class="remainder">남은 식권 갯수: <?php echo $count; ?></p>
    <p class="code">식권 코드: <?php echo $result['ticket_code']; ?></p>
    </div>
</body>
</html>
