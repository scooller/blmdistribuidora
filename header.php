<?php
$logo_carga=get_sitelogo(true);
$logo=get_sitelogo(false);
//--
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php bloginfo(); ?></title>
    
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <meta name="googlebot" content="index" />
    <meta name="google" content="nositelinkssearchbox" />
	
	<meta name="facebook-domain-verification" content="" />
    
    <meta name="viewport" content="width=device-width, initial-scale=1">   
    <meta name="msapplication-TileColor" content="#000">
    <meta name="theme-color" content="#000">
    <?php wp_head(); ?>
    <?php the_field('codigo_header','option'); ?>
</head>

<body <?php body_class(); ?>>
    <div id="load" style="position: fixed; width: 100%; height: 100%; background-color: rgba(0,0,0,0.96); z-index: 9999; text-align: center; top: 0;" class="d-flex justify-content-center align-items-center">
		<img src="<?=$logo_carga?>" style="width: 8%" class="img-fluid">
    </div>
	<div class="container-fluid">
		<nav id="menu" class="navbar navbar-expand-lg bg-light fixed-top">
			<div class="container">
				<a class="navbar-brand" href="<?php echo home_url( '/' ); ?>"><img src="<?=$logo?>" alt="" class="logo"></a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<?php
				wp_nav_menu([
					'theme_location'  => 'general',
					'container'       => '',
					'container_id'    => '',
					'container_class' => '',
					'menu_id'         => false,
					'menu_class'      => 'nav navbar-nav ml-auto',
					'depth'           => 2,
					'fallback_cb'     => 'bs5navwalker::fallback',
					'walker'          => new bs5navwalker()
				]);
				?>
					<a href="contacto" class="btn-special green ms-auto">Contacto</a>
				</div>
			</div>
		</nav>
	</div>