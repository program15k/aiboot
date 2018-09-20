 <!--  MENU DONE  -->
 

 
 <!-- Static navbar -->
  <nav id="nav-dolne" class="nav navbar navbar-expand-lg navbar-light affix-top" style="border: 1px solid red;">
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	  </button>
	  
  <div class="collapse navbar-collapse" id="navbarToggler">
    
	
 
	<?php
	if(is_home())
			{
				wp_nav_menu( array(
					'menu'              => 'primary',
					'theme_location'    => 'primary',
					'depth'             =>  5,
					'menu_class'        => 'navbar-nav ml-auto mt-2 mt-lg-0',
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
					'menu_class'        => 'navbar-nav mr-auto mt-2 mt-lg-0',
					'fallback_cb'       => 'wp-bootstrap-navwalker::fallback',
					'walker'            => new WP_Bootstrap_Navwalker())
				); 
			}
			?>
			<div class="social-bar" style="">
				<a href=""><i class="fab fa-facebook-square"></i></a>
				<a href=""><i class="fab fa-twitter"></i></a>
				<a href=""><i class="fab fa-google-plus-g"></i></a>
				<a href=""><i class="fab fa-instagram"></i></a>	
			</div>

  </div>
</nav>   	




 