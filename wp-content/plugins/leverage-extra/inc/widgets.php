<?php
/**
 * @package Leverage Extra
 */

class Leverage_Widget extends WP_Widget {
 
    function __construct() {
 
        parent::__construct(
            'leverage-widget',
            'Leverage Widget'
        );
 
        add_action( 'widgets_init', function() {
            register_widget( 'Leverage_Widget' );
        } );
 
    }

    public $args = array(
		'widget_id' => '%1$s'
    );
 
    public function widget( $args, $instance) {
 
        if ( function_exists( 'ACF' ) ) {
            if ( have_rows( 'widgets', 'option' ) ) { 
                
                if ( isset( $args['widget_id'] ) ) {
                    $widget_id = $args['widget_id'];

                } else {
                    $widget_id = null;
                }
                
                ?>

            <div id="<?php echo esc_attr( $widget_id ); ?>" class="item widget-<?php echo esc_attr( $instance['widget'] ); ?>">
            
                <?php
                while( have_rows( 'widgets', 'option' ) ) {
                    the_row();

                    if ( get_row_layout() == 'carousel' && $instance['widget'] == 'carousel' ) { ?>

                        <div class="item widget-carousel">
                        <div class="swiper-container mid-slider-simple items" data-perview="1">
                        <div class="swiper-wrapper">

                        <?php
                        $items = get_sub_field( 'item' );
                        
                        if ( $items ) {
                            foreach( $items as $item ) {
                                
                                $target = $item['target'];

                                switch ( $target ) {
                                    case 'Anchor Link':
                                        $url = $item['url'];
                                    break;
                            
                                    case 'Internal Link':
                                        $url = $item['url'];
                                    break;
                            
                                    case 'External Link':
                                        $url = $item['url'];
                                    break;
                            
                                    case 'Inner Page':
                                        $url = $item['page'];
                                    break;
                            
                                    case 'Inner Post';
                                        $url = $item['post'];
                                    break;
                            
                                    case 'No Link';
                                        $url = null;
                                    break;
                                }

								?>

                                <div class="swiper-slide slide-center text-center item">

                                    <?php if ( $url == null ) : ?>
                                    
                                    <div class="row card">

                                    <?php else : ?>

                                    <a href="<?php echo esc_url( $url ); ?>" <?php if ( $item['target'] == 'External Link' ) { echo esc_attr( 'target="_blank"' ); } ?> class="row card <?php if ( $item['target'] == 'Anchor Link' ) { echo esc_attr( 'smooth-anchor' ); } ?>">

                                    <?php endif; ?>

                                        <div class="col-12">

                                            <?php if ( $item['icon_style'] == 'Line Icon' && $item['icon'] ) : ?>
                                            <i class="icon icon-<?php echo esc_attr( $item['icon'] ); ?>"></i>
                                            <?php elseif ( $item['icon_style'] == 'Awesome Icon' && $item['icon_fa'] ) : ?>
                                            <i class="icon <?php echo esc_attr( $item['icon_fa'] ); ?>"></i>
                                            <?php elseif ( $item['icon_style'] == 'Image Icon' && $item['icon_img'] ) : ?>
                                            <img src="<?php echo esc_url( $item['icon_img'] ); ?>" class="icon" alt="item" />
                                            <?php endif; ?>

                                            <?php echo $item['text']; ?>
                                        </div>

                                    <?php if ( $url == null ) : ?>
                                    
                                    </div>

                                    <?php else : ?>

                                    </a>

                                    <?php endif; ?>
                                </div>                   

                            <?php
                            }
                        } ?>

                        </div>
                        <div class="swiper-pagination"></div>
                        </div>
                        </div>
                    <?php
                    }

                    elseif ( get_row_layout() == 'services' && $instance['widget'] == 'services' ) { ?>

                        <ul class="list-group list-group-flush widget-services">

                        <?php
                        $items = get_sub_field( 'item' );
                        
                        if ( $items ) {
                            foreach( $items as $item ) {
                                
                                $target = $item['target'];

                                switch ( $target ) {
                                    case 'Anchor Link':
                                        $url = $item['url'];
                                    break;
                            
                                    case 'Internal Link':
                                        $url = $item['url'];
                                    break;
                            
                                    case 'External Link':
                                        $url = $item['url'];
                                    break;
                            
                                    case 'Inner Page':
                                        $url = $item['page'];
                                    break;
                            
                                    case 'Inner Post';
                                        $url = $item['post'];
                                    break;
                                }

								?>
                        
                                <li class="list-group-item">
                                    <a href="<?php echo esc_url( $url ); ?>" <?php if ( $item['target'] == 'External Link' ) { echo esc_attr( 'target="_blank"' ); } ?> class="<?php if ( $item['target'] == 'Anchor Link' ) { echo esc_attr( 'smooth-anchor' ); } ?>">

                                        <?php if ( $item['icon_style'] == 'Line Icon' && $item['icon'] ) : ?>
                                        <i class="icon icon-<?php echo esc_attr( $item['icon'] ); ?>"></i>
                                        <?php elseif ( $item['icon_style'] == 'Awesome Icon' && $item['icon_fa'] ) : ?>
                                        <i class="icon <?php echo esc_attr( $item['icon_fa'] ); ?>"></i>
                                        <?php elseif ( $item['icon_style'] == 'Image Icon' && $item['icon_img'] ) : ?>
                                        <img src="<?php echo esc_url( $item['icon_img'] ); ?>" class="icon" alt="<?php echo esc_attr( $item['title'] ); ?>" />
                                        <?php endif; ?>

                                        <h4><?php echo esc_html( $item['title'] ); ?></h4>
                                    </a>
                                </li>

                            <?php
                            }
                        } ?>

                        </ul>
                    <?php
                    }

                    elseif ( get_row_layout() == 'social_networks' && $instance['widget'] == 'social_networks' ) { ?>

                        <h4><?php the_sub_field( 'title' ); ?></h4>

                        <ul class="navbar-nav social share-list">
                        
                        <?php
                        $items = get_sub_field( 'item' );
                        
                        if ( $items ) {
                            foreach( $items as $item ) {

                                if ( $item['acf_fc_layout'] == 'custom' ) :
                                    if ( $item['icon_style'] == 'Line Icon' ) :
                                        $item_icon = 'icon-' . $item['icon'];

                                    elseif ( $item['icon_style'] == 'Awesome Icon' ) :
                                        $item_icon = $item['icon_fa'];

                                    endif;

                                else :
                                    $item_icon = 'icon-social-' . $item['acf_fc_layout']; 

                                endif; ?>

                                <li class="nav-item">
                                    <a href="<?php echo esc_url( $item['url'] ); ?>" target="_blank" class="nav-link">
                                        <i class="<?php echo esc_attr( $item_icon ); ?>"></i>
                                    </a>
                                </li>

                            <?php
                            }
                        } ?>
                        </ul>
                    <?php
                    }

                    elseif ( get_row_layout() == 'author' && $instance['widget'] == 'author' ) { ?>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">

                                <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" class="author">
                                    <?php 
                                    if ( get_avatar( get_the_author_meta( 'ID' ) ) ) {
                                        echo get_avatar( get_the_author_meta( 'ID' ) );
                                    } ?>
                                    <h4 class="title"><?php echo get_sub_field( 'pre_title' ) . ' ' . get_the_author_meta( 'display_name' ); ?></h4>
                                </a>

                                <?php if ( get_the_author_meta( 'description' ) ) : ?>
                                <p class="biography"><?php echo get_the_author_meta( 'description' ); ?></p>
                                <?php endif; ?>

                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span class="d-lg-flex align-items-center">
                                    <i class="icon-clock mr-2"></i>
                                    <?php echo leverage_time_ago(); ?>
                                </span>
                            </li>
                        </ul>
                    <?php
                    }
                } ?>

            </div>

            <?php
            }
        }
    }
 
