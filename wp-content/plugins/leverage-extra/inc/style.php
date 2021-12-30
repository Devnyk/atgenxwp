<?php
/**
 * @package Leverage Extra
 */

namespace LVR\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Core\Schemes;

function add_slider_style_control( $obj, $wrapper ) {

  $obj->start_controls_section(
    'slider_style',
      [
        'label' => __( 'Slider', 'leverage-extra' ),
        'tab' => Controls_Manager::TAB_STYLE,
      ]
    );
    
    $obj->add_control(
      'slider_background_color',
      [
        'label' => __( 'Background Color', 'leverage-extra' ),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} ' . $wrapper => 'background-color: {{VALUE}};',
        ],
      ]
    );

  $obj->end_controls_section();
}

function add_slider_image_style_control( $obj, $wrapper, $class ) {

  $obj->start_controls_section(
    'image_style',
      [
        'label' => __( 'Image', 'leverage-extra' ),
        'tab' => Controls_Manager::TAB_STYLE,
      ]
    );

		$obj->add_responsive_control(
			'image_opacity',
			[
				'label' => __( 'Opacity', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
        'range' => [
          'px' => [
            'min' => 0,
            'max' => 1,
            'step' => 0.1,
          ]
        ],
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'desktop_default' => [
					'size' => 1,
					'unit' => 'px',
				],
				'tablet_default' => [
					'size' => 1,
					'unit' => 'px',
				],
				'mobile_default' => [
					'size' => 0.7,
					'unit' => 'px',
				],
        'selectors' => [
          '{{WRAPPER}} ' . $wrapper . ' ' . $class => 'opacity: {{SIZE}};',
        ],
			]
		);

  $obj->end_controls_section();
}

function add_outline_style_control( $obj, $wrapper, $class ) {

  $obj->start_controls_section(
    'outline_style',
      [
        'label' => __( 'Outline', 'leverage-extra' ),
        'tab' => Controls_Manager::TAB_STYLE,
      ]
    );

    $obj->add_control(
      'outline_color',
      [
        'label' => __( 'Color', 'leverage-extra' ),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} ' . $class . ':before' => 'border-image: linear-gradient(to right, transparent 55%, {{VALUE}} 55%, {{VALUE}} 100%) 30;',
          '{{WRAPPER}} ' . $class . ':after' => 'border-image: linear-gradient(to bottom, transparent 83%, {{VALUE}} 83%, {{VALUE}} 100%) 30;',
        ],
      ]
    );

    $obj->add_control(
      'outline_rotation',
      [
        'label' => __( 'Rotation', 'leverage-extra' ),
        'type' => Controls_Manager::SLIDER,
        'size_units' => [ 'px' ],
        'range' => [
          'px' => [
            'min' => 0,
            'max' => 360,
            'step' => 1,
          ]
        ],
        'default' => [
          'size' => -15,
        ],
        'selectors' => [
          '{{WRAPPER}} ' . $class . ':before' => 'transform: rotate({{SIZE}}deg);',
          '{{WRAPPER}} ' . $class . ':after' => 'transform: rotate({{SIZE}}deg);',
        ],
      ]
    ); 

    $obj->add_control(
      'outline_thickness',
      [
        'label' => __( 'Thickness', 'leverage-extra' ),
        'type' => Controls_Manager::SLIDER,
        'size_units' => [ 'px' ],
        'range' => [
          'px' => [
            'min' => 1,
            'max' => 100,
            'step' => 1,
          ]
        ],
        'default' => [
          'size' => 4,
        ],
        'selectors' => [
          '{{WRAPPER}} ' . $class . ':before' => 'border-width: {{SIZE}}{{UNIT}};',
          '{{WRAPPER}} ' . $class . ':after' => 'border-width: {{SIZE}}{{UNIT}};',
        ],
      ]
    ); 

  $obj->end_controls_section();
}

function add_vertical_line_style_control( $obj, $wrapper ) {
 
  $obj->start_controls_section(
    'vertical_line_style',
      [
        'label' => __( 'Vertical Line', 'leverage-extra' ),
        'tab' => Controls_Manager::TAB_STYLE,
      ]
    );

    $obj->add_group_control(
      Group_Control_Background::get_type(),
      [
        'name' => 'vertical_line_gradient_color',
        'label' => __( 'Line Gradient Color', 'leverage-extra' ),
        'types' => [ 'gradient' ],
        'selector' => '{{WRAPPER}} ' . $wrapper,
      ]
    );
    
    $obj->add_control(
      'vertical_line_width',
      [
        'label' => __( 'Width', 'leverage-extra' ),
        'type' => Controls_Manager::SLIDER,
        'size_units' => [ '%' ],
        'range' => [
          '%' => [
            'min' => 1,
            'max' => 200,
            'step' => 1,
          ]
        ],
        'default' => [
          'size' => 100,
        ],
        'selectors' => [
          '{{WRAPPER}} ' . $wrapper => 'height: {{SIZE}}{{UNIT}};',
        ],
      ]
    ); 
    
    $obj->add_control(
      'vertical_line_thickness',
      [
        'label' => __( 'Thickness', 'leverage-extra' ),
        'type' => Controls_Manager::SLIDER,
        'size_units' => [ 'px' ],
        'range' => [
          'px' => [
            'min' => 1,
            'max' => 50,
            'step' => 1,
          ]
        ],
        'default' => [
          'size' => 5,
        ],
        'selectors' => [
          '{{WRAPPER}} ' . $wrapper => 'width: {{SIZE}}{{UNIT}};',
        ],
      ]
    ); 

  $obj->end_controls_section();
}

function add_horizontal_line_style_control( $obj, $wrapper ) {
 
  $obj->start_controls_section(
    'horizontal_line_style',
      [
        'label' => __( 'Horizontal Line', 'leverage-extra' ),
        'tab' => Controls_Manager::TAB_STYLE,
      ]
    );

    $obj->add_group_control(
      Group_Control_Background::get_type(),
      [
        'name' => 'horizontal_line_gradient_color',
        'label' => __( 'Line Gradient Color', 'leverage-extra' ),
        'types' => [ 'gradient' ],
        'selector' => '{{WRAPPER}} ' . $wrapper,
      ]
    );
    
    $obj->add_control(
      'horizontal_line_width',
      [
        'label' => __( 'Width', 'leverage-extra' ),
        'type' => Controls_Manager::SLIDER,
        'size_units' => [ '%' ],
        'range' => [
          '%' => [
            'min' => 1,
            'max' => 100,
            'step' => 1,
          ]
        ],
        'default' => [
          'size' => 50,
        ],
        'selectors' => [
          '{{WRAPPER}} ' . $wrapper => 'width: {{SIZE}}{{UNIT}};',
        ],
      ]
    ); 
    
    $obj->add_control(
      'horizontal_line_thickness',
      [
        'label' => __( 'Thickness', 'leverage-extra' ),
        'type' => Controls_Manager::SLIDER,
        'size_units' => [ 'px' ],
        'range' => [
          'px' => [
            'min' => 1,
            'max' => 50,
            'step' => 1,
          ]
        ],
        'default' => [
          'size' => 5,
        ],
        'selectors' => [
          '{{WRAPPER}} ' . $wrapper => 'height: {{SIZE}}{{UNIT}};',
        ],
      ]
    ); 

  $obj->end_controls_section();
}

