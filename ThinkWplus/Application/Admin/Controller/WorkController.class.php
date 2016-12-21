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
     //单条删除数据
     public function articleDelete(){
          $id=I('id');
          $Model=M('Article');
          if($Model->where("id=$id")->delete()){
            $this->success('删除成功');
          }else{
            $this->showError('删除失败');
          }
                  
        }

    // 批量删除数据
    public function articleBatchDelete() {
      $articleModel = M("Article");
      $id = I("id");
      $getId = implode(',', $id);
      if ($articleModel->delete($getId)) {
        $this->success("批量删除成功！", U("articleLists"));
      }
      else {
        $this->error("批量删除失败！");
      }
    }

    public function imageLists(){
      $imageModel = M("Image");
      $image = $imageModel->select();
      $this->assign("image", $image);
      $this->display();
    }
    //单条删除
    public function imageDelete(){
      $imageModel = M("Image");
      $id = I("id");
      // dump($id);
      $image = $imageModel->delete($id);
      if ($image) {
        $this->success("删除成功！", U("imageLists"));
      }
      else {
        $this->error("删除失败！");
      }
    }
    // 批量删除数据
    public function imageBatchDelete(){
      $imageModel = M("Image");
      $id = I("id");
      $getId = implode(',', $id);
      dump($id);
      if ($imageModel->delete($getId)) {
        $this->success("批量删除成功！", U("imageLists"));
      }
      else {
        $this->error("批量删除失败！");
      }
    }

    public function videoLists(){
      $videoModel = M("Video");
      $video = $videoModel->select();
      $this->assign("video", $video);
      $this->display();
    }
    //单条删除
    public function videoDelete(){
      $videoModel = M("Video");
      $id = I("id");
      // dump($id);
      $video = $videoModel->delete($id);
      if ($video) {
        $this->success("删除成功！", U("videoLists"));
      }
      else {
        $this->error("删除失败！");
      }
    }
    // 批量删除数据
    public function videoBatchDelete() {
      $videoModel = M("Video");
      $id = I("id");
      $getId = implode(',', $id);
      if ($videoModel->delete($getId)) {
        $this->success("批量删除成功！", U("videoLists"));
      }
      else {
        $this->error("批量删除失败！");
      }
    }
    public function article(){
      $id = I("id");
      $articleModel = M("Article");
      $article = $articleModel->where("id=$id")->select();
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
