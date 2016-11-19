<?php 
/**
 * Template Name: Home
 */

get_header(); ?>

<section id="news" class="pan">
    <div class="carousel" data-flickity='{ "lazyLoad": true, "pageDots": false, "wrapAround": true }'> 
        <div class="carousel-cell">
            <div class="container-fluid">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 newscontent">
                    <div class="newswrapper">
                        <h2>DAMES 1 BEKERT VERDER</h2>
                        <span class="date">20 november</span>
                        <p>Dit is een faketekst. Alles wat hier staat is slechts om een indruk te geven van het grafische effect van tekst op deze plek. Wat u hier leest is een voorbeeldtekst.</p>
                        <a href="#" class="button">Lees dit bericht</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-6 col-xs-6 newsimage" style="background-image:url('<?= get_template_directory_uri()?>/assets/img/header.jpg');">

            </div>
        </div>
    </div>
</section>

<section id="featured-items" class="bg-grey">
<br><br><br><br>
</section>





<?php get_footer();?>
