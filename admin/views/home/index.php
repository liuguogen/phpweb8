<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>管理后台</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="<?php echo base_url() ?>/assets/aceadmin/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/aceadmin/css/font-awesome.min.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/aceadmin/font-awesome-4.4.0/css/font-awesome.min.css" />
    
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/aceadmin/css/ace.min.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/aceadmin/css/ace-rtl.min.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/aceadmin/css/ace-skins.min.css" />
    
    <script src="<?php echo base_url() ?>/assets/aceadmin/js/ace-extra.min.js"></script>
   
</head>

<body style="overflow-y: hidden;">
<div class="navbar navbar-default" id="navbar">
    <script type="text/javascript">
        try{ace.settings.check('navbar' , 'fixed')}catch(e){}
    </script>
    <div class="navbar-container" id="navbar-container">
        <div class="navbar-header pull-left">
            <a href="<?php echo site_url() ?>" class="navbar-brand">
                <small>
                    <i class="icon-leaf"></i>
                    管理后台
                </small>
            </a>
        </div>
        <div class="navbar-header pull-right" role="navigation">
            <ul class="nav ace-nav">
                <li class="light-blue">
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                        <img class="nav-user-photo" src="<?php echo base_url() ?>/assets/aceadmin/avatars/user.jpg" alt="Jason's Photo" />
                        <span class="user-info">
                            <small>欢迎光临,</small>
                            <?php echo $this->input->cookie('username'); ?>
                        </span>
                        <i class="icon-caret-down"></i>
                    </a>

                    <ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                        <li class="divider"></li>

                        <li>
                            <a href="<?php echo site_url('Login_controller/logout') ?>">
                                <i class="icon-off"></i>
                                退出
                            </a>
                        </li>
                    </ul>
                </li>
            </ul><!-- /.ace-nav -->
        </div>
    </div>
</div>

<div class="main-container" id="main-container">
    <script type="text/javascript">
        try{ace.settings.check('main-container' , 'fixed')}catch(e){}
    </script>

    <div class="main-container-inner">
        <a class="menu-toggler" id="menu-toggler" href="#">
            <span class="menu-text"></span>
        </a>

        <div class="sidebar" id="sidebar" style="overflow-y: auto;overflow-x: hidden;" >
            <script type="text/javascript">
                try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
            </script>
            <!--<div class="sidebar-shortcuts" id="sidebar-shortcuts">-->
                <!--<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">-->
                    <!--<button class="btn btn-success">-->
                        <!--<i class="icon-signal"></i>-->
                    <!--</button>-->

                    <!--<button class="btn btn-info">-->
                        <!--<i class="icon-pencil"></i>-->
                    <!--</button>-->

                    <!--<button class="btn btn-warning">-->
                        <!--<i class="icon-group"></i>-->
                    <!--</button>-->

                    <!--<button class="btn btn-danger">-->
                        <!--<i class="icon-cogs"></i>-->
                    <!--</button>-->
                <!--</div>-->

                <!--<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">-->
                    <!--<span class="btn btn-success"></span>-->

                    <!--<span class="btn btn-info"></span>-->

                    <!--<span class="btn btn-warning"></span>-->

                    <!--<span class="btn btn-danger"></span>-->
                <!--</div>-->
            <!--</div>-->
            <!-- #sidebar-shortcuts -->
            <ul class="nav nav-list" id="nav-list" >
               
                        <li class="b-has-child">
                            <a href="#" class="dropdown-toggle b-nav-parent">
                                <i class="fa fa-cog icon-test"></i>
                                <span class="menu-text">系统管理</span>

                                <b class="arrow icon-angle-down"></b>
                            </a>
                            <ul class="submenu">
                                
                                    <li class="b-nav-li">
                                        <a href="<?php echo site_url('Default_controller/user') ?>" target="right_content">
                                            <i class="icon-double-angle-right"></i>
                                            用户管理
                                        </a>
                                    </li>
                                    <li class="b-nav-li">
                                        <a href="<?php echo site_url('Default_controller/setting') ?>" target="right_content">
                                            <i class="icon-double-angle-right"></i>
                                            配置信息
                                        </a>
                                    </li>
                                
                            </ul>
                        </li>
                         <li class="b-has-child">
                            <a href="#" class="dropdown-toggle b-nav-parent">
                                <i class="fa fa-comment icon-test"></i>
                                <span class="menu-text">新闻管理</span>

                                <b class="arrow icon-angle-down"></b>
                            </a>
                            <ul class="submenu">
                                
                                    <li class="b-nav-li">
                                        <a href="<?php echo site_url('Default_controller/newsList') ?>" target="right_content">
                                            <i class="icon-double-angle-right"></i>
                                            新闻列表
                                        </a>
                                    </li>
                                    
                                   
                                
                            </ul>
                        </li> 

                        <!-- <li class="b-has-child">
                            <a href="#" class="dropdown-toggle b-nav-parent">
                                <i class="fa fa-barcode icon-test"></i>
                                <span class="menu-text">新闻管理</span>

                                <b class="arrow icon-angle-down"></b>
                            </a>
                                                   </li> -->
                        <!-- <li class="b-has-child">
                            <a href="#" class="dropdown-toggle b-nav-parent">
                                <i class="fa fa-comment icon-test"></i>
                                <span class="menu-text">专业管理</span>

                                <b class="arrow icon-angle-down"></b>
                            </a>
                            
                        </li> -->
                  <!--   <li class="b-has-child">
                            <a href="#" class="dropdown-toggle b-nav-parent">
                                <i class="fa fa-bell icon-test"></i>
                                <span class="menu-text">报名管理</span>

                                <b class="arrow icon-angle-down"></b>
                            </a>
                            <ul class="submenu">
                                
                                    <li class="b-nav-li">
                                        <a href="#" target="right_content">
                                            <i class="icon-double-angle-right"></i>
                                            报名列表
                                        </a>
                                    </li>
                                  
                                    <li class="b-nav-li">
                                        <a href="#" target="right_content">
                                            <i class="icon-double-angle-right"></i>
                                            导出列表
                                        </a>
                                    </li>
                                    
                                
                            </ul>
                        </li>
 -->                   
            </ul>
            <div class="sidebar-collapse" id="sidebar-collapse">
                <i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
            </div>

            <script type="text/javascript">
                try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
            </script>
        </div>
        <div class="main-content">
            <div class="page-content">
                <iframe id="content-iframe" src="<?php echo site_url('default_controller/welcome') ?>" frameborder="0" width="100%" height="100%" name="right_content" scrolling="auto" frameborder="0" scrolling="no"></iframe>
            </div><!-- /.page-content -->
        </div><!-- /.main-content -->
    </div><!-- /.main-container-inner -->

    <!--<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">-->
        <!--<i class="icon-double-angle-up icon-only bigger-110"></i>-->
    <!--</a>-->
