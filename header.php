<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
    
    <!-- LOAD GOOGLE FONTS CHO MMA THEME -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@700&family=Teko:wght@600;700&family=Roboto+Condensed:ital,wght@0,700;1,700&display=swap" rel="stylesheet">

    <!-- Hàm này CỰC KỲ QUAN TRỌNG, giúp WordPress chèn CSS/JS plugin vào đây -->
	<?php wp_head(); ?> 
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<!-- Header chỉ chứa Logo, đặt class riêng để CSS absolute -->
	<header id="masthead" class="site-header-clean">
		<div class="site-branding">
            <?php
			if ( has_custom_logo() ) {
                the_custom_logo();
            } else {
            ?>
                <!-- Fallback nếu chưa có Logo ảnh -->
                <h1 class="site-title" style="margin: 0;">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" style="text-decoration: none; display: inline-block;">
                        
                        <?php 
                        // Kiểm tra file ảnh placeholder có tồn tại không, nếu không dùng ảnh online hoặc text
                        $logo_url = get_template_directory_uri() . '/assets/images/logo-placeholder.png';
                        // Tạm thời dùng Text/SVG box để đảm bảo hiển thị
                        ?>
                        <div style="
                            display: flex; 
                            align-items: center; 
                            justify-content: center; 
                            width: 200px; 
                            height: 60px; 
                            background: rgba(0,0,0,0.1); 
                            border: 2px dashed #888; 
                            color: #555; 
                            font-family: sans-serif; 
                            font-weight: bold; 
                            font-size: 14px;
                            text-transform: uppercase;">
                            LOGO (200x60)
                        </div>

                    </a>
                </h1>
            <?php
            }
			?>
		</div>
	</header>
    
    <div id="content" class="site-content">
