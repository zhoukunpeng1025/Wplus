<?php
namespace Home\Controller;
use Think\Controller;
class MeController extends Controller {
    public function index(){
        $this->display();
    }

    public function setting(){
        $this->display();
    }

    public function signout(){
    	session(null);
    	$this->redirect("Signup/signin");
    }
}