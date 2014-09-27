<li>
	<article id="post-<?php the_ID(); ?>" <?php post_class('transition'); ?>>
		<div class="b000">
			<?php if(has_post_thumbnail()) the_post_thumbnail('blog', array('class' => "grayscale")); else { ?>
				<img class="grayscale" src="<?php echo get_template_directory_uri(); ?>/images/blog.png" />
			<?php }; ?>
		</div>
		<div>
			<div class="title-meta">
				<h1><a class="p323232 transition hover-color" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
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
			</div>
			<p><?php echo limit_words(get_the_excerpt(), ot_get_option('excerpt-length')); ?>&nbsp;&hellip;</p>
			<a class="read-more transition hover-color" href="<?php the_permalink(); ?>"><?php echo ot_get_option('more-link'); ?></a>
		</div>
	</article>
</li>