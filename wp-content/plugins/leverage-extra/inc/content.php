<?php
/**
 * @package Leverage Extra
 */

namespace LVR\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Utils;

function add_slider_content_control( $obj ) {

  $obj->start_controls_section(
    'slider_content',
      [
        'label' => 'Slider',
        'tab' => Controls_Manager::TAB_CONTENT,
      ]
    );
    
    $obj->add_control(
      'layout_options',
      [
        'label' => __( 'Layout', 'leverage-extra' ),
        'type' => Controls_Manager::HEADING,
      ]
    );

    $obj->add_control(
      'layout_height',
      [
        'label' => __( 'Height', 'leverage-extra' ),
        'type' => Controls_Manager::SLIDER,
        'size_units' => [ '%' ],
        'range' => [
          '%' => [
            'min' => 25,
            'max' => 100,
            'step' => 5,
          ]
        ],
        'default' => [
          'unit' => '%',
          'size' => 100,
        ],
      ]
    );

    $obj->add_control(
      'display_options',
      [
        'label' => __( 'Design', 'leverage-extra' ),
        'type' => Controls_Manager::HEADING,
      ]
    );

    $obj->add_control(
      'enable_block_style',
      [
        'label' => esc_attr__('Block Style', 'leverage-extra'),
        'type'  => Controls_Manager::SWITCHER,
        'label_on' => esc_attr__('Yes', 'leverage-extra'),
        'label_off' => esc_attr__('No', 'leverage-extra'),
        'return_value' => 'yes',
      ]
    );

    $obj->add_control(
      'display_outline',
      [
        'label' => esc_attr__('Outline', 'leverage-extra'),
        'type'  => Controls_Manager::SWITCHER,
        'label_on' => esc_attr__('Show', 'leverage-extra'),
        'label_off' => esc_attr__('Hide', 'leverage-extra'),
        'return_value' => 'yes',
        'default' => 'yes',
      ]
    );

    $obj->add_control(
      'display_breadcrumb',
      [
        'label' => esc_attr__('Breadcrumb', 'leverage-extra'),
        'type'  => Controls_Manager::SWITCHER,
        'label_on' => esc_attr__('Show', 'leverage-extra'),
        'label_off' => esc_attr__('Hide', 'leverage-extra'),
        'return_value' => 'yes',
      ]
    );

    $obj->add_control(
      'slides_options',
      [
        'label' => __( 'Slides', 'leverage-extra' ),
        'type' => Controls_Manager::HEADING,
        'separator' => 'before',
      ]
    );

    $obj->add_control(
      'display_pagination',
      [
        'label' => esc_attr__('Pagination', 'leverage-extra'),
        'type'  => Controls_Manager::SWITCHER,
        'label_on' => esc_attr__('Show', 'leverage-extra'),
        'label_off' => esc_attr__('Hide', 'leverage-extra'),
        'return_value' => 'yes',
        'default' => 'yes',
      ]
    );

    $obj->add_control(
      'rotation_speed',
      [
        'label' => __( 'Rotation Speed', 'leverage-extra' ),
        'type' => Controls_Manager::SLIDER,
        'size_units' => [ '%' ],
        'range' => [
          '%' => [
            'min' => 1000,
            'max' => 25000,
            'step' => 500,
          ]
        ],
        'default' => [
          'unit' => '%',
          'size' => 10000,
        ],
      ]
    );

    $repeater = new Repeater();
    
    $repeater->add_control(
      'layout_options',
      [
        'label' => __( 'Layout', 'leverage-extra' ),
        'type' => Controls_Manager::HEADING,
      ]
    );

    $repeater->add_control(
      'layout_width',
      [
        'label' => __( 'Width', 'leverage-extra' ),
        'type' => Controls_Manager::SLIDER,
        'size_units' => [ '%' ],
        'range' => [
          '%' => [
            'min' => 0,
            'max' => 100,
            'step' => 1,
          ]
        ],
        'default' => [
          'unit' => '%',
          'size' => 60,
        ],
      ]
    );

    $repeater->add_control(
      'layout_alingment',
      [
        'label' => __('Alignment', 'leverage-extra'),
        'type' => Controls_Manager::CHOOSE,
        'options' => [
          'start' => [
            'title' => __('Left', 'leverage-extra'),
            'icon' => 'eicon-h-align-left',
          ],
          'center' => [
            'title' => __('Center', 'leverage-extra'),
            'icon' => 'eicon-h-align-center',
          ],
          'end' => [
            'title' => __('Right', 'leverage-extra'),
            'icon' => 'eicon-h-align-right',
          ],
        ],
        'default' => 'center',
        'toggle' => true,
      ]
    );
    
    $repeater->add_control(
      'particles_options',
      [
        'label' => __( 'Particles', 'leverage-extra' ),
        'type' => Controls_Manager::HEADING,
        'separator' => 'before',
      ]
    );

    $repeater->add_control(
      'particles_type',
      [
        'label' => __( 'Type', 'leverage-extra' ),
        'type' => Controls_Manager::SELECT,
        'options' => [
          'none' => __( 'None', 'leverage-extra' ),
          'default' => __( 'Neural', 'leverage-extra' ),
          'bubble' => __( 'Bubble', 'leverage-extra' ),
          'space' => __( 'Space', 'leverage-extra' ),
        ],
        'default' => 'none',
      ]
    );
    
    $repeater->add_control(
      'image_options',
      [
        'label' => __( 'Image', 'leverage-extra' ),
        'type' => Controls_Manager::HEADING,
        'separator' => 'before',
      ]
    );

    $repeater->add_control(
      'image_type',
      [
        'label' => __( 'Type', 'leverage-extra' ),
        'type' => Controls_Manager::SELECT,
        'options' => [
          'none' => __( 'None', 'leverage-extra' ),
          'library' => __( 'Media Library', 'leverage-extra' ),
          'featured' => __( 'Featured Image', 'leverage-extra' ),
          'external' => __( 'External URL', 'leverage-extra' ),
        ],
        'default' => 'library',
      ]
    );

    $repeater->add_control(
      'image',
      [
        'label' => __( 'Image', 'leverage-extra' ),
        'type' => Controls_Manager::MEDIA,
        'default' => [
          'url' => Utils::get_placeholder_image_src(),
        ],
        'condition' => [
            'image_type' => 'library'
        ],
      ]
    );

    $repeater->add_control(
      'external_image_url',
      [
        'label' => esc_attr__( 'Image URL', 'leverage-extra' ),
        'type'  => Controls_Manager::TEXT,
        'placeholder' => __( 'https://image-url.com/image.png', 'leverage-extra' ),
         'condition' => [
             'image_type' => 'external'
         ],
      ]
    );

    $repeater->add_control(
      'image_alingment',
      [
        'label' => __('Alignment', 'leverage-extra'),
        'type' => Controls_Manager::CHOOSE,
        'options' => [
          'hero-image-left' => [
            'title' => __('Left', 'leverage-extra'),
            'icon' => 'eicon-h-align-left',
          ],
          'full-image' => [
            'title' => __('Full', 'leverage-extra'),
            'icon' => 'eicon-slider-full-screen',
          ],
          'hero-image' => [
            'title' => __('Right', 'leverage-extra'),
            'icon' => 'eicon-h-align-right',
          ],
        ],
        'default' => 'full-image',
        'toggle' => true,
      ]
    );
    
    $repeater->add_control(
      'text_options',
      [
        'label' => __( 'Text', 'leverage-extra' ),
        'type' => Controls_Manager::HEADING,
        'separator' => 'before',
      ]
    );

    
    
    $repeater->add_control(
      'heading',
      [
        'label' => __( 'Heading', 'leverage-extra' ),
        'type' => Controls_Manager::TEXTAREA,
        'rows' => 2,
        'default' => get_the_title()
      ]
    );
  
    $repeater->add_control(
      'paragraph',
      [
        'label' => __( 'Paragraph', 'leverage-extra' ),
        'type' => Controls_Manager::TEXTAREA,
        'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam non tortor ut leo vulputate fringilla. Mauris ornare tristique dictum. Donec eu lorem nibh.'
      ]
    );

    $repeater->add_control(
      'text_alingment',
      [
        'label' => __('Alignment', 'leverage-extra'),
        'type' => Controls_Manager::CHOOSE,
        'options' => [
          'left' => [
            'title' => __('Left', 'leverage-extra'),
            'icon' => 'eicon-text-align-left',
          ],
          'center' => [
            'title' => __('Center', 'leverage-extra'),
            'icon' => 'eicon-text-align-center',
          ],
          'right' => [
            'title' => __('Right', 'leverage-extra'),
            'icon' => 'eicon-text-align-right',
          ],
        ],
        'default' => 'left',
        'toggle' => true,
      ]
    );
    
    $repeater->add_control(
      'primary_button_options',
      [
        'label' => __( 'Primary Button', 'leverage-extra' ),
        'type' => Controls_Manager::HEADING,
        'separator' => 'before',
      ]
    );
  
    $repeater->add_control(
      'primary_button_text',
      [
        'label' => __( 'Text', 'leverage-extra' ),
        'label_block' => true,
        'type' => Controls_Manager::TEXT,
        'default' => 'Click here'
      ]
    );
  
    $repeater->add_control(
      'primary_button_link',
      [
        'label' => esc_attr__( 'Link', 'leverage-extra' ),
        'type'  => Controls_Manager::URL,
        'placeholder' => __( 'https://your-link.com', 'leverage-extra' ),
        'show_external' => true,
        'default' => [
          'url' => '#',
          'is_external' => true,
          'nofollow' => true,
         ],
      ]
    );
    
    $repeater->add_control(
      'secondary_button_options',
      [
        'label' => __( 'Secondary Button', 'leverage-extra' ),
        'type' => Controls_Manager::HEADING,
        'separator' => 'before',
      ]
    );
  
    $repeater->add_control(
      'secondary_button_text',
      [
        'label' => __( 'Text', 'leverage-extra' ),
        'label_block' => true,
        'type' => Controls_Manager::TEXT,
        'default' => 'Click here'
      ]
    );
  
    $repeater->add_control(
      'secondary_button_link',
      [
        'label' => esc_attr__( 'Link', 'leverage-extra' ),
        'type'  => Controls_Manager::URL,
        'placeholder' => __( 'https://your-link.com', 'leverage-extra' ),
        'show_external' => true,
        'default' => [
          'url' => '#',
          'is_external' => true,
          'nofollow' => true,
         ],
      ]
    );
    
    $obj->add_control(
      'slider_items',
      [
        'show_label' => false,
        'type' => Controls_Manager::REPEATER,
        'fields' => $repeater->get_controls(),
        'default' => [
          [
            'heading' => get_the_title(),
            'paragraph' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam non tortor ut leo vulputate fringilla.',
          ],
        ],
        'title_field' => '{{{ heading }}}',
      ]
    );	

  $obj->end_controls_section();
}

