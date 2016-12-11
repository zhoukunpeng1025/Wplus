<?php
namespace Admin\Controller;
use Think\Controller;
class FeedbackController extends Controller {
    public function index(){
         $User = M('feedback'); // 实例化User对象
        $count      = $User->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,3);// 实例化分页类 传入总记录数和每页显示的记录数
        $orderby['id']='ASC';

        $feedback = $User->order($orderby)->limit($Page->firstRow.','.$Page->listRows)->select();

        $this->assign('feedbacks',$feedback);// 赋值数据集
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

    //  public function edit(){
    //     $id = $_GET['id'];
    //     $feedback = D("feedback")->find($id);
    //     $this->assign("feedbacks",$feedback);
    //     $this->display();
    // }
    // public function update(){
    //     if (!IS_POST) {
    //         exit("error param");
    //     }
    //     $feedback = M('feedback');
    //     if($feedback->create()&&$feedback->save())
    //     {
    //         $this->success("修改成功","index");
    //     }
    //     else{
    //         $this->error($feedback->getError());
    //     }
    // }

	   public function reply(){
          //获取id
         	$id=I('id');
         	//获取数据
        	$Model=M('feedback');
        	$data=$Model->find($id);  //选一条
        	//分配数据
        	$this->assign('feedbacks',$data);
        	$this->display();
    	 }
        public function update(){
        $Model=M('feedback');
        $data = $Model->create();
        $data['backstate']=$_POST['backstate'];
        if($Model->save($data)){
            $this->success("回复成功",'index');
         }else{
             $this->error("回复失败");
         }
      }

     //删除数据
     public function destroy(){
        	$id=I('id');
        	$Model=M('feedback');
        	if($Model->where("id=$id")->delete()){
        		$this->success('删除成功');
        	}else{
        		$this->showError('删除失败');
        	}
                  
        }
    public function alldestroy(){
       $id = I('POST.id');
                    if(is_array($id))
                    {
                        foreach($id as $value)
                        {
                            M("feedback")->delete($value);
                        }
                        $this->success("删除成功！","index");
                    } 
                    else{
                        if(M("feedback")->delete($id)){
                            $this->success("删除成功！","index");
                        }
                    }
    }
    
}
     