function add_feature_style_control( $obj, $class ) {
 
  $obj->start_controls_section(
    'feature_style',
      [
        'label' => __( 'Feature', 'leverage-extra' ),
        'tab' => Controls_Manager::TAB_STYLE,
      ]
    );

    $obj->add_group_control(
      Group_Control_Background::get_type(),
      [
        'name' => 'feature_gradient_color',
        'label' => __( 'Feature Color', 'leverage-extra' ),
        'types' => [ 'gradient' ],
        'selector' => '{{WRAPPER}} ' . $class,
      ]
    );
    
    $obj->add_control(
      'feature_width',
      [
        'label' => __( 'Width', 'leverage-extra' ),
        'type' => Controls_Manager::SLIDER,
        'size_units' => [ '%' ],
        'range' => [
          '%' => [
            'min' => 1,
            'max' => 100,
            'step' => 1,
          ]
        ],
        'default' => [
          'size' => 50,
        ],
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'width: calc({{SIZE}}% + 10px);',
        ],
      ]
    ); 
    
    $obj->add_control(
      'feature_height',
      [
        'label' => __( 'Height', 'leverage-extra' ),
        'type' => Controls_Manager::SLIDER,
        'size_units' => [ '%' ],
        'range' => [
          '%' => [
            'min' => 1,
            'max' => 100,
            'step' => 1,
          ]
        ],
        'default' => [
          'size' => 50,
        ],
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'height: calc({{SIZE}}% + 10px);',
        ],
      ]
    ); 
    
    $obj->add_control(
      'feature_thickness',
      [
        'label' => __( 'Thickness', 'leverage-extra' ),
        'type' => Controls_Manager::SLIDER,
        'size_units' => [ 'px' ],
        'range' => [
          'px' => [
            'min' => 0,
            'max' => 10,
            'step' => 1,
          ]
        ],
        'default' => [
          'size' => 0,
        ],
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'margin: {{SIZE}}{{UNIT}};',
        ],
      ]
    );

  $obj->end_controls_section();
}

