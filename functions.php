<?php

global $post;

$galeria_labels = array(

    'name' => _x('Galeria', 'post type general name'),

    'singular_name' => _x('Galeria', 'post type singular name'),

    'add_new' => _x('Adicionar Nova', 'Galeria '),

    'add_new_item' => __('Adicionar Nova Foto '),

    'edit_item' => __('Editar Foto '),

    'new_item' => __('Nova Foto '),

    'view_item' => __('Ver Foto '),

    'search_items' => __('Buscar Foto'),

    'not_found' =>  __('Nada encontrado'),

    'not_found_in_trash' => __('Nada encontrado'),

    'parent_item_colon' => ''

);



$galeria = array(

    'labels' => $galeria_labels,

    'public'             => false,

    'publicly_queryable' => true,

    'show_ui'            => true,

    'show_in_menu'       => true,

    'query_var'          => true,

    'rewrite'            => array( 'slug' => 'galeria', 'with_front' => true ),

    'capability_type'    => 'post',

    'has_archive'        => true,

    'hierarchical'       => true,

    'menu_position'      => 5,

    'supports'           => array('thumbnail')

);



$servicos_labels = array(

    'name' => _x('Serviços', 'post type general name'),

    'singular_name' => _x('Serviço', 'post type singular name'),

    'add_new' => _x('Adicionar Novo', 'Serviço '),

    'add_new_item' => __('Adicionar Novo Serviço '),

    'edit_item' => __('Editar Serviço '),

    'new_item' => __('Novo Serviço '),

    'view_item' => __('Ver Serviço '),

    'search_items' => __('Buscar Serviços'),

    'not_found' =>  __('Nada encontrado'),

    'not_found_in_trash' => __('Nada encontrado'),

    'parent_item_colon' => ''

);



$servicos = array(

    'labels' => $servicos_labels,

    'public'             => true,

    'publicly_queryable' => true,

    'show_ui'            => true,

    'show_in_menu'       => true,

    'query_var'          => true,

    'rewrite'            => array( 'slug' => 'servicos', 'with_front' => true ),

    'capability_type'    => 'post',

    'has_archive'        => true,

    'hierarchical'       => true,

    'menu_position'      => 5,

    'supports'           => array( 'title', 'editor', 'excerpt', 'custom-fields', 'thumbnail')

);



function remove_menus(){

  

  remove_menu_page( 'index.php' );                  //Dashboard

  remove_menu_page( 'jetpack' );                    //Jetpack* 

//   remove_menu_page( 'edit.php' );                   //Posts

  // remove_menu_page( 'upload.php' );                 //Media

//   remove_menu_page( 'edit.php?post_type=page' );    //Pages

  remove_menu_page( 'edit-comments.php' );          //Comments

  // remove_menu_page( 'themes.php' );                 //Appearance

  // remove_menu_page( 'plugins.php' );                //Plugins

//   remove_menu_page( 'users.php' );                  //Users

//   remove_menu_page( 'tools.php' );                  //Tools

  // remove_menu_page( 'options-general.php' );        //Settings

  

}



function getrid() {

  remove_post_type_support( 'page', 'page-attributes' );

}



function df_terms_clauses($clauses, $taxonomy, $args) {

    if (!empty($args['post_type'])) {

        global $wpdb;

        $post_types = array();

        foreach($args['post_type'] as $cpt) {

            $post_types[] = "'".$cpt."'";

        }

        if(!empty($post_types)) {

            $clauses['fields'] = 'DISTINCT '.str_replace('tt.*', 'tt.term_taxonomy_id, tt.term_id, tt.taxonomy, tt.description, tt.parent', $clauses['fields']).', COUNT(t.term_id) AS count';

            $clauses['join'] .= ' INNER JOIN '.$wpdb->term_relationships.' AS r ON r.term_taxonomy_id = tt.term_taxonomy_id INNER JOIN '.$wpdb->posts.' AS p ON p.ID = r.object_id';

            $clauses['where'] .= ' AND p.post_type IN ('.implode(',', $post_types).')';

            $clauses['orderby'] = 'GROUP BY t.term_id '.$clauses['orderby'];

        }

    }

    return $clauses;

}



// 

// function add_taxonomies_to_pages() {

//  register_taxonomy_for_object_type( 'category', 'page' );

//  }





// function category_and_tag_archives( $wp_query ) {

//     $my_post_array = array('post','page');

    

//     if ( $wp_query->get( 'category_name' ) || $wp_query->get( 'cat' ) )

//        $wp_query->set( 'post_type', $my_post_array );

   

//    if ( $wp_query->get( 'tag' ) )

//        $wp_query->set( 'post_type', $my_post_array );

// }

// 



