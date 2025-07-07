<?php
session_start();

// ログインチェック
if (!isset($_SESSION['user_id']) || !isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// IDが指定されていない場合
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$taskId = $_GET['id'];

$pdo = new PDO(
    'mysql:host=mysql320.phy.lolipop.lan;dbname=LAA1554158-todo;charset=utf8',
    'LAA1554158',
    'Pass0620'
);

// ユーザー本人のタスクかどうか確認してから削除
$stmt = $pdo->prepare("DELETE FROM todos WHERE id = ? AND user_id = ?");
$stmt->execute([$taskId, $_SESSION['user_id']]);

// リダイレクト
header("Location: index.php");
exit;
?>