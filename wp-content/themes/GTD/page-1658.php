<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:wb="http://open.weibo.com/wb" dir="ltr" lang="zh-CN">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>评论</title>
<link href="<?php echo $PWPlugin_url;?>/css/static.css" rel="stylesheet" type="text/css">

<link href="<?php echo $PWPlugin_url;?>/css/model3.css" rel="stylesheet" type="text/css">


<style type="text/css">

</style>

	<?php 
	global $PWPlugin_url;
	global $post;
	$post = & get_post($_GET["POST_ID"]);
	?>
	
<script type="text/javascript">
usrInfo = "";

WB2.anyWhere(function(W){
    // 获取评论列表
W.parseCMD("/short_url/comment/counts.json", function(sResult, bStatus){
    if(bStatus == true) {
alert(sResult);
    }
},{
	url_short : 'http://t.cn/zYzqMgw&url_short=http://t.cn/zYzqtXh'
},{
    method: 'get'
});
});

// 如需添加回调函数，请在wbml标签中添加onlogin="login" onlogout="logout"，并定义login和logout函数。
function login(o) {
    alert(o.screen_name);
	usrInfo = o;
}
 
function logout() {
    alert('logout');
}


function publish()
	{
	var commenttext = $.trim($('#pw_comment_content').val());
	if ("" == commenttext) {
			$("label#commenttext_error").text('This field is required').show().focus();
			return false;
	}
	
	WB2.anyWhere(function(W){
    // 获取评论列表
W.parseCMD("/statuses/update.json", function(sResult, bStatus){
    if(bStatus == true) {
alert(sResult);
newComment();
    }
},{
	status : commenttext
},{
    method: 'post'
});
});

	}
		
</script>


<script src="<?php echo $PWPlugin_url;?>/css/comment_a.js" type="text/javascript"></script>
<script type="text/javascript">
_domain = 'www.pingwest.com';
var _denglu_isLogin = true;
var _denglu_image_url = 'http://www.pingwest.com/wp-content/uploads/2013/01/屏幕快照-2013-01-19-上午8.21.22.png';
var _denglu_video_url = '';
var _denglu_postfromurl = '';

var commentCookieName = 'comment-20592denRbLvRNV4o0NRZSqfVtBsXA-157237';
var shareCookieName = 'share-20592denRbLvRNV4o0NRZSqfVtBsXA-157237';
var logininfo = "来说几句吧...";
var _denglu_strange_name_info = "匿名";
var _denglu_strange_email_info = "";
var _denglu_strange_url_info = "http://";
var _denglu_is_elle = false;
var _denglu_is_elle_cad = false;
var _denglu_top_textarea = true;
var _denglu_cstrangeemail = true;
var _denglu_subjectid = 157237;
var _denglu_templateid = 3;
$(function () {
	

	$("#sortAllLink").click(function (e) {//排序
    	$("#sortTypeMenu").toggle();
		resizeIframeComment(document.body.scrollHeight < 415 ? document.body.scrollHeight - 415 : 0);
		stopBubble(e);
	});
	$(".dl_sort_select").change(function() {
		location.href = $(this).val();
	});
	$("#idenglu_emotion").children("li").click(function(e) {
		emotionClick(e, $(this).children("img"));
	}).end()
	.find(".dl_face_body").find("#idenglu_emotion_tab_qq").children("a").click(function(e) {
		emotionClick(e, this);
	}).end().end()
	.find("#idenglu_emotion_tab_ali,#idenglu_emotion_tab_lang").children("a").click(function(e) {
		emotionClick(e, this, 2);
	});
	$("#idenglu_synchro, .dl_face_menu").click(function(e) {
		stopBubble(e);
	});
  	$(document.body).click( function() {
		$("#idenglu_synchro_1:visible").hide();
		$("#idenglu_synchro_2:visible").hide();
		$("#idenglu_synchro_3:visible").hide();
		if ($("#idenglu_emotion_1:visible").length || $("#idenglu_emotion_3:visible").length) {
			var type = $("#idenglu_emotion").attr("emotion_type");
			if (type && type != 2) {
				resizeIframeComment();
			}
		}
		$("#idenglu_emotion_1:visible").hide();
		$("#idenglu_emotion_2:visible").hide();
		$("#idenglu_emotion_3:visible").hide();
 		$("#sortTypeMenu:visible").hide();
	});

  	// 评论框
  	bindInfo($("#idenglu_comment_content"), logininfo, function() {$("#idenglu_comment_succeed").hide();});
  	if ($.trim($("#idenglu_name2").val())) {
  		_denglu_strange_name_info = $("#idenglu_name2").val();
  	}
  	bindInfo($("#idenglu_name2"), _denglu_strange_name_info);
  	bindInfo($("#idenglu_name"), _denglu_strange_name_info);
  	bindInfo($("#idenglu_email2"), _denglu_strange_email_info);
  	bindInfo($("#idenglu_email"), _denglu_strange_email_info);
  	bindInfo($("#idenglu_homepage2"), _denglu_strange_url_info);
  	bindInfo($("#idenglu_homepage"), _denglu_strange_url_info);
  	$("#idenglu_reply_content").focus(function() {$("#idenglu_reply_succeed").hide();})

  	// 一键分享的内容字数
  	$("#idenglu_share_content").keyup(function(evt){
		$("#idenglu_share_content_count").html(count($(this).val())/2);
	});
  	$("#idenglu_comment_content").keyup(function(evt){
		$("#idenglu_comment_content_count").html("已输入" + (count($(this).val())/2) + "个字");
	});
  	$("#idenglu_reply_content").keyup(function(evt){
		$("#idenglu_reply_content_count").html("已输入" + (count($(this).val())/2) + "个字");
	});
});

