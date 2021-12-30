<?php
/**
 * @package Leverage Extra
 */

namespace LVR\Widgets;

use Elementor\Widget_Base;

class LVR_Testimonial extends Widget_Base {

  public function get_name() {
    return 'leverage-testimonial';
  }

  public function get_title() {
    return __( 'Testimonial', 'leverage-extra' );
  }

  public function get_icon() {
    return 'eicon-testimonial';
  }

  public function get_categories() {
    return [ 'leverage_category' ];
  }

  protected function _register_controls() {

    // Content
    add_person_content_control( $this, 'testimonial', 'Testimonial' );
    add_icon_content_control( $this );
    add_feature_content_control( $this );

    // Style
    add_block_style_control( $this, '.card' );
    add_image_style_control( $this, '.image-wrapper', 'img' );
    add_heading_style_control( $this, 'person_name', 'Name', null, null, '.person-name' );
    add_paragraph_style_control( $this, 'person_title', 'Title', null, null, '.person-title' );
    add_paragraph_style_control( $this, 'person_testimonial', 'Testimonial', null, null, '.person-testimonial' );
    add_icon_style_control( $this, 'icon', 'Icon', '', '.icon-wrapper', '.card-icon' );
    add_feature_style_control( $this, '.card.featured:before' );
  }

