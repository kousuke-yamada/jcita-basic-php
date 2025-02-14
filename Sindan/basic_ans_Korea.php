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
    ["분석 결과", attjyu, orakai, frikor, conkou, exphyo, empkyo, estson, haryuu, diskaj, cresou, indjir, perkan],
//    ["商品B", 3, 4, 3, 4, 5, 4, 5, 1, 4,2,2,2] 
  ];


  var params = {
        aCap: ["충실 성", "충실 성", "교류 성", "행복 성", "표출 성", "공감 성", "존중 성", "융 화성","공개 가능성","창의력","자립성","감수성"],
 	aMax: 84,
  	aMin: 0,
	faceColors: ["red", "yellow"],
	aLinePositions: [0,46,84],
  }
  rc.draw(items, params);
};
</script>
</head>

<body>

<p>
<div class ="shadow"><font size = "6pt"; color="#0000ff";>Japan Communication Ability Association WAT BASIC</font></div><br/>
<div class="border"><font size = "14pt"; >＊＊＊진단 결과＊＊＊</font></div>
</p>

<div class="box11">
<?php
$respondent = $_POST['name'];	// 回答者

print " 이름：";
print $respondent." 님";
print "</div><br/>";
?>

<div class="sample-box-13" style=" content: 'gets';">




<div class="media">
    <div class="media__image">
        <canvas width="400" height="400" id="sample"></canvas>
    </div>
    <div class="media__summary">
        <h2 class="media__heading">[방사형]</h2>
        <p class="media__text">
<?php
	// 合計点
	print "<b>　　충실 성</b>：".$attjyu_sumdisp;	// 充実性
	print "　　<b>충실 성</b>：".$orakai_sumdisp;	// 会話性
	print "　　<b>교류 성</b>：".$frikor_sumdisp;	// 交流性
	print "<br/><br/>";
	
	print "　　<b>행복 성</b>：".$conkou_sumdisp;	// 幸福性
	print "　　<b>표출 성</b>：".$exphyo_sumdisp;	// 表出性
	print "　　<b>공감 성</b>：".$empkyo_sumdisp;	// 共感性
	print "<br/><br/>";

	print "　　<b>존중 성</b>：".$estson_sumdisp;	// 尊重性
	print "　　<b>융 화성</b>：".$haryuu_sumdisp;	// 融和性
	print "　　<b>공개 가능성</b>：".$diskaj_sumdisp;	// 開示性
	print "<br/><br/>";
	
	print "　　<b>창의력</b>：".$cresou_sumdisp;	// 創造性
	print "　　<b>자립성</b>：".$indjir_sumdisp;	// 自立性
	print "　　<b>감수성</b>：".$perkan_sumdisp;	// 感受性
?>

	</p>
    </div>
</div>

</div>



<?php

// データベース接続
$dbh = Connect_Database();

//==================================================================================
//****** 充実性 ******
//==================================================================================
// 表題
print '<div class="kokuban-t2"><span class="title-t2">【충실 성】</span>';
//print '<font size="5px"; color="ff0000";>【充実性】</font> ';

// データベースからデータ検索
$sql = 'SELECT * FROM 充実性 WHERE 1';
$stmt = $dbh->prepare($sql);
$stmt->execute();

print '<b>[척도의 설명]</b><br/> ';
print '현재의 자신에게 충실 감 · 성취감을 느끼고 있는지? 충실 감 · 성취감이 높은 경우, 현재의 자신에게 자신이 무슨 일에 대해서도 적극적으로 참여 전에 진행 하자는 의욕에 넘쳐 커뮤니케이션이 풍부해진다. 충실 감 · 성취감이 낮 으면 자신감이없고 무엇에 대해서도 소극적.';
print '<br/><br/>';

