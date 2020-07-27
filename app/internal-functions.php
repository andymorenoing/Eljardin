<?php
/***
 * @Descripcion: internal-functions.php
 * Contiene las diferentes funciones internas para el funcionamiento de wordpress
 * Opciones de wordpress por defecto
 *
 *
***/

/*
|-------------------------------------------------------------------------------
| Function to add default support
|-------------------------------------------------------------------------------
*/

	function WoowSetup(){

		// This theme uses Woocommerce
		add_theme_support( 'woocommerce' );

		// Add default posts and comments RSS feed links to <head>.
		add_theme_support( 'automatic-feed-links' );

		// This theme uses Featured Images
		add_theme_support( 'post-thumbnails' );

		// This theme uses excerpt in pages
		add_post_type_support( 'page', 'excerpt' );

		// Register top menu
		register_nav_menu( 'Top', 'Top Menu' );

		// This theme styles the visual editor with editor-style.css to match the theme style.
		add_editor_style();

	}

	add_action( 'after_setup_theme', 'WoowSetup' );

/*
|-------------------------------------------------------------------------------
| Function to add custom size Thumbnails
|-------------------------------------------------------------------------------
*/

	function CustomThumbnail(){
		// Add size 352x192 (Productos Home)
		add_image_size( '352x192', 352, 192, true );

		// Add size 500x273 (Productos Tienda)
		add_image_size( '500x273', 500, 273, true );

		// Add size 400x505 (Productos BOX)
		add_image_size( '400x505', 400, 505, true );
	}

	add_action( 'after_setup_theme', 'CustomThumbnail' );

/*
|-------------------------------------------------------------------------------
| Function to add Scripts in Front-end
|-------------------------------------------------------------------------------
*/

	function FrontScripts (){

		wp_register_script( 'ajax-woow', JSURL.'ajax-woow.js', array(), VCACHE, true );
		wp_localize_script( 'ajax-woow', 'MyAjax', array( 'url' => admin_url( 'admin-ajax.php' ), 'urlHome' => home_url(), 'urlJs' => JSURL ) );

		wp_enqueue_script('jquery');
		wp_enqueue_script('ajax-woow');

	}

	add_action( 'wp_enqueue_scripts', 'FrontScripts' );


/*
|-------------------------------------------------------------------------------
| Function to create automatically pages
|-------------------------------------------------------------------------------
*/

	function CreatePages(){

		// Page Home
		$arrNewPage[] = array(
				'post_title' => 'Home'
			,	'post_name' => 'home'
			,	'post_status' => 'publish'
			,	'post_type' => 'page'
			,	'page_template' => 'page-home.php'
		);
		// Loop to create pages
		foreach ( $arrNewPage as $page ) {

			$pageExisit = get_page_by_title( $page[ 'post_title' ] );

			// Check if page exist
			if( is_null( $pageExisit ) ){
				// Create a new page
				wp_insert_post( $page );

			}

		}

	}
	
	add_action( 'after_switch_theme', 'CreatePages' );

?>

