<!doctype html>
    <html <?php language_attributes(); ?>>
        <head>
            <meta charset="<?php bloginfo( 'charset' ); ?>">
            <title><?php wp_title( '-', true, 'right' ); ?>Bornfight</title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="profile" href="https://gmpg.org/xfn/11">
            <meta name="description" content="Bornfight test"/>
            <meta name="keywords" content=""/> 

            <?php wp_head(); ?>
        </head>

        <body <?php body_class(); ?>>
            <div class="header">
                <?php 
					wp_nav_menu(array(
						'theme_location' => 'primary',
							'container' => false
							)
						);
                ?>
                <h1>header</h1>
            </div>