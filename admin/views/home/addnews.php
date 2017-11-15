

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>新闻管理 - 添加新闻</title>
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
    
    添加新闻
</div>


<ul id="myTab" class="nav nav-tabs">
    
        <li class="active">
        <a href="javascript:;">添加新闻</a>
    </li>
</ul>
<!-- 导航栏结束 -->

<form class="form-inline"  method="post" enctype="multipart/form-data">
    <table class="table table-striped table-bordered table-hover table-condensed">
       <input type="hidden" name="news_id" class="form-control" value="<?php if(isset($data['news_id']) && $data['news_id']){echo $data['news_id'];}else{echo '';} ?>" />

       <tr>
            <th>新闻标题 <span style="color: red;">*</span></th>
            <td><input type="text" name="news_name" class="form-control" value="<?php if(isset($data['news_name']) && $data['news_name']){echo $data['news_name'];}else{echo '';} ?>" /></td>
        </tr>
        <tr>
            <th>关键字 <span style="color: red;">*</span></th>
            <td><input type="text" name="keywords" class="form-control" value="<?php if(isset($data['keywords']) && $data['keywords']){echo $data['keywords'];}else{echo '';} ?>" /> <span style="color: red;">多个关键字用英文逗号分隔</span></td>
        </tr>
        <tr>
            <th>标签 <span style="color: red;">*</span></th>
            <td><input type="text" name="label" class="form-control" value="<?php if(isset($data['label']) && $data['label']){echo $data['label'];}else{echo '';} ?>" /> <span style="color: red;">多个标签用英文逗号分隔</span></td>
        </tr>
        <tr>
            <th>新闻类型 <span style="color: red;">*</span></th>
            <td>
                <select name="type_id">
                    <option value="">--请选择--</option>
                    <?php if($news_type){
                        foreach($news_type as $v){
                     ?>
                        <option value="<?php echo $v['type_id'] ?>" <?php if(isset($data['type_id']) && $data['type_id']==$v['type_id']){echo 'selected';} ?>><?php echo $v['type_name'] ?></option>
                     <?php }}?>
                </select>
            </td>
        </tr>
        <tr>
            <th>缩略图 <span style="color: red;">*</span></th>
            
               <td>
                   <div id="thumb" ></div>
                   <div id="add_thumb"></div>
                <?php if(isset($data['thumb']) && $data['thumb']){ ?>
                <img src="<?php echo base_url().$data['thumb'] ?>" height="120" />
                <?php }?>
               </td>
        </tr>
        <tr>
            <th>阅读数 <span style="color: red;">*</span></th>
            <td><input type="text" name="read_num" class="form-control" value="<?php if(isset($data['read_num']) && $data['read_num']){echo $data['read_num'];}else{echo 0;} ?>" /></td>
        </tr>
       
         <tr>
            <th>是否推荐 <span style="color: red;">*</span></th>
            <td><input type="radio" name="is_top" value="1" <?php if(isset($data['is_top']) && $data['is_top']=='1'){ echo 'checked';} ?> />是&nbsp;&nbsp;<input type="radio" name="is_top" value="0" <?php if(isset($data['is_top']) && $data['is_top']=='0'){ echo 'checked';} ?> />否</td>
        </tr>
        
        
           
        <tr>
            <th>新闻内容 <span style="color: red;">*</span></th>
            <td>
                <textarea class="form-control" name="news_content" cols="60" rows="5"><?php if(isset($data['news_content']) && $data['news_content']){ echo htmlspecialchars($data['news_content']);}else{echo '';} ?></textarea>
                <script type="text/javascript">CKEDITOR.replace('news_content',{ toolbarCanCollapse: true,  toolbar: [['Source','FontSize','JustifyCenter','Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink','Image','Table']],height: '250px', width: '900px',filebrowserImageUploadUrl:'<?php echo site_url('images/uploads') ?>' })</script>
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
        $('#add_thumb').append('<input type="hidden" name="thumb" value='+data._raw+' />');
        
    },
    error:function( err ) {
        console.info( err );    
    }
});







    </script>