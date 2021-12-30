<?php
/**
 * @package Leverage Extra
 */

namespace LVR\Widgets;

use Elementor\Widget_Base;

class LVR_Form extends Widget_Base {

  public function get_name() {
    return 'leverage-form';
  }

  public function get_title() {
    return __( 'Form', 'leverage-extra' );
  }

  public function get_icon() {
    return 'eicon-form-horizontal';
  }

  public function get_categories() {
    return [ 'leverage_category' ];
  }

  protected function _register_controls() {

    // Content
    add_form_content_control( $this );

    // Style
		add_field_style_control( $this );
		add_button_style_control( $this, 'button', 'Button', '', '.btn' );
  }

  protected function render() {

    $settings = $this->get_settings_for_display();
    ?>

    <div class="leverage-contact-form-7 add-<?php echo $settings['button_type']; ?>">
      <?php echo do_shortcode( $settings['contact_form_7_shortcode'] ); ?>
    </div>

		<?php if ( leverage_elementor_is_edit_mode() ) {
			add_form_script();
		}
	}
}