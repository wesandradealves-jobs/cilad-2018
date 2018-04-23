<?php get_header(); ?>
<main>
  <!--Conteúdo da home e das páginas internas-->
  <?php if ( ! is_front_page() ){ ?>
    <!--Webdoor se não for home-->
    <?php if(get_post_type()=="page" && ! is_front_page() ) : ?>
      <section id="webdoor" style="background-image:url(<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID), full); ?>)">
          <h1><?php echo get_the_title(); ?></h1>
      </section>
    <?php endif; ?>
    <div id="content">
        <div class="container">
           <?php if ( have_posts () ) : while (have_posts()):the_post(); ?>
           <?php the_content(); ?>     
          <?php endwhile; endif; ?>
        </div>
    </div>
  <?php } else { ?>
    <?php include(get_template_directory()."/".get_post( $post )->post_name.".php"); ?>
  <?php } ?>
</main>
<?php get_footer(); ?>



