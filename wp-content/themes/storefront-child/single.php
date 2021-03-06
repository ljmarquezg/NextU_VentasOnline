<?php
/**
 * The template for displaying all single posts.
 *
 * @package storefront
 */

get_header(); 

	do_action( 'storefront_sidebar' );
	?>
	<div id="primary" class="content-area col-lg-9">
		<main id="main" class="site-main margin-top" role="main">

		<?php while ( have_posts() ) : the_post();

			do_action( 'storefront_single_post_before' );

			get_template_part( 'content', 'single' );

			do_action( 'storefront_single_post_after' );

		endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
