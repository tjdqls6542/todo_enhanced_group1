<?php
session_start();

$pdo = new PDO(
    'mysql:host=mysql320.phy.lolipop.lan;dbname=LAA1554158-todo;charset=utf8',
    'LAA1554158',
    'Pass0620'
);

if(isset($_POST['login'])){
    $sql = $pdo->prepare('SELECT * FROM users WHERE username = ? AND password = ?');
    $sql->execute([$_POST['username'], $_POST['password']]);

    $user = $sql->fetch(); // 一行だけ取得

        if ($user) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username']; // ログイン状態を保持したい場合
            header("Location: form.php");
            exit;
        } else {
            header("Location: login.php?error=1");
            exit;
        }

} else if(isset($_POST['register'])){
    $sql = $pdo->prepare('INSERT INTO users (username, password) VALUES (?, ?)');
    $sql->execute([$_POST['username'], $_POST['password']]);
    
    header("Location: register.php");
    exit;
}
?>