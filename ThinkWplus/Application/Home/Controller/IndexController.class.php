<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
	public function __construct() {
		parent::__construct();
		if (!isLogin()) {
			$this->redirect("Signup/signin");
		}
	}
    public function index(){
    	$Model = M();
    	$article = $Model->table("article a,user b")->where("a.authorid = b.id")->limit(10)->select();
    	// dump($article);
    	$this->assign("article", $article);
        $this->display();
    }
}