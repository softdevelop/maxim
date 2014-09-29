<?php 

$maxim_page_layout = get_post_meta( get_the_ID( ), 'inner-page-layout', true ) ? get_post_meta( get_the_ID( ), 'inner-page-layout', true ) : 'default';

switch ($maxim_page_layout) {
	case 'fixed_height': ?>
		<div id="std-page" class="page the-page page-inner-image">
			<div class="title-meta">
				<h1><?php the_title(); ?></h1>
				<?php maxim_page_span_class_meta(); ?>
			</div>
			<?php if(has_post_thumbnail()) the_post_thumbnail('page_with_margin', array('class' => "inner-page-image")); ?>
			<div class="page-nice-scroll">
				<?php maxim_page_content_pages_comments(); ?>
			</div>
		</div><?php
		break;
	case 'inner_featured': ?>
		<div id="std-page" class="page the-page page-inner-image">
			<div class="title-meta">
				<h1><?php the_title(); ?></h1>
				<?php maxim_page_span_class_meta(); ?>
			</div>
			<?php if(has_post_thumbnail()) the_post_thumbnail('page_with_margin', array('class' => "inner-page-image")); ?>
			<?php maxim_page_content_pages_comments(); ?>
		</div><?php
		break;
	case 'left_sidebar': ?>
		<div id="std-page" class="page the-page page-inner-image page-w-sidebar page-w-sidebar-l">
			<div class="title-meta">
				<h1><?php the_title(); ?></h1>
			<?php maxim_page_span_class_meta(); ?>
			</div>
			<?php if(has_post_thumbnail()) the_post_thumbnail('page_with_margin', array('class' => "inner-page-image")); ?>
			<?php maxim_page_content_pages_comments(); ?>
		</div>
		<?php get_sidebar();
		break;
	case 'right_sidebar': ?>
		<div id="std-page" class="page the-page page-inner-image page-w-sidebar">
			<div class="title-meta">
				<h1><?php the_title(); ?></h1>
				<?php maxim_page_span_class_meta(); ?>
			</div>
			<?php if(has_post_thumbnail()) the_post_thumbnail('page_with_margin', array('class' => "inner-page-image")); ?>
			<?php maxim_page_content_pages_comments(); ?>
		</div>
		<?php get_sidebar();
		break;
	default: ?>
		<?php if(has_post_thumbnail()) the_post_thumbnail('page_without_margin', array('class' => "no-margin-page-image")); ?>
		<div id="std-page" class="page the-page">
			<div class="title-meta">
				<h1><?php the_title(); ?></h1>
				<?php maxim_page_span_class_meta(); ?>
			</div>
			<?php maxim_page_content_pages_comments(); ?>
		</div><?php
}

?>