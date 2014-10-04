<?php

/* Template Name: Work */

get_header(); ?>

<div id="content_page" class="site-content">
	<main id="main" class="site-main" role="main">
		<div id="work">
			<?php 
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$args = array(
				'post_type' => 'maxim_work',
				'paged' => $paged,
				'posts_per_page' => 3
			);
			$maxim_work_query = new WP_Query($args);
			if ( $maxim_work_query->have_posts() ) : ?>
			
				<?php $maxim_work_layout = ot_get_option('work-layout') ? ot_get_option('work-layout') : 'default'; ?>
				<ul class="<?php echo $maxim_work_layout; ?>">
				
				<?php while ( $maxim_work_query->have_posts() ) : $maxim_work_query->the_post(); ?>
				
					<li>
						<div>
							<div class="b000">
								<?php if(get_post_meta( get_the_ID( ), 'work-image', true )) echo '<img class="work-image grayscale" src="'.get_post_meta( get_the_ID( ), 'work-image', true ).'" />'; elseif(has_post_thumbnail()) the_post_thumbnail('work', array('class' => "grayscale")); else { ?>
									<img class="grayscale" src="<?php echo get_template_directory_uri(); ?>/images/work.png" />
								<?php }; ?>
								<div class="hover-bg"></div>
							</div>
							<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
							<p><?php echo limit_words(get_the_content(), 20); ?></p>
							<a class="read-more transition hover-color" href="<?php the_permalink(); ?>"><?php echo ot_get_option('more-link'); ?></a>
						</div>
					</li>
					
				<?php endwhile; ?>
					
				</ul>
			
				<?php wp_reset_postdata();

			else:
				get_template_part( 'content', 'none' );
			endif; ?>
		</div>
		<?php silver_pagination($maxim_work_query->max_num_pages, $range = 2); ?>
	</main>
</div>

<?php get_footer(); ?>