  protected function render() {

    $settings = $this->get_settings_for_display();
    
    $this->add_render_attribute( 'person_name', 'class', 'person-name' );
    $this->add_render_attribute( 'person_title', 'class', 'person-title' );
    $this->add_render_attribute( 'person_testimonial', 'class', 'person-testimonial' );

		$this->add_inline_editing_attributes( 'person_name', 'basic' );
		$this->add_inline_editing_attributes( 'person_title', 'basic' );
		$this->add_inline_editing_attributes( 'person_testimonial', 'basic' );
		?>
    
    <div class="testimonial">
      <div class="justify-content-center text-<?php echo $settings['person_text_alingment']; ?> items">
        <div class="item">
          <div class="card<?php echo $settings['display_feature'] ? ' featured to-' . $settings['feature_vertical_position'] . '-' . $settings['feature_horizontal_position'] : '' ?>">

            <?php
            // Top
            if ( $settings['person_photo_position'] === 'top' ) { ?>

              <div class="position-top">
                <div class="image-wrapper">
                  <img src="<?php echo $settings['person_photo']['url']; ?>" class="person-image" alt="Image">
                </div>
              </div>
              <div class="position-bottom text-<?php echo $settings['person_text_alingment']; ?>">

                <?php if ( $settings['person_name'] ) { ?>
                  <h3 <?php echo $this->get_render_attribute_string( 'person_name' ); ?>>
                    <?php echo $settings['person_name']; ?>
                  </h3>
                <?php } ?>

                <?php if ( $settings['person_title'] ) { ?>
                  <p <?php echo $this->get_render_attribute_string( 'person_title' ); ?>>
                    <?php echo $settings['person_title']; ?>
                  </p>
                <?php } ?>

                <?php if ( $settings['person_testimonial'] ) { ?>
                  <p <?php echo $this->get_render_attribute_string( 'person_testimonial' ); ?>>
                    <?php echo $settings['person_testimonial']; ?>
                  </p>
                <?php } ?>

                <div class="icon-container">
                  <div class="icon-wrapper <?php echo $settings['icon_position']; ?>">
                    <?php
                    if ( $settings['icon_type'] == 'fa' ) {
                      \Elementor\Icons_Manager::render_icon( $settings['icon_fa'], [ 'class' => 'card-icon' ] );

                    } else {
                      echo '<i class="icon card-icon gradient-icon icon-' . $settings['icon_line'] . '"></i>';
                    }
                    ?>
                  </div>
                </div>

              </div>

            <?php } ?>
              
            <?php
            // Right
            if ( $settings['person_photo_position'] === 'right' ) { ?>

              <div class="d-flex align-items-center justify-content-center">
                <div class="position-left text-<?php echo $settings['person_text_alingment']; ?>">

                  <?php if ( $settings['person_name'] ) { ?>
                    <h3 <?php echo $this->get_render_attribute_string( 'person_name' ); ?>>
                      <?php echo $settings['person_name']; ?>
                    </h3>
                  <?php } ?>

                  <?php if ( $settings['person_title'] ) { ?>
                    <p <?php echo $this->get_render_attribute_string( 'person_title' ); ?>>
                      <?php echo $settings['person_title']; ?>
                    </p>
                  <?php } ?>

                  <?php if ( $settings['person_testimonial'] ) { ?>
                    <p <?php echo $this->get_render_attribute_string( 'person_testimonial' ); ?>>
                      <?php echo $settings['person_testimonial']; ?>
                    </p>
                  <?php } ?>

                  <div class="icon-container">
                    <div class="icon-wrapper <?php echo $settings['icon_position']; ?>">
                      <?php
                      if ( $settings['icon_type'] == 'fa' ) {
                        \Elementor\Icons_Manager::render_icon( $settings['icon_fa'], [ 'class' => 'card-icon' ] );

                      } else {
                        echo '<i class="icon card-icon gradient-icon icon-' . $settings['icon_line'] . '"></i>';
                      }
                      ?>
                    </div>
                  </div>

                </div>
                <div class="position-right">
                  <div class="image-wrapper">
                    <img src="<?php echo $settings['person_photo']['url']; ?>" class="person-image" alt="Image">
                  </div>
                </div>
              </div>

            <?php } ?>

            <?php
            // Bottom
            if ( $settings['person_photo_position'] === 'bottom' ) { ?>

              <div class="position-top text-<?php echo $settings['person_text_alingment']; ?>">

                <?php if ( $settings['person_name'] ) { ?>
                  <h3 <?php echo $this->get_render_attribute_string( 'person_name' ); ?>>
                    <?php echo $settings['person_name']; ?>
                  </h3>
                <?php } ?>

                <?php if ( $settings['person_title'] ) { ?>
                  <p <?php echo $this->get_render_attribute_string( 'person_title' ); ?>>
                    <?php echo $settings['person_title']; ?>
                  </p>
                <?php } ?>

                <?php if ( $settings['person_testimonial'] ) { ?>
                  <p <?php echo $this->get_render_attribute_string( 'person_testimonial' ); ?>>
                    <?php echo $settings['person_testimonial']; ?>
                  </p>
                <?php } ?>

                <div class="icon-container">
                  <div class="icon-wrapper <?php echo $settings['icon_position']; ?>">
                    <?php
                    if ( $settings['icon_type'] == 'fa' ) {
                      \Elementor\Icons_Manager::render_icon( $settings['icon_fa'], [ 'class' => 'card-icon' ] );

                    } else {
                      echo '<i class="icon card-icon gradient-icon icon-' . $settings['icon_line'] . '"></i>';
                    }
                    ?>
                  </div>
                </div>

              </div>
              <div class="position-bottom">
                <div class="image-wrapper">
                  <img src="<?php echo $settings['person_photo']['url']; ?>" class="person-image" alt="Image">
                </div>
              </div>

            <?php } ?>

            <?php
            // Left
            if ( $settings['person_photo_position'] === 'left' ) { ?>

              <div class="d-flex align-items-center justify-content-center">
                <div class="position-left">
                  <div class="image-wrapper">
                    <img src="<?php echo $settings['person_photo']['url']; ?>" class="person-image" alt="Image">
                  </div>
                </div>
                <div class="position-right text-<?php echo $settings['person_text_alingment']; ?>">

                  <?php if ( $settings['person_name'] ) { ?>
                    <h3 <?php echo $this->get_render_attribute_string( 'person_name' ); ?>>
                      <?php echo $settings['person_name']; ?>
                    </h3>
                  <?php } ?>

                  <?php if ( $settings['person_title'] ) { ?>
                    <p <?php echo $this->get_render_attribute_string( 'person_title' ); ?>>
                      <?php echo $settings['person_title']; ?>
                    </p>
                  <?php } ?>

                  <?php if ( $settings['person_testimonial'] ) { ?>
                    <p <?php echo $this->get_render_attribute_string( 'person_testimonial' ); ?>>
                      <?php echo $settings['person_testimonial']; ?>
                    </p>
                  <?php } ?>

                  <div class="icon-container">
                    <div class="icon-wrapper <?php echo $settings['icon_position']; ?>">
                      <?php
                      if ( $settings['icon_type'] == 'fa' ) {
                        \Elementor\Icons_Manager::render_icon( $settings['icon_fa'], [ 'class' => 'card-icon' ] );

                      } else {
                        echo '<i class="icon card-icon gradient-icon icon-' . $settings['icon_line'] . '"></i>';
                      }
                      ?>
                    </div>
                  </div>

                </div>
              </div>

            <?php } ?>

          </div>
        </div>
      </div>
    </div>

	<?php 
  }
}