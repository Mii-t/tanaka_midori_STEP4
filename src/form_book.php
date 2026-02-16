<?php

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (!preg_match('/^[ぁ-んァ-ヶ一-龠a-zA-Z\s]+$/u', $_POST['user_name'])) {
        $errors[] = "利用者名は日本語または英字のみで入力してください。";
    }

    if (!preg_match('/^[A-Za-z0-9]{1,10}$/', $_POST['book_code'])) {
        $errors[] = "図書コードは英数字のみで10文字以内にしてください。";
    }

    $period = intval($_POST['rental_days']);
    if ($period < 1 || $period > 30) {
        $errors[] = "貸出期間は1日〜30日の間で入力してください。";
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>図書貸出申請フォーム</title>
    <link rel="stylesheet" href="style_book.css">
</head>
<body>

<div class="container">
    <h1>図書貸出申請フォーム</h1>

    <?php if (!empty($errors)): ?>
        <div class="error-box">
            <?php foreach ($errors as $e): ?>
                <p><?php echo htmlspecialchars($e, ENT_QUOTES, 'UTF-8'); ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <form action="confirm_book.php" method="post">

        <label>利用者名：</label>
        <input type="text" name="user_name"
                value="<?php echo $_POST['user_name'] ?? ''; ?>">

        <label>書籍タイトル：</label>
        <input type="text" name="book_title"
                value="<?php echo $_POST['book_title'] ?? ''; ?>">

        <label>図書コード（例：A1234）：</label>
        <input type="text" name="book_code"
                value="<?php echo $_POST['book_code'] ?? ''; ?>">

        <label>貸出期間（日数）：</label>
        <input type="number" name="rental_days"
                value="<?php echo $_POST['rental_days'] ?? ''; ?>">

        <label>備考（任意）：</label>
        <textarea name="note"><?php echo $_POST['note'] ?? ''; ?></textarea>

        <button type="submit">申請する</button>
    </form>
</div>

</body>
</html>
