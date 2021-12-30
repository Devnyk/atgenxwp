<?php
/**
 * @package Leverage Extra
 */

namespace LVR\Widgets;

use Elementor\Widget_Base;

class LVR_Person extends Widget_Base {

  public function get_name() {
    return 'leverage-person';
  }

  public function get_title() {
    return __( 'Person', 'leverage-extra' );
  }

  public function get_icon() {
    return 'eicon-person';
  }

  public function get_categories() {
    return [ 'leverage_category' ];
  }

  protected function _register_controls() {

    // Content
    add_person_content_control( $this, 'biography', 'Biography' );
    add_social_icons_content_control( $this );
    add_feature_content_control( $this );

    // Style
    add_block_style_control( $this, '.card' );
    add_image_style_control( $this, '.image-wrapper', 'img' );
    add_heading_style_control( $this, 'person_name', 'Name', null, null, '.person-name' );
    add_paragraph_style_control( $this, 'person_title', 'Title', null, null, '.person-title' );
    add_paragraph_style_control( $this, 'person_biography', 'Biography', null, null, '.person-biography' );
    add_icon_style_control( $this, 'icon', 'Icon', '', '.icon-wrapper', '.social-icon' );
    add_feature_style_control( $this, '.card.featured:before' );
  }

  protected function render() {

    $settings = $this->get_settings_for_display();
    
    $this->add_render_attribute( 'person_name', 'class', 'person-name' );
    $this->add_render_attribute( 'person_title', 'class', 'person-title' );
    $this->add_render_attribute( 'person_biography', 'class', 'person-biography' );

		$this->add_inline_editing_attributes( 'person_name', 'basic' );
		$this->add_inline_editing_attributes( 'person_title', 'basic' );
		$this->add_inline_editing_attributes( 'person_biography', 'basic' );
		?>
    
    <div class="team">
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

                <?php if ( $settings['person_biography'] ) { ?>
                  <p <?php echo $this->get_render_attribute_string( 'person_biography' ); ?>>
                    <?php echo $settings['person_biography']; ?>
                  </p>
                <?php } ?>

                <?php 
                $social_icon_items = $settings['social_icon_items'];

                if ( ! empty( $social_icon_items ) ) { ?>

                  <ul class="person-social-icons">
                    <?php foreach ( $social_icon_items as $item ) { ?>
                      <li>
                        <a href="<?php echo $item['social_icon_link']['url']; ?>">
                          <div class="icon-wrapper">
                            <?php \Elementor\Icons_Manager::render_icon( $item['social_icon'], [ 'class' => 'social-icon' ] ); ?>
                          </div>
                        </a>
                      </li>
                    <?php } ?>
                  </ul>

                <?php } ?>
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

                  <?php if ( $settings['person_biography'] ) { ?>
                    <p <?php echo $this->get_render_attribute_string( 'person_biography' ); ?>>
                      <?php echo $settings['person_biography']; ?>
                    </p>
                  <?php } ?>

                  <?php 
                  $social_icon_items = $settings['social_icon_items'];

                  if ( ! empty( $social_icon_items ) ) { ?>

                    <ul class="person-social-icons">
                      <?php foreach ( $social_icon_items as $item ) { ?>
                        <li>
                          <a href="<?php echo $item['social_icon_link']['url']; ?>">
                            <div class="icon-wrapper">
                              <?php \Elementor\Icons_Manager::render_icon( $item['social_icon'], [ 'class' => 'social-icon' ] ); ?>
                            </div>
                          </a>
                        </li>
                      <?php } ?>
                    </ul>

                  <?php } ?>
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

                <?php if ( $settings['person_biography'] ) { ?>
                  <p <?php echo $this->get_render_attribute_string( 'person_biography' ); ?>>
                    <?php echo $settings['person_biography']; ?>
                  </p>
                <?php } ?>

                <?php 
                $social_icon_items = $settings['social_icon_items'];

                if ( ! empty( $social_icon_items ) ) { ?>

                  <ul class="person-social-icons">
                    <?php foreach ( $social_icon_items as $item ) { ?>
                      <li>
                        <a href="<?php echo $item['social_icon_link']['url']; ?>">
                          <div class="icon-wrapper">
                            <?php \Elementor\Icons_Manager::render_icon( $item['social_icon'], [ 'class' => 'social-icon' ] ); ?>
                          </div>
                        </a>
                      </li>
                    <?php } ?>
                  </ul>

                <?php } ?>
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

                  <?php if ( $settings['person_biography'] ) { ?>
                    <p <?php echo $this->get_render_attribute_string( 'person_biography' ); ?>>
                      <?php echo $settings['person_biography']; ?>
                    </p>
                  <?php } ?>

                  <?php 
                  $social_icon_items = $settings['social_icon_items'];

                  if ( ! empty( $social_icon_items ) ) { ?>

                    <ul class="person-social-icons">
                      <?php foreach ( $social_icon_items as $item ) { ?>
                        <li>
                          <a href="<?php echo $item['social_icon_link']['url']; ?>">
                            <div class="icon-wrapper">
                              <?php \Elementor\Icons_Manager::render_icon( $item['social_icon'], [ 'class' => 'social-icon' ] ); ?>
                            </div>
                          </a>
                        </li>
                      <?php } ?>
                    </ul>

                  <?php } ?>
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