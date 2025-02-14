<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>PHP基礎</title>
</head>
<body>

<font color="0000ff">データ受信結果</font>
<?php

$nickname = $_POST['nickname'];
$nickname = htmlspecialchars($nickname);


if($nickname == ''){
	print '入力なし';
}else{
	print $nickname;
}


$connect = true;
$host = 'mysql128.phy.lolipop.lan';
$db_name = 'LAA0930924-m5jau5';
$user = 'LAA0930924';
$password = 'nl8lx0hJ';
$message = '';


try {
	$dbh = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $user, $password);

} catch (PDOException $e) {
  $connect = false;
  exit('Database connection failure ' .$e->getMessage());
  $message .= 'Database connection failure ' .$e->getMessage() .'';
}
if ($connect) {
  $message .= 'Database connection success!';
}

print $message;
$dbh = null;

?>

<br>
<a href="check.php">戻る</a>
　
<a href="dataup.php">結果表示</a>

</body>
</html>
