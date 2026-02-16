<!DOCTYPE html>
<htmlt lang="ja">
<head>
    <meta charset="UTF-8">
    <title>申請内容の確認</title>
    <link rel="stylesheet" href="style_confirm.css">
</head>
<body>

<div class="container">
    <h1>申請内容の確認</h1>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST'):

        $user_name    = htmlspecialchars($_POST['user_name'], ENT_QUOTES, 'UTF-8');
        $book_title   = htmlspecialchars($_POST['book_title'], ENT_QUOTES, 'UTF-8');
        $book_code    = htmlspecialchars($_POST['book_code'], ENT_QUOTES, 'UTF-8');
        $rental_days  = htmlspecialchars($_POST['rental_days'], ENT_QUOTES, 'UTF-8');
        $note         = nl2br(htmlspecialchars($_POST['note'], ENT_QUOTES, 'UTF-8'));

    ?>

        <p>利用者名：<?= $user_name ?></p>
        <p>書籍タイトル：<?= $book_title ?></p>
        <p>図書コード：<?= $book_code ?></p>
        <p>貸出期間：<?= $rental_days ?>日</p>
        <p>備考：<?= $note ?></p>

        <form action="form_book.php" method="post">
            <button type="submit">戻る</button>
        </form>

    <?php else: ?>

        <p>データが送信されていません。</p>

    <?php endif; ?>

</div>

</body>
</htmlt
