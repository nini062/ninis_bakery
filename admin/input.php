<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登録画面</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <main>
        <h2>登録画面</h2>
        <p>商品の登録を行います。すぺて必須項目です。</p>
        <form action="input_do.php" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <th>商品名</th>
                    <td><input type="text" name="name" required></td>
                </tr>
                <tr>
                    <th>商品名（英語）</th>
                    <td><input type="text" name="e_name" required></td>
                </tr>
                <tr>
                    <th>価格</th>
                    <td><input type="text" name="price" required></td>
                </tr>
                <tr>
                    <th>商品説明</th>
                    <td><textarea name="comment" cols="50" rows="10" required></textarea></td>
                </tr>
                <tr>
                    <th> 画像写真</th>
                    <td><input type="file" name="img_path" required></td>
                </tr>
                <tr>
                    <th>表示・非表示</th>
                    <td>
                    <label for="">表示：<input type="radio" name="view" value="1"></label>
                    <label for="">非表示：<input type="radio" name="view" value="0"></label>
                    </td>
                </tr>
                <tr>
                    <th>商品分類</th>
                    <td>
                    <label for="">プレーン：<input type="radio" name="kinds" value="1"></label>
                    <label for="">サンドウィッチ：<input type="radio" name="kinds" value="2"></label>
                    <label for="">スイーツ：<input type="radio" name="kinds" value="3"></label>
                    </td>
                </tr>
                <tr>
                    <th>在庫数</th>
                    <td><input type="text" name="count" required></td>
                </tr>
            </table>
            <button type="submit">登録する</button>
        </form>
        <a class="link" href="index.php">一覧へ</a>
    </main>
</body>
</html>