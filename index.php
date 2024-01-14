<?php
session_start();
$num = 0;

require('inc/conn.php');
$db = condb($host,$user,$pass);
$name_list = $db->query('SELECT * FROM breadlist WHERE view=1 and count>0');
$names = $name_list->fetchall(PDO::FETCH_ASSOC);
foreach($names as $name){
    if(isset($_POST[$name['e_name']])){
        $_SESSION[$name['e_name']][0] = $name['name'];
        $_SESSION[$name['e_name']][1] = $_POST[$name['e_name']];
        $_SESSION[$name['e_name']][2] = $name['price'];
        $_SESSION['total'][$name['e_name']] = $_SESSION[$name['e_name']];
        //var_dump($_SESSION);
    }else{
        if(isset($_SESSION[$name['e_name']])){

        }else{
            $_SESSION[$name['e_name']][0] = $name['name']; 
            $_SESSION[$name['e_name']][1] = 0;
            $_SESSION['total'][$name['e_name']] = $_SESSION[$name['e_name']];
        }
    }
    $num += $_SESSION[$name['e_name']][1];    
}
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
        <div class="main-img"></div>
        <p>職人が心を込めて焼き上げるバゲット、サクサクのクロワッサン、そして優雅なブール。<br>ここでしか味わえない特別なパンたち。<br>ほんのり香るパンの香りと共に、至福の時間をお過ごしください。</p>
    </section>
    <hr>
    <div id="menu" class="kaikei">
    <small>カートの中身：<?php print($num); ?>点</small>
    <a href="kakunin.php">会計へ</a>
    </div>
    <hr>
    
        <div class="menu-wrap">
        <?php
        foreach($names as $name){
            print("
        <form action='index.php#menu' method='post'>
        <img src='admin/user_img/{$name['img_path']}'>
        <div>
        <p class='bread-name'>{$name['name']}</p><span>{$name['price']}円</span>
        <input type='number' name='{$name['e_name']}' min='0' max='{$name['count']}' value='{$_SESSION[$name['e_name']][1]}'/>
        <input class='submit' type='submit' value='カートに入れる'>
        <p>{$name['comment']}</p>
        </div>         
        </form>
        ");
        }
    ?>
        </div>
    <footer>
        <small>Nini's Bakery</small>
        
    </footer>   
</body>
</html>