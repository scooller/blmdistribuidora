<?php get_header(); ?>
<div data-bs-spy="scroll" data-bs-target="#menu" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy" tabindex="0">
<?php get_template_part( 'part', 'banner' ); ?>
<section id="nosotros">
	<div class="container">
		<h2 class="title text-md-start text-center wow animate__fadeInDown"><?php the_field('titulo_nosotros'); ?></h2>
		<div class="txt text-md-start text-center wow animate__fadeInLeft" data-wow-delay=".5s"><?php the_field('contenido_nosotros'); ?></div>		
	</div>
	<div class="deco ms-auto d-none d-md-block shadow wow animate__fadeInRight" data-wow-delay=".8s" style="background-image: url(<?php the_field('imagen_fondo'); ?>)"></div>
</section>
<section id="servicios">
	<div class="container">
		<h4 class="title text-center wow animate__fadeInDown"><?php the_field('titulo_servicios'); ?></h4>
		<div class="txt text-center wow animate__fadeInRight"><?php the_field('contenido_servicios'); ?></div>			
		<div class="row servicios">
		<?php $nn=0; $query = new WP_Query(array('post_type' => 'servicio', 'post_status' => 'publish', 'posts_per_page' => -1, 'order' => 'ASC', 'orderby' => 'menu_order'));
			if ( $query->have_posts() ): while ( $query->have_posts() ): $query->the_post(); ?>
			<div class="col-6 col-md-4">
				<div class="box shadow d-flex align-items-center  justify-content-center text-center wow animate__flipInX" data-wow-delay="<?php echo .6*$nn ?>s">
					<span class="deco d-flex align-items-center"></span>
					<div class="cont">
						<img src="<?php the_field('icono'); ?>" class="img-fluid icono">
						<h5 class="mini-title"><?php the_title(); ?></h5>
					</div>
				</div>
			</div>
		<?php $nn++; endwhile; endif; wp_reset_query(); ?>
		</div>
	</div>
</section>
<?php if( have_rows('datos') ): ?>
<section id="informacion">
	<div class="container">
		<div class="row">
			<?php $nn=0;while( have_rows('datos') ): the_row(); ?>
			<div class="col-md-4">
				<div class="box text-center shadow2 wow animate__zoomIn" data-wow-delay="<?php echo .6*$nn ?>s">
					<h3 class="num"><?php the_sub_field('pre_num'); ?><span class="counter"><?php the_sub_field('valor'); ?></span><?php the_sub_field('post_num'); ?></h3>
					<h5 class="green"><?php the_sub_field('titulo'); ?></h5>
					<div class="txt d-none"><?php the_sub_field('contenido'); ?></div>
				</div>
			</div>
			<?php $nn++;endwhile; ?>
		</div>
	</div>
</section>
<?php endif; ?>
<section id="productos">	
	<div class="container position-relative text-center">
		<h1 class="title-big wow animate__fadeInDown">PRODUCTOS</h1>
		<div id="carouselProductos" class="carousel slide shadow2 wow animate__fadeInUp" data-bs-ride="carousel">
			<div class="carousel-inner">
				<?php $query = new WP_Query(array('post_type' => 'producto', 'post_status' => 'publish', 'posts_per_page' => -1, 'order' => 'ASC', 'orderby' => 'menu_order'));
    			if ( $query->have_posts() ): $nn=0; while ( $query->have_posts() ): $query->the_post(); $n++; 
					$categories = get_the_category();
				?>
				<div class="carousel-item <?php echo $n==1?'active':''; ?>">
					<div class="producto text-start">
						<strong class="tag text-uppercase"><?php echo esc_html( $categories[0]->name ); ?></strong>
						<div class="row">
							<div class="col-md-5 order-m-0 order-1 d-flex align-items-center">
								<div class="cont">
									<img src="<?php the_field('logo_producto'); ?>" class="logo-prod">
									<div class="txt"><?php the_content(); ?></div>
								</div>
								<div class="control position-absolute">
									<button class="carousel-control-prev" type="button" data-bs-target="#carouselProductos" data-bs-slide="prev">
										<i class="fa-solid fa-circle-chevron-left"></i>
									</button>
									<button class="carousel-control-next" type="button" data-bs-target="#carouselProductos" data-bs-slide="next">
										<i class="fa-solid fa-circle-chevron-right"></i>
									</button>
								</div>
							</div>
							<div class="col-md-7 order-m-1 order-0">
								<img src="<?php the_field('producto_img'); ?>" class="prod">
							</div>
						</div>
					</div>
				</div>
				<?php endwhile; endif; wp_reset_query(); ?>
			</div>
		</div>
		<?php if( get_field('boton_link') ): ?>
		<a href="<?php echo get_field('boton_link')["url"]; ?>" target="<?php echo get_field('boton_link')["target"]; ?>" class="btn btn-primary mx-auto btn-cat wow animate__flipInX" data-wow-delay=".5s"><?php echo get_field('boton_link')["title"]; ?></a>
		<?php endif; ?>
	</div>
