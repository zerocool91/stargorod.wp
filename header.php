<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package stargorod
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">

		<header id="masthead" class="site-header">
			<div class="grid-container">
				<div class="grid-x aling-middle align-justify grid-margin-x">
					<div class="shrink cell site-branding">
						<?php
					the_custom_logo();
					?>
					</div><!-- .site-branding -->
					<div class="auto cell">
						<div class="navigation navigation__top">
							<?php
							wp_nav_menu( array(
								'container' => 'nav',
								'menu_class' => 'menu menu__top',
								'theme_location' => 'header-top'
							) );
						?>
							<div class="navigation__phone-number">
								<span class="phone-number__item">+380 800 20 20 80</span>
								<span class="phone-number__item">Звонки бесплатные</span>
							</div>
							
						</div>
						<div class="navigation navigation__bottom">
							<?php
							wp_nav_menu( array(
								'container' => 'nav',
								'menu_class' => 'menu menu__bottom',
								'theme_location' => 'header-bottom'
							) );
						?>
						</div>
					</div>
					<div class="toggler shrink cell">
						<button class="toggler__button"><img src="<?= get_template_directory_uri() . '/img/menu-toggler.png' ?>" alt=""></button>
					</div>
				</div>
			</div>


		</header><!-- #masthead -->

		<div id="content" class="site-content">