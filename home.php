<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 * We filter the output of wp_title() a bit -- see
	 * twentyten_filter_wp_title() in functions.php.
	 */
	wp_title( '|', true, 'right' );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script type="text/javascript">
	google.load("jquery", "1");
</script>
<script src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/jquery-ui.min.js"></script>
<script src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/preloadCssImages.jQuery_v5.js"></script>
<script src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/colorbox/jquery.colorbox.js"></script>
<link media="screen" rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/js/colorbox/colorbox.css" />
<link media="screen" rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/js/colorbox/shadowed/colorbox.css" />

	<script type="text/javascript">
	  $(document).ready(function() {
	  $('').draggable();
  		$.preloadCssImages();
		$("a.cboxElement, #blog #primary a").each(function(index, link){
			link.href = link.href+'?iframe=true';
			//link.attr('href', link.attr('href')+'?iframe=true');
		});
		$("a.cboxElement, #blog #primary a").colorbox({iframe:true, innerWidth:440, innerHeight:600, initialWidth:200, initialHeight:300, transition:'elastic', speed:500});
		
 });
 
 
 jQuery(function(){
	//portfolio thumb fadein fadeout
	jQuery('.content div.item').hover(function(){
		jQuery(this).find('img').fadeOut();
	}, function(){
		jQuery(this).find('img').fadeIn();

	});



<?php /*?>	<?php if(is_single(!in_category($blog_ID))) { ?>
	jQuery('#gallery').gallery();
	<?php } ?><?php */?>
});

 </script>



	  
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
<meta name="google-site-verification" content="9xNmDDB7K6nQG5L0AuIKurE4IQctzy6RIPeP4DB1Yrk" />
</head>

<?php
$extra_classes = '';
if(@$_GET['iframe']) $extra_classes = 'iframed';
?>
<body <?php body_class($extra_classes); ?>>
<script type="text/javascript">
	  $('body').addClass('java');
	  //$('html,body').scrollTop(2220).delay(100);
	  //$('html,body').scrollLeft(2170);
</script>
<div id="wrapper" class="hfeed">
	<div id="scrollable">
		
		<?php if(!@$_GET['iframe']): ?>
		<div id="header">
					<!--start branding-->
					<div id="branding">
					<img src="<?php bloginfo( 'wpurl' ); ?>/wp-content/themes/rootspring/images/root-logo-sml.png" alt="Root Interactive logo" />
						<h1 id="home"><a href="/"><span><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></span></a></h1>
					</div>
					<!--end branding-->
					
					<!--start main navigation-->
					<div id="access" role="navigation">
			  <?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff */ ?>
				<div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentyten' ); ?>"><?php _e( 'Skip to content', 'twentyten' ); ?></a></div>
					<ul id="menu" class="menu-beans">
						<li class="home"><a href="/">home</a></li>
						<li class="services"><a href="/services">services</a></li>
						<li class="portfolio"><a href="/portfolio">portfolio</a></li>
						<li class="about"><a href="/about">about</a></li>
						<li class="blog"><a href="/blog">blog</a></li>
						<li class="contact"><a href="/contact-us">contact</a></li>
					</ul>
				</div><!-- #access -->
		</div><!--end header-->
		<?php endif; ?>
	<div id="main">
