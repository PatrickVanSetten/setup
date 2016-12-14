<?php
/**
 * Template Name: Galerij
 */
get_header(); ?>

<section id="gallery" class="">
    <div class="container-fluid">
        <div class="row">
            <div class="wrapper bg-white">
                <h1><?php the_title(); ?></h1>
                <p><?php the_field('intro');?></p>

                <?php 

                $images = get_field('images');

                if( $images ): ?>
                    <?php foreach( $images as $image ): ?> 

                    <a href="<?php echo $image['url']; ?>" data-lightbox="example-set">         

                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 gallery-image">
                            <div class="photo" style="background-image: url(<?php echo $image[url]; ?>)"></div>
                        </div>

                    </a> 
                    <?php endforeach; ?>
                <?php endif; ?>


            </div>
        </div>
    </div>
</section>

      
<?php get_footer();?>
