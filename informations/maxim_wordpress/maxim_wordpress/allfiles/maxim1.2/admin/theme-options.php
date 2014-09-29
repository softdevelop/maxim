<?php
/**
 * Initialize the custom Theme Options.
 */
add_action( 'admin_init', 'custom_theme_options' );

/**
 * Build the custom settings & update OptionTree.
 *
 * @return    void
 * @since     2.0
 */
function custom_theme_options() {
  
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( ot_settings_id(), array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  $custom_settings = array(
    'sections'        => array(
	  array(
        'id'          => 'general',
        'title'       => __( 'General', 'silver' )
      ),
	  array(
        'id'          => 'homepage',
        'title'       => __( 'Homepage', 'silver' )
      ),
	  array(
        'id'          => 'contact',
        'title'       => __( 'Contact', 'silver' )
      ),
	  array(
        'id'          => 'twitter',
        'title'       => __( 'Twitter', 'silver' )
      )
    ),
    'settings'        => array(

	  array(
        'id'          => 'textblock_ad',
        'label'       => __( 'Site author and description', 'silver' ),
        'desc'        => __( 'Add site author and description below for SEO.', 'silver' ),
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'general',
        'rows'        => ''
      ),
	  array(
        'id'          => 'author',
        'label'       => '',
        'desc'        => __( 'Add site author. This will be added to the site\'s head for SEO.', 'silver' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'general',
        'rows'        => ''
      ),
	  array(
        'id'          => 'description',
        'label'       => '',
        'desc'        => __( 'Add site description. This will be added to the site\'s head for SEO.', 'silver' ),
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'general',
        'rows'        => '2'
      ),
	  
	  array(
        'id'          => 'textblock_icons',
        'label'       => __( 'Add site head icons', 'silver' ),
        'desc'        => __( 'Add site favicon and apple touch icons.', 'silver' ),
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'general',
        'rows'        => ''
      ),
	  array(
        'id'          => 'favicon',
		'label'       => '',
        'desc'        => __( 'Upload favicon here.', 'silver' ),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general',
        'rows'        => ''
      ),
	  array(
        'id'          => 'apple_icon',
		'label'       => '',
        'desc'        => __( 'Upload apple icon here.', 'silver' ),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general',
        'rows'        => ''
      ),
	  array(
        'id'          => 'apple_icon72',
		'label'       => '',
        'desc'        => __( 'Upload 72px apple icon here.', 'silver' ),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general',
        'rows'        => ''
      ),
	  array(
        'id'          => 'apple_icon114',
		'label'       => '',
        'desc'        => __( 'Upload 114px apple icon here.', 'silver' ),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general',
        'rows'        => ''
      ),
	  
	  array(
        'id'          => 'megamenus',
        'label'       => __( 'Megamenus images', 'silver' ),
        'desc'        => __( 'Add as many megamenu images as you want.', 'silver' ),
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'general',
        'rows'        => '',
        'settings'    => array(
		  array(
			'id'          => 'megamenu_img',
			'label'       => __( 'Upload image', 'silver' ),
			'desc'        => __( 'Upload megamenu image here.', 'silver' ),
			'std'         => '',
			'type'        => 'upload',
			'rows'        => ''
		  )
        )
      ),
	  
	  array(
        'id'          => 'bg_slider',
        'label'       => __( 'Background slider', 'silver' ),
        'desc'        => __( 'Set the site\'s background slider here.', 'silver' ),
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'general',
        'rows'        => '',
        'settings'    => array(
		  array(
			'id'          => 'bg_slider_image',
			'label'       => __( 'Upload image', 'silver' ),
			'desc'        => __( 'Upload background slider image here.', 'silver' ),
			'std'         => '',
			'type'        => 'upload',
			'rows'        => ''
		  )
        )
      ),
	  
	  array(
        'id'          => 'logo',
        'label'       => __( 'Logo', 'silver' ),
        'desc'        => __( 'Upload the site logo here.', 'silver' ),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general',
        'rows'        => ''
      ),
	  array(
        'id'          => 'sticky-logo',
        'label'       => __( 'Sticky menu logo', 'silver' ),
        'desc'        => __( 'Upload a second site logo here. If left empty, the sticky logo and menu won\'t show up.', 'silver' ),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general',
        'rows'        => ''
      ),
	  
	  array(
        'id'          => 'quote-slider',
        'label'       => __( 'Text slider', 'silver' ),
        'desc'        => __( 'Set the site\'s text slider here.', 'silver' ),
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'general',
        'rows'        => '',
        'settings'    => array(
		  array(
			'id'          => 'quote-slider-item',
			'label'       => __( 'Add text', 'silver' ),
			'desc'        => __( 'Add quote slide text here.', 'silver' ),
			'std'         => '',
			'type'        => 'textarea-simple',
			'rows'        => '2'
		  )
        )
      ),
	  
	  array(
        'id'          => 'footer_position',
        'label'       => __( 'Footer position', 'silver' ),
        'desc'        => __( 'Set the footer position. default is left aligned.', 'silver' ),
        'std'         => 'default',
        'type'        => 'radio',
        'section'     => 'general',
        'rows'        => '',
        'choices'     => array( 
          array(
            'value'       => 'footer-default',
            'label'       => __( 'Default', 'silver' ),
            'src'         => ''
          ),
          array(
            'value'       => 'footer-right',
            'label'       => __( 'Right aligned', 'silver' ),
            'src'         => ''
          )
        )
      ),
	  
	  array(
        'id'          => 'show_tags',
        'label'       => __( 'Single page tags', 'silver' ),
        'desc'        => __( 'Show or hide single blog page tags.', 'silver' ),
        'std'         => 'tags-show',
        'type'        => 'radio',
        'section'     => 'general',
        'rows'        => '',
        'choices'     => array( 
          array(
            'value'       => 'tags-show',
            'label'       => __( 'Show tags', 'silver' ),
            'src'         => ''
          ),
          array(
            'value'       => 'tags-hide',
            'label'       => __( 'Hide tags', 'silver' ),
            'src'         => ''
          )
        )
      ),
	  
	  array(
        'id'          => 'footer',
        'label'       => __( 'Set footer', 'silver' ),
        'desc'        => __( 'Add footer text here.', 'silver' ),
        'std'         => 'This beautiful theme is brought to you by Bebel from ThemeForest.',
        'type'        => 'textarea-simple',
        'section'     => 'general',
        'rows'        => '2'
      ),

	  array(
        'id'          => 'blog-layout',
        'label'       => __( 'Blog layout', 'silver' ),
        'desc'        => __( 'Set the blog layout here.', 'silver' ),
        'std'         => 'default',
        'type'        => 'radio',
        'section'     => 'general',
        'rows'        => '',
        'choices'     => array( 
          array(
            'value'       => 'default',
            'label'       => __( 'Default', 'silver' ),
            'src'         => ''
          ),
          array(
            'value'       => 'no_sidebar',
            'label'       => __( 'No Sidebar', 'silver' ),
            'src'         => ''
          ),
          array(
            'value'       => 'special',
            'label'       => __( 'Special', 'silver' ),
            'src'         => ''
          )
        )
      ),
	  array(
        'id'          => 'blog-page-title',
        'label'       => __( 'Blog page title', 'silver' ),
        'desc'        => __( 'Add a blog page title here. It will be shown above the blog posts on the main blog page.', 'silver' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'general',
        'rows'        => ''
      ),
	  array(
        'id'          => 'excerpt-length',
        'label'       => __( 'Excerpt length', 'silver' ),
        'desc'        => __( 'Set the length of the blog posts text on the main blog page. Default is 65 character.', 'silver' ),
        'std'         => '65',
        'type'        => 'text',
        'section'     => 'general',
        'rows'        => ''
      ),
	  array(
        'id'          => 'team_items',
        'label'       => __( 'Team page items', 'silver' ),
        'desc'        => __( 'Set the team page items per page. Default is 6 items per page.', 'silver' ),
        'std'         => '6',
        'type'        => 'text',
        'section'     => 'general',
        'rows'        => ''
      ),
	  array(
        'id'          => 'clients_items',
        'label'       => __( 'Clients page items', 'silver' ),
        'desc'        => __( 'Set the clients page items per page. Default is 6 items per page.', 'silver' ),
        'std'         => '6',
        'type'        => 'text',
        'section'     => 'general',
        'rows'        => ''
      ),
	  
	  array(
        'id'          => 'work-layout',
        'label'       => __( 'Areas of Work', 'silver' ),
        'desc'        => __( 'Set the work page items to be right or left aligned.', 'silver' ),
        'std'         => 'default',
        'type'        => 'radio',
        'section'     => 'general',
        'rows'        => '',
        'choices'     => array( 
          array(
            'value'       => 'default',
            'label'       => __( 'Left aligned', 'silver' ),
            'src'         => ''
          ),
          array(
            'value'       => 'work-right',
            'label'       => __( 'Right aligned', 'silver' ),
            'src'         => ''
          )
        )
      ),
	  
	  array(
        'id'          => 'more-link',
        'label'       => __( 'More link', 'silver' ),
        'desc'        => __( 'Set the more link text. Default is &rarr; more.', 'silver' ),
        'std'         => 'more',
        'type'        => 'text',
        'section'     => 'general',
        'rows'        => ''
      ),
	  
	  array(
        'id'          => 'site_color',
        'label'       => __( 'Site color', 'silver' ),
        'desc'        => __( 'Change the site main color.', 'silver' ),
        'std'         => '#3e69c9',
        'type'        => 'colorpicker',
        'section'     => 'general',
        'rows'        => ''
      ),
	  
	  array(
        'id'          => 'custom_css',
        'label'       => __( 'Extra CSS', 'silver' ),
        'desc'        => __( 'Add extra CSS styles here. They will override any default styles.', 'silver' ),
        'std'         => '',
        'type'        => 'css',
        'section'     => 'general',
        'rows'        => '10'
      ),	  
	  array(
        'id'          => 'homepage-layout',
        'label'       => __( 'Homepage layout', 'silver' ),
        'desc'        => __( 'Set the homepage layout here.', 'silver' ),
        'std'         => 'default',
        'type'        => 'radio',
        'section'     => 'homepage',
        'rows'        => '',
        'choices'     => array( 
          array(
            'value'       => 'default',
            'label'       => __( 'Default. Recommended image sizes: Box 1: 405px by 342px. Box 2: 405px by 269px. Box 3: 250px by 247px. Box 4: 250px by 364px.', 'silver' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'default_sidebar_left',
            'label'       => __( 'Default, sidebar left. Recommended image sizes: Box 1: 405px by 342px. Box 2: 405px by 269px. Box 3: 250px by 247px. Box 4: 250px by 364px.', 'silver' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'five_boxes_no_news',
            'label'       => __( 'Five boxes, no news. Recommended image sizes: Box 1: 750px by 342px. Box 2: 345px by 269px. Box 3: 405px by 269px. Box 4: 250px by 247px. Box 5: 250px by 364px.', 'silver' ),
            'src'         => ''
          ),
          array(
            'value'       => 'six_boxes_no_news',
            'label'       => __( 'Six boxes, no news. Recommended image sizes: Box 1: 345px by 342px. Box 2: 345px by 269px. Box 3: 405px by 342px. Box 4: 405px by 269px. Box 5: 250px by 247px. Box 6: 250px by 364px.', 'silver' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'six_boxes_no_news_second_style',
            'label'       => __( 'Six boxes, no news, second style. Recommended image sizes: Box 1: 297px by 364px. Box 2: 297px by 247px. Box 3: 298px by 364px. Box 4: 298px by 247px. Box 5: 405px by 247px. Box 6: 405px by 364px.', 'silver' ),
            'src'         => ''
          ),
          array(
            'value'       => 'one_big_box',
            'label'       => __( 'One big box. Recommended image sizes: Box 1: 655px by 611px.', 'silver' ),
            'src'         => ''
          ),
          array(
            'value'       => 'one_big_four_medium_no_news',
            'label'       => __( 'Middle big box, four medium boxes, no news. Recommended image sizes: Box 1: 345px by 342px. Box 2: 345px by 269px. Box 3: 405px by 611px. Box 4: 250px by 247px. Box 5: 250px by 364px.', 'silver' ),
            'src'         => ''
          ),
          array(
            'value'       => 'big_left_two_medium_right',
            'label'       => __( 'Big box left, two medium right. Recommended image sizes: Box 1: 355px by 611px. Box 2: 300px by 305px. Box 3: 300px by 306px.', 'silver' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'big_right_two_medium_left',
            'label'       => __( 'Big box right, two medium left. Recommended image sizes: Box 1: 300px by 305px. Box 2: 300px by 306px. Box 3: 355px by 611px.', 'silver' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'big_top_two_medium_bottom',
            'label'       => __( 'Big box top, two medium bottom', 'silver' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'big_bottom_two_medium_top',
            'label'       => __( 'Big box bottom, two medium top. Recommended image sizes: Box 1: 327px by 306px. Box 2: 328px by 306px. Box 3: 655px by 305px.', 'silver' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'three_vertical_boxes_no_news',
            'label'       => __( 'Three vertical boxes, no news. Recommended image sizes: Box 1: 333px by 611px. Box 2: 334px by 611px. Box 3: 333px by 611px.', 'silver' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'big_box_right_three_medium_left',
            'label'       => __( 'Big box right, three medium left. Recommended image sizes: Box 1: 250px by 203px. Box 2: 250px by 205px. Box 3: 250px by 203px. Box 4: 405px by 611px.', 'silver' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'two_left_unequal_two_right_square',
            'label'       => __( 'Two left unequal boxes, two right square boxes. Recommended image sizes: Box 1: 317px by 247px. Box 2: 317px by 364px. Box 3: 338px by 305px. Box 4: 338px by 306px.', 'silver' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'two_big_boxes_right_three_medium_left',
            'label'       => __( 'Two big boxes right, three medium left. Recommended image sizes: Box 1: 250px by 203px. Box 2: 250px by 205px. Box 3: 250px by 203px. Box 4: 405px by 305px. Box 5: 405px by 306px.', 'silver' ),
            'src'         => ''
          ),
          array(
            'value'       => 'four_equal',
            'label'       => __( 'Four equal boxes. Recommended image sizes: Box 1: 327px by 305px. Box 2: 327px by 306px. Box 3: 328px by 305px. Box 4: 328px by 306px.', 'silver' ),
            'src'         => ''
          )
        )
      ),

	  array(
        'id'          => 'homepage-twitter',
        'label'       => __( 'Homepage twitter', 'silver' ),
        'desc'        => __( 'Set the box that you want to display twitter.', 'silver' ),
        'std'         => 'default',
        'type'        => 'radio',
        'section'     => 'homepage',
        'rows'        => '',
        'choices'     => array( 
          array(
            'value'       => 'default',
            'label'       => __( 'No twitter', 'silver' ),
            'src'         => ''
          ),
          array(
            'value'       => 'one',
            'label'       => __( 'Show twitter on the first box', 'silver' ),
            'src'         => ''
          ),
          array(
            'value'       => 'two',
            'label'       => __( 'Show twitter on the second box', 'silver' ),
            'src'         => ''
          ),
          array(
            'value'       => 'three',
            'label'       => __( 'Show twitter on the third box', 'silver' ),
            'src'         => ''
          ),
          array(
            'value'       => 'four',
            'label'       => __( 'Show twitter on the forth box', 'silver' ),
            'src'         => ''
          ),
          array(
            'value'       => 'five',
            'label'       => __( 'Show twitter on the fifth box', 'silver' ),
            'src'         => ''
          ),
          array(
            'value'       => 'six',
            'label'       => __( 'Show twitter on the sixth box', 'silver' ),
            'src'         => ''
          )
        )
      ),
	  
	  array(
        'id'          => 'textblock_box_one',
        'label'       => __( 'First box', 'silver' ),
        'desc'        => __( 'Set the first homepage box below.', 'silver' ),
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'homepage',
        'rows'        => ''
      ),	  
	  array(
        'id'          => 'box_one_img',
		'label'       => 'Upload image',
        'desc'        => __( 'Upload image here. Image size should be 406 x 342px.', 'silver' ),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'homepage',
        'rows'        => ''
      ),
	  array(
        'id'          => 'box_one_extra',
        'label'       => __( 'Add text', 'silver' ),
        'desc'        => __( 'Set the first homepage box here. Just add a title link, a title and subtitle text in this order. Separate these three elements by line breaks ( an enter ).', 'silver' ),
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'homepage',
        'rows'        => '2'
      ),
	  array(
        'id'          => 'textblock_box_two',
        'label'       => __( 'Second box', 'silver' ),
        'desc'        => __( 'Set the second homepage box below.', 'silver' ),
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'homepage',
        'rows'        => ''
      ),
	  array(
        'id'          => 'box_two_img',
		'label'       => 'Upload image',
        'desc'        => __( 'Upload image here. Image size should be 406 x 269px.', 'silver' ),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'homepage',
        'rows'        => ''
      ),
	  array(
        'id'          => 'box_two_extra',
        'label'       => __( 'Add text', 'silver' ),
        'desc'        => __( 'Set the second homepage box here. Just add a title link, a title and subtitle text in this order. Separate these three elements by line breaks ( an enter ).', 'silver' ),
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'homepage',
        'rows'        => '2'
      ),
	  array(
        'id'          => 'textblock_box_three',
        'label'       => __( 'Third box', 'silver' ),
        'desc'        => __( 'Set the third homepage box below.', 'silver' ),
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'homepage',
        'rows'        => ''
      ),
	  array(
        'id'          => 'box_three_img',
		'label'       => 'Upload image',
        'desc'        => __( 'Upload image here. Image size should be 252 x 247px.', 'silver' ),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'homepage',
        'rows'        => ''
      ),
	  array(
        'id'          => 'box_three_extra',
        'label'       => __( 'Add text', 'silver' ),
        'desc'        => __( 'Set the third homepage box here. Just add a title link, a title and subtitle text in this order. Separate these three elements by line breaks ( an enter ).', 'silver' ),
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'homepage',
        'rows'        => '2'
      ),
	  array(
        'id'          => 'textblock_box_four',
        'label'       => __( 'Fourth box', 'silver' ),
        'desc'        => __( 'Set the fourth homepage box below.', 'silver' ),
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'homepage',
        'rows'        => ''
      ),
	  array(
        'id'          => 'box_four_img',
		'label'       => 'Upload image',
        'desc'        => __( 'Upload image here. Image size should be 252 x 247px.', 'silver' ),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'homepage',
        'rows'        => ''
      ),
	  array(
        'id'          => 'box_four_extra',
        'label'       => __( 'Add text', 'silver' ),
        'desc'        => __( 'Set the fourth homepage box here. Just add a title link, a title and subtitle text in this order. Separate these three elements by line breaks ( an enter ).', 'silver' ),
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'homepage',
        'rows'        => '2'
      ),
	  array(
        'id'          => 'textblock_box_five',
        'label'       => __( 'Fifth box', 'silver' ),
        'desc'        => __( 'Set the fifth homepage box below.', 'silver' ),
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'homepage',
        'rows'        => ''
      ),
	  array(
        'id'          => 'box_five_img',
		'label'       => 'Upload image',
        'desc'        => __( 'Upload image here. Image size should be 252 x 247px.', 'silver' ),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'homepage',
        'rows'        => ''
      ),
	  array(
        'id'          => 'box_five_extra',
        'label'       => __( 'Add text', 'silver' ),
        'desc'        => __( 'Set the fifth homepage box here. Just add a title link, a title and subtitle text in this order. Separate these three elements by line breaks ( an enter ).', 'silver' ),
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'homepage',
        'rows'        => '2'
      ),
	  array(
        'id'          => 'textblock_box_six',
        'label'       => __( 'Sixth box', 'silver' ),
        'desc'        => __( 'Set the sixth homepage box below.', 'silver' ),
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'homepage',
        'rows'        => ''
      ),
	  array(
        'id'          => 'box_six_img',
		'label'       => 'Upload image',
        'desc'        => __( 'Upload image here. Image size should be 252 x 247px.', 'silver' ),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'homepage',
        'rows'        => ''
      ),
	  array(
        'id'          => 'box_six_extra',
        'label'       => __( 'Add text', 'silver' ),
        'desc'        => __( 'Set the sixth homepage box here. Just add a title link, a title and subtitle text in this order. Separate these three elements by line breaks ( an enter ).', 'silver' ),
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'homepage',
        'rows'        => '2'
      ),
	  
	  array(
        'id'          => 'map_address',
        'label'       => __( 'Map Address', 'silver' ),
        'desc'        => __( 'Add google map address here. Default is: New York, United States, Flushing Ave.', 'silver' ),
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'contact',
        'rows'        => '2'
      ),
	  array(
        'id'          => 'map_desc',
        'label'       => __( 'Map Description', 'silver' ),
        'desc'        => __( 'Add google map description here.', 'silver' ),
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'contact',
        'rows'        => '2'
      ),
	  array(
        'id'          => 'cform',
        'label'       => __( 'Contact form', 'silver' ),
        'desc'        => __( 'Add Contact Form 7 code here.', 'silver' ),
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'contact',
        'rows'        => '2'
      ),
	  
	  array(
        'id'          => 'marker',
        'label'       => __( 'Contact info 01', 'silver' ),
        'desc'        => __( 'Add contact info 01 text. You can use any of the <a target="_blank" href="http://fortawesome.github.io/Font-Awesome/icons/">font awesome</a> icons here ( ex: search ). Just add the icon name, a line break ( an enter ) and the text that you want to display.', 'silver' ),
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'contact',
        'rows'        => '2'
      ),
	  array(
        'id'          => 'briefcase',
        'label'       => __( 'Contact info 02', 'silver' ),
        'desc'        => __( 'Add contact info 02 text.', 'silver' ),
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'contact',
        'rows'        => '2'
      ),
	  array(
        'id'          => 'envelope',
        'label'       => __( 'Contact info 03', 'silver' ),
        'desc'        => __( 'Add contact info 03 text.', 'silver' ),
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'contact',
        'rows'        => '2'
      ),
	  array(
        'id'          => 'phone',
        'label'       => __( 'Contact info 04', 'silver' ),
        'desc'        => __( 'Add contact info 04 text.', 'silver' ),
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'contact',
        'rows'        => '2'
      ),

	  array(
        'id'          => 'screen_name',
        'label'       => 'Twitter user name',
        'desc'        => __( 'Add twitter user name here.', 'silver' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'twitter',
        'rows'        => ''
      ),
	  array(
        'id'          => 'consumer_key',
        'label'       => 'Twitter consumer key',
        'desc'        => __( 'Add twitter consumer key here.', 'silver' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'twitter',
        'rows'        => ''
      ),
	  array(
        'id'          => 'consumer_secret',
        'label'       => 'Twitter consumer secret',
        'desc'        => __( 'Add twitter consumer secret here.', 'silver' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'twitter',
        'rows'        => ''
      ),
	  array(
        'id'          => 'user_token',
        'label'       => 'Twitter user token',
        'desc'        => __( 'Add twitter user token here.', 'silver' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'twitter',
        'rows'        => ''
      ),
	  array(
        'id'          => 'user_secret',
        'label'       => 'Twitter user secret',
        'desc'        => __( 'Add twitter user secret here.', 'silver' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'twitter',
        'rows'        => ''
      )
    )
  );
  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( ot_settings_id() . '_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( ot_settings_id(), $custom_settings ); 
  }
  
}