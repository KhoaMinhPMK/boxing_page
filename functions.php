<?php
/**
 * Theme Setup Functions
 */

if ( ! function_exists( 'pageboxing_setup' ) ) :
    function pageboxing_setup() {
        // 1. Cho phép khách hàng sửa Logo trong Appearance -> Customize
        add_theme_support( 'custom-logo', array(
            'height'      => 100,
            'width'       => 400,
            'flex-height' => true,
            'flex-width'  => true,
            'header-text' => array( 'site-title', 'site-description' ),
        ) );

        // 2. Tự động thêm thẻ <title> chuẩn SEO
        add_theme_support( 'title-tag' );

        // 3. Cho phép khách hàng đặt "Ảnh đại diện" (Featured Image) cho bài viết
        add_theme_support( 'post-thumbnails' );

        // 4. Đăng ký vị trí Menu để khách vào Appearance -> Menus kéo thả
        register_nav_menus( array(
            'primary' => __( 'Primary Menu', 'pageboxing' ),
            'footer'  => __( 'Footer Menu', 'pageboxing' ),
        ) );

        // 5. Hỗ trợ HTML5 cho các form tìm kiếm, bình luận
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );
    }
endif;
add_action( 'after_setup_theme', 'pageboxing_setup' );

/**
 * Nạp file CSS và JS
 */
function pageboxing_scripts() {
    // Nạp file style.css chính
    wp_enqueue_style( 'pageboxing-style', get_stylesheet_uri() );

    // Ở đây bạn có thể nạp thêm Bootstrap, FontAwesome nếu cần
    // wp_enqueue_style( 'bootstrap', 'link_cdn_bootstrap' );
}
add_action( 'wp_enqueue_scripts', 'pageboxing_scripts' );

/**
 * Tạo Customizer cho phần Hero (Banner đầu trang)
 */
