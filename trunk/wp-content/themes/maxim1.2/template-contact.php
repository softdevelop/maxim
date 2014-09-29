<?php

/* Template Name: Contact */

get_header(); ?>

<div id="content" class="site-content">
	<main id="main" class="site-main clearfix" role="main">
		
		<?php while ( have_posts() ) : the_post(); ?>

			<div id="std-page" class="page the-page page-inner-image">
				<div class="title-meta">
					<h1><?php the_title(); ?></h1>
				</div>
				<div class="contact-container">
					<div class="half">
						<?php
							$script = get_template_directory_uri() . '/js/jquery.gmap.min.js';
							$address = ot_get_option('map_address') != "" ? ot_get_option('map_address') : 'New York, United States, Flushing Ave';
							$desc = ot_get_option('map_desc') != "" ? ot_get_option('map_desc') : 'This is the map description.';
							
							
							
							$output = '
							
								<!-- Google Maps -->
								<div id="googlemaps" class="google-map google-map-full" style="height: 425px;"></div>

								<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
								<script src="'.$script.'"></script>
							
								<script type="text/javascript">
									jQuery("#googlemaps").gMap({
										maptype: "ROADMAP",
										scrollwheel: true,
										zoom: 15,
										markers: [
											{
												address: "'.$address.'", // Your Adress Here
												html: "'.$desc.'",
												popup: true,
											}

										],
										
									});
								</script>';

							echo $output;
						?>
					</div>
					<div class="half">
						<!-- <h3><?php _e('Send us a message:', 'silver'); ?></h3> -->
						<?php $cform = ot_get_option('cform'); if($cform) echo do_shortcode($cform); ?>
					</div>

					<div class="full">
						<ul>
						<?php 
						$silver_marker = ot_get_option('marker');
						$silver_briefcase = ot_get_option('briefcase');
						$silver_envelope = ot_get_option('envelope');
						$silver_phone = ot_get_option('phone');
						if($silver_marker) { $silver_marker = explode("\n", $silver_marker); echo '<li><i class="fa fa-'.$silver_marker[0].'"></i><p>'.$silver_marker[1].'</p></li>'; };
						if($silver_briefcase) { $silver_briefcase = explode("\n", $silver_briefcase); echo '<li><i class="fa fa-'.$silver_briefcase[0].'"></i><p>'.$silver_briefcase[1].'</p></li>'; };
						if($silver_envelope) { $silver_envelope = explode("\n", $silver_envelope); echo '<li><i class="fa fa-'.$silver_envelope[0].'"></i><p>'.$silver_envelope[1].'</p></li>'; };
						if($silver_phone) { $silver_phone = explode("\n", $silver_phone); echo '<li><i class="fa fa-'.$silver_phone[0].'"></i><p>'.$silver_phone[1].'</p></li>'; };
						?>
						</ul>
					</div>
				</div>
			</div>
		
		<?php endwhile; ?>
		
	</main>
</div>

<?php get_footer(); ?>