function add_banner_content_control( $obj ) {

  $obj->start_controls_section(
    'banner_content',
      [
        'label' => 'Banner',
        'tab' => Controls_Manager::TAB_CONTENT,
      ]
    );
    
    $obj->add_control(
      'layout_options',
      [
        'label' => __( 'Layout', 'leverage-extra' ),
        'type' => Controls_Manager::HEADING,
      ]
    );

    $obj->add_control(
      'layout_width',
      [
        'label' => __( 'Width', 'leverage-extra' ),
        'type' => Controls_Manager::SLIDER,
        'size_units' => [ '%' ],
        'range' => [
          '%' => [
            'min' => 0,
            'max' => 100,
            'step' => 1,
          ]
        ],
        'default' => [
          'unit' => '%',
          'size' => 60,
        ],
      ]
    );

    $obj->add_control(
      'layout_alingment',
      [
        'label' => __('Alignment', 'leverage-extra'),
        'type' => Controls_Manager::CHOOSE,
        'options' => [
          'start' => [
            'title' => __('Left', 'leverage-extra'),
            'icon' => 'eicon-text-align-left',
          ],
          'center' => [
            'title' => __('Center', 'leverage-extra'),
            'icon' => 'eicon-text-align-center',
          ],
          'end' => [
            'title' => __('Right', 'leverage-extra'),
            'icon' => 'eicon-text-align-right',
          ],
        ],
        'default' => 'start',
        'toggle' => true,
      ]
    );
    
    $obj->add_control(
      'image_options',
      [
        'label' => __( 'Image', 'leverage-extra' ),
        'type' => Controls_Manager::HEADING,
        'separator' => 'before',
      ]
    );

    $obj->add_control(
      'image',
      [
        'label' => __( 'Image', 'leverage-extra' ),
        'type' => Controls_Manager::MEDIA,
        'default' => [
          'url' => Utils::get_placeholder_image_src(),
        ],
      ]
    );
    
    $obj->add_control(
      'text_options',
      [
        'label' => __( 'Text', 'leverage-extra' ),
        'type' => Controls_Manager::HEADING,
        'separator' => 'before',
      ]
    );

    $obj->add_control(
      'pre_title',
      [
        'label' => __( 'Pre-Title', 'leverage-extra' ),
        'type' => Controls_Manager::TEXTAREA,
        'rows' => 2,
        'default' => 'Lorem ipsum'
      ]
    );
    
    $obj->add_control(
      'heading',
      [
        'label' => __( 'Heading', 'leverage-extra' ),
        'type' => Controls_Manager::TEXTAREA,
        'rows' => 2,
        'default' => 'Lorem ipsum <b>Dolor</b>'
      ]
    );
  
    $obj->add_control(
      'paragraph',
      [
        'label' => __( 'Paragraph', 'leverage-extra' ),
        'type' => Controls_Manager::TEXTAREA,
        'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam non tortor ut leo vulputate fringilla. Mauris ornare tristique dictum. Donec eu lorem nibh.'
      ]
    );

    $obj->add_control(
      'text_alingment',
      [
        'label' => __('Alignment', 'leverage-extra'),
        'type' => Controls_Manager::CHOOSE,
        'options' => [
          'left' => [
            'title' => __('Left', 'leverage-extra'),
            'icon' => 'eicon-text-align-left',
          ],
          'center' => [
            'title' => __('Center', 'leverage-extra'),
            'icon' => 'eicon-text-align-center',
          ],
          'right' => [
            'title' => __('Right', 'leverage-extra'),
            'icon' => 'eicon-text-align-right',
          ],
        ],
        'default' => 'left',
        'toggle' => true,
      ]
    );
    
    $obj->add_control(
      'primary_button_options',
      [
        'label' => __( 'Primary Button', 'leverage-extra' ),
        'type' => Controls_Manager::HEADING,
        'separator' => 'before',
      ]
    );
  
    $obj->add_control(
      'primary_button_text',
      [
        'label' => __( 'Text', 'leverage-extra' ),
        'label_block' => true,
        'type' => Controls_Manager::TEXT,
        'default' => 'Click here'
      ]
    );
  
    $obj->add_control(
      'primary_button_link',
      [
        'label' => esc_attr__( 'Link', 'leverage-extra' ),
        'type'  => Controls_Manager::URL,
        'placeholder' => __( 'https://your-link.com', 'leverage-extra' ),
        'show_external' => true,
        'default' => [
          'url' => '#',
          'is_external' => true,
          'nofollow' => true,
         ],
      ]
    );
    
    $obj->add_control(
      'secondary_button_options',
      [
        'label' => __( 'Secondary Button', 'leverage-extra' ),
        'type' => Controls_Manager::HEADING,
        'separator' => 'before',
      ]
    );
  
    $obj->add_control(
      'secondary_button_text',
      [
        'label' => __( 'Text', 'leverage-extra' ),
        'label_block' => true,
        'type' => Controls_Manager::TEXT,
        'default' => 'Click here'
      ]
    );
  
    $obj->add_control(
      'secondary_button_link',
      [
        'label' => esc_attr__( 'Link', 'leverage-extra' ),
        'type'  => Controls_Manager::URL,
        'placeholder' => __( 'https://your-link.com', 'leverage-extra' ),
        'show_external' => true,
        'default' => [
          'url' => '#',
          'is_external' => true,
          'nofollow' => true,
         ],
      ]
    );

  $obj->end_controls_section();
}

function add_parallax_content_control( $obj ) {

  $obj->start_controls_section(
    'parallax_content',
      [
        'label' => 'Parallax',
        'tab' => Controls_Manager::TAB_CONTENT,
      ]
    );

    $obj->add_control(
      'parallax_image',
      [
        'label' => __( 'Image', 'leverage-extra' ),
        'type' => Controls_Manager::MEDIA,
        'default' => [
          'url' => Utils::get_placeholder_image_src(),
        ],
      ]
    );

    $obj->add_control(
      'parallax_h_position',
      [
        'label' => __( 'Horizontal Position', 'leverage-extra' ),
        'type' => Controls_Manager::SLIDER,
        'size_units' => [ '%' ],
        'range' => [
          '%' => [
            'min' => 0,
            'max' => 100,
            'step' => 1,
          ]
        ],
        'default' => [
          'unit' => '%',
          'size' => 50,
        ],
      ]
    );

  $obj->end_controls_section();
}

