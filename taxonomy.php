<?php

get_header(); ?>

<section id="primary" class="content-area">
	<div id="content" class="site-content" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
					$terms = array();
					if (!is_null(get_query_var('makemodel', NULL))) {
						_e( 'Make & Model' );
						$terms = get_term_by('slug', get_query_var('makemodel', NULL), 'makemodel', ARRAY_A);
					} elseif (!is_null(get_query_var('type', NULL))) {
						_e( 'Vehicle Type' );
						$terms = get_term_by('slug', get_query_var('type', NULL), 'type', ARRAY_A);
					} elseif (!is_null(get_query_var('transmission', NULL))) {
						_e( 'Transmission' );
						$terms = get_term_by('slug', get_query_var('transmission', NULL), 'transmission', ARRAY_A);
					} elseif (!is_null(get_query_var('color_interior', NULL))) {
						_e( 'Interior Color' );
						$terms = get_term_by('slug', get_query_var('color_interior', NULL), 'color_interior', ARRAY_A);
					} elseif (!is_null(get_query_var('color_exterior', NULL))) {
						_e( 'Exterior Color' );
						$terms = get_term_by('slug', get_query_var('color_exterior', NULL), 'color_exterior', ARRAY_A);
					} else {
						_e( 'Archive' );
					}
					$values = array();
					if (!empty($terms)) {
						$values[] = $terms['name'];
					}
					//					foreach($terms as $term) {
					//						$values[] = $term['name'];
					//					}
					if (!empty($values)) {
						echo ': ' . implode(', ', $values);
					}
					?>
				</h1>
			</header><!-- .page-header -->

			<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();

				/*
				* Include the post format-specific template for the content. If you want to
				* use this in a child theme, then include a file called called content-___.php
				* (where ___ is the post format) and that will be used instead.
				*/
				get_template_part( 'content-inacar', get_post_format() );

				endwhile;
			// Previous/next page navigation.
			twentyfourteen_paging_nav();

			else :
			// If no content, include the "No posts found" template.
			get_template_part( 'content', 'none' );

			endif;
		?>
	</div><!-- #content -->
</section><!-- #primary -->

<?php
get_sidebar( 'content' );
get_sidebar();
get_footer();
