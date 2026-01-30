<?php
/**
 * Template Name: Front Page
 */

get_header(); 
?>

<div class="hero-section">
    <div class="container hero-container">
        
        <!-- CỘT BÊN TRÁI: TEXT -->
        <div class="hero-content">
            <!-- Logo Mobile (nếu cần hiển thị riêng) -->
            
            <h1 class="hero-title">
                <!-- Dòng 1: MMA + Text nhỏ -->
                <div class="title-row-mixed">
                    <span class="text-mma">MMA</span>
                    <div class="text-stack-gold">
                        <span class="gold-upper">REAL WORLD</span>
                        <span class="gold-lower">GRAPPLING</span>
                    </div>
                </div>
                
                <!-- Các dòng tiếp theo -->
                <div class="title-block">GRAPPLING</div>
                <div class="title-block">BOXING</div>
            </h1>

            <p class="hero-desc">
                <?php echo get_theme_mod('hero_description', 'Get weekly breakdowns, PDF guides, and videos focused on clinch control, grappling mechanics, and decision-making in close-range situations.'); ?>
            </p>

            <div class="hero-buttons">
                <!-- Nút 1: Gold Solid -->
                <a href="<?php echo get_theme_mod('hero_btn1_url', '#'); ?>" class="btn btn-gold">
                    <span><?php echo get_theme_mod('hero_btn1_text', 'BOOK PRIVATE SESSION'); ?></span>
                </a>

                <!-- Nút 2: Transparent + Border Gold -->
                <a href="<?php echo get_theme_mod('hero_btn2_url', '#'); ?>" class="btn btn-outline">
                    <span><?php echo get_theme_mod('hero_btn2_text', 'FREE ACCESS'); ?></span>
                </a>
            </div>
        </div>

        <!-- CỘT BÊN PHẢI: ẢNH -->
        <div class="hero-image">
            <?php 
            $hero_img = get_theme_mod('hero_image');
            if( $hero_img ) : ?>
                <img src="<?php echo esc_url($hero_img); ?>" alt="Fighter">
            <?php else : ?>
                <!-- Placeholder giữ chỗ -->
                <div class="placeholder-fighter">
                    <img src="https://placehold.co/600x800/png?text=Fighter+Image" alt="Placeholder">
                </div>
            <?php endif; ?>
        </div>

    </div>
</div>

