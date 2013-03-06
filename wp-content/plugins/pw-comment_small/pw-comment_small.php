<?php
/*
Plugin Name: pw-comment_small
Author: Tim Wang
Author URI: http://www.xxx.com/
Plugin URI: http://wordpress.org/extend/plugins/xxx/
Description: PingWest comments。
Version: 0.0.1
*/

if (!function_exists('pw_comments')) {
	if (!$wptm_comment['manual']) {
		add_filter('comments_template', 'pw_comments');
		function pw_comments($file) {
			global $post;
			
			//2013/01/16 SCR Tim Don't display denglu comments in home page.
			if (!is_home()) {
				return dirname(__FILE__) . '/comments_pw.php';
			} 
		} 
	} 
}


