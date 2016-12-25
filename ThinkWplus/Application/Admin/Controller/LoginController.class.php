<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function login(){
    	if (IS_POST) {
			$adminUsersModel = M('adminuser');
			$condition = array(
				"username" => I("post.adminname"),
				"password" => I("post.password")
			);
			$result = $adminUsersModel->where($condition)->count();
			$id = $adminUsersModel->field('id')->where($condition)->select();
			
			if ($result > 0) {
				$_SESSION['adminname'] = I("post.adminname");
				$_SESSION['adminid'] = $id[0]["id"];

				$this->redirect("Index/index");
			}
			else{
				$this->error("用户名或密码不正确");
			}
		}
		else{
			$this->display();
		}
    }
}