<?php 
/**
 * Template Name: Home
 */

get_header(); ?>

<section id="news" class="pan">
    <div class="newswrapperbg widthcalc"></div>
    <div class="carousel" data-flickity='{ "lazyLoad": true, "pageDots": false, "wrapAround": true }'> 
        
        <?php 
            $args = array( 'post_type' => 'post', 'posts_per_page' => 3 );
            $myposts = get_posts($args);
            foreach ($myposts as $post) : setup_postdata($post);
        ?>
        <div class="carousel-cell">
            <div class="container-fluid">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 newscontent fadeable pan">
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
            <div class="col-lg-4 col-md-4 col-sm-6 col-sx-12 sponsor">
                <div class="featured-wrapper bg-white">
                    <a href="<?php the_field('link');?>" target="_blank" class="coverlink"></a>
                     <?php
                        $thumb = get_field('foto_balsponsor'); 
                        $image = vt_resize( $thumb, '', 400, 400, true );
                        ?>
                    <div class="featured-image" style="background-image:url('<?php echo $image[url]; ?>');"></div>
                    <div class="featured-content">
                        <h3>Balsponsor van de week</h3>
                        <span><?php the_field('balsponsor_van_de_week');?></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-sx-12 mini-ster">
                <div class="featured-wrapper bg-white">
                    <a href="#" class="coverlink"></a>
                    <?php
                        $thumb = get_field('foto'); 
                        $image1 = vt_resize( $thumb, '', 400, 400, true );
                    ?>
                    <div class="featured-image" style="background-image:url('<?php echo $image1[url]; ?>');"></div>
                    <div class="featured-content">
                        <h3>Mini-ster van de week</h3>
                        <span><?php the_field('minister_van_de_week');?></span>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-4 col-sm-12 col-sx-12 birthdays">
                <div class="featured-wrapper">
                    <div class="featured-content">
                        <h3>Onze jarigen</h3>
                        <?php
                            
                        
                        global $wpdb;
                        $sql = "SELECT 
                                    P.ID,
                                    P.post_title,
                                    PM.meta_value,
                                    (
                                        (DAY(NOW()) - DAY(PM.meta_value))
                                    ) as d,
                                    (
                                        ((MONTH(PM.meta_value) - MONTH(NOW()) + 12 ) % 12 )
                                    ) as m
                                FROM
                                    ".$wpdb->prefix."posts as P,
                                    ".$wpdb->prefix."postmeta as PM
                                WHERE
                                    P.post_type = 'spelers' AND
                                    PM.post_id = P.ID AND
                                    PM.meta_key = 'geboortedatum'
                                ORDER BY m ASC, d DESC
                                ";
                        $results = $wpdb->get_results( $sql, ARRAY_A );
                        //var_dump($sql);
                        //var_dump($results);
                        
                        $limit = 5;
                        foreach( $results as $result ) {
                            if ( $result['m'] == 0 && $result['d'] > 0 ) {
                                continue;
                            }
                                ?>
                                    <div class="person">
                                        <span class="date"><?=date('d/m/Y',strtotime( $result['meta_value']))?></span>
                                        <span class="name"><?=$result['post_title']?></span>
                                        <span class="seperator"></span>
                                    </div>
                                <?php
                                
                            $limit--;
                            if ( $limit == 0 ) {
                                break;
                            }
                        }
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

<?php
    $args = array(
        'post_type' => 'galleries',
        'order' => 'DESC',
        'posts_per_page' => 1
    );

    $myposts = get_posts($args);
    foreach ($myposts as $post) : setup_postdata($post);

    $filter = array();
    $filter['intro'] = strtolower( get_the_title() );
    $thumb = get_post_thumbnail_id(); 
    $image = vt_resize( $thumb, '', 800, 400, true );
?>
<section id="photos" style="background-image: url(<?php echo $image[url]; ?>)" data-filter-data='<?=json_encode( $filter )?>'>
    <div class="photowrapperbg widthcalc"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                
                <span class="photowrapper-offset"></span>
                <div class="photo-wrapper bg-white">
                    <h2><?php the_title(); ?></h2>
                    <p><?php the_field('intro');?></p>
                    <a href="<?php the_permalink(); ?>" class="button">Lees dit bericht</a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
    endforeach;
    echo $return;
    $return = '';
    wp_reset_postdata();
?>

<section id="evenementen" class="bg-grey">
    <div class="container-fluid">
        <div class="row">
            <h2>Komende evenementen</h2>
            <div class="carousel-events" data-flickity='{ "lazyLoad": true, "pageDots": true, "wrapAround": true, "prevNextButtons": false }'>         
                  <?php
                     $args = array(
                            'post_type' => 'events',
                            'order' => 'DESC',
                            'posts_per_page' => 3
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
                        
                        <div class="carousel-cell">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="event-wrapper bg-white">
                                    <a href="<?php the_permalink(); ?>" class="coverlink"></a>
                                    <div class="event-image" style="background-image: url(<?php echo $image[url]; ?>)" data-filter-data='<?=json_encode( $filter )?>'>
                                        <div class="date-wrapper">
                                            <div class="date"><?php $date = new DateTime(get_field('datum')); echo $date->format('d'); ?></div>
                                            <div class="month"><?php $date = new DateTime(get_field('datum')); echo $date->format('M'); ?></div>  
                                        </div>
                                    </div>
                                    <div class="event-content">
                                        <h3><?php the_title(); ?></h3>
                                        <?php the_excerpt(); ?>
                                    </div>
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
            <a href="#" class="button">Bekijk alle evenementen</a>
        </div>
    </div>
</section>

<section id="about" class="bg-grey pan">
    <div class="aboutwrapperbg widthcalc"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                <div class="about-wrapper bg-white">
                    <h2><?php the_field('titel_over_vereniging');?></h2>
                    <p><?php the_field('tekst_over_vereniging');?></p>
                    <a href="<?php the_field('button_link_over_vereniging');?>" class="button"><?php the_field('button_tekst_over_vereniging');?></a>
                    <span class="aboutwrapper-offset"></span>
                </div>
            </div>
            <?php
                $thumb = get_field('afbeelding_over_vereniging'); 
                $image3 = vt_resize( $thumb, '', 800, 800, true );
            ?>
            <div class="aboutimage" style="background-image:url('<?php echo $image3[url]; ?>');">
            </div>
        </div>
    </div>
</section>

<?php get_footer();?>
