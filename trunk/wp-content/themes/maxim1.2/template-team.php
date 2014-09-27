<?php

/* Template Name: Team */

get_header(); ?>

<div id="content" class="site-content">
	<main id="main" class="site-main" role="main">
		<div id="team">
			<?php 
			$items = ot_get_option('team_items') ? ot_get_option('team_items') : 6;
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$args = array(
				'post_type' => 'maxim_team',
				'paged' => $paged,
				'posts_per_page' => $items
			);
			$maxim_team_query = new WP_Query($args);
			if ( $maxim_team_query->have_posts() ) : ?>
			
				<ul>
				
				<?php while ( $maxim_team_query->have_posts() ) : $maxim_team_query->the_post(); ?>

					<li>
						<div class="b000">
							<?php if(get_post_meta( get_the_ID( ), 'yo-face', true )) echo '<img class="yo-face grayscale" src="'.get_post_meta( get_the_ID( ), 'yo-face', true ).'" />'; elseif(has_post_thumbnail()) the_post_thumbnail('blog', array('class' => "grayscale")); else { ?>
								<img class="grayscale" src="<?php echo get_template_directory_uri(); ?>/images/blog.png" />
							<?php }; ?>
						</div>
						<h1><a class="p181818 transition hover-color" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
						<p><?php echo limit_words(get_the_content(), 25); ?></p>
						<a class="read-more transition hover-color" href="<?php the_permalink(); ?>"><?php echo ot_get_option('more-link'); ?></a>
						<?php
						$links = get_post_meta( get_the_ID( ), 'social-links', true );
						if($links) {
							echo '<ul class="social">';
							foreach($links as $link) {
								echo '<li><a class="p323232 transition hover-color" href="'.$link['link'].'"><i class="fa fa-'.$link['icon'].'"></i></a></li>';
							}
							echo '</ul>';
						};
						?>
					</li>

				<?php endwhile; ?>
					
				</ul>
			
				<?php wp_reset_postdata();

			else:
				get_template_part( 'content', 'none' );
			endif; ?>
		</div>
		<?php silver_pagination($maxim_team_query->max_num_pages, $range = 2); ?>
	</main>
</div>

<?php get_footer(); ?>