function emotionClick(e, node, etype) {
	var $idenlgu_face = $("#idenglu_emotion");
	var type = $idenlgu_face.attr("emotion_type");
	if (!type) {
		type = 1;
	}
	var left = etype == 2 ? "[" : "(";
	var right = etype == 2 ? "]" : ")";
	switch (type) {
	case 1:
	case "1":
		if ($("#idenglu_comment_content").val() == logininfo) {
			$("#idenglu_comment_content").val("");
		}
		$("#idenglu_comment_content").val($("#idenglu_comment_content").val() + left + $(node).attr("title") + right).keyup();
		break;
	case 2:
	case "2":
		$("#idenglu_share_content").val($("#idenglu_share_content").val() + left + $(node).attr("title") + right).keyup();
		break;
	case 3:
	case "3":
		$("#idenglu_reply_content").val($("#idenglu_reply_content").val() + left + $(node).attr("title") + right).keyup();
		break;
	}
	$("#idenglu_emotion_" + type).hide();
	resizeIframeComment();
	stopBubble(e);
}

function bindInfo(node, info, focusFunction) {
	$(node).focus(function() {
	  	if ($(this).val() == info && info != _denglu_strange_url_info) {
			$(this).val("");
	  	}
	  	if ($.isFunction(focusFunction)) {
	  		focusFunction();
		}
  	})
  	.blur(function() {
		if (!$(this).val()) {
			$(this).val(info);
		}
  	}).val(info);
}

function resizeIframeComment(height) {
	if (!height) {
		height = 0;
	}
	parent.socket.postMessage(parseInt($(".dengluComments").height() - height));
}
function gotoTop(flag) {
	parent.socket.postMessage(flag);
}
function exitAction() {
	parent.socket.postMessage("exit");
}
</script>

<script type="text/javascript" src="<?php echo $PWPlugin_url;?>/css/model3.js"></script>

</head>
<body>




<div class="dengluComments">
<!--灯鹭社会化评论 begin-->
<div class="dl_comment">
	<!--头部信息及功能 begin-->
	<div class="dl_head layout">
		<div class="dl_head_tlt">PingWest</div>
		<ul class="dl_head_link layout">
		</ul>
	</div>
	<!--头部信息及功能 end-->
	<!--评论框部分 begin-->
	<div class="dl_publish">
		<div class="dl_publish_login">
			<div id="idenglu_userinfo" class="dl_publish_success">
				<!--<wb:login-button type="3,2" onlogin="login" onlogout="logout" ></wb:login-button>-->
			</div>
		</div>
		<div class="dl_publish_textarea">
			<div class="dl_textarea">
			<div class="dl_textarea_jiao"></div>
				<div class="dl_textarea_input"><textarea id="pw_comment_content"></textarea></div>
				<div class="dl_textarea_tool layout">
					<ul class="dl_tool_btn layout">
						<li class="dl_tool_face" style="padding-top:0px">
							<a href="javascript:;" onclick="javascript:_CAC.showEmotionModel(event, 1);">表情</a>
							<!--表情弹出层 begin-->
							<div id="idenglu_emotion_1" style="display:none;">
							</div>
							<!--表情弹出层 end-->
						</li>
					</ul>
					<div class="dl_tool_submit">
						<!--<a class="dl_submit_btn" href="javascript:;" onclick="javascript:_CAC.addComment(36994, 157237, 3);">发布评论</a>-->
						<!--<a class="dl_submit_btn" href="javascript:;" onclick="publish();">发布评论</a>-->
						<a class="dl_submit_btn" href="javascript:;" onclick="newComment();">发布评论</a>
						
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--评论框部分 end-->
	<!--评论列表信息部分 包括信息、排序、分页等 begin-->
	<div class="dl_infor layout">
		<div class="dl_infor_message layout">
			<div class="dl_message">已有<em><?php echo get_comments_number($post->ID); ?></em>条评论</div>
			<div class="dl_sort">
			<!--
				<select class="dl_sort_select">
	<option value="http://open.denglu.cc/connect/comment.jsp?appid=20592denRbLvRNV4o0NRZSqfVtBsXA&amp;postid=5118&amp;domain=www.pingwest.com&amp;from=http%3A%2F%2Fwww.pingwest.com%2Fwhat-is-chinese-market-the-hell%2F&amp;exit=http%3A%2F%2Fwww.pingwest.com%2Fwp-login.php%3Faction%3Dlogout%26amp%3Bredirect_to%3Dhttp%253A%252F%252Fwww.pingwest.com%252Fwhat-is-chinese-market-the-hell%252F%26amp%3B_wpnonce%3Da5ec8b1a49&amp;sort=0">按时间排序
	</option><option value="http://open.denglu.cc/connect/comment.jsp?appid=20592denRbLvRNV4o0NRZSqfVtBsXA&amp;postid=5118&amp;domain=www.pingwest.com&amp;from=http%3A%2F%2Fwww.pingwest.com%2Fwhat-is-chinese-market-the-hell%2F&amp;exit=http%3A%2F%2Fwww.pingwest.com%2Fwp-login.php%3Faction%3Dlogout%26amp%3Bredirect_to%3Dhttp%253A%252F%252Fwww.pingwest.com%252Fwhat-is-chinese-market-the-hell%252F%26amp%3B_wpnonce%3Da5ec8b1a49&amp;sort=1" selected="selected">按时间倒序
	</option><option value="http://open.denglu.cc/connect/comment.jsp?appid=20592denRbLvRNV4o0NRZSqfVtBsXA&amp;postid=5118&amp;domain=www.pingwest.com&amp;from=http%3A%2F%2Fwww.pingwest.com%2Fwhat-is-chinese-market-the-hell%2F&amp;exit=http%3A%2F%2Fwww.pingwest.com%2Fwp-login.php%3Faction%3Dlogout%26amp%3Bredirect_to%3Dhttp%253A%252F%252Fwww.pingwest.com%252Fwhat-is-chinese-market-the-hell%252F%26amp%3B_wpnonce%3Da5ec8b1a49&amp;sort=2">按平台排序
	</option><option value="http://open.denglu.cc/connect/comment.jsp?appid=20592denRbLvRNV4o0NRZSqfVtBsXA&amp;postid=5118&amp;domain=www.pingwest.com&amp;from=http%3A%2F%2Fwww.pingwest.com%2Fwhat-is-chinese-market-the-hell%2F&amp;exit=http%3A%2F%2Fwww.pingwest.com%2Fwp-login.php%3Faction%3Dlogout%26amp%3Bredirect_to%3Dhttp%253A%252F%252Fwww.pingwest.com%252Fwhat-is-chinese-market-the-hell%252F%26amp%3B_wpnonce%3Da5ec8b1a49&amp;sort=3">按好评度排序
	</option><option value="http://open.denglu.cc/connect/comment.jsp?appid=20592denRbLvRNV4o0NRZSqfVtBsXA&amp;postid=5118&amp;domain=www.pingwest.com&amp;from=http%3A%2F%2Fwww.pingwest.com%2Fwhat-is-chinese-market-the-hell%2F&amp;exit=http%3A%2F%2Fwww.pingwest.com%2Fwp-login.php%3Faction%3Dlogout%26amp%3Bredirect_to%3Dhttp%253A%252F%252Fwww.pingwest.com%252Fwhat-is-chinese-market-the-hell%252F%26amp%3B_wpnonce%3Da5ec8b1a49&amp;sort=4">按回复数排序
