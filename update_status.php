<?php
session_start();

// ログインチェック
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    // チェックされていれば 'done'、されていなければ 'todo'
    $status = (isset($_POST['status']) && $_POST['status'] === 'done') ? 'done' : 'todo';

    try {
        $pdo = new PDO(
            'mysql:host=mysql320.phy.lolipop.lan;dbname=LAA1554158-todo;charset=utf8',
            'LAA1554158',
            'Pass0620',
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );

        $stmt = $pdo->prepare("UPDATE todos SET status = ? WHERE id = ? AND user_id = ?");
        $stmt->execute([$status, $id, $_SESSION['user_id']]);

    } catch (PDOException $e) {
        echo "エラー：" . $e->getMessage();
        exit;
    }
}

header("Location: index.php");
exit;