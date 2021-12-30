<?php
/**
 * @package Leverage Extra
 */

namespace LVR\Widgets;

use Elementor\Widget_Base;

class LVR_Icon extends Widget_Base {

  public function get_name() {
    return 'leverage-icon';
  }

  public function get_title() {
    return __( 'Icon', 'leverage-extra' );
  }

  public function get_icon() {
    return 'eicon-shape';
  }

  public function get_categories() {
    return [ 'leverage_category' ];
  }

  protected function _register_controls() {

    // Content
    add_icon_content_control( $this );

    // Style
    add_icon_style_control( $this, 'icon', 'Icon', '', '.icon-wrapper', '.icon' );
  }

  protected function render() {

    $settings = $this->get_settings_for_display();
    ?>

    <div class="icon-wrapper <?php echo $settings['icon_position']; ?>">
      <?php
      if ( $settings['icon_type'] == 'fa' ) {
        \Elementor\Icons_Manager::render_icon( $settings['icon_fa'], [ 'class' => 'icon' ] );

      } else {
        echo '<i class="icon gradient-icon icon-' . $settings['icon_line'] . '"></i>';
      }
      ?>
    </div>

	<?php }
}