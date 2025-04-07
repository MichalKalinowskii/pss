<?php get_header(); ?>

<main id="main-content" class="container my-4">

    <?php while ( have_posts() ) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class('col-12'); ?>> <?php // Usunięto tabindex ?>
            <header class="entry-header mb-4">
                <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

                <div class="entry-meta text-muted small mb-2">
                    <span><?php echo get_the_date(); ?></span> |
                    <span><?php esc_html_e('Autor:', 'portal-dla-graczy'); ?> <?php the_author_posts_link(); ?></span> |
                    <span><?php esc_html_e('Kategorie:', 'portal-dla-graczy'); ?> <?php the_category( ', ' ); ?></span>
                </div></header><?php if ( has_post_thumbnail() ) : ?>
                <div class="post-thumbnail mb-3">
                    <?php the_post_thumbnail('large', array('class' => 'img-fluid')); ?>
                </div>
            <?php endif; ?>

            <div class="entry-content">
                <?php
                the_content(); // Pełna treść wpisu

                 // Dla recenzji możesz tu dodać wyświetlanie oceny z pola niestandardowego (np. ACF)
                 /*
                 $ocena = get_field('ocena'); // Przykład dla ACF
                 if ($ocena) {
                    echo '<p><strong>Ocena:</strong> ' . esc_html($ocena) . '/10</p>';
                 }
                 */

                wp_link_pages( array( /* ... jak w page.php ... */ ) );
                ?>
            </div><footer class="entry-footer small mt-4">
                <?php
                 // Wyświetlanie tagów
                 the_tags( '<span class="tags-links">' . esc_html__( 'Tagi: ', 'portal-dla-graczy' ), esc_html_x( ', ', 'list item separator', 'portal-dla-graczy' ), '</span>' );

                 // Link edycji
                 if ( get_edit_post_link() ) {
                     edit_post_link( /* ... jak w page.php ... */ );
                 }
                ?>
            </footer></article><?php
        // Nawigacja między postami (Poprzedni/Następny)
        the_post_navigation( array(
            'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Poprzedni:', 'portal-dla-graczy' ) . '</span> <span class="nav-title">%title</span>',
            'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Następny:', 'portal-dla-graczy' ) . '</span> <span class="nav-title">%title</span>',
        ) );

        // Komentarze
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;
        ?>

    <?php endwhile; // End of the loop. ?>

</main><?php get_footer(); ?>