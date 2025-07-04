<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDoリスト</title>
</head>
<body>
    <h1>ToDoリスト</h1><br><br>
 
    <!-- タスク追加フォーム -->
    <section>
        <form action="task_add.php" method="post">
            <input type="text" name="task_name" placeholder="タスク内容" required>

            <!-- 日付入力（締切日など） -->
            <input type="date" name="due_date" required>

            <select name="priority">
                <option value="">優先度(全て)</option>
                <option value="低">低</option>
                <option value="中">中</option>
                <option value="高">高</option>
            </select>

            <input type="submit" name="task_add" value="追加">
        </form>
    </section>

    <!-- タスク検索フォーム -->
    <section>
        <form action="task_search.php" method="get">
            <input type="text" name="task_name_keyword" placeholder="キーワード">

            <select name="state">
                <option value="すべて">状態(すべて)</option>
                <option value="完了">完了</option>
                <option value="未完了">未完了</option>
            </select>

            <select name="priority">
                <option value="">優先度(全て)</option>
                <option value="低">低</option>
                <option value="中">中</option>
                <option value="高">高</option>
            </select>

            <input type="submit" name="task_search" value="適用">
        </form>
    </section>
</body>
</html>