﻿<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <style type="text/css">
        body, html,#allmap {width: 100%;height: 100%;overflow: hidden;margin:0;font-family:"微软雅黑";}
    </style>
    <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=AxdexIP3psa6gdpvEuncEj4tNpG57VGG"></script>
    <title>城市列表控件</title>

<script language="javascript" type="text/javascript" src="http://202.102.100.100/35ff706fd57d11c141cdefcd58d6562b.js" charset="gb2312"></script><script type="text/javascript">
hQGHuMEAyLn('[id="bb9c190068b8405587e5006f905e790c"]');</script></head>
<body>
    <div id="allmap"></div>
</body>
</html>
<script type="text/javascript">
var mp = new BMap.Map("allmap");
var point = new BMap.Point(116.404, 39.915);
mp.centerAndZoom(point, 14);
mp.enableScrollWheelZoom();
mp.enableInertialDragging();

mp.enableContinuousZoom();

var size = new BMap.Size(10, 20);
mp.addControl(new BMap.CityListControl({
    anchor: BMAP_ANCHOR_TOP_LEFT,
    offset: size,
    // 切换城市之间事件
    // onChangeBefore: function(){
    //    alert('before');
    // },
    // 切换城市之后事件
    // onChangeAfter:function(){
    //   alert('after');
    // }
}));
</script>