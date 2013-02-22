	<div style="clear: both;"></div>
</div> <!-- // wrapper -->

<div id="footer">
	<p>
		<p>京ICP备13008448号        © 2012 PingWest 北京品西互动科技有限公司</p>
		<br/>
		<?php echo prologue_poweredby_link(); ?>	    
	</p>
</div>
<div id="notify"></div>
<div id="help">
	<dl class="directions">
		<dt>c</dt><dd><?php _e('compose new post', 'p2'); ?></dd>
		<dt>j</dt><dd><?php _e('next post/next comment', 'p2'); ?></dd>
		<dt>k</dt> <dd><?php _e('previous post/previous comment', 'p2'); ?></dd>
		<dt>r</dt> <dd><?php _e('reply', 'p2'); ?></dd>
		<dt>e</dt> <dd><?php _e('edit', 'p2'); ?></dd>
		<dt>o</dt> <dd><?php _e('show/hide comments', 'p2'); ?></dd>
		<dt>t</dt> <dd><?php _e('go to top', 'p2'); ?></dd>
		<dt>esc</dt> <dd><?php _e('cancel', 'p2'); ?></dd>
	</dl>
</div>

<script type="text/javascript">
                          function setShare(title, url, picurl) {
                              jiathis_config.siteNum=0;
                              jiathis_config.boldNum=3;
                              jiathis_config.ralateuid={
		                                          "tsina":"PingWest中文网"
                               };
                              jiathis_config.title = title;
                              jiathis_config.url = url;
                              jiathis_config.data_track_clickback = true;
                              jiathis_config.hideMore=true;
                              jiathis_config.pic=picurl;
			      jiathis_config.hideMore=true
                          }
                            var jiathis_config = {}
                          </script>   

<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js" charset="utf-8"></script>
<!-- JiaThis Button END -->




<script type="text/javascript">
first = true;
jQuery("[id^='commentNum-']").each(
	function(){
		if(first)
		{
			url_long = this.href;
			first = false;
		}
		else
		{
			url_long = url_long + '&url_long=' + this.href;
		}
	}
);
function makeUrl_shortParameter(sResult)
{
	first = true;
	jQuery(sResult.urls).each(
		function(){
			if(first)
			{
				url_short = this.url_short;
				first = false;
			}
			else
			{
				url_short = url_short + '&url_short=' + this.url_short;
			}
		}
	);
	return url_short;
}
WB2.anyWhere(function(W){
    // 获取评论列表
    W.parseCMD("/short_url/shorten.json", 
		function(sResult, bStatus)
		{
			if(bStatus == true) 
			{
				//alert(sResult.urls[0].url_short);
				url_short = makeUrl_shortParameter(sResult);
				
				WB2.anyWhere(function(W){
				// 获取评论列表
				W.parseCMD("/short_url/comment/counts.json", 
					function(sResult1, bStatus)
					{
						if(bStatus == true) 
						{
							//alert(sResult1.urls[0].comment_counts);
							$Numstr = '【参与讨论（' + (sResult1.urls[0].comment_counts) + '）】';
							//jQuery('#commentNum-<?php the_ID(); ?>').text($Numstr);	
							index = 0;
							jQuery("[id^='commentNum-']").each(
							function(){
								num = sResult1.urls[index].comment_counts;
								if(num>0)
								{
									Numstr = '【参与讨论（' + num + '）】';
								}
								else
								{
									Numstr = '【参与讨论】';
								}
								index ++;
								jQuery(this).text(Numstr);
							}
							);						
						}
					},
					{
						url_short : url_short
					},
					{
						method: 'get'
					});
				});	
			}
		},
		{
			url_long : url_long
		},
		{
			method: 'get'
		});
});
</script>




<?php wp_footer(); ?>

</body>
</html>