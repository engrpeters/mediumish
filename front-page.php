
<?php
get_header()
?>


<div class="container">
	<div class="mainheading">
		<h1 class="sitetitle">Mediumish</h1>
		<p class="lead">
			 Bootstrap theme, medium style, simply perfect for bloggers
		</p>
	</div>
	
	<?php
	
	if ( is_front_page() && juju_has_featured_posts() ) {
		
		// Include the featured content template.
		get_template_part( 'template-parts/featured','content' );
	}


	?>
	
	
		<!-- End Featured
		================================================== -->
	
		<!-- Begin List Posts
		================================================== -->
		<section class="recent-posts">
		<div class="section-title">
			<h2><span>All Stories</span></h2>
		</div>
		<div class="card-columns listrecent">
	

		<?php
		if ( have_posts() ) :
			// Start the Loop.
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the post format-specific template for the content. If you want
				 * to use this in a child theme, then include a file called content-___.php
				 * (where ___ is the post format) and that will be used instead.
				 */
				get_template_part( '/template-parts/content', 'post' );

				endwhile;
			// Previous/next post navigation.
		
			else :
				// If no content, include the "No posts found" template.
				get_template_part( 'content', 'none' );

			endif;
			?>


		</div>
		</section>
		

</div>



	


    





<?php
get_footer()
?>
