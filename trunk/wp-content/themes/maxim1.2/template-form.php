<?php

/* Template Name: Form */

get_header();?>

<div id="content_page" class="site-content">
	<main id="main_form" class="site-main clearfix" role="main">
		
		<?php

			switch ($_GET['type']) {
				case 'prenup':
					get_template_part( 'content', 'prenup-form' );
					break;
				
				default:
					# code...
					break;
			}

		?>
		
	</main>
</div>

<?php get_footer(); ?>
