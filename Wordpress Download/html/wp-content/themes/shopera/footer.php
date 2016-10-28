<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Shopera
 * @since Shopera 1.0
 */
?>

		</div><!-- #main -->

				<footer id="colophon" class="site-footer row" role="contentinfo">
					<?php
						if ( is_null(get_sidebar( 'footer' )) && get_option( 'show_on_front' ) != 'page' ) {
							get_template_part( 'demo-content/footer' );
						} else {
							get_sidebar( 'footer' );
						}
					?>
				</footer><!-- #colophon -->
				<div class="clearfix"></div>


</body>
</html>