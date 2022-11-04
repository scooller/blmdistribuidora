<section id="inicio" class="container-fluid g-0 wow animate__fadeIn">
    <div class="owl-carousel owl-theme owl-header h-100">
    	<?php 
        $nn=0;
    	$query = new WP_Query(array('post_type' => 'banner', 'post_status' => 'publish', 'posts_per_page' => -1, 'order' => 'ASC', 'orderby' => 'menu_order'));
    	if ( $query->have_posts() ): while ( $query->have_posts() ): $query->the_post();
    		$content = get_the_content( );
            $nn++;
			//$featured_img_url = get_the_post_thumbnail_url($post->ID, 'full');
            $foto=get_field('imagen',$post->ID);
			if( isMobile() && get_field('imagen_mobile',$post->ID) ){
				$foto=get_field('imagen_mobile',$post->ID);
			}
			if(get_field('url_destino',$post->ID)): 
		?>
    	<a href="<?php echo get_field('url_destino',$post->ID); ?>" target="_blank" class="img-carousel h-100 d-flex align-items-center img-<?=$post->ID;?>" style="display:block; background-image: linear-gradient(rgba(0,0,0,0), rgba(0,0,0,.3)), url(<?=$foto;?>);">
            <div class="container"><?=do_shortcode(wpautop($content));?></div>
        </a>
		<?php else: ?>
		<div class="img-carousel h-100 d-flex align-items-center img-<?=$post->ID;?>" style="background-image: linear-gradient(rgba(0,0,0,0), rgba(0,0,0,.3)), url(<?=$foto;?>);">
            <div class="container"><?=do_shortcode(wpautop($content));?></div>
        </div>
    <?php endif; endwhile; endif; wp_reset_query(); ?>
    </div>
</section>