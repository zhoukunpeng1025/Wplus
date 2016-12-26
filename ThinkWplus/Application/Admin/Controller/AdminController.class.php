<?php
namespace Admin\Controller;
use Think\Controller;

class AdminController extends Controller {
	public function lists(){
		$User = M('adminuser'); // 实例化User对象
		$count      = $User->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,6);// 实例化分页类 传入总记录数和每页显示的记录数
		$orderby['id']='ASC';

		$list = $User->order($orderby)->limit($Page->firstRow.','.$Page->listRows)->select();

		$this->assign('adminUsers',$list);// 赋值数据集

		$Page -> setConfig('first','首页');
		$Page -> setConfig('last','共%TOTAL_PAGE%页');
		$Page -> setConfig('prev','上一页');
		$Page -> setConfig('next','下一页');
		$Page -> setConfig('link','indexpagenumb');//pagenumb 会替换成页码
		$Page -> setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        $show= $Page->show();
        $this->assign('page',$show);// 赋值分页输出

		$this->display(); // 输出模板

	}

	public function add(){
		$this->display();
	}

	public function doAdd(){
		$upload = new \Think\Upload();// 实例化上传类
	    $upload->maxSize   =     3145728 ;// 设置附件上传大小
	    $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
	    $upload->rootPath  =     THINK_PATH; // 设置附件上传根目录
	    $upload->savePath  =     '../Public/uploads/'; // 设置附件上传（子）目录
	    // 上传文件 
	    $info   =   $upload->upload();
	    // if(!$info) {// 上传错误提示错误信息
	    //     $this->error($upload->getError());
	    // }	
		// else{
		$adminUsersModel = D('adminuser');
		$data = $adminUsersModel->create();
		// if (!$data) {
		// 	$this->error($adminUsersModel->getError());
		// }
    	//设置headimg属性值
    	$data['headimg'] = $info['headimg']['savepath'].$info['headimg']['savename'];
		$adminUsersModel->add($data);
		$this->redirect("lists");
		// else {
		// 	$this->error("添加失败！");
		// }
		// }
	}

	public function edit($id){
		$adminUsersModel = D("adminuser");
		$adminUsers = $adminUsersModel->find($id);
		$this->assign("adminUsers",$adminUsers);
		$this->display();
	}

	public function doEdit(){
		$upload = new \Think\Upload();// 实例化上传类
	    $upload->maxSize=3145728 ;// 设置附件上传大小
	    $upload->exts=array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
	    $upload->rootPath  = THINK_PATH; // 设置附件上传根目录
	    $upload->savePath  ='../Public/uploads/'; // 设置附件上传（子）目录
	    // 上传文件 
	    $info   =   $upload->upload();
	    // if(!$info) {// 上传错误提示错误信息
	    //     $this->error($upload->getError());
	    // }	
		// else{
		$adminUsersModel = D("adminuser");
		$data = $adminUsersModel->create();
		$data['headimg'] = $info['headimg']['savepath'].$info['headimg']['savename'];
		$adminUsersModel->save($data);
		$this->redirect("lists");
		// else{
		// 	$this->error($adminUsersModel->getError());
		// }
		// }
	}

	public function delete($id){
		$adminUsersModel = D("adminuser");
		$adminUsersModel->where("id = $id")->delete();
	}

	//修改个人信息
	public function modi(){
		$adminUsersModel = D("adminuser");
		$condition['username'] = I("session.adminname");//获取当前用户名
		$id = $adminUsersModel->where($condition)->getField('id');//获取当前用户id

		$adminUsers = $adminUsersModel->find($id);
		$this->assign("adminUsers",$adminUsers);
		$this->display();
	}
}