function themeslug_theme_customizer( $wp_customize ) {

	$wp_customize->add_panel( 'header', array(

	    'priority' => 1,

	    'capability' => 'edit_theme_options',

	    'title' => __( 'Header')

	));


	$wp_customize->add_panel( 'sessoes', array(

	    'priority' => 1,

	    'capability' => 'edit_theme_options',

	    'title' => __( 'Sessões')

	));

    $wp_customize->add_section( 'galeria' , array(

        'title'       => __( 'Galeria', 'themeslug' ),

        'panel' => 'sessoes',

        'priority'    => 1

    ));


    $wp_customize->add_section( 'evento' , array(

        'title'       => __( 'Evento', 'themeslug' ),

        'panel' => 'header',

        'priority'    => 1

    ));



    $wp_customize->add_section( 'topo' , array(

        'title'       => __( 'Topo', 'themeslug' ),

        'panel' => 'header',

        'priority'    => 1

    ));



    $wp_customize->add_section( 'logo' , array(

        'title'       => __( 'Logo', 'themeslug' ),

        'priority'    => 2

    ));



    $wp_customize->add_setting( 'logo' );

    $wp_customize->add_setting( 'data-evento' );

    $wp_customize->add_setting( 'endereco-evento' );

    $wp_customize->add_setting( 'email-contato' );

    $wp_customize->add_setting( 'galeria-titulo' );

    $wp_customize->add_setting( 'galeria-texto' );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo', array(

        'label'    => __( 'Logo', 'themeslug' ),

        'section'  => 'logo',

        'settings' => 'logo'

    )));   



    $wp_customize->add_control('data-evento',  array(

        'label' => 'Data',

        'section' => 'evento',

        'type' => 'text',

        'settings' => 'data-evento'

    ));



    $wp_customize->add_control('endereco-evento',  array(

        'label' => 'Endereço/Local',

        'section' => 'evento',

        'type' => 'text',

        'settings' => 'endereco-evento'

    ));



    $wp_customize->add_control('email-contato',  array(

        'label' => 'E-mail (Contato)',

        'section' => 'topo',

        'type' => 'text',

        'settings' => 'email-contato'

    ));

    $wp_customize->add_control('galeria-titulo',  array(

        'label' => 'Título',

        'section' => 'galeria',

        'type' => 'text',

        'settings' => 'galeria-titulo'

    ));

    $wp_customize->add_control('galeria-texto',  array(

        'label' => 'Texto',

        'section' => 'galeria',

        'type' => 'textarea',

        'settings' => 'galeria-texto'

    ));

}



function remove_customizer_settings( $wp_customize ){

  $wp_customize->remove_panel('nav_menus');

  $wp_customize->remove_section('static_front_page');

}



function get_the_category_bytax( $id = false, $tcat = 'category' ) {

    $categories = get_the_terms( $id, $tcat );

    if ( ! $categories )

        $categories = array();

    $categories = array_values( $categories );

    foreach ( array_keys( $categories ) as $key ) {

        _make_cat_compat( $categories[$key] );

    }

    // Filter name is plural because we return alot of categories (possibly more than #13237) not just one

    return apply_filters( 'get_the_categories', $categories );

}



function get_custom_field_data($key, $echo = false) {

    global $post;

    $value = get_post_meta($post->ID, $key, true);

    if($echo == false) {

        return $value;

    } else {

        echo $value;

    }

}



function hide_admin_bar() {

    wp_add_inline_style('admin-bar', '<style> html { margin-top: 0 !important; } </style>');

    return false;

}



function menu() {

  register_nav_menus(

    array(

      'header' => __( 'Header' )

    )

  );

}



function updateNumbers() {

    global $wpdb;

    $querystr = "SELECT $wpdb->posts.* FROM $wpdb->posts WHERE $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type = 'post' ";

    $pageposts = $wpdb->get_results($querystr, OBJECT);

    $counts = 0 ;

    if ($pageposts):

    foreach ($pageposts as $post):

    setup_postdata($post);

    $counts++;

    add_post_meta($post->ID, 'incr_number', $counts, true);

    update_post_meta($post->ID, 'incr_number', $counts);

    endforeach;

    endif;

}



set_post_thumbnail_size( 600, 600 );



// if (class_exists('MultiPostThumbnails')) {

//     for ($i=1;$i<5;$i++) {

//         new MultiPostThumbnails(

//             array(

//                 'label' => 'Image '.$i,

//                 'id' => 'featured-image-'.$i,

//                 'post_type' => 'page'

//             )

//         ); 

//     }

// }



// 



function query_post_type($query) {

  if(is_category() || is_tag()) {

    $post_type = get_query_var('post_type');

    if($post_type)

        $post_type = $post_type;

    else

        $post_type = array('nav_menu_item','post','articles');

    $query->set('post_type',$post_type);

    return $query;

    }

}



