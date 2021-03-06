<?php
/**
 * Template Name: Separador i comptador de síl·labes
 *
 * @package wp-softcatala
 */
wp_enqueue_script( 'sc-js-sillabesca', get_template_directory_uri() . '/static/js/sep-sillabes/sillabes-ca.js', array('sc-js-main'), WP_SOFTCATALA_VERSION, true );
wp_enqueue_script( 'sc-js-hyphen', get_template_directory_uri() . '/static/js/sep-sillabes/hyphen.js', array('sc-js-main'), WP_SOFTCATALA_VERSION, true );
wp_enqueue_script( 'sc-js-hyphen-softcatala', get_template_directory_uri() . '/static/js/sep-sillabes/hyphen-softcatala.js', array('sc-js-main'), WP_SOFTCATALA_VERSION, true );
wp_enqueue_style( 'sc-css-sillabesca', get_template_directory_uri() . '/static/css/sep-sillabes.css', array('sc-css-main'),WP_SOFTCATALA_VERSION );

$context = Timber::get_context();
$post = new TimberPost();
$context['sidebar_top'] = Timber::get_widgets('sidebar_top_recursos');
$context['sidebar_elements'] = array( 'static/ajudeu.twig', 'static/dubte_forum.twig', 'baixades.twig', 'links.twig' );
$context['sidebar_bottom'] = Timber::get_widgets('sidebar_bottom_recursos');
$context['post'] = $post;
$context['credits'] = $post->get_field( 'credits' );
$context['customAnalytics'] = empty($post->get_field( 'custom_analytics' )) ? false : $post->get_field( 'custom_analytics' );
Timber::render( array( 'sep-sillabes.twig' ), $context );

