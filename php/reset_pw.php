<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>비밀번호 초기화<?php echo $_POST['id']; ?></title>
    <link rel="stylesheet" type="text/css" href="/css/find_pw_find.css">
</head>

<body>
    <header><a class="first" href="index.php">경기대 식권발매 <br></a></header>

        <div id="login">
            <div id="login_form">
                <form action="php/register.php" method="post">
               
                    <label>
                        <!-- <span>PW</span> -->
                        <p style="text-align: left; font-size:12px; color:#666"></p>
                        <input type="password" name="password" placeholder="비밀번호" class="size" required>
                    </label>
                        <!--비밀번호-->

                    <label>
                        <!-- <span>PW</span> -->
                        <p style="text-align: left; font-size:12px; color:#666"> </p>
                        <input type="password" name="confirm" placeholder="비밀번호 확인" class="size" required>
                    </label>
                        <!--비밀번호 확인-->

                    <br>
                    <p>
                        <input type="submit" value="비밀번호 찾기" class="btn">
                    </p>
                </form>

            </div>
        </div>
    
</body>
</html>
