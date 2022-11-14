<section class="featured-posts">
		<div class="section-title">
			<h2><span>Featured</span></h2>
		</div>
		<div class="card-columns listfeaturedtag">
	


		<?php

		do_action( 'juju_featured_posts_before' );

		$featured_posts = juju_get_featured_posts();
		foreach ( (array) $featured_posts as $order => $post ) :
		setup_postdata( $post );

		// Include the featured content template.
		get_template_part( '/template-parts/featured', 'post' );
		endforeach;

		/**
		 * Fires after the Twenty Fourteen featured content.
		 *
		 * @since Twenty Fourteen 1.0
		 */
		do_action( 'juju_featured_posts_after' );

		wp_reset_postdata();
	?>
	</div>

</section>