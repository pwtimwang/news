	</div><!-- #main -->

</div><!-- .wrapper -->

	<div id="footer">
		<div id="site-info">
        	<div id="copyright">
			© 2012 <a href="/"><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></a> Powered by <a href="http://www.wordpress.org" target="_blank">WordPress</a>
            </div>
		</div><!-- #site-info -->
        
	<?php get_sidebar( 'footer' ); ?>

	</div><!-- #footer -->


<?php wp_footer(); ?>

<?php echo imbalance2google() ?>

</body>
</html>
