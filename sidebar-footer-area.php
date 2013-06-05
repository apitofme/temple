<?php
/**
 * Temple Theme: Content Area Sidebar
 */

if ( is_active_sidebar( 'footer_area_sidebar' ) ) : ?>
			
			<div id="footer-area-sidebar" class="widget-area">
				<ul class="xoxo">
					<?php dynamic_sidebar( 'footer_area_sidebar' ); ?>
				</ul>
			</div><!-- #footer-area-sidebar -->
			<?php
endif; ?>		
