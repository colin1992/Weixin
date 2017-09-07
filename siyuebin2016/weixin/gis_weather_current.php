<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
	<style type="text/css">
	body, html,#allmap {width: 100%;height: 100%;overflow: hidden;margin:0;font-family:"微软雅黑";}
	</style>
	<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=AxdexIP3psa6gdpvEuncEj4tNpG57VGG"></script>
	<title>实时天气信息</title>
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
	var point_center = new BMap.Point(105.8297640000,28.4776530000);  //暂时以丙安古镇为中心
	map.centerAndZoom(point_center, 11);

     
    /*
    参数依次为景点名称、经度、纬度、低温、高温、中暑指数、风寒指数、穿衣厚度指数、增减衣物指数、游泳指数、垂钓指数、洗车指数
    */
    function tourist_pot_marker(tourist_spot_name,longitude,latitude,low_temp,high_temp,heatstroke_index,cold_weather_index,dress_thickness_index,dress_change_index,swim_index,fish_index,wash_car_index) 
    {
        var opts = {
        width : 500,     // 信息窗口宽度
        height: 300,     // 信息窗口高度
        title : '' , // 信息窗口标题
        enableAutoPan : true //自动平移
    	}
     
        var sContent =
            "<h4 style='margin:0 0 5px 0;padding:0.2em 0'>"+tourist_spot_name+"</h4>"+  
            "<div>"+
            "气温："+low_temp+"℃--"+high_temp+"℃"+
            "</div>"+
            "<div>"+
            "夏季中暑指数："+heatstroke_index+
            "</div>"+
            "<div>"+
            "冬季风寒指数："+cold_weather_index+
            "</div>"+
        	"<div>"+
            "穿衣厚度指数："+dress_thickness_index+
            "</div>"+
            "<div>"+
            "增减衣指数："+dress_change_index+
        	"</div>"+
        	"<div>"+
        	"游泳指数："+swim_index+
        	"</div>"+
        	"<div>"+
            "垂钓指数："+fish_index+
            "</div>"+
        	"<div>"+
            "洗车指数："+wash_car_index+
            "</div>" ;
        //给标注添加文字标签
        var label_content = 
            "<div>"+
            tourist_spot_name+
            "</div>"+
            "<div>"+
            low_temp+"℃-"+high_temp+"℃"+
            "</div>";
        var point = new BMap.Point(longitude,latitude);
        var myIcon = new BMap.Icon("http://1.siyuebin2016.applinzi.com/pic/binganguzhen.png", new BMap.Size(50,50));
        var marker = new BMap.Marker(point,{icon:myIcon});  // 创建标注
        map.addOverlay(marker);               // 将标注添加到地图中
        var infoWindow = new BMap.InfoWindow(sContent,opts);  // 创建信息窗口对象
        marker.addEventListener('click', function(){
            map.openInfoWindow(infoWindow,point); //开启信息窗口
        });    
        var label = new BMap.Label(label_content,{offset:new BMap.Size(20,-20)});
        marker.setLabel(label); 
        
    }
    
    tourist_pot_marker("丙安古镇","105.8297640000","28.4776530000","5","14","基本不会中暑","冷","冬装，厚毛衣＋棉衣，厚毛衣＋呢外套","气温降幅不大，不需加衣","不太适宜游泳","气象条件较差，不太适宜垂钓","适宜");   
	tourist_pot_marker("赤水大瀑布","105.7524890000","28.3808180000","5","14","基本不会中暑","冷","冬装，厚毛衣＋棉衣，厚毛衣＋呢外套","气温降幅不大，不需加衣","不太适宜游泳","气象条件较差，不太适宜垂钓","适宜");
    tourist_pot_marker("四洞沟","105.6549480000","28.4747360000","5","14","基本不会中暑","冷","冬装，厚毛衣＋棉衣，厚毛衣＋呢外套","气温降幅不大，不需加衣","不太适宜游泳","气象条件较差，不太适宜垂钓","适宜");
    tourist_pot_marker("中国侏罗纪公园","106.0320180000","28.4486230000","5","14","基本不会中暑","冷","冬装，厚毛衣＋棉衣，厚毛衣＋呢外套","气温降幅不大，不需加衣","不太适宜游泳","气象条件较差，不太适宜垂钓","适宜");
    tourist_pot_marker("佛光岩景区","105.9759460000","28.3957170000","5","14","基本不会中暑","冷","冬装，厚毛衣＋棉衣，厚毛衣＋呢外套","气温降幅不大，不需加衣","不太适宜游泳","气象条件较差，不太适宜垂钓","适宜");
    tourist_pot_marker("燕子岩国家森林公园","105.7502050000","28.4317800000","5","14","基本不会中暑","冷","冬装，厚毛衣＋棉衣，厚毛衣＋呢外套","气温降幅不大，不需加衣","不太适宜游泳","气象条件较差，不太适宜垂钓","适宜");
    tourist_pot_marker("竹海国家森林公园","105.9970210000","28.4712670000","5","14","基本不会中暑","冷","冬装，厚毛衣＋棉衣，厚毛衣＋呢外套","气温降幅不大，不需加衣","不太适宜游泳","气象条件较差，不太适宜垂钓","适宜");
    tourist_pot_marker("大同古镇","105.6882490000","28.5133350000","5","14","基本不会中暑","冷","冬装，厚毛衣＋棉衣，厚毛衣＋呢外套","气温降幅不大，不需加衣","不太适宜游泳","气象条件较差，不太适宜垂钓","适宜");
    tourist_pot_marker("长江半岛","105.7274020000","28.5391370000","5","14","基本不会中暑","冷","冬装，厚毛衣＋棉衣，厚毛衣＋呢外套","气温降幅不大，不需加衣","不太适宜游泳","气象条件较差，不太适宜垂钓","适宜");
</script>


