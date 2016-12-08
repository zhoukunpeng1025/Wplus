<?php
namespace Admin\Controller;
use Think\Controller;
class RecipeController extends Controller {

	public function lists(){
		$recipeModel = M("recipe");
		$stepModel = M("step");
		$foodModel = M("food");
		$recipe = $recipeModel->select();
		
		// 将step表和food表的数据插入recipe数组，实现嵌套循环
		foreach ($recipe as $key => $value) {
			// 查询食材
			$recipe[$key]["food"] = $foodModel->where("recipeid=".$value["id"])->select();
			// 查询时间不为空的闹钟
			$recipe[$key]["clock"] = $stepModel->where("recipeid=".$value["id"]." and time!=''")->order("step")->field("time,step")->select();
			// 查询所有步骤
			$recipe[$key]["step"] = $stepModel->where("recipeid=".$value["id"])->order("step")->select();		
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
		$recipeModel = M("recipe");
		$foodModel = M("food");
		$stepModel = M("step");
		$data = $_POST;
		// 向recipe表添加数据
		if ($recipeModel->add($data)) {
			// recipe表数据添加成功后，获取添加菜谱的id
			$recipeid = $recipeModel->order("id desc")->limit(1)->getField("id");

			// 向food表添加数据
			for ($i = 0; $i < count($_POST["foodname"]); $i++) {
				$foodData["foodname"] = $_POST["foodname"][$i];
				$foodData["foodnum"] = $_POST["foodnum"][$i];
				$foodData["recipeid"] = $recipeid;
				if(!$foodModel->add($foodData)){
					$this->error("添加食材失败");
				}
			}

			// 向step表添加数据
			for ($i = 0; $i < count($_POST["text"]); $i++) {
				$stepData["text"] = $_POST["text"][$i];
				$stepData["step"] = $i+1;
				// 下面这段闹钟代码有bug，不会改QAQ
				// if ($_POST["step"][$i] == $stepData["step"]) {
				// 	$stepData["time"] = $_POST["time"][$i];
				// }
				$stepData["recipeid"] = $recipeid;
				if(!$stepModel->add($stepData)){
					$this->error("添加步骤失败");
				}
			}
			$this->success("添加成功！", U("lists"));
		}
		else {
			$this->error("添加失败！");
		}
    }

    // 显示需要编辑的菜谱的信息
    public function edit(){
    	$id = I("id");
    	$recipeModel = M("recipe");
		$stepModel = M("step");
		$foodModel = M("food");
		$recipe = $recipeModel->where("id=$id")->select();
		
		// 查询食材
		$recipe[0]["food"] = $foodModel->where("recipeid=$id")->select();
		// 查询时间不为空的闹钟
		$recipe[0]["clock"] = $stepModel->where("recipeid=$id and time!=''")->order("step")->field("time,step")->select();
		// 查询所有步骤
		$recipe[0]["step"] = $stepModel->where("recipeid=$id")->order("step")->select();		

		// dump($recipe);
		$this->assign('recipe', $recipe);		
		$this->display();
    }

    // 执行保存修改操作
    public function doEdit(){
    	$id = I("id");
    	$data = $_POST;
    	dump($data);
		$recipeModel = M("recipe");
		$foodModel = M("food");
		$stepModel = M("step");
		$recipe = $recipeModel->where("id=$id")->save($data);

		// 修改food表数据
		for ($i = 0; $i < count($data["foodname"]); $i++) {
			$foodData["foodname"] = $data["foodname"][$i];
			$foodData["foodnum"] = $data["foodnum"][$i];
			$foodData["recipeid"] = $id;
			$food = $foodModel->save($foodData);
		}

		// 向step表添加数据
		// for ($i = 0; $i < count($data["text"]); $i++) {
		// 	$stepData["text"] = $data["text"][$i];
		// 	$stepData["step"] = $i+1;
		// 	// 下面这段闹钟代码有bug，不会改QAQ
		// 	// if ($_POST["step"][$i] == $stepData["step"]) {
		// 	// 	$stepData["time"] = $_POST["time"][$i];
		// 	// }
		// 	$stepData["recipeid"] = $id;
		// 	$step = $stepModel->save($stepData);
		// }
		
		if ($recipe && $food) {
			$this->success("更新成功！", U("lists"));
		}
		// else {
		// 	$this->error("更新失败！");
		// }
    }

    // 删除
    public function del(){
    	$id = I("id");

    	// 删recipe表数据
		$recipeModel = M("recipe");
		$recipe = $recipeModel->delete($id);

    	// 删除food表数据
    	$foodModel = M("food");
		$food = $foodModel->where("recipeid=$id")->delete();

    	// 删除step表数据
		$stepModel = M("step");
		$step = $stepModel->where("recipeid=$id")->delete();

		if ($recipe && $food && $step) {
			$this->success("删除成功！", U("lists"));
		}
		else {
			$this->error("删除失败！");
		}
    }
}
