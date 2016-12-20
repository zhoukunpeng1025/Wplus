<?php
namespace Home\Controller;
use Think\Controller;
class MeController extends Controller {
    public function index(){
        $Model = M();
        $name = I("session.username");
        $orderform = $Model->table("orderform a,user b")->where("a.makerid = b.id")->limit(10)->select();
        // dump($order);
        $this->assign("order", $orderform);
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