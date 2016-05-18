<?php

$tags = array();
$line_num = 0;

while ( $line = fgets( $xml_file ) ) {
	$line_tags = array();
	$line_num++;

	// Grab all tags
	preg_match_all( '/<([\/a-z0-9_:]+).*?>/', $line, $line_tags_wrapped );

	// Make sure tags aren't getting captured twice
	$line_tags_wrapped = array_unique( $line_tags_wrapped );

	foreach ( $line_tags_wrapped as $line_tags ) {

		foreach ( $line_tags as $tag ) {

			array_push( $tags, array( $tag, $line_num ) );

		}
	}
}

// Loop through the tags array
foreach ( $tags as $key => $value ) {

	// If it's a opening tag, look for the closing tag
	if ( ! preg_match( '/<\//', $value[0] ) ) {
		$closing_tag = str_replace( '<', '</', $value[0] );

		if ( $closing_tag == $tags[ $key + 1 ][0] ) {
			unset( $tags[ $key + 1 ] );
			unset( $tags[ $key ] );
		}
	}
}
var_dump( $tags );
