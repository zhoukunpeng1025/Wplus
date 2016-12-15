<?php
namespace Home\Controller;
use Think\Controller;
class NowaitController extends Controller {
    public function requestlist(){
    	//1获取数据
    	$Model=M('order'); 
        //连接数据表
    	$order=$Model->join('address ON order.addressid = address.id')->join('user ON order.makerid = user.id');
        // $where =$Model['purchaserid']=array('EQ','NULL'); 
        //添加购买者id为空，表示不等待订单
        $order=$order->where('purchaserid is not null');
        $order=$order->select();

        for($i = 0; $i < count($order); $i++) {
            $order[$i]["ingredients"] = explode("&", $order[$i]["ingredients"]);
            $order[$i]["amount"] = explode("&", $order[$i]["amount"]);
        }

        //2分配数据
    	$this->assign("orders",$order);
      
    	//3显示视图
    	$this->display();
    }

    public function basketlist(){
        //菜篮中别人的东西
        $Model=M('order');
        $order=$Model->join('address ON order.addressid = address.id')->join('user ON order.makerid = user.id');
        $order=$order->where('purchaserid = 2 AND purchaserid <> makerid'  );
        $order=$order->select();
        for($i = 0; $i < count($order); $i++) {
            $order[$i]["ingredients"] = explode("&", $order[$i]["ingredients"]);
            $order[$i]["amount"] = explode("&", $order[$i]["amount"]);
        }
        $this->assign("orders",$order);
        //菜篮中自己的订单
        $Model1=M('order');
        $order1=$Model1->join('address ON order.addressid = address.id')->join('user ON order.makerid = user.id');
        $order1=$order1->where('purchaserid = 2 AND purchaserid = makerid');
        $order1=$order1->select();
        for($i = 0; $i < count($order1); $i++) {
            $order1[$i]["ingredients"] = explode("&", $order1[$i]["ingredients"]);
            $order1[$i]["amount"] = explode("&", $order1[$i]["amount"]);
        }
        // var_dump($order1);
         $this->assign("orders1",$order1);
        //3显示视图
        $this->display();

    }

}