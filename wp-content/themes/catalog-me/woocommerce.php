<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package implecode
 */
get_header();
$content_settings	 = ic_content_settings();
$id					 = 'container_sidebar_wrap';
if ( empty( $content_settings[ 'product_sidebar' ] ) ) {
	$id = 'no_sidebar_wrap';
}
?>

<div id="primary" class="content-area">
	<div id="<?php echo $id ?>">
		<main id="main" class="site-main" role="main">

			<?php woocommerce_content(); ?>

		</main><!-- #main -->
		<?php
		if ( $content_settings[ 'product_sidebar' ] == 1 ) {
			echo '<div class="product-sidebar">';
			do_action( 'ic_product_sidebar_start' );
			dynamic_sidebar( 'product-sidebar' );
			echo '</div>';
		} else {

		}
		?>
	</div>
</div><!-- #primary -->

<?php
get_footer();
