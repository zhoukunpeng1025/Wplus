<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	$menuNumModel = M(recipe);
    	$menuNum = $menuNumModel->count();
    	$this->assign('menuNum',$menuNum);

    	$vedioNumModel = M(state);
    	$vedioNum = $vedioNumModel->count();
    	$this->assign('vedioNum',$vedioNum);

    	$workNumModel = M(feedback);
    	$workNum = $workNumModel->count();
    	$this->assign('workNum',$workNum);

    	$userNumModel = M(user);
    	$userNum = $userNumModel->count();
    	$this->assign('userNum',$userNum);
        
        $time=date(Y)-0;
        $articleNumModel = M(article);
        $condition['time'] = array('like',"$time%");
        $articleNum = $articleNumModel->where($condition)->count();
        $this->assign('articleNum',$articleNum);
        
        $time6=date(Y)-1;
        $condition['time'] = array('like',"$time6%");
        $articleNum6 = $articleNumModel->where($condition)->count();
        $this->assign('articleNum6',$articleNum6);

        $time5=date(Y)-2;
        $condition['time'] = array('like',"$time5%");
        $articleNum5 = $articleNumModel->where($condition)->count();
        $this->assign('articleNum5',$articleNum5);

        $time4=date(Y)-3;
        $condition['time'] = array('like',"$time4%");
        $articleNum4 = $articleNumModel->where($condition)->count();
        $this->assign('articleNum4',$articleNum4);

        $time3=date(Y)-4;
        $condition['time'] = array('like',"$time3%");
        $articleNum3 = $articleNumModel->where($condition)->count();
        $this->assign('articleNum3',$articleNum3);

        $time2=date(Y)-5;
        $condition['time'] = array('like',"$time2%");
        $articleNum2 = $articleNumModel->where($condition)->count();
        $this->assign('articleNum2',$articleNum2);

        $time1=date(Y)-6;
        $condition['time'] = array('like',"$time1%");
        $articleNum1 = $articleNumModel->where($condition)->count();
        $this->assign('articleNum1',$articleNum1);
       ;

        // data : ['50前', '50后', '60后', '70后', '80后', '90后', '00后']

  
        $this->display();
    }
}