<?php
/**
 * Template Name: Adaptador de fitxers al valencià
 *
 * @package wp-softcatala
 */
 wp_enqueue_script( 'sc-js-adaptador', get_template_directory_uri() . '/static/js/adaptador.js', array('sc-js-main'), WP_SOFTCATALA_VERSION, true );
 wp_localize_script( 'sc-js-adaptador', 'scajax', array(
     'ajax_url' => admin_url( 'admin-ajax.php' )
 ));

$context = Timber::get_context();
$post = new TimberPost();
$context['sidebar_top'] = Timber::get_widgets('sidebar_top');
$context['sidebar_elements'] = array( 'static/dubte_forum.twig', 'baixades.twig', 'links.twig' );
$context['sidebar_bottom'] = Timber::get_widgets('sidebar_bottom');
$context['post'] = $post;
$context['links'] = $post->get_field( 'link' );

Timber::render( array( 'adaptador.twig' ), $context );
