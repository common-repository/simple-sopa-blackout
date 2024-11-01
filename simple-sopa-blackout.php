<?php 
/*
Plugin Name: SOPA Blackout
Version: 1.3
Plugin URI: http://bandonrandon.wordpress.com/projects/sopa
Description: This Plugin will censor your site on January 18th between 8am and 8pm local time  in protest of SOPA and PIPA
Author: Brooke Dukes
Author URI: http://bandonrandon.wordpress.com

*/

//check for wp_redirect function if it's not there include it
	if(!function_exists('wp_redirect')) { 
		require(ABSPATH . WPINC . '/pluggable.php');
	}

	$current_time =  current_time('mysql', '0'); //get current blog time
	$ts =strtotime($current_time); //parse the sql blog time to a php useable format
	$check_date = date('m/d/Y', $ts);  // put the date in a format we can check
	$check_hour = date('H', $ts);  // put the date in a format we can check
	$blackout_day = "01/18/2012"; // should we black out the site?
	$blackout_day_time_start = "08"; // when should we start (hour in 24 hour format)
	$blackout_day_time_end = "20"; // should we black out the site?
	
	if((!is_admin()) && ($check_date == $blackout_day &&($check_hour >= $blackout_day_time_start || $check_hour < $blackout_day_time_end))){
		  wp_redirect(plugins_url( 'simple-sopa-blackout/blackout.php'),302 );
		  exit();
		
	}
	
?>
