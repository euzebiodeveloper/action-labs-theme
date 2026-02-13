<?php
/**
 * Display the comments if the count is more than 0.
 *
 * @package action-labs-theme
 */

namespace ACLA\wd_t;

/**
 * Display the comments if the count is more than 0.
 *
 * @author WebDevStudios
 */
function print_comments() {
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}
}
