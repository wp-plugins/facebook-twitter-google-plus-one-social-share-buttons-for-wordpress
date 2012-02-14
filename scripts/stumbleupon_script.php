<?php

/** Following code makes sure that WordPress bootstrap has run before continuing. */
require( $_SERVER["DOCUMENT_ROOT"].'/wp-load.php' );


global $data_mysql;

$data_mysql = get_option('social_facebook_ftgssbfw_name');



function display_html($url_to_reference) {



	$html_to_display = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">'; 
	$html_to_display .= '<html xmlns="http://www.w3.org/1999/xhtml">';
	$html_to_display .= '<head>';
	$html_to_display .= '<title>(Type a title for your page here)</title>';
	$html_to_display .= '<meta name="GENERATOR" content="Arachnophilia 4.0">';
	$html_to_display .= '<meta name="FORMATTER" content="Arachnophilia 4.0">';
	$html_to_display .= '</head>';
	$html_to_display .= '<body>';

	$html_to_display .= '<div style="position: relative; top: -8px; width:100px; height:30px;">';


	$html_to_display .= ' <script type="text/javascript">';
	$html_to_display .= ' (function() {';
	$html_to_display .= '     var li = document.createElement("script"); li.type = "text/javascript"; li.async = true;';
	$html_to_display .= '      li.src = "https://platform.stumbleupon.com/1/widgets.js";';
	$html_to_display .= '      var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(li, s);';
	$html_to_display .= ' })();';
	$html_to_display .= ' </script>';


	$html_to_display .= ' <su:badge layout="2" location="'.$url_to_reference.'"></su:badge>';


	$html_to_display .= '</div>';

	$html_to_display .= '</body>';
	$html_to_display .= '</html>';


  	echo $html_to_display;
}




display_html($data_mysql['social_facebook_ftgssbfw_blog_url']);






?>
