<?php
/**
 * Temple Theme: Content Area Sidebar
 */

if ( is_active_sidebar( 'content_area_sidebar' ) ) : ?>
			
			<div id="content-area-sidebar" class="widget-area">
				<ul class="xoxo">
					<?php dynamic_sidebar( 'content_area_sidebar' ); ?>
				</ul>
			</div><!-- #content-area-sidebar -->
			<?php
endif; ?>		
