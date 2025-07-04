<?php
session_start();

// ログインチェック
if (!isset($_SESSION['user_id']) || !isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$pdo = new PDO(
    'mysql:host=mysql320.phy.lolipop.lan;dbname=LAA1554158-todo;charset=utf8',
    'LAA1554158',
    'Pass0620'
);

$stmt = $pdo->query("SELECT * FROM task ORDER BY due_date ASC");
$task = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDoリスト</title>
    <style>
        iframe {
            width: 100%;
            height: 100px;
            border: 2px solid #aaa;
            border-radius: 5px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    
    <h1>ToDoリスト</h1>
    <p><?= htmlspecialchars($_SESSION['username']) ?>さん
        <a href="logout.php">ログアウト</a>
    </p>


    <!-- タスク追加フォーム -->
    <section>
        <iframe src="task_add.php" title="タスク追加"></iframe>
    </section>

    <!-- タスク検索フォーム -->
    <section>
        <iframe src="search.php" title="タスク検索"></iframe>
    </section>

<!-- タスクリスト -->
<table>
    <thead>
        <tr>
            <th>状態</th>
            <th>タスク</th>
            <th>期限</th>
            <th>優先度</th>
            <th>操作</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($task as $t): ?>
        <tr>
            <td><input type="checkbox" <?= $t['status'] === '完了' ? 'checked' : '' ?>></td>
            <td><?= htmlspecialchars($t['task']) ?></td>
            <td><?= htmlspecialchars($t['due_date']) ?></td>
            <td><?= htmlspecialchars($t['priority']) ?></td>
            <td>
                <a href="edit.php?id=<?= $t['id'] ?>">編集</a>
                <a href="delete.php?id=<?= $t['id'] ?>" onclick="return confirm('本当に削除しますか？');">削除</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>