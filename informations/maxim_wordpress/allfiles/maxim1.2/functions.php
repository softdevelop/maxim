<?php
/**
 * Maxim functions and definitions
 *
 * @package Maxim
 */
 
/**
 * Theme Mode
 */
add_filter( 'ot_theme_mode', '__return_true' );

/**
 * Show Settings Pages
 */
add_filter( 'ot_show_pages', '__return_false' );

/**
 * Required: include OptionTree.
 */
load_template( trailingslashit( get_template_directory() ) . 'admin/ot-loader.php' );

/**
 * Theme Options
 */
load_template( trailingslashit( get_template_directory() ) . 'admin/theme-options.php' );

/**
 * Meta Boxes
 */
load_template( trailingslashit( get_template_directory() ) . 'admin/meta-boxes.php' );

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'silver_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function silver_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Maxim, use a find and replace
	 * to change 'silver' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'silver', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */

	if ( function_exists( 'add_image_size' ) ) add_theme_support( 'post-thumbnails' );

	if ( function_exists( 'add_image_size' ) ) {
		add_image_size( 'blog', 196, 196, true );
		add_image_size( 'page_without_margin', 1000, 400, true );
		add_image_size( 'page_with_margin', 879, 246, true );
		add_image_size( 'work', 338, 467, true );
		add_image_size( 'clients', 769, 467, true );
	}

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'silver' ),
	) );

	// Enable support for Post Formats.
	/*add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );*/
	
	// Setup the WordPress core custom background feature.
	/*add_theme_support( 'custom-background', apply_filters( 'silver_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );*/

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
		'caption',
	) );
}
endif; // silver_setup
add_action( 'after_setup_theme', 'silver_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function silver_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'silver' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<li><aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside></li>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'silver_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function silver_scripts() {
	wp_enqueue_style( 'pace', get_stylesheet_directory_uri() . '/stylesheets/pace.css' );
	wp_enqueue_style( 'base', get_stylesheet_directory_uri() . '/stylesheets/base.css' );
	wp_enqueue_style( 'skeleton', get_stylesheet_directory_uri() . '/stylesheets/skeleton.css' );
	wp_enqueue_style( 'flexslider', get_stylesheet_directory_uri() . '/stylesheets/flexslider.css' );
	wp_enqueue_style( 'fancybox', get_stylesheet_directory_uri() . '/stylesheets/jquery.fancybox.css' );
	
	wp_enqueue_style( 'silver-style', get_stylesheet_uri() );
	
	wp_enqueue_style( 'layout', get_stylesheet_directory_uri() . '/stylesheets/layout.css' );
	
	wp_enqueue_style( 'fontawesome', 'http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css' );

	wp_enqueue_script( 'pace', get_template_directory_uri() . '/js/pace.js', array(), '20140505', true );

	wp_enqueue_script('jquery');
	wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array(), '20140505', true );
	wp_enqueue_script( 'nicescroll', get_template_directory_uri() . '/js/jquery.nicescroll.min.js', array(), '20140505', true );
	wp_enqueue_script( 'sticky', get_template_directory_uri() . '/js/sticky.js', array(), '20140505', true );
	wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/js/jquery.fancybox.pack.js', array(), '20140505', true );
	wp_enqueue_script('twitter', get_template_directory_uri() . '/js/twitter/jquery.tweet.js', 'jquery', array(), '20140505', true );
	
	wp_enqueue_script( 'maxim', get_template_directory_uri() . '/js/maxim.js', array(), '20140505', true );

	wp_enqueue_script( 'silver-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'silver-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'silver_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

require get_template_directory() . '/inc/scripts.php';
require get_template_directory() . '/inc/css.php';

function maxim_set_background() {
	$silver_bg_slider_imgs = ot_get_option('bg_slider');
	$silver_pp_bg_slider_imgs = get_post_meta( get_the_ID( ), 'pp_bg_slider', true );
	if($silver_pp_bg_slider_imgs) {
		if(count($silver_pp_bg_slider_imgs) > 1) {
			echo '
			<div id="superslides">
				<div class="slides-container">';
					foreach($silver_pp_bg_slider_imgs as $image) {
						echo '<img alt="'.$image['title'].'" src="'.$image['pp_bg_slider_image'].'" />';
					}
			echo '
				</div>
			</div>';
		} else {
			echo '
			<style>
				body { 
					background: url( '.$silver_pp_bg_slider_imgs[0]['pp_bg_slider_image'].' ) no-repeat center center fixed !important; 
					-webkit-background-size: cover !important; 
					-moz-background-size: cover !important; 
					-o-background-size: cover !important; 
					background-size: cover !important; 
				}
			</style>
			';
		}
	} elseif($silver_bg_slider_imgs) {
		if(count($silver_bg_slider_imgs) > 1) {
			echo '
			<div id="superslides">
				<div class="slides-container">';
					foreach($silver_bg_slider_imgs as $image) {
						echo '<img alt="'.$image['title'].'" src="'.$image['bg_slider_image'].'" />';
					}
			echo '
				</div>
			</div>';
		} else {
			echo '
			<style>
				body { 
					background: url( '.$silver_bg_slider_imgs[0]['bg_slider_image'].' ) no-repeat center center fixed !important; 
					-webkit-background-size: cover !important; 
					-moz-background-size: cover !important; 
					-o-background-size: cover !important; 
					background-size: cover !important; 
				}
			</style>
			';
		}
	};
}

function maxim_set_quote_slider() {
	$silver_quote_items = ot_get_option('quote-slider');
	if($silver_quote_items) {
		echo '
		<div id="quote-slider" class="flexslider">
			<ul class="quote-items slides">';
				foreach($silver_quote_items as $item) {
				 echo '<li>'.$item['quote-slider-item'].'</li>';
				}
		echo '
			</ul>
		</div>'; 
	};
}

function maxim_homepage_posts() { ?>
	<div id="posts">
		<?php 
		global $paged;
		if ( get_query_var('paged') ) {
			$paged = get_query_var('paged');
		} elseif ( get_query_var('page') ) {
			$paged = get_query_var('page');
		} else {
			$paged = 1;
		}
		
		$args = array(
			'post_type' => 'post',
			'paged' => $paged,
			'posts_per_page' => 3
		);
		$maxim_homepage_query = new WP_Query($args);
		if ( $maxim_homepage_query->have_posts() ) :

		while ( $maxim_homepage_query->have_posts() ) : $maxim_homepage_query->the_post(); ?>

			<article>
				<h2><a class="p323232 transition hover-color" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<p><?php echo limit_words(get_the_content(), 25); ?>&nbsp;&hellip;</p>
				<a class="read-more transition hover-color" href="<?php the_permalink(); ?>"><?php echo ot_get_option('more-link'); ?></a>
				<hr />
			</article>

		<?php 
		endwhile;
		wp_reset_postdata();

		else:
			get_template_part( 'content', 'none' );
		endif; ?>
		<?php silver_pagination($maxim_homepage_query->max_num_pages, $range = 2); ?>
	</div>
<?php }

function maxim_homepage_boxes($box) {
	$maxim_twitter_box = ot_get_option('homepage-twitter') ? ot_get_option('homepage-twitter') : 'default';
	
	switch ($box) {
		case 'one': ?>
			<div <?php 
				$tweets_one = false;
				if($maxim_twitter_box == 'one') $tweets_one = true;
				if($tweets_one) echo 'class="twitter"'; ?> >
				<?php
				if($tweets_one) { maxim_homepage_tweets(); } 
				else {
					if(ot_get_option('box_one_img') != "")  echo '<img class="grayscale" src="'.ot_get_option('box_one_img').'" />';
					if(ot_get_option('box_one_extra') != "") {
						$box_one_extra = explode("\n", ot_get_option('box_one_extra'));
						$box_one_extra = '<h1><a href="'.$box_one_extra[0].'">'.$box_one_extra[1].'</a></h1><p>'.$box_one_extra[2].'</p>';
						echo '<div class="main-content">'.$box_one_extra.'</div><div class="hover-bg"></div>';
					};
				};
				?>
			</div><?php 
			break;
		case 'two': ?>
			<div <?php
				$tweets_two = false;
				if($maxim_twitter_box == 'two') $tweets_two = true;
				if($tweets_two) echo 'class="twitter"'; ?> >
				<?php
				if($tweets_two) { maxim_homepage_tweets(); } 
				else {
					if(ot_get_option('box_two_img') != "")  echo '<img class="grayscale" src="'.ot_get_option('box_two_img').'" />';
					if(ot_get_option('box_two_extra') != "") {
						$box_two_extra = explode("\n", ot_get_option('box_two_extra'));
						$box_two_extra = '<h1><a href="'.$box_two_extra[0].'">'.$box_two_extra[1].'</a></h1><p>'.$box_two_extra[2].'</p>';
						echo '<div class="main-content">'.$box_two_extra.'</div><div class="hover-bg"></div>';
					};
				};
				?>
			</div>
		<?php 
			break;
		case 'three': ?>
			<div <?php
				$tweets_three = false;
				if($maxim_twitter_box == 'three') $tweets_three = true;
				if($tweets_three) echo 'class="twitter"'; ?> >
				<?php
				if($tweets_three) { maxim_homepage_tweets(); } 
				else {
					if(ot_get_option('box_three_img') != "")  echo '<img class="grayscale" src="'.ot_get_option('box_three_img').'" />';
					if(ot_get_option('box_three_extra') != "") {
						$box_three_extra = explode("\n", ot_get_option('box_three_extra'));
						$box_three_extra = '<h1><a href="'.$box_three_extra[0].'">'.$box_three_extra[1].'</a></h1><p>'.$box_three_extra[2].'</p>';
						echo '<div class="main-content">'.$box_three_extra.'</div><div class="hover-bg"></div>';
					};
				};
				?>
			</div>
		<?php 
			break;
		case 'four': ?>
			<div <?php
				$tweets_four = false;
				if($maxim_twitter_box == 'four') $tweets_four = true;
				if($tweets_four) echo 'class="twitter"'; ?> >
				<?php
				if($tweets_four) { maxim_homepage_tweets(); } 
				else {
					if(ot_get_option('box_four_img') != "")  echo '<img class="grayscale" src="'.ot_get_option('box_four_img').'" />';
					if(ot_get_option('box_four_extra') != "") {
						$box_four_extra = explode("\n", ot_get_option('box_four_extra'));
						$box_four_extra = '<h1><a href="'.$box_four_extra[0].'">'.$box_four_extra[1].'</a></h1><p>'.$box_four_extra[2].'</p>';
						echo '<div class="main-content">'.$box_four_extra.'</div><div class="hover-bg"></div>';
					};
				};
				?>
			</div>
		<?php 
			break;
		case 'five': ?>
			<div <?php
				$tweets_five = false;
				if($maxim_twitter_box == 'five') $tweets_five = true;
				if($tweets_five) echo 'class="twitter"'; ?> >
				<?php
				if($tweets_five) { maxim_homepage_tweets(); } 
				else {
					if(ot_get_option('box_five_img') != "")  echo '<img class="grayscale" src="'.ot_get_option('box_five_img').'" />';
					if(ot_get_option('box_five_extra') != "") {
						$box_five_extra = explode("\n", ot_get_option('box_five_extra'));
						$box_five_extra = '<h1><a href="'.$box_five_extra[0].'">'.$box_five_extra[1].'</a></h1><p>'.$box_five_extra[2].'</p>';
						echo '<div class="main-content">'.$box_five_extra.'</div><div class="hover-bg"></div>';
					};
				};
				?>
			</div>
		<?php 
			break;
		case 'six': ?>
			<div <?php
				$tweets_six = false;
				if($maxim_twitter_box == 'six') $tweets_six = true;
				if($tweets_six) echo 'class="twitter"'; ?> >
				<?php
				if($tweets_six) { maxim_homepage_tweets(); } 
				else {
					if(ot_get_option('box_six_img') != "")  echo '<img class="grayscale" src="'.ot_get_option('box_six_img').'" />';
					if(ot_get_option('box_six_extra') != "") {
						$box_six_extra = explode("\n", ot_get_option('box_six_extra'));
						$box_six_extra = '<h1><a href="'.$box_six_extra[0].'">'.$box_six_extra[1].'</a></h1><p>'.$box_six_extra[2].'</p>';
						echo '<div class="main-content">'.$box_six_extra.'</div><div class="hover-bg"></div>';
					};
				};
				?>
			</div><?php 
			break;
	} 
}

function maxim_blog_search_layout() {
	global $maxim_blog_layout;
	$maxim_blog_layout = ot_get_option('blog-layout') ? ot_get_option('blog-layout') : 'default';
	if($maxim_blog_layout == 'no_sidebar') {
		$maxim_blog_layout = 'simple-blog';
	} elseif ($maxim_blog_layout == 'special') {
		$maxim_blog_layout = 'special-blog';
	} else {
		$maxim_blog_layout = 'simple-blog w_sidebar clearfix';
	};
};

function maxim_homepage_tweets() { ?>

	<script type='text/javascript'>
		jQuery(document).ready(function($){
			$('.twitterpost').tweet({
				modpath: '<?php echo get_template_directory_uri(); ?>/js/twitter/index.php',
				username: '<?php echo ot_get_option('screen_name'); ?>',
				count: "1"
			});
		});
	</script>
	<div class="twitterpost"></div>

<?php }

function maxim_blog_single_span_class_meta() { ?>
	<span class="meta">

	<?php
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( __( ', ', 'silver' ) );
		if ( $categories_list && silver_categorized_blog() ) :
	?>
		<span class="category"><?php echo $categories_list; ?></span>
	<?php endif; // End if categories ?>

	<?php 
	$terms = wp_get_post_terms( get_the_ID(), 'clients-filter'); 
	if(!$terms) $terms = wp_get_post_terms( get_the_ID(), 'work-filter');
	if(!$terms) $terms = wp_get_post_terms( get_the_ID(), 'team-filter');

	$last_term = end($terms);

	if($terms) :
		echo '<span class="category">';
		foreach($terms as $term) { 
			
			$term = sanitize_term( $term, 'clients-filter' );
			$term_link = get_term_link( $term, 'clients-filter' );
			if ( is_wp_error( $term_link ) ) {
				continue;
			}
			echo '<a href="'.esc_url( $term_link ).'">'.$term->name.'</a>';
			if ( $term != $last_term ) {
				echo ', ';
			}
		};
		echo '</span>';
	endif
	?>

		<span class="author"><?php _e('by', 'silver') ?> <?php the_author_posts_link(); ?></span>

	<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		<span class="comments"><?php comments_popup_link( __( 'Leave a comment', 'silver' ), __( '1 Comment', 'silver' ), __( '% Comments', 'silver' ) ); ?></span>
	<?php endif; ?>

	</span>
<?php };

function maxim_page_span_class_meta() { ?>
	<span class="meta">

		<span class="author"><?php _e('by', 'silver') ?> <?php the_author_posts_link(); ?></span>

	<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		<span class="comments"><?php comments_popup_link( __( 'Leave a comment', 'silver' ), __( '1 Comment', 'silver' ), __( '% Comments', 'silver' ) ); ?></span>
	<?php endif; ?>

	</span>
<?php };

function maxim_blog_single_content_pages_comments() { ?>
	<?php the_content(); ?>
	<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'silver' ),
			'after'  => '</div>',
		) );
	?>
	
	<?php silver_post_nav(); ?>
	
	<?php
		if(ot_get_option('show_tags') == 'tags-show') {
			$tags_list = get_the_tag_list( '', '' );
			if ( $tags_list ) :
				echo '<span class="post-tags">'.$tags_list.'</span>';
			endif; 
		}; ?>
	
	<?php
		// If comments are open or we have at least one comment, load up the comment template
		if ( comments_open() || '0' != get_comments_number() ) :
			comments_template();
		endif;
	?>
	
