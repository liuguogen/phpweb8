<header class="header">
<nav class="navbar navbar-default" id="navbar">
<div class="container">
  <div class="header-topbar hidden-xs link-border">
	<ul class="site-nav topmenu">
	  <li><a href="#" >标签云</a></li>
		<li><a href="#" rel="nofollow" >读者墙</a></li>
		<li><a href="#" title="RSS订阅" >
			<i class="fa fa-rss">
			</i> RSS订阅
		</a></li>
	</ul>
			 勤记录 懂分享</div>
  <div class="navbar-header">
	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-navbar" aria-expanded="false"> <span class="sr-only"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
	<h1 class="logo hvr-bounce-in"><a href="/" title="<?php echo $this->config->item('sitename','home_data') ?>"><img src="<?php echo base_url() ?><?php echo  $this->config->item('logo','home_data') ?>" alt="<?php echo $this->config->item('sitename','home_data') ?>"></a></h1>
  </div>
  <div class="collapse navbar-collapse" id="header-navbar">
	<form class="navbar-form visible-xs" action="/Search" method="post">
	  <div class="input-group">
		<input type="text" name="keyword" class="form-control" placeholder="请输入关键字" maxlength="20" autocomplete="off">
		<span class="input-group-btn">
		<button class="btn btn-default btn-search" name="search" type="submit">搜索</button>
		</span> </div>
	</form>
	<ul class="nav navbar-nav navbar-right">
	  <li><a data-cont="木庄网络博客" title="木庄网络博客" href="<?php echo base_url(); ?>">首页</a></li>
	
	  <?php if($this->config->item('cat_list')){

	  	foreach ($this->config->item('cat_list') as $key => $value) {
	  		
	  	
	   ?>
	  <li><a data-cont="<?php echo strtoupper($value['type_name']); ?>" title="<?php echo strtoupper($value['type_name']); ?>" href="<?php echo base_url(); ?><?php echo strtolower($value['type_name']); ?>"><?php echo strtoupper($value['type_name']); ?></a></li>
	  
	  <?php }} ?>
	</ul>
  </div>
</div>
</nav>
</header>