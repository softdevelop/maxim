<?php

/* Template Name: Clients */

get_header(); ?>

<div id="content" class="site-content">
	<main id="main" class="site-main" role="main">
		<div id="clients">
			<div class="clients-list">
				<?php 
				$items = ot_get_option('clients_items') ? ot_get_option('clients_items') : 6;
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$args = array(
					'post_type' => 'maxim_clients',
					'paged' => $paged,
					'posts_per_page' => $items
				);
				$maxim_clients_query = new WP_Query($args);
				if ( $maxim_clients_query->have_posts() ) : ?>
					<ul>
					<?php while ( $maxim_clients_query->have_posts() ) : $maxim_clients_query->the_post(); ?>
						<li><a class="p666666 transition hover-color" href="#"><?php the_title(); ?></a></li>
					<?php endwhile; ?>
					</ul>
					<?php wp_reset_postdata();
				endif;
				silver_pagination($maxim_clients_query->max_num_pages, $range = 2); ?>
			</div>
			<?php
			if ( $maxim_clients_query->have_posts() ) : ?>
			
				<ul class="clients">
				
				<?php while ( $maxim_clients_query->have_posts() ) : $maxim_clients_query->the_post(); ?>
					
					<li>
					<?php if(has_post_thumbnail()) the_post_thumbnail('clients'); else { ?>
						<img src="<?php echo get_template_directory_uri(); ?>/images/clients.png" />
					<?php }; ?>
					<h1><?php the_title(); ?></h1>
					<p><?php echo limit_words(get_the_content(), 30); ?></p>
					<a class="read-more transition hover-color" href="<?php the_permalink(); ?>"><?php echo ot_get_option('more-link'); ?></a>
					</li>
					
				<?php endwhile; ?>
					
				</ul>

				<?php wp_reset_postdata();

			else:
				get_template_part( 'content', 'none' );
			endif; ?>
		</div>
	</main>
</div>

<?php get_footer(); ?>