<?php };

function maxim_page_content_pages_comments() { ?>

<?php the_content(); ?>

<?php
	wp_link_pages( array(
		'before' => '<div class="page-links">' . __( 'Pages:', 'silver' ),
		'after'  => '</div>',
	) );
?>

<?php
	// If comments are open or we have at least one comment, load up the comment template
	if ( comments_open() || '0' != get_comments_number() ) :
		comments_template();
	endif;
?>

<?php };

function custom_excerpt_length( $length ) {
	return 100;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

/**
 * Word Limiter
 */
function limit_words($string, $word_limit) {
	$words = explode(' ', $string);
	return implode(' ', array_slice($words, 0, $word_limit));
}

/**
 * Pagination
 */
function silver_pagination($pages = '', $range = 4) {
	$showitems = ($range * 2)+1;
	
	global $paged;
	if(empty($paged)) $paged = 1;
	
	if($pages == '') {
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if(!$pages) {
			$pages = 1;
		}
	}
	
	if(1 != $pages) {
		echo "<nav id='navigation'>";
		echo "<ul>";

		for ($i=1; $i <= $pages; $i++) {
			if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
				echo ($paged == $i)? "<li>".$i."</li>":"<li><a href='".get_pagenum_link($i)."' class=\"p999999 transition hover-color\">".$i."</a></li>";
			}
		}

		echo "</ul>";
		echo "</nav>";
	}
}

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/inc/plugin-activation.php';

