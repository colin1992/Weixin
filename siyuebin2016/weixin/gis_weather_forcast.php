<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
	<style type="text/css">
	body, html,#allmap {width: 100%;height: 100%;overflow: hidden;margin:0;font-family:"微软雅黑";}
	</style>
	<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=AxdexIP3psa6gdpvEuncEj4tNpG57VGG"></script>
    <script src="/echarts.js" type="text/javascript"></script>
	<title>天气预报</title>
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
	var point = new BMap.Point(105.7039270000,28.5966760000); 
	map.centerAndZoom(point, 15);
    //添加标注 设置个性化图标
    var myIcon = new BMap.Icon("http://img.qqhsh.com/uploads/allimg/150801/1-150P1111F4221.gif", new BMap.Size(50,50));
    var marker = new BMap.Marker(point,{icon:myIcon});  // 创建标注
    map.addOverlay(marker);               // 将标注添加到地图中
    //点击标注弹窗
    
     var opts = {
        width : 320,     // 信息窗口宽度
        height: 220,     // 信息窗口高度
        title : '' , // 信息窗口标题
        enableAutoPan : true //自动平移
    }
     var sContent =
	"<div id='container' style='height:220px;width:310px; solid #ccc;padding:10px;'>"+
    "</div>"
    ;

    var infoWindow = new BMap.InfoWindow(sContent,opts);  // 创建信息窗口对象
    marker.addEventListener('click', function(){     //这是该标注的点击事件
        map.openInfoWindow(infoWindow,point); //开启信息窗口
        var Chart1 = echarts.init(document.getElementById("container"));
		option = {
			//关闭动画
			animation: false,
			//绘制echarts
			title: {
				text: '',
				subtext: '未来7天天气'
			},
			legend: {
				data: ['最高气温', '最低气温']
			},
			xAxis: {
				type: 'category',
				boundaryGap: true,
				data: ["1201\n晴","1202\n大雨","1203\n小雪","1204\n晴","1205\n晴","1206\n晴","1207\n晴"]


			},
			yAxis: {
				type: 'value',
				axisLabel: {
					formatter: '{value} °C'
				}
			},
			series: [
				{
					name: '最高气温',
					type: 'line',
					label: {
						normal: {
							show: true,
							position: [0, -15],
							textStyle: {
								fontSize: 16,
								color: '#24559C',
							}
						}
					},
					data: [11,13,15,11,10,13,7]
				},
				{
					name: '最低气温',
					type: 'line',
					label: {
						normal: {
							show: true,
							position: [0,-15],
							textStyle: {
								fontSize: 16,
								color: '#000'

							}
						}
					},
					data: [1, -2, 2, 5, 3, 6, 0]

				}
			]
		};
		Chart1.setOption(option);
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
        width : 320,     // 信息窗口宽度
        height: 220,     // 信息窗口高度
        title : '' , // 信息窗口标题
        enableAutoPan : true //自动平移
    }
      var sContent2 = "<div id='12' style='height:220px;width:310px; solid #ccc;padding:10px;'>"+
					  "</div>";

    var infoWindow2 = new BMap.InfoWindow(sContent2,opts2);  // 创建信息窗口对象
    marker2.addEventListener('click', function(){
        map.openInfoWindow(infoWindow2,point2); //开启信息窗口
        var Chart2 = echarts.init(document.getElementById("12"));
        option = {
            //关闭动画
            animation: false,
            //绘制echarts
            title: {
                text: '',
                subtext: '未来7天天气'
            },
            legend: {
                data: ['最高气温', '最低气温']
            },
            xAxis: {
                type: 'category',
                boundaryGap: true,
                data: ["1201\n晴","1202\n大雨","1203\n小雪","1204\n晴","1205\n晴","1206\n晴","1207\n晴"]


            },
            yAxis: {
                type: 'value',
                axisLabel: {
                    formatter: '{value} °C'
                }
            },
            series: [
                {
                    name: '最高气温',
                    type: 'line',
                    label: {
                        normal: {
                            show: true,
                            position: [0, -15],
                            textStyle: {
                                fontSize: 16,
                                color: '#24559C',
                            }
                        }
                    },
                    data: [11,13,11,15,7,12,11]
                },
                {
                    name: '最低气温',
                    type: 'line',
                    label: {
                        normal: {
                            show: true,
                            position: [0, -15],
                            textStyle: {
                                fontSize: 16,
                                color: '#000'

                            }
                        }
                    },
                    data: [1, -2, 2, 5, 3, 6, 0]
                }
            ]
        };
        Chart2.setOption(option);
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
    
</script>


