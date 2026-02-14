<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package action-labs-theme
 */

get_header();
?>

<!-- Single post hero section (below header) -->
<section class="home-action" aria-label="Hero do post">
    <div class="home-action-inner-single"></div>
</section>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'action-labs-theme' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'action-labs-theme' ) . '</span> <span class="nav-title">%title</span>',
				)
			);

			// Comments removed per request.

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

	<?php
	get_footer();
