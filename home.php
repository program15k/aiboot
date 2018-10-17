<?php
/*
Template name: aiboot42
*/
?>
<?php get_header(); ?>
<!--  BANER  -->
<div class="baner" style="position:relative; height:100vh;">
	<?php echo do_shortcode(get_theme_mod( 'slider_baner'));?>
</div>

<main>
<div style="position:relative;">
 <?php get_template_part('menu-dolne','php');?>
</div>

<!--  GALERIA  -->
<section id="karuzela" style="background-color:#fff;">
	<div  class="container-fluid tlo-nofixed" style="position:relative;padding:50px 0;background-image:url();">
	<div class="container">
		<div class="col-md-12">
		
			<h2>GALERIE</h2>
			<h2>Nagłówek</h2>
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

<!--  BLOG -->


<section id="karuzela">
	<div  class="container-fluid tlo-nofixed" style="position:relative;padding:50px 0;background-image:url();">
	<div class="container">
		<div class="col-md-12">
			<h2 class="" style="width:100%;text-align:left;">BLOG</h2>
			<div class="przekladka" style="margin-bottom:60px;"></div>
		</div>
		<div class="col-md-12">
			<div class="row">
				<?php $cat="blog"; ?> 
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
										<a class="btn" style="margin:10px;" href="#">WIĘCEJ</a>
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



<!--  PARALLAXA -->


	<?php $wcat='' ?>
		<?php $the_query = new WP_Query(array('order' => 'DESC','category_name'=> $wcat,'posts_per_page' => 1));?>
		<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
		<div id="onas" class="container-fluid parallax tlo"  data-speed="3" style="background-image:url(<?php the_post_thumbnail_url(); ?>);background-color:#fff;border-top:1px solid #333;">
				<div class="container" style="padding:60px 0;">
					<div class="col-sm-offset-6 col-sm-6">
					<h2 style=""><?php the_title(); ?></h2>
						<?php the_content(); ?>
					</div>
			</div>
		</div>	
		<?php endwhile; ?>
		<?php rewind_posts(); ?>	



<!--  KARUZELA  -->

<section id="karuzela">
	<div  class="container-fluid" style="position:relative;padding:50px 0;background-color: #333;">
	<?php $cat='';?>
	<?php $the_query = new WP_Query(array('order'=>'ASC','category_name'=> $cat,'posts_per_page' => 1));?>
	<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
	<h2 class="text-cien-ciemne" style="text-align: center;margin-bottom: 80px;padding-top: 10px;"><?php the_title(); ?></h2>
	<?php endwhile; ?>
	<?php rewind_posts(); ?>	
	
				<div id="karuzela-carousel" class="owl-carousel" >
						<?php $cat='';?>
						<?php $the_query = new WP_Query(array('category_name'=> $cat,'posts_per_page' => -1));?>
						<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
							<div class="slide" style="position:relative;">	
								<a data-lightbox="example-set" data-title="" href="<?php the_post_thumbnail_url() ?>">
								<div class="one-karuzela tlo-nofixed" style="background-image:url(<?php the_post_thumbnail_url() ?>);">
									<div class="galeria-wrap"></div>	
								</div>
								</a>
							</div>		
						<?php endwhile; ?>
						<?php rewind_posts(); ?>				
				</div>						
	
</div>
</section>




<!--  MAPA  -->	
<div id="mapa" style="height:400px;width:100%;">
</div>	
<div id="punkt" style="position:fixed;bottom:1px;background-color:red;z-index:1111;width:0;height:0;"></div>
</main>
<?php get_footer(); ?>