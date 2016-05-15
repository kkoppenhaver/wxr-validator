<?php
/*
Plugin Name: WXR Validator
Plugin URI: https://github.com/kkoppenhaver/wxr-validator
Description: This script will run checks on any WXR (WordPress eXtended RSS) file to ensure the syntax is valid before a WordPress import is run.
Author: kkoppenhaver
Author URI: http://keanankoppenhaver.com
Version: 0.1
Text Domain: wxr-validator
License: GPLv2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

$errors = array();

if( isset($argv[1]) ) {
	$filename = $argv[1];
}
else {
	echo 'Please specify a valid filepath to your XML file.';
	die();
}





$xml_file = fopen( $filename, 'r' ) or array_push( $errors, 'Could not find XML file.' );

include 'checks/xml-heading.php';

fclose( $xml_file );

if ( empty( $errors ) ) {
	echo 'You are all set! No errors found.';
}
else {
	foreach ( $errors as $error ) {
		echo $error . PHP_EOL;
	}
}
