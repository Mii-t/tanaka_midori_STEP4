<!DOCTYPE html>
<html lang="ja">
<head>
      <meta charset="UTF-8">
      <title>データ移動サンプル</title>
</head>
<body>
    <h1>名前を入力してください</h1>
    <from action="display.php" method="post">
        <label for="name">名前:</label>
        <input type="text" id="name" name="name" required>
        <button type="submit">送信</button>
    </from>
</body>
</html>
