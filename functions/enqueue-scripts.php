<?php
function theme_enqueue() {	
	wp_deregister_script('jquery');
	wp_register_script('jquery', "//cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js", false, '3.6.1');
	wp_enqueue_script('jquery');
	
    wp_enqueue_script( 'bootstrap-js', '//cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.1/js/bootstrap.bundle.min.js', array( 'jquery' ), '5.2.1', true );	
	wp_enqueue_script( 'OwlCarousel2-js', '//cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', array( 'jquery' ), '2.3.4', true );
	wp_enqueue_script( 'fancybox', '//cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js', array( 'jquery' ), '3.5.7', true );
	wp_enqueue_script( 'svg-injector', '//cdnjs.cloudflare.com/ajax/libs/svg-injector/1.1.3/svg-injector.min.js', array( 'jquery' ), '1.1.3', true );
	wp_enqueue_script( 'wow', '//cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js', array( 'jquery' ), '1.1.2', true );
	wp_enqueue_style( 'animate', '//cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css', array( ), '6.2.0' );
	wp_enqueue_style( 'fontawesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css', array( ), '6.2.0' );
	wp_enqueue_style( 'google-font', '//fonts.googleapis.com/css2?family=Anek+Telugu:wght@100;200;300;400;500;600;700;800&display=swap', array( ), null );
	wp_enqueue_style( 'OwlCarousel2-style', '//cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css', array( ), '2.3.4' );
	wp_enqueue_style( 'OwlCarousel2-theme', '//cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css', array( ), '2.3.4' );
	wp_enqueue_style( 'fancybox-style', '//cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css', array( ), '3.5.7' );	
	wp_enqueue_script( 'custom', get_template_directory_uri() .'/js/actions.js', array( 'jquery' ), false, true );
	wp_enqueue_style( 'bootstrap-style', '//cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.1/css/bootstrap.min.css', array( ), '5.2.1' );
	wp_enqueue_style( 'general-style', get_template_directory_uri() .'/css/general.css', array( ) );
	
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue' );