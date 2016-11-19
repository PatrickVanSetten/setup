<?php 
/**
 * Template Name: Home
 */

get_header(); ?>


<section id="news" class="pan">
    <div class="newswrapperbg"></div>
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
                        <span>subtitle</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-sx-12 birthdays">
                <div class="featured-wrapper bg-white">
                    <a href="#" class="coverlink"></a>
                    <div class="featured-content">
                        <h3>Balsponsor van de week</h3>
                        <span>subtitle</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php get_footer();?>
