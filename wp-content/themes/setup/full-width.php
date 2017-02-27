<?php
/**
 * Template Name: Full-width
 */
get_header(); ?>

<section id="full-width" class="bg-white content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                    <h1><?php the_title(); ?></h1>
                    <?php the_content();?>
            </div>
        </div>
    </div>
</section>

      
<?php get_footer();?>