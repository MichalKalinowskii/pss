<?php get_header(); ?>

<main id="main-content" class="container my-4">

    <?php
    // Pętla do pobrania treści strony ustawionej jako strona główna (jeśli jest)
    if ( have_posts() ) :
        while ( have_posts() ) : the_post();
            // Sekcja powitalna - może być treścią strony głównej lub statycznym HTML
            ?>
            <section aria-labelledby="hero-heading" class="mb-4 text-center"> <?php // Wycentrowano dla efektu ?>
                 <?php // Jeśli chcesz tytuł z edytora WP: the_title( '<h1 id="hero-heading" class="mb-4 display-4">', '</h1>' ); ?>
                 <h1 id="hero-heading" class="mb-4 display-4"><?php bloginfo( 'name' ); ?></h1> <?php // Lub dynamicznie nazwa witryny ?>
                 <p class="lead"><?php bloginfo( 'description' ); ?></p> <?php // Lub dynamicznie opis witryny ?>
                 <?php // Jeśli chcesz treść z edytora WP: the_content(); ?>
            </section>
            <?php
        endwhile;
    else :
        // Alternatywna sekcja powitalna, jeśli strona główna nie jest ustawiona jako strona statyczna
        ?>
         <section aria-labelledby="hero-heading" class="mb-4 text-center">
             <h1 id="hero-heading" class="mb-4 display-4"><?php bloginfo( 'name' ); ?></h1>
             <p class="lead"><?php bloginfo( 'description' ); ?></p>
         </section>
        <?php
    endif;
    // Ważne: zresetuj dane posta po głównej pętli, jeśli była użyta
    // wp_reset_postdata(); - niepotrzebne jeśli nie było query
    ?>


    <?php // --- Sekcja Najnowsze wiadomości --- ?>
    <section aria-labelledby="news-heading">
        <h2 id="news-heading" class="mb-4"><?php esc_html_e( 'Najnowsze wiadomości', 'portal-dla-graczy' ); ?></h2>
        <div class="row">
            <?php
            $args_news = array(
                'post_type'           => 'post',        // Typ postu: wpisy
                'posts_per_page'      => 2,             // Ile wpisów pokazać
                // 'category_name'    => 'aktualnosci', // Opcjonalnie: filtrowanie po kategorii 'aktualnosci'
                'ignore_sticky_posts' => 1              // Ignoruj przyklejone posty
            );
            $news_query = new WP_Query( $args_news );

            if ( $news_query->have_posts() ) :
                while ( $news_query->have_posts() ) : $news_query->the_post();
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'col-md-6 mb-4' ); ?>> <?php // Zmieniono na col-md-6 dla dwóch kolumn na średnich ekranach ?>
                         <header class="entry-header">
                            <?php the_title( sprintf( '<h3 class="entry-title h4"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
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
                    <?php
                endwhile;
                wp_reset_postdata(); // Zawsze po niestandardowej pętli WP_Query
            else :
                ?>
                <p class="col-12"><?php esc_html_e( 'Brak najnowszych wiadomości do wyświetlenia.', 'portal-dla-graczy' ); ?></p>
                <?php
            endif;
            ?>
        </div>
    </section>

    <?php // --- Sekcja Recenzje gier --- ?>
    <section aria-labelledby="reviews-heading">
        <h2 id="reviews-heading" class="mb-4"><?php esc_html_e( 'Recenzje gier', 'portal-dla-graczy' ); ?></h2>
        <div class="row">
            <?php
            $args_reviews = array(
                'post_type'           => 'post',      // Załóżmy, że recenzje to też wpisy
                'posts_per_page'      => 2,
                 'category_name'    => 'recenzje', // !! Ważne: Załóżmy istnienie kategorii 'recenzje' !!
                'ignore_sticky_posts' => 1
            );
            $reviews_query = new WP_Query( $args_reviews );

            if ( $reviews_query->have_posts() ) :
                while ( $reviews_query->have_posts() ) : $reviews_query->the_post();
                    ?>
                     <article id="post-<?php the_ID(); ?>" <?php post_class( 'col-md-6 mb-4' ); ?>>
                         <header class="entry-header">
                            <?php the_title( sprintf( '<h3 class="entry-title h4"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
                        </header>
                         <?php
                           /* Przykład wyświetlania oceny z pola niestandardowego (np. ACF)
                           $ocena = get_field('ocena');
                           if ($ocena) {
                               echo '<p class="review-rating"><strong>Ocena:</strong> ' . esc_html($ocena) . '/10</p>';
                           }
                           */
                         ?>
                        <div class="entry-summary">
                            <?php the_excerpt(); ?>
                        </div>
                        <footer class="entry-footer mt-2">
                            <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-sm" aria-label="<?php echo esc_attr( sprintf( __( 'Czytaj więcej o %s', 'portal-dla-graczy' ), get_the_title() ) ); ?>">
                                <?php esc_html_e( 'Czytaj więcej', 'portal-dla-graczy' ); ?>
                            </a>
                        </footer>
                    </article>
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                ?>
                <p class="col-12"><?php esc_html_e( 'Brak recenzji do wyświetlenia.', 'portal-dla-graczy' ); ?></p>
                <?php
            endif;
            ?>
        </div>
    </section>

</main><?php get_footer(); ?>