<?php
//header('Access-Control-Allow-Origin: *'); 
add_action( 'after_setup_theme', 'register_menu' );
function register_menu() {  
	register_nav_menu( 'general', 'Menu Principal' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5' );
	add_theme_support( 'custom-logo' );
}

require_once(TEMPLATEPATH.'/functions/enqueue-scripts.php');
require_once(TEMPLATEPATH.'/functions/cleanup.php');
require_once(TEMPLATEPATH.'/functions/bs5navwalker.php');
require_once(TEMPLATEPATH.'/functions/custom-post.php');
require_once(TEMPLATEPATH.'/functions/acf-pro.php');

//--
if( function_exists('acf_add_options_page') ) {	
	acf_add_options_page(array(
		'page_title' 	=> 'Configuración del Sitio',
		'menu_title'	=> 'Configuración del Sitio',
		'menu_slug' 	=> 'theme-general-settings',
		'icon_url'		=> 'dashicons-hammer'
	));
}

function noImage($cont){	
	return preg_replace('/<img[^>]+>/i', '', $cont);
}
/*this function allows users to use the first image in their post as their thumbnail*/
function first_image($content = "") {
	global $post, $posts;
	$img = '';
	ob_start();
	ob_end_clean();
	if(empty($content)){
		$content=$post->post_content;
	}
	$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content, $matches);
	$img = $matches [1] [0];

	return trim($img);
} 

/*
SVG FIX
*/
function fix_svg_thumb_display() {
  echo '<style>
    td.media-icon img[src$=".svg"], img[src$=".svg"].attachment-post-thumbnail { 
      width: 100% !important; 
      height: auto !important; 
    }
  </style>';
}
add_action('admin_head', 'fix_svg_thumb_display');
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  $mimes['mp4'] = 'video/mp4';
  $mimes['m4v'] = 'video/mp4';
  $mimes['webm'] = 'video/webm';
  $mimes['ogv'] = 'video/ogg';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');
show_admin_bar( false );

function login_customlogo() {
  $custom_logo_id = get_theme_mod( 'custom_logo' );
  $logo_site = wp_get_attachment_image_src( $custom_logo_id , 'full' );
?> 
<style type="text/css">
.login #backtoblog a, .login #nav a {
  color: #fff!important;
}
.language-switcher label .dashicons{
  color: #fff;
}
body.login{
  background-color: #3a3d3b;
}
body.login div#login h1 a {
  background-image: url(<?=$logo_site[0]?>);
  padding-bottom: 0px;
  width: 100%;
  height: auto;
  background-size: auto;
}
.wp-core-ui .button {
  color: #EB0029!important;
  border-color: #EB0029!important;
}
.wp-core-ui .button-primary{
  color: #fff!important;
  background-color: #EB0029!important;
}
.login #login_error, .login .message, .login .success {
  border-left: 4px solid #EB0029!important;
}
</style>
<?php 
} add_action( 'login_enqueue_scripts', 'login_customlogo' );

function normalizeNumber($number){
    $number = str_replace(".", "", $number);
    $number = str_replace(",", ".", $number);
    return floatval($number);
}
function get_sitelogo($carga=false){
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$logo_site = wp_get_attachment_image_src( $custom_logo_id , 'full' );
	$logo=$logo_site[0];
	if($carga){
		if(get_field('logo_carga','option')){
			$logo=get_field('logo_carga','option');
		}
	}
	return $logo;
}