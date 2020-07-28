<?php

/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Nampa Basico
 * @since Nampa Basico 1.0
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> >

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="<?php echo get_bloginfo('description', 'display'); ?>">
	<meta name="title" content="<?php echo wp_title('|', true, 'left'); ?>">
	<meta name="language" content="Español">
	<meta name="googlebot" content="INDEX, FOLLOW">

	<!-- Iccon Site -->
	<link rel="stylesheet" href="<?php echo CSSURL ?>fuentes.css?ver=<?php echo VCACHE ?>">
	<!-- Icomoon -->
	<link rel="stylesheet" href="<?php echo CSSURL ?>icomoon/style.css">
	<!-- General Css Styles -->
	<link rel="stylesheet" href="<?php echo CSSURL ?>pure-min.css">
	<link rel="stylesheet" href="<?php echo CSSURL ?>grids-responsive-min.css">
	<!-- Style Site -->
	<link rel="stylesheet" href="<?php echo CSSURL ?>swiper.min.css?ver=<?php echo VCACHE ?>">
	<!-- Style Site -->
	<link rel="stylesheet" href="<?php echo CSSURL ?>style.css?ver=<?php echo VCACHE ?>">
	<!-- Responsive Style Site -->
	<link rel="stylesheet" href="<?php echo CSSURL ?>style-responsive.css?ver=<?php echo VCACHE ?>">

	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,700;1,400;1,600&display=swap" rel="stylesheet">
	
	<?php wp_head(); ?>
	<title><?php wp_title('|', true, 'left'); ?></title>
	<!--Eliminamos el margen top Revisar esto-->
	<style>
		@media only screen and (max-width: 480px){
			html {
				margin-top: 0 !important;
			}
		}
	</style>
	
</head>
<body <?php body_class(); ?>>
	<header class="woowContentFull header">
		<div class="woowContent1600 header_content">
			<div class="header_content_img">
				<a href="<?= home_url(''); ?>"><img src="<?= IMGURL ?>logo.png" alt=""></a>
			</div>
			<div class="header_content_info">
				<p><span><i class="icon-envelop"></i>CONTACTO</span> <span><i class="icon-phone"></i>(+57) 322 363 0292</span></p>
				<?php get_product_search_form();?>
				
				<nav class="header_content_nav">
					<span class="menu_responsive"><i class="icon-menu"></i>MENÚ</span>
					<ul class="menu_principal">
						<li><a href="<?= home_url('') ?>">HOME</a></li>
						<li>	
							<?php
								$url = home_url('juguetes');
								if(wp_is_mobile()){
									$url = '#';
								}

							?>
							<a href="<?= $url ?>">JUGUETES <i class="icon-circle-down"></i></a>
							<ul class="nav_submenu">
								<li><a href="<?= home_url('juguetes/dildos/') ?>">Dildos</a></li>
								<li><a href="<?= home_url('juguetes/vibradores/') ?>">Vibradores</a></li>
								<li><a href="<?= home_url('juguetes/anal/') ?>">Anal</a></li>
								<li><a href="<?= home_url('juguetes/lubricantes/') ?>">Lubricantes</a></li>
								<li><a href="<?= home_url('juguetes/otros/') ?>">Otros</a></li>
							</ul>
						</li>
						<li><a href="<?= home_url('dominic') ?>">DOMINIC</a></li>
						<li><a href="<?= home_url('sin-censura') ?>">SIN CENSURA</a></li>
						<li class="close_menu"><i class="icon-cross"></i></li>
					</ul>
				</nav>
			</div>
		</div>
		
	</header>