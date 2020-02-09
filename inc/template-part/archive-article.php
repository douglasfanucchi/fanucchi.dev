<article class="archive-article">
    <?php if(has_post_thumbnail()): ?>
        <figure class="archive-article__thumbnail">
            <?php the_post_thumbnail(); ?>
            <a href="<?php the_permalink(); ?>">
                <?php include get_template_directory() . '/inc/svg/eye.svg'; ?>
            </a>
        </figure>
    <?php endif ;?>
</article>
