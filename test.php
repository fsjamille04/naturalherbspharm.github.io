<?php  
 
ini_set( 'display_errors', 'On' );
error_reporting( E_ALL );
$strings = "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like)";
function justify( $str_in, $desired_length=48 ) {
    // Cut off long lines
    if ( strlen( $str_in ) > $desired_length ) {
        $str_in = current( explode( "\n", wordwrap( $str_in, $desired_length ) ) );
    }
    // String length
    $string_length = strlen( $str_in );
    // Number of spaces
    $spaces_count = substr_count( $str_in, ' ' );
    // Number of total spaces needed
    $needed_spaces_count = $desired_length - $string_length + $spaces_count;
    // One word, so split spaces in half, ceil it add it to eaither side of the word
    // Then take the first 48 chars
    if ( $spaces_count === 0 ) {
        return str_pad( $str_in, $desired_length, ' ', STR_PAD_BOTH );
    }
    // How many spaces the string needs per space to have atleast 48 characters
    $spaces_per_space = ceil( $needed_spaces_count / $spaces_count );
    // Replace all spaces with the neccessary spaces per space
    // This string will sometimes be too long
    $spaced_string = preg_replace( '~\s+~', str_repeat( ' ', $spaces_per_space ), $str_in );
    // Now, some strings will be too long so you need to replace the spaces with one less space until
    // the desired amount of characters is reached
    //
    // This is done with preg_replace callback and the $limit parameter
    // Limit replacements to the exact number we need to reach the desired length
    return preg_replace_callback(
        sprintf( '~\s{%s}~', $spaces_per_space ),
        function ( $m ) use( $spaces_per_space ) {
            return str_repeat( ' ', $spaces_per_space-1 );
        },
        $spaced_string,
        strlen( $spaced_string ) - $desired_length
    );
}
 
    echo justify( $string ) . "\n";
 
 
