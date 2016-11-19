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

<footer>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer1') ) : ?>
                <?php endif; ?>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer2') ) : ?>
                <?php endif; ?>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer3') ) : ?>
                <?php endif; ?>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer4') ) : ?>
                <?php endif; ?>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer5') ) : ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</footer>
<section id="subfooter" class="pan">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <p>Realisatie door <a href="https://www.zekerzichtbaar.nl" target="_blank">Zeker Zichtbaar</a></p>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 social text-right">
                Social
            </div>
        </div>
    </div>
</section>

<?php wp_footer();?>

</body>
</html>
<script>
      window.sr = new scrollReveal();
</script>