</option></select>
-->

			</div>
		</div>
		<div class="dl_infor_page layout"></div>

	</div>
	<!--评论列表信息部分 包括信息、排序、分页等 end-->
	<!--评论列表 begin-->
	<div id="idenglu_comments" class="dl_list">
	
	<?php echo $post->ID; ?>
	<?php 
	global $post;
	$args = array(
		'status' => 'approve',
		'search' => '',
		'user_id' => '',
		'offset' => '',
		'number' => '',
		'post_id' => $post->ID,
		'type' => '',
		'orderby' => '',
		'order' => '',
		);
	
	function pw_get_childrencomments( $comments, $parentcomment ) 
	{
		$children = array();
		foreach($comments as $comment)
			{
			if($comment->comment_parent == $parentcomment->comment_ID )
				{
					array_push($children, $comment);
				}
			}
		return $children;
	}
	
	function outputcomment($comment, $styleClass)
	{
	?>
		<div id="c-<?php echo $comment->comment_ID; ?>" class="<?php echo $styleClass; ?>">
		<div class="dl_post_main">
		<div class="dl_post_avatar">
		<?php echo get_avatar($comment); ?>
		</div>
		<div class="dl_post_body">
		<div class="dl_post_name">
		<div class="dl_name">
				<a class="dl_name_text" rel="nofollow" target="_blank" href="http://aass1.cc"><?php echo $comment->comment_author; ?></a>
				<?php if(strpos($comment->comment_author_url, 'weibo.com'))
				{ ?>
					<span class="dl_name_icon icon_3"></span>
					<span class="dl_name_from">来自新浪微博</span>
			<?php } ?>
				<span class="dl_name_time" title="发表于<?php echo $comment->comment_date; ?>">8小时前</span>
		</div>
		</div>
		<div class="dl_post_content">
				<p><?php echo $comment->comment_content; ?></p>
		</div>
		<div class="dl_post_control layout">
		<ul class="dl_control_message">
				<li class="dl_control_time" style="padding-top:0px; border-top:none" title="发表于<?php echo $comment->comment_date; ?>">8小时前</li>
		</ul>
		<ul class="dl_post_function">
		<li class="dl_function_reply"  style="padding-top:0px; border-top:none"><span></span>
		
		<a onclick="javascript:_CAC.intoReply(1507463, 36994, 1507463, '匿名');" href="javascript:;">回复</a>
		
					<?php if (function_exists('post_reply_link'))

					echo post_reply_link(array('before' => ' | ', 'reply_text' => __('Reply1', 'p2'), 'add_below' => 'c'), $comment->comment_ID); ?>
		

		
		<a rel="nofollow" class="comment-reply-link" style="display:none" href="<?php the_permalink( ); ?>#respond" onclick="CancelForm()">Cancel</a>
		<a rel="nofollow" class="comment-reply-link" href="<?php the_permalink( ); ?>#respond" onclick='return moveForm1();'>Reply</a>
				
				
		
		</li>
		</ul>
		</div>
		</div>
		</div>
		<!--展开收起回复列表 begin-->
		<!--展开收起回复列表 end-->
		</div>

				<div id="idenglu_replys_<?php echo $comment->comment_ID; ?>" class="dl_reply">
		</div>

<?php }

