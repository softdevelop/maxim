<div class="page-title-div">
	<h1 class="page-title"><?php _e( 'Nothing Found', 'silver' ); ?></h1>
</div>
	
<ul class="no-results not-found">
	<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
		<li><p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'silver' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p></li>
	<?php elseif ( is_search() ) : ?>
		<li><p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'silver' ); ?></p><?php get_search_form(); ?></li>
	<?php else : ?>
		<li><p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'silver' ); ?></p><?php get_search_form(); ?></li>
	<?php endif; ?>
</ul>

