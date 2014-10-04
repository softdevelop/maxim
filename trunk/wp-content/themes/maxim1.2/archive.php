<?php get_header(); ?>

<?php maxim_blog_search_layout(); ?>

<div id="content_page" class="site-content">

	<main id="main" class="site-main" role="main">
		<div id="blog" class="<?php echo $maxim_blog_layout; ?>">
			
			<?php if( have_posts() ) : ?>
				<div class="page-title-div">
					<h1 class="page-title">
						<?php
							if ( is_category() ) :
								single_cat_title();

							elseif ( is_tag() ) :
								single_tag_title();

							elseif ( is_author() ) :
								printf( __( 'Author: %s', 'silver' ), '<span class="vcard">' . get_the_author() . '</span>' );

							elseif ( is_day() ) :
								printf( __( 'Day: %s', 'silver' ), '<span>' . get_the_date() . '</span>' );

							elseif ( is_month() ) :
								printf( __( 'Month: %s', 'silver' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'silver' ) ) . '</span>' );

							elseif ( is_year() ) :
								printf( __( 'Year: %s', 'silver' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'silver' ) ) . '</span>' );

							elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
								_e( 'Asides', 'silver' );

							elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
								_e( 'Galleries', 'silver');

							elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
								_e( 'Images', 'silver');

							elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
								_e( 'Videos', 'silver' );

							elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
								_e( 'Quotes', 'silver' );

							elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
								_e( 'Links', 'silver' );

							elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
								_e( 'Statuses', 'silver' );

							elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
								_e( 'Audios', 'silver' );

							elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
								_e( 'Chats', 'silver' );

							else :
								_e( 'Archives', 'silver' );

							endif;
						?>
					</h1>
					<?php
						// Show an optional term description.
						$term_description = term_description();
						if ( ! empty( $term_description ) ) :
							printf( '<div class="taxonomy-description">%s</div>', $term_description );
						endif;
					?>
				</div>
				<ul>
				
				<?php while( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', get_post_format() ); ?>

				<?php endwhile; ?>

				</ul>
			<?php else : ?>

				<?php get_template_part( 'content', 'none' ); ?>

			<?php endif; ?>

			<?php if($maxim_blog_layout == 'simple-blog w_sidebar clearfix') get_sidebar(); ?>
		</div>

		<?php silver_pagination(); ?>

	</main>
</div>

<?php get_footer(); ?>