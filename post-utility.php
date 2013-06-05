<?php
/**
 * Temple Theme Post Utility
 *  - must be loaded within "the loop"
 */
?>
						
						<div class="entry-utility">
							<span class="cat-links">
								<span class="entry-utility-prep entry-utility-prep-cat-links"><?php _e( 'Posted in ', 'temple' ); ?></span>
								<?php echo get_the_category_list(', '); ?>
							</span>
							<span class="meta-sep"> | </span>
							<?php the_tags( '<span class="tag-links"><span class="entry-utility-prep entry-utility-prep-tag-links">' . __('Tagged ', 'temple' ) . '</span>', ", ", "</span>\n\t\t\t\t\t\t<span class=\"meta-sep\">|</span>\n" ) ?>
							<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'temple' ), __( '1 Comment', 'temple' ), __( '% Comments', 'temple' ) ) ?></span>
							<?php edit_post_link( __( 'Edit', 'temple' ), "<span class=\"meta-sep\">|</span>\n\t\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t\n" ) ?>
						</div>
						