function add_pre_title_content_control( $obj ) {

  $obj->start_controls_section(
    'pre_title_content',
      [
        'label' => 'Pre-Title',
        'tab' => Controls_Manager::TAB_CONTENT,
      ]
    );
    
    $obj->add_control(
      'pre_title',
      [
        'label' => __( 'Pre-Title', 'leverage-extra' ),
        'type' => Controls_Manager::TEXTAREA,
        'rows' => 2,
        'default' => 'Lorem ipsum'
      ]
    );

    $obj->add_control(
      'pre_title_alingment',
      [
        'label' => __('Alignment', 'leverage-extra'),
        'type' => Controls_Manager::CHOOSE,
        'options' => [
          'left' => [
            'title' => __('Left', 'leverage-extra'),
            'icon' => 'eicon-text-align-left',
          ],
          'center' => [
            'title' => __('Center', 'leverage-extra'),
            'icon' => 'eicon-text-align-center',
          ],
          'right' => [
            'title' => __('Right', 'leverage-extra'),
            'icon' => 'eicon-text-align-right',
          ],
        ],
        'default' => 'left',
        'toggle' => true,
      ]
    );

  $obj->end_controls_section();
}

function add_heading_content_control( $obj, $feature = false ) {

  $obj->start_controls_section(
    'heading_content',
      [
        'label' => 'Heading',
        'tab' => Controls_Manager::TAB_CONTENT,
      ]
    );
    
    $obj->add_control(
      'html_tag',
      [
        'label' => __( 'HTML Tag', 'leverage-extra' ),
        'type' => Controls_Manager::SELECT,
        'options' => [
          'h1' => 'H1',
          'h2' => 'H2',
          'h3' => 'H3',
          'h4' => 'H4',
          'h5' => 'H5',
          'h6' => 'H6',
        ],
        'default' => 'h2',
      ]
    );
    
    $obj->add_control(
      'heading',
      [
        'label' => __( 'Heading', 'leverage-extra' ),
        'type' => Controls_Manager::TEXTAREA,
        'rows' => 2,
        'default' => 'Lorem ipsum <b>Dolor</b>'
      ]
    );

    $obj->add_control(
      'heading_alingment',
      [
        'label' => __('Alignment', 'leverage-extra'),
        'type' => Controls_Manager::CHOOSE,
        'options' => [
          'left' => [
            'title' => __('Left', 'leverage-extra'),
            'icon' => 'eicon-text-align-left',
          ],
          'center' => [
            'title' => __('Center', 'leverage-extra'),
            'icon' => 'eicon-text-align-center',
          ],
          'right' => [
            'title' => __('Right', 'leverage-extra'),
            'icon' => 'eicon-text-align-right',
          ],
        ],
        'default' => 'left',
        'toggle' => true,
      ]
    );
    
    if ( $feature === true ) {

      $obj->add_control(
        'display_top_line',
        [
          'label' => esc_attr__('Display Top Line', 'leverage-extra'),
          'type'  => Controls_Manager::SWITCHER,
          'condition' => [
              'html_tag' => 'h2'
          ],
          'label_on' => esc_attr__('Yes', 'leverage-extra'),
          'label_off' => esc_attr__('No', 'leverage-extra'),
          'return_value' => 'yes',
          'default' => 'yes',
        ]
      );
    }

  $obj->end_controls_section();
}

function add_paragraph_content_control( $obj ) {

  $obj->start_controls_section(
    'paragraph_content',
      [
        'label' => 'Paragraph',
        'tab' => Controls_Manager::TAB_CONTENT,
      ]
    );
    
    $obj->add_control(
      'paragraph',
      [
        'label' => __( 'Paragraph', 'leverage-extra' ),
        'type' => Controls_Manager::TEXTAREA,
        'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam non tortor ut leo vulputate fringilla. Mauris ornare tristique dictum. Donec eu lorem nibh.'
      ]
    );

    $obj->add_control(
      'paragraph_alingment',
      [
        'label' => __('Alignment', 'leverage-extra'),
        'type' => Controls_Manager::CHOOSE,
        'options' => [
          'left' => [
            'title' => __('Left', 'leverage-extra'),
            'icon' => 'eicon-text-align-left',
          ],
          'center' => [
            'title' => __('Center', 'leverage-extra'),
            'icon' => 'eicon-text-align-center',
          ],
          'right' => [
            'title' => __('Right', 'leverage-extra'),
            'icon' => 'eicon-text-align-right',
          ],
        ],
        'default' => 'left',
        'toggle' => true,
      ]
    );

  $obj->end_controls_section();
}

function add_number_content_control( $obj, $text = false ) {

  $obj->start_controls_section(
    'number_content',
      [
        'label' => 'Number',
        'tab' => Controls_Manager::TAB_CONTENT,
      ]
    );

    if ( $text === true ) {
  
      $obj->add_control(
        'number',
        [
          'label' => __( 'Number', 'leverage-extra' ),
          'type' => Controls_Manager::TEXT,
          'default' => '1º'
        ]
      );

    } else {
  
      $obj->add_control(
        'number',
        [
          'label' => __( 'Number', 'leverage-extra' ),
          'type' => Controls_Manager::NUMBER,
          'default' => 100
        ]
      );
    }

    $obj->add_control(
      'number_alingment',
      [
        'label' => __('Alignment', 'leverage-extra'),
        'type' => Controls_Manager::CHOOSE,
        'options' => [
          'left' => [
            'title' => __('Left', 'leverage-extra'),
            'icon' => 'eicon-text-align-left',
          ],
          'center' => [
            'title' => __('Center', 'leverage-extra'),
            'icon' => 'eicon-text-align-center',
          ],
          'right' => [
            'title' => __('Right', 'leverage-extra'),
            'icon' => 'eicon-text-align-right',
          ],
        ],
        'default' => 'left',
        'toggle' => true,
      ]
    );

  $obj->end_controls_section();
}

function add_price_content_control( $obj ) {

  $obj->start_controls_section(
    'price_content',
      [
        'label' => 'Price',
        'tab' => Controls_Manager::TAB_CONTENT,
      ]
    );
    
    $obj->add_control(
      'price',
      [
        'label' => __( 'Price', 'leverage-extra' ),
        'type' => Controls_Manager::TEXTAREA,
        'rows' => 2,
        'default' => '29.90'
      ]
    );

    $obj->add_control(
      'price_alingment',
      [
        'label' => __('Alignment', 'leverage-extra'),
        'type' => Controls_Manager::CHOOSE,
        'options' => [
          'left' => [
            'title' => __('Left', 'leverage-extra'),
            'icon' => 'eicon-text-align-left',
          ],
          'center' => [
            'title' => __('Center', 'leverage-extra'),
            'icon' => 'eicon-text-align-center',
          ],
          'right' => [
            'title' => __('Right', 'leverage-extra'),
            'icon' => 'eicon-text-align-right',
          ],
        ],
        'default' => 'left',
        'toggle' => true,
      ]
    );

  $obj->end_controls_section();
}

function add_video_content_control( $obj ) {

  $obj->start_controls_section(
    'video_content',
      [
        'label' => 'Video',
        'tab' => Controls_Manager::TAB_CONTENT,
      ]
    );

    $obj->add_control(
      'video_title',
      [
        'label' => __( 'Title', 'leverage-extra' ),
        'type' => Controls_Manager::TEXTAREA,
        'rows' => 2,
        'default' => 'Lorem ipsum dolor.'
      ]
    );
  
    $obj->add_control(
      'video_url',
      [
        'label' => __( 'URL', 'leverage-extra' ),
        'type' => Controls_Manager::TEXT,
        'placeholder' => __( 'Enter your URL (YouTube or Vimeo)', 'leverage-extra' ),
        'default' => 'https://vimeo.com/222990241',
      ]
    );

  $obj->end_controls_section();
}

function add_image_content_control( $obj, $position = true ) {

  $obj->start_controls_section(
    'image_content',
      [
        'label' => 'Image',
        'tab' => Controls_Manager::TAB_CONTENT,
      ]
    );

    $obj->add_control(
      'image_type',
      [
        'label' => __( 'Type', 'leverage-extra' ),
        'type' => Controls_Manager::SELECT,
        'options' => [
          'none' => __( 'None', 'leverage-extra' ),
          'library' => __( 'Media Library', 'leverage-extra' ),
          'external' => __( 'External URL', 'leverage-extra' ),
        ],
        'default' => 'library',
      ]
    );

    $obj->add_control(
      'image',
      [
        'label' => __( 'Image', 'leverage-extra' ),
        'type' => Controls_Manager::MEDIA,
        'default' => [
          'url' => Utils::get_placeholder_image_src(),
        ],
        'condition' => [
            'image_type' => 'library'
        ],
      ]
    );

    $obj->add_control(
      'external_image_url',
      [
        'label' => esc_attr__( 'Image URL', 'leverage-extra' ),
        'type'  => Controls_Manager::TEXT,
        'placeholder' => __( 'https://image-url.com/image.png', 'leverage-extra' ),
         'condition' => [
             'image_type' => 'external'
         ],
      ]
    );

    if ( $position === true ) {

      $obj->add_control(
        'image_vertical_position',
        [
          'label' => __( 'Vertical Position', 'leverage-extra' ),
          'type' => Controls_Manager::CHOOSE,
          'options' => [
            'top' => [
              'title' => __( 'Top', 'leverage-extra' ),
              'icon' => 'eicon-v-align-top',
            ],
            'bottom' => [
              'title' => __( 'Bottom', 'leverage-extra' ),
              'icon' => 'eicon-v-align-bottom',
            ],
          ],
          'default' => 'top',
          'toggle' => true,
        ]
      );
    }

  $obj->end_controls_section();
}

