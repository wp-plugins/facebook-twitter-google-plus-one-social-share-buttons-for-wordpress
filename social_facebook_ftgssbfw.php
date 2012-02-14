<?php

/*
Plugin Name: Facebook, Twitter, Google Plus One social share buttons for Wordpress
Plugin URI: http://donisocial.donimedia-servicetique.net/
Description: With this widget , you can display a customizable jQuery accordion which gathers Facebook social plugins together , on your Wordpress website . <a href="http://www.donimedia-servicetique.net/newsletters" title="Be well informed about our latest creations or updates">Newsletter</a> | <a href="http://www.donimedia-servicetique.net/support-forum-donimedia-servicetique-cms-extensions">Support Forum</a>
Version: 1.0.0
Author: David DONISA
Author URI: http://donisocial.donimedia-servicetique.net/
*/


	/** Make sure that the WordPress bootstrap has run before continuing. */
	require( $_SERVER["DOCUMENT_ROOT"].'/wp-load.php' );  //  require( 'C:/Documents and Settings/HP DC7600/Mes documents/EasyPHP5.2.10/www/donisocial/wp-load.php' );  //  require( $_SERVER["DOCUMENT_ROOT"].'/donisocial/wp-load.php' );








	//  error_reporting(E_ALL);  //  For DEBUG purpose
	add_action("widgets_init", array('social_facebook_ftgssbfw', 'register'));
	register_activation_hook( __FILE__, array('social_facebook_ftgssbfw', 'activate'));
	register_deactivation_hook( __FILE__, array('social_facebook_ftgssbfw', 'deactivate'));



	global $data;


	$plugin_dir = basename(dirname(__FILE__));


	$plugin_prefix = 'social_facebook_ftgssbfw';






	function social_facebook_ftgssbfw_upload_css (){


		global $data;

		$data = get_option('social_facebook_ftgssbfw_name');

		

		//  Retrieval of share buttons container background color

		if ( $data['social_facebook_ftgssbfw_share_buttons_container_background_color'] ) {

			$share_buttons_container_background_color = "#".$data['social_facebook_ftgssbfw_share_button_background_color'];

		} else {

			$share_buttons_container_background_color = 'transparent';

		};




		//  Retrieval of share button background color

		if ( $data['social_facebook_ftgssbfw_share_button_background_color'] ) {

			$share_button_background_color = "#".$data['social_facebook_ftgssbfw_share_button_background_color'];

		} else {

			$share_button_background_color = 'transparent';

		};








		$css_to_display = "<style type='text/css'>



			.social_facebook_ftgssbfw_share_buttons_container{

				position: relative; 

				width: 100%; 
				height: ".$data['social_facebook_ftgssbfw_share_buttons_container_height']."px; 

				padding-top: 15px;

				background: ".$share_buttons_container_background_color.";

				border: ".$data['social_facebook_ftgssbfw_share_buttons_container_border_style']." ".$data['social_facebook_ftgssbfw_share_buttons_container_border_width']."px #".$data['social_facebook_ftgssbfw_share_buttons_container_border_color'].";	/*  Option */

			}
			
			.social_facebook_ftgssbfw_share_buttons{

				position: relative;

				float: left;
		

				width : 100px;
				height: 20px;

				margin-top: 0px;
				margin-bottom: 10px;
				margin-left: 25px;
				margin-right: 0px;

				border: ".$data['social_facebook_ftgssbfw_share_button_border_style']." ".$data['social_facebook_ftgssbfw_share_button_border_width']."px #".$data['social_facebook_ftgssbfw_share_button_border_color'].";	/*  Option */
				text-align: center;

				background: ".$share_buttons_container_background_color.";
				color: #000000;	 /*  Option */

				/* color: #".$data['social_facebook_ftgssbfw_hexadecimal_text_color'].";   */

			}


			div:last_child.social_facebook_ftgssbfw_share_buttons{

				position: relative;

				float: left;
		

				width : 100px;
				height: 20px;

				margin-top: 0px;
				margin-bottom: 10px;
				margin-left: 90px;
				margin-right: 0px;

				border: dashed 1px #000000;    /* Option */
				text-align: center;
		
				/* background: #ffffff; */
				color: #000000;

				/* color: #".$data['social_facebook_ftgssbfw_hexadecimal_text_color'].";   */

			}






		</style>";

		echo $css_to_display;



	};  //  function social_facebook_ftgssbfw_upload_css () End







	function social_facebook_ftgssbfw_upload_jquery (){

		global $data;

		$data = get_option('social_facebook_ftgssbfw_name');



		$jquery_to_display = "<script type='text/javascript'>
			


					  /*  Share buttons display handling */

						jQuery(document).ready(function() {

						    var share_buttons = jQuery('.social_facebook_ftgssbfw_share_buttons_container').find('.social_facebook_ftgssbfw_share_buttons');
						    var share_buttons_source_codes = new Array;
						    var div_boxes_to_display_total = share_buttons.length;
						    var share_buttons_total = share_buttons.length;

						    var opening_duration = ".$data['social_facebook_ftgssbfw_share_button_opening_duration'].";				/*  Option in milliseconds */
						    var closing_duration = ".$data['social_facebook_ftgssbfw_share_button_closing_duration'].";				/*  Option */
						    var animation_speed = ".$data['social_facebook_ftgssbfw_share_button_animation_speed'].";				/*  Option */

						    share_buttons.each(function(){
						      share_buttons_source_codes.push(jQuery(this).html());
						    });


						    // animation
						    var change_share_buttons = function(){

						      var div_box_to_display_random_index = Math.floor(div_boxes_to_display_total * Math.random());
						      var share_buttons_source_codes_random_index = Math.floor(share_buttons_total * Math.random());

						      share_buttons.eq(div_box_to_display_random_index).fadeTo(closing_duration,0,function(){
						        $(this).html(share_buttons_source_codes[share_buttons_source_codes_random_index]).fadeTo(opening_duration,1);
						      });


						    };
						    setInterval(change_share_buttons, animation_speed);


						    return this;









						});	//  jQuery(document).ready(function() { End






		</script>


		<script type='text/javascript' src='http://widgets.digg.com/buttons.js'></script>
		
		<script type='text/javascript' src='http://assets.pinterest.com/js/pinit.js'></script>


		 <script type='text/javascript'> 
			(function() { 
		     		var li = document.createElement('script'); li.type = 'text/javascript'; li.async = true; 
			      li.src = 'https://platform.stumbleupon.com/1/widgets.js'; 
			      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(li, s); 
			 })(); 
		 </script>





<script type='text/javascript' src='https://apis.google.com/js/plusone.js'>
  {parsetags: 'explicit'}
</script>


		



	";  //  $jquery_to_display End


		echo $jquery_to_display;



	};  //  function social_facebook_ftgssbfw_upload_jquery () End


	add_action("wp_head", 'social_facebook_ftgssbfw_upload_css');
	add_action("wp_head", 'social_facebook_ftgssbfw_upload_jquery');





























