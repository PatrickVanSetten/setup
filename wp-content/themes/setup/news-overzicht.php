<?php 
/**
 * Template Name: Nieuws overzicht
 */

get_header(); ?>

<section id="evenementen" class="bg-grey">
    <div class="container-fluid">
        <div class="row">
        <?php
             $args = array(
                    'post_type' => 'post',
                    'order' => 'DESC',
                    'posts_per_page' => -1
                );

                $myposts = get_posts($args);
                foreach ($myposts as $post) : setup_postdata($post);

                $thumb = get_post_thumbnail_id(); 
                $image = vt_resize( $thumb, '', 800, 400, true );
            
                $date = get_the_date();
                ?>
            
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="event-wrapper bg-white">
                        <a href="<?php the_permalink(); ?>" class="coverlink"></a>
                        <div class="event-image" style="background-image: url(<?php echo $image[url]; ?>)">
                            <div class="date-wrapper">
                                <div class="date"><?php echo $date = date("d"); ?></div>
                                <div class="month"><?php echo $date = date("M"); ?></div>  
                            </div>
                        </div>
                        <div class="event-content">
                            <h3><?php the_title(); ?></h3>
                            <p><?php the_excerpt(); ?></p>
                        </div>
                    </div>
                </div>

                <?php
                    endforeach; 
                    wp_reset_postdata();
                ?>
        </div>
    </div>
</section>

<?php get_footer();?>