function add_image_overlay_content_control( $obj ) {

  $obj->start_controls_section(
    'image_overlay_content',
      [
        'label' => 'Image Overlay',
        'tab' => Controls_Manager::TAB_CONTENT,
      ]
    );

    $obj->add_control(
      'image_overlay',
      [
        'label' => __( 'Image', 'leverage-extra' ),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
          'url' => \Elementor\Utils::get_placeholder_image_src(),
        ],
      ]
    );

  $obj->end_controls_section();
}

function add_image_gallery_content_control( $obj ) {

  $obj->start_controls_section(
    'gallery_content',
      [
        'label' => 'Gallery',
        'tab' => Controls_Manager::TAB_CONTENT,
      ]
    );

    $obj->add_control(
      'image_options',
      [
        'label' => __( 'Images', 'leverage-extra' ),
        'type' => Controls_Manager::HEADING,
      ]
    );

    $obj->add_control(
      'gallery',
      [
        'label' => __( 'Add Images', 'leverage-extra' ),
        'type' => Controls_Manager::GALLERY,
        'default' => [],
      ]
    );

    $obj->add_control(
      'video_options',
      [
        'label' => __( 'Videos', 'leverage-extra' ),
        'type' => Controls_Manager::HEADING,
        'separator' => 'before',
      ]
    );

    $obj->add_control(
      'display_videos',
      [
        'label' => esc_attr__('Add Videos', 'leverage-extra'),
        'type'  => Controls_Manager::SWITCHER,
        'label_on' => esc_attr__('Yes', 'leverage-extra'),
        'label_off' => esc_attr__('No', 'leverage-extra'),
        'return_value' => 'yes',
      ]
    );

    $repeater = new Repeater();

    $repeater->add_control(
      'video_title',
      [
        'label' => __( 'Title', 'leverage-extra' ),
        'type' => Controls_Manager::TEXTAREA,
        'rows' => 2,
        'default' => 'Lorem ipsum dolor.'
      ]
    );
  
    $repeater->add_control(
      'video_url',
      [
        'label' => __( 'URL', 'leverage-extra' ),
        'type' => Controls_Manager::TEXT,
        'placeholder' => __( 'Enter your URL (YouTube or Vimeo)', 'leverage-extra' ),
        'default' => 'https://vimeo.com/222990241',
      ]
    );

    $repeater->add_control(
      'image_overlay',
      [
        'label' => __( 'Image', 'leverage-extra' ),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
          'url' => \Elementor\Utils::get_placeholder_image_src(),
        ],
      ]
    );

    $obj->add_control(
      'video_items',
      [
        'show_label' => false,
        'type' => Controls_Manager::REPEATER,
        'condition' => [
            'display_videos' => 'yes'
        ],
        'fields' => $repeater->get_controls(),
        'default' => [
          [
            'video_title' => 'Lorem ipsum dolor.',
            'video_url' => 'https://vimeo.com/222990241',
          ],
          [
            'video_title' => 'Lorem ipsum dolor.',
            'video_url' => 'https://vimeo.com/222990241',
          ],
          [
            'video_title' => 'Lorem ipsum dolor.',
            'video_url' => 'https://vimeo.com/222990241',
          ],
        ],
        'title_field' => '{{{ video_title }}}',
      ]
    );

    $obj->add_control(
      'layout_options',
      [
        'label' => __( 'Layout', 'leverage-extra' ),
        'type' => Controls_Manager::HEADING,
        'separator' => 'before',
      ]
    );

    $obj->add_control(
      'columns',
      [
        'label' => __( 'Columns', 'leverage-extra' ),
        'type' => Controls_Manager::SLIDER,
        'range' => [
          'px' => [
            'min' => 1,
            'max' => 6,
          ],
        ],
        'default' => [
          'size' => 3,
        ],
      ]
    );

  $obj->end_controls_section();
}

function add_button_content_control( $obj ) {

  $obj->start_controls_section(
    'button_content',
      [
        'label' => 'Button',
        'tab' => Controls_Manager::TAB_CONTENT,
      ]
    );

    $obj->add_control(
      'button_type',
      [
        'label' => __( 'Style', 'leverage-extra' ),
        'type' => Controls_Manager::SELECT,
        'options' => [
          'primary-button' => __( 'Filled', 'leverage-extra' ),
          'dark-button' => __( 'Outlined', 'leverage-extra' ),
        ],
        'default' => 'primary-button',
      ]
    );
  
    $obj->add_control(
      'button_text',
      [
        'label' => __( 'Text', 'leverage-extra' ),
        'type' => Controls_Manager::TEXT,
        'default' => 'Click here'
      ]
    );
  
    $obj->add_control(
      'button_link',
      [
        'label' => esc_attr__( 'Link', 'leverage-extra' ),
        'type'  => Controls_Manager::URL,
        'placeholder' => __( 'https://your-link.com', 'leverage-extra' ),
        'show_external' => true,
        'default' => [
          'url' => '#',
          'is_external' => true,
          'nofollow' => true,
         ],
      ]
    );

    $obj->add_control(
      'button_position',
      [
        'label' => __( 'Position', 'leverage-extra' ),
        'type' => Controls_Manager::CHOOSE,
        'options' => [
          'start' => [
            'title' => __( 'Left', 'leverage-extra' ),
            'icon' => 'eicon-h-align-left',
          ],
          'center' => [
            'title' => __( 'Center', 'leverage-extra' ),
            'icon' => 'eicon-h-align-center',
          ],
          'end' => [
            'title' => __( 'Right', 'leverage-extra' ),
            'icon' => 'eicon-h-align-right',
          ],
        ],
        'default' => 'left',
        'toggle' => true,
      ]
    );

  $obj->end_controls_section();
}

function add_action_content_control( $obj ) {

  $obj->start_controls_section(
    'action_content',
      [
        'label' => 'Action',
        'tab' => Controls_Manager::TAB_CONTENT,
      ]
    );

    $obj->add_control(
      'action_type',
      [
        'label' => __( 'Action Type', 'leverage-extra' ),
        'type' => Controls_Manager::SELECT,
        'options' => [
          'none' => __( 'None', 'leverage-extra' ),
          'icon' => __( 'Icon', 'leverage-extra' ),
          'button' => __( 'Button', 'leverage-extra' ),
        ],
        'default' => 'icon',
      ]
    );

    $obj->add_control(
      'button_type',
      [
        'label' => __( 'Style', 'leverage-extra' ),
        'type' => Controls_Manager::SELECT,
        'condition' => [
            'action_type' => 'button'
        ],
        'options' => [
          'primary-button' => __( 'Filled', 'leverage-extra' ),
          'dark-button' => __( 'Outlined', 'leverage-extra' ),
        ],
        'default' => 'primary-button',
      ]
    );    

    $obj->add_control(
      'action_icon_line',
      [
        'label' => __( 'Icon', 'leverage-extra' ),
        'type' => \Elementor\Controls_Manager::SELECT2,
        'condition' => [
          'action_type' => 'icon'
        ],
        'options' => leverage_get_line_icons(),
        'default' => 'arrow-right-circle',
      ]
    );
  
    $obj->add_control(
      'button_text',
      [
        'label' => __( 'Button Text', 'leverage-extra' ),
        'type' => Controls_Manager::TEXT,
        'condition' => [
            'action_type' => 'button'
        ],
        'default' => 'Click here'
      ]
    );
  
    $obj->add_control(
      'action_link',
      [
        'label' => esc_attr__( 'Link', 'leverage-extra' ),
        'type'  => Controls_Manager::URL,
        'condition' => [
          'action_type' => ['icon', 'button'],
        ],
        'placeholder' => __( 'https://your-link.com', 'leverage-extra' ),
        'show_external' => true,
        'default' => [
          'url' => '#',
          'is_external' => true,
          'nofollow' => true,
         ],
      ]
    );

    $obj->add_control(
      'action_position',
      [
        'label' => __( 'Position', 'leverage-extra' ),
        'type' => Controls_Manager::CHOOSE,
        'condition' => [
          'action_type' => ['icon', 'button'],
        ],
        'options' => [
          'mr-auto' => [
            'title' => __( 'Left', 'leverage-extra' ),
            'icon' => 'eicon-h-align-left',
          ],
          'mx-auto' => [
            'title' => __( 'Center', 'leverage-extra' ),
            'icon' => 'eicon-h-align-center',
          ],
          'ml-auto' => [
            'title' => __( 'Right', 'leverage-extra' ),
            'icon' => 'eicon-h-align-right',
          ],
        ],
        'default' => 'left',
        'toggle' => true,
      ]
    );

  $obj->end_controls_section();
}

