<?php get_header(); ?>

<main class="container my-4">
    <h1 class="mb-4">Recenzje gier</h1>
    <div class="row">
        <?php if (have_posts()): while (have_posts()): the_post(); ?>
            <article class="col-xs-12 mb-4">
                <h2><?php the_title(); ?></h2>
                <p><?php the_excerpt(); ?></p>
                <a href="<?php the_permalink(); ?>" class="btn btn-primary">Czytaj więcej</a>
            </article>
        <?php endwhile; else: ?>
            <p>Brak recenzji do wyświetlenia.</p>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>
