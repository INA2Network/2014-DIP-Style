<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<a class="post-thumbnail" href="<?php the_permalink(); ?>">
	<?php
		// Output the featured image.
		if ( has_post_thumbnail() ) :
			if ( 'grid' == get_theme_mod( 'featured_content_layout' ) ) {
				the_post_thumbnail();
			} else {
				the_post_thumbnail( 'twentyfourteen-full-width' );
			}
		endif;
	?>
	</a>

	<header class="entry-header">
		<?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) && twentyfourteen_categorized_blog() ) : ?>
		<div class="entry-meta">
			<span class="cat-links"><?php echo DIP_HELPER::value('category_list'); ?></span>
		</div><!-- .entry-meta -->
		<?php endif; ?>

		<?php the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">','</a></h1>' ); ?>
		<div class="entry-meta">
			<div class="cat-links">Make & Model: <?php echo DIP_HELPER::value('makemodel_list'); ?></div>
			<div class="cat-links">Vehicle Type: <?php echo DIP_HELPER::value('type_list'); ?></div>
			<div class="cat-links">Transmission: <?php echo DIP_HELPER::value('transmission_list'); ?></div>
			<div class="cat-links">Interior Color: <?php echo DIP_HELPER::value('color_interior_list'); ?></div>
			<div class="cat-links">Exterior Color: <?php echo DIP_HELPER::value('color_exterior_list'); ?></div>
			<div class="cat-links">Price: <?php echo DIP_HELPER::value('price_usd'); ?></div>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->
</article><!-- #post-## -->
