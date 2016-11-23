<?php 
/**
 * Template Name: Teams overzicht
 */

get_header(); ?>

<section id="teams" class="bg-grey">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="teams-wrapper bg-white">
                    <div class="teams-image" style="background-image:url('<?= get_template_directory_uri()?>/assets/img/dames.jpg')"></div>
                    <div class="teams-content">
                        <select>
                            <option selected="selected">Dames 1</option>
                            <option value="team">Team</option>
                            <option value="stand">Stand</option>
                            <option value="programma">Programma</option>
                            <option value="uitslagen">Uitslagen</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer();?>
