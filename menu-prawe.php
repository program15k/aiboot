
 <!-- MENU BOCZNE PREAWE-->
   <button class="menu-otwieracz" type="button" >
		<i class="fa fa-bars"></i>
	</button>
	<button class="menu-zamykacz" type="button" >
		<i class="fa fa-times"></i>
	</button>
  <nav id="" class="nav-prawe" style="border: 1px solid red;">
	
  <div class="" id="">
	<?php
	if(is_home())
			{
				wp_nav_menu( array(
					'menu'              => 'primary',
					'theme_location'    => 'primary',
					'depth'             =>  5,
					'menu_class'        => 'menu-prawe',
					'fallback_cb'       => 'wp-bootstrap-navwalker::fallback',
					'walker'            => new WP_Bootstrap_Navwalker())
				); 
			}
			else
			{
				wp_nav_menu( array(
					'menu'              => 'secondary',
					'theme_location'    => 'secondary',
					'depth'             =>  5,
					'menu_class'        => 'menu-prawe',
					'fallback_cb'       => 'wp-bootstrap-navwalker::fallback',
					'walker'            => new WP_Bootstrap_Navwalker())
				); 
			}
			?>
			
			
			<div class="sociale">
			<i class="fa fa-phone"></i><a href="tel:<?php echo get_theme_mod( 'tel_kontakt' ); ?>"><?php echo get_theme_mod( 'tel_kontakt' ); ?></a>
			</div>
			<div class="social-bar" style="">
				<a href=""><i class="fab fa-facebook-square"></i></a>
				<a href=""><i class="fab fa-twitter"></i></a>
				<a href=""><i class="fab fa-google-plus-g"></i></a>
				<a href=""><i class="fab fa-instagram"></i></a>
				
			</div>
	<form class="searchmenubox" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<input  class="searchinput" type="text" placeholder="Szukaj.." name="s">
		<button class="searchbutton" type="submit"><i class="fa fa-search" style="color:white;"></i></button>
	</form>

  </div>
</nav>   	


