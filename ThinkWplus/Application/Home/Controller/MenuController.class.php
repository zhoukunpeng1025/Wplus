<?php
namespace Home\Controller;
use Think\Controller;

class MenuController extends Controller {
	// 添加菜谱add页
	public function add(){
		$this->display();
	}
	//assortment页动态获取
	public function assortment(){
		$this->display();
	}
	// lists页动态获取
	public function lists(){
		$this->display();
	}
	//content页
	public function content(){
		$this->display();
	}
	//steps页
	public function steps(){
		$this->display();
	}
}
?>
