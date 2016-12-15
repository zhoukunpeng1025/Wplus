<?php
namespace Home\Controller;
use Think\Controller;
class NearbyController extends Controller {
	public function lists(){
		$Model = M();
		$article = $Model->table("article a,user b")->where("a.authorid = b.id")->limit(10)->select();
		$this->assign("article", $article);
		$this->display();
	}
	public function content(){
		$this->display();
	}
	public function dynamicedit(){
		$this->display();
	}
	public function essayedit(){
		$this->display();
	}
}