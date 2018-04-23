<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title><?php if (is_front_page()) { echo get_bloginfo('title')." - ".get_bloginfo('description'); } else { echo get_bloginfo('title')." - ".get_the_title(); } ?></title>
    <?php wp_meta(); ?>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="Content-Style-Type" content="text/css" />
    <meta http-equiv="Content-Script-Type" content="text/javascript" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/php;charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
    <meta http-equiv="cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
    <meta http-equiv="pragma" content="no-cache" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="HandheldFriendly" content="true" />
    <meta name="audience" content="all" />
    <meta name="author" content="Visana Comunicação - http://www.visanacomunicacao.com.br" />
    <meta name="copyright" content="Visana Comunicação - http://www.visanacomunicacao.com.br" />
    <meta name="resource-type" content="Document" />
    <meta name="distribution" content="Global" />
    <meta name="robots" content="index, follow, ALL" />
    <meta name="GOOGLEBOT" content="index, follow" />
    <meta name="rating" content="General" />
    <meta name="revisit-after" content="2 Days" />
    <meta name="language" content="pt-br" />
    <meta property="og:locale" content="pt_BR" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php echo get_bloginfo('title'); ?>" />
    <meta property="og:description" content="<?php echo get_bloginfo('description'); ?>" />
    <meta property="og:url" content="<?php echo site_url(); ?>" />
    <meta property="og:site_name" content="<?php echo get_bloginfo('title'); ?>" />
    <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/screenshot.png" />
    <link rel="canonical" href="<?php echo site_url(); ?>" />
    <?php wp_head(); ?>
</head>
<body 
    <?php
    global $post;
    if (is_front_page()) {
      echo 'class="pg-home"';
    } else if(is_archive()){
      echo 'class="pg-archive pg-interna"';
    } else if(is_category()){
      echo 'class="pg-category pg-interna"';
    } else if(is_search()){
      echo 'class="pg-search pg-interna"';
    } else if(is_single()){
      echo 'class="pg-single pg-interna"';
    } else {
      echo 'class="pg-interna page_id_'.$post->ID.'"';
    }
    ?>>
    <div id="wrap" <?php if(is_front_page()) { echo 'class="pattern"'; } ?>>
        <nav id="mobileNav" class="visible-xs visible-sm visible-md">
            <ul>
                <?php wp_nav_menu( array( 'container' => false, 'menu' => 'header', 'items_wrap' => '%3$s' ) ); ?>
            </ul>
        </nav>
        <header>
            <div id="topo">
                <div class="container">
                    <div class="pull-right">
                        <?php if ( get_theme_mod('email-contato') ) : ?>
                        <p><i class="material-icons">email</i> <a title="<?php echo get_theme_mod('email-contato'); ?>" href="mailto:<?php echo get_theme_mod('email-contato'); ?>"><?php echo get_theme_mod('email-contato'); ?></a></p>
                        <?php endif; ?>
                        <ul id="lang">
                            <li><a href="" title="port">port</a></li>
                            <li><a href="" title="esp">esp</a></li>
                        </ul>
                    </div>                    
                </div>
            </div>
            <div id="header">
                <div class="container">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                        <h1 id="logo">
                            <a href="<?php echo site_url(); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) )." - ".get_bloginfo('description'); ?>">
                                <?php 

                                if ( get_theme_mod( 'logo' ) ) :

                                echo "<img width='100%' src='".esc_url( get_theme_mod( 'logo' ) )."' alt='".esc_attr( get_bloginfo( 'name', 'display' ) )." - ".get_bloginfo('description')."'>";

                                else :

                                echo esc_attr( get_bloginfo( 'name', 'display' ) );

                                endif;

                                ?>
                            </a>
                        </h1>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-6 col-xs-6">
                        <?php if ( get_theme_mod('endereco-evento')&&get_theme_mod('data-evento') ) : ?>
                            <h2><?php echo get_theme_mod('data-evento'); ?><br/><?php echo get_theme_mod('endereco-evento'); ?></h2>
                        <?php endif; ?>
                        <nav>
                            <ul class="visible-lg">
                                <?php wp_nav_menu( array( 'container' => false, 'menu' => 'header', 'items_wrap' => '%3$s' ) ); ?>
                            </ul>
                            <button onclick="mobileNavigation()" type="button" class="tcon tcon-menu--xcross visible-sm visible-xs visible-md" aria-label="toggle menu">
                            <span class="tcon-menu__lines" aria-hidden="true"><!----></span>
                            <span class="tcon-visuallyhidden">toggle menu</span>
                            </button>
                        </nav>
                    </div>                
                </div>
            </div>
        </header>