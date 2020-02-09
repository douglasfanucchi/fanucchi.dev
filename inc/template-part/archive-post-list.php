<div class="archive-post-list col">
    <?php if(have_posts()): ?>
        <?php while(have_posts()): the_post(); ?>
            <?php get_template_part('inc/template-part/archive-article'); ?>
        <?php endwhile; ?>
    <?php else: ?>
    <?php endif; ?>
</div>
