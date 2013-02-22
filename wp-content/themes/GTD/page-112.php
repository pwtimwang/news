<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:wb="http://open.weibo.com/wb" dir="ltr" lang="zh-CN">
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
<script src="http://tjs.sjs.sinajs.cn/open/api/js/wb.js?appkey=761238391" type="text/javascript" charset="utf-8"></script>
</head>

<body youdao="youdao">
<div class="WB_widgets weiboShow"  id="pl_weibo_show">
  <!-- 顶部边框/标识彩条 -->

<!--
<div class="weiboShow_topborder">
    <p></p>
  </div>
-->
<script type="text/javascript">
// 如需添加回调函数，请在wbml标签中添加onlogin="login" onlogout="logout"，并定义login和logout函数。
function login(o) {
    alert(o.screen_name)
}
 
function logout() {
    alert('logout');
}
</script>
<wb:login-button type="3,2" ></wb:login-button>

  <!-- /顶部边框/标识彩条 -->
  <div class="weiboShow_wrap"> 
    
    <!-- 标题 置顶 -->
    <div class="weiboShow_title weiboShow_title_top"> 
      <!-- logo -->
      <div class="weiboShow_title_logo" id="weibo_title"><a href="http://news.pingwest.com/" target="_blank">
	  <em class="WB_logo16a" title="PingWest快讯">PingWest快讯</em><span style="font-size:16px;color:black;font-family: Arial, Hiragino Sans GB,STHeiti,WenQuanYi Micro Hei, SimSun, sans-serif;">PingWest快讯</span></a></div>
      <!-- /logo --> 
    </div>
    <!-- /标题 置顶 --> 
          
     
      
    <div class="weiboShow_main"> 
      <div class="weiboShow_main_height" id="weibo_con">

                <!-- weiboShow_main_feed -->
        <div class="weiboShow_main_feed" style="height: auto; position: relative;" id="weibo_list_con"><!-- 高度设定 --> 
			
			
			<?php
			/*
			Template Name: Random Post
			*/
			?>



<div id="weibo_list">
<?php $my_query = new WP_Query('orderby=asc&showposts=5'); ?>

<ul>
<?php while ($my_query->have_posts()) : $my_query->the_post();?>
<?php global  $post; ?>
<li id="prologue-<?php the_ID(); ?>" class="user_id_<?php the_author_ID( ); ?>">

	<div class="weiboShow_mainFeed_list clearfix">
	<div class="weiboShow_mainFeed_list_wrap clearfix">
	<div class="weiboShow_mainFeed_listContent">
	<?php $screen = get_post_meta($post->ID, 'screen', $single = true); ?>
<p class="weiboShow_mainFeed_listContent_txt">

	<p class="titlestyle" title="<?php the_title(); ?>"><?php echo '【'.($post->post_title).'】'; ?> <?php echo (strip_tags($post->post_content)); ?></p>

</p>
<p class="weiboShow_mainFeed_listContent_action WB_linkB"><span class="weiboShow_mainFeed_listContent_actionTime"><a href="http://news.pingwest.com" target="_blank">
<?php echo  get_the_time( 'Y-m-d H:i:s' ); ?>
</a></span><span class="weiboShow_mainFeed_listContent_actionMore"></span></p>
</div>
</div>
</div>
</li>
<?php endwhile; ?>
</ul>


</div>
			
			
		</div>
		  
		 
        <!-- /weiboShow_main_feed --> 

		
      </div>
    </div>
        
    
            
       </div>
</div>

<script type="text/javascript">
    function ajaxslidepage(b,c) {
       $.ajax({
            url: 'http://127.0.0.1/?action=ajax_slidepage&page='+c,
            type: 'get',
            beforeSend: function() {
                var loading = 'loading';
                $(b).empty().html(loading)
            },
            error: function(a,stateMsg) {
                $('#test').empty().html('failure');
            },
            success: function(a) {
                $('#test').empty().html(a);
            }
        });
		$.getJSON("http://127.0.0.1/?action=ajax_slidepage&page",{param:"gaoyusi"},function(data){
		alert("OK");
		//$('#test').empty().html('failure');

　　	  //此处返回的data已经是json对象

　　	  //以下其他操作同第一种情况

//　　	  $.each(data.root,function(idx,item){
//
//　　	  if(idx==0){
//
//　　	  return true;//同countinue，返回false同break
//
//　　	  }
//
//　　	  alert("name:"+item.name+",value:"+item.value);
//
//　　	  });

　　	  });
        return false
    };
	
	$('#test').click(function() {
        $('#slider4 .pagenum').removeClass('active');
        next = $(this).attr('rel');
        next = -next*305;
        $('#slider4 .overview').animate({'left':next});//点击后的滑动效果
        $(this).addClass('active');
        var id = $(this).attr('id'); //获取点击的该pager的id
        var show = id == 'pagenum2'?'#page2':'#page3'; //根据id查找下面对应显示的项目
        if($(show).find('ul').length == 0){ //判断，使仅载入一次
        ajaxslidepage(show,id); //调用，在id=xx中显示对应内容
        }
        //event.preventDefault(); //阻止默认行为（此处为链接点击）
    });
	
