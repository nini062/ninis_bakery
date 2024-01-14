<?php
require('../inc/conn.php');
$db = condb($host,$user,$pass);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>編集確認</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h2>編集確認</h2>

    <?php 
    if($_FILES['path']['error']!=4){
        $file = $_FILES['img_path']; 
        $file_path = $file['name'];
        $ext = substr($file_path, -4);
        if($ext == '.gif' || $ext == '.jpg' || $ext == '.png'){
            $filePath = './user_img/' .$file['name'];
            $success = move_uploaded_file($file['tmp_name'], $filePath);
            if($success){
                $statement = $db->prepare('UPDATE breadlist Set comment=?, img_path=?, kinds=?, price=?, count=? WHERE name=?');
                $statement->execute(array(htmlspecialchars($_POST['comment'], ENT_QUOTES), 
                $file_path, htmlspecialchars($_POST['kinds'], ENT_QUOTES), htmlspecialchars($_POST['price'], ENT_QUOTES), htmlspecialchars($_POST['count'], ENT_QUOTES), htmlspecialchars($_POST['hidden'], ENT_QUOTES)));
                print('<p>商品内容を変更しました</p>');
            }else{
                print('※ファイルアップロードに失敗しました');
            }
        }else{
            print('※拡張子が.gif, .jpg, .pngのいずれかのファイルをアップロードしてください');
        }
    }else{
        $file_path = $_POST['hidden2']; 
        $statement = $db->prepare('UPDATE breadlist Set comment=?, img_path=?, kinds=?, price=?, count=? WHERE name=?');
        $statement->execute(array(htmlspecialchars($_POST['comment'], ENT_QUOTES), 
        $file_path, htmlspecialchars($_POST['kinds'], ENT_QUOTES), htmlspecialchars($_POST['price'], ENT_QUOTES), htmlspecialchars($_POST['count'], ENT_QUOTES), htmlspecialchars($_POST['hidden'], ENT_QUOTES)));
        print('<p>商品内容を変更しました</p>');
    }
    ?>
   <a class="link" href="./">管理用商品一覧へ</a>
</body>
</html>