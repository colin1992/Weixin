<?php
define("APPID", "wxe3f4842d07c10700");
define("APPSECRET", "ae509d84af07d7ababeb61a003a73aa6");
 
$token_access_url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=" . APPID . "&secret=" . APPSECRET;
$res = file_get_contents($token_access_url); //获取文件内容或获取网络请求的内容/
$result = json_decode($res, true); //接受一个 JSON 格式的字符串并且把它转换为 PHP 变量
$access_token = $result["access_token"];
echo $access_token;
//echo $res;
?>