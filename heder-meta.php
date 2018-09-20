<?php 
	if(is_page() || is_single())
	{ 
		$description = get_post_meta( get_the_ID(), 'opis', true );
		if($description=='') $description=get_bloginfo('description');
	?>
		<title><?php the_title() ?></title>
		<meta name="keywords" content="<?php echo $keywords = get_post_meta( get_the_ID(), 'slowakluczowe', true ) ?>">
		<meta name="description" content="<?php echo $description ?>">
	<?php } 
	else
	{?>
		<title><?php bloginfo("nazwa");  ?> <?php wp_title();  ?></title>
		<meta name="description" content="<?php bloginfo('description');?>">
		<meta name="keywords" content="">
<?php } ?>