

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>新闻管理 - 添加分类</title>
    <meta http-equiv="Cache-Control" content="no-transform" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
      <?php  $this->load->view('public/header') ?>
    <script src="<?php echo base_url() ?>assets/aceadmin/js/jquery-1.10.2.min.js"></script>
    <script  type="text/javascript"  src="<?php echo base_url() ?>assets/aceadmin/ckeditor/ckeditor.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/aceadmin/diyUpload/css/webuploader.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/aceadmin/diyUpload/css/diyUpload.css">
    <script type="text/javascript" src="<?php echo base_url() ?>assets/aceadmin/diyUpload/js/webuploader.html5only.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/aceadmin/diyUpload/js/diyUpload.js"></script>
    <style>
        .btn-upload {
            width: 106px;
            height: 32px;
            position: relative;
            margin-bottom: 10px;
        }
        .btn-upload a {
            display: block;
            width: 104px;
            line-height: 18px;
            padding: 6px 0;
            text-align: center;
            color: #4c4c4c;
            background: #fff;
            border: 1px solid #cecece;
        }
        .btn-upload input {
            width: 106px;
            height: 32px;
            position: absolute;
            left: 0px;
            top: 0px;
            z-index: 1;
            filter: alpha(opacity=0);
            -moz-opacity: 0;
            opacity: 0;
            cursor: pointer;
        }
    </style>
</head>
<body>
<!-- 导航栏开始 -->
<div class="bjy-admin-nav">
    <i class="fa fa-home"></i> 首页
    &gt;
    
    添加分类
</div>


<ul id="myTab" class="nav nav-tabs">
    
        <li class="active">
        <a href="javascript:;">添加分类</a>
    </li>
</ul>
<!-- 导航栏结束 -->

<form class="form-inline"  method="post" enctype="multipart/form-data">
    <table class="table table-striped table-bordered table-hover table-condensed">
       

       <tr>
            <th>分类名称 <span style="color: red;">*</span></th>
            <td><input type="text" name="type_name" class="form-control" value="<?php if(isset($data['type_name']) && $data['type_name']){echo $data['type_name'];}else{echo '';} ?>" /></td>
        </tr>
       
        
         
        
            
        <input type="hidden" name="type_id" value="<?php if(isset($data['type_id']) && $data['type_id']){echo $data['type_id'];}else{echo '';} ?>">
            <th></th>
            <td>
                <input class="btn btn-success" type="submit" value="保存">
            </td>
        </tr>
    </table>
</form>

<script src="<?php echo base_url() ?>assets/aceadmin/bootstrap-3.3.5/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/aceadmin/js/base.js"></script>

</body>
</html>
 <script type="text/javascript">



$('#thumb').diyUpload({
    url:"<?php echo site_url('images/upload') ?>",
    success:function( data ) {
        $('#add_thumb').append('<input type="hidden" name="thumb" value='+data._raw+' />');
        
    },
    error:function( err ) {
        console.info( err );    
    }
});







    </script>