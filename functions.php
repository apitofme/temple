<?php
/**
 * Temple Theme Functions
 *
 * @author		[name]
 * @version		[number]
 *
 * ???
 * @date
 * @path
 * @since
 * ???
 *
 */

// One possbile way to organise the themes actions, hooks and filter functions!!
#add_action( 'after_setup_theme', 'temple_theme_setup' );
/*
function temple_theme_setup() {
	global $content_width;
	
	# Set the $content_width for things such as video embeds.
	if ( !isset( $content_width ) )
		$content_width = 600;
	
	# Add your nav menus function to the 'init' action hook.
	add_action( 'init', 'temple_register_menus' );
	
	# Add your sidebars function to the 'widgets_init' action hook.
	add_action( 'widgets_init', 'temple_register_sidebars' );

	# Load JavaScript files on the 'wp_enqueue_scripts' action hook
	add_action( 'wp_enqueue_scripts', 'temple_load_scripts' );
}
*/


/**
 * Remove 'junk' from the header
 * @see http://digwp.com/2010/03/wordpress-functions-php-template-custom-functions/
 */
function temple_remove_header_junk() {
	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'wp_generator' );
	remove_action( 'wp_head', 'feed_links', 2 );
	remove_action( 'wp_head', 'index_rel_link' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'feed_links_extra', 3 );
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
	remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );
}
add_action( 'init', 'temple_remove_header_junk' );



/**
 * Enable theme features
 * @see http://codex.wordpress.org/Function_Reference/add_theme_support
 */
function temple_add_theme_support() {
	#add_theme_support( 'automatic-feed-links' ); // Adds RSS feed links for posts and comments in the header
	add_theme_support( 'menus' );
	add_theme_support( 'post-formats', array( 'aside', 'gallery' ) );
	add_theme_support( 'post-thumbnails' );
}
add_action( 'init', 'temple_add_theme_support' );



/**
 * Register Menus
 * 	- Note: This function automatically registers custom menu support for the theme therefore you do not need to call add_theme_support( 'menus' );
 * @see http://codex.wordpress.org/Function_Reference/register_nav_menus
 */
function temple_register_menus() {
	/* Register nav menus using register_nav_menu() or register_nav_menus() here. */
	if( function_exists( 'register_nav_menus' ) ) {
		
		register_nav_menus( array(
			'header_menu'	=> 'Main menu',
			'footer_menu'	=> 'Footer menu'
		));
		
	}
}
add_action( 'init', 'temple_register_menus' );



/**
 * Register Sidebars
 * @see http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function temple_register_sidebars() {
	if ( function_exists( 'register_sidebar' ) ) {
		
		register_sidebar( array(
			'name'			=> 'ContentArea',
			'id'			=> 'content_area_sidebar',
			'description'	=> '',
			'class'			=> '',
			'before_widget'	=> '<li class="widget">',
			'after_widget'	=> '</li>',
			'before_title'	=> '<h2 class="widgettitle">',
			'after_title'	=> '</h3>',
		));
		
		register_sidebar( array(
			'name'			=> 'FooterArea',
			'id'			=> 'footer_area_sidebar',
			'description'	=> '',
			'class'			=> '',
			'before_widget'	=> '<li class="widget">',
			'after_widget'	=> '</li>',
			'before_title'	=> '<h2 class="widgettitle">',
			'after_title'	=> '</h3>',
		));
		
	}
}
add_action( 'init', 'temple_register_sidebars' );



/**
 * Enable threaded comments
 * @see http://bigredtin.com/2009/including-wordpress-comment-reply-js/
 */
function temple_enable_threaded_comments(){
	if ( !is_admin() && ( is_singular() AND comments_open() AND ( get_option('thread_comments') == 1 ) ) )
		wp_enqueue_script('comment-reply');
}
add_action( 'get_header', 'temple_enable_threaded_comments' );

# ~~ OR ~~

function temple_load_scripts() {
	/* Enqueue custom Javascript here using wp_enqueue_script(). */

	/* Load the comment reply JavaScript. */
	if ( is_singular() && comments_open() && ( get_option( 'thread_comments' ) == 1 ) )
		wp_enqueue_script( 'comment-reply' );
}



/**
 * Add a favicon
 * @see http://digwp.com/2010/03/wordpress-functions-php-template-custom-functions/
 */
