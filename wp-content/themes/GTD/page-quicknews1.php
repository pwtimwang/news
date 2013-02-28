<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="zh-CN">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta charset="utf-8">
<title>PingWest快讯</title>
<link rel="stylesheet" type="text/css" href="http://news.pingwest.com/wp-content/themes/GTD/weiboShow.css">
<link rel="stylesheet" type="text/css" href="http://news.pingwest.com/wp-content/themes/GTD/skin_default.css">
<base target=_blank />
<script type="text/javascript" src="http://news.pingwest.com/wp-includes/js/jquery/jquery.js?ver=1.7.1"></script>
<script type="text/javascript" src="http://news.pingwest.com/wp-includes/js/jquery/jquery-1.6.1.min.js?ver=3.4.2"></script>
<script type="text/javascript" src="http://news.pingwest.com/wp-includes/js/jquery/jquery.masonry.min.js?ver=3.4.2"></script>
<script type="text/javascript" src="http://news.pingwest.com/wp-includes/js/jquery/jquery-ui.custom.min.js?ver=3.4.2"></script>

<style type="text/css">
li.newupdates, li.newcomment {
	display: none;
	background: #F6F3D1;
	background:#EEF7FC;
}

</style>

</head>

<body youdao="youdao">
<div class="WB_widgets weiboShow"  id="pl_weibo_show">
  <div class="weiboShow_wrap"> 
    <div class="weiboShow_title weiboShow_title_top" style="background-color:#343535"> 
      <div class="weiboShow_title_logo" id="weibo_title">
			<a href="http://news.pingwest.com/" target="_blank">
				<!--<em class="WB_logo16a" style="color:white" title="PingWest快讯">PW快讯</em>-->
				<span style="font-size:16px;color:white;font-family: Arial, Hiragino Sans GB,STHeiti,WenQuanYi Micro Hei, SimSun, sans-serif;">#PW快讯#</span>
			</a>
		</div>
					<a href="http://news.pingwest.com/" style="flocat:right" target="_blank">
				<span style="margin-right:12px; font-size:12px;color:white;font-family: Arial, Hiragino Sans GB,STHeiti,WenQuanYi Micro Hei, SimSun, sans-serif;">更多...</span>
			</a>
			
    </div>      
    <div class="weiboShow_main"> 
      <div class="weiboShow_main_height" id="weibo_con">
        <div class="weiboShow_main_feed" style="height: auto; position: relative;" id="weibo_list_con">

<div id="weibo_list">
<?php $my_query = new WP_Query('orderby=asc&showposts=5'); ?>

<ul>
<?php while ($my_query->have_posts()) : $my_query->the_post();?>
<?php global  $post; ?>
<li id="prologue-<?php the_ID(); ?>" class="user_id_<?php the_author_ID( ); ?>">

<div class="weiboShow_mainFeed_list clearfix" style="height:68px">
<div class="weiboShow_mainFeed_list_wrap clearfix" >
<div style="width:60px;height:60px;display:block;float:left;">
	<div style="display:block;float:left;width:50px">
		<div style="display:block;height:20px;text-align: center;background-color:#666460;color:white;padding-top:6px"><?php echo  get_the_time( 'H:i' ); ?></div>
<div style="display:block;height:30px;text-align: center;background-color:#F3F4F4;padding-top:10px"><span style="font-weight: bold;font-size: 20px;"><?php echo  get_the_time( 'd' ); ?></span>/<?php echo  get_the_time( 'm' )%12; ?>月</div>
	</div>
	<div style="border:5px solid #fff; height:0px; width:0px; overflow:hidden; border-left-color:#666460;margin-top:6px" ></div>

</div>
	<div class="weiboShow_mainFeed_listContent" style="float:left;width: 600px;min-height: 50px;">
		<?php $screen = get_post_meta($post->ID, 'screen', $single = true); ?>
		<p class="weiboShow_mainFeed_listContent_txt">

		<a href="<?php the_permalink( ); ?>" class="thepermalink" style="color:#343535;font-weight:bold"><?php echo ($post->post_title); ?> </a> 
