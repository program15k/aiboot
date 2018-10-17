<!--  TOP BAR SOCIAL  -->
<div id="top-bar" class="container-fluid" style="border: 1px solid blue;">
	<div class="container">
		<div class="row" style="padding-right:20px;padding-left:20px;">
			<div class="">
				<i class="fa fa-phone"></i><a href="tel:<?php echo get_theme_mod( 'tel_kontakt' ); ?>">
					<?php echo get_theme_mod( 'tel_kontakt' ); ?></a>
			</div>
			<div class="social-bar" style="">
				<a href=""><i class="fab fa-facebook-square"></i></a>
				<a href=""><i class="fab fa-twitter"></i></a>
				<a href=""><i class="fab fa-google-plus-g"></i></a>
				<a href=""><i class="fab fa-instagram"></i></a>
			</div>
		</div>
	</div>
</div>

<!-- Static navbar -->
<nav id="nav" class="nav navbar navbar-expand-lg navbar-light affix-top" style="border: 1px solid red;">
		<!-- logo -->
		<a class="navbar-brand-img" href="<?php echo esc_url( home_url( '/' ) ); ?>">
		<img src="<?php echo get_theme_mod( 'logo_menu' );?>" alt="logo" style="width:140px;">
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarTogglerDemo01"
	 aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<!-- Brand -->
	<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">Hidden brand</a>
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
		<form class="searchmenubox" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<input class="searchinput" type="text" placeholder="Szukaj.." name="s">
			<button class="searchbutton" type="submit"><i class="fa fa-search" style="color:white;"></i></button>
		</form>
	</div>
</nav>