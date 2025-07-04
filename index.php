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

<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>タスク内容</th>
            <th>状態</th>
            <th>優先度</th>
            <th>期限</th>
            <th>操作</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>買い物に行く</td>
            <td>未完了</td>
            <td>高</td>
            <td>2025-07-10</td>
            <td>
                <button>完了にする</button>
                <button>削除</button>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>レポート提出</td>
            <td>完了</td>
            <td>中</td>
            <td>2025-07-05</td>
            <td>
                <button disabled>完了</button>
                <button>削除</button>
            </td>
        </tr>
        <!-- ここにPHPで繰り返し表示していく -->
    </tbody>
</table>

</body>
</html>