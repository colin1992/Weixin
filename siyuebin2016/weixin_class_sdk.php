﻿<?php
/*
    方倍工作室 http://www.cnblogs.com/txw1958/
    CopyRight 2014 www.doucube.com All Rights Reserved
*/

class class_weixin_adv
{
    var $appid = "";
    var $appsecret = "";

    //构造函数，获取Access Token
    public function __construct($appid = NULL, $appsecret = NULL)
    {
        if($appid){
            $this->appid = $appid;
        }
        if($appsecret){
            $this->appsecret = $appsecret;
        }

        //hardcode
        $this->lasttime = 1395049256;
        $this->access_token = "nRZvVpDU7LxcSi7GnG2LrUcmKbAECzRf0NyDBwKlng4nMPf88d34pkzdNcvhqm4clidLGAS18cN1RTSK60p49zIZY4aO13sF-eqsCs0xjlbad-lKVskk8T7gALQ5dIrgXbQQ_TAesSasjJ210vIqTQ";

        if (time() > ($this->lasttime + 7200)){
            $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$this->appid."&secret=".$this->appsecret;
            $res = $this->https_request($url);
            $result = json_decode($res, true);
            //save to Database or Memcache
            $this->access_token = $result["access_token"];
            $this->lasttime = time();
        }
    }

    public function test()
    {
    	$type = "image";
        $filepath = dirname(_FILE_)."/test_pic.png";
        $filedata = array("media"  => "@".$filepath);
        $url = "http://file.api.weixin.qq.com/cgi-bin/media/upload?access_token=".$this->access_token."&type=".$type;
    	$res = $this->https_request($url, $filedata);
        return json_decode($res, true);
    }
    //获取关注者列表 $next_openid是指获取的列表是指从这个id之后的所有的人员，如果这个入口参数不填写的话，则默认获取整个列表，这个时候的$next_openid就是最后一个人员的openid了。
    public function get_user_list($next_openid = NULL)
    {
        $url = "https://api.weixin.qq.com/cgi-bin/user/get?access_token=".$this->access_token."&next_openid=".$next_openid;
        $res = $this->https_request($url);  
        return json_decode($res, true);
    }

    //获取用户基本信息
    public function get_user_info($openid)
    {
        $url = "https://api.weixin.qq.com/cgi-bin/user/info?access_token=".$this->access_token."&openid=".$openid."&lang=zh_CN";
        $res = $this->https_request($url);
        return json_decode($res, true);
    }

    //创建菜单
    public function create_menu($data)
    {
        $url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$this->access_token;
        $res = $this->https_request($url, $data);
        return json_decode($res, true);
    }

    //获取菜单
    public function get_menu()
    {
        $url = "https://api.weixin.qq.com/cgi-bin/menu/get?access_token=".$this->access_token;
        $res = $this->https_request($url);
        return json_decode($res, true);
    }
    
    //创建素材
    public function create_materia()
    {
    	$url = "https://api.weixin.qq.com/cgi-bin/material/add_news?access_token=".$this->access_token;
        $filepath = dirname(_FILE_)."/test_pic.png";
        $filedata = array("media"  => "@".$filepath);
        $res = $this->https_request($url, $filedata);
        return json_decode($res, true);
    }
    
    //得到素材的总数量
    public function get_materia_count()
    {
    	$url = "https://api.weixin.qq.com/cgi-bin/material/get_materialcount?access_token=".$this->access_token;
        $res = $this->https_request($url);
        return json_decode($res, true);
    }
    
    //群发消息 
    public function send_to_all($data)
    {
    	$url = "https://api.weixin.qq.com/cgi-bin/message/mass/sendall?access_token=".$this->access_token;
        $res = $this->https_request($url, $data);
        return json_decode($res, true);
    }
    
    
    //发送客服消息，已实现发送文本，其他类型可扩展
    public function send_custom_message($touser, $type, $data)
    {
        $msg = array('touser' =>$touser);
        switch($type)
        {
            case 'text':
                $msg['msgtype'] = 'text';
                $msg['text']    = array('content'=> urlencode($data));
                break;
        }
        $url = "https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token=".$this->access_token;
        return $this->https_request($url, urldecode(json_encode($msg)));
    }

    //生成参数二维码
    public function create_qrcode($scene_type, $scene_id)
    {
        switch($scene_type)
        {
            case 'QR_LIMIT_SCENE': //永久
                $data = '{"action_name": "QR_LIMIT_SCENE", "action_info": {"scene": {"scene_id": '.$scene_id.'}}}';
                break;
            case 'QR_SCENE':       //临时
                $data = '{"expire_seconds": 1800, "action_name": "QR_SCENE", "action_info": {"scene": {"scene_id": '.$scene_id.'}}}';
                break;
        }
        $url = "https://api.weixin.qq.com/cgi-bin/qrcode/create?access_token=".$this->access_token;
        $res = $this->https_request($url, $data);
        $result = json_decode($res, true);
        return "https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket=".urlencode($result["ticket"]);
    }
    
    //创建分组
    public function create_group($name)
    {
        $data = '{"group": {"name": "'.$name.'"}}';
        $url = "https://api.weixin.qq.com/cgi-bin/groups/create?access_token=".$this->access_token;
        $res = $this->https_request($url, $data);
        return json_decode($res, true);
    }
    
    //移动用户分组
    public function update_group($openid, $to_groupid)
    {
        $data = '{"openid":"'.$openid.'","to_groupid":'.$to_groupid.'}';
        $url = "https://api.weixin.qq.com/cgi-bin/groups/members/update?access_token=".$this->access_token;
        $res = $this->https_request($url, $data);
        return json_decode($res, true);
    }
    
    //上传多媒体文件
    public function upload_media($type, $file)
    {
        $data = array("media"  => "@".dirname(__FILE__).'\\'.$file);
        $url = "http://file.api.weixin.qq.com/cgi-bin/media/upload?access_token=".$this->access_token."&type=".$type;
        $res = $this->https_request($url, $data);
        return json_decode($res, true);
    }

    //https请求（支持GET和POST）
    protected function https_request($url, $data = null)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        if (!empty($data)){
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curl);
        curl_close($curl);
        return $output;
    }
}
?>