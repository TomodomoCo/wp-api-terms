<?php
/**
 * Plugin Name: WP-API Term/Taxonomy Support
 * Description: Makes it possible to set/edit terms on a post using WP-API
 * Author: Van Patten Media Inc. (original plugin by Ray Rodriguez/WizADSL)
 * Author URI: https://www.vanpattenmedia.com
 * Version: 1.0
 */

if ( ! function_exists( 'vpm_wp_api_set_post_terms' ) ) {
	function vpm_wp_api_set_post_terms($post, $data, $update) {
		if ( !empty( $data['x-terms'][0] ) && is_array( $data['x-terms'][0] ) ) {
			foreach( $data['x-terms'][0] as $taxonomy => $term_data ) {
				if ( !empty( $term_data['terms'] ) && is_array( $term_data['terms'] ) ) {
					$defaults = array(
						'append' => 'false',
					);

					$term_data = wp_parse_args( $term_data, $defaults );

					wp_set_post_terms( $post['ID'], $term_data['terms'], $taxonomy, $term_data['append'] );
				}
			}
		}
	}

	add_filter('json_insert_post', 'vpm_wp_api_set_post_terms', 20, 3 );
}
