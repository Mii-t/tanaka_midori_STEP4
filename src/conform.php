<!DOCTYPE html>
<htmlt lang="ja">
<head>
    <meta charset="UTF-8">
    <title>入力内容確認</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <div class="card">

        <h1>入力内容確認</h1>
        <?php
        if ($_SERVER["REQUEST_METHOD"] === "POST"){

            $name = $_POST["name"];
            $age = $_POST["age"];
            $phone = $_POST["phone"];
            $email = $_POST["email"];
            $address = $_POST["address"];
            $question = $_POST["question"];
            $gender = $_POST["gender"];

            $errors = [];

            // 名前のバリデーション
            if (!preg_match('/^[ぁ-んァ-ヶ一-龥々ーa-zA-Z]+$/u', $name)) {
                $errors[] = "名前はひらがな、カタカナ、漢字、英字のみ使用できます。";
            }

            if (!is_numeric($age) || $age < 0 || $age > 150) {
                $errors[] = "年齢は0から150の間で入力してください。";
            }

            if (!preg_match('/^[0-9-]+$/', $phone)) {
                $errors[] = "電話番号は半角数字とハイフンのみ使用できます。";
            }

            if (!preg_match('/^[\w\.\-]+@[\w\.\-]+\.[a-zA-Z]{2,}$/', $email)) {
                $errors[] = "メールアドレスの形式が正しくありません。";
            }

            if (!preg_match('/^[ぁ-んァ-ヶ一-龥々ーa-zA-Z]+$/u', $address)) {
                $errors[] = "住所はひらがな、カタカナ、漢字、英字のみ使用できます。";
            }

            if ($gender === "") {
                $errors[] = "性別を選択してください。";
            } elseif (!preg_match('/^(男|女)$/', $gender)) {
                $errors[] = "性別は「男性」または「女性」で入力してください。";
            }

            //エラーがある場合
            if (!empty($errors)) {
                foreach ($errors as $e) {
                    echo "<p>{$e}</p>";
                }
                echo '<p><a href="form.php">戻る</a></p>';
                exit;
            }

            //入力内容の表示
            echo "<p>名前:" . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . "</p>";
            echo "<p>年齢:" . htmlspecialchars($age, ENT_QUOTES, 'UTF-8') . "</p>";
            echo "<p>電話番号:" . htmlspecialchars($phone, ENT_QUOTES, 'UTF-8') . "</p>";
            echo "<p>メールアドレス:" . htmlspecialchars($email, ENT_QUOTES, 'UTF-8') . "</p>";
            echo "<p>住所:" . htmlspecialchars($address, ENT_QUOTES, 'UTF-8') . "</p>";
            echo "<p>質問:" . htmlspecialchars($question, ENT_QUOTES, 'UTF-8') . "</p>";
            echo "<p>性別:" . htmlspecialchars($gender, ENT_QUOTES, 'UTF-8') . "</p>";
        }
        ?>
    </div>
</div>

</body>
</html>
