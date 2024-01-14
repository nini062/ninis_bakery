<?php 
session_start(); 
foreach($_SESSION['total'] as $bread){
    $bread[0] = htmlspecialchars($bread[0], ENT_QUOTES);
    $bread[1] = htmlspecialchars($bread[1], ENT_QUOTES);
    if($bread[1] != 0){
        require('inc/conn.php');
        $db = condb($host,$user,$pass);
        $name_list = $db->prepare('UPDATE breadlist SET count=count-? WHERE name=?');
        $name_list->execute(array($bread[1],$bread[0]));
        $names = $name_list->fetchall(PDO::FETCH_ASSOC);
    }
}
session_unset();
?>
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
    <div class="content">
    <h1>ご注文を受け付けました</h1>
    <p>ありがとうございました<br>またのご利用をお待ち申し上げております</p>
    </div>
    <hr>
    <a class="checkbox" href="index.php">注文画面へ</a>
    <footer>
        <small>Nini's Bakery</small>
     </footer>  
</body>
</html>