</section>
<section id="clientes-y-proveedores">
	<div class="container position-relative text-center">
		<div class="clientes">
			<h2 class="title text-start animate__fadeInDown">Nuestros<span class="green d-block">CLIENTES</span></h2>
			<div class="owl-carousel owl-theme logos fila wow animate__fadeInUp" data-wow-delay=".5s">
				<?php $query = new WP_Query(array('post_type' => 'cliente', 'post_status' => 'publish', 'posts_per_page' => -1, 'order' => 'ASC', 'orderby' => 'menu_order'));
    			if ( $query->have_posts() ): $nn=0; while ( $query->have_posts() ): $query->the_post(); $n++; ?>				
				<div class="cont-logo">
					<img src="<?php the_field('imagen') ?>" class="img-fluid round">
				</div>
				<?php endwhile; endif; wp_reset_query(); ?>
			</div>
		</div>
		<div class="proveedores">
			<h2 class="title text-start wow animate__fadeInDown">Nuestros<span class="green d-block">PROVEEDORES</span></h2>
			<div class="owl-carousel owl-theme logos fila wow animate__fadeInUp" data-wow-delay=".5s">
				<?php $query = new WP_Query(array('post_type' => 'proveedor', 'post_status' => 'publish', 'posts_per_page' => -1, 'order' => 'ASC', 'orderby' => 'menu_order'));
    			if ( $query->have_posts() ): $nn=0; while ( $query->have_posts() ): $query->the_post(); $n++; ?>				
				<div class="cont-logo">
					<img src="<?php the_field('imagen') ?>" class="img-fluid round">
				</div>
				<?php endwhile; endif; wp_reset_query(); ?>
			</div>
		</div>
	</div>
</section>
<?php
	$query = new WP_Query(array('post_type' => 'testimonio', 'post_status' => 'publish', 'posts_per_page' => -1, 'order' => 'ASC', 'orderby' => 'menu_order'));
	if ( $query->have_posts() ):
?>
<section id="testimonios" class="text-center">	
	<h2 class="title wow animate__fadeInDown">LO QUE OPINAN <span class="green">DE NOSOTROS</span></h2>
	<div class="testimonios owl-carousel owl-theme mx-auto wow animate__fadeInUp" data-wow-delay=".5s">
		<?php $nn=0; while ( $query->have_posts() ): $query->the_post(); $n++; ?>
		<div class="container box shadow2">
			<div class="avatar mx-auto" style="background-image: url(<?php the_field('imagen') ?>)"></div>
			<div class="cont"><?php the_content(); ?></div>
			<strong class="titulo"><?php the_title(); ?><br><span class="green"><?php the_field('cliente') ?></span></strong>
		</div>
		<?php endwhile; ?>
	</div>
</section>
<?php endif; wp_reset_query(); ?>
<?php get_footer(); ?> 