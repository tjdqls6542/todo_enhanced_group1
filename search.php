<h3>フィルタ/検索</h3>
<form action="index.php" method="get" target="_parent">
    <input type="text" name="task_name_keyword" placeholder="キーワード" value="<?= htmlspecialchars($_GET['task_name_keyword'] ?? '') ?>">

    <select id="state" name="state">
        <option value="" <?= (!isset($_GET['state']) || $_GET['state'] === '') ? 'selected' : '' ?>>すべて</option>
        <option value="done" <?= (isset($_GET['state']) && $_GET['state'] === 'done') ? 'selected' : '' ?>>完了</option>
        <option value="todo" <?= (isset($_GET['state']) && $_GET['state'] === 'todo') ? 'selected' : '' ?>>未完了</option>
    </select>

    <select id="priority" name="priority">
        <option value="" <?= (!isset($_GET['priority']) || $_GET['priority'] === '') ? 'selected' : '' ?>>優先度(すべて)</option>
        <option value="1" <?= (isset($_GET['priority']) && $_GET['priority'] === '1') ? 'selected' : '' ?>>低</option>
        <option value="2" <?= (isset($_GET['priority']) && $_GET['priority'] === '2') ? 'selected' : '' ?>>中</option>
        <option value="3" <?= (isset($_GET['priority']) && $_GET['priority'] === '3') ? 'selected' : '' ?>>高</option>
    </select>

    <input type="submit" name="search" value="適用">
</form>