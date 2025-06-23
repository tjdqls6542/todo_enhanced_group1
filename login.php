<?php session_start(); ?>
<?php //前のlogin.phpと一緒?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ログイン</title>
</head>
<body>
    <h2>ログイン</h2>

    <?php if (isset($_GET['error']) && $_GET['error'] == '1'): ?>
        <p>ユーザー名またはパスワードが間違っています。</p>
    <?php endif; ?>

    <form action="db.php" method="post">
        <label>ユーザー名: <input type="text" name="username" value="たろう"></label><br><br>
        <label>パスワード: <input type="password" name="password" value="aso111"></label><br><br>
        <input type="submit" name="login" value="ログイン">

        <p><a href="register.php">▶ 新規登録</a></p>
    </form>
</body>
</html>