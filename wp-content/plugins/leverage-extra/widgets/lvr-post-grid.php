<?php
/**
 * @package Leverage Extra
 */

namespace LVR\Widgets;

use WP_Query;
use Elementor\Widget_Base;

class LVR_Post_Grid extends Widget_Base {

  public function get_name() {
    return 'leverage-post-grid';
  }

  public function get_title() {
    return __( 'Post Grid', 'leverage-extra' );
  }

  public function get_icon() {
    return 'eicon-posts-grid';
  }

  public function get_categories() {
    return [ 'leverage_category' ];
  }

  protected function _register_controls() {

		// Content
		add_filter_content_control( $this, 'post' );
		add_post_item_content_control( $this, 'post' );
		add_pagination_content_control( $this );

		// Style
		add_block_mask_style_control( $this, '.card' );
		add_filter_style_control( $this, 'filter_buttons', 'Filter Buttons', '.btn-group .btn', '.btn-group .btn.active' );
    add_heading_style_control( $this, 'post_item_title', 'Title', null, null, '.post-title' );
    add_paragraph_style_control( $this, 'post_item_excerpt', 'Excerpt', null, null, '.post-excerpt p' );
    add_paragraph_style_control( $this, 'post_item_metadata', 'Metadata', null, null, '.post-metadata' );
    add_simple_icon_style_control( $this, 'icon', 'Icon', '', '.icon-wrapper', '.post-metadata-icon' );
		add_filter_style_control( $this, 'pagination', 'Pagination', 'span.page-numbers', 'span.page-numbers.current' );
  }

