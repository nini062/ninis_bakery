<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nini's Bakery</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Zen+Antique&display=swap" rel="stylesheet">
</head>
<body>
<header>
        <h1>Nini's Bakery</h1>
    </header>
    <section class="main">
        <div class="sub-img"></div>
    </section>
   <div class="kakunin-content">
    <?php
    
    $price = 0;
    $count = 0;

    foreach($_SESSION['total'] as $bread){
        $bread[1] = htmlspecialchars($bread[1], ENT_QUOTES);
        $count += $bread[1];
    }
    if($count == 0){
        print('
       <h1>ご注文をカートに入れて下さい</h1>
       <hr>
       <a class="checkbox" href="index.php#menu">戻る</a>
       ');
    }else{
        print('
            <h1>ご注文</h1>
            <div class="kakunin-wrap">
            <div class="grid-wrap">');
        foreach($_SESSION['total'] as $bread){
        $bread[0] = htmlspecialchars($bread[0], ENT_QUOTES);
        $bread[1] = htmlspecialchars($bread[1], ENT_QUOTES);
        if($bread[1] != 0){
            $bread[2] = htmlspecialchars($bread[2], ENT_QUOTES);

            print("<div>{$bread[0]}</div><div>{$bread[2]}円</div><div>{$bread[1]}個</div>");
            print('<div>' .$bread[2] * $bread[1] . '円</div>');
            $price += $bread[2] * $bread[1];
        }
    }
    

    print('
    </div>
   <hr>
   <div class="grid-wrap">
    ');
    print("<div>合計</div><div></div><div>{$count}個</div><div>{$price}円</div>");
    print('
    </div>
   </div>
   </div>
   <hr>
   <a class="checkbox" href="index.php#menu">変更</a>
   <a class="checkbox" href="kakutei.php">確定</a>
    ');       
    }


    ?>
   <footer>
        <small>Nini's Bakery</small>
     </footer>  
</body>
</html>