<?php
/**
 * Template Name: Teampagina
 */
get_header(); ?>

<section id="team" class="">
    <div class="container-fluid">
        <div class="row">
            <h1><?php the_title(); ?></h1>
            <?php while ( have_posts() ) : the_post(); ?>
            <?php the_content(); ?>
            <?php endwhile; // end of the loop. ?>
            
            
            <?php
                $args = array(
                    'post_type' => 'spelers',
                    'order' => 'DESC',
                    'posts_per_page' => -1
                );

                $myposts = get_posts($args);
                foreach ($myposts as $post) : setup_postdata($post);

                $filter = array();
                $filter['title'] = strtolower( get_the_title() );
                $filter['geboortedatum'] = strtolower( get_field('geboortedatum') );
                $filter['rugnummer'] = strtolower( get_field('rugnummer') );
                $filter['positie'] = strtolower( get_field('positie') );
            ?>

            <?php
                $term_list = wp_get_post_terms($post->ID, 'spelers-teams', 'array("fields" => "all")');
            ?>            
                        
            <p><?php the_title(); ?></p>
            <p><?php the_field('geboortedatum'); ?></p>
            <p><?php the_field('rugnummer'); ?></p>
            <p><?php the_field('positie'); ?></p>

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