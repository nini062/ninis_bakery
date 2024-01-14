<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>編集画面</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <main>
        <h2>編集画面</h2>
        <p>商品の編集を行います</p>
        <?php
        require('../inc/conn.php');
        $db = condb($host,$user,$pass);
        $st = $db->prepare('SELECT * FROM breadlist WHERE name=?');
        $st->execute(array(htmlspecialchars($_POST['hidden'], ENT_QUOTES)));
        $item = $st->fetch(PDO::FETCH_ASSOC);        
        ?>
        <form action="edit_do.php" method="post" enctype="multipart/form-data">
            商品名：<?PHP print((htmlspecialchars($_POST['hidden'], ENT_QUOTES))); ?><br>
            商品説明：<textarea name="comment" cols="50" rows="10"><?PHP print($item['comment']); ?></textarea><br>
            画像写真：<input type="file" name="path"><br>
            <img src="user_img/<?PHP print($item['img_path']); ?>" alt=""><br>
            種類：プレーン：<input type="radio" name="kinds" value="1" <?php 
            if($item['kinds']==1){
                print('checked');
            }
            ?>>
            サンドウィッチ：<input type="radio" name="kinds" value="2" <?php 
            if($item['kinds']==2){
                print('checked');
            }
            ?>>
            スイーツ：<input type="radio" name="kinds" value="3" <?php 
            if($item['kinds']==3){
                print('checked');
            }
            ?>><br>
            価格：<input type="text" name="price" value="<?PHP print($item['price']); ?>"><br>
            在庫数：<input type="text" name="count" value="<?PHP print($item['count']); ?>"><br>
            <input type="hidden" name="hidden" value="<?PHP print((htmlspecialchars($_POST['hidden'], ENT_QUOTES))); ?>">
            <input type="hidden" name="hidden2" value="<?PHP print($item['img_path']); ?>">
            <button type="submit">登録する</button>
        </form>
        
        <a class="link" href="index.php">一覧へ</a>
    </main>
</body>
</html>