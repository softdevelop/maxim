<?php
function custom_scripts() {
?>

<?php
if ( is_admin_bar_showing() ) { $top = 32; } else { $top = 0; };
echo "
<script>
jQuery(document).ready(function($) {
	
	
	/* quote slider */
	$('#quote-slider').flexslider({
		directionNav   : false,
		controlNav     : true,
		animation      : 'fade',
		slideshowSpeed : 7000
	});
	
	$('#blog-image-slider').flexslider({
		directionNav   : true,
		controlNav     : false,
		animation      : 'fade',
		slideshowSpeed : 7000
	});

});
</script>";  ?>

<?php }
add_action('wp_footer', 'custom_scripts', 21);
?>