$comments = get_comments($args);

//$api_url= 'api.weibo.com/2/statuses/user_timeline.json?screen_name=PingWest%E4%B8%AD%E6%96%87%E7%BD%91&access_token=2.00rmNlFD6QYQNE3f4025103412CFRD';
//$weiboComments = get_url_array($api_url);

//$request = new WP_Http;
//$result = $request -> request($api_url);
//if (is_array($result)) {
//	$result = $result['body'];
//	$result = json_decode($result, true);
//	$result = $result['urls'];
//	$url_short = $result[0]['url_short'];
//	if ($url_short) $long_url = $url_short;
//}
//
//class_exists('OAuthV2') or require($_SERVER['DOCUMENT_ROOT']."/wp-content/plugins/wp-connect/OAuth/OAuthV2.php");
//class_exists('sinaClientV2') or require($_SERVER['DOCUMENT_ROOT']."/wp-content/plugins/wp-connect/OAuth/sina_OAuthV2.php");
////$to = new sinaClientV2(SINA_APP_KEY, SINA_APP_SECRET, '2.00rmNlFD6QYQNE3f4025103412CFRD');
//$to = new sinaClientV2(SINA_APP_KEY, SINA_APP_SECRET);
//$code = $to->getAuthorizeURL($oauth_token,'http://news.pingwest.com/wp-content/plugins/wp-connect/dl_receiver.php');
//$keys = array();
//$keys['code'] = $code;
//$token = $to->getAccessToken($keys);
//if($token)
//{
//	echo "00000";
//	echo var_dump($token);
//}
//$result = $to -> get_comments('3538077135454750');
//if($result)
//{
//	echo "111111111111";
//	echo var_dump($result);
//}
//else
//{
//	echo "22222222222222";
//	echo var_dump($result);
//}

//$response = w3_http_get($api_url);
//
//if (!is_wp_error($response)) {
//	return json_decode($response['body']);
//}


global $comment;
if ( $comments)
{
	foreach($comments as $comment)
	{
		if($comment->comment_parent ==0)
		{
			outputcomment($comment, 'dl_post');
			if($children = pw_get_childrencomments($comments, $comment))
			{
				foreach($children as $comment)
				{
					outputcomment($comment, 'dl_reply');
				}
			}
		}
	}
}
?>

	

</div>
	</div>
	<!--评论列表 end-->
	<div class="dl_foot">
		<div class="dl_infor layout">
			<div class="dl_infor_message">
			        <div class="dl_message">已有<em>28</em>条评论,共<em>18</em>人参与</div>
				<div class="dl_sort">
				<!--
					<select class="dl_sort_select">
	<option value="http://open.denglu.cc/connect/comment.jsp?appid=20592denRbLvRNV4o0NRZSqfVtBsXA&amp;postid=5118&amp;domain=www.pingwest.com&amp;from=http%3A%2F%2Fwww.pingwest.com%2Fwhat-is-chinese-market-the-hell%2F&amp;exit=http%3A%2F%2Fwww.pingwest.com%2Fwp-login.php%3Faction%3Dlogout%26amp%3Bredirect_to%3Dhttp%253A%252F%252Fwww.pingwest.com%252Fwhat-is-chinese-market-the-hell%252F%26amp%3B_wpnonce%3Da5ec8b1a49&amp;sort=0">按时间排序
	</option><option value="http://open.denglu.cc/connect/comment.jsp?appid=20592denRbLvRNV4o0NRZSqfVtBsXA&amp;postid=5118&amp;domain=www.pingwest.com&amp;from=http%3A%2F%2Fwww.pingwest.com%2Fwhat-is-chinese-market-the-hell%2F&amp;exit=http%3A%2F%2Fwww.pingwest.com%2Fwp-login.php%3Faction%3Dlogout%26amp%3Bredirect_to%3Dhttp%253A%252F%252Fwww.pingwest.com%252Fwhat-is-chinese-market-the-hell%252F%26amp%3B_wpnonce%3Da5ec8b1a49&amp;sort=1" selected="selected">按时间倒序
	</option><option value="http://open.denglu.cc/connect/comment.jsp?appid=20592denRbLvRNV4o0NRZSqfVtBsXA&amp;postid=5118&amp;domain=www.pingwest.com&amp;from=http%3A%2F%2Fwww.pingwest.com%2Fwhat-is-chinese-market-the-hell%2F&amp;exit=http%3A%2F%2Fwww.pingwest.com%2Fwp-login.php%3Faction%3Dlogout%26amp%3Bredirect_to%3Dhttp%253A%252F%252Fwww.pingwest.com%252Fwhat-is-chinese-market-the-hell%252F%26amp%3B_wpnonce%3Da5ec8b1a49&amp;sort=2">按平台排序
	</option><option value="http://open.denglu.cc/connect/comment.jsp?appid=20592denRbLvRNV4o0NRZSqfVtBsXA&amp;postid=5118&amp;domain=www.pingwest.com&amp;from=http%3A%2F%2Fwww.pingwest.com%2Fwhat-is-chinese-market-the-hell%2F&amp;exit=http%3A%2F%2Fwww.pingwest.com%2Fwp-login.php%3Faction%3Dlogout%26amp%3Bredirect_to%3Dhttp%253A%252F%252Fwww.pingwest.com%252Fwhat-is-chinese-market-the-hell%252F%26amp%3B_wpnonce%3Da5ec8b1a49&amp;sort=3">按好评度排序
	</option><option value="http://open.denglu.cc/connect/comment.jsp?appid=20592denRbLvRNV4o0NRZSqfVtBsXA&amp;postid=5118&amp;domain=www.pingwest.com&amp;from=http%3A%2F%2Fwww.pingwest.com%2Fwhat-is-chinese-market-the-hell%2F&amp;exit=http%3A%2F%2Fwww.pingwest.com%2Fwp-login.php%3Faction%3Dlogout%26amp%3Bredirect_to%3Dhttp%253A%252F%252Fwww.pingwest.com%252Fwhat-is-chinese-market-the-hell%252F%26amp%3B_wpnonce%3Da5ec8b1a49&amp;sort=4">按回复数排序
