<?php get_header(); ?>

<?php if(have_posts()): ?>
    <?php while(have_posts()): the_post(); ?>

        <h1><?= get_the_title(); ?></h1>

        <picture>
            <img src="<?= get_the_post_thumbnail_url(); ?>" alt="imagen de iphone" data-dato="test">
        </picture>

        <div>
            <p><?= get_the_content(); ?></p>
        </div>

    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>