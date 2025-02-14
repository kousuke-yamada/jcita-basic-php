<?php
$connect = true;
$host = 'localhost';
$db_name = 'phpkiso';
$user = 'root';
$password = '';
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


//$sql = 'INSERT INTO anketo (nickname, email, goiken) VALUES ("dddd","aaaaa","ddga")';
//$stmt = $dbh->prepare($sql);
//$stmt->execute();

}
//$dbh = null;
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>PHP基礎</title>
</head>
<body>

<font color="0000ff">検索結果</font>
<?php

$code = $_POST['code'];
$code = htmlspecialchars($code);


if($code == ''){
	print '入力なし';
}else{
	// print $nickname;
}

// データベースからデータ検索
//$sql = 'INSERT INTO anketo (nickname, email, goiken) VALUES ("'.$nickname.'","aaaaa","ddga")';

$sql = 'SELECT * FROM anketo WHERE code=?';
$stmt = $dbh->prepare($sql);
$data[] = $code;
$stmt->execute($data);

while(1){

	$rec = $stmt->fetch(PDO::FETCH_ASSOC);
	if($rec == false ){
		break;
	}

	print $rec['code'];
	print $rec['nickname'];
	print $rec['email'];
	print $rec['goiken'];
	print '<br/>';
}
$dbh = null;

?>

<br>
<a href="check.php">戻る</a>
　
<a href="dataup.php">結果表示</a>

</body>
</html>
