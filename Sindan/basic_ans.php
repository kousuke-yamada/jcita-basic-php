<?php
include('basic_list.php');
include('basic_func.php');


$kaito = array();
$kaito[0] = 0;
$num = 0;

// 回答結果を配列に保存
for($i = 1; $i <= 88; $i++){

	$ans = $_POST['ans'.$i];
	
	array_push($kaito, $ans);
	//$kaito[$i] = $ans;
	//print $kaito[$i];
	//print "<br/>";
}

// 合計点
$attjyu_sum = Calc_Points_Sum( $attjyu_no, $attjyu_list, $kaito );	// 充実性
$orakai_sum = Calc_Points_Sum( $orakai_no, $orakai_list, $kaito );	// 会話性
$frikor_sum = Calc_Points_Sum( $frikor_no, $frikor_list, $kaito );	// 交流性
$conkou_sum = Calc_Points_Sum( $conkou_no, $conkou_list, $kaito );	// 幸福性
$exphyo_sum = Calc_Points_Sum( $exphyo_no, $exphyo_list, $kaito );	// 表出性
$empkyo_sum = Calc_Points_Sum( $empkyo_no, $empkyo_list, $kaito );	// 共感性
$estson_sum = Calc_Points_Sum( $estson_no, $estson_list, $kaito );	// 尊重性
$haryuu_sum = Calc_Points_Sum( $haryuu_no, $haryuu_list, $kaito );	// 融和性
$diskaj_sum = Calc_Points_Sum( $diskaj_no, $diskaj_list, $kaito );	// 開示性
$cresou_sum = Calc_Points_Sum( $cresou_no, $cresou_list, $kaito );	// 創造性
$indjir_sum = Calc_Points_Sum( $indjir_no, $indjir_list, $kaito );	// 自立性
$perkan_sum = Calc_Points_Sum( $perkan_no, $perkan_list, $kaito );	// 感受性

// 合計点：表示用
$attjyu_sumdisp = $attjyu_sum * 3;	// 充実性
$orakai_sumdisp = $orakai_sum * 3;	// 会話性
$frikor_sumdisp = $frikor_sum * 3;	// 交流性
$conkou_sumdisp = $conkou_sum * 3;	// 幸福性
$exphyo_sumdisp = $exphyo_sum * 3;	// 表出性
$empkyo_sumdisp = $empkyo_sum * 3;	// 共感性
$estson_sumdisp = $estson_sum * 3;	// 尊重性
$haryuu_sumdisp = $haryuu_sum * 3;	// 融和性
$diskaj_sumdisp = $diskaj_sum * 3;	// 開示性
$cresou_sumdisp = $cresou_sum * 3;	// 創造性
$indjir_sumdisp = $indjir_sum * 3;	// 自立性
$perkan_sumdisp = $perkan_sum * 3;	// 感受性

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<link rel="stylesheet" type="text/css" href="style.css">
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>JCITA-BASIC　診断結果</title>

<!--[if IE]><script type="text/javascript" src="html5jp/excanvas/excanvas.js"></script><![endif]-->
<script type="text/javascript" src="html5jp/graph/radar.js"></script>
<script type="text/javascript">

window.onload = function() {

  var attjyu = Number( '<?php echo $attjyu_sumdisp; ?>' );	// 充実性
  var orakai = Number( '<?php echo $orakai_sumdisp; ?>' );	// 会話性
  var frikor = Number( '<?php echo $frikor_sumdisp; ?>' );	// 交流性
  var conkou = Number( '<?php echo $conkou_sumdisp; ?>' );	// 幸福性
  var exphyo = Number( '<?php echo $exphyo_sumdisp; ?>' );	// 表出性
  var empkyo = Number( '<?php echo $empkyo_sumdisp; ?>' );	// 共感性
  var estson = Number( '<?php echo $estson_sumdisp; ?>' );	// 尊重性
  var haryuu = Number( '<?php echo $haryuu_sumdisp; ?>' );	// 融和性
  var diskaj = Number( '<?php echo $diskaj_sumdisp; ?>' );	// 開示性
  var cresou = Number( '<?php echo $cresou_sumdisp; ?>' );	// 創造性
  var indjir = Number( '<?php echo $indjir_sumdisp; ?>' );	// 自立性
  var perkan = Number( '<?php echo $perkan_sumdisp; ?>' );	// 感受性


  var rc = new html5jp.graph.radar("sample");
  if( ! rc ) { return; }
  var items = [
    ["分析結果", attjyu, orakai, frikor, conkou, exphyo, empkyo, estson, haryuu, diskaj, cresou, indjir, perkan],
//    ["商品B", 3, 4, 3, 4, 5, 4, 5, 1, 4,2,2,2] 
  ];


  var params = {
        aCap: ["充実性", "会話性", "交流性", "幸福性", "表出性", "共感性", "尊重性", "融和性","開示性","創造性","自立性","感受性"],
 	aMax: 84,
  	aMin: 0,
	faceColors: ["red", "yellow"],
	aLinePositions: [0,46,84],
  }
  rc.draw(items, params);
};
</script>

<script type="text/javascript">
window.onbeforeunload = function(e) {
    return 'ちょっと待ってくださいよ。まだダメですよ。';
};

</script>

</head>

<body>

<p>
<div class ="shadow"><font size = "6pt"; color="#0000ff";>Japan Communication Ability Association WAT BASIC</font></div><br/>
<div class="border"><font size = "14pt"; >＊＊＊診断結果＊＊＊</font></div>
</p>

<div class="box11">
<?php
$respondent = $_POST['name'];	// 回答者

print " 名前：";
print $respondent." 様";
print "</div><br/>";
?>

<div class="sample-box-13" style=" content: 'gets';">




<div class="media">
    <div class="media__image">
        <canvas width="400" height="400" id="sample"></canvas>
    </div>
    <div class="media__summary">
        <h2 class="media__heading">[レーダーチャート]</h2>
        <p class="media__text">
<?php
	// 合計点
	print "<b>　　充実性</b>：".$attjyu_sumdisp;	// 充実性
	print "　　<b>会話性</b>：".$orakai_sumdisp;	// 会話性
	print "　　<b>交流性</b>：".$frikor_sumdisp;	// 交流性
	print "<br/><br/>";
	
	print "　　<b>幸福性</b>：".$conkou_sumdisp;	// 幸福性
	print "　　<b>表出性</b>：".$exphyo_sumdisp;	// 表出性
	print "　　<b>共感性</b>：".$empkyo_sumdisp;	// 共感性
	print "<br/><br/>";

	print "　　<b>尊重性</b>：".$estson_sumdisp;	// 尊重性
	print "　　<b>融和性</b>：".$haryuu_sumdisp;	// 融和性
	print "　　<b>開示性</b>：".$diskaj_sumdisp;	// 開示性
	print "<br/><br/>";
	
	print "　　<b>創造性</b>：".$cresou_sumdisp;	// 創造性
	print "　　<b>自立性</b>：".$indjir_sumdisp;	// 自立性
	print "　　<b>感受性</b>：".$perkan_sumdisp;	// 感受性
?>

	</p>
    </div>
</div>

</div>



<?php

// データベース接続
$dbh = Connect_Database("basic");

//==================================================================================
//****** 充実性 ******
//==================================================================================
// 表題
print '<div class="kokuban-t2"><span class="title-t2">【充実性】</span>';
//print '<font size="5px"; color="ff0000";>【充実性】</font> ';

