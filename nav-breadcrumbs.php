<?php
/**
 * Temple Theme: Breadcrumb Links
 */

# don't show breadcrumbs on the Home page!!
if( !is_home() ) :
	
	global $post;
	
	$sep = ' &raquo; ';
	$home = "<a href=\"" . get_home_url() . '" title="Return to the Home page" rel="home">Home</a>';
	
	if( is_category() )
		$category_parents = get_category_parents( $cat, TRUE, $sep );
	
	
	if( is_single() ) {
		$category = get_the_category(); 
		$category_parents = get_category_parents( $category[0]->cat_ID, TRUE, $sep );
		$post_parents = get_post_ancestors( $post->ID );
	}
	
	$breadcrumbs = $home . $sep . $category_parents;
	$breadcrumbs = rtrim( $breadcrumbs, $sep );
	
	# for posts and pages etc. add in the Title (not as a link though!)
	if( !is_category() )
		$breadcrumbs .=  $sep . get_the_title();
	
	echo $breadcrumbs;
	
endif;