function temple_blog_favicon() {
	echo '<link rel="Shortcut Icon" type="image/x-icon" href="'.get_bloginfo('wpurl').'/favicon.ico" />';
}
#add_action( 'wp_head', 'temple_blog_favicon' );



/**
 * Include category ID in body_class and post_class
 * @see http://digwp.com/2010/03/wordpress-functions-php-template-custom-functions/
 */
function temple_add_category_id_class( $classes ) {
	global $post;
	
	foreach ( ( get_the_category($post->ID) ) as $category )
		$classes[] = 'cat-' . $category->cat_ID . '-id';
	
	return $classes;
}
add_filter( 'post_class', 'temple_add_category_id_class' );
add_filter( 'body_class', 'temple_add_category_id_class' );



/**
 * Post Heading Tag
 * - this function MUST be called within the loop!
 */
function temple_post_heading_tag( $tag = 'h2' ) {
	if( is_single() ) $tag = 'h1';
	return $tag;
}



/**
 * Prevent "Read more" link 'jumping'
 * @see http://digwp.com/2010/03/wordpress-functions-php-template-custom-functions/
 */
function temple_no_readmore_jump( $post ) {
	return '<a href="'.get_permalink($post->ID).'" class="read-more">'.'Continue Reading'.'</a>';
}
add_filter( 'excerpt_more', 'temple_no_readmore_jump' );
add_filter( 'the_content_more_link', 'temple_no_readmore_jump' );



/**
 * Accurate site Copyright dates
 *
 * This function looks for the date of your first post, and the date of your last post.
 * It returns these years as a text string to use in your site's Copyright.
 * 
 * Use the following code wherever you like to display the dynamic copyright date:
 * 	<?php echo temple_accurate_copyright_dates(); ?>
 * 
 * @see http://www.wpbeginner.com/wp-tutorials/how-to-add-a-dynamic-copyright-date-in-wordpress-footer/
 */
