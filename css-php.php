<?php
/*
style-generator php
*/
?>
<style>
.affix
{
	background-color:<?php echo get_theme_mod( 'kolor_tla_top_menu' ); ?>;
}
.affix-top
{
	background-color:<?php echo get_theme_mod( 'kolor_tla_menu' ); ?>;
}
.menu-tyt
{
	color:<?php echo get_theme_mod( 'kolor_tytul_menu' ); ?>;
}
.menu-podtyt
{
	color:<?php echo get_theme_mod( 'kolor_podtyt_menu' ); ?>;
}
.navbar-inverse .navbar-nav > li > a
{
	color:<?php echo get_theme_mod( 'kolor_text_menu' ); ?>;
}
.navbar-inverse .navbar-nav > .active > a
{
	color:<?php echo get_theme_mod( 'kolor_text_active_menu' ); ?>;
	background-color:<?php echo get_theme_mod( 'kolor_tlo_active_menu' ); ?>;
}
.navbar-inverse .navbar-nav > li > a:hover
{
	color:<?php echo get_theme_mod( 'kolor_text_hover_menu' ); ?>;
	background-color:<?php echo get_theme_mod( 'kolor_tlo_hover_menu' ); ?>;
}
</style>