<!-- SECTION 2: OUR DISCIPLINES -->
<section class="disciplines-section">
    <div class="disciplines-shape-container">
        <!-- SVG Shape Background -->
        <div class="disciplines-badge-svg">
            <?php include get_template_directory() . '/assets/head2.svg'; ?>
        </div>
        
        <!-- Nội dung bên trong badge -->
        <div class="disciplines-content">
                
                <!-- Divider trên (đã ẩn trong CSS) -->
                <div class="disciplines-divider-top"></div>
                
                <!-- Họa tiết Line 1 (Mới thêm) -->
                <div class="disciplines-line-top">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/line1.png" alt="Decoration">
                </div>

                <!-- Tiêu đề Styled CSS -->
                <div class="disciplines-title-container">
                    <h2 class="disciplines-title">OUR DISCIPLINES</h2>
                </div>

                <!-- Họa tiết Line 1 (Dưới) - Chỉ là đường thẳng -->
                <div class="disciplines-line-bottom-simple"></div>

                <p class="disciplines-subtitle">
                    <?php echo get_theme_mod('disciplines_subtitle', 'TRAIN IN MULTIPLE COMBAT SPORTS TO BECOME A COMPLETE FIGHTER'); ?>
                </p>

                <!-- Hình ảnh võ sĩ (Khách có thể thay) -->
                <div class="disciplines-image">
                    <?php 
                    $disciplines_img = get_theme_mod('disciplines_image');
                    if( $disciplines_img ) : ?>
                        <img src="<?php echo esc_url($disciplines_img); ?>" alt="Fighters">
                    <?php else : ?>
                        <!-- Mặc định dùng ảnh vosi.svg -->
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/vosi.svg" alt="Fighters Default">
                    <?php endif; ?>
                </div>

                <!-- 3 cột disciplines -->
                <div class="disciplines-grid">
                    <div class="discipline-item">
                        <?php 
                        $logo1 = get_theme_mod('disciplines_logo_1');
                        if($logo1) : ?>
                            <img src="<?php echo esc_url($logo1); ?>" alt="Boxing Logo" class="discipline-logo">
                        <?php else : ?>
                            <!-- Placeholder Logo khi chưa upload -->
                            <img src="https://placehold.co/200x100/000000/FFFFFF/png?text=BOXING" alt="Boxing Logo" class="discipline-logo">
                        <?php endif; ?>
                    </div>
                    <div class="discipline-item discipline-main">
                        <?php 
                        $logo2 = get_theme_mod('disciplines_logo_2');
                        if($logo2) : ?>
                            <img src="<?php echo esc_url($logo2); ?>" alt="MMA Logo" class="discipline-logo">
                        <?php else : ?>
                             <!-- Placeholder Logo khi chưa upload -->
                             <img src="https://placehold.co/250x120/000000/FFFFFF/png?text=MMA" alt="MMA Logo" class="discipline-logo">
                        <?php endif; ?>
                    </div>
                    <div class="discipline-item">
                        <?php 
                        $logo3 = get_theme_mod('disciplines_logo_3');
                        if($logo3) : ?>
                            <img src="<?php echo esc_url($logo3); ?>" alt="Grappling Logo" class="discipline-logo">
                        <?php else : ?>
                             <!-- Placeholder Logo khi chưa upload -->
                             <img src="https://placehold.co/200x100/000000/FFFFFF/png?text=GRAPPLING" alt="Grappling Logo" class="discipline-logo">
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Mô tả -->
                <p class="disciplines-description">
                    <?php echo get_theme_mod('disciplines_description', 'Mixed Martial Arts training combining striking, grappling, and ground fighting techniques for complete combat effectiveness.'); ?>
                </p>

                <!-- Divider giữa -->
                <div class="disciplines-divider-diamonds">
                    <span class="diamond-line-left"></span>
                    <div class="diamonds-group">
                        <span class="diamond-sm"></span>
                        <span class="diamond-lg"></span>
                        <span class="diamond-sm"></span>
                    </div>
                    <span class="diamond-line-right"></span>
                </div>

                <!-- Bullet Points -->
                <ul class="disciplines-list">
                    <li><?php echo get_theme_mod('disciplines_point_1', 'Stand-up Fighting'); ?></li>
                    <li><?php echo get_theme_mod('disciplines_point_2', 'Clinch Work'); ?></li>
                    <li><?php echo get_theme_mod('disciplines_point_3', 'Ground Game'); ?></li>
                    <li><?php echo get_theme_mod('disciplines_point_4', 'Submissions'); ?></li>
                </ul>

            </div>
            
            <!-- SVG Bottom Background -->
            <div class="disciplines-badge-bottom-svg">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/bot2.webp" alt="">
            </div>
        </div>
    </div>
</section>

