<?php
/**
 * VW Automobile Lite Theme Customizer
 *
 * @package VW Automobile Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vw_automobile_lite_custom_controls() {

    load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'vw_automobile_lite_custom_controls' );

function vw_automobile_lite_customize_register($wp_customize) {

	load_template( trailingslashit( get_template_directory() ) . 'inc/customize-homepage/class-customize-homepage.php' );

	//add home page setting pannel
	$wp_customize->add_panel('vw_automobile_lite_panel_id', array(
			'priority'       => 10,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => __('VW Settings', 'vw-automobile-lite'),
			'description'    => __('Description of what this panel does.', 'vw-automobile-lite'),
		));

	$wp_customize->add_section('vw_automobile_lite_left_right', array(
			'title'    => __('General Settings', 'vw-automobile-lite'),
			'priority' => 30,
			'panel'    => 'vw_automobile_lite_panel_id',
		));

	$wp_customize->add_setting('vw_automobile_lite_width_option',array(
        'default' => __('Full Width','vw-automobile-lite'),
        'sanitize_callback' => 'vw_automobile_lite_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Automobile_Lite_Image_Radio_Control($wp_customize, 'vw_automobile_lite_width_option', array(
        'type' => 'select',
        'label' => __('Width Layouts','vw-automobile-lite'),
        'description' => __('Here you can change the width layout of Website.','vw-automobile-lite'),
        'section' => 'vw_automobile_lite_left_right',
        'choices' => array(
            'Full Width' => get_template_directory_uri().'/images/full-width.png',
            'Wide Width' => get_template_directory_uri().'/images/wide-width.png',
            'Boxed' => get_template_directory_uri().'/images/boxed-width.png',
    ))));

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('vw_automobile_lite_theme_options',array(
        'default' => __('Right Sidebar','vw-automobile-lite'),
        'sanitize_callback' => 'vw_automobile_lite_sanitize_choices'	        
	) );
	$wp_customize->add_control('vw_automobile_lite_theme_options', array(
        'type' => 'select',
        'label' => __('Post Sidebar Layout','vw-automobile-lite'),
        'description' => __('Here you can change the sidebar layout for posts. ','vw-automobile-lite'),
        'section' => 'vw_automobile_lite_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-automobile-lite'),
            'Right Sidebar' => __('Right Sidebar','vw-automobile-lite'),
            'One Column' => __('One Column','vw-automobile-lite'),
            'Three Columns' => __('Three Columns','vw-automobile-lite'),
            'Four Columns' => __('Four Columns','vw-automobile-lite'),
            'Grid Layout' => __('Grid Layout','vw-automobile-lite')
        ),
	));

	$wp_customize->add_setting('vw_automobile_lite_page_layout',array(
        'default' => __('One Column','vw-automobile-lite'),
        'sanitize_callback' => 'vw_automobile_lite_sanitize_choices'
	));
	$wp_customize->add_control('vw_automobile_lite_page_layout',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','vw-automobile-lite'),
        'description' => __('Here you can change the sidebar layout for pages. ','vw-automobile-lite'),
        'section' => 'vw_automobile_lite_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-automobile-lite'),
            'Right Sidebar' => __('Right Sidebar','vw-automobile-lite'),
            'One Column' => __('One Column','vw-automobile-lite')
        ),
	) );

	//Topbar section
	$wp_customize->add_section('vw_automobile_lite_topbar_icon', array(
			'title'       => __('Topbar Section', 'vw-automobile-lite'),
			'description' => __('Add Top Header Content here', 'vw-automobile-lite'),
			'priority'    => null,
			'panel'       => 'vw_automobile_lite_panel_id',
		));

	$wp_customize->add_setting('vw_automobile_lite_contact', array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		));

	$wp_customize->add_control('vw_automobile_lite_contact', array(
			'label'   => __('Add Phone Number', 'vw-automobile-lite'),
			'section' => 'vw_automobile_lite_topbar_icon',
			'setting' => 'vw_automobile_lite_contact',
			'type'    => 'text',
		));

	$wp_customize->add_setting('vw_automobile_lite_email', array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		));

	$wp_customize->add_control('vw_automobile_lite_email', array(
			'label'   => __('Add Email', 'vw-automobile-lite'),
			'section' => 'vw_automobile_lite_topbar_icon',
			'setting' => 'vw_automobile_lite_email',
			'type'    => 'text',
		));

	$wp_customize->add_setting('vw_automobile_lite_headertimings', array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		));

	$wp_customize->add_control('vw_automobile_lite_headertimings', array(
			'label'   => __('Add Timing', 'vw-automobile-lite'),
			'section' => 'vw_automobile_lite_topbar_icon',
			'setting' => 'vw_automobile_lite_headertimings',
			'type'    => 'text',
		));

	$wp_customize->add_setting( 'vw_automobile_lite_search_hide_show',
       array(
          'default' => 1,
          'transport' => 'refresh',
          'sanitize_callback' => 'vw_automobile_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Automobile_Lite_Toggle_Switch_Custom_control( $wp_customize, 'vw_automobile_lite_search_hide_show',
       array(
          'label' => esc_html__( 'Show / Hide Search','vw-automobile-lite' ),
          'section' => 'vw_automobile_lite_topbar_icon'
    )));

	//home page slider
    $wp_customize->add_section( 'vw_automobile_lite_slidersettings' , array(
      'title'      => __( 'Slider Settings', 'vw-automobile-lite' ),
      'priority'   => null,
      'panel' => 'vw_automobile_lite_panel_id'
    ) );

    $wp_customize->add_setting( 'vw_automobile_lite_slider_hide_show',
       array(
          'default' => 1,
          'transport' => 'refresh',
          'sanitize_callback' => 'vw_automobile_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Automobile_Lite_Toggle_Switch_Custom_control( $wp_customize, 'vw_automobile_lite_slider_hide_show',
       array(
          'label' => esc_html__( 'Show / Hide Slider','vw-automobile-lite' ),
          'section' => 'vw_automobile_lite_slidersettings'
    )));

    for ( $count = 1; $count <= 4; $count++ ) {

	    $wp_customize->add_setting( 'vw_automobile_lite_slider_page' . $count, array(
	      'default'           => '',
	      'sanitize_callback' => 'vw_automobile_lite_sanitize_dropdown_pages'
	    ) );
	    $wp_customize->add_control( 'vw_automobile_lite_slider_page' . $count, array(
	      'label'    => __( 'Select Slide Image Page', 'vw-automobile-lite' ),
	      'description' => __('Slider image size (1500 x 765)','vw-automobile-lite'),
	      'section'  => 'vw_automobile_lite_slidersettings',
	      'type'     => 'dropdown-pages'
	    ) );
    }

    //content layout
	$wp_customize->add_setting('vw_automobile_lite_slider_content_option',array(
        'default' => __('Center','vw-automobile-lite'),
        'sanitize_callback' => 'vw_automobile_lite_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Automobile_Lite_Image_Radio_Control($wp_customize, 'vw_automobile_lite_slider_content_option', array(
        'type' => 'select',
        'label' => __('Slider Content Layouts','vw-automobile-lite'),
        'section' => 'vw_automobile_lite_slidersettings',
        'choices' => array(
            'Left' => get_template_directory_uri().'/images/slider-content1.png',
            'Center' => get_template_directory_uri().'/images/slider-content2.png',
            'Right' => get_template_directory_uri().'/images/slider-content3.png',
    ))));

    //Slider excerpt
	$wp_customize->add_setting( 'vw_automobile_lite_slider_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_automobile_lite_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','vw-automobile-lite' ),
		'section'     => 'vw_automobile_lite_slidersettings',
		'type'        => 'range',
		'settings'    => 'vw_automobile_lite_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Opacity
	$wp_customize->add_setting('vw_automobile_lite_slider_opacity_color',array(
      'default'              => 0.5,
      'sanitize_callback' => 'vw_automobile_lite_sanitize_choices'
	));

	$wp_customize->add_control( 'vw_automobile_lite_slider_opacity_color', array(
	'label'       => esc_html__( 'Slider Image Opacity','vw-automobile-lite' ),
	'section'     => 'vw_automobile_lite_slidersettings',
	'type'        => 'select',
	'settings'    => 'vw_automobile_lite_slider_opacity_color',
	'choices' => array(
      '0' =>  esc_attr('0','vw-automobile-lite'),
      '0.1' =>  esc_attr('0.1','vw-automobile-lite'),
      '0.2' =>  esc_attr('0.2','vw-automobile-lite'),
      '0.3' =>  esc_attr('0.3','vw-automobile-lite'),
      '0.4' =>  esc_attr('0.4','vw-automobile-lite'),
      '0.5' =>  esc_attr('0.5','vw-automobile-lite'),
      '0.6' =>  esc_attr('0.6','vw-automobile-lite'),
      '0.7' =>  esc_attr('0.7','vw-automobile-lite'),
      '0.8' =>  esc_attr('0.8','vw-automobile-lite'),
      '0.9' =>  esc_attr('0.9','vw-automobile-lite')
	),
	));

	//Our Services
	$wp_customize->add_section('vw_automobile_lite_choose_us', array(
			'title'       => __('Choose Us Section', 'vw-automobile-lite'),
			'description' => '',
			'priority'    => null,
			'panel'       => 'vw_automobile_lite_panel_id',
		));

	$wp_customize->add_setting('vw_automobile_lite_title', array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		));

	$wp_customize->add_control('vw_automobile_lite_title', array(
			'label'   => __('Title', 'vw-automobile-lite'),
			'section' => 'vw_automobile_lite_choose_us',
			'type'    => 'text',
		));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cats[]= 'select';
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cats[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('vw_automobile_lite_choose_us_category', array(
			'default'           => 'select',
			'sanitize_callback' => 'vw_automobile_lite_sanitize_choices',
		));
	$wp_customize->add_control('vw_automobile_lite_choose_us_category', array(
			'type'    => 'select',
			'choices' => $cats,
			'label'   => __('Select Category to display Latest Post', 'vw-automobile-lite'),
			'section' => 'vw_automobile_lite_choose_us',
		));

	//Services excerpt
	$wp_customize->add_setting( 'vw_automobile_lite_services_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_automobile_lite_services_excerpt_number', array(
		'label'       => esc_html__( 'Services Excerpt length','vw-automobile-lite' ),
		'section'     => 'vw_automobile_lite_choose_us',
		'type'        => 'range',
		'settings'    => 'vw_automobile_lite_services_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Blog Post
	$wp_customize->add_section('vw_automobile_lite_blog_post',array(
		'title'	=> __('Blog Post Settings','vw-automobile-lite'),
		'panel' => 'vw_automobile_lite_panel_id',
	));	

	$wp_customize->add_setting( 'vw_automobile_lite_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_automobile_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Automobile_Lite_Toggle_Switch_Custom_control( $wp_customize, 'vw_automobile_lite_toggle_postdate',array(
        'label' => esc_html__( 'Post Date','vw-automobile-lite' ),
        'section' => 'vw_automobile_lite_blog_post'
    )));

    $wp_customize->add_setting( 'vw_automobile_lite_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_automobile_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Automobile_Lite_Toggle_Switch_Custom_control( $wp_customize, 'vw_automobile_lite_toggle_author',array(
		'label' => esc_html__( 'Author','vw-automobile-lite' ),
		'section' => 'vw_automobile_lite_blog_post'
    )));

    $wp_customize->add_setting( 'vw_automobile_lite_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_automobile_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Automobile_Lite_Toggle_Switch_Custom_control( $wp_customize, 'vw_automobile_lite_toggle_comments',array(
		'label' => esc_html__( 'Comments','vw-automobile-lite' ),
		'section' => 'vw_automobile_lite_blog_post'
    )));

    $wp_customize->add_setting( 'vw_automobile_lite_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_automobile_lite_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','vw-automobile-lite' ),
		'section'     => 'vw_automobile_lite_blog_post',
		'type'        => 'range',
		'settings'    => 'vw_automobile_lite_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Content Creation
	$wp_customize->add_section( 'vw_automobile_lite_content_section' , array(
    	'title' => __( 'Customize Home Page Settings', 'vw-automobile-lite' ),
		'priority' => null,
		'panel' => 'vw_automobile_lite_panel_id'
	) );

	$wp_customize->add_setting('vw_automobile_lite_content_creation_main_control', array(
		'sanitize_callback' => 'esc_html',
	) );

	$homepage= get_option( 'page_on_front' );

	$wp_customize->add_control(	new VW_Automobile_Lite_Content_Creation( $wp_customize, 'vw_automobile_lite_content_creation_main_control', array(
		'options' => array(
			esc_html__( 'First select static page in homepage setting for front page.Below given edit button is to customize Home Page. Just click on the edit option, add whatever elements you want to include in the homepage, save the changes and you are good to go.','vw-automobile-lite' ),
		),
		'section' => 'vw_automobile_lite_content_section',
		'button_url'  => admin_url( 'post.php?post='.$homepage.'&action=edit'),
		'button_text' => esc_html__( 'Edit', 'vw-automobile-lite' ),
	) ) );

	//Footer
	$wp_customize->add_section('vw_automobile_lite_footer', array(
			'title'       => __('Footer Section', 'vw-automobile-lite'),
			'description' => '',
			'priority'    => null,
			'panel'       => 'vw_automobile_lite_panel_id',
		));

	$wp_customize->add_setting('vw_automobile_lite_footer_copy', array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		));
	$wp_customize->add_control('vw_automobile_lite_footer_copy', array(
			'label'   => __('Copyright Text', 'vw-automobile-lite'),
			'section' => 'vw_automobile_lite_footer',
			'type'    => 'text',
		));

	$wp_customize->add_setting('vw_automobile_lite_scroll_top_alignment',array(
        'default' => __('Right','vw-automobile-lite'),
        'sanitize_callback' => 'vw_automobile_lite_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Automobile_Lite_Image_Radio_Control($wp_customize, 'vw_automobile_lite_scroll_top_alignment', array(
        'type' => 'select',
        'label' => __('Scroll To Top','vw-automobile-lite'),
        'section' => 'vw_automobile_lite_footer',
        'settings' => 'vw_automobile_lite_scroll_top_alignment',
        'choices' => array(
            'Left' => get_template_directory_uri().'/images/layout1.png',
            'Center' => get_template_directory_uri().'/images/layout2.png',
            'Right' => get_template_directory_uri().'/images/layout3.png'
    ))));
}

add_action('customize_register', 'vw_automobile_lite_customize_register');

load_template(trailingslashit(get_template_directory()).'/inc/logo-resizer.php');

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class VW_Automobile_Lite_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if (is_null($instance)) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action('customize_register', array($this, 'sections'));

		// Register scripts and styles for the controls.
		add_action('customize_controls_enqueue_scripts', array($this, 'enqueue_control_scripts'), 0);
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections($manager) {

		// Load custom sections.
		load_template(trailingslashit(get_template_directory()).'/inc/section-pro.php');

		// Register custom section types.
		$manager->register_section_type('VW_Automobile_Lite_Customize_Section_Pro');

		// Register sections.
		$manager->add_section(
			new VW_Automobile_Lite_Customize_Section_Pro($manager,'example_1',
				array(
					'priority' => 1,
					'title'    => esc_html__('VW Automobile Pro', 'vw-automobile-lite'),
					'pro_text' => esc_html__('Upgrade Pro', 'vw-automobile-lite'),
					'pro_url'  => esc_url('https://www.vwthemes.com/premium/automobile-wordpress-theme/')
				)));

		// Register sections.
		$manager->add_section(
			new VW_Automobile_Lite_Customize_Section_Pro($manager,'example_2',
				array(
					'priority' => 1,
					'title'    => esc_html__('Documentation', 'vw-automobile-lite'),
					'pro_text' => esc_html__('Docs', 'vw-automobile-lite'),
					'pro_url'  => esc_url('themes.php?page=vw_automobile_lite_guide')
				)));
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script('vw-automobile-lite-customize-controls', trailingslashit(get_template_directory_uri()).'/js/customize-controls.js', array('customize-controls'));

		wp_enqueue_style('vw-automobile-lite-customize-controls', trailingslashit(get_template_directory_uri()).'/css/customize-controls.css');
	}
}

// Doing this customizer thang!
VW_Automobile_Lite_Customize::get_instance();