function add_target_content_control( $obj ) {

  $obj->start_controls_section(
    'target_content',
      [
        'label' => 'Target',
        'tab' => Controls_Manager::TAB_CONTENT,
      ]
    );

    $obj->add_control(
      'target_type',
      [
        'label' => __( 'Target Type', 'leverage-extra' ),
        'type' => Controls_Manager::SELECT,
        'options' => [
          'none' => __( 'None', 'leverage-extra' ),
          'image' => __( 'Image', 'leverage-extra' ),
          'link' => __( 'Link', 'leverage-extra' ),
        ],
        'default' => 'image',
      ]
    );
  
    $obj->add_control(
      'target_link',
      [
        'label' => esc_attr__( 'Link', 'leverage-extra' ),
        'type'  => Controls_Manager::URL,
        'condition' => [
          'target_type' => 'link',
        ],
        'placeholder' => __( 'https://your-link.com', 'leverage-extra' ),
        'show_external' => true,
        'default' => [
          'url' => '#',
          'is_external' => true,
          'nofollow' => true,
         ],
      ]
    );

  $obj->end_controls_section();
}

function add_icon_content_control( $obj, $position = true ) {

  $obj->start_controls_section(
    'icon_content',
      [
        'label' => 'Icon',
        'tab' => Controls_Manager::TAB_CONTENT,
      ]
    );

    $obj->add_control(
      'icon_type',
      [
        'label' => __( 'Icon Style', 'leverage-extra' ),
        'type' => Controls_Manager::SELECT,
        'options' => [
          'fa' => __( 'Font Awesome', 'leverage-extra' ),
          'line' => __( 'Line Icons', 'leverage-extra' ),
        ],
        'default' => 'fa',
      ]
    );

    $obj->add_control(
      'icon_fa',
      [
        'label' => __( 'Icon', 'leverage-extra' ),
        'type' => Controls_Manager::ICONS,
        'condition' => [
          'icon_type' => 'fa'
        ],
        'default' => [
          'value' => 'fas fa-star',
          'library' => 'solid',
        ],
      ]
    );

    $obj->add_control(
      'icon_line',
      [
        'label' => __( 'Icon', 'leverage-extra' ),
        'type' => \Elementor\Controls_Manager::SELECT2,
        'condition' => [
          'icon_type' => 'line'
        ],
        'options' => leverage_get_line_icons(),
        'default' => 'rocket',
      ]
    );

    if ( $position === true ) {
    
      $obj->add_control(
        'icon_position',
        [
          'label' => __( 'Position', 'leverage-extra' ),
          'type' => Controls_Manager::CHOOSE,
          'options' => [
            'mr-auto' => [
              'title' => __( 'Left', 'leverage-extra' ),
              'icon' => 'eicon-h-align-left',
            ],
            'mx-auto' => [
              'title' => __( 'Center', 'leverage-extra' ),
              'icon' => 'eicon-h-align-center',
            ],
            'ml-auto' => [
              'title' => __( 'Right', 'leverage-extra' ),
              'icon' => 'eicon-h-align-right',
            ],
          ],
          'default' => 'mr-auto',
          'toggle' => true,
        ]
      );
    }

  $obj->end_controls_section();
}

function add_feature_content_control( $obj ) {

  $obj->start_controls_section(
    'feature_content',
      [
        'label' => 'Feature',
        'tab' => Controls_Manager::TAB_CONTENT,
      ]
    );

    $obj->add_control(
      'display_feature',
      [
        'label' => esc_attr__('Display', 'leverage-extra'),
        'type'  => Controls_Manager::SWITCHER,
        'label_on' => esc_attr__('Yes', 'leverage-extra'),
        'label_off' => esc_attr__('No', 'leverage-extra'),
        'return_value' => 'yes',
        'default' => 'yes',
      ]
    );

    $obj->add_control(
      'feature_vertical_position',
      [
        'label' => __( 'Vertical Position', 'leverage-extra' ),
        'type' => Controls_Manager::CHOOSE,
        'condition' => [
          'display_feature' => 'yes'
        ],
        'options' => [
          'top' => [
            'title' => __( 'Top', 'leverage-extra' ),
            'icon' => 'eicon-v-align-top',
          ],
          'bottom' => [
            'title' => __( 'Bottom', 'leverage-extra' ),
            'icon' => 'eicon-v-align-bottom',
          ],
        ],
        'default' => 'top',
        'toggle' => true,
      ]
    );

    $obj->add_control(
      'feature_horizontal_position',
      [
        'label' => __( 'Horizontal Position', 'leverage-extra' ),
        'type' => Controls_Manager::CHOOSE,
        'condition' => [
          'display_feature' => 'yes'
        ],
        'options' => [
          'left' => [
            'title' => __( 'Left', 'leverage-extra' ),
            'icon' => 'eicon-h-align-left',
          ],
          'right' => [
            'title' => __( 'Right', 'leverage-extra' ),
            'icon' => 'eicon-h-align-right',
          ],
        ],
        'default' => 'left',
        'toggle' => true,
      ]
    );

  $obj->end_controls_section();
}

function add_person_content_control( $obj, $name, $title ) {

  $obj->start_controls_section(
    'person_content',
      [
        'label' => 'Person',
        'tab' => Controls_Manager::TAB_CONTENT,
      ]
    );

    $obj->add_control(
      'image_options',
      [
        'label' => __( 'Image', 'leverage-extra' ),
        'type' => Controls_Manager::HEADING
      ]
    );
  
    $obj->add_control(
      'person_photo',
      [
        'label' => __( 'Photo', 'leverage-extra' ),
        'type' => Controls_Manager::MEDIA,
        'default' => [
          'url' => Utils::get_placeholder_image_src(),
        ],
      ]
    );

    $obj->add_control(
      'person_photo_position',
      [
        'label' => __( 'Position', 'leverage-extra' ),
        'type' => Controls_Manager::CHOOSE,
        'options' => [
          'left' => [
            'title' => __( 'Left', 'leverage-extra' ),
            'icon' => 'eicon-h-align-left',
          ],
          'top' => [
            'title' => __( 'Top', 'leverage-extra' ),
            'icon' => 'eicon-v-align-top',
          ],
          'bottom' => [
            'title' => __( 'Bottom', 'leverage-extra' ),
            'icon' => 'eicon-v-align-bottom',
          ],
          'right' => [
            'title' => __( 'Right', 'leverage-extra' ),
            'icon' => 'eicon-h-align-right',
          ],
        ],
        'default' => 'top',
        'toggle' => true,
      ]
    );
    
    $obj->add_control(
      'text_options',
      [
        'label' => __( 'Text', 'leverage-extra' ),
        'type' => Controls_Manager::HEADING,
        'separator' => 'before',
      ]
    );
  
    $obj->add_control(
      'person_name',
      [
        'label' => __( 'Name', 'leverage-extra' ),
        'type' => Controls_Manager::TEXTAREA,
        'rows' => 2,
        'default' => 'John Doe'
      ]
    );
  
    $obj->add_control(
      'person_title',
      [
        'label' => __( 'Title', 'leverage-extra' ),
        'type' => Controls_Manager::TEXTAREA,
        'rows' => 2,
        'default' => 'Designer'
      ]
    );
  
    $obj->add_control(
      'person_' . $name,
      [
        'label' => __( $title, 'leverage-extra' ),
        'type' => Controls_Manager::TEXTAREA,
        'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras iaculis diam varius diam ultricies lacinia.'
      ]
    );

    $obj->add_control(
      'person_text_alingment',
      [
        'label' => __( 'Alignment', 'leverage-extra' ),
        'type' => Controls_Manager::CHOOSE,
        'options' => [
          'left' => [
            'title' => __( 'Left', 'leverage-extra' ),
            'icon' => 'eicon-text-align-left',
          ],
          'center' => [
            'title' => __( 'Center', 'leverage-extra' ),
            'icon' => 'eicon-text-align-center',
          ],
          'right' => [
            'title' => __( 'Right', 'leverage-extra' ),
            'icon' => 'eicon-text-align-right',
          ],
        ],
        'default' => 'left',
        'toggle' => true,
      ]
    );

  $obj->end_controls_section();
}

