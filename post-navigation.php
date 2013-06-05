<?php
/**
 * Temple Theme: Post Navigation
 * - Provides links for previous and next post
 * - Intended for single use per page!!
 * - For multiple instances (i.e. above AND below the post) use theme function:	temple_post_navigation( $position );
 */

# Load global wp_query var
global $wp_query;

$next = get_next_posts_link( __( '<span class="meta-nav">&laquo;</span> Older posts', 'temple' ) );
$prev = get_previous_posts_link( __( 'Newer posts <span class="meta-nav">&raquo;</span>', 'temple' ) );

if ( $wp_query->max_num_pages > 1 ) :
	if ( !empty( $next ) || ! empty( $prev ) ) : ?>
					
					<div id="entry-nav" class="navigation">
					<?php if ( !empty( $next ) ) ?>
						<div class="nav-previous"><?php echo $next; ?></div>
						
					<?php if ( !empty( $prev ) ) ?>
							<div class="nav-next"><?php previous_posts_link() ?></div>
					</div><!-- #entry-nav -->
					
<?php
	endif;
endif; ?>