// データベースからデータ検索
$sql = 'SELECT * FROM 充実性 WHERE 1';
$stmt = $dbh->prepare($sql);
$stmt->execute();

print '<b>[尺度の解説]</b><br/> ';
print '現在の自分に充実感・達成感を感じているかどうか？　  充実感・達成感が高い場合、現在の自分に自信があり何事に対しても積極的に関わり前に進めていこうという意欲に溢れてコミュニケーションが豊かになる。充実感・達成感が低い場合、自分に自信がなく何に対しても消極的。';
print '<br/><br/>';

while(1){

	$rec = $stmt->fetch(PDO::FETCH_ASSOC);
	if($rec == false ){
		break;
	}

	if(( $attjyu_sum >= $rec['Min'] ) && ( $attjyu_sum <= $rec['Max'] )){
		
		print '<b>[あなたの解説]</b><br/> ';
		print '</b></font>⇒ ';
		print $rec['Commentary'];
		//print '</p></div>';
		print '</div>';
		
		break;
	}else{
		// 何もしない
	}
}

//==================================================================================
//****** 会話性 ******
//==================================================================================
// 表題
print '<div class="kokuban-t3"><span class="title-t3">【会話性】</span>';
//print '<font size="5px"; color="ff0000";>【会話性】</font><br/> ';

// データベースからデータ検索
$sql = 'SELECT * FROM 会話性 WHERE 1';
$stmt = $dbh->prepare($sql);
$stmt->execute();

print '<b>[尺度の解説]</b><br/> ';
print '普段の何気ない会話をする意欲がどれほどあるかを見るもの。
会話性が高い場合、何気ない会話をすることを楽しいと感じるために、会話の量が多くなりコミュニケーションも多くなる。会話性が低い場合、何気ない会話を苦手と感じていて必要なこと以外はなさない。そのために会話の量が少なくなる。';
print '<br/><br/>';

while(1){

	$rec = $stmt->fetch(PDO::FETCH_ASSOC);
	if($rec == false ){
		break;
	}

	if(( $orakai_sum >= $rec['Min'] ) && ( $orakai_sum <= $rec['Max'] )){
		
		print '<b>[あなたの解説]</b><br/> ';
		print '</b></font>⇒ ';
		print $rec['Commentary'];
		print '</div>';
		
		break;
	}else{
		// 何もしない
	}
}

//==================================================================================
//****** 交流性 ******
//==================================================================================
// 表題
print '<div class="kokuban-t4"><span class="title-t4">【交流性】</span>';
//print '<font size="5px"; color="ff0000";>【交流性】</font><br/> ';

// データベースからデータ検索
$sql = 'SELECT * FROM 交流性 WHERE 1';
$stmt = $dbh->prepare($sql);
$stmt->execute();

print '<b>[尺度の解説]</b><br/> ';
print '他人と一緒にいることを楽しいと感じるか、苦痛と感じるかを見るもの。
交流性が高い場合、大勢でいることを楽しいと感じ多くの人と一緒にいたいと思う。そのためにコミュニケーションがとても活発なものになる。交流性が低い場合、他人と一緒にいることを苦痛と感じるので多くの人と一緒にいるだけで疲れてしまう、そのために一人でいることを好むようになりコミュニケーションも極端に少なくなる。';
print '<br/><br/>';

while(1){

	$rec = $stmt->fetch(PDO::FETCH_ASSOC);
	if($rec == false ){
		break;
	}

	if(( $frikor_sum >= $rec['Min'] ) && ( $frikor_sum <= $rec['Max'] )){
		
		print '<b>[あなたの解説]</b><br/> ';
		print '</b></font>⇒ ';
		print $rec['Commentary'];
		print '</div>';
		
		break;
	}else{
		// 何もしない
	}
}

//==================================================================================
//****** 幸福性 ******
//==================================================================================
// 表題
print '<div class="kokuban-t1"><span class="title-t1">【幸福性】</span>';
//print '<font size="5px"; color="ff0000";>【幸福性】</font><br/> ';

// データベースからデータ検索
$sql = 'SELECT * FROM 幸福性 WHERE 1';
$stmt = $dbh->prepare($sql);
$stmt->execute();

print '<b>[尺度の解説]</b><br/> ';
print '基本的信頼感が豊かであるかどうかをみるもの。
幸福性が高い場合、自分に対しても世界全体に対しても肯定的に捉える気持ちが強く全てを前向きに受け止めて前進させていこうという意欲に溢れている。そのために対人関係は円満になりコミュニケーションも活発になる。
幸福性が低い場合、否定的な見方が多くなり悲観的に考えたり批判的に見ることが多くなりそのために対人関係は緊張感の高いものになりコミュニケーションも素直でないものになる。
。';
print '<br/><br/>';

while(1){

	$rec = $stmt->fetch(PDO::FETCH_ASSOC);
	if($rec == false ){
		break;
	}

	if(( $conkou_sum >= $rec['Min'] ) && ( $conkou_sum <= $rec['Max'] )){
		
		print '<b>[あなたの解説]</b><br/> ';
		print '</b></font>⇒ ';
		print $rec['Commentary'];
		print '</div>';
		
		break;
	}else{
		// 何もしない
	}
}

//==================================================================================
//****** 表出性 ******
//==================================================================================
// 表題
print '<div class="kokuban-t2"><span class="title-t2">【表出性】</span>';
//print '<font size="5px"; color="ff0000";>【表出性】</font><br/> ';

// データベースからデータ検索
$sql = 'SELECT * FROM 表出性 WHERE 1';
$stmt = $dbh->prepare($sql);
$stmt->execute();

print '<b>[尺度の解説]</b><br/> ';
print '感情表現が豊かであるかどうかをみるもの。
表出性が高い場合、感情表現が豊かでとても親しみやすい印象なのでコミュニケーションが取りやすい。表出性が低い場合、理性的な会話が多くなるために親しみやすさは少なくなるがしっかりとした議論が出来るようになる。';
print '<br/><br/>';

while(1){

	$rec = $stmt->fetch(PDO::FETCH_ASSOC);
	if($rec == false ){
		break;
	}

	if(( $exphyo_sum >= $rec['Min'] ) && ( $exphyo_sum <= $rec['Max'] )){
		
		print '<b>[あなたの解説]</b><br/> ';
		print '</b></font>⇒ ';
		print $rec['Commentary'];
		print '</div>';
		
		break;
	}else{
		// 何もしない
	}
}

//==================================================================================
//****** 共感性 ******
//==================================================================================
// 表題
print '<div class="kokuban-t3"><span class="title-t3">【共感性】</span>';
//print '<font size="5px"; color="ff0000";>【共感性】</font><br/> ';

// データベースからデータ検索
$sql = 'SELECT * FROM 共感性 WHERE 1';
$stmt = $dbh->prepare($sql);
$stmt->execute();

print '<b>[尺度の解説]</b><br/> ';
print '他人の感情を十分に受け止めることができるかどうかをみるもの。
共感性が高い場合、他人の感情を素直に受け止めることができるので心の繋がりを深めることが容易にできる。共感性が低い場合、他人の感情を受け止めることができないために心の繋がりを作りにくく独りよがりという印象を持たれることが多くなる。';
print '<br/><br/>';

