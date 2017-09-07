﻿<html>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<body>
<legend>在线地图</legend>
  <div id='allmap' style='width:100%; height:360px'></div>
          <script type='text/JavaScript' src='http://api.map.baidu.com/api?type=quick&ak=AxdexIP3psa6gdpvEuncEj4tNpG57VGG&v=1.0'></script>
  <script type='text/javascript'>
// 百度地图API功能
var map = new BMap.Map('allmap');    // 创建Map实例
    map.addControl(new BMap.ZoomControl()); // 添加缩放控件
    map.addControl(new BMap.ScaleControl()); // 添加比例尺控件
    var point = new BMap.Point(116.486588,40.003082);
    var marker = new BMap.Marker(point);  // 创建标注
    map.addOverlay(marker);              // 将标注添加到地图中
    map.centerAndZoom(point, 15);
    var opts = {
        width : 120,     // 信息窗口宽度
        height: 30,     // 信息窗口高度
        title : '妙计旅行' , // 信息窗口标题
        enableAutoPan : true //自动平移
    }
    var infoWindow = new BMap.InfoWindow('妙计旅行', opts);  // 创建信息窗口对象
    marker.addEventListener('click', function(){
        map.openInfoWindow(infoWindow,point); //开启信息窗口
    });
</script>
</body>
</html>