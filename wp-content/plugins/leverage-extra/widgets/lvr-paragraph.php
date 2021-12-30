<?php
/**
 * @package Leverage Extra
 */

namespace LVR\Widgets;

use Elementor\Widget_Base;

class LVR_Paragraph extends Widget_Base {

  public function get_name() {
    return 'leverage-paragraph';
  }

  public function get_title() {
    return __( 'Paragraph', 'leverage-extra' );
  }

  public function get_icon() {
    return 'eicon-text';
  }

  public function get_categories() {
    return [ 'leverage_category' ];
  }

  protected function _register_controls() {

    // Content
    add_paragraph_content_control( $this );

    // Style
		add_paragraph_style_control( $this, 'paragraph', 'Paragraph', null, null, '.paragraph' );
  }

  protected function render() {

    $settings = $this->get_settings_for_display();

    $this->add_render_attribute( 'paragraph', 'class', 'paragraph' );
    $this->add_inline_editing_attributes( 'paragraph', 'basic' );
    ?>

    <div class="text-<?php echo $settings['paragraph_alingment']; ?>">
      <p <?php echo $this->get_render_attribute_string( 'paragraph' ); ?>>
        <?php echo $settings['paragraph']; ?>
      </p>
    </div>

  <?php }

  protected function content_template() { ?>

    <#
      view.addRenderAttribute( { paragraph: { class: 'paragraph' } } );
      view.addInlineEditingAttributes( 'paragraph', 'basic' );
    #>

    <div class="text-{{ settings.paragraph_alingment }}">
      <p {{{ view.getRenderAttributeString( 'paragraph' ) }}}>
        {{{ settings.paragraph }}}
      </p>
    </div>

  <?php
  }
}