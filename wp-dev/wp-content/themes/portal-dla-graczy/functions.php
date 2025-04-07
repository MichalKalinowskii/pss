<?php

/**
 * Funkcje i definicje motywu Portal dla Graczy.
 */

// Podstawowe ustawienia motywu
function portal_dla_graczy_setup() {
    // Włącz tłumaczenia
    load_theme_textdomain( 'portal-dla-graczy', get_template_directory() . '/languages' );

    // Dodaj automatyczne linki RSS do <head>
    add_theme_support( 'automatic-feed-links' );

    // Pozwól WordPressowi zarządzać tagiem <title>
    add_theme_support( 'title-tag' );

    // Włącz obsługę obrazków wyróżniających dla wpisów i stron
    add_theme_support( 'post-thumbnails' );

    // Zarejestruj menu nawigacyjne
    register_nav_menus( array(
        'primary' => esc_html__( 'Główne Menu', 'portal-dla-graczy' ),
        // Możesz dodać więcej menu, np. 'footer' => esc_html__( 'Menu Stopki', 'portal-dla-graczy' ),
    ) );

    // Włącz wsparcie dla HTML5 dla wybranych elementów
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ) );

    // (Opcjonalnie) Ustaw domyślną szerokość treści
    // if ( ! isset( $content_width ) ) $content_width = 800;

    // (Opcjonalnie) Dodaj wsparcie dla niestandardowego tła
    // add_theme_support( 'custom-background' );

    // (Opcjonalnie) Dodaj wsparcie dla niestandardowego logo
    // add_theme_support( 'custom-logo', array( ... ) );
}
add_action( 'after_setup_theme', 'portal_dla_graczy_setup' );

// Kolejkowanie skryptów i stylów
function portal_dla_graczy_scripts() {
    // Bootstrap CSS z CDN
    wp_enqueue_style( 'bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css', array(), '5.3.0' );

    // Główny plik stylów motywu (style.css)
    // Upewnij się, że ładuje się PO Bootstrapie, dodając 'bootstrap-css' jako zależność
    wp_enqueue_style( 'portal-dla-graczy-style', get_stylesheet_uri(), array('bootstrap-css'), filemtime(get_template_directory() . '/style.css') ); // Dodano filemtime dla cache busting

    // Bootstrap JS Bundle z CDN (zawiera Popper.js)
    // Ładowany w stopce (ostatni argument true)
    wp_enqueue_script( 'bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', array(), '5.3.0', true );

    // Niestandardowy skrypt JS motywu (script.js)
    // Zależny od Bootstrap JS, ładowany w stopce
    wp_enqueue_script( 'portal-dla-graczy-script', get_template_directory_uri() . '/js/script.js', array('bootstrap-js'), filemtime(get_template_directory() . '/js/script.js'), true ); // Dodano filemtime

    // (Opcjonalnie) Dodaj obsługę komentarzy wątkowanych, jeśli motyw je obsługuje
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'portal_dla_graczy_scripts' );

// (Opcjonalnie) Dodanie niestandardowych klas do body dla lepszego targetowania CSS
function portal_dla_graczy_body_classes( $classes ) {
	// Dodaje klasę 'group-blog' jeśli jest więcej niż 1 autor.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Dodaje klasę hfeed do stron z wpisami.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'portal_dla_graczy_body_classes' );

// (Opcjonalnie) Implementacja linku "Skip to content"
function portal_dla_graczy_skip_link() {
	echo '<a class="skip-link screen-reader-text" href="#main-content">' . esc_html__( 'Przejdź do treści', 'portal-dla-graczy' ) . '</a>';
}
add_action( 'wp_body_open', 'portal_dla_graczy_skip_link' );

// Możesz tutaj dodać rejestrację obszarów widżetów (sidebarów), jeśli potrzebujesz
// function portal_dla_graczy_widgets_init() { ... }
// add_action( 'widgets_init', 'portal_dla_graczy_widgets_init' );

?>