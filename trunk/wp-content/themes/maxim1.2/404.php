<?php get_header(); ?>

<div id="content" class="site-content">
	<main id="main" class="site-main" role="main">
		
		<div id="std-page" class="page the-page">
			<div class="title-meta"><h1><?php _e( 'Oops! That page can&rsquo;t be found.', 'silver' ); ?></h1></div>
			<p><?php printf( __( 'It looks like nothing was found at this location. Maybe try resuming your search from the %1$s?', 'silver' ), '<a href="'.esc_url( home_url( '/' ) ).'">homepage</a>' ); ?></p>
		</div>
		
	</main>
</div>

<?php get_footer(); ?>