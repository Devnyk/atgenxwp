<?php
/**
 * @package Leverage Extra
 */

namespace LVR\Widgets;

use Elementor\Widget_Base;

class LVR_Video extends Widget_Base {

  public function get_name() {
    return 'leverage-video';
  }

  public function get_title() {
    return __( 'Video', 'leverage-extra' );
  }

  public function get_icon() {
    return 'eicon-youtube';
  }

  public function get_categories() {
    return [ 'leverage_category' ];
  }

  protected function _register_controls() {

    // Content
    add_video_content_control( $this );
    add_image_overlay_content_control( $this );
    add_feature_content_control( $this );

    // Style
    add_image_overlay_style_control( $this, '.item-featured', '.fit-image' );
    add_play_icon_style_control( $this, '.item-featured', '.icon.auto' );
    add_feature_style_control( $this, '.item-featured:before' );
  }

  protected function render() {

    $settings = $this->get_settings_for_display();
    ?>

    <div class="gallery display-<?php echo $settings['display_feature']; ?>">
      <a href="<?php echo $settings['video_url']; ?>" class="item-featured to-<?php echo $settings['feature_vertical_position']; ?>-<?php echo $settings['feature_horizontal_position']; ?> square-image d-flex justify-content-center align-items-center">
        <i class="icon auto icon-control-play"></i>
        <img src="<?php echo $settings['image_overlay']['url']; ?>" class="fit-image" alt="<?php echo $settings['video_title']; ?>">
      </a>
    </div>

  <?php }

  protected function content_template() { ?>

		<div class="gallery display-{{{ settings.display_feature }}}">
			<a href="{{{ settings.video_url }}}" class="item-featured image-wrapper to-{{{ settings.feature_vertical_position }}}-{{{ settings.feature_horizontal_position }}} square-image d-flex justify-content-center align-items-center">
				<i class="icon auto icon-control-play"></i>
				<img src="{{{ settings.image_overlay.url }}}" class="fit-image" alt="{{{ settings.video_title }}}">
			</a>
		</div>

  <?php
  }
}