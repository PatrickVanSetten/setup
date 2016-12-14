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
                    <span class="place">in <?php the_field('plaats');?></span>
                    <?php the_content(); ?>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 bg-grey pan">
                <div class="sidebar">
                    <h3>Bekijk ook eens</h3>
                    <ul>
                     <?php
                         $args = array(
                                'post_type' => 'events',
                                'order' => 'DESC',
                                'posts_per_page' => 5
                            );

                            $myposts = get_posts($args);
                            foreach ($myposts as $post) : setup_postdata($post);

                            $filter = array();
                            $filter['title'] = strtolower( get_the_title() );
                            $filter['datum'] = strtolower( get_field('datum') );
                            $filter['beschrijving'] = strtolower( get_field('beschrijving') );
                            $thumb = get_post_thumbnail_id(); 
                            $image = vt_resize( $thumb, '', 800, 400, true );
                            ?>

                            <?php
                                $term_list = wp_get_post_terms($post->ID, 'event-categories', array("fields" => "all"));

                        ?>
                                    <li>
                                        <a href="<?php the_permalink(); ?>" class="">
                                            <?php the_title(); ?>
                                            <div class="datum">
                                                <div class="date"><?php $date = new DateTime(get_field('datum')); echo $date->format('d'); ?></div>
                                                <div class="month"><?php $date = new DateTime(get_field('datum')); echo $date->format('M'); ?></div>  
                                            </div>
                                        </a>
                                    </li>
                                

                        <?php
                        endforeach;
                        echo $return;
                        $return = '';
                        wp_reset_postdata();
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="greybarright widthcalc"></div>
</section>

      
<?php get_footer();?>
