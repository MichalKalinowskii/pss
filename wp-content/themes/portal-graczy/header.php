<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="bg-dark text-white py-3">
    <nav class="navbar navbar-expand-lg navbar-dark container">
        <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">Portal dla Graczy</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <?php
            wp_nav_menu([
                'theme_location' => 'main-menu',
                'container' => false,
                'menu_class' => 'navbar-nav ms-auto',
                'fallback_cb' => false,
                'walker' => new Walker_Nav_Menu()
            ]);
            ?>
        </div>
    </nav>
</header>
