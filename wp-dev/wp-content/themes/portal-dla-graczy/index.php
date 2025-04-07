<?php get_header(); ?>

<main id="main-content" class="container my-4">

    <?php if ( is_home() && ! is_front_page() ) : // Sprawdza, czy to strona bloga (gdy ustawiono statyczną stronę główną) ?>
        <header class="page-header mb-4">
            <h1 class="page-title"><?php single_post_title(); ?></h1>
        </header>
    <?php endif; ?>

    <?php if ( have_posts() ) : ?>

        <div class="row"> <?php // Używamy siatki Bootstrapa ?>

            <?php while ( have_posts() ) : the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class( 'col-12 mb-4' ); // Cała szerokość, margines dolny ?>> <?php // Zmieniono tabindex - WordPress zarządza focusem ?>
                    <header class="entry-header">
                        <?php the_title( sprintf( '<h2 class="entry-title h3"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
                         <?php if ( 'post' === get_post_type() ) : // Pokaż datę dla wpisów ?>
                            <div class="entry-meta text-muted small mb-2">
                                <?php echo get_the_date(); ?>
                            </div>
                        <?php endif; ?>
                    </header><div class="entry-summary">
                        <?php the_excerpt(); // Wyświetla zajawkę ?>
                    </div><footer class="entry-footer mt-2">
                         <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-sm" aria-label="<?php echo esc_attr( sprintf( __( 'Czytaj więcej o %s', 'portal-dla-graczy' ), get_the_title() ) ); ?>">
                            <?php esc_html_e( 'Czytaj więcej', 'portal-dla-graczy' ); ?>
                         </a>
                    </footer></article>

            <?php endwhile; ?>

        </div> <?php // .row ?>

        <?php
        // Paginacja
        the_posts_pagination( array(
            'prev_text' => esc_html__( '« Poprzednia', 'portal-dla-graczy' ),
            'next_text' => esc_html__( 'Następna »', 'portal-dla-graczy' ),
            'screen_reader_text' => esc_html__( 'Nawigacja postów', 'portal-dla-graczy' ),
            'before_page_number' => '<span class="page-link">',
            'after_page_number'  => '</span>',
        ) );
        ?>

    <?php else : ?>

        <?php // Wyświetl komunikat, jeśli nie ma postów ?>
        <section class="no-results not-found">
            <header class="page-header">
                <h1 class="page-title"><?php esc_html_e( 'Nic nie znaleziono', 'portal-dla-graczy' ); ?></h1>
            </header>
            <div class="page-content">
                <p><?php esc_html_e( 'Wygląda na to, że nic tu nie ma. Może spróbuj wyszukać?', 'portal-dla-graczy' ); ?></p>
                <?php get_search_form(); ?>
            </div>
        </section>

    <?php endif; ?>

</main><?php get_footer(); ?>