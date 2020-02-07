<?php
get_header();
    get_template_part('inc/template-part/description');
	get_template_part('inc/template-part/projects');

	if( have_posts() )
		while( have_posts() ){
			the_post();
			the_content();
		}
get_footer();
