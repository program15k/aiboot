
<footer class="container-fluid">
	
			<div class="row">
				<div class="social-bar" style="float:none;margin:0 auto;margin-top:20px;">
					<a href=""><i class="fab fa-facebook-square"></i></a>
					<a href=""><i class="fab fa-twitter"></i></a>
					<a href=""><i class="fab fa-google-plus-g"></i></a>
					<a href=""><i class="fab fa-instagram"></i></a>
				</div>
				
			</div>
			<div class="row">
			<div id="menu-dolne" style="">
				<?php
					wp_nav_menu( array(
						'after'				=>  '<span class="podkreslacz"></span>',
						'menu'              => 'primary',
						'theme_location'    => 'primary',
						'depth'             =>  5,
						'menu_class'        => 'menu-dolne ml-auto mt-2 mt-lg-0',
						'fallback_cb'       => 'wp-bootstrap-navwalker::fallback',
						'walker'            => new WP_Bootstrap_Navwalker())
					); 
				?>
				</div>
			</div>
			<div class="row">
					<div class="col-md-6 col-sm-6 text-center copybar" >2018</div>
					<div class="col-md-6 col-sm-6 text-center copybar"><a class="ai-link" href="https://agencjainnowacji.pl/strony-www/">Agencja Innowacji</a></div>
			</div>
</footer>
 <div id="scrolltop" class="">
	<a  href="#top-top" style="text-decoration:none;" class="fa fa-chevron-up"></a>
</div>
 
<?php wp_footer(); ?>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAhb08Qx7D95zu3ITLxj9ybovWkfHeEbcc"
  type="text/javascript"></script>
  
  <script>
  	
  </script>
</body>
</html>