<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>구매하기</title>
    <link rel="stylesheet" type="text/css" href="css/buy.css">

</head>
<body>
    <header>
        <a class="title" href="/">경기대 식권발매</a>
    </header>
    <section>
        <div class="box">
                <div class="text">
                    <form action="php/use_ticket.php" method="post">
                       	<div class="sik"><p>식권 코드를 입력해주세요.<br></p></div>
                        <div><input type="text" name="ticket" class="a number" placeholder="식권코드"></div> 
                        <div><input type="submit" value="구매하기" class="a buy"></div>
                     </form>
                </div>
                
         </div>
        
    </section>
</body>
</html>