class social_facebook_ftgssbfw {

  function activate(){

		global $data;

    		$data = array( 

								//  Some variables are posted, some not  ( For instance , For example, those beginning with "is" )
								'social_facebook_ftgssbfw_title' => 'Your widget title',
								'social_facebook_ftgssbfw_blog_url' => site_url(),
								'social_facebook_ftgssbfw_share_button_opening_duration' => '2000',
								'social_facebook_ftgssbfw_share_button_closing_duration' => '2000',
								'social_facebook_ftgssbfw_share_button_animation_speed' => '3000',



								'is_social_facebook_ftgssbfw_share_buttons_container_border_style_first_load' => 'yes',
								'social_facebook_ftgssbfw_share_buttons_container_border_style' => 'none',
								'social_facebook_ftgssbfw_share_buttons_container_border_width' => '1',
								'social_facebook_ftgssbfw_share_buttons_container_border_color' => '000000',
								'social_facebook_ftgssbfw_share_buttons_container_background_color' => '',
								'social_facebook_ftgssbfw_share_buttons_container_height' => '180',

								'is_social_facebook_ftgssbfw_share_button_border_style_first_load' => 'yes',
								'social_facebook_ftgssbfw_share_button_border_style' => 'dotted',
								'social_facebook_ftgssbfw_share_button_border_width' => '1',
								'social_facebook_ftgssbfw_share_button_border_color' => '000000',
								'social_facebook_ftgssbfw_share_button_background_color' => '',



								'social_facebook_ftgssbfw_facebook_url_page' => '' ,
								'social_facebook_ftgssbfw_facebook_app_id' => '' ,


								'social_facebook_ftgssbfw_delicious_button' => 'yes',
								'is_social_facebook_ftgssbfw_delicious_button_first_load' => 'yes',

								'social_facebook_ftgssbfw_digg_button' => 'yes',
								'is_social_facebook_ftgssbfw_digg_button_first_load' => 'yes',

								'social_facebook_ftgssbfw_facebook_button' => 'yes',
								'is_social_facebook_ftgssbfw_facebook_button_first_load' => 'yes',

								'social_facebook_ftgssbfw_google_plus_button' => 'yes',
								'is_social_facebook_ftgssbfw_google_plus_button_first_load' => 'yes',

								'social_facebook_ftgssbfw_hyves_button' => 'yes',
								'is_social_facebook_ftgssbfw_hyves_button_first_load' => 'yes',

								'social_facebook_ftgssbfw_hyves_button' => 'yes',
								'is_social_facebook_ftgssbfw_hyves_button_first_load' => 'yes',

								'social_facebook_ftgssbfw_linkedin_button' => 'yes',
								'is_social_facebook_ftgssbfw_linkedin_button_first_load' => 'yes',

								'social_facebook_ftgssbfw_pinterest_button' => 'yes',
								'is_social_facebook_ftgssbfw_pinterest_button_first_load' => 'yes',

								'social_facebook_ftgssbfw_reddit_button' => 'yes',
								'is_social_facebook_ftgssbfw_reddit_button_first_load' => 'yes',

								'social_facebook_ftgssbfw_stumbleupon_button' => 'yes',
								'is_social_facebook_ftgssbfw_stumbleupon_button_first_load' => 'yes',

								'social_facebook_ftgssbfw_twitter_button' => 'yes',
								'is_social_facebook_ftgssbfw_twitter_button_first_load' => 'yes',




								'social_facebook_ftgssbfw_credit_link' => 'yes',
								'is_social_facebook_ftgssbfw_credit_link_first_load' => 'yes',

							);

    	if ( ! get_option('social_facebook_ftgssbfw_name')){
     	add_option('social_facebook_ftgssbfw_name' , $data);
    	} else {
     	update_option('social_facebook_ftgssbfw_name' , $data);
    	}
  }

