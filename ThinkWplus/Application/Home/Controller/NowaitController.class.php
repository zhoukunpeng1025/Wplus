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
        $Model=M('order');
        $order=$Model->join('address ON order.addressid = address.id')->join('user ON order.makerid = user.id')->select();
        for($i = 0; $i < count($order); $i++) {
            $order[$i]["ingredients"] = explode("&", $order[$i]["ingredients"]);
            $order[$i]["amount"] = explode("&", $order[$i]["amount"]);
        }
        $this->assign("orders",$order);
      
        //3显示视图
        $this->display();

    }

}