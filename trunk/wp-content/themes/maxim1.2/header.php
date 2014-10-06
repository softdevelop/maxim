<?php session_start(); ?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html <?php language_attributes(); ?>> <!--<![endif]-->
<head>

<!-- Basic Page Needs
================================================== -->
<meta charset="<?php bloginfo( 'charset' ); ?>">

<title><?php wp_title( '|', true, 'right' ); ?></title>

<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php if(ot_get_option('description')) { ?><meta name="description" content="<?php echo ot_get_option('description'); ?>"><?php }; ?>
<?php if(ot_get_option('author')) { ?><meta name="author" content="<?php echo ot_get_option('author'); ?>"><?php }; ?>

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!-- Favicons
================================================== -->
<?php if(ot_get_option('favicon')) { ?><link rel="shortcut icon" href="<?php echo ot_get_option('favicon'); ?>"><?php }; ?>
<?php if(ot_get_option('apple_icon')) { ?><link rel="apple-touch-icon" href="<?php echo ot_get_option('apple_icon'); ?>"><?php }; ?>
<?php if(ot_get_option('apple_icon72')) { ?><link rel="apple-touch-icon" sizes="72x72" href="<?php echo ot_get_option('apple_icon72'); ?>"><?php }; ?>
<?php if(ot_get_option('apple_icon114')) { ?><link rel="apple-touch-icon" sizes="114x114" href="<?php echo ot_get_option('apple_icon114'); ?>"><?php }; ?>
	
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,300' rel='stylesheet' type='text/css'>

<?php wp_head(); ?>

</head>
<body <?php body_class(); ?> ng-app="myApp" ng-controller="MainCtrl">
<!-- <div class="loader"></div> -->
<?php maxim_set_background(); ?>

<div id="page">
	<header id="header">
		<?php if(ot_get_option('logo')) { ?>
			<div id="logo">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<img src="<?php echo ot_get_option('logo'); ?>" />
				</a>
			</div>
		<?php }; ?>
		
		<?php maxim_set_quote_slider(); ?>
		
		<div id="main-menu" class="main-menu"><?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false ) ); ?></div>
		<?php if(ot_get_option('sticky-logo')) { ?>
			<div id="secondary-menu-container">
				<div id="secondary-menu" class="main-menu">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="sticky-logo" src="<?php echo ot_get_option('sticky-logo'); ?>" /></a>
					<img class="mobile-menu" src="<?php echo get_template_directory_uri(); ?>/images/mobile-menu.png" />
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false ) ); ?>
				</div>
			</div>
		<?php }; ?>
	</header>
	<div class="message message-success">
		<?php 
			echo "data saved";
		?>
	</div>