while(1){

	$rec = $stmt->fetch(PDO::FETCH_ASSOC);
	if($rec == false ){
		break;
	}

	if(( $empkyo_sum >= $rec['Min'] ) && ( $empkyo_sum <= $rec['Max'] )){
		
		print '<b>[あなたの解説]</b><br/> ';
		print '</b></font>⇒ ';
		print $rec['Commentary'];
		print '</div>';
		
		break;
	}else{
		// 何もしない
	}
}

//==================================================================================
//****** 尊重性 ******
//==================================================================================
// 表題
print '<div class="kokuban-t4"><span class="title-t4">【尊重性】</span>';
//print '<font size="5px"; color="ff0000";>【尊重性】</font><br/> ';

// データベースからデータ検索
$sql = 'SELECT * FROM 尊重性 WHERE 1';
$stmt = $dbh->prepare($sql);
$stmt->execute();

print '<b>[尺度の解説]</b><br/> ';
print '自分とは違う他人の行動に対して他人の立場を尊重してその行動を受け入れることができるかどうかをみるもの。尊重性が高い場合、他人の行動や仕事の仕方を見てもその人にはその人のやり方があると尊重して受け入れることができる。そのために対人関係は円満となり心の繋がりを深めやすい。尊重性が低い場合、自分の想いが優先して他人の行動を自分の基準に合わせようとする、そのために押しつけがましいと思われることが多くなり対人関係は緊張感の高いものとなる。';
print '<br/><br/>';

while(1){

	$rec = $stmt->fetch(PDO::FETCH_ASSOC);
	if($rec == false ){
		break;
	}

	if(( $estson_sum >= $rec['Min'] ) && ( $estson_sum <= $rec['Max'] )){
		
		print '<b>[あなたの解説]</b><br/> ';
		print '</b></font>⇒ ';
		print $rec['Commentary'];
		print '</div>';
		
		break;
	}else{
		// 何もしない
	}
}

//==================================================================================
//****** 融和性 ******
//==================================================================================
// 表題
print '<div class="kokuban-t1"><span class="title-t1">【融和性】</span>';
//print '<font size="5px"; color="ff0000";>【融和性】</font><br/> ';

// データベースからデータ検索
$sql = 'SELECT * FROM 融和性 WHERE 1';
$stmt = $dbh->prepare($sql);
$stmt->execute();

print '<b>[尺度の解説]</b><br/> ';
print '自分の生活文化を他人と融合する時にストレスを感じるかどうかをみるもの。
融和性が高い場合、生活の中に新しいものを取り入れるのが好きで他人の文化と融合することが容易なのでコミュニケーションが深めやすい。
融和性が低い場合、自分の生活に他人が近づいたり深く入ってくることに強いストレスを感じるためにコミュニケーションを深めにくくなる。';
print '<br/><br/>';

while(1){

	$rec = $stmt->fetch(PDO::FETCH_ASSOC);
	if($rec == false ){
		break;
	}

	if(( $haryuu_sum >= $rec['Min'] ) && ( $haryuu_sum <= $rec['Max'] )){
		
		print '<b>[あなたの解説]</b><br/> ';
		print '</b></font>⇒ ';
		print $rec['Commentary'];
		print '</div>';
		
		break;
	}else{
		// 何もしない
	}
}

//==================================================================================
//****** 開示性 ******
//==================================================================================
// 表題
print '<div class="kokuban-t2"><span class="title-t2">【開示性】</span>';
//print '<font size="5px"; color="ff0000";>【開示性】</font><br/> ';

// データベースからデータ検索
$sql = 'SELECT * FROM 開示性 WHERE 1';
$stmt = $dbh->prepare($sql);
$stmt->execute();

print '<b>[尺度の解説]</b><br/> ';
print '個人の内面を表に出すことにストレスを感じるかどうかをみるもの。
開示性が高い場合、個人のプライベートな情報を開示することにストレスがなくとても開放的な人となる。そのためにコミュニケーションを深めることが容易にできる。開示性が低い場合、プライベートな情報を開示することに強いストレスを感じるため秘密主義の人という印象になるそのため簡単には近づけない感じとなりコミュニケーションを深めにくい。';
print '<br/><br/>';

while(1){

	$rec = $stmt->fetch(PDO::FETCH_ASSOC);
	if($rec == false ){
		break;
	}

	if(( $diskaj_sum >= $rec['Min'] ) && ( $diskaj_sum <= $rec['Max'] )){
		
		print '<b>[あなたの解説]</b><br/> ';
		print '</b></font><br/>⇒ ';
		print $rec['Commentary'];
		print '</div>';
		
		break;
	}else{
		// 何もしない
	}
}

//==================================================================================
//****** 創造性 ******
//==================================================================================
// 表題
print '<div class="kokuban-t3"><span class="title-t3">【創造性】</span>';
//print '<font size="5px"; color="ff0000";>【創造性】</font><br/> ';

// データベースからデータ検索
$sql = 'SELECT * FROM 創造性 WHERE 1';
$stmt = $dbh->prepare($sql);
$stmt->execute();

print '<b>[尺度の解説]</b><br/> ';
print '自分で考える傾向が強いか、他人任せにする傾向が強いかをみるもの。
創造性が高い場合、自分で考える傾向が強く何に対しても自分なりの考えが出てくる。そのため、その人の本質と結びついたしっかりとしたコミュニケーションを取ることができる。創造性が低い場合、自分で考えることをせず、すべてを他人任せにする傾向がある。そにため、その人の本質が曖昧になりコミュニケーションの基礎がはっきりしなくなる。';
print '<br/><br/>';

while(1){

	$rec = $stmt->fetch(PDO::FETCH_ASSOC);
	if($rec == false ){
		break;
	}

	if(( $cresou_sum >= $rec['Min'] ) && ( $cresou_sum <= $rec['Max'] )){
		
		print '<b>[あなたの解説]</b><br/> ';
		print '</b></font>⇒ ';
		print $rec['Commentary'];
		print '</div>';
		
		break;
	}else{
		// 何もしない
	}
}

//==================================================================================
//****** 自立性 ******
//==================================================================================
// 表題
print '<div class="kokuban-t4"><span class="title-t4">【自立性】</span>';
//print '<font size="5px"; color="ff0000";>【自立性】</font><br/> ';

// データベースからデータ検索
$sql = 'SELECT * FROM 自立性 WHERE 1';
$stmt = $dbh->prepare($sql);
$stmt->execute();

print '<b>[尺度の解説]</b><br/> ';
print '周囲の評価や感想に縛られない自由な心を持っているかどうかをみるもの。
自立性が高い場合、周囲の評価に左右されることなく自分の生き方を不安なく貫くことができる。そのため対人関係では冷たい人、他人のことを考えない人という印象になる。自立性が低い場合、周囲の評価を気にする気持ちが強く他人に合わせようとすることが多くなりそのために自分の気持ちを抑えすぎて苦しくなったり依存的な人間関係を築くようになる。';
print '<br/><br/>';

while(1){

	$rec = $stmt->fetch(PDO::FETCH_ASSOC);
	if($rec == false ){
		break;
	}

	if(( $indjir_sum >= $rec['Min'] ) && ( $indjir_sum <= $rec['Max'] )){
		
		print '<b>[あなたの解説]</b><br/> ';
		print '</b></font>⇒ ';
		print $rec['Commentary'];
		print '</div>';
		
		break;
	}else{
		// 何もしない
	}
}

//==================================================================================
//****** 感受性 ******
//==================================================================================
// 表題
print '<div class="kokuban-t1"><span class="title-t1">【感受性】</span>';
//print '<font size="5px"; color="ff0000";>【感受性】</font><br/> ';

