<?php get_header(); ?>

<?php if(have_posts()): ?>
<?php while(have_posts()): ?>
<?php the_post(); ?>

    <h1><?= get_the_title(); ?></h1>

<?php endwhile; ?>
<?php endif; ?>

<section class="front" id="page-productos">
    <form action="/" method="POST" id="form-gato">

        <input type="text" name="title">
        <button type="submit">enviar</button>
        
    </form>
</section>

<?php get_footer(); ?>