<!-- SECTION 3: AWARDS & ACHIEVEMENTS -->
<section class="awards-section">
    <div class="container awards-container">
        
        <!-- Top Decoration (Silver) -->
        <div class="awards-line-top">
             <img src="<?php echo get_template_directory_uri(); ?>/assets/line2.png" alt="Decoration">
        </div>

        <!-- Title -->
        <div class="awards-title-container">
             <h2 class="awards-title"><?php echo get_theme_mod('awards_title', 'AWARDS & ACHIEVEMENTS'); ?></h2>
        </div>
        
        <!-- Bottom Line (Simple Silver) -->
        <div class="awards-line-bottom"></div>

        <!-- Description -->
        <p class="awards-description">
            <?php echo get_theme_mod('awards_description', 'EXPERIENCE FORGED IN COMPETITION. EVERY MEDAL TELLS A STORY OF DEDICATION, STRATEGY, AND THE TECHNIQUES I NOW SHARE WITH YOU'); ?>
        </p>

        <!-- Years Grid -->
        <div class="awards-years">
             <div class="year-item year-past">
                <?php 
                $y1 = get_theme_mod('awards_year_img_1');
                if($y1) : ?>
                    <img src="<?php echo esc_url($y1); ?>" alt="2022" class="year-img">
                <?php else: ?>
                    <!-- Placeholder Text Image -->
                    <img src="https://placehold.co/150x60/cccccc/ffffff/png?text=2022" alt="2022" class="year-img">
                <?php endif; ?>
             </div>

             <div class="year-item year-current">
                <?php 
                $y2 = get_theme_mod('awards_year_img_2');
                if($y2) : ?>
                    <img src="<?php echo esc_url($y2); ?>" alt="2023" class="year-img">
                <?php else: ?>
                    <img src="https://placehold.co/200x80/000000/ffffff/png?text=2023" alt="2023" class="year-img">
                <?php endif; ?>
             </div>

             <div class="year-item year-future">
                <?php 
                $y3 = get_theme_mod('awards_year_img_3');
                if($y3) : ?>
                    <img src="<?php echo esc_url($y3); ?>" alt="2024" class="year-img">
                <?php else: ?>
                    <img src="https://placehold.co/150x60/cccccc/ffffff/png?text=2024" alt="2024" class="year-img">
                <?php endif; ?>
             </div>
        </div>

    </div>
</section>

<!-- Full Width Black Divider -->
<div class="section-divider-full"></div>