// データベースからデータ検索
$sql = 'SELECT * FROM 感受性 WHERE 1';
$stmt = $dbh->prepare($sql);
$stmt->execute();

print '<b>[尺度の解説]</b><br/> ';
print '喜びや悲しみを受け止めることが十分にできるかどうかをみるもの。
感受性が高い場合、いろいろなことに感動する心を持っており話題が豊富でコミュニケーションも豊かになる。
感受性が低い場合、感情が平坦で興味関心の幅が少なく話題が偏りコミュニケーションの幅が狭くなる。';
print '<br/><br/>';

while(1){

	$rec = $stmt->fetch(PDO::FETCH_ASSOC);
	if($rec == false ){
		break;
	}

	if(( $perkan_sum >= $rec['Min'] ) && ( $perkan_sum <= $rec['Max'] )){
		
		print '<b>[あなたの解説]</b><br/> ';
		print '</b></font>⇒ ';
		print $rec['Commentary'];
		print '</div>';
		
		break;
	}else{
		// 何もしない
	}
}

//**********************************************************************************
// 仕事力
//**********************************************************************************
print '<br><br><br><div class ="shadow"><font size = "6pt"; color="#ff0000";>■■■仕事力 適性診断■■■</font></div><br/>';

//==================================================================================
//****** No13 チームワーク適性 ******
//==================================================================================
// 表題
print '<div class="wboard-w3"><span class="title-w3">【チームワーク適性】</span>';
//print '<font size="5px"; color="ff0000";>【チームワーク適性】</font><br/> ';

// データベースからデータ検索
$sql = 'SELECT * FROM Bc13_チームワーク適性 WHERE 1';
$stmt = $dbh->prepare($sql);
$stmt->execute();

print '<b>[尺度の解説]</b><br/> ';
print '良好な人間関係を重視する傾向の強い人はチームワークを大切なものと考え心の繋がった仲間と仕事をすることで力を発揮します。人間関係を煩わしいと考える傾向の人はチームの人間関係に気を遣うことを面倒と思い一人で仕事をしたいと思いその環境で力を発揮します。';
print '<br/><br/>';

while(1){

	$rec = $stmt->fetch(PDO::FETCH_ASSOC);
	if($rec == false ){
		break;
	}
	
	// 自立性１尺度28点
	if(( $indjir_sum >= $rec['Min'] ) && ( $indjir_sum <= $rec['Max'] )){
		
		$levelcol = Get_Levelcol($rec['Level']);
		
		print '<b>[あなたの解説]</b>';
		print '　レベル <font color = "'.$levelcol.'" size = "5em"><b>';
		print $rec['Level'];
		print '</b></font><br/> ';
		
		print '</b></font>⇒ ';
		print $rec['Commentary'];
		
		print '<br/><b>[Inspiration Word]</b><br/> ';
		print '</b></font>⇒ ';
		print $rec['Inspiration'];
		
		print '</div>';
		
		
		
		break;
	}else{
		// 何もしない
	}
}
//==================================================================================
//****** No14 チームプレー ******
//==================================================================================
// 表題
print '<div class="wboard-w3"><span class="title-w3">【チームプレー】</span>';
//print '<font size="5px"; color="ff0000";>【チームプレー】</font><br/> ';

// データベースからデータ検索
$sql = 'SELECT * FROM Bc14_チームプレー WHERE 1';
$stmt = $dbh->prepare($sql);
$stmt->execute();

print '<b>[尺度の解説]</b><br/> ';
print 'ポイントの高い人は大勢の人と一緒にいることが快感でチームで仕事する時に力を発揮します。ただポイントが高すぎると一緒にいることの喜びが優先してしまって仕事がおろそかになることがあります。ポイントの低い人は他人と一緒に仕事することが苦痛でチームとして仕事することを苦痛だと感じています。';
print '<br/><br/>';

while(1){

	$rec = $stmt->fetch(PDO::FETCH_ASSOC);
	if($rec == false ){
		break;
	}
	
	// 交流性１尺度28点
	if(( $frikor_sum >= $rec['Min'] ) && ( $frikor_sum <= $rec['Max'] )){
		
		$levelcol = Get_Levelcol($rec['Level']);
		
		print '<b>[あなたの解説]</b> ';
		print '　レベル <font color = "'.$levelcol.'" size = "5em"><b>';
		print $rec['Level'];
		print '</b></font><br/> ';
		
		print '</b></font>⇒ ';
		print $rec['Commentary'];
		
		print '<br/><b>[Inspiration Word]</b><br/> ';
		print '</b></font>⇒ ';
		print $rec['Inspiration'];
		
		print '</div>';
		
		
		
		break;
	}else{
		// 何もしない
	}
}
//==================================================================================
//****** No15 話し合い ******
//==================================================================================
// 表題
print '<div class="wboard-w3"><span class="title-w3">【話し合い】</span>';
//print '<font size="5px"; color="ff0000";>【話し合い】</font><br/> ';

// データベースからデータ検索
$sql = 'SELECT * FROM Bc15_話し合い WHERE 1';
$stmt = $dbh->prepare($sql);
$stmt->execute();

print '<b>[尺度の解説]</b><br/> ';
print 'ポイントの高い人は他人の意見や立場を尊重する気持ちが強くチームでの話し合いをまとめていこうとします。ポイントの低い人は他人の意見を批判的に考えることが多く自分の意見や立場にこだわってチームでの話し合いをつぶすことが多くなります。';
print '<br/><br/>';

while(1){

	$rec = $stmt->fetch(PDO::FETCH_ASSOC);
	if($rec == false ){
		break;
	}
	
	// 幸福性、自立性２尺度56点
	if(( ($conkou_sum + $indjir_sum) >= $rec['Min'] ) && ( ($conkou_sum + $indjir_sum) <= $rec['Max'] )){
		
		$levelcol = Get_Levelcol($rec['Level']);
		
		print '<b>[あなたの解説]</b> ';
		print '　レベル <font color = "'.$levelcol.'" size = "5em"><b>';
		print $rec['Level'];
		print '</b></font><br/> ';
		
		print '</b></font>⇒ ';
		print $rec['Commentary'];
		
		print '<br/><b>[Inspiration Word]</b><br/> ';
		print '</b></font>⇒ ';
		print $rec['Inspiration'];
		
		print '</div>';
		
		
		
		break;
	}else{
		// 何もしない
	}
}
//==================================================================================
//****** No16 仕事への意欲 ******
//==================================================================================
// 表題
print '<div class="wboard-w3"><span class="title-w3">【仕事への意欲】</span>';
//print '<font size="5px"; color="ff0000";>【仕事への意欲】</font><br/> ';

// データベースからデータ検索
$sql = 'SELECT * FROM Bc16_仕事への意欲 WHERE 1';
$stmt = $dbh->prepare($sql);
$stmt->execute();

print '<b>[尺度の解説]</b><br/> ';
print '個人としての働く目標と目的。組織としての目的と目標。には、多少のずれがあります。仕事への取り組み、姿勢を改善したいと思っても、自分自身のキャリア開発に熱意が無ければ、仕事への情熱は望めません。個人と組織のスキルアップ。';
print '<br/><br/>';

