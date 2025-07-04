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

$stmt = $pdo->prepare("SELECT * FROM todos WHERE user_id = ? ORDER BY due_date ASC");
$stmt->execute([$_SESSION['user_id']]);
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
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            border: 1px solid #ccc;
            text-align: center;
        }
        th {
            background-color: #f4f4f4;
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
            <?php if (count($task) === 0): ?>
                <tr><td colspan="5">タスクがありません</td></tr>
            <?php endif; ?>

            <?php foreach ($task as $t): ?>
            <tr>
                <td>
                    <form action="update_status.php" method="post">
                        <input type="hidden" name="id" value="<?= $t['id'] ?>">
                        <input type="checkbox" name="status" value="done" <?= $t['status'] === 'done' ? 'checked' : '' ?> onchange="this.form.submit();">
                    </form>
                </td>
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