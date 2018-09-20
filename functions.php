<?php
add_action('after_setup_theam','add_custom_background');
add_action( 'wp_enqueue_scripts', 'pagfunctions_scrypts' );

function pagfunctions_scrypts()
{
	
	wp_enqueue_style( 'owlcarousel', get_template_directory_uri()."/owl/owl.carousel.min.css" );
	wp_enqueue_style( 'owlcarousel-default', get_template_directory_uri()."/owl/owl.theme.css" );
	wp_enqueue_script( 'owlcarousel-js', get_template_directory_uri() ."/owl/owl.carousel.min.js",'',true );
	wp_enqueue_script( 'scrollreveal', get_template_directory_uri() ."/js/scrollreveal.min.js",'',true );
	
	
	if(is_home())
	{
		wp_enqueue_script( 'maplace', get_template_directory_uri() ."/js/maplace.js",'',true );
		wp_enqueue_script( 'moja-mapa', get_template_directory_uri() ."/moja-mapa.js",'',true );
	}
	wp_enqueue_style( 'lightbox', get_template_directory_uri()."/lightbox/css/lightbox.min.css" );
	wp_enqueue_script( 'lightbox-js', get_template_directory_uri() ."/lightbox/js/lightbox.js",'',true );
	wp_enqueue_script( 'main', get_template_directory_uri() ."/js/main.js",'',true );
	wp_enqueue_style( 'style-theam', get_template_directory_uri()."/style-theam.css" );
	wp_enqueue_style( 'css-menu', get_template_directory_uri()."/css-menu.css" );
	//wp_enqueue_style( 'css-menu-prawe', get_template_directory_uri()."/css-menu-prawe.css" );
	//wp_enqueue_style( 'css-menu-dolne', get_template_directory_uri()."/css-menu-dolne.css" );
	wp_enqueue_style( 'style', get_stylesheet_uri() );
}

//---rejestracja menu,ikon i klasy menu

function register_primary_menu() {
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'aiboot42' ),
                'secondary' => __( 'Secondary Menu', 'aiboot42' )
		) 	
	);
}
require_once('inc/wp-bootstrap-navwalker.php');
require_once('inc/customizer.php');
require_once('wpis-produkty-typ.php');
add_action( 'init', 'register_primary_menu' );
add_theme_support('post-thumbnails');

//-- rejestracja widgetów
register_sidebar( array(
		'name'          => __( 'Widget Area Footer Left', 'aiboot42' ),
		'id'            => 'stopa-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'aiboot42' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
register_sidebar( array(
		'name'          => __( 'Widget Area Footer Center', 'aiboot42' ),
		'id'            => 'stopa-2',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'aiboot42' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );	
register_sidebar( array(
		'name'          => __( 'Widget Area Footer Right', 'aiboot42' ),
		'id'            => 'stopa-3',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'aiboot42' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );	

function get_post_excerpt($value) {
if (!is_int($value)) { $value = 250; }
$excerpt = get_the_content();
$excerpt = strip_shortcodes(preg_replace(" (\[.*?\])",'',$excerpt));
$excerpt = substr(strip_tags($excerpt), 0, $value);
$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
$excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
return $excerpt;
}	

function domena($atrybuty) {
	extract (shortcode_atts (array('typ' => ''), $atrybuty));
	$wynik='http://'.$_SERVER['SERVER_NAME'];
	$wynik=$wynik.'/aiboot42';
	return $wynik;
}
add_shortcode('ai-domena', 'domena');
	
	
function rrremove_shortcode($content) {
	
	$content = strip_shortcodes($content);
	return $content;
}

add_filter('script_loader_tag', 'clean_script_tag');
  function clean_script_tag($input) {
  $input = str_replace("type='text/javascript' ", '', $input);
  return str_replace("'", '"', $input);
}	
		
function pagination() {
    
    global $wp_query;
    
    if ($wp_query->max_num_pages > 1) { echo '<p class="pages" role="navigation">' . paginate_links( array(
        'base' => @add_query_arg('paged','%#%'),
        'format' => '?paged=%#%',
        'current' => max( 1, get_query_var('paged') ),
        'total' => $wp_query->max_num_pages,
        'prev_text' => __('« '),
        'next_text'    => __(' »'),
    ) ) . '</p>'; }
}

function pierwsza_kategoria()
{
	$categories = get_the_category();
				if ( ! empty( $categories ) ) {
               return esc_html( $categories[0]->name );   
			}
}
	
?>
