<?php 
/**
 * Template Name: Home
 */

get_header(); ?>

<section id="news" class="pan">
    <div class="newswrapperbg"></div>
    <div class="carousel" data-flickity='{ "lazyLoad": true, "pageDots": false, "wrapAround": true }'> 
        
        <?php 
            $args = array( 'post_type' => 'post', 'posts_per_page' => 3 );
            $myposts = get_posts($args);
            foreach ($myposts as $post) : setup_postdata($post);
        ?>
        <div class="carousel-cell">
            <div class="container-fluid">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 newscontent">
                    <div class="newswrapper">
                        <h2><?php the_title();?></h2>
                        <span class="date"><?php echo get_the_date();?></span>
                        <?php the_excerpt();?>
                        <a href="<?php the_permalink(); ?>" class="button">Lees dit bericht</a>
                    </div>
                </div>
            </div>
             <?php
                    $thumb = get_post_thumbnail_id(); 
                    $image = vt_resize( $thumb, '', 1600, 900, true );
                    ?>
            <div class="col-lg-8 col-md-8 col-sm-6 col-xs-6 newsimage" style="background-image:url('<?php echo $image[url]; ?>');">
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
<section id="featured-items" class="bg-grey">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-sx-12 sponsor">
                <div class="featured-wrapper bg-white">
                    <a href="#" class="coverlink"></a>
                    <div class="featured-image" style="background-image:url('<?= get_template_directory_uri()?>/assets/img/sponsor.jpg')"></div>
                    <div class="featured-content">
                        <h3>Balsponsor van de week</h3>
                        <span>subtitle</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-sx-12 mini-ster">
                <div class="featured-wrapper bg-white">
                    <a href="#" class="coverlink"></a>
                    <div class="featured-image" style="background-image:url('<?= get_template_directory_uri()?>/assets/img/minister.jpg')"></div>
                    <div class="featured-content">
                        <h3>Mini-ster van de week</h3>
                       <?php

                        $post_object = get_field('mini_ster_van_de_week');

                        if( $post_object ):

                            // override $post
                            $post = $post_object;
                            setup_postdata( $post );

                            ?>
                            <span><?php get_field('mini_ster_van_de_week'); ?></span>
                            <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-4 col-sm-4 col-sx-12 birthdays">
                <div class="featured-wrapper">
                    <div class="featured-content">
                        <h3>Onze jarigen</h3>

                        <?php
                             $today = date('Ymd');
                             $args = array(
                                    'post_type' => 'spelers',
                                    'order' => 'DESC',
                                    'meta_query' => array(
                                        array(
                                            'key'		=> 'start_date',
                                            'compare'	=> '>=',
                                            'value'		=> $today,
                                        ),
                                         array(
                                            'key'		=> 'end_date',
                                            'compare'	=> '<=',
                                            'value'		=> $today,
                                        )
                                    ),
                                    'posts_per_page' => 5
                                );

                                $myposts = get_posts($args);
                                foreach ($myposts as $post) : setup_postdata($post);
                                ?>

                                <?php
                                    $term_list = wp_get_post_terms($post->ID, 'projecten-categories', array("fields" => "all"));
                                ?>
                        
                                <div class="person">
                                    <span class="date"><?php the_field('geboortedatum'); ?></span>
                                    <span class="name"><?php the_title(); ?></span>
                                    <span class="seperator"></span>
                                </div>

                                <?php
                                endforeach;
                                echo $return;
                                $return = '';
                                wp_reset_postdata();
                                ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="sponsors" class="text-center">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h2>Sponsoren</h2>
                <div class="carousel" data-flickity='{ "cellAlign": "left", "draggable": true, "pageDots": true, "groupCells": 4, " wrapAround": true, "prevNextButtons": false}'>
                    <div class="carousel-cell" style="background-image:url('<?= get_template_directory_uri()?>/assets/img/logo-kromme-hoek.png')"></div>
                    <div class="carousel-cell" style="background-image:url('<?= get_template_directory_uri()?>/assets/img/logo-van-heugten.png')"></div>
                    <div class="carousel-cell" style="background-image:url('<?= get_template_directory_uri()?>/assets/img/logo-kromme-hoek.png')"></div>
                    <div class="carousel-cell" style="background-image:url('<?= get_template_directory_uri()?>/assets/img/logo-van-heugten.png')"></div>
                    <div class="carousel-cell" style="background-image:url('<?= get_template_directory_uri()?>/assets/img/logo-kromme-hoek.png')"></div>
                    <div class="carousel-cell" style="background-image:url('<?= get_template_directory_uri()?>/assets/img/logo-van-heugten.png')"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="photos" style="background-image:url('<?= get_template_directory_uri()?>/assets/img/featured-event.jpg')">
    <div class="photowrapperbg"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                <div class="photo-wrapper bg-white">
                    <h2>Foto's volleybaltoernooi de Bree</h2>
                    <p>Dit is een faketekst. Alles wat hier staat is slechts om een indruk te geven van het grafische effect van tekst op deze plek. Wat u hier leest is een voorbeeldtekst.</p>
                    <a href="#" class="button">Lees dit bericht</a>
                </div>
                <span class="photowrapper-offset"></span>
            </div>
        </div>
    </div>
