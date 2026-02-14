<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package action-labs-theme
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="footer-inner site-branding">
			<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
		</div>

		<hr class="footer-sep">

		<div class="footer-bottom">
			<p><?php echo '© ' . date('Y') . '. Todos os direitos reservados.'; ?></p>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
