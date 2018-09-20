<?php
/*
Template Name: Search Page
*/
?>
<?php
get_header(); ?>

<div class="container" style="min-height:85vh;">
	<div class="row">
	<div  class="col-md-12">
		<header style="margin-top:100px;">
			<h2 style="text-align:center;padding:70px 10px 40px 10px">Szukana fraza: <span><?php the_search_query(); ?>
			</span></h2>
		</header>

			<div class="col-md-offset-2 col-sm-offset-2 col-xs-offset-2 col-md-8 col-sm-8 col-xs-8 ">
						<ul style="padding-bottom:50px;">
						
						<?php while (have_posts()) : the_post(); ?>
							<li style="padding-bottom:30px;"><b><?php the_title(); ?></b>
							<?php echo get_post_excerpt(150);?>...
							<a style="" href="<?php the_permalink();?>">Więcej</a>
							</li>
						<?php endwhile; ?>
						<?php rewind_posts(); ?>	
						</ul>
					</div>	
					</div>
	</div>
</div>


		

<?php get_footer();