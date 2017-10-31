<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>首页</title>
    <link rel="stylesheet" href="../../../assets/aceadmin/bootstrap-3.3.5/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../../assets/aceadmin/bootstrap-3.3.5/css/bootstrap-theme.min.css" />
    <link rel="stylesheet" href="../../../assets/aceadmin/font-awesome-4.4.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../../../assets/aceadmin/css/base.css" />
</head>
<body>
<div class="bjy-admin-nav">
    <a href="<?php echo site_url() ?>"><i class="fa fa-home"></i> 首页</a>
</div>
<ul id="myTab" class="nav nav-tabs">
    <li class="active">
        <a href="#home" data-toggle="tab">欢迎来到后台管理系统</a>
    </li>
    <!--<li>-->
    <!--<a href="javascript:;" onclick="add()">添加用户组</a>-->
    <!--</li>-->
</ul>
<div id="myTabContent" class="tab-content">
    <div class="tab-pane fade in active" id="home">
        <table class="table table-striped table-bordered table-hover table-condensed">
            <tr>
                <td colspan="3">系统信息</td>
            </tr>
            <tr>
                <td>主机IP：<?php echo $_SERVER['SERVER_NAME'] ?></td>
                <td>主机地址：<?php echo $_SERVER['HTTP_HOST']; ?></td>
                <td>主机时间：<?php echo date('Y-m-d H:i:s',time()) ?></td>
            </tr>
            <tr>
            
                 <td>主机系统：<?php echo php_uname('s').' '.php_uname('r'); ?></td>
                <td>PHP版本：<?php echo PHP_VERSION; ?></td>
                <td>剩余空间：&nbsp;</td>
               
            </tr>
            <tr>
                <td colspan="3">程序版本：V1.1</td>
            </tr>
            <tr>
                <td colspan="3">用户信息</td>
            </tr>
            <tr>
                <td>用户名称：<?php echo $this->input->cookie('username') ?></td>
                <td>登录时间：<?php echo date('Y-m-d H:i:s',time()) ?></td>
                <td>登录IP：<?php echo $_SERVER['REMOTE_ADDR']; ?></td>
            </tr>
            <!--<tr>-->
                <!--<td>上次登录：</td>-->
            <!--</tr>-->
        </table>
    </div>
</div>

<!-- 添加菜单模态框开始 -->
<div class="modal fade" id="bjy-add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    添加用户组
                </h4>
            </div>
            <div class="modal-body">
                <form id="bjy-form" class="form-inline" action="#" method="post">
                    <table class="table table-striped table-bordered table-hover table-condensed">
                        <tr>
                            <th width="15%">用户组名：</th>
                            <td>
                                <input class="form-control" type="text" name="title">
                            </td>
                        </tr>
                        <tr>
                            <th></th>
                            <td>
                                <input class="btn btn-success" type="submit" value="添加">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- 添加菜单模态框结束 -->

<!-- 修改菜单模态框开始 -->
<div class="modal fade" id="bjy-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    修改规则
                </h4>
            </div>
            <div class="modal-body">
                <form id="bjy-form" class="form-inline" action="#" method="post">
                    <input type="hidden" name="id">
                    <table class="table table-striped table-bordered table-hover table-condensed">
                        <tr>
                            <th width="12%">规则名：</th>
                            <td>
                                <input class="form-control" type="text" name="title">
                            </td>
                        </tr>
                        <tr>
                            <th></th>
                            <td>
                                <input class="btn btn-success" type="submit" value="修改">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- 修改菜单模态框结束 -->
<script src="../../../assets/aceadmin/js/jquery-1.10.2.min.js"></script>
<script src="../../../assets/aceadmin/bootstrap-3.3.5/js/bootstrap.min.js"></script>
<script src="../../../assets/aceadmin/js/base.js"></script>
<script>
    // 添加菜单
    function add(){
        $("input[name='title']").val('');
        $('#bjy-add').modal('show');
    }

    // 修改菜单
    function edit(obj){
        var ruleId=$(obj).attr('ruleId');
        var ruletitle=$(obj).attr('ruletitle');
        $("input[name='id']").val(ruleId);
        $("input[name='title']").val(ruletitle);
        $('#bjy-edit').modal('show');
    }
</script>
</body>
</html>
