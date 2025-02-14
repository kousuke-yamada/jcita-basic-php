<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>JCITA-BASIC　トップ</title>

<!--[if IE]><script type="text/javascript" src="html5jp/excanvas/excanvas.js"></script><![endif]-->
<script type="text/javascript" src="html5jp/graph/radar.js"></script>
<script type="text/javascript">
window.onload = function() {
  var rc = new html5jp.graph.radar("sample");
  if( ! rc ) { return; }
  var items = [
    ["商品A", 5, 2, 4, 5, 3, 2, 4, 4, 2],
    ["商品B", 3, 4, 3, 4, 5, 4, 5, 1, 4] 
  ];
  var params = {
    aCap: ["安さ", "性能", "デザイン", "人気", "使いやすさ", "寿命", "軽さ", "強さ","値段"]
  }
  rc.draw(items, params);
};
</script>
</head>
<body>

<div><canvas width="400" height="300" id="sample"></canvas></div>

</body>

</html>
