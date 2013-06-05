<?php
/**
 * Temple Theme: Main Template
 */

get_header(); ?>
			
			<div id="main" class="content">
				
				<?php # Load post navigation using the theme's PHP function: (for example)
				echo temple_post_navigation( 'above' );
				?>
				
<?php 			# START "The Loop" (with comments!)
				while ( have_posts() ) : the_post();
?>
				
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
					<header class="post_header">
						
						<div class="entry-title">
							<<?php echo temple_post_heading_tag(); ?> class="title">
								<a href="<?php the_permalink(); ?>" title="<?php printf( __('Permalink to %s', 'temple'), the_title_attribute('echo=0') ); ?>" rel="bookmark"">
									<?php the_title(); ?>
								</a>
							</<?php echo temple_post_heading_tag(); ?>>
						</div>
						
						<?php get_template_part( 'post', 'meta' ); ?>
						
					</header><!-- .post_header -->
					
					<div class="entry-content">
						<?php the_content(); ?>
					</div><!-- .entry-content -->
					
					<footer class="post_footer">
						
						<?php get_template_part( 'post', 'utility' ); ?>
						
					</footer><!-- .post_footer -->
					
				</article><!-- #post-<?php the_ID(); ?> -->
				
<?php			endwhile;
				# END "The Loop"
?>
				
				<?php # Load post navigation using the theme's template file: (for example)
				get_template_part( 'post', 'navigation' );
				?>
				
			</div><!-- #main.content -->
			
			
<?php get_sidebar( 'content-area' ); ?>
<?php get_footer(); ?>