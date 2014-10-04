<?php get_header(); ?>

<?php maxim_blog_search_layout(); ?>

<div id="content_page" class="site-content">

	<main id="main" class="site-main" role="main">
		<div id="blog" class="<?php echo $maxim_blog_layout; ?>">
			
			<?php if( have_posts() ) : ?>
				<?php if(ot_get_option('blog-page-title')) { ?>
					<div class="page-title-div">
						<h1 class="page-title"><?php echo ot_get_option('blog-page-title'); ?></h1>
					</div>
				<?php }; ?>
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