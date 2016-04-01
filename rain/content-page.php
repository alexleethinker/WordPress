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
                <?php the_post_thumbnail('full'); ?>
                <?php the_content(); ?>
                <?php wp_link_pages(); ?>

            </section>
            
        </div>
        <?php get_social_links(); ?>
    </article>
</div>