function add_social_icons_content_control( $obj ) {

  $obj->start_controls_section(
    'social_icon_content',
      [
        'label' => 'Social Icons',
        'tab' => Controls_Manager::TAB_CONTENT,
      ]
    );

    $repeater = new Repeater();

    $repeater->add_control(
      'social_icon',
      [
        'label' => __( 'Icon', 'leverage-extra' ),
        'type' => Controls_Manager::ICONS,
        'default' => [
          'value' => 'fas fa-star',
          'library' => 'solid',
        ],
      ]
    );

    $repeater->add_control(
      'social_icon_link',
      [
        'label' => esc_attr__( 'Link', 'leverage-extra' ),
        'type'  => Controls_Manager::URL,
        'placeholder' => __( 'https://your-link.com', 'leverage-extra' ),
        'show_external' => true,
        'default' => [
          'url' => '#',
          'is_external' => true,
          'nofollow' => true,
         ],
      ]
    );
    
    $obj->add_control(
      'social_icon_items',
      [
        'show_label' => false,
        'type' => Controls_Manager::REPEATER,
        'fields' => $repeater->get_controls(),
        'prevent_empty' => false,
        'default' => [
          [
            'social_icon' => [ 'value' => 'fab fa-facebook-f', 'library' => 'solid' ],
            'social_icon_link' => [ 'url' => 'https://facebook.com/', 'is_external' => true, 'nofollow' => true ],
          ],
          [
            'social_icon' => [ 'value' => 'fab fa-twitter', 'library' => 'solid' ],
            'social_icon_link' => [ 'url' => 'https://twitter.com/', 'is_external' => true, 'nofollow' => true ],
          ],
          [
            'social_icon' => [ 'value' => 'fab fa-linkedin-in', 'library' => 'solid' ],
            'social_icon_link' => [ 'url' => 'https://linkedin.com/', 'is_external' => true, 'nofollow' => true ],
          ],
        ],
        'title_field' => '{{{ social_icon_link.url }}}',
      ]
    );	
  
  $obj->end_controls_section();
}

function add_post_item_content_control( $obj, $post_type ) {

  $obj->start_controls_section(
    'post_item_content',
      [
        'label' => 'Post Item',
        'tab' => Controls_Manager::TAB_CONTENT,
      ]
    );

    $obj->add_control(
      'display_options',
      [
        'label' => __( 'Display', 'leverage-extra' ),
        'type' => Controls_Manager::HEADING,
      ]
    );

    $obj->add_control(
      'post_item_display_excerpt',
      [
        'label' => esc_attr__('Excerpt', 'leverage-extra'),
        'type'  => Controls_Manager::SWITCHER,
        'label_on' => esc_attr__('Show', 'leverage-extra'),
        'label_off' => esc_attr__('Hide', 'leverage-extra'),
        'return_value' => 'yes',
        'default' => 'yes',
      ]
    );

    $obj->add_control(
      'post_item_display_author',
      [
        'label' => esc_attr__('Author Name', 'leverage-extra'),
        'type'  => Controls_Manager::SWITCHER,
        'label_on' => esc_attr__('Show', 'leverage-extra'),
        'label_off' => esc_attr__('Hide', 'leverage-extra'),
        'return_value' => 'yes',
        'default' => 'yes',
      ]
    );

    $obj->add_control(
      'post_item_display_date',
      [
        'label' => esc_attr__('Publish Date', 'leverage-extra'),
        'type'  => Controls_Manager::SWITCHER,
        'label_on' => esc_attr__('Show', 'leverage-extra'),
        'label_off' => esc_attr__('Hide', 'leverage-extra'),
        'return_value' => 'yes',
        'default' => 'yes',
      ]
    );
    
    $obj->add_control(
      'text_options',
      [
        'label' => __( 'Text', 'leverage-extra' ),
        'type' => Controls_Manager::HEADING,
        'separator' => 'before',
      ]
    );

    $obj->add_control(
      'post_item_text_alingment',
      [
        'label' => __('Text Alignment', 'leverage-extra'),
        'type' => Controls_Manager::CHOOSE,
        'options' => [
          'left' => [
            'title' => __('Left', 'leverage-extra'),
            'icon' => 'eicon-text-align-left',
          ],
          'center' => [
            'title' => __('Center', 'leverage-extra'),
            'icon' => 'eicon-text-align-center',
          ],
          'right' => [
            'title' => __('Right', 'leverage-extra'),
            'icon' => 'eicon-text-align-right',
          ],
        ],
        'default' => 'center',
        'toggle' => true,
      ]
    );

    $obj->add_control(
      'post_item_metadata_alingment',
      [
        'label' => __('Metadata Alignment', 'leverage-extra'),
        'type' => Controls_Manager::CHOOSE,
        'options' => [
          'start' => [
            'title' => __('Left', 'leverage-extra'),
            'icon' => 'eicon-text-align-left',
          ],
          'center' => [
            'title' => __('Center', 'leverage-extra'),
            'icon' => 'eicon-text-align-center',
          ],
          'end' => [
            'title' => __('Right', 'leverage-extra'),
            'icon' => 'eicon-text-align-right',
          ],
        ],
        'default' => 'center',
        'toggle' => true,
      ]
    );
    
    $obj->add_control(
      'layout_options',
      [
        'label' => __( 'Layout', 'leverage-extra' ),
        'type' => Controls_Manager::HEADING,
        'separator' => 'before',
      ]
    );

    $obj->add_control(
      'post_item_columns',
      [
        'label' => __( 'Columns', 'leverage-extra' ),
        'type' => Controls_Manager::SLIDER,
        'range' => [
          'px' => [
            'min' => 1,
            'max' => 6,
          ],
        ],
        'default' => [
          'size' => 3,
        ],
      ]
    );
    
    $obj->add_control(
      'query_options',
      [
        'label' => __( 'Query', 'leverage-extra' ),
        'type' => Controls_Manager::HEADING,
        'separator' => 'before',
      ]
    );
    
    $obj->add_control( 
      'categories',
      [
        'label' => esc_attr__( 'Categories', 'leverage-extra' ),
        'label_block' => true,
        'type' => \Elementor\Controls_Manager::SELECT2,
        'multiple' => true,
        'options' => leverage_get_categories( $post_type ),
        'default' => 'all',
      ]
    );

    $obj->add_control(
      'post_per_page',
      [
        'label' => __( 'Posts Per Page', 'leverage-extra' ),
        'type' => Controls_Manager::SLIDER,
        'size_units' => [ 'px' ],
        'range' => [
          'px' => [
            'min' => 1,
            'max' => 64,
            'step' => 1,
          ],
        ],
        'default' => [
          'unit' => 'px',
          'size' => 12,
        ],
      ]
    );

    $obj->add_control(
      'post_order',
      [
        'label' => __( 'Order', 'leverage-extra' ),
        'type' => Controls_Manager::SELECT,
        'options' => [
          'ASC' => __( 'Ascending', 'leverage-extra' ),
          'DESC' => __( 'Descending', 'leverage-extra' ),
        ],
        'default' => 'DESC',
      ]
    );

    $obj->add_control(
      'post_order_by',
      [
        'label' => __( 'Order By', 'leverage-extra' ),
        'type' => Controls_Manager::SELECT,
        'options' => leverage_get_orderby_options(),
        'default' => 'date',
      ]
    );

    $obj->add_control(
      'exclude_posts_id',
      [
        'label' => __( 'Exclude Posts by ID', 'leverage-extra' ),
        'type' => Controls_Manager::TEXTAREA,
        'rows' => 2,
      ]
    );

  $obj->end_controls_section();
}

