<?php
/**
 * Initialize the custom Meta Boxes. 
 */
add_action( 'admin_init', 'custom_meta_boxes' );

/**
 * Meta Boxes demo code.
 *
 * You can find all the available option types in demo-theme-options.php.
 *
 * @return    void
 * @since     2.0
 */
function custom_meta_boxes() {

	$maxim_work = array(
	  'id'        => 'maxim_work',
	  'title'     => 'Work page image',
	  'desc'      => '',
	  'pages'     => array( 'maxim_work' ),
	  'context'   => 'normal',
	  'priority'  => 'high',
	  'fields'    => array(
		array(
		  'id'          => 'work-image',
		  'label'       => __( 'Showcase image', 'silver' ),
		  'desc'        => __( 'Add image for the main page image section. Leave the section blank and the featured image will be used instead. The image should be 300px by 414px.', 'silver' ),
		  'std'         => '',
		  'type'        => 'upload',
		  'section'     => '',
		  'rows'        => ''
		)
	  )
    );
	if ( function_exists( 'ot_register_meta_box' ) )
      ot_register_meta_box( $maxim_work );

	$maxim_team = array(
	'id'        => 'maxim_team',
	'title'     => 'Social icons and more',
	'desc'      => '',
	'pages'     => array( 'maxim_team' ),
	'context'   => 'normal',
	'priority'  => 'high',
	'fields'    => array(
	  array(
        'id'          => 'yo-face',
        'label'       => __( 'Showcase image', 'silver' ),
        'desc'        => __( 'Add image for the main page image section. Leave the section blank and the featured image will be used instead. The image should be 196px by 196px.', 'silver' ),
        'std'         => '',
        'type'        => 'upload',
        'section'     => '',
        'rows'        => ''
      ),
	  array(
        'id'          => 'social-links',
        'label'       => __( 'Social links', 'silver' ),
        'desc'        => __( 'Add as many social icons and links as you want.', 'silver' ),
        'std'         => '',
        'type'        => 'list-item',
        'section'     => '',
        'rows'        => '',
        'settings'    => array(
		  array(
			'id'          => 'icon',
			'label'       => 'Icon',
			'desc'        => __( 'Add icon here. You can use any <a target="_blank" href="http://fortawesome.github.io/Font-Awesome/icons/">Font Awesome</a> icon here. Ex: if you want the fa-bank icon just paste here bank.', 'silver' ),
			'std'         => '',
			'type'        => 'text',
			'section'     => '',
			'rows'        => ''
		  ),
		  array(
			'id'          => 'link',
			'label'       => 'Link',
			'desc'        => __( 'Add link here.', 'silver' ),
			'std'         => '',
			'type'        => 'text',
			'section'     => '',
			'rows'        => ''
		  )
        )
      )
	)
  );
  if ( function_exists( 'ot_register_meta_box' ) )
    ot_register_meta_box( $maxim_team );

  $post_and_page = array(
	'id'        => 'post_and_page',
	'title'     => 'Layout options and more',
	'desc'      => '',
	'pages'     => array( 'post', 'page', 'maxim_work', 'maxim_team', 'maxim_clients' ),
	'context'   => 'normal',
	'priority'  => 'high',
	'fields'    => array(
	  array(
        'id'          => 'pp_bg_slider',
        'label'       => __( 'Background slider', 'silver' ),
        'desc'        => __( 'Set a background slider per page. It will override the general one. ;) Let\'s just keep this between us.', 'silver' ),
        'std'         => '',
        'type'        => 'list-item',
        'section'     => '',
        'rows'        => '',
        'settings'    => array(
		  array(
			'id'          => 'pp_bg_slider_image',
			'label'       => __( 'Upload image', 'silver' ),
			'desc'        => __( 'Upload background slider image here.', 'silver' ),
			'std'         => '',
			'type'        => 'upload',
			'rows'        => ''
		  )
        )
      ),
	  array(
        'id'          => 'inner-page-layout',
        'label'       => __( 'Layout', 'silver' ),
        'desc'        => __( 'Set the page layout here.', 'silver' ),
        'std'         => 'default',
        'type'        => 'radio',
        'section'     => '',
        'rows'        => '',
        'choices'     => array(
          array(
            'value'       => 'default',
            'label'       => __( 'Default', 'silver' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'inner_featured',
            'label'       => __( 'Inner Featured Image', 'silver' ),
            'src'         => ''
          ),
          array(
            'value'       => 'fixed_height',
            'label'       => __( 'Fixed Height Page', 'silver' ),
            'src'         => ''
          ),
          array(
            'value'       => 'left_sidebar',
            'label'       => __( 'Left Sidebar', 'silver' ),
            'src'         => ''
          ),
          array(
            'value'       => 'right_sidebar',
            'label'       => __( 'Right Sidebar', 'silver' ),
            'src'         => ''
          )
        )
      )
	)
  );
  if ( function_exists( 'ot_register_meta_box' ) )
    ot_register_meta_box( $post_and_page );
	
  $post = array(
	'id'        => 'post',
	'title'     => 'Post types',
	'desc'      => '',
	'pages'     => array( 'post' ),
	'context'   => 'normal',
	'priority'  => 'high',
	'fields'    => array(
	  array(
        'id'          => 'blog_images',
        'label'       => __( 'Gallery post type', 'silver' ),
        'desc'        => __( 'Add images for the gallery post type.', 'silver' ),
        'std'         => '',
        'type'        => 'list-item',
        'section'     => '',
        'rows'        => '',
        'settings'    => array(
		  array(
			'id'          => 'blog_image',
			'label'       => __( 'Upload image', 'silver' ),
			'desc'        => __( 'Upload image here.', 'silver' ),
			'std'         => '',
			'type'        => 'upload',
			'rows'        => ''
		  )
        )
      ),
	  array(
		'id'          => 'soundcloud-sound',
		'label'       => 'Soundcloud',
		'desc'        => __( 'Add soundcloud track id here.', 'silver' ),
		'std'         => '',
		'type'        => 'text',
		'section'     => '',
		'rows'        => ''
	  ),
	  array(
		'id'          => 'vimeo-video',
		'label'       => 'Vimeo Video',
		'desc'        => __( 'Add vimeo video id here.', 'silver' ),
		'std'         => '',
		'type'        => 'text',
		'section'     => '',
		'rows'        => ''
	  ),
	  array(
		'id'          => 'youtube-video',
		'label'       => 'Youtube Video',
		'desc'        => __( 'Add youtube video id here.', 'silver' ),
		'std'         => '',
		'type'        => 'text',
		'section'     => '',
		'rows'        => ''
	  )
	)
  );
  if ( function_exists( 'ot_register_meta_box' ) )
    ot_register_meta_box( $post );

}