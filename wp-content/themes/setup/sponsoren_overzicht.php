<?php 
/**
 * Template Name: Sponsor overzicht
 */

get_header(); ?>

<section id="logos" class="bg-grey">
    <div class="container-fluid">
        <div class="row">
            <?php
                 $args = array(
                    'post_type' => 'sponsors',
                    'order' => 'DESC',
                    'posts_per_page' => -1
                );

                $myposts = get_posts($args);
                foreach ($myposts as $post) : setup_postdata($post);

                $filter = array();
                $thumb = get_post_thumbnail_id(); 
                $image = vt_resize( $thumb, '', 300, 300, true );
                ?>

                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6 logo">
                    <div class="wrapper bg-white">   
                        <img src="<?php echo $image['url'] ?>">
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
