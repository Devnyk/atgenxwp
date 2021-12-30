<?php

namespace LVR\Widgets;

use Elementor\Widget_Base;
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Core\Schemes;

class LVR_Image extends Widget_Base {

  public function get_name() {
    return 'leverage-image';
  }

  public function get_title() {
    return __( 'Image', 'leverage-extra' );
  }

  public function get_icon() {
    return 'eicon-image';
  }

  public function get_categories() {
    return [ 'leverage_category' ];
  }

  protected function _register_controls() {

		// Content
		add_image_content_control( $this, false );

		// Style
		add_image_style_control( $this, '.image-wrapper', '.fit-image' );
		add_image_overlay_style_control( $this, '.image-wrapper', '.fit-image' );
  }

  protected function render() {

		$settings = $this->get_settings_for_display();
		?>

		<div class="image-wrapper">
      <?php display_image( $settings ); ?>
		</div>
	<?php }
}