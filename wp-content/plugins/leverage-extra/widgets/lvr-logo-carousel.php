<?php
/**
 * @package Leverage Extra
 */

namespace LVR\Widgets;

use Elementor\Widget_Base;

class LVR_Logo_Carousel extends Widget_Base {

  public function get_name() {
    return 'leverage-logo-carousel';
  }

  public function get_title() {
    return __( 'Logo Carousel', 'leverage-extra' );
  }

  public function get_icon() {
    return 'eicon-form-vertical';
  }

  public function get_categories() {
    return [ 'leverage_category' ];
  }

  protected function _register_controls() {

		// Content
		add_logo_carousel_content_control( $this );

		// Style
		add_image_overlay_style_control( $this, '.client-logo', '.partners .client-logo img' );
  }

  protected function render() {

    $settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'slider', 'class', 'swiper-container carousel-container min-slider' );

		if ( $settings['columns'] ) {
			$this->add_render_attribute( 'slider', 'data-perview', $settings['columns']['size'] );
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
    ?>

		<section class="partners">
			<div class="overflow-holder">
				<div <?php echo $this->get_render_attribute_string( 'slider' ); ?>>
					<div class="swiper-wrapper">

					<?php foreach ( $settings['carousel_items'] as $item ) { ?>

						<div class="swiper-slide slide-center item">

							<?php if ( $item['image']['url'] ) { ?>

								<?php foreach ( $item['link'] as $link ) {
									$target = isset( $link['is_external'] ) ? ' target="_blank"' : '';
									$nofollow = isset( $link['nofollow'] ) ? ' rel="nofollow"' : '';
								} ?>

								<a href="<?php echo $item['link']['url']; ?>" <?php echo $target; echo $nofollow; ?> class="client-logo">
									<img src="<?php echo $item['image']['url']; ?>" alt="<?php echo $item['title']; ?>" class="fit-image">
								</a>

							<?php } ?>

						</div>

					<?php } ?>
							
					</div>
				</div>
			</div>
		</section>
		
		<?php if ( leverage_elementor_is_edit_mode() ) {
			add_min_slider_script();
		}
	}
}