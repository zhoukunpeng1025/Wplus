<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends Controller {
    public function lists(){
		$userModel = M("user");
		$user = $userModel->select();
		$this->assign("user", $user);
		$this->display();
	}
	public function delete(){
		$userModel = M("User");
		$id = I("id");
		// dump($id);
		$user = $userModel->delete($id);
		$this->redirect("lists");
	}
	// 批量删除数据
	public function batchDelete() {
		$userModel = M("User");
		$id = I("id");
		$getId = implode(',', $id);
		$userModel->delete($getId);
		// 	$this->success("批量删除成功！", U("lists"));
		// }
		// else {
		// 	$this->error("批量删除失败！");
		// }
	}
}