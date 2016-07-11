<?php
/**
* The Template for displaying all inacar posts
*
*/

wp_enqueue_script( 'jquery_tabs', get_stylesheet_directory_uri() . ('/assets/js/main.js'), array('jquery', 'jquery-ui-tabs'));
wp_enqueue_style( 'jquery_ui-css', "//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css");
add_thickbox();
get_header(); ?>

<div id="primary" class="content-area">
	<div id="content" class="site-content" role="main">
		<?php
		// Start the Loop.
		while ( have_posts() ) : the_post();

			/*
			* Include the post format-specific template for the content. If you want to
			* use this in a child theme, then include a file called called content-___.php
			* (where ___ is the post format) and that will be used instead.
			*/
			//get_template_part( 'content-inacar', get_post_format() );
			?>
			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div>
			<div class="main_contents">
				<div class="clear"></div>
				<h1 class=""><?php the_title();?></h1>
				<h3 class="small"><?php DIP_HELPER::value('price_usd') ?> </h3>
				<div class="clear"></div>

				<div class="gallery gallery-columns-4">
					<?php DIP_HELPER::value('images_list'); ?>
				</div>

				<div class="options_list"><label>Price</label><span><?php echo DIP_HELPER::value('price_usd'); ?></span></div>
				<div class="options_list"><label>Make</label><span><?php echo DIP_HELPER::value('make_list'); ?></span></div>
				<div class="options_list"><label>Model</label><span><?php echo DIP_HELPER::value('model_list'); ?></span></div>
				<div class="options_list"><label>Trim</label><span><?php echo DIP_HELPER::value('trim'); ?></span></div>
				<div class="options_list"><label>Type</label><span><?php echo DIP_HELPER::value('type_list'); ?></span></div>
				<div class="options_list"><label>Miles</label><span><?php echo DIP_HELPER::value('miles'); ?></span></div>
				<div class="options_list"><label>Stock</label><span><?php echo DIP_HELPER::value('stock'); ?></span></div>
				<div class="options_list"><label>Engine Cylinders</label><span><?php echo DIP_HELPER::value('engine_cylinders'); ?></span></div>
				<div class="options_list"><label>Engine Displacement</label><span><?php echo DIP_HELPER::value('engine_displacement'); ?></span></div>
				<div class="options_list"><label>Вescription</label><span><?php echo DIP_HELPER::value('description'); ?></span></div>
			</div>

			<div class="tabs_container">
				<div id="tabs">
					<ul class="tabs_caption">
						<li><a href="#tabs-1">Mechanical</a></li>
						<li><a href="#tabs-2">Exterior</a></li>
						<li><a href="#tabs-3">Interior</a></li>
						<li><a href="#tabs-4">Entertainment</a></li>
						<li><a href="#tabs-5">Safety & Security</a></li>
						<li><a href="#tabs-6">Other</a></li>
						<li><a href="#tabs-7">Features (Options)</a></li>
						<li><a href="#tabs-8">Dealer Info</a></li>
					</ul>
					<!-- Mechanical -->
					<div class="tabs_content" id="tabs-1">
						<div class="quick-list">
							<div class="options_list"><label>Engine Cylinders</label><span><?php echo DIP_HELPER::value('engine_cylinders'); ?></span></div>
							<div class="options_list"><label>Engine Displacement</label><span><?php echo DIP_HELPER::value('engine_displacement'); ?></span></div>
							<div class="options_list"><label>Transmission</label><span><?php echo DIP_HELPER::value('transmission'); ?></span></div>
						</div>
					</div>

					<!-- Exterior -->
					<div class="tabs_content" id="tabs-2">
						<div class="quick-list">
							<div class="options_list"><label>Body</label><span><?php echo DIP_HELPER::value('body'); ?></span></div>
							<div class="options_list"><label>Doors</label><span><?php echo DIP_HELPER::value('doors'); ?></span></div>
							<div class="options_list"><label>Color Exterior</label><span><?php echo DIP_HELPER::value('color_exterior'); ?></span></div>
						</div>
					</div>

					<!-- Interior -->
					<div class="tabs_content" id="tabs-3">
						<div class="quick-list">
							<div class="options_list"><label>Color Interior</label><span><?php echo DIP_HELPER::value('color_interior'); ?></span></div>
						</div>
					</div>

					<!-- Entertainment -->
					<div class="tabs_content" id="tabs-4">
						<div class="quick-list">

						</div>
					</div>

					<!-- Safety & Security -->
					<div class="tabs_content" id="tabs-5">
						<div class="quick-list">
						</div>
					</div>

					<!-- Other -->
					<div class="tabs_content" id="tabs-6">
						<div class="quick-list">
							<div class="options_list"><label>Dealer Name</label><span><?php echo DIP_HELPER::value('dealer_name'); ?></span></div>
							<div class="options_list"><label>VIN</label><span><?php echo DIP_HELPER::value('vin'); ?></span></div>
							<div class="options_list"><label>Model Number</label><span><?php echo DIP_HELPER::value('model_number'); ?></span></div>
							<div class="options_list"><label>MSRP</label><span><?php echo DIP_HELPER::value('msrp'); ?></span></div>
							<div class="options_list"><label>Book Value</label><span><?php echo DIP_HELPER::value('book_value'); ?></span></div>
							<div class="options_list"><label>Invoice</label><span><?php echo DIP_HELPER::value('invoice'); ?></span></div>
							<div class="options_list"><label>Certified</label><span><?php echo DIP_HELPER::value('certified'); ?></span></div>
							<div class="options_list"><label>Date in Stock</label><span><?php echo DIP_HELPER::value('date_in_stock'); ?></span></div>
						</div>
					</div>
					<div class="tabs_content" id="tabs-7">
						<div class="quick-list">
							<ul class="feature-list">
								<?php
								echo DIP_HELPER::value('options_li');
								/*
								if (taxonomy_exists('features')) { // output as taxonomy
								$taxonomy = get_the_terms($post->ID, 'features');
								if ($taxonomy) {
								foreach ($taxonomy as $taxonomy_term) {
								?> <li><?php echo $taxonomy_term->name;?></li><?php }
								}
								} else { // output as meta field
								dip_output_field('options');

								}
								*/
								?>
							</ul>

						</div>
					</div>
					<div class="tabs_content" id="tabs-8">
						<div class="quick-list">
							<div class="options_list"><label>Dealer Name</label><span><?php echo DIP_HELPER::value('dealer_name'); ?></span></div>
							<div class="options_list"><label>Dealer Address</label><span><?php echo implode(' ', array(DIP_HELPER::value('dealer_address'), DIP_HELPER::value('dealer_city'), DIP_HELPER::value('dealer_state'), DIP_HELPER::value('dealer_zip'), )); ?></span></div>
							<div class="options_list"><label>Dealer Phone</label><span><?php echo DIP_HELPER::value('dealer_phone'); ?></span></div>
							<div class="options_list"><label>Dealer Email</label><span><?php echo DIP_HELPER::value('dealer_email'); ?></span></div>

						</div>
					</div>
				</div>
			</div>


			<?php

			// Previous/next post navigation.
			twentyfourteen_post_nav();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
			endwhile;
		?>
	</div><!-- #content -->
</div><!-- #primary -->

<?php
get_sidebar( 'content' );
get_sidebar();
get_footer();
