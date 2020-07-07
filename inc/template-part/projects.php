<?php
    $terms = get_terms('projects_categories');
?>
<section class="projects container">
    <ul class="projects__categories">
        <li class="projects__category active"><button class="button">Todos</button></li>
        <?php
            if($terms):
                foreach( $terms as $term ):
                    ?>
                    <li data-category="<?php echo $term->slug; ?>" class="projects__category"><button class="button"><?php echo $term->name; ?></button></li>
                    <?php
                endforeach;
            endif;
        ?>
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
            <li style="background-image: url('<?php echo $thumbnail; ?>')" class="projects__item" data-category="<?php echo get_the_terms($post, 'projects_categories')[0]->slug ?>">
                <div class="item__content">
                    <h3 class="item__title">
                        <?php echo strip_tags(get_the_title()); ?>
                        <a target="_blank" href="<?php echo get_post_meta($post->ID, 'attributes', true)['project-url']; ?>" class="item__read-more">Acessar</a>
                    </h3>
                    <div class="item__description"><?php the_content(); ?></div>
                    <ul class="item__tecnologies">
                        <h3 class="title">Tecnologias: </h3>
                        <?php foreach($tecnologias as $tecnologia): ?>
                        <li class="item__tecnology"><?php echo $tecnologia; ?></li>
                        <?php endforeach; ?>
                    </ul>
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