  function deactivate(){

    	delete_option('social_facebook_ftgssbfw_name');

  }


function control(){

	global $data;

  $data = get_option('social_facebook_ftgssbfw_name');
  ?>



	<h3>General Settings</h3>
  	<p><label>Title <b>:</b> <br /> <input name="social_facebook_ftgssbfw_title" type="text" size="30" value="<?php echo $data['social_facebook_ftgssbfw_title']; ?>" /></label></p>
  	<p><label>Share button <b>opening duration</b> <br />( in millisecondes ) <b>:</b> <br /> <input name="social_facebook_ftgssbfw_share_button_opening_duration" type="text" size="6" value="<?php echo $data['social_facebook_ftgssbfw_share_button_opening_duration']; ?>" /></label></p>
  	<p><label>Share button <b>closing duration</b> <br />( in millisecondes ) <b>:</b> <br /> <input name="social_facebook_ftgssbfw_share_button_closing_duration" type="text" size="6" value="<?php echo $data['social_facebook_ftgssbfw_share_button_closing_duration']; ?>" /></label></p>
  	<p><label>Share button <b>animation speed</b> <br />( in millisecondes ) <b>:</b> <br /> <input name="social_facebook_ftgssbfw_share_button_animation_speed" type="text" size="6" value="<?php echo $data['social_facebook_ftgssbfw_share_button_animation_speed']; ?>" /></label></p>


	<h3>Share Buttons Container Settings</h3>

<?php



	// Border style display control :

	if ( $data['is_social_facebook_ftgssbfw_share_buttons_container_border_style_first_load'] == 'yes' ) {

	  	echo '
			<p><label>Border style <b>:</b></label>

				<select name="social_facebook_ftgssbfw_share_buttons_container_border_style" >

					<option value="dashed">Dashed</option>
					<option value="dotted">Dotted</option>
					<option value="double">Double</option>
					<option value="none" selected>None</option>
					<option value="solid">Solid</option>

				</select>
	  		</p>
		';

		$data['is_social_facebook_ftgssbfw_share_buttons_container_border_style_first_load'] = 'no';

	} else {

		if ( $data['social_facebook_ftgssbfw_share_buttons_container_border_style'] == 'dashed' ) {

	  	echo '
			<p><label>Border style <b>:</b></label>

				<select name="social_facebook_ftgssbfw_share_buttons_container_border_style" >

					<option value="dashed" selected>Dashed</option>
					<option value="dotted">Dotted</option>
					<option value="double">Double</option>
					<option value="none">None</option>
					<option value="solid">Solid</option>

				</select>
	  		</p>
		';

		} elseif ( $data['social_facebook_ftgssbfw_share_buttons_container_border_style'] == 'dotted' ) {

		  	echo '
			<p><label>Border style <b>:</b></label>

				<select name="social_facebook_ftgssbfw_share_buttons_container_border_style" >

					<option value="dashed">Dashed</option>
					<option value="dotted" selected>Dotted</option>
					<option value="double">Double</option>
					<option value="none">None</option>
					<option value="solid">Solid</option>

				</select>
	  		</p>
		';

		} elseif ( $data['social_facebook_ftgssbfw_share_buttons_container_border_style'] == 'double' ) {

	  	echo '
			<p><label>Border style <b>:</b></label>

				<select name="social_facebook_ftgssbfw_share_buttons_container_border_style" >

					<option value="dashed">Dashed</option>
					<option value="dotted">Dotted</option>
					<option value="double" selected>Double</option>
					<option value="none">None</option>
					<option value="solid">Solid</option>

				</select>
	  		</p>
		';
		} elseif ( $data['social_facebook_ftgssbfw_share_buttons_container_border_style'] == 'none' ) {

	  	echo '
			<p><label>Border style <b>:</b></label>

				<select name="social_facebook_ftgssbfw_share_buttons_container_border_style" >

					<option value="dashed">Dashed</option>
					<option value="dotted">Dotted</option>
					<option value="double">Double</option>
					<option value="none" selected>None</option>
					<option value="solid">Solid</option>

				</select>
	  		</p>
		';
		} elseif ( $data['social_facebook_ftgssbfw_share_buttons_container_border_style'] == 'solid' ) {

	  	echo '
			<p><label>Border style <b>:</b></label>

				<select name="social_facebook_ftgssbfw_share_buttons_container_border_style" >

					<option value="dashed">Dashed</option>
					<option value="dotted">Dotted</option>
					<option value="double">Double</option>
					<option value="none">None</option>
					<option value="solid selected">Solid</option>

				</select>
	  		</p>
		';
		};
	};


?>


  	<p><label>Border width ( in px ) <b>:</b><br />( <b>3</b> px recommended for "double" <br />border style ) <br /> <input name="social_facebook_ftgssbfw_share_buttons_container_border_width" type="text" size="6" value="<?php echo $data['social_facebook_ftgssbfw_share_buttons_container_border_width']; ?>" /></label></p>
  	<p><label>Border color <b>:</b> <br /> <input name="social_facebook_ftgssbfw_share_buttons_container_border_color" type="text" size="6" value="<?php echo $data['social_facebook_ftgssbfw_share_buttons_container_border_color']; ?>" /></label></p>
  	<p><label>Background color <b>:</b><br />( Leave empty for a transparent background ) <br /> <input name="social_facebook_ftgssbfw_share_buttons_container_background_color" type="text" size="6" value="<?php echo $data['social_facebook_ftgssbfw_share_buttons_container_background_color']; ?>" /></label></p>
  	<p><label>Container height <b>:</b><br /><span style="font-weight: bold; color: #ff0000">( Adjust to see all share buttons correctly )</span> <br /> <input name="social_facebook_ftgssbfw_share_buttons_container_height" type="text" size="6" value="<?php echo $data['social_facebook_ftgssbfw_share_buttons_container_height']; ?>" /></label></p>











	<h3>Share Buttons Settings</h3>




<?php



	// Border style display control :

	if ( $data['is_social_facebook_ftgssbfw_share_button_border_style_first_load'] == 'yes' ) {

	  	echo '
			<p><label>Border style <b>:</b></label>

				<select name="social_facebook_ftgssbfw_share_button_border_style" >

					<option value="dashed">Dashed</option>
					<option value="dotted" selected>Dotted</option>
					<option value="double">Double</option>
					<option value="none">None</option>

				</select>
	  		</p>
		';

		$data['is_social_facebook_ftgssbfw_share_button_border_style_first_load'] = 'no';

	} else {

		if ( $data['social_facebook_ftgssbfw_share_button_border_style'] == 'dashed' ) {

	  	echo '
			<p><label>Border style <b>:</b></label>

				<select name="social_facebook_ftgssbfw_share_button_border_style" >

					<option value="dashed" selected>Dashed</option>
					<option value="dotted">Dotted</option>
					<option value="double">Double</option>
					<option value="none">None</option>

				</select>
	  		</p>
		';

		} elseif ( $data['social_facebook_ftgssbfw_share_button_border_style'] == 'dotted' ) {

		  	echo '
			<p><label>Border style <b>:</b></label>

				<select name="social_facebook_ftgssbfw_share_button_border_style" >

					<option value="dashed">Dashed</option>
					<option value="dotted" selected>Dotted</option>
					<option value="double">Double</option>
					<option value="none">None</option>

				</select>
	  		</p>
		';

		} elseif ( $data['social_facebook_ftgssbfw_share_button_border_style'] == 'double' ) {

	  	echo '
			<p><label>Border style <b>:</b></label>

				<select name="social_facebook_ftgssbfw_share_button_border_style" >

					<option value="dashed">Dashed</option>
					<option value="dotted">Dotted</option>
					<option value="double" selected>Double</option>
					<option value="none">None</option>

				</select>
	  		</p>
		';
		} elseif ( $data['social_facebook_ftgssbfw_share_button_border_style'] == 'none' ) {

	  	echo '
			<p><label>Border style <b>:</b></label>

				<select name="social_facebook_ftgssbfw_share_button_border_style" >

					<option value="dashed">Dashed</option>
					<option value="dotted">Dotted</option>
					<option value="double">Double</option>
					<option value="none" selected>None</option>

				</select>
	  		</p>
		';
		};
	};


?>


  	<p><label>Border width ( in px ) <b>:</b><br />( <b>3</b> px recommended for "double" <br />border style ) <br /> <input name="social_facebook_ftgssbfw_share_button_border_width" type="text" size="6" value="<?php echo $data['social_facebook_ftgssbfw_share_button_border_width']; ?>" /></label></p>
  	<p><label>Border color <b>:</b> <br /> <input name="social_facebook_ftgssbfw_share_button_border_color" type="text" size="6" value="<?php echo $data['social_facebook_ftgssbfw_share_button_border_color']; ?>" /></label></p>
  	<p><label>Background color <b>:</b><br />( Leave empty for a transparent background ) <br /> <input name="social_facebook_ftgssbfw_share_button_background_color" type="text" size="6" value="<?php echo $data['social_facebook_ftgssbfw_share_button_background_color']; ?>" /></label></p>













	

  <?php


	echo'<h3>Share Buttons Selection</h3>';


	if ( $data['is_social_facebook_ftgssbfw_delicious_button_first_load'] == 'yes' ) {

	  	echo '<p><label><b>Delicious</b> button <b>:</b> <br /> Yes <input name="social_facebook_ftgssbfw_delicious_button" type="radio" value="yes" checked/>';
	  	echo ' No <input name="social_facebook_ftgssbfw_delicious_button" type="radio" value="no" /></label></p>';

		$data['is_social_facebook_ftgssbfw_delicious_button_first_load'] = 'no';

	} else {

		if ( $data['social_facebook_ftgssbfw_delicious_button'] == 'yes' ) {

		  	echo '<p><label><b>Delicious</b> button <b>:</b> <br /> Yes <input name="social_facebook_ftgssbfw_delicious_button" type="radio" value="yes" checked/>';
		  	echo ' No <input name="social_facebook_ftgssbfw_delicious_button" type="radio" value="no" /></label></p>';

		} else {

		  	echo '<p><label><b>Delicious</b> button <b>:</b> <br /> Yes <input name="social_facebook_ftgssbfw_delicious_button" type="radio" value="yes" />';
		  	echo ' No <input name="social_facebook_ftgssbfw_delicious_button" type="radio" value="no" checked/></label></p>';

		};
	};




	if ( $data['is_social_facebook_ftgssbfw_digg_button_first_load'] == 'yes' ) {

	  	echo '<p><label><b>Digg</b> button <b>:</b> <br /> Yes <input name="social_facebook_ftgssbfw_digg_button" type="radio" value="yes" checked/>';
	  	echo ' No <input name="social_facebook_ftgssbfw_digg_button" type="radio" value="no" /></label></p>';

		$data['is_social_facebook_ftgssbfw_digg_button_first_load'] = 'no';

	} else {

		if ( $data['social_facebook_ftgssbfw_digg_button'] == 'yes' ) {

		  	echo '<p><label><b>Digg</b> button <b>:</b> <br /> Yes <input name="social_facebook_ftgssbfw_digg_button" type="radio" value="yes" checked/>';
		  	echo ' No <input name="social_facebook_ftgssbfw_digg_button" type="radio" value="no" /></label></p>';

		} else {

		  	echo '<p><label><b>Digg</b> button <b>:</b> <br /> Yes <input name="social_facebook_ftgssbfw_digg_button" type="radio" value="yes" />';
		  	echo ' No <input name="social_facebook_ftgssbfw_digg_button" type="radio" value="no" checked/></label></p>';

		};
	};




	if ( $data['is_social_facebook_ftgssbfw_facebook_button_first_load'] == 'yes' ) {

	  	echo '<p><label><b>Facebook</b> button <b>:</b> <br /> Yes <input name="social_facebook_ftgssbfw_facebook_button" type="radio" value="yes" checked/>';
	  	echo ' No <input name="social_facebook_ftgssbfw_facebook_button" type="radio" value="no" /></label></p>';
	  	echo ' <p><label>Facebook Url Page <span style="font-weight: bold; color: #ff0000;"> ( required )</span> <b>:</b> <br /> <input name="social_facebook_ftgssbfw_facebook_url_page" type="text" size="30" value="'.$data['social_facebook_ftgssbfw_facebook_url_page'].'" /></label></p>';
	  	echo ' <p><label>Facebook App Id <span style="font-weight: bold; color: #ff0000;"> ( required )</span> <b>:</b> <br /> <input name="social_facebook_ftgssbfw_facebook_app_id" type="text" size="16" value="'.$data['social_facebook_ftgssbfw_facebook_app_id'].'" /></label></p>';
	  	echo ' <p style="text-align: center; border-width:2px;	border-style: dotted solid;"><a href="http://donisocial.donimedia-servicetique.net/?p=49" target="_blank" title="How to retrieve a Facebook App id - DoniSocial Tutorial">How to retrieve a Facebook App Id ?</a></p>';

		$data['is_social_facebook_ftgssbfw_facebook_button_first_load'] = 'no';

	} else {

		if ( $data['social_facebook_ftgssbfw_facebook_button'] == 'yes' ) {

		  	echo '<p><label><b>Facebook</b> button <b>:</b> <br /> Yes <input name="social_facebook_ftgssbfw_facebook_button" type="radio" value="yes" checked/>';
		  	echo ' No <input name="social_facebook_ftgssbfw_facebook_button" type="radio" value="no" /></label></p>';
		  	echo ' <p><label>Facebook Url Page <span style="font-weight: bold; color: #ff0000;"> ( required )</span> <b>:</b> <br /> <input name="social_facebook_ftgssbfw_facebook_url_page" type="text" size="30" value="'.$data['social_facebook_ftgssbfw_facebook_url_page'].'" /></label></p>';
		  	echo ' <p><label>Facebook App Id <span style="font-weight: bold; color: #ff0000;"> ( required )</span> <b>:</b> <br /> <input name="social_facebook_ftgssbfw_facebook_app_id" type="text" size="16" value="'.$data['social_facebook_ftgssbfw_facebook_app_id'].'" /></label></p>';
	  		echo ' <p style="text-align: center; border-width:2px;	border-style: dotted solid;"><a href="http://donisocial.donimedia-servicetique.net/?p=49" target="_blank" title="How to retrieve a Facebook App id - DoniSocial Tutorial">How to retrieve a Facebook App Id ?</a></p>';


		} else {

		  	echo '<p><label><b>Facebook</b> button <b>:</b> <br /> Yes <input name="social_facebook_ftgssbfw_facebook_button" type="radio" value="yes" />';
		  	echo ' No <input name="social_facebook_ftgssbfw_facebook_button" type="radio" value="no" checked/></label></p>';
		  	echo ' <p><label>Facebook Url Page <span style="font-weight: bold; color: #ff0000;"> ( required )</span> <b>:</b> <br /> <input name="social_facebook_ftgssbfw_facebook_url_page" type="text" size="30" value="'.$data['social_facebook_ftgssbfw_facebook_url_page'].'" /></label></p>';
		  	echo ' <p><label>Facebook App Id <span style="font-weight: bold; color: #ff0000;"> ( required )</span> <b>:</b> <br /> <input name="social_facebook_ftgssbfw_facebook_app_id" type="text" size="16" value="'.$data['social_facebook_ftgssbfw_facebook_app_id'].'" /></label></p>';
		  	echo ' <p style="text-align: center; border-width:2px;	border-style: dotted solid;"><a href="http://donisocial.donimedia-servicetique.net/?p=49" target="_blank" title="How to retrieve a Facebook App id - DoniSocial Tutorial">How to retrieve a Facebook App Id ?</a></p>';


		};
	};





	if ( $data['is_social_facebook_ftgssbfw_google_plus_button_first_load'] == 'yes' ) {

	  	echo '<p><label><b>Google Plus One</b> button <b>:</b> <br /> Yes <input name="social_facebook_ftgssbfw_google_plus_button" type="radio" value="yes" checked/>';
	  	echo ' No <input name="social_facebook_ftgssbfw_google_plus_button" type="radio" value="no" /></label></p>';

		$data['is_social_facebook_ftgssbfw_google_plus_button_first_load'] = 'no';

	} else {

		if ( $data['social_facebook_ftgssbfw_google_plus_button'] == 'yes' ) {

		  	echo '<p><label><b>Google Plus One</b> button <b>:</b> <br /> Yes <input name="social_facebook_ftgssbfw_google_plus_button" type="radio" value="yes" checked/>';
		  	echo ' No <input name="social_facebook_ftgssbfw_google_plus_button" type="radio" value="no" /></label></p>';

		} else {

		  	echo '<p><label><b>Google Plus One</b> button <b>:</b> <br /> Yes <input name="social_facebook_ftgssbfw_google_plus_button" type="radio" value="yes" />';
		  	echo ' No <input name="social_facebook_ftgssbfw_google_plus_button" type="radio" value="no" checked/></label></p>';

		};
	};






	if ( $data['is_social_facebook_ftgssbfw_hyves_button_first_load'] == 'yes' ) {

	  	echo '<p><label><b>Hyves</b> button <b>:</b> <br /> Yes <input name="social_facebook_ftgssbfw_hyves_button" type="radio" value="yes" checked/>';
	  	echo ' No <input name="social_facebook_ftgssbfw_hyves_button" type="radio" value="no" /></label></p>';

		$data['is_social_facebook_ftgssbfw_hyves_button_first_load'] = 'no';

	} else {

		if ( $data['social_facebook_ftgssbfw_hyves_button'] == 'yes' ) {

		  	echo '<p><label><b>Hyves</b> button <b>:</b> <br /> Yes <input name="social_facebook_ftgssbfw_hyves_button" type="radio" value="yes" checked/>';
		  	echo ' No <input name="social_facebook_ftgssbfw_hyves_button" type="radio" value="no" /></label></p>';

		} else {

		  	echo '<p><label><b>Hyves </b>button <b>:</b> <br /> Yes <input name="social_facebook_ftgssbfw_hyves_button" type="radio" value="yes" />';
		  	echo ' No <input name="social_facebook_ftgssbfw_hyves_button" type="radio" value="no" checked/></label></p>';

		};
	};



	if ( $data['is_social_facebook_ftgssbfw_linkedin_button_first_load'] == 'yes' ) {

	  	echo '<p><label>L<b>inkedIn</b> button <b>:</b> <br /> Yes <input name="social_facebook_ftgssbfw_linkedin_button" type="radio" value="yes" checked/>';
	  	echo ' No <input name="social_facebook_ftgssbfw_linkedin_button" type="radio" value="no" /></label></p>';

		$data['is_social_facebook_ftgssbfw_linkedin_button_first_load'] = 'no';

	} else {

		if ( $data['social_facebook_ftgssbfw_linkedin_button'] == 'yes' ) {

		  	echo '<p><label><b>LinkedIn</b> button <b>:</b> <br /> Yes <input name="social_facebook_ftgssbfw_linkedin_button" type="radio" value="yes" checked/>';
		  	echo ' No <input name="social_facebook_ftgssbfw_linkedin_button" type="radio" value="no" /></label></p>';

		} else {

		  	echo '<p><label><b>LinkedIn</b> button <b>:</b> <br /> Yes <input name="social_facebook_ftgssbfw_linkedin_button" type="radio" value="yes" />';
		  	echo ' No <input name="social_facebook_ftgssbfw_linkedin_button" type="radio" value="no" checked/></label></p>';

		};
	};





	if ( $data['is_social_facebook_ftgssbfw_pinterest_button_first_load'] == 'yes' ) {

	  	echo '<p><label><b>Pinterest</b> button <b>:</b> <br /> Yes <input name="social_facebook_ftgssbfw_pinterest_button" type="radio" value="yes" checked/>';
	  	echo ' No <input name="social_facebook_ftgssbfw_pinterest_button" type="radio" value="no" /></label></p>';

		$data['is_social_facebook_ftgssbfw_pinterest_button_first_load'] = 'no';

	} else {

		if ( $data['social_facebook_ftgssbfw_pinterest_button'] == 'yes' ) {

		  	echo '<p><label><b>Pinterest</b> button <b>:</b> <br /> Yes <input name="social_facebook_ftgssbfw_pinterest_button" type="radio" value="yes" checked/>';
		  	echo ' No <input name="social_facebook_ftgssbfw_pinterest_button" type="radio" value="no" /></label></p>';

		} else {

		  	echo '<p><label><b>Pinterest</b> button <b>:</b> <br /> Yes <input name="social_facebook_ftgssbfw_pinterest_button" type="radio" value="yes" />';
		  	echo ' No <input name="social_facebook_ftgssbfw_pinterest_button" type="radio" value="no" checked/></label></p>';

		};
	};





	if ( $data['is_social_facebook_ftgssbfw_reddit_button_first_load'] == 'yes' ) {

	  	echo '<p><label><b>Reddit</b> button <b>:</b> <br /> Yes <input name="social_facebook_ftgssbfw_reddit_button" type="radio" value="yes" checked/>';
	  	echo ' No <input name="social_facebook_ftgssbfw_reddit_button" type="radio" value="no" /></label></p>';

		$data['is_social_facebook_ftgssbfw_reddit_button_first_load'] = 'no';

	} else {

		if ( $data['social_facebook_ftgssbfw_reddit_button'] == 'yes' ) {

		  	echo '<p><label><b>Reddit</b> button <b>:</b> <br /> Yes <input name="social_facebook_ftgssbfw_reddit_button" type="radio" value="yes" checked/>';
		  	echo ' No <input name="social_facebook_ftgssbfw_reddit_button" type="radio" value="no" /></label></p>';

		} else {

		  	echo '<p><label><b>Reddit</b> button <b>:</b> <br /> Yes <input name="social_facebook_ftgssbfw_reddit_button" type="radio" value="yes" />';
		  	echo ' No <input name="social_facebook_ftgssbfw_reddit_button" type="radio" value="no" checked/></label></p>';

		};
	};





	if ( $data['is_social_facebook_ftgssbfw_stumbleupon_button_first_load'] == 'yes' ) {

	  	echo '<p><label><b>StumbleUpon</b> button <b>:</b> <br /> Yes <input name="social_facebook_ftgssbfw_stumbleupon_button" type="radio" value="yes" checked/>';
	  	echo ' No <input name="social_facebook_ftgssbfw_stumbleupon_button" type="radio" value="no" /></label></p>';

		$data['is_social_facebook_ftgssbfw_stumbleupon_button_first_load'] = 'no';

	} else {

		if ( $data['social_facebook_ftgssbfw_stumbleupon_button'] == 'yes' ) {

		  	echo '<p><label><b>StumbleUpon</b> button <b>:</b> <br /> Yes <input name="social_facebook_ftgssbfw_stumbleupon_button" type="radio" value="yes" checked/>';
		  	echo ' No <input name="social_facebook_ftgssbfw_stumbleupon_button" type="radio" value="no" /></label></p>';

		} else {

		  	echo '<p><label><b>StumbleUpon</b> button <b>:</b> <br /> Yes <input name="social_facebook_ftgssbfw_stumbleupon_button" type="radio" value="yes" />';
		  	echo ' No <input name="social_facebook_ftgssbfw_stumbleupon_button" type="radio" value="no" checked/></label></p>';

		};
	};






	if ( $data['is_social_facebook_ftgssbfw_twitter_button_first_load'] == 'yes' ) {

	  	echo '<p><label><b>Twitter</b> button <b>:</b> <br /> Yes <input name="social_facebook_ftgssbfw_twitter_button" type="radio" value="yes" checked/>';
	  	echo ' No <input name="social_facebook_ftgssbfw_twitter_button" type="radio" value="no" /></label></p>';

		$data['is_social_facebook_ftgssbfw_twitter_button_first_load'] = 'no';

	} else {

		if ( $data['social_facebook_ftgssbfw_twitter_button'] == 'yes' ) {

		  	echo '<p><label><b>Twitter</b> button <b>:</b> <br /> Yes <input name="social_facebook_ftgssbfw_twitter_button" type="radio" value="yes" checked/>';
		  	echo ' No <input name="social_facebook_ftgssbfw_twitter_button" type="radio" value="no" /></label></p>';

		} else {

		  	echo '<p><label><b>Twitter</b> button <b>:</b> <br /> Yes <input name="social_facebook_ftgssbfw_twitter_button" type="radio" value="yes" />';
		  	echo ' No <input name="social_facebook_ftgssbfw_twitter_button" type="radio" value="no" checked/></label></p>';

		};
	};





















	echo'<h3>Credit link for DoniSocial</h3>';

	if ( $data['is_social_facebook_ftgssbfw_credit_link_first_load'] == 'yes' ) {

	  	echo '<p><label>Display DoniSocial credit link , please <b>:</b> <br /> Yes <input name="social_facebook_ftgssbfw_credit_link" type="radio" value="yes" checked/>';
	  	echo ' No <input name="social_facebook_ftgssbfw_credit_link" type="radio" value="no" /></label></p>';

		$data['is_social_facebook_ftgssbfw_credit_link_first_load'] = 'no';

	} else {

		if ( $data['social_facebook_ftgssbfw_credit_link'] == 'yes' ) {

		  	echo '<p><label>Display DoniSocial credit link , please <b>:</b> <br /> Yes <input name="social_facebook_ftgssbfw_credit_link" type="radio" value="yes" checked/>';
		  	echo ' No <input name="social_facebook_ftgssbfw_credit_link" type="radio" value="no" /></label></p>';

		} else {

		  	echo '<p><label>Display DoniSocial credit link , please <b>:</b> <br /> Yes <input name="social_facebook_ftgssbfw_credit_link" type="radio" value="yes" />';
		  	echo ' No <input name="social_facebook_ftgssbfw_credit_link" type="radio" value="no" checked/></label></p>';

		};
	};



















   if (isset($_POST['social_facebook_ftgssbfw_title'])){  // of course , Only posted variables are treated here ( Not those beginning with "is_" , for instance )

    	$data['social_facebook_ftgssbfw_title'] = attribute_escape($_POST['social_facebook_ftgssbfw_title']);
    	$data['social_facebook_ftgssbfw_share_button_opening_duration'] = attribute_escape($_POST['social_facebook_ftgssbfw_share_button_opening_duration']);
    	$data['social_facebook_ftgssbfw_share_button_closing_duration'] = attribute_escape($_POST['social_facebook_ftgssbfw_share_button_closing_duration']);
    	$data['social_facebook_ftgssbfw_share_button_animation_speed'] = attribute_escape($_POST['social_facebook_ftgssbfw_share_button_animation_speed']);


    	$data['social_facebook_ftgssbfw_share_buttons_container_border_style'] = attribute_escape($_POST['social_facebook_ftgssbfw_share_buttons_container_border_style']);
    	$data['social_facebook_ftgssbfw_share_buttons_container_border_width'] = attribute_escape($_POST['social_facebook_ftgssbfw_share_buttons_container_border_width']);
    	$data['social_facebook_ftgssbfw_share_buttons_container_border_color'] = attribute_escape($_POST['social_facebook_ftgssbfw_share_buttons_container_border_color']);
    	$data['social_facebook_ftgssbfw_share_buttons_container_background_color'] = attribute_escape($_POST['social_facebook_ftgssbfw_share_buttons_container_background_color']);


    	$data['social_facebook_ftgssbfw_share_button_border_style'] = attribute_escape($_POST['social_facebook_ftgssbfw_share_button_border_style']);
    	$data['social_facebook_ftgssbfw_share_button_border_width'] = attribute_escape($_POST['social_facebook_ftgssbfw_share_button_border_width']);
    	$data['social_facebook_ftgssbfw_share_button_border_color'] = attribute_escape($_POST['social_facebook_ftgssbfw_share_button_border_color']);
    	$data['social_facebook_ftgssbfw_share_button_background_color'] = attribute_escape($_POST['social_facebook_ftgssbfw_share_button_background_color']);
    	$data['social_facebook_ftgssbfw_share_buttons_container_height'] = attribute_escape($_POST['social_facebook_ftgssbfw_share_buttons_container_height']);


    	$data['social_facebook_ftgssbfw_facebook_url_page'] = attribute_escape($_POST['social_facebook_ftgssbfw_facebook_url_page']);
    	$data['social_facebook_ftgssbfw_facebook_app_id'] = attribute_escape($_POST['social_facebook_ftgssbfw_facebook_app_id']);

    	$data['social_facebook_ftgssbfw_delicious_button'] = attribute_escape($_POST['social_facebook_ftgssbfw_delicious_button']);
    	$data['social_facebook_ftgssbfw_digg_button'] = attribute_escape($_POST['social_facebook_ftgssbfw_digg_button']);
    	$data['social_facebook_ftgssbfw_facebook_button'] = attribute_escape($_POST['social_facebook_ftgssbfw_facebook_button']);
    	$data['social_facebook_ftgssbfw_google_plus_button'] = attribute_escape($_POST['social_facebook_ftgssbfw_google_plus_button']);
    	$data['social_facebook_ftgssbfw_hyves_button'] = attribute_escape($_POST['social_facebook_ftgssbfw_hyves_button']);
    	$data['social_facebook_ftgssbfw_linkedin_button'] = attribute_escape($_POST['social_facebook_ftgssbfw_linkedin_button']);
    	$data['social_facebook_ftgssbfw_pinterest_button'] = attribute_escape($_POST['social_facebook_ftgssbfw_pinterest_button']);
    	$data['social_facebook_ftgssbfw_reddit_button'] = attribute_escape($_POST['social_facebook_ftgssbfw_reddit_button']);
    	$data['social_facebook_ftgssbfw_stumbleupon_button'] = attribute_escape($_POST['social_facebook_ftgssbfw_stumbleupon_button']);
    	$data['social_facebook_ftgssbfw_twitter_button'] = attribute_escape($_POST['social_facebook_ftgssbfw_twitter_button']);

    	$data['social_facebook_ftgssbfw_credit_link'] = attribute_escape($_POST['social_facebook_ftgssbfw_credit_link']);

    	update_option('social_facebook_ftgssbfw_name', $data);


  }
}