function add_block_style_control( $obj, $class ) {

  $obj->start_controls_section(
    'block_style',
      [
        'label' => __( 'Block', 'leverage-extra' ),
        'tab' => Controls_Manager::TAB_STYLE,
      ]
    );

    $obj->start_controls_tabs(
      'block_tabs'
      );

      $obj->start_controls_tab(
        'block_normal_tab',
          [
            'label' => __( 'Normal', 'leverage-extra' ),
          ]
        );
    
        $obj->add_control(
          'block_background_color',
          [
            'label' => __( 'Background Color', 'leverage-extra' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
              '{{WRAPPER}} ' . $class => 'background-color: {{VALUE}};',
            ],
          ]
        );

      $obj->end_controls_tab();

      $obj->start_controls_tab(
        'block_hover_tab',
          [
            'label' => __( 'Hover', 'leverage-extra' ),
          ]
        );
    
        $obj->add_group_control(
          Group_Control_Background::get_type(),
          [
            'name' => 'block_gradient_hover_color',
            'label' => __( 'Gradient Color', 'leverage-extra' ),
            'types' => [ 'gradient' ],
            'selector' => '{{WRAPPER}} ' . $class . ':not(.no-hover):hover',
          ]
        );
    
        $obj->add_control(
          'block_general_hover_color',
          [
            'label' => __( 'General Colors', 'leverage-extra' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
              '{{WRAPPER}} ' . $class . ':not(.no-hover):hover .icon' => 'color: {{VALUE}}; -webkit-text-fill-color: {{VALUE}};',
              '{{WRAPPER}} ' . $class . ':not(.no-hover):hover h4' => 'color: {{VALUE}};',
              '{{WRAPPER}} ' . $class . ':not(.no-hover):hover p' => 'color: {{VALUE}};',
              '{{WRAPPER}} ' . $class . ':not(.no-hover):hover .action-icon' => 'color: {{VALUE}}; -webkit-text-fill-color: {{VALUE}};',
            ],
          ]
        );

      $obj->end_controls_tab();

    $obj->end_controls_tabs();

    $obj->add_control(
      'block_margin',
      [
        'label' => __( 'Margin', 'leverage-extra' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', 'em', 'rem', '%' ],
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );

    $obj->add_control(
      'block_padding',
      [
        'label' => __( 'Padding', 'leverage-extra' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', 'em', 'rem', '%' ],
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );
    
    $obj->add_control(
      'block_border_radius',
      [
        'label' => __( 'Border Radius', 'leverage-extra' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );

    $obj->add_group_control(
      Group_Control_Border::get_type(),
      [
        'name' => 'block_border',
        'label' => __( 'Border', 'leverage-extra' ),
        'selector' => '{{WRAPPER}} ' . $class,
      ]
    );

  $obj->end_controls_section();
}

function add_block_mask_style_control( $obj, $class ) {

  $obj->start_controls_section(
    'block_style',
      [
        'label' => __( 'Block', 'leverage-extra' ),
        'tab' => Controls_Manager::TAB_STYLE,
      ]
    );

    $obj->start_controls_tabs(
      'block_tabs'
      );

      $obj->start_controls_tab(
        'block_normal_tab',
          [
            'label' => __( 'Normal', 'leverage-extra' ),
          ]
        );
    
        $obj->add_control(
          'block_background_color',
          [
            'label' => __( 'Background Color', 'leverage-extra' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
              '{{WRAPPER}} ' . $class . ' .image-over:before' => 'background-color: {{VALUE}};',
            ],
          ]
        );

      $obj->end_controls_tab();

      $obj->start_controls_tab(
        'block_hover_tab',
          [
            'label' => __( 'Hover', 'leverage-extra' ),
          ]
        );
    
        $obj->add_group_control(
          Group_Control_Background::get_type(),
          [
            'name' => 'block_gradient_hover_color',
            'label' => __( 'Gradient Color', 'leverage-extra' ),
            'types' => [ 'gradient' ],
            'selector' => '{{WRAPPER}} ' . $class . '.card:hover .image-over:before',
          ]
        );
    
        $obj->add_control(
          'block_general_hover_color',
          [
            'label' => __( 'General Colors', 'leverage-extra' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
              '{{WRAPPER}} ' . $class . ':not(.no-hover):hover h4' => 'color: {{VALUE}};',
              '{{WRAPPER}} ' . $class . ':not(.no-hover):hover p' => 'color: {{VALUE}};',
              '{{WRAPPER}} ' . $class . ':not(.no-hover):hover .post-metadata' => 'color: {{VALUE}};',
              '{{WRAPPER}} ' . $class . ':not(.no-hover):hover .post-metadata .post-metadata-icon' => 'color: {{VALUE}}; -webkit-text-fill-color: {{VALUE}};',
            ],
          ]
        );

      $obj->end_controls_tab();

    $obj->end_controls_tabs();

    $obj->add_control(
      'block_margin',
      [
        'label' => __( 'Margin', 'leverage-extra' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', 'em', 'rem', '%' ],
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );

    $obj->add_control(
      'block_padding',
      [
        'label' => __( 'Padding', 'leverage-extra' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', 'em', 'rem', '%' ],
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );
    
    $obj->add_control(
      'block_border_radius',
      [
        'label' => __( 'Border Radius', 'leverage-extra' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );

    $obj->add_group_control(
      Group_Control_Border::get_type(),
      [
        'name' => 'block_border',
        'label' => __( 'Border', 'leverage-extra' ),
        'selector' => '{{WRAPPER}} ' . $class,
      ]
    );

  $obj->end_controls_section();
}

function add_block_image_style_control( $obj, $class ) {

  $obj->start_controls_section(
    'block_style',
      [
        'label' => __( 'Block', 'leverage-extra' ),
        'tab' => Controls_Manager::TAB_STYLE,
      ]
    );

    $obj->add_control(
      'block_min_height',
      [
        'label' => __( 'Min Height', 'leverage-extra' ),
        'type' => Controls_Manager::SLIDER,
        'size_units' => [ 'px' ],
        'range' => [
          'px' => [
            'min' => 200,
            'max' => 800,
            'step' => 1,
          ],
        ],
        'default' => [
          'unit' => 'px',
          'size' => 360,
        ],
        'selectors' => [
          '{{WRAPPER}} ' . $class . ' .image-over img' => 'min-height: {{SIZE}}{{UNIT}};',
        ],
      ]
    );
    
    $obj->add_control(
      'block_background_color',
      [
        'label' => __( 'Background Color', 'leverage-extra' ),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'background-color: {{VALUE}};',
        ],
      ]
    );

    $obj->add_control(
      'block_margin',
      [
        'label' => __( 'Margin', 'leverage-extra' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', 'em', 'rem', '%' ],
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );

    $obj->add_control(
      'block_padding',
      [
        'label' => __( 'Padding', 'leverage-extra' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', 'em', 'rem', '%' ],
        'selectors' => [
          '{{WRAPPER}} ' . $class . ' .card-body' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
          '{{WRAPPER}} ' . $class . ' .card-footer' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );
    
    $obj->add_control(
      'block_border_radius',
      [
        'label' => __( 'Border Radius', 'leverage-extra' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
          '{{WRAPPER}} ' . $class . ' .image-over img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
          '{{WRAPPER}} ' . $class . ' .image-over img:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );

    $obj->add_group_control(
      Group_Control_Border::get_type(),
      [
        'name' => 'block_border',
        'label' => __( 'Border', 'leverage-extra' ),
        'selector' => '{{WRAPPER}} ' . $class,
      ]
    );

  $obj->end_controls_section();
}

function add_pre_title_style_control( $obj, $class ) {

  $obj->start_controls_section(
    'pre_title_style',
      [
        'label' => __( 'Pre-Title', 'leverage-extra' ),
        'tab' => Controls_Manager::TAB_STYLE,
      ]
    );
    
    $obj->add_group_control(
      Group_Control_Typography::get_type(),
      [
        'name' => 'pre_title_typography',
        'selector' => '{{WRAPPER}} ' . $class,
      ]
    );
    
    $obj->add_control(
      'pre_title_text_color',
      [
        'label' => __( 'Text Color', 'leverage-extra' ),
        'type' => Controls_Manager::COLOR,
        'default' => '#00a6a6',
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'color: {{VALUE}};',
        ],
      ]
    );
    
    $obj->add_control(
      'pre_title_background_color',
      [
        'label' => __( 'Background Color', 'leverage-extra' ),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'background-color: {{VALUE}};',
        ],
      ]
    );

    $obj->add_control(
      'pre_title_margin',
      [
        'label' => __( 'Margin', 'leverage-extra' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', 'em', 'rem', '%' ],
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );

    $obj->add_control(
      'pre_title_padding',
      [
        'label' => __( 'Padding', 'leverage-extra' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', 'em', 'rem', '%' ],
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );
    
    $obj->add_control(
      'pre_title_border_radius',
      [
        'label' => __( 'Border Radius', 'leverage-extra' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );

    $obj->add_group_control(
      Group_Control_Border::get_type(),
      [
        'name' => 'pre_title_border',
        'label' => __( 'Border', 'leverage-extra' ),
        'selector' => '{{WRAPPER}} ' . $class,
      ]
    );

  $obj->end_controls_section();
}

function add_heading_style_control( $obj, $name = 'heading', $title = 'Heading', $condition = null, $wrapper = null, $class ) {

  $obj->start_controls_section(
    $name . '_style',
      [
        'label' => __( $title, 'leverage-extra' ),
        'tab' => Controls_Manager::TAB_STYLE,
      ]
    );
    
    $obj->add_group_control(
      Group_Control_Typography::get_type(),
      [
        'name' => $name . '_typography',
        'selector' => '{{WRAPPER}} ' . $class,
        'scheme' => Schemes\Typography::TYPOGRAPHY_1,
      ]
    );
    
    $obj->add_control(
      $name . '_text_color',
      [
        'label' => __( 'Text Color', 'leverage-extra' ),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'color: {{VALUE}};',
        ],
      ]
    );

    $obj->add_control(
      $name . '_margin',
      [
        'label' => __( 'Margin', 'leverage-extra' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', 'em', 'rem', '%' ],
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );

  $obj->end_controls_section();
}

function add_heading_gradient_style_control( $obj, $name = 'heading', $title = 'Heading', $condition = null, $wrapper = null, $class ) {

  $obj->start_controls_section(
    $name . '_style',
      [
        'label' => __( $title, 'leverage-extra' ),
        'tab' => Controls_Manager::TAB_STYLE,
      ]
    );
    
    $obj->add_group_control(
      Group_Control_Typography::get_type(),
      [
        'name' => $name . '_typography',
        'selector' => '{{WRAPPER}} ' . $class,
        'scheme' => Schemes\Typography::TYPOGRAPHY_1,
      ]
    );

    $obj->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => $name . '_gradient_color',
				'label' => __( 'Gradient Color', 'leverage-extra' ),
				'types' => [ 'gradient' ],
        'selector' => '{{WRAPPER}} ' . $class,
			]
		);

    $obj->add_control(
      $name . '_margin',
      [
        'label' => __( 'Margin', 'leverage-extra' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', 'em', 'rem', '%' ],
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );

  $obj->end_controls_section();
}

function add_paragraph_style_control( $obj, $name = 'paragraph', $title = 'Paragraph', $condition = null, $wrapper = null, $class ) {

  $obj->start_controls_section(
    $name . '_style',
      [
        'label' => __( $title, 'leverage-extra' ),
        'tab' => Controls_Manager::TAB_STYLE,
      ]
    );
    
    $obj->add_group_control(
      Group_Control_Typography::get_type(),
      [
        'name' => $name . '_typography',
        'selector' => '{{WRAPPER}} ' . $class,
      ]
    );
    
    $obj->add_control(
      $name . '_text_color',
      [
        'label' => __( 'Text Color', 'leverage-extra' ),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'color: {{VALUE}};',
        ],
      ]
    );

    $obj->add_control(
      $name . '_margin',
      [
        'label' => __( 'Margin', 'leverage-extra' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', 'em', 'rem', '%' ],
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );

    $obj->add_control(
      $name . '_padding',
      [
        'label' => __( 'Padding', 'leverage-extra' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', 'em', 'rem', '%' ],
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );
    
    $obj->add_control(
      $name . '_border_radius',
      [
        'label' => __( 'Border Radius', 'leverage-extra' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );

    $obj->add_group_control(
      Group_Control_Border::get_type(),
      [
        'name' => $name . '_border',
        'label' => __( 'Border', 'leverage-extra' ),
        'selector' => '{{WRAPPER}} ' . $class,
      ]
    );

  $obj->end_controls_section();
}

function add_list_style_control( $obj, $name = 'list', $title = 'List', $condition = null, $wrapper = null, $class ) {

  $obj->start_controls_section(
    $name . '_style',
      [
        'label' => __( $title, 'leverage-extra' ),
        'tab' => Controls_Manager::TAB_STYLE,
      ]
    );

    $obj->add_control(
      $name . '_padding',
      [
        'label' => __( 'Padding', 'leverage-extra' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', 'em', 'rem', '%' ],
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );
    
    $obj->add_control(
      $name . '_border_radius',
      [
        'label' => __( 'Border Radius', 'leverage-extra' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );

    $obj->add_group_control(
      Group_Control_Border::get_type(),
      [
        'name' => $name . '_border',
        'label' => __( 'Border', 'leverage-extra' ),
        'selector' => '{{WRAPPER}} ' . $class,
      ]
    );

  $obj->end_controls_section();
}

function add_number_style_control( $obj, $class ) {

  $obj->start_controls_section(
    'number_style',
      [
        'label' => __( 'Number', 'leverage-extra' ),
        'tab' => Controls_Manager::TAB_STYLE,
      ]
    );
    
    $obj->add_group_control(
      Group_Control_Typography::get_type(),
      [
        'name' => 'number_typography',
        'selector' => '{{WRAPPER}} ' . $class,
      ]
    );

    $obj->add_group_control(
      Group_Control_Background::get_type(),
      [
        'name' => 'number_gradient_color',
        'label' => __( 'Gradient Color', 'leverage-extra' ),
        'types' => [ 'gradient' ],
        'selector' => '{{WRAPPER}} ' . $class,
      ]
    );

    $obj->add_control(
      'number_margin',
      [
        'label' => __( 'Margin', 'leverage-extra' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', 'em', 'rem', '%' ],
        'default' => [ 'top' => 0, 'right' => 0, 'bottom' => 0, 'left' => 0, 'unit' => 'px', 'isLinked' => true ],
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );

  $obj->end_controls_section();
}

function add_line_style_control( $obj, $class ) {

  $obj->start_controls_section(
    'line_style',
      [
        'label' => __( 'Line', 'leverage-extra' ),
        'tab' => Controls_Manager::TAB_STYLE,
      ]
    );
    
    $obj->add_control(
      'line_color',
      [
        'label' => __( 'Color', 'leverage-extra' ),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} ' . $class . ':before, {{WRAPPER}} ' . $class . ':after' => 'background-color: {{VALUE}};',
        ],
      ]
    );

    $obj->add_control(
      'line_height',
      [
        'label' => __( 'Height', 'leverage-extra' ),
        'type' => Controls_Manager::SLIDER,
        'size_units' => [ 'px' ],
        'range' => [
          'px' => [
            'min' => 0,
            'max' => 100,
            'step' => 1,
          ],
        ],
        'default' => [
          'unit' => 'px',
          'size' => 5,
        ],
        'selectors' => [
          '{{WRAPPER}} ' . $class . ':before, {{WRAPPER}} ' . $class . ':after' => 'height: {{SIZE}}{{UNIT}};',
        ],
      ]
    );

  $obj->end_controls_section();
}

function add_progress_bar_style_control( $obj ) {

  $obj->start_controls_section(
    'progress_bar_style',
      [
        'label' => __( 'Progress Bar', 'leverage-extra' ),
        'tab' => Controls_Manager::TAB_STYLE,
      ]
    );
    
    $obj->add_control(
      'progress_bar_primary_color',
      [
        'label' => __( 'Primary Color', 'leverage-extra' ),
        'type' => Controls_Manager::COLOR,
      ]
    );
    
    $obj->add_control(
      'progress_bar_secondary_color',
      [
        'label' => __( 'Secondary Color', 'leverage-extra' ),
        'type' => Controls_Manager::COLOR,
      ]
    );
    
    $obj->add_control(
      'progress_bar_empty_color',
      [
        'label' => __( 'Empty Color', 'leverage-extra' ),
        'type' => Controls_Manager::COLOR,
        'default' => '#cccccc'
      ]
    );

  $obj->end_controls_section();
}

function add_button_style_control( $obj, $name, $title, $condition, $class ) {

  $obj->start_controls_section(
    $name . '_style',
      [
        'label' => __( $title, 'leverage-extra' ),
        'tab' => Controls_Manager::TAB_STYLE,
        'condition' => $condition
      ]
    );
    
    $obj->add_group_control(
      Group_Control_Typography::get_type(),
      [
        'name' => $name . '_typography',
        'selector' => '{{WRAPPER}} ' . $class,
        'scheme' => Schemes\Typography::TYPOGRAPHY_2,
      ]
    );
    
    $obj->start_controls_tabs(
      $name . '_tabs'
      );

      $obj->start_controls_tab(
        $name . '_normal_tab',
          [
            'label' => __( 'Normal', 'leverage-extra' ),
          ]
        );
    
        $obj->add_control(
          $name . '_color',
          [
            'label' => __( 'Text Color', 'leverage-extra' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
              '{{WRAPPER}} ' . $class => 'color: {{VALUE}};',
            ],
          ]
        );
    
        $obj->add_control(
          $name . '_background_color',
          [
            'label' => __( 'Background Color', 'leverage-extra' ),
            'type' => Controls_Manager::COLOR,
            'condition' => [
              'button_type' => 'dark-button'
            ],
            'selectors' => [
              '{{WRAPPER}} ' . $class . ':after' => 'background-color: {{VALUE}};',
            ],
          ]
        );

        $obj->add_group_control(
          Group_Control_Background::get_type(),
          [
            'name' => $name . '_gradient_color',
            'label' => __( 'Gradient Color', 'leverage-extra' ),
            'types' => [ 'gradient' ],
            'condition' => [
              'button_type' => 'primary-button'
            ],
            'selector' => '{{WRAPPER}} ' . $class,
          ]
        );

        $obj->add_group_control(
          Group_Control_Background::get_type(),
          [
            'name' => $name . '_outlined_gradient_color',
            'label' => __( 'Gradient Color', 'leverage-extra' ),
            'types' => [ 'gradient' ],
            'condition' => [
              'button_type' => 'dark-button'
            ],
            'selector' => '{{WRAPPER}} ' . $class . ':before',
          ]
        );

        $obj->add_group_control(
          Group_Control_Border::get_type(),
          [
            'name' => $name . '_border',
            'label' => __( 'Border', 'leverage-extra' ),
            'selector' => '{{WRAPPER}} ' . $class,
          ]
        );

      $obj->end_controls_tab();

      $obj->start_controls_tab(
        $name . '_hover_tab',
          [
            'label' => __( 'Hover', 'leverage-extra' ),
          ]
        );
    
        $obj->add_control(
          $name . '_hover_color',
          [
            'label' => __( 'Text Color', 'leverage-extra' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
              '{{WRAPPER}} ' . $class . ':hover' => 'color: {{VALUE}} !important;',
            ],
          ]
        );

        $obj->add_group_control(
          Group_Control_Background::get_type(),
          [
            'name' => $name . '_gradient_hover_color',
            'label' => __( 'Gradient Color', 'leverage-extra' ),
            'types' => [ 'gradient' ],
            'condition' => [
              'button_type' => 'primary-button'
            ],
            'selector' => '{{WRAPPER}} ' . $class . ':hover',
          ]
        );

        $obj->add_group_control(
          Group_Control_Background::get_type(),
          [
            'name' => $name . '_outlined_gradient_border_hover_color',
            'label' => __( 'Gradient Color', 'leverage-extra' ),
            'types' => [ 'gradient' ],
            'condition' => [
              'button_type' => 'dark-button'
            ],
            'selector' => '{{WRAPPER}} ' . $class . ':hover:before',
          ]
        );

        $obj->add_group_control(
          Group_Control_Background::get_type(),
          [
            'name' => $name . '_outlined_gradient_hover_color',
            'label' => __( 'Gradient Color', 'leverage-extra' ),
            'types' => [ 'gradient' ],
            'condition' => [
              'button_type' => 'dark-button'
            ],
            'selector' => '{{WRAPPER}} ' . $class . ':hover:after',
          ]
        );

        $obj->add_group_control(
          Group_Control_Border::get_type(),
          [
            'name' => $name . '_hover_border',
            'label' => __( 'Border', 'leverage-extra' ),
            'selector' => '{{WRAPPER}} ' . $class . ':hover',
          ]
        );

      $obj->end_controls_tab();

    $obj->end_controls_tabs();
    
    $obj->add_control(
      $name . '_border_radius',
      [
        'label' => __( 'Border Radius', 'leverage-extra' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );

    $obj->add_control(
      $name . '_padding',
      [
        'label' => __( 'Padding', 'leverage-extra' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', 'em', 'rem', '%' ],
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );

    $obj->add_control(
      $name . '_margin',
      [
        'label' => __( 'Margin', 'leverage-extra' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', 'em', 'rem', '%' ],
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );

  $obj->end_controls_section();
}

function add_primary_button_style_control( $obj, $name, $title, $condition, $class ) {

  $obj->start_controls_section(
    $name . '_style',
      [
        'label' => __( $title, 'leverage-extra' ),
        'tab' => Controls_Manager::TAB_STYLE,
        'condition' => $condition
      ]
    );
    
    $obj->add_group_control(
      Group_Control_Typography::get_type(),
      [
        'name' => $name . '_typography',
        'selector' => '{{WRAPPER}} ' . $class,
        'scheme' => Schemes\Typography::TYPOGRAPHY_2,
      ]
    );
    
    $obj->start_controls_tabs(
      $name . '_tabs'
      );

      $obj->start_controls_tab(
        $name . '_normal_tab',
          [
            'label' => __( 'Normal', 'leverage-extra' ),
          ]
        );
    
        $obj->add_control(
          $name . '_color',
          [
            'label' => __( 'Text Color', 'leverage-extra' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
              '{{WRAPPER}} ' . $class => 'color: {{VALUE}};',
            ],
          ]
        );

        $obj->add_group_control(
          Group_Control_Background::get_type(),
          [
            'name' => $name . '_gradient_color',
            'label' => __( 'Gradient Color', 'leverage-extra' ),
            'types' => [ 'gradient' ],
            'selector' => '{{WRAPPER}} ' . $class,
          ]
        );

        $obj->add_group_control(
          Group_Control_Border::get_type(),
          [
            'name' => $name . '_border',
            'label' => __( 'Border', 'leverage-extra' ),
            'selector' => '{{WRAPPER}} ' . $class,
          ]
        );

      $obj->end_controls_tab();

      $obj->start_controls_tab(
        $name . '_hover_tab',
          [
            'label' => __( 'Hover', 'leverage-extra' ),
          ]
        );
    
        $obj->add_control(
          $name . '_hover_color',
          [
            'label' => __( 'Text Color', 'leverage-extra' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
              '{{WRAPPER}} ' . $class . ':hover' => 'color: {{VALUE}} !important;',
            ],
          ]
        );

        $obj->add_group_control(
          Group_Control_Background::get_type(),
          [
            'name' => $name . '_gradient_hover_color',
            'label' => __( 'Gradient Color', 'leverage-extra' ),
            'types' => [ 'gradient' ],
            'selector' => '{{WRAPPER}} ' . $class . ':hover',
          ]
        );

        $obj->add_group_control(
          Group_Control_Border::get_type(),
          [
            'name' => $name . '_hover_border',
            'label' => __( 'Border', 'leverage-extra' ),
            'selector' => '{{WRAPPER}} ' . $class . ':hover',
          ]
        );

      $obj->end_controls_tab();

    $obj->end_controls_tabs();
    
    $obj->add_control(
      $name . '_border_radius',
      [
        'label' => __( 'Border Radius', 'leverage-extra' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );

    $obj->add_control(
      $name . '_padding',
      [
        'label' => __( 'Padding', 'leverage-extra' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', 'em', 'rem', '%' ],
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );

    $obj->add_control(
      $name . '_margin',
      [
        'label' => __( 'Margin', 'leverage-extra' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', 'em', 'rem', '%' ],
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );

  $obj->end_controls_section();
}

function add_dark_button_style_control( $obj, $name, $title, $condition, $class ) {

  $obj->start_controls_section(
    $name . '_style',
      [
        'label' => __( $title, 'leverage-extra' ),
        'tab' => Controls_Manager::TAB_STYLE,
        'condition' => $condition
      ]
    );
    
    $obj->add_group_control(
      Group_Control_Typography::get_type(),
      [
        'name' => $name . '_typography',
        'selector' => '{{WRAPPER}} ' . $class,
        'scheme' => Schemes\Typography::TYPOGRAPHY_2,
      ]
    );
    
    $obj->start_controls_tabs(
      $name . '_tabs'
      );

      $obj->start_controls_tab(
        $name . '_normal_tab',
          [
            'label' => __( 'Normal', 'leverage-extra' ),
          ]
        );
    
        $obj->add_control(
          $name . '_color',
          [
            'label' => __( 'Text Color', 'leverage-extra' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
              '{{WRAPPER}} ' . $class => 'color: {{VALUE}};',
            ],
          ]
        );
    
        $obj->add_control(
          $name . '_background_color',
          [
            'label' => __( 'Background Color', 'leverage-extra' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
              '{{WRAPPER}} ' . $class . ':after' => 'background-color: {{VALUE}};',
            ],
          ]
        );

        $obj->add_group_control(
          Group_Control_Background::get_type(),
          [
            'name' => $name . '_outlined_gradient_color',
            'label' => __( 'Gradient Color', 'leverage-extra' ),
            'types' => [ 'gradient' ],
            'selector' => '{{WRAPPER}} ' . $class . ':before',
          ]
        );

        $obj->add_group_control(
          Group_Control_Border::get_type(),
          [
            'name' => $name . '_border',
            'label' => __( 'Border', 'leverage-extra' ),
            'selector' => '{{WRAPPER}} ' . $class,
          ]
        );

      $obj->end_controls_tab();

      $obj->start_controls_tab(
        $name . '_hover_tab',
          [
            'label' => __( 'Hover', 'leverage-extra' ),
          ]
        );
    
        $obj->add_control(
          $name . '_hover_color',
          [
            'label' => __( 'Text Color', 'leverage-extra' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
              '{{WRAPPER}} ' . $class . ':hover' => 'color: {{VALUE}} !important;',
            ],
          ]
        );

        $obj->add_group_control(
          Group_Control_Background::get_type(),
          [
            'name' => $name . '_outlined_gradient_border_hover_color',
            'label' => __( 'Gradient Color', 'leverage-extra' ),
            'types' => [ 'gradient' ],
            'selector' => '{{WRAPPER}} ' . $class . ':hover:before',
          ]
        );

        $obj->add_group_control(
          Group_Control_Background::get_type(),
          [
            'name' => $name . '_outlined_gradient_hover_color',
            'label' => __( 'Gradient Color', 'leverage-extra' ),
            'types' => [ 'gradient' ],
            'selector' => '{{WRAPPER}} ' . $class . ':hover:after',
          ]
        );

        $obj->add_group_control(
          Group_Control_Border::get_type(),
          [
            'name' => $name . '_hover_border',
            'label' => __( 'Border', 'leverage-extra' ),
            'selector' => '{{WRAPPER}} ' . $class . ':hover',
          ]
        );

      $obj->end_controls_tab();

    $obj->end_controls_tabs();
    
    $obj->add_control(
      $name . '_border_radius',
      [
        'label' => __( 'Border Radius', 'leverage-extra' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );

    $obj->add_control(
      $name . '_padding',
      [
        'label' => __( 'Padding', 'leverage-extra' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', 'em', 'rem', '%' ],
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );

    $obj->add_control(
      $name . '_margin',
      [
        'label' => __( 'Margin', 'leverage-extra' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', 'em', 'rem', '%' ],
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );

  $obj->end_controls_section();
}

function add_image_style_control( $obj, $wrapper, $class ) {

  $obj->start_controls_section(
    'image_style',
      [
        'label' => __( 'Image', 'leverage-extra' ),
        'tab' => Controls_Manager::TAB_STYLE,
      ]
    );

    $obj->add_control(
      'image_margin',
      [
        'label' => __( 'Margin', 'leverage-extra' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', 'em', 'rem', '%' ],
        'selectors' => [
          '{{WRAPPER}} ' . $wrapper => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );

    $obj->add_control(
      'image_padding',
      [
        'label' => __( 'Padding', 'leverage-extra' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', 'em', 'rem', '%' ],
        'selectors' => [
          '{{WRAPPER}} ' . $wrapper => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );
    
    $obj->add_control(
      'image_border_radius',
      [
        'label' => __( 'Border Radius', 'leverage-extra' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );

    $obj->add_group_control(
      Group_Control_Border::get_type(),
      [
        'name' => 'image_border',
        'label' => __( 'Border', 'leverage-extra' ),
        'selector' => '{{WRAPPER}} ' . $class,
      ]
    );

  $obj->end_controls_section();
}

function add_image_overlay_style_control( $obj, $wrapper, $class ) {

  $obj->start_controls_section(
    'image_overlay_style',
      [
        'label' => __( 'Image Overlay', 'leverage-extra' ),
        'tab' => Controls_Manager::TAB_STYLE,
      ]
    );

    $obj->start_controls_tabs(
      'image_overlay_tabs'
      );

      $obj->start_controls_tab(
        'image_overlay_normal_tab',
          [
            'label' => __( 'Normal', 'leverage-extra' ),
          ]
        );        

        $obj->add_control(
          'image_overlay_opacity',
          [
            'label' => __( 'Opacity Control', 'leverage-extra' ),
            'type' => Controls_Manager::SLIDER,
            'size_units' => [ 'px' ],
            'range' => [
              'px' => [
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
              ]
            ],
            'default' => [
              'size' => 1,
            ],
            'selectors' => [
              '{{WRAPPER}} ' . $class => 'opacity: {{SIZE}};',
            ],
          ]
        );
        
        $obj->add_control(
          'image_overlay_brightness',
          [
            'label' => __( 'Brightness', 'leverage-extra' ),
            'type' => Controls_Manager::SLIDER,
            'size_units' => [ 'px' ],
            'range' => [
              'px' => [
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
              ]
            ],
            'selectors' => [
              '{{WRAPPER}} ' . $class => 'filter: brightness({{SIZE}});',
            ],
          ]
        );     
        
        $obj->add_control(
          'image_overlay_invert',
          [
            'label' => __( 'Invert Color', 'leverage-extra' ),
            'type' => Controls_Manager::SLIDER,
            'size_units' => [ 'px' ],
            'range' => [
              'px' => [
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
              ]
            ],
            'selectors' => [
              '{{WRAPPER}} ' . $class => 'filter: invert({{SIZE}});',
            ],
          ]
        ); 

        $obj->add_control(
          'image_overlay_background_color',
          [
            'label' => __( 'Background Color', 'leverage-extra' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
              '{{WRAPPER}} ' . $wrapper => 'background-color: {{VALUE}};',
            ],
          ]
        );

        $obj->add_group_control(
          Group_Control_Border::get_type(),
          [
            'name' => 'image_overlay_border',
            'label' => __( 'Border', 'leverage-extra' ),
            'selector' => '{{WRAPPER}} ' . $class,
          ]
        );

      $obj->end_controls_tab();
      
      $obj->start_controls_tab(
        'image_overlay_hover_tab',
          [
            'label' => __( 'Hover', 'leverage-extra' ),
          ]
        );  

        $obj->add_control(
          'image_overlay_hover_opacity',
          [
            'label' => __( 'Opacity Control', 'leverage-extra' ),
            'type' => Controls_Manager::SLIDER,
            'size_units' => [ 'px' ],
            'range' => [
              'px' => [
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
              ]
            ],
            'default' => [
              'size' => 1,
            ],
            'selectors' => [
              '{{WRAPPER}} ' . $class . ':hover ' => 'opacity: {{SIZE}};',
              '{{WRAPPER}} ' . $wrapper . ':hover' . $class => 'opacity: {{SIZE}};',
              '{{WRAPPER}} .icon:hover + ' . $class => 'opacity: {{SIZE}};',
            ],
          ]
        );
        
        $obj->add_control(
          'image_overlay_hover_brightness',
          [
            'label' => __( 'Brightness', 'leverage-extra' ),
            'type' => Controls_Manager::SLIDER,
            'size_units' => [ 'px' ],
            'range' => [
              'px' => [
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
              ]
            ],
            'selectors' => [
              '{{WRAPPER}} ' . $class . ':hover ' => 'filter: brightness({{SIZE}});',
              '{{WRAPPER}} ' . $wrapper . ':hover' . $class => 'filter: brightness({{SIZE}});',
              '{{WRAPPER}} .icon:hover + ' . $class => 'filter: brightness({{SIZE}});',
            ],
          ]
        );     
        
        $obj->add_control(
          'image_overlay_hover_invert',
          [
            'label' => __( 'Invert Color', 'leverage-extra' ),
            'type' => Controls_Manager::SLIDER,
            'size_units' => [ 'px' ],
            'range' => [
              'px' => [
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
              ]
            ],
            'selectors' => [
              '{{WRAPPER}} ' . $class . ':hover ' => 'filter: invert({{SIZE}});',
              '{{WRAPPER}} ' . $wrapper . ':hover' . $class => 'filter: invert({{SIZE}});',
              '{{WRAPPER}} .icon:hover + ' . $class => 'filter: invert({{SIZE}});',
            ],
          ]
        ); 
    
        $obj->add_control(
          'image_overlay_background_hover_color',
          [
            'label' => __( 'Background Color', 'leverage-extra' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
              '{{WRAPPER}} ' . $wrapper . ':hover' => 'background-color: {{VALUE}};',
            ],
          ]
        );

        $obj->add_group_control(
          Group_Control_Border::get_type(),
          [
            'name' => 'image_overlay_hover_border',
            'label' => __( 'Border', 'leverage-extra' ),
            'selector' => '{{WRAPPER}} ' . $class,
          ]
        );

      $obj->end_controls_tab();

    $obj->end_controls_tabs();

    $obj->add_control(
      'image_overlay_margin',
      [
        'label' => __( 'Margin', 'leverage-extra' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', 'em', '%' ],
        'selectors' => [
          '{{WRAPPER}} ' . $wrapper => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );
    
    $obj->add_control(
      'image_overlay_border_radius',
      [
        'label' => __( 'Border Radius', 'leverage-extra' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'default' => [ 'top' => 4, 'right' => 4, 'bottom' => 4, 'left' => 4, 'unit' => 'px', 'isLinked' => true ],
        'selectors' => [
          '{{WRAPPER}} ' . $wrapper => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
          '{{WRAPPER}} ' . $class => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );

  $obj->end_controls_section();
}

function add_icon_style_control( $obj, $name, $title, $condition, $wrapper, $class ) {
  
  $obj->start_controls_section(
    $name . '_style',
      [
        'label' => __( $title, 'leverage-extra' ),
        'tab' => Controls_Manager::TAB_STYLE,
        'condition' => $condition,
      ]
    );

    $obj->add_control(
      $name . '_size',
      [
        'label' => __( 'Size', 'leverage-extra' ),
        'type' => Controls_Manager::SLIDER,
        'size_units' => [ 'px', 'em', 'rem', '%' ],
        'range' => [
          'px' => [
            'min' => 0,
            'max' => 500,
          ],
          'rem' => [
            'min' => 0,
            'max' => 100,
          ],
          '%' => [
            'min' => 0,
            'max' => 100,
          ],
        ],
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'width: auto; height: {{SIZE}}{{UNIT}}; font-size: {{SIZE}}{{UNIT}}; line-height: {{SIZE}}{{UNIT}};',
          '{{WRAPPER}} ' . $wrapper . ' svg' => ' width: auto; height: {{SIZE}}{{UNIT}}; font-size: {{SIZE}}{{UNIT}}; line-height: {{SIZE}}{{UNIT}};'
        ],
      ]
    );

    $obj->add_group_control(
      Group_Control_Background::get_type(),
      [
        'name' => $name . '_gradient_color',
        'label' => __( 'Gradient Color', 'leverage-extra' ),
        'types' => [ 'gradient' ],
        'selector' => '{{WRAPPER}} ' . $class,
      ]
    );

    $obj->add_control(
      $name . '_margin',
      [
        'label' => __( 'Margin', 'leverage-extra' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', 'em', 'rem', '%' ],
        'selectors' => [
          '{{WRAPPER}} ' . $wrapper => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );

  $obj->end_controls_section();
}

function add_simple_icon_style_control( $obj, $name, $title, $condition, $wrapper, $class ) {
  
  $obj->start_controls_section(
    $name . '_style',
      [
        'label' => __( $title, 'leverage-extra' ),
        'tab' => Controls_Manager::TAB_STYLE,
        'condition' => $condition,
      ]
    );

    $obj->add_control(
      $name . '_size',
      [
        'label' => __( 'Size', 'leverage-extra' ),
        'type' => Controls_Manager::SLIDER,
        'size_units' => [ 'px', 'em', 'rem', '%' ],
        'range' => [
          'px' => [
            'min' => 0,
            'max' => 500,
          ],
          'rem' => [
            'min' => 0,
            'max' => 100,
          ],
          '%' => [
            'min' => 0,
            'max' => 100,
          ],
        ],
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}; font-size: {{SIZE}}{{UNIT}}; line-height: {{SIZE}}{{UNIT}};',
          '{{WRAPPER}} ' . $wrapper . ' svg' => ' width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}; font-size: {{SIZE}}{{UNIT}}; line-height: {{SIZE}}{{UNIT}};'
        ],
      ]
    );

    $obj->add_control(
      $name . '_color',
      [
        'label' => __( 'Color', 'leverage-extra' ),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'color: {{VALUE}};',
        ],
      ]
    );
    
    $obj->add_control(
      $name . '_margin',
      [
        'label' => __( 'Margin', 'leverage-extra' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', 'em', 'rem', '%' ],
        'selectors' => [
          '{{WRAPPER}} ' . $wrapper => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );

  $obj->end_controls_section();
}

function add_play_icon_style_control( $obj, $wrapper, $class ) {

  $obj->start_controls_section(
    'play_icon_style',
      [
        'label' => __( 'Play Icon', 'leverage-extra' ),
        'tab' => Controls_Manager::TAB_STYLE,
      ]
    );

    $obj->start_controls_tabs(
      'play_icon_tabs'
      );

      $obj->start_controls_tab(
        'play_icon_normal_tab',
          [
            'label' => __( 'Normal', 'leverage-extra' ),
          ]
        );

        $obj->add_control(
          'play_icon_size',
          [
            'label' => __( 'Size', 'leverage-extra' ),
            'type' => Controls_Manager::SLIDER,
            'size_units' => [ 'px', 'rem', '%' ],
            'range' => [
              'px' => [
                'min' => 0,
                'max' => 500,
              ],
              'rem' => [
                'min' => 0,
                'max' => 100,
              ],
              '%' => [
                'min' => 0,
                'max' => 100,
              ],
            ],
            'default' => [
              'unit' => 'rem',
              'size' => 6,
            ],
            'selectors' => [
              '{{WRAPPER}} ' . $class => 'font-size: {{SIZE}}{{UNIT}};',
            ],
          ]
        );

        $obj->add_group_control(
          Group_Control_Background::get_type(),
          [
            'name' => 'play_icon_color',
            'label' => __( 'Gradient Color', 'leverage-extra' ),
            'types' => [ 'gradient' ],
            'selector' => '{{WRAPPER}} ' . $class,
          ]
        );

      $obj->end_controls_tab();
  
      $obj->start_controls_tab(
        'play_icon_hover_tab',
          [
            'label' => __( 'Hover', 'leverage-extra' ),
          ]
        );

        $obj->add_control(
          'play_icon_hover_size',
          [
            'label' => __( 'Size', 'leverage-extra' ),
            'type' => Controls_Manager::SLIDER,
            'size_units' => [ 'px', 'rem', '%' ],
            'range' => [
              'px' => [
                'min' => 0,
                'max' => 500,
              ],
              'rem' => [
                'min' => 0,
                'max' => 100,
              ],
              '%' => [
                'min' => 0,
                'max' => 100,
              ],
            ],
            'default' => [
              'unit' => 'rem',
              'size' => 6,
            ],
            'selectors' => [
              '{{WRAPPER}} ' . $wrapper . ':hover ' . $class => 'font-size: {{SIZE}}{{UNIT}};',
            ],
          ]
        );

        $obj->add_group_control(
          Group_Control_Background::get_type(),
          [
            'name' => 'play_icon_hover_color',
            'label' => __( 'Gradient Color', 'leverage-extra' ),
            'types' => [ 'gradient' ],
            'selector' => '{{WRAPPER}} ' . $class,
          ]
        );

      $obj->end_controls_tab();

    $obj->end_controls_tabs();

  $obj->end_controls_section();
}

function add_particles_style_control( $obj ) {

  $obj->start_controls_section(
    'particles_style',
      [
        'label' => __( 'Particles', 'leverage-extra' ),
        'tab' => Controls_Manager::TAB_STYLE,
        'condition' => [
          'particles_type' => [ 'squares', 'hexagons', 'space', 'neural' ]
        ],
      ]
    );
    
    $obj->add_control(
      'particles_color',
      [
        'label' => __( 'Color', 'leverage-extra' ),
        'type' => Controls_Manager::COLOR,
      ]
    );

    $obj->add_control(
      'particles_opacity',
      [
        'label' => __( 'Opacity Control', 'leverage-extra' ),
        'type' => Controls_Manager::SLIDER,
        'size_units' => [ 'px' ],
        'range' => [
          'px' => [
            'min' => 0,
            'max' => 1,
            'step' => 0.1,
          ]
        ],
        'default' => [
          'size' => 0.5,
        ],
      ]
    );

  $obj->end_controls_section();
}

function add_filter_style_control( $obj, $name, $title, $class, $class_active ) {

  $obj->start_controls_section(
    $name . '_style',
      [
        'label' => __( $title, 'leverage-extra' ),
        'tab' => Controls_Manager::TAB_STYLE,
        'condition' => [
          'display_filter' => 'yes'
        ],
      ]
    );
    
    $obj->add_group_control(
      Group_Control_Typography::get_type(),
      [
        'name' => $name . '_typography',
        'selector' => '{{WRAPPER}} ' . $class,
        'scheme' => Schemes\Typography::TYPOGRAPHY_2,
      ]
    );
    
    $obj->start_controls_tabs(
      $name . '_tabs'
      );

      $obj->start_controls_tab(
        $name . '_normal_tab',
          [
            'label' => __( 'Normal', 'leverage-extra' ),
          ]
        );
    
        $obj->add_control(
          $name . '_color',
          [
            'label' => __( 'Text Color', 'leverage-extra' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
              '{{WRAPPER}} ' . $class => 'color: {{VALUE}};',
            ],
          ]
        );
    
        $obj->add_control(
          $name . '_background_color',
          [
            'label' => __( 'Background Color', 'leverage-extra' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
              '{{WRAPPER}} ' . $class => 'background-color: {{VALUE}};',
            ],
          ]
        );

      $obj->end_controls_tab();

      $obj->start_controls_tab(
        $name . '_hover_tab',
          [
            'label' => __( 'Hover', 'leverage-extra' ),
          ]
        );
    
        $obj->add_control(
          $name . '_hover_color',
          [
            'label' => __( 'Text Color', 'leverage-extra' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
              '{{WRAPPER}} ' . $class . ':hover' => 'color: {{VALUE}};',
            ],
          ]
        );
    
        $obj->add_control(
          $name . '_background_hover_color',
          [
            'label' => __( 'Background Color', 'leverage-extra' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
              '{{WRAPPER}} ' . $class . ':hover' => 'background-color: {{VALUE}};',
            ],
          ]
        );

      $obj->end_controls_tab();

      $obj->start_controls_tab(
        $name . '_active_tab',
          [
            'label' => __( 'Active', 'leverage-extra' ),
          ]
        );
    
        $obj->add_control(
          $name . '_active_color',
          [
            'label' => __( 'Text Color', 'leverage-extra' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
              '{{WRAPPER}} ' . $class_active => 'color: {{VALUE}};',
            ],
          ]
        );
    
        $obj->add_control(
          $name . '_background_active_color',
          [
            'label' => __( 'Background Color', 'leverage-extra' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
              '{{WRAPPER}} ' . $class_active => 'background-color: {{VALUE}};',
            ],
          ]
        );

      $obj->end_controls_tab();

    $obj->end_controls_tabs();

    $obj->add_control(
      $name . '_margin',
      [
        'label' => __( 'Margin', 'leverage-extra' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', 'em', 'rem', '%' ],
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );

    $obj->add_control(
      $name . '_padding',
      [
        'label' => __( 'Padding', 'leverage-extra' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', 'em', 'rem', '%' ],
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );
    
    $obj->add_control(
      $name . '_border_radius',
      [
        'label' => __( 'Border Radius', 'leverage-extra' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );

    $obj->add_group_control(
      Group_Control_Border::get_type(),
      [
        'name' => $name . '_border',
        'label' => __( 'Border', 'leverage-extra' ),
        'selector' => '{{WRAPPER}} ' . $class,
      ]
    );

  $obj->end_controls_section();
}

function add_pagination_style_control( $obj, $class, $class_active ) {

  $obj->start_controls_section(
    'pagination_style',
      [
        'label' => __( 'Pagination', 'leverage-extra' ),
        'tab' => Controls_Manager::TAB_STYLE
      ]
    );
    
    $obj->start_controls_tabs(
      'pagination_tabs'
      );

      $obj->start_controls_tab(
        'pagination_normal_tab',
          [
            'label' => __( 'Normal', 'leverage-extra' ),
          ]
        );
    
        $obj->add_group_control(
          Group_Control_Background::get_type(),
          [
            'name' => 'pagination_gradient_color',
            'label' => __( 'Gradient Color', 'leverage-extra' ),
            'types' => [ 'gradient' ],
            'selector' => '{{WRAPPER}} ' . $class,
          ]
        );

      $obj->end_controls_tab();

      $obj->start_controls_tab(
        'pagination_hover_tab',
          [
            'label' => __( 'Hover', 'leverage-extra' ),
          ]
        );  

        $obj->add_group_control(
          Group_Control_Background::get_type(),
          [
            'name' => 'pagination_gradient_hover_color',
            'label' => __( 'Gradient Color', 'leverage-extra' ),
            'types' => [ 'gradient' ],
            'selector' => '{{WRAPPER}} ' . $class . ':hover',
          ]
        );

      $obj->end_controls_tab();

      $obj->start_controls_tab(
        'pagination_active_tab',
          [
            'label' => __( 'Active', 'leverage-extra' ),
          ]
        );

        $obj->add_group_control(
          Group_Control_Background::get_type(),
          [
            'name' => 'pagination_gradient_active_color',
            'label' => __( 'Gradient Color', 'leverage-extra' ),
            'types' => [ 'gradient' ],
            'selector' => '{{WRAPPER}} ' . $class_active,
          ]
        );

      $obj->end_controls_tab();

    $obj->end_controls_tabs();

  $obj->end_controls_section();
}

function add_field_style_control( $obj ) {

  $obj->start_controls_section(
    'field_style',
      [
        'label' => __( 'Field', 'leverage-extra' ),
        'tab' => Controls_Manager::TAB_STYLE,
      ]
    );
    
    $obj->add_group_control(
      Group_Control_Typography::get_type(),
      [
        'name' => 'field_typography',
        'selector' => '{{WRAPPER}} input:not([type="button"]):not([type="submit"]), {{WRAPPER}} textarea, {{WRAPPER}} select',
        'scheme' => Schemes\Typography::TYPOGRAPHY_2,
      ]
    );
    
    $obj->add_control(
      'field_text_color',
      [
        'label' => __( 'Text Color', 'leverage-extra' ),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} input:not([type="button"]):not([type="submit"]), {{WRAPPER}} textarea, {{WRAPPER}} select' => 'color: {{VALUE}};',
          '{{WRAPPER}} input:not([type="button"]):not([type="submit"])::placeholder, {{WRAPPER}} textarea::placeholder' => 'color: {{VALUE}};',
        ],
      ]
    );
    
    $obj->add_control(
      'field_background_color',
      [
        'label' => __( 'Background Color', 'leverage-extra' ),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} input:not([type="button"]):not([type="submit"]), {{WRAPPER}} textarea, {{WRAPPER}} select' => 'background-color: {{VALUE}}; opacity: 0.8;',
          '{{WRAPPER}} input:not([type="button"]):not([type="submit"]):hover, {{WRAPPER}} textarea:hover, {{WRAPPER}} select:hover' => 'background-color: {{VALUE}}; opacity: 0.9;',
          '{{WRAPPER}} input:not([type="button"]):not([type="submit"]):focus, {{WRAPPER}} textarea:focus, {{WRAPPER}} select:focus' => 'background-color: {{VALUE}}; opacity: 1;',
        ],
      ]
    );

    $obj->add_control(
      'field_margin',
      [
        'label' => __( 'Margin', 'leverage-extra' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', 'em', 'rem', '%' ],
        'selectors' => [
          '{{WRAPPER}} input:not([type="button"]):not([type="submit"]), {{WRAPPER}} textarea, {{WRAPPER}} select' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );

    $obj->add_control(
      'field_padding',
      [
        'label' => __( 'Padding', 'leverage-extra' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', 'em', 'rem', '%' ],
        'selectors' => [
          '{{WRAPPER}} input:not([type="button"]):not([type="submit"]), {{WRAPPER}} textarea, {{WRAPPER}} select' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );
    
    $obj->add_control(
      'field_border_radius',
      [
        'label' => __( 'Border Radius', 'leverage-extra' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'selectors' => [
          '{{WRAPPER}} input:not([type="button"]):not([type="submit"]), {{WRAPPER}} textarea, {{WRAPPER}} select' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );

    $obj->add_group_control(
      Group_Control_Border::get_type(),
      [
        'name' => 'field_border',
        'label' => __( 'Border', 'leverage-extra' ),
        'selector' => '{{WRAPPER}} input:not([type="button"]):not([type="submit"]), {{WRAPPER}} textarea, {{WRAPPER}} select',
      ]
    );

  $obj->end_controls_section();
}