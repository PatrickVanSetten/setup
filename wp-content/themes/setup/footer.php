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
<section id="subfooter" class="pam">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <p>Realisatie door <a href="https://www.zekerzichtbaar.nl" target="_blank"></a></p>
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