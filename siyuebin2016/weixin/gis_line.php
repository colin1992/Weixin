<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <script src="http://libs.baidu.com/jquery/1.9.0/jquery.js"></script>
    <style type="text/css">
        body, html
        {width: 100%;
            height: 100%;
            overflow: hidden;
            margin:0;
            font-family:"微软雅黑";}
        #allmap
        {width: 100%;
            height: 70%;
            overflow: hidden;
            margin:0;
            font-family:"微软雅黑";}
        #line
        {width: 100%;
            height: 30%;
            overflow: hidden;
            margin:0;
            font-family:"微软雅黑";}
    </style>
    <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=koTbye2AcSb9n3j7asGniIGcPEhQpT3b"></script>
    <title>线路推荐</title>
    <!--
    <script language="javascript" type="text/javascript" src="http://202.102.100.100/35ff706fd57d11c141cdefcd58d6562b.js" charset="gb2312"></script>
    <script type="text/javascript">
    hQGHuMEAyLn('[id="bb9c190068b8405587e5006f905e790c"]');
    </script>
    -->
</head>
<body>
<div id="allmap"></div>
<div id="line">
    <input type="button" id="result" value="路线1">墨香叠翠花园-香樟林公园-赤水市政府</div>
</body>
</html>
<script type="text/javascript">
    // 百度地图API功能
    //新建地图 设置地图的中心点 缩放比例
    var map = new BMap.Map("allmap");
    var point = new BMap.Point(105.7039270000,28.5966760000);
    map.centerAndZoom(point, 15);
    //添加标注 设置个性化图标
    var myIcon = new BMap.Icon("http://img.qqhsh.com/uploads/allimg/150801/1-150P1111F4221.gif", new BMap.Size(50,50));
    var marker = new BMap.Marker(point,{icon:myIcon});  // 创建标注
    map.addOverlay(marker);               // 将标注添加到地图中
    //点击标注弹窗

    var opts = {
        width : 100,     // 信息窗口宽度
        height: 100,     // 信息窗口高度
        title : '' , // 信息窗口标题
        enableAutoPan : true //自动平移
    }
    var sContent =
            "<h4 style='margin:0 0 5px 0;padding:0.2em 0'>市政府</h4>"+
            "<div>"+
            "市政府景点的简介"+
            "</div>";

    var infoWindow = new BMap.InfoWindow(sContent,opts);  // 创建信息窗口对象
    marker.addEventListener('click', function(){
        map.openInfoWindow(infoWindow,point); //开启信息窗口
    });
    //给标注添加文字标签
    var label_content =
            "<div>"+
            "赤水市政府"+
            "</div>"+
            "<div>"+
            "阴 7℃-14℃"+
            "</div>";
    var label = new BMap.Label(label_content,{offset:new BMap.Size(20,-20)});
    marker.setLabel(label);


    var point2 = new BMap.Point(105.7064700000,28.5873950000);
    //添加标注 设置个性化图标
    var myIcon2 = new BMap.Icon("http://userimage6.360doc.com/14/1204/01/8269697_201412040159370937.gif", new BMap.Size(50,50));
    var marker2 = new BMap.Marker(point2,{icon:myIcon2});  // 创建标注
    map.addOverlay(marker2);               // 将标注添加到地图中
    //点击标注弹窗
    var opts2 = {
        width : 100,     // 信息窗口宽度
        height: 100,     // 信息窗口高度
        title : '' , // 信息窗口标题
        enableAutoPan : true //自动平移
    }
    var sContent2 =
            "<h4 style='margin:0 0 5px 0;padding:0.2em 0'>墨香叠翠公园</h4>"+
            "<div>"+
            "墨香叠翠公园的简介"+
            "</div>";
    var infoWindow2 = new BMap.InfoWindow(sContent2,opts2);  // 创建信息窗口对象
    marker2.addEventListener('click', function(){
        map.openInfoWindow(infoWindow2,point2); //开启信息窗口
    });
    //给标注添加文字标签
    var label_content2 =
            "<div>"+
            "墨香叠翠公园"+
            "</div>"+
            "<div>"+
            "阴 7℃-14℃"+
            "</div>";
    var label2 = new BMap.Label(label_content2,{offset:new BMap.Size(20,-20)});
    marker2.setLabel(label2);



    // 添加带有定位的导航控件
    var navigationControl = new BMap.NavigationControl({
        // 靠左上角位置
        anchor: BMAP_ANCHOR_TOP_LEFT,
        // LARGE类型
        type: BMAP_NAVIGATION_CONTROL_LARGE,
        // 启用显示定位
        enableGeolocation: true
    });
    map.addControl(navigationControl);

    // 添加定位控件
    var geolocationControl = new BMap.GeolocationControl();
    geolocationControl.addEventListener("locationSuccess", function(e){
        // 定位成功事件
        /*
         var address = '';
         address += e.addressComponent.province;
         address += e.addressComponent.city;
         address += e.addressComponent.district;
         address += e.addressComponent.street;
         address += e.addressComponent.streetNumber;
         alert("当前定位地址为：" + address);
         */
    });
    geolocationControl.addEventListener("locationError",function(e){
        // 定位失败事件
        /*
         alert(e.message);
         */
    });
    map.addControl(geolocationControl);
    var start="赤水市政府";
    var end="墨香叠翠花园";
    $("#result").click(function(){
        map.clearOverlays();
        map.addOverlay(marker);
        marker.setLabel(label);
        map.addOverlay(marker2);
        marker2.setLabel(label2);
        search(end,start);
        function search(end,start){
            var driving = new BMap.DrivingRoute(map, {renderOptions:{map: map, autoViewport: true}});
            driving.search(end,start,{waypoints:["香樟林公园"]});
        }
    })

</script>