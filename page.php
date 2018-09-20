<?php get_header(); ?>
	<?php while(have_posts()) : the_post(); ?>
	<?php $kategoria = get_post_meta( get_the_ID(), 'kat', true ); ?>
		<article class="single-post single-page" style="margin-top:150px;background-image:url(<?php echo get_theme_mod( 'img_single' ); ?>);">
		<div class="container-fluid"  style="min-height:90vh;background-color:rgba(255,255,255,.9);">
			<div class="container">
				<div class="row">
					<div class="col-md-12 content-post" >
						<?php the_content();?>
					</div>
				</div>
			</div>	
		</div>
		</article>
	<?php endwhile; ?>
<?php get_footer(); ?>