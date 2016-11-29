<?php
/**
 * Template Name: Teampagina
 */
get_header(); ?>

<section id="team" class="pan">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 pan">
                <div class="wrapper">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab1">
                            <h1><?php the_title(); ?></h1>
                            <?php while ( have_posts() ) : the_post(); ?>
                            <?php the_content(); ?>
                            <?php endwhile; // end of the loop. ?>


                            <?php
                                $sectorName = get_field('kies_team');
                                //var_dump($sectorName);
                                $myposts = get_posts(array(
                                    'showposts' => -1,
                                    'post_type' => 'spelers',
                                    'tax_query' => array(
                                        array(
                                        'taxonomy' => 'spelers-teams',
                                        'field' => 'ID',
                                        'terms' => array($sectorName[0]))
                                    ))
                            );

                            foreach ($myposts as $post) : setup_postdata($post);
                            //var_dump($post);
                            ?>
                            <div class="col-md-4 col-sm-64col-xs-12">
                                <div class="referentie_item">
                                    <div class="content">
                                        <h3><?php the_title();?></h3>
                                        <p><?php the_field('geboortedatum'); ?></p>
                                        <p><?php the_field('rugnummer'); ?></p>
                                        <p><?php the_field('positie'); ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php
                                endforeach;
                                echo $return;
                                $return = '';
                                wp_reset_postdata();
                            ?>
                            <div class="row">
                                <?php

                                    $post_object = get_field('kies_coach');

                                    if( $post_object ): 

                                        // override $post
                                        $post = $post_object;
                                        setup_postdata( $post ); 

                                        ?>
                                        <div>
                                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                        </div>
                                        <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab2">
                            <?php $shortcode = get_post_meta($post->ID,'stand',true);
                            echo do_shortcode($shortcode); ?>
                        </div>
                        <div class="tab-pane" id="tab3">
                            <?php $shortcode = get_post_meta($post->ID,'uitslagen',true);
                            echo do_shortcode($shortcode); ?>
                        </div>
                        <div class="tab-pane" id="tab4">
                            <?php $shortcode = get_post_meta($post->ID,'programma',true);
                            echo do_shortcode($shortcode); ?>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 bg-grey pan">
                <div class="sidebar">
                    <nav class="nav-sidebar">
                        <ul class="nav tabs">
                            <li class="active"><a href="#tab1" data-toggle="tab">Team informatie</a></li>
                            <li class=""><a href="#tab2" data-toggle="tab">Stand</a></li>
                            <li class=""><a href="#tab3" data-toggle="tab">Uitslagen</a></li>
                            <li class=""><a href="#tab4" data-toggle="tab">Programma</a></li> 
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>




      
<?php get_footer();?>