<?php

class Bio_Link_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'bio-link';
	}

	public function get_title() {
		return __( 'Bio Link', 'biolink' );
	}

	public function get_icon() {
		return 'eicon-person';
	}

	public function get_categories() {
		return [ 'general' ];
	}

	protected function _register_controls() {
        // Content Tab
        $this->start_controls_section(
            'Identity_section',
            [
                'label' => __( 'Identity', 'biolink' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
    
        // Identity Section Controls
        $this->add_control(
            'image_style',
            [
                'label' => __( 'Image Style', 'biolink' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'profile' => __( 'Profile', 'biolink' ),
                    'cover' => __( 'Cover', 'biolink' ),
                ],
                'default' => 'profile',
            ]
        );
    
        $this->add_control(
            'choose_image',
            [
                'label' => __( 'Choose Image', 'biolink' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
    
        $this->end_controls_section();
    
        // Bio Section
        $this->start_controls_section(
            'bio_section',
            [
                'label' => __( 'Bio', 'biolink' ),
            ]
        );
    
        $this->add_control(
            'heading',
            [
                'label' => __( 'Heading', 'biolink' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
    
        $this->add_control(
            'heading_tag',
            [
                'label' => __( 'HTML Tag', 'biolink' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'h1' => 'H1',
                    'h2' => 'H2',
                    'h3' => 'H3',
                    'h4' => 'H4',
                    'h5' => 'H5',
                    'h6' => 'H6',
                ],
                'default' => 'h1',
            ]
        );
    
        $this->add_control(
            'title',
            [
                'label' => __( 'Title or Tagline', 'biolink' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $this->add_control(
            'title_tag',
            [
                'label' => __( 'HTML Tag', 'biolink' ),
                'type' => \Elementor\Controls_Manager::SELECT,
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
    
        $this->add_control(
            'description',
            [
                'label' => __( 'Description', 'biolink' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
    
        $this->end_controls_section();
    
        // Icons Section
        $this->start_controls_section(
            'icons_section',
            [
                'label' => __( 'Icons', 'biolink' ),
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'social_media',
            [
                'label' => __( 'Social Media', 'biolink' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'none' => __( 'None', 'biolink' ),
                    'facebook' => __( 'Facebook', 'biolink' ),
                    'x-twitter' => __( 'X-Twitter', 'biolink' ),
                    'instagram' => __( 'Instagram', 'biolink' ),
                    'linkedin' => __( 'LinkedIn', 'biolink' ),
                    'youtube' => __( 'YouTube', 'biolink' ),
                    // We will add more here when I do the checks
                ],
                'default' => 'none',
            ]
        );

        $repeater->add_control(
            'link',
            [
                'label' => __( 'Link', 'biolink' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'biolink' ),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );

        $this->add_control(
            'social_icons',
            [
                'label' => __( 'Social Icons', 'biolink' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [],
                'title_field' => '{{{ social_media }}}',
            ]
        );

        $this->end_controls_section();
    
        // CTA Links Section
        $this->start_controls_section(
            'cta_links_section',
            [
                'label' => __( 'CTA Links', 'biolink' ),
            ]
        );
    
        $cta_repeater = new \Elementor\Repeater();
    
        $cta_repeater->add_control(
            'text',
            [
                'label' => esc_html__( 'Text', 'biolink' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => __( 'Click Here', 'biolink' ),
            ]
        );
    
        $cta_repeater->add_control(
            'link_type',
            [
                'label' => __( 'Link Type', 'biolink' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'url' => __( 'URL', 'biolink' ),
                    'phone' => __( 'Phone', 'biolink' ),
                    'email' => __( 'Email', 'biolink' ),
                ],
                'default' => 'url',
            ]
        );
    
        $cta_repeater->add_control(
            'link',
            [
                'label' => __( 'Link', 'biolink' ),
                'type' => \Elementor\Controls_Manager::URL,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => __( 'https://your-link.com', 'biolink' ),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'condition' => [
                    'link_type' => 'url',
                ],
            ]
        );
    
        $this->add_control(
            'cta_links',
            [
                'label' => __( 'CTA Links', 'biolink' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $cta_repeater->get_controls(),
                'default' => [
                    [
                        'text' => __( 'Click Here', 'biolink' ),
                        'link' => [
                            'url' => 'https://your-link.com',
                            'is_external' => true,
                            'nofollow' => true,
                        ],
                    ],
                ],
                'title_field' => '{{{ text }}}',
            ]
        );
    
        $this->end_controls_section();
    
        // Style Tab
        $this->start_controls_section(
            'identity_style_section',
            [
                'label' => __( 'Identity', 'biolink' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // Image Size (Profile)
        $this->add_control(
            'image_size',
            [
                'label' => __( 'Image Size', 'biolink' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%'  ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 115,
                ],
                'selectors' => [
                    '{{WRAPPER}} .bio-link-image img' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'image_style' => 'profile',
                ],
            ]
        );

        // Image Shape (Profile)
        $this->add_control(
            'image_shape',
            [
                'label' => __( 'Shape', 'biolink' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '50%' => __( 'Circle', 'biolink' ),
                    'square' => __( 'Square', 'biolink' ),
                ],
                'default' => 'circle',
                'selectors' => [
                    '{{WRAPPER}} .bio-link-image img' => 'border-radius: {{VALUE}};',
                ],
                'condition' => [
                    'image_style' => 'profile',
                ],
            ]
        );

        // Image Height (Cover)
        $this->add_control(
            'cover_image_height',
            [
                'label' => __( 'Image Height', 'biolink' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'vh' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                    ],
                    'vh' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 300,
                ],
                'selectors' => [
                    '{{WRAPPER}} .bio-link-cover-image' => 'height: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'image_style' => 'cover',
                ],
            ]
        );

        // Image Border
        $this->add_control(
            'image_border',
            [
                'label' => __( 'Border', 'biolink' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'biolink' ),
                'label_off' => __( 'No', 'biolink' ),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        // Image Border Width
        $this->add_control(
            'image_border_width',
            [
                'label' => __( 'Border Width', 'biolink' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%'  ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 10,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 2,
                ],
                'selectors' => [
                    '{{WRAPPER}} .bio-link-image img, {{WRAPPER}} .bio-link-cover-image' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'image_border' => 'yes',
                ],
            ]
        );

        // Image Border Color
        $this->add_control(
            'image_border_color',
            [
                'label' => __( 'Border Color', 'biolink' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .bio-link-image img, {{WRAPPER}} .bio-link-cover-image' => 'border-color: {{VALUE}}; border-style: solid;',
                ],
                'condition' => [
                    'image_border' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();
            
        // Bio Section
        $this->start_controls_section(
            'bio_style_section',
            [
                'label' => __( 'Bio', 'biolink' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        
        // Heading
        $this->add_control(
            'heading_title',
            [
                'label' => __( 'Heading', 'biolink' ),
                'type' => \Elementor\Controls_Manager::HEADING,
            ]
        );
        
        $this->add_control(
            'heading_text_color',
            [
                'label' => __( 'Text Color', 'biolink' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .bio-link-heading' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'heading_typography',
                'label' => __( 'Typography', 'biolink' ),
                'selector' => '{{WRAPPER}} .bio-link-heading',
            ]
        );
        
        $this->add_control(
            'heading_separator',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        
        // Subheading
        $this->add_control(
            'subheading_title',
            [
                'label' => __( 'Subheading', 'biolink' ),
                'type' => \Elementor\Controls_Manager::HEADING,
            ]
        );
        
        $this->add_control(
            'subheading_text_color',
            [
                'label' => __( 'Text Color', 'biolink' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .bio-link-subheading' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'subheading_typography',
                'label' => __( 'Typography', 'biolink' ),
                'selector' => '{{WRAPPER}} .bio-link-subheading',
            ]
        );
        
        $this->add_control(
            'subheading_separator',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        
        // Description
        $this->add_control(
            'description_title',
            [
                'label' => __( 'Description', 'biolink' ),
                'type' => \Elementor\Controls_Manager::HEADING,
            ]
        );
        
        $this->add_control(
            'description_text_color',
            [
                'label' => __( 'Text Color', 'biolink' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .bio-link-description' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'label' => __( 'Typography', 'biolink' ),
                'selector' => '{{WRAPPER}} .bio-link-description',
            ]
        );
        
        $this->end_controls_section();

        // Icons Section
        $this->start_controls_section(
            'icons_style_section',
            [
                'label' => __( 'Icons', 'biolink' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // Icons Color
        $this->add_control(
            'icons_color',
            [
                'label' => __( 'Icons Color', 'biolink' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .bio-link-icon' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Icons Size
        $this->add_control(
            'icons_size',
            [
                'label' => __( 'Icons Size', 'biolink' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'small' => __( 'Small', 'biolink' ),
                    'medium' => __( 'Medium', 'biolink' ),
                    'large' => __( 'Large', 'biolink' ),
                ],
                'default' => 'small',
                'selectors' => [
                    '{{WRAPPER}} .bio-link-icon' => 'font-size: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        // CTA Links Section
        $this->start_controls_section(
            'cta_links_style_section',
            [
                'label' => __( 'CTA Links', 'biolink' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // CTA Links Type
        $this->add_control(
            'cta_links_type',
            [
                'label' => __( 'Type', 'biolink' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'button' => __( 'Button', 'biolink' ),
                    'link' => __( 'Link', 'biolink' ),
                ],
                'default' => 'button',
            ]
        );

        // CTA Links Typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'cta_links_typography',
                'label' => __( 'Typography', 'biolink' ),
                'selector' => '{{WRAPPER}} .bio-link-cta',
            ]
        );

        // CTA Links Text Color
        $this->add_control(
            'cta_links_text_color',
            [
                'label' => __( 'Text Color', 'biolink' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .bio-link-cta' => 'color: {{VALUE}};',
                ],
            ]
        );

        // CTA Links Background Color
        $this->add_control(
            'cta_links_background_color',
            [
                'label' => __( 'Background Color', 'biolink' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#477ff8',
                'selectors' => [
                    '{{WRAPPER}} .bio-link-cta' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'cta_links_type' => 'button',
                ],
            ]
        );

        // CTA Links Border
        $this->add_control(
            'cta_links_border',
            [
                'label' => __( 'Border', 'biolink' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'biolink' ),
                'label_off' => __( 'No', 'biolink' ),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        // CTA Links Border width
        $this->add_control(
            'cta_links_border_width',
            [
                'label' => __( 'Border Width', 'biolink' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => [
                    '{{WRAPPER}} .bio-link-cta' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'cta_links_border' => 'yes',
                ],
            ]
        );
        
        // CTA Links Border Color
        $this->add_control(
            'cta_links_border_color',
            [
                'label' => __( 'Border Color', 'biolink' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#477ff8',
                'selectors' => [
                    '{{WRAPPER}} .bio-link-cta' => 'border-color: {{VALUE}}; border-style: solid;',
                ],
                'condition' => [
                    'cta_links_border' => 'yes',
                ],
            ]
        );

        // CTA Links Corners
        $this->add_control(
            'cta_links_corners',
            [
                'label' => __( 'Corners', 'biolink' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '0' => __( 'Square', 'biolink' ),
                    '10px' => __( 'Rounded', 'biolink' ),
                    '50px' => __( 'Round', 'biolink' ),
                ],
                'default' => '50px',
                'selectors' => [
                    '{{WRAPPER}} .bio-link-cta' => 'border-radius: {{VALUE}};',
                ],
            ]
        );

        // CTA Links Padding
        $this->add_control(
            'cta_links_padding',
            [
                'label' => __( 'Padding', 'biolink' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .bio-link-cta' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
        
    // Advanced Tab
    $this->start_controls_section(
        'advanced_section',
        [
            'label' => __( 'Layout', 'biolink' ),
            'tab' => \Elementor\Controls_Manager::TAB_ADVANCED,
        ]
    );

        // Full Width
        $this->add_control(
            'full_width',
            [
                'label' => __( 'Full Width', 'biolink' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'biolink' ),
                'label_off' => __( 'No', 'biolink' ),
                'return_value' => 'yes',
                'default' => 'no',
                'selectors' => [
                    '{{WRAPPER}} .bio-link-wrapper' => 'width: 100%;',
                ],
            ]
        );

        // Content Width (when Full Width is Yes)
        $this->add_control(
            'content_width_full',
            [
                'label' => __( 'Content Width', 'biolink' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 700,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 500,
                ],
                'selectors' => [
                    '{{WRAPPER}} .bio-link-content' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'full_width' => 'yes',
                ],
            ]
        );

        // Full Screen Height
        $this->add_control(
            'full_screen_height',
            [
                'label' => __( 'Full Screen Height', 'biolink' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'biolink' ),
                'label_off' => __( 'No', 'biolink' ),
                'return_value' => 'yes',
                'default' => 'no',
                'condition' => [
                    'full_width' => 'yes',
                ],
            ]
        );

        // Apply Full Screen Height On
        $this->add_control(
            'full_screen_height_on',
            [
                'label' => __( 'Apply Full Screen Height On', 'biolink' ),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => [
                    'desktop' => __( 'Desktop', 'biolink' ),
                    'tablet' => __( 'Tablet', 'biolink' ),
                    'mobile' => __( 'Mobile', 'biolink' ),
                ],
                'default' => [ 'desktop', 'tablet', 'mobile' ],
                'condition' => [
                    'full_width' => 'yes',
                    'full_screen_height' => 'yes',
                ],
            ]
        );

        // Jumbo Width
        $this->add_control(
            'jumbo_width',
            [
                'label' => __( 'Jumbo Width', 'biolink' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 360,
                ],
                'selectors' => [
                    '{{WRAPPER}} .bio-link-jumbo' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Content Width
        $this->add_control(
            'content_width',
            [
                'label' => __( 'Content Width', 'biolink' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 280,
                ],
                'selectors' => [
                    '{{WRAPPER}} .bio-link-content' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Center Vertical
        $this->add_control(
            'center_vertical',
            [
                'label' => __( 'Center Vertical', 'biolink' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'biolink' ),
                'label_off' => __( 'No', 'biolink' ),
                'return_value' => 'yes',
                'default' => 'no',
                'selectors' => [
                    '{{WRAPPER}} .bio-link-content' => 'display: flex; align-items: center;',
                ],
            ]
        );

        $this->end_controls_section();

        // Custom Section
        $this->start_controls_section(
            'custom_section',
            [
                'label' => esc_html__('Custom', 'biolink'),
                'tab' => \Elementor\Controls_Manager::TAB_ADVANCED,
            ]
        );

        // CSS ID control
        $this->add_control(
            'css_id',
            [
                'label' => __( 'CSS ID', 'biolink' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => '',
                'title' => __( 'Add your custom ID without the "#" prefix.', 'biolink' ),
                'separator' => 'before',
            ]
        );

        // CSS Classes control
        $this->add_control(
            'css_classes',
            [
                'label' => __( 'CSS Classes', 'biolink' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'dynamic' => [
                    'active' => true,
                ],
                'prefix_class' => '',
                'title' => __( 'Add your custom class without the dot. e.g: my-class', 'biolink' ),
            ]
        );

        // Custom CSS control
        $this->add_control(
            'custom_css',
            [
                'label' => __( 'Custom CSS', 'biolink' ),
                'type' => \Elementor\Controls_Manager::CODE,
                'language' => 'css',
                'rows' => 20,
                'separator' => 'before',
            ]
        );

        // Custom Attributes control
        $this->add_control(
            'custom_attributes',
            [
                'label' => __( 'Custom Attributes', 'biolink' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => __( 'key|value', 'biolink' ),
                'description' => __( 'Set custom attributes for the wrapper element. Each attribute in a separate line. Separate attribute key from the value using | character.', 'biolink' ),
                'separator' => 'before',
            ]
        );

        
    
    $this->end_controls_section();
}

protected function render() {
	$settings = $this->get_settings_for_display();

	$image_url = $settings['choose_image']['url'];
	$heading = $settings['heading'];
	$heading_tag = $settings['heading_tag'];
	$title = $settings['title'];
	$title_tag = $settings['title_tag'];
	$description = $settings['description'];
	$social_icons = $settings['social_icons'];
	$cta_links = $settings['cta_links'];

	$this->add_render_attribute( 'bio-link-wrapper', [
		'class' => 'bio-link-wrapper',
		'id' => esc_attr( $settings['css_id'] ),
	] );

	if ( 'yes' === $settings['full_width'] ) {
		$this->add_render_attribute( 'bio-link-wrapper', 'class', 'bio-link-full-width' );
	}

	if ( 'yes' === $settings['full_screen_height'] ) {
		$full_screen_height_on = $settings['full_screen_height_on'];
		foreach ( $full_screen_height_on as $device ) {
			$this->add_render_attribute( 'bio-link-wrapper', 'class', 'bio-link-full-screen-height-' . $device );
		}
	}

	$this->add_inline_editing_attributes( 'heading', 'advanced' );
	$this->add_inline_editing_attributes( 'title', 'advanced' );
	$this->add_inline_editing_attributes( 'description', 'advanced' );

	?>
	<div <?php echo $this->get_render_attribute_string( 'bio-link-wrapper' ); ?>>
		<div class="bio-link-content bio-link-content-centered">
			<?php if ( 'profile' === $settings['image_style'] ) : ?>
				<div class="bio-link-image">
					<img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $heading ); ?>">
				</div>
			<?php elseif ( 'cover' === $settings['image_style'] ) : ?>
				<div class="bio-link-cover-image" style="background-image: url('<?php echo esc_url( $image_url ); ?>')"></div>
			<?php endif; ?>

			<div class="bio-link-info">
				<?php if ( $heading ) : ?>
					<<?php echo esc_attr( $heading_tag ); ?> class="bio-link-heading"><?php echo wp_kses_post( $heading ); ?></<?php echo esc_attr( $heading_tag ); ?>>
				<?php endif; ?>

				<?php if ( $title ) : ?>
					<<?php echo esc_attr( $title_tag ); ?> class="bio-link-subheading"><?php echo wp_kses_post( $title ); ?></<?php echo esc_attr( $title_tag ); ?>>
				<?php endif; ?>

				<?php if ( $description ) : ?>
					<div class="bio-link-description"><?php echo wp_kses_post( $description ); ?></div>
				<?php endif; ?>
			</div>

            <?php if ( $social_icons ) : ?>
                <div class="bio-link-social-icons">
                    <?php
                    foreach ( $social_icons as $index => $item ) {
                        $link_key = 'link_' . $index;

                        $this->add_link_attributes( $link_key, $item['link'] );
                        
                        $icon_class = '';
                        if ( 'none' !== $item['social_media'] ) {
                            $icon_class = 'bio-link-icon-' . $item['social_media'];
                        }
                        
                        ?>
                        <a <?php echo $this->get_render_attribute_string( $link_key ); ?> class="bio-link-icon <?php echo esc_attr( $icon_class ); ?>">
                            <?php if ( 'none' !== $item['social_media'] ) : ?>
                                <i class="fab fa-<?php echo esc_attr( $item['social_media'] ); ?>"></i>
                            <?php endif; ?>
                        </a>
                    <?php } ?>
                </div>
            <?php endif; ?>

			<?php if ( $cta_links ) : ?>
				<div class="bio-link-cta-buttons bio-link-cta-buttons-vertical">
					<?php
					foreach ( $cta_links as $index => $item ) {
						$link_key = 'cta_link_' . $index;

						if ( 'url' === $item['link_type'] ) {
							$this->add_link_attributes( $link_key, $item['link'] );
						} elseif ( 'phone' === $item['link_type'] ) {
							$this->add_render_attribute( $link_key, 'href', 'tel:' . $item['link']['url'] );
						} elseif ( 'email' === $item['link_type'] ) {
							$this->add_render_attribute( $link_key, 'href', 'mailto:' . $item['link']['url'] );
						}

						?>
						<a <?php echo $this->get_render_attribute_string( $link_key ); ?> class="bio-link-cta">
							<?php echo esc_html( $item['text'] ); ?>
						</a>
					<?php } ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
	<?php

	if ( $settings['custom_css'] ) {
		echo '<style>' . $settings['custom_css'] . '</style>';
	}

	if ( $settings['custom_attributes'] ) {
		$attributes = explode( "\n", $settings['custom_attributes'] );
		foreach ( $attributes as $attribute ) {
			$attr = explode( '|', $attribute, 2 );
			if ( ! empty( $attr[0] ) && isset( $attr[1] ) ) {
				echo '<div ' . esc_attr( $attr[0] ) . '="' . esc_attr( $attr[1] ) . '"></div>';
			}
		}
	}
}

protected function _content_template() {
	?>
	<#
	var image_url = settings.choose_image.url;
	var heading = settings.heading;
	var heading_tag = settings.heading_tag;
	var title = settings.title;
	var title_tag = settings.title_tag;
	var description = settings.description;
	var social_icons = settings.social_icons;
	var cta_links = settings.cta_links;

	view.addRenderAttribute( 'bio-link-wrapper', {
		'class': 'bio-link-wrapper',
		'id': settings.css_id
	} );

	if ( 'yes' === settings.full_width ) {
		view.addRenderAttribute( 'bio-link-wrapper', 'class', 'bio-link-full-width' );
	}

	if ( 'yes' === settings.full_screen_height ) {
		var full_screen_height_on = settings.full_screen_height_on;
		_.each( full_screen_height_on, function( device ) {
			view.addRenderAttribute( 'bio-link-wrapper', 'class', 'bio-link-full-screen-height-' + device );
		} );
	}

	view.addInlineEditingAttributes( 'heading', 'advanced' );
	view.addInlineEditingAttributes( 'title', 'advanced' );
	view.addInlineEditingAttributes( 'description', 'advanced' );
	#>
	<div {{{ view.getRenderAttributeString( 'bio-link-wrapper' ) }}}>
		<div class="bio-link-content">
			<# if ( 'profile' === settings.image_style ) { #>
				<div class="bio-link-image">
					<img src="{{ image_url }}" alt="{{ heading }}">
				</div>
			<# } else if ( 'cover' === settings.image_style ) { #>
				<div class="bio-link-cover-image" style="background-image: url('{{ image_url }}')"></div>
			<# } #>

			<div class="bio-link-info">
				<# if ( heading ) { #>
					<{{{ heading_tag }}} class="bio-link-heading">{{{ heading }}}</{{{ heading_tag }}}>
				<# } #>

				<# if ( title ) { #>
					<{{{ title_tag }}} class="bio-link-subheading">{{{ title }}}</{{{ title_tag }}}>
				<# } #>

				<# if ( description ) { #>
					<div class="bio-link-description">{{{ description }}}</div>
				<# } #>
			</div>

			<# if ( social_icons ) { #>
                <div class="bio-link-social-icons">
                    <# _.each( social_icons, function( item, index ) { 
                        var link_key = 'link_' + index;

                        view.addRenderAttribute( link_key, item.link );
                        
                        var icon_class = '';
                        if ( 'none' !== item.social_media ) {
                            icon_class = 'bio-link-icon-' + item.social_media;
                        }
                    #>
                        <a {{{ view.getRenderAttributeString( link_key ) }}} class="bio-link-icon {{ icon_class }}">
                            <# if ( 'none' !== item.social_media ) { #>
                                <i class="fab fa-{{ item.social_media }}"></i>
                            <# } #>
                        </a>
                    <# } ); #>
                </div>
            <# } #>

			<# if ( cta_links ) { #>
				<div class="bio-link-cta-buttons bio-link-cta-buttons-vertical">
					<# _.each( cta_links, function( item, index ) {
						var link_key = 'cta_link_' + index;

						if ( 'url' === item.link_type ) {
							view.addRenderAttribute( link_key, item.link );
						} else if ( 'phone' === item.link_type ) {
							view.addRenderAttribute( link_key, 'href', 'tel:' + item.link.url );
						} else if ( 'email' === item.link_type ) {
							view.addRenderAttribute( link_key, 'href', 'mailto:' + item.link.url );
						}
					#>
						<a {{{ view.getRenderAttributeString( link_key ) }}} class="bio-link-cta">
							{{{ item.text }}}
						</a>
					<# } ); #>
				</div>
			<# } #>
		</div>
	</div>

	<# if ( settings.custom_css ) { #>
		<style>{{{ settings.custom_css }}}</style>
	<# } #>

	<# if ( settings.custom_attributes ) {
		var attributes = settings.custom_attributes.split( "\n" );
		_.each( attributes, function( attribute ) {
			if ( attribute ) {
				var attr = attribute.split( "|" );
				if ( attr[0] && attr[1] ) { #>
					<div {{ attr[0] }}="{{ attr[1] }}"></div>
				<# }
			}
		} );
	} #>
	<?php
}
}

