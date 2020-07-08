<?php
    $qualifications_query = new WP_Query([
        'post_type' => 'qualification',
        'post_status' => 'publish'
    ]);
?>

<?php if( $qualifications_query->have_posts() ): ?>

    <section class="section container section--qualification">
        <h2 class="section__title">Depoimentos</h2>
        <ul class="qualifications">
            <?php while( $qualifications_query->have_posts() ): $qualifications_query->the_post(); ?>
                <li class="qualifications__item">
                    <div class="item__content"><?php the_content(); ?></div>
                    <span class="item__author"><?php the_qualification_author(); ?></span>
                </li>
            <?php endwhile; wp_reset_postdata();?>
        </ul>
    </section>
<?php endif; ?>