while(1){

	$rec = $stmt->fetch(PDO::FETCH_ASSOC);
	if($rec == false ){
		break;
	}
	
	// 創造性、自立性２尺度56点
	if(( ($cresou_sum + $indjir_sum) >= $rec['Min'] ) && ( ($cresou_sum + $indjir_sum) <= $rec['Max'] )){
		
		$levelcol = Get_Levelcol($rec['Level']);
		
		print '<b>[あなたの解説]</b> ';
		print '　レベル <font color = "'.$levelcol.'" size = "5em"><b>';
		print $rec['Level'];
		print '</b></font><br/> ';
		
		print '</b></font>⇒ ';
		print $rec['Commentary'];
		
		print '<br/><b>[Inspiration Word]</b><br/> ';
		print '</b></font>⇒ ';
		print $rec['Inspiration'];
		
		print '</div>';
		
		
		
		break;
	}else{
		// 何もしない
	}
}
//==================================================================================
//****** No17 目標・目的******
//==================================================================================
// 表題
print '<div class="wboard-w3"><span class="title-w3">【目標・目的】</span>';
//print '<font size="5px"; color="ff0000";>【目標・目的】</font><br/> ';

// データベースからデータ検索
$sql = 'SELECT * FROM Bc17_目標・目的 WHERE 1';
$stmt = $dbh->prepare($sql);
$stmt->execute();

print '<b>[尺度の解説]</b><br/> ';
print '目標、目的、新しいキャリア開発、目標達成意識向上、スキルアップ、仕事への取り組み姿勢。';
print '<br/><br/>';

while(1){

	$rec = $stmt->fetch(PDO::FETCH_ASSOC);
	if($rec == false ){
		break;
	}
	
	// 創造性、自立性２尺度56点
	if(( ($cresou_sum + $indjir_sum) >= $rec['Min'] ) && ( ($cresou_sum + $indjir_sum) <= $rec['Max'] )){
		
		$levelcol = Get_Levelcol($rec['Level']);
		
		print '<b>[あなたの解説]</b> ';
		print '　レベル <font color = "'.$levelcol.'" size = "5em"><b>';
		print $rec['Level'];
		print '</b></font><br/> ';
		
		print '</b></font>⇒ ';
		print $rec['Commentary'];
		
		print '<br/><b>[Inspiration Word]</b><br/> ';
		print '</b></font>⇒ ';
		print $rec['Inspiration'];
		
		print '</div>';
		
		
		
		break;
	}else{
		// 何もしない
	}
}
//==================================================================================
//****** No18 仕事完成度******
//==================================================================================
// 表題
print '<div class="wboard-w3"><span class="title-w3">【仕事完成度】</span>';
//print '<font size="5px"; color="ff0000";>【仕事完成度】</font><br/> ';

// データベースからデータ検索
$sql = 'SELECT * FROM Bc18_仕事完成度 WHERE 1';
$stmt = $dbh->prepare($sql);
$stmt->execute();

print '<b>[尺度の解説]</b><br/> ';
print '仕事の完成度はある程度、出来るという確信やポジティブな考え方の上に仕事への前向きな気持ちが完成度を高めてゆきます。マイナス思考の人は慎重な思考や細かな気配りに欠けるところがあります。';
print '<br/><br/>';

while(1){

	$rec = $stmt->fetch(PDO::FETCH_ASSOC);
	if($rec == false ){
		break;
	}
	
	// 幸福性、尊重性２尺度56点
	if(( ($conkou_sum + $estson_sum) >= $rec['Min'] ) && ( ($conkou_sum + $estson_sum) <= $rec['Max'] )){
		
		$levelcol = Get_Levelcol($rec['Level']);
		
		print '<b>[あなたの解説]</b> ';
		print '　レベル <font color = "'.$levelcol.'" size = "5em"><b>';
		print $rec['Level'];
		print '</b></font><br/> ';
		
		print '</b></font>⇒ ';
		print $rec['Commentary'];
		
		print '<br/><b>[Inspiration Word]</b><br/> ';
		print '</b></font>⇒ ';
		print $rec['Inspiration'];
		
		print '</div>';
		
		
		
		break;
	}else{
		// 何もしない
	}
}
//==================================================================================
//****** No19 失敗からの教訓******
//==================================================================================
// 表題
print '<div class="wboard-w3"><span class="title-w3">【失敗からの教訓】</span>';
//print '<font size="5px"; color="ff0000";>【失敗からの教訓】</font><br/> ';

// データベースからデータ検索
$sql = 'SELECT * FROM Bc19_失敗からの教訓 WHERE 1';
$stmt = $dbh->prepare($sql);
$stmt->execute();

print '<b>[尺度の解説]</b><br/> ';
print '失敗から教訓を学ぶことができるか、同じ失敗を繰り返さないか、失敗からの再チャレンジができ、成功へと導くことが出来るか。';
print '<br/><br/>';

while(1){

	$rec = $stmt->fetch(PDO::FETCH_ASSOC);
	if($rec == false ){
		break;
	}
	
	// 創造性、幸福性２尺度56点
	if(( ($conkou_sum + $cresou_sum) >= $rec['Min'] ) && ( ($conkou_sum + $cresou_sum) <= $rec['Max'] )){
		
		
		$levelcol = Get_Levelcol($rec['Level']);	
		
		print '<b>[あなたの解説]</b> ';
		print '　レベル <font color = "'.$levelcol.'" size = "5em"><b>';
		print $rec['Level'];
		print '</b></font><br/> ';
		
		print '</b></font>⇒ ';
		print $rec['Commentary'];
		
		print '<br/><b>[Inspiration Word]</b><br/> ';
		print '</b></font>⇒ ';
		print $rec['Inspiration'];
		
		print '</div>';
		
		
		
		break;
	}else{
		// 何もしない
	}
}
//==================================================================================
//****** No20 ポジティブ・ネガティブ******
//==================================================================================
// 表題
print '<div class="wboard-w3"><span class="title-w3">【ポジティブ・ネガティブ】</span>';
//print '<font size="5px"; color="ff0000";>【ポジティブ・ネガティブ】</font><br/> ';

// データベースからデータ検索
$sql = 'SELECT * FROM Bc20_ポジティブ・ネガティブ WHERE 1';
$stmt = $dbh->prepare($sql);
$stmt->execute();

print '<b>[尺度の解説]</b><br/> ';
print '自分自身の考え方の発想が、基本的にポジティブ思考であるのか、ネガティブ思考であるのかを見るもの。';
print '<br/><br/>';

while(1){

	$rec = $stmt->fetch(PDO::FETCH_ASSOC);
	if($rec == false ){
		break;
	}
	
	// 幸福性１尺度28点
	if(( $conkou_sum >= $rec['Min'] ) && ( $conkou_sum <= $rec['Max'] )){
		
		
		$levelcol = Get_Levelcol($rec['Level']);
		
		print '<b>[あなたの解説]</b> ';
		print '　レベル <font color = "'.$levelcol.'" size = "5em"><b>';
		print $rec['Level'];
		print '</b></font><br/> ';
		
		print '</b></font>⇒ ';
		print $rec['Commentary'];
		
		print '<br/><b>[Inspiration Word]</b><br/> ';
		print '</b></font>⇒ ';
		print $rec['Inspiration'];
		
		print '</div>';
		
		
		
		break;
	}else{
		// 何もしない
	}
}
//==================================================================================
//****** No21 企画提案力******
//==================================================================================
// 表題
print '<div class="wboard-w3"><span class="title-w3">【企画提案力】</span>';
//print '<font size="5px"; color="ff0000";>【企画提案力】</font><br/> ';