</p>

		<p><?php echo mb_substr(strip_tags($post->post_content),0,90,'UTF8'); ?>......</p>
</div>
</div>
</div>
</li>
<?php endwhile; ?>
</ul>


</div>
			
			
		</div>		
      </div>
    </div>
        
    
            
       </div>
</div>




<script type="text/javascript">
	var prologuePostsUpdates = 1;
	var getPostsUpdate = 0;
	var updateRate = "100000";
	var ajaxUrl = "http://localhost/wp-admin/admin-ajax.php";
	var pageLoadTime = "<?php echo gmdate( 'Y-m-d H:i:s' ); ?>";
	var isFirstFrontPage = 1;

	function getPosts(showNotification){
		if (showNotification == null) {
			showNotification = true;
		}
		toggleUpdates('unewposts');
		
		$tt = new Date().getTime();
		//var queryString = ajaxUrl +'?action=prologue_latest_posts_sidebar&load_time=' + pageLoadTime + '&frontpage=' + isFirstFrontPage + '&tt=' + $tt;
		//var queryString = 'http://127.0.0.1/wp-admin/admin-ajax.php' +'?action=prologue_latest_posts_sidebar&load_time=' + pageLoadTime + '&frontpage=' + isFirstFrontPage + '&tt=' + $tt;
		var queryString = 'http://localhost/' +'?action=prologue_latest_posts_sidebar1&load_time=' + pageLoadTime + '&frontpage=' + isFirstFrontPage + '&tt=' + $tt;
		ajaxCheckPosts = $.getJSON(queryString, function(newPosts){
		//$.getJSON(queryString,{param:"gaoyusi"},function(newPosts){
		if (typeof newPosts.numberofnewposts != "undefined") {
				pageLoadTime = newPosts.lastposttime;
				if (!isFirstFrontPage || (typeof newPosts.html == "undefined") ) {
					newUnseenUpdates = newUnseenUpdates+newPosts.numberofnewposts;
					message = p2txt.n_new_updates.replace('%d', newUnseenUpdates) + " <a href=\"" + wpUrl +"\">"+p2txt.goto_homepage+"</a>";
					newNotification(message);
				} else {
					postlastime = newPosts.lastposttime;
					postattchmetntime = postlastime.substring(11);
					var finaltext = newPosts.html + '<span id="attachmentid_span'+postattchmetntime+'"></span>';  //vaj change
					$("#weibo_list > ul > li:first").before(finaltext);
					var newUpdatesLi = $("#weibo_list > ul > li.newupdates");
					newUpdatesLi.slideDown();
					var counter = 0;
					newUpdatesLi.each(function() {
							$(this).animate({backgroundColor:'transparent'}, 5000, function(){
								$(this).removeClass('newupdates');
								//titleCount();
							});

						var i = $("#weibo_list > ul > li").size();
						if( i > 5 )
						{
						    $("#weibo_list > ul > li:last").remove();
						}
					});
				}
			}
		});
		toggleUpdates('unewposts');
	}
	
	
		function toggleUpdates(updater){
		switch (updater) {
			case "unewposts":
				if (0 == getPostsUpdate) {
					getPostsUpdate = setInterval(getPosts, updateRate);
				}
				else {
					clearInterval(getPostsUpdate);
					getPostsUpdate = '0';
				}
				break;

			case "unewcomments":
				if (0 == getCommentsUpdate) {
					getCommentsUpdate = setInterval(getComments, updateRate);
				}
				else {
					clearInterval(getCommentsUpdate);
					getCommentsUpdate = '0';
				}
				break;
		}
	}
	
	
	function bindActions(element, type) {
			// Turn on automattic updating	
		if (prologuePostsUpdates && 1) {
			toggleUpdates('unewposts');
		}
	}
	
	bindActions();
</script>

</body>
</html>