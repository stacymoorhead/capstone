(function( $ ) {
	'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */
	//document ready
	$(function(){
	 
	 //check for missing profile pics, fb images expire
			wppro_checkimagexists();
			function wppro_checkimagexists(){
				var imgarray = $(".wprevprodiv").find('img');
				imgarray.each(function() {
					var tempid;
					$( this ).error(function() {
						tempid = '';
						tempid = $( this ).attr('wprevid');
					  //change to default image
					  var defaultimgsrc = wprevpublicjs_script_vars.wprevpluginsurl+'/public/partials/imgs/fb_profile.jpg';
					  $( this ).attr('src',defaultimgsrc);
					  //try to update it here with ajax call
					  if(tempid>0){
						  var senddata = {
							action: 'wprp_update_profile_pic',	//required
							wpfb_nonce: wprevpublicjs_script_vars.wpfb_nonce,
							cache: false,
							processData : false,
							contentType : false,
							revid: tempid,
							};
							//send to ajax to update db
							var jqxhr = jQuery.post(wprevpublicjs_script_vars.wpfb_ajaxurl, senddata, function (data){
								console.log(data);
							});
					  }
					  
					});
				});
			}

		
	});

})( jQuery );