</option></select>
-->

				</div>
			</div>
			<div class="dl_infor_page layout"></div>

		</div>
	</div>
</div>
<!--灯鹭社会化评论 end-->
<!--回复框 -->
<div id="response" class="dl_publish_textarea" style="display: none;">
	<div class="dl_avatar"><img src="<?php echo $PWPlugin_url;?>/css/1.jpg"></div>
	<div class="dl_textarea">
		<div class="dl_textarea_input"><textarea id="idenglu_reply_content"></textarea></div>
		<div class="dl_textarea_tool layout">
			<ul class="dl_tool_btn layout">
				<li class="dl_tool_face">
					<a href="javascript:;" onclick="javascript:_CAC.showEmotionModel(event, 3);">表情</a>
					<!--表情弹出层 begin-->
					<div id="idenglu_emotion_3" style="display:none;"></div>
					<!--表情弹出层 end-->
				</li>
				<!--同步部分 begin-->
				<li id="idenglu_synchro_list_3" class="dl_tool_feed">
					<ul class="dl_feed_layout layout">
	<li class="dl_feed_text">同步到：</li>
	<li onclick="javascript:_CAC.clickSynchro(this);" mid="3" ck="0" class="icon_3"></li>
</ul>

				</li>
				<!--同步部分 end-->
			</ul>
			<div class="dl_tool_submit">
		<script type="text/javascript">
		function CancelForm()
					{
					$("#response").hide();
					}
		</script>
		
				<a rel="nofollow" id="btnCancel" class="comment-reply-link" onclick="CancelForm()">Cancel</a>
				<a class="dl_submit_btn" href="javascript:;" onclick="javascript:_CAC.addReply(36994, 157237, 3);">立即回复</a>
			</div>
		</div>
	</div>