</section>

<section id="evenementen" class="bg-grey">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="event-wrapper bg-white">
                    <a href="#" class="coverlink"></a>
                    <div class="event-image" style="background-image:url('<?= get_template_directory_uri()?>/assets/img/laura-dijkema.jpg')">
                        <div class="date-wrapper">
                            <div class="date">15</div>
                            <div class="month">Apr</div>
                        </div>
                    </div>
                    <div class="event-content">
                        <h3>Masterclass Laura Dijkema</h3>
                        <p>Dit is een faketekst. Alles wat hier staat is slechts om een indruk te geven van het grafische effect van tekst op deze plek. </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="event-wrapper bg-white">
                    <a href="#" class="coverlink"></a>
                    <div class="event-image" style="background-image:url('<?= get_template_directory_uri()?>/assets/img/laura-dijkema.jpg')">
                        <div class="date-wrapper">
                            <div class="date">15</div>
                            <div class="month">Apr</div>
                        </div>
                    </div>
                    <div class="event-content">
                        <h3>Masterclass Laura Dijkema</h3>
                        <p>Dit is een faketekst. Alles wat hier staat is slechts om een indruk te geven van het grafische effect van tekst op deze plek. </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="event-wrapper bg-white">
                    <a href="#" class="coverlink"></a>
                    <div class="event-image" style="background-image:url('<?= get_template_directory_uri()?>/assets/img/laura-dijkema.jpg')">
                        <div class="date-wrapper">
                            <div class="date">15</div>
                            <div class="month">Apr</div>
                        </div>
                    </div>
                    <div class="event-content">
                        <h3>Masterclass Laura Dijkema</h3>
                        <p>Dit is een faketekst. Alles wat hier staat is slechts om een indruk te geven van het grafische effect van tekst op deze plek. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="about" class="bg-grey pan">
    <div class="aboutwrapperbg"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                <div class="about-wrapper bg-white">
                    <h2>Foto's volleybaltoernooi de Bree</h2>
                    <p>Dit is een faketekst. Alles wat hier staat is slechts om een indruk te geven van het grafische effect van tekst op deze plek. Wat u hier leest is een voorbeeldtekst.</p>
                    <a href="#" class="button">Lees dit bericht</a>
                    <span class="aboutwrapper-offset"></span>
                </div>
            </div>
            <div class="aboutimage" style="background-image:url('<?= get_template_directory_uri()?>/assets/img/featured-event.jpg')">
            </div>
        </div>
    </div>
</section>

<?php get_footer();?>