function add_filter_content_control( $obj, $post_type ) {

  $obj->start_controls_section(
    'filter_content',
      [
        'label' => 'Filter',
        'tab' => Controls_Manager::TAB_CONTENT,
      ]
    );

    $obj->add_control(
      'display_filter',
      [
        'label' => esc_attr__( 'Filter', 'leverage-extra' ),
        'type'  => Controls_Manager::SWITCHER,
        'label_on' => esc_attr__( 'Show', 'leverage-extra' ),
        'label_off' => esc_attr__( 'Hide', 'leverage-extra' ),
        'return_value' => 'yes',
      ]
    );

    $obj->add_control(
      'display_all_button',
      [
        'label' => esc_attr__( 'All Button', 'leverage-extra' ),
        'type'  => Controls_Manager::SWITCHER,
        'label_on' => esc_attr__( 'Show', 'leverage-extra' ),
        'label_off' => esc_attr__( 'Hide', 'leverage-extra' ),
        'return_value' => 'yes',
        'default' => 'yes',
        'condition' => [
          'display_filter' => 'yes'
        ],
      ]
    );			
  
    $obj->add_control(
      'all_button_text',
      [
        'label' => __( 'Text', 'leverage-extra' ),
        'type' => Controls_Manager::TEXT,
        'default' => __( 'All', 'leverage-extra' ),
        'condition' => [
          'display_filter' => 'yes',
          'display_all_button' => 'yes'
        ],
      ]
    );

    $obj->add_control( 
      'filter_categories',
      [
        'label' => esc_attr__( 'Categories', 'leverage-extra' ),
        'label_block' => true,
        'type' => \Elementor\Controls_Manager::SELECT2,
        'multiple' => true,
        'options' => leverage_get_categories( $post_type ),
        'default' => 'all',
        'condition' => [
          'display_filter' => 'yes'
        ],
      ]
    );

    $obj->add_control(
      'filter_position',
      [
        'label' => __( 'Position', 'leverage-extra' ),
        'type' => Controls_Manager::CHOOSE,
        'options' => [
          'left' => [
            'title' => __( 'Left', 'leverage-extra' ),
            'icon' => 'eicon-h-align-left',
          ],
          'center' => [
            'title' => __( 'Center', 'leverage-extra' ),
            'icon' => 'eicon-h-align-center',
          ],
          'right' => [
            'title' => __( 'Right', 'leverage-extra' ),
            'icon' => 'eicon-h-align-right',
          ],
        ],
        'default' => 'center',
        'toggle' => true,
        'condition' => [
          'display_filter' => 'yes'
        ],
      ]
    );

  $obj->end_controls_section();
}

function add_pagination_content_control( $obj ) {

  $obj->start_controls_section(
    'pagination_content',
      [
        'label' => 'Pagination',
        'tab' => Controls_Manager::TAB_CONTENT,
      ]
    );

    $obj->add_control(
      'display_pagination',
      [
        'label' => esc_attr__( 'Pagination', 'leverage-extra' ),
        'type'  => Controls_Manager::SWITCHER,
        'label_on' => esc_attr__( 'Show', 'leverage-extra' ),
        'label_off' => esc_attr__( 'Hide', 'leverage-extra' ),
        'return_value' => 'yes',
        'default' => 'yes',
      ]
    );

    $obj->add_control(
      'pagination_position',
      [
        'label' => __( 'Position', 'leverage-extra' ),
        'type' => Controls_Manager::CHOOSE,
        'options' => [
          'start' => [
            'title' => __( 'Left', 'leverage-extra' ),
            'icon' => 'eicon-h-align-left',
          ],
          'center' => [
            'title' => __( 'Center', 'leverage-extra' ),
            'icon' => 'eicon-h-align-center',
          ],
          'end' => [
            'title' => __( 'Right', 'leverage-extra' ),
            'icon' => 'eicon-h-align-right',
          ],
        ],
        'default' => 'center',
        'toggle' => true,
        'condition' => [
          'display_pagination' => 'yes'
        ],
      ]
    );

  $obj->end_controls_section();
}

function add_form_content_control( $obj ) {
  
  $obj->start_controls_section(
    'form_content',
      [
        'label' => 'Form',
        'tab' => Controls_Manager::TAB_CONTENT,
      ]
    );

    $obj->add_control(
      'contact_form_7_options',
      [
        'label' => __( 'Contact Form 7', 'leverage-extra' ),
        'type' => Controls_Manager::HEADING,
        'separator' => 'before',
      ]
    );
  
    $obj->add_control(
      'contact_form_7_shortcode',
      [
        'label' => __( 'Shortcode', 'leverage-extra' ),
        'type' => Controls_Manager::TEXTAREA,
        'placeholder' => __('[contact-form-7 id="123" title="Your Form"]', 'leverage-extra' ),
      ]
    );
    
    $obj->add_control(
      'button_type',
      [
        'label' => __( 'Button Style', 'leverage-extra' ),
        'type' => Controls_Manager::SELECT,
        'options' => [
          'primary-button' => __( 'Filled', 'leverage-extra' ),
          'dark-button' => __( 'Outlined', 'leverage-extra' ),
        ],
        'default' => 'primary-button',
      ]
    );

  $obj->end_controls_section();
}

function add_icon_list_content_control( $obj ) {

  $obj->start_controls_section(
    'icon_list_content',
      [
        'label' => 'Icon List',
        'tab' => Controls_Manager::TAB_CONTENT,
      ]
    );

    $repeater = new Repeater();
    
    $repeater->add_control(
      'icon',
      [
        'label' => __( 'Icon', 'leverage-extra' ),
        'type' => Controls_Manager::ICONS,
        'default' => [
          'value' => 'fas fa-star',
          'library' => 'solid',
        ],
      ]
    );
    
    $repeater->add_control(
      'text',
      [
        'label' => __( 'Text', 'leverage-extra' ),
        'type' => Controls_Manager::TEXTAREA,
        'rows' => 2,
      ]
    );
    
    $repeater->add_control(
      'text_alingment',
      [
        'label' => __( 'Text Alignment', 'leverage-extra' ),
        'type' => Controls_Manager::CHOOSE,
        'options' => [
          'left' => [
            'title' => __( 'Left', 'leverage-extra' ),
            'icon' => 'eicon-text-align-left',
          ],
          'center' => [
            'title' => __( 'Center', 'leverage-extra' ),
            'icon' => 'eicon-text-align-center',
          ],
          'right' => [
            'title' => __( 'Right', 'leverage-extra' ),
            'icon' => 'eicon-text-align-right',
          ],
        ],
        'default' => 'left',
        'toggle' => true,
      ]
    );

    $repeater->add_control(
      'link',
      [
        'label' => esc_attr__( 'Link', 'leverage-extra' ),
        'type'  => Controls_Manager::URL,
        'placeholder' => __( 'https://your-link.com', 'leverage-extra' ),
        'show_external' => true,
        'default' => [
          'url' => '#',
          'is_external' => true,
          'nofollow' => true,
        ],
      ]
    );
    
    $obj->add_control(
      'icon_list_items',
      [
        'show_label' => false,
        'type' => Controls_Manager::REPEATER,
        'fields' => $repeater->get_controls(),
        'default' => [
          [
            'icon' => [ 'value' => 'fas fa-star', 'library' => 'solid' ],
            'text' => 'List Item #1',
            'link' => [ 'url' => '#', 'is_external' => true, 'nofollow' => true ],
          ],
        ],
        'text_field' => '{{{ text }}}',
      ]
    );
    
  $obj->end_controls_section();
}

function add_check_list_content_control( $obj ) {

  $obj->start_controls_section(
    'check_list_content',
      [
        'label' => 'Check List',
        'tab' => Controls_Manager::TAB_CONTENT,
      ]
    );

    $repeater = new Repeater();
    
    $repeater->add_control(
      'icon',
      [
        'label' => __( 'Icon', 'leverage-extra' ),
        'type' => Controls_Manager::ICONS,
        'default' => [
          'value' => 'fas fa-star',
          'library' => 'solid',
        ],
      ]
    );
    
    $repeater->add_control(
      'text',
      [
        'label' => __( 'Text', 'leverage-extra' ),
        'type' => Controls_Manager::TEXTAREA,
        'rows' => 2,
      ]
    );
    
    $obj->add_control(
      'check_list_items',
      [
        'show_label' => false,
        'type' => Controls_Manager::REPEATER,
        'fields' => $repeater->get_controls(),
        'default' => [
          [
            'icon' => [ 'value' => 'fas fa-check', 'library' => 'solid' ],
            'text' => 'List Item #1',
          ],
          [
            'icon' => [ 'value' => 'fas fa-check', 'library' => 'solid' ],
            'text' => 'List Item #2',
          ],
          [
            'icon' => [ 'value' => 'fas fa-times', 'library' => 'solid' ],
            'text' => 'List Item #3',
          ],
        ],
        'text_field' => '{{{ text }}}',
      ]
    );
    
  $obj->end_controls_section();
}

