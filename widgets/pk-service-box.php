<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class PK_Service_Box_Widget extends Widget_Base {

    public function get_name() {
        return 'pk_service_box';
    }

    public function get_title() {
        return __( 'PK Service Box', 'pk-elementor-widgets' );
    }

    public function get_icon() {
        return 'eicon-box';
    }

    public function get_categories() {
        return [ 'basic' ];
    }

    protected function register_controls() {
         // Container Section
         $this->start_controls_section(
            'container_section',
            [
                'label' => __( 'Container', 'pk-elementor-widgets' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'background_image',
            [
                'label' => __( 'Achtergrond afbeelding', 'pk-elementor-widgets' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow',
                'label' => __( 'Box Shadow', 'pk-elementor-widgets' ),
            ]
        );

        $this->end_controls_section();

        // Title Section
        $this->start_controls_section(
            'title_section',
            [
                'label' => __( 'Titel', 'pk-elementor-widgets' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __( 'Titel', 'pk-elementor-widgets' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Service Titel', 'pk-elementor-widgets' ),
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __( 'Typografie', 'pk-elementor-widgets' ),
                'selector' => '{{WRAPPER}} .service-title',
            ]
        );

        $this->end_controls_section();

        // Price Section
        $this->start_controls_section(
            'price_section',
            [
                'label' => __( 'Prijs', 'pk-elementor-widgets' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'price',
            [
                'label' => __( 'Prijs', 'pk-elementor-widgets' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'vanaf $230', 'pk-elementor-widgets' ),
            ]
        );

        $this->add_control(
            'price_background',
            [
                'label' => __( 'Achtergrond kleur', 'pk-elementor-widgets' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .price-box' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

        // List Section
        $this->start_controls_section(
            'list_section',
            [
                'label' => __( 'Overzichtspunten', 'pk-elementor-widgets' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'list_items',
            [
                'label' => __( 'Lijst items', 'pk-elementor-widgets' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'list_item',
                        'label' => __( 'Lijst item', 'pk-elementor-widgets' ),
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Nieuw punt', 'pk-elementor-widgets' ),
                    ],
                ],
                'title_field' => '{{{ list_item }}}',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="service-box" style="background-image: url('<?php echo esc_url( $settings['background_image']['url'] ); ?>');">
            <div class="price-box"><?php echo esc_html( $settings['price'] ); ?></div>
            <h2 class="service-title"><?php echo esc_html( $settings['title'] ); ?></h2>
            <ul class="service-list">
                <?php foreach ( $settings['list_items'] as $item ) : ?>
                    <li><?php echo esc_html( $item['list_item'] ); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php
    }
}
