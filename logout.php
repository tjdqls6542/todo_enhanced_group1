 <?php
session_start();
$_SESSION = array();             // セッション変数を空にする
session_destroy();               // セッションを破棄

// ログインページにリダイレクト
header("Location: login.php");
exit;
?>