function pageboxing_customize_register( $wp_customize ) {
    // 1. Tạo một Section mới tên là "Cài đặt Hero Banner"
    $wp_customize->add_section( 'hero_section', array(
        'title'    => __( 'Cài đặt Hero Banner', 'pageboxing' ),
        'priority' => 30,
        'description' => 'Chỉnh sửa nội dung phần đầu trang chủ',
    ) );

    // --- TIÊU ĐỀ LỚN (Màu đen) ---
    $wp_customize->add_setting( 'hero_headline_1', array( 'default' => 'MMA' ) );
    $wp_customize->add_control( 'hero_headline_1', array(
        'label'   => __( 'Dòng 1 (VD: MMA)', 'pageboxing' ),
        'section' => 'hero_section',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'hero_headline_2', array( 'default' => 'GRAPPLING' ) );
    $wp_customize->add_control( 'hero_headline_2', array(
        'label'   => __( 'Dòng 2 (VD: GRAPPLING)', 'pageboxing' ),
        'section' => 'hero_section',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'hero_headline_3', array( 'default' => 'BOXING' ) );
    $wp_customize->add_control( 'hero_headline_3', array(
        'label'   => __( 'Dòng 3 (VD: BOXING)', 'pageboxing' ),
        'section' => 'hero_section',
        'type'    => 'text',
    ) );

    // --- TIÊU ĐỀ PHỤ (Màu vàng) ---
    $wp_customize->add_setting( 'hero_subheadline', array( 'default' => 'REAL WORLD GRAPPLING' ) );
    $wp_customize->add_control( 'hero_subheadline', array(
        'label'   => __( 'Chữ nhỏ màu vàng', 'pageboxing' ),
        'section' => 'hero_section',
        'type'    => 'text',
    ) );

    // --- MÔ TẢ ---
    $wp_customize->add_setting( 'hero_description', array( 'default' => 'Get weekly breakdowns, PDF guides, and videos focused on clinch control...' ) );
    $wp_customize->add_control( 'hero_description', array(
        'label'   => __( 'Mô tả ngắn', 'pageboxing' ),
        'section' => 'hero_section',
        'type'    => 'textarea',
    ) );

    // --- ẢNH HERO (Người võ sĩ) ---
    $wp_customize->add_setting( 'hero_image' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'hero_image', array(
        'label'    => __( 'Ảnh Võ Sĩ (Bên phải)', 'pageboxing' ),
        'section'  => 'hero_section',
        'settings' => 'hero_image',
    ) ) );

    // --- NÚT BẤM 1 (Vàng) ---
    $wp_customize->add_setting( 'hero_btn1_text', array( 'default' => 'BOOK PRIVATE SESSION' ) );
    $wp_customize->add_control( 'hero_btn1_text', array( 'label' => 'Chữ nút Vàng', 'section' => 'hero_section' ) );
    
    $wp_customize->add_setting( 'hero_btn1_url', array( 'default' => '#' ) );
    $wp_customize->add_control( 'hero_btn1_url', array( 'label' => 'Link nút Vàng', 'section' => 'hero_section' ) );

    // --- NÚT BẤM 2 (Viền) ---
    $wp_customize->add_setting( 'hero_btn2_text', array( 'default' => 'FREE ACCESS' ) );
    $wp_customize->add_control( 'hero_btn2_text', array( 'label' => 'Chữ nút Viền', 'section' => 'hero_section' ) );

    $wp_customize->add_setting( 'hero_btn2_url', array( 'default' => '#' ) );
    $wp_customize->add_control( 'hero_btn2_url', array( 'label' => 'Link nút Viền', 'section' => 'hero_section' ) );

    // --- 6. TÍNH NĂNG "EDIT SHORTCUTS" (ICON BÚT CHÌ) ---
    // Giúp khách hàng click vào ảnh/chữ trên màn hình preview là sửa được ngay
    if ( isset( $wp_customize->selective_refresh ) ) {
        
        // Icon sửa cho Ảnh Võ Sĩ
        $wp_customize->selective_refresh->add_partial( 'hero_image', array(
            'selector'        => '.hero-image', // Class bao quanh ảnh
            'render_callback' => function() {
                $hero_img = get_theme_mod('hero_image');
                if( $hero_img ) {
                    return '<img src="' . esc_url($hero_img) . '" alt="Fighter">';
                } else {
                    return '<div class="placeholder-fighter"><img src="https://placehold.co/600x800/png?text=Fighter+Image" alt="Placeholder"></div>';
                }
            },
        ) );

        // Icon sửa cho Tiêu đề
        $wp_customize->selective_refresh->add_partial( 'hero_headline_1', array(
            'selector' => '.hero-title',
            'render_callback' => function() {
                // Render lại cả khối tiêu đề khi sửa text
                return '
                <div class="title-row-mixed">
                    <span class="text-mma">'.get_theme_mod('hero_headline_1', 'MMA').'</span>
                    <div class="text-stack-gold">
                        <span class="gold-upper">REAL WORLD</span>
                        <span class="gold-lower">GRAPPLING</span>
                    </div>
                </div>
                <div class="title-block">'.get_theme_mod('hero_headline_3', 'BOXING').'</div>
                <div class="title-block">'.get_theme_mod('hero_headline_2', 'GRAPPLING').'</div>';
            },
        ) );
    }

    // --- SECTION 2: DISCIPLINES ---
    $wp_customize->add_section( 'disciplines_section', array(
        'title'    => __( 'Cài đặt Section Disciplines', 'pageboxing' ),
        'priority' => 31,
    ) );

    // 1. Subtitle (Dòng chữ nhỏ dưới tiêu đề)
    $wp_customize->add_setting( 'disciplines_subtitle', array( 'default' => 'TRAIN IN MULTIPLE COMBAT SPORTS TO BECOME A COMPLETE FIGHTER' ) );
    $wp_customize->add_control( 'disciplines_subtitle', array(
        'label'   => __( 'Phụ đề (Subtitle)', 'pageboxing' ),
        'section' => 'disciplines_section',
        'type'    => 'text',
    ) );

    // 2. Ảnh Võ Sĩ Giữa
    $wp_customize->add_setting( 'disciplines_image' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'disciplines_image', array(
        'label'    => __( 'Ảnh Võ Sĩ (Ở giữa)', 'pageboxing' ),
        'section'  => 'disciplines_section',
    ) ) );

    // 3. Mô tả
    $wp_customize->add_setting( 'disciplines_description', array( 'default' => 'Mixed Martial Arts training combining striking, grappling, and ground fighting techniques for complete combat effectiveness.' ) );
    $wp_customize->add_control( 'disciplines_description', array(
        'label'   => __( 'Đoạn mô tả', 'pageboxing' ),
        'section' => 'disciplines_section',
        'type'    => 'textarea',
    ) );

    // 4. Bullet Points (4 mục)
    $wp_customize->add_setting( 'disciplines_point_1', array( 'default' => 'Stand-up Fighting' ) );
    $wp_customize->add_control( 'disciplines_point_1', array( 'label' => 'Mục 1', 'section' => 'disciplines_section' ) );

    $wp_customize->add_setting( 'disciplines_point_2', array( 'default' => 'Clinch Work' ) );
    $wp_customize->add_control( 'disciplines_point_2', array( 'label' => 'Mục 2', 'section' => 'disciplines_section' ) );

    $wp_customize->add_setting( 'disciplines_point_3', array( 'default' => 'Ground Game' ) );
    $wp_customize->add_control( 'disciplines_point_3', array( 'label' => 'Mục 3', 'section' => 'disciplines_section' ) );

    $wp_customize->add_setting( 'disciplines_point_4', array( 'default' => 'Submissions' ) );
    $wp_customize->add_control( 'disciplines_point_4', array( 'label' => 'Mục 4', 'section' => 'disciplines_section' ) );

    // 5. Disciplines Logos (Boxing, MMA, Grappling)
    $wp_customize->add_setting( 'disciplines_logo_1' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'disciplines_logo_1', array(
        'label'    => __( 'Logo Boxing (Trái)', 'pageboxing' ),
        'section'  => 'disciplines_section',
    ) ) );

    $wp_customize->add_setting( 'disciplines_logo_2' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'disciplines_logo_2', array(
        'label'    => __( 'Logo MMA (Giữa)', 'pageboxing' ),
        'section'  => 'disciplines_section',
    ) ) );

    $wp_customize->add_setting( 'disciplines_logo_3' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'disciplines_logo_3', array(
        'label'    => __( 'Logo Grappling (Phải)', 'pageboxing' ),
        'section'  => 'disciplines_section',
    ) ) );

    // Add partial refresh for Disciplines Image
    if ( isset( $wp_customize->selective_refresh ) ) {
        $wp_customize->selective_refresh->add_partial( 'disciplines_image', array(
            'selector'        => '.disciplines-image',
            'render_callback' => function() {
                $img = get_theme_mod('disciplines_image');
                if( $img ) {
                    return '<img src="' . esc_url($img) . '" alt="Fighters">';
                } else {
                    return '<img src="' . get_template_directory_uri() . '/assets/vosi.svg" alt="Fighters Default">';
                }
            },
        ) );

        // Add partial refresh for Disciplines Description
        $wp_customize->selective_refresh->add_partial( 'disciplines_description', array(
            'selector'        => '.disciplines-description',
            'render_callback' => function() {
                return get_theme_mod('disciplines_description', 'Mixed Martial Arts training combining striking, grappling, and ground fighting techniques for complete combat effectiveness.');
            },
        ) );

        // Add partial refresh for Disciplines List
        $wp_customize->selective_refresh->add_partial( 'disciplines_point_1', array(
            'selector'        => '.disciplines-list',
            'render_callback' => function() {
                return '
                    <li>'.get_theme_mod('disciplines_point_1', 'Stand-up Fighting').'</li>
                    <li>'.get_theme_mod('disciplines_point_2', 'Clinch Work').'</li>
                    <li>'.get_theme_mod('disciplines_point_3', 'Ground Game').'</li>
                    <li>'.get_theme_mod('disciplines_point_4', 'Submissions').'</li>';
            },
        ) );
    }

    // --- SECTION 3: AWARDS & ACHIEVEMENTS ---
    $wp_customize->add_section( 'awards_section', array(
        'title'    => __( 'Cài đặt Section Awards', 'pageboxing' ),
        'priority' => 32,
    ) );

    // 1. Title
    $wp_customize->add_setting( 'awards_title', array( 'default' => 'AWARDS & ACHIEVEMENTS' ) );
    $wp_customize->add_control( 'awards_title', array(
        'label'   => __( 'Tiêu đề (Awards)', 'pageboxing' ),
        'section' => 'awards_section',
        'type'    => 'text',
    ) );

    // 2. Description
    $wp_customize->add_setting( 'awards_description', array( 'default' => 'EXPERIENCE FORGED IN COMPETITION. EVERY MEDAL TELLS A STORY OF DEDICATION, STRATEGY, AND THE TECHNIQUES I NOW SHARE WITH YOU' ) );
    $wp_customize->add_control( 'awards_description', array(
        'label'   => __( 'Đoạn mô tả', 'pageboxing' ),
        'section' => 'awards_section',
        'type'    => 'textarea',
    ) );

    // 3. Years Images
    $wp_customize->add_setting( 'awards_year_img_1' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'awards_year_img_1', array(
        'label'    => __( 'Ảnh Năm 1 (Trái)', 'pageboxing' ),
        'section'  => 'awards_section',
    ) ) );

    $wp_customize->add_setting( 'awards_year_img_2' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'awards_year_img_2', array(
        'label'    => __( 'Ảnh Năm 2 (Giữa)', 'pageboxing' ),
        'section'  => 'awards_section',
    ) ) );

    $wp_customize->add_setting( 'awards_year_img_3' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'awards_year_img_3', array(
        'label'    => __( 'Ảnh Năm 3 (Phải)', 'pageboxing' ),
        'section'  => 'awards_section',
    ) ) );

    // Add partial refresh for Awards
    if ( isset( $wp_customize->selective_refresh ) ) {
        $wp_customize->selective_refresh->add_partial( 'awards_title', array(
            'selector' => '.awards-title',
            'render_callback' => function() { return get_theme_mod('awards_title', 'AWARDS & ACHIEVEMENTS'); },
        ) );

        $wp_customize->selective_refresh->add_partial( 'awards_description', array(
            'selector' => '.awards-description',
            'render_callback' => function() { return get_theme_mod('awards_description', 'EXPERIENCE FORGED IN COMPETITION...'); },
        ) );
        
        $wp_customize->selective_refresh->add_partial( 'awards_year_img_1', array(
            'selector' => '.awards-years',
            'render_callback' => function() {
                // Return full HTML structure for the years grid to ensure proper update
                // This is a simplified version, front-page.php has the full logic
                return ''; 
            },
        ) );
    }

    // --- SECTION 4: STATS & HIGHLIGHT ---
    $wp_customize->add_section( 'stats_section', array(
        'title'    => __( 'Cài đặt Section Stats', 'pageboxing' ),
        'priority' => 33,
    ) );

    // Highlight Part
    $wp_customize->add_setting( 'stats_highlight_img' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'stats_highlight_img', array(
        'label'    => __( 'Ảnh Highlight (Huy chương)', 'pageboxing' ),
        'section'  => 'stats_section',
    ) ) );

    $wp_customize->add_setting( 'stats_highlight_title', array( 'default' => 'GRAPPLING TOURNAMENT GOLD' ) );
    $wp_customize->add_control( 'stats_highlight_title', array( 'label' => 'Tiêu đề Highlight', 'section' => 'stats_section' ) );

    $wp_customize->add_setting( 'stats_highlight_subtitle', array( 'default' => 'No-Gi Division' ) );
    $wp_customize->add_control( 'stats_highlight_subtitle', array( 'label' => 'Phụ đề Highlight', 'section' => 'stats_section' ) );

    $wp_customize->add_setting( 'stats_highlight_icon' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'stats_highlight_icon', array(
        'label'    => __( 'Icon Phụ đề', 'pageboxing' ),
        'section'  => 'stats_section',
    ) ) );

    $wp_customize->add_setting( 'stats_highlight_desc', array( 'default' => 'This tournament tested every aspect of my grappling...' ) );
    $wp_customize->add_control( 'stats_highlight_desc', array(
        'label'   => __( 'Mô tả Highlight', 'pageboxing' ),
        'section' => 'stats_section',
        'type'    => 'textarea',
    ) );

    // Stats Grid (4 Columns)
    // Col 1
    $wp_customize->add_setting( 'stats_icon_1' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'stats_icon_1', array( 'label' => 'Icon Cột 1', 'section' => 'stats_section' ) ) );
    $wp_customize->add_setting( 'stats_number_1', array( 'default' => '10+' ) );
    $wp_customize->add_control( 'stats_number_1', array( 'label' => 'Số liệu Cột 1', 'section' => 'stats_section' ) );
    $wp_customize->add_setting( 'stats_label_1', array( 'default' => 'YEARS TRAINING' ) );
    $wp_customize->add_control( 'stats_label_1', array( 'label' => 'Nhãn Cột 1', 'section' => 'stats_section' ) );

    // Col 2
    $wp_customize->add_setting( 'stats_icon_2' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'stats_icon_2', array( 'label' => 'Icon Cột 2', 'section' => 'stats_section' ) ) );
    $wp_customize->add_setting( 'stats_number_2', array( 'default' => '25+' ) );
    $wp_customize->add_control( 'stats_number_2', array( 'label' => 'Số liệu Cột 2', 'section' => 'stats_section' ) );
    $wp_customize->add_setting( 'stats_label_2', array( 'default' => 'COMPETITIONS' ) );
    $wp_customize->add_control( 'stats_label_2', array( 'label' => 'Nhãn Cột 2', 'section' => 'stats_section' ) );

    // Col 3
    $wp_customize->add_setting( 'stats_icon_3' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'stats_icon_3', array( 'label' => 'Icon Cột 3', 'section' => 'stats_section' ) ) );
    $wp_customize->add_setting( 'stats_number_3', array( 'default' => '15+' ) );
    $wp_customize->add_control( 'stats_number_3', array( 'label' => 'Số liệu Cột 3', 'section' => 'stats_section' ) );
    $wp_customize->add_setting( 'stats_label_3', array( 'default' => 'CHAMPIONSHIPS' ) );
    $wp_customize->add_control( 'stats_label_3', array( 'label' => 'Nhãn Cột 3', 'section' => 'stats_section' ) );

    // Col 4
    $wp_customize->add_setting( 'stats_icon_4' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'stats_icon_4', array( 'label' => 'Icon Cột 4', 'section' => 'stats_section' ) ) );
    $wp_customize->add_setting( 'stats_number_4', array( 'default' => '100+' ) );
    $wp_customize->add_control( 'stats_number_4', array( 'label' => 'Số liệu Cột 4', 'section' => 'stats_section' ) );
    $wp_customize->add_setting( 'stats_label_4', array( 'default' => 'STUDENTS TRAINED' ) );
    $wp_customize->add_control( 'stats_label_4', array( 'label' => 'Nhãn Cột 4', 'section' => 'stats_section' ) );

    // Selective Refresh for Highlight Title
    if ( isset( $wp_customize->selective_refresh ) ) {
        $wp_customize->selective_refresh->add_partial( 'stats_highlight_title', array(
            'selector' => '.highlight-title',
            'render_callback' => function() { return get_theme_mod('stats_highlight_title', 'GRAPPLING TOURNAMENT GOLD'); },
        ) );
        $wp_customize->selective_refresh->add_partial( 'stats_highlight_desc', array(
            'selector' => '.highlight-desc',
            'render_callback' => function() { return get_theme_mod('stats_highlight_desc'); },
        ) );
        $wp_customize->selective_refresh->add_partial( 'stats_highlight_img', array(
            'selector' => '.stats-highlight-img',
            'render_callback' => function() { 
                $img = get_theme_mod('stats_highlight_img');
                return $img ? '<img src="' . esc_url($img) . '">' : ''; 
            },
        ) );
    }

    // --- SECTION 5: RECENT POSTS (VIDEOS) ---
    $wp_customize->add_section( 'recent_posts_section', array(
        'title'    => __( 'Cài đặt Section Recent Posts', 'pageboxing' ),
        'priority' => 34,
    ) );

    // Title & Subtitle
    $wp_customize->add_setting( 'recent_title', array( 'default' => 'VIEW MY RECENT POSTS' ) );
    $wp_customize->add_control( 'recent_title', array( 'label' => 'Tiêu đề', 'section' => 'recent_posts_section' ) );

    $wp_customize->add_setting( 'recent_subtitle', array( 'default' => 'LIVE TRAINING CLIPS, BREAKDOWNS, AND CONCEPTS FROM MY DAILY PRACTICE' ) );
    $wp_customize->add_control( 'recent_subtitle', array( 'label' => 'Phụ đề', 'section' => 'recent_posts_section' ) );

    // Add Selective Refresh for Recent Posts
    if ( isset( $wp_customize->selective_refresh ) ) {
        $wp_customize->selective_refresh->add_partial( 'recent_title', array(
            'selector' => '.recent-title',
            'render_callback' => function() { return get_theme_mod('recent_title'); },
        ) );
        $wp_customize->selective_refresh->add_partial( 'recent_subtitle', array(
            'selector' => '.recent-subtitle',
            'render_callback' => function() { return get_theme_mod('recent_subtitle'); },
        ) );
    }

    // Videos (Loop 10 items)
    for($i=1; $i<=10; $i++) {
        $wp_customize->add_setting( 'recent_video_thumb_'.$i );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'recent_video_thumb_'.$i, array(
            'label'    => __( 'Ảnh Thumbnail Video '.$i, 'pageboxing' ),
            'section'  => 'recent_posts_section',
        ) ) );

        $wp_customize->add_setting( 'recent_video_url_'.$i, array( 'default' => '#' ) );
        $wp_customize->add_control( 'recent_video_url_'.$i, array(
            'label'   => __( 'Link Video '.$i, 'pageboxing' ),
            'section' => 'recent_posts_section',
            'type'    => 'url',
        ) );
    }

    // --- SECTION 6: FREE ACCESS ---
    $wp_customize->add_section( 'free_access_section', array(
        'title'    => __( 'Cài đặt Section Free Access', 'pageboxing' ),
        'priority' => 35,
    ) );

    // Header Info
    $wp_customize->add_setting( 'free_title', array( 'default' => 'FREE ACCESS' ) );
    $wp_customize->add_control( 'free_title', array( 'label' => 'Tiêu đề Chính', 'section' => 'free_access_section' ) );

    $wp_customize->add_setting( 'free_subtitle', array( 'default' => 'STEP-BY-STEP SYSTEMS BUILT FOR MMA, SELF-DEFENSE, AND REAL-WORLD GRAPPLING.' ) );
    $wp_customize->add_control( 'free_subtitle', array( 'label' => 'Phụ đề', 'section' => 'free_access_section' ) );

    // Add Selective Refresh for Free Access Header
    if ( isset( $wp_customize->selective_refresh ) ) {
        $wp_customize->selective_refresh->add_partial( 'free_title', array(
            'selector' => '.free-access-section .recent-title',
            'render_callback' => function() { return get_theme_mod('free_title'); },
        ) );
        $wp_customize->selective_refresh->add_partial( 'free_subtitle', array(
            'selector' => '.free-access-section .recent-subtitle',
            'render_callback' => function() { return get_theme_mod('free_subtitle'); },
        ) );
    }

    // 3 Cards Loop
    for($j=1; $j<=3; $j++) {
        // Card Title
        $wp_customize->add_setting( 'free_card_title_'.$j, array( 'default' => 'MODULE TITLE' ) );
        $wp_customize->add_control( 'free_card_title_'.$j, array( 
            'label' => 'Tiêu đề Card '.$j, 
            'section' => 'free_access_section' 
        ) );

        // Card Image
        $wp_customize->add_setting( 'free_card_img_'.$j );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'free_card_img_'.$j, array(
            'label'    => __( 'Ảnh nền Card '.$j, 'pageboxing' ),
            'section'  => 'free_access_section',
        ) ) );

        // Card Description
        $wp_customize->add_setting( 'free_card_desc_'.$j, array( 'default' => 'Essential drills for balance, movement, and control.' ) );
        $wp_customize->add_control( 'free_card_desc_'.$j, array( 
            'label' => 'Mô tả Card '.$j, 
            'section' => 'free_access_section',
            'type' => 'textarea' 
        ) );

        // Card Link
        $wp_customize->add_setting( 'free_card_link_'.$j, array( 'default' => '#' ) );
        $wp_customize->add_control( 'free_card_link_'.$j, array( 
            'label' => 'Link nút bấm Card '.$j, 
            'section' => 'free_access_section',
            'type' => 'url'
        ) );
        
        // Selective Refresh for each Card (Refresh the whole grid to keep simple)
        if ( isset( $wp_customize->selective_refresh ) ) {
            $wp_customize->selective_refresh->add_partial( 'free_card_title_'.$j, array(
                'selector' => '.free-grid',
                'render_callback' => function() { return ''; /* Forces full refresh of container */ },
            ) );
        }
    }

    // --- SECTION 7: NEWSLETTER / OPT-IN ---
    $wp_customize->add_section( 'newsletter_section', array(
        'title'    => __( 'Cài đặt Section Newsletter', 'pageboxing' ),
        'priority' => 36,
    ) );

    // Background Image
    $wp_customize->add_setting( 'newsletter_bg_img' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'newsletter_bg_img', array(
        'label'    => __( 'Ảnh Nền (Chứa Người + Sọc)', 'pageboxing' ),
        'section'  => 'newsletter_section',
    ) ) );

    // Title Right
    $wp_customize->add_setting( 'newsletter_title', array( 'default' => 'GET FREE WEEKLY LESSONS STRAIGHT TO YOUR EMAIL' ) );
    $wp_customize->add_control( 'newsletter_title', array( 
        'label' => 'Tiêu đề (Bên phải)', 
        'section' => 'newsletter_section',
        'type' => 'textarea' 
    ) );

    // Disclaimer
    $wp_customize->add_setting( 'newsletter_disclaimer', array( 'default' => 'BY CHECKING THIS BOX, I CONSENT TO RECEIVE MARKETING AND PROMOTIONAL MESSAGES...' ) );
    $wp_customize->add_control( 'newsletter_disclaimer', array( 
        'label' => 'Nội dung Disclaimer', 
        'section' => 'newsletter_section',
        'type' => 'textarea' 
    ) );

    // Button Text
    $wp_customize->add_setting( 'newsletter_btn_text', array( 'default' => 'BOOK PRIVATE SESSION' ) );
    $wp_customize->add_control( 'newsletter_btn_text', array( 
        'label' => 'Chữ trên nút', 
        'section' => 'newsletter_section' 
    ) );

    // Button URL
    $wp_customize->add_setting( 'newsletter_btn_url', array( 'default' => '#' ) );
    $wp_customize->add_control( 'newsletter_btn_url', array( 
        'label' => 'Link nút', 
        'section' => 'newsletter_section',
        'type' => 'url'
    ) );

    // Add Selective Refresh for Newsletter
    if ( isset( $wp_customize->selective_refresh ) ) {
        $wp_customize->selective_refresh->add_partial( 'newsletter_title', array(
            'selector' => '.newsletter-title',
            'render_callback' => function() { return nl2br(get_theme_mod('newsletter_title')); },
        ) );
        $wp_customize->selective_refresh->add_partial( 'newsletter_disclaimer', array(
            'selector' => '.form-check label',
            'render_callback' => function() { return get_theme_mod('newsletter_disclaimer'); },
        ) );
        $wp_customize->selective_refresh->add_partial( 'newsletter_btn_text', array(
            'selector' => '.btn-newsletter',
            'render_callback' => function() { return get_theme_mod('newsletter_btn_text'); },
        ) );
    }

    // --- SECTION 8: BOOKING / PRIVATE SESSION ---
    $wp_customize->add_section( 'booking_section', array(
        'title'    => __( 'Cài đặt Section Booking', 'pageboxing' ),
        'priority' => 37,
        'description' => 'Chỉnh sửa phần Đặt Lịch Tập Riêng',
    ) );

    // Background Image
    $wp_customize->add_setting( 'booking_bg_img' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'booking_bg_img', array(
        'label'    => __( 'Ảnh Nền Section', 'pageboxing' ),
        'section'  => 'booking_section',
    ) ) );

    // Title & Subtitle
    $wp_customize->add_setting( 'booking_title', array( 'default' => 'BOOK A PRIVATE SESSION' ) );
    $wp_customize->add_control( 'booking_title', array( 
        'label' => 'Tiêu đề (Title)', 
        'section' => 'booking_section' 
    ) );

    $wp_customize->add_setting( 'booking_subtitle', array( 'default' => 'WORK ONE - ON - ONE WITH OUR EXPERT INSTRUCTORS FOR PERSONALIZED TRAINING' ) );
    $wp_customize->add_control( 'booking_subtitle', array( 
        'label' => 'Phụ đề (Subtitle)', 
        'section' => 'booking_section' 
    ) );

    // SERVICE 1
    $wp_customize->add_setting( 'booking_service_icon_1' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'booking_service_icon_1', array(
        'label'    => __( 'Icon Dịch Vụ 1', 'pageboxing' ),
        'section'  => 'booking_section',
    ) ) );

    $wp_customize->add_setting( 'booking_service_name_1', array( 'default' => 'PRIVATE TRAINING' ) );
    $wp_customize->add_control( 'booking_service_name_1', array( 'label' => 'Tên Dịch Vụ 1', 'section' => 'booking_section' ) );

    $wp_customize->add_setting( 'booking_service_price_1', array( 'default' => '60 min - $100 CAD' ) );
    $wp_customize->add_control( 'booking_service_price_1', array( 'label' => 'Giá Dịch Vụ 1', 'section' => 'booking_section' ) );

    $wp_customize->add_setting( 'booking_service_desc_1', array( 'default' => 'One-on-one personalized training session covering MMA, Boxing, or Grappling techniques' ) );
    $wp_customize->add_control( 'booking_service_desc_1', array( 
        'label' => 'Mô tả Dịch Vụ 1', 
        'section' => 'booking_section',
        'type' => 'textarea'
    ) );

    // SERVICE 2
    $wp_customize->add_setting( 'booking_service_icon_2' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'booking_service_icon_2', array(
        'label'    => __( 'Icon Dịch Vụ 2', 'pageboxing' ),
        'section'  => 'booking_section',
    ) ) );

    $wp_customize->add_setting( 'booking_service_name_2', array( 'default' => 'TECHNIQUE ANALYSIS' ) );
    $wp_customize->add_control( 'booking_service_name_2', array( 'label' => 'Tên Dịch Vụ 2', 'section' => 'booking_section' ) );

    $wp_customize->add_setting( 'booking_service_price_2', array( 'default' => '60 min - $25 CAD' ) );
    $wp_customize->add_control( 'booking_service_price_2', array( 'label' => 'Giá Dịch Vụ 2', 'section' => 'booking_section' ) );

    $wp_customize->add_setting( 'booking_service_desc_2', array( 'default' => 'Video review and feedback on your technique with actionable improvement tips' ) );
    $wp_customize->add_control( 'booking_service_desc_2', array( 
        'label' => 'Mô tả Dịch Vụ 2', 
        'section' => 'booking_section',
        'type' => 'textarea'
    ) );

    // BOOKING INFORMATION
    $wp_customize->add_setting( 'booking_info_title', array( 'default' => 'BOOKING INFORMATION' ) );
    $wp_customize->add_control( 'booking_info_title', array( 'label' => 'Tiêu đề Thông tin đặt lịch', 'section' => 'booking_section' ) );

    $wp_customize->add_setting( 'booking_info_1', array( 'default' => 'Sessions are available within the next 30 days based on Coach Ali\'s availability' ) );
    $wp_customize->add_control( 'booking_info_1', array( 'label' => 'Thông tin 1', 'section' => 'booking_section' ) );

    $wp_customize->add_setting( 'booking_info_2', array( 'default' => 'You\'ll receive a confirmation email with session details and preparation instructions' ) );
    $wp_customize->add_control( 'booking_info_2', array( 'label' => 'Thông tin 2', 'section' => 'booking_section' ) );

    $wp_customize->add_setting( 'booking_info_3', array( 'default' => 'All sessions can be conducted in-person or virtually via video call' ) );
    $wp_customize->add_control( 'booking_info_3', array( 'label' => 'Thông tin 3', 'section' => 'booking_section' ) );

    $wp_customize->add_setting( 'booking_info_4', array( 'default' => 'Cancellations must be made at least 24 hours in advance for a full refund' ) );
    $wp_customize->add_control( 'booking_info_4', array( 'label' => 'Thông tin 4', 'section' => 'booking_section' ) );

    // MOBILE PRIVATE SESSION
    $wp_customize->add_setting( 'booking_mobile_title', array( 'default' => 'MOBILE PRIVATE SESSION' ) );
    $wp_customize->add_control( 'booking_mobile_title', array( 'label' => 'Tiêu đề Mobile Session', 'section' => 'booking_section' ) );

    $wp_customize->add_setting( 'booking_mobile_desc_inline', array( 'default' => 'I offer 1-on-1 private training sessions at your home or preferred location' ) );
    $wp_customize->add_control( 'booking_mobile_desc_inline', array( 'label' => 'Mô tả inline', 'section' => 'booking_section' ) );

    $wp_customize->add_setting( 'booking_mobile_1', array( 'default' => 'Free travel within 8 km of M2M 0B5' ) );
    $wp_customize->add_control( 'booking_mobile_1', array( 'label' => 'Mobile Info 1', 'section' => 'booking_section' ) );

    $wp_customize->add_setting( 'booking_mobile_2', array( 'default' => 'For locations beyond 8 km: $1 per km fee each way ($2 per km round-trip)' ) );
    $wp_customize->add_control( 'booking_mobile_2', array( 'label' => 'Mobile Info 2', 'section' => 'booking_section' ) );

    // DEPOSIT REQUIRED
    $wp_customize->add_setting( 'booking_deposit_title', array( 'default' => 'DEPOSIT REQUIRED' ) );
    $wp_customize->add_control( 'booking_deposit_title', array( 'label' => 'Tiêu đề Deposit', 'section' => 'booking_section' ) );

    $wp_customize->add_setting( 'booking_deposit_1', array( 'default' => 'A 20% deposit is required to confirm your booking' ) );
    $wp_customize->add_control( 'booking_deposit_1', array( 'label' => 'Deposit Info', 'section' => 'booking_section' ) );

    // CANCELLATION POLICY
    $wp_customize->add_setting( 'booking_policy_title', array( 'default' => 'CANCELLATION POLICY' ) );
    $wp_customize->add_control( 'booking_policy_title', array( 'label' => 'Tiêu đề Chính sách hủy', 'section' => 'booking_section' ) );

    $wp_customize->add_setting( 'booking_policy_1', array( 'default' => 'Cancellations must be made at least 24 hours in advance to receive a full refund' ) );
    $wp_customize->add_control( 'booking_policy_1', array( 'label' => 'Policy Info 1', 'section' => 'booking_section' ) );

    $wp_customize->add_setting( 'booking_policy_2', array( 'default' => 'Cancellations within 24 hours or no-shows will forfeit the 20% deposit' ) );
    $wp_customize->add_control( 'booking_policy_2', array( 'label' => 'Policy Info 2', 'section' => 'booking_section' ) );

    // FIGHTER IMAGE
    $wp_customize->add_setting( 'booking_fighter_img' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'booking_fighter_img', array(
        'label'    => __( 'Ảnh Võ Sĩ (Bên phải)', 'pageboxing' ),
        'section'  => 'booking_section',
    ) ) );

    // CTA BUTTON
    $wp_customize->add_setting( 'booking_cta_text', array( 'default' => 'VIEW AVAILABLE TIMES' ) );
    $wp_customize->add_control( 'booking_cta_text', array( 'label' => 'Chữ trên nút CTA', 'section' => 'booking_section' ) );

    $wp_customize->add_setting( 'booking_cta_url', array( 'default' => '#' ) );
    $wp_customize->add_control( 'booking_cta_url', array( 
        'label' => 'Link nút CTA', 
        'section' => 'booking_section',
        'type' => 'url'
    ) );

    // SELECTIVE REFRESH FOR BOOKING SECTION (Edit Icons)
    if ( isset( $wp_customize->selective_refresh ) ) {
        // Title
        $wp_customize->selective_refresh->add_partial( 'booking_title', array(
            'selector' => '.booking-title',
            'render_callback' => function() { return get_theme_mod('booking_title', 'BOOK A PRIVATE SESSION'); },
        ) );

        // Subtitle
        $wp_customize->selective_refresh->add_partial( 'booking_subtitle', array(
            'selector' => '.booking-subtitle',
            'render_callback' => function() { return get_theme_mod('booking_subtitle'); },
        ) );

        // Service 1 Name
        $wp_customize->selective_refresh->add_partial( 'booking_service_name_1', array(
            'selector' => '.service-item:first-child .service-name',
            'render_callback' => function() { 
                return get_theme_mod('booking_service_name_1', 'PRIVATE TRAINING') . 
                       '<span class="service-price">' . get_theme_mod('booking_service_price_1', '60 min - $100 CAD') . '</span>'; 
            },
        ) );

        // Service 2 Name
        $wp_customize->selective_refresh->add_partial( 'booking_service_name_2', array(
            'selector' => '.service-item:nth-child(2) .service-name',
            'render_callback' => function() { 
                return get_theme_mod('booking_service_name_2', 'TECHNIQUE ANALYSIS') . 
                       '<span class="service-price">' . get_theme_mod('booking_service_price_2', '60 min - $25 CAD') . '</span>'; 
            },
        ) );

        // Service 1 Desc
        $wp_customize->selective_refresh->add_partial( 'booking_service_desc_1', array(
            'selector' => '.service-item:first-child .service-desc',
            'render_callback' => function() { return get_theme_mod('booking_service_desc_1'); },
        ) );

        // Service 2 Desc
        $wp_customize->selective_refresh->add_partial( 'booking_service_desc_2', array(
            'selector' => '.service-item:nth-child(2) .service-desc',
            'render_callback' => function() { return get_theme_mod('booking_service_desc_2'); },
        ) );

        // Info Title
        $wp_customize->selective_refresh->add_partial( 'booking_info_title', array(
            'selector' => '.booking-info-left .info-block:first-child .info-title',
            'render_callback' => function() { return get_theme_mod('booking_info_title', 'BOOKING INFORMATION'); },
        ) );

        // Mobile Title
        $wp_customize->selective_refresh->add_partial( 'booking_mobile_title', array(
            'selector' => '.booking-info-left .info-block:nth-child(2) .info-title',
            'render_callback' => function() { 
                return get_theme_mod('booking_mobile_title', 'MOBILE PRIVATE SESSION') . 
                       '<span class="info-dash">---</span>' .
                       '<span class="info-inline-desc">' . get_theme_mod('booking_mobile_desc_inline') . '</span>'; 
            },
        ) );

        // Deposit Title
        $wp_customize->selective_refresh->add_partial( 'booking_deposit_title', array(
            'selector' => '.booking-info-left .info-block:nth-child(3) .info-title',
            'render_callback' => function() { return get_theme_mod('booking_deposit_title', 'DEPOSIT REQUIRED'); },
        ) );

        // Policy Title
        $wp_customize->selective_refresh->add_partial( 'booking_policy_title', array(
            'selector' => '.booking-info-left .info-block:nth-child(4) .info-title',
            'render_callback' => function() { return get_theme_mod('booking_policy_title', 'CANCELLATION POLICY'); },
        ) );

        // Fighter Image
        $wp_customize->selective_refresh->add_partial( 'booking_fighter_img', array(
            'selector' => '.booking-fighter-img',
            'render_callback' => function() { 
                $img = get_theme_mod('booking_fighter_img');
                if($img) {
                    return '<img src="' . esc_url($img) . '" alt="Fighter Action">';
                } else {
                    return '<img src="https://placehold.co/530x900/transparent/png?text=Fighter" alt="Fighter Placeholder">';
                }
            },
        ) );

        // CTA Button Text
        $wp_customize->selective_refresh->add_partial( 'booking_cta_text', array(
            'selector' => '.btn-booking-large',
            'render_callback' => function() { return '<span>' . get_theme_mod('booking_cta_text', 'VIEW AVAILABLE TIMES') . '</span>'; },
        ) );
    }

}
add_action( 'customize_register', 'pageboxing_customize_register' );

