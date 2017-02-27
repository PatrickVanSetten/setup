<?php 
/**
 * Template Name: Events overzicht
 */

get_header(); ?>

<section id="evenementen" class="bg-grey">
    <div class="container-fluid">
        <div class="row">
        <?php
             $args = array(
                    'post_type' => 'events',
                    'order' => 'DESC',
                    'posts_per_page' => -1
                );

                $myposts = get_posts($args);
                foreach ($myposts as $post) : setup_postdata($post);

                $filter = array();
                $filter['title'] = strtolower( get_the_title() );
                $filter['datum'] = strtolower( get_field('datum') );
                $filter['beschrijving'] = strtolower( get_field('beschrijving') );
                $thumb = get_post_thumbnail_id(); 
                $image = vt_resize( $thumb, '', 800, 400, true );
            
                // get raw date
                $date = get_field('datum', false, false);

                // make date object
                $date = new DateTime($date);
                ?>

                <?php
                    $term_list = wp_get_post_terms($post->ID, 'event-categories', array("fields" => "all"));

                ?>
            
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="event-wrapper bg-white">
                        <a href="<?php the_permalink(); ?>" class="coverlink"></a>
                        <div class="event-image" style="background-image: url(<?php echo $image[url]; ?>)" data-filter-data='<?=json_encode( $filter )?>'>
                            <div class="date-wrapper">
                                <div class="date"><?php echo $date->format('d'); ?></div>
                                <div class="month"><?php echo $date->format('M'); ?></div> 
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
                echo $return;
                $return = '';
                wp_reset_postdata();
                ?>
        </div>
    </div>
</section>

<?php get_footer();?>
