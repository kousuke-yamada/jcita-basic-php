<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<link rel="stylesheet" type="text/css" href="style.css">
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>JCITA-BASIC　質問リスト</title>
</head>

<body>
<?php
include('basic_list.php');
include('basic_func.php');

// データベース接続
$dbh = Connect_Database();
?>


<form method="post" action="basic_ans.php">

<br/>
<p class="nameform">
★氏名を入力して下さい。<br/><input id="namesquare" type="text" name="name">
</p><br/>

<p class="nameform">
★以下の質問に回答して下さい。（※全88問）
</p>

<table border="1" align="center">
<tr>
<th bgcolor="#e3f0fb">番号</th>
<th width="70%" bgcolor="#e3f0fb">質問</th>
<th bgcolor="#ffffc0">回答</th>

<?php
// データベースからデータ検索
$sql = 'SELECT * FROM basic_question WHERE 1';
$stmt = $dbh->prepare($sql);
$stmt->execute();


while(1){

	$rec = $stmt->fetch(PDO::FETCH_ASSOC);
	if($rec == false ){
		break;
	}

	$ansnum = "ans".$rec['number'];
	
	print '<tr>';
	print '<td><strong>'.$rec['number'].'</strong></td>';
	print '<td>'.$rec['contents'].'</td>';
	print '<td>';
	print '<label><input type="radio" name="'.$ansnum.'" value="はい" checked>はい</label>';
	print '<label><input type="radio" name="'.$ansnum.'" value="いいえ">いいえ</label>';
	print '<label><input type="radio" name="'.$ansnum.'" value="どちらともいえない">どちらともいえない</label>';
	print '</td>';
	print '</tr>';
}

?>

</table>
<br/>
<p align="center"><input id="submit_button" type="submit" value="　診断する　"></p>

</form>
<br/><br/><br/><br/><br/>
</body>
</html>
