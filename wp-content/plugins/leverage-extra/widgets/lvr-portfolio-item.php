<?php
/**
 * @package Leverage Extra
 */

namespace LVR\Widgets;

use Elementor\Widget_Base;

class LVR_Portfolio_Item extends Widget_Base {

  public function get_name() {
    return 'leverage-portfolio-item';
  }

  public function get_title() {
    return __( 'Portfolio Item', 'leverage-extra' );
  }

  public function get_icon() {
    return 'eicon-image-box';
  }

  public function get_categories() {
    return [ 'leverage_category' ];
  }

  protected function _register_controls() {

    // Content
    add_image_content_control( $this );
    add_heading_content_control( $this );
    add_paragraph_content_control( $this );
    add_feature_content_control( $this );
    add_target_content_control( $this );

    // Style
    add_block_style_control( $this, '.card' );
    add_image_style_control( $this, '.image-wrapper', 'img' );
    add_heading_style_control( $this, 'heading', 'Heading', null, null, '.heading' );
		add_paragraph_style_control( $this, 'paragraph', 'Paragraph', null, null, '.paragraph' );
    add_feature_style_control( $this, '.card.featured:before' );
  }

  protected function render() {

    $settings = $this->get_settings_for_display();

    $this->add_render_attribute( 'heading', 'class', 'heading' );
    $this->add_render_attribute( 'paragraph', 'class', 'paragraph' );
		?>

    <div class="offers">
      <div class="items">
        <div class="item">
          <div class="card<?php echo $settings['display_feature'] ? ' featured to-' . $settings['feature_vertical_position'] . '-' . $settings['feature_horizontal_position'] : '' ?>">
          
            <?php if ( $settings['image_vertical_position'] == 'top' ) { display_image( $settings ); } ?>

            <?php if ( $settings['heading'] ) { ?>
              <div class="heading-wrapper text-<?php echo $settings['heading_alingment']; ?> <?php echo ( $settings['paragraph'] ) ? '' : 'm-0' ?>">
                <h3 <?php echo $this->get_render_attribute_string( 'heading' ); ?>>
                  <?php echo $settings['heading']; ?>
                </h3>
              </div> 
            <?php } ?>

            <?php if ( $settings['paragraph'] ) { ?>
              <div class="paragraph-wrapper text-<?php echo $settings['paragraph_alingment']; ?>">
                <p <?php echo $this->get_render_attribute_string( 'paragraph' ); ?>>
                  <?php echo $settings['paragraph']; ?>
                </p>
              </div>
            <?php } ?>

            <?php if ( $settings['image_vertical_position'] == 'bottom' ) { display_image( $settings ); } ?>

          </div>
        </div>
      </div>
    </div>
          
	<?php 
  }
}