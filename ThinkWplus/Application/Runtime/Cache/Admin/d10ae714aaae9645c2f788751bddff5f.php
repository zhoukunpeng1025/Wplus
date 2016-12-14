<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>菜谱管理</title>

    <link rel="shortcut icon" href="favicon.ico"> <link href="/CLONE/Wplus/ThinkWplus/Public/back/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/CLONE/Wplus/ThinkWplus/Public/back/css/font-awesome.css?v=4.4.0" rel="stylesheet">
    <link href="/CLONE/Wplus/ThinkWplus/Public/back/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/CLONE/Wplus/ThinkWplus/Public/back/css/animate.css" rel="stylesheet">
    <link href="/CLONE/Wplus/ThinkWplus/Public/back/css/style.css?v=4.1.0" rel="stylesheet">
    <link href="/CLONE/Wplus/ThinkWplus/Public/back/css/luxiaojia.css" rel="stylesheet" >

</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel-group" id="menuGroup">
                    <?php if(is_array($recipe)): $i = 0; $__LIST__ = $recipe;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="panel panel-default" id=<?php echo ($vo["id"]); ?>>
                        <div class="panel-heading ibox-title">
                            <div class="checkBox"><input type="checkbox" class="i-checks" name="input[]"></div>
                            <h5><?php echo ($vo["recipename"]); ?></h5>
                            <div class="ibox-tools">
                                <a rel="nofollow" class="panel-title collapsed" data-toggle="collapse" data-parent="#menuGroup" href="#menu<?php echo ($vo["id"]); ?>">
                                    <i class="fa fa-chevron-down"></i>
                                </a>
                                <a class="edit-link" href="/CLONE/Wplus/ThinkWplus/index.php/Admin/Recipe/edit/id/<?php echo ($vo["id"]); ?>">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <a class="close-link" href="/CLONE/Wplus/ThinkWplus/index.php/Admin/Recipe/del/id/<?php echo ($vo["id"]); ?>">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div id="menu<?php echo ($vo["id"]); ?>" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="menuTags">#中菜# #热菜# #家常菜#</div>
                                <div class="hr-line-dashed"></div>
                                <div class="menuFoods row">
                                    <div class="col-sm-2 menuTitle">用料</div>
                                    <div class="col-sm-10">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>名称</th>
                                                    <th>数量</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
 for($i=0;$i<count($vo['foodname']);$i++){ echo "<tr>". "<td>".$vo['foodname'][$i]."</td>". "<td>".$vo['foodnum'][$i]."</td>". "</tr>"; } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div> <!-- menuFoods end -->
                                <div class="hr-line-dashed clearFloat"></div>
                                <div class="menuProcedure row">
                                    <div class="col-sm-2 menuTitle">做法</div>
                                    <div class="col-sm-10"></div>
                                    <?php if(is_array($vo['step'])): $i = 0; $__LIST__ = $vo['step'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$st): $mod = ($i % 2 );++$i;?><div class="col-sm-2"></div>
                                    <div class="col-sm-10">
                                        <div class="col-sm-2 steps"><?php echo ($i); ?>.</div>
                                        <div class="col-sm-8 paddingTop">
                                            <p><?php echo ($st); ?></p>
                                            <div>
                                                <img src="/CLONE/Wplus/ThinkWplus/Public/back/img/p1.jpg" alt="">
                                            </div>
                                        </div>
                                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
                                </div> <!-- menuProcedure end -->
                                

                                <div class="hr-line-dashed clearFloat paddingTop"></div>
                                <div class="menuClock">
                                    <div class="col-sm-2 menuTitle">闹钟</div>
                                    <div class="col-sm-10">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>步骤</th>
                                                    <th>时间</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
 for($i=0;$i<count($vo['clocknum']);$i++){ echo "<tr>". "<td>步骤".$vo['clocknum'][$i]."</td>". "<td>".$vo['clocktime'][$i]."</td>". "</tr>"; } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div> <!-- menuClock end-->
                            </div>
                        </div>
                    </div> <!-- panel end --><?php endforeach; endif; else: echo "" ;endif; ?>
                </div> <!-- panel-group end-->
            </div>
        </div>
    </div>

    <!-- 全局js -->
    <script src="/CLONE/Wplus/ThinkWplus/Public/back/js/jquery.min.js?v=2.1.4"></script>
    <script src="/CLONE/Wplus/ThinkWplus/Public/back/js/bootstrap.min.js?v=3.3.6"></script>   

    <!-- 自定义js -->
    <script src="/CLONE/Wplus/ThinkWplus/Public/back/js/fileinput.js"></script>
    <script src="/CLONE/Wplus/ThinkWplus/Public/back/js/fileinput_locale_zh.js"></script>
    <script src="/CLONE/Wplus/ThinkWplus/Public/back/js/content.js?v=1.0.0"></script>

    <!-- iCheck -->
    <script src="/CLONE/Wplus/ThinkWplus/Public/back/js/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>
    
</body>
</html>