</script>



<script type="text/javascript">
	var prologuePostsUpdates = 1;
	var getPostsUpdate = 0;
	var updateRate = "50000";
	var ajaxUrl = "http://localhost/wp-admin/admin-ajax.php";
	var pageLoadTime = "<?php echo gmdate( 'Y-m-d H:i:s' ); ?>";
	//var pageLoadTime = "<?php echo  get_the_time( 'Y-m-d H:i:s' ); ?>"; 
	//var pageLoadTime = "<?php echo  date("Y-m-d H:i:s"); ?>"; 
	//pageLoadTime = "2012-12-15 02:05:49";
	var isFirstFrontPage = 1;

	/*
	* Check for new posts and loads them inline
	*/
	function getPosts(showNotification){
		if (showNotification == null) {
			showNotification = true;
		}
		toggleUpdates('unewposts');
		
		$tt = new Date().getTime();
		//var queryString = ajaxUrl +'?action=prologue_latest_posts_sidebar&load_time=' + pageLoadTime + '&frontpage=' + isFirstFrontPage + '&tt=' + $tt;
		//var queryString = 'http://127.0.0.1/wp-admin/admin-ajax.php' +'?action=prologue_latest_posts_sidebar&load_time=' + pageLoadTime + '&frontpage=' + isFirstFrontPage + '&tt=' + $tt;
		var queryString = 'http://localhost/' +'?action=prologue_latest_posts_sidebar&load_time=' + pageLoadTime + '&frontpage=' + isFirstFrontPage + '&tt=' + $tt;
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
					//getLastpost_meta(postattchmetntime);
					var finaltext = newPosts.html + '<span id="attachmentid_span'+postattchmetntime+'"></span>';  //vaj change
					//$("#main > ul > li:first").before(finaltext);
					$("#weibo_list > ul > li:first").before(finaltext);
					var newUpdatesLi = $("#weibo_list > ul > li.newupdates");
					newUpdatesLi.slideDown();
					var counter = 0;
					//$('#posttext_error, #commenttext_error').hide();
					newUpdatesLi.each(function() {
						// Add post to postsOnPageQS  list
						//var thisId = $(this).attr("id");
						//vpostId = thisId.substring(thisId.indexOf('-')+1);
						//postsOnPageQS+= "&vp[]=" + vpostId;
						//if (!(thisId in postsOnPage))
						//	postsOnPage.unshift(thisId);
						// Bind actions to new elements
						//bindActions(this, 'post');
						//if (isElementVisible(this) && !showNotification) {
							$(this).animate({backgroundColor:'transparent'}, 2500, function(){
								$(this).removeClass('newupdates');
								//titleCount();
							});
						//}
						var i = $("#weibo_list > ul > li").size();
						if( i > 5 )
						{
						    $("#weibo_list > ul > li:last").remove();
						}
						//counter++;
					});
					if (counter >= newPosts.numberofnewposts && showNotification) {
						//var updatemsg = isElementVisible('#main > ul >li:first') ? "" :  "<a href=\"#\"  onclick=\"jumpToTop();\" \">"+p2txt.jump_to_top+"</a>" ;
						//newNotification(p2txt.n_new_updates.replace('%d', counter) + " " + updatemsg);
						//titleCount();
					}
				}
				//$('.newupdates > h4, .newupdates > div').hover( removeYellow, removeYellow );
			}
		});
		//Turn updates back on
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

<script language="JavaScript">
$(document).ready(function(){
        parent.document.all("iframepage").style.height=document.body.scrollHeight; 
parent.document.all("iframepage").style.width=document.body.scrollWidth;
    });
});
</script>



</body>
</html>