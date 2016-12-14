<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
	//构造函数。判断是否登录
		public function __construct() {
			parent::__construct();
			if (!isAdminLogin()) {
				$this->error("请先登录", U("Login/login"));
			}
		}

		public function index(){
			$this->display();
		}

		public function indexIndex(){
			$menuNumModel = M(dish);
			$menuNum = $menuNumModel->count();
			$this->assign('menuNum',$menuNum);

			$vedioNumModel = M(order);
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

			// data : ['50前', '50后', '60后', '70后', '80后', '90后', '00后']
			$condition['birthday'] = array('like','2%');
			$userBirth00 = $userNumModel->where($condition)->count();
			$this->assign('userBirth00',$userBirth00);

			$condition['birthday'] = array('like','199%');
			$userBirth90 = $userNumModel->where($condition)->count();
			$this->assign('userBirth90',$userBirth90);

			$condition['birthday'] = array('like','198%');
			$userBirth80 = $userNumModel->where($condition)->count();
			$this->assign('userBirth80',$userBirth80);

			$condition['birthday'] = array('like','197%');
			$userBirth70 = $userNumModel->where($condition)->count();
			$this->assign('userBirth70',$userBirth70);

			$condition['birthday'] = array('like','196%');
			$userBirth60 = $userNumModel->where($condition)->count();
			$this->assign('userBirth60',$userBirth60);

			$condition['birthday'] = array('like','195%');
			$userBirth50 = $userNumModel->where($condition)->count();
			$this->assign('userBirth50',$userBirth50);

			$userBirthBefor = $userNum - $userBirth00 - $userBirth90 - $userBirth80 - $userBirth70 - $userBirth60 - $userBirth50;
			$this->assign('userBirthBefor',$userBirthBefor);
	  
			$this->display();
	    }
}