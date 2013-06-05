<?php
/**
 * Temple Theme Footer
 */
?>
			
			<footer class="page_footer">
				
				<nav class="nav">
					<?php wp_nav_menu( 'footer_menu' ); ?>
				</nav>
				
				<?php get_sidebar( 'footer-area' ); ?>
				
			</footer>
			
		</div><!--div#wrapper.container -->
		
<?php wp_footer(); ?>
		
	</body>
</html>