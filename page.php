<?php
/**
 * Template Name: Plantilla text amb menú dreta
 *
 * @package wp-softcatala
 */

$context = Timber::get_context();
$post = new TimberPost();
$context['sidebar_top'] = Timber::get_widgets('sidebar_top');
$context['sidebar_elements'] = array( 'static/dubte_forum.twig', 'baixades.twig', 'links.twig' );
$context['sidebar_bottom'] = Timber::get_widgets('sidebar_bottom');
$context['post'] = $post;
$context['credits'] = $post->get_field( 'credits' );
$context['customAnalytics'] = empty($post->get_field( 'custom_analytics' )) ? false : $post->get_field( 'custom_analytics' );
Timber::render( array( 'page-' . $post->post_name . '.twig', 'page.twig' ), $context );