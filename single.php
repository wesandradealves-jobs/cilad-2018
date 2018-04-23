<?php get_header(); ?>

<main>

    <?php if ( have_posts () ) : while (have_posts()):the_post(); ?>

    <section id="webdoor" style="background-image:url(<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID), full); ?>)">

        <h1><?php echo get_the_title(); ?></h1>

    </section>

    <div id="content">

        <div class="container">

           <?php the_content(); ?>     

        </div>

    </div>

    <?php endwhile; endif; ?>

</main>

<?php get_footer(); ?>







