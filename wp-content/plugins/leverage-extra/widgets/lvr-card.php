<?php
/**
 * @package Leverage Extra
 */

namespace LVR\Widgets;

use Elementor\Widget_Base;

class LVR_Card extends Widget_Base {

  public function get_name() {
    return 'leverage-card';
  }

  public function get_title() {
    return __( 'Card', 'leverage-extra' );
  }

  public function get_icon() {
    return 'eicon-menu-toggle';
  }

  public function get_categories() {
    return [ 'leverage_category' ];
  }

  protected function _register_controls() {

    // Content
    add_icon_content_control( $this );
    add_heading_content_control( $this );
    add_paragraph_content_control( $this );
    add_feature_content_control( $this );
    add_action_content_control( $this );

    // Style
    add_block_style_control( $this, '.card' );
    add_icon_style_control( $this, 'icon', 'Icon', '', '.icon-wrapper', '.card-icon' );
    add_icon_style_control( $this, 'action_icon', 'Action Icon', [ 'action_type' => 'icon' ], '.card', '.btn-icon' );
    add_heading_style_control( $this, 'heading', 'Heading', null, null, '.heading' );
		add_paragraph_style_control( $this, 'paragraph', 'Paragraph', null, null, '.paragraph' );
		add_button_style_control( $this, 'button', 'Button', [ 'action_type' => 'button' ], '.btn' );
    add_feature_style_control( $this, '.card.featured:before' );
  }

  protected function render() {

    $settings = $this->get_settings_for_display();
    
    if ( $settings['action_type'] === 'icon' ) { 
      $this->add_render_attribute( 'action_icon', 'class', 'action-icon btn-icon gradient-icon icon-' . $settings['action_icon_line'] . ' ' . $settings['action_position'] );

    } elseif ( $settings['action_type'] === 'button' ) {
      $this->add_render_attribute( 'button_text', 'class', 'btn ' . $settings['button_type'] . ' ' . $settings['action_position'] );
    }

    $this->add_render_attribute( 'heading', 'class', 'heading' );
    $this->add_render_attribute( 'paragraph', 'class', 'paragraph' );
		?>

    <div class="offers card-action-icon">
      <div class="items">
        <div class="item">
          <div class="card<?php echo $settings['display_feature'] ? ' featured to-' . $settings['feature_vertical_position'] . '-' . $settings['feature_horizontal_position'] : '' ?>">
          
            <div class="icon-wrapper <?php echo $settings['icon_position']; ?>">
              <?php
              if ( $settings['icon_type'] == 'fa' ) {
                \Elementor\Icons_Manager::render_icon( $settings['icon_fa'], [ 'class' => 'icon card-icon' ] );

              } else {
                echo '<i class="icon card-icon gradient-icon icon-' . $settings['icon_line'] . '"></i>';
              }
              ?>
            </div>

            <div class="heading-wrapper text-<?php echo $settings['heading_alingment']; ?>">
              <h3 <?php echo $this->get_render_attribute_string( 'heading' ); ?>>
                <?php echo $settings['heading']; ?>
              </h3>
            </div> 

            <div class="paragraph-wrapper text-<?php echo $settings['paragraph_alingment']; ?>">
              <p <?php echo $this->get_render_attribute_string( 'paragraph' ); ?>>
                <?php echo $settings['paragraph']; ?>
              </p>
            </div>

            <?php 
            if ( isset( $settings['action_link'] ) ) {
              $target = $settings['action_link']['is_external'] ? ' target="_blank"' : '';
              $nofollow = $settings['action_link']['nofollow'] ? ' rel="nofollow"' : '';
              ?>             

              <a href="<?php echo $settings['action_link']['url']; ?>" class="full-link" <?php echo $target; echo $nofollow; ?>></a>
              
            <?php } ?>

            <?php if ( $settings['action_type'] === 'icon' ) { ?>
              <div class="action-wrapper">
                <i <?php echo $this->get_render_attribute_string( 'action_icon' ); ?>></i>
              </div>
            <?php } elseif ( $settings['action_type'] === 'button' ) { ?>

              <div class="action-wrapper buttons">
                <a <?php echo $this->get_render_attribute_string( 'button_text' ); ?>>
                  <?php echo $settings['button_text']; ?>
                </a>
              </div>

            <?php } ?>

          </div>
        </div>
      </div>
    </div>
          
	<?php 
  }
}