<!--Start #tiles. This is the main area containing the homepage content. it is divided into a grid of 25 floated divs-->
<div id="content">
		<!--Start introduction section-->
			<div class="r1-c1 tile" id="introduction">
				<div class="container">
					<div class="content" role="main">
					<h2 class="entry-title"><?php bloginfo( 'description' ); ?></h2>
						<?php query_posts('pagename=home'); //retrieves the home page only ?>
						<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
							<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<div class="entry-content">
									<?php the_content(); ?>
								</div><!-- .entry-content -->
							</div><!-- #post-## -->
						<?php endwhile; ?>
					</div><!-- #content -->
				</div><!-- #container -->
				<span class="back-pod"><a href="#menu" title="back to main menu" class="link-beans">back to menu</a></span>
			</div><!--end introduction section-->
			
			<div class="r1-c2 tile"></div>
			
			<!--Start services section-->
			<div class="r1-c3 tile" id="services">
				<div class="container">
					<div class="content" role="main">
						<?php query_posts('pagename=services'); //retrieves the services page only ?>
						<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
							<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<h2 class="entry-title"><?php the_title(); ?></h2>
									<span class="thumbnail">
									<?php the_post_thumbnail('medium'); ?>
									</span>
								<div class="entry-content">
									<?php the_content(); ?>
								</div><!-- .entry-content -->
				
							</div><!-- #post-## -->
						<?php endwhile; ?>
					</div><!-- #content -->
				</div><!-- #container -->
			<span class="back-pod"><a href="#menu" title="back to main menu" class="link-beans">back to menu</a></span>
			</div><!--end services section-->
		
			<div class="r1-c4 tile"></div>
			<div class="r1-c5 tile"></div>
			
			<!--Start Portfolio section-->
			<div class="r2-c1 tile" id="portfolio">
				<div class="container">
					<div class="content" role="main">
					<h2 class="entry-title">Portfolio</h2>
					
					
						<?php query_posts('category_name=projects'); //retrieves the portfolio posts only ?>
						<?php $i=0;
						while (have_posts()) : the_post();$i++;?>			
					<div class="item <?php if ($i == 1) { ?>alpha<?php } else if($i==3) {?> omega<?php $i = 0;} ?>">
						<a href="<?php the_permalink(); ?>" class="cboxElement thumbnail sml"><?php the_post_thumbnail('thumbnail'); ?>
						<h3 class="title entry-title"><?php the_title(); ?></h3></a>
						<div class="description shadow-1">
							<?php the_excerpt();?>
							<a href="<?php the_permalink(); ?>"class="cboxElement button">more</a>
							<div class="project">
								<h4 class="title entry-title"><?php the_title(); ?></h4>
								<div class="thumbnail med"><?php the_post_thumbnail('medium'); ?></div>
								<?php the_content();?>
							</div>
						</div>
						
						
						
					</div>		

						<?php endwhile; ?>
						
					</div><!-- #content -->
				</div><!-- #container -->
			<span class="back-pod"><a href="#menu" title="back to main menu" class="link-beans">back to menu</a></span>
			</div><!--end portfolio section-->
			
			
			<div class="r2-c2 tile"></div>
			<div class="r2-c3 tile"></div>
			<div class="r2-c4 tile"></div>
			<div class="r2-c5 tile"></div>
			<div class="r3-c1 tile"></div>
			<div class="r3-c2 tile"></div>
			<div class="r3-c3 tile"></div>
			<div class="r3-c4 tile"></div>
			
			<!--Start About section-->
			<div class="r3-c5 tile" id="about">
				<div class="container">
					<div class="content" role="main">
						<?php query_posts('pagename=about'); //retrieves the about page only ?>
						<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
							<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<h2 class="entry-title"><?php the_title(); ?></h2>
								<div class="entry-content">
									<span class="thumbnail">
									<?php the_post_thumbnail('medium'); ?>
									</span>
									<?php the_content(); ?>
								</div><!-- .entry-content -->
							</div><!-- #post-## -->
						<?php endwhile; ?>
					</div><!-- #content -->
				</div><!-- #container -->
			<span class="back-pod"><a href="#menu" title="back to main menu" class="link-beans">back to menu</a></span>
			</div><!--end about section-->
			
			
			<div class="r4-c1 tile"></div>
			
			<!--start blog-->
			<div class="r4-c2 tile" id="blog">
			<div class="container">
					<div class="content" role="main">
					<h2 class="entry-title">Blog...</h2>
						<?php query_posts('category_name=blog'); //retrieves the blog page only ?>
						<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
							<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<a href="<?php the_permalink(); ?>" class="cboxElement thumbnail"><h3 class="entry-title"><?php the_title(); ?></h3>
										<?php the_post_thumbnail('thumbnail'); ?></a>
								<div class="entry-content">
								<p><?php twentyten_posted_on(); ?>
									<?php the_content(); ?>
								</div><!-- .entry-content -->
								<div class="subpages">
									<?php
										  if($post->post_parent)
										  $children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");
										  else
										  $children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
										  if ($children) { ?>
										  <ul>
											<?php echo $children; ?>
										  </ul>
										 <?php } ?>
								</div><!--#subpages-->
							</div><!-- #post-## -->
						<?php endwhile; ?>
					</div><!-- #content -->
				</div><!-- #container -->
			<span class="back-pod"><a href="#menu" title="back to main menu" class="link-beans">back to menu</a></span>
			</div><!--end blog section-->
			
			<div class="r4-c3 tile"></div>
			<div class="r4-c4 tile"></div>
			<div class="r4-c5 tile"></div>
			<div class="r5-c1 tile"></div>
			<div class="r5-c2 tile"></div>
			<div class="r5-c3 tile"></div>
			
			<!--start contact section-->
			<div class="r5-c4 tile" id="contact">
				<div class="container">
					<div class="content" role="main">
						<?php query_posts('pagename=contact-us'); //retrieves the contact page only ?>
						<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
							<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<h2 class="entry-title"><?php the_title(); ?></h2>
								<div class="entry-content">
									<span class="thumbnail">
									<?php the_post_thumbnail('medium'); ?>
									</span>
									<?php the_content(); ?>
								</div><!-- .entry-content -->
								<div class="subpages">
									<?php
										  if($post->post_parent)
										  $children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");
										  else
										  $children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
										  if ($children) { ?>
										  <ul>
									<?php echo $children; ?>
										  </ul>
									<?php } ?>
								</div><!--#subpages-->
							</div><!-- #post-## -->
						<?php endwhile; ?>
					</div><!-- #content -->
				</div><!-- #container -->
			<span class="back-pod"><a href="#menu" title="back to main menu" class="link-beans">back to menu</a></span>
			</div><!--end contact section-->
			
			<div class="r5-c5 tile"></div>
		</div><!--#content-->
		</div><!--#main-->
		<div id="footer" role="contentinfo">
		
			<div id="colophon">

			<div id="site-info">
				<a href="<?php echo home_url( '/' ) ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<?php bloginfo( 'name' ); ?>
				</a>
			</div><!-- #site-info -->

			<div id="site-generator">
				<?php do_action( 'twentyten_credits' ); ?>
				<a href="<?php echo esc_url( __('http://wordpress.org/', 'twentyten') ); ?>"
						title="<?php esc_attr_e('Semantic Personal Publishing Platform', 'twentyten'); ?>" rel="generator">
					<?php printf( __('Proudly powered by %s.', 'twentyten'), 'WordPress' ); ?>
				</a>
			</div><!-- #site-generator -->

		</div><!-- #colophon -->
		</div><!-- #footer -->
	</div><!--#scrollable-->
