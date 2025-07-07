<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$pdo = new PDO(
    'mysql:host=mysql320.phy.lolipop.lan;dbname=LAA1554158-todo;charset=utf8',
    'LAA1554158',
    'Pass0620',
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);

// メッセージ用
$message = '';

// --- タスクIDが指定されていなければ戻る
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];

// --- 更新処理（POST）
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $task = trim($_POST['task']);
    $due_date = $_POST['due_date'];
    $priority = $_POST['priority'];
    $status = $_POST['status'];

    $stmt = $pdo->prepare("UPDATE todos SET task = ?, due_date = ?, priority = ?, status = ? WHERE id = ? AND user_id = ?");
    $stmt->execute([$task, $due_date, $priority, $status, $id, $_SESSION['user_id']]);

    $message = "✅ タスクを更新しました！";
}

// --- 現在のデータ取得
$stmt = $pdo->prepare("SELECT * FROM todos WHERE id = ? AND user_id = ?");
$stmt->execute([$id, $_SESSION['user_id']]);
$todo = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$todo) {
    echo "❌ タスクが見つかりません";
    exit;
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>タスク編集</title>
</head>
<body>
    <h2>タスク編集</h2>

    <?php if (!empty($message)): ?>
        <p><?= $message ?></p>
    <?php endif; ?>

    <form action="task_edit.php?id=<?= $todo['id'] ?>" method="post">
        内容: <input type="text" name="task" value="<?= htmlspecialchars($todo['task']) ?>"><br>
        期限: <input type="date" name="due_date" value="<?= htmlspecialchars($todo['due_date']) ?>"><br>
        優先度:
        <select name="priority">
            <option value="1" <?= $todo['priority'] === '1' ? 'selected' : '' ?>>低</option>
            <option value="2" <?= $todo['priority'] === '2' ? 'selected' : '' ?>>中</option>
            <option value="3" <?= $todo['priority'] === '3' ? 'selected' : '' ?>>高</option>
        </select><br>
        状態:
        <select name="status">
            <option value="todo" <?= $todo['status'] === 'todo' ? 'selected' : '' ?>>未完了</option>
            <option value="done" <?= $todo['status'] === 'done' ? 'selected' : '' ?>>完了</option>
        </select><br><br>
        <input type="submit" name="update" value="保存">
        <a href="index.php">キャンセル</a>
    </form>
</body>
</html>
