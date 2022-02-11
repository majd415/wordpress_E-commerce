<?php
/**
 * Theme Functions.
 */

/* Theme Setup */
if ( ! function_exists( 'ts_mobile_app_setup' ) ) :

function ts_mobile_app_setup() {

	$GLOBALS['content_width'] = apply_filters( 'ts_mobile_app_content_width', 640 );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );

	add_theme_support( 'custom-background', array(
		'default-color' => 'f1f1f1'
	) );

	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	add_theme_support('responsive-embeds');
	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', bb_mobile_application_font_url() ) );
}
endif;
add_action( 'after_setup_theme', 'ts_mobile_app_setup' );

/* Theme Widgets Setup */
function ts_mobile_app_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'ts-mobile-app' ),
		'description'   => __( 'Appears on blog page sidebar', 'ts-mobile-app' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'ts-mobile-app' ),
		'description'   => __( 'Appears on page sidebar', 'ts-mobile-app' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Third Column Sidebar', 'ts-mobile-app' ),
		'description'   => __( 'Appears on page sidebar', 'ts-mobile-app' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	//Footer widget areas
	$bb_mobile_application_widget_areas = get_theme_mod('bb_mobile_application_footer_widget_areas', '4');
	for ($i=1; $i<=$bb_mobile_application_widget_areas; $i++) {
		register_sidebar( array(
			'name'          => __( 'Footer Nav ', 'ts-mobile-app' ) . $i,
			'id'            => 'footer-' . $i,
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s py-3">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title pb-2 mb-3">',
			'after_title'   => '</h3>',
		) );
	}

	register_sidebar( array(
		'name'          => __( 'Shop Page Sidebar', 'ts-mobile-app' ),
		'description'   => __( 'Appears on shop page', 'ts-mobile-app' ),
		'id'            => 'woocommerce_sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Single Product Page Sidebar', 'ts-mobile-app' ),
		'description'   => __( 'Appears on shop page', 'ts-mobile-app' ),
		'id'            => 'woocommerce-single-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'ts_mobile_app_widgets_init' );

add_action( 'wp_enqueue_scripts', 'ts_mobile_app_enqueue_styles' );
function ts_mobile_app_enqueue_styles() {
	$parent_style = 'bb-mobile-application-basic-style'; // Style handle of parent theme.
	wp_enqueue_style( $parent_style, esc_url(get_template_directory_uri()) . '/style.css' );
	wp_enqueue_style( 'ts-mobile-app-style', get_stylesheet_uri(), array( $parent_style ) );
	require get_parent_theme_file_path( '/inc/ts-color-pallete.php' );
	wp_add_inline_style( 'ts-mobile-app-style',$bb_mobile_application_custom_css );
	require get_theme_file_path( '/ts-color-pallete.php' );
	wp_add_inline_style( 'ts-mobile-app-style',$bb_mobile_application_custom_css );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

function ts_mobile_app_customize_register() {     
	global $wp_customize;
	$wp_customize->remove_section( 'bb_mobile_application_theme_color_option' );  //Modify this line as needed  
} 
add_action( 'customize_register', 'ts_mobile_app_customize_register', 11 );

// Customizer Section
function ts_mobile_app_customizer ( $wp_customize ) {

	/*Service Section*/
	$wp_customize->add_section( 'ts_mobile_app_category_post_section' , array(
    	'title'      => __( 'Service Section', 'ts-mobile-app' ),
		'priority'   => null,
		'panel' => 'bb_mobile_application_panel_id'
	) );

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_post[]= 'select';
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('ts_mobile_app_category_post',array(
		'default'	=> 'select',
		'sanitize_callback' => 'ts_mobile_app_sanitize_choices',
	));
	$wp_customize->add_control('ts_mobile_app_category_post',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => __('Select Category to display post','ts-mobile-app'),
		'section' => 'ts_mobile_app_category_post_section',
	));

	/*About Section*/
	$wp_customize->add_section( 'ts_mobile_app_about_mobile_section' , array(
    	'title'      => __( 'About Section', 'ts-mobile-app' ),
		'priority'   => null,
		'panel' => 'bb_mobile_application_panel_id'
	) );

	$args = array('numberposts' => -1);
	$post_list = get_posts($args);
 	$i = 0;
	$pst[]='Select';  
	foreach($post_list as $post){
	$pst[$post->post_title] = $post->post_title;
	}

	$wp_customize->add_setting('ts_mobile_app_post',array(
	   'sanitize_callback' => 'ts_mobile_app_sanitize_choices',
	));
	$wp_customize->add_control('ts_mobile_app_post',array(
	  'type'    => 'select',
	  'choices' => $pst,
	  'label' => __('Select post','ts-mobile-app'),
	  'section' => 'ts_mobile_app_about_mobile_section',
	));

}
add_action( 'customize_register', 'ts_mobile_app_customizer' );

/* Theme Font URL */
function ts_mobile_app_font_url(){
	$font_url = '';
	$font_family = array();
	$font_family[] = 'Ubuntu:300,300i,400,400i,500,500i,700,700i';

	$query_args = array(
		'family'	=> rawurlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
}

/*radio button sanitization*/
function ts_mobile_app_sanitize_choices( $input, $setting ) {
    global $wp_customize; 
    $control = $wp_customize->get_control( $setting->id ); 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function ts_mobile_app_odd_or_even($counter){
    if($counter % 2 == 0){
        return "even";
    }
    else{
        return "odd";
    }
}
