<?php
/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */
if ( ! class_exists( 'Timber' ) ) {
	echo 'Timber not activated. Make sure you activate the plugin in <a href="/wp-admin/plugins.php#timber">/wp-admin/plugins.php</a>';
	return;
}

$context = Timber::get_context();
$page = Timber::query_post(get_option( 'page_for_posts' ));
$context['post'] = $page;
$context['posts'] = Timber::get_posts();
$context['pagination'] = Timber::get_pagination();
$context['cerca'] = get_search_query();
$context['categories']['temes'] = Timber::get_terms('category', array('parent' => get_category_id('temes')));
$context['categories']['tipus'] = Timber::get_terms('category', array('parent' => get_category_id('tipus')));
$post_links = types_child_posts('link', array('post_id' => get_option( 'page_for_posts' )));
$links = array();
foreach ($post_links as $k => $post_link) {
	$links[]['link_title'] = $post_link->fields['link_title'];
	$links[]['link_url'] = $post_link->fields['link_url'];
	$links[]['link_description'] = $post_link->fields['link_description'];  
}

$context['links'] = $links;
$context['sidebar_top'] = Timber::get_widgets('sidebar_top');
$context['sidebar_bottom'] = Timber::get_widgets('sidebar_bottom');

$templates = array( 'index.twig' );
if ( is_home() ) {
	array_unshift( $templates, 'home.twig' );
}

Timber::render( $templates, $context );


/**
 * Function to get the category ID given a category slug
 *
 * @param $slug
 * @return $int
*/
function get_category_id( $slug ) {
	$category = get_category_by_slug($slug);
	$category_id = $category->term_id; 
	return $category_id;
}