</div>
<!--回复框 end -->
<!-- 表情模块 begin -->
<div style="display: none;" id="idenglu_emotion" class="dl_face_layout">
	<div class="dl_face_head">
		<ul class="dl_face_menu">
	  		<li class="dl_face_default dl_face_click" onclick="javascript:_CAC.selectEmotionTab(event, &#39;qq&#39;, this);">默认</li>
	  		<li class="dl_face_ali" onclick="javascript:_CAC.selectEmotionTab(event, &#39;ali&#39;, this);">阿狸</li>
	  		<li class="dl_face_lang" onclick="javascript:_CAC.selectEmotionTab(event, &#39;lang&#39;, this);">浪小花</li>
		</ul>
	  	<a href="javascript:;" class="dl_face_close" onclick="javascript:_CAC.hideEmotionModel(event);"></a>
	</div>
	<div class="dl_face_body">
		<div class="dl_face_box_qq">
		    <div class="dl_face_icon" id="idenglu_emotion_tab_qq">
				<a title="微笑" href="javascript:;"></a>
				<a title="撇嘴" href="javascript:;"></a>
				<a title="色" href="javascript:;"></a>
				<a title="发呆" href="javascript:;"></a>
				<a title="得意" href="javascript:;"></a>
				<a title="流泪" href="javascript:;"></a>
				<a title="害羞" href="javascript:;"></a>
				<a title="闭嘴" href="javascript:;"></a>
				<a title="睡" href="javascript:;"></a>
				<a title="大哭" href="javascript:;"></a>
				<a title="尴尬" href="javascript:;"></a>
				<a title="发怒" href="javascript:;"></a>
				<a title="调皮" href="javascript:;"></a>
				<a title="呲牙" href="javascript:;"></a>
				<a title="惊讶" href="javascript:;"></a>
				<a title="难过" href="javascript:;"></a>
				<a title="酷" href="javascript:;"></a>
				<a title="冷汗" href="javascript:;"></a>
				<a title="抓狂" href="javascript:;"></a>
				<a title="吐" href="javascript:;"></a>
				<a title="偷笑" href="javascript:;"></a>
				<a title="可爱" href="javascript:;"></a>
				<a title="白眼" href="javascript:;"></a>
				<a title="傲慢" href="javascript:;"></a>
				<a title="饥饿" href="javascript:;"></a>
				<a title="困" href="javascript:;"></a>
				<a title="惊恐" href="javascript:;"></a>
				<a title="流汗" href="javascript:;"></a>
				<a title="憨笑" href="javascript:;"></a>
				<a title="大兵" href="javascript:;"></a>
				<a title="奋斗" href="javascript:;"></a>
				<a title="咒骂" href="javascript:;"></a>
				<a title="疑问" href="javascript:;"></a>
				<a title="嘘" href="javascript:;"></a>
				<a title="晕" href="javascript:;"></a>
				<a title="折磨" href="javascript:;"></a>
				<a title="衰" href="javascript:;"></a>
				<a title="骷髅" href="javascript:;"></a>
				<a title="敲打" href="javascript:;"></a>
				<a title="再见" href="javascript:;"></a>
				<a title="擦汗" href="javascript:;"></a>
				<a title="抠鼻" href="javascript:;"></a>
				<a title="鼓掌" href="javascript:;"></a>
				<a title="糗大了" href="javascript:;"></a>
				<a title="坏笑" href="javascript:;"></a>
				<a title="左哼哼" href="javascript:;"></a>
				<a title="右哼哼" href="javascript:;"></a>
				<a title="哈欠" href="javascript:;"></a>
				<a title="鄙视" href="javascript:;"></a>
				<a title="委屈" href="javascript:;"></a>
				<a title="快哭了" href="javascript:;"></a>
				<a title="阴险" href="javascript:;"></a>
				<a title="亲亲" href="javascript:;"></a>
				<a title="吓" href="javascript:;"></a>
				<a title="可怜" href="javascript:;"></a>
				<a title="菜刀" href="javascript:;"></a>
				<a title="西瓜" href="javascript:;"></a>
				<a title="啤酒" href="javascript:;"></a>
				<a title="篮球" href="javascript:;"></a>
				<a title="乒乓" href="javascript:;"></a>
				<a title="咖啡" href="javascript:;"></a>
				<a title="饭" href="javascript:;"></a>
				<a title="猪头" href="javascript:;"></a>
				<a title="玫瑰" href="javascript:;"></a>
				<a title="凋谢" href="javascript:;"></a>
				<a title="示爱" href="javascript:;"></a>
				<a title="爱心" href="javascript:;"></a>
				<a title="心碎" href="javascript:;"></a>
				<a title="蛋糕" href="javascript:;"></a>
				<a title="闪电" href="javascript:;"></a>
				<a title="炸弹" href="javascript:;"></a>
				<a title="刀" href="javascript:;"></a>
				<a title="足球" href="javascript:;"></a>
				<a title="瓢虫" href="javascript:;"></a>
				<a title="便便" href="javascript:;"></a>
				<a title="月亮" href="javascript:;"></a>
				<a title="太阳" href="javascript:;"></a>
				<a title="礼物" href="javascript:;"></a>
				<a title="拥抱" href="javascript:;"></a>
				<a title="强" href="javascript:;"></a>
				<a title="弱" href="javascript:;"></a>
				<a title="握手" href="javascript:;"></a>
				<a title="胜利" href="javascript:;"></a>
				<a title="抱拳" href="javascript:;"></a>
				<a title="勾引" href="javascript:;"></a>
				<a title="拳头" href="javascript:;"></a>
				<a title="差劲" href="javascript:;"></a>
				<a title="爱你" href="javascript:;"></a>
				<a title="NO" href="javascript:;"></a>
				<a title="OK" href="javascript:;"></a>
				<a title="爱情" href="javascript:;"></a>
				<a title="飞吻" href="javascript:;"></a>
				<a title="跳跳" href="javascript:;"></a>
				<a title="发抖" href="javascript:;"></a>
				<a title="怄火" href="javascript:;"></a>
				<a title="转圈" href="javascript:;"></a>
				<a title="磕头" href="javascript:;"></a>
				<a title="回头" href="javascript:;"></a>
				<a title="跳绳" href="javascript:;"></a>
				<a title="挥手" href="javascript:;"></a>
				<a title="激动" href="javascript:;"></a>
				<a title="街舞" href="javascript:;"></a>
				<a title="献吻" href="javascript:;"></a>
				<a title="左太极" href="javascript:;"></a>
				<a title="右太极" href="javascript:;"></a>
			</div>
		    <div class="dl_face_icon" id="idenglu_emotion_tab_ali" style="display: none;">
				<a title="ali做鬼脸" href="javascript:;"></a>
				<a title="ali追" href="javascript:;"></a>
				<a title="ali转圈哭" href="javascript:;"></a>
				<a title="ali转" href="javascript:;"></a>
				<a title="ali郁闷" href="javascript:;"></a>
				<a title="ali元宝" href="javascript:;"></a>
				<a title="ali摇晃" href="javascript:;"></a>
				<a title="ali嘘嘘嘘" href="javascript:;"></a>
				<a title="ali羞" href="javascript:;"></a>
				<a title="ali笑死了" href="javascript:;"></a>
				<a title="ali笑" href="javascript:;"></a>
				<a title="ali掀桌子" href="javascript:;"></a>
				<a title="ali献花" href="javascript:;"></a>
				<a title="ali想" href="javascript:;"></a>
				<a title="ali吓" href="javascript:;"></a>
				<a title="ali哇" href="javascript:;"></a>
				<a title="ali吐血" href="javascript:;"></a>
				<a title="ali偷看" href="javascript:;"></a>
				<a title="ali送礼物" href="javascript:;"></a>
				<a title="ali睡" href="javascript:;"></a>
				<a title="ali甩手" href="javascript:;"></a>
				<a title="ali摔" href="javascript:;"></a>
				<a title="ali撒钱" href="javascript:;"></a>
				<a title="ali亲一个" href="javascript:;"></a>
				<a title="ali欠揍" href="javascript:;"></a>
				<a title="ali扑倒" href="javascript:;"></a>
				<a title="ali扑" href="javascript:;"></a>
				<a title="ali飘过" href="javascript:;"></a>
				<a title="ali飘" href="javascript:;"></a>
				<a title="ali喷嚏" href="javascript:;"></a>
				<a title="ali拍拍手" href="javascript:;"></a>
				<a title="ali你" href="javascript:;"></a>
				<a title="ali挠墙" href="javascript:;"></a>
				<a title="ali摸摸头" href="javascript:;"></a>
				<a title="ali溜" href="javascript:;"></a>
				<a title="ali赖皮" href="javascript:;"></a>
				<a title="ali来吧" href="javascript:;"></a>
				<a title="ali揪" href="javascript:;"></a>
				<a title="ali囧" href="javascript:;"></a>
				<a title="ali惊" href="javascript:;"></a>
				<a title="ali加油" href="javascript:;"></a>
				<a title="ali僵尸跳" href="javascript:;"></a>
				<a title="ali呼拉圈" href="javascript:;"></a>
				<a title="ali画圈圈" href="javascript:;"></a>
				<a title="ali欢呼" href="javascript:;"></a>
				<a title="ali坏笑" href="javascript:;"></a>
				<a title="ali跪求" href="javascript:;"></a>
				<a title="ali风筝" href="javascript:;"></a>
				<a title="ali飞" href="javascript:;"></a>
				<a title="ali翻白眼" href="javascript:;"></a>
				<a title="ali顶起" href="javascript:;"></a>
				<a title="ali点头" href="javascript:;"></a>
				<a title="ali得瑟" href="javascript:;"></a>
				<a title="ali打篮球" href="javascript:;"></a>
				<a title="ali打滚" href="javascript:;"></a>
				<a title="ali大吃" href="javascript:;"></a>
				<a title="ali踩" href="javascript:;"></a>
				<a title="ali不耐烦" href="javascript:;"></a>
				<a title="ali不嘛" href="javascript:;"></a>
				<a title="ali别吵" href="javascript:;"></a>
				<a title="ali鞭炮" href="javascript:;"></a>
				<a title="ali抱一抱" href="javascript:;"></a>
				<a title="ali拜年" href="javascript:;"></a>
				<a title="ali88" href="javascript:;"></a>
		    </div>
		    <div class="dl_face_icon" id="idenglu_emotion_tab_lang" style="display: none;">
				<a title="转发" href="javascript:;"></a>
				<a title="笑哈哈" href="javascript:;"></a>
				<a title="得意地笑" href="javascript:;"></a>
				<a title="噢耶" href="javascript:;"></a>
				<a title="偷乐" href="javascript:;"></a>
				<a title="泪流满面" href="javascript:;"></a>
				<a title="巨汗" href="javascript:;"></a>
				<a title="抠鼻屎" href="javascript:;"></a>
				<a title="求关注" href="javascript:;"></a>
				<a title="真V5" href="javascript:;"></a>
				<a title="群体围观" href="javascript:;"></a>
				<a title="hold住" href="javascript:;"></a>
				<a title="羞嗒嗒" href="javascript:;"></a>
				<a title="非常汗" href="javascript:;"></a>
				<a title="许愿" href="javascript:;"></a>
				<a title="崩溃" href="javascript:;"></a>
				<a title="好囧" href="javascript:;"></a>
				<a title="震惊" href="javascript:;"></a>
				<a title="别烦我" href="javascript:;"></a>
				<a title="不好意思" href="javascript:;"></a>
				<a title="纠结" href="javascript:;"></a>
				<a title="拍手" href="javascript:;"></a>
				<a title="给劲" href="javascript:;"></a>
				<a title="好喜欢" href="javascript:;"></a>
				<a title="好爱哦" href="javascript:;"></a>
				<a title="路过这儿" href="javascript:;"></a>
				<a title="悲催" href="javascript:;"></a>
				<a title="不想上班" href="javascript:;"></a>
				<a title="躁狂症" href="javascript:;"></a>
				<a title="甩甩手" href="javascript:;"></a>
				<a title="瞧瞧" href="javascript:;"></a>
				<a title="同意" href="javascript:;"></a>
				<a title="喝多了" href="javascript:;"></a>
				<a title="啦啦啦啦" href="javascript:;"></a>
				<a title="杰克逊" href="javascript:;"></a>
				<a title="雷锋" href="javascript:;"></a>
				<a title="传火炬" href="javascript:;"></a>
				<a title="加油啊" href="javascript:;"></a>
				<a title="亲一口" href="javascript:;"></a>
				<a title="放假啦" href="javascript:;"></a>
				<a title="立志青年" href="javascript:;"></a>
				<a title="下班" href="javascript:;"></a>
				<a title="困死了" href="javascript:;"></a>
				<a title="好棒" href="javascript:;"></a>
				<a title="有鸭梨" href="javascript:;"></a>
				<a title="膜拜了" href="javascript:;"></a>
				<a title="互相膜拜" href="javascript:;"></a>
				<a title="拍砖" href="javascript:;"></a>
				<a title="互相拍砖" href="javascript:;"></a>
				<a title="采访" href="javascript:;"></a>
				<a title="发表言论" href="javascript:;"></a>
				<a title="愚人节" href="javascript:;"></a>
				<a title="复活节" href="javascript:;"></a>
				<a title="想一想" href="javascript:;"></a>
				<a title="放电抛媚" href="javascript:;"></a>
				<a title="霹雳" href="javascript:;"></a>
				<a title="被电" href="javascript:;"></a>
				<a title="中箭" href="javascript:;"></a>
				<a title="丘比特" href="javascript:;"></a>
				<a title="牛" href="javascript:;"></a>
				<a title="推荐" href="javascript:;"></a>
				<a title="赞啊" href="javascript:;"></a>
				<a title="招财" href="javascript:;"></a>
				<a title="挤火车" href="javascript:;"></a>
				<a title="赶火车" href="javascript:;"></a>
				<a title="金元宝" href="javascript:;"></a>
				<a title="福到啦" href="javascript:;"></a>
				<a title="红包拿来" href="javascript:;"></a>
				<a title="萌翻" href="javascript:;"></a>
				<a title="收藏" href="javascript:;"></a>
				<a title="拜年了" href="javascript:;"></a>
				<a title="龙啸" href="javascript:;"></a>
				<a title="玫瑰" href="javascript:;"></a>
				<a title="放鞭炮" href="javascript:;"></a>
				<a title="发红包" href="javascript:;"></a>
				<a title="大红灯笼" href="javascript:;"></a>
				<a title="耍花灯" href="javascript:;"></a>
				<a title="吃汤圆" href="javascript:;"></a>
		    </div>
		</div>
	</div>
