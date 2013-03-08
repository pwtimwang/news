	<div style="clear: both;"></div>
</div> <!-- // wrapper -->



<style type="text/css">
.alllinks {
width: 960px;
border-bottom: 2px double #D0D0D0;
overflow: hidden;
padding: 10px 0;
background-color: rgb(245, 245, 253);
font-size: 12px;
margin-bottom: 10px;
}
.alllinks ul {
margin: 5px auto;
width: 805px;
overflow: hidden;
padding-left: 100px;
position: relative;
list-style: none;
}
.alllinks li.li-top {
position: absolute;
left: 0;
top: 0;
font-weight: bold;
}
.alllinks li {
float: left;
width: 100px;
line-height: 26px;
}

.alllinks li a 
{
color: #444;
}


.ft-c {
background-attachment: scroll;
background-clip: border-box;
background-origin: padding-box;
background-position: 0 0;
background-repeat: repeat-x;
background-size: auto auto;
color: #000000;
height: 100px;
line-height: 30px;
margin: 0 auto;
text-align: center;
width: 960px;
}

.pipe {
margin: 0 5px;
color: #CCC;
}

.ft-c a
{
color: #444;
}

</style>

<div id="footer">

	<div class="alllinks">
		<ul>
			<li class="li-top">内容合作伙伴</li>
			<li><a href="http://tech.sina.com.cn/" title="新浪科技" target="_blank">新浪科技</a></li>
			<li><a href="http://it.sohu.com/" title="搜狐 IT" target="_blank">搜狐  IT</a></li>
			<li><a href="http://tech.163.com/" title="网易科技" target="_blank">网易科技</a></li>			
			<li><a href="http://tech.qq.com/" title="腾讯科技" target="_blank">腾讯科技</a></li>
		</ul>
	</div>

	<div style="text-align: center;">
		<p>京ICP备13008448号        © 2012 PingWest 北京品西互动科技有限公司</p>
		<br/>
		<?php echo prologue_poweredby_link(); ?>	    
	</div>
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