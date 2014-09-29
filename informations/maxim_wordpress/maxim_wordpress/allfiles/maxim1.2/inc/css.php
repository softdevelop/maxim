<?php
function custom_styles() {
$main_color = ot_get_option('site_color');
$megamenus = ot_get_option('megamenus');
?>

<style>

<?php 
	if($megamenus) {
		$i = 1;
		foreach($megamenus as $megamenu_image) {
			echo '.main-menu ul li.mega-menu.mega-menu'.$i.' > ul.sub-menu { background: #f6f6f6 url('.$megamenu_image['megamenu_img'].') bottom right no-repeat; }';
			$i++;
		}
	};
?>

a.hover-color:hover,
.clients-list > ul > li a.active,
p.form-submit input:hover,
.navigation.post-navigation a:hover,
.main-menu ul.sub-menu li a:hover,
.main-menu ul li ul li.current-menu-item a,
.sticky-wrapper #secondary-menu-container .main-menu ul li ul.sub-menu li.current-menu-item a,
.sticky-wrapper #secondary-menu-container .main-menu ul li ul.sub-menu li a:hover,
#sidebar ul li .widget .tagcloud a:hover,
span.post-tags a:hover
{ color: <?php echo $main_color; ?>; }

<?php echo ot_get_option('custom_css'); ?>

</style>

<?php }
add_action('wp_head', 'custom_styles', 22);
?>