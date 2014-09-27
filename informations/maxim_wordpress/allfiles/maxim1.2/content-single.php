<?php 

$maxim_page_layout = get_post_meta( get_the_ID( ), 'inner-page-layout', true ) ? get_post_meta( get_the_ID( ), 'inner-page-layout', true ) : 'default';

switch ($maxim_page_layout) {
	case 'fixed_height': ?>
		<div id="std-page" class="page the-page page-inner-image">
			<div class="title-meta">
				<h1><?php the_title(); ?></h1>
				<?php maxim_blog_single_span_class_meta(); ?>
			</div>
			<?php if(has_post_thumbnail()) the_post_thumbnail('page_with_margin', array('class' => "inner-page-image")); ?>
			<div class="page-nice-scroll">
				<?php maxim_blog_single_content_pages_comments(); ?>
			</div>
		</div><?php
		break;
	case 'inner_featured': ?>
		<div id="std-page" class="page the-page page-inner-image">
			<div class="title-meta">
				<h1><?php the_title(); ?></h1>
				<?php maxim_blog_single_span_class_meta(); ?>
			</div>
			<?php if(has_post_thumbnail()) the_post_thumbnail('page_with_margin', array('class' => "inner-page-image")); ?>
			<?php maxim_blog_single_content_pages_comments(); ?>
		</div><?php
		break;
	case 'left_sidebar': ?>
		<div id="std-page" class="page the-page page-inner-image page-w-sidebar page-w-sidebar-l">
			<div class="title-meta">
				<h1><?php the_title(); ?></h1>
			<?php maxim_blog_single_span_class_meta(); ?>
			</div>
			<?php if(has_post_thumbnail()) the_post_thumbnail('page_with_margin', array('class' => "inner-page-image")); ?>
			<?php maxim_blog_single_content_pages_comments(); ?>
		</div>
		<?php get_sidebar();
		break;
	case 'right_sidebar': ?>
		<div id="std-page" class="page the-page page-inner-image page-w-sidebar">
			<div class="title-meta">
				<h1><?php the_title(); ?></h1>
				<?php maxim_blog_single_span_class_meta(); ?>
			</div>
			<?php if(has_post_thumbnail()) the_post_thumbnail('page_with_margin', array('class' => "inner-page-image")); ?>
			<?php maxim_blog_single_content_pages_comments(); ?>
		</div>
		<?php get_sidebar();
		break;
	default: ?>
		<?php 
		$silver_blog_image_items = get_post_meta( get_the_ID(), 'blog_images', true );
		if($silver_blog_image_items) { 
			echo '
			<div id="blog-image-slider" class="flexslider">
				<ul class="blog-image-items slides">';
					foreach($silver_blog_image_items as $item) {
					 echo '<li><img src="'.$item['blog_image'].'" /></li>';
					}
			echo '
				</ul>
			</div>'; 
		} else if(get_post_meta( get_the_ID(), 'soundcloud-sound', true )) { echo '<iframe style="vertical-align: middle;" width="100%" height="450" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/'.get_post_meta( get_the_ID(), 'soundcloud-sound', true ).'&amp;auto_play=false&amp;hide_related=false&amp;visual=true"></iframe>'; } else if(get_post_meta( get_the_ID(), 'vimeo-video', true )) { echo '<iframe style="vertical-align: middle;" src="//player.vimeo.com/video/'.get_post_meta( get_the_ID(), 'vimeo-video', true ).'?title=0&amp;byline=0&amp;portrait=0&amp;badge=0" width="1000" height="562" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>'; } else if(get_post_meta( get_the_ID(), 'youtube-video', true )) { echo '<iframe style="vertical-align: middle;" width="1000" height="563" src="//www.youtube.com/embed/'.get_post_meta( get_the_ID(), 'youtube-video', true ).'?rel=0" frameborder="0" allowfullscreen></iframe>'; } else if(has_post_thumbnail()) the_post_thumbnail('page_without_margin', array('class' => "no-margin-page-image")); ?>
		<div id="std-page" class="page the-page">
			<div class="title-meta">
				<h1><?php the_title(); ?></h1>
				<?php maxim_blog_single_span_class_meta(); ?>
			</div>
			<?php maxim_blog_single_content_pages_comments(); ?>
		</div><?php
}

?>