// データベースからデータ検索
$sql = 'SELECT * FROM Bc21_企画提案力 WHERE 1';
$stmt = $dbh->prepare($sql);
$stmt->execute();

print '<b>[尺度の解説]</b><br/> ';
print '日常生活の中で、見たこと聞いた事や学んだことから、自分独自の発想やアイデアが湧いてきたり創意工夫をする事が出来るかどうかを見るもの、高い場合はインスピレーションが強く、低い場合は思いつきの問題点が解らない。';
print '<br/><br/>';

while(1){

	$rec = $stmt->fetch(PDO::FETCH_ASSOC);
	if($rec == false ){
		break;
	}
	
	// 創造性１尺度28点
	if(( $cresou_sum >= $rec['Min'] ) && ( $cresou_sum <= $rec['Max'] )){
				
		$levelcol = Get_Levelcol($rec['Level']);
		
		print '<b>[あなたの解説]</b>';
		print '　レベル <font color = "'.$levelcol.'" size = "5em"><b>';
		print $rec['Level'];
		print '</b></font><br/> ';
		
		print '</b></font>⇒ ';
		print $rec['Commentary'];
		
		print '<br/><b>[Inspiration Word]</b><br/> ';
		print '</b></font>⇒ ';
		print $rec['Inspiration'];
		
		print '</div>';
		
		
		
		break;
	}else{
		// 何もしない
	}
}
//==================================================================================
//****** No22 決断実行力******
//==================================================================================
// 表題
print '<div class="wboard-w3"><span class="title-w3">【決断実行力】</span>';
//print '<font size="5px"; color="ff0000";>【決断実行力】</font><br/> ';

// データベースからデータ検索
$sql = 'SELECT * FROM Bc22_決断実行力 WHERE 1';
$stmt = $dbh->prepare($sql);
$stmt->execute();

print '<b>[尺度の解説]</b><br/> ';
print '自分一人で考え、決断、実行することはまわりの評価に左右されない自分自身の考え方をしっかり持っていないとなりません。
ポイントの高い人は言うべきことをしっかりと主張することができます。ポイントの低い人は他人に嫌われたくないという思いが強く人の想いに合わせようとするために言うべきことも言えなくなってしまいます。';
print '<br/><br/>';

while(1){

	$rec = $stmt->fetch(PDO::FETCH_ASSOC);
	if($rec == false ){
		break;
	}
	
	// 自立性１尺度28点
	if(( $indjir_sum >= $rec['Min'] ) && ( $indjir_sum <= $rec['Max'] )){
		
		$levelcol = Get_Levelcol($rec['Level']);
		
		print '<b>[あなたの解説]</b> ';
		print '　レベル <font color = "'.$levelcol.'" size = "5em"><b>';
		print $rec['Level'];
		print '</b></font><br/> ';
		
		print '</b></font>⇒ ';
		print $rec['Commentary'];
		
		print '<br/><b>[Inspiration Word]</b><br/> ';
		print '</b></font>⇒ ';
		print $rec['Inspiration'];
		
		print '</div>';
		
		
		
		break;
	}else{
		// 何もしない
	}
}
//==================================================================================
//****** No23 問題解決力******
//==================================================================================
// 表題
print '<div class="wboard-w3"><span class="title-w3">【問題解決力】</span>';
//print '<font size="5px"; color="ff0000";>【問題解決力】</font><br/> ';

// データベースからデータ検索
$sql = 'SELECT * FROM Bc23_問題解決力 WHERE 1';
$stmt = $dbh->prepare($sql);
$stmt->execute();

print '<b>[尺度の解説]</b><br/> ';
print '問題解決のために必要な力は問題を本質的なところで的確に把握する能力と正しい判断に基づいていろいろな対策を考える発想力です。ポイントの高い人は何をしなければならないかを的確に把握し解決策を打ち出すことができます。ポイントの低い人は本質を理解できず有効な手立てを経てることができません。';
print '<br/><br/>';

while(1){

	$rec = $stmt->fetch(PDO::FETCH_ASSOC);
	if($rec == false ){
		break;
	}
	
	// 創造性１尺度28点
	if(( $cresou_sum >= $rec['Min'] ) && ( $cresou_sum <= $rec['Max'] )){
		
		$levelcol = Get_Levelcol($rec['Level']);
		
		print '<b>[あなたの解説]</b> ';
		print '　レベル <font color = "'.$levelcol.'" size = "5em"><b>';
		print $rec['Level'];
		print '</b></font><br/> ';
		
		print '</b></font>⇒ ';
		print $rec['Commentary'];
		
		print '<br/><b>[Inspiration Word]</b><br/> ';
		print '</b></font>⇒ ';
		print $rec['Inspiration'];
		
		print '</div>';
		
		
		
		break;
	}else{
		// 何もしない
	}
}
//==================================================================================
//****** No24 責任実行力******
//==================================================================================
// 表題
print '<div class="wboard-w3"><span class="title-w3">【責任実行力】</span>';
//print '<font size="5px"; color="ff0000";>【責任実行力】</font><br/> ';

// データベースからデータ検索
$sql = 'SELECT * FROM Bc24_責任実行力 WHERE 1';
$stmt = $dbh->prepare($sql);
$stmt->execute();

print '<b>[尺度の解説]</b><br/> ';
print 'ポイントの高い人は物事を他人任せにする傾向が強く問題の解決を最後まで見届けないことがあります。
ポイントの低い人は自分の言ったことがきっちりと実行されているかどうか最後まで見届けます。';
print '<br/><br/>';

while(1){

	$rec = $stmt->fetch(PDO::FETCH_ASSOC);
	if($rec == false ){
		break;
	}
	
	// 尊重性１尺度28点
	if(( $estson_sum >= $rec['Min'] ) && ( $estson_sum <= $rec['Max'] )){
		
		$levelcol = Get_Levelcol($rec['Level']);
		
		print '<b>[あなたの解説]</b> ';
		print '　レベル <font color = "'.$levelcol.'" size = "5em"><b>';
		print $rec['Level'];
		print '</b></font><br/> ';
		
		print '</b></font>⇒ ';
		print $rec['Commentary'];
		
		print '<br/><b>[Inspiration Word]</b><br/> ';
		print '</b></font>⇒ ';
		print $rec['Inspiration'];
		
		print '</div>';
		
		
		
		break;
	}else{
		// 何もしない
	}
}
//==================================================================================
//****** No25 ストレス耐性******
//==================================================================================
// 表題
print '<div class="wboard-w3"><span class="title-w3">【ストレス耐性】</span>';
//print '<font size="5px"; color="ff0000";>【ストレス耐性】</font><br/> ';

// データベースからデータ検索
$sql = 'SELECT * FROM Bc25_ストレス耐性 WHERE 1';
$stmt = $dbh->prepare($sql);
$stmt->execute();

print '<b>[尺度の解説]</b><br/> ';
print '仕事をしてゆく上でいろいろな問題やストレスを自分自身でどのように感じどのように対処していくのかの判断基準です。ポイントの高い人はストレスに出会ってもそれを乗り越え一人でいることにも不安がなくどのような人間関係の中にあっても煩わされることなく自分の仕事をすることができます。ポイントの低い人はストレスに弱くくよくよと悩みを抱える傾向にあり、また自分自身が仕事上受け入れられているかどうかにとても敏感でストレスを抱えることとなります。';
print '<br/><br/>';

