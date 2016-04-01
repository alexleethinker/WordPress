<div class="article_container">
    <!-- class="post tag-ghost-post tag-rain tag-weather" -->
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="post-inner">
            <header class="post-header">
                <div class="post-start clearfix">
                    <a href="<?php the_permalink(); ?>" class="post-start-date"><?php the_time(get_option('date_format')); ?></a>
                    <span class="post-start-tags"><?php the_tags('<i class="fa fa-tag"></i>'); ?></span>
                </div>

                <div class="post-title-wrapper">
                    <h2 class="post-title">
                        <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
                    </h2>
                </div>
            </header>

            <section class="post-content">
                <?php the_post_thumbnail('full'); ?>
                <?php the_content(); ?>
                <p class="post-end clearfix">
                    <br/>
                    <span class="post-end-author">
                    <?php the_author_posts_link(); ?></span>
                </p>
                
            </section>
            
        </div>
        <?php get_social_links(); ?>
    </article>
</div>
<?php comments_template(); ?>