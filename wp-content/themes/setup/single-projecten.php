<?php

get_header(); ?>

<section id="projecten" class="">
    <div class="container-fluid">
        <div class="intro-wrapper">
            <div class="intro-title"><?php the_field('subtitle'); ?></div>
            <h1><?php the_title(); ?></h1>
            <?php while ( have_posts() ) : the_post(); ?>
            <?php the_content(); ?>
            <?php endwhile; // end of the loop. ?>
        </div>
    </div>
</section>
<?php 
    $image = get_field('sub_text_image');
    $title = get_field('sub_text_title');
    $text = get_field('sub_text_text');
    if( !empty($image && $title && $text)): 
    ?>
        <section id="project-beschrijving" class="">
            <div class="container-fluid">
                <div class="project-info">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <img src="<?php the_field('sub_text_image');?>" class="project-image">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="project-description">
                            <h2><?php the_field('sub_text_title');?></h2>
                            <p><?php the_field('sub_text_text');?></p>               
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php endif; ?>
<div id="grid-gallery" class="grid-gallery">
    <section class="grid-wrap">
        <ul class="grid">
            <li class="grid-sizer"></li><!-- for Masonry column width -->
            <?php

            // check if the repeater field has rows of data
            if( have_rows('afbeeldingen') ):

                // loop through the rows of data
                while ( have_rows('afbeeldingen') ) : the_row();

                    $project_image = get_sub_field('project_image', ID); 
                    $image1 = vt_resize( $project_image, '', 400, 400, true );
                    ?>
                    <li>
                        <figure>
                            <img src="<?php echo $image1[url]; ?>" alt="Interieurbouw"/>
                        </figure>
                    </li>
                <?php 
                endwhile;

            else :

                // no rows found

            endif;

            ?>
        </ul>
    </section><!-- // grid-wrap -->
    <section class="slideshow">
        <ul>
            <?php

            // check if the repeater field has rows of data
            if( have_rows('afbeeldingen') ):

                // loop through the rows of data
                while ( have_rows('afbeeldingen') ) : the_row();

                    $project_image = get_sub_field('project_image', ID); 
                    $image1 = vt_resize( $project_image, '', 1600, 900, true );
                    ?>
                    <li>
                        <figure>
                            <img src="<?php echo $image1[url]; ?>" alt="Interieurbouw"/>
                        </figure>
                    </li>
                <?php 
                endwhile;

            else :

                // no rows found

            endif;

            ?>
        </ul>
        <nav>
            <span class="icon nav-prev"></span>
            <span class="icon nav-next"></span>
            <span class="icon nav-close"></span>
        </nav>
    </section><!-- // slideshow -->
</div><!-- // grid-gallery -->


<?php twentythirteen_post_nav(); ?>
      
<?php get_footer();?>

<script>
    new CBPGridGallery( document.getElementById( 'grid-gallery' ) );
</script>