</div>

<!--[if !IE]> -->
    
<!-- <![endif]-->

<!--[if IE]>
    <script src="__PUBLIC__/statics/js/jquery-1.10.2.min.js"></script>
<![endif]-->

<!--[if !IE]> -->
    <script type="text/javascript">
        window.jQuery || document.write("<script src='<?php echo base_url() ?>/assets/aceadmin/js/jquery-2.0.3.min.js'>"+"<"+"script>");
    </script>
<!-- <![endif]-->



<script type="text/javascript">
    if("ontouchend" in document) document.write("<script src='<?php echo base_url() ?>/assets/aceadmin/js/jquery.mobile.custom.min.js'>"+"<"+"script>");
</script>
<script src="<?php echo base_url() ?>/assets/aceadmin/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>/assets/aceadmin/js/typeahead-bs2.min.js"></script>
<!-- page specific plugin scripts -->


<script src="<?php echo base_url() ?>/assets/aceadmin/js/jquery-ui-1.10.3.custom.min.js"></script>
<script src="<?php echo base_url() ?>/assets/aceadmin/js/jquery.ui.touch-punch.min.js"></script>
<script src="<?php echo base_url() ?>/assets/aceadmin/js/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url() ?>/assets/aceadmin/js/jquery.easy-pie-chart.min.js"></script>
<script src="<?php echo base_url() ?>/assets/aceadmin/js/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url() ?>/assets/aceadmin/js/flot/jquery.flot.min.js"></script>
<script src="<?php echo base_url() ?>/assets/aceadmin/js/flot/jquery.flot.pie.min.js"></script>
<script src="<?php echo base_url() ?>/assets/aceadmin/js/flot/jquery.flot.resize.min.js"></script>
<script src="<?php echo base_url() ?>/assets/aceadmin/js/ace-elements.min.js"></script>
<script src="<?php echo base_url() ?>/assets/aceadmin/js/ace.min.js"></script>
<script type="text/javascript">
$(function(){
    // 导航点击事件
    $('.b-nav-li').click(function(event) {
        $('.active').removeClass('active');
        var ulObj=$(this).parents('.b-has-child').eq(0);
        $(this).addClass('active');
        
        if(ulObj.length!=0){
            $(this).parents('.b-has-child').eq(0).addClass('active');
        }
    });
    // 动态调整iframe的高度以适应不同高度的显示器
    $('.page-content,.main-content').height($(window).height());
    $('.page-content').css('padding-bottom',50);
})

$(window).load(function(){
    $('#sidebar').css('max-height',$('.main-container-inner').height()-50);

})
</script>
</body>
</html>

