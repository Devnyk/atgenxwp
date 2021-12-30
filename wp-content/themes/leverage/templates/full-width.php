<?php
/**
 * Template Name: Leverage Full Width
 * Template Post Type: post, page, leverage-portfolio
 * @package Leverage
 */

get_header(); 

while ( have_posts() ) {

	the_post();
	the_content();
						
	wp_link_pages( array(
		'before' => '<div class="clearfix"></div><div class="ml-0 page-links">',
		'after'  => '</div>',
	) );
	
	if ( comments_open() || get_comments_number() ) { ?>
	<section class="full-width-comments">
		<div class="container">
			<div class="row content">
				<main class="col-12">						
					<?php comments_template(); ?>
				</main>
			</div>
		</div>
	</section>
	<?php 
	}
}

get_footer();