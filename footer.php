<?php
$logo=get_sitelogo();
?>
	<footer id="contacto" style="background-image: url(<?php the_field('fondo_footer','option') ?>)">
		<div class="container">
			<div class="row">
				<div class="clm col-12 col-md-4 min-logo wow animate__fadeInLeft">
					<img src="<?php echo $logo ?>" class="footer-logo">
					<div class="txt"><?php the_field('footer_texto','option'); ?></div>
				</div>
				<div class="clm d-none d-md-block col-md-1"></div>
				<?php $nn=0;if( have_rows('contactos','option') ): while( have_rows('contactos','option') ): the_row(); ?>
				<div class="clm col-6 col-md-3 wow animate__fadeInUp" data-wow-delay="<?php echo .8*$nn ?>s">
					<strong class="green mini-title"><?php the_sub_field('titulo'); ?></strong>
					<div class="dire"><?php the_sub_field('direccion'); ?></div>
					<?php if( have_rows('emails') ): ?>
					<div class="list-group">
						<?php while( have_rows('emails') ): the_row(); ?>
						<a href="mailto:<?php the_sub_field('email'); ?>" class="green list-group-item list-group-item-action"><?php the_sub_field('email'); ?></a>
						<?php endwhile; ?>
					</div>
					<?php endif; ?>
					<?php if( have_rows('telefonos') ): ?>
					<div class="list-group">
						<?php while( have_rows('telefonos') ): the_row(); ?>
						<a href="tel:+56<?php the_sub_field('telefono'); ?>" class="green list-group-item list-group-item-action">+56 <?php the_sub_field('telefono'); ?></a>
						<?php endwhile; ?>
					</div>
					<?php endif; ?>
				</div>
				<?php $nn++; endwhile; endif; ?>
			</div>
		</div>
	</footer>
</div>
<?php wp_footer(); ?>
<?php the_field('codigo_footer','option'); 

$tiempo_espera=(intval(get_field('tiempo_espera','option'))/1000)+1;
?>
<style type="text/css">
.owl-carousel .owl-item .img-carousel{
    transition: background-size <?php echo $tiempo_espera; ?>s ease-in-out;
    -moz-transition: background-size <?php echo $tiempo_espera; ?>s ease-in-out;
    -ms-transition: background-size <?php echo $tiempo_espera; ?>s ease-in-out;
    -o-transition: background-size <?php echo $tiempo_espera; ?>s ease-in-out;
    -webkit-transition: background-size <?php echo $tiempo_espera; ?>s ease-in-out;
}
@media (max-width: 767.98px){
}
</style>
<script type="text/javascript">
    var owl = $('.owl-header');
    owl.owlCarousel({
        loop: <?php echo (get_field('loop','option'))?'true':'false'; ?>,
        autoplay: true,
        autoplayTimeout: <?php echo $tiempo_espera; ?>,
        autoplayHoverPause: <?php echo (get_field('pausar_mouse','option'))?'true':'false'; ?>,
        margin: 0,
        nav: <?php echo (get_field('navegador','option'))?'true':'false'; ?>,
        dots: <?php echo (get_field('puntos','option'))?'true':'false'; ?>,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });
	
	$('.logos').owlCarousel({
        loop: true,
        autoplay: true,
        margin: 0,
        nav: false,
        responsive: {
            0: {
				dots: true,
                items: 4
            },
            1000: {
				dots: false,
                items: 6
            }
        }
    });
	
	$('.testimonios').owlCarousel({
		loop:true,
		margin:50,
		nav:false,
		items:1
	})
</script>
</body>
</html>