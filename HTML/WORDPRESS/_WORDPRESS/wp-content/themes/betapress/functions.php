<?php

/* Activate featured thumbnaild supports*/
add_theme_support( 'post-thumbnails' );


/* Add css/js to header */
function themeslug_enqueue_style() {
	wp_enqueue_style( 'style1', get_template_directory_uri().'/assets/css/responsive.css', '1.0.0', all );
	wp_enqueue_style( 'style2', get_template_directory_uri().'/css/animate.css', '1.0.0', all );
	wp_enqueue_style( 'style3', get_template_directory_uri().'/css/icomoon.css', '1.0.0', all );
	wp_enqueue_style( 'style4', get_template_directory_uri().'/css/bootstrap.css', '1.0.0', all );
	wp_enqueue_style( 'style5', get_template_directory_uri().'/css/magnific-popup.css', '1.0.0', all );
	wp_enqueue_style( 'style6', get_template_directory_uri().'/css/owl.carousel.min.css', '1.0.0', all );
	wp_enqueue_style( 'style7', get_template_directory_uri().'/css/owl.theme.default.min.css', '1.0.0', all );
	wp_enqueue_style( 'style8', get_template_directory_uri().'/css/style.css', '1.0.0', all );
	wp_enqueue_script( 'js1', get_template_directory_uri().'/js/modernizr-2.6.2.min.js', '1.0.0', all );
	
	wp_enqueue_style( 'js12', get_template_directory_uri().'/js/respond.min.js', '1.0.0', all );
	wp_script_add_data( 'js12', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'themeslug_enqueue_style' );


/* Add css/js to footer */
function themeslug_enqueue_script() {
	wp_enqueue_script( 'js2', get_template_directory_uri().'/js/jquery.min.js', '1.0.0', all );
	wp_enqueue_script( 'js3', get_template_directory_uri().'/js/jquery.easing.1.3.js', '1.0.0', all );
	wp_enqueue_script( 'js4', get_template_directory_uri().'/js/bootstrap.min.js', '1.0.0', all );
	wp_enqueue_script( 'js5', get_template_directory_uri().'/js/jquery.waypoints.min.js', '1.0.0', all );
	wp_enqueue_script( 'js6', get_template_directory_uri().'/js/jquery.stellar.min.js', '1.0.0', all );
	wp_enqueue_script( 'js7', get_template_directory_uri().'/js/owl.carousel.min.js', '1.0.0', all );
	wp_enqueue_script( 'js8', get_template_directory_uri().'/js/jquery.countTo.js', '1.0.0', all );
	wp_enqueue_script( 'js9', get_template_directory_uri().'/js/jquery.magnific-popup.min.js', '1.0.0', all );
	wp_enqueue_script( 'js10', get_template_directory_uri().'/js/magnific-popup-options.js', '1.0.0', all );
	wp_enqueue_script( 'js11', get_template_directory_uri().'/js/main.js', '1.0.0', all );
}
add_action( 'wp_footer', 'themeslug_enqueue_script');


/* Menu setup */
function register_my_menus() {
	register_nav_menus(
		array(
			'header-menu' => __( 'Header Menu' ),
		)
	);
}
add_action( 'init', 'register_my_menus' );



/* Custom posts for Introduction */
function introduction_register() {
	$labels = array(
		'name' => _x('Introduction', ''),
		'singular_name' => _x('Introduction', ''),
		'add_new' => _x('Add New', ''),
		'add_new_item' => __('Add New'),
		'edit_item' => __('Edit'),
		'new_item' => __('New'),
		'view_item' => __('View'),
		'search_items' => __('Search'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		/*'menu_icon' => get_stylesheet_directory_uri() . '/article16.png',*/
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => 6,
		'supports' => array('title','editor','thumbnail')
	);
	register_post_type( 'introduction' , $args );
}
add_action('init', 'introduction_register');





/* Taxonomy / Category */
/*register_taxonomy("Category",
	array("introduction"),
	array("hierarchical" => true,
		  "label" => "Category",
		  "singular_label" => "Category",
		  "rewrite" => true
	)
);*/





































/* Custom posts for Fitness Expert */
function expert_register() {
	$labels = array(
		'name' => _x('Fitness Experts', ''),
		'singular_name' => _x('Fitness Experts', ''),
		'add_new' => _x('Add New', ''),
		'add_new_item' => __('Add New'),
		'edit_item' => __('Edit'),
		'new_item' => __('New'),
		'view_item' => __('View'),
		'search_items' => __('Search'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'has_archive' => true,
		'show_ui' => true,
		'query_var' => true,
		/*'menu_icon' => get_stylesheet_directory_uri() . '/article16.png',*/
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => 9,
		'supports' => array('title','editor','thumbnail')
	);
	register_post_type( 'experts' , $args );
}
add_action('init', 'expert_register');







/* Add files to custom post */
function admin_init(){
	add_meta_box("other_info-meta", "Other Information", "experts_meta", "experts", "normal", "low");
}
function experts_meta() {
	global $post;
	$custom = get_post_custom($post->ID);
	$expertise = $custom["expertise"][0];
	$fb_account = $custom["fb_account"][0];
	$tw_account = $custom["tw_account"][0];
?>
	<p><label>Expertise:</label><br />
	<textarea cols="50" rows="5" name="expertise"><?php echo $expertise; ?></textarea></p>
	<br>
	<p><label>Facebook Account:</label><br />
	<input type="text" name="fb_account" value="<?php echo $fb_account; ?>"></p>
	<p><label>Twitter Account:</label><br />
	<input type="text" name="tw_account" value="<?php echo $tw_account; ?>"></p>

<?php
}
add_action("admin_init", "admin_init");



/* Set action save for custom post experts */
function save_details(){
	global $post;

	update_post_meta($post->ID, "expertise", $_POST["expertise"]);
	update_post_meta($post->ID, "fb_account", $_POST["fb_account"]);
	update_post_meta($post->ID, "tw_account", $_POST["tw_account"]);
}
add_action('save_post', 'save_details');




?>