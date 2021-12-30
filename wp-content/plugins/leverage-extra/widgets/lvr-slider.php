<?php
/**
 * @package Leverage Extra
 */

namespace LVR\Widgets;

use Elementor\Widget_Base;

class LVR_Slider extends Widget_Base {

  public function get_name() {
    return 'leverage-slider';
  }

  public function get_title() {
    return __( 'Slider & Banner', 'leverage-extra' );
  }

  public function get_icon() {
    return 'eicon-slides';
  }

  public function get_categories() {
    return [ 'leverage_category' ];
  }

  protected function _register_controls() {

    // Content
		add_slider_content_control( $this );

		// Style
		add_slider_style_control( $this, '.hero' );
		add_slider_image_style_control( $this, '.hero', '.slider-image.aos-animate' );
		add_outline_style_control( $this, '.hero.featured', '.inner .slider-outline' );
    add_heading_gradient_style_control( $this, 'heading', 'Heading', null, null, '.slider-item .slide-content .inner .title' );
		add_paragraph_style_control( $this, 'description', 'Paragraph', null, null, '.slider-item .slide-content .inner .description' );
		add_primary_button_style_control( $this, 'primary_button', 'Primary Button', '', '.primary-button' );
		add_dark_button_style_control( $this, 'secondary_button', 'Secondary Button', '', '.dark-button' );
		add_pagination_style_control( $this, '.slider-pagination .swiper-pagination-bullet', '.slider-pagination .swiper-pagination-bullet-active' );
  }