<!-- SECTION 4: STATS & HIGHLIGHT -->
<section class="stats-section">
    <div class="container stats-container">
        
        <!-- Highlight Row -->
        <div class="stats-highlight">
            <div class="stats-highlight-img">
                <?php 
                $hl_img = get_theme_mod('stats_highlight_img');
                if($hl_img) : ?>
                    <img src="<?php echo esc_url($hl_img); ?>" alt="Highlight Achievement">
                <?php else: ?>
                    <img src="https://placehold.co/300x300/gold/white?text=Medal" alt="Highlight Placeholder">
                <?php endif; ?>
            </div>
            
            <div class="stats-highlight-content">
                <h2 class="highlight-title"><?php echo get_theme_mod('stats_highlight_title', 'GRAPPLING TOURNAMENT GOLD'); ?></h2>
                <div class="highlight-divider"></div>
                
                <h3 class="highlight-subtitle">
                    <?php echo get_theme_mod('stats_highlight_subtitle', 'No-Gi Division'); ?>
                    <?php 
                    $hl_icon = get_theme_mod('stats_highlight_icon');
                    if($hl_icon) : ?>
                        <img src="<?php echo esc_url($hl_icon); ?>" class="subtitle-icon" alt="icon">
                    <?php endif; ?>
                </h3>
                
                <p class="highlight-desc">
                    <?php echo get_theme_mod('stats_highlight_desc', 'This tournament tested every aspect of my grappling. Competing against international talent, I won 5 matches by submission. The experience reinforced my belief that technique and positioning always triumph over raw strength.'); ?>
                </p>
            </div>
        </div>

        <!-- Stats Grid -->
        <div class="stats-grid">
            <!-- Item 1 -->
            <div class="stats-item">
                <div class="stats-icon">
                    <?php 
                    $icon1 = get_theme_mod('stats_icon_1');
                    if($icon1) : ?>
                        <img src="<?php echo esc_url($icon1); ?>" alt="Icon 1">
                    <?php else: ?>
                        <!-- SVG Placeholder -->
                        <svg viewBox="0 0 24 24" width="40" height="40"><path d="M12 2L2 7l10 5 10-5-10-5zm0 9l2-1-2-1-2 1 2 1zm0-3.5L6 5l6-3 6 3-6 2.5zM2 17l10 5 10-5M2 12l10 5 10-5" fill="none" stroke="#000" stroke-width="2"/></svg>
                    <?php endif; ?>
                </div>
                <div class="stats-number"><?php echo get_theme_mod('stats_number_1', '10+'); ?></div>
                <div class="stats-label"><?php echo get_theme_mod('stats_label_1', 'YEARS TRAINING'); ?></div>
            </div>

            <div class="stats-divider-vert"></div>

            <!-- Item 2 -->
            <div class="stats-item">
                <div class="stats-icon">
                    <?php 
                    $icon2 = get_theme_mod('stats_icon_2');
                    if($icon2) : ?>
                        <img src="<?php echo esc_url($icon2); ?>" alt="Icon 2">
                    <?php else: ?>
                        <svg viewBox="0 0 24 24" width="40" height="40"><circle cx="12" cy="12" r="10" fill="none" stroke="#000" stroke-width="2"/></svg>
                    <?php endif; ?>
                </div>
                <div class="stats-number"><?php echo get_theme_mod('stats_number_2', '25+'); ?></div>
                <div class="stats-label"><?php echo get_theme_mod('stats_label_2', 'COMPETITIONS'); ?></div>
            </div>

            <div class="stats-divider-vert"></div>

            <!-- Item 3 -->
            <div class="stats-item">
                <div class="stats-icon">
                    <?php 
                    $icon3 = get_theme_mod('stats_icon_3');
                    if($icon3) : ?>
                        <img src="<?php echo esc_url($icon3); ?>" alt="Icon 3">
                    <?php else: ?>
                        <svg viewBox="0 0 24 24" width="40" height="40"><path d="M12 2l3 6 6 1-4 4 1 6-6-3-6 3 1-6-4-4 6-1 3-6z" fill="none" stroke="#000" stroke-width="2"/></svg>
                    <?php endif; ?>
                </div>
                <div class="stats-number"><?php echo get_theme_mod('stats_number_3', '15+'); ?></div>
                <div class="stats-label"><?php echo get_theme_mod('stats_label_3', 'CHAMPIONSHIPS'); ?></div>
            </div>

            <div class="stats-divider-vert"></div>

            <!-- Item 4 -->
            <div class="stats-item">
                <div class="stats-icon">
                    <?php 
                    $icon4 = get_theme_mod('stats_icon_4');
                    if($icon4) : ?>
                        <img src="<?php echo esc_url($icon4); ?>" alt="Icon 4">
                    <?php else: ?>
                        <svg viewBox="0 0 24 24" width="40" height="40"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" fill="none" stroke="#000" stroke-width="2"/><circle cx="9" cy="7" r="4" fill="none" stroke="#000" stroke-width="2"/></svg>
                    <?php endif; ?>
                </div>
                <div class="stats-number"><?php echo get_theme_mod('stats_number_4', '100+'); ?></div>
                <div class="stats-label"><?php echo get_theme_mod('stats_label_4', 'STUDENTS TRAINED'); ?></div>
            </div>
        </div>

    </div>
</section>

