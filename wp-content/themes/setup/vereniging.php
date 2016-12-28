<?php
/**
 * Template Name: Vereniging
 */
get_header(); ?>

<section id="vereniging" class="pan bg-grey content-page">
    <div class="whitebarleft widthcalc"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 bg-white pan">
                <div class="sidebar">
                    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('vereniging') ) : ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <div class="wrapper">
                    <h1><?php the_title(); ?></h1>
                    
                    <div class="row">
                    <?php
                        // check if the repeater field has rows of data
                        if( have_rows('contactpersoon') ):

                            // loop through the rows of data
                            while ( have_rows('contactpersoon') ) : the_row();?>
                            
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="contentblock bg-white">
                                    <span><b><?php the_sub_field('titel')?></b></span>
                                    <span><?php the_sub_field('naam')?></span>
                                    <span><?php the_sub_field('woonplaats')?></span>
                                    <span><?php the_sub_field('telefoon')?></span>
                                    <a href="mailto:<?php the_sub_field('email')?>">Stuur een mail</a>
                                </div>
                            </div>
                    
                    
                    <?php 
                            endwhile;
                            else :
                            // no rows found
                        endif;
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

      
<?php get_footer();?>
