<?php
namespace Home\Controller;
use Think\Controller;
class SignupController extends Controller {
    public function signup1(){
		$this->display();
	}

    public function sendMsg(){
		$appkey = "23564641";//你的App key
		$secret = "00816798fbc0c004f6b35851a56b236a";//你的App Secret: 
		vendor('Dayu.top.TopClient');
		vendor('Dayu.top.ResultSet');
		vendor('Dayu.top.RequestCheckUtil');
		vendor('Dayu.top.TopLogger');
		vendor('Dayu.top.request.AlibabaAliqinFcSmsNumSendRequest'); 
		$c = new TopClient;
		$c->appkey = $appkey;
		$c->secretKey = $secret;
		$req = new AlibabaAliqinFcSmsNumSendRequest;
		$req->setExtend("");
		$req->setSmsType("normal");
		$req->setSmsFreeSignName("味+");
		session_start();
		$verifycode = strval(rand(100000,999999));
		$_SESSION['verifycode'] = $verifycode;
		$req->setSmsParam(json_encode($smsParams));
		$phonenum = I("post.phonenum");
		$_SESSION['phonenum'] = $phonenum;
		$req->setRecNum($phonenum);
		$req->setSmsTemplateCode("SMS_33855075");
		$resp = $c->execute($req);
		var_dump($resp);
}