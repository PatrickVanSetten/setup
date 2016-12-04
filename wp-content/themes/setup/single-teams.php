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
                        <div class="tab-pane active" id="team-informatie">
                            <h1><?php the_title(); ?></h1>
                            <?php while ( have_posts() ) : the_post(); ?>
                            <?php the_content(); ?>
                            <?php endwhile; // end of the loop. ?>
                            
                            <!-- Loop om trainer op te halen -->
                            <?php

                                $post_object = get_field('kies_coach');

                                if( $post_object ): 

                                    // override $post
                                    $post = $post_object;
                                    setup_postdata( $post ); 

                                    ?>
                                    <div>
                                        <p>Coach: <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                                    </div>
                                    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                            <?php endif; ?>
                            
                            <?php 
                            if( have_rows('trainingstijden') ): ?>
                                <?php 
                                while( have_rows('trainingstijden') ): the_row(); ?>

                                    <p><?php the_sub_field('dag');?> <?php the_sub_field('tijd');?></p>

                                <?php endwhile;?>
                            <?php endif;?>

                            
                            <!-- Loop om spelers op te halen -->
                        
                            <div class="info">
                                <div class="player">
                                    <span class="name">Naam</span>
                                    <!-- <span class="date">Geboortedatum</span> -->
                                    <span class="number">Rugnummer</span>
                                    <span class="position">Positie</span>
                                </div>
                            </div>

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
                            <div class="player-list">
                                <div class="player">
                                    <span class="name"><?php the_title();?></span>
                                    <!-- <span class="date"><?php the_field('geboortedatum'); ?></span> -->
                                    <span class="number"><?php the_field('rugnummer'); ?></span>
                                    <span class="position"><?php the_field('positie'); ?></span>
                                </div>
                            </div>
                            
                            <?php
                                endforeach;
                                echo $return;
                                $return = '';
                                wp_reset_postdata();
                            ?>
                        </div>
                        <div class="tab-pane" id="stand">
                            <h2>Stand</h2>
                            <?php $shortcode = get_post_meta($post->ID,'stand',true);
                            echo do_shortcode($shortcode); ?>
                        </div>
                        <div class="tab-pane" id="uitslagen">
                            <h2>Uitslagen</h2>
                            <?php $shortcode = get_post_meta($post->ID,'uitslagen',true);
                            echo do_shortcode($shortcode); ?>
                        </div>
                        <div class="tab-pane" id="programma">
                            <h2>Programma</h2>
                            <?php $shortcode = get_post_meta($post->ID,'programma',true);
                            echo do_shortcode($shortcode); ?>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 bg-grey pan">
                <div class="sidebar">
                    <nav class="nav-sidebar">
                        <h3>Snel navigeren</h3>
                        <ul class="nav tabs">
                            <li class="active"><a href="#team-informatie" data-toggle="tab">Team informatie</a></li>
                            <li class=""><a href="#stand" data-toggle="tab">Stand</a></li>
                            <li class=""><a href="#uitslagen" data-toggle="tab">Uitslagen</a></li>
                            <li class=""><a href="#programma" data-toggle="tab">Programma</a></li> 
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="greybarright widthcalc"></div>
    </div>
</section>




      
<?php get_footer();?>