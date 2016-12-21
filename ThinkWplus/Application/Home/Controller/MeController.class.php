<?php
namespace Home\Controller;
use Think\Controller;
class MeController extends Controller {
    public function index(){
        $Model = M();
        $name = I("session.username");
        $id = I("session.id");

        // 当前用户发布的订单
        $make = $Model->table("orderform a, user b, user c")->where("a.makerid = b.id and a.purchaserid = c.id and b.id = $id and a.purchaserid is not null")->limit(10)->select();
        // dump($make);

        // 当前用户代买的订单
        $pur = $Model->table("orderform a, user b, user c")->where("a.makerid = c.id and a.purchaserid = b.id and b.id = $id")->limit(10)->select();
        // dump($pur);
        
        $this->assign("make", $make);
        $this->assign("pur", $pur);
        $this->display();
    }

    public function setting(){
        $this->display();
    }

    public function personal(){
        $this->display();
    }

    public function address(){
        $Model = M();
        $id = I("session.id");
        $address = $Model->table("address a, user b")->where("a.userid = b.id and b.id = $id")->select();
        $this->assign("address", $address);
        $this->display();
    }

    // 功能未实现
    public function getCity($id){
        $cityModel = M("city");
        $city = $cityModel->where("provinceid = $id")->select();
        dump($city);
    }

    // 功能未实现
    public function addAddress(){
        // $provinceModel = M("province");
        // $province = $provinceModel->select();
        // $this->assign("province", $province);

        // $provName = I("post.province");
        // dump($provName);
        // $provId = $provinceModel->where("province = $provName")->getField("provinceid");
        // $cityModel = M("city");
        // $city = $cityModel->where("provinceid = $provId")->select();
        // $this->assign("city", $city);

        $this->display();
    }

    public function doAdd(){
        if(IS_POST){    
            $userid = I("session.id");
            // 前台没写输入手机号码，所以此处的手机号是获取的用户注册的手机号
            $phonenum = M("user")->where("id = $userid")->getField("phonenum");

            $addressModel = M("address");
            $data = $_POST;
            $data['userid'] = $userid;
            $data['phonenum'] = $phonenum;
            // dump($data);

            if($addressModel->add($data)){
                $this->redirect("Me/address");
            }
        }
    }

    public function signout(){
    	session(null);
    	$this->redirect("Signup/signin");
    }
}