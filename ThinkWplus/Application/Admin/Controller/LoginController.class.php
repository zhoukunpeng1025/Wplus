<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function login(){
    	if (IS_POST) {
			$adminUsersModel = M('adminuser');
			$condition = array(
				"adminname" => I("post.adminname"),
				"password" => I("post.password")
			);
			$result = $adminUsersModel->where($condition)->count();
			$id = $adminUsersModel->field('id')->where($condition)->select();
			// var_dump($result);
			if ($result > 0) {
				$_SESSION['adminname'] = I("post.adminname");
				$_SESSION['userid'] = $id[0]["id"];
				// ？？用数组设定session不生效
				// session(array(
				// 	"adminname" => I("post.adminname"),
				// 	"userid" => $id[0]["id"]
				// 	));
				// var_dump($_SESSION);
				$this->success("登录成功", U("Index/index"));
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