function add_sale_tag_content_control( $obj ) {

  $obj->start_controls_section(
    'sale_tag_content',
      [
        'label' => 'Sale Tag',
        'tab' => Controls_Manager::TAB_CONTENT,
      ]
    );

    $obj->add_control(
      'display_sale_tag',
      [
        'label' => esc_attr__( 'Display', 'leverage-extra' ),
        'type'  => Controls_Manager::SWITCHER,
        'label_on' => esc_attr__('Show', 'leverage-extra'),
        'label_off' => esc_attr__('Hide', 'leverage-extra'),
        'return_value' => 'yes',
      ]
    );

    $obj->add_control(
      'sale_tag_text',
      [
        'label' => __( 'Sale Tag', 'leverage-extra' ),
        'type' => Controls_Manager::TEXT,
        'default' => esc_attr__( 'Most Popular', 'leverage-extra' ),
        'condition' => [
          'display_sale_tag' => [ 'yes' ]
        ],
      ]
    );

  $obj->end_controls_section();
}

function add_testimonial_carousel_content_control( $obj ) {

  $obj->start_controls_section(
    'carousel_content',
      [
        'label' => 'Carousel',
        'tab' => Controls_Manager::TAB_CONTENT,
      ]
    );
    
    $obj->add_control(
      'items_options',
      [
        'label' => __( 'Items', 'leverage-extra' ),
        'type' => Controls_Manager::HEADING,
      ]
    );

    $repeater = new Repeater();
    
    $repeater->add_control(
      'text_options',
      [
        'label' => __( 'Text', 'leverage-extra' ),
        'type' => Controls_Manager::HEADING,
      ]
    );

    $repeater->add_control(
      'heading',
      [
        'label' => __( 'Heading', 'leverage-extra' ),
        'type' => Controls_Manager::TEXTAREA,
        'rows' => 2,
        'default' => 'Item #1'
      ]
    );
  
    $repeater->add_control(
      'paragraph',
      [
        'label' => __( 'Paragraph', 'leverage-extra' ),
        'type' => Controls_Manager::TEXTAREA,
        'default' => 'Lorem ipsum dolor sit amet consectetur adipiscing elit.'
      ]
    );

    $repeater->add_control(
      'text_alingment',
      [
        'label' => __( 'Alignment', 'leverage-extra' ),
        'type' => Controls_Manager::CHOOSE,
        'options' => [
          'left' => [
            'title' => __( 'Left', 'leverage-extra' ),
            'icon' => 'eicon-text-align-left',
          ],
          'center' => [
            'title' => __( 'Center', 'leverage-extra' ),
            'icon' => 'eicon-text-align-center',
          ],
          'right' => [
            'title' => __( 'Right', 'leverage-extra' ),
            'icon' => 'eicon-text-align-right',
          ],
        ],
        'default' => 'left',
        'toggle' => true,
      ]
    );
    
    $obj->add_control(
      'carousel_items',
      [
        'show_label' => false,
        'type' => Controls_Manager::REPEATER,
        'fields' => $repeater->get_controls(),
        'default' => [
          [
            'heading' => 'Item #1',
            'paragraph' => 'Lorem ipsum dolor sit amet consectetur adipiscing elit',
          ],
          [
            'heading' => 'Item #2',
            'paragraph' => 'Lorem ipsum dolor sit amet consectetur adipiscing elit',
          ],
          [
            'heading' => 'Item #3',
            'paragraph' => 'Lorem ipsum dolor sit amet consectetur adipiscing elit',
          ],
        ],
        'text_field' => '{{{ heading }}}',
      ]
    );	
    
    $obj->add_control(
      'layout_options',
      [
        'label' => __( 'Layout', 'leverage-extra' ),
        'type' => Controls_Manager::HEADING,
        'separator' => 'before',
      ]
    );
    
    $obj->add_control(
      'columns',
      [
        'label' => __( 'Columns', 'leverage-extra' ),
        'type' => Controls_Manager::SLIDER,
        'range' => [
          'px' => [
            'min' => 1,
            'max' => 6,
          ],
        ],
        'default' => [
          'size' => 3,
        ],
      ]
    );

  $obj->end_controls_section();
}

function add_carousel_content_control( $obj ) {

  $obj->start_controls_section(
    'carousel_content',
      [
        'label' => 'Carousel',
        'tab' => Controls_Manager::TAB_CONTENT,
      ]
    );
    
    $obj->add_control(
      'slides_options',
      [
        'label' => __( 'Slides', 'leverage-extra' ),
        'type' => Controls_Manager::HEADING,
        'separator' => 'before',
      ]
    );

    $obj->add_control(
      'autoplay',
      [
        'label' => esc_attr__('Autoplay', 'leverage-extra'),
        'type'  => Controls_Manager::SWITCHER,
        'label_on' => esc_attr__('Yes', 'leverage-extra'),
        'label_off' => esc_attr__('No', 'leverage-extra'),
        'return_value' => 'yes',
      ]
    );

    $obj->add_control(
      'rotation_speed',
      [
        'label' => __( 'Rotation Speed', 'leverage-extra' ),
        'type' => Controls_Manager::SLIDER,
        'size_units' => [ '%' ],
        'range' => [
          '%' => [
            'min' => 1000,
            'max' => 25000,
            'step' => 500,
          ]
        ],
        'default' => [
          'unit' => '%',
          'size' => 10000,
        ],
      ]
    );

  $obj->end_controls_section();
}

function add_logo_carousel_content_control( $obj ) {

  $obj->start_controls_section(
    'carousel_content',
      [
        'label' => 'Carousel',
        'tab' => Controls_Manager::TAB_CONTENT,
      ]
    );
    
    $obj->add_control(
      'layout_options',
      [
        'label' => __( 'Layout', 'leverage-extra' ),
        'type' => Controls_Manager::HEADING,
      ]
    );
    
    $obj->add_control(
      'columns',
      [
        'label' => __( 'Columns', 'leverage-extra' ),
        'type' => Controls_Manager::SLIDER,
        'range' => [
          'px' => [
            'min' => 1,
            'max' => 6,
          ],
        ],
        'default' => [
          'size' => 3,
        ],
      ]
    );
    
    $obj->add_control(
      'slides_options',
      [
        'label' => __( 'Slides', 'leverage-extra' ),
        'type' => Controls_Manager::HEADING,
        'separator' => 'before',
      ]
    );

    $obj->add_control(
      'autoplay',
      [
        'label' => esc_attr__('Autoplay', 'leverage-extra'),
        'type'  => Controls_Manager::SWITCHER,
        'label_on' => esc_attr__('Yes', 'leverage-extra'),
        'label_off' => esc_attr__('No', 'leverage-extra'),
        'return_value' => 'yes',
      ]
    );

    $obj->add_control(
      'rotation_speed',
      [
        'label' => __( 'Rotation Speed', 'leverage-extra' ),
        'type' => Controls_Manager::SLIDER,
        'size_units' => [ '%' ],
        'range' => [
          '%' => [
            'min' => 1000,
            'max' => 25000,
            'step' => 500,
          ]
        ],
        'default' => [
          'unit' => '%',
          'size' => 10000,
        ],
      ]
    );

    $repeater = new Repeater();

    $repeater->add_control(
      'image',
      [
        'label' => __( 'Image', 'leverage-extra' ),
        'type' => Controls_Manager::MEDIA,
        'default' => [
          'url' => Utils::get_placeholder_image_src(),
        ],
      ]
    );
  
    $repeater->add_control(
      'title',
      [
        'label' => __( 'Title', 'leverage-extra' ),
        'label_block' => true,
        'type' => Controls_Manager::TEXT,
        'default' => 'Client #1'
      ]
    );
  
    $repeater->add_control(
      'link',
      [
        'label' => esc_attr__( 'Link', 'leverage-extra' ),
        'type'  => Controls_Manager::URL,
        'placeholder' => __( 'https://your-link.com', 'leverage-extra' ),
        'show_external' => true,
        'default' => [
          'url' => '#',
          'is_external' => true,
          'nofollow' => true,
         ],
      ]
    );
    
    $obj->add_control(
      'carousel_items',
      [
        'show_label' => false,
        'type' => Controls_Manager::REPEATER,
        'fields' => $repeater->get_controls(),
        'default' => [
          [
            'image' => Utils::get_placeholder_image_src(),
            'title' => 'Client #1',
            'link' => '#',
          ],
          [
            'image' => Utils::get_placeholder_image_src(),
            'title' => 'Client #2',
            'link' => '#',
          ],
          [
            'image' => Utils::get_placeholder_image_src(),
            'title' => 'Client #3',
            'link' => '#',
          ],
          [
            'image' => Utils::get_placeholder_image_src(),
            'title' => 'Client #4',
            'link' => '#',
          ],
          [
            'image' => Utils::get_placeholder_image_src(),
            'title' => 'Client #5',
            'link' => '#',
          ],
          [
            'image' => Utils::get_placeholder_image_src(),
            'title' => 'Client #6',
            'link' => '#',
          ],
        ],
        'title_field' => '{{{ title }}}',
      ]
    );

  $obj->end_controls_section();
}