  protected function render() {

    $settings = $this->get_settings_for_display();

		$categories      = isset( $settings['categories'] ) ? $settings['categories'] : null;
		$posts_per_page  = isset( $settings['post_per_page'] ) ? $settings['post_per_page']['size'] : 12;
		$post_order      = isset( $settings['post_order'] ) ? $settings['post_order'] : 'DESC';
		$post_order_by   = isset( $settings['post_order_by'] ) ? $settings['post_order_by'] : 'date';

		$exclude_posts_id      = $settings['exclude_posts_id'];
		$exclude_posts_id_list = explode( ',', $exclude_posts_id );
		?>

		<section class="showcase blog-grid<?php echo ( $settings['display_filter'] ) ? ' filter-section' : '' ?>">
			<div class="overflow-holder">

				<?php if ( $settings['display_filter'] ) { ?>

					<div class="row justify-content-center text-<?php echo $settings['filter_position']; ?>">
						<div class="col-12">
							<div class="btn-group btn-group-toggle" data-toggle="buttons">

								<?php if ( $settings['display_all_button'] ) { ?>

									<label class="btn active">
										<input type="radio" value="all" checked class="btn-filter-item">
										<span><?php echo $settings['all_button_text']; ?></span>
									</label>

								<?php } ?>

								<?php 
								$filter_categories = null;

								if ( is_array( $settings['filter_categories'] ) && $settings['filter_categories'] ) {

									$filter_categories = $settings['filter_categories'];

									foreach ( $filter_categories as $post_category ) { ?>

										<label class="btn">
											<input type="radio" value="<?php echo $post_category; ?>" class="btn-filter-item">
											<span><?php echo get_term( $post_category )->name; ?></span>
										</label>

									<?php
									}
								} 
								?>

							</div>
						</div>
					</div>

				<?php } ?>

				<div class="row justify-content-center items filter-items">

					<?php
					$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

					if ( $settings['display_filter'] ) {

						$tax_query = array(
							array( 
								'taxonomy' => 'category', 
								'field'    => 'id', 
								'terms'    => $filter_categories 
							) 
						);

					} else {

						$tax_query = array(
							array( 
								'taxonomy' => 'category', 
								'field'    => 'id', 
								'terms'    => $categories 
							) 
						);
					}

					$args = array(
						'post_type'      => 'post',
						'tax_query'      => $tax_query,
						'post_status'    => 'publish',
						'order'          => $post_order,
						'orderby'        => $post_order_by,
						'posts_per_page' => $posts_per_page,
						'post__not_in'   => $exclude_posts_id_list,
						'paged'          => $paged
					);

					$query = new WP_Query( $args );

					if ( $query->have_posts() ) {
						while ( $query->have_posts() ) {

							$query->the_post();

							$item_filter_categories = get_the_terms( get_the_ID(), 'category' );

							$filter_array = null;
							foreach ( $item_filter_categories as $item_post_category ) {
								$filter_array[] = $item_post_category->term_id;
							}
							
							if ( $filter_array ) {									
								$filter_list = implode( '","', $filter_array );									
								$filter_data = "[\"$filter_list\"]";
							} else {
								$filter_data = "[\"0\"]";
							} 
							
							switch ( $settings['post_item_columns']['size'] ) {

								case '1': $columns = 'col-12'; break;
								case '2': $columns = 'col-12 col-sm-6'; break;
								case '3': $columns = 'col-12 col-sm-6 col-md-6 col-lg-4'; break;
								case '4': $columns = 'col-12 col-sm-6 col-md-4 col-lg-3'; break;
								case '5': $columns = 'col-12 col-sm-6 col-md-4 col-lg-3'; break;
								case '6': $columns = 'col-12 col-sm-6 col-md-3 col-lg-2'; break;

								default: $columns = 'col-12 col-sm-6 col-md-6 col-lg-4';
							} ?>

							<div id="post-<?php the_ID(); ?>" class="<?php echo esc_attr( $columns ); ?> item filter-item" data-groups='<?php echo esc_attr( $filter_data ); ?>'>
								<div class="row card p-0 text-<?php echo $settings['post_item_text_alingment']; ?>">
									<a href="<?php the_permalink(); ?>" class="full-link"></a>										
									<div class="image-over">
										<?php if ( has_post_thumbnail() ) {
											echo get_the_post_thumbnail( get_the_ID() );
										} else {
											echo '<img src="' . get_template_directory_uri() . '/assets/images/no-image.png" alt="' . __( 'No image', 'leverage-extra' ) . '" class="no-image" />';
										} 
										?>

										<div class="card-caption col-12 p-0">
											<div class="card-body <?php echo ( get_the_excerpt() && $settings['post_item_display_excerpt'] ? 'with-excerpt' : 'no-excerpt' ) ?>">
												<div class="text">
													<h3 class="post-title"><?php the_title(); ?></h3>
													<?php if ( get_the_excerpt() && $settings['post_item_display_excerpt'] ) { ?>
													<div class="post-excerpt excerpt-holder">
														<?php the_excerpt(); ?>
													</div>
													<?php } ?>
												</div>
											</div>
											<div class="card-footer d-lg-flex align-items-center justify-content-<?php echo $settings['post_item_metadata_alingment']; ?>">

												<?php if ( $settings['post_item_display_author'] ) { ?>

													<div class="post-metadata author-name d-lg-flex align-items-center mr-3">
														<div class="icon-wrapper">
															<i class="post-metadata-icon icon-user"></i>
														</div>
														<?php echo leverage_author_display_name(); ?>
													</div>

												<?php } ?>

												<?php if ( $settings['post_item_display_date'] ) { ?>

													<div class="post-metadata publish-date d-lg-flex align-items-center">
														<div class="icon-wrapper">
															<i class="post-metadata-icon icon-clock"></i>
														</div>
														<?php echo leverage_time_ago(); ?>
													</div>

												<?php } ?>
											
											</div>
										</div>
										<?php if ( is_sticky() ) : ?>
											<i class="btn-icon sticky-icon icon-pin"></i>
										<?php endif; ?>

									</div>
								</div>
							</div>

						<?php
						}
					} ?>

					<?php if ( $settings['display_filter'] ) { ?>
						<div class="col-1 filter-sizer"></div>
					<?php } ?>

				</div>

				<?php
				if ( $settings['display_pagination'] && $query->max_num_pages > 1 ) { ?>

					<div class="row">
						<div class="col-12">
							<nav class="d-flex justify-content-<?php echo $settings['pagination_position']; ?>">

								<?php
								echo paginate_links(
									array(
										'base' => get_pagenum_link( 1 ) . '%_%',
										'current' => max( 1, get_query_var( 'paged' ) ),
										'total' => $query->max_num_pages,
										'end_size'  => 1,
										'mid_size'  => 2,
										'prev_text' => '<i class="icon-arrow-left"></i>',
										'next_text' => '<i class="icon-arrow-right"></i>',
										'type'      => 'list'
									)
								);
								?>

							</nav>
						</div>
					</div>

				<?php		
				}

				wp_reset_postdata();
				?>

			</div>
		</section>

  <?php 
	}
}