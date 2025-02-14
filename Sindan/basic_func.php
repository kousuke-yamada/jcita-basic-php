<?php
//==================================================================================
// データベースに接続
//==================================================================================
function Connect_Database(){
	$connect = true;
	$host = 'mysql132.phy.lolipop.lan';
	$db_name = 'LAA0930924-tsunku';
	$user = 'LAA0930924';
	$password = 'King8787';
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
	// データベース接続確認表示
	// print $message."<br/>";

	return $dbh;
}
//==================================================================================
// データベースの接続解除
//==================================================================================
function Clear_Database( $dbh ){
	$dbh = null;
}

//==================================================================================
//回答結果から合計得点を計算（引数：対象回答番号、得点配分リスト、回答結果）
//==================================================================================
function Calc_Points_Sum( $varArray, $listArray, $kaito ) {

	$attjyu_sum = 0;		// 点数の合計
	$count = count($varArray);	// 配列の要素数取得
	
	for($i = 0; $i < $count; $i++ ){
		
		// 対象の回答番号を取得
		$num = $varArray[$i];
		
		if( $kaito[$num] == "はい" ){
			$point = $listArray[$num]['はい'];
		}else if( $kaito[$num] == "いいえ" ){
			$point = $listArray[$num]['いいえ'];
		}else if( $kaito[$num] == "どちらともいえない" ){
			$point = $listArray[$num]['どちらともいえない'];
		}else{
			$point = 0;
		}

		 // print "リスト".$num."：";
		 // print $kaito[$num]."　";
		 // print $point."点";
		 // print "<br/>";
		
		$attjyu_sum += $point;
	}

	return $attjyu_sum;
}
//==================================================================================
// レベルの文字色取得
//==================================================================================
function Get_Levelcol( $level ){
	
	$levelcol = "";		// レベルの文字色
	
	if( $level == "A" ){
		$levelcol = "red";
	}else if( $level == "B"){
		$levelcol = "green";
	}else{
		$levelcol = "blue";
	}
	
	return $levelcol;
}

?>
