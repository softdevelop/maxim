<?php

/* Template Name: Gallery */

get_header(); ?>

<div id="content_page" class="site-content">
	<main id="main" class="site-main" role="main">
		<div class="page-title-div"><h1 class="page-title"><?php the_title(); ?></h1></div>
		<div id="std-page" class="page the-page">
			<?php 
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$args = array(
				'post_type' => 'maxim_gallery',
				'paged' => $paged,
				'posts_per_page' => 4
			);
			$maxim_gallery_query = new WP_Query($args);
			if ( $maxim_gallery_query->have_posts() ) : ?>
				<?php while ( $maxim_gallery_query->have_posts() ) : $maxim_gallery_query->the_post(); ?>

					<div class="gallery-post">
						<h1><?php the_title(); ?></h1>
						<?php the_content(); ?>
						<?php
							$images = get_children( array (
								'post_parent' => $post->ID,
								'post_type' => 'attachment',
								'post_mime_type' => 'image'
							));
							echo '<div class="gallery-item">';
							foreach ( $images as $attachment_id => $attachment ) {
								echo '<a class="fancybox" href="' . wp_get_attachment_url($attachment_id) . '" data-fancybox-group="gallery'.get_the_ID().'">';
								echo wp_get_attachment_image( $attachment_id, 'thumbnail' );
								echo '</a>';
							};
							echo '</div>';
						?>
					</div>

				<?php endwhile; ?>			
				<?php wp_reset_postdata();
			else:
				get_template_part( 'content', 'none' );
			endif; ?>
		</div>
		<?php silver_pagination($maxim_gallery_query->max_num_pages, $range = 2); ?>
	</main>
</div>

<?php get_footer(); ?>