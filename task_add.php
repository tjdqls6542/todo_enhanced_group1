<!DOCTYPE html>
 <html lang="ja">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
 </head>
 <body>
    <h3>タスク追加</h3> 
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
 </body>
 </html>