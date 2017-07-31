<?php 
/**
* Custom Meta
* http://docs.layerswp.com/how-to-add-custom-fields-to-posts-and-pages/
**/
 
// Add The Meta Box
 
//Add The Callback
   //Build the form with Layers_Form_Elements
 
//Save The Meta

/**
* Add The Meta Box
**/
function add_meta_box() {

  $screens = array('post');
  foreach ( $screens as $screen ) {

	  add_meta_box(
		'layers_child_meta_sectionid',
		__( 'My Theme Options', 'layerswp' ),
		'layers_child_meta_box_callback',
		$screen,
			'normal',
			'high'
	   );
  	}
}

?>