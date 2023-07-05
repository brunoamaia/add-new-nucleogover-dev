<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package newspaperly
 */

?>
<!doctype html>
    <html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php bloginfo('name'); ?></title>
        <?php wp_head(); ?>
    </head>

    <header class="component">
        <div class="container-top container-page-width">
            <div>
                <span class="header-bar-nav"><a href="<?php echo home_url(); ?>">Página inicial</a></span>
            </div>
        </div>
        <div class="container-button">
			<h1 class="header-title">Hora News</h1>
			<h2 class="header-subtitle">Notícias</h2>
        </div>
    </header>
