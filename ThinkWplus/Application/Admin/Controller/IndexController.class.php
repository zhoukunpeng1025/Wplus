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
        $hms=date("H:i:s");
        $hms6=date("H:i:s",strtotime("-1 seconds"));
        $hms5=date("H:i:s",strtotime("-2 seconds"));
        $hms4=date("H:i:s",strtotime("-3 seconds"));
        $hms3=date("H:i:s",strtotime("-4 seconds"));
        $hms2=date("H:i:s",strtotime("-5 seconds"));
        $hms1=date("H:i:s",strtotime("-6 seconds"));
        $this->assign('hms',$hms);
        $this->assign('hms2',$hms2);
        $this->assign('hms1',$hms1);
        $this->assign('hms3',$hms3);
        $this->assign('hms4',$hms4);
        $this->assign('hms5',$hms5);
        $this->assign('hms5',$hms5);

  
        $this->display();
    }
}