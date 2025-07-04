<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// DB接続
$pdo = new PDO(
    'mysql:host=mysql320.phy.lolipop.lan;dbname=LAA1554158-todo;charset=utf8',
    'LAA1554158',
    'Pass0620'
);

// チェックがある＝完了、ない＝未完了
$status = isset($_POST['status']) ? 'done' : 'todo';

$stmt = $pdo->prepare("UPDATE todos SET status = ? WHERE id = ? AND user_id = ?");
$stmt->execute([$status, $_POST['id'], $_SESSION['user_id']]);

header("Location: index.php");
exit;