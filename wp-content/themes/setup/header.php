<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title ><?php wp_title( '|', true, 'right' ); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<?php wp_head(); ?>
<script src="<?= get_template_directory_uri()?>/assets/js/modernizr.custom.js"></script>       
</head>
<body <?php body_class( $class ); ?>>
    
<section id="navbar" class="pan hidden-sm hidden-xs">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-lg-offset-8 col-md-6 col-md-offset-6 adressbar">
                <span>Marktstraat 59, 3925 JP Scherpenzeel        Lid worden        Contact</span>
            </div>
            <div class="brand">
                <a class="logo" href="/"><img src="<?= get_template_directory_uri()?>/assets/img/logo.svg" alt="Logo"/></a>
            </div>
            <div class="menu">
                <?php wp_nav_menu(array('container' => false, 'theme_location' => 'primary', 'items_wrap' => '%3$s', 'depth' => 0));?>
            </div>
        </div>
    </div>
</section>    

<section id="crumble-path" class="pan">
    
</section>
