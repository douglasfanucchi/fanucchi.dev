<article class="article">
    <?php if(has_post_thumbnail()): ?>
        <figure class="article__thumbnail">
            <?php the_post_thumbnail(); ?>
            <a href="<?php the_permalink(); ?>">
                <?php include get_template_directory() . '/inc/svg/eye.svg'; ?>
            </a>
        </figure>
        <div class="article__content">
            <h2 class="article__title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h2>
            <?php the_excerpt(); ?>
            <ul class="article__meta-data">
                <li class="meta-data__item">
                    <span class="icon">
                        <?php require get_template_directory() . '/inc/svg/calendar.svg'; ?>
                    </span>
                    <?php echo get_the_date(); ?>
                </li>
                <li class="meta-data__item">
                    <span class="icon">
                        <?php require get_template_directory() . '/inc/svg/directory.svg'; ?>
                    </span>
                    <?php echo fn_categories(); ?>
                </li>
            </ul>
        </div>  
    <?php endif ;?>
</article>
