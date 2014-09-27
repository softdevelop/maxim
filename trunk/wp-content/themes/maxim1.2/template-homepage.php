<?php

/* Template Name: Home */

get_header(); ?>

<div id="content" class="site-content">
	<main id="main" class="site-main" role="main">
		<?php $maxim_homepage_layout = ot_get_option('homepage-layout') ? ot_get_option('homepage-layout') : 'default'; ?>
		<div id="homepage" class="clearfix <?php echo $maxim_homepage_layout ?>">
			
			<?php
			switch ($maxim_homepage_layout) {
				case 'six_boxes_no_news': ?>
					<div>
						<?php maxim_homepage_boxes('one'); ?>
						<?php maxim_homepage_boxes('two'); ?>
					</div>
					<div>
						<?php maxim_homepage_boxes('three'); ?>
						<?php maxim_homepage_boxes('four'); ?>
					</div>
					<div>
						<?php maxim_homepage_boxes('five'); ?>
						<?php maxim_homepage_boxes('six'); ?>
					</div><?php
					break;
				case 'six_boxes_no_news_second_style': ?>
					<div>
						<?php maxim_homepage_boxes('one'); ?>
						<?php maxim_homepage_boxes('two'); ?>
					</div>
					<div>
						<?php maxim_homepage_boxes('three'); ?>
						<?php maxim_homepage_boxes('four'); ?>
					</div>
					<div>
						<?php maxim_homepage_boxes('five'); ?>
						<?php maxim_homepage_boxes('six'); ?>
					</div><?php
					break;
				case 'huge_left_two_big_right_no_news': ?>
					<div>
						<?php maxim_homepage_boxes('one'); ?>
					</div>
					<div>
						<?php maxim_homepage_boxes('two'); ?>
						<?php maxim_homepage_boxes('three'); ?>
					</div><?php
					break;
				case 'big_top_two_medium_bottom': ?>
					<div>
						<?php maxim_homepage_boxes('one'); ?>
						<?php maxim_homepage_boxes('two'); ?>
						<?php maxim_homepage_boxes('three'); ?>
					</div><?php
					maxim_homepage_posts();
					break;
				case 'big_bottom_two_medium_top': ?>
					<div>
						<?php maxim_homepage_boxes('one'); ?>
						<?php maxim_homepage_boxes('two'); ?>
						<?php maxim_homepage_boxes('three'); ?>
					</div><?php
					maxim_homepage_posts();
					break;
				case 'three_vertical_boxes_no_news': ?>
					<div>
						<?php maxim_homepage_boxes('one'); ?>
						<?php maxim_homepage_boxes('two'); ?>
						<?php maxim_homepage_boxes('three'); ?>
					</div><?php
					break;
				case 'big_box_right_three_medium_left': ?>
					<div>
						<?php maxim_homepage_boxes('one'); ?>
						<?php maxim_homepage_boxes('two'); ?>
						<?php maxim_homepage_boxes('three'); ?>
					</div>
					<div>
						<?php maxim_homepage_boxes('four'); ?>
					</div><?php
					maxim_homepage_posts();
					break;
				case 'two_big_boxes_right_three_medium_left': ?>
					<div>
						<?php maxim_homepage_boxes('one'); ?>
						<?php maxim_homepage_boxes('two'); ?>
						<?php maxim_homepage_boxes('three'); ?>
					</div>
					<div>
						<?php maxim_homepage_boxes('four'); ?>
						<?php maxim_homepage_boxes('five'); ?>
					</div><?php
					maxim_homepage_posts();
					break;
				case 'two_left_unequal_two_right_square': ?>
					<div>
						<?php maxim_homepage_boxes('one'); ?>
						<?php maxim_homepage_boxes('two'); ?>
					</div>
					<div>
						<?php maxim_homepage_boxes('three'); ?>
						<?php maxim_homepage_boxes('four'); ?>
					</div><?php
					maxim_homepage_posts();
					break;
				case 'big_right_two_medium_left': ?>
					<div>
						<?php maxim_homepage_boxes('one'); ?>
						<?php maxim_homepage_boxes('two'); ?>
					</div>
					<div>
						<?php maxim_homepage_boxes('three'); ?>
					</div><?php
					maxim_homepage_posts();
					break;
				case 'five_boxes_no_news': ?>
					<div>
						<?php maxim_homepage_boxes('one'); ?>
						<?php maxim_homepage_boxes('two'); ?>
						<?php maxim_homepage_boxes('three'); ?>
					</div>
					<div>
						<?php maxim_homepage_boxes('four'); ?>
						<?php maxim_homepage_boxes('five'); ?>
					</div><?php
					break;
				case 'one_big_four_medium_no_news': ?>
					<div>
						<?php maxim_homepage_boxes('one'); ?>
						<?php maxim_homepage_boxes('two'); ?>
					</div>
					<div>
						<?php maxim_homepage_boxes('three'); ?>
					</div>
					<div>
						<?php maxim_homepage_boxes('four'); ?>
						<?php maxim_homepage_boxes('five'); ?>
					</div><?php
					break;
				case 'one_big_box': ?>
					<div>
						<?php maxim_homepage_boxes('one'); ?>
					</div><?php
					maxim_homepage_posts();
					break;
				case 'four_equal': ?>
					<div>
						<?php maxim_homepage_boxes('one'); ?>
						<?php maxim_homepage_boxes('two'); ?>
					</div>
					<div>
						<?php maxim_homepage_boxes('three'); ?>
						<?php maxim_homepage_boxes('four'); ?>
					</div><?php
					maxim_homepage_posts();
					break;
				case 'big_left_two_medium_right': ?>
					<div>
						<?php maxim_homepage_boxes('one'); ?>
					</div>
					<div>
						<?php maxim_homepage_boxes('two'); ?>
						<?php maxim_homepage_boxes('three'); ?>
					</div><?php
					maxim_homepage_posts();
					break;
				case 'default_sidebar_left': 
					maxim_homepage_posts(); ?>
					<div>
						<?php maxim_homepage_boxes('one'); ?>
						<?php maxim_homepage_boxes('two'); ?>
					</div>
					<div>
						<?php maxim_homepage_boxes('three'); ?>
						<?php maxim_homepage_boxes('four'); ?>
					</div><?php
					break;
				default: ?>
					<div>
						<?php maxim_homepage_boxes('one'); ?>
						<?php maxim_homepage_boxes('two'); ?>
					</div>
					<div>
						<?php maxim_homepage_boxes('three'); ?>
						<?php maxim_homepage_boxes('four'); ?>
					</div><?php 
					maxim_homepage_posts();
			};
			?>
			
			
		</div>
	</main>
</div>

<?php get_footer(); ?>
