<?php

$status = 'not_passed';
$xml_file = fopen( 'test.xml', 'r' ) or array_push( $errors, 'Could not find XML file.' );

while ( $line = fgets( $xml_file ) ) {
	preg_match( '<\?xml version=".*?" encoding=".*?"\?>', $line, $matches );
	if ( count( $matches ) > 0 ) {
		$status = 'passed';
		break;
	}
}

if ( 'passed' != $status ) {
	array_push( $errors, 'ERROR: Expected opening XML Tag on line 1, none found' );
}

fclose( $xml_file );


