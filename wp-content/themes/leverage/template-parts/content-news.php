<?php
/**
 * @package Leverage
 */

$news_post_type             = 'post';
$news_post_category_id      = 'all';

$news_enable_dark_mode      = false;
$news_enable_separator_line = false;
$news_background_color      = false;

if ( get_field( 'news_enable_dark_mode', 'option' ) ) {
	$suggested_color = '#111111';
} else {
	$suggested_color = '#F5F5F5';
}

if ( get_field( 'override_general_settings' ) ) {

    if ( get_field( 'news_post_type' ) ) {
        $news_post_type = get_field( 'news_post_type' );

    } else {
        
        if ( get_field( 'news_post_type', 'option' ) ) {
            $news_post_type = get_field( 'news_post_type', 'option' );
        } else {
            $news_post_type = 'post';
        }
    }

    if ( $news_post_type == 'post' ) {

        if ( get_field( 'news_post_category' ) ) {
            $news_post_category_id = get_field( 'news_post_category' );
    
        } else {
            
            if ( get_field( 'news_post_category', 'option' ) ) {
                $news_post_category_id = get_field( 'news_post_category', 'option' );
            } else {
                $news_post_category_id = 'all';
            }
        }

    } else {

        if ( get_field( 'news_portfolio_category' ) ) {
            $news_post_category_id = get_field( 'news_portfolio_category' );
    
        } else {
            
            if ( get_field( 'news_portfolio_category', 'option' ) ) {
                $news_post_category_id = get_field( 'news_portfolio_category', 'option' );
            } else {
                $news_post_category_id = 'all';
            }
        }

    }

    if ( get_field( 'news_background_color' ) ) {
        $news_background_color = get_field( 'news_background_color' );

    } else {
        
        if ( get_field( 'news_background_color', 'option' ) ) {
            $news_background_color = get_field( 'news_background_color', 'option' );
        } else {
            $news_background_color = $suggested_color;
        }
    }

    $news_enable_dark_mode      = get_field( 'news_enable_dark_mode' );
    $news_enable_separator_line = get_field( 'news_enable_separator_line' );

} else {

    if ( get_field( 'news_post_type', 'option' ) ) {
        $news_post_type = get_field( 'news_post_type', 'option' );
    } else {
        $news_post_type = 'post';
    }

    if ( $news_post_type == 'post' ) {
            
        if ( get_field( 'news_post_category', 'option' ) ) {
            $news_post_category_id = get_field( 'news_post_category', 'option' );
        } else {
            $news_post_category_id = 'all';
        }

    } else {

        if ( get_field( 'news_portfolio_category', 'option' ) ) {
            $news_post_category_id = get_field( 'news_portfolio_category', 'option' );
        } else {
            $news_post_category_id = 'all';
        }
    }
    
    if ( get_field( 'news_background_color', 'option' ) ) {
        $news_background_color = get_field( 'news_background_color', 'option' );
    } else {
        $news_background_color = $suggested_color;
    }

    $news_enable_dark_mode      = get_field( 'news_enable_dark_mode', 'option' );
    $news_enable_separator_line = get_field( 'news_enable_separator_line', 'option' );
} 

$blog_layout = get_field( 'blog_layout', 'option' );

if ( ! $blog_layout ) {

    $blog_layout = array(
        'disable_excerpt' => false,
        'disable_author'  => false,
        'disable_date'    => false
    );
}

if ( get_field( 'news_custom_id', 'option' ) ) {
    $news_id = get_field( 'news_custom_id', 'option' );

} else {
    $news_id = 'news';
}

if ( get_field( 'news_custom_class', 'option' ) ) {
    $news_class = get_field( 'news_custom_class', 'option' );

} else {
    $news_class = '';
}

if ( get_field( 'news_carousel_layout', 'option' ) ) {
    $news_carousel_layout = get_field( 'news_carousel_layout', 'option' );
} else {
    $news_carousel_layout = 'mid-slider';
}

if ( get_field( 'news_columns', 'option' ) ) {
    $news_columns = get_field( 'news_columns', 'option' );
} else {
    $news_columns = '3';
}

if ( get_field( 'news_autoplay', 'option' ) ) {
    $news_autoplay = get_field( 'news_autoplay', 'option' );
} else {
    $news_autoplay = false;
}

$news_vs  = 'section-vs-' . get_field( 'news_vertical_spacing', 'option' );
$news_vsr = 'section-vsr-' . get_field( 'news_vertical_spacing_responsive', 'option' );
?>

