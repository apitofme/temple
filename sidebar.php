<?php
/**
 * Temple Theme: Default Sidebar
 * - static content sidebar
 * - NOT used in theme files but required by WordPress!
 */

if ( !is_dynamic_sidebar() ) : ?>
			
			<p>Loading default Sidebar!</p>
			
			<div class="sidebar widget-area">
				<ul class="xoxo">
					
					<li id="search" class="widget-container widget_search">
						<?php get_search_form(); ?>
					</li>
					
					<li id="archives" class="widget-container">
						<h3 class="widget-title"><?php _e( 'Archives', 'twentyten' ); ?></h3>
						<ul>
							<?php wp_get_archives( 'type=monthly' ); ?>
						</ul>
					</li>
					
					<li id="meta" class="widget-container">
						<h3 class="widget-title"><?php _e( 'Meta', 'twentyten' ); ?></h3>
						<ul>
							<?php wp_register(); ?>
							<li><?php wp_loginout(); ?></li>
							<?php wp_meta(); ?>
						</ul>
					</li>
					
				</ul>
			</div><!-- .sidebar -->
			
			<?php
endif; ?>		
