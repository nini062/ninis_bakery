<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>表示・非表示登録確認画面</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
   <h2>表示・非表示登録確認画面</h2>
<p>商品タイトル：<?php print($_POST['hidden']) ?></p>
<p>表示：<?php 
if($_POST['view']=='1'){
    print("表示");
}else{
    print("非表示");
}
?></p>
<?php
   require('../inc/conn.php');
   $db = condb($host,$user,$pass);
   $statement = $db->prepare('UPDATE breadlist Set view=? WHERE name=?');
   $statement->execute([htmlspecialchars($_POST['view'], ENT_QUOTES), htmlspecialchars($_POST['hidden'], ENT_QUOTES)]);
?> 
<p><?php 
if(htmlspecialchars($_POST['view'], ENT_QUOTES)=='1'){
    print("表示");
}else{
    print("非表示");
}
?>にしました</p>
<a class="link" href="index.php">戻る</a>
</body>
</html>