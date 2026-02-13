<?php
/**
 * Flush out the transients used in action_labs_theme_categorized_blog.
 *
 * @package action-labs-theme
 */

namespace ACLA\wd_t;

/**
 * Flush out the transients used in action_labs_theme_categorized_blog.
 *
 * @author WebDevStudios
 *
 * @return bool Whether or not transients were deleted.
 */
function category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return false;
	}

	// Like, beat it. Dig?
	return delete_transient( 'action_labs_theme_categories' );
}

add_action( 'delete_category', __NAMESPACE__ . '\category_transient_flusher' );
add_action( 'save_post', __NAMESPACE__ . '\category_transient_flusher' );