    public function form( $instance ) {
 		
        $widget = ! empty( $instance['widget'] ) ? $instance['widget'] : esc_html__( '', 'leverage-extra' ); 
        
        if ( function_exists( 'ACF' ) ) {
            if ( have_rows( 'widgets', 'option' ) ) { ?>

                <p style="display: flex; justify-content: space-between">
                <label for="<?php echo esc_attr( $this->get_field_id( 'Widget' ) ); ?>">
                    <?php echo esc_html__( 'Select an Option', 'leverage-extra' ); ?>
                </label>
                <a href="admin.php?page=theme-settings-widget"><?php echo esc_html__( 'Add New', 'leverage-extra' ); ?></a>
                </p>

                <p>
                <select name="<?php echo esc_attr( $this->get_field_name( 'widget' ) ); ?>" class="widefat">

                <?php
                while( have_rows( 'widgets', 'option' ) ) {
                    the_row();

                    if ( get_row_layout() == 'carousel' ) { ?>
                        <option value="carousel" <?php if ( $widget == 'carousel' ) { echo 'selected'; } ?>><?php echo esc_html__( 'Carousel', 'leverage-extra' ); ?></option>
                    <?php
                    }

                    elseif ( get_row_layout() == 'services' ) { ?>
                        <option value="services" <?php if ( $widget == 'services' ) { echo 'selected'; } ?>><?php echo esc_html__( 'Services', 'leverage-extra' ); ?></option>
                    <?php
                    }

                    elseif ( get_row_layout() == 'social_networks' ) { ?>
                        <option value="social_networks" <?php if ( $widget == 'social_networks' ) { echo 'selected'; } ?>><?php echo esc_html__( 'Social Networks', 'leverage-extra' ); ?></option>
                    <?php
                    }

                    elseif ( get_row_layout() == 'author' ) { ?>
                        <option value="author" <?php if ( $widget == 'author' ) { echo 'selected'; } ?>><?php echo esc_html__( 'Author', 'leverage-extra' ); ?></option>
                    <?php
                    }
                } ?>

                </select>
                </p>

            <?php    
            }
        }
    }
 
    public function update( $new_instance, $old_instance ) { 
        
        $instance = array();		
        $instance['widget'] = ( !empty( $new_instance['widget'] ) ) ? $new_instance['widget'] : ''; 

        return $instance;
    }
}

$Leverage_Widget = new Leverage_Widget();