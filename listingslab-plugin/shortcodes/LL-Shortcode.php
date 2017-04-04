<?php
// [LL-Shortcode]

function ll_shortcode( $atts, $content = null)	{

	extract( shortcode_atts( array(
				'message' => 'LL Shortcode Rendered'
			), $atts
		)
	);
	// this will display our message before the content of the shortcode
	return $message . ' ' . $content;

}
add_shortcode('LL-Shortcode', 'll_shortcode');

/* End of File */
