<?php
/*
Plugin Name: pw-comment
Author: Tim Wang
Author URI: http://www.xxx.com/
Plugin URI: http://wordpress.org/extend/plugins/xxx/
Description: PingWest comments。
Version: 0.0.1
*/

define('WP_CONNECT_VERSION', '2.4.9');
$wpurl = get_bloginfo('wpurl');
$siteurl = get_bloginfo('url');
$plugin_url = plugins_url('pw-comment');
$PWPlugin_url = $plugin_url;
$wptm_basic = get_option('wptm_basic'); // denglu
$wptm_options = get_option('wptm_options');
$wptm_connect = get_option('wptm_connect');
$wptm_comment = get_option('wptm_comment'); // denglu
$wptm_advanced = get_option('wptm_advanced');
$wptm_share = get_option('wptm_share');
$wptm_version = get_option('wptm_version');
$wptm_key = get_option('wptm_key');
$wp_connect_advanced_version = "1.7.3";

//update_option('wptm_basic', '');


include_once(dirname(__FILE__) . '/functions.php');
include_once(dirname(__FILE__) . '/pw.func.php');