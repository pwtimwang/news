<?php
/**
 * Shows the footer of the post with the meta information. This file should not be loaded by itself, but should instead be included using get_template_part or locate_template.
 * Users can override this in a child theme. If you want a different style of the footer for a different custom post type, you can create a file
 * called post-footer-<post-type>.php. E.g. post-footer-book.php. If you want a different structure for posts / pages, you could use post-footer-post.php and/or
 * post-footer-page.php.
 *
 * @since 3.8.3
 * @package Suffusion
 * @subpackage Custom
 */

global $suf_page_show_posted_by, $suf_page_show_comment, $post, $suf_page_meta_position;
$format = suffusion_get_post_format();
if ($format == 'standard') {
	$format = '';
}
else {
	$format = $format.'_';
}
$meta_position = 'suf_post_'.$format.'meta_position';
$show_cats = 'suf_post_'.$format.'show_cats';
$show_posted_by = 'suf_post_'.$format.'show_posted_by';
$show_tags = 'suf_post_'.$format.'show_tags';
$show_comment = 'suf_post_'.$format.'show_comment';
$show_perm = 'suf_post_'.$format.'show_perm';
$with_title_show_perm = 'suf_post_'.$format.'with_title_show_perm';

global $$meta_position, $$show_cats, $$show_posted_by, $$show_tags, $$show_comment, $$show_perm, $$with_title_show_perm;
$post_meta_position = $$meta_position;
$post_show_cats = $$show_cats;
$post_show_posted_by = $$show_posted_by;
$post_show_tags = $$show_tags;
$post_show_comment = $$show_comment;
$post_show_perm = $$show_perm;
$post_with_title_show_perm = $$with_title_show_perm;
?>
<?php if (is_singular() &&  strcmp($post->post_title, "关于我们")!=0  &&  strcmp($post->post_title, "加入我们")!=0 && strcmp($post->post_title, "投稿")!=0) { ?>
	<!-- JiaThis Button BEGIN -->
	<div id="jiathis_style_32x32" onmouseover="setShare('<?php echo $post->post_title; ?> via @创业妖','<?php echo $post->guid; ?>','<?php echo suffusion_get_image_from_custom_field('thumbnail'); ?>')" style="float:right">
	<a class="jiathis_button_tsina"></a>
	<a class="jiathis_button_tqq"></a>
	<a class="jiathis_button_t163"></a>
	<a class="jiathis_button_tsohu"></a>
	<a class="jiathis_button_douban"></a>
	<a class="jiathis_button_renren"></a>
	<a class="jiathis_button_qzone"></a>
	<a class="jiathis_button_kaixin001"></a>
	</div>
	<!-- JiaThis Button END -->
<br/>
<?php } ?>

<div class="post-footer postdata fix">
<?php
$title = get_the_title();
if (($post_show_perm == 'show-bleft' || $post_show_perm == 'show-bright') && (($title == '' || !$title) || (!($title == '' || !$title) && $post_with_title_show_perm != 'hide'))) {
	$permalink_text = apply_filters('suffusion_permalink_text', __('Permalink', 'suffusion'));
	echo "<span class='permalink'><span class='icon'>&nbsp;</span>".suffusion_get_post_title_and_link($permalink_text)."</span>\n";
}

if ((!is_page() && $post_meta_position == 'corners' && ($post_show_posted_by == 'show' || $post_show_posted_by == 'show-bright')) ||
	(is_page() && $suf_page_meta_position == 'corners' && ($suf_page_show_posted_by == 'show' || $suf_page_show_posted_by == 'show-bright'))) {
	suffusion_print_author_byline();
}
if (!is_page() && $post_meta_position == 'corners' && ($post_show_cats == 'show-bleft' || $post_show_cats == 'show-bright')) {
?>
		<span class="category"><span class="icon">&nbsp;</span><?php the_category(', ') ?></span>
<?php
}
if (!is_page()) {
	if ($post_meta_position == 'corners') {
		if (is_singular()) {
			if (is_attachment()) {
				$mime = get_post_mime_type();
				if (strpos($mime, '/') > -1) {
					$mime = substr($mime, 0, strpos($mime, '/'));
				}
				$comments_disabled_var = "suf_{$mime}_comments";
				global $$comments_disabled_var;
				if (isset($$comments_disabled_var)) {
					$comments_disabled = $$comments_disabled_var;
				}
				else {
					$comments_disabled = false;
				}
			}
			else {
				$comments_disabled = false;
			}

			if ('open' == $post->comment_status && ($post_show_comment == 'show-bleft' || $post_show_comment == 'show-bright') && !$comments_disabled) {
?>
		<span class="comments"><span class="icon">&nbsp;</span><a href="#respond"><?php _e('Add comments', 'suffusion'); ?></a></span>
<?php
			}
		}
		else if ($post_show_comment == 'show-bleft' || $post_show_comment == 'show-bright') { ?>
		<span class="comments"><span class="icon">&nbsp;</span><?php comments_popup_link(__('No Responses', 'suffusion').' &#187;', __('1 Response', 'suffusion').' &#187;', __('% Responses', 'suffusion').' &#187;'); ?></span>
<?php
		}
	}
}
else {
	if ('open' == $post->comment_status && $suf_page_meta_position == 'corners' && ($suf_page_show_comment == 'show-bleft' || $suf_page_show_comment == 'show-bright')) {
?>
		<span class="comments"><span class="icon">&nbsp;</span><a href="#respond"><?php _e('Add comments', 'suffusion'); ?></a></span>
<?php
	}
}
if (!is_page() && $post_meta_position == 'corners' && ($post_show_tags == 'show' ||  $post_show_tags == 'show-bleft')) {
	$tags = get_the_tags();
	if (is_array($tags) && count($tags) > 0) {
	?>
		<span class="tags"><span class="icon">&nbsp;</span><?php the_tags(__('Tagged with: ', 'suffusion'),', ','<br />'); ?></span>
	<?php
	}
}
?>
</div><!-- .post-footer -->
