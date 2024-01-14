<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理用商品一覧</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <main>
        <h2>管理用商品一覧</h2>
        <a class="admin-button" href="input.php">商品登録画面へ</a>
        <a class="admin-button" href="../">店舗トップページへ</a>
        <?php
            require('../inc/conn.php');
            $db = condb($host,$user,$pass);
            $items = $db->query('SELECT * FROM breadlist ORDER BY id');
            while($item = $items->fetch(PDO::FETCH_ASSOC)){
            print("<h3>{$item['name']}</h3>");
            print(mb_substr($item['comment'],0,100));
            print("<div class=\"admin-index-wrap\"><p>価格：{$item['price']}円</P><p>商品数：{$item['count']}</P><p>種類：");
            if($item['kinds']==1){
                print('プレーン</P><p>');
            }elseif($item['kinds']==2){
                print("サンドウィッチ</P><p>");
            }elseif($item['kinds']==3){
                print("スイーツ</P><p>");
            }
            if($item['view']==1){
                print('表示中');
            }else{
                print("非表示中");
            }           
            print(<<<_HTML_
            </p>
            <form action="edit.php" method="post">
            <input type="hidden" name="hidden" value="$item[name]">
            <input type="submit" value="編集">
            </form>
            <form action="delete.php" method="post">
            <input type="hidden" name="hidden" value="$item[name]">
            <input type="submit" value="表示・非表示">
            </form>
            </div>              
            <hr>
            _HTML_);
            }
        ?>

    </main>
</body>
</html>