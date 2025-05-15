
    <!DOCTYPE html>
    <html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
    <header class="site-header">
        <div class="site-branding">
            <?php
            if (has_custom_logo()) {
                the_custom_logo();
            } else {
                echo '<h1 class="site-title"><a href="'.esc_url(home_url('/')).'" rel="home">'.get_bloginfo('name').'</a></h1>';
            }
            ?>
        </div>
        <nav class="main-navigation">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_id'        => 'primary-menu',
            ));
            ?>
        </nav>
    </header>
    