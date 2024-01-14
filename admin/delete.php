
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>削除画面</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <main>
        <h2>削除画面</h2>
        <p>商品の削除（非表示）登録を行います</p>
        <?php
        require('../inc/conn.php');
        $db = condb($host,$user,$pass);
        $st = $db->prepare('SELECT * FROM breadlist WHERE name=?');
        $st->execute(array(htmlspecialchars($_POST['hidden'], ENT_QUOTES)));
        $item = $st->fetch(PDO::FETCH_ASSOC); 
        print("<img src=\"user_img/{$item['img_path']}\"><br>");          
        ?>
        <form action="delete_do.php" method="post">
            商品名：<?PHP print(htmlspecialchars($_POST['hidden'], ENT_QUOTES)); ?><br>
            表示：<input type="radio" name="view" value="1" <?php 
            if($item['view']==1){
                print('checked');
            }
            ?>>
            非表示：<input type="radio" name="view" value="0" <?php 
            if($item['view']==0){
                print('checked');
            }
            ?>><br>
            <input type="hidden" name="hidden" value="<?PHP print(htmlspecialchars($_POST['hidden'], ENT_QUOTES)); ?>">
            <button type="submit">登録する</button>
        </form>
        
        <a class="link" href="index.php">一覧へ</a>
    </main>
</body>
</html>