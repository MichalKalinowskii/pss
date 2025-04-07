<?php get_header(); ?>

<main id="main-content" class="container my-4">
    <section aria-labelledby="hero-heading">
        <h1 id="hero-heading" class="mb-4">Witaj w Portalu dla Graczy!</h1>
        <p>Najnowsze wiadomości, recenzje i poradniki ze świata gier.</p>
    </section>

    <section aria-labelledby="news-heading">
        <h2 id="news-heading" class="mb-4">Najnowsze wiadomości</h2>
        <div class="row">
            <?php
            if (have_posts()):
                while (have_posts()): the_post(); ?>
                    <article tabindex="0" class="col-xs-12 mb-4">
                        <h3><?php the_title(); ?></h3>
                        <p><?php the_excerpt(); ?></p>
                        <a href="<?php the_permalink(); ?>" class="btn btn-primary" aria-label="Czytaj więcej o <?php the_title(); ?>">Czytaj więcej</a>
                    </article>
                <?php endwhile;
            else: ?>
                <p>Brak wiadomości do wyświetlenia.</p>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>