while(1){

	$rec = $stmt->fetch(PDO::FETCH_ASSOC);
	if($rec == false ){
		break;
	}
	
	// 幸福性、自立性２尺度56点
	if(( ($conkou_sum + $indjir_sum) >= $rec['Min'] ) && ( ($conkou_sum + $indjir_sum) <= $rec['Max'] )){
		
		$levelcol = Get_Levelcol($rec['Level']);	
		
		print '<b>[あなたの解説]</b> ';
		print '　レベル <font color = "'.$levelcol.'" size = "5em"><b>';
		print $rec['Level'];
		print '</b></font><br/> ';
		
		print '</b></font>⇒ ';
		print $rec['Commentary'];
		
		print '<br/><b>[Inspiration Word]</b><br/> ';
		print '</b></font>⇒ ';
		print $rec['Inspiration'];
		
		print '</div>';
		
		
		
		break;
	}else{
		// 何もしない
	}
}
//==================================================================================
//****** No26 批判や𠮟責******
//==================================================================================
// 表題
print '<div class="wboard-w3"><span class="title-w3">【批判や𠮟責】</span>';
//print '<font size="5px"; color="ff0000";>【批判や𠮟責】</font><br/> ';

// データベースからデータ検索
$sql = 'SELECT * FROM Bc26_批判や叱責 WHERE 1';
$stmt = $dbh->prepare($sql);
$stmt->execute();

print '<b>[尺度の解説]</b><br/> ';
print '批判や叱責や助言をポジティブに前向きに受けとめ成長することができるか。';
print '<br/><br/>';

while(1){

	$rec = $stmt->fetch(PDO::FETCH_ASSOC);
	if($rec == false ){
		break;
	}
	
	// 幸福性、自立性、尊重性３尺度84点
	if(( ($conkou_sum + $indjir_sum + $estson_sum) >= $rec['Min'] ) && ( ($conkou_sum + $indjir_sum + $estson_sum) <= $rec['Max'] )){
		
		$levelcol = Get_Levelcol($rec['Level']);
		
		print '<b>[あなたの解説]</b> ';
		print '　レベル <font color = "'.$levelcol.'" size = "5em"><b>';
		print $rec['Level'];
		print '</b></font><br/> ';
		
		print '</b></font>⇒ ';
		print $rec['Commentary'];
		
		print '<br/><b>[Inspiration Word]</b><br/> ';
		print '</b></font>⇒ ';
		print $rec['Inspiration'];
		
		print '</div>';
		
		
		
		break;
	}else{
		// 何もしない
	}
	
}

//==================================================================================
//****** No27 責任・言い訳******
//==================================================================================
// 表題
print '<div class="wboard-w3"><span class="title-w3">【責任・言い訳】</span>';
//print '<font size="5px"; color="ff0000";>【責任・言い訳】</font><br/> ';

// データベースからデータ検索
$sql = 'SELECT * FROM Bc27_責任・言い訳 WHERE 1';
$stmt = $dbh->prepare($sql);
$stmt->execute();

print '<b>[尺度の解説]</b><br/> ';
print '言い訳が多く誤りを認めないか、自分の誤りを素直に認め仕事上、責任をとることが出来るかどうか。';
print '<br/><br/>';

while(1){

	$rec = $stmt->fetch(PDO::FETCH_ASSOC);
	if($rec == false ){
		break;
	}
	
	// 幸福性、自立性、尊重性、共感性４尺度112点
	if(( ($conkou_sum + $indjir_sum + $estson_sum + $empkyo_sum) >= $rec['Min'] ) && ( ($conkou_sum + $indjir_sum + $estson_sum + $empkyo_sum) <= $rec['Max'] )){
		
		$levelcol = Get_Levelcol($rec['Level']);
		
		print '<b>[あなたの解説]</b> ';
		print '　レベル <font color = "'.$levelcol.'" size = "5em"><b>';
		print $rec['Level'];
		print '</b></font><br/> ';
		
		print '</b></font>⇒ ';
		print $rec['Commentary'];
		
		print '<br/><b>[Inspiration Word]</b><br/> ';
		print '</b></font>⇒ ';
		print $rec['Inspiration'];
		
		print '</div>';
		
		
		
		break;
	}else{
		// 何もしない
	}
}
//==================================================================================
//****** No28 ヒューマンリレーション******
//==================================================================================
// 表題
print '<div class="wboard-w3"><span class="title-w3">【ヒューマンリレーション】</span>';
//print '<font size="5px"; color="ff0000";>【ヒューマンリレーション】</font><br/> ';

// データベースからデータ検索
$sql = 'SELECT * FROM Bc28_ヒューマンリレーション WHERE 1';
$stmt = $dbh->prepare($sql);
$stmt->execute();

print '<b>[尺度の解説]</b><br/> ';
print '人間関係で悩むことが多いか、良好な人間関係を継続できるか。';
print '<br/><br/>';

while(1){

	$rec = $stmt->fetch(PDO::FETCH_ASSOC);
	if($rec == false ){
		break;
	}
	
	// 幸福性、自立性、尊重性３尺度84点
	if(( ($conkou_sum + $indjir_sum + $estson_sum ) >= $rec['Min'] ) && ( ($conkou_sum + $indjir_sum + $estson_sum ) <= $rec['Max'] )){
		
		$levelcol = Get_Levelcol($rec['Level']);
		
		print '<b>[あなたの解説]</b> ';
		print '　レベル <font color = "'.$levelcol.'" size = "5em"><b>';
		print $rec['Level'];
		print '</b></font><br/> ';
		
		print '</b></font>⇒ ';
		print $rec['Commentary'];
		
		print '<br/><b>[Inspiration Word]</b><br/> ';
		print '</b></font>⇒ ';
		print $rec['Inspiration'];
		
		print '</div>';
		
		
		
		break;
	}else{
		// 何もしない
	}
}
//==================================================================================
//****** No29 報告連絡相談******
//==================================================================================
// 表題
print '<div class="wboard-w3"><span class="title-w3">【報告連絡相談】</span>';
//print '<font size="5px"; color="ff0000";>【報告連絡相談】</font><br/> ';

// データベースからデータ検索
$sql = 'SELECT * FROM Bc29_報告連絡相談 WHERE 1';
$stmt = $dbh->prepare($sql);
$stmt->execute();

print '<b>[尺度の解説]</b><br/> ';
print '人とのコミュニケーションには、意思の疎通が必要です、言葉、メール、手紙、どんな方法であっても連絡報告相談が出来る事が重要な事です。';
print '<br/><br/>';

while(1){

	$rec = $stmt->fetch(PDO::FETCH_ASSOC);
	if($rec == false ){
		break;
	}
	
	// 交流性、自立性２尺度56点
	if(( ($frikor_sum + $indjir_sum ) >= $rec['Min'] ) && ( ($frikor_sum + $indjir_sum ) <= $rec['Max'] )){
		
		$levelcol = Get_Levelcol($rec['Level']);
		
		print '<b>[あなたの解説]</b> ';
		print '　レベル <font color = "'.$levelcol.'" size = "5em"><b>';
		print $rec['Level'];
		print '</b></font><br/> ';
		
		print '</b></font>⇒ ';
		print $rec['Commentary'];
		
		print '<br/><b>[Inspiration Word]</b><br/> ';
		print '</b></font>⇒ ';
		print $rec['Inspiration'];
		
		print '</div>';
		
		
		
		break;
	}else{
		// 何もしない
	}
}
//==================================================================================
//****** No30 営業タイプ内勤タイプ******
//==================================================================================
// 表題
print '<div class="wboard-w3"><span class="title-w3">【営業タイプ内勤タイプ】</span>';
//print '<font size="5px"; color="ff0000";>【営業タイプ内勤タイプ】</font><br/> ';

