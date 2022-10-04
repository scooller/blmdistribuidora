<?php
add_action( 'init', 'create_post_type' );
function create_post_type() {
	register_post_type( 'banner',
		array(
		  'labels' => array(
			'name' => 'Banners',
			'singular_name' => 'Banner'
		  ),
		  'menu_icon' => "dashicons-slides",
		  'menu_position' => 3,
		  'public' => true,
		  'has_archive' => false,
		  'taxonomies' => array('category'),
		  'supports' => array (
			'title',
			'author',
			'editor',
			'page-attributes',
			'custom-fields'
		  )
		)
	);
	//--
	register_post_type( 'servicio',
		array(
		  'labels' => array(
			'name' => 'Servicio',
			'singular_name' => 'Servicios'
		  ),
		  'menu_icon' => "dashicons-awards",
		  'menu_position' => 4,
		  'public' => true,
		  'has_archive' => true,
		  'supports' => array (
			'title',
			'author',
			'editor',
			'page-attributes',
			'custom-fields'
		  )
		)
	);
	//--
	register_post_type( 'producto',
		array(
		  'labels' => array(
			'name' => 'Producto',
			'singular_name' => 'Productos'
		  ),
		  'menu_icon' => "dashicons-products",
		  'menu_position' => 4,
		  'public' => true,
		  'has_archive' => true,
		  'taxonomies'  => array( 
			  'category' 
		  ),
		  'supports' => array (
			'title',
			'author',
			'editor',
			'page-attributes',
			'custom-fields'
		  )
		)
	);
	//--
	register_post_type( 'testimonio',
		array(
		  'labels' => array(
			'name' => 'Testimonio',
			'singular_name' => 'Testimonios'
		  ),
		  'menu_icon' => "dashicons-testimonial",
		  'menu_position' => 4,
		  'public' => true,
		  'has_archive' => true,
		  'supports' => array (
			'title',
			'author',
			'editor',
			'page-attributes',
			'custom-fields'
		  )
		)
	);
	//--
	register_post_type( 'cliente',
		array(
		  'labels' => array(
			'name' => 'Clientes',
			'singular_name' => 'Cliente'
		  ),
		  'menu_icon' => "dashicons-networking",
		  'menu_position' => 4,
		  'public' => true,
		  'has_archive' => true,
		  'supports' => array (
			'title',
			'author',
			'editor',
			'page-attributes',
			'thumbnail',
			'custom-fields'
		  )
		)
	);
	//--
	register_post_type( 'proveedor',
		array(
		  'labels' => array(
			'name' => 'Proveedores',
			'singular_name' => 'Proveedor'
		  ),
		  'menu_icon' => "dashicons-rest-api",
		  'menu_position' => 4,
		  'public' => true,
		  'has_archive' => true,
		  'supports' => array (
			'title',
			'author',
			'editor',
			'page-attributes',
			'thumbnail',
			'custom-fields'
		  )
		)
	);
	//--
}
function wpse_category_set_post_types( $query ){
    if( $query->is_category() && $query->is_main_query() ){
        $query->set( 'post_type', array( 'post', 'testimonio', 'producto' ) );
    }
}
add_action( 'pre_get_posts', 'wpse_category_set_post_types' );