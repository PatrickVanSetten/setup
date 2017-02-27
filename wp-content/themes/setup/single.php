<?php 

get_header(); ?>

<section id="post" class="pan">
    <div class="container-fluid">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 pan">
                <div class="wrapper bg-white">
                     <?php
                            $thumb = get_post_thumbnail_id(); 
                            $image = vt_resize( $thumb, '', 1600, 900, true );
                            ?>
                    <div class="news-header" style="background-image:url('<?php echo $image[url]; ?>');">
                    </div>
                    <h1><?php the_title(); ?></h1>
                    <span class="date"><?php the_date();?></span>
                    <p><?php the_content(); ?></p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 bg-grey">
                <div class="sidebar">
                    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('laatsteberichten') ) : ?>
                    <?php endif; ?>
                </div>
            </div>
    </div>
    <div class="greybarright widthcalc"></div>
</section>

<?php get_footer();?>