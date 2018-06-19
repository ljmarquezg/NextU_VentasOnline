<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package storefront
 */
?>
<div class="col-lg-3">

<?php do_action(show_categories());
if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<!-- <div id="secondary" class="widget-area" role="complementary"> -->
	<!-- <?php dynamic_sidebar( 'sidebar-1' ); ?> -->
<!-- </div> -->
<!-- #secondary -->
</div>