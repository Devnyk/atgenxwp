<?php
/**
 * @package Leverage
 */

function get_breadcrumb() {
	
	$front_page_id = get_option( 'page_on_front' );
	
	if ( $front_page_id != 0 ) {
		$front_page_title = get_the_title( $front_page_id );

	} else {
		$front_page_title =  get_bloginfo( 'name' );
	}

	// Portfolio
	if ( get_post_type() === 'leverage-portfolio' || is_page_template( 'templates/portfolio.php' ) ) {

		if ( is_archive() || is_category() || is_tag() || is_author() ) {
			$page_title = get_the_archive_title();
		} else {
			$page_title = get_the_title();
		}
	}

	// Single Portfolio
	elseif ( get_post_type() === 'leverage-portfolio' && is_single() ) {
		$page_title = get_the_title();	
	}

	// Blog [posts page]
	elseif ( is_archive() || is_home() ) {

		if ( is_archive() || is_category() || is_tag() || is_author() ) {
			$page_title = get_the_archive_title();

		} else {

			if ( is_front_page() ) {
				$page_title = get_bloginfo( 'name' );

			} else {
				$page_title = get_the_title( get_option( 'page_for_posts', true ) );			
			}
		}
	}

	// Blog [template page]
	elseif ( is_page_template( 'templates/blog.php' ) ) {
		$page_title = get_the_title();	
	}

	// Single Post
	elseif ( is_single() ) {
		$page_title = get_the_title();	
	}

	// Single Page
	elseif ( is_page() ) {
		$page_title = get_the_title();	
	}
	?>

	<li class="breadcrumb-item">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="nofollow">
			<?php echo esc_html( $front_page_title ); ?>
		</a>
	</li>

	<?php if ( is_page() ) {

		global $post;

		$ancestors = get_post_ancestors( $post->ID );

		if ( $ancestors ) {
			foreach ( $ancestors as $ancestor ) {

				$parent_title = get_the_title( $ancestor );
				$parent_link  = get_the_permalink( $ancestor );
				?>
	
				<li class="breadcrumb-item">
					<a href="<?php echo esc_html( $parent_link ); ?>" rel="nofollow">
						<?php echo esc_html( $parent_title ); ?>
					</a>
				</li>

			<?php
			}
		}
	}
	if ( ! is_front_page() && ! is_search() && ! is_404() ) { ?>

	<li class="breadcrumb-item active">
		<?php $page_title = str_replace( [ '<span>', '</span>' ], '',  $page_title );
		echo ( esc_html( $page_title ) ) ? esc_html( $page_title ) : __( 'No Title', 'leverage' ) ?>
	</li>

	<?php
	} 
}