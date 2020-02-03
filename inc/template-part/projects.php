<section class="projects container">
    <ul class="projects__categories">
        <li class="projects__category active"><button class="button">All</button></li>
        <li data-category="plugins" class="projects__category"><button class="button">Plugins</button></li>
        <li data-category="themes" class="projects__category"><button class="button">Themes</button></li>
    </ul>
    <ul class="projects__list">
    <?php
        $projects_query = new WP_Query([
            'post_type' => 'projects',
            'status' => 'publish'
        ]);

        if( $projects_query->have_posts() )
            while($projects_query->have_posts()):
                $projects_query->the_post();
                
                $thumbnail = 'https://i.picsum.photos/id/765/390/270.jpg';

                if( has_post_thumbnail() )
                    $thumbnail = wp_get_attachment_url( get_post_thumbnail_id() );

                $tecnologias = get_post_meta($post->ID, 'attributes', true)['tecnologies'];
            ?>
            <li style="background-image: url('<?php echo $thumbnail; ?>')" class="projects__item" data-category="<?php the_category(); ?>">
                <div class="item__content">
                    <h3 class="item__title"><?php echo strip_tags(get_the_title()); ?></h3>
                    <p class="item__description"><?php echo strip_tags(get_the_content()); ?></p>
                    <ul class="item__tecnologies">
                        <h3 class="title">Tecnologias: </h3>
                        <?php foreach($tecnologias as $tecnologia): ?>
                        <li class="item__tecnology"><?php echo $tecnologia; ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <button data-post-id="<?php echo $post->ID; ?>" class="item__read-more">Saiba mais</button>
                </div>
            </li>
            <?php
            endwhile;
        wp_reset_postdata();
    ?>
    </ul>
    <div class="modal">
    </div>
</section>
