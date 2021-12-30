<?php
/**
 * @package Leverage Extra
 */

function leverage_elementor_is_edit_mode() {

	if ( \Elementor\Plugin::$instance->editor->is_edit_mode() ) {
		return true;
	}
}

function leverage_get_post_types() {

	$leverage_post_types = array(
		'post'      => 'Post',
		'portfolio' => 'Portfolio',
		'page'      => 'Page',
		'product'   => 'Product',
	);

	return $leverage_post_types;
}

function leverage_get_orderby_options() {

	$orderby = array(
		'ID'            => 'Post ID',
		'author'        => 'Post Author',
		'title'         => 'Title',
		'date'          => 'Date',
		'modified'      => 'Last Modified Date',
		'parent'        => 'Parent Id',
		'rand'          => 'Random',
		'comment_count' => 'Comment Count',
		'menu_order'    => 'Menu Order',
	);

	return $orderby;
}

function leverage_get_categories( $post_type ) {

	if ( $post_type === 'portfolio' ) {
		
		$cat_args   = array( 'taxonomy' => 'leverage_portfolio_category' );
		$categories = get_categories( $cat_args );

	} else {
		$categories = get_categories();
	}
	
	foreach ( $categories as $category ) {

		$id = esc_attr( $category->term_id );
		$cat[$id] = esc_html( $category->name );
	}
	
	return $cat;
}

