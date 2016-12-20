<?php
namespace Home\Controller;
use Think\Controller;
class SignupController extends Controller {
	public function signin(){
		$this->display();
	}

	public function doSign(){
		if (IS_POST) {
			session(null);

			$userModel = M("user");

			$condition = array(
				"phonenum" => I("post.phonenum"),
				"password" => I("post.password")
			);
			$result = $userModel->where($condition)->count();
			$username = $userModel->where($condition)->getField("username");
			$id = $userModel->where($condition)->getField("id");

			if ($result > 0) {
				$_SESSION['username'] = $username;
				$_SESSION['id'] = $id;

				$this->redirect("Index/index");
			}
		}
	}

    public function signup(){
		$this->display();
	}

    public function sendMsg(){
    	// 此功能需要开启php_curl.dll扩展
		
		if(IS_POST){
			session(null);
			
			$phonenum = I("post.phonenum");
			$verifycode = strval(rand(100000,999999)); // 随机一个六位验证码
			$_SESSION['phonenum'] = $phonenum;
			$_SESSION['verifycode'] = $verifycode;
			// dump($_SESSION);

			// $appkey = "23564641";
			// $secret = "00816798fbc0c004f6b35851a56b236a";
			// vendor('Dayu.top.TopClient');
			// vendor('Dayu.top.ResultSet');
			// vendor('Dayu.top.RequestCheckUtil');
			// vendor('Dayu.top.TopLogger');
			// vendor('Dayu.top.request.AlibabaAliqinFcSmsNumSendRequest'); 
			// $c = new \TopClient;
			// $c->appkey = $appkey;
			// $c->secretKey = $secret;
			// $req = new \AlibabaAliqinFcSmsNumSendRequest;
			// $req->setExtend("");
			// $req->setSmsType("normal");
			// $req->setSmsFreeSignName("味+");
			// $req->setSmsParam("{number:'$verifycode'}");
			// $req->setRecNum("$phonenum");
			// $req->setSmsTemplateCode("SMS_33855075");
			// $resp = $c->execute($req);

			// dump($resp->result->success);
			// if($resp->result->success == "true") {
			if(true){
				// 发送成功
				$this->redirect("Signup/verify");
			}
		}
	}
	public function verify(){
		$this->display();
	}

	public function doVerify(){
		if(IS_POST) {		
			if(I("post.verifycode") == I("session.verifycode")){
				// 验证成功
				$this->redirect("Signup/setting");
			}
			else {
				// 验证失败，toast提示
				// echo "<script>alert('输入错误，请重新输入')</script>";
				// return false;
			}
		}
	}

	public function setting(){
		$this->display();
	}

	public function doSet(){
		if (IS_POST) {
			$username = I("post.username");
			$password = I("post.password");

			$data = $_POST;
			$data['phonenum'] = I("session.phonenum");

			$userModel = M("user");
			if($userModel->add($data)) {
				// 未测试
				$_SESSION['username'] = $username;
				$id = $userModel->where("username=$username")->getField("id");
				$_SESSION['id'] = $id;

				$this->redirect("Index/index");
			}
		}
	}
}