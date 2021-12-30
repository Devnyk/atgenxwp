<?php
/**
 * @package Leverage Extra
 */

namespace LVR\Widgets;

use Elementor\Widget_Base;

class LVR_Gallery extends Widget_Base {

  public function get_name() {
    return 'leverage-gallery';
  }

  public function get_title() {
    return __( 'Gallery', 'leverage-extra' );
  }

  public function get_icon() {
    return 'eicon-photo-library';
  }

  public function get_categories() {
    return [ 'leverage_category' ];
  }

  protected function _register_controls() {

		// Content
		add_image_gallery_content_control( $this );

		// Style
		add_image_style_control( $this, '.item', '.fit-image' );
    add_play_icon_style_control( $this, '.item-featured', '.icon.auto' );
  }

  protected function render() {

		$settings = $this->get_settings_for_display();
		?>

		<div class="gallery gallery row justify-content-center items">

			<?php foreach ( $settings['gallery'] as $image ) {
				
				switch ( $settings['columns']['size'] ) {

					case '1': $columns = 'col-12'; break;
					case '2': $columns = 'col-12 col-sm-6'; break;
					case '3': $columns = 'col-12 col-sm-6 col-md-6 col-lg-4'; break;
					case '4': $columns = 'col-12 col-sm-6 col-md-4 col-lg-3'; break;
					case '5': $columns = 'col-12 col-sm-6 col-md-4 col-lg-3'; break;
					case '6': $columns = 'col-12 col-sm-6 col-md-3 col-lg-2'; break;

					default: $columns = 'col-12 col-sm-6 col-md-6 col-lg-4';
				}
				
				?>

				<a href="<?php echo $image['url']; ?>" class="item <?php echo esc_attr( $columns ); ?>">
					<img src="<?php echo $image['url']; ?>" alt="" class="fit-image">
				</a>

			<?php } ?>

			<?php
			$video_items = $settings['video_items'];

			if ( is_array( $video_items ) ) {

				foreach ( $video_items as $video ) {
					
					switch ( $settings['columns']['size'] ) {

						case '1': $columns = 'col-12'; break;
						case '2': $columns = 'col-12 col-sm-6'; break;
						case '3': $columns = 'col-12 col-sm-6 col-md-6 col-lg-4'; break;
						case '4': $columns = 'col-12 col-sm-6 col-md-4 col-lg-3'; break;
						case '5': $columns = 'col-12 col-sm-6 col-md-4 col-lg-3'; break;
						case '6': $columns = 'col-12 col-sm-6 col-md-3 col-lg-2'; break;

						default: $columns = 'col-12 col-sm-6 col-md-6 col-lg-4';
					}
					
					?>

					<a href="<?php echo $video['video_url']; ?>" class="item item-featured square-image d-flex justify-content-center align-items-center <?php echo esc_attr( $columns ); ?>">
						<i class="icon auto icon-control-play"></i>
						<img src="<?php echo $video['image_overlay']['url']; ?>" class="fit-image" alt="<?php echo $video['video_title']; ?>">
					</a>

				<?php }
			} ?>

		</div> 

	<?php }
}