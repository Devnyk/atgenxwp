<?php
/**
 * @package Leverage Extra
 */

namespace LVR\Widgets;

use WP_Query;
use Elementor\Widget_Base;

class LVR_post_carousel extends Widget_Base {

  public function get_name() {
    return 'leverage-post-carousel';
  }

  public function get_title() {
    return __( 'Post Carousel', 'leverage-extra' );
  }

  public function get_icon() {
    return 'eicon-posts-carousel';
  }

  public function get_categories() {
    return [ 'leverage_category' ];
  }

  protected function _register_controls() {

    // Content
		add_carousel_content_control( $this );
		add_post_item_content_control( $this, 'post' );

		// Style
		add_block_mask_style_control( $this, '.card' );
    add_heading_style_control( $this, 'post_item_title', 'Title', null, null, '.post-title' );
    add_paragraph_style_control( $this, 'post_item_metadata', 'Metadata', null, null, '.post-metadata' );
    add_simple_icon_style_control( $this, 'icon', 'Icon', '', '.icon-wrapper', '.post-metadata-icon' );
		add_pagination_style_control( $this, '.slider-pagination .swiper-pagination-bullet', '.slider-pagination .swiper-pagination-bullet-active' );
  }

  protected function render() {

		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'slider', 'class', 'swiper-container carousel-container mid-slider' );

		if ( $settings['post_item_columns'] ) {
			$this->add_render_attribute( 'slider', 'data-perview', $settings['post_item_columns']['size'] );
		}

		if ( $settings['autoplay'] ) {
			if ( $settings['autoplay'] == 'yes' ) {
				$autoplay = true;
			} else {
				$autoplay = false;
			}
			$this->add_render_attribute( 'slider', 'data-autoplay', $autoplay );
		}

		if ( $settings['rotation_speed'] ) {
			$this->add_render_attribute( 'slider', 'data-speed', $settings['rotation_speed']['size'] );
		}

		$categories      = isset( $settings['categories'] ) ? $settings['categories'] : null;
		$posts_per_page  = isset( $settings['post_per_page'] ) ? $settings['post_per_page']['size'] : 12;
		$post_order      = isset( $settings['post_order'] ) ? $settings['post_order'] : 'DESC';
		$post_order_by   = isset( $settings['post_order_by'] ) ? $settings['post_order_by'] : 'date';

		$exclude_posts_id      = $settings['exclude_posts_id'];
		$exclude_posts_id_list = explode( ',', $exclude_posts_id );
		?>
		
    <section class="carousel showcase">
			<div <?php echo $this->get_render_attribute_string( 'slider' ); ?>>
				<div class="swiper-wrapper">

					<?php
					if ( $settings['categories'] ) {

						$tax_query = array(
							array( 
								'taxonomy' => 'category', 
								'field'    => 'id', 
								'terms'    => $categories 
							) 
						);

					} else {
						$tax_query = null;
					}

					$args = array(
						'post_type'      => 'post',
						'tax_query'      => $tax_query,
						'post_status'    => 'publish',
						'order'          => $post_order,
						'orderby'        => $post_order_by,
						'posts_per_page' => $posts_per_page,
						'post__not_in'   => $exclude_posts_id_list,
					);

					$query = new WP_Query( $args );

					if ( $query->have_posts() ) {
						while ( $query->have_posts() ) {

							$query->the_post(); ?>

							<div id="post-<?php the_ID(); ?>" class="swiper-slide slide-center item">
								<div class="row card p-0 text-<?php echo $settings['post_item_text_alingment']; ?>">										
									<a href="<?php the_permalink(); ?>" class="full-link"></a>										
									<div class="image-over">
										<?php if ( has_post_thumbnail() ) {
											echo get_the_post_thumbnail( get_the_ID() );
										} else {
											echo '<img src="' . get_template_directory_uri() . '/assets/images/no-image.png" alt="' . __( 'No image', 'leverage-extra' ) . '" class="no-image" />';
										} ?>

										<div class="card-caption col-12 p-0">
											<div class="card-body no-excerpt">
												<div class="text">
													<h3 class="post-title m-0"><?php the_title(); ?></h3>
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
						
						wp_reset_postdata();

					} ?>

				</div>
				<div class="swiper-pagination slider-pagination"></div>
			</div>
    </section>

		<?php if ( leverage_elementor_is_edit_mode() ) {
			add_mid_slider_script();
		}
	}
}
