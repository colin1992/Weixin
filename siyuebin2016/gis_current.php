<html>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
     <title>天气实时查询</title>
<body>
  <div id='allmap' style='width:100%; height:100%'></div>
  <script type='text/JavaScript' src='http://api.map.baidu.com/api?type=quick&ak=AxdexIP3psa6gdpvEuncEj4tNpG57VGG&v=1.0'></script>
  <script type='text/javascript'>
// 百度地图API功能
//中心点的图标以及弹窗的设置
var map = new BMap.Map('allmap');    // 创建Map实例
    map.addControl(new BMap.ZoomControl()); // 添加缩放控件
    map.addControl(new BMap.ScaleControl()); // 添加比例尺控件
    var point = new BMap.Point(105.4327820000,28.6405600000);
    var myIcon = new BMap.Icon("http://img.qqhsh.com/uploads/allimg/150801/1-150P1111F4221.gif", new BMap.Size(50,50));
    var marker = new BMap.Marker(point,{icon:myIcon});  // 创建标注
    map.addOverlay(marker);              // 将标注添加到地图中
    map.centerAndZoom(point, 10);
    var opts = {
        width : 40,     // 信息窗口宽度
        height: 80,     // 信息窗口高度
        title : '天气信息' , // 信息窗口标题
        enableAutoPan : true //自动平移
    }
    var infoWindow = new BMap.InfoWindow('最低气温:8℃ 最高气温:12℃', opts);  // 创建信息窗口对象
    marker.addEventListener('click', function(){
        map.openInfoWindow(infoWindow,point); //开启信息窗口
    });
    var label = new BMap.Label("景点1",{offset:new BMap.Size(20,-10)});
	marker.setLabel(label);  
    
//自定义点的图标 以及弹窗设置      
    var pt = new BMap.Point(105.7760070000, 28.6014970000);
	var myIcon2 = new BMap.Icon("http://userimage6.360doc.com/14/1204/01/8269697_201412040159370937.gif", new BMap.Size(50,50));
	var marker2 = new BMap.Marker(pt,{icon:myIcon2});  // 创建标注
	map.addOverlay(marker2);              // 将标注添加到地图中
    var opts2 = {
        width : 40,     // 信息窗口宽度
        height: 80,     // 信息窗口高度
        title : '天气信息' , // 信息窗口标题
        enableAutoPan : true //自动平移
    }
    var infoWindow2 = new BMap.InfoWindow('最低气温:8℃ 最高气温:12℃', opts);  // 创建信息窗口对象
    marker2.addEventListener('click', function(){
        map.openInfoWindow(infoWindow2,pt); //开启信息窗口
    });  
    
</script>
</body>
</html>