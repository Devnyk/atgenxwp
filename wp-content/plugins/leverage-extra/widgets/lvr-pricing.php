<?php
/**
 * @package Leverage Extra
 */

namespace LVR\Widgets;

use Elementor\Widget_Base;

class LVR_Pricing extends Widget_Base {

  public function get_name() {
    return 'leverage-pricing';
  }

  public function get_title() {
    return __( 'Pricing', 'leverage-extra' );
  }

  public function get_icon() {
    return 'eicon-price-table';
  }

  public function get_categories() {
    return [ 'leverage_category' ];
  }

  protected function _register_controls() {

    // Content
    // add_sale_tag_content_control( $this );
    add_icon_content_control( $this );
    add_heading_content_control( $this );
    add_price_content_control( $this );
    add_paragraph_content_control( $this );
    add_check_list_content_control( $this );
    add_feature_content_control( $this );
    add_action_content_control( $this );

    // Style
    add_block_style_control( $this, '.card' );
		// add_paragraph_style_control( $this, 'sale_tag', 'Sale Tag', null, null, '.badge' );
    add_icon_style_control( $this, 'icon', 'Icon', '', '.icon-wrapper', '.card-icon' );
    add_heading_style_control( $this, 'heading', 'Heading', null, null, '.heading' );
		add_paragraph_style_control( $this, 'price', 'Price', null, null, '.price' );
		add_paragraph_style_control( $this, 'paragraph', 'Paragraph', null, null, '.paragraph' );
		add_list_style_control( $this, 'list_item', 'List Item', null, null, '.list-item' );
		add_paragraph_style_control( $this, 'list_text', 'List Text', null, null, '.list-text' );
    add_icon_style_control( $this, 'list_icon', 'List Icon', '', '.list-icon-wrapper', '.list-icon' );
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
    
    // $this->add_render_attribute( 'sale_tag_text', 'class', 'badge' );
    $this->add_render_attribute( 'heading', 'class', 'heading' );
    $this->add_render_attribute( 'price', 'class', 'price' );
    $this->add_render_attribute( 'paragraph', 'class', 'paragraph' );
		?>

    <div class="plans">
      <div class="items">
        <div class="item">
          <div class="card<?php echo $settings['display_feature'] ? ' featured to-' . $settings['feature_vertical_position'] . '-' . $settings['feature_horizontal_position'] : '' ?>">
          
            <div class="icon-wrapper <?php echo $settings['icon_position']; ?>">
              <?php
              if ( $settings['icon_type'] == 'fa' ) {
                \Elementor\Icons_Manager::render_icon( $settings['icon_fa'], [ 'class' => 'card-icon' ] );

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

            <div class="price-wrapper text-<?php echo $settings['price_alingment']; ?>">
              <span <?php echo $this->get_render_attribute_string( 'price' ); ?>>
                <?php echo $settings['price']; ?>
              </span>
            </div>

            <ul class="list-group list-group-flush">

              <?php foreach ( $settings['check_list_items'] as $item ) { ?>

                <li class="list-item list-group-item d-flex justify-content-between align-items-center text-left">
                  <span class="list-text"><?php echo $item['text']; ?></span>
                  <div class="list-icon-wrapper">
                    <?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'class' => 'list-icon icon-min m-0 text-right' ] ) ?>
                  </div>
                </li>
              
              <?php } ?>

            </ul>

            <?php 
            if ( isset( $settings['action_link'] ) ) {
              $target = $settings['action_link']['is_external'] ? ' target="_blank"' : '';
              $nofollow = $settings['action_link']['nofollow'] ? ' rel="nofollow"' : '';
            } ?>

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