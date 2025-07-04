<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDoリスト</title>
    <style>
        iframe {
            width: 100%;
            height: 200px;
            border: 2px solid #aaa;
            border-radius: 5px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h1>ToDoリスト</h1>

    <!-- タスク追加フォーム -->
    <section>
        <h2>タスク追加</h2>
        <iframe src="task_add.php" title="タスク追加"></iframe>
    </section>

    <!-- タスク検索フォーム -->
    <section>
        <h2>タスク検索</h2>
        <iframe src="search.php" title="タスク検索"></iframe>
    </section>
</body>
</html>