while(1){

	$rec = $stmt->fetch(PDO::FETCH_ASSOC);
	if($rec == false ){
		break;
	}

	if(( $attjyu_sum >= $rec['Min'] ) && ( $attjyu_sum <= $rec['Max'] )){
		
		print '<b>[당신의 해설]</b><br/> ';
		print '</b></font>⇒ ';
		print $rec['Korea'];
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
print '<div class="kokuban-t3"><span class="title-t3">【대화 성】</span>';
//print '<font size="5px"; color="ff0000";>【会話性】</font><br/> ';

// データベースからデータ検索
$sql = 'SELECT * FROM 会話性 WHERE 1';
$stmt = $dbh->prepare($sql);
$stmt->execute();

print '<b>[척도의 설명]</b><br/> ';
print '평소 아무렇지도 않은 대화를 할 의지가 얼마나 있는지를 보는 것이다.
대화 가능성이 높은 경우, 아무렇지도 않은 대화를하는 것이 즐겁다 고 느낄 수 있도록 대화의 양이 많아 커뮤니케이션도 많아진다. 대화 가능성이 낮은 경우, 아무렇지도 않은 대화를 골칫거리로 느끼고있어 필요한 것을 제외하고는 제출한다. 이를 위해 대화의 양이 적어진다.';
print '<br/><br/>';

while(1){

	$rec = $stmt->fetch(PDO::FETCH_ASSOC);
	if($rec == false ){
		break;
	}

	if(( $orakai_sum >= $rec['Min'] ) && ( $orakai_sum <= $rec['Max'] )){
		
		print '<b>[당신의 해설]</b><br/> ';
		print '</b></font>⇒ ';
		print $rec['Korea'];
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
print '<div class="kokuban-t4"><span class="title-t4">【교류 성】</span>';
//print '<font size="5px"; color="ff0000";>【交流性】</font><br/> ';

// データベースからデータ検索
$sql = 'SELECT * FROM 交流性 WHERE 1';
$stmt = $dbh->prepare($sql);
$stmt->execute();

print '<b>[척도의 설명]</b><br/> ';
print '다른 사람과 함께있는 것을 재미 느끼거나 고통 느끼는지를 볼 것.
교류 가능성이 높은 경우, 여럿이 있는지 즐거운 생각 많은 사람과 함께 있고 싶다. 이를 위해 커뮤니케이션이 매우 활발하게된다. 교류 가능성이 낮은 경우, 다른 사람과 함께있는 것을 고통 느끼기 때문에 많은 사람들과 함께있는 것만으로 지쳐 버리는 그 때문에 혼자있는 것을 선호하게 커뮤니케이션도 매우 적어진다.';
print '<br/><br/>';

while(1){

	$rec = $stmt->fetch(PDO::FETCH_ASSOC);
	if($rec == false ){
		break;
	}

	if(( $frikor_sum >= $rec['Min'] ) && ( $frikor_sum <= $rec['Max'] )){
		
		print '<b>[당신의 해설]</b><br/> ';
		print '</b></font>⇒ ';
		print $rec['Korea'];
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
print '<div class="kokuban-t1"><span class="title-t1">【행복 성】</span>';
//print '<font size="5px"; color="ff0000";>【幸福性】</font><br/> ';

// データベースからデータ検索
$sql = 'SELECT * FROM 幸福性 WHERE 1';
$stmt = $dbh->prepare($sql);
$stmt->execute();

print '<b>[척도의 설명]</b><br/> ';
print '기본적인 신뢰감이 풍부하고 있는지를 보는 것이다.
행복 가능성이 높은 경우 자신에 대해서도 전 세계에 대해서도 긍정적으로 파악하는 느낌이 강하고 모든 것을 긍정적으로 받아들이고 전진시켜 나가려는 의욕에 넘쳐있다. 따라서 대인 관계는 원만하게 의사 소통도 활발해진다.
행복 수준이 낮은 경우 부정적인 견해가 많아 비관적으로 생각하고 비판적으로 볼 것이 많아이를 위해 대인 관계는 긴장감있게 만들 커뮤니케이션도 솔직하지 않은 것이된다.';
print '<br/><br/>';

while(1){

	$rec = $stmt->fetch(PDO::FETCH_ASSOC);
	if($rec == false ){
		break;
	}

	if(( $conkou_sum >= $rec['Min'] ) && ( $conkou_sum <= $rec['Max'] )){
		
		print '<b>[당신의 해설]</b><br/> ';
		print '</b></font>⇒ ';
		print $rec['Korea'];
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
print '<div class="kokuban-t2"><span class="title-t2">【표출 성】</span>';
//print '<font size="5px"; color="ff0000";>【表出性】</font><br/> ';

// データベースからデータ検索
$sql = 'SELECT * FROM 表出性 WHERE 1';
$stmt = $dbh->prepare($sql);
$stmt->execute();

print '<b>[척도의 설명]</b><br/> ';
print '감정 표현이 풍부하고 있는지를 보는 것이다.
표출 가능성이 높은 경우, 감정 표현이 풍부하고 매우 친근한 느낌 때문에 커뮤니케이션이 취하기 쉽다. 표출 가능성이 낮은 경우, 지적인 대화가 많아 위해 친절은 적게되지만 제대로 된 논의를 할 수있게된다.';
print '<br/><br/>';

while(1){

	$rec = $stmt->fetch(PDO::FETCH_ASSOC);
	if($rec == false ){
		break;
	}

	if(( $exphyo_sum >= $rec['Min'] ) && ( $exphyo_sum <= $rec['Max'] )){
		
		print '<b>[당신의 해설]</b><br/> ';
		print '</b></font>⇒ ';
		print $rec['Korea'];
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
print '<div class="kokuban-t3"><span class="title-t3">【공감 성】</span>';
//print '<font size="5px"; color="ff0000";>【共感性】</font><br/> ';

// データベースからデータ検索
$sql = 'SELECT * FROM 共感性 WHERE 1';
$stmt = $dbh->prepare($sql);
$stmt->execute();

print '<b>[척도의 설명]</b><br/> ';
print '다른 사람의 감정을 충분히 받아 들일 수 있는지를 보는 것이다.
공감 가능성이 높은 경우, 다른 사람의 감정을 솔직하게 받아 들일 수 있도록 마음의 연결이 깊어지는 것이 용이하게 할 수있다. 공감 성이 낮은 경우 다른 사람의 감정을 받아 들일 수 없기 때문에 마음의 연결을 만들기 어렵고 독선적이라는 인상을 갖게하는 것이 많아진다.';
print '<br/><br/>';

while(1){

	$rec = $stmt->fetch(PDO::FETCH_ASSOC);
	if($rec == false ){
		break;
	}

	if(( $empkyo_sum >= $rec['Min'] ) && ( $empkyo_sum <= $rec['Max'] )){
		
		print '<b>[당신의 해설]</b><br/> ';
		print '</b></font>⇒ ';
		print $rec['Korea'];
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
print '<div class="kokuban-t4"><span class="title-t4">【존중 성】</span>';
//print '<font size="5px"; color="ff0000";>【尊重性】</font><br/> ';

// データベースからデータ検索
$sql = 'SELECT * FROM 尊重性 WHERE 1';
$stmt = $dbh->prepare($sql);
$stmt->execute();

print '<b>[척도의 설명]</b><br/> ';
print '자신과 다른 사람의 행동에 대하여 타인의 입장을 존중하고 그 행동을 받아 들일 수 있는지를 보는 것이다. 존중 가능성이 높은 경우 다른 사람의 행동이나 일하는 방식을 봐도 그 사람은 그 사람의 방식이 있다고 존중하고 받아 들일 수있다. 따라서 대인 관계는 원만하게 마음의 연결을 도모하기 쉽다. 존중 성이 낮은 경우, 자신의 생각이 우선하여 타인의 행동을 자신의 기준에 맞추려는이를 위해 관입 생각하는 것이 많아 대인 관계는 긴장감이 높은 것으로된다.';
print '<br/><br/>';

while(1){

	$rec = $stmt->fetch(PDO::FETCH_ASSOC);
	if($rec == false ){
		break;
	}

	if(( $estson_sum >= $rec['Min'] ) && ( $estson_sum <= $rec['Max'] )){
		
		print '<b>[당신의 해설]</b><br/> ';
		print '</b></font>⇒ ';
		print $rec['Korea'];
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
print '<div class="kokuban-t1"><span class="title-t1">【융 화성】</span>';
//print '<font size="5px"; color="ff0000";>【融和性】</font><br/> ';

// データベースからデータ検索
$sql = 'SELECT * FROM 融和性 WHERE 1';
$stmt = $dbh->prepare($sql);
$stmt->execute();

print '<b>[척도의 설명]</b><br/> ';
print '자신의 생활 문화를 타인과 융합 할 때 스트레스를 느끼는지를 보는 것.
융 화성이 높은 경우 삶에 새로운 것을 도입하는 것을 좋아하고 타인의 문화와 융합하는 것이 용이하기 때문에 커뮤니케이션이 깊어 쉽다.
융 화성이 낮은 경우, 자신의 생활에 타인이 접근하고 깊이 들어오는 것에 강한 스트레스를 느끼기 위하여 커뮤니케이션을 심화 어려워진다.';
print '<br/><br/>';

while(1){

	$rec = $stmt->fetch(PDO::FETCH_ASSOC);
	if($rec == false ){
		break;
	}

	if(( $haryuu_sum >= $rec['Min'] ) && ( $haryuu_sum <= $rec['Max'] )){
		
		print '<b>[당신의 해설]</b><br/> ';
		print '</b></font>⇒ ';
		print $rec['Korea'];
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
print '<div class="kokuban-t2"><span class="title-t2">【공개 가능성】</span>';
//print '<font size="5px"; color="ff0000";>【開示性】</font><br/> ';

// データベースからデータ検索
$sql = 'SELECT * FROM 開示性 WHERE 1';
$stmt = $dbh->prepare($sql);
$stmt->execute();

print '<b>[척도의 설명]</b><br/> ';
print '척도의 설명 개인의 내면을 표출하게 스트레스를 느끼는지를 보는 것.
공개 가능성이 높은 경우 개인의 개인 정보를 공개하기로 스트레스가없고 매우 개방적인 사람이다. 이를 위해 커뮤니케이션을 심화 쉽게 할 수있다. 공개 수준이 낮은 경우 개인 정보를 공개하기로 강한 스트레스를 느끼기 위하여 숨기는 사람이라는 인상을주는 그 때문에 쉽게 접근하지 느낌이 커뮤니케이션을 도모하기 어렵다.';
print '<br/><br/>';

while(1){

	$rec = $stmt->fetch(PDO::FETCH_ASSOC);
	if($rec == false ){
		break;
	}

	if(( $diskaj_sum >= $rec['Min'] ) && ( $diskaj_sum <= $rec['Max'] )){
		
		print '<b>[당신의 해설]</b><br/> ';
		print '</b></font><br/>⇒ ';
		print $rec['Korea'];
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
print '<div class="kokuban-t3"><span class="title-t3">【창의력】</span>';
//print '<font size="5px"; color="ff0000";>【創造性】</font><br/> ';

// データベースからデータ検索
$sql = 'SELECT * FROM 創造性 WHERE 1';
$stmt = $dbh->prepare($sql);
$stmt->execute();

print '<b>[척도의 설명]</b><br/> ';
print '스스로 생각하는 경향이 강한하거나 다른 人任せ하는 경향이 강한지를 보는 것.
창의력이 높은 경우 스스로 생각하는 경향이 강하고 무엇에 대해서도 나름의 생각이 나온다. 따라서 그 사람의 본질과 결합 된 제대로 된 의사 소통을 할 수있다. 창의력이 낮은 경우 스스로 생각하지 말고 모든 다른 人任せ하는 경향이있다. 소니 위해 그 사람의 본질을 모호하게 커뮤니케이션의 기초가 명확하지 않게된다.';
print '<br/><br/>';

while(1){

	$rec = $stmt->fetch(PDO::FETCH_ASSOC);
	if($rec == false ){
		break;
	}

	if(( $cresou_sum >= $rec['Min'] ) && ( $cresou_sum <= $rec['Max'] )){
		
		print '<b>[당신의 해설]</b><br/> ';
		print '</b></font>⇒ ';
		print $rec['Korea'];
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
print '<div class="kokuban-t4"><span class="title-t4">【자립성】</span>';
//print '<font size="5px"; color="ff0000";>【自立性】</font><br/> ';

// データベースからデータ検索
$sql = 'SELECT * FROM 自立性 WHERE 1';
$stmt = $dbh->prepare($sql);
$stmt->execute();

print '<b>[척도의 설명]</b><br/> ';
print '주위의 평가와 감상에 얽매이지 않는 자유로운 마음을 가지고 있는지를 보는 것이다.
자립 가능성이 높은 경우, 주위의 평가에 좌우되지 않고 자신의 삶을 불안없이 관철 할 수있다. 따라서 대인 관계에서 차가운 사람, 타인을 생각하지 않는 사람이라는 인상된다. 자율성이 낮은 경우, 주위의 평가를 걱정하는 마음이 강하고 타인에 맞추려는 것이 많아이를 위해 자신의 감정을 억제 너무 힘들어하거나 의존적 인 인간 관계를 구축하게된다.';
print '<br/><br/>';

while(1){

	$rec = $stmt->fetch(PDO::FETCH_ASSOC);
	if($rec == false ){
		break;
	}

	if(( $indjir_sum >= $rec['Min'] ) && ( $indjir_sum <= $rec['Max'] )){
		
		print '<b>[당신의 해설]</b><br/> ';
		print '</b></font>⇒ ';
		print $rec['Korea'];
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
print '<div class="kokuban-t1"><span class="title-t1">【감수성】</span>';
//print '<font size="5px"; color="ff0000";>【感受性】</font><br/> ';

// データベースからデータ検索
$sql = 'SELECT * FROM 感受性 WHERE 1';
$stmt = $dbh->prepare($sql);
$stmt->execute();

print '<b>[척도의 설명]</b><br/> ';
print '기쁨과 슬픔을 받아들이는 것이 충분히 할 수 있는지를 보는 것이다.
감수성이 높은 경우 여러가지에 감동하는 마음을 가지고있어 화제가 풍부하고 커뮤니케이션도 풍부해진다.
감수성이 낮은 경우, 감정이 평탄 흥미와 관심의 폭이 적어 화제가 편향 커뮤니케이션의 폭이 좁아진다.';
print '<br/><br/>';

while(1){

	$rec = $stmt->fetch(PDO::FETCH_ASSOC);
	if($rec == false ){
		break;
	}

	if(( $perkan_sum >= $rec['Min'] ) && ( $perkan_sum <= $rec['Max'] )){
		
		print '<b>[당신의 해설]</b><br/> ';
		print '</b></font>⇒ ';
		print $rec['Korea'];
		print '</div>';
		
		break;
	}else{
		// 何もしない
	}
}


//==================================================================================
// データベース接続解除 Korea
//==================================================================================
Clear_Database( $dbh );



?>

</body>

</html>