function leverage_get_line_icons() {

	return array(
		'user' => __( 'user', 'leverage-extra' ),
		'people' => __( 'people', 'leverage-extra' ),
		'user-female' => __( 'user-female', 'leverage-extra' ),
		'user-follow' => __( 'user-follow', 'leverage-extra' ),
		'user-following' => __( 'user-following', 'leverage-extra' ),
		'user-unfollow' => __( 'user-unfollow', 'leverage-extra' ),
		'login' => __( 'login', 'leverage-extra' ),
		'logout' => __( 'logout', 'leverage-extra' ),
		'emotsmile' => __( 'emotsmile', 'leverage-extra' ),
		'phone' => __( 'phone', 'leverage-extra' ),
		'call-end' => __( 'call-end', 'leverage-extra' ),
		'call-in' => __( 'call-in', 'leverage-extra' ),
		'call-out' => __( 'call-out', 'leverage-extra' ),
		'map' => __( 'map', 'leverage-extra' ),
		'location-pin' => __( 'location-pin', 'leverage-extra' ),
		'direction' => __( 'direction', 'leverage-extra' ),
		'directions' => __( 'directions', 'leverage-extra' ),
		'compass' => __( 'compass', 'leverage-extra' ),
		'layers' => __( 'layers', 'leverage-extra' ),
		'menu' => __( 'menu', 'leverage-extra' ),
		'list' => __( 'list', 'leverage-extra' ),
		'options-vertical' => __( 'options-vertical', 'leverage-extra' ),
		'options' => __( 'options', 'leverage-extra' ),
		'arrow-down' => __( 'arrow-down', 'leverage-extra' ),
		'arrow-left' => __( 'arrow-left', 'leverage-extra' ),
		'arrow-right' => __( 'arrow-right', 'leverage-extra' ),
		'arrow-up' => __( 'arrow-up', 'leverage-extra' ),
		'arrow-up-circle' => __( 'arrow-up-circle', 'leverage-extra' ),
		'arrow-left-circle' => __( 'arrow-left-circle', 'leverage-extra' ),
		'arrow-right-circle' => __( 'arrow-right-circle', 'leverage-extra' ),
		'arrow-down-circle' => __( 'arrow-down-circle', 'leverage-extra' ),
		'check' => __( 'check', 'leverage-extra' ),
		'clock' => __( 'clock', 'leverage-extra' ),
		'plus' => __( 'plus', 'leverage-extra' ),
		'minus' => __( 'minus', 'leverage-extra' ),
		'close' => __( 'close', 'leverage-extra' ),
		'event' => __( 'event', 'leverage-extra' ),
		'exclamation' => __( 'exclamation', 'leverage-extra' ),
		'organization' => __( 'organization', 'leverage-extra' ),
		'trophy' => __( 'trophy', 'leverage-extra' ),
		'screen-smartphone' => __( 'screen-smartphone', 'leverage-extra' ),
		'screen-desktop' => __( 'screen-desktop', 'leverage-extra' ),
		'plane' => __( 'plane', 'leverage-extra' ),
		'notebook' => __( 'notebook', 'leverage-extra' ),
		'mustache' => __( 'mustache', 'leverage-extra' ),
		'mouse' => __( 'mouse', 'leverage-extra' ),
		'magnet' => __( 'magnet', 'leverage-extra' ),
		'energy' => __( 'energy', 'leverage-extra' ),
		'disc' => __( 'disc', 'leverage-extra' ),
		'cursor' => __( 'cursor', 'leverage-extra' ),
		'cursor-move' => __( 'cursor-move', 'leverage-extra' ),
		'crop' => __( 'crop', 'leverage-extra' ),
		'chemistry' => __( 'chemistry', 'leverage-extra' ),
		'speedometer' => __( 'speedometer', 'leverage-extra' ),
		'shield' => __( 'shield', 'leverage-extra' ),
		'screen-tablet' => __( 'screen-tablet', 'leverage-extra' ),
		'magic-wand' => __( 'magic-wand', 'leverage-extra' ),
		'hourglass' => __( 'hourglass', 'leverage-extra' ),
		'graduation' => __( 'graduation', 'leverage-extra' ),
		'ghost' => __( 'ghost', 'leverage-extra' ),
		'game-controller' => __( 'game-controller', 'leverage-extra' ),
		'fire' => __( 'fire', 'leverage-extra' ),
		'eyeglass' => __( 'eyeglass', 'leverage-extra' ),
		'envelope-open' => __( 'envelope-open', 'leverage-extra' ),
		'envelope-letter' => __( 'envelope-letter', 'leverage-extra' ),
		'bell' => __( 'bell', 'leverage-extra' ),
		'badge' => __( 'badge', 'leverage-extra' ),
		'anchor' => __( 'anchor', 'leverage-extra' ),
		'wallet' => __( 'wallet', 'leverage-extra' ),
		'vector' => __( 'vector', 'leverage-extra' ),
		'speech' => __( 'speech', 'leverage-extra' ),
		'puzzle' => __( 'puzzle', 'leverage-extra' ),
		'printer' => __( 'printer', 'leverage-extra' ),
		'present' => __( 'present', 'leverage-extra' ),
		'playlist' => __( 'playlist', 'leverage-extra' ),
		'pin' => __( 'pin', 'leverage-extra' ),
		'picture' => __( 'picture', 'leverage-extra' ),
		'handbag' => __( 'handbag', 'leverage-extra' ),
		'globe-alt' => __( 'globe-alt', 'leverage-extra' ),
		'globe' => __( 'globe', 'leverage-extra' ),
		'folder-alt' => __( 'folder-alt', 'leverage-extra' ),
		'folder' => __( 'folder', 'leverage-extra' ),
		'film' => __( 'film', 'leverage-extra' ),
		'feed' => __( 'feed', 'leverage-extra' ),
		'drop' => __( 'drop', 'leverage-extra' ),
		'drawer' => __( 'drawer', 'leverage-extra' ),
		'docs' => __( 'docs', 'leverage-extra' ),
		'doc' => __( 'doc', 'leverage-extra' ),
		'diamond' => __( 'diamond', 'leverage-extra' ),
		'cup' => __( 'cup', 'leverage-extra' ),
		'calculator' => __( 'calculator', 'leverage-extra' ),
		'bubbles' => __( 'bubbles', 'leverage-extra' ),
		'briefcase' => __( 'briefcase', 'leverage-extra' ),
		'book-open' => __( 'book-open', 'leverage-extra' ),
		'basket-loaded' => __( 'basket-loaded', 'leverage-extra' ),
		'basket' => __( 'basket', 'leverage-extra' ),
		'bag' => __( 'bag', 'leverage-extra' ),
		'action-undo' => __( 'action-undo', 'leverage-extra' ),
		'action-redo' => __( 'action-redo', 'leverage-extra' ),
		'wrench' => __( 'wrench', 'leverage-extra' ),
		'umbrella' => __( 'umbrella', 'leverage-extra' ),
		'trash' => __( 'trash', 'leverage-extra' ),
		'tag' => __( 'tag', 'leverage-extra' ),
		'support' => __( 'support', 'leverage-extra' ),
		'frame' => __( 'frame', 'leverage-extra' ),
		'size-fullscreen' => __( 'size-fullscreen', 'leverage-extra' ),
		'size-actual' => __( 'size-actual', 'leverage-extra' ),
		'shuffle' => __( 'shuffle', 'leverage-extra' ),
		'share-alt' => __( 'share-alt', 'leverage-extra' ),
		'share' => __( 'share', 'leverage-extra' ),
		'rocket' => __( 'rocket', 'leverage-extra' ),
		'question' => __( 'question', 'leverage-extra' ),
		'pie-chart' => __( 'pie-chart', 'leverage-extra' ),
		'pencil' => __( 'pencil', 'leverage-extra' ),
		'note' => __( 'note', 'leverage-extra' ),
		'loop' => __( 'loop', 'leverage-extra' ),
		'home' => __( 'home', 'leverage-extra' ),
		'grid' => __( 'grid', 'leverage-extra' ),
		'graph' => __( 'graph', 'leverage-extra' ),
		'microphone' => __( 'microphone', 'leverage-extra' ),
		'music-tone-alt' => __( 'music-tone-alt', 'leverage-extra' ),
		'music-tone' => __( 'music-tone', 'leverage-extra' ),
		'earphones-alt' => __( 'earphones-alt', 'leverage-extra' ),
		'earphones' => __( 'earphones', 'leverage-extra' ),
		'equalizer' => __( 'equalizer', 'leverage-extra' ),
		'like' => __( 'like', 'leverage-extra' ),
		'dislike' => __( 'dislike', 'leverage-extra' ),
		'control-start' => __( 'control-start', 'leverage-extra' ),
		'control-rewind' => __( 'control-rewind', 'leverage-extra' ),
		'control-play' => __( 'control-play', 'leverage-extra' ),
		'control-pause' => __( 'control-pause', 'leverage-extra' ),
		'control-forward' => __( 'control-forward', 'leverage-extra' ),
		'control-end' => __( 'control-end', 'leverage-extra' ),
		'volume-1' => __( 'volume-1', 'leverage-extra' ),
		'volume-2' => __( 'volume-2', 'leverage-extra' ),
		'volume-off' => __( 'volume-off', 'leverage-extra' ),
		'calendar' => __( 'calendar', 'leverage-extra' ),
		'bulb' => __( 'bulb', 'leverage-extra' ),
		'chart' => __( 'chart', 'leverage-extra' ),
		'ban' => __( 'ban', 'leverage-extra' ),
		'bubble' => __( 'bubble', 'leverage-extra' ),
		'camrecorder' => __( 'camrecorder', 'leverage-extra' ),
		'camera' => __( 'camera', 'leverage-extra' ),
		'cloud-download' => __( 'cloud-download', 'leverage-extra' ),
		'cloud-upload' => __( 'cloud-upload', 'leverage-extra' ),
		'envelope' => __( 'envelope', 'leverage-extra' ),
		'eye' => __( 'eye', 'leverage-extra' ),
		'flag' => __( 'flag', 'leverage-extra' ),
		'heart' => __( 'heart', 'leverage-extra' ),
		'info' => __( 'info', 'leverage-extra' ),
		'key' => __( 'key', 'leverage-extra' ),
		'link' => __( 'link', 'leverage-extra' ),
		'lock' => __( 'lock', 'leverage-extra' ),
		'lock-open' => __( 'lock-open', 'leverage-extra' ),
		'magnifier' => __( 'magnifier', 'leverage-extra' ),
		'magnifier-add' => __( 'magnifier-add', 'leverage-extra' ),
		'magnifier-remove' => __( 'magnifier-remove', 'leverage-extra' ),
		'paper-clip' => __( 'paper-clip', 'leverage-extra' ),
		'paper-plane' => __( 'paper-plane', 'leverage-extra' ),
		'power' => __( 'power', 'leverage-extra' ),
		'refresh' => __( 'refresh', 'leverage-extra' ),
		'reload' => __( 'reload', 'leverage-extra' ),
		'settings' => __( 'settings', 'leverage-extra' ),
		'star' => __( 'star', 'leverage-extra' ),
		'symbol-female' => __( 'symbol-female', 'leverage-extra' ),
		'symbol-male' => __( 'symbol-male', 'leverage-extra' ),
		'target' => __( 'target', 'leverage-extra' ),
		'credit-card' => __( 'credit-card', 'leverage-extra' ),
		'paypal' => __( 'paypal', 'leverage-extra' ),
		'social-tumblr' => __( 'social-tumblr', 'leverage-extra' ),
		'social-twitter' => __( 'social-twitter', 'leverage-extra' ),
		'social-facebook' => __( 'social-facebook', 'leverage-extra' ),
		'social-instagram' => __( 'social-instagram', 'leverage-extra' ),
		'social-linkedin' => __( 'social-linkedin', 'leverage-extra' ),
		'social-pinterest' => __( 'social-pinterest', 'leverage-extra' ),
		'social-github' => __( 'social-github', 'leverage-extra' ),
		'social-google' => __( 'social-google', 'leverage-extra' ),
		'social-reddit' => __( 'social-reddit', 'leverage-extra' ),
		'social-skype' => __( 'social-skype', 'leverage-extra' ),
		'social-dribbble' => __( 'social-dribbble', 'leverage-extra' ),
		'social-behance' => __( 'social-behance', 'leverage-extra' ),
		'social-foursqare' => __( 'social-foursqare', 'leverage-extra' ),
		'social-soundcloud' => __( 'social-soundcloud', 'leverage-extra' ),
		'social-spotify' => __( 'social-spotify', 'leverage-extra' ),
		'social-stumbleupon' => __( 'social-stumbleupon', 'leverage-extra' ),
		'social-youtube' => __( 'social-youtube', 'leverage-extra' ),
		'social-dropbox' => __( 'social-dropbox', 'leverage-extra' ),
		'social-vkontakte' => __( 'social-vkontakte', 'leverage-extra' ),
		'social-steam' => __( 'social-steam', 'leverage-extra' ),
	);
}

