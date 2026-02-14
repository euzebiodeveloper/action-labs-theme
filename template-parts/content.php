<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package action-labs-theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( is_singular() && 'post' === get_post_type() ) : ?>
		<div class="blog-container">
			<div class="blog-sheet">
				<?php if ( has_post_thumbnail() ) : ?>
					<div class="post-feature">
						<?php the_post_thumbnail( 'large', array( 'class' => 'post-feature-img' ) ); ?>
					</div>
				<?php endif; ?>

				<?php
					$cats = get_the_category();
					$first_tag = '';
					if(!empty($cats)) {
						$first_tag = $cats ? $cats[0]->name : '';
					}
				?>
				<div class="post-flag">
					<?php if ( $first_tag ) : ?>
						<?php echo esc_html( $first_tag ); ?>
					<?php endif; ?>
				</div>

				<div class="post-meta">
					<span class="post-date"><svg class="icon-calendar" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg><?php echo esc_html( get_the_date( 'j F, Y' ) ); ?></span>
					<?php
					$tags = get_the_tags();
					if ( ! empty( $tags ) ) :
						$tag_names = wp_list_pluck( $tags, 'name' );
						$tag_count = count( $tag_names );
						if ( $tag_count === 1 ) {
							$tag_list = $tag_names[0];
						} else {
							$last = array_pop( $tag_names );
							$tag_list = implode( ', ', $tag_names ) . ' e ' . $last;
						}
						?>
						<span class="post-tag"><svg class="icon-tag" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.59 13.41L11 3.83 3.83 11 13.41 20.59a2 2 0 0 0 2.83 0l4.35-4.35a2 2 0 0 0 0-2.83z"></path><circle cx="7.5" cy="7.5" r="1.5"></circle></svg><?php echo esc_html( $tag_list ); ?></span>
					<?php endif; ?>
				</div>

				<h1 class="post-title"><?php the_title(); ?></h1>
				<div class="post-author">Autor: <?php the_author(); ?></div>
				<div class="post-content"><?php the_content(); ?></div>
				</div>
			</div>
		<?php else : ?>
		<header class="entry-header">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;

			if ( 'post' === get_post_type() ) :
				?>
				<div class="entry-meta">
					<?php
					action_labs_theme_posted_on();
					action_labs_theme_posted_by();
					?>
				</div><!-- .entry-meta -->
		<?php endif; ?>
		</header><!-- .entry-header -->

		<?php action_labs_theme_post_thumbnail(); ?>

		<div class="entry-content">
			<?php
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'action-labs-theme' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'action-labs-theme' ),
					'after'  => '</div>',
				)
			);
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php action_labs_theme_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