<section id="<?php echo esc_attr( $news_id ); ?>" class="news <?php echo esc_attr( $news_class ); ?> <?php echo esc_attr( $news_vs.' '.$news_vsr ); ?> <?php if ( $news_enable_dark_mode ) { echo esc_attr( 'odd' ); } ?> <?php if ( $news_enable_separator_line ) { echo esc_attr( 'featured' ); } ?> carousel showcase" <?php echo 'style="background-color:'.esc_attr( $news_background_color ).'"'; ?>>
    <div class="overflow-holder">
        <div class="container <?php the_field( 'news_container', 'option' ); ?>">

            <?php 
						$news_title         = get_field( 'news_title', 'option' );
						$news_heading_style = get_field( 'news_heading_style', 'option' );
						$news_description   = get_field( 'news_description', 'option' );
						$news_text_align    = get_field( 'news_text_align', 'option' );
						$enable_news_button = get_field( 'enable_news_button', 'option' );
						$news_button_label  = get_field( 'news_button_label', 'option' );

						$news_button_icon_style = get_field( 'news_button_icon_style', 'option' );
						$news_button_icon       = get_field( 'news_button_icon', 'option' );
						$news_button_icon_fa    = get_field( 'news_button_icon_fa', 'option' );
						
						if ( $news_title || $news_description ) : ?>

            <div class="row intro">
                <div class="col-12 <?php if ( $enable_news_button ) { echo esc_attr( 'col-md-9 align-self-center text-md-left' ); } else { echo esc_attr( $news_text_align ); } ?> text-center">
                
                    <?php 
										if ( $news_title ) : ?>

											<h2 class="<?php if ( ! $news_description ) { echo 'mb-0 '; } echo esc_attr( $news_heading_style ); ?>"><?php echo leverage_translate( $news_title ); ?></h2>

                    <?php endif; ?>

                    <?php if ( $news_description ) { echo '<p>' . leverage_translate( $news_description ) . '</p>'; } ?>
                </div>

                <?php
                if ( $enable_news_button ) :

									$target = get_field( 'news_button_target', 'option' );
							
									switch ( $target ) {
											case 'Anchor Link':
													$url = get_field( 'news_button_url', 'option' );
											break;

											case 'Internal Link':
													$url = get_field( 'news_button_url', 'option' );
											break;

											case 'External Link':
													$url = get_field( 'news_button_url', 'option' );
											break;

											case 'Inner Page':
													$url = get_field( 'news_button_page', 'option' );
											break;

											case 'Inner Post';
													$url = get_field( 'news_button_post', 'option' );
											break;
									} ?>

                <div class="col-12 col-md-3 align-self-end">

                    <a href="<?php echo esc_url( $url ); ?>" <?php if ( $target == 'External Link' ) { echo esc_attr( 'target="_blank"' ); } ?> class="<?php if ( $target == 'Anchor Link' ) { echo esc_attr( 'smooth-anchor' ); } ?> btn mx-auto mr-md-0 ml-md-auto primary-button">
                        
                        <?php if ( $news_button_icon_style == 'Line Icon' && $news_button_icon ) : ?>
                            <i class="icon-<?php the_field( 'news_button_icon', 'option' ); ?>"></i>
                        <?php elseif ( $news_button_icon_style == 'Awesome Icon' && $news_button_icon_fa ) : ?>
                            <i class="<?php the_field( 'news_button_icon_fa', 'option' ); ?>"></i>
                        <?php endif; ?>

                        <?php 
												if ( $news_button_label ) {
														echo leverage_translate( $news_button_label );
												} ?>
                    </a>
                </div>

                <?php endif; ?>
            </div>

            <?php endif; ?>

            <div class="swiper-container <?php echo esc_attr( $news_carousel_layout ); ?> items" data-autoplay="<?php echo esc_attr( $news_autoplay ); ?>" data-perview="<?php echo esc_attr( $news_columns ); ?>">
                <div class="swiper-wrapper">

                <?php
                if ( $news_post_type == 'post' ) {
                    $news_tax_query = array( array( 'taxonomy' => 'category', 'field' => 'id', 'terms' => array( $news_post_category_id ) ) );

                } else {
                    $news_tax_query = array( array( 'taxonomy' => 'leverage_portfolio_category', 'field' => 'id', 'terms' => array( $news_post_category_id ) ) ); 
                }

                $args = array(
                    'post_type'      => $news_post_type,
                    'tax_query'      => $news_tax_query,
                    'post_status'    => 'publish',
                    'order'          => 'DESC'
                );

                $query = new WP_Query( $args );

                if ( $query->have_posts() ) :
                    while ( $query->have_posts() ) : $query->the_post(); ?>
                        
                    <div class="swiper-slide slide-center slider-item item">
                        <div class="row card p-0 text-center">
                            <a href="<?php the_permalink(); ?>" class="full-link"></a>
                            <div class="image-over">
                                <?php 
                                    if ( has_post_thumbnail() ) {
                                        echo get_the_post_thumbnail( $post->ID, 'grid-image', array( 'class' => 'card-img-top' ) );
                                    } else {
                                        echo '<img src="'.get_template_directory_uri().'/assets/images/no-image.png" alt="'.esc_attr__( 'No Image', 'leverage' ).'" class="card-img-top"/>';
                                    }
                                ?>
                            </div>
                            <div class="card-caption col-12 p-0">
                                <div class="card-body">
                                    <h3 class="<?php if ( $blog_layout['disable_excerpt'] ) { echo 'm-0'; } ?>"><?php the_title(); ?></h3>
                                    <?php if ( ! $blog_layout['disable_excerpt'] ) { the_excerpt(); } ?>
                                </div>
                                <div class="card-footer <?php if ( $blog_layout['disable_author'] && $blog_layout['disable_date'] ) { echo 'd-none'; } else { echo 'd-lg-flex'; } ?> align-items-center justify-content-center">
                                    <?php if ( ! $blog_layout['disable_author'] ) : ?>
                                        <span class="mr-3 author-name"><i class="icon-user"></i><?php echo get_the_author_meta( 'display_name' ); ?></span>
                                    <?php endif; ?>
                                    <?php if ( ! $blog_layout['disable_date'] ) : ?>
                                        <span class="publish-date"><i class="icon-clock"></i><?php echo leverage_time_ago(); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                    endwhile;
                    wp_reset_postdata();

                endif; ?>
                
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</section>