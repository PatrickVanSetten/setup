<?php 
/**
 * Template Name: Vereniging overzicht
 */

get_header(); ?>

<section id="vereniging-overzicht" class="bg-grey">
    <div class="container-fluid">
        <div class="row">
          <?php
            
            if( have_rows('page') ):

                while ( have_rows('page') ) : the_row(); ?>

                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                   <div class="wrapper bg-white">
                        <a href="<?php the_sub_field('link'); ?>" class="coverlink"></a>
                        <div class="image" style="background-image:url('<?php the_sub_field('image'); ?>')"></div>
                        <div class="content">
                            <a href="<?php get_sub_field('link'); ?>" class=""><h3><?php the_sub_field('title'); ?></h3></a>
                        </div>
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
</section>

<?php get_footer();?>

                
                
          
    