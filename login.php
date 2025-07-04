<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ログイン</title>
</head>
<body>
    <h2>ログイン</h2>

    <?php if (isset($_GET['error']) && $_GET['error'] == '1'): ?>
        <p style="color:red;">ユーザー名またはパスワードが間違っています。</p>
    <?php endif; ?>

    <form action="db.php" method="post">
        <label>ユーザー名: <input type="text" name="username" value="たろう" required></label><br><br>
        <label>パスワード: <input type="password" name="password" value="aso111" required></label><br><br>
        <input type="submit" name="login" value="ログイン">
    </form>

    <p><a href="register.php">▶ 新規登録</a></p>
</body>
</html>