<?php
namespace Admin\Controller;
use Think\Controller;
class WorkController extends Controller{
    //文章数据获取和展示
    public function articleLists(){
      $articleModel = M("user");
       // $article = $articleModel->join('user ON article.authorid = user.id');
      $article = $articleModel->join('article ON user.id = article.authorid');
      $article = $article->select();
      $this->assign("article", $article);
      $this->display();
   }
   public function page(){
        $User = M('article'); 
        $count      = $User->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,6);// 实例化分页类 传入总记录数和每页显示的记录数
        $orderby['id']='ASC';

        $image = $Model->order($orderby)->limit($Page->firstRow.','.$Page->listRows)->select();

        $this->assign(article,$image);// 赋值数据集
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
   //单条删除数据
   public function articleDelete(){
      $id=I('id');
      $Model=M('Article');
      $Model->where("id=$id")->delete();            
    }

    // 批量删除数据
    public function articleBatchDelete() {
      $articleModel = M("Article");
      $id = I("id");
      $getId = implode(',', $id);
      $articleModel->delete($getId);
      $this->redirect("articleLists");
    }

    public function imageLists(){
      // $imageModel = M("Image");
      // $image = $imageModel->select();
      // $this->assign("image", $image);
      // $this->display();

       $User = M('Image'); 
        $count      = $User->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,6);// 实例化分页类 传入总记录数和每页显示的记录数
        $orderby['id']='ASC';

        $image = $User->order($orderby)->limit($Page->firstRow.','.$Page->listRows)->select();

        $this->assign('image',$image);// 赋值数据集
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
    //单条删除
    public function imageDelete(){
      $imageModel = M("Image");
      $id = I("id");
      // dump($id);
      $image = $imageModel->delete($id);
      $this->redirect("imageLists");
    }
    // 批量删除数据
    public function imageBatchDelete(){
      $imageModel = M("Image");
      $id = I("id");
      $getId = implode(',', $id);
      $imageModel->delete($getId);
      $this->redirect("imageLists");
    }

    public function videoLists(){
      $User = M('Video'); 
        $count      = $User->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,8);// 实例化分页类 传入总记录数和每页显示的记录数
        $orderby['id']='ASC';

        $video = $User->order($orderby)->limit($Page->firstRow.','.$Page->listRows)->select();

        $this->assign('video',$video);// 赋值数据集
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
    //单条删除
    public function videoDelete(){
      $videoModel = M("Video");
      $id = I("id");
      // dump($id);
      $video = $videoModel->delete($id);
      $this->redirect("videoLists");
    }
    // 批量删除数据
    public function videoBatchDelete() {
      $videoModel = M("Video");
      $id = I("id");
      $getId = implode(',', $id);
      $videoModel->delete($getId);
      $this->redirect("videoLists");
    }
    public function article(){
      $id = I("id");
      $articleModel = M("Article");
      $article = $articleModel->join('user ON article.authorid = user.id');
      $article = $article->where("article.id=$id")->select();
      $this->assign("article", $article);
      $this->display();
    }
    public function video(){
      $id = I("id");
      $videoModel = M("Video");
      $video = $videoModel->where("id=$id")->select();
      $this->assign("video", $video);
      $this->display();
    }
}
