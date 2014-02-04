<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

<meta name="Keywords" content="����" />
<meta name="Descriptions" content="����ƶ����ü���ķ�ʽ����μǵ�׫�" />
<link rel="Shortcut Icon" href="<?php echo base_url(); ?>images/Icon.png">
<title>香草旅游</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/reset.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/layout.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/jqueryslidemenu.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/quicksand.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/widget.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/hoverdir.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/own.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/responsive.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/flexslider.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/portfolio.css" />

<!--<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700' rel='stylesheet' type='text/css' />-->
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.8.1.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jqueryslidemenu.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/portfolio_sortable.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/quicksand.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/custom.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/own_slide.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.hoverdir.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.flexslider.js"></script>
<script type="text/javascript">
//Image Hover
jQuery(document).ready(function(){
jQuery(function() {
	jQuery('#list > li').hoverdir();
});
});
jQuery(document).ready(function(){	
	jQuery('.flexslider').flexslider();
	directionNav:true
});


$(document).ready(function(){
$(".flip").click(function(){
    $("#panel").slideToggle("slow");
  });
});


</script>
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php date_default_timezone_set("PRC");?>
</head>



<head>




<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!--[if lt IE 9]>
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
<body>
<!-- Header Start -->
<section id="header_wrap">
<nav id="myslidemenu" class="jqueryslidemenu clearfix">
    <ul>
    <!-- Logo Start -->
<a href="<?php echo base_url(); ?>"><img style="float:left" src="<?php echo base_url(); ?>images/logo.png" alt="img" /></a>
<!-- Logo End -->
        <li><a  onClick="setactive(1)" id="li1" class="" href="<?php echo base_url(); ?>" >首页</a></li>
        <li><a  onClick="setactive(2)" id="li2" class="" href="<?php echo site_url("home/discovery")?>">发现</a></li>
  <li><?php 
			if($isLogin) echo anchor('home/user_center/'.$this->session->userdata('uid'),'个人中心');
			else echo anchor('home/login','登录/注册');?></li>
			
<form class="searchform" method="get" role="search" action="<?php echo site_url("home/search")?>" />
            <input class="s" type="text" onBlur="if(this.value=='') this.value='Site Search'" onFocus="if(this.value =='Site Search' ) this.value=''" value="Site Search" name="searchContent" />
            <input class="searchsubmit" type="submit" value="" style="height: 30px;" />
            <a onClick="document.getElementById('search-form').submit()"></a>
 <div style="margin-left: 10px; float:left; margin-right:15px;"><?php if($isLogin) echo '用户名：'.$this->session->userdata('username')?></div>
			<?php if($isLogin) echo anchor('login/user_logout','注销')?>
        </form>
       
    </ul>
</nav>
</section>
<!-- Header End -->

</body>
</html>
