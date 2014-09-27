<?php get_header(); ?>

<div id="content" class="site-content">
	<main id="main" class="site-main clearfix" role="main">
		
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'page' ); ?>
		
		<?php endwhile; ?>
		
	</main>
</div>

<?php get_footer(); ?>
