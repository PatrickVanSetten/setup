<?php 
/**
 * Template Name: Teams categories detail
 */

get_header(); ?>

<section id="teams" class="bg-grey">
    <div class="container-fluid">
        <div class="row">
          <?php
            global $post;
            $slug = $post->post_name;
            
            $parent_terms = get_terms( array(
                'taxonomy' => 'spelers-teams',
                'hide_empty' => false,
                'slug' => $slug,
            ) );
            
            
            foreach ( $parent_terms as $pterm ) {
                //Get the Child terms
                $terms = get_terms('spelers-teams', array( 'parent' => $pterm->term_id, 'orderby' => 'slug', 'hide_empty' => false ) );
                foreach ( $terms as $team ) 
                {
                    $thumb1 = get_field('categorie_afbeelding', $team->taxonomy.'_'.$team->term_id); 
                    $image1 = vt_resize( null, $thumb1, 420, 200, true );
                    ?>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-4">
                        <div class="teams-wrapper bg-white">
                            <a href="<?php echo get_term_link( $team->slug, $team->taxonomy ); ?>#overzicht" class="coverlink"></a>
                            <div class="teams-image" style="background-image:url('<?php echo $image1[url]; ?>')"></div>
                            <div class="teams-content">
                                <h3><?php echo $team->name; ?></h3>
                            </div>
                        </div>
                    </div>  
                    <?php
                }
                
            }
            /* if( $teams->have_posts() ) {
              while( $teams->have_posts() ) {
                $teams->the_post();
                ?>
                    <?php 
                        $thumb1 = get_field('categorie_afbeelding', $team->taxonomy.'_'.$team->term_id); 
                        $image1 = vt_resize( $thumb1, '', 420, 200, true );
                    ?>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="teams-wrapper bg-white">
                            <a href="#" class="coverlink"></a>
                            <div class="teams-image" style="background-image:url('<?php echo $image1[url]; ?>')"></div>
                            <div class="teams-content">
                                <h3><?php the_title(); ?></h3>
                            </div>
                        </div>
                    </div> 
                <?php
              }
            } */
            ?>
        </div>
    </div>
</section>

<?php get_footer();?>

                
                
          
    