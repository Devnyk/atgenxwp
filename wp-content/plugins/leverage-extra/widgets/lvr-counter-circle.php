<?php

namespace LVR\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Core\Schemes;

class LVR_Counter_Circle extends Widget_Base {

  public function get_name() {
    return 'leverage-counter-circle';
  }

  public function get_title() {
    return __( 'Counter Circle', 'leverage-extra' );
  }

  public function get_icon() {
    return 'eicon-counter-circle';
  }

  public function get_categories() {
    return [ 'leverage_category' ];
  }

  protected function _register_controls() {

    // Content
    add_number_content_control( $this );
    add_heading_content_control( $this );
    add_paragraph_content_control( $this );

    // Style
    add_number_style_control( $this, '.number' );
    add_progress_bar_style_control( $this );
    add_heading_style_control( $this, 'heading', 'Heading', null, null, '.heading' );
		add_paragraph_style_control( $this, 'paragraph', 'Paragraph', null, null, '.paragraph' );
  }

  protected function render() {

		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'number', 'class', 'number' );
		$this->add_render_attribute( 'heading', 'class', 'heading' );
    $this->add_render_attribute( 'paragraph', 'class', 'paragraph' );
    
		$this->add_inline_editing_attributes( 'number', 'basic' );
		$this->add_inline_editing_attributes( 'heading', 'basic' );
    $this->add_inline_editing_attributes( 'paragraph', 'basic' );
		?>

    <div class="counter skills autocolor">
      <div class="justify-content-center text-<?php echo $settings['number_alingment']; ?> items">
        <div class="item">

          <?php if ( $settings['number'] ) { ?>
            <div data-percent="<?php echo $settings['number']; ?>" data-p-color="<?php echo $settings['progress_bar_primary_color']; ?>" data-s-color="<?php echo $settings['progress_bar_secondary_color']; ?>" data-empty-color="<?php echo $settings['progress_bar_empty_color']; ?>" class="radial">
              <span <?php echo $this->get_render_attribute_string( 'number' ); ?>>
                <?php echo $settings['number']; ?>
              </span>
            </div>
          <?php } ?>

          <?php if ( $settings['heading'] ) { ?>
            <div class="text-<?php echo $settings['heading_alingment']; ?>">
              <h3 <?php echo $this->get_render_attribute_string( 'heading' ); ?>>
                <?php echo $settings['heading']; ?>
              </h3>
            </div> 
          <?php } ?>

          <?php if ( $settings['paragraph'] ) { ?>
            <div class="text-<?php echo $settings['paragraph_alingment']; ?>">
              <p <?php echo $this->get_render_attribute_string( 'paragraph' ); ?>>
                <?php echo $settings['paragraph']; ?>
              </p>
            </div>
          <?php } ?>

        </div>
      </div>
    </div>

  <?php
  add_counter_circle_script();
  }
}