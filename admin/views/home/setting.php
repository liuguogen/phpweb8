

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>系统管理 - 配置信息</title>
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
    
    配置信息
</div>


<ul id="myTab" class="nav nav-tabs">
    
        <li class="active">
        <a href="javascript:;">配置信息</a>
    </li>
</ul>
<!-- 导航栏结束 -->

<form class="form-inline"  method="post" enctype="multipart/form-data">
    <table class="table table-striped table-bordered table-hover table-condensed">
       <input type="hidden" name="setting_id" class="form-control" value="<?php if(isset($data['setting_id']) && $data['setting_id']){echo $data['setting_id'];}else{echo '';} ?>" />

       <tr>
            <th>站点名称 <span style="color: red;">*</span></th>
            <td><input type="text" name="sitename" class="form-control" value="<?php if(isset($data['sitename']) && $data['sitename']){echo $data['sitename'];}else{echo '';} ?>" /></td>
        </tr>
        <tr>
            <th>站长QQ <span style="color: red;">*</span></th>
            <td><input type="text" name="qq" class="form-control" value="<?php if(isset($data['qq']) && $data['qq']){echo $data['qq'];}else{echo '';} ?>" /></td>
        </tr>
        <tr>
            <th>站长邮箱 <span style="color: red;">*</span></th>
            <td><input type="text" name="email" class="form-control" value="<?php if(isset($data['email']) && $data['email']){echo $data['email'];}else{echo '';} ?>" /></td>
        </tr>
        <tr>
            <th>网站LOGO <span style="color: red;">*</span></th>
            
               <td>
                   <div id="logo" ></div>
                   <div id="add_logo"></div>
                <?php if(isset($data['logo']) && $data['logo']){ ?>
                <img src="<?php echo base_url().$data['logo'] ?>" height="120" />
                <?php }?>
               </td>
        </tr>
        <tr>
            <th>首页轮播图 <span style="color: red;">*</span></th>
            
               <td>
                   <div id="thumb" ></div>
                   <div id="add_thumb"></div>
                <?php if(isset($data['thumb']) && $data['thumb']) {
                   foreach($data['thumb'] as $v){
                 ?>

                 <img src="<?php echo base_url().$v ?>" height="120" />
            <?php  }}?>
               </td>
        </tr>
         
        
        
           
        <tr>
            <th>版权信息 <span style="color: red;">*</span></th>
            <td>
                <textarea class="form-control" name="copy_info" cols="60" rows="5"><?php if(isset($data['copy_info']) && $data['copy_info']){ echo $data['copy_info'];}else{echo '';} ?></textarea>
                <script type="text/javascript">CKEDITOR.replace('copy_info',{ toolbarCanCollapse: true,  toolbar: [['Source','FontSize','JustifyCenter','Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink','Image','Table']],height: '250px', width: '900px',filebrowserImageUploadUrl:'<?php echo site_url('images/uploads') ?>' })</script>
            </td>
        </tr>
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


$('#logo').diyUpload({
    url:"<?php echo site_url('images/upload') ?>",
    success:function( data ) {
        $('#add_logo').append('<input type="hidden" name="logo" value='+data._raw+' />');
        //console.info( data._raw );
    },
    error:function( err ) {
        console.info( err );    
    }
});
$('#thumb').diyUpload({
    url:"<?php echo site_url('images/upload') ?>",
    success:function( data ) {
        $('#add_thumb').append('<input type="hidden" name="thumb[]" value='+data._raw+' />');
        
    },
    error:function( err ) {
        console.info( err );    
    }
});







    </script>