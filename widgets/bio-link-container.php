<?php

class Bio_Link_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'bio-link';
	}

	public function get_title() {
		return esc_html__( 'Bio Link', 'biolink' );
	}

	public function get_icon() {
		return 'eicon-person';
	}

	public function get_categories() {
		return [ 'general' ];
	}
    

    // Selectors for the controls
    protected $selectors = [
        'wrapper' => '{{WRAPPER}} .bio-link-wrapper',
        'content' => '{{WRAPPER}} .bio-link-content',
        'image' => '{{WRAPPER}} .bio-link-image img',
        'cover_image' => '{{WRAPPER}} .bio-link-cover-image',
        'heading' => '{{WRAPPER}} .bio-link-heading',
        'subheading' => '{{WRAPPER}} .bio-link-subheading',
        'description' => '{{WRAPPER}} .bio-link-description',
        'icon' => '{{WRAPPER}} .bio-link-icon',
        'cta' => '{{WRAPPER}} .bio-link-cta',
    ];

	protected function _register_controls() {     
        // Content Tab
        // Identity
        $this->start_controls_section(
            'Identity_section',
            [
                'label' => esc_html__( 'Identity', 'biolink' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
    
            // Identity Section Controls
            $this->add_control(
                'image_style',
                [
                    'label' => esc_html__( 'Image Style', 'biolink' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'options' => [
                        'profile' => esc_html__( 'Profile', 'biolink' ),
                        'cover' => esc_html__( 'Cover', 'biolink' ),
                    ],
                    'default' => 'profile',
                ]
            );
        
            $this->add_control(
                'choose_image',
                [
                    'label' => esc_html__( 'Choose Image', 'biolink' ),
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
                'label' => esc_html__( 'Bio', 'biolink' ),
            ]
        );
    
            $this->add_control(
                'heading',
                [
                    'label' => esc_html__( 'Heading', 'biolink' ),
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                    'dynamic' => [
                        'active' => true,
                    ],
                ]
            );
        
            $this->add_control(
                'heading_tag',
                [
                    'label' => esc_html__( 'HTML Tag', 'biolink' ),
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
                    'label' => esc_html__( 'Title or Tagline', 'biolink' ),
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                    'dynamic' => [
                        'active' => true,
                    ],
                ]
            );

            $this->add_control(
                'title_tag',
                [
                    'label' => esc_html__( 'HTML Tag', 'biolink' ),
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
                    'label' => esc_html__( 'Description', 'biolink' ),
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
                'label' => esc_html__( 'Icons', 'biolink' ),
            ]
        );

            $repeater = new \Elementor\Repeater();

            $repeater->add_control(
                'social_media',
                [
                    'label' => esc_html__( 'Social Media', 'biolink' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'options' => [
                        'none' => esc_html__( 'None', 'biolink' ),
                        'facebook' => esc_html__( 'Facebook', 'biolink' ),
                        'x-twitter' => esc_html__( 'X-Twitter', 'biolink' ),
                        'instagram' => esc_html__( 'Instagram', 'biolink' ),
                        'linkedin' => esc_html__( 'LinkedIn', 'biolink' ),
                        'youtube' => esc_html__( 'YouTube', 'biolink' ),
                        // We will add more here when I do the checks
                    ],
                    'default' => 'none',
                ]
            );

            $repeater->add_control(
                'link',
                [
                    'label' => esc_html__( 'Link', 'biolink' ),
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
                    'label' => esc_html__( 'Social Icons', 'biolink' ),
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
                'label' => esc_html__( 'CTA Links', 'biolink' ),
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
                    'default' => esc_html__( 'Click Here', 'biolink' ),
                ]
            );
        
            $cta_repeater->add_control(
                'link_type',
                [
                    'label' => esc_html__( 'Link Type', 'biolink' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'options' => [
                        'url' => esc_html__( 'URL', 'biolink' ),
                        'phone' => esc_html__( 'Phone', 'biolink' ),
                        'email' => esc_html__( 'Email', 'biolink' ),
                    ],
                    'default' => 'url',
                ]
            );
        
            $cta_repeater->add_control(
                'link',
                [
                    'label' => esc_html__( 'Link', 'biolink' ),
                    'type' => \Elementor\Controls_Manager::URL,
                    'dynamic' => [
                        'active' => true,
                    ],
                    'placeholder' => esc_html__( 'https://your-link.com', 'biolink' ),
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
                    'label' => esc_html__( 'CTA Links', 'biolink' ),
                    'type' => \Elementor\Controls_Manager::REPEATER,
                    'fields' => $cta_repeater->get_controls(),
                    'default' => [
                        [
                            'text' => esc_html__( 'Click Here', 'biolink' ),
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
        // Identity Style Section
        $this->start_controls_section(
            'identity_style_section',
            [
                'label' => esc_html__( 'Identity', 'biolink' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

            // Image Size (Profile)
            $this->add_responsive_control(
                'image_size',
                [
                    'label' => esc_html__( 'Image Height', 'biolink' ),
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
                        $this->selectors['image'] => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
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
                    'label' => esc_html__( 'Shape', 'biolink' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'options' => [
                        '50%' => esc_html__( 'Circle', 'biolink' ),
                        'square' => esc_html__( 'Square', 'biolink' ),
                    ],
                    'default' => '50%',
                    'selectors' => [
                        $this->selectors['image'] => 'border-radius: {{VALUE}};',
                    ],
                    'condition' => [
                        'image_style' => 'profile',
                    ],
                ]
            );

            // Image Height (Cover)
            $this->add_responsive_control(
                'cover_image_height',
                [
                    'label' => esc_html__( 'Image Height', 'biolink' ),
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
                        $this->selectors['cover_image'] => 'height: {{SIZE}}{{UNIT}};',
                    ],
                    'condition' => [
                        'image_style' => 'cover',
                    ],
                ]
            );

            // Image Border
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'image_border',
                    'label' => esc_html__( 'Border', 'biolink' ),
                    'selector' => $this->selectors['image'] . ', ' . $this->selectors['cover_image'],
                ]
            );

        $this->end_controls_section();
            
        // Bio Section
        $this->start_controls_section(
            'bio_style_section',
            [
                'label' => esc_html__( 'Bio', 'biolink' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        
            // Heading
            $this->add_control(
                'heading_title',
                [
                    'label' => esc_html__( 'Heading', 'biolink' ),
                    'type' => \Elementor\Controls_Manager::HEADING,
                ]
            );
            
            $this->add_control(
                'heading_text_color',
                [
                    'label' => esc_html__( 'Text Color', 'biolink' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => '#000000',
                    'selectors' => [
                        $this->selectors['heading'] => 'color: {{VALUE}};',
                    ],
                ]
            );
            
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'heading_typography',
                    'label' => esc_html__( 'Typography', 'biolink' ),
                    'selector' => $this->selectors['heading'],
                    'fields_options' => [
                        'font_size' => [
                            'default' => [
                                'unit' => 'px',
                                'size' => 24,
                            ]
                        ]
                    ]
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
                    'label' => esc_html__( 'Subheading', 'biolink' ),
                    'type' => \Elementor\Controls_Manager::HEADING,
                ]
            );
            
            $this->add_control(
                'subheading_text_color',
                [
                    'label' => esc_html__( 'Text Color', 'biolink' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => '#000000',
                    'selectors' => [
                        $this->selectors['subheading'] => 'color: {{VALUE}};',
                    ],
                ]
            );
            
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'subheading_typography',
                    'label' => esc_html__( 'Typography', 'biolink' ),
                    'selector' => $this->selectors['subheading'],
                    'fields_options' => [
                        'font_size' => [
                            'default' => [
                                'unit' => 'px',
                                'size' => 18,
                            ],
                        ],
                    ],
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
                    'label' => esc_html__( 'Description', 'biolink' ),
                    'type' => \Elementor\Controls_Manager::HEADING,
                ]
            );
            
            $this->add_control(
                'description_text_color',
                [
                    'label' => esc_html__( 'Text Color', 'biolink' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => '#000000',
                    'selectors' => [
                        $this->selectors['description'] => 'color: {{VALUE}};',
                    ],
                ]
            );
            
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'description_typography',
                    'label' => esc_html__( 'Typography', 'biolink' ),
                    'selector' => $this->selectors['description'],
                ]
            );
        
        $this->end_controls_section();

        // Icons Section
        $this->start_controls_section(
            'icons_style_section',
            [
                'label' => esc_html__( 'Icons', 'biolink' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

            // Icons Color
            $this->add_control(
                'icons_color',
                [
                    'label' => esc_html__( 'Icons Color', 'biolink' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => '#000000',
                    'selectors' => [
                        $this->selectors['icon'] => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Icons Size
            $this->add_responsive_control(
                'icons_size',
                [
                    'label' => esc_html__( 'Icons Size', 'biolink' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'options' => [
                        'small' => esc_html__( 'Small', 'biolink' ),
                        'medium' => esc_html__( 'Medium', 'biolink' ),
                        'large' => esc_html__( 'Large', 'biolink' ),
                    ],
                    'default' => 'medium',
                    'selectors' => [
                        $this->selectors['icon'] => 'font-size: {{VALUE}};',
                    ],
                    'selectors_dictionary' => [
                        'small' => '16px',
                        'medium' => '24px',
                        'large' => '32px',
                    ],
                ]
            );

        $this->end_controls_section();

        // CTA Links Section
        $this->start_controls_section(
            'cta_links_style_section',
            [
                'label' => esc_html__( 'CTA Links', 'biolink' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

            // CTA Links Type
            $this->add_control(
                'cta_links_type',
                [
                    'label' => esc_html__( 'Type', 'biolink' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'options' => [
                        'button' => esc_html__( 'Button', 'biolink' ),
                        'link' => esc_html__( 'Link', 'biolink' ),
                    ],
                    'default' => 'button',
                    'selectors' => [
                        $this->selectors['cta'] . ' .bio-link-cta' => 'display: inline-block;',
                    ],
                ]
            );

            // CTA Links Typography
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'cta_links_typography',
                    'label' => esc_html__( 'Typography', 'biolink' ),
                    'selector' => $this->selectors['cta'],
                ]
            );

            // CTA Links Text Color
            $this->add_control(
                'cta_links_text_color',
                [
                    'label' => esc_html__( 'Text Color', 'biolink' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => '#ffffff',
                    'selectors' => [
                        $this->selectors['cta'] => 'color: {{VALUE}};',
                    ],
                ]
            );

            // CTA Links Background Color
            $this->add_control(
                'cta_links_background_color',
                [
                    'label' => esc_html__( 'Background Color', 'biolink' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => '#477ff8',
                    'selectors' => [
                        $this->selectors['cta'] => 'background-color: {{VALUE}};',
                    ],
                    'condition' => [
                        'cta_links_type' => 'button',
                    ],
                ]
            );

            // CTA Links Border
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'cta_links_border',
                    'label' => esc_html__( 'Border', 'biolink' ),
                    'selector' => $this->selectors['cta'],
                ]
            );

            // CTA Links Corners
            $this->add_control(
                'cta_links_corners',
                [
                    'label' => esc_html__( 'Corners', 'biolink' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'options' => [
                        '50px' => esc_html__( 'Round', 'biolink' ),
                        '0' => esc_html__( 'Square', 'biolink' ),
                        '10px' => esc_html__( 'Rounded', 'biolink' ),
                        
                    ],
                    'default' => '50px',
                    'selectors' => [
                        $this->selectors['cta'] => 'border-radius: {{VALUE}};',
                    ],
                ]
            );

            // CTA Links Padding
            $this->add_control(
                'cta_links_padding',
                [
                    'label' => esc_html__( 'Padding', 'biolink' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'default' => [
                        'top' => '12',
                        'right' => '24',
                        'bottom' => '12',
                        'left' => '24',
                        'unit' => 'px',
                        'isLinked' => false,
                    ],
                    'selectors' => [
                        $this->selectors['cta'] => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

        $this->end_controls_section();

        
        // Advanced Tab
        // Layout section controls
        $this->start_controls_section(
            'advanced_section',
            [
                'label' => esc_html__( 'Layout', 'biolink' ),
                'tab' => \Elementor\Controls_Manager::TAB_ADVANCED,
            ]
        );

            // Full Width
            $this->add_control(
                'full_width',
                [
                    'label' => esc_html__( 'Full Width', 'biolink' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => esc_html__( 'Yes', 'biolink' ),
                    'label_off' => esc_html__( 'No', 'biolink' ),
                    'return_value' => 'yes',
                    'default' => 'no',
                    'selectors' => [
                        $this->selectors['wrapper'] => 'width: 100%;',
                    ],
                ]
            );

            // Content Width (when Full Width is Yes)
            $this->add_control(
                'content_width_full',
                [
                    'label' => esc_html__( 'Content Width', 'biolink' ),
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
                        'size' => 280,
                    ],
                    'selectors' => [
                        $this->selectors['content'] => 'max-width: {{SIZE}}{{UNIT}};',
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
                    'label' => esc_html__( 'Full Screen Height', 'biolink' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => esc_html__( 'Yes', 'biolink' ),
                    'label_off' => esc_html__( 'No', 'biolink' ),
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
                    'label' => esc_html__( 'Apply Full Screen Height On', 'biolink' ),
                    'type' => \Elementor\Controls_Manager::SELECT2,
                    'multiple' => true,
                    'options' => [
                        'desktop' => esc_html__( 'Desktop', 'biolink' ),
                        'tablet' => esc_html__( 'Tablet', 'biolink' ),
                        'mobile' => esc_html__( 'Mobile', 'biolink' ),
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
                    'label' => esc_html__( 'Jumbo Width', 'biolink' ),
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
                        $this->selectors['wrapper'] => 'max-width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            // Content Width
            $this->add_control(
                'content_width',
                [
                    'label' => esc_html__( 'Content Width', 'biolink' ),
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
                        $this->selectors['content'] => 'max-width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            // Center Vertical
            $this->add_control(
                'center_vertical',
                [
                    'label' => esc_html__( 'Center Vertical', 'biolink' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => esc_html__( 'Yes', 'biolink' ),
                    'label_off' => esc_html__( 'No', 'biolink' ),
                    'return_value' => 'yes',
                    'default' => 'no',
                    'selectors' => [
                        $this->selectors['content'] => 'display: flex; align-items: center;',
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
                'label' => esc_html__( 'CSS ID', 'biolink' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => '',
                'title' => esc_html__( 'Add your custom ID without the "#" prefix.', 'biolink' ),
                'separator' => 'before',
            ]
        );

        // CSS Classes control
        $this->add_control(
            'css_classes',
            [
                'label' => esc_html__( 'CSS Classes', 'biolink' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'dynamic' => [
                    'active' => true,
                ],
                'prefix_class' => '',
                'title' => esc_html__( 'Add your custom class without the dot. e.g: my-class', 'biolink' ),
            ]
        );

        // Custom CSS control
        $this->add_control(
            'custom_css',
            [
                'label' => esc_html__( 'Custom CSS', 'biolink' ),
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
                'label' => esc_html__( 'Custom Attributes', 'biolink' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__( 'key|value', 'biolink' ),
                'description' => esc_html__( 'Set custom attributes for the wrapper element. Each attribute in a separate line. Separate attribute key from the value using | character.', 'biolink' ),
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
    
        $this->add_render_attribute( 'wrapper', 'class', 'bio-link-wrapper' );
        $this->add_render_attribute( 'content', 'class', 'bio-link-content bio-link-content-center' );
        $this->add_render_attribute( 'image', 'class', 'bio-link-image' );
        $this->add_render_attribute( 'cover_image', 'class', 'bio-link-cover-image' );
        $this->add_render_attribute( 'heading', 'class', 'bio-link-heading' );
        $this->add_render_attribute( 'subheading', 'class', 'bio-link-subheading' );
        $this->add_render_attribute( 'description', 'class', 'bio-link-description' );
        $this->add_render_attribute( 'social_icons', 'class', 'bio-link-social-icons' );
        $this->add_render_attribute( 'cta_buttons', 'class', 'bio-link-cta-buttons' );
    
        if ( 'yes' === $settings['full_width'] ) {
            $this->add_render_attribute( 'wrapper', 'class', 'bio-link-full-width' );
        }
    
        if ( 'yes' === $settings['full_screen_height'] ) {
            $full_screen_height_on = $settings['full_screen_height_on'];
            foreach ( $full_screen_height_on as $device ) {
                $this->add_render_attribute( 'wrapper', 'class', 'bio-link-full-screen-height-' . $device );
            }
        }
    
        ?>
        <div <?php echo $this->get_render_attribute_string( 'wrapper' ); ?>>
            <div <?php echo $this->get_render_attribute_string( 'content' ); ?>>
                <?php if ( 'profile' === $settings['image_style'] && $image_url ) : ?>
                    <div <?php echo $this->get_render_attribute_string( 'image' ); ?>>
                        <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $heading ); ?>">
                    </div>
                <?php elseif ( 'cover' === $settings['image_style'] && $image_url ) : ?>
                    <div <?php echo $this->get_render_attribute_string( 'cover_image' ); ?>>
                        <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $heading ); ?>">
                    </div>
                <?php endif; ?>
    
                <div class="bio-link-info">
                    <?php if ( $heading ) : ?>
                        <<?php echo esc_attr( $heading_tag ); ?> <?php echo $this->get_render_attribute_string( 'heading' ); ?>><?php echo wp_kses_post( $heading ); ?></<?php echo esc_attr( $heading_tag ); ?>>
                    <?php endif; ?>
    
                    <?php if ( $title ) : ?>
                        <<?php echo esc_attr( $title_tag ); ?> <?php echo $this->get_render_attribute_string( 'subheading' ); ?>><?php echo wp_kses_post( $title ); ?></<?php echo esc_attr( $title_tag ); ?>>
                    <?php endif; ?>
    
                    <?php if ( $description ) : ?>
                        <div <?php echo $this->get_render_attribute_string( 'description' ); ?>><?php echo wp_kses_post( $description ); ?></div>
                    <?php endif; ?>
                </div>
    
                <?php if ( $social_icons ) : ?>
                    <div <?php echo $this->get_render_attribute_string( 'social_icons' ); ?>>
                        <?php foreach ( $social_icons as $index => $item ) : ?>
                            <?php
                            $link_key = 'link_' . $index;
                            $this->add_link_attributes( $link_key, $item['link'] );
                            $icon_class = 'none' !== $item['social_media'] ? 'bio-link-icon-' . $item['social_media'] : '';
                            ?>
                            <a <?php echo $this->get_render_attribute_string( $link_key ); ?> class="bio-link-icon <?php echo esc_attr( $icon_class ); ?>">
                                <?php if ( 'none' !== $item['social_media'] ) : ?>
                                    <i class="fab fa-<?php echo esc_attr( $item['social_media'] ); ?>"></i>
                                <?php endif; ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
    
                <?php if ( $cta_links ) : ?>
                    <div <?php echo $this->get_render_attribute_string( 'cta_buttons' ); ?> class="bio-link-cta-buttons" style="display: flex; flex-direction: column; gap: 16px;">
                        <?php foreach ( $cta_links as $index => $item ) : ?>
                            <?php
                            $link_key = 'cta_link_' . $index;
                            $this->add_link_attributes( $link_key, $item['link'] );
                            ?>
                            <a <?php echo $this->get_render_attribute_string( $link_key ); ?> class="bio-link-cta">
                                <?php echo esc_html( $item['text'] ); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php
    }

    protected function content_template() {
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
    
        view.addRenderAttribute( 'wrapper', 'class', 'bio-link-wrapper' );
        view.addRenderAttribute( 'content', 'class', 'bio-link-content bio-link-content-center' );
        view.addRenderAttribute( 'image', 'class', 'bio-link-image' );
        view.addRenderAttribute( 'cover_image', 'class', 'bio-link-cover-image' );
        view.addRenderAttribute( 'heading', 'class', 'bio-link-heading' );
        view.addRenderAttribute( 'subheading', 'class', 'bio-link-subheading' );
        view.addRenderAttribute( 'description', 'class', 'bio-link-description' );
        view.addRenderAttribute( 'social_icons', 'class', 'bio-link-social-icons' );
        view.addRenderAttribute( 'cta_buttons', 'class', 'bio-link-cta-buttons' );
    
        if ( 'yes' === settings.full_width ) {
            view.addRenderAttribute( 'wrapper', 'class', 'bio-link-full-width' );
        }
    
        if ( 'yes' === settings.full_screen_height ) {
            var full_screen_height_on = settings.full_screen_height_on;
            _.each( full_screen_height_on, function( device ) {
                view.addRenderAttribute( 'wrapper', 'class', 'bio-link-full-screen-height-' + device );
            } );
        }
        #>
    
        <div {{{ view.getRenderAttributeString( 'wrapper' ) }}}>
            <div {{{ view.getRenderAttributeString( 'content' ) }}}>
                <# if ( 'profile' === settings.image_style && image_url ) { #>
                    <div {{{ view.getRenderAttributeString( 'image' ) }}}>
                        <img src="{{ image_url }}" alt="{{ heading }}">
                    </div>
                <# } else if ( 'cover' === settings.image_style && image_url ) { #>
                    <div {{{ view.getRenderAttributeString( 'cover_image' ) }}}>
                        <img src="{{ image_url }}" alt="{{ heading }}">
                    </div>
                <# } #>
    
                <div class="bio-link-info">
                    <# if ( heading ) { #>
                        <{{{ heading_tag }}} {{{ view.getRenderAttributeString( 'heading' ) }}}>{{{ heading }}}</{{{ heading_tag }}}>
                    <# } #>
    
                    <# if ( title ) { #>
                        <{{{ title_tag }}} {{{ view.getRenderAttributeString( 'subheading' ) }}}>{{{ title }}}</{{{ title_tag }}}>
                    <# } #>
    
                    <# if ( description ) { #>
                        <div {{{ view.getRenderAttributeString( 'description' ) }}}>{{{ description }}}</div>
                    <# } #>
                </div>
    
                <# if ( social_icons ) { #>
                    <div {{{ view.getRenderAttributeString( 'social_icons' ) }}}>
                        <# _.each( social_icons, function( item, index ) {
                            var link_key = 'link_' + index;
                            view.addRenderAttribute( link_key, 'href', item.link.url );
                            view.addRenderAttribute( link_key, 'class', 'bio-link-icon bio-link-icon-' + item.social_media );
                        #>
                            <a {{{ view.getRenderAttributeString( link_key ) }}}>
                                <# if ( 'none' !== item.social_media ) { #>
                                    <i class="fab fa-{{ item.social_media }}"></i>
                                <# } #>
                            </a>
                        <# } ); #>
                    </div>
                <# } #>
    
                <# if ( cta_links ) { #>
                    <div {{{ view.getRenderAttributeString( 'cta_buttons' ) }}} class="bio-link-cta-buttons" style="display: flex; flex-direction: column; gap: 16px;">
                        <# _.each( cta_links, function( item, index ) {
                            var link_key = 'cta_link_' + index;
                            view.addRenderAttribute( link_key, 'href', item.link.url );
                            view.addRenderAttribute( link_key, 'class', 'bio-link-cta' );
                        #>
                            <a {{{ view.getRenderAttributeString( link_key ) }}}>
                                {{{ item.text }}}
                            </a>
                        <# } ); #>
                    </div>
                <# } #>
            </div>
        </div>
        <?php
    }
}

