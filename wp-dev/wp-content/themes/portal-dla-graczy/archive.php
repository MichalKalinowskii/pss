<?php get_header(); ?>

<main id="main-content" class="container my-4">

    <header class="page-header mb-4">
        <?php
            the_archive_title( '<h1 class="page-title">', '</h1>' );
            the_archive_description( '<div class="archive-description">', '</div>' );
        ?>
    </header><?php if ( have_posts() ) : ?>
        <div class="row">
            <?php while ( have_posts() ) : the_post(); ?>
                <?php // Skopiuj <article>...</article> z index.php ?>
                 <article id="post-<?php the_ID(); ?>" <?php post_class( 'col-12 mb-4' ); ?>>
                    <header class="entry-header">
                        <?php the_title( sprintf( '<h2 class="entry-title h3"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
                         <?php if ( 'post' === get_post_type() ) : ?>
                            <div class="entry-meta text-muted small mb-2">
                                <?php echo get_the_date(); ?>
                            </div>
                        <?php endif; ?>
                    </header>
                    <div class="entry-summary">
                        <?php the_excerpt(); ?>
                    </div>
                    <footer class="entry-footer mt-2">
                         <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-sm" aria-label="<?php echo esc_attr( sprintf( __( 'Czytaj więcej o %s', 'portal-dla-graczy' ), get_the_title() ) ); ?>">
                            <?php esc_html_e( 'Czytaj więcej', 'portal-dla-graczy' ); ?>
                         </a>
                    </footer>
                </article>
            <?php endwhile; ?>
        </div> <?php // .row ?>
        <?php the_posts_pagination( /* ... jak w index.php ... */ ); ?>
    <?php else : ?>
        <?php // Sekcja "Nic nie znaleziono" jak w index.php ?>
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