<?php
/**
 * Template Name: Downloads
 */
get_header(); ?>

<section id="downloads" class="pan bg-white content-page">
    <div class="greybarleft widthcalc"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 pan">
                <div class="sidebar bg-grey">
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
                            if( have_rows('bestanden') ):

                                // loop through the rows of data
                                while ( have_rows('bestanden') ) : the_row();?>

                                <a href="<?php the_sub_field('bestand')?>">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="contentblock">
                                            <?php the_sub_field('naam')?>
                                        </div>
                                    </div>
                                </a>


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