  function widget($args){


		/** Make sure that the WordPress bootstrap has run before continuing. */
		require( $_SERVER["DOCUMENT_ROOT"].'/wp-load.php' );  //  require( 'C:/Documents and Settings/HP DC7600/Mes documents/EasyPHP5.2.10/www/donisocial/wp-load.php' );  //  require( $_SERVER["DOCUMENT_ROOT"].'/donisocial/wp-load.php' );


		global $data;

		$data = get_option('social_facebook_ftgssbfw_name');

    		echo $args['before_widget'];
		echo $args['before_title'] .$data['social_facebook_ftgssbfw_title']. $args['after_title'];



		$widget_code_to_display = '';

		$widget_code_to_display .= '<div class="social_facebook_ftgssbfw_share_buttons_container">';



		if ( $data['social_facebook_ftgssbfw_delicious_button'] == 'yes' ) {

			$widget_code_to_display .= '<div class="social_facebook_ftgssbfw_share_buttons">';
			$widget_code_to_display .= '<img src="http://www.delicious.com/static/img/delicious.small.gif" height="10" width="10" alt="Delicious" />';
			$widget_code_to_display .= '<a href="http://www.delicious.com/save" onclick="window.open(\'http://www.delicious.com/save?v=5&noui&jump=close&url=\'+encodeURIComponent(location.href)+\'&title=\'+encodeURIComponent(document.title), \'delicious\',\'toolbar=no,width=550,height=550\'); return false;"> Delicious !</a>';
			$widget_code_to_display .= '</div>';

		};



		if ( $data['social_facebook_ftgssbfw_digg_button'] == 'yes' ) {

			$widget_code_to_display .= '<div class="social_facebook_ftgssbfw_share_buttons">';
			$widget_code_to_display .= '<iframe allowtransparency="true" frameborder="0" scrolling="no" src="'.plugins_url( "social_facebook_ftgssbfw/scripts/digg_script.php" , dirname(__FILE__) ).'" style="position: relative; top: 0px; left: 3px; width:100px; height:30px; text-align: center;"></iframe>';
			$widget_code_to_display .= '</iframe>';
			$widget_code_to_display .= '</div>';

		};



		if ( $data['social_facebook_ftgssbfw_facebook_button'] == 'yes' ) {

			$widget_code_to_display .= '<div class="social_facebook_ftgssbfw_share_buttons">';
			$widget_code_to_display .= '<iframe src="http://www.facebook.com/plugins/like.php?href='.$data["social_facebook_ftgssbfw_facebook_url_page"].'&amp;send=false&amp;layout=button_count&amp;width=450&amp;show_faces=true&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21&amp;appId='.$data["social_facebook_ftgssbfw_facebook_app_id"].'" scrolling="no" frameborder="0" style="position: relative; border: none; overflow:hidden; left: 22px; width:450px; height:21px; text-align: center;" allowTransparency="true"></iframe>';
			$widget_code_to_display .= '</div>';

		};



		if ( $data['social_facebook_ftgssbfw_google_plus_button'] == 'yes' ) {

			$widget_code_to_display .= '<div class="social_facebook_ftgssbfw_share_buttons">';
			$widget_code_to_display .= '<iframe allowtransparency="true" frameborder="0" scrolling="no" src="'.plugins_url( 'social_facebook_ftgssbfw/scripts/google_plus_script.php' , dirname(__FILE__) ).'" style="position: relative; top: 0px; left: 18px; width:100px; height:20px; text-align: center;"></iframe>';
			$widget_code_to_display .= '</iframe>';
			$widget_code_to_display .= '</div>';

		};



		if ( $data['social_facebook_ftgssbfw_hyves_button'] == 'yes' ) {

			$widget_code_to_display .= '<div class="social_facebook_ftgssbfw_share_buttons">';
			$widget_code_to_display .= '<iframe src="http://www.hyves.nl/respect/button?url='.site_url().'&counterStyle=horizontal" style="position: relative; left: 5px; border: medium none; overflow:hidden; width:120px; height:120px; text-align: center;" scrolling="no" frameborder="0" ></iframe>';
			$widget_code_to_display .= '</div>';

		};



		if ( $data['social_facebook_ftgssbfw_linkedin_button'] == 'yes' ) {

			$widget_code_to_display .= '<div class="social_facebook_ftgssbfw_share_buttons">';
			$widget_code_to_display .= '<iframe allowtransparency="true" frameborder="0" scrolling="no" src="'.plugins_url( 'social_facebook_ftgssbfw/scripts/linkedin_script.php' , dirname(__FILE__) ).'" style="position: relative; top: 0px; left: 11px; width:100px; height:20px; text-align: center;"></iframe>';
			$widget_code_to_display .= '</iframe>';
			$widget_code_to_display .= '</div>';

		};



		if ( $data['social_facebook_ftgssbfw_pinterest_button'] == 'yes' ) {

			$widget_code_to_display .= '<div class="social_facebook_ftgssbfw_share_buttons">';
			$widget_code_to_display .= '<a href="http://pinterest.com/pin/create/button/?url='.site_url().'" class="pin-it-button" count-layout="horizontal" target="_blank">Pinteresting !</a>';
			$widget_code_to_display .= '</div>';

		};



		if ( $data['social_facebook_ftgssbfw_reddit_button'] == 'yes' ) {

			$widget_code_to_display .= '<div class="social_facebook_ftgssbfw_share_buttons">';
			$widget_code_to_display .= '<a href="http://www.reddit.com/submit" onclick="window.location = \'http://www.reddit.com/submit?url=\' + encodeURIComponent(window.location); return false"> <img src="http://www.reddit.com/static/spreddit7.gif" alt="submit to reddit" border="0" /> </a>';
			$widget_code_to_display .= '</div>';

		};



		if ( $data['social_facebook_ftgssbfw_stumbleupon_button'] == 'yes' ) {

			$widget_code_to_display .= '<div class="social_facebook_ftgssbfw_share_buttons">';
			$widget_code_to_display .= '<iframe allowtransparency="true" frameborder="0" scrolling="no" src="'.plugins_url( 'social_facebook_ftgssbfw/scripts/stumbleupon_script.php' , dirname(__FILE__) ).'" style="position: relative; top: 0px; left: 10px; width:100px; height:20px; text-align: center;"></iframe>';
			$widget_code_to_display .= '</iframe>';
			$widget_code_to_display .= '</div>';

		};



		if ( $data['social_facebook_ftgssbfw_twitter_button'] == 'yes' ) {

			$widget_code_to_display .= '<div class="social_facebook_ftgssbfw_share_buttons">';
			$widget_code_to_display .= '<iframe allowtransparency="true" frameborder="0" scrolling="no" src="//platform.twitter.com/widgets/tweet_button.html" style="position: relative; left: 11px; width:130px; height: 20px; text-align: center;"></iframe>';
			$widget_code_to_display .= '</div>';

		};






		$widget_code_to_display .= '</div>';  //  Container tag End




		if ( $data['social_facebook_ftgssbfw_credit_link'] == 'yes' ) {

			$widget_code_to_display .= '<div style="text-align: center;  color: #ff0000; font-size: 7pt; font-weight: bold;">';
			$widget_code_to_display .= '<a href="http://donisocial.donimedia-servicetique.net" title="Wordpress Social Facebook All In One widget by DoniSocial">By DoniSocial</a>';
			$widget_code_to_display .= '</div>';

		};



		echo $widget_code_to_display;

     echo $args['after_widget'];


  }


  function register(){


    	register_sidebar_widget('Facebook, Twitter, Google Plus One social share buttons', array('social_facebook_ftgssbfw', 'widget'));
    	register_widget_control('Facebook, Twitter, Google Plus One social share buttons', array('social_facebook_ftgssbfw', 'control'));
  	}
}






?>