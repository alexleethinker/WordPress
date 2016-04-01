<div class="article_container">
    <!-- class="post tag-ghost-post tag-rain tag-weather" -->
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="post-inner">

            <header class="post-header">
                <div class="post-title-wrapper">
                    <h2 class="post-title">
                        <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
                    </h2>
                </div>
            </header>

            <section class="post-content">
                <div class="subline"><?php echo get_post_meta( get_the_ID(), 'rain_page_about_subline', true ); ?></div>
                <h3 class="headline"><?php echo get_post_meta( get_the_ID(), 'rain_page_about_headline', true ); ?></h3>
                <div class="about-image" style="background-image: url('<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full', false, '' ); echo $src[0]; ?>')"></div>
                <?php the_content(); ?>
                <?php
                    wp_nav_menu( array( 'theme_location' => 'about', 'menu_class' => 'about-menu', 'depth' => '1', 'fallback_cb' => 'false' ) );
                ?>
            </section>
            
        </div>
    </article>
</div>