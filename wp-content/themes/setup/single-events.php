<?php
/**
 * Template Name: Event
 */
get_header(); ?>

<section id="event" class="pan">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 pan">
                <div class="wrapper bg-white">
                    <h1><?php the_title(); ?></h1>
                    <span class="date"><?php the_field('datum');?></span>
                    <p><?php the_field('beschrijving');?></p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 bg-grey pan">
                <div class="sidebar">
                    <p>Wahahaooo</p>
                    <p>Wahahaooo</p>
                    <p>Wahahaooo</p>
                    <p>Wahahaooo</p>
                    <p>Wahahaooo</p>
                    <p>Wahahaooo</p>
                </div>
            </div>
        </div>
    </div>
    <div class="greybarright heightcalc"></div>
</section>

      
<?php get_footer();?>
