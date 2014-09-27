<?php get_header(); ?>

<?php maxim_blog_search_layout(); ?>

<div id="content" class="site-content">

	<main id="main" class="site-main" role="main">
		<div id="blog" class="<?php echo $maxim_blog_layout; ?>">
			
			<?php if( have_posts() ) : ?>
				<div class="page-title-div">
					<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'silver' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				</div>
				<ul>
				
				<?php while( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'search' ); ?>

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
