<?php 

    $servicos = new WP_Query( array( 'post_type' => 'servicos', 'posts_per_page' =>  3, 'order' => 'ASC'));

    $galeria = new WP_Query( array( 'post_type' => 'galeria', 'posts_per_page' =>  -1, 'order' => 'ASC'));

?>

<section id="webdoor" style="background-image:url(<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID), full); ?>)" class="hidden-xs"><!----></section>

<?php if($servicos->have_posts()=="1") : ?>

<section id="servicos">

    <div class="container">

        <ul class="clearfix">

            <!--loop de serviços-->

            <?php 

            while ( $servicos->have_posts() ) : $servicos->the_post();

            if(get_post_meta($post->ID, 'color', true)) : 

            $color = get_post_meta($post->ID, 'color', true);

            else:

            $color = "#eaeaea";

            endif;

            echo '

            <li class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                <i style="background-image:url('.wp_get_attachment_url(get_post_thumbnail_id($post->ID), full).');background-color:'.$color.';"></i>

                <div style="border-color:'.$color.';">

                    <h3>'.get_the_title().'</h3>

                    <p>

                        '.get_the_excerpt().'

                    </p>

                    <a style="color:'.$color.' !important;" href="'.get_the_permalink().'" title="Veja Mais">Veja Mais</a>

                </div>

            </li>';

            endwhile; 

            wp_reset_postdata();

            ?>

        </ul>                    

    </div>

</section>

<?php endif; ?>



<?php if($galeria->have_posts()=="1") : ?>

<section id="conheca-sao-paulo">
    <div class="container">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="flexslider clearfix">

                <ul class="slides">

                    <!--loop da galeria-->

                    <?php 

                    while ( $galeria->have_posts() ) : $galeria->the_post();

                    echo '
                    <li>
                        <img src="'.wp_get_attachment_url(get_post_thumbnail_id($post->ID), full).'" alt="'.get_the_title().'" height="100%" />
                    </li>';

                    endwhile; 

                    wp_reset_postdata();

                    ?>

                </ul>

            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <?php if(get_theme_mod('galeria-texto')&&get_theme_mod('galeria-titulo')) : ?>
                <?php if(get_theme_mod('galeria-titulo')) : ?>
                    <h3><?php echo get_theme_mod('galeria-titulo'); ?></h3>
                <?php endif; ?>
                <?php if(get_theme_mod('galeria-texto')) : ?>
                    <p><?php echo get_theme_mod('galeria-texto'); ?></p>
                <?php endif; ?>
                <a href="'.site_url().'/sao-paulo" title="Saiba Mais">Saiba Mais</a>                
            <?php endif; ?>
        </div>
    </div>
</section>
<?php endif; ?>



<?php if ( have_posts () ) : while (have_posts()):the_post(); ?>

    <!--Conteúdo adicional/Composer-->

    <?php the_content(); ?>     

<?php endwhile; endif; ?>