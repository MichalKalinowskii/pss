<?php get_header(); ?>

<main id="main-content" class="container my-4">

    <?php while ( have_posts() ) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class('col-12'); ?>> <?php // Usunięto tabindex ?>
            <header class="entry-header mb-4">
                <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
            </header><?php if ( has_post_thumbnail() ) : // Opcjonalnie: pokaż obrazek wyróżniający ?>
                <div class="post-thumbnail mb-3">
                    <?php the_post_thumbnail('large', array('class' => 'img-fluid')); // Dopasuj rozmiar i klasy ?>
                </div>
            <?php endif; ?>

            <div class="entry-content">
                <?php
                the_content(); // Wyświetla treść wprowadzoną w edytorze WordPress

                // Paginacja dla stron podzielonych tagiem wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__( 'Strony:', 'portal-dla-graczy' ),
                    'after'  => '</div>',
                ) );
                ?>
            </div><?php if ( get_edit_post_link() ) : // Pokaż link edycji zalogowanym użytkownikom z uprawnieniami ?>
                <footer class="entry-footer small mt-4">
                    <?php
                    edit_post_link(
                        sprintf(
                            wp_kses(
                                /* translators: %s: Name of current post. Only visible to screen readers. */
                                __( 'Edytuj <span class="screen-reader-text">%s</span>', 'portal-dla-graczy' ),
                                array(
                                    'span' => array(
                                        'class' => array(),
                                    ),
                                )
                            ),
                            get_the_title()
                        ),
                        '<span class="edit-link">',
                        '</span>'
                    );
                    ?>
                </footer><?php endif; ?>
        </article><?php
        // Jeśli komentarze są włączone lub jest przynajmniej jeden komentarz, załaduj szablon komentarzy.
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;
        ?>

    <?php endwhile; // End of the loop. ?>

</main><?php get_footer(); ?>