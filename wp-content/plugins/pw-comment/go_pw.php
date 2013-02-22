<?php
include "../../../wp-config.php";
$to;

session_start();

define('PW_SINA_APP_KEY','761238391');
define('PW_SINA_APP_SECRET','f5c78be32687cf7427a1e81d9c9df290');

include_once(dirname(__FILE__) . '/config.php');

class_exists('OAuthV2') or require(dirname(__FILE__) . "/OAuth/OAuthV2.php");
class_exists('sinaClientV2') or require($_SERVER['DOCUMENT_ROOT']."/wp-content/plugins/pw-comment/OAuth/sina_OAuthV2.php");
$to = new sinaClientV2(PW_SINA_APP_KEY, PW_SINA_APP_SECRET, '2.00rmNlFD0ZsEWp38edcaaca6LXm2sB');//for pingwest

echo '<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">';
echo '</head><body>';

echo "<br/>start:<br/>";

//$result = $to -> get_comments('3538077135454750');
//if($result)
//{
//	echo "<br/>get_comments OK<br/>";
//	echo var_dump($result);
//	
//}
//else
//{
//	echo "<br/>get_comments failure<br/>";
//	echo var_dump($result);
//}

getPost();

echo '</body></html>';

$callback = isset($_GET['callback']) ? $_GET['callback'] : '';
require_once(dirname(__FILE__) . '/OAuth/OAuth.php');

function getPost()
{
	global $wpdb;
	global $post;
	global $to;

	$query = "SELECT TIMESTAMPDIFF(HOUR, post_date, now()), post_date, ID FROM `wp_posts` where TIMESTAMPDIFF(HOUR, post_date, now()) < 72";

	$posts = $wpdb->get_results( $query );
	
	$query = 'SELECT wp_comments.comment_post_ID,MAX(wp_commentmeta.meta_value) AS latest_sina FROM wp_comments join wp_commentmeta on wp_comments.comment_ID = wp_commentmeta.comment_ID where wp_commentmeta.meta_key = "sinaid" group by wp_comments.comment_post_ID';
	$postswithSina = $wpdb->get_results( $query );
	
	echo "<br/><br/>################Posts in 72 hours ################<br/>";
	echo var_dump($posts);
	echo "<br/><br/>################Posts with latest Sina id ################<br/>";
	echo var_dump($postswithSina);
	echo "<br/><br/>";
	
	foreach($posts as $post)
	{
		echo "<br/><br/>################ start of ". $post->ID. "###############<br/>";
		$sinceid = 0;
		foreach($postswithSina as $postwithsina)
		{
			if($postwithsina->comment_post_ID == $post->ID )
			{
				$sinceid = $postwithsina->latest_sina;
				break;
			}
		}
		
		echo "<br/>################post $post->ID : latest sina id: $sinceid ###############<br/>";
		
		$url_short = '';
		$url_short = get_post_meta($post->ID, "url_short", true);
		if (empty($url_short)) 
		{
			echo "<br/>url_short is null, request <br/>";
			$result = $to->shorten(get_permalink($post->ID));
			if($result)
			{
				$url_short = $result["urls"][0]["url_short"];
				add_post_meta($post->ID,  "url_short", $url_short, true);
			}
		}
		if($url_short)
		{
			echo $url_short;
			$result1 = $to->short_comments($url_short, $sinceid);
			
			if($result1)
			{
				//echo var_dump($result);
				foreach($result1["share_comments"] as $sharecomment)
				{
					echo "<br/>*****************weibo comment begin  **************************************************<br/>";
					echo var_dump($sharecomment);
					$commentdata = array('comment_post_ID' => $post->ID,
						'comment_author' => $sharecomment["user"]["screen_name"],
						'comment_author_email' => ($sharecomment["user"]["id"])."@weibo.com",
						'comment_author_url' => "http://weibo.com/".($sharecomment["user"]["id"]),
						'comment_content' => $sharecomment["text"],
						'comment_type' => '',
						'comment_parent' => '0',
						'user_id' => '0',
						'comment_author_IP' => '',
						'comment_agent' => 'pw',
						'comment_date' =>  gmdate("Y-m-d H:i:s", strtotime($sharecomment["created_at"])),
						'comment_approved' => '1'
						);
					echo "<br/>#########################################################<br/>";
					echo var_dump($commentdata);
					
					$comment_id = wp_insert_comment( $commentdata );
					echo "<br/>*****************$comment_id********************************<br/>";
					$meta_key = "sinaid";
					$meta_value = $sharecomment['idstr'];
					
					add_comment_meta($comment_id, $meta_key, $meta_value, true);
					echo "<br/>*****************weibo comment end  **************************************************<br/>";
				}
			}
			
		}
		echo "<br/>################ end of ". $post->ID. "###############<br/><br/>";		
		echo "<br/>";
	}	
	echo "<br/>end<br/>";
}


?>