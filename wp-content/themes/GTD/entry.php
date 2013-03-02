<?php $current_user_id = get_the_author_ID(); ?>

    <li id="prologue-<?php the_ID(); ?>" class="post user_id_<?php the_author_ID( ); ?>">

		

		<?php prologue_the_title("<h2>","</h2>"); ?>

	    <h4>

		    <?php the_author_posts_link(); ?>

		    <span class="meta">

		        <?php printf( __('%s %s', 'p2'),  get_the_time( get_option('date_format') ), get_the_time() ); ?> 
				
			    <?php outputCommentsNum(); ?>

			    <span class="actions">
					<?php
						//just display in the home, in single, it is showed in the bottom
						if(is_home())
						{
							echo addsourcelink(); 
						}
					?> 
					
					<?php 
					$sourcelink = get_post_meta(get_the_id(), "sourcelink", true);
					$issingle = is_singular();
					$canedit = current_user_can('edit_post', get_the_id());
					if (($sourcelink != null)  && is_home())
					{
						echo "| ";
					}
					?>
			
					
					<?php if(!$issingle): ?>
			         <a href="<?php the_permalink( ); ?>" class="thepermalink"><?php  _e('查看详细', 'p2'); ?></a> 
					<?php endif; ?>
					
					<?php
					if(!$issingle && ($canedit))
					{
					echo "| ";
					}
					 ?>
					
			        <?php if ($canedit): ?>

			            <a href="<?php echo (get_edit_post_link( get_the_id() ))?>" class="post-edit-link" rel="<?php the_ID(); ?>"><?php _e('Edit', 'p2'); ?></a>

			        <?php endif; ?>

			    </span>

			    
               
		    </span>

	    </h4>

	    <div class="postcontent<?php if (current_user_can( 'edit_post', get_the_id() )) {?> editarea<?php } ?>" id="content-<?php the_ID(); ?>">

	        <?php the_content( __( '' , 'p2') ); ?>
            
            <?php
            $attached_file = get_post_meta($post->ID, 'attached_file', $single = true);
			if($attached_file)
			{
				$attached_file_array = explode(',',$attached_file);
			?>
            <p class="attach"> 附件</p>
            
             <ul class="file_list2"> 
            	<?php
                for($a=0;$a<count($attached_file_array);$a++)
				{
					$att_path = $attached_file_array[$a];
					$att_path_arr = explode('/',$att_path);
					
				?>
                 <li> <a href="<?php echo $attached_file_array[$a];?>" target="_blank"><?php echo $att_path_arr[count($att_path_arr)-1];?></a> </li>
                <?php
				}
				?>
             </ul>
			<?php }?>
			
		<?php 
		if(!is_home())
		{
			$sourcelink = get_post_meta(get_the_id(), "sourcelink", true);
			if ($sourcelink != null)
			{
				echo '<a id="sourcelink1" target="_blank" style="font-size:12px;color:#ccc" title="'.$sourcelink.'" href="'. $sourcelink. '">来源:  '.substr($sourcelink,0,40).'......</a>';
			}
		}
		?>
		
	    <?php echo suffusion_share1(); ?>
		
			
	    </div> <!-- // postcontent -->
		<?php /*?> <?php $attached_file = get_post_meta($post->ID, 'attached_file', $single = true);
		if($attached_file)
		{
		?>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Attachment : <a href="<?php echo $attached_file;?>" target="_blank">点击查看</a>
		<?php }?><?php */?>
		
		
		
        <div class="bottom_of_entry">&nbsp;
          </div>

    <?php 

		    if ( ( is_home() || is_front_page() ) ) $withcomments = true;

		    

		    if ( is_single() )

		        comments_template();

		    else

		        comments_template('/inline-comments.php');

		    

            // Only append comment form to  first post with open comments

            if( ( !isset($form_visible) || !$form_visible ) && !is_single() && 'open' == $post->comment_status ):

                $form_visible = true;

        ?>

        <div style="display:none">

            <div id="respond" style="display:none">

            <?php require dirname( __FILE__ ) . '/comment-form.php'; ?>

            </div> <!-- #respond -->

        </div> <!-- #wp-temp-form-div -->        

<?php

            endif; // if open comment_status

?>

    </li>
