<?php
/*
 *   GALERIA WERSJA PODSTAWOWA 1
 *
 * 
 */
?>


<?php
				
	$gallery_page = get_post(get_the_ID());
	preg_match_all('/\d+/', $gallery_page->post_content, $matches);
	$ids = $matches[0];
	$random10 = array_slice($ids, 0, 12);
?>
		
			<article class="container" style="" >
				<div class="single-content" style="">
					<div class="baner-single " style="">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Strona Główna</a>
						<div class="align-text">
						<?php
						$content=get_the_content(); 
						echo rrremove_shortcode($content);
						?>
						</div>
					</div>
	
					

				<?php $wcat=$kategoria; ?>
					<h3 class="col-md-12 text-center" style="padding:30px 0;"><?php the_title(); ?></h3>
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
										<h5 style="font-size:13px;min-height:32px;font-weight:lighter;line-height:14px;">
											<?php
												$attachment = get_post( $attachment_id );
												print $attachment->post_excerpt; 
											?>
										</h5>
								
									</a>
								</div>
								</div>
						<?php
							}
							
						} 
				?>
					
						<div style="clear: both;"></div>

				</div>	
			</article>

	