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

	$html_to_display .= '<script type="text/javascript">';
	$html_to_display .= '(function() {';
	$html_to_display .= 'var s = document.createElement("SCRIPT"), s1 = document.getElementsByTagName("SCRIPT")[0];';
	$html_to_display .= 's.type = "text/javascript";';
	$html_to_display .= 's.async = true;';
	$html_to_display .= 's.src = "http://widgets.digg.com/buttons.js";';
	$html_to_display .= 's1.parentNode.insertBefore(s, s1);';
	$html_to_display .= '})();';
	$html_to_display .= '</script>';


	$html_to_display .= '<div style="position: relative; top: -8px; width:100px; height:30px;">';
	$html_to_display .= '<a class="DiggThisButton DiggCompact" href="http://digg.com/submit?url='.$url_to_reference.'&amp;title=Website name : '.get_bloginfo("name").'"></a>';
	$html_to_display .= '</div>';

	$html_to_display .= '</body>';
	$html_to_display .= '</html>';


  	echo $html_to_display;
}




display_html($data_mysql['social_facebook_ftgssbfw_blog_url']);






?>
