<?php
/**
 * Template Name: Leverage Blog
 * @package Leverage
 */

get_header();

get_template_part( 'template-parts/content', 'no-slider' );

while ( have_posts() ) {
	the_post();
}

get_template_part( 'template-parts/content', 'showcase' );

get_footer();