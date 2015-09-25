<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.2
 */

$templates = array( 'archive.twig', 'index.twig' );

$data = Timber::get_context();
$page = Timber::query_post(get_option( 'page_for_posts' ));
$data['post'] = $page;

$data['title'] = 'Archive';
if ( is_day() ) {
	$data['title'] = 'Archive: '.get_the_date( 'D M Y' );
} else if ( is_month() ) {
	$data['title'] = 'Archive: '.get_the_date( 'M Y' );
} else if ( is_year() ) {
	$data['title'] = 'Archive: '.get_the_date( 'Y' );
} else if ( is_tag() ) {
	$data['title'] = single_tag_title( '', false );
} else if ( is_category() ) {
	$data['title'] = single_cat_title( '', false );
	$data['cat_link'] = get_category_link( get_query_var('cat') );
	array_unshift( $templates, 'archive-' . get_query_var( 'cat' ) . '.twig' );
} else if ( is_post_type_archive() ) {
	$data['title'] = post_type_archive_title( '', false );
	array_unshift( $templates, 'archive-' . get_post_type() . '.twig' );
}
$post_links = types_child_posts('link', array('post_id' => get_option( 'page_for_posts' )));
$links = array();
foreach ($post_links as $k => $post_link) {
	$links[]['link_title'] = $post_link->fields['link_title'];
	$links[]['link_url'] = $post_link->fields['link_url'];
	$links[]['link_description'] = $post_link->fields['link_description'];
}

$data['links'] = $links;
$data['sidebar_top'] = Timber::get_widgets('sidebar_top');
$data['sidebar_bottom'] = Timber::get_widgets('sidebar_bottom');
$data['categories']['temes'] = Timber::get_terms('category', array('parent' => get_category_id('temes')));
$data['categories']['tipus'] = Timber::get_terms('category', array('parent' => get_category_id('tipus')));
$data['posts'] = Timber::get_posts();
$data['pagination'] = Timber::get_pagination();

Timber::render( $templates, $data );

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
