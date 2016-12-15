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
		$recipeModel = M('recipe');
		$recipe = $recipeModel->where("id=1")->find();//能获取当前数据

		// 将字符串转为数组
		$recipe["foodname"] = explode("&", $recipe["foodname"]);
		$recipe["foodnum"] = explode("&", $recipe["foodnum"]);
		// $recipe[$i]["food"] = array("foodname"=>$foodname, "foodnum"=>$foodnum);
		$recipe["step"] = explode("&", $recipe["step"]);
		$recipe["img"] = explode("&", $recipe["img"]);
		$recipe["clocktime"] = explode("&", $recipe["clocktime"]);
		$recipe["clocknum"] = explode("&", $recipe["clocknum"]);
		// }
		$this->assign("recipe",$recipe);

		$this->display();
	}
	//steps页
	public function steps(){
		$this->display();
	}
}
?>
