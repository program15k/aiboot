<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta  name="viewport"  content="width=device-width" />
<meta name="author" content="agencjainnowacji.pl - marcin">
<?php get_template_part('heder-meta','php');?> 	
<link  rel="pingback"  href="<?php bloginfo( 'pingback_url' ); ?>" />

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<?php wp_head(); ?>
</head>
<?php if(is_admin_bar_showing ()) $top_margin="" ?>
<body  <?php body_class(); ?> style="<?php echo $top_margin ?>">
	<div id="preloader">
		<div id="image" style="">
		</div>
	</div>
<div id="top-top">
</div>


<!-- Static navbar -->
 <?php get_template_part('menu','php');?>  
 <?php //get_template_part('menu-prawe','php');?>

 