<!-- SECTION 5: RECENT POSTS (VIDEOS) -->
<section class="recent-posts-section">
    
    <!-- Header Full Width Wrapper -->
    <div class="recent-header-wrapper">
        <!-- Top Decoration (Spikes) -->
        <div class="recent-decoration-top">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/line2.png" alt="Decoration">
        </div>

        <!-- Full Width Silver Bar -->
        <div class="recent-header-bar-full">
            <div class="container">
                <h2 class="recent-title"><?php echo get_theme_mod('recent_title', 'VIEW MY RECENT POSTS'); ?></h2>
            </div>
        </div>
        
        <!-- Bottom Shadow/Line -->
        <div class="recent-decoration-bottom"></div>
    </div>

    <div class="container recent-container">
        <p class="recent-subtitle">
            <?php echo get_theme_mod('recent_subtitle', 'LIVE TRAINING CLIPS, BREAKDOWNS, AND CONCEPTS FROM MY DAILY PRACTICE'); ?>
        </p>

        <!-- Slider Wrapper -->
        <div class="video-slider-wrapper">
            <!-- Prev Button -->
            <button class="slider-btn slider-prev" onclick="moveSlider(-1)">
                <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="15 18 9 12 15 6"></polyline></svg>
            </button>
            
            <div class="video-slider-viewport" id="videoSlider">
                <div class="video-slider-track">
                    <?php 
                    // Tăng giới hạn lên 10 video
                    for($i=1; $i<=10; $i++): 
                        $thumb = get_theme_mod('recent_video_thumb_'.$i);
                        $url = get_theme_mod('recent_video_url_'.$i, '#');
                        
                        // LOGIC HIỂN THỊ ĐỘNG:
                        // 1. Nếu có ảnh thumbnail -> Hiển thị (Người dùng đã thêm)
                        // 2. Nếu chưa có ảnh nhưng là 5 video đầu tiên -> Hiển thị Placeholder (Demo ban đầu)
                        // 3. Nếu là video 6-10 mà chưa có ảnh -> Ẩn đi (Tránh hiện ô trống)
                        
                        $show_item = false;

                        if ($thumb) {
                            $show_item = true;
                        } elseif ($i <= 5) {
                            // Demo placeholders cho 5 cái đầu
                            $thumb = 'https://placehold.co/270x480/333333/ffffff/png?text=VIDEO+'.$i;
                            $show_item = true;
                        }

                        if ($show_item):
                    ?>
                    <div class="video-item">
                        <a href="<?php echo esc_url($url); ?>" target="_blank" class="video-link">
                            <div class="video-thumb-container">
                                <img src="<?php echo esc_url($thumb); ?>" alt="Video <?php echo $i; ?>">
                                <div class="play-overlay">
                                    <svg viewBox="0 0 24 24" fill="white"><path d="M8 5v14l11-7z"/></svg>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php endif; // End if show_item ?>
                    <?php endfor; ?>
                </div>
            </div>

            <!-- Next Button -->
            <button class="slider-btn slider-next" onclick="moveSlider(1)">
                <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </button>
        </div>

    </div>
</section>

<!-- SECTION 6: FREE ACCESS -->
<section class="free-access-section">
    <!-- Header Full Width Wrapper (Reuse Class) -->
    <div class="recent-header-wrapper">
        <!-- Top Decoration -->
        <div class="recent-decoration-top">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/line2.png" alt="Decoration">
        </div>

        <!-- Full Width Bar -->
        <div class="recent-header-bar-full">
            <div class="container">
                <h2 class="recent-title"><?php echo get_theme_mod('free_title', 'FREE ACCESS'); ?></h2>
            </div>
        </div>
        
        <!-- Bottom Shadow -->
        <div class="recent-decoration-bottom"></div>
    </div>

    <div class="container free-container">
        <p class="recent-subtitle">
            <?php echo get_theme_mod('free_subtitle', 'STEP-BY-STEP SYSTEMS BUILT FOR MMA, SELF-DEFENSE, AND REAL-WORLD GRAPPLING.'); ?>
        </p>

        <!-- Grid 3 Items -->
        <div class="free-grid">
            <?php 
            $default_titles = ['FOOTWORK', 'BJJ CONCEPT', 'START LEARNING'];
            $default_descs = [
                'ESSENTIAL FOOTWORK DRILLS FOR BALANCE, MOVEMENT, AND CONTROL.',
                'THE CORE TECHNIQUES EVERY BEGINNER SHOULD KNOW.',
                'FUNDAMENTAL CONCEPTS EXPLAINED THROUGH VIDEO LESSONS WITH A DOWNLOADABLE PDF.'
            ];
            
            for($j=1; $j<=3; $j++): 
                $title = get_theme_mod('free_card_title_'.$j, $default_titles[$j-1]);
                $img = get_theme_mod('free_card_img_'.$j);
                $desc = get_theme_mod('free_card_desc_'.$j, $default_descs[$j-1]);
                $link = get_theme_mod('free_card_link_'.$j, '#');

                if(!$img) {
                    $img = 'https://placehold.co/400x500/555/FFF?text=Fighter+Image';
                }
            ?>
            <div class="free-card">
                <!-- Title Outline -->
                <h3 class="free-card-title"><?php echo esc_html($title); ?></h3>
                
                <!-- Main Image Container -->
                <div class="free-card-visual">
                    <img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($title); ?>">
                    
                    <!-- White Content Box -->
                    <div class="free-card-box">
                        <p><?php echo esc_html($desc); ?></p>
                    </div>
                </div>

                <!-- Button (Absolute Bottom) -->
                <a href="<?php echo esc_url($link); ?>" class="free-card-btn">GET ACCESS</a>
            </div>
            <?php endfor; ?>
        </div>

    </div>
