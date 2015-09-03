<?php

add_action( 'wp_enqueue_scripts', 'enqueue_custom_ajax_script' ); 
function enqueue_custom_ajax_script() { 
 	wp_enqueue_script( 'custom-ajax-script', 'assets/js/ajax.js', array( 'wp-util' ), 0.1 ); 
} 

add_action( 'wp_ajax_get_comment_count', 'get_minutes_to_read_post' );
add_action( 'wp_ajax_nopriv_get_comment_count', 'get_minutes_to_read_post' );

function get_minutes_to_read_post() {
    // @todo nonce check
    // @todo capability check
    $post_id  = intval( $_POST['postId'] );

    $our_post = get_post( $post_id );	

    if ( false !== $our_post && ! is_wp_error( $our_post ) ) {
		$our_post_content = $our_post->post_content;
		$content_words = explode(' ', $our_post_content);
		$word_count = count( $content_words );
		$time_to_read_dec = ( $word_count / 250 ); //find original float value after intial divider		
		$time_to_read_floor = floor( $time_to_read_dec ) + 0.5 ; //get closest 30 seconds mark below original decimal
		$time_to_read_ceiling = ceil( $time_to_read_dec ); //get closest 30 second mark above original decimal		
		$floor_diff = $time_to_read_dec - $time_to_read_floor; //find difference between orig & floor
		$ceil_diff = $time_to_read_ceiling -$time_to_read_dec; //find difference between ceiling & orig		
		$final_minutes_to_read = 0;
	
		if ( $floor_diff != $ceil_diff ) {
			//which ever diff calculation is smaller between floor & diff tells us whether to round up or down to the nearest 30 seconds
			if ( $floor_diff > $ceil_diff ) {
				$final_minutes_to_read = $time_to_read_ceiling; //use ceiling value since it is the smaller(closest) of the two
			}
			else {
				$final_minutes_to_read = $time_to_read_floor; //use floor value since it is the smaller (closest) of the two 
			}
		}
		else {
			$final_minutes_to_read = $time_to_read_floor; //doesn't matter which to use (could use either since they are the same)
		}
				
        wp_send_json_success( $final_minutes_to_read );
    } else {
        wp_send_json_error();
    }
}

?>
