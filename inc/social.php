<?php
/**
 *
 * Wyświetla ikony społecznościowe
 *
 */
?>
<ul class="">		
	<?php if ( get_theme_mod( 'facebook' ) ) : ?>
	<li><a  href="<?php echo esc_url( get_theme_mod( 'facebook' ) ); ?>"  class="fab fa-facebook-f" title="Facebook"  target="_blank"></a></li>						
	<?php endif; ?>
	<?php if ( get_theme_mod( 'flickr' ) ) : ?>
	<li><a  href="<?php echo esc_url( get_theme_mod( 'flickr' ) ); ?>"  class="fab fa-flickr" title="Flickr"  target="_blank"></a></li>					
	<?php endif; ?>
	<?php if ( get_theme_mod( 'googleplus' ) ) : ?>
	<li><a  href="<?php echo esc_url( get_theme_mod( 'googleplus' ) ); ?>"  class="fab fa-google-plus-g" title="Googleplus"  target="_blank"></a></li>			
	<?php endif; ?>
	<?php if ( get_theme_mod( 'instagram' ) ) : ?>
	<li><a  href="<?php echo esc_url( get_theme_mod( 'instagram' ) ); ?>"  class="fab fa-instagram" title="Instagram"  target="_blank"></a></li>			
	<?php endif; ?>
	<?php if ( get_theme_mod( 'linkedin' ) ) : ?>
	<li><a  href="<?php echo esc_url( get_theme_mod( 'linkedin' ) ); ?>"  class="fab fa-linkedin-in" title="Linkedin"  target="_blank"></a></li>							
	<?php endif; ?>
	<?php if ( get_theme_mod( 'pinterest' ) ) : ?>
	<li><a  href="<?php echo esc_url( get_theme_mod( 'pinterest' ) ); ?>"  class="fab fa-pinterest-p" title="Pinterest"  target="_blank"></a></li>
	<?php endif; ?>
	<?php if ( get_theme_mod( 'skype' ) ) : ?>
	<li><a  href="<?php echo esc_url( get_theme_mod( 'skype' ) ); ?>"  class="fab fa-skype" title="Skype"  target="_blank"></a></li>						
	<?php endif; ?>
	<?php if ( get_theme_mod( 'twitter' ) ) : ?>
	<li><a  href="<?php echo esc_url( get_theme_mod( 'twitter' ) ); ?>"  class="fab fa-twitter" title="Twitter"  target="_blank"></a></li>			
	<?php endif; ?>
	<?php if ( get_theme_mod( 'vimeo' ) ) : ?>
	<li><a  href="<?php echo esc_url( get_theme_mod( 'vimeo' ) ); ?>"  class="fab fa-vimeo-v" title="Vimeo"  target="_blank"></a></li>			
	<?php endif; ?>
	<?php if ( get_theme_mod( 'youtube' ) ) : ?>
	<li><a  href="<?php echo esc_url( get_theme_mod( 'youtube' ) ); ?>"  class="fab fa-youtube-square" title="Youtube"  target="_blank"></a></li>						
	<?php endif; ?>
</ul>