</section>



<!-- SECTION 7: NEWSLETTER / OPT-IN -->
<section class="newsletter-section" style="background-image: url('<?php echo esc_url(get_theme_mod('newsletter_bg_img', 'https://placehold.co/1920x800/eeeeee/cccccc?text=Background+Image')); ?>');">
    <div class="container newsletter-container">
        
        <!-- Right Side Content -->
        <div class="newsletter-content">
            
            <!-- Headline -->
            <h2 class="newsletter-title">
                <?php echo nl2br(get_theme_mod('newsletter_title', "GET FREE\nWEEKLY LESSONS\nSTRAIGHT TO\nYOUR EMAIL")); ?>
            </h2>

            <!-- Form Box -->
            <div class="newsletter-form-box">
                <?php
                // Display success/error messages
                if(isset($_GET['form_status'])) {
                    if($_GET['form_status'] == 'success') {
                        echo '<div class="form-message success">Cảm ơn bạn đã đăng ký! Chúng tôi sẽ liên hệ sớm.</div>';
                    } elseif($_GET['form_status'] == 'error') {
                        echo '<div class="form-message error">Có lỗi xảy ra. Vui lòng thử lại.</div>';
                    }
                }
                ?>
                <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post" class="newsletter-form">
                    
                    <!-- Hidden fields for WordPress -->
                    <input type="hidden" name="action" value="pageboxing_newsletter_submit">
                    <?php wp_nonce_field('newsletter_form_nonce', 'newsletter_nonce'); ?>
                    
                    <!-- Input Fields -->
                    <div class="form-group">
                        <input type="text" name="subscriber_name" placeholder="Full name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="email" name="subscriber_email" placeholder="Email" class="form-control" required>
                    </div>

                    <!-- Disclaimer Checkbox -->
                    <div class="form-check">
                        <input type="checkbox" name="consent" id="news-consent" required>
                        <label for="news-consent">
                            <?php echo get_theme_mod('newsletter_disclaimer', 'BY CHECKING THIS BOX, I CONSENT TO RECEIVE MARKETING AND PROMOTIONAL MESSAGES, INCLUDING SPECIAL OFFERS, DISCOUNTS, NEW PRODUCT UPDATES AMONG OTHERS. MESSAGE FREQUENCY MAY VARY. MESSAGE & DATA RATES MAY APPLY. REPLY HELP FOR HELP OR STOP TO OPT-OUT.'); ?>
                        </label>
                    </div>

                    <!-- Footer: Privacy & Button -->
                    <div class="form-footer">
                        <div class="form-links">
                            <a href="#">PRIVACY POLICY</a> | <a href="#">TERMS OF SERVICE</a>
                        </div>
                        
                        <button type="submit" class="btn-newsletter">
                            <?php echo get_theme_mod('newsletter_btn_text', 'BOOK PRIVATE SESSION'); ?>
                        </button>
                    </div>

                </form>
            </div>

        </div>

    </div>

</section>

<!-- Bottom Decoration (Bot3) - Moved Outside -->
<div class="newsletter-bottom-decoration-block">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/bot3.webp" alt="">
</div>

