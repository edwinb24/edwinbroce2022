<?php
/*
======================================
Adding Menu Support
====================================== 
*/


function acme_theme_setup() {
	add_theme_support('menus');
	add_theme_support('post-thumbnails');
	register_nav_menu('header_menu', 'Main Menu');
}

add_action('init', 'acme_theme_setup');

/*
 ======================================
 Adding Custom Post Type
 ====================================== 
 */

function theme_custom_post_type(){
	$job_labels	= array(
		'name' => 'Jobs',
		'singular' => 'Job',
		'add_new' => 'Add Job',
		'all_items' => 'All Jobs',
		'add_new_item' => 'Add Job',
		'edit_item' => 'Edit Job',
		'new_item' => 'New Job',
		'view_item' => 'View Job',
		'search_item' => 'Search Job',
		'not_found' => 'No jobs found',
		'not_found_in_trash' => 'No jobs found in trash',
		'parent_item_colon' => 'Job Item'
	);
	$job_args = array(
		'labels' => $job_labels,
		'public' => true,
		'has_archive' => true,
		'publicly_queryable' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'taxonomies' => array('category', 'post_tag'),
		'menu_position' => 5,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'supports' => array(
			'title',
			'editor',
			'excerpt',
			'thumbnail',
			'revision'
		)
	);
	register_post_type('jobs', $job_args);

	$proj_labels = array(
		'name' => 'Projects',
		'singular' => 'Project',
		'add_new' => 'Add Project',
		'all_items' => 'All Project',
		'add_new_item' => 'Add Project',
		'edit_item' => 'Edit Project',
		'new_item' => 'New Project',
		'view_item' => 'View Project',
		'search_item' => 'Search Project',
		'not_found' => 'No projects found',
		'not_found_in_trash' => 'No projects found in trash',
		'parent_item_colon' => 'Project Item',
	);
	$proj_args = array(
		'labels' => $proj_labels,
		'public' => true,
		'has_archive' => true,
		'publicly_queryable' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'taxonomies' => array('category', 'post_tag'),
		'menu_position' => 6,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'supports' => array(
			'title',
			'editor',
			'excerpt',
			'thumbnail',
			'revision'
		)
	);

	$pres_labels = array(
		'name' => 'Presentations',
		'singular' => 'Presentation',
		'add_new' => 'Add Presentation',
		'all_items' => 'All Presentation',
		'add_new_item' => 'Add Presentation',
		'edit_item' => 'Edit Presentation',
		'new_item' => 'New Presentation',
		'view_item' => 'View Presentation',
		'search_item' => 'Search Presentation',
		'not_found' => 'No presentations found',
		'not_found_in_trash' => 'No presentations found in trash',
		'parent_item_colon' => 'Presentation Item',
	);
	$pres_args = array(
		'labels' => $pres_labels,
		'public' => true,
		'has_archive' => true,
		'publicly_queryable' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'taxonomies' => array('category', 'post_tag'),
		'menu_position' => 7,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'supports' => array(
			'title',
			'editor',
			'excerpt',
			'thumbnail',
			'revision'
		)
	);

	register_post_type('projects', $proj_args);
	register_post_type('presentations', $pres_args);
	register_post_type('jobs', $job_args);
}

add_action('init', 'theme_custom_post_type');