function display_image( $settings ) { 

	if ( $settings['image_type'] === 'library' ) {
		$image_url = $settings['image']['url'];
	
	} elseif ( $settings['image_type'] === 'external' ) {
		$image_url = $settings['external_image_url'];

	}  else {
		$image_url = null;
	} 

	$image_vertical_position = isset( $settings['image_vertical_position'] ) ? $settings['image_vertical_position'] : '';
	$heading                 = isset( $settings['heading'] ) ? $settings['heading'] : '';
	$target_type             = isset( $settings['target_type'] ) ? $settings['target_type'] : '';

	?>
	<div class="image-wrapper to-<?php echo esc_attr( $image_vertical_position ); ?> <?php echo ( esc_attr( $heading ) ) ? '' : 'm-0' ?>">
		<?php
		if ( $image_url ) {

			if ( $target_type == 'link' ) {
				$target = $settings['target_link']['is_external'] ? ' target="_blank"' : '';
				$nofollow = $settings['target_link']['nofollow'] ? ' rel="nofollow"' : '';
				?>
				<a href="<?php echo $settings['target_link']['url']; ?>" <?php echo $target; echo $nofollow; ?>>
					<img src="<?php echo $image_url; ?>" alt="<?php echo esc_attr( $heading ); ?>">
				</a>
			<?php 
			} elseif ( $target_type == 'image' ) { ?>
				<div class="gallery">
					<a href="<?php echo $image_url; ?>">
						<img src="<?php echo $image_url; ?>" alt="<?php echo esc_attr( $heading ); ?>">
					</a>
				</div>
			<?php 
			} else { ?>
				<img src="<?php echo $image_url; ?>" alt="<?php echo esc_attr( $heading ); ?>">
			<?php 
			}
		} ?>
	</div>
<?php }