<!-- SECTION NEW: BOOKING / PRIVATE SESSION -->
<section class="booking-section" style="background-image: url('<?php echo esc_url(get_theme_mod('booking_bg_img', get_template_directory_uri() . '/assets/booking-bg.jpg')); ?>');">
    <!-- Overlay tối để làm nổi bật nội dung -->
    <div class="booking-overlay"></div>

    <div class="container booking-container">
        
        <!-- TOP HEADER -->
        <div class="booking-header">
            <div class="booking-line-top">
                 <img src="<?php echo get_template_directory_uri(); ?>/assets/line1.png" alt="Decoration">
            </div>
            <h2 class="booking-title"><?php echo get_theme_mod('booking_title', 'BOOK A PRIVATE SESSION'); ?></h2>
            <p class="booking-subtitle"><?php echo get_theme_mod('booking_subtitle', 'WORK ONE - ON - ONE WITH OUR EXPERT INSTRUCTORS FOR PERSONALIZED TRAINING'); ?></p>
        </div>

        <div class="booking-content-wrapper">
            
            <!-- FIGHTER IMAGE (Absolute Overlay - Positioned to Right) -->
            <div class="booking-fighter-img">
                <?php 
                $fighter_img = get_theme_mod('booking_fighter_img');
                if($fighter_img) : ?>
                    <img src="<?php echo esc_url($fighter_img); ?>" alt="Fighter Action">
                <?php else: ?>
                    <!-- Placeholder -->
                    <img src="https://placehold.co/530x900/transparent/png?text=Fighter" alt="Fighter Placeholder">
                <?php endif; ?>
            </div>

            <!-- MAIN CONTENT AREA -->
            <div class="booking-main-content">
                
                <!-- SERVICE ITEM 1 -->
                <div class="service-item">
                    <div class="service-icon">
                        <?php 
                        $svc_icon1 = get_theme_mod('booking_service_icon_1');
                        if($svc_icon1) : ?>
                            <img src="<?php echo esc_url($svc_icon1); ?>" alt="Private Training">
                        <?php else: ?>
                            <!-- SVG Placeholder: 2 People -->
                            <svg viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.5"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                        <?php endif; ?>
                    </div>
                    <div class="service-details">
                        <h3 class="service-name">
                            <?php echo get_theme_mod('booking_service_name_1', 'PRIVATE TRAINING'); ?>
                            <span class="service-price"><?php echo get_theme_mod('booking_service_price_1', '60 min - $100 CAD'); ?></span>
                        </h3>
                        <p class="service-desc">
                            <?php echo get_theme_mod('booking_service_desc_1', 'One-on-one personalized training session covering MMA, Boxing, or Grappling techniques'); ?>
                        </p>
                    </div>
                </div>

                <!-- SERVICE ITEM 2 -->
                <div class="service-item">
                    <div class="service-icon">
                        <?php 
                        $svc_icon2 = get_theme_mod('booking_service_icon_2');
                        if($svc_icon2) : ?>
                            <img src="<?php echo esc_url($svc_icon2); ?>" alt="Technique Analysis">
                        <?php else: ?>
                            <!-- SVG Placeholder: Grappling/Wrestling -->
                            <svg viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.5"><path d="M14 14.5l-2.5 2.5"/><path d="M6 9l4 4"/><path d="M10 21l-3-3 2-2 3 3"/><path d="M22 17l-3 3-2-2 3-3"/><path d="M15 13l-4-4"/><path d="M12 3a3 3 0 1 0 0 6 3 3 0 0 0 0-6z"/><path d="M20 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/></svg>
                        <?php endif; ?>
                    </div>
                    <div class="service-details">
                        <h3 class="service-name">
                            <?php echo get_theme_mod('booking_service_name_2', 'TECHNIQUE ANALYSIS'); ?>
                            <span class="service-price"><?php echo get_theme_mod('booking_service_price_2', '60 min - $25 CAD'); ?></span>
                        </h3>
                        <p class="service-desc">
                            <?php echo get_theme_mod('booking_service_desc_2', 'Video review and feedback on your technique with actionable improvement tips'); ?>
                        </p>
                    </div>
                </div>

                <!-- INFO BLOCKS ROW: Left Info + Right CTA -->
                <div class="booking-info-row">
                    <!-- Left: Info Blocks -->
                    <div class="booking-info-left">
                        <!-- BOOKING INFO LIST -->
                        <div class="info-block">
                            <h4 class="info-title"><?php echo get_theme_mod('booking_info_title', 'BOOKING INFORMATION'); ?></h4>
                            <ul class="info-list">
                                <li><?php echo get_theme_mod('booking_info_1', 'Sessions are available within the next 30 days based on Coach Ali\'s availability'); ?></li>
                                <li><?php echo get_theme_mod('booking_info_2', 'You\'ll receive a confirmation email with session details and preparation instructions'); ?></li>
                                <li><?php echo get_theme_mod('booking_info_3', 'All sessions can be conducted in-person or virtually via video call'); ?></li>
                                <li><?php echo get_theme_mod('booking_info_4', 'Cancellations must be made at least 24 hours in advance for a full refund'); ?></li>
                            </ul>
                        </div>

                        <!-- MOBILE SESSION INFO -->
                        <div class="info-block">
                            <h4 class="info-title">
                                <?php echo get_theme_mod('booking_mobile_title', 'MOBILE PRIVATE SESSION'); ?>
                                <span class="info-dash">---</span>
                                <span class="info-inline-desc"><?php echo get_theme_mod('booking_mobile_desc_inline', 'I offer 1-on-1 private training sessions at your home or preferred location'); ?></span>
                            </h4>
                            <ul class="info-list">
                                <li><?php echo get_theme_mod('booking_mobile_1', 'Free travel within 8 km of M2M 0B5'); ?></li>
                                <li><?php echo get_theme_mod('booking_mobile_2', 'For locations beyond 8 km: $1 per km fee each way ($2 per km round-trip)'); ?></li>
                            </ul>
                        </div>

                        <!-- DEPOSIT & POLICY -->
                        <div class="info-block">
                            <h4 class="info-title"><?php echo get_theme_mod('booking_deposit_title', 'DEPOSIT REQUIRED'); ?></h4>
                            <ul class="info-list">
                                <li><?php echo get_theme_mod('booking_deposit_1', 'A 20% deposit is required to confirm your booking'); ?></li>
                            </ul>
                        </div>

                        <div class="info-block">
                            <h4 class="info-title"><?php echo get_theme_mod('booking_policy_title', 'CANCELLATION POLICY'); ?></h4>
                            <ul class="info-list">
                                <li><?php echo get_theme_mod('booking_policy_1', 'Cancellations must be made at least 24 hours in advance to receive a full refund'); ?></li>
                                <li><?php echo get_theme_mod('booking_policy_2', 'Cancellations within 24 hours or no-shows will forfeit the 20% deposit'); ?></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Right: CTA aligned at bottom -->
                    <div class="booking-cta-right">
                        <div class="booking-cta-container">
                            <h3 class="cta-label">SCHEDULE YOUR SESSION</h3>
                            <a href="<?php echo get_theme_mod('booking_cta_url', '#'); ?>" class="btn btn-gold btn-booking-large">
                                <span><?php echo get_theme_mod('booking_cta_text', 'VIEW AVAILABLE TIMES'); ?></span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <!-- BOTTOM ACCORDION / FAQ -->
        <div class="booking-faq">
            <!-- Row 1 -->
            <div class="faq-row">
                <div class="faq-item">
                    <button class="faq-toggle">What services do you offer? <span class="arrow"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg></span></button>
                    <!-- Content (Hidden by default in CSS/JS) -->
                </div>
                <div class="faq-item">
                    <button class="faq-toggle">Do you offer mobile training? <span class="arrow"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg></span></button>
                </div>
            </div>
            <!-- Row 2 -->
            <div class="faq-row">
                <div class="faq-item">
                    <button class="faq-toggle">How long is one class usually? <span class="arrow"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg></span></button>
                </div>
                <div class="faq-item">
                    <button class="faq-toggle">What is your cancellation policy? <span class="arrow"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg></span></button>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- Simple Script for Slider -->
<script>
function moveSlider(direction) {
    const slider = document.getElementById('videoSlider');
    // Calculate scroll amount: item width + gap
    // Assuming roughly 270px + 20px gap based on CSS, but reading dynamically is safer
    const item = slider.querySelector('.video-item');
    if(item) {
        const itemWidth = item.offsetWidth + 20; // + gap
        slider.scrollBy({ left: itemWidth * direction, behavior: 'smooth' });
    }
}
</script>

<?php
get_footer(); 
