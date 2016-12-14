<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <title>MyApp</title>
    <!-- Path to Framework7 Library CSS-->
    <link rel="stylesheet" href="/CLONE/Wplus/ThinkWplus/Public/front/css/framework7.ios.min.css">
    <link rel="stylesheet" href="/CLONE/Wplus/ThinkWplus/Public/front/css/framework7.ios.colors.min.css">
    <!-- Path to your custom app styles-->
    <link rel="stylesheet" href="/CLONE/Wplus/ThinkWplus/Public/front/css/font-awesome.min.css">
    <link rel="stylesheet" href="/CLONE/Wplus/ThinkWplus/Public/front/css/style.css">
  </head>
  <body>
    <!-- Views-->
    <div class="views">
      <!-- Your main view, should have "view-main" class-->
      <div class="view view-main">
        <!-- Top Navbar-->
        <div class="navbar">
          <div class="navbar-inner" style="background-color:#ea4027; padding: 0;">
            <!-- We have home navbar without left link-->
              <a href="/CLONE/Wplus/ThinkWplus/index.php/Home/Nowait/requestlist" class="external button contentBtn" style="border-bottom: 4px solid #ffffff">  
                等袋
              </a>
              <a href="/CLONE/Wplus/ThinkWplus/index.php/Home/Nowait/basketlist" class="external button contentBtn">
                菜篮
              </a>
          </div>
        </div>
        <!-- Pages, because we need fixed-through navbar and toolbar, it has additional appropriate classes-->
        <div class="pages navbar-through toolbar-through">
          <!-- Page, "data-page" contains page name -->
          <div data-page="index" class="page">
            <div class="page-content" style="padding-top:8%">
              <!-- 可折叠列表 -->
              <div class="list-block">
                <ul>
                <?php if(is_array($orders)): $i = 0; $__LIST__ = $orders;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><li class="itemBorder1">                   
                    <div class="row item-title">
                      <div class="col-30">
                        <h3 class="requestH3">￥<?php echo ($data["reward"]); ?></h3>
                        <p class="requestTime"><?php echo ($data["deadline"]); ?>之前</p>
                        <!-- <p class="requestTime">17:00之前</p> -->
                        <div class="row contactWay fourteenFont">
                          <div class="col-10"></div>
                          <div class="col-20">
                            <i class="fa fa-user" aria-hidden="true"></i>
                          </div>
                          <div class="col-70"><?php echo ($data["username"]); ?></div>
                        </div>
                        <div class="row contactWay fourteenFont">
                          <div class="col-10"></div>
                          <div class="col-20">
                            <i class="fa fa-building" aria-hidden="true"></i>
                          </div>
                          <div class="col-70"><?php echo ($data["address"]); ?></div>
                        </div>
                      </div>
                      <div class="col-70 itemTitleBoder" id="dataUseLevel"> 
                        <h3 id="building"><?php echo ($data["address"]); ?></h3>
                       
                          <?php
 for($i=0;$i<3;$i++){ echo "<div class='row'>". "<div class='col-60'>".$data['ingredients'][$i]."</div>". "<div class='col-40 useLevel'>".$data['amount'][$i]."</div>". "</div>"; } ?>
                          <!-- <div class="col-60">虾仁</div>
                          <div class="col-40 useLevel">350g</div> -->
                        
                      
                        <div class="row">
                          <div class="col-40"></div>
                          <div class="col-50" style="padding-bottom:10px">
                            <a href="basket-list.html" class="external button button-round color-red">
                              领取
                            </a>
                          </div>
                          <div class="col-10"></div>
                        </div>
                      </div>
                    </div>                    
                  </li>
                  <li class="item-divider"></li><!--分割--><?php endforeach; endif; else: echo "" ;endif; ?>
                  <!-- <li class="itemBorder2">
                    <div class="row item-title">
                      <div class="col-30">
                        <h3 class="requestH3">￥1.00</h3>
                        <p class="requestTime">2016/11/18</p>
                        <p class="requestTime">17:00之前</p>
                        <div class="row contactWay fourteenFont">
                          <div class="col-10"></div>
                          <div class="col-20">
                            <i class="fa fa-user" aria-hidden="true"></i>
                          </div>
                          <div class="col-70">李四女士</div>
                        </div>
                        <div class="row contactWay fourteenFont">
                          <div class="col-10"></div>
                          <div class="col-20">
                            <i class="fa fa-building" aria-hidden="true"></i>
                          </div>
                          <div class="col-70">5 栋 302</div>
                        </div>
                      </div>
                      <div class="col-70 itemTitleBoder" id="dataUseLevel"> 
                        <h3 id="building">5栋302号</h3>
                        <div class="row">
                          <div class="col-60">虾仁</div>
                          <div class="col-40 useLevel">350g</div>
                        </div>
                        <div class="row">
                          <div class="col-60">鸡精</div>
                          <div class="col-40 useLevel">1袋</div>
                        </div>
                        <div class="row">
                          <div class="col-60">虾仁</div>
                          <div class="col-40 useLevel">350g</div>
                        </div>
                        <div class="row">
                          <div class="col-60">鸡精</div>
                          <div class="col-40 useLevel">1袋</div>
                        </div>
                        <div class="row">
                          <div class="col-60">鸡精</div>
                          <div class="col-40 useLevel">1袋</div>
                        </div>
                        <div class="row">
                          <div class="col-40"></div>
                          <div class="col-50" style="padding-bottom:10px">
                            <a href="basket-list.html" class="external button button-round color-red">
                              领取
                            </a>
                          </div>
                          <div class="col-10"></div>
                        </div>
                      </div>
                    </div>  
                  </li>
                  <li class="item-divider"></li>
                  <li class="itemBorder3">
                    <div class="row item-title">
                      <div class="col-30">
                        <h3 class="requestH3">￥1.00</h3>
                        <p class="requestTime">2016/11/18</p>
                        <p class="requestTime">17:00之前</p>
                        <div class="row contactWay fourteenFont">
                          <div class="col-10"></div>
                          <div class="col-20">
                            <i class="fa fa-user" aria-hidden="true"></i>
                          </div>
                          <div class="col-70">李四女士</div>
                        </div>
                        <div class="row contactWay fourteenFont">
                          <div class="col-10"></div>
                          <div class="col-20">
                            <i class="fa fa-building" aria-hidden="true"></i>
                          </div>
                          <div class="col-70">5 栋 302</div>
                        </div>
                      </div>
                      <div class="col-70 itemTitleBoder" id="dataUseLevel"> 
                        <h3 id="building">5栋302号</h3>
                        <div class="row">
                          <div class="col-60">虾仁</div>
                          <div class="col-40 useLevel">350g</div>
                        </div>
                        <div class="row">
                          <div class="col-60">鸡精</div>
                          <div class="col-40 useLevel">1袋</div>
                        </div>
                        <div class="row">
                          <div class="col-60">虾仁</div>
                          <div class="col-40 useLevel">350g</div>
                        </div>
                        <div class="row">
                          <div class="col-60">鸡精</div>
                          <div class="col-40 useLevel">1袋</div>
                        </div>
                        <div class="row">
                          <div class="col-60">鸡精</div>
                          <div class="col-40 useLevel">1袋</div>
                        </div>
                        <div class="row">
                          <div class="col-40"></div>
                          <div class="col-50" style="padding-bottom:10px">
                            <a href="basket-list.html" class="external button button-round color-red">
                              领取
                            </a>
                          </div>
                          <div class="col-10"></div>
                        </div>
                      </div>
                    </div>  
                  </li>   -->               
                </ul>
              </div>
              <!-- end -->
            </div>
          </div>
        </div>
        <!-- Bottom Toolbar-->
        <div class="toolbar" style="text-align:center;">
          <div class="toolbar-inner">
            <a href="/CLONE/Wplus/ThinkWplus/index.php/Home/Index/index" class="external tab-link greyColor">
              <i class="icon fa fa-home font20"></i>
              <span class="tabbar-label font11">主页</span>
            </a>
            <a href="video_ing.html" class="external tab-link greyColor">
              <i class="icon fa fa-video-camera font16"></i>
              <span class="tabbar-label font11">直播间</span>
            </a>
              <a href="request-list.html" class="external tab-link redColor">
                <i class="icon fa fa-plus font16"></i>
                <span class="tabbar-label font11">发布</span>
              </a>
            <a href="nearby.html" class="external tab-link greyColor">
              <i class="icon fa fa-map-signs font16"></i>
              <span class="tabbar-label font11">附近</span>
            </a>
            
            <a href="meIndex.html" class="external tab-link greyColor">
              <i class="icon fa fa-user font16"></i>
              <span class="tabbar-label font11">我</span>
            </a>
          </div>
        </div>

      </div>
    </div>
    <!-- Path to Framework7 Library JS-->
    <script type="text/javascript" src="/CLONE/Wplus/ThinkWplus/Public/front/js/framework7.min.js"></script>
    <!-- Path to your app js-->
    <script type="text/javascript" src="/CLONE/Wplus/ThinkWplus/Public/front/js/my-app.js"></script>
  </body>
</html>