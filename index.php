<?php
session_start();

// ログインチェック
if (!isset($_SESSION['user_id']) || !isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
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
        <?php foreach ($tasks as $task): ?>
        <tr>
            <td><input type="checkbox" <?= $task['state'] === '完了' ? 'checked' : '' ?>></td>
            <td><?= htmlspecialchars($task['task_name']) ?></td>
            <td><?= htmlspecialchars($task['due_date']) ?></td>
            <td><?= htmlspecialchars($task['priority']) ?></td>
            <td>
                <a href="edit.php?id=<?= $task['id'] ?>">編集</a>
                <a href="delete.php?id=<?= $task['id'] ?>" onclick="return confirm('本当に削除しますか？');">削除</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>