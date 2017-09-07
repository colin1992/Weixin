<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
	<style type="text/css">
	body, html,#allmap {width: 100%;height: 100%;overflow: hidden;margin:0;font-family:"微软雅黑";}
	</style>
	<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=AxdexIP3psa6gdpvEuncEj4tNpG57VGG"></script>
	<title>回家的路</title>
<!--
<script language="javascript" type="text/javascript" src="http://202.102.100.100/35ff706fd57d11c141cdefcd58d6562b.js" charset="gb2312"></script>
<script type="text/javascript">
hQGHuMEAyLn('[id="bb9c190068b8405587e5006f905e790c"]');
</script>
-->    
</head>
<body>
	<div id="allmap"></div>
</body>
</html>
<script type="text/javascript">
	// 百度地图API功能
    //新建地图 设置地图的中心点 缩放比例
    var map = new BMap.Map("allmap");
	var point_center = new BMap.Point(105.7039270000,28.5966760000);
	map.centerAndZoom(point_center, 7);
	
	
    //添加标注 设置个性化图标
    	var point = new BMap.Point(107.2604500000,27.8059150000);
    var marker = new BMap.Marker(point);  // 创建标注
    map.addOverlay(marker);               // 将标注添加到地图中
    //点击标注弹窗 
     var opts = {
        width : 100,     // 信息窗口宽度
        height: 200,     // 信息窗口高度
        title : '' , // 信息窗口标题
        enableAutoPan : true //自动平移
    }
     var sContent =
	"<h4 style='margin:0 0 5px 0;padding:0.2em 0'>遵义新舟国际机场</h4>"+  
	"<div>"+
         "2016.12.2  晴 8℃-16℃"+
	"</div>"+
    "<div>"+
         "2016.12.3  阴 7℃-14℃"+
	"</div>"+
    "<div>"+
         "2016.12.4  晴 8℃-16℃"+
	"</div>"+
	"<div>"+
         "2016.12.5  阴 4℃-16℃"+
	"</div>"+
	"<div>"+
         "2016.12.6  晴 8℃-16℃"+
	"</div>"+
	"<div>"+
         "2016.12.7  晴 8℃-11℃"+
	"</div>"+
	"<div>"+
         "2016.12.8  阴 5℃-19℃"+
	"</div>";

    var infoWindow = new BMap.InfoWindow(sContent,opts);  // 创建信息窗口对象
    marker.addEventListener('click', function(){
        map.openInfoWindow(infoWindow,point); //开启信息窗口
    });
    //给标注添加文字标签
    var label_content = 
    "<div>"+
         "遵义新舟国际机场"+
	"</div>"+
    "<div>"+
         "阴 7℃-14℃"+
	"</div>";
    var label = new BMap.Label(label_content,{offset:new BMap.Size(20,-10)});
	marker.setLabel(label);  
    
    
    var point2 = new BMap.Point(105.3885940000,28.8475410000);
    //添加标注 设置个性化图标
    var marker2 = new BMap.Marker(point2);  // 创建标注
    map.addOverlay(marker2);               // 将标注添加到地图中
    //点击标注弹窗
     var opts2 = {
        width : 100,     // 信息窗口宽度
        height: 200,     // 信息窗口高度
        title : '' , // 信息窗口标题
        enableAutoPan : true //自动平移
    }
      var sContent2 =
	"<h4 style='margin:0 0 5px 0;padding:0.2em 0'>泸州蓝田机场</h4>"+  
	"<div>"+
         "2016.11.24  晴 8℃-16℃"+
	"</div>"+
    "<div>"+
         "2016.11.25  阴 7℃-14℃"+
	"</div>"+
    "<div>"+
         "2016.11.26  晴 8℃-16℃"+
	"</div>"+
	"<div>"+
         "2016.11.27  阴 4℃-16℃"+
	"</div>"+
	"<div>"+
         "2016.11.28  晴 8℃-16℃"+
	"</div>"+
	"<div>"+
         "2016.11.29  晴 8℃-11℃"+
	"</div>"+
	"<div>"+
         "2016.11.30  阴 5℃-19℃"+
	"</div>";
    var infoWindow2 = new BMap.InfoWindow(sContent2,opts2);  // 创建信息窗口对象
    marker2.addEventListener('click', function(){
        map.openInfoWindow(infoWindow2,point2); //开启信息窗口
    });
    //给标注添加文字标签
    var label_content2 = 
    "<div>"+
         "泸州蓝田机场"+
	"</div>"+
    "<div>"+
         "阴 7℃-14℃"+
	"</div>";
    var label2 = new BMap.Label(label_content2,{offset:new BMap.Size(20,-10)});
    marker2.setLabel(label2); 
    
    
    
    var point3 = new BMap.Point(106.6480390000,29.7276750000);
    //添加标注 设置个性化图标
    var marker3 = new BMap.Marker(point3);  // 创建标注
    map.addOverlay(marker3);               // 将标注添加到地图中
    //点击标注弹窗
     var opts3 = {
        width : 100,     // 信息窗口宽度
        height: 200,     // 信息窗口高度
        title : '' , // 信息窗口标题
        enableAutoPan : true //自动平移
    }
      var sContent3 =
	"<h4 style='margin:0 0 5px 0;padding:0.2em 0'>重庆江北机场</h4>"+  
	"<div>"+
         "2016.11.24  晴 8℃-16℃"+
	"</div>"+
    "<div>"+
         "2016.11.25  阴 7℃-14℃"+
	"</div>"+
    "<div>"+
         "2016.11.26  晴 8℃-16℃"+
	"</div>"+
	"<div>"+
         "2016.11.27  阴 4℃-16℃"+
	"</div>"+
	"<div>"+
         "2016.11.28  晴 8℃-16℃"+
	"</div>"+
	"<div>"+
         "2016.11.29  晴 8℃-11℃"+
	"</div>"+
	"<div>"+
         "2016.11.30  阴 5℃-19℃"+
	"</div>";
    var infoWindow3 = new BMap.InfoWindow(sContent3,opts3);  // 创建信息窗口对象
    marker3.addEventListener('click', function(){
        map.openInfoWindow(infoWindow3,point3); //开启信息窗口
    });
    //给标注添加文字标签
    var label_content3 = 
    "<div>"+
         "重庆江北机场"+
	"</div>"+
    "<div>"+
         "阴 7℃-14℃"+
	"</div>";
    var label3 = new BMap.Label(label_content3,{offset:new BMap.Size(20,-10)});
    marker3.setLabel(label3); 
</script>