// データベースからデータ検索
$sql = 'SELECT * FROM Bc30_営業タイプ内勤タイプ WHERE 1';
$stmt = $dbh->prepare($sql);
$stmt->execute();

print '<b>[尺度の解説]</b><br/> ';
print '営業の基本は人と会うこと話すことです。先ずは人が好き嫌い、話すことが好き嫌い。ポイントの高い人は人と会って話すことが好きで多くの人と会うことを楽しいと感じる人です。それに対してポイントの低い人は人と会うことが苦手で人と会うことに大きなストレスを感じます。';
print '<br/><br/>';

while(1){

	$rec = $stmt->fetch(PDO::FETCH_ASSOC);
	if($rec == false ){
		break;
	}
	
	// 交流性、会話性２尺度56点
	if(( ($frikor_sum + $orakai_sum ) >= $rec['Min'] ) && ( ($frikor_sum + $orakai_sum ) <= $rec['Max'] )){
		
		$levelcol = Get_Levelcol($rec['Level']);
		
		print '<b>[あなたの解説]</b> ';
		print '　レベル <font color = "'.$levelcol.'" size = "5em"><b>';
		print $rec['Level'];
		print '</b></font><br/> ';
		
		print '</b></font>⇒ ';
		print $rec['Commentary'];
		
		print '<br/><b>[Inspiration Word]</b><br/> ';
		print '</b></font>⇒ ';
		print $rec['Inspiration'];
		
		print '</div>';
		
		
		
		break;
	}else{
		// 何もしない
	}
}
//==================================================================================
//****** No31 飛び込みセールス力******
//==================================================================================
// 表題
print '<div class="wboard-w3"><span class="title-w3">【飛び込みセールス力】</span>';
//print '<font size="5px"; color="ff0000";>【飛び込みセールス力】</font><br/> ';

// データベースからデータ検索
$sql = 'SELECT * FROM Bc31_飛び込みセールス力 WHERE 1';
$stmt = $dbh->prepare($sql);
$stmt->execute();

print '<b>[尺度の解説]</b><br/> ';
print '飛び込み営業に必要な力は周りの状況に左右されることなく自分の言いたいことをしっかりと主張する力です。さらにかなり高いストレス状態に晒されますからストレスにめげず跳ね返してしまう強さが必要です。ポイントの高い人は初対面の人ともすぐに親しくなれます。ポイントの低い人は人に会うことが苦手で話題が少なくすぐに話すことがなくなります。';
print '<br/><br/>';

while(1){

	$rec = $stmt->fetch(PDO::FETCH_ASSOC);
	if($rec == false ){
		break;
	}
	
	// 交流性、会話性、感受性３尺度84点
	if(( ($frikor_sum + $orakai_sum + $perkan_sum ) >= $rec['Min'] ) && ( ($frikor_sum + $orakai_sum + $perkan_sum ) <= $rec['Max'] )){
		
		$levelcol = Get_Levelcol($rec['Level']);
		
		print '<b>[あなたの解説]</b> ';
		print '　レベル <font color = "'.$levelcol.'" size = "5em"><b>';
		print $rec['Level'];
		print '</b></font><br/> ';
		
		print '</b></font>⇒ ';
		print $rec['Commentary'];
		
		print '<br/><b>[Inspiration Word]</b><br/> ';
		print '</b></font>⇒ ';
		print $rec['Inspiration'];
		
		print '</div>';
		
		
		
		break;
	}else{
		// 何もしない
	}
}
//==================================================================================
//****** No32 ルートセールス力******
//==================================================================================
// 表題
print '<div class="wboard-w3"><span class="title-w3">【ルートセールス力】</span>';
//print '<font size="5px"; color="ff0000";>【ルートセールス力】</font><br/> ';

// データベースからデータ検索
$sql = 'SELECT * FROM Bc32_ルートセールス力 WHERE 1';
$stmt = $dbh->prepare($sql);
$stmt->execute();

print '<b>[尺度の解説]</b><br/> ';
print 'ルートセールスに必要な力は他人に嫌われない愛想の良さと他人の話をしっかり聞き顧客の希望や要望をしっかりと掴む力です。ポイントの高い人は対人関係がとても円満で誰からも良い人と思われます。ポイントの低い人は自分勝手で押しつけがましいと思われ嫌われます。';
print '<br/><br/>';

while(1){

	$rec = $stmt->fetch(PDO::FETCH_ASSOC);
	if($rec == false ){
		break;
	}
	
	// 尊重性、共感性２尺度56点
	if(( ($estson_sum + $empkyo_sum ) >= $rec['Min'] ) && ( ($estson_sum + $empkyo_sum ) <= $rec['Max'] )){
		
		$levelcol2 = Get_Levelcol($rec['Level']);
		
		print '<b>[あなたの解説]</b> ';
		print '　レベル <font color = "'.$levelcol.'" size = "5em"><b>';
		print $rec['Level'];
		print '</b></font><br/> ';
		
		print '</b></font>⇒ ';
		print $rec['Commentary'];
		
		print '<br/><b>[Inspiration Word]</b><br/> ';
		print '</b></font>⇒ ';
		print $rec['Inspiration'];
		
		print '</div>';
		
		
		
		break;
	}else{
		// 何もしない
	}
}
//==================================================================================
//****** No33 転勤や配置転換******
//==================================================================================
// 表題
print '<div class="wboard-w3"><span class="title-w3">【転勤や配置転換】</span>';
//print '<font size="5px"; color="ff0000";>【転勤や配置転換】</font><br/> ';

// データベースからデータ検索
$sql = 'SELECT * FROM Bc33_転勤や配置転換 WHERE 1';
$stmt = $dbh->prepare($sql);
$stmt->execute();

print '<b>[尺度の解説]</b><br/> ';
print '新しい環境に馴染み,人と良好なコミュニケーションをとることが出来るか、また、環境の変化でストレスを感じるか。';
print '<br/><br/>';

while(1){

	$rec = $stmt->fetch(PDO::FETCH_ASSOC);
	if($rec == false ){
		break;
	}
	
	// 幸福性、交流性、融和性３尺度84点
	if(( ($conkou_sum + $frikor_sum + $haryuu_sum ) >= $rec['Min'] ) && ( ($conkou_sum + $frikor_sum + $haryuu_sum ) <= $rec['Max'] )){
		
		$levelcol = Get_Levelcol($rec['Level']);
		
		print '<b>[あなたの解説]</b> ';
		print '　レベル <font color = "'.$levelcol.'" size = "5em"><b>';
		print $rec['Level'];
		print '</b></font><br/> ';
		
		print '</b></font>⇒ ';
		print $rec['Commentary'];
		
		print '<br/><b>[Inspiration Word]</b><br/> ';
		print '</b></font>⇒ ';
		print $rec['Inspiration'];
		
		print '</div>';
		
		
		
		break;
	}else{
		// 何もしない
	}
}
//==================================================================================
// データベース接続解除 Commentary
//==================================================================================
Clear_Database( $dbh );



?>

</body>

</html>
