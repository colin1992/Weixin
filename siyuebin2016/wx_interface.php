<?php
/**
  * wechat php test
  */

//define your token
define("TOKEN", "weixin");
$wechatObj = new wechatCallbackapiTest();  //实例化一个类
if($_GET["echostr"]) //获得了这个参数，表明还没有接入
{
	$wechatObj->valid(); //执行这个类下面的valid()方法
}
else
{
	$wechatObj->responseMsg();
}


class wechatCallbackapiTest
{
	public function valid()
    {
        $echoStr = $_GET["echostr"];//判断是否接入的操作

        //valid signature , option
        if($this->checkSignature()){
            header('content-type:text');
        	echo $echoStr;
        	exit;
        }
    }

    public function responseMsg()
    {
		//get post data, May be due to the different environments
		$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

      	//extract post data
		if (!empty($postStr)){
                /* libxml_disable_entity_loader is to prevent XML eXternal Entity Injection,
                   the best way is to check the validity of xml by yourself */
                libxml_disable_entity_loader(true);
              	$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);//将收到的xml数据转化成对象$postObj
				/*下面获得这个对象内部的成员变量*/
                $fromUsername = $postObj->FromUserName;
                $toUsername = $postObj->ToUserName;
                $keyword = trim($postObj->Content);
            	$Event = $postObj->Event; //获取event
				$EventKey = $postObj->EventKey;
                $time = time();
				//下面的textTpl是文字回复的xml格式，具体在开发者文档中可以获取
                $textTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Content><![CDATA[%s]]></Content>
							<FuncFlag>0</FuncFlag>
							</xml>";  
			    //下面是关于菜单触发事件的回复 点击天气预警回复图文信息
				if($Event == "CLICK"&&$EventKey=="WARN_INFO")
				 {
				 	$textTpl ="<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[news]]></MsgType>
							<ArticleCount>1</ArticleCount>
							<Articles>
							<item>
							<Title><![CDATA[天气预警]]></Title> 
							<Description><![CDATA[预警信息通知]]></Description>
							<PicUrl><![CDATA[http://pics.mama.cn/attachment/bk/con_pic/20150605/1433498232_51157.jpg]]></PicUrl>
							<Url><![CDATA[http://1.siyuebin2016.applinzi.com/warn_sample.php]]></Url>
							</item>
							</Articles>
							</xml>";
                	$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time);
                	echo $resultStr;
				 }
				//下面是对于订阅事件的回复
            	if($Event=="subscribe")
                {
					$textTpl ="<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[news]]></MsgType>
							<ArticleCount>1</ArticleCount>
							<Articles>
							<item>
							<Title><![CDATA[欢迎来到赤水]]></Title> 
							<Description><![CDATA[赤水风景名胜区是国务院唯一以行政区名称命名的国家级风景名胜区，素有“千瀑之市”、“丹霞之冠”、“竹子之乡”、“桫椤王国”的之誉。]]></Description>
							<PicUrl><![CDATA[http://ugc.qpic.cn/baikepic2/0/ori-20150417151428-453852848.jpg/800]]></PicUrl>
							<Url><![CDATA[http://baike.baidu.com/link?url=Q3nEDlC8NeaBsremq-EX014vclTpARavsCStmN1LOSwrpUzIdbH5Lha9afOOQzMJip4Xx8xg9PysHtpPSQ4zv6M0OgU3MGrrP0unEwGfMJRaAVHQ5FBfpYm1daxBNq3RjwrXtJZGRvAyg9cN1_UGLE7puQs9L3rdlPFiPSkL1ab15yctCp76Gs42j7wINJdbNDc5iWh-SWVkpKOe39bfWYkIq_rAY-eptykPV5JiNL_OYpPLUJ7RZcooF-m-mSfh_4zQUQPhIok_JroADc2ZNa]]></Url>
							</item>
							</Articles>
							</xml>";
                	$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time);
                	echo $resultStr;
                }
				//下面是对于关键字的回复 http://www.weather.com.cn/weather/101260208.shtml
				if(!empty( $keyword ))
                {
                    if($keyword=="天气")
                        {
                    		$textTpl ="<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[news]]></MsgType>
							<ArticleCount>1</ArticleCount>
							<Articles>
							<item>
							<Title><![CDATA[赤水天气]]></Title> 
							<Description><![CDATA[赤水天气信息]]></Description>
							<PicUrl><![CDATA[http://ugc.qpic.cn/baikepic2/0/ori-20150417151428-453852848.jpg/800]]></PicUrl>
							<Url><![CDATA[http://www.weather.com.cn/weather/101260208.shtml]]></Url>
							</item>
							</Articles>
							</xml>";
                			$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time);
                			echo $resultStr;
                        }
                    else
                    {
                    		$msgType = "text";
                   		    $contentStr = "请回复以下有效关键字！
                            			1.天气";
                			$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                			echo $resultStr;
                    }
              		
                }else{
                	echo "Input something...";
                }

        }else {
        	echo "";
        	exit;
        }
    }
		
	private function checkSignature()
	{
        // you must define TOKEN by yourself
        if (!defined("TOKEN")) {
            throw new Exception('TOKEN is not defined!');
        }
        
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
        		
		$token = TOKEN;
		$tmpArr = array($token, $timestamp, $nonce);
        // use SORT_STRING rule
		sort($tmpArr, SORT_STRING);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );
		
		if( $tmpStr == $signature ){
			return true;
		}else{
			return false;
		}
	}
}

?>