<?php 
/**
 * Template Name: Contact
 */

get_header(); ?>

<section id="contact" class="bg-grey">
    <div class="whitebarright widthcalc"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <div class="wrapper">
                        <h1><?php the_title(); ?></h1>
                        <p><?php the_content();?></p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 pan">
                <div class="sidebar bg-grey">
                    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('contactgegevens') ) : ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer();?>
