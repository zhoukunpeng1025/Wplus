<?php
namespace Admin\Controller;
use Think\Controller;
class RecommendController extends Controller {
    public function lists(){
		// $recommendModel = M("Recommend");
		// $recommend = $recommendModel->select();
		// $this->assign("recommend", $recommend);
		$this->display();
    }
}