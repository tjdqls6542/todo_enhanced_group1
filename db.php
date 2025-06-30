<?php
session_start();

$pdo = new PDO(
    'mysql:host=mysql320.phy.lolipop.lan;dbname=LAA1554158-todo;charset=utf8',
    'LAA1554158',
    'Pass0620'
);

if (isset($_POST['login'])) {
    // ログイン処理
    $sql = $pdo->prepare('SELECT * FROM users WHERE username = ?');
    $sql->execute([$_POST['username']]);
    $user = $sql->fetch();

    if ($user && password_hash($_POST['password'], $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header("Location: index.php");
        exit;
    } else {
        header("Location: login.php?error=1");
        exit;
    }

} elseif (isset($_POST['register'])) {
    // 新規登録処理
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // ユーザー名重複チェック（任意）
    $check = $pdo->prepare('SELECT COUNT(*) FROM users WHERE username = ?');
    $check->execute([$username]);
    if ($check->fetchColumn() > 0) {
        echo "このユーザー名は既に使われています。<br><a href='register.php'>戻る</a>";
        exit;
    }

    $sql = $pdo->prepare('INSERT INTO users (username, password) VALUES (?, ?)');
    $sql->execute([$username, $password]);

    header("Location: login.php");
    exit;
}
?>