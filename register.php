<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ユーザー登録</title>
</head>
<body>
    <h2>ユーザー登録</h2>

    <form action="db.php" method="post">
        <label>ユーザー名: <input type="text" name="username" required></label><br><br>
        <label>パスワード: <input type="password" name="password" required></label><br><br>
        <input type="submit" name="register" value="登録">
    </form>

    <p><a href="login.php">▶ ログインはこちら</a></p>
</body>
</html>