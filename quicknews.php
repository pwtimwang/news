<?php
/*
Template Name: Random Post
*/
?>
<?php $my_query = new WP_Query('orderby=rand&showposts=5'); ?>
<?php while ($my_query->have_posts()) : $my_query->the_post();?>
<li><?php $screen = get_post_meta($post->ID, 'screen', $single = true); ?>
<h2 style="overflow:hidden;"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
</li>
<?php endwhile; ?>