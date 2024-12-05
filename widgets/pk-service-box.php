<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

// Verzeker dat Elementor beschikbaar is voordat we verder gaan
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Blokkeer directe toegang
}

class PK_Service_Box_Widget extends Widget_Base {

    // Geef de widget een unieke naam
        public function get_name() {
        return 'pk_service_box';
    }
    // Geef de widget een titel weer in Elementor
    public function get_title() {
        return __('Service Box', 'pk-elementor-widgets');
    }

    // Specificeer een icoon voor de widget
    public function get_icon() {
        return 'eicon-price-table';
    }

    public function get_custom_help_url() {
        return 'https://www.pieterkeuzenkamp.nl';
    }

    public function get_style_depends() {
        return ['pk-service-box'];
    }

    public function get_script_depends() {
        return [];
    }

    public function get_categories() {
        return ['pkw-elements'];
    }

    protected function register_controls() {
        // Content Section
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'pk-elementor-widgets'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Titel', 'pk-elementor-widgets'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Service Titel', 'pk-elementor-widgets'),
            ]
        );

        $this->add_control(
            'price',
            [
                'label' => __('Prijs', 'pk-elementor-widgets'),
                'type' => Controls_Manager::TEXT,
                'default' => __('vanaf €230', 'pk-elementor-widgets'),
            ]
        );

        $this->add_control(
            'price_label',
            [
                'label' => __('Price Label', 'pk-elementor-widgets'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Vanaf', 'pk-elementor-widgets'),
            ]
        );

        $this->add_control(
            'container_background_image',
            [
                'label' => __('Background Image', 'pk-elementor-widgets'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => '',
                ],
            ]
        );

        $this->add_control(
            'list_items',
            [
                'label' => __('Lijst items', 'pk-elementor-widgets'),
                'type' => Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'list_item',
                        'label' => __('Lijst item', 'pk-elementor-widgets'),
                        'type' => Controls_Manager::TEXT,
                        'default' => __('Nieuw punt', 'pk-elementor-widgets'),
                    ],
                ],
                'title_field' => '{{{ list_item }}}',
            ]
        );

        $this->end_controls_section();

        // Container Style Section
        $this->start_controls_section(
            'container_style_section',
            [
                'label' => __('Container Styling', 'pk-elementor-widgets'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'container_width',
            [
                'label' => __('Width', 'pk-elementor-widgets'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => ['min' => 0, 'max' => 1000],
                    '%' => ['min' => 0, 'max' => 100],
                ],
                'selectors' => [
                    '{{WRAPPER}} .pk-service-layout-info-box' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'container_position',
            [
                'label' => __('Position', 'pk-elementor-widgets'),
                'type' => Controls_Manager::SELECT,
                'default' => 'relative',
                'options' => [
                    'relative' => __('Relative', 'pk-elementor-widgets'),
                    'absolute' => __('Absolute', 'pk-elementor-widgets'),
                    'fixed' => __('Fixed', 'pk-elementor-widgets'),
                ],
                'selectors' => [
                    '{{WRAPPER}} .pk-service-layout-info-box' => 'position: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'container_z_index',
            [
                'label' => __('Z-Index', 'pk-elementor-widgets'),
                'type' => Controls_Manager::NUMBER,
                'min' => -9999,
                'step' => 1,
                'selectors' => [
                    '{{WRAPPER}} .stm-service-layout-info-box' => 'z-index: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'container_background',
                'label' => __('Background', 'pk-elementor-widgets'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .stm-service-layout-info-box',
            ]
        );

        $this->add_control(
            'background_overlay_color',
            [
                'label' => __('Background Overlay', 'pk-elementor-widgets'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .stm-service-layout-info-box::before' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'container_padding',
            [
                'label' => __('Padding', 'pk-elementor-widgets'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .stm-service-layout-info-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'container_margin',
            [
                'label' => __('Margin', 'pk-elementor-widgets'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .stm-service-layout-info-box' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'container_border',
                'label' => __('Border', 'pk-elementor-widgets'),
                'selector' => '{{WRAPPER}} .stm-service-layout-info-box',
            ]
        );

        $this->add_responsive_control(
            'container_border_radius',
            [
                'label' => __('Border Radius', 'pk-elementor-widgets'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .stm-service-layout-info-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'container_text_align',
            [
                'label' => __('Text Align', 'pk-elementor-widgets'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'pk-elementor-widgets'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'pk-elementor-widgets'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'pk-elementor-widgets'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'left',
                'selectors' => [
                    '{{WRAPPER}} .stm-service-layout-info-box' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Title Style Section
        $this->start_controls_section(
            'title_style_section',
            [
                'label' => __('Title Styling', 'pk-elementor-widgets'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __('Typography', 'pk-elementor-widgets'),
                'selector' => '{{WRAPPER}} .title',
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __('Color', 'pk-elementor-widgets'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'title_text_shadow',
                'label' => __('Text Shadow', 'pk-elementor-widgets'),
                'selector' => '{{WRAPPER}} .title',
            ]
        );

        $this->end_controls_section();

        // Price Box Style Section
        $this->start_controls_section(
            'price_style_section',
            [
                'label' => __('Price Box Styling', 'pk-elementor-widgets'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'price_width',
            [
                'label' => __('Width', 'pk-elementor-widgets'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => ['min' => 0, 'max' => 500],
                    '%' => ['min' => 0, 'max' => 100],
                ],
                'selectors' => [
                    '{{WRAPPER}} .service-price' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'price_position',
            [
                'label' => __('Position', 'pk-elementor-widgets'),
                'type' => Controls_Manager::SELECT,
                'default' => 'absolute',
                'options' => [
                    'relative' => __('Relative', 'pk-elementor-widgets'),
                    'absolute' => __('Absolute', 'pk-elementor-widgets'),
                    'fixed' => __('Fixed', 'pk-elementor-widgets'),
                ],
                'selectors' => [
                    '{{WRAPPER}} .service-price' => 'position: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'price_position_top',
            [
                'label' => __('Top', 'pk-elementor-widgets'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => ['min' => -100, 'max' => 100],
                    '%' => ['min' => -100, 'max' => 100],
                ],
                'selectors' => [
                    '{{WRAPPER}} .service-price' => 'top: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'price_position!' => 'relative',
                ],
            ]
        );

        $this->add_control(
            'price_position_right',
            [
                'label' => __('Right', 'pk-elementor-widgets'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => ['min' => -100, 'max' => 100],
                    '%' => ['min' => -100, 'max' => 100],
                ],
                'selectors' => [
                    '{{WRAPPER}} .service-price' => 'right: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'price_position!' => 'relative',
                ],
            ]
        );

        $this->add_control(
            'price_z_index',
            [
                'label' => __('Z-Index', 'pk-elementor-widgets'),
                'type' => Controls_Manager::NUMBER,
                'min' => -9999,
                'selectors' => [
                    '{{WRAPPER}} .service-price' => 'z-index: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'price_background',
                'label' => __('Background', 'pk-elementor-widgets'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .service-price',
            ]
        );

        $this->add_responsive_control(
            'price_padding',
            [
                'label' => __('Padding', 'pk-elementor-widgets'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .service-price' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'price_margin',
            [
                'label' => __('Margin', 'pk-elementor-widgets'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .service-price' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'price_border',
                'label' => __('Border', 'pk-elementor-widgets'),
                'selector' => '{{WRAPPER}} .service-price',
            ]
        );

        $this->add_responsive_control(
            'price_border_radius',
            [
                'label' => __('Border Radius', 'pk-elementor-widgets'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .service-price' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'price_typography',
                'label' => __('Typography', 'pk-elementor-widgets'),
                'selector' => '{{WRAPPER}} .service-price',
            ]
        );

        $this->add_control(
            'price_color',
            [
                'label' => __('Color', 'pk-elementor-widgets'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-price' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'price_text_shadow',
                'label' => __('Text Shadow', 'pk-elementor-widgets'),
                'selector' => '{{WRAPPER}} .service-price',
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'price_box_shadow',
                'label' => __('Box Shadow', 'pk-elementor-widgets'),
                'selector' => '{{WRAPPER}} .service-price',
            ]
        );

        $this->end_controls_section();

        // List Style Section
        $this->start_controls_section(
            'list_style_section',
            [
                'label' => __('List Styling', 'pk-elementor-widgets'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'list_margin',
            [
                'label' => __('List Margin', 'pk-elementor-widgets'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'list_padding',
            [
                'label' => __('List Padding', 'pk-elementor-widgets'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'list_text_align',
            [
                'label' => __('Text Align', 'pk-elementor-widgets'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'pk-elementor-widgets'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'pk-elementor-widgets'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'pk-elementor-widgets'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'left',
                'selectors' => [
                    '{{WRAPPER}} .content' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'list_typography',
                'label' => __('Typography', 'pk-elementor-widgets'),
                'selector' => '{{WRAPPER}} .content li',
            ]
        );

        $this->add_control(
            'list_color',
            [
                'label' => __('Text Color', 'pk-elementor-widgets'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .content li' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'list_style_type',
            [
                'label' => __('List Style Type', 'pk-elementor-widgets'),
                'type' => Controls_Manager::SELECT,
                'default' => 'none',
                'options' => [
                    'none' => __('None', 'pk-elementor-widgets'),
                    'disc' => __('Disc', 'pk-elementor-widgets'),
                    'circle' => __('Circle', 'pk-elementor-widgets'),
                    'square' => __('Square', 'pk-elementor-widgets'),
                    'decimal' => __('Decimal', 'pk-elementor-widgets'),
                ],
                'selectors' => [
                    '{{WRAPPER}} .content' => 'list-style-type: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'list_icon',
            [
                'label' => __('Custom Icon', 'pk-elementor-widgets'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-check',
                    'library' => 'fa-solid',
                ],
                'condition' => [
                    'list_style_type' => 'none',
                ],
            ]
        );

        $this->add_control(
            'list_icon_color',
            [
                'label' => __('Icon Color', 'pk-elementor-widgets'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .content li::before' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'list_style_type' => 'none',
                ],
            ]
        );

        $this->add_responsive_control(
            'list_icon_size',
            [
                'label' => __('Icon Size', 'pk-elementor-widgets'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .content li::before' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'list_style_type' => 'none',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="pk-service-layout-info-box">
            <div class="inner" style="background-image: url('<?php echo esc_url($settings['container_background_image']['url'] ?? ''); ?>');">
                <div class="title heading-font"><?php echo esc_html($settings['title']); ?></div>

                <div class="service-price heading-font">
                    <div class="price-label"><?php echo esc_html($settings['price_label'] ?? 'Vanaf'); ?></div>
                    <div class="price-value"><?php echo esc_html($settings['price']); ?></div>
                </div>

                <div class="content">
                    <ul>
                        <?php foreach ($settings['list_items'] as $item) : ?>
                            <li><?php echo esc_html($item['list_item']); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
        <?php
    }
}
