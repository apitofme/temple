<?php
/**
 * Temple Theme Header
 */
?>
<html>
	<head>
		<title><?php wp_title(' | '); bloginfo( 'name' ); ?></title>
		<meta name="description" content="<?php bloginfo( 'description' ); ?>" />
		<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		
		<div id="wrapper" class="container hfeed">
			
			<header class="page_header">
				
				<div id="branding">
					<?php echo temple_blog_branding(); ?>
				</div><!-- #branding -->
				
				<?php echo temple_skip_link(); ?>
				
				<nav class="nav">
					<?php wp_nav_menu( 'header_menu' ); ?>
					
					<div class="breadcrumbs">
						<?php get_template_part( 'nav', 'breadcrumbs' ); ?>
					</div>
				</nav>
				
			</header><!-- .page_header -->