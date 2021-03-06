<?php 
/**
 * Template Name: Galerij overzicht
 */

get_header(); ?>

<section id="evenementen" class="bg-grey">
    <div class="container-fluid">
        <div class="row">
        <?php
             $args = array(
                    'post_type' => 'galleries',
                    'order' => 'DESC',
                    'posts_per_page' => -1
                );

                $myposts = get_posts($args);
                foreach ($myposts as $post) : setup_postdata($post);

                $filter = array();
                $filter['intro'] = strtolower( get_the_title() );
                $thumb = get_post_thumbnail_id(); 
                $image = vt_resize( $thumb, '', 800, 400, true );
                ?>
            
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="event-wrapper bg-white">
                        <a href="<?php the_permalink(); ?>" class="coverlink"></a>
                        <div class="event-image" style="background-image: url(<?php echo $image[url]; ?>)" data-filter-data='<?=json_encode( $filter )?>'>
                        </div>
                        <div class="event-content">
                            <h3><?php the_title(); ?></h3>
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
