<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<link rel="stylesheet" type="text/css" href="style.css">
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>JCITA-BASIC　질문 목록</title>
</head>

<body>
<?php
include('basic_list.php');
include('basic_func.php');

// データベース接続
$dbh = Connect_Database();
?>


<form method="post" action="basic_ans_Korea.php">

<br/>
<p class="nameform">
★이름을 입력하십시오.<br/><input id="namesquare" type="text" name="name">
</p><br/>

<p class="nameform">
★다음 질문에 답하십시오.（※전체88개질문）
</p>

<table border="1" align="center">
<tr>
<th bgcolor="#e3f0fb">번호</th>
<th width="70%" bgcolor="#e3f0fb">질문</th>
<th bgcolor="#ffffc0">답변</th>

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
	print '<td>'.$rec['korea'].'</td>';
	print '<td>';
	print '<label><input type="radio" name="'.$ansnum.'" value="はい" checked>네</label>';
	print '<label><input type="radio" name="'.$ansnum.'" value="いいえ">아니오</label>';
	print '<label><input type="radio" name="'.$ansnum.'" value="どちらともいえない">어느 쪽이라고도 말할 수 없다</label>';
	print '</td>';
	print '</tr>';
}

?>

</table>
<br/>
<p align="center"><input id="submit_button" type="submit" value="　진단　"></p>

</form>
<br/><br/><br/><br/><br/>
</body>
</html>