add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );

function my_theme_register_required_plugins() {

    $plugins = array(
        array(
            'name'               => 'Maxim Clients Plugin', // The plugin name.
            'slug'               => 'maxim-clients-plugin', // The plugin slug (typically the folder name).
            'source'             => get_stylesheet_directory() . '/plugins/maxim-clients-plugin.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
        ),
		array(
            'name'               => 'Maxim Team Plugin', // The plugin name.
            'slug'               => 'maxim-team-plugin', // The plugin slug (typically the folder name).
            'source'             => get_stylesheet_directory() . '/plugins/maxim-team-plugin.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
        ),
		array(
            'name'               => 'Maxim Work Plugin', // The plugin name.
            'slug'               => 'maxim-work-plugin', // The plugin slug (typically the folder name).
            'source'             => get_stylesheet_directory() . '/plugins/maxim-work-plugin.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
        ),
		array(
            'name'               => 'Maxim Gallery Plugin', // The plugin name.
            'slug'               => 'maxim-gallery-plugin', // The plugin slug (typically the folder name).
            'source'             => get_stylesheet_directory() . '/plugins/maxim-gallery-plugin.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
        ),
		array(
            'name'               => 'Zilla Shortcodes', // The plugin name.
            'slug'               => 'zilla-shortcodes', // The plugin slug (typically the folder name).
            'source'             => get_stylesheet_directory() . '/plugins/zilla-shortcodes.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
        ),

        array(
            'name'      => 'Contact Form 7',
            'slug'      => 'contact-form-7',
            'required'  => true,
        ),
    );

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => __( 'Install Required Plugins', 'tgmpa' ),
            'menu_title'                      => __( 'Install Plugins', 'tgmpa' ),
            'installing'                      => __( 'Installing Plugin: %s', 'tgmpa' ), // %s = plugin name.
            'oops'                            => __( 'Something went wrong with the plugin API.', 'tgmpa' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'tgmpa' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'tgmpa' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'tgmpa' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'tgmpa' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'tgmpa' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'tgmpa' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'tgmpa' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'tgmpa' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'tgmpa' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'tgmpa' ),
            'return'                          => __( 'Return to Required Plugins Installer', 'tgmpa' ),
            'plugin_activated'                => __( 'Plugin activated successfully.', 'tgmpa' ),
            'complete'                        => __( 'All plugins installed and activated successfully. %s', 'tgmpa' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );

    tgmpa( $plugins, $config );

}