function temple_accurate_copyright_dates() {
	global $wpdb;
	
	$copyright_dates = $wpdb->get_results("
		SELECT
			YEAR( min(post_date_gmt) ) AS firstdate,
			YEAR( max(post_date_gmt) ) AS lastdate
		FROM
			$wpdb->posts
		WHERE
			post_status = 'publish'
	");
	
	$output = '';
	
	if( $copyright_dates ) {
		$copyright = "&copy; " . $copyright_dates[0]->firstdate;
		
		if( $copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate ) 
			$copyright .= '-' . $copyright_dates[0]->lastdate;
		
		$output = $copyright;
	}
	
	return $output;
}



/**
 * Accurate Comment Count
 * - excludes Trackbacks and Pingbacks
 * @see http://www.wpbeginner.com/wp-tutorials/25-extremely-useful-tricks-for-the-wordpress-functions-file/
 */
function temple_accurate_comment_count( $count ) {
	
	if ( ! is_admin() ) {
		global $id;
		
		$comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
		
		return count( $comments_by_type['comment'] );
	}
	
	else return $count;
	
}
add_filter( 'get_comments_number', 'temple_accurate_comment_count', 0 );



/**
 * Delay posts being published to your RSS Feed
 *
 * All bloggers make errors that we catch after we publish the post.
 * Sometimes even within the next minute or two.
 * That is why it is best that we delay our posts to be published on the RSS by 5-10 minutes...
 *
 * @see http://www.wpbeginner.com/wp-tutorials/25-extremely-useful-tricks-for-the-wordpress-functions-file/
 */
function temple_delay_publish_to_rss( $where ) {
	global $wpdb;
	
	if ( is_feed() ) {
		// timestamp in WP-format
		$now = gmdate('Y-m-d H:i:s');
		
		// value for wait; + device
		$wait = '10'; // integer
		
		// http://dev.mysql.com/doc/refman/5.0/en/date-and-time-functions.html#function_timestampdiff
		$device = 'MINUTE'; //MINUTE, HOUR, DAY, WEEK, MONTH, YEAR
		
		// add SQL-sytax to default $where
		$where .= " AND TIMESTAMPDIFF( $device, $wpdb->posts.post_date_gmt, '$now' ) > $wait ";
	}
	
	return $where;
}
add_filter( 'posts_where', 'temple_delay_publish_to_rss' );



/**
 * Disable RSS Feed
 * - for static content sites (using WP as a CMS)
 * @see http://wpengineer.com/287/disable-wordpress-feed/
 */
function temple_disable_rss_feed() {
	wp_die( __('No feed available,please visit our <a href="'. get_bloginfo('url') .'">homepage</a>!') );
}
#add_action( 'do_feed', 'temple_disable_rss_feed', 1);
#add_action( 'do_feed_rdf', 'temple_disable_rss_feed', 1 );
#add_action( 'do_feed_rss', 'temple_disable_rss_feed', 1 );
#add_action( 'do_feed_rss2', 'temple_disable_rss_feed', 1 );
#add_action( 'do_feed_atom', 'temple_disable_rss_feed', 1 );



/**
 * Remove Default Author Profile Fields in WordPress
 * @see http://www.strangework.com/2010/03/30/how-to-remove-default-profile-fields-in-wordpress/
 */
function temple_hide_profile_fields( $contactmethods ) {
	unset( $contactmethods['aim'] );
	unset( $contactmethods['jabber'] );
	unset( $contactmethods['yim'] );
	return $contactmethods;
}
add_filter( 'user_contactmethods', 'temple_hide_profile_fields', 10, 1 );



/**
 * Add Custom Author Profile Fields
 * @see http://www.wpbeginner.com/wp-tutorials/25-extremely-useful-tricks-for-the-wordpress-functions-file/
 */
function temple_new_profile_contacts( $contactmethods ) {
	$contactmethods['facebook'] = 'Facebook';
	$contactmethods['twitter'] = 'Twitter';
	
	return $contactmethods;
}
add_filter( 'user_contactmethods', 'temple_new_profile_contacts', 10, 1 );



/**
 * Post Navigation Links
 * - provides links for 'Previous' and 'Next' post (with conditional checks!)
 * @var $position	Template position i.e. 'above' / 'below' the post entry
 */
function temple_post_navigation( $position = 'default' ) {
	
	global $wp_query;
	$next = get_next_posts_link( __( '<span class="meta-nav">&laquo;</span> Older posts', 'temple' ) );
	$prev = get_previous_posts_link( __( 'Newer posts <span class="meta-nav">&raquo;</span>', 'temple' ) );
	
	# check that previous / next pages exist
	if ( $wp_query->max_num_pages > 1 ) :
		
		if ( !empty( $next ) || !empty( $prev ) ) {
			
			$nav_links = "\n\t\t\t\t\t<div id=\"post-nav-$position\" class=\"navigation\">";
			
			if ( !empty( $next ) )
				$nav_links .= "\n\t\t\t\t\t\t<div class=\"nav-previous\">" . $next . "</div>";
			
			if ( !empty( $prev ) )
				$nav_links .= "\n\t\t\t\t\t\t<div class=\"nav-next\">" . $prev . "</div>";
			
			$nav_links .= "\n\t\t\t\t\t</div><!-- #post-nav-$position -->";
			
			return $nav_links;
		}
		
		else return false;
		
	endif;
	
}



/**
 * Blog Title
 * - create mark-up for the site's main header title
 */
function temple_blog_title( $tag = 'div' ) {
	if ( is_home() || is_front_page() )
		$tag = 'h1';
	
	return "<$tag id=\"blog-title\"><span><a href=\"" . get_bloginfo( 'url' ) . '" title="' . get_bloginfo( 'name' ) . '" rel="home">' . get_bloginfo( 'name' ) . "</a></span></$tag>\n";
	
}



/**
 * Blog Description
 * - generate mark-up for the tag line to accompany the site's main header title
 */
function temple_blog_description( $tag = 'div' ) {
	$desc = get_bloginfo( 'description' );
	
	if ( $desc )
		return "<$tag id=\"blog-description\">$desc</$tag>\n";
	
	else return false;
}



/**
 * Blog Branding
 * - combined site-name title and tag-line
 */
function temple_blog_branding( $title = 'div', $desc = 'div' ) {
	$tagline = temple_blog_description( $desc ); // get the description if it exists
	
	$branding = temple_blog_title( $title ); // add the site title
	$branding .= ( $tagline ) ? "\t\t\t\t\t" . $tagline : ''; // only add the description if there is one!
	
	return  $branding;
}



/**
 * Access Skip Link
 * - generate 'skip to content' link for accessability
 */
function temple_skip_link() {
	ob_start(); ?>
				
				<div id="access">
					<div class="skip-link"><a href="#content" title="<?php _e( 'Skip to content', 'your-theme' ) ?>"><?php _e( 'Skip to content', 'your-theme' ) ?></a></div>
				</div><!-- #access -->
				
				<?php
	
	return ob_get_clean();
}











