<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>빠르게 맛있게</title>
    <link rel="stylesheet" type="text/css" href="css/index.css">
</head> 
<body>
    <header>
        <a href="index.html" class="title">경기대 식권발매</a>
        <?php
            $buy_url = "";
            if(isset($_SESSION['user_id']))
            {
                echo "<a href='php/mypage.php' class='login'>마이페이지</a>";
                echo "<a href='php/logout.php' class='register'>로그아웃</a>";
                $buy_url = "member_buy.html";
            }
            else
            {
                echo "<a href='signin.html' class='login'>로그인</a>";
                echo "<a href='signup.html' class='register'>회원가입</a>";
                $buy_url = "nonmember_buy.html";
            }
        ?>
    </header>
    <section>
        <p class="explain">빠르게<br><span class="green">&nbsp맛있게</span></p>
        <button type="button" onclick="location.href='<?php echo $buy_url; ?>'" class="buy">식권구매</button>
    </section>
    <footer>
        <p class="foot">문의사항</p>
        <p class="tel">010-3333-3330</p>
        <p class="email">josoogen@naver.com</p>       
    </footer>
</body>
</html>
