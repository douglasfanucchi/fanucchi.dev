<?php

function the_qualification_author() {
    global $post;

    $data = get_post_meta($post->ID, 'qualification_author', true);

    if( is_array($data) && count($data) > 0 ) {
        echo $data['author'] ?? '';
    }
}