// ========================================
// NEWSLETTER FORM HANDLER
// ========================================

/**
 * Handle newsletter form submission
 * Sends email to admin and redirects back to page
 */
function pageboxing_handle_newsletter_form() {
    // Verify nonce for security
    if (!isset($_POST['newsletter_nonce']) || !wp_verify_nonce($_POST['newsletter_nonce'], 'newsletter_form_nonce')) {
        wp_redirect(home_url('/?form_status=error'));
        exit;
    }

    // Sanitize form data
    $name = sanitize_text_field($_POST['subscriber_name']);
    $email = sanitize_email($_POST['subscriber_email']);
    $consent = isset($_POST['consent']) ? 'Đã đồng ý' : 'Chưa đồng ý';

    // Validate required fields
    if (empty($name) || empty($email)) {
        wp_redirect(home_url('/?form_status=error'));
        exit;
    }

    // Prepare email content
    $admin_email = get_option('admin_email'); // Gets the WordPress admin email
    $site_name = get_bloginfo('name');
    
    $subject = "[{$site_name}] Đăng ký mới từ: {$name}";
    
    $message = "Bạn có một đăng ký mới từ website!\n\n";
    $message .= "========================================\n";
    $message .= "Họ tên: {$name}\n";
    $message .= "Email: {$email}\n";
    $message .= "Đồng ý điều khoản: {$consent}\n";
    $message .= "Thời gian: " . date('d/m/Y H:i:s') . "\n";
    $message .= "========================================\n\n";
    $message .= "Email này được gửi tự động từ form đăng ký trên website.";

    $headers = array(
        'Content-Type: text/plain; charset=UTF-8',
        'From: ' . $site_name . ' <' . $admin_email . '>',
        'Reply-To: ' . $name . ' <' . $email . '>'
    );

    // Send email (Disabled per request)
    // $sent = wp_mail($admin_email, $subject, $message, $headers);
    $sent = true; // Assume success since we are saving to DB

    // Save to database
    $subscribers = get_option('pageboxing_subscribers', array());
    // Submit at beginning of array for newest first
    array_unshift($subscribers, array(
        'name' => $name,
        'email' => $email,
        'consent' => $consent,
        'date' => current_time('mysql')
    ));
    update_option('pageboxing_subscribers', $subscribers);

    // Redirect back with status
    if ($sent) {
        wp_redirect(home_url('/?form_status=success#newsletter-section'));
    } else {
        wp_redirect(home_url('/?form_status=error'));
    }
    exit;
}
add_action('admin_post_pageboxing_newsletter_submit', 'pageboxing_handle_newsletter_form');
add_action('admin_post_nopriv_pageboxing_newsletter_submit', 'pageboxing_handle_newsletter_form');

