<?php get_header('page'); ?>
<div data-bs-spy="scroll" data-bs-target="#menu" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy" tabindex="0">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); $ID=get_the_ID();
?>
<section id="sobre-nosotros" class="text-center position-relative" style="background-image: url(<?php the_field('imagen_fondo') ?>)">
	<div class="container d-flex justify-content-center align-items-center">
		<div class="cont">
			<h1 class="title text-uppercase text-center wow animate__fadeInDown"><?php the_title(); ?></h1>
		</div>
	</div>
	<a href="#inspiracion" class="btn btn-circle mx-auto position-absolute d-flex align-items-center justify-content-center wow animate__shakeY" data-wow-iteration="-1" data-wow-delay="2s"><i class="fa-sharp fa-solid fa-chevron-down"></i></a>
</section>
<section id="inspiracion">
	<div class="container">
		<div class="row">
			<div class="col-md-5 mb-2 d-flex align-items-center">
				<div class="text-md-start text-center w-100"><h2 class="title text-md-start text-center wow animate__fadeInDown"><?php the_field('titulo_inspira') ?></h2>
				<a href="<?php echo get_field('link_btn_inspira')["url"]; ?>" target="<?php echo get_field('link_btn_inspira')["target"]; ?>" class="btn btn-primary mb-2 wow animate__zoomIn"><?php echo get_field('link_btn_inspira')["title"]; ?></a></div>
			</div>
			<div class="col-md-7 mb-2 d-flex align-items-center">
				<div class="txt wow animate__fadeInRight"><?php the_field('contenido_inspira') ?></div>
			</div>
		</div>
	</div>
</section>
<?php $logo=get_sitelogo(false); ?>
<section id="nuestra-historia" style="background-image: url(<?php the_field('imagen_fondo_extras') ?>)">
	<div class="contenedor container-fluid g-0 position-relative d-flex align-items-center justify-content-center">
		<h1 class="title text-md-start text-center text-white wow animate__fadeInDown position-absolute"><?php the_field('titulo_historia') ?></h1>
		<img src="<?php the_field('imagen_fondo_historia') ?>" class="img">
	</div>
	<div class="container text-center">		
		<div class="cont wow animate__fadeInUp"><?php the_field('contenido_historia') ?></div>
		<div class="row align-items-stretch">
			<?php $nn=0;while( have_rows('extras') ): the_row(); ?>
			<div class="col-md-4 mb-2">
				<div class="box h-100 text-center shadow2 wow animate__zoomIn" data-wow-delay="<?php echo .6*$nn ?>s">
					<h5 class="mini-title green"><?php the_sub_field('titulo'); ?></h5>
					<div class="txt"><?php the_sub_field('contenido'); ?></div>
				</div>
			</div>
			<?php $nn++;endwhile; ?>
		</div>
	</div>
</section>
<section id="nuestro-valor">
	<div class="container">	
		<div class="row">
			<div class="col-md-5 mb-2 d-flex align-items-center">
				<div class="text-md-start text-center w-100"><h2 class="title text-md-start text-center wow animate__fadeInLeft"><?php the_field('titulo_valor') ?></h2></div>
			</div>
			<div class="col-md-7 mb-2 d-flex align-items-center">
				<div class="txt wow animate__fadeInRight"><?php the_field('contenido_valor') ?></div>
			</div>
		</div>
	</div>
</section>
<?php endwhile; endif; ?>
<script type="text/javascript">
$(function() {
	var targetOffset = $("#inspiracion").offset().top;
	var $w = $(window).scroll(function(){
		if ( $w.scrollTop() > targetOffset ) {
			$('#menu').addClass('bg-light');
		}else{
			$('#menu').removeClass('bg-light');
		}
	});	
});
</script>
<?php get_footer(); ?> 