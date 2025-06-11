<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">

    <h1>タスク編集</h1><br>

    内容:<input type="text" name="task_content"><br>
    期限:<input type="date" name="task_deadline"><br>

    優先度:<select name="pr">
<option value="pr1">優先度(低)</option>
<option value="pr2">優先度(中)</option>
<option value="pr3">優先度(高)</option>
</select><br>

状態:<select name="status">
<option value="status1">未完了</option>
<option value="status2">完了</option>
</select><br>

 <button type="submit">保存</button><a href="">キャンセル</a>
 

 </form>

</body>

</html>
