<?php
namespace Admin\Controller;
use Think\Controller;
class RecipeController extends Controller {

	public function lists(){
		$recipeModel = M("recipe");
		$recipe = $recipeModel->select();
		
		// 将字符串转为数组
		for($i = 0; $i < count($recipe); $i++) {
			$recipe[$i]["foodname"] = explode("&", $recipe[$i]["foodname"]);
			$recipe[$i]["foodnum"] = explode("&", $recipe[$i]["foodnum"]);
			// $recipe[$i]["food"] = array("foodname"=>$foodname, "foodnum"=>$foodnum);
			$recipe[$i]["step"] = explode("&", $recipe[$i]["step"]);
			$recipe[$i]["img"] = explode("&", $recipe[$i]["img"]);
			$recipe[$i]["clocktime"] = explode("&", $recipe[$i]["clocktime"]);
			$recipe[$i]["clocknum"] = explode("&", $recipe[$i]["clocknum"]);
		}

		// dump($recipe);

		$this->assign('recipe', $recipe);
		$this->display();
    }

	// 显示添加页面
    public function add(){
        $this->display();
    }

	// 执行添加操作
    public function doAdd(){
    	if (!IS_POST) {
			exit("bad request!");
		}
		$data = $_POST;

		// 将数组转成字符串
		$data["foodname"] = implode("&", $data["foodname"]);
		$data["foodnum"] = implode("&", $data["foodnum"]);
		$data["step"] = implode("&", $data["step"]);
		$data["clocknum"] = implode("&", $data["clocknum"]);
		$data["clocktime"] = implode("&", $data["clocktime"]);
		// dump($data);

		// $recipeModel = M("recipe");
		// if (!$recipeModel->create()) {
		// 	$this->error($recipeModel->getError());
		// }
		// if ($recipeModel->add($data)) {
		// 	$this->success("添加成功！", U("lists"));
		// }
		// else {
		// 	$this->error("添加失败！");
		// }
    }

    // 显示需要编辑的菜谱的信息
    public function edit(){
    	$id = I("id");
    	$recipeModel = M("recipe");
		$recipe = $recipeModel->where("id=$id")->select();
		
		// 将字符串转成数组
		$recipe[0]["foodname"] = explode("&", $recipe[0]["foodname"]);
		$recipe[0]["foodnum"] = explode("&", $recipe[0]["foodnum"]);
		$recipe[0]["step"] = explode("&", $recipe[0]["step"]);
		$recipe[0]["clocktime"] = explode("&", $recipe[0]["clocktime"]);
		$recipe[0]["clocknum"] = explode("&", $recipe[0]["clocknum"]);

		// dump($recipe);
		$this->assign('recipe', $recipe);
		$this->display();
    }

    // 执行保存修改操作
    public function doEdit(){
    	$id = I("id");
    	$data = $_POST;

    	// 将数组转成字符串
		$data["foodname"] = implode("&", $data["foodname"]);
		$data["foodnum"] = implode("&", $data["foodnum"]);
		$data["step"] = implode("&", $data["step"]);
		$data["clocknum"] = implode("&", $data["clocknum"]);
		$data["clocktime"] = implode("&", $data["clocktime"]);
		// dump($data);

		$recipeModel = M("recipe");
		if (!$recipeModel->create()) {
			$this->error($recipeModel->getError());
		}
		if ($recipeModel->where("id=$id")->save($data)) {
			$this->success("修改成功！", U("lists"));
		}
		else {
			$this->error("修改失败！");
		}
		
    }

    // 删除
    public function del(){
    	$id = I("id");

    	// 删recipe表数据
		$recipeModel = M("recipe");
		$recipe = $recipeModel->delete($id);

		if ($recipe) {
			$this->success("删除成功！", U("lists"));
		}
		else {
			$this->error("删除失败！");
		}
    }
}
