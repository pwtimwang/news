<?php
//print_r(get_option('members_only_options'));
wp_get_current_user();
$userinfo = getLoginUserInfo();
if(get_option('feed_access')=='require_login' && !getLoginUserInfo())
{
	wp_redirect(get_option('siteurl')."/wp-login.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  xmlns:wb="http://open.weibo.com/wb" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
	<link href="http://www.pingwest.com/wp-content/uploads/2013/01/pw120x120.jpg" rel="apple-touch-icon-precomposed">
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>?3" type="text/css" media="screen" />
    <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<script src="http://tjs.sjs.sinajs.cn/open/api/js/wb.js?appkey=761238391" type="text/javascript" charset="utf-8"></script>
	<link rel="shortcut icon" href="http://news.pingwest.com/favicon.ico">
    <?php wp_head(); ?>
</head>
<body<?php if(is_single()) echo ' class="single"'; ?>>

<div id="header" style="position: fixed; top: 0; left: 0; right: 0; z-index: 1023; padding-bottom: 0;">
	<div class="sleeve">
    	<div class="header_left">
		<h1 style="margin-left:-3px;"><a href="<?php bloginfo( 'url' ); ?>/"><img src="http://news.pingwest.com/wp-content/uploads/2012/12/alertlogo.png" alt="PingWest快讯"></a></h1>
			<?php if(get_bloginfo('description')) : ?><small><?php bloginfo( 'description' ); ?></small><?php endif; ?>
            
           <?php
           if($userinfo['ID'])
		   {
		   ?> 
            <p class="login ">Hi <strong> <a href="<?php echo get_option('siteurl');?>/wp-admin/profile.php"><?php echo $userinfo['display_name']; ?></a></strong>, | <a href="<?php echo get_option('siteurl');?>/wp-admin/post-new.php">Add Post</a> | <a href="<?php echo get_option('siteurl');?>/wp-login.php?action=logout&_wpnonce=">Logout</a> </p>
      
      <?php
      }else
	  {
	  	?>
        <p class="login "><strong></strong></p>
        <?php
	  }
	  ?>    </div>
            
            <span style="position: absolute;right: 300px;top: 30px;font-size: 14px;"><a href="http://www.pingwest.com" target="_blank">返回PingWest主站点</a></span>

            <?php get_search_form(); ?>
	
<!--
            <ul class="nav">
            	<li><a href="http://www.pingwest.com/">首页</a></li><li><a href="http://news.pingwest.com/">快讯</a></li><li><a href="http://www.pingwest.com/category/%e5%89%8d%e6%b2%bf/">前沿</a></li><li><a href="http://www.pingwest.com/category/%e5%ae%9e%e5%bd%95/">实录</a></li><li><a href="http://www.pingwest.com/category/%e6%80%81%e5%ba%a6/">态度</a></li><li><a href="http://www.pingwest.com/category/demo/">Demo</a></li><li><a href="http://www.pingwest.com/category/%e5%88%b0%e7%a1%85%e8%b0%b7%e4%b8%ad%e5%9b%bd%e5%8e%bb/">到硅谷/中国去</a></li><li><a href="http://www.pingwest.com/category/ceo%e4%b8%93%e6%a0%8f/">CEO专栏</a></li> <li><a href="http://www.pingeast.com/">PingEast</a></li>
            </ul>
-->            
            
	</div>
</div>


<div id="wrapper" style="margin-top:80px;">
	<?php get_sidebar( );?>