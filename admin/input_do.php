<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登録確認画面</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
   <h2>登録確認画面</h2>
<p>商品名：<?php print(htmlspecialchars($_POST['name'], ENT_QUOTES)) ?></p>
<p>商品名（英語）：<?php print(htmlspecialchars($_POST['e_name'], ENT_QUOTES)) ?></p>
<p>価格：<?php print(htmlspecialchars($_POST['price'], ENT_QUOTES)) ?></p>
<p>商品説明：<?php print(htmlspecialchars($_POST['comment'], ENT_QUOTES)) ?></p>
<p>表示：<?php 
if(htmlspecialchars($_POST['view'], ENT_QUOTES)=='1'){
    print("表示");
}else{
    print("非表示");
}
?></p>
<p>商品分類：<?php 
if(htmlspecialchars($_POST['kinds'], ENT_QUOTES)=='1'){
    print("プレーン");
}elseif(htmlspecialchars($_POST['kinds'], ENT_QUOTES)=='2'){
    print("サンドウィッチ");
}elseif(htmlspecialchars($_POST['kinds'], ENT_QUOTES)=='3'){
    print("スイーツ");
}
?></p>
<p>在庫数：<?php print(htmlspecialchars($_POST['count'],ENT_QUOTES)) ?></p>

<?php
$file = $_FILES['img_path'];
?>
<!-- <p>ファイル名(name)：<?php print($file['name']); ?></p>
<p>ファイルタイプ(type)：<?php print($file['type']); ?></p>
<p>アップロードされたファイル(tmp_name)：<?php print($file['tmp_name']); ?></p>
<p>エラー内容(error)：<?php print($file['error']); ?></p>
<p>サイズ(size)：<?php print($file['size']); ?></p> -->
<a href="input.php">アップロードページへ戻る</a> 

<?php
$ext = substr($file['name'], -4);
if($ext == '.gif' || $ext == '.jpg' || $ext == '.png'){
    $filePath = './user_img/' .$file['name'];
    $success = move_uploaded_file($file['tmp_name'], $filePath);
    if($success){
        print("<img class='submit' src='{$filePath}'>");
    }else{
        print('※ファイルアップロードに失敗しました');
    }
}else{
    print('※拡張子が.gif, .jpg, .pngのいずれかのファイルをアップロードしてください');
}
   require('../inc/conn.php');
   $db = condb($host,$user,$pass);
   $statement = $db->prepare('INSERT INTO breadlist Set name=?, e_name=?, price=?, comment=?, img_path=?, view=?, kinds=?, count=?, date=NOW()');
   $statement->execute([htmlspecialchars($_POST['name'], ENT_QUOTES),
   htmlspecialchars($_POST['e_name'], ENT_QUOTES), 
   htmlspecialchars($_POST['price'], ENT_QUOTES), 
   htmlspecialchars($_POST['comment'], ENT_QUOTES), 
   htmlspecialchars($file['name'], ENT_QUOTES),
   htmlspecialchars($_POST['view'], ENT_QUOTES),
   htmlspecialchars($_POST['kinds'], ENT_QUOTES), 
   htmlspecialchars($_POST['count'], ENT_QUOTES)]);
?> 

</body>
</html>