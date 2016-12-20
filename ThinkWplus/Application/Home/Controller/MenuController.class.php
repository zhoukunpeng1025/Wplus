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
		$menuModel = M("menu");
		$menu = $menuModel->select();
		$this->assign("menu", $menu);
		$this->display();
	}

	// lists页动态获取
	public function lists($tagid){
		// dump($tagid)
		$menuModel = M("menu");
		$menu = $menuModel->where("id=$tagid")->select();
		$this->assign("menu", $menu);

		$recipeModel = M("recipe");
		$recipe = $recipeModel->where("recipetagid = $tagid")->field("id,recipename,img")->select();

		for($i = 0; $i < count($recipe); $i++) {
			// 获取步骤中最后一张图
			$pos = strripos($recipe[$i]['img'], "uploads");
			$recipe[$i]["img"] = substr($recipe[$i]["img"], $pos);
		}
		// dump($recipe);

		$this->assign("recipe", $recipe);
		$this->display();
	}
	//content页
	public function content(){
		$id = I("id");
		$recipeModel = M('recipe');
		$recipe = $recipeModel->where("id=$id")->find();//获取当前数据

		// 将字符串转为数组
		$recipe["foodname"] = explode("&", $recipe["foodname"]);
		$recipe["foodnum"] = explode("&", $recipe["foodnum"]);
		$recipe["step"] = explode("&", $recipe["step"]);
		$recipe["clocktime"] = explode("&", $recipe["clocktime"]);
		$recipe["clocknum"] = explode("&", $recipe["clocknum"]);
		$recipe["img"] = explode("&", $recipe["img"]);
		
		// dump($recipe);

		$this->assign("recipe",$recipe);
		$this->display();
	}
	//steps页
	public function steps(){
		$id = I("id");
		$recipeModel = M('recipe');
		$recipe = $recipeModel->where("id=$id")->find();//获取当前数据

		// 将字符串转为数组
		$recipe["foodname"] = explode("&", $recipe["foodname"]);
		$recipe["foodnum"] = explode("&", $recipe["foodnum"]);
		$recipe["step"] = explode("&", $recipe["step"]);
		$recipe["img"] = explode("&", $recipe["img"]);
		$recipe["clocktime"] = explode("&", $recipe["clocktime"]);
		$recipe["clocknum"] = explode("&", $recipe["clocknum"]);
		
		$this->assign("recipe",$recipe);
		$this->display();
	}
	//生成订单页，makeorder
	public function makeorder(){
		$id = I("id");
		$recipeModel = M('recipe');
		$userModel = M('user');
		$addressModel = M('address');
		$recipe = $recipeModel->where("id=$id")->find();//获取当前数据
		$condition['username'] = I("session.username");//获取当前用户名
		$userid = $userModel->where($condition)->getField('id');//获取当前用户id
		//连接user、address表，暂时无用
		$userAddress = $userModel->join('address ON user.id = address.userid');
		$address = $addressModel->where("userid=$userid")->find();//获取当前用户的地址信息
		// var_dump(I("session.username"));

		$recipe["foodname"] = explode("&", $recipe["foodname"]);

		$this->assign("recipe",$recipe);
		$this->assign("address",$address);
		$this->display();
	}
	//找人代买
	public function othersbuy(){

	}
	//自己买
	public function ownbuy(){
		
	}
}
?>
