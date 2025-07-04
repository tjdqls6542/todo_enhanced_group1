<!DOCTYPE html>
 <html lang="ja">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>フィルタ/検索</title>
 </head>
 <body>
    <h3>フィルタ/検索</h3>
        <input type="text" name="task_name_keyword" placeholder="キーワード" required>
 
        <select id="state" name="state">
            <option value="すべて">すべて</option>
            <option value="完了">完了</option>
            <option value="未完了">未完了</option>
        </select>
       
        <select id="priority" name="priority">
            <option value="低">優先度(全て)</option>
            <option value="低">低</option>
            <option value="中">中</option>
            <option value="高">高</option>
        </select>
 
        <input type="submit" name="task_add" value="適用">
       

 </body>
 </html>