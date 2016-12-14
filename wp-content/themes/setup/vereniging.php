<?php
/**
 * Template Name: Vereniging
 */
get_header(); ?>

<section id="vereniging" class="pan content-page">
    <div class="greybarleft widthcalc"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 bg-grey pan">
                <div class="sidebar">
                    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('vereniging') ) : ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 pan">
                <div class="wrapper bg-white">
                    <h1><?php the_title(); ?></h1>
                    <p><?php the_content(); ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

      
<?php get_footer();?>
