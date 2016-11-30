<?php 
/**
 * Template Name: Teams categories
 */

get_header(); ?>

<section id="teams" class="bg-grey">
    <div class="container-fluid">
        <div class="row">
          <?php
            
            $teams = get_terms( array(
                'taxonomy' => 'spelers-teams',
                'hide_empty' => false,
                'parent' => 0,
            ) );
            
            foreach($teams as $key => $team)
            {
                $thumb1 = get_field('categorie_afbeelding', $team->taxonomy.'_'.$team->term_id); 
                $image1 = vt_resize( null, $thumb1, 420, 200, true );
                ?>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-4">
                   <div class="teams-wrapper bg-white">
                        <a href="<?php echo get_term_link( $team->slug, $team->taxonomy ); ?>" class="coverlink"></a>
                        <div class="teams-image" style="background-image:url('<?php echo $image1[url]; ?>')"></div>
                        <div class="teams-content">
                            <h3><?php echo $team->name; ?></h3>
                        </div>
                    </div>
                </div> 
                <?php
                
            }
            ?>
        </div>
    </div>
</section>

<?php get_footer();?>

                
                
          
    