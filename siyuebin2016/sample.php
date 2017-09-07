<?php
require_once "jssdk.php";
$yourAppID = "wxe3f4842d07c10700";
$yourAppSecret = "ae509d84af07d7ababeb61a003a73aa6";
$jssdk = new JSSDK($yourAppID, $yourAppSecret);
$signPackage = $jssdk->GetSignPackage();

/*
$agent = strtolower($_SERVER['HTTP_USER_AGENT']);
if (strpos($agent, 'tencenttraveler') === false){
  echo " 非微信浏览";
} else {
  echo "是，查看原网页";
}*/

?>
<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0"/>
  <title></title>
</head>
<body>
  <div>
    分享到朋友圈！
  </div>
</body>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
  /*
   * 注意：
   * 1. 所有的JS接口只能在公众号绑定的域名下调用，公众号开发者需要先登录微信公众平台进入“公众号设置”的“功能设置”里填写“JS接口安全域名”。
   * 2. 如果发现在 Android 不能分享自定义内容，请到官网下载最新的包覆盖安装，Android 自定义分享接口需升级至 6.0.2.58 版本及以上。
   * 3. 常见问题及完整 JS-SDK 文档地址：http://mp.weixin.qq.com/wiki/7/aaa137b55fb2e0456bf8dd9148dd613f.html
   *
   * 开发中遇到问题详见文档“附录5-常见错误及解决办法”解决，如仍未能解决可通过以下渠道反馈：
   * 邮箱地址：weixin-open@qq.com
   * 邮件主题：【微信JS-SDK反馈】具体问题
   * 邮件内容说明：用简明的语言描述问题所在，并交代清楚遇到该问题的场景，可附上截屏图片，微信团队会尽快处理你的反馈。
   */
  wx.config({
    debug: true,
    appId: '<?php echo $signPackage["appId"];?>',
    timestamp: <?php echo $signPackage["timestamp"];?>,
    nonceStr: '<?php echo $signPackage["nonceStr"];?>',
    signature: '<?php echo $signPackage["signature"];?>',
    jsApiList: [
      // 所有要调用的 API 都要加到这个列表中
      'onMenuShareTimeline'
    ]
  }) ;
  wx.ready(function () {
    // 在这里调用 API
            wx.onMenuShareTimeline({
    title: '测试分享的标题', // 分享标题
    link: 'http://baike.baidu.com/link?url=usWMlmVSEeQIqzN9ir-RINMkyViz_bOI9FkP9CYUK63rm6MGqE-O1KrCPGfGS4PlM0nLUoTvcMJGVOJwFLGlOiaExVPlUFh1Zco5dMWjnfe', // 分享链接
    imgUrl: 'http://f.hiphotos.baidu.com/baike/c0%3Dbaike150%2C5%2C5%2C150%2C50/sign=6c4a0179b119ebc4d4757ecbe34fa499/6f061d950a7b02086e8f01fd60d9f2d3572cc863.jpg', // 分享图标
    success: function () { 
        // 用户确认分享后执行的回调函数
        alert("分享成功");
    },
    cancel: function () { 
        // 用户取消分享后执行的回调函数
        alert("分享失败");
    }
});
  });
</script>
</html>
