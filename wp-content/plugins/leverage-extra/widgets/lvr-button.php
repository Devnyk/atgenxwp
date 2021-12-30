<?php
/**
 * @package Leverage Extra
 */

namespace LVR\Widgets;

use Elementor\Widget_Base;

class LVR_Button extends Widget_Base {

  public function get_name() {
    return 'leverage-button';
  }

  public function get_title() {
    return __( 'Button', 'leverage-extra' );
  }

  public function get_icon() {
    return 'eicon-button';
  }

  public function get_categories() {
    return [ 'leverage_category' ];
  }

  protected function _register_controls() {
    
    // Content
    add_button_content_control( $this );

    // Style
		add_button_style_control( $this, 'button', 'Button', '', '.btn' );
  }

  protected function render() {

    $settings = $this->get_settings_for_display();

    $this->add_render_attribute( 'button_text', [ 'class' => 'btn ' . $settings['button_type'], 'href' => $settings['button_link']['url'], 'target' => $settings['button_link']['is_external'] ] );
    $this->add_inline_editing_attributes( 'button_text', 'basic' );
		?>

    <div class="d-flex justify-content-center justify-content-md-<?php echo $settings['button_position']; ?>">
      <a <?php echo $this->get_render_attribute_string( 'button_text' ); ?>>
        <?php echo $settings['button_text']; ?>
      </a>
    </div>

  <?php 
  }
}