// ========================================
// ADMIN DASHBOARD - SUBSCRIBERS LIST
// ========================================

/**
 * Register Admin Menu for Subscribers
 */
function pageboxing_register_subscribers_page() {
    add_menu_page(
        'Danh sách đăng ký Form', // Page Title
        'Subscribers List',         // Menu Title
        'manage_options',           // Capability
        'pageboxing-subscribers',   // Menu Slug
        'pageboxing_render_subscribers_page', // Callback function
        'dashicons-email-alt',      // Icon
        6                           // Position
    );
}
add_action('admin_menu', 'pageboxing_register_subscribers_page');

/**
 * Render the Admin Page Content
 */
function pageboxing_render_subscribers_page() {
    // Check user capabilities
    if (!current_user_can('manage_options')) {
        return;
    }

    // Get Data
    $subscribers = get_option('pageboxing_subscribers', array());

    echo '<div class="wrap">';
    echo '<h1 class="wp-heading-inline">Danh sách đăng ký nhận tin / Tư vấn</h1>';
    
    // Simple table
    echo '<table class="wp-list-table widefat fixed striped table-view-list">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Họ Tên</th>';
    echo '<th>Email</th>';
    echo '<th>Trạng thái Consent</th>';
    echo '<th>Ngày đăng ký</th>';
    echo '</tr>';
    echo '</thead>';
    
    echo '<tbody>';
    
    if (empty($subscribers)) {
        echo '<tr><td colspan="4">Chưa có ai đăng ký.</td></tr>';
    } else {
        foreach ($subscribers as $sub) {
            echo '<tr>';
            echo '<td>' . esc_html($sub['name']) . '</td>';
            echo '<td><a href="mailto:' . esc_attr($sub['email']) . '">' . esc_html($sub['email']) . '</a></td>';
            echo '<td>' . esc_html($sub['consent']) . '</td>';
            echo '<td>' . date('d/m/Y H:i', strtotime($sub['date'])) . '</td>';
            echo '</tr>';
        }
    }
    
    echo '</tbody>';
    echo '</table>';
    echo '</div>';
}
