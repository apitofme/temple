<?php
/**
 * Temple Theme Post Meta
 * - must be loaded within "the loop"
 */
global $authordata;
?>
						
						<div class="entry-meta">
							<span class="meta-prep meta-prep-author"><?php _e('By ', 'temple'); ?></span>
							<span class="author vcard">
								<a class="url fn n" href="<?php echo get_author_posts_url( $authordata->ID ) /*( false, $authordata->ID, $authordata->user_nicename )*/; ?>" title="<?php printf( __( 'View all posts by %s', 'temple' ), $authordata->display_name ); ?>"><?php the_author(); ?></a>
							</span>
							<span class="meta-sep"> | </span>
							<span class="meta-prep meta-prep-entry-date"><?php _e('Published ', 'temple'); ?></span>
							<span class="entry-date">
								<abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php the_time( get_option( 'date_format' ) ); ?></abbr>
							</span>
							<?php edit_post_link( __( 'Edit', 'temple' ), "<span class=\"meta-sep\">|</span>\n\t\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t" ) ?>
						</div>
						