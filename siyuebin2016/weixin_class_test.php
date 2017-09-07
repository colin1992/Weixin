<?php
require_once "weixin_class_sdk.php";
$yourAppID = "wxe3f4842d07c10700";
$yourAppSecret = "ae509d84af07d7ababeb61a003a73aa6";
$weixin_sdk = new class_weixin_adv($yourAppID, $yourAppSecret);
//echo $weixin_sdk->test();
//print_r($weixin_sdk->get_materia_count());
//echo $weixin_sdk->get_user_info("oRP3zvtJ4zzF4PXdqGdO0vI-JMxI");

//$thumb_media = $weixin_sdk->test();
//$thumb_media_id = $thumb_media['thumb_media_id'];
/*
$data = '{
  "articles": [{
       "title": "测试标题",
       "thumb_media_id":"YDt-2yT3gcp2KoSZS-cjsRkJSjNNzKXCrIl50it9wC-WkLlJKyP1VD-RqdroT-ck",
       "author": "司跃宾",
       "digest": "概要",
       "show_cover_pic": 1,
       "content": "恭喜你，成功了",
       "content_source_url": ""
    }
 ]
}';
print_r($weixin_sdk->create_materia($data));*/
print_r($weixin_sdk->test());
print_r($weixin_sdk->get_materia_count());
/*
$data = '{
   "filter":{
      "is_to_all":true
   },
   "text":{
      "content":"测试群发"
   },
    "msgtype":"text"
}';
print_r($weixin_sdk->send_to_all($data));
*/
//print_r($weixin_sdk->test());
//print_r($weixin_sdk->create_materia());
//$type = "thumb";
//$file = "test_pic.png";
//print_r(upload_media($type, $file));
?>