<?php
session_start();

// ログインチェック
if (!isset($_SESSION['user_id'])) {
    echo "ログインしてください。";
    exit;
}

// メッセージ初期化
$message = "";

// フォームが送信されたときの処理
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['task_add'])) {
    $task_name = trim($_POST['task_name']);
    $due_date = $_POST['due_date'];
    $priority = $_POST['priority'] !== '' ? $_POST['priority'] : '中';

    try {
        // DB接続
        $pdo = new PDO(
            'mysql:host=mysql320.phy.lolipop.lan;dbname=LAA1554158-todo;charset=utf8',
            'LAA1554158',
            'Pass0620',
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );

        // データ追加（INSERT）
        $stmt = $pdo->prepare("INSERT INTO todos (user_id, task, due_date, priority, status) VALUES (?, ?, ?, ?, '未完了')");
        $stmt->execute([
            $_SESSION['user_id'],
            $task_name,
            $due_date,
            $priority
        ]);

        $message = "✅ タスクを追加しました！";

    } catch (PDOException $e) {
        $message = "❌ エラー: " . htmlspecialchars($e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>タスク追加</title>
</head>
<body>
    <h3>タスク追加</h3> 

    <?php if (!empty($message)): ?>
        <p><?= $message ?></p>
    <?php endif; ?>

    <form action="task_add.php" method="post">
        <input type="text" name="task_name" placeholder="タスク内容" required>
        <input type="date" name="due_date" required>
        <select name="priority">
            <option value="">優先度(全て)</option>
            <option value="低">低</option>
            <option value="中">中</option>
            <option value="高">高</option>
        </select>
        <input type="submit" name="task_add" value="追加">
    </form>
</body>
</html>