  protected function render() {

		$settings = $this->get_settings_for_display();

		// hero
		$this->add_render_attribute( 'hero', 'class', 'hero p-0' );

		if ( $settings['enable_block_style'] ) {
			$this->add_render_attribute( 'hero', 'class', 'slider-block' );
		}

		$slider_class = 'no-slider';
		
		if ( $settings['slider_items'] ) {
			$slides = count( $settings['slider_items'] );

			if ( $slides > 1 ) {
				$slider_class = 'full-slider';
			} else {
				$slider_class = 'no-slider';
			}
		}

		$this->add_render_attribute( 'slider', 'class', 'swiper-container slider-container ' . $slider_class . ' animation slider-h-auto slider-h-' . $settings['layout_height']['size'] );

		if ( $settings['display_outline'] ) {
			$this->add_render_attribute( 'slider', 'class', 'featured' );
		}

		if ( $settings['rotation_speed'] ) {
			$this->add_render_attribute( 'slider', 'data-speed', $settings['rotation_speed']['size'] );
		}

		if ( ! leverage_elementor_is_edit_mode() ) {
			$this->add_render_attribute( 'heading', [ 'class' => 'title effect-static-text', 'data-aos' => 'zoom-out-up', 'data-aos-delay' => '400' ] );
			$this->add_render_attribute( 'paragraph', [ 'class' => 'description', 'data-aos' => 'zoom-out-up', 'data-aos-delay' => '800' ] );
			$this->add_render_attribute( 'buttons', [ 'class' => 'buttons', 'data-aos' => 'zoom-out-up', 'data-aos-delay' => '1200' ] );
			$this->add_render_attribute( 'breadcrumb', [ 'class' => 'breadcrumb-nav', 'data-aos' => 'zoom-out-up', 'data-aos-delay' => '800' ] );
		}

    $this->add_render_attribute( 'heading', 'class', 'title effect-static-text' );
    $this->add_render_attribute( 'paragraph', 'class', 'description' );
    $this->add_render_attribute( 'buttons', 'class', 'buttons' );
    $this->add_render_attribute( 'breadcrumb', 'class', 'breadcrumb-nav' );
		?>

		<section <?php echo $this->get_render_attribute_string( 'hero' ); ?>>
			<div <?php echo $this->get_render_attribute_string( 'slider' ); ?>>
				<div class="swiper-wrapper">

					<?php 
					$slide_count = 0;
					foreach ( $settings['slider_items'] as $item ) { 
						$slide_count++; 
						?>

						<div class="swiper-slide slide-center slider-item">

							<?php if ( $item['particles_type'] && $item['particles_type'] !== 'none' ) { ?>
								<div id="particles-<?php echo esc_attr( $slide_count ); ?>" class="particles full-image" data-particle="<?php echo $item['particles_type']; ?>"></div>
							<?php } ?>

							<?php 
							if ( $item['image_type'] === 'library' ) {
								$image_url = $item['image']['url'];
							
							} elseif ( $item['image_type'] === 'external' ) {
								$image_url = $item['external_image_url'];

							}  elseif ( $item['image_type'] === 'featured' ) {
								$image_url = get_the_post_thumbnail_url();
							
							} else {
								$image_url = null;
							} 
							
							if ( $image_url ) { ?>
								<img <?php echo ( leverage_elementor_is_edit_mode() ) ? '' : 'data-aos="zoom-out-up" data-aos-delay="400"' ?> src="<?php echo $image_url; ?>" class="slider-image <?php echo $item['image_alingment']; ?> <?php echo ( leverage_elementor_is_edit_mode() ) ? 'd-block aos-animate' : '' ?>">
							<?php } ?>

							<div class="slide-content row">
								<div class="col-12 d-flex justify-content-<?php echo $item['layout_alingment']; ?> inner">
									<div class="slider-outline <?php echo ( leverage_elementor_is_edit_mode() ) ? 'init' : '' ?> <?php echo $item['text_alingment']; ?> text-center text-md-<?php echo $item['text_alingment']; ?>" style="width: <?php echo $item['layout_width']['size'] . $item['layout_width']['unit']; ?>">

										<?php if ( $item['heading'] ) { ?>
											<h1 <?php echo $this->get_render_attribute_string( 'heading' ); ?>>
												<?php echo $item['heading']; ?>
											</h1>
										<?php } ?>

										<?php if ( $settings['display_breadcrumb'] ) { ?>
											<nav <?php echo $this->get_render_attribute_string( 'breadcrumb' ); ?>>
												<ol class="breadcrumb"><?php get_breadcrumb(); ?></ol>
											</nav>
										<?php } ?>

										<?php if ( $item['paragraph'] ) { ?>
											<p <?php echo $this->get_render_attribute_string( 'paragraph' ); ?>>
												<?php echo $item['paragraph']; ?>
											</p>
										<?php } ?>

										<div <?php echo $this->get_render_attribute_string( 'buttons' ); ?>>

											<?php 
											if ( $item['text_alingment'] == 'left' ) {
												$buttons_alingment = 'start';

											}	elseif ( $item['text_alingment'] == 'right' ) {
												$buttons_alingment = 'end';
											
											} else {
												$buttons_alingment = 'center';
											}
											?>

											<div class="d-sm-inline-flex justify-content-<?php echo $buttons_alingment; ?>">

												<?php
												// Primary
												foreach ( $item['primary_button_link'] as $link ) {
													$primary_button_target = isset( $link['is_external'] ) ? ' target="_blank"' : '';
													$primary_button_nofollow = isset( $link['nofollow'] ) ? ' rel="nofollow"' : '';
												} ?>

												<?php if ( $item['primary_button_text'] ) { ?>
													<a href="<?php echo $item['primary_button_link']['url']; ?>" class="mx-auto ml-sm-0 mr-sm-0 mt-4 btn primary-button" <?php echo $primary_button_target; echo $primary_button_nofollow; ?>>
														<?php echo $item['primary_button_text']; ?>
													</a>												
												<?php } ?>
												
												<?php
												// Secondary
												foreach ( $item['secondary_button_link'] as $link ) {
													$secondary_button_target = isset( $link['is_external'] ) ? ' target="_blank"' : '';
													$secondary_button_nofollow = isset( $link['nofollow'] ) ? ' rel="nofollow"' : '';
												} ?>

												<?php if ( $item['secondary_button_text'] ) { ?>
													<a href="<?php echo $item['secondary_button_link']['url']; ?>" class="mx-auto <?php echo ( $item['primary_button_text'] ) ? 'ml-sm-4' : 'ml-sm-0' ?> mr-sm-0 mt-4 btn dark-button" <?php echo $secondary_button_target; echo $secondary_button_nofollow; ?>>
														<?php echo $item['secondary_button_text']; ?>
													</a>				
												<?php } ?>

											</div>
										</div>

									</div>
								</div>
							</div>
						</div>
					
					<?php } ?>

				</div>
				<?php if ( $settings['display_pagination'] ) { ?>
					<div class="swiper-pagination slider-pagination"></div>
				<?php } ?>					
			</div>
		</section>

		<?php if ( leverage_elementor_is_edit_mode() ) {

			add_slider_script();
			add_particles_script();

		}
  }
}