</div>

<!-- 表情模块 end -->

</div>
<script type="text/javascript">
$(function() {
	// content cookie
	var commentContent = $.cookie(commentCookieName);
	var shareContent = $.cookie(shareCookieName);
	if (commentContent) {
		$("#idenglu_comment_content").val("" + commentContent).keyup();
	}
	if (shareContent) {
		$("#idenglu_share_content").val("" + shareContent).keyup();
	}
	idenglu_resize_();
});
var _idenglu_resize_time = 0;
function idenglu_resize_() {
	if (_idenglu_resize_time < 10) {
		resizeIframeComment();
		setTimeout(function() {idenglu_resize_();}, _idenglu_resize_time++);	
	}
}
</script>


				<script type="text/javascript">
		//jQuery(function($) {
		function moveForm1()
					{
					$("#c-31").after($("#response"));
					$("#response").show();
					//$("
					}
		//}
		
		
function newComment() {
		var commenttext = $.trim($('#pw_comment_content').val());

		toggleUpdates('unewcomments');
//		if (typeof ajaxCheckComments != "undefined")
//			ajaxCheckComments.abort();
		$("label#commenttext_error").hide();

		thisFormElements.attr('disabled', true);
		thisFormElements.addClass('disabled');

		submitProgress.show();
		var comment_post_ID = <?php echo $post->ID;?>;
		//var comment_parent = $('#comment_parent').val();
		var comment_parent = 0;
		
//		$comment_fields = array(
//	'comment_post_ID' => $post_id,
//	'comment_date' => $_POST['time'],
//	'comment_date_gmt' => $_POST['time'],
//	'comment_content' => $_POST['cnt'],
//	'comment_agent' => 'YouYan Social Comment System',
//	'comment_approved' => $status,
//	'comment_author' => $_POST['uname'],
//	'comment_author_email' => $_POST['email'],
//	'comment_author_url' => $_POST['ulink'],
//	'comment_author_IP' => $_POST['ip'],
//	'comment_parent' => $_POST['pid'] ? $_POST['pid'] : 0
//);

usrInfo.screen_name = "xyz6789";
usrInfo.id = "1922482537";

		var dataString = {action: 'prologue_new_comment' , _ajax_post: nonce, comment: commenttext,  comment_parent: comment_parent, comment_post_ID: comment_post_ID,
		comment_author:usrInfo.screen_name, comment_author_email:usrInfo.id+'@weibo.com',
		comment_author_url:'http://weibo.com/' + usrInfo.id,
		comment_author_IP: 192,168,1,1,
		comment_agent: pw_comment_agent};
		var errorMessage = '';
		$.ajax({
			type: "POST",
			url: ajaxUrl,
			data: dataString,
			success: function(result) {
				var lastComment = $("#respond").prev("li");
				if (isNaN(result) || 0 == result || 1 == result)
					errorMessage =result;
				$('#comment').val('');
				if (errorMessage != "")
					newNotification(errorMessage);
				getComments(false);

				submitProgress.fadeOut();
				$("#respond").slideUp('fast');
				toggleUpdates('unewcomments');

				thisFormElements.attr('disabled', false);
				thisFormElements.removeClass('disabled');
			  }
		});
	}



		</script>
		
		
		
		</body></html>