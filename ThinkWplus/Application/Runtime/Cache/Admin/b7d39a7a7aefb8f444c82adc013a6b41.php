<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> 管理员列表</title>
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel="shortcut icon" href="favicon.ico"> <link href="/github/Wplus/ThinkWplus/Public/back/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/github/Wplus/ThinkWplus/Public/back/css/font-awesome.css?v=4.4.0" rel="stylesheet">

    <link href="/github/Wplus/ThinkWplus/Public/back/css/animate.css" rel="stylesheet">
    <link href="/github/Wplus/ThinkWplus/Public/back/css/style.css?v=4.1.0" rel="stylesheet">
    <style type="text/css">
    .page{
        list-style: none;
        float: left;
        border: solid 1px #959595;
        margin: 0 1%;
    }
    </style>
</head>

<body class="gray-bg">
<div class="panel blank-panel">
    <!-- 选项卡头部 -->
    <!-- 选项卡内容 -->
    <div class="wrapper wrapper-content animated fadeInRight panel-body">
        <div class="tab-content">
          <div class="row tab-pane active" id="tab-4">
            <?php if(is_array($adminUsers)): $i = 0; $__LIST__ = $adminUsers;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$d): $mod = ($i % 2 );++$i;?><div class="col-sm-4">
                    <div class="contact-box">
                        <div class="col-sm-4">
                            <div class="text-center">
                                <img alt="image" class="img-circle m-t-xs img-responsive headimg" src="/github/Wplus/ThinkWplus/Public/<?php echo ($d["headimg"]); ?>">
                                <div class="m-t-xs font-bold"><?php echo ($d["position"]); ?></div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <ul class="list-unstyled"> 
                                <li><h4>用户名：<?php echo ($d["username"]); ?></h4></li> 
                                <li><h4>真实姓名：<?php echo ($d["realname"]); ?></h4></li> 
                                <li><h4>性别：<?php echo ($d["sex"]); ?></h4></li> 
                            </ul>
                            <address>
                                E-mail:<?php echo ($d["email"]); ?><br>
                                <abbr title="Phone">Tel:</abbr> <?php echo ($d["phonenum"]); ?>
                            </address>
                            <div class="row" style="float:right; width: 156px;; width: 156px;">
                                <a href="/github/Wplus/ThinkWplus/index.php/Admin/Admin/edit?id=<?php echo ($d["id"]); ?>" type="button" class="btn  btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> 编辑</a> 
                                <a href="/github/Wplus/ThinkWplus/index.php/Admin/Admin/delete?id=<?php echo ($d["id"]); ?>" type="button" class="btn  btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> 删除</a> 
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
          </div> 
        </div> 
    </div>
    <div class="row">
        <!--分页--> 
        <div class="col-sm-8 col-md-8 col-lg-8"></div>
        <div class="col-sm-4 col-md-4 col-lg-4">
            <ul class="pagination pagination-lg">
                <li><?php echo ($page); ?></li>
            </ul>
        </div>
    </div>
</div>
    <!-- 全局js -->
    <script src="/github/Wplus/ThinkWplus/Public/back/js/jquery.min.js?v=2.1.4"></script>
    <script src="/github/Wplus/ThinkWplus/Public/back/js/bootstrap.min.js?v=3.3.6"></script>
    <!-- 自定义js -->
    <script src="/github/Wplus/ThinkWplus/Public/back/js/content.js?v=1.0.0"></script>
    <script>
        $(document).ready(function () {
            $('.contact-box').each(function () {
                animationHover(this, 'pulse');
            });

            var headimg = $(".headimg").width();
            $(".headimg").height(headimg);

        });
        // $(window).resize(function(){
        //     var headimg = $(".headimg").width();
        //     $(".headimg").height(headimg);
        // }
    </script>
</body>

</html>