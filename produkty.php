<?php
/*
Template Name: produkty
 * The main template file
 *
 * @package aiboot42
 */
?>


<?php get_header(); ?>
<?php while(have_posts()) : the_post(); ?>
<?php $kategoria = get_post_meta( get_the_ID(), 'kategoria', true ); ?>
		<?php $tresc=get_the_content();?>
		<?php $tyt= get_the_title(); ?>
			<?php endwhile; ?>
			<?php rewind_posts(); ?>

<?php if( has_post_thumbnail())
	{
	?>		
			
		<div class="single-baner container-fluid" style="background-image:url('<?php the_post_thumbnail_url(); ?>');">
		</div>	
		<?php } ?>			
			


			
		
<div class="">		
	
	
			<article class="single-post"  style="background-image:url(<?php echo get_theme_mod( 'img_single' ); ?>);" >
				<div class="container-fluid"  style="margin-top:90px;min-height:90vh;background-color:rgba(255,255,255,.9);">
				<div class="single-content">
					<div class="baner-single ">
						<div class="single-header">
							<h2 class="padding30"style="text-align:center;"><?php echo $tyt ;?></h2>
						</div>
					</div>
					<div class="">
					

					<?php $wcat=$kategoria; ?>
					<div class="">
	
						<?php $the_query = new WP_Query(array('order' => 'DESC','category_name'=> $wcat,'posts_per_page' => -1));?>
						<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
							
							<div class="one-box-wrap col-sm-4" style="">
								<div class="one-box">
								<div class="one-box-ico" style="background-image:url(<?php the_post_thumbnail_url(); ?>);"></div>
									<div class="one-box-header">
									<h4 style="color: #fff;"><?php the_title(); ?></h4>
									<a href="<?php the_permalink();?>" class="guzik guzik-wiecej">CZYTAJ WIĘCEJ</a>
									</div>
								</div>
							</div>
							
							
						<?php endwhile; ?>
						<?php rewind_posts(); ?>	
						<div style="clear: both;"></div>
					</div>		
		
					
					</div>
				</div>	
				</div>
			</article>
			
<div id="map" style="height:0;width:0;">
	</div>
</div>
<?php get_footer(); ?>	