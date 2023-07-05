<?php get_header(); ?>

<main>
    <section class="container-page-width index">
        <article>
            <?php if (has_post_thumbnail()) : ?>
                <div class="thumbnail-image">
                    <?php the_post_thumbnail(); ?>
                </div>
            <?php endif; ?>
            <header class="entry-header">
                <h1 class="entry-title"><?php the_title(); ?></h1>
            </header>

            <div class="entry-content">
                <?php the_content(); ?>
            </div>
        </article>
    </section>
</main>

<?php get_footer(); ?>
