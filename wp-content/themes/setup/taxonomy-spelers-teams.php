<?php 
/**
 * Template Name: Teams categories
 */

get_header(); ?>

<section id="teams" class="bg-grey">
    <div class="container-fluid">
        <div class="row">
                                  
            <?php
            
            $term_id = get_queried_object()->term_id;
            $taxonomy_name = 'spelers-teams';
            $termchildren = get_term_children( $term_id, $taxonomy_name );

            foreach ( $termchildren as $child )
            {
                $team = get_term_by( 'id', $child, $taxonomy_name );
                $thumb1 = get_field('categorie_afbeelding', $team->taxonomy.'_'.$team->term_id); 
                $image1 = vt_resize( null, $thumb1, 420, 200, true );
                ?>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="teams-wrapper bg-white">
                        <a href="<?php echo $team->slug; ?>/#team-informatie" class="coverlink"></a>
                        <div class="teams-image" style="background-image:url('<?php echo $image1[url]; ?>')"></div>
                        <div class="teams-content">
                            <select onchange="if (this.value) window.location.href=this.value">
                                <option value="<?php echo $team->slug; ?>/#team-informatie">Team</option>
                                <option value="<?php echo $team->slug; ?>/#stand">Stand</option>
                                <option value="<?php echo $team->slug; ?>/#uitslagen">Uitslagen</option>
                                <option value="<?php echo $team->slug; ?>/#programma">Programma</option>
                                <option value="<?php echo $team->slug; ?>" selected="selected"><?php echo $team->name; ?></option>
                            </select>
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

                
                
          
    