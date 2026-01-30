<?php
/**
 * File hiển thị nội dung chính (Trang chủ, Tin tức...)
 */

get_header();
?>

<main id="primary" class="site-main">

    <?php
    // Kiểm tra xem có bài viết nào không
    if ( have_posts() ) :

        // Vòng lặp lấy bài viết (The Loop)
        while ( have_posts() ) :
            the_post();
            ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <!-- Hiển thị tiêu đề bài viết -->
                    <?php 
                    if ( is_singular() ) :
                        the_title( '<h1 class="entry-title">', '</h1>' );
                    else :
                        the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                    endif;
                    ?>
                </header>

                <div class="entry-content">
                    <!-- Hiển thị nội dung bài viết do khách nhập trong Admin -->
                    <?php
                    the_content();
                    ?>
                </div>

                <!-- Hiển thị ảnh đại diện (Featured Image) -->
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="post-thumbnail">
                        <?php the_post_thumbnail( 'large' ); ?>
                    </div>
                <?php endif; ?>

            </article><!-- #post-<?php the_ID(); ?> -->

            <?php
        endwhile;

        // Phân trang (Trang 1, 2, 3...)
        the_posts_navigation();

    else :

        // Nếu không có bài viết nào
        echo '<p>Chưa có bài viết nào được đăng.</p>';

    endif;
    ?>

</main><!-- #primary -->

<?php
get_footer();