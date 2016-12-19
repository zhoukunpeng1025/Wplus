<?php
namespace Home\Controller;
use Think\Controller;
class NowaitController extends Controller {
    public function requestlist(){
    	//1获取数据
    	$Model=M('orderform'); 
        //连接数据表
    	$order=$Model->join('address ON orderform.addressid = address.id')->join('user ON orderform.makerid = user.id');
        // $where =$Model['purchaserid']=array('EQ','NULL'); 
        //添加购买者id为空，表示不等待订单
        $order=$order->where('purchaserid is null');
        $order=$order->select();
        // var_dump($order);

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
    public function destroy(){
        //删除菜篮中的订单，回到不等待中
        $Model=M('order');
        $id=I('id');
         //var_dump($id); //string(1) "4"
        // $order=$Model->join('address ON order.addressid = address.id')->join('user ON order.makerid = user.id');
         $order=$Model->where("id=$id")->find(); 
          // $order=$order->select();
        // var_dump($order['purchaserid']);
        $order['purchaserid']=null;
        if($Model->save($order)){
            $this->success('删除成功','basketlist');
          }else{
            $this->error('删除失败');
          }    

    }
    public function get(){
        //领取不等待中的订单，变到自己菜篮中
         $Model=M('order');
        $id=I('id');
         // var_dump($id); //string(1) "4"
        // $order=$Model->join('address ON order.addressid = address.id')->join('user ON order.makerid = user.id');
         $order=$Model->where("id=$id")->find(); 
        // var_dump($order);
        $order['purchaserid']=2;
        if($Model->save($order)){
            $this->success('领取成功','requestlist');
          }else{
            $this->error('领取失败');
          }    

    }
}