</div><!-- #wrapper -->

<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>

	  
	  
<script type="text/javascript">  
	  /*replace each*/		
   
    $('#menu.menu-header .home a, a.link-beans ').live('click', function(event) {
  	event.preventDefault();
	//$('#menu').delay(50).fadeOut('fast').hide().removeClass('menu-header').addClass('menu-beans');
	$(document).scrollTop(0);
	$('#scrollable').animate({
		left:'-2220px',
		top:'-2170px'
		}, 1500, 'swing');
		//$('#menu').delay(1000).fadeIn('fast');
  }); 

  
  
  //function scrollToElement(id)
  //{
  	//$('html, body').animate({scrollTop: $(id).offset().top,scrollLeft: $(id).offset().left}, 2000, "swing");
  //}
  
  $('#menu .services a, a.services').live('click', function(event) {
  	event.preventDefault();
	//$('#menu').fadeOut('fast');
	$(document).scrollTop(0);
	$('#scrollable').animate({
		left: '-2000px',
		top: '0px'
		}, 1500, 'swing');
		//$('#menu').delay(300).hide().removeClass('menu-beans').addClass('menu-header').delay(500).fadeIn('slow');
  }); 
  
  $('#menu .portfolio a, a.portfolio').live('click', function(event) {
  	event.preventDefault();
	//$('#menu').fadeOut('fast');
	$(document).scrollTop(0);
	$('#scrollable').animate({
		left: '0px',
		top: '-1000px'
		}, 1500, 'swing');
		//$('#menu').delay(300).hide().removeClass('menu-beans').addClass('menu-header').delay(500).fadeIn('slow');
  }); 
  
  $('#menu .about a, a.about').live('click', function(event) {
  	event.preventDefault();
	//$('#menu').fadeOut('fast');
	$(document).scrollTop(0);
	$('#scrollable').animate({
		left: '-4000px',
		top: '-2000px'
		}, 1500, 'swing');
		//$('#menu').delay(300).hide().removeClass('menu-beans').addClass('menu-header').delay(500).fadeIn('slow');
  }); 
  
  $('#menu .blog a, a.blog').live('click', function(event) {
  	event.preventDefault();
	//$('#menu').fadeOut('fast');
	$(document).scrollTop(0);
	$('#scrollable').animate({
		left: '-1000px',
		top: '-3000px'
		}, 1500, 'swing');
		//$('#menu').delay(300).hide().removeClass('menu-beans').addClass('menu-header').delay(500).fadeIn('slow');
  });
  
  $('#menu .contact a, a.contact').live('click', function(event) {
  	event.preventDefault();
	//$('#menu').fadeOut('fast');
	$(document).scrollTop(0);
	$('#scrollable').animate({
		left: '-3000px',
		top: '-4000px'
		}, 1500, 'swing');
		//$('#menu').delay(300).hide().removeClass('menu-beans').addClass('menu-header').delay(500).fadeIn('slow');
  });
   

	$('#about a.reasons').click(function(event) {
		event.preventDefault();
		$(document).scrollTop(0);
		$("#reasons .service-list li").each(function() {
			$(this).fadeIn('slow').delay(500);
		});
	});
	
		$('#services a.service-list').click(function(event) {
		event.preventDefault();
		$(document).scrollTop(0);
		$("#services ul.services li").each(function() {
			$(this).fadeIn('slow').delay(500);
		});
	});
 
</script>
</body>
</html>