function custom_pagination($numpages = '', $pagerange = '', $paged='') {

  if (empty($pagerange)) {

    $pagerange = 2;

  }

  /**

   * This first part of our function is a fallback

   * for custom pagination inside a regular loop that

   * uses the global $paged and global $wp_query variables.

   * 

   * It's good because we can now override default pagination

   * in our theme, and use this function in default quries

   * and custom queries.

   */

  global $paged;

  if (empty($paged)) {

    $paged = 1;

  }

  if ($numpages == '') {

    global $wp_query;

    $numpages = $wp_query->max_num_pages;

    if(!$numpages) {

        $numpages = 1;

    }

  }

  /** 

   * We construct the pagination arguments to enter into our paginate_links

   * function. 

   */

  $pagination_args = array(

    'base'            => get_pagenum_link(1) . '%_%',

    'format'          => 'page/%#%',

    'total'           => $numpages,

    'current'         => $paged,

    'show_all'        => False,

    'end_size'        => 1,

    'mid_size'        => $pagerange,

    'prev_next'       => False,

    'prev_text'       => __('&laquo;'),

    'next_text'       => __('&raquo;'),

    'type'            => 'plain',

    'add_args'        => false,

    'add_fragment'    => ''

  );

  $paginate_links = paginate_links($pagination_args);

  if ($paginate_links) {

    echo "<nav class='custom-pagination'>";

      echo $paginate_links;

    echo "</nav>";

  }

}

function my_formatter($content) {

 $new_content = '';

 $pattern_full = '{(\[raw\].*?\[/raw\])}is';

 $pattern_contents = '{\[raw\](.*?)\[/raw\]}is';

 $pieces = preg_split($pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE);

 

 foreach ($pieces as $piece) {

 if (preg_match($pattern_contents, $piece, $matches)) {

 $new_content .= $matches[1];

 } else {

 $new_content .= wptexturize(wpautop($piece));

 }

 }

 

 return $new_content;

}



function regScripts() {

    wp_deregister_script('jquery');



    wp_enqueue_script('jquery', (get_bloginfo('stylesheet_directory')."/node_modules/jquery/dist/jquery.min.js"));

    wp_enqueue_script('materialize-css', (get_bloginfo('stylesheet_directory')."/node_modules/materialize-css/dist/js/materialize.min.js"));

    wp_enqueue_script('inview', (get_bloginfo('stylesheet_directory')."/assets/js/inview.js"));

    wp_enqueue_script('slider', (get_bloginfo('stylesheet_directory')."/assets/js/jquery.flexslider-min.js"));

    wp_enqueue_script('transformicons', (get_bloginfo('stylesheet_directory')."/assets/js/transformicons.min.js"));

    wp_enqueue_script('functions.js', (get_bloginfo('stylesheet_directory')."/assets/js/functions.js"));

    

    wp_enqueue_style('bootstrap', get_bloginfo('stylesheet_directory').'/node_modules/bootstrap/dist/css/bootstrap.min.css');

    wp_enqueue_style('materialize-css', get_bloginfo('stylesheet_directory').'/node_modules/materialize-css/dist/css/materialize.css');

    wp_enqueue_style('css-reset', get_bloginfo('stylesheet_directory').'/node_modules/css-reset/reset.min.css');

    wp_enqueue_style('slider', get_bloginfo('stylesheet_directory').'/assets/css/flexslider.css');

    wp_enqueue_style('materialize-font', 'http://fonts.googleapis.com/icon?family=Material+Icons');

    wp_enqueue_style('style', get_bloginfo('stylesheet_directory').'/style.css');

}



// 



// update_option( 'siteurl', 'http://www.abla.com.br/hml/' );

// update_option( 'home', 'http://www.abla.com.br/hml/' );



add_theme_support( 'post-thumbnails' );

add_filter('the_content', 'my_formatter', 99);

add_filter('pre_get_posts', 'query_post_type');

add_filter( 'show_admin_bar', 'hide_admin_bar' );

add_filter('terms_clauses', 'df_terms_clauses', 10, 3);

add_action( 'wp_enqueue_scripts', 'regScripts' );

add_action ( 'publish_post', 'updateNumbers' );

add_action ( 'deleted_post', 'updateNumbers' );

add_action ( 'edit_post', 'updateNumbers' );

add_action( 'init', 'menu' );

add_action( 'customize_register', 'remove_customizer_settings', 20 );

add_action( 'customize_register', 'themeslug_theme_customizer' );

// if ( ! is_admin() ) {

//    add_action( 'pre_get_posts', 'category_and_tag_archives' );

// }

// add_action( 'init', 'add_taxonomies_to_pages' );

add_action( 'admin_menu', 'remove_menus' );

add_action( 'init', 'getrid' );



register_post_type( 'servicos', $servicos );

register_post_type( 'galeria', $galeria );



?>