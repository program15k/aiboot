<?php get_header(); ?>
<div style="background-image:url(<?php echo get_template_directory_uri(); ?>/img/cube.jpg);width:100%;height:200px;">
	</div>
		<article class="single-post single-page" style="margin-top:40px;background-image:url(<?php echo get_theme_mod( 'img_single' ); ?>);">
		<div class="container-fluid"  style="min-height:90vh;background-color:rgba(255,255,255,.9);">
			<div class="container">
				<div class="row">
				<?php while(have_posts()) : the_post(); ?>
					<div class="col-lg-8 col-md-12 content-post" >
						<h1 class="" style="margin-bottom:30px;"><?php the_title();?></h1>
						<div class="przekladka" style="margin-bottom:30px;"></div>
				
					
						
						
					<?php
						$gallery_page = get_post(get_the_ID());
						preg_match_all('/\d+/', $gallery_page->post_content, $matches);
						$ids = $matches[0];
						$random10 = array_slice($ids, 0, 12);
					?>
		
			<div class="container" style="" >
				<div class="single-content" style="">
					<div class="baner-single " style="">
						<div class="align-text">
						<?php
						$content=get_the_content(); ?>
						<p><?php echo rrremove_shortcode($content); ?></p>
						
						</div>
					</div>
	
					

				<?php $wcat=$kategoria; ?>
						<?php
						foreach ($ids as $adres) 
						{
							
							$attachment_id = $adres;
							$image_attributes_medium = wp_get_attachment_image_src( $attachment_id, 'medium' );
							$image_attributes = wp_get_attachment_image_src( $attachment_id,'large' );
							$image_meta = wp_get_attachment_metadata( $attachment_id );
							if( $image_attributes ) 
							{
								?>
								<div class="one-cert-wrap">
									<div style="padding:3px;border:1px solid #ddd;margin-bottom:30px;">
									<a class="example-image-link" data-lightbox="example-set" data-title="" href="<?php echo $image_attributes[0]; ?>" >
										<div class="one-usluga" style="background-image:url(<?php echo $image_attributes_medium[0]; ?>);" >
										
										</div>
										
								
									</a>
								</div>
								</div>
						<?php
							}
							
						} 
				?>
					
						<div style="clear: both;"></div>

				</div>	
			</div>	
						
						
						
					</div>
				<?php endwhile; ?>				
						
					
					<div class="col-lg-4 content-post" >
						
		<?php 
		$inny="";
			if(in_category('realizacje'))
			{
				//get_template_part( 'content', 'realizacje' );
			$inny="galeria1";				
			}
		
			if(in_category('oferta'))
			{
				//get_template_part( 'content', 'oferta' ); 
			}
		?>
						

					</div>
						
						
					</div>
				</div>
			</div>	
		
		</article>

<!--  MAPA  -->
	<div id="map" style="width:100%;height:0;" ></div>
<?php get_footer(); ?>