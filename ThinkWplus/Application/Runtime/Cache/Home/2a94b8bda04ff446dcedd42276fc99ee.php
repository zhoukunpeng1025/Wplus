<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <!-- Required meta tags-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <title>主页</title>
    <link rel="stylesheet" href="/CLONE/Wplus/ThinkWplus/Public/front/css/framework7.ios.min.css">
    <link rel="stylesheet" href="/CLONE/Wplus/ThinkWplus/Public/front/css/framework7.ios.colors.min.css">
    <link rel="stylesheet" href="/CLONE/Wplus/ThinkWplus/Public/front/css/font-awesome.min.css">
    <link rel="stylesheet" href="/CLONE/Wplus/ThinkWplus/Public/front/css/style.css">
  </head>
  <body>
    <div class="statusbar-overlay"></div>
    <div class="views">
      <!--主视图-->
      <div class="view view-main">
        <!-- Top Navbar-->
        <div class="navbar redBGColor">
          <div class="navbar-inner">
            <div class="left"><a href="menu-Assortment.html" class="link whiteColor">菜谱</a></div>
            <div class="center searchBlock">
              <!-- Search bar -->
              <form class="searchbar redBGColor">
                  <div class="searchbar-input">
                      <input type="search" placeholder="搜索文章、菜谱">
                      <a href="#" class="searchbar-clear"></a>
                  </div>
              </form>
            </div>
            <div class="right"><a href="menu-add.html" class="link whiteColor"><i class="fa fa-plus"></i></a></div>
          </div>
        </div>
        <div class="pages navbar-through toolbar-through">
          <div data-page="index" class="page">
            <div class="page-content">
              <!-- 图片轮播 -->
              <div class="main_visual">
                <div class="flicking_con">
                  <a href="#"></a>
                  <a href="#"></a>
                  <a href="#"></a>
                  <a href="#"></a>
                  <a href="#"></a>
                </div>
                <div class="main_image">
                  <ul>
                    <li><span class="img_3"></span></li>
                    <li><span class="img_4"></span></li>
                    <li><span class="img_1"></span></li>
                    <li><span class="img_2"></span></li>
                    <li><span class="img_5"></span></li>
                  </ul>
                </div>
              </div><!-- 图片轮播end -->
              <?php if(is_array($article)): $i = 0; $__LIST__ = $article;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><!-- 文章卡片 -->
              <div class="card facebook-card">
                  <div class="card-header">
                    <div class="fb">
                      <div class="facebook-avatar">
                        <img src="/CLONE/Wplus/ThinkWplus/Public/front/images/avatar.jpg">
                      </div>
                      <div class="facebook-name"><?php echo ($vo["username"]); ?></div>
                      <div class="facebook-date"><?php echo ($vo["time"]); ?></div>
                    </div>
                    <a href="#" class="button followBtn">关注</a>
                  </div>
                  <div class="card-content">
                      <div class="card-content-inner">
                        <img src="/CLONE/Wplus/ThinkWplus/Public/front/images/2.jpg">
                        <h3><?php echo ($vo["title"]); ?></h3>
                        <p><?php echo ($vo["content"]); ?></p>
                      </div>
                  </div>
                  <div class="card-footer">
                    <a href="#" class="link"><i class="icon fa fa-heart-o"> 112</i></a>
                    <a href="#" class="link"><i class="icon fa fa-commenting-o"> 24</i></a>
                    <a href="#" class="link"><i class="icon fa fa-share-square-o"> 10</i></a>
                  </div>
              </div><!-- 文章卡片end --><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
          </div>
        </div>
        <!-- Bottom Toolbar-->
        <div class="toolbar">
          <div class="toolbar-inner">
            <a href="/CLONE/Wplus/ThinkWplus/index.php/Home/Index/index" class="tab-link redColor">
              <i class="icon fa fa-home font20"></i>
              <span class="tabbar-label font11">主页</span>
            </a>
            <a href="video_ing.html" class="tab-link greyColor">
              <i class="icon fa fa-video-camera font16"></i>
              <span class="tabbar-label font11">直播间</span>
            </a>
            <a href="/CLONE/Wplus/ThinkWplus/index.php/Home/Nowait/requestlist" class="tab-link greyColor">
              <i class="icon fa fa-shopping-bag font16"></i>
              <span class="tabbar-label font11">不等袋</span>
            </a>
            <a href="nearby.html" class="tab-link greyColor">
              <i class="icon fa fa-map-signs font16"></i>
              <span class="tabbar-label font11">附近</span>
            </a>
            <a href="meIndex.html" class="tab-link greyColor">
              <i class="icon fa fa-user font16"></i>
              <span class="tabbar-label font11">我</span>
            </a>
          </div>
        </div><!-- toolbar end -->
      </div>
    </div>
    <script type="text/javascript" src="/CLONE/Wplus/ThinkWplus/Public/front/js/framework7.min.js"></script>
    <script type="text/javascript" src="/CLONE/Wplus/ThinkWplus/Public/front/js/jquery-2.2.2.js"></script>
    <script type="text/javascript" src="/CLONE/Wplus/ThinkWplus/Public/front/js/jquery.event.drag-1.5.min.js"></script>
    <script type="text/javascript" src="/CLONE/Wplus/ThinkWplus/Public/front/js/jquery.touchSlider.js"></script>
    <script type="text/javascript" src="/CLONE/Wplus/ThinkWplus/Public/front/js/index.js"></script>
    <!-- <script type="text/javascript" src="js/my-app.js"></script> -->
  </body>
</html>