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

    public function addAddress(){
        $provinceModel = M("province");
        $province = $provinceModel->select();
        $this->assign("province", $province);
        $cityModel = M();
        $city = $cityModel->table("city b")->where("a.provinceid = b.provinceid")->select();
        $this->assign("city", $city);
        $this->display();
    }

    public function signout(){
    	session(null);
    	$this->redirect("Signup/signin");
    }
}