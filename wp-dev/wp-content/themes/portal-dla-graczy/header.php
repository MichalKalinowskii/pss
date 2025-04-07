<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); // Kluczowe dla WordPressa - dodaje style, skrypty, meta tagi ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); // Hak dla dodatkowych elementów na początku body, np. skip link ?>

<header class="bg-dark text-white py-3">
    <nav class="navbar navbar-expand-lg navbar-dark container">
        <?php
        // Wyświetlanie logo - jeśli dodano wsparcie w functions.php i ustawiono w Personalizacji
        if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
            the_custom_logo();
        } else {
            // Domyślny link tekstowy, jeśli nie ma logo
            ?>
            <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
            <?php
        }
        ?>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="<?php esc_attr_e( 'Przełącz nawigację', 'portal-dla-graczy' ); ?>">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <?php
            // Wyświetlanie menu głównego zarejestrowanego jako 'primary'
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'menu_id'        => 'primary-menu', // ID dla elementu UL
                'container'      => false, // Nie chcemy dodatkowego kontenera div
                'menu_class'     => 'navbar-nav ms-auto mb-2 mb-lg-0', // Klasy Bootstrap dla UL
                'fallback_cb'    => '__return_false', // Nie pokazuj nic, jeśli menu nie istnieje
                'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                // (Opcjonalnie) Można dodać walker do dostosowania klas LI/A do Bootstrapa 5,
                // ale podstawowe działanie powinno być ok. Bootstrap 5 nie wymaga już tylu specjalnych klas co v4.
                // 'walker'         => new WP_Bootstrap_Navwalker() // Jeśli używasz dedykowanego walkera
            ) );
            ?>
        </div>
    </nav>
</header>

<?php // <main> zostanie otwarte w plikach szablonów (index.php, page.php etc.) ?>