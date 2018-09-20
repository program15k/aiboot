<?php
/*
Template Name: MULTI GALERY
 * The main template file
 *
 * @package airboot41
 */
?>
<?php get_header(); ?>



<section id="karuzela">
	<div  class="container-fluid tlo-nofixed" style="position:relative;padding:50px 0;background-image:url();">
	<div class="container">
		<div class="col-md-12">
			<h2 class="" style="width:100%;text-align:left;">GALERIA</span></h2>
			<div class="przekladka" style="margin-bottom:60px;"></div>
		</div>
		<div class="col-md-12">
			<div class="row">
				<?php $cat="galeria"; ?> 
				<?php $the_query = new WP_Query(array('order' => 'ASC','category_name'=> $cat,'posts_per_page' => -1));?>
					<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
						<?php if(get_the_post_thumbnail_url()!=""): ?>
							<div class="col-md-4 col-sm-6">
								<a href="<?php the_permalink(); ?>">
									<div class="realizacja" style="border:1px solid #bbb;margin-bottom:30px;">	
										<h6 style="text-align:center;padding:15px 0;margin-bottom:0;background:#efbc0c;"><?php the_title(); ?></h6>
										<div class="icon-realizacja" style="background-image:url(<?php the_post_thumbnail_url('medium'); ?>);"></div>
										<span style="display:inline-block; padding:3px 0;margin-left:5px;border-bottom:1px solid #ccc;"><? echo get_the_excerpt(); ?></span>
										<p><? echo get_post_excerpt(120); ?></p>
									</div>
								</a>
							</div>
						<?php endif; ?>
					<?php endwhile; ?>
				<?php rewind_posts(); ?>	
			</div>
		</div>
	</div>
</div>
</section>




<?php get_footer(); ?>	
	