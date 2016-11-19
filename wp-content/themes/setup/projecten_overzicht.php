<?php 
/**
 * Template Name: Project overzicht
 */

get_header(); ?>

<section id="projecten" class="bg-grey">
    <div class="container-fluid">
        <div class="intro-wrapper">
            <div class="intro-title"><?php the_field('projecten_subtitle'); ?></div>
            <h1><?php the_field('projecten_title'); ?></h1>
        </div>
        
        <?php
             $args = array(
                    'post_type' => 'projecten',
                    'order' => 'DESC',
                    'posts_per_page' => -1
                );

                $myposts = get_posts($args);
                foreach ($myposts as $post) : setup_postdata($post);

                $filter = array();
                $filter['title'] = strtolower( get_the_title() );
                $filter['weken'] = strtolower( get_field('weken') );
                $filter['locatie'] = strtolower( get_field('locatie') );
                $filter['type_klant'] = strtolower( get_field('type_klant') );
                $thumb = get_post_thumbnail_id(); 
                $image = vt_resize( $thumb, '', 800, 400, true );
                ?>
        
                <?php
                    $term_list = wp_get_post_terms($post->ID, 'projecten-categories', array("fields" => "all"));

                ?>
        
                <div class="project">
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 prn">
                        <div class="image" style="background-image: url(<?php echo $image[url]; ?>)" data-filter-data='<?=json_encode( $filter )?>'>
                            <a class="coverlink" href="<?php the_permalink(); ?>"></a>
                            <!--<a class="bekijk" href="<?php the_permalink(); ?>">Bekijk project</a>-->
                            <h2><?php the_title(); ?></h2>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 pln">
                        <div class="description">
                            <?php 
                                if ($term_list){ ?>
                                    <h3 class="category"> <?php echo $term_list[0]->name ; ?></h3>
                            <?php } ?>
                            <div class="results material"><i class="icon-material"></i><span class="result-text"><?php the_field('materiaal'); ?></span></div>
                            <div class="results place"><i class="icon-location"></i><span class="result-text"><?php the_field('locatie'); ?></span></div>
                            <!--<div class="results customer"><i class="icon-type-of-customer"></i><span class="result-text"><?php the_field('type_klant'); ?></span></div>-->
                            <a href="<?php the_permalink(); ?>" class="button">Bekijk project</a>
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
</section>

<?php get_footer();?>
