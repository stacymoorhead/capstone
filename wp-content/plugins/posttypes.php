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
	//Services Icons
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
		'supports'           => array( 'title', 'editor', 'thumbnail', 'page-attributes', 'service_page_url' )
	);
    register_post_type('services', $args);
    
    //People
    $labels = array(
		'name'               => 'Staff',
		'singular_name'      => 'Staff Member',
		'menu_name'          => 'Staff' ,
		'name_admin_bar'     => 'Staff Member',
		'add_new'            => 'Add New',
		'add_new_item'       => 'Add New Staff Member' ,
		'new_item'           => 'New Staff Member',
		'edit_item'          => 'Edit Staff Member' ,
		'view_item'          => 'View Staff Member' ,
		'all_items'          => 'All Staff',
		'search_items'       => 'Search Staff',
		'parent_item_colon'  => 'Parent Staff:',
		'not_found'          => 'No staff found.',
		'not_found_in_trash' => 'No staff found in Trash.' 
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'menu_position'      => 5,
		'menu_icon'          => 'dashicons-id-alt',
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'staff' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'		 => array( 'category', 'post_tag' )

	);
    register_post_type('staff', $args);
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

//Set order posts appear on home page
function set_custom_post_types_admin_order($wp_query) {
  if (is_admin()) {

    // Get the post type from the query
    $post_type = $wp_query->query['post_type'];

    if ( $post_type == 'POST_TYPE') {

      // 'order' value can be ASC or DESC
      $wp_query->set('order', 'ASC');
    }
  }
}
add_filter('pre_get_posts', 'set_custom_post_types_admin_order');

