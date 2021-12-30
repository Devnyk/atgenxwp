<?php
/**
 * @package Leverage Extra
 */

namespace LVR\Widgets;

use Elementor\Widget_Base;

class LVR_Heading extends Widget_Base {

  public function get_name() {
    return 'leverage-heading';
  }

  public function get_title() {
    return __( 'Heading', 'leverage-extra' );
  }

  public function get_icon() {
    return 'eicon-heading';
  }

  public function get_categories() {
    return [ 'leverage_category' ];
  }

  protected function _register_controls() {

    // Content
    add_heading_content_control( $this, true );

    // Style
    add_heading_style_control( $this, 'heading', 'Heading', null, null, '.heading' );
    add_horizontal_line_style_control( $this, '.heading:before' );
  }

  protected function render() {

    $settings = $this->get_settings_for_display();

    if ( $settings['display_top_line'] ) {
      $this->add_render_attribute( 'heading', 'class', 'heading featured' );

    } else {
      $this->add_render_attribute( 'heading', 'class', 'heading' );
    }

    $this->add_inline_editing_attributes( 'heading', 'basic' );
    ?>

    <div class="text-<?php echo $settings['heading_alingment']; ?>">
      <<?php echo $settings['html_tag']; ?> <?php echo $this->get_render_attribute_string( 'heading' ); ?>>
        <?php echo $settings['heading']; ?>
      </<?php echo $settings['html_tag']; ?>>
    </div>

  <?php }

  protected function content_template() { ?>
  
    <#
      if ( settings.display_top_line ) {
        view.addRenderAttribute( { heading: { class: 'heading featured' } } );

      } else {
        view.addRenderAttribute( { heading: { class: 'heading' } } );
      }

      view.addInlineEditingAttributes( 'heading', 'basic' );
    #>

    <div class="text-{{{ settings.heading_alingment }}}">
      <{{{ settings.html_tag }}} {{{ view.getRenderAttributeString( 'heading' ) }}}>
        {{{ settings.heading }}}
      </{{{ settings.html_tag }}}>
    </div>

  <?php
  }
}