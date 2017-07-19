<?php
/**
 * Plugin Name: Custom Post Types and Taxonomies
 * Description: A plugin that adds custom post types and taxonomies
 * Version: 0.1
 * Author: Stacy Moorhead
 * License: GPL2
 */
 
 /* Copyright 2017 Stacy Moorhead
Custom Post Types and Taxonomies is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
{Plugin Name} is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with this program. If not, write to the Free Software Foundation, Inc.,
51 Franklin St., Fifth Floor, Boston, MA 02110-1301 USA
*/

function custom_posttypes() {
    $labels = array(
		'name'               => 'Services',
		'singular_name'      => 'Service',
		'menu_name'          => 'Services' ,
		'name_admin_bar'     => 'Service',
		'add_new'            => 'Add New',
		'add_new_item'       => 'Add New Service' ,
		'new_item'           => 'New Service',
		'edit_item'          => 'Edit Service' ,
		'view_item'          => 'View Service' ,
		'all_items'          => 'All Services',
		'search_items'       => 'Search Services',
		'parent_item_colon'  => 'Parent Services:',
		'not_found'          => 'No services found.',
		'not_found_in_trash' => 'No services found in Trash.' 
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'menu_position'      => 5,
		'menu_icon'          => 'dashicons-admin-customizer',
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'service' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail' )
	);
    register_post_type('services', $args);
}

add_action('init', 'custom_posttypes');

function my_rewrite_flush() {
    // First, we "add" the custom post type via the above written function.
    // Note: "add" is written with quotes, as CPTs don't get added to the DB,
    // They are only referenced in the post_type column with a post entry, 
    // when you add a post of this CPT.
    custom_posttypes();

    // ATTENTION: This is *only* done during plugin activation hook in this example!
    // You should